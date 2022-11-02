<?php

namespace Larvata\LaravelHttpProxy\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use GuzzleHttp\Client;
use WpOrg\Requests\Requests ;
use Illuminate\Http\Request;

class HttpProxyController extends BaseController
{

        public function index(Request $request)
        {
          $headers = ['accept'=> 'application/json','Authorization'=>env('LARAVEL_HTTP_PROXY_AUTHORIZATION')];
          $queryString = $request->getQueryString();
          $path = $request->path();
          $response = Requests::get(env('LARAVEL_HTTP_PROXY_URL').'?'.$queryString, $headers);
          $ret =[];
          return ["path"=>$path,"qeury"=>$queryString];
          #return json_decode($response->body);
        }
}

