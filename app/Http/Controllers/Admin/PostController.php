<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Post\PostCollection;
use App\Model\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(Request $request)
    {
       if ($request->ajax()) {
            $datas = Post::orderBy('created_at','desc')->select(['id','title','slug','status','image','created_at']);
            $search = $request->search['value'];

            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
                $datas->orWhere('slug', 'like', '%'.$search.'%');
              
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new PostCollection($datas));
        }
        return view('admin.post.list');
    }

   
    public function create()
    {
        return view('admin.post.create');
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
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',
        ]);

        return $request->all();
        $post = new Post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->body = $request->body;
        $post->status = $request->status??0;
        //return $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image')->store('posts/');
            $post->image =bucketUrl($image);
        }  

        if($post->save()){ 
            $post->categories()->sync($request->categories);
            return redirect()->route('admin.post.index')->with(['class'=>'success','message'=>'Post Created successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
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
        $post = Post::with('categories')->where('id',$id)->first();
        return view('admin.post.edit',compact('post'));
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
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',
        ]);

        //return $request->all();
        $post = Post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle??0;
        $post->body = $request->body;
        $post->status = $request->status;
        //return $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image')->store('posts/');
            $post->image =bucketUrl($image);
        }  

        if($post->save()){ 
            $post->categories()->sync($request->categories);
            return redirect()->route('admin.post.index')->with(['class'=>'success','message'=>'Post Created successfully.']);
        }

        return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Post::where('id',$id)->delete()){
         return response()->json(['message'=>ucfirst(str_singular(request()->segment(2))).' Successfully Deleted', 'class'=>'success']); 
        }
        return back()->with(array('message' => 'Something Wrong', 'class' => 'error')); 
    }
}
