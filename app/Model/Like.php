<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function post()
    {
    	return $this->belongsTo('App\Model\user\post','like'); 
    }
}
