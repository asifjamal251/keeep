<?php

namespace App\Http\Resources\Admin\Tag;

use Illuminate\Http\Resources\Json\JsonResource;
class TagResource extends JsonResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status?"<span class='badge badge-success'>Active</span>":"<span class='badge badge-danger'>Deactivate</span>",
            'image' => $this->image?"<img src='".$this->image."'/>":"N/A",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
