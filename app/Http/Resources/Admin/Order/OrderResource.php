<?php

namespace App\Http\Resources\Admin\Order;

use Illuminate\Http\Resources\Json\JsonResource;
class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function status($status)
    {
       if ($status == 16) {
           return "<span class='badge badge-warning'>Order Placed</span>";
       }

       if ($status == 3) {
           return "<span class='badge badge-danger'>Canceled</span>";
       }

       if ($status == 2) {
           return "<span class='badge badge-warning'>Pending</span>";
       }

       if ($status == 17) {
           return "<span class='badge badge-danger'>Delivered</span>";
       }

           return "<span class='badge badge-danger'>Something Wrong</span>";
       
    }
    public function toArray($request)
    {
        return [
            'sn' => ++$request->start,
            'id' => $this->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'total' => $this->total,
            'created_at' => $this->created_at->toDateTimeString(),
            'status' => $this->status($this->status)

        ];
    }
}
