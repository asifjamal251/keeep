<?php

namespace App\Http\Resources\Admin\Feature;

use Illuminate\Http\Resources\Json\JsonResource;
class FeatureResource extends JsonResource
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
            'name' => $this->title,
            'slug' => $this->slug,
            'status' => $this->status?"<span class='badge badge-success'>Active</span>":"<span class='badge badge-danger'>Deactivate</span>",
            'image' => $this->image?"<img style='max-width:150px' src='".$this->image."'/>":"N/A",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
