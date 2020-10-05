<?php

namespace App\Http\Resources\Api\Keep;

use Illuminate\Http\Resources\Json\JsonResource;
class KeepResource extends JsonResource
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
            'image' => asset($this->image),
        ];
    }
}
