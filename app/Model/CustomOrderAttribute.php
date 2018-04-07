<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class CustomOrderAttribute extends Model
{
    protected $table='custom_order_attributes';
    protected $fillable=['name','fk_custom_type_id'];
    /*create permission*/
    public static function cratedCustomOrderAttribute($input){
    	//print_r($input);exit;
    	
		$customOrderCreated = DB::table('custom_order_attributes')
    	->insert([
    		'name' => $input['name'],
    		'fk_custom_type_id' => $input['fk_custom_type_id'],
    		'created_at' => date('Y-m-d h:i:s')
    	]);
	}
	/*update permission*/
	public static function updateCustomOrderAttribute($input,$data){
    	
		$updateCustomOrder = DB::table('custom_order_attributes')
    	->where('id', $data->id)
	    	->update([
    		'name' => $input['name'],
    		'fk_custom_type_id' => $input['fk_custom_type_id'],
    		'updated_at' => date('Y-m-d h:i:s')
    	]);
	}
}
