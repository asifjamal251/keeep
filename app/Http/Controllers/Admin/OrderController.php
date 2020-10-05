<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Model\Order;
use App\User;
use App\Model\Status;
use App\Model\OrderItem;
use App\Model\Transaction;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\Admin\Order\OrderCollection;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->expectsJson()) {  
            $orders = Order::select(['id','user_id','status','created_at','status'])
            ->with(['user'=>function($query){
                $query->select('id','name','email');
            }]);

            if ($request->statuss) {
                $orders->where('status',$request->statuss);
            }
            $search = request('search')['value'];
            if($search){
                $orders->where('id', 'like', '%'.$search.'%')->orWhere('total', 'like', '%'.$search.'%')   
                    ->orWhere('created_at', 'like', '%'.$search.'%')->orwhere('pay_mode','like','%'.$search.'%')
                    ->orWhereHas('user',function ($query) use ($search){

                        $query->where('name','like','%'.$search.'%')->orWhere('mobile','like','%'.$search.'%');

                    })
                    ->orWhereHas('statusname', function ($query) use ($search){
                        $query->where('name','like','%'.$search.'%');
                    })->get();


            }
            request()->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $orders = $orders->latest()->paginate($request->length);
            return response()->json(new OrderCollection($orders));
       
        }
        return view('admin.order.list');
    }
    private function searchUser($request){
        return User::select(['id','name','refer_id'])->where('refer_id','like','%'.$request->q['term'].'%')->limit(5)->get()->map(function($data){
                    return ['id'=>$data->refer_id,'name'=>$data->name.' ( '.$data->refer_id.' )'];
                 });
    }
    private function getProductDetail($request){
        $product = Product::select(['id','name'])->where('name','like','%'.$request->q['term'].'%')->with([
            'inventory'=>function($query)use($request){
                $query->where('id',$request->id);
                $query->with([
                    'image'=>function($query){
                        $query->select('inventory_id','image');
                    },
                    'attributes'=>function($query){
                        $query->select(['name','attribute_value','parent_id']);
                    }
                ]);
            }
        ])->whereHas('inventory',function($query)use($request){
            $query->where('id',$request->id);
            $query->where('status_id',1);
            $query->has('image');
        })->first();
        if($product){
            return [
                'id'=>$product->inventory->id,
                'name'=>$product->name.' ( '.$product->inventory->attributes->pluck('attribute_value')->implode(',').' ) ',
                'amount'=>$product->inventory->mrp,
                'bv'=>$product->inventory->bv,
                'image'=>$product->inventory->image->image
            ]; 
        }
        return [];
    }
    private function getUserDetails($request){
        
    }
    private function searchProduct($request){
         $product = Product::select(['id','name'])->where('name','like','%'.$request->q['term'].'%')->with([
            'inventories'=>function($query){

                $query->with([
                    'attributes'=>function($query){
                        $query->select(['name','attribute_value','parent_id']);
                    }
                ]);
            }
        ])->whereHas('inventory',function($query)use($request){
            $query->where('status_id',1);
            $query->whereNotIn('id',explode(',', $request->exists));
            $query->has('image');
        })->limit(10)->get();
        return $product->map(function($data){
            return $data->inventories->map(function($inventory)use($data){
                return ['id'=>$inventory->id,'name'=>$data->name.' ( '.$inventory->attributes->pluck('attribute_value')->implode(',').' ) ']; 
            });
        })->collapse();
    }
    protected function getCity($request){
        $state = State::select('id')->where('country_id',101)->where('name',$request->state)->value('id');
        return City::where(['state_id'=>$state])->pluck('name');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        if ($request->expectsJson()) {  
            if ($request->type == 'searchProduct') {
                
                return response()->json(['results'=>$this->searchProduct($request)]);
            }
            if ($request->type == 'getProductDetail') {
                
                return response()->json($this->getProductDetail($request));
            }
            if ($request->type == 'searchUser') {
               
                return response()->json(['results'=>$this->searchUser($request)]);
            }
            if ($request->type == 'getCity') {
               
                return response()->json(['results'=>$this->getCity($request)]);
            }
        }
        $states = State::select('name')->where('country_id',101)->get();
        return view('admin.order.create',compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
         $this->validate($request,[
            'address.name' => 'required|string|max:255',
            'address.address' => 'required|string|max:255',
            'address.state' => 'required|string|max:255',
            'address.city' => 'required|string|max:255',
            'address.pin_code' => 'required|string|max:255',
            'address.mobile' => 'required|string|max:255',
            'product' => 'required|array',
            'otp' => 'required|min:6',
            'user' => 'required|exists:users,refer_id',
            'otp' =>'required',
            'paymod' =>'required',
        ]);
        $user = User::select(['id','refer_id','mobile'])->where('refer_id',$request->user)->first();
        $this->validate($request,[
            'otp'=>Rule::exists('user_otps')->where(function ($query) use ($request,$user) {
                    $query->where('mobile', $user->mobile);
                })
        ]);
        $data['items'] = 0;
        $data['total'] = 0;
        $data['bv'] = 0;
        $data['sub_total'] = 0;
        $data['discount'] = 0;
        $data['tax'] = 0;
        $data['shipping_charge'] = 0;
        $data['coupon_discount'] = 0;

        $address = (Object)($request->address);

        $shippingCharge = PinList::select('shipping_charge')->where('pin_code',$address->pin_code)->first();
        if(!$shippingCharge){
            return response()->json(['message'=>'Delivery not available to this address.','notification'=>'true'],500);
        }

        $filteredCart = ProductInventory::whereIn('id',array_keys($request->product))->with(['product'=>function($query){
            $query->select(['tax','id','name']);
        }])->get();
        if(!$filteredCart->count()){
            return response()->json(['message'=>'Min 1 product is mandatory','notification'=>'true'],500);

        }   



        $data['items'] = count($filteredCart);       

        foreach($filteredCart as $value){

            $invt = $value;

            $data['sub_total'] += ($invt->mrp*$request->product[$invt->id]);
            $data['bv'] += ($invt->bv*$request->product[$invt->id]);
          
            $data['total'] += ($invt->mrp*$request->product[$invt->id])+((($invt->mrp*$request->product[$invt->id])/100)*$value->product->tax);
        }
        $data['total'] = $data['total'] + $data['shipping_charge'];
        if ($request->paymod == 'Wallet') {
            $wallet = ShoppingWallet::select('id','user_id','amount')->firstOrNew(['user_id'=>$user->id]);
            if($data['total'] > $wallet->amount){
                return response()->json(['message'=>'Sorry! Insufficient amount in your wallet!','notification'=>'true'],500);

            }
            if($data['total'] < 100){
                return response()->json(['message'=>'Amount of order should not be less than Rupee 500/-.','notification'=>'true'],500);
            }
        }


        $order = new Order;
        $order->order_id = (string) Str::orderedUuid();
        $order->user_id = $user->id;
        $order->sub_total = $data['sub_total'];
        $order->shipping_charge = $data['shipping_charge'];
        $order->shipping_id = 0;
        $order->pay_mode = $request->paymod;
        $order->discount = 0;
        $order->tax = $data['tax'];
        $order->total = $data['total'];
        $order->status = '3';
        $order->plateform = 'web';
        if($order->save()){
            OrderStatus::create(['status_id'=>3,'order_id'=>$order->id]);
            $shippingAddress = new OrderShippingAddress;
            $shippingAddress->user_id = $user->id;
            $shippingAddress->order_id = $order->id;
            $shippingAddress->address = $address->address;
            $shippingAddress->city = $address->city;
            $shippingAddress->country = 'India';
            $shippingAddress->mobile = $address->mobile;
            $shippingAddress->name = $address->name;
            $shippingAddress->pin = $address->pin_code;
            $shippingAddress->state = $address->state;
            $shippingAddress->save();
            $order->shipping_id = $shippingAddress->id;
            $order->save();
            $billingAddress = new OrderBillingAddress;
            $billingAddress->user_id = $user->id;
            $billingAddress->order_id = $order->id;
            $billingAddress->address = $address->address;
            $billingAddress->city = $address->city;
            $billingAddress->country = 'India';
            $billingAddress->mobile = $address->mobile;
            $billingAddress->name = $address->name;
            $billingAddress->pin = $address->pin_code;
            $billingAddress->state = $address->state;
            $billingAddress->save();

            foreach ($filteredCart as  $CartItem) {
                $CartData = new OrderItem;
                $CartData->user_id = $user->id;
                $CartData->order_id = $order->id;
                $CartData->name = $CartItem->product->name;
                $CartData->tax = $CartItem->product->tax;
                $CartData->mrp = $CartItem->mrp;
                $CartData->bv = $CartItem->bv;
                $CartData->qty = $request->product[$CartItem->id];
                $CartData->attribute = $CartItem->inventoryAttributes->map(function($data){
                    return ['attribute'=>$data->attribute->name,'value'=>$data->attribute_value];
                })->toJson();
                $CartData->image = $CartItem->image;
                $CartData->save();     
            }

            if ($request->paymod == 'Wallet') {
                $wallet->amount = $wallet->amount - $data['total'];
                $wallet->save();  
                $tran = new Transaction;
                $tran->transaction_type_id = 70;
                $tran->amount = $data['total'];
                $tran->credit_id = 4;
                $tran->debit_id = $user->id;
                $tran->save();
            }

            $repurches = new UserRepurchaseDetail;
            $repurches->user_id = $user->id;
            $repurches->order_id = $order->id;
            $repurches->bv = $data['bv'];
            $repurches->amount = $data['sub_total'];
            $repurches->status = 1;
            $repurches->save();
           
            
            return response()->json(['message'=>'Order Created Successfully','notification'=>true]);

        }
        return response()->json(['message'=>'Error in Order Creating','notification'=>true],500);
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Order $order){
        return view('admin.order.view',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id){
        return Order::where('id',$id)->with('orderItems')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request, Order $order){
        $orderStatus = OrderStatus::latest()->firstOrNew(['order_id'=>$order->id]);
        if(!$orderStatus->id){
            $orderStatus = OrderStatus::create(['status_id'=>3,'order_id'=>$order->id]);
        }
        $statuses = Status::select('id')->where('type','order')->where('id','>',($orderStatus->status_id))->where('id','<=',$request->status)->get();
        // dd('df');
        foreach ($statuses as $status) {
            OrderStatus::create(['status_id'=>$status->id,'order_id'=>$order->id]);
        }
        $order->status = $status->id;
        $order->save();
        return response()->json(['class'=>'success','message'=>'Change Status successfully']);
    }
        


    public function destroy(Request $request,$id)
    {
             
           
    }

    public function DownloadInvoice(Request $request, $id){
        $order = Order::find($id);
;        $pdf = new Dompdf();
        $pdf->load_html(view('admin.order.invoice-download',['order'=>$order]));
        $pdf->render();

        return $pdf->stream('document.pdf');

    }

   
}
