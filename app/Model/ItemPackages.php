<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class ItemPackages extends Model
{
    protected $table='item_packages';
    protected $fillable=['fk_item_id','package_title','price','status'];
    /*create permission*/
    public static function cratedPackage($input){
    	//print_r($input);exit;
    	
		$packageCreate = DB::table('item_packages')
    	->insert([
    		'fk_item_id' => $input['fk_item_id'],
    		'package_title' => $input['package_title'],
    		'price' => $input['price'],
    		'status' => $input['status'],
    		'created_at' => date('Y-m-d h:i:s')
    	]);
	}
	/*update permission*/
	public static function updatePackage($input,$data){
    	
		$updateCustomOrder = DB::table('item_packages')
    	->where('id', $data->id)
	    	->update([
    		'fk_item_id' => $input['fk_item_id'],
    		'package_title' => $input['package_title'],
    		'price' => $input['price'],
    		'status' => $input['status'],
    		'updated_at' => date('Y-m-d h:i:s')
    	]);
	}
    /*package search*/
    public static function searchPackage($id){
        //print_r($id);exit;
        $result = DB::table('item_packages')
        ->where('fk_item_id', '=', $id)
        ->get();
        return $result;
    }
    /*package id*/
    public static function searchPackageID($id){
        $result = DB::table('item_packages')
        ->select('id')
        ->where('fk_item_id', '=', $id)
        ->get();
        if($result){
            return true;
        }else{
            return false;
        }
       
    }
    /*package Delete*/
    public static function deletePackage($id,$package_Id){
        //print_r($appImageId[$i]->id);exit;
        for ($i=0; $i <count($package_Id) ; $i++) {
        $result = DB::table('item_packages')
            ->where('id', $package_Id[$i]->id)  // find your user by their id
            ->delete();
        }
    }
}
