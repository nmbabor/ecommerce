<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\User;
class SmsController extends Controller
{
    public function index(){
    	$allUsers=User::where('email','!=','admin@codeplanners.com')->where('type',1)->paginate(10);
        //return $allUsers;
    	return view('backend.sms.index',compact('allUsers'));
    }
    public function send(){
    	$username='nmbabor';
    	$client = new Client();
    	$res = $client->request('GET', 'https://api.github.com/user', [
	    'auth' => ['nmbabor', 'N.m.babor50']
			]);
			//return $res->getStatusCode();
			// "200"
			//return $res->getHeader('content-type');
			// 'application/json; charset=utf8'
			return  $res->getBody();
    }
}
