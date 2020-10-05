<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Web\PostResource;
use App\Model\Post;
use App\Model\Backlog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    public function Posts(Request $request){

        //return $request->all();
        $posts = Post::select('id','title','slug','subtitle','body','image')->paginate(1);
        if ($posts->count()) {
            return response()->json([
                'posts'=>PostResource::collection($posts),
                'paginate'=>[
                    'total' => $posts->total(),
                    'count' => $posts->count(),
                    'per_page' => $posts->perPage(),
                    'current_page' => $posts->currentPage(),
                    'total_pages' => $posts->lastPage()
                ]
            ]);
        } 
        return response()->json(array('message'=>'Record Not Found','posts'=>[],'page_image'=>'','paginate'=>[]));
    }

    public function singlePost(Request $request, post $post){
           return response()->json(['post'=>$post]);
   }

   public function backlogSyncForm(Request $request)
   {
      return view('web.sync');
   }



   public function backlogSync(Request $request){

    //dd($request->all());


    //return $request->all();
    $this->validate($request,[
       // 'image' => 'required|image|mimes:jpeg,png,jpg',
        'image' => 'required',
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);

    if($request->file('image')){
        $count = 1;
        foreach($request->file('image') as $key=>$imagearr){
            $backlog = new Backlog;

            $image_name = $count."_".$imagearr->getClientOriginalExtension();
            $image = $imagearr->move(public_path('/storage/user/backlog/' .$image_name));
            $backlog->image = 'storage/'.$image;
            $backlog->user_id = $request->user()->id;

            $iconimage       = $imagearr;
            $image_resize = Image::make($iconimage->getRealPath());              
            $image_resize->resize(60, 60);
            $image_resize->move(public_path('storage/user/icon/' .$image_name));
            $backlog->icon = 'storage/user/icon/'.$image_name;

            $backlog->save();
            $count++;
            //return "ok";
        } 
                              
    }
    return "no";

}



public function create()
    {
        //
        return view('web.create');
    }



  public function store(Request $request)

    {
 dd($request->all());
        $this->validate($request, [

                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        
        if($request->hasfile('filename'))
         {
$user = 1;
$count = 1;
            foreach($request->file('filename') as $image)
            {
                 $form= new Backlog;

                $name=$image->getClientOriginalName();

                $name = $user . "_" . $count . "_".time().".".$image->getClientOriginalExtension();


                $iconimage       = $image;
        $image_resize = Image::make($iconimage->getRealPath());              
        $image_resize->resize(60, 60);
        $image_resize->save(public_path('storage/user/icon/' .$name));
        $form->icon = 'storage/user/icon/'.$name;



                $image->move(public_path().'/storage/user/backlog/', $name); 

                $data[] = $name; 
               
                $form->image= "storage/user/backlog/".$name;
                $form->user_id = 1; 

            


                 $form->save();
                 $count++;
            }
         }

         // $form= new Backlog;
         // $form->image=json_encode($data);
         // $form->user_id = 1;
         
        
        //$form->save();

        return back()->with('success', 'Your images has been successfully');



    }






}
