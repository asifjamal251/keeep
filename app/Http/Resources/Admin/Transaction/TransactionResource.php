<?php

namespace App\Http\Resources\Admin\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;
class TransactionResource extends JsonResource
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
            'sn' => ++$request->start,
            'id' => $this->id,
            'trx' => 'trx'.$this->id,
            'name' => $this->user->name,
            'email' => $this->user->email,
            'type' => $this->transactionType->name,
            'amount' => $this->amount,
            'status' => $this->status?"<span class='badge badge-success'>Active</span>":"<span class='badge badge-danger'>Deactivate</span>",
            'image' => $this->image?"<img style='max-width:150px' src='".$this->image."'/>":"N/A",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
