<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\UserAddress;
use App\Http\Resources\Api\AddressResource;

class AddressController extends Controller
{

	public function getAll(Request $request){
		$data = UserAddress::where('user_id', $request->user()->id)->get();
		if(count($data)){
			$data = AddressResource::collection($data);	

			return response()->json(['error'=>false, 'message'=>'Address List!', 'data'=>$data]);
		}else{
			return response()->json(['error'=>true, 'message'=>'No Record Found', 'data'=>$data]);
		}
	}
    

    public function add(Request $request){
    	$this->validate($request, [
    		'name'=>'required',
    		'mobile'=>'required',
    		'address'=>'required',
    		'state'=>'required',
    		'city'=>'required',
            'email'=>'required',
    		'pin_code'=>'required',
    	]);

    	$data = new UserAddress();
    	$data->user_id = $request->user()->id;
    	$data->name = $request->name;
    	$data->mobile = $request->mobile;
    	$data->email = $request->email;
    	$data->address = $request->address;
    	$data->state = $request->state;
    	$data->city = $request->city;
    	$data->pin_code = $request->pin_code;
    	$data->status = 1;
    	if($data->save()){
    		return response()->json(['error'=>false, 'message'=>'Your address has been saved!', 'data'=>$data]);
    	}
    	return response()->json(['error'=>true, 'message'=>'Oops! Something went wrong!']);
    }

    public function update(Request $request){
    	$this->validate($request, [
    		'id'=>'required',
    		'name'=>'required',
            'mobile'=>'required',
            'address'=>'required',
            'state'=>'required',
            'city'=>'required',
            'email'=>'required',
            'pin_code'=>'required|digits:6',
    	]);

    	$data = UserAddress::find($request->id);

    	if($data){
	    	$data->name = $request->name;
	    	$data->mobile = $request->mobile;
	    	$data->email = $request->email;
	    	$data->address = $request->address;
	    	$data->country = 101;
	    	$data->state = $request->state;
	    	$data->city = $request->city;
	    	$data->pin_code = $request->pin_code;
	    	$data->status = 1;
	    	if($data->save()){
	    		return response()->json(['error'=>false, 'message'=>'Address updated!', 'data'=>$data]);
	    	}
	    	return response()->json(['error'=>true, 'message'=>'Oops, Something went wrong!']);
    	}
    	return response()->json(['error'=>true, 'message'=>'Address not Found']);
    }
    public function detail(Request $request){
        $this->validate($request,[
            'address_id'=>'required'
        ]);
        $data = UserAddress::find($request->address_id);
        if ($data) {
            return response()->json(['error'=>false, 'message'=>'Address found','data'=> new AddressResource($data)]);
        }
        return response()->json(['error'=>true, 'message'=>'Oops, Something went wrong!']);
    }
    public function delete(Request $request){
        $this->validate($request,[
            'address_id'=>'required'
        ]);
        if (UserAddress::destroy($request->address_id)) {
            return response()->json(['error'=>false, 'message'=>'Address Deleted']);
        }
        return response()->json(['error'=>true, 'message'=>'Oops, Something went wrong!']);
    }
}
