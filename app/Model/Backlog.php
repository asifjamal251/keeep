<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Backlog extends Model

{

    use SoftDeletes;

    public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}

	public function editor(){
		return $this->belongsTo('App\Admin','admin_id','id');
	}

	public function keep(){
        return $this->hasOne('App\Model\Keep','backlog_id', 'id');
    }

    public function statusname(){
        return $this->belongsTo(Status::class,'status','id');
    }

}

