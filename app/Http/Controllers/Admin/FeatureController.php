<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Feature\FeatureCollection;
use App\Model\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    
    public function index(Request $request)
    {
       if ($request->ajax()) {
            $datas = Feature::orderBy('created_at','desc')->select(['id','title','slug','status','image','created_at']);
            $search = $request->search['value'];

            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
                $datas->orWhere('slug', 'like', '%'.$search.'%');
              
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new FeatureCollection($datas));
        }
        return view('admin.feature.list');
    }

   
    public function create()
    {
        return view('admin.feature.create');
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
        $Feature = new Feature;
        $Feature->title = $request->title;
        $Feature->subtitle = $request->subtitle;
        $Feature->body = $request->body;
        $Feature->status = $request->status??0;
        //return $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image')->store('Features/');
            $Feature->image =bucketUrl($image);
        }  

        if($Feature->save()){ 
            $Feature->categories()->sync($request->categories);
            return redirect()->route('admin.feature.index')->with(['class'=>'success','message'=>'Feature Created successfully.']);
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
        $Feature = Feature::with('categories')->where('id',$id)->first();
        return view('admin.feature.edit',compact('Feature'));
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
        $Feature = Feature::find($id);
        $Feature->title = $request->title;
        $Feature->subtitle = $request->subtitle??0;
        $Feature->body = $request->body;
        $Feature->status = $request->status;
        //return $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image')->store('Features/');
            $Feature->image =bucketUrl($image);
        }  

        if($Feature->save()){ 
            $Feature->categories()->sync($request->categories);
            return redirect()->route('admin.feature.index')->with(['class'=>'success','message'=>'Feature Created successfully.']);
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
        if(Feature::where('id',$id)->delete()){
         return response()->json(['message'=>ucfirst(str_singular(request()->segment(2))).' Successfully Deleted', 'class'=>'success']); 
        }
        return back()->with(array('message' => 'Something Wrong', 'class' => 'error')); 
    }
}
