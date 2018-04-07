<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class RoleWisePermissions extends Model
{
    protected $table = "role_wise_permission";
    protected $fillable = ['fk_role_id','fk_permission_id'];

    public static function checkExistsRole($id,$permissionID){
    	$result= DB::table('role_wise_permission')
    	->where('fk_role_id', '=', $id)
    	->where('fk_permission_id', '=', $permissionID)
    	->get();
    	if($result){
    		return true;
    	}
    	return false;
    }
    public static function createRoleWisePermission($id,$permissionID){
    	$result= DB::table('role_wise_permission')
    	->insert([
    		'fk_role_id'=>$id,
    		'fk_permission_id'=>$permissionID
    		]);
    	if($result){
    		return true;
    	}
    	return false;
    }

    public static function checkExistsPermission($id,$permissionID){
        $result= DB::table('role_wise_permission')
        ->where('fk_permission_id', '=', $permissionID)
        ->get();
        return $result;
    }

    public static function selectMenu(){
    	return DB::table('role_wise_permission')->get();
    }
    public static function deleteRolePermission($id,$permission){
        //print_r($permission);exit;
        
        for ($i=0; $i <count($permission) ; $i++) {
        $result = DB::table('role_wise_permission')
            ->where('fk_permission_id', $permission[$i])  // find your user by their id
            ->delete();
        }
    }
}
