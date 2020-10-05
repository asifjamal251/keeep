<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
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
                'source' => 'title'
            ]
        ];
    }


    public function tags()
    {
    	return $this->belongsToMany('App\Model\Tag','post_tags')->withTimestamps();
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Model\Category','category_posts')->withTimestamps();;
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->diffForHumans();
    // }

    public function likes()
    {
        return $this->hasMany('App\Model\Like');
    }

    // public function getSlugAttribute($value)
    // {
    //     return route('post',$value);
    // }
}
