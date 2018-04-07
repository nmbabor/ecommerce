<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class CustomOrder extends Model
{
   	protected $table='custom_order';
    protected $fillable=['title','price','photo_path','fk_category_id','fk_sub_category_id','status'];
    /*create permission*/
    public static function cratedCustomOrder($input){
    	//print_r($input);exit;
    	
		$customOrderCreated = DB::table('custom_order')
    	->insert([
    		'title' => $input['title'],
    		'price' => $input['price'],
    		'photo_path' => $input['photo_path'],
    		'fk_category_id' => $input['fk_category_id'],
    		'fk_sub_category_id' => $input['fk_sub_category_id'],
    		'status' => $input['status'],
    		'created_at' => date('Y-m-d h:i:s')
    	]);
	}
	/*update permission*/
	public static function updateCustomOrder($input,$customData){
    	
        $update=array(
            'title' => $input['title'],
            'price' => $input['price'],
            'photo_path' => $input['photo_path'],
            'fk_category_id' => $input['fk_category_id'],
            'fk_sub_category_id' => $input['fk_sub_category_id'],
            'status' => $input['status'],
            'updated_at' => date('Y-m-d h:i:s')
            );
        if($input['fk_sub_category_id'] == null){
            unset($update['fk_sub_category_id']);
        }
		$updateCustomOrder = DB::table('custom_order')
        ->where('id', $customData->id)
            ->update($update);
	}
	/*delete permission*/
	/*public static function deletePermission($data){
        
    	$result = DB::table('custom_order')
            ->where('id', $data->id)  // find your user by their id
            ->delete();
    }*/
}
