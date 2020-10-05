<?php

namespace App\Http\Resources\Admin\Notification;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'message' => $this->message,
            'action' => $this->id,
            
        ];
    }
}
