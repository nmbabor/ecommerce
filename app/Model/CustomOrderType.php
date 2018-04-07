<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class CustomOrderType extends Model
{
    protected $table='custom_order_type';
    protected $fillable=['title','max_select','min_select','fk_custom_id'];
    /*create permission*/
    public static function cratedCustomOrderType($input){
    	//print_r($input);exit;
    	
		$customOrderCreated = DB::table('custom_order_type')
    	->insert([
    		'title' => $input['title'],
    		'max_select' => $input['max_select'],
    		'min_select' => $input['min_select'],
    		'fk_custom_id' => $input['fk_custom_id'],
    		'created_at' => date('Y-m-d h:i:s')
    	]);
	}
	/*update permission*/
	public static function updateCustomOrderType($input,$data){
    	
		$updateCustomOrder = DB::table('custom_order_type')
    	->where('id', $data->id)
	    	->update([
    		'title' => $input['title'],
            'max_select' => $input['max_select'],
            'min_select' => $input['min_select'],
            'fk_custom_id' => $input['fk_custom_id'],
    		'updated_at' => date('Y-m-d h:i:s')
    	]);
	}
}
