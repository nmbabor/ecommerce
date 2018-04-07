<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Items;
use App\Model\ItemPhoto;
use App\Model\Offer;
use App\Model\SubSubCategory;

class CategoryProductController extends Controller
{
   public function category_product($link)
   {
   	$category=Category::where('link',$link)->first();
   	$subCategory=SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')
                ->select('sub_category.*','category.category_name','category.link as cat_link')
   				->where('sub_category.fk_category_id',$category->id)
   				->where('sub_category.status',1)
   				->orderby('sub_category.serial_num','ASC')
   				->get();
   		
   		$allData=Items::where('status','1')->where('fk_category_id',$category->id)->orderby('id','DSC')->paginate(12);

   		  foreach ($allData as   $value) {
                $product_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
         $special_product=Items::where('status','1')->where('is_featured',1)->orderby('id','DSC')->paginate(9);

           foreach ($special_product as   $value) {
                $products_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
            $recentProduct=Items::where('status','1')->orderBy('items.id','desc')->paginate(8);
            foreach ($recentProduct as   $rValue) {
                $recent_photo[$rValue->id]=ItemPhoto::where('fk_item_id',$rValue->id)->value('small_photo');
                }
        \Session::put('title_msg',$category->category_name);
        \Session::put('metaDescription','All Item from '.$category->category_name);

   	return view('frontend.category-product',compact('category','subCategory','allData','product_photo','special_product','products_photo','recentProduct','recent_photo'));

   }
   public function sub_category_product($cat_link,$sub_link)
   {
    $category=Category::where('link',$cat_link)->first();
    $s_category=SubCategory::where('link',$sub_link)->first();
    $subCategory=SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')
                ->select('sub_category.*','category.category_name','category.link as cat_link')
          ->where('sub_category.fk_category_id',$category->id)
          ->where('sub_category.status',1)
          ->orderby('sub_category.serial_num','ASC')
          ->get();
    if($s_category==null){
        return redirect()->back();
      }
      $allData=Items::where('status','1')->where('fk_sub_category_id',$s_category->id)->orderby('id','DSC')->paginate(12);

        foreach ($allData as   $value) {
                $product_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
        $special_product=Items::where('status','1')->where('is_featured',1)->orderby('id','DSC')->paginate(9);

           foreach ($special_product as   $value) {
                $products_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
            $recentProduct=Items::where('status','1')->orderBy('items.id','desc')->paginate(8);
            foreach ($recentProduct as   $rValue) {
                $recent_photo[$rValue->id]=ItemPhoto::where('fk_item_id',$rValue->id)->value('small_photo');
                }
      \Session::put('title_msg',$s_category->sub_category_name);
      \Session::put('metaDescription','All Item from '.$s_category->sub_category_name);
      return view('frontend.sub-category-product',compact('category','subCategory','allData','product_photo','s_category','special_product','products_photo','recentProduct','recent_photo'));
   }
   public function subSubCategoryProduct($cat_link,$sub_link,$subSubLink)
   {
   	$category=Category::where('link',$cat_link)->first();
    $s_category=SubCategory::where('link',$sub_link)->first();
   	$subSubCat=SubSubCategory::where('link',$subSubLink)->first();
   	$subCategory=SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')
                ->select('sub_category.*','category.category_name','category.link as cat_link')
   				->where('sub_category.fk_category_id',$category->id)
   				->where('sub_category.status',1)
   				->orderby('sub_category.serial_num','ASC')
   				->get();
   	if($subSubCat==null){
    		return redirect()->back();
    	}
   		$allData=Items::where('status','1')->where('fk_sub_sub_category_id',$subSubCat->id)->orderby('id','DSC')->paginate(12);

   		  foreach ($allData as   $value) {
                $product_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
        $special_product=Items::where('status','1')->where('is_featured',1)->orderby('id','DSC')->paginate(9);

           foreach ($special_product as   $value) {
                $products_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
            $recentProduct=Items::where('status','1')->orderBy('items.id','desc')->paginate(8);
            foreach ($recentProduct as   $rValue) {
                $recent_photo[$rValue->id]=ItemPhoto::where('fk_item_id',$rValue->id)->value('small_photo');
                }
      \Session::put('title_msg',$subSubCat->sub_name);
      \Session::put('metaDescription','All Item from '.$subSubCat->sub_name);
   		return view('frontend.sub-category-product',compact('category','subCategory','allData','product_photo','s_category','special_product','products_photo','recentProduct','recent_photo','subSubCat'));
   }
   public function todaysOffer()
   {
  
      $allData=Offer::leftJoin('items','offers.fk_item_id','=','items.id')
                ->select('offers.*','items.item_name','items.link','items.id','rating')->where('offers.status',1)->where(['items.status'=>1,'offer_type'=>1])->where('end_date','>',date('Y-m-d'))->paginate(12);

        foreach ($allData as   $value) {
                $product_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
         $special_product=Items::where('status','1')->where('is_featured',1)->orderby('id','DSC')->paginate(9);

           foreach ($special_product as   $value) {
                $products_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
            $recentProduct=Items::where('status','1')->orderBy('items.id','desc')->paginate(8);
            foreach ($recentProduct as   $rValue) {
                $recent_photo[$rValue->id]=ItemPhoto::where('fk_item_id',$rValue->id)->value('small_photo');
                }
        \Session::put('title_msg','Todays Offers');
        \Session::put('metaDescription','All Item from Todays Offers');

    return view('frontend.todayOffer',compact('allData','product_photo','special_product','products_photo','recentProduct','recent_photo'));

   }



}
