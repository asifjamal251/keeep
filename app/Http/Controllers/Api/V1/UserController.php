<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Keep\KeepCollection;
use App\Http\Resources\Api\Keep\KeepResource;
use App\Http\Resources\Api\UserResource;
use App\Model\Backlog;
use App\Model\ContactUs;
use App\Model\Keep;
use App\Model\UserWallet;
use App\Model\SiteSetting;
use App\Model\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Stripe;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
{

    public function dashboard(Request $request)
    {
        $data = new DashboardResource($dashboard);
        if($data){
          return response()->json(['error'=>false, 'message'=>'Record Found', 'data'=>$data]);
      }
      return response()->json(['error'=>true, 'message'=>'No Record Found']);

  }


  public function backlog(Request $request){

     $this->validate($request,[
        'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
    ]);

     $backlog = new Backlog;

     if($request->hasFile('image')){
        $image_name = $request->user()->id."_".time().".".$request->file('image')->getClientOriginalExtension();
        $image = $request->file('image')->storeAs('user/backlog', $image_name);
        $backlog->image = 'storage/'.$image;
        $backlog->user_id = $request->user()->id;

        $iconimage       = $request->file('image');
        $image_resize = Image::make($iconimage->getRealPath());              
        $image_resize->resize(60, 60);
        $image_resize->save(public_path('storage/user/icon/' .$image_name));
        $backlog->icon = 'storage/user/icon/'.$image_name;
    } 
    if($backlog->save()){
        return response()->json(['error'=>false, 'message'=>'Your Image Uploaded', 'data'=>'']);
    }
    return response()->json(['error'=>true, 'messagde'=>'Something Went Wrong', 'data'=>'']);
}




public function backlogSync(Request $request){

    $this->validate($request,[
        'image' => 'required',
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000'
    ]);

    if($request->file('image')){
        $count = 1;
        foreach($request->file('image') as $key=>$imagearr){
            $backlog = new Backlog;

            $image_name = $request->user()->id."_" . $count."_".time().".".$imagearr->getClientOriginalExtension();

            $iconimage = $imagearr;
            $image_resize = Image::make($iconimage->getRealPath());              
            $image_resize->resize(60, 60);
            $image_resize->save(public_path('storage/user/icon/' .$image_name));
            $backlog->icon = 'storage/user/icon/'.$image_name;



            $backlog->user_id = $request->user()->id;

            $imagearr->move(public_path().'/storage/user/backlog/', $image_name); 
            $backlog->image= "storage/user/backlog/".$image_name;
            $backlog->save();
            $count++;
            
        } 
        if ($count > 1) {
            return response()->json(['error'=>false, 'message'=>'Your Image Uploaded', 'data'=>'']);
        } else{
            return response()->json(['error'=>true, 'messagde'=>'Something Went Wrong', 'data'=>'']);
        }

    }
    return response()->json(['error'=>true, 'messagde'=>'Something Went Wrong', 'data'=>'']);

}





public function gallery(Request $request){
       // return $request->user()->id;
    $data = Keep::orderBy('created_at','desc')->where(['user_id'=>$request->user()->id,'status'=>6])
    ->select('id','user_id','image')
    ->paginate(10);
    if ($data->count()) {            
        $data = KeepResource::collection($data);
        return response()->json(['error'=>false,'message'=>'Record Found',
            'data'=>$data,
            'paginate'=>[
                'total' => $data->total(),
                'count' => $data->count(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'total_pages' => $data->lastPage()
            ]
        ]);
    }
    return response()->json(['error'=>true,'message'=>'Record Not Found','data'=>[]]);

}

public function keep(Request $request){

    $data = Keep::orderBy('created_at','desc')->where(['user_id'=>$request->user()->id,'status'=>7])
    ->select('id','user_id','image')
    ->paginate(10);
    if ($data->count()) {            
        $data = KeepResource::collection($data);
        return response()->json(['error'=>false,'message'=>'Record Found',
            'data'=>$data,
            'paginate'=>[
                'total' => $data->total(),
                'count' => $data->count(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'total_pages' => $data->lastPage()
            ]
        ]);
    }
    return response()->json(['error'=>true,'message'=>'Record Not Found','data'=>[]]);

}

public function keepSaveOrDelete(Request $request)
{
   $user = User::find($request->user()->id);
   //$balanc = UserWallet::where('user_id', $user->id)->first();
   $price = SiteSetting::select('product_price')->value('product_price');

   $this->validate($request,[
        'id' =>  'required',
        'action' =>  'required',
    ]);
   if ($request->action == 1) {
    if($user->stripe_customer_id != '' ||  $user->stripe_customer_id != null){

        $transaction = new Transaction;
        $transaction->user_id = $request->user()->id;
        $transaction->transaction_type_id = 1;
        $transaction->amount = $price;
        $transaction->status = 2;
        $transaction->activity_by = 'Keep an image';
        $transaction->save();

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = \Stripe\Charge::create([
            'amount' => $price * 100, // $15.00 this time
            'currency' => 'usd',
            'customer' => $user->stripe_customer_id
        ]);

        if($charge->status == 'succeeded'){
        if(Keep::where(['user_id'=>$request->user()->id,'id'=>$request->id])->update(['status'=>7,'transaction_id'=>$transaction->id])){
       
            Transaction::where('id', $transaction->id)->update(['status'=>1]);
            $siteDetails = SiteSetting::latest()->first();  
            $file = Keep::where(['user_id'=>$request->user()->id,'id'=>$request->id])->first();

            $data = [
                'name'=>$user->name,
                'email'=>$user->email,
                'status'=>"Keep By User",
            ];

            Mail::send('emails.admin.image-status', $data, function($message) use($request,$siteDetails,$file){
                $message->to($siteDetails->email, $siteDetails->site_title)->subject('Keep By User');
                $message->attach(asset($file->image));
                $message->from('testing@sanix.in','Keep App Image Status');
            });

            return response()->json(['error'=>false,'message'=>'Image Successfully Keep','data'=>$data]);
        }

        } else{
        return response()->json(['error'=>false,'message'=>'unsuccess payment','data'=>[]]);
    }
        

    } else{
        return response()->json(['error'=>true,'message'=>'Card is not integrated','data'=>[]]);
    }

} elseif ($request->action == 2) {

    if(Keep::where(['user_id'=>$request->user()->id,'id'=>$request->id])->update(['status'=>8])){

        $siteDetails = SiteSetting::latest()->first();  
        $file = Keep::where(['user_id'=>$request->user()->id,'id'=>$request->id])->first();

        $data = [
            'name'=>$user->name,
            'email'=>$user->email,
            'status'=>'Deleted By User',
        ];

        Mail::send('emails.admin.image-status', $data, function($message) use($request,$siteDetails,$file){
            $message->to($siteDetails->email, $siteDetails->site_title)->subject('Deleted By User');
            $message->attach(asset($file->image));
            $message->from('testing@sanix.in','Keep App Image Status');
        });

        return response()->json(['error'=>false,'message'=>'Image Deleted','data'=>[]]);
    }

} else{
    return response()->json(['error'=>true,'message'=>'No Action Performed','data'=>[]]);
} 

return response()->json(['error'=>true,'message'=>'Record Not Found','data'=>[]]);

}




public function firstPayment(Request $request)
{
 
    $this->validate($request,[
        'id' =>  'required',
        'action' =>  'required',
        'stripe_token' =>  'required',
    ]);
    $user = User::find($request->user()->id);
    $price = SiteSetting::select('product_price')->value('product_price');

     if ($request->action == 1) {
    if($user->stripe_customer_id == '' ||  $user->stripe_customer_id == null){

        $transaction = new Transaction;
        $transaction->user_id = $request->user()->id;
        $transaction->transaction_type_id = 1;
        $transaction->amount = $price;
        $transaction->status = 2;
        $transaction->activity_by = 'Keep an image';
        $transaction->save();


        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        

        $customer = \Stripe\Customer::create([
            'email' => $user->email,
            'source' => $request->stripe_token,
        ]);


        $charge = Stripe\Charge::create ([
            "amount" => $price * 100,
            "currency" => "usd",
            'customer' => $customer->id,
            "description" => "First Payment" 
        ]);

        $user->stripe_customer_id = $customer->id;
        $user->save();

        if($charge->status == 'succeeded'){

        if(Keep::where(['user_id'=>$request->user()->id,'id'=>$request->id])->update(['status'=>7,'transaction_id'=>$transaction->id])){
       


            Transaction::where('id', $transaction->id)->update(['status'=>1]);

            $siteDetails = SiteSetting::latest()->first();  
            $file = Keep::where(['user_id'=>$request->user()->id,'id'=>$request->id])->first();

            $data = [
                'name'=>$user->name,
                'email'=>$user->email,
                'status'=>"Keep By User",
            ];

            Mail::send('emails.admin.image-status', $data, function($message) use($request,$siteDetails,$file){
                $message->to($siteDetails->email, $siteDetails->site_title)->subject('Keep By User');
                $message->attach(asset($file->image));
                $message->from('testing@sanix.in','Keep App Image Status');
            });

            return response()->json(['error'=>false,'message'=>'Image Successfully Keep','data'=>$data]);
        }


    } else{
        return response()->json(['error'=>false,'message'=>'unsuccess payment','data'=>[]]);
    }
        

    } else{
        return response()->json(['error'=>false,'message'=>'Card is not integrated','data'=>[]]);
    }

}
}

public function details(Request $request){
    $details = User::select('id','name','email','mobile','avatar','created_at')->where('id',$request->user()->id)->first();
    return response()->json(['error'=>false,'message'=>'Record found','data'=>new UserResource($details)]);
}


public function updateDetails(Request $request){

        //return $request->all();
    $this->validate($request,[
        'name' =>  'required|string|max:255|regex:/^[a-zA-Z ]+$/u',
        'mobile'=> 'required|numeric|digits:10',
            //'email' => 'required|string|email|max:255|unique:users',
        'avatar' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    $user = User::find($request->user()->id);

    if($request->hasFile('avatar')){
        $image_name = $request->user()->id."_".time().".".$request->file('avatar')->getClientOriginalExtension();
        $image = $request->file('avatar')->storeAs('user/profile', $image_name);
        $user->avatar = 'storage/'.$image;
    }
       // $user->email = $request->email;
    $user->name = $request->name;
    $user->mobile = $request->mobile;


    if($user->save()){

        $users = [
            "id"=>$user->id??'',
            "name"=> $user->name??'',
            "email"=> $user->email??'',
            "mobile"=> $user->mobile??'',
            "email_verified_at"=> $user->email_verified_at??'',
            "status"=> $user->status??'',
            "avatar"=> $user->avatar?asset($user->avatar):'',
            "device_id"=>$user->device_id??'',
            "created_at"=>$user->created_at->format('d M Y'),
            "updated_at"=> $user->updated_at->format('d M Y')
        ];

        return response()->json(['error'=>false,'message'=>'Profile Updated Successfully','data'=>$users]);
    }

    return response()->json(['error'=>true,'message'=>'Your Profile not Changed']);
}



public function changePassword(Request $request){
    $this->validate($request,[
        'old_password'=>'required',
        'password' => 'required|confirmed|min:6'
    ]);

    if (!Hash::check($request->old_password, $request->user()->password)) {
        return response()->json(['error'=>true, 'message'=>'Incorrect old Password']);
    }

    $user = $request->user();
    $user->password = bcrypt($request->password);
    if($user->save()){
        return response()->json(['error'=>false,'message'=>'Password has been changed']);
    }
    return response()->json(['error'=>true, 'message'=>'Error In change Password']);
}


public function contactUs(Request $request)
{
    $this->validate($request,[
        'subject'=>'required|max:250',
        'message' => 'required|max:600'
    ]);
    $user = $request->user();
    $contact = new ContactUs;
    $contact->user_id = $user->id;
    $contact->subject = $request->subject;
    $contact->message = $request->message;
    if ($contact->save()) {

        $siteDetails = SiteSetting::latest()->first();

        if($siteDetails){

            $data = [
                'name'=>$user->name,
                'email'=>$user->email,
                'subject'=>$request->subject,
                'body'=>$request->message
            ];

            Mail::send('emails.admin.contact-us', $data, function($message) use($request,$siteDetails){
                $message->to($siteDetails->email, $siteDetails->site_title)->subject($request->subject);
                $message->from('testing@sanix.in','Keep Help');
            });

            return response()->json(['error'=>false,'message'=>'Thank you for contact us.']);

        }

        return response()->json(['error'=>false,'message'=>'Thank you for contact us.']);
    }
    return response()->json(['error'=>true, 'message'=>'Error In change Password']);
}








    public function addCard(Request $request)
    {
        $user = $request->user();
        $this->validate($request, [
            'stripsource'=>'required',
        ]);

        $transaction = new Transaction;
        $transaction->user_id = $request->user()->id;
        $transaction->transaction_type_id = 2;
        $transaction->amount = $request->amount;
        $transaction->status = 1;
        $transaction->activity_by = 'First Time Added Card';
        $price = SiteSetting::select('product_price')->value('product_price');

        if($transaction->save()){

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            // $stripResponse = Stripe\Charge::create ([
            //         "amount" => $request->amount * 100,
            //         "currency" => "usd",
            //         "source" => $request->stripsource,
            //         "description" => "Balance added to wallet by " . $request->user()->name 
            // ]);

            $customer = \Stripe\Customer::create([
              'email' => $user->email,
              'source' => $request->stripsource,
            ]);

            $stripResponse = \Stripe\Charge::create([
                'amount' => $price * 100,
                'currency' => 'usd',
                'customer' => $customer->id,
                'description' => "integrate card " . $request->user()->name 
            ]);

            $transaction = Transaction::find($transaction->id);
            if ($stripResponse->status == 'succeeded') {

                $user->stripe_customer_id = $stripResponse->customer;
                $user->save();

                $transaction->response_status = $stripResponse->status;
                $transaction->status = 1;
                $transaction->transaction_id = $stripResponse->id;
                $transaction->save();

                $siteDetails = SiteSetting::latest()->first();  
                $file = Keep::where(['user_id'=>$request->user()->id,'id'=>$request->id])->first();

                $data = [
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'status'=>"Keep By User",
                ];

                Mail::send('emails.admin.image-status', $data, function($message) use($request,$siteDetails,$file){
                    $message->to($siteDetails->email, $siteDetails->site_title)->subject('Keep By User');
                    $message->attach(asset($file->image));
                    $message->from('testing@sanix.in','Keep App Image Status');
                });


                $card = new TransactionCardDetail;
                $card->user_id = $request->user()->id;
                $card->transaction_id = $transaction->id;
                $card->card_brand = $stripResponse->source->card->brand;
                $card->card_last4_digit = $stripResponse->source->card->last4;
                $card->name_on_card = $stripResponse->source->card->name;
                $card->country = $stripResponse->source->card->country;
                $card->save();
                
                return response()->json(['error'=>false, 'message'=>'Added to your wallet successfully', 'data'=>'']);
                
                
            }
            else{
                $transaction->response_status = $stripResponse->status;
                $transaction->status = 4;
                $transaction->response_failure_message = $stripResponse->failure_message;
                $transaction->save();
                return response()->json(['error'=>true, 'message'=>'Failed', 'data'=>'']);

            }

            return response()->json(['error'=>true, 'message'=>'Oops! Something went wrong!']);
            
        }


        
    }


}
