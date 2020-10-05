<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile??'',
            'avatar' => $this->avatar?asset($this->avatar):'',
            'created_at' => $this->created_at??'',
            
        ];
    }
}
