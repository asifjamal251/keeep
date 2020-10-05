<?php

namespace App\Http\Resources\Admin\User;

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
            'sn' => ++$request->start,
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status?"<span class='badge badge-success'>Active</span>":"<span class='badge badge-danger'>Dectivated</span>",
            'avatar' => $this->avatar?"<img style='max-width:150px' src='".$this->avatar."'/>":"N/A",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
