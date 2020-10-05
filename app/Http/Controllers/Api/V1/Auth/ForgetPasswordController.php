<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;
use App\Events\OtpEvent;
use App\User;
class ForgetPasswordController extends Controller
{
   
    public function request(Request $request){
        if (!$request->has('otp')) {
            $this->validate($request,[
                'email'=>'required|exists:users'
            ]);
            $email = User::where('email', $request->email)->select('email')->value('email');
            if(!Cache::has('otp_'.$email)){
                Cache::put('otp_'.$email, 'true', now()->addSeconds(config('peeaco.otp_time')));
                event(new OtpEvent($email));
                return response()->json(['error'=>false,'msg'=>['OTP sent to your mobile no.']]);
            }
            return response()->json(['error'=>true,'msg'=>['Try after some times.']]);
        }
        $this->validate($request,[
            'refer_id' => 'required|exists:users',
            'otp' => [
                'required',
                'numeric',
                'digits:6',
                Rule::exists('user_otps')->where(function ($query) use ($request) {
                    $query->where('mobile', $request->mobile);
                })
            ],
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::select('id','refer_id')->where('refer_id',$request->refer_id)->first();
        if ($user) {
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['error'=>false,'msg'=>['Change Password successfully.']]);
        }
        return response()->json(['error'=>true,'msg'=>['Woops look like somthing wrong !']]);
       
    }
    
    
    public function username() {        
        if (filter_var(request('username'), FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } else {
            return 'mobile';
        }
    }

   

  
}
