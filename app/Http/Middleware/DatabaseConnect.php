<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class DatabaseConnect
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
        
          $url = \URL::to('');
          $url=str_replace('www.', '', $url);
          $parsedUrl = parse_url($url);
          $host = explode('.', $parsedUrl['host']);
        
        $subDomain = $host[0];
        if($subDomain)
        {
        $dbname='tradebanglacom_'.$subDomain;
        $dbname='backjunction';
             $res = DB::select("show databases like '{$dbname}'");
             //return $res;
            if (count($res) == 0) {
                \App::abort(404);
            }
            
           \ Config::set('database.connections.mysql.database', $dbname);

            DB::purge('mysql');
            DB::reconnect('mysql');
        }
            
        return $next($request);
        }
}
