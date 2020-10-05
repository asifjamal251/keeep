<?php

namespace App\Http\Controllers\Api\V1;

use App\Helpers\CommonCart;
use App\Helpers\UserCart;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Order\OrderResource;
use App\Http\Resources\Api\Order\OrderSingle;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Cart;
use App\Model\UserWallet;
use App\Model\Transaction;
use App\Model\SiteSetting;
use App\User;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function orderList(Request $request){

        $data = Order::orderBy('id','desc')->where('user_id',$request->user()->id)->paginate(10);
        if ($data->count()) {            
            $data = OrderResource::collection($data);
            return response()->json(['error'=>false,'message'=>'Order list',
                'data'=>$data,
                'paginate'=>[
                    'total' => $data->total(),
                    'count' => $data->count(),
                    'per_page' => $data->perPage(),
                    'current_page' => $data->currentPage(),
                    'total_pages' => $data->lastPage()
                ]
            ]);
        }
        return response()->json(['error'=>true,'msg'=>['Record Not Found'],'data'=>[]]);
    }

    public function CreateOrder(Request $request){

        $this->validate($request,[
            'shipping_id' => 'required'

        ]);

        $user = User::find($request->user()->id);
        $balanc = UserWallet::where('user_id', $user->id)->first();
        $price = SiteSetting::select('shipping_price')->value('shipping_price');
        $carts = Cart::where('user_id', $user->id)->get();

        if($carts->count()){

        	


        	\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
	        $charge = \Stripe\Charge::create([
	            'amount' => $price * 100, // $15.00 this time
	            'currency' => 'usd',
	            'customer' => $user->stripe_customer_id
	        ]);

        
            $order = new Order;
            $order->user_id = $user->id;
            $order->shipping_id = $request->shipping_id;
            $order->status = 16;
            if($order->save()){

                foreach ($carts as $cart) {
                    $orderItem = new OrderItem;
                    $orderItem->user_id = $user->id;
                    $orderItem->order_id = $order->id;
                    $orderItem->keep_id = $cart->keep_id;
                    $orderItem->qty = $cart->qty;
                    $orderItem->image = $cart->keep->image;
                    $orderItem->shipping_charge = $price * $cart->qty;
                    $orderItem->save();

                }
                $shippingSum = OrderItem::where(['user_id'=>$user->id,'order_id'=>$order->id])->sum('shipping_charge');

                $transaction = new Transaction;
                $transaction->user_id = $request->user()->id;
                $transaction->transaction_type_id = 3;
                $transaction->amount = $shippingSum;
                $transaction->status = 1;
                $transaction->activity_by = 'Request print and shipped keep image';
                $transaction->save();


                $order->shipping_charge = $shippingSum;
                $order->transaction_id = $transaction->id;
                $order->save();

                OrderItem::where(['user_id'=>$request->user()->id,'order_id'=> $order->id])->update(['transaction_id'=>$transaction->id]);

                Cart::where('user_id', $user->id)->delete();

                return response()->json(['error'=>false,'message'=>'Order placed 1 successfull','data'=>[]]); 
            }

        
    }else{
    	return response()->json(['error'=>true,'message'=>'Cart is empty','data'=>[]]);
    }

        return response()->json(['error'=>true,'message'=>'Something went wrong!','data'=>[]]);
    }

    public function orderDetail(Request $request) {
        $this->validate($request,[
            'order_id' => 'required|exists:orders,id',
        ]);
        $data = Order::where(['user_id'=>$request->user()->id,'id'=>$request->order_id])->first();

        if ($data) {

            $data = new OrderSingle($data);
            return response()->json(['error'=>false,'message'=>'Order Detail','data'=>$data]);
        }

        return response()->json(['error'=>true,'msg'=>['Order Not Found'],'data'=>[]]);
    }
}
