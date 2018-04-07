<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Model\Category;
use App\Model\SubCategory;
use App\Model\Slider;
use App\Model\Items;
use App\Model\PrimaryInfo;
use App\Model\Page;
use App\Model\SocialLink;
use App\Model\Menu;
use App\Model\Work;
use DB;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
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
        'news'     =>Work::where('status','1')->where('type','all-news')->latest()
                         ->first(),
            );
        Session::put('commonData', $commonData);
    }
}
