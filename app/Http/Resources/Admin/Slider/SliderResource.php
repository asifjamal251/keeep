<?php

namespace App\Http\Resources\Admin\Slider;

use Illuminate\Http\Resources\Json\JsonResource;
class SliderResource extends JsonResource
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
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'image' => $this->image,
            'link' => $this->button_link,
            'status' => $this->status?"<span class='badge badge-success'>Active</span>":"<span class='badge badge-danger'>Deactivate</span>",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
