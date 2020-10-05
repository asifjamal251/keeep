<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TransactionCardDetail extends Model
{
    protected $fillable = ['transaction_id','user_id','created_at','updated_at'];

    public function User(){
		return $this->belongsTo('App\User','user_id','id');
	}
	
	
}
