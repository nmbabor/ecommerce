<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class Items extends Model
{
    protected $table='items';
    protected $fillable=['item_name','product_code','is_featured','photo_path','attributes','short_description','fk_category_id','fk_sub_category_id','fk_sub_sub_category_id','sale_price','link','regular_price','status','meta_description','long_title','fk_brand_id','quantity','created_by','updated_by','rating','discount'];
    /*create permission*/
    public static function cratedItem($input){
    	//print_r($input);exit;
        unset($input['_token']);
		$itemCreated = DB::table('items')
    	->insertGetId($input);
    	return $itemCreated;
	}
	/*update permission*/
	public static function updateItem($input,$data){
    	$update=array(
            'item_name' => $input['item_name'],
            'photo_path' => $input['photo_path'],
            'status' => $input['status'],
            'is_featured' => $input['is_featured'],
            'short_description' => $input['short_description'],
            'meta_description' => $input['meta_description'],
            'fk_category_id' => $input['fk_category_id'],
            'fk_sub_category_id' => $input['fk_sub_category_id'],
            'sale_price' => $input['sale_price'],
            'regular_price' => $input['regular_price'],
            'updated_at' => date('Y-m-d h:i:s')
            );
        if($update['fk_sub_category_id']==null){
            unset($update['fk_sub_category_id']);
        }
        if($update['max_ext_qnty']==null){
            unset($update['max_ext_qnty']);
        }
        if($update['min_ext_qnty']==null){
            unset($update['min_ext_qnty']);
        }
        if($update['ext_price']==null){
            unset($update['ext_price']);
        }
        
		$updateItem = DB::table('items')
    	->where('id', $data->id)
	    	->update($update);
	}
    /*item delete*/
    public static function deleteItem($data){
        //print_r($data->id);exit;
        $result = DB::table('items')
            ->where('id', $data->id)  // find your user by their id
            ->delete();
    }

    /*--Category wise item select--*/
    public static function category($link,$paginate){
        $data=Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->orderBy('items.id','desc')
        ->where('items.status',1)
        ->where('category.link',$link)
        ->paginate($paginate);
        return $data;
    }
    /*--Brand wise item select--*/
    public static function brand($link,$paginate){
        $data=Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->leftJoin('brand','items.fk_brand_id','=','brand.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->orderBy('items.id','desc')
        ->where('items.status',1)
        ->where('brand.link',$link)
        ->paginate($paginate);
        return $data;
    }
    /*-- Sub Category wise item select --*/
    public static function subCategory($catLink,$link,$paginate){
        $data=Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->orderBy('items.id','desc')
        ->where('items.status',1)
        ->where('category.link',$catLink)
        ->where('sub_category.link',$link)
        ->paginate($paginate);
        return $data;
    }
    /*-- Sub sub Category wise item select --*/
    public static function subSubCategory($catLink,$subLink,$link,$paginate){
        $data=Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->leftJoin('sub_sub_category','items.fk_sub_sub_category_id','=','sub_sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name','sub_sub_category.sub_name')
        ->orderBy('items.id','desc')
        ->where('items.status',1)
        ->where('category.link',$catLink)
        ->where('sub_category.link',$subLink)
        ->where('sub_sub_category.link',$link)
        ->paginate($paginate);
        return $data;
    }
    /*-- Single Item wise item select --*/
    public static function singleItem($id){
        $data=Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->findOrFail($id);
        return $data;
    }
    public static function singleItemShow($link){
        
        $data=Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->where('items.link',$link)->first();
        return $data;
    }








}
