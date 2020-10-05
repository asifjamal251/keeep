<?php
namespace App\Http\Resources\Admin\Backlog;
use Illuminate\Http\Resources\Json\JsonResource;
class BacklogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function status($status)
    {
       if ($status == 13) {
           return "<span class='badge badge-warning'>Assign</span>";
       }

       if ($status == 9) {
           return "<span class='badge badge-danger'>Unprocess</span>";
       }
    }

    public function statusKeep($status)
    {
        if ($status == 14) {
            return "<span class='badge badge-warning'>Resend</span>";
        }

        if ($status == 6 || $status == 7 || $status == 8) {
            return "<span class='badge badge-success'>Approved</span>";
        }

        if ($status == 10) {
            return "<span class='badge badge-info'>Processed</span>";
        }
    }

    public function userAction($status)
    {
        if ($status == 7) {
            return "<span class='badge badge-success'>Keep By User</span>";
        }

        else if ($status == 8) {
            return "<span class='badge badge-danger'>Discarded By User</span>";
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
            'user_name' => $this->user->name,
            'user_email' => $this->user->email,
            'status' => $this->keep?$this->statusKeep($this->keep->status):$this->status($this->status),
            'statuscheck' => $this->status,
            'editor'=>$this->editor->name??'N/A',
            'edited_image'=>$this->keep?"<img style='max-width:150px' src='".asset($this->keep->icon)."'/>":"N/A",
            'user_action'=>$this->keep?$this->userAction($this->keep->status):'N/A',
            'changeStatus'=>$this->keep?$this->keep->status:null,
            'printed'=>'N/A',
            'keep_status'=>$this->keep?$this->keep->status:'N/A',
            'printStatus'=>$this->keep?$this->keep->print:"N/A",
            'shippedStatus'=>$this->keep?$this->keep->shipped:"N/A",
            'shiped'=>'N/A',
            'image' => $this->icon?"<img style='max-width:150px' src='".asset($this->icon)."'/>":"N/A",
            'created_at' => $this->created_at->format('d M Y'),
        ];
    }
}
