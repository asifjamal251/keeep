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
class ImageController extends Controller
{
    
    public function index(Request $request)
    {


       if ($request->ajax()) {
            $datas = Backlog::where('admin_id',auth('admin')->user()->id)->orderBy('created_at','desc')->select(['id','user_id','admin_id','status','image','created_at','icon'])
            ->with(['user'=>function($query){
                $query->select('id','name');
            }])
            ->with(['editor'=>function($query){
                $query->select('id','name');
            }])
            ->with(['keep'=>function($query){
                $query->select(['id','user_id','admin_id','status','image','created_at','icon','backlog_id']);
            }]);

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
            return response()->json(new ImageCollection($datas));
        }
       return view('admin.image.list');
    }


    public function edit($id)
    {
        //$user = User::find($user);
        $backlog = Backlog::where(['id'=>$id])->select('id','user_id','image')
        ->with(['user'=>function($query){
            $query->select('id','name','email');
        }])->first();
         $keep = Keep::where(['backlog_id'=>$id])->select('id','user_id','image')
        ->with(['user'=>function($query){
            $query->select('id','name','email');
        }])->first();
        return view('admin.image.edit',compact('backlog','keep'));
    }
       
    
}
