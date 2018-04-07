<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Permissions extends Model
{
    protected $table='permission';
    protected $fillable=['permission_name','status'];
    /*create permission*/
    public static function permissionCreate($input){
    	
		$descriptionAppImage = DB::table('permission')
    	->insert([
    		'permission_name' => $input['permission_name'],
    		'status' => $input['status'],
    		'created_at' => date('Y-m-d h:i:s')
    	]);
	}
	/*update permission*/
	public static function permissionUpdate($input,$permissionId){
    	
		$descriptionAppImage = DB::table('permission')
    	->where('id', $permissionId->id)
	    	->update([
    		'permission_name' => $input['permission_name'],
    		'status' => $input['status'],
    		'created_at' => date('Y-m-d h:i:s')
    	]);
	}
	/*delete permission*/
	public static function deletePermission($data){
        
    	$result = DB::table('permission')
            ->where('id', $data->id)  // find your user by their id
            ->delete();
    }
}
