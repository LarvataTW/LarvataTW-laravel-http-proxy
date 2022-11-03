<?php

namespace Larvata\LaravelHttpProxy\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\URL;
use GuzzleHttp\Client;
use WpOrg\Requests\Requests ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class HttpProxyController extends BaseController
{

        public function index(Request $request)
        {
          $headers = ['accept'=> 'application/json','Authorization'=>Config::get("httpproxy.header.Authorization")];
          $queryString = $request->getQueryString();
          $path = $request->path();


          $proxyPath = preg_replace('/^'.Config::get('httpproxy.prefix').'\//','',$path);
          foreach(Config::get("httpproxy.path_replacement") as $k => $v){
            $proxyPath = preg_replace($k,$v,$proxyPath);
          }
          $fullUrl = Config::get("httpproxy.host")."/".$proxyPath."?".$queryString;
          $response = Requests::get($fullUrl, $headers);
          return response( $response->body, $response->status_code)
                          ->header('Content-Type', $response->headers['content-type']);
        }
}

