<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use App\Model\Users;
use App\Model\UserInfo;
use App\Model\PaymentInfo;
use App\Model\City;
use App\Model\Country;
use Auth;
use Cart;
use Session;

class OurUserController extends Controller
{
    public function loginPage(){
    	\Session::put('title_msg','Login');
        \Session::put('metaDescription','Login as User ');
    	return view('frontend.login');
    }


    public function userInfo(){
    	$id = Auth::user()->id;
    	$data = UserInfo::where('fk_user_id',$id)->first();
        
    	\Session::put('title_msg','Update Profile');
        \Session::put('metaDescription','User Profile Update');
    	return view('frontend.userInfo',compact('data','city'));
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
                

            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
   
        $input = $request->all();
       
        $id = Auth::user()->id;
        $input['fk_user_id']=$id;
        $data = UserInfo::where('fk_user_id',$id)->first();
        $user=Users::findOrFail($id);
	        if(count($data)>0){
	        	$data->update($input);

	        }else{
	        	UserInfo::create($input);
	        }
        
        try{
        	
            $result=0;
        }catch(\Exception $e){
            $result = $e->errorInfo[1];
        }

        if($result==0){
        	if(Cart::count()>0){
        	return redirect('checkout')->with('success','Profile Successfully Updated');
        	}else{

        return redirect('/')->with('success','Profile Successfully Updated');
        	}
        }elseif($result==1062){
            return redirect()->back()->with('error','The Email has already been taken.');
        }else{
        return redirect()->back()->with('error','Something Error Found ! ');
        }
    }

    public function paymentOption(Request $request){
    	$input=$request->all();
        return $input;
    	$billing=array(
            'phone'=>$request->billing_phone,
            'country'=>$request->billing_country,
    		'address'=>$request->billing_address_1,
    		'city'=>$request->billing_city,
    		'state'=>$request->billing_state,
            'zipcode'=>$request->billing_postcode,
    		'order_comments'=>$request->order_comments,
    		);
    	Session::put('billingAddress',$billing);
    	if($request->payment==1){
            return redirect('card-info');
        }else{
    		return redirect('card-info');
    		return redirect()->back()->with('error','Sorry this option is under construction !');
    		
    	}
    }

    public function cardInfo(){
        if(Cart::count()>0){
        $cardInfo='';
        $cardInfo=PaymentInfo::where('fk_user_id',Auth::user()->id)->first();
        return view('frontend.cardInfo',compact('cardInfo'));
        }else{
            return redirect('/');
        }
    }
    public function city($name){
        if($name!=null){
            $city=City::leftJoin('country','city.country','=','country.id')->where('city.status',1)->where('country.name',$name)->orderBy('city.serial_num','ASC')->pluck('city_name','city_name');
            return view('frontend.ajax.city',compact('city'));
        }
    }








}
