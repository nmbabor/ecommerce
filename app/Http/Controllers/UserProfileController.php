<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Users;
use App\Model\Order;
use App\Model\Attributes;
use App\Model\AttributeOption;
use Validator;
use Auth;
use DB;
use Hash;


class UserProfileController extends Controller
{
    public function index(){
    	return view('frontend.userProfile');
    }

    public function changeUserProfile(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
                'name'     => 'required',
                'email'         => 'email|required'
            ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
   
        $input = $request->all();
        $id = $request['id'];
        $data = Users::findOrFail($request->id);
        //print_r($data);exit;
        try{
            $createUserInfo = Users::updateUserProfile($input,$data);
            $result=0;
        }catch(\Exception $e){
            $result = $e->errorInfo[1];
        }

        if($result==0){
        return redirect()->back()->with('success','Profile Successfully Updated');
        }elseif($result==1062){
            return redirect()->back()->with('error','The Email has already been taken.');
        }else{
        return redirect()->back()->with('error','Something Error Found ! ');
        }
    }

    public function viewPassword()
    {
        return view('frontend.userPasswordChange');
    }

    public function updatePassword(Request $request){

        $input = $request->all();
        //print_r($input);exit;
        $newPassword = $input['password'];
        $data = Users::findOrFail($request->id);

        if(!empty($input['old_password'])){
            $oldPassword = $input['old_password'];
            if(Hash::check($oldPassword,$data['password'])){
                $validator = Validator::make($request->all(), [
                    'password' => 'required|min:6|confirmed',
                    ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
                $input['password']=bcrypt($newPassword);
            }else{
                return redirect()->back()->with('error', 'Old Password not match !');
            }
        }
        //print_r($input);exit;
        
        try{
            $data->update($input);
            $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $bug1=$e->errorInfo[2];
        }
        if($bug==0){
            return redirect()->back()->with('success','Password Changed Successfully !');
        }else{
            return redirect()->back()->with('error','Something is wrong !'.$bug1);

        }

    }

    public function orderList()
    {
        $userId = Auth::user()->id;
        
        $allData=Order::orderBy('id','desc')
        ->leftJoin('users','orders.fk_user_id','users.id')
        ->select('orders.id','orders.invoice_id','orders.total_amount','orders.status','name','email')
        ->where('orders.fk_user_id','=',$userId)
        ->paginate(20);
        
        return view('frontend.userOrderList',compact('allData'));
    }

    public function singleOrder(Request $request){
        $id = $request->id;
        $data=Order::leftJoin('users','orders.fk_user_id','users.id')->where('orders.id',$id)->select('orders.*','users.name','email','phone')->first();
        $cart=unserialize($data['cart']);
        foreach ($cart as $keys => $value) {
           $attributeOption =  $value->options->attributes;
            if(!empty($attributeOption)){
                foreach ($attributeOption as $key => $value) {
                    $allAttribute[$keys]['attributes'][]=Attributes::select('id','name')->where('id',$key)->first();
                    foreach($value as $attr){
                        $allAttribute[$keys]['attributeOptions'][$key][]=AttributeOption::select('name','attribute_price')->where('id',$attr)->first();
                    }
                }   
            }else{
                 $allAttribute[$keys]=array();
            }
        }
        return view('frontend.userSingleOrder',compact('data','cart','allAttribute'));
    }
}
