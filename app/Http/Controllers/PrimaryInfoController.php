<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\PrimaryInfo;
use Session;

class PrimaryInfoController extends Controller
{
    public function index(){
        $aboutData=PrimaryInfo::first();
    	\Session::put('title_msg','About');
        \SEssion::put('metaDescription','About '.$aboutData->company_name);
    	return view('frontend.about', compact('aboutData'));
    }
    public function contact(){
       $info=PrimaryInfo::first();
       \Session::put('title_msg','Contact');
        \SEssion::put('metaDescription','Contact '.$info->company_name);
        return view('frontend.contact',compact('info'));
    }

        public function message(Request $request){
        	$info=PrimaryInfo::first();
        $data=array(
            'name'=>$request->name,
            'subject'=>$request->subject,
            'email'=>$request->email,
            'message'=>$request->message,
            'to'=>$info->email,
            );
        /*--Mail function use for sen mail--*/
        \Mail::raw($data['message'], function ($message) use($data) {
            
            $message->from($data['email'],$data['email']);
            $message->to($data['to'])->subject($data['subject']);

        });

        return redirect()->back()->with('success','Message send successfully!');
    }

}
