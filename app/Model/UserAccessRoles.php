<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class UserAccessRoles extends Model
{
    protected $table = "user_access_role";
    protected $fillable = ['fk_user_id','fk_role_id'];

    public static function insertUserAccessRole($input,$userID){
        print_r($input['fk_role_id']);
        print_r($userID);exit;
    	for ($i=0; $i <sizeof($input['fk_role_id']); $i++) { 
    		$userAccessRole = DB::table('user_access_role')
	        ->insert([
	            'fk_user_id'      => $userID,
	            'fk_role_id'      => $input['fk_role_id'][$i],
	            'created_at'   => date('Y-m-d h:i:s')
	            ]);
	        
    	}
         
    }
}
