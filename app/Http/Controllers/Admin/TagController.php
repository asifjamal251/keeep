<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Tag\TagCollection;
use App\Model\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function index(Request $request)
    {
       if ($request->ajax()) {
            $datas = Tag::orderBy('created_at','desc')->select(['id','name','slug','created_at']);
            $search = $request->search['value'];

            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
                $datas->orWhere('slug', 'like', '%'.$search.'%');
              
            }
            $request->request->add(['page'=>(($request->start+$request->length)/$request->length )]);
            $datas = $datas->paginate($request->length);
            return response()->json(new TagCollection($datas));
           
        }
        return view('admin.tag.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'name' => 'required',
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        if($tag->save()){ 
            return redirect()->route('admin.tag.index')->with(['class'=>'success','message'=>'Tag Created successfully.']);
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
        $category = category::where('id',$id)->first();
        return view('admin.category.edit',compact('category'));
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
            'name' => 'required',
            'slug' => 'required',
            ]);
        $category = category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id',$id)->delete();
        return redirect()->back();
    }
}
