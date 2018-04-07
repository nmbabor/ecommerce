<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Work;
use App\Model\PrimaryInfo;
use Validator;

class WorksController extends Controller
{
    public function index(){
    	$page_title='Blog';
    	$route='blog';
    	$info=PrimaryInfo::first();
    	$allData=Work::where('status',1)->where('type','post')->orderBy('id','DESC')->paginate(12);
    	\Session::put('title_msg','Blog');
    \Session::put('metaDescription','All blog of '.$info->company_name);
        return view('frontend.blog.work',compact('allData','page_title','route'));
    }

    public function single($link){
         $value=array('link'=>$link);
        $validator = Validator::make($value, [
                    'link' => 'required|exists:work,link',   
                ]);
                if ($validator->fails()) {
                    return redirect()->back();
                }
    	$data=Work::where('link',$link)->first();
        $recentPost=Work::where(['type'=>$data->type,'status'=>1])->orderBy('id','DESC')->paginate(10);
    	\Session::put('title_msg',$data->title);
    	\Session::put('metaDescription',$data->title);
     	return view('frontend.blog.single',compact('data','recentPost'));

    }

     public function news(){
    	$page_title='News';
        $route='news';
        $info=PrimaryInfo::first();
        $allData=Work::where('status',1)->where('type','all-news')->orderBy('id','DESC')->paginate(12);
        \Session::put('title_msg','News');
    \Session::put('metaDescription','All News of '.$info->company_name);
        return view('frontend.blog.work',compact('allData','page_title','route'));
    }






}
