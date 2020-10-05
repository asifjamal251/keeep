<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{

	use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function posts()
    {
    	return $this->belongsToMany('App\Model\Post','post_tags')->orderBy('created_at','DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
