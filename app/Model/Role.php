<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    public function hasAccess(string $permission) :bool
    {
        if ($this->hasPermission($permission)){
            return true;
        }
        return false;
    }
    private function hasPermission(string $permission) 
    {
        return $this->hasOne(RolePermission::class)->where('permission_key',$permission)->exists();
    }
    public function permissions(){
        return $this->hasOne(RolePermission::class);
    }
}
