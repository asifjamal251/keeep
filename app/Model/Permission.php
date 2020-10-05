<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;
    protected $fillable = ['key'];

    public function menu(){
       return $this->belongsTo('App\Model\Menu','menu_slug','slug');
    }
}
