<?php

namespace App\Http\Resources\Api\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderSingle extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'order_id' => $this->id,
            'total' => $this->shipping_charge,
            'created_at' => (string)$this->created_at,
            'status' => $this->statusname->status,
            'OrderItems' => $this->OrderItems->map(function($data){
                return ['id'=>$data->id,'qty'=>$data->qty,'shipping_charge'=>$data->shipping_charge,'image'=>url($data->image)];
            })
        ];

        // return parent::toArray($request);
    }
}
