<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id','keep_id','qty'];


    public function keep(){
    	return $this->belongsTo(Keep::class);
    }

}
