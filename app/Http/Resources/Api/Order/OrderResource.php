<?php

namespace App\Http\Resources\Api\Order;

use Illuminate\Http\Resources\Json\JsonResource;
class OrderResource extends JsonResource
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
            'status' =>  $this->statusname->status,
            'OrderItems' => $this->OrderItems->take(2)->map(function($data){
                return ['id'=>$data->id, 'name'=>$data->name, 'image'=>url("images/cdn/100/100/".$data->image)];
            }),
        ];
    }
}
