<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
     public function data()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://80dd1c802a4708d61b4288add31a389f:f1c3d33ac4a6c1154fad1773b4c68765@sanix-shopify-dev.myshopify.com/admin/api/2019-04/orders.json');
        echo $res->getStatusCode();
        // 200
        echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();
        // {"type":"User"...'
}
}
