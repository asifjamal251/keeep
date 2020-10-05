<?php 

if (!function_exists('adminRoute')) {

    function adminRoute($slug,$param=null){

        return route('admin.'.request()->segment(2).'.'.$slug,$param);

    }

}

if (!function_exists('can')) {

    function can($expression,$type='admin') {

        $expression = strpos($expression, '_')?$expression : $expression.'_'.request()->segment(2);

        return  auth($type)->user()->hasAccess($expression.'_'.request()->segment(2));

    }

}



if (!function_exists('bucketPath')) {

    function bucketPath($name,$image='') {

        return  ('images/'.str_singular($name).'/'.$image);

    }

}

if (!function_exists('bucketUrl')) {

    function bucketUrl($image='',$path='') {       

        return 'https://'.preg_replace('/([^:])(\/{2,})/', '$1/','d3abitxifbki1g.cloudfront.net/'.$path.'/'.$image);          

    }

}

if (!function_exists('cdn')) {

    function cdn($image='',$path='') {

        return bucketUrl($image,$path);          

    }

}







