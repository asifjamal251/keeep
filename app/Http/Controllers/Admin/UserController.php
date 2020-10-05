<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\User\UserCollection;
use App\User;
use App\Model\Backlog;
use App\Http\Resources\Admin\Backlog\BacklogCollection;
use Carbon\Carbon;
use Illuminate\Http\Request;
class UserController extends Controller
{
    
    
    public function index(Request $request)
    {
       if ($request->ajax()) {
            $datas = User::orderBy('created_at','desc')->select(['id','name','avatar','status','email','created_at']);
            $search = $request->search['value'];
            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
                $datas->orWhere('email', 'like', '%'.$search.'%');
              
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new UserCollection($datas));
        }
        return view('admin.user.list');
    }
 
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    { 
      $id = implode(',', ((is_array($request->user))?$request->user:[$request->user]));
      $status = implode(',', User::whereIn('id',((is_array($request->user))?$request->user:[$request->user]))->pluck('status')->toArray());
        
      User::whereIn('id',((is_array($request->user))?$request->user:[$request->user]))->update(['status'=>$request->status]);
      AdminLog($request,'User Status','User Status changed/id:'.$id.'/status:'.$status);
     
      return response()->json();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$user)
    {
        $user = User::find($user);
       
        return view('admin.user.backlog.list',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,User $user)
    {
        return view('admin.user.edit',compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
       $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'password'=>'required|min:6',
            'mobile'=>'required|numeric|digits:10',
          
        ]);
        $Oldata = implode(',', $user->only('first_name','last_name','mobile'));
        $message = 'Dear '.$user->name.', Your detail has been changed.';
        if($request->mobile != $user->mobile && auth('admin')->user()->hasAccess('change_mobile_user')){
            $this->validate($request,[
                'mobile'=>'required|digits:10|count:users',
            ]);
            $message.=' mobile: '.$request->mobile;
            $user->mobile = $request->mobile;
        }
        if($user->first_name != $request->first_name){
          $message.=' first name: '.$request->first_name;
        }
        if($user->last_name != $request->last_name){
           $message.=' last name: '.$request->last_name;
        }
        if(decrypt($user->plain_password) != $request->password){
           $message.=' Password: '.$request->password;
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = bcrypt($request->password);
        $user->plain_password = encrypt($request->password);
        if($user->save()){
          AdminLog($request,'User Updated','User Updated:'.$user->id.'/'.$Oldata);
          if($request->send_message){
            event(new SmsEvent($user->mobile,$message));
          }
          return redirect()->route('admin.user.index')->with(['class'=>'success','message'=>'User Details Updated successfully.']);
        }
     
        
    }
    public function permission(Request $request, $userId){
            $types = [
                'roi'=>'user_roi_permissions',
                'direct'=>'user_direct_permissions',
                'binary'=>'user_binary_permissions',
                'booster'=>'user_booster_permissions',
             ];
          $permission = DB::table($types[$request->type])
          ->where('user_id',$userId)
          ->update(['status'=>$request->status]);
        return response()->json(['message'=>'successfully']);
    }
   
}
