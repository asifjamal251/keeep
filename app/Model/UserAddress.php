<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = ['id','user_id','status'];

    //protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

  


}
