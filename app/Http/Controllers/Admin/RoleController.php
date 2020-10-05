<?php

namespace App\Http\Controllers\Admin;

use App\Model\Role;
use App\Model\Permission;
use App\Model\RolePermission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::whereNotIn('id',[1])->get();
        return view('admin.role.list',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.role.create');
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
            'name'=>'required|unique:roles,name',
        ]);
        $role = new Role;
        $role->name = $request->name;
        if($role->save()){

            return redirect()->back()->with(['status'=>'success','message'=>'Role Created Successfully..']);
        }
        return redirect()->back()->with(['status'=>'error','message'=>'Error in role creating... ']);
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Role $role)
    {
        $permissions = Permission::has('menu')->get()->groupBy('menu_slug');
        $permissions = Permission::selectRaw('permissions.menu_slug, permissions.permission_key , IF(role_permissions.role_id, true, false) as checked')
        ->leftJoin('role_permissions', function($join)use($role){
            $join->on('role_permissions.permission_key','=','permissions.permission_key')
            ->where('role_permissions.role_id','=',"$role->id");
        })
        ->get()->groupBy('menu_slug');
        return view('admin.role.edit',compact('role','permissions'));
    }

    public function update(Request $request,Role $role)
    {
        $role->name = $request->name;
        if ($role->save()) {
            $requestPermissions = (collect($request->permissions));
            $permissions = RolePermission::where('role_id',$role->id)->pluck('permission_key')->diff($requestPermissions);
            $requestPermissions = $requestPermissions->map(function($data)use($role){return "('$role->id','$data')";})->implode(',');

            if ($permissions->count()) {
                RolePermission::where(['role_id'=>$role->id])->whereIn('permission_key',$permissions)->delete();
            }
            if ($requestPermissions) {
                DB::insert("INSERT INTO role_permissions (role_id,permission_key) VALUES $requestPermissions ON DUPLICATE KEY UPDATE permission_key =  VALUES(permission_key)");
            }
           return redirect()->back()->with(['message'=>'Role Permission Update successfully','notification'=>true]);
        }

        
        return redirect()->back()->with(['status'=>'success','message'=>'Permission alined success']);
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}
