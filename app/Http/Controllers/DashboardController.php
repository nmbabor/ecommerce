<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Category;
use App\Model\Items;
use App\Model\Order;
use Auth;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('provider');
    }
    public function index(){
    	$allData=array(
        'total_category'    => Category::where('status','1')->count(),
        'total_order'    => Order::count(),
    	'order'    => Order::leftJoin('users','orders.fk_user_id','users.id')->select('orders.id','users.name','users.email')->orderBy('orders.id','desc')->paginate(8),
    		);
        $authType=Auth::user()->type;
       if($authType!=1){
        $allData['total_item']=Items::where('status','1')->where('created_by',Auth::user()->id)->count();

        $allData['item']=Items::where('status','1')->where('created_by',Auth::user()->id)->orderBy('id','desc')->paginate(4);
       }else{
        $allData['total_item']=Items::where('status','1')->count();
        $allData['item']=Items::where('status','1')->orderBy('id','desc')->paginate(4);

       }
    	return view('backend.index',compact('allData'));
    }



    public function blank(){
    	return view('backend.blank');
    }
}
