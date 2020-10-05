<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Model\Role;
use Hash;
use Auth;
use App\Events\OtpEvent;
use App\Events\SendSmsEvent;
use Intervention\Image\ImageManagerStatic as Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePasswordForm(Request $request, Admin $admin)
    {
        return view('admin.admin.profile.changepassword');
    }

    public function updatePassword(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'current_password' => 'required|min:6',
            'new_password' => 'required|min:6|confirmed',
            'new_password_confirmation' => 'required|min:6|'

        ]);

        if(Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {
            $admin = Auth::guard('admin')->user();
            $admin->password = bcrypt($request->new_password);
            if($admin->save()){
                return redirect()->back()->with(['message'=>'Password Changed Successfully...','class'=>'success']);
            }
            return redirect()->back()->with(['message'=>'Whoops, looks like something went wrong ! Try again ...','class'=>'danger']);
        }
        return redirect()->back()->withErrors(['current_password'=>'Your Current Password do not match']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/u',
            //'email' => 'required|string|email|max:255|unique:admins',
            'mobile'=> 'required|numeric|digits:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:1000',
        ]);

        $admin = Admin::find($id);
        $admin->name = $request->name;
        $admin->mobile = $request->mobile;

        if($request->hasFile('avatar')){
            $image_name = $id."_".time().".".$request->file('avatar')->getClientOriginalExtension();
            $iconimage = $request->file('avatar');
            $image_resize = Image::make($iconimage->getRealPath());              
            $image_resize->resize(50, 50);
            $image_resize->save(public_path('storage/admin/' .$image_name));
            $admin->avatar = 'storage/admin/'.$image_name;
        }

        if($admin->save()){
                return redirect()->back()->with(['message'=>'Updated Successfully','class'=>'success']);
        }
        return redirect()->back()->withErrors(['current_password'=>'Your Current Password do not match']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::select('id','name','email','avatar','mobile')->where('id',$id)->first();
        return view('admin.admin.profile.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
