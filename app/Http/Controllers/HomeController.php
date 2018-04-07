<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Slider;
use App\Model\Work;
use App\Model\Items;
use App\Model\PrimaryInfo;
use App\Model\Page;
use App\Model\Offer;
use App\Model\SocialLink;
use App\Model\ItemPhoto;
use App\Model\Brand;
use App\Model\Menu;
use App\Model\SubSubCategory;
use App\Model\AdManager;
use App\Model\SalesSupport;
use App\Model\Testimonial;
use DB;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /* $this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Session::has('invoice_id')){
            Session::forget('invoice_id');
        }
        $specialItemPhoto=array();
        $homePhoto=array();
        $latestItemPhoto=array();
        $allData=array(
        'topOffers'=>Offer::leftJoin('items','offers.fk_item_id','=','items.id')
                ->select('offers.*','items.item_name','items.link','rating')->where('offers.status',1)->where('items.status',1)->where('end_date','>',date('Y-m-d'))->get(),
        'brands' => Brand::where('status',1)->orderBy('serial_num','ASC')->get(),
        'reviews' => Testimonial::where('status',1)->get(),
        'homeTag'=>SubCategory::leftJoin('category','sub_category.fk_category_id','category.id')->where(['sub_category.status'=>1,'sub_category.home_tag'=>1])->select('sub_category_name','category.link as cat_link','sub_category.link as sub_link')->get(),
            );

        $commonData=array(
            'category' => Category::where('status',1)->orderBy('serial_num','asc')->get(),
            'menu' => Menu::where('status',1)->orderBy('serial_num','asc')->get(),
            'subCategory' => SubCategory::where('status',1)->orderBy('serial_num','asc')->get(),
            'item' => DB::table('items')
        ->leftJoin('category','items.fk_category_id','=','category.id')
        ->leftJoin('sub_category','items.fk_sub_category_id','=','sub_category.id')
        ->select('items.*','category.category_name','sub_category.sub_category_name')
        ->orderBy('items.id','desc')
        ->where('items.status',1)
        ->paginate(5),
        'primaryInfo' =>PrimaryInfo::first(),
        'pages'=>Page::select('link','name')->where('status',1)->get(),
        'socialLinks'=>SocialLink::where('status',1)->get(),
        
            );
        $request->session()->put('commonData', $commonData);
        $request->session()->forget('title_msg');
        $request->session()->forget('metaDescription');
//my work
        $all_category =Category::where('status',1)->orderBy('serial_num','asc')->get();
        foreach ($all_category as  $value) {
              $all_sub_category[$value->id]=SubCategory::where('status',1)->where('fk_category_id',$value->id)->orderBy('serial_num','asc')->get();
        }
        $allslider=Slider::leftJoin('category','sliders.fk_category_id','category.id')->select('sliders.*','category.link')->where('sliders.status',1)->orderBy('sliders.serial_num','asc')->get();


          $homecategory=Category::where('status',1)->where('home_status',1)->orderBy('serial_num','ASC')->paginate(5);

        
             foreach ($homecategory as $cat) {
                $homeSub[$cat->id]=SubCategory::where('status',1)->where('fk_category_id',$cat->id)->orderBy('serial_num','ASC')->paginate(5);
                foreach ($homeSub[$cat->id] as $sub) {
                 $homeproduct[$sub->id]=Items::orderBy('items.id','desc')->where('items.status',1)->where('fk_sub_category_id',$sub->id)->simplePaginate(8);
                    foreach ($homeproduct[$sub->id] as $key =>  $values) {
                        $photos = ItemPhoto::where('fk_item_id',$values->id)->first();
                        $homeproduct[$sub->id][$key]['photo']=$photos->photo;
                        $homeproduct[$sub->id][$key]['small_photo']=$photos->small_photo;
                    }
                }
                 
             }
             $special_product=Items::where('status','1')->where('is_featured',1)->orderby('id','DSC')->paginate(8);

           foreach ($special_product as   $value) {
                $products_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
                }
            $recentProduct=Items::where('status','1')->orderBy('items.id','desc')->paginate(8);
            foreach ($recentProduct as   $rValue) {
                $recent_photo[$rValue->id]=ItemPhoto::where('fk_item_id',$rValue->id)->value('small_photo');
                }

            $route='blog';
            $allblog=Work::where('status',1)->orderby('id','DSC')->where('type','post')->paginate(5);
            $salesSupport=SalesSupport::where('status',1)->orderby('serial_num','ASC')->get();
            $advertisement=AdManager::where(['status'=>1,'fk_page_id'=>1])->get()->keyBy('serial_num');
        return view('frontend.index', compact('allData','homeCategory','homeItems','photos','homeSub','totalItemInCat','all_category','all_sub_category','allslider','homecategory','homeproduct','special_product','products_photo','allblog','route','recentProduct','recent_photo','salesSupport','advertisement'));
    }

     public function userLogin(){
       $info=PrimaryInfo::first();
       \Session::put('title_msg','Login');
        \Session::put('metaDescription','Login '.$info->company_name);
        return view('frontend.login');
    }

    public function search(Request $request){
        $info=PrimaryInfo::first();
        \Session::put('title_msg','Search');
        \Session::put('metaDescription','Search in '.$info->company_name);
        $search=$request->all();
        $keyword='Search - "'.$request->keywords.'"';
        $all_category =Category::where('status',1)->orderBy('serial_num','asc')->get();
        foreach ($all_category as  $value) {
              $all_sub_category[$value->id]=SubCategory::where('status',1)->where('fk_category_id',$value->id)->orderBy('serial_num','asc')->get();
        }
       
        $product_photo=array();
       
        if($request->category!="all"){
            $allData=Items::orderBy('items.id','desc')
                    ->where('items.status',1)
                    ->where('fk_category_id',$request->category)
                    ->where('item_name','like','%'.$request->keywords.'%')
                    ->orWhere('long_title','like','%'.$request->keywords.'%')
                    ->orWhere('short_description','like','%'.$request->keywords.'%')
                    ->orWhere('meta_description','like','%'.$request->keywords.'%')
                    ->simplePaginate(12);
            $cat_name=Category::where('id',$request->category)->value('category_name');
        }else{
            $cat_name=$request->category;
           $allData=Items::orderBy('items.id','desc')
                    ->where('items.status',1)
                    ->where('item_name','like','%'.$request->keywords.'%')
                    ->orWhere('long_title','like','%'.$request->keywords.'%')
                    ->orWhere('short_description','like','%'.$request->keywords.'%')
                    ->orWhere('meta_description','like','%'.$request->keywords.'%')
                    ->simplePaginate(12);

        }
         foreach ($allData as   $value) {
                $product_photo[$value->id]=ItemPhoto::where('fk_item_id',$value->id)->value('small_photo');
        }

        return view('frontend.search',compact('allData','product_photo','cat_name','search','keyword','all_category','all_sub_category'));
    }
    public function menuLoad($id){
        $subSub=array();
        $subCategory=SubCategory::leftJoin('category','sub_category.fk_category_id','=','category.id')->select('sub_category.*','category.link as cat_link','category.category_name','category.photo','category.photo_status')->where('sub_category.status',1)->where('fk_category_id',$id)->orderBy('sub_category.serial_num','ASC')->get();
        foreach ($subCategory as $sub) {
            $subSub[$sub->id]=SubSubCategory::where('status',1)->where('fk_sub_category_id',$sub->id)->get();
        }
        return view('frontend.ajax.menu',compact('subCategory','subSub','id'));
    }

    public function searchItem(Request $request){
        $name=$request->name;
        $cat=$request->cat;
        $data=array();
        if($cat=='all'){

        $data=Items::where('item_name', 'LIKE', '%'. $name .'%')
        ->orderBy('item_name','ASC')->limit(10)->pluck('item_name');
    }else{
        $data=Items::where('item_name', 'LIKE', '%'. $name .'%')
        ->where('fk_category_id',$cat)->orderBy('item_name','ASC')->limit(10)->pluck('item_name');
    }
        return json_encode($data); 
    }

    /*public function itemPhoto(){
        $photos=ItemPhoto::get();
        foreach ($photos as $key => $value) {
            $p=str_replace('bakejunction', 'eshop', $value->photo);
            ItemPhoto::where('id',$value->id)->update([
                'photo'=>$p,
                'small_photo'=>$p,
            ]);
        }
        return "Success Sir!";
    }*/
   





}
