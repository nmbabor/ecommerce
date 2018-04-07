<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Items;
use App\Model\ItemPhoto;
use App\Model\Attributes;
use App\Model\AttributeOption;
use App\Model\Review;
use App\Model\Category;
use App\Model\Offer;
use DB;
use Session;
use Auth;

class ProductDetailsController extends Controller
{
    public function index($link)
    {
      $topOffers=Offer::leftJoin('items','offers.fk_item_id','=','items.id')
                ->select('offers.*','items.item_name','items.link','rating')->where('offers.status',1)->where('items.status',1)->where('end_date','>',date('Y-m-d'))->get();
    	$product_details=Items::leftJoin('category','items.fk_category_id','category.id')
    					->select('items.*','category.category_name','category.id as cat_id')
    					->where('items.link',$link)
    					->first();
    	if($product_details==null){
        return redirect()->back();
      }
    	$product_id=$product_details->id;
    	$cat_id=$product_details->cat_id;

          $id=$product_details->id;
        $attributeOption=json_decode($product_details->attributes,true);
        if(!empty($attributeOption)){
            foreach ($attributeOption as $key => $value) {
                $attributes[]=Attributes::where('id',$key)->first();
                foreach($value as $attr){
                    $attributeOptions[$key][]=AttributeOption::select('id','name','attribute_price','fk_attribute_id')->where('id',$attr)->first();
                }
            }   
        }else{
             $attributes=array();
             $attributeOptions=array();
        }

        //packeage
          $itemPackage =DB::table('item_packages')
       ->leftJoin('items','item_packages.fk_item_id','=','items.id')
       ->where('items.id','=',$id)
       ->select('item_packages.*')
       ->get();


    	$product_photo=ItemPhoto::where('fk_item_id',$product_id)->get();
    	$ogImage=$product_photo[0]->photo;
    	$related_product=Items::where('status','1')->where('id','!=',$product_id)->where('fk_category_id',$cat_id)->orderby('id','DSC')->paginate(4);

   		   foreach ($related_product as   $value) {
                $products_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }

           $special_product=Items::where('status','1')->where('is_featured',1)->orderby('id','DSC')->paginate(4);
           foreach ($special_product as   $svalue) {
                $special_photo[$svalue->id]=ItemPhoto::where('fk_item_id',$svalue->id)->value('small_photo');
                }
            $recentProduct=Items::where('status','1')->orderBy('items.id','desc')->paginate(4);
            foreach ($recentProduct as   $rValue) {
                $recent_photo[$rValue->id]=ItemPhoto::where('fk_item_id',$rValue->id)->value('small_photo');
                }

       $userReview=array();
        if(Auth::check()){
            $userReview=Review::leftJoin('users','reviews.fk_user_id','=','users.id')->select('reviews.*','users.name','users.email')->where('fk_user_id',Auth::user()->id)->where('reviews.fk_item_id',$id)->first();
        }
        $review=Review::leftJoin('users','reviews.fk_user_id','=','users.id')->select('reviews.*','users.name','users.email')->where('reviews.fk_item_id',$id)->where('reviews.status',1)->get();
        \Session::put('title_msg',$product_details->item_name);
        \Session::put('metaDescription',$product_details->meta_description);
    	return view('frontend.product',compact('product_details','product_photo','related_product','products_photo','attributeOptions','attributes','itemPackage','special_product','special_photo','recentProduct','recent_photo','userReview','review','topOffers','ogImage'));
    }
}
