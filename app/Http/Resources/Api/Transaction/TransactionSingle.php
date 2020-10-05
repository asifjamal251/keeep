<?php

namespace App\Http\Resources\Api\Transaction;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionSingle extends JsonResource
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
            'id' => $this->id,
            'amount' => $this->amount,
            'created_at' => (string)$this->created_at,
            'status' => $this->statusname->status,
            'type' => $this->transactionType->name,
            'orderItems' => $this->OrderItems->count() > 0?$this->OrderItems->map(function($data){
                return ['id'=>$data->id,'qty'=>$data->qty,'shipping_charge'=>$data->shipping_charge,'image'=>url($data->image)];
            }):'N/A',
            'keep_image'=>$this->keep?asset($this->keep->image):'N/A',
            'strip' => $this->strip->count() > 0?$this->strip->map(function($data){
                return ['id'=>$data->id,'last4digit'=>$data->card_last4_digit,'strip_transaction_id'=>$this->transaction_id];
            }):'N/A',
        ];

    }
}
