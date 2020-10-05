<?php

namespace App\Http\Resources\Admin\Help;

use Illuminate\Http\Resources\Json\JsonResource;
class HelpResource extends JsonResource
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
            'name' => $this->user->name,
            'email' => $this->user->email,
            'subject' => $this->subject,
            'status' => $this->status?"<span class='badge badge-success'>replied</span>":"<span class='badge badge-danger'>Not Reply</span>",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
