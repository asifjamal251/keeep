<?php
namespace App\Http\Resources\Admin\Image;
use Illuminate\Http\Resources\Json\JsonResource;
class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function status($status)
    {
       if ($status == 14) {
           return "<span class='badge badge-warning'>Reasign</span>";
       }

       if ($status == 6 || $status == 7 || $status == 8) {
           return "<span class='badge badge-success'>Approved</span>";
       }

       if ($status == 10) {
           return "<span class='badge badge-danger'>Not Approved</span>";
       }
    }

    public function userAction($status)
    {
        if ($status == 7) {
            return "<span class='badge badge-success'>Keep</span>";
        }

        else if ($status == 8) {
            return "<span class='badge badge-danger'>Pass</span>";
        }


        else if ($status == 9) {
            return "<span class='badge badge-warning'>Pending</span>";
        }


        else{
            return "N/A";
        }
    }

    public function toArray($request)
    {
        return [
            //?"<span class='badge badge-success'>Processed</span>":"<span class='badge badge-danger'>Unprocess</span>"
            'sn' => ++$request->start,
            'id' => $this->id,
            'user' => $this->user->name,
            'user' => $this->user->name,
            'status' => $this->keep?$this->status($this->keep->status):"<span class='badge badge-warning'>Pending</span>",
            'statuscheck' => $this->status,
            'statusKeep' => $this->keep?$this->keep->status:null,
            'editor'=>$this->editor->name??'N/A',
            'edited_image'=>$this->keep?"<img style='max-width:150px' src='".asset($this->keep->icon)."'/>":"N/A",
            'user_action'=>$this->keep?$this->userAction($this->keep->status):'N/A',
            'printed'=>'N/A',
            'shiped'=>'N/A',
            'image' => $this->icon?"<img style='max-width:150px' src='".asset($this->icon)."'/>":"N/A",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
