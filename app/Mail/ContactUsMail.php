<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        if($request->hasFile('file')){
            $mime = $request->file->getClientOriginalExtension();
            $name = $request->file->getClientOriginalName();
            return $this->view('email.contact-us',['msg'=>$request->message,'name'=>$request->name,'email'=>$request->email])
        ->from('asif@sanix.in', $request->name)
        ->subject('Contact Us')
        ->cc('asif.sanix@gmail.com', $request->name)
        ->attach($request->file, ['as' => $name, 'mime' => 'application/' . $mime])
        ->to('asifjamal251@gmail.com');
       }
       else{
         return $this->view('email.contact-us',['msg'=>'Hello','name'=>'Asif','email'=>'asif.sanix@gmail.com'])
        ->from('asif@sanix.in', $request->name)
        ->subject('Contact Us')
        ->cc('asif.sanix@gmail.com', $request->name)
        ->to('asifjamal251@gmail.com');
       }
       
    }
}
