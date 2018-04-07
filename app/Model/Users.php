<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Users extends Model
{
    protected $table = "users";
    protected $fillable = ['name','email','password','status','created_by','updated_by','type','phone'];

    public static function insertUserInfo($input){
        $userInfoResult = DB::table('users')
        ->insertGetId([
            'name'          => $input['name'],
            'email'         => $input['email'],
            'password'      => $input['password'],
            'type'          =>1,
            'status'        =>$input['status'],
            'created_at'    => date('Y-m-d h:i:s'),
            'created_by'    => $input['created_by']
            ]);
        return $userInfoResult;
        
        
    }
    public static function updateUserInfo($input,$data){
        //print_r($input);exit;
        $data->update($input);
        
    }
    public static function updateUserProfile($input,$data){
        $data->update([
            'name'          => $input['name'],
            'email'         => $input['email'],
            'phone'         => $input['phone']
            ]);
        return $data;
        
    }
}
