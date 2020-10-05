<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\AdminLogin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest', ['except' => 'logout']);
    }

    // Shwoing the admin login form method
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }


    public function login(Request $request)
    { 
         
        $this->validate($request, [
            'email' => 'required',
            'password'=>'required',
        ]);

        if($this->guard()->attempt(['email' => request('email'), 'password' => request('password'),'status' => 1])) {
        $admin =  Auth::guard('admin')->user();
        return redirect()->to('/admin/dashboard');
        } 

        if ($admin = Admin::where('email',$request->email)->first()) {
            if ($admin->status == 0) {
                //['email'=>'inactive','password'=>'You are not an active person, please contact Admin'];
                return redirect()->back()->withErrors(['email'=>'You are not an active person, please contact with Owner.','status'=>false]);
            } else{
                return redirect()->back()->withErrors(['email'=>'These credentials do not match our records.','status'=>true]); 
            }
        }  
        else{
            return redirect()->back()->withErrors(['email'=>'These credentials do not match our records.']); 
        }
        
        //return redirect()->back()->withErrors(['email'=>['Invalid credientials.']]); 
        // return response()->json(['message'=>'The given data was invalid.','errors'=>['username'=>['These credentials do not match our records.']]],422);
        
    }
   
    // Logout method with guard logout for admin only
    public function logout()
    {
        // $admin =  Auth::guard('admin')->user();
        // $userlogin =  AdminLogin::where('admin_id',$admin->id)->latest()->first();
        // $userlogin->logout_at=now();
        // $userlogin->save();

        $this->guard()->logout();
        // return AdminLog(request(),'Log Out', 'Logout');
        return redirect()->route('admin.login.form');
    }
    
    // defining auth  guard
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
