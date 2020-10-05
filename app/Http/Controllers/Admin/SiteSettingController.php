<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $logo = SiteSetting::latest()->first();
        return view('admin.setting.site-setting',compact('logo'));
    }

    public function logo(Request $request)
    {

        //dd($request->all());
        $logo = SiteSetting::latest()->first();
        $logo->site_title = $request->site_title;
        $logo->site_description = $request->site_description;
        $logo->email = $request->email;
        $logo->mobile = $request->mobile;
        $logo->address = $request->address;
        $logo->product_price = $request->product_price;
        $logo->shipping_price = $request->shipping_price;
        $logo->notification_content = $request->notification_content;
        $logo->notification_title = $request->notification_title;

        if($request->hasFile('logo')){
            $image_name = time()."_logo.".$request->file('logo')->getClientOriginalExtension();
            $image = $request->file('logo')->storeAs('sitesetting/', $image_name);
            $logo->logo = 'storage/'.$image;
        } 

        if($request->hasFile('favicon')){
            $image_name = time()."_favicon.".$request->file('favicon')->getClientOriginalExtension();
            $image = $request->file('favicon')->storeAs('sitesetting/', $image_name);
            $logo->favicon = 'storage/'.$image;
        } 

        if($logo->save()){
           return redirect()->route('admin.site-setting.index')->with(['class'=>'success','message'=>'Site Details Updates']);
       }
       return back()->with(['class'=>'success','message'=>'Site Details Updates']);
    }

}
