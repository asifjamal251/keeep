<?php

namespace App\Mail;

use App\Model\UserOtp;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotPasswordMail extends Mailable
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
    	//dd($request->email);
    	$userOtp = UserOtp::firstOrNew(['email'=>$request->email]);
        $userOtp->otp = rand(100000,999999);
        $userOtp->save();
        
        return $this->view('email.forget-password',['message'=>'Hello','otp'=>$userOtp->otp,'email'=>$request->email])
        ->from('asif@sanix.in', 'Keep')
        ->subject('Forget Password')
        ->to($request->email);
       
       
    }
}
