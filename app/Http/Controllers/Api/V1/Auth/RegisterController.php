<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\User;
use App\Model\UserOtp;
use App\Model\UserWallet;
use App\Events\OtpEvent;
use App\Events\SendSmsEvent;
use Illuminate\Http\Request;
use App\Model\LoginPassword;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ThankYouSignupMail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Api\UserResource;
use App\Model\SiteSetting;
use App\Model\DeviceToken;
use Session;
use Stripe;

use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    

    
    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Register user with validate with create
     *
     * @param  Request  $request
     * @return response
     */
    public function request(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|min:6|max:15|confirmed',
        ]);
        
        return $this->register($request);
    }
    /**
     * Register user with validate with create
     *
     * @param  Request  $request
     * @return response
     */
    public function register(Request $request){        
     

        $data = $request->all();
    
        if ($user = $this->create($data)) {

        	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = \Stripe\Customer::create([
              'email' => $user->email,
              'description' => 'Create an account from keep ios app',
            ]);

            $user->stripe_customer_id = $customer->id;
            $user->save();

            if($request->device_token){
                $token = DeviceToken::firstOrNew(['device'=>$request->header('device'),'token'=>$request->device_token]);
                $token->user_id = $user->id;

                $token->save();
            }
            
            $siteDetails = SiteSetting::latest()->first();  

            Mail::send('emails.admin.new-register', $data, function($message) use($request,$siteDetails){
                $message->to($siteDetails->email, $siteDetails->site_title)->subject('New Registration');
                $message->from('testing@sanix.in','New Registration');
            });


            auth('user')->login($user);

            

            return response()->json(['error'=>false,'message'=>'Successfully registered ','data'=> new UserResource($user), 'token'=>Auth::user()->createToken('')->accessToken]);
        }

        return response()->json(['error'=>true,'message'=>'Whoops look like something request'],500);
    }

    
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('user');
    }
}
