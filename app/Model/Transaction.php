<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transaction extends Model
{
	use SoftDeletes;
    protected $fillable = ['transaction_type_id','user_id', 'amount','transaction_charge', 'status','created_at','updated_at'];

    public function User(){
		return $this->belongsTo('App\User','user_id','id');
	}
	

	public function transactionType(){
		return $this->belongsTo('App\Model\TransactionType','transaction_type_id','id');
	}

	public function order(){
        return $this->belongsTo('App\Model\Order','id','transaction_id');
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function keep(){
        return $this->belongsTo('App\Model\Keep','id','transaction_id');
    }

    public function strip(){
        return $this->hasMany(TransactionCardDetail::class);
    }

    public function statusname(){
        return $this->hasOne(Status::class,'id','status');
    }
	
}
