<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keep extends Model

{

    use SoftDeletes;
     protected $fillable = [
        'id', 'image', 'icon','user_id','backlog_id'
    ];

    public function user(){
		return $this->belongsTo('App\User','user_id','id');
	}

	public function editor(){
		return $this->belongsTo('App\Admin','admin_id','id');
	}

	public function backlog(){
		return $this->belongsTo('App\Model\Backlog','backlog_id','id');
	}

}

