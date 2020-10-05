<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Auth;
use Log;
class GenerateLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $array = ['browse'=>'index','read'=>'show','add'=>'create','adds'=>'store','edits'=>'edit','edit'=>'update','delete'=>'destroy'];
         // $page =  (str_singular(array_search(last(explode('.', request()->route()->action['as'])), $array)).'_'.str_plural(str_replace('-', '_', request()->segment(2)),2));
        // dd($page);
        // dd(request());
        function isMethod($method){
            return in_array($method, request()->route()->methods);
        }
        if (isMethod('PUT') || isMethod('PATCH')) {
          // dd();
        }
        if (isMethod('GET') && session('created_id') ) {
          
        }
        if (isMethod('DELETE')) {        
            $info = array(
                'User Id : ' => auth('admin')->user()->id,
                'User Email'  => auth('admin')->user()->email,
                'Url'  => request()->server()['PATH_INFO'],
            ); 
            // Log::useDailyFiles(storage_path().'/logs/debug.log');
     // Log::info(['Request'=>$request])->useDailyFiles(storage_path().'/logs/debug.log');
            // Log::info('Deleted',$info);
        }
        // dd(in_array('GET', request()->route()->methods));
        // dd(array_search('delete',request()->route()->methods));
        // dd(request()->server()['PATH_INFO']);
        
        // if (Auth::guard('admin')->check()) {
        //     return redirect()->route('admin.dashboard.index');
        // }
        return $next($request);
    }
}