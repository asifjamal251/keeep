<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Image\ImageCollection;
use App\Model\Backlog;
use App\Model\Keep;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
class UserImageController extends Controller
{
    
    public function index(Request $request)
    {

       return view('admin.user-image.list');
    }


    public function edit($id)
    {
        //return "ok";
        //$user = User::find($user);
        $backlog = Backlog::where(['id'=>$id])->select('id','user_id','image')
        ->with(['user'=>function($query){
            $query->select('id','name','email');
        }])->first();
         $keep = Keep::where(['backlog_id'=>$id])->select('id','user_id','image')
        ->with(['user'=>function($query){
            $query->select('id','name','email');
        }])->first();
        return view('admin.user-image.edit',compact('backlog','keep'));
    }
       
    
}
