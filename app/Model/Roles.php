<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Roles extends Model
{
    protected $table='role';
    protected $fillable=['role_name','status'];
    /*create role*/
    public static function roleCreate($input){
    	
		$descriptionAppImage = DB::table('role')
    	->insert([
    		'role_name' => $input['role_name'],
    		'status' => $input['status'],
    		'created_at' => date('Y-m-d h:i:s')
    	]);
	}
	/*update role*/
	public static function roleUpdate($input,$roleId){
    	
		$descriptionAppImage = DB::table('role')
    	->where('id', $roleId->id)
	    	->update([
    		'role_name' => $input['role_name'],
    		'status' => $input['status'],
    		'created_at' => date('Y-m-d h:i:s')
    	]);
	}

	public static function deleteRole($data){
        //print_r($data->id);exit;
    	$result = DB::table('role')
            ->where('id', $data->id)  // find your user by their id
            ->delete();
    }
}
