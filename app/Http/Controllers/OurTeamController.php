<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Team;
use App\Model\PrimaryInfo;

class OurTeamController extends Controller
{
    public function index(){
        $info=PrimaryInfo::first();
    	$team=Team::orderBy('serial_num','asc')
    	->where('team.status','=',1)->paginate(12);
    $info=PrimaryInfo::first();
       \Session::put('title_msg','Management Team');
        \Session::put('metaDescription','Management Team of '.$info->company_name);
    	return view('frontend.team.team', compact('team'));
    }


    public function single($id){
    	$data=Team::findOrFail($id);
    \Session::put('title_msg',$data->name);
    \Session::put('metaDescription',$data->name.'('.$data->designation.')');
    	return view('frontend.team.single', compact('data'));
    }
}
