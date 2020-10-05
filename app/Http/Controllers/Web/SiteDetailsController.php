<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Model\SiteSetting;
use App\Model\Slider;
use Illuminate\Http\Request;

class SiteDetailsController extends Controller
{
   
    public function SiteDetails(Request $request)
    {
        $data = SiteSetting::latest()->first();
        return response()->json($data);
    }

     public function Slider(Request $request)
    {
        $data = Slider::where('status',1)->get();
        return response()->json($data);
    }

    
}
