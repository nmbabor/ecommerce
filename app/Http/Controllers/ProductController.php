<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Items;
use App\Model\Attributes;
use App\Model\AttributeOption;
use App\Model\PrimaryInfo;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\SubSubCategory;
use App\Model\ItemPhoto;
use App\Model\Brand;
use DB;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\Cart;
class ProductController extends Controller
{
    
    public function category($link){
        $info=PrimaryInfo::first();
        $cat_name=Category::where('link',$link)->value('category_name');
        $allData=array(
            'data'=>Items::category($link,16),
            'subCategory'=>SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')->select('sub_category.*','category.link as cat_link')->where('category.link',$link)->get(),
            );
        $allItemPhoto=array();
        foreach($allData['data'] as $data){

            $allItemPhoto[$data->id]=ItemPhoto::where('fk_item_id',$data->id)->first();
        }

        $photos=array(
            'allItemPhoto'=>$allItemPhoto,
            );
        \Session::put('title_msg',$cat_name);
        \Session::put('metaDescription','All Item from '.$cat_name.' of '.$info->company_name);
        return view('frontend.allItem',compact('allData','photos','cat_name'));
    }
    
    public function subCategory($cat_link,$sub_link){
        $info=PrimaryInfo::first();
        $cat_name=Category::where('link',$cat_link)->value('category_name');
        $sub_name=SubCategory::where('link',$sub_link)->value('sub_category_name');
        $allData=array(
            'data'=>Items::subCategory($cat_link,$sub_link,16),
            'subCategory'=>SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')->select('sub_category.*','category.link as cat_link')->where('category.link',$cat_link)->get(),
            );
       
        $allItemPhoto=array();
       
        foreach($allData['data'] as $data){

            $allItemPhoto[$data->id]=ItemPhoto::where('fk_item_id',$data->id)->first();
        }

        $photos=array(
            'allItemPhoto'=>$allItemPhoto,
            );
        \Session::put('title_msg',$sub_name);
        \SEssion::put('metaDescription','All Item from '.$sub_name.' of '.$info->company_name);
        return view('frontend.allItem',compact('allData','photos','cat_name','sub_name'));
    }
   public function subSubCategory($cat_link,$sub_link,$subSubLink){
        $info=PrimaryInfo::first();
        $cat_name=Category::where('link',$cat_link)->value('category_name');
        $sub_name=SubCategory::where('link',$sub_link)->value('sub_category_name');
        $sub_sub_name=SubSubCategory::where('link',$subSubLink)->value('sub_name');
        $allData=array(
            'data'=>Items::subSubCategory($cat_link,$sub_link,$subSubLink,16),
            'subCategory'=>SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')->select('sub_category.*','category.link as cat_link')->where('category.link',$cat_link)->get(),
            );
        $allItemPhoto=array();
        foreach($allData['data'] as $data){

            $allItemPhoto[$data->id]=ItemPhoto::where('fk_item_id',$data->id)->first();
        }

        $photos=array(
            'allItemPhoto'=>$allItemPhoto,
            );
        \Session::put('title_msg',$sub_sub_name);
        \SEssion::put('metaDescription','All Item from '.$sub_sub_name.' of '.$info->company_name);
        return view('frontend.allItem',compact('allData','photos','cat_name','sub_name','sub_sub_name'));
    }

 


    public function packagePriceType($id){
        $value=DB::table('item_packages')->find($id);
        $price=$value->price;
        return view('frontend.packagePriceType',compact('price'));
    }

public function singleProduct($link){
        $value=array('link'=>$link);
        $validator = \Validator::make($value,[
                  'link' => 'required|exists:items,link',
        ]);

        if($validator->fails()){
            return redirect()->back();
        }
        $data=Items::singleItemShow($link);
        $id=$data->id;
        $attributeOption=json_decode($data->attributes,true);
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
        //return $attributeOptions;
        $itemPackage = DB::table('item_packages')
       ->leftJoin('items','item_packages.fk_item_id','=','items.id')
       ->where('items.id','=',$id)
       ->select('item_packages.*')
       ->get();
       if($data->fk_sub_category_id!=null){
        $related=Items::leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->leftJoin('category','items.fk_category_id','=','category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->where('items.fk_sub_category_id',$data->fk_sub_category_id)
        ->where('items.id','!=',$id)
        ->orderBy('items.id','desc')
        ->paginate(10);
       }else{
        $related=Items::leftJoin('category','items.fk_category_id','=','category.id')
        ->select('items.*','category.category_name')
        ->where('items.fk_category_id',$data->fk_category_id)
        ->where('items.id','!=',$id)
        ->orderBy('items.id','desc')
        ->paginate(10);
       }
       $latestItem=Items::orderBy('items.id','desc')->where('items.status',1)->paginate(8);
        $itemPhoto=ItemPhoto::where('fk_item_id',$data->id)->get();
        $relatedPhoto=array();
       foreach($related as $item){
        $relatedPhoto[$item->id]=ItemPhoto::where('fk_item_id',$item->id)->first();
       }
       foreach($latestItem as $latest){

            $latestItemPhoto[$latest->id]=ItemPhoto::where('fk_item_id',$latest->id)->first();
        }
       $photos= array(
        'itemPhoto'     => $itemPhoto, 
        'relatedPhoto'  => $relatedPhoto, 
        'latestItemPhoto'  => $latestItemPhoto, 
        );
       \Session::put('title_msg',$data->item_name);
        \SEssion::put('metaDescription',$data->meta_description);
       return view('frontend.singleItem',compact('data','related','attributeOptions','attributes','itemPackage','photos','latestItem'));
    }

    public function quickView($link){
        $value=array('link'=>$link);
        $validator = \Validator::make($value,[
                  'link' => 'required|exists:items,link',
        ]);

        if($validator->fails()){
            return redirect()->back();
        }
        $data=Items::singleItemShow($link);
        $id=$data->id;
        $attributeOption=json_decode($data->attributes,true);
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
        //return $attributeOptions;
        $itemPackage = DB::table('item_packages')
                       ->leftJoin('items','item_packages.fk_item_id','=','items.id')
                       ->where('items.id','=',$id)
                       ->select('item_packages.*')->get();
        $itemPhoto=ItemPhoto::where('fk_item_id',$data->id)->get();
       
       $photos= array(
        'itemPhoto'     => $itemPhoto, 
        );
       return view('frontend.ajax.quickView',compact('data','attributeOptions','attributes','itemPackage','photos'));
    }

public function brand($link){
        $info=PrimaryInfo::first();
        $brand_name=Brand::where('link',$link)->value('name');
        $allData=array(
            'data'=>Items::brand($link,16),
            );
       
        $allItemPhoto=array();
        foreach($allData['data'] as $data){

            $allItemPhoto[$data->id]=ItemPhoto::where('fk_item_id',$data->id)->first();
        }
        $brands=Brand::where('status',1)->get();
        $photos=array(
            'allItemPhoto'=>$allItemPhoto,
            );
        \Session::put('title_msg',$brand_name);
        \SEssion::put('metaDescription','All Item from '.$brand_name.' of '.$info->company_name);
        return view('frontend.allItem',compact('allData','photos','brand_name','brands'));
    }

public function moreSubCategory($cat_link,$sub_link){
        $info=PrimaryInfo::first();
        $cat_name=Category::where('link',$cat_link)->value('category_name');
        $sub_name=SubCategory::where('link',$sub_link)->value('sub_category_name');
        $allData=array(
            'data'=>Items::subCategory($sub_link,16),
            'subSubCategory'=>SubSubCategory::where('status',1)->where('fk_sub_category_id',$sub->id)->get(),
            );
       
        $specialItemPhoto=array();
        $allItemPhoto=array();
        foreach($allData['specialItem'] as $specialItem){

            $specialItemPhoto[$specialItem->id]=ItemPhoto::where('fk_item_id',$specialItem->id)->first();
        }
        foreach($allData['data'] as $data){

            $allItemPhoto[$data->id]=ItemPhoto::where('fk_item_id',$data->id)->first();
        }

        $photos=array(
            'specialItemPhoto'=>$specialItemPhoto,
            'allItemPhoto'=>$allItemPhoto,
            );
        \Session::put('title_msg',$sub_name);
        \SEssion::put('metaDescription','All Item from '.$sub_name.' of '.$info->company_name);
        return view('frontend.allItem',compact('allData','photos','cat_name','sub_name'));
    }










}
