<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CartResource;
use App\Helpers\CommonCart;
use App\Model\Cart;
use App\User;
use App\Model\Product;
use App\Model\ProductInventory;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{
    public function addItem(Request $request){
        $user = User::find($request->user()->id);
        $this->validate($request, [
        'ids'=>'required',
        ]);

        $courtCount = 1;

        foreach ($request->ids as $id) {
            $cart = Cart::firstOrNew(['user_id'=>$user->id, 'keep_id'=>$id]);
            $cart->qty = 1;
            $cart->save();
            $courtCount++;
        }
        

        if($courtCount > 1){
            $data = Cart::orderBy('created_at','desc')->where(['user_id'=>$user->id])->get();

            if(count($data)){
                $data = CartResource::collection($data); 
                return response()->json(['error'=>false, 'message'=>'Cart Item  List!', 'data'=>$data]);
            }
        }
        return response()->json(['error'=>true, 'message'=>'Something went wrong!']);
    }






    public function cartData(Request $request){
        $user = User::find($request->user()->id);
        $data = Cart::orderBy('created_at','desc')->where(['user_id'=>$user->id])->get();

        if(count($data)){
            $data = CartResource::collection($data); 
            return response()->json(['error'=>false, 'message'=>'Cart Item  List!', 'data'=>$data]);
        }
        return response()->json(['error'=>true, 'message'=>'cart is empty', 'data'=>[]]); 
    }

    public function update(Request $request){

        $this->validate($request, [
            'id'=>'required',
            'keep_id'=>'required',
            'qty'=>'required',
        ]);

        $user = User::find($request->user()->id);

        $cartUpdate = Cart::where(['user_id'=>$user->id,'keep_id'=>$request->keep_id,'id'=>$request->id])->first();
        if ($cartUpdate) {
            $cartUpdate->qty = $request->qty;
            if ($cartUpdate->save()) {

                $data = Cart::orderBy('created_at','desc')->where(['user_id'=>$user->id])->get();
                if(count($data)){
                    $data = CartResource::collection($data); 
                    return response()->json(['error'=>false, 'message'=>'Cart Item  List!', 'data'=>$data]);
                }
            }
        } else{
            return response()->json(['error'=>true, 'message'=>'Something went wrong!', 'data'=>[]]);
        }
        


        
        
        return response()->json(['error'=>true, 'message'=>'cart is empty', 'data'=>[]]); 
    }

    public function destroy(Request $request){
        $this->validate($request, [
            'id'=>'required',
            'keep_id'=>'required',
        ]);

        $user = User::find($request->user()->id);

        if(Cart::where(['user_id'=>$user->id,'keep_id'=>$request->keep_id,'id'=>$request->id])->delete()){
            return response()->json(['error'=>false, 'msg'=>['Item deleted successfylly']]);
        }
        return response()->json(['error'=>true, 'msg'=>['Oops! Something went wrong']]);
    }   
}
