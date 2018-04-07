<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpMe extends Controller
{
   static  public function domain(){
         $url = \URL::to('');
          $url=str_replace('www.', '', $url);
          $parsedUrl = parse_url($url);
          $host = explode('.', $parsedUrl['host']);
        $subDomain = $host[0];
        return $subDomain;
    }
}
