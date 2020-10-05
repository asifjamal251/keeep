<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Backlog\BacklogCollection;
use App\Model\Backlog;
use App\Model\Keep;
use App\Model\DeviceToken;
use App\Model\SiteSetting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
class BacklogController extends Controller
{
    
    public function index(Request $request)
    {

       if ($request->ajax()) {
            $datas = Backlog::orderBy('created_at','desc')->select(['id','user_id','admin_id','status','image','created_at','icon'])
            ->with(['user'=>function($query){
                $query->select('id','name','email');
            }])
            ->with(['editor'=>function($query){
                $query->select('id','name');
            }])
            ->with(['keep'=>function($query){
                $query->select(['id','user_id','admin_id','status','image','print','shipped','created_at','icon','backlog_id']);
            }])
            ->with('statusname');

            if ($request->status === "9") {
                $datas->where('status', 9);
            } else{
                $datas->whereIn('status', $request->status?[$request->status]:[13,10,9]); 
            }
            $search = $request->search['value'];
            if ($search) {
                $datas->where('id', 'like', '%'.$search.'%');
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new BacklogCollection($datas));
        }
       // return view('admin.backlog.list');
    }





    

    public function UserImage(Request $request,$id)
    {

       if ($request->ajax()) {
            $datas = Backlog::where('user_id',$id)->orderBy('created_at','desc')->select(['id','user_id','admin_id','status','image','created_at','icon'])
            ->with(['user'=>function($query){
                $query->select('id','name','email');
            }])
            ->with(['editor'=>function($query){
                $query->select('id','name');
            }])
            ->with(['keep'=>function($query){
                $query->select(['id','user_id','admin_id','status','image','print','shipped','created_at','icon','backlog_id']);
            }])
            ->with('statusname');

            if ($request->status === "9") {
                $datas->where('status', 9);
            } else{
                $datas->whereIn('status', $request->status?[$request->status]:[13,10,9]); 
            }
            $search = $request->search['value'];
            if ($search) {
                $datas->where('id', 'like', '%'.$search.'%');
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new BacklogCollection($datas));
        }
       // return view('admin.backlog.list');
    }

       

    public function edit($user,$id)
    {
        //$user = User::find($user);
        $backlog = Backlog::where(['id'=>$id,'user_id'=>$user])->select('id','user_id','image')
        ->with(['user'=>function($query){
            $query->select('id','name','email');
        }])->first();
         $keep = Keep::where(['backlog_id'=>$id,'user_id'=>$user])->select('id','user_id','image')
        ->with(['user'=>function($query){
            $query->select('id','name','email');
        }])->first();
        return view('admin.user.backlog.edit',compact('backlog','user','keep'));
    }
    public function download(Request $request, $id){
        $image = Backlog::where('id',$id)->value('image');
        preg_match("/[^\/]+$/", $image, $filename);
        $filename = $filename[0];
        $url_to_image = $image;
        $my_save_dir = 'images/';
        $filename = basename($url_to_image);
        $complete_save_loc = $my_save_dir.$filename;
        file_put_contents($complete_save_loc,file_get_contents($url_to_image));
        $filepath = public_path('images/').$filename;
        //dd($filepath);
        return response()->download($filepath);
    }
    


    public function update(Request $request, $id){
        //dd($id);
        $user = User::find($request->user_id);
        $this->validate($request,[
            'image_keep' => 'required|nullable|image|mimes:jpeg,png,jpg|max:4000',
        ]);
       $keep = Keep::firstOrNew(['user_id'=>$request->user_id,'backlog_id'=>$id]);
        if($request->hasFile('image_keep')){
            $image_name = $request->user_id."_".time().".".$request->file('image_keep')->getClientOriginalExtension();
            $image = $request->file('image_keep')->storeAs('user/keep', $image_name);
            $keep->image = 'storage/'.$image;

            $keep->status = 10;

            $iconimage = $request->file('image_keep');
            $image_resize = Image::make($iconimage->getRealPath());              
            $image_resize->resize(60, 60);
            $image_resize->save(public_path('storage/user/icon/' .$image_name));
            $keep->icon = 'storage/user/icon/'.$image_name;

        } 
 
        if($keep->save()){     
            return redirect()->back()->with(['class'=>'success','message'=>'Processed Image Updated.']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }
   


    public function destroy($id)
    {
        if(Backlog::where('id',$id)->delete()){
         return response()->json(['message'=>ucfirst(str_singular(request()->segment(2))).' Successfully Deleted', 'class'=>'success']); 
        }
        return back()->with(array('message' => 'Something Wrong', 'class' => 'error')); 
    }

    public function assignEditor(Request $request)
    {
        $this->validate($request,[
            'backlog_id' => 'required',
            'editor_id' => 'required',
        ],[

            'editor_id.required'=>'Please select an editor',
            'backlog_id.required'=>'Please select at least one image'

        ]);

        foreach ($request->backlog_id as $backlogimg) {
            $backlog = Backlog::find($backlogimg);
            $backlog->admin_id = $request->editor_id;  
            $backlog->status = 13;  
            $backlog->save();  
        }
        

        return response()->json(['message'=>ucfirst(str_singular(request()->segment(2))).' Successfully Assign', 'class'=>'success']);
    }

    public function changeStatus(Request $request){
        if ($request->status == 6 || $request->status == 14){
    
            if(Keep::whereIn('backlog_id',((is_array($request->id))?$request->id:[$request->id]))->update(['status'=>$request->status])){


                if ($request->status == 6 ){
                $siteSetting = SiteSetting::latest()->first();
                $keep = Keep::where('backlog_id',$request->id)->select('image','icon','user_id')->first();
                
              
            $registrationIds = DeviceToken::select(['device','token'])->where('user_id',$keep->user_id)->get()->groupBy('device');
        

        // dd($registrationIds);

        foreach ($registrationIds as $key => $value) {
            if ($key === 'android') {              
               $ch = curl_init();
                curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                curl_setopt( $ch,CURLOPT_POST, true );
                curl_setopt( $ch,CURLOPT_HTTPHEADER, ['Authorization: key=AAAAU9ubhJY:APA91bFwFlks-b3yhVXThEq4BzmvGu27GQwoV1vksi635aNq2o194Vlr3cr-TgtD63yxDRuZKqsKo-Xy2cWypleB3-VNmSZXfrhGPeQHdaAbynUkYlOWFyXZonpwN5lkWuSuEiYDAOD4' ,
                  'Content-Type: application/json']);
                curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                foreach ($value->pluck('token')->chunk(900)->toArray() as $androidTokenKey => $androidToken) {
                    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( [
                        "registration_ids"=>$androidToken,
                        "data" => [
                            'body'  =>  $siteSetting->notification_title,
                            "title"=> $siteSetting->notification_content,
                            'largeIcon' => $keep->image,
                        ],
                    ]));
                    $res = curl_exec($ch);
                    curl_close($ch);                
                }
            }
          if ($key === 'ios') {
                $iosFcm = new \GuzzleHttp\Client(['headers'=>[
                    'Authorization'=>'key=AAAAU9ubhJY:APA91bFwFlks-b3yhVXThEq4BzmvGu27GQwoV1vksi635aNq2o194Vlr3cr-TgtD63yxDRuZKqsKo-Xy2cWypleB3-VNmSZXfrhGPeQHdaAbynUkYlOWFyXZonpwN5lkWuSuEiYDAOD4' ,
                ]]);

                foreach ($value->pluck('token')->chunk(900)->toArray() as $iosTokenKey => $iosToken) {
                    $iosFcm->post('https://fcm.googleapis.com/fcm/send',[
                        'json'=>[
                            'registration_ids' => $iosToken,
                            'priority' => 10,
                            'mutable_content' =>true,
                            "content_available"=> true,
                            "notification"=>[
                                'title' => $siteSetting->notification_title, 
                                'body' => $siteSetting->notification_content,                                
                                'sound'=>'Default',
                            ],

                            'data' => [
                                'largeIcon'=>$keep->image,
                            ]
                        ]
                    ]);
                }
            }
           
        }

                
            }


                return response()->json(['message'=>'Image Status Changed', 'class'=>'success']); 
            } 

            
        }
    }




    public function printStatus(Request $request){
        //return $request->all();
        if($request->status == '1' || $request->status == 1){
            if(Keep::whereIn('backlog_id',((is_array($request->id))?$request->id:[$request->id]))->update(['print'=>$request->status])){
                return response()->json(['message'=>'Print Status Changed', 'class'=>'success']); 
            } else{
                return response()->json(['message'=>'Something Went Wrong! Try After Sometime.', 'class'=>'error']); 
            }
        }

        if($request->status == '0' || $request->status == 0){
            if(Keep::whereIn('backlog_id',((is_array($request->id))?$request->id:[$request->id]))->update(['print'=>$request->status,'shipped'=>0])){
                return response()->json(['message'=>'Print Status Changed', 'class'=>'success']); 
            } else{
                return response()->json(['message'=>'Something Went Wrong! Try After Sometime.', 'class'=>'error']); 
            }
        }
    }

    public function shippedStatus(Request $request){
    
        if(Keep::whereIn('backlog_id',((is_array($request->id))?$request->id:[$request->id]))->update(['shipped'=>$request->status])){
            return response()->json(['message'=>'Shipping Status Changed', 'class'=>'success']); 
        } else{
            return response()->json(['message'=>'Something Went Wrong! Try After Sometime.', 'class'=>'error']); 
        } 
    }



}
