<?php

namespace App\Http\Resources\Api;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\Resource;
use App\Model\Cart;

class CartResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function qty(Request $request){
        return Cart::select('qty', 'id')->where(['user_id'=>$request->user()->id, 'invt_id'=>$this->id])->first();
    }
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'qty' => $this->qty,
            'keep_id' => $this->keep_id,
            'image' => asset($this->keep->image),
        ];
    }
}
