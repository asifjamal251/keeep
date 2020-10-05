<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PushNotification;
use App\Model\Category;
use App\Model\DeviceToken;
use App\Http\Resources\Admin\Notification\NotificationCollection;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->expectsJson() && $request->Ajax()) {
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $coupons = PushNotification::paginate($request->length);
            return response()->json(new NotificationCollection($coupons));
        }
        return view('admin.notification.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notification.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'message'=>'required',
        ]);

        $image = $request->file('image')?$request->file('image')->store('image/notification'): null;
        $notification=new PushNotification;
        $notification->title=$request->title;
        $notification->message=$request->message;
        $notification->image=$image;
        $notification->save();

        if($request->devicelist){
            $registrationIds = DeviceToken::select(['device','token'])->whereIn('id',[$request->devicelist])->get()->pluck('token');
        }else{
            $registrationIds = DeviceToken::select(['device','token'])->get()->groupBy('device');
        }

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
                            'body'  => $request->message,
                            "title"=>$request->title,
                            'largeIcon' => $image?url($image):'',
                           
                            'category_id'=>$request->category,
                            // 'category_name'=>$cat_name->name,
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
                                'title' => $request->title, 
                                'body' => $request->message,                                
                                'sound'=>'Default',
                            ],

                            'data' => [
                                'largeIcon'=>$image?url($image):'',
                            ]
                        ]
                    ]);
                }
            }
           
        }
        return redirect()->route('admin.'.request()->segment(2).'.index')->with(['class'=>'success','message'=>'Notification send successfully.']);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(PushNotification::where('id',$id)->delete()){        
            return response()->json(['message'=>'Notification deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
