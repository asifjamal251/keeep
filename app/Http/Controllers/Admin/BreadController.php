<?php
namespace App\Http\Controllers\Admin;

use App\Model\Menu;
use App\Model\Permission;
use App\Model\RolePermission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$data = Menu::all();

       $menus = Menu::select('slug','name')->where('name','like','%'.$request->search.'%')->pluck('slug','name');
        return view('admin.bread.list',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bread.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name' => 'required|string'
        ]);
        
        $table = str_slug($request->name, '_');
        $slug = str_singular($table);

        $bread=Menu::firstOrNew(['slug'=>$slug]);
        $bread->name=$request->name;
        $bread->icon=$request->icon;
        if($bread->save()){
             return redirect()->route('admin.bread.edit',$bread->slug)->with(['message'=>'Successfully Created','class'=>'success','data'=>[$bread->slug]]);
        }
       
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$slug)
    {
        $menu = Menu::select('slug','name','icon')
        ->where('slug',$slug)->first();
        $permissions = DB::table('permissions')->where('menu_slug',$slug)->pluck('permission_key')->toArray();
        return view('admin.bread.edit',compact('menu','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        
        // dd($request->all());
        $bread=Menu::firstOrNew(['slug'=>$slug]);
        $bread->name=$request->name;
        $bread->icon=$request->icon;
        if($bread->save()){
            $requestPermissions = $request->permissions;
            // dd($requestPermissions);
            $permission = Permission::where('menu_slug',$slug)->pluck('permission_key');
            $permissions = collect($permission);
            $perm = $permissions->diff($requestPermissions);
            $requestPermissions = implode(',', array_map(function($data)use($slug){return "('$slug','$data')";}, $requestPermissions));
            if ($perm->count()) {
                Permission::where(['menu_slug'=>$slug])->whereIn('permission_key',$perm)->delete();
                RolePermission::whereIn('permission_key',$perm)->delete();
            }
            
            if ($requestPermissions) {
                DB::insert("INSERT INTO permissions (menu_slug,permission_key) VALUES $requestPermissions ON DUPLICATE KEY UPDATE permission_key =  VALUES(permission_key)");
            }
            return redirect()->back()->with(['message'=>'Successfully...','notification'=>true,'class'=>'success']);
        }
        return redirect()->back()->with(['message'=>'Something went wrong....','notification'=>true,'class'=>'error']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$slug)
    {
        
        if(Menu::where('slug',$slug)->exists()){
            $permission =  Permission::where('menu_slug',$slug)->pluck('permission_key');
            Menu::where('slug',$slug)->delete();
            if ($permission->count()) {
                RolePermission::where('permission_key',$permission)->delete();
                Permission::where('menu_slug',$slug)->delete();

            }
            return redirect()->back()->with(['message'=>'Bread Deleted successfully','class'=>'success']);
        }   
        return redirect()->back()->with(['message'=>'Menu not found','class'=>'error']);

        
    }

}
