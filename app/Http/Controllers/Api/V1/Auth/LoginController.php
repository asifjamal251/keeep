<?php

namespace App\Http\Controllers\Api\V1\Auth;;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Api\UserResource;
use App\Model\UserWallet;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    

   
    public function login(Request $request){

       $this->validate($request, [
            'username' => 'required|string|max:255|min:3',
            'password' => 'required|string|min:6',
        ]);
        if(Auth::attempt(['email' => $request->username,
            'password' => request('password')])){
            $user = auth()->user();
            DB::table('oauth_access_tokens')->where('user_id', '=', $user->id)->update(['revoked' => 1]);
            DB::table('users')->where('id', '=', $user->id)->update(['device_id' => $request->device_id]);
            return response()->json(array('error'=>false,'message'=>'Login successfull','data'=>new UserResource($user),'token'=>$user->createToken($request->header('device'))->accessToken));  
        }      
        return response()->json(array('error'=>true,'message'=>'Invalid username or password','data'=>null,'token'=>''));
    }
    
    public function logout(Request $request){

        $accessToken = auth()->user()->token();
        $refreshToken = DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);

        $accessToken->revoke();
        return response()->json(array('error'=>false,'msg'=>['Logout Successfull'],'data'=>[]));
    }

    public function username() {
        
        if (filter_var(request('username'), FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } else {
            return 'mobile';
        }
    }

   

  
}
