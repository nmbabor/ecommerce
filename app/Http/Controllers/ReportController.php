<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Items;
use App\Model\Order;
use App\Model\OrderItem;
use DB;

class ReportController extends Controller
{
   public function index(){
   		return view('backend.report.sales');
   }
   public function result(Request $request){
   		$result=OrderItem::leftJoin('items','order_item.fk_item_id','items.id')
   		->leftJoin('category','items.fk_category_id','category.id')
   		->whereDate('order_item.created_at','>=',$request->from)->whereDate('order_item.created_at','<=',$request->to)->select(DB::raw('SUM(qty) as total_quantity'),DB::raw('SUM(amount) as total_amount'),'item_name','product_code','category_name')
   		->groupBy('fk_item_id')
   		->get();
   		return view('backend.report.result',compact('result'));
   }
   public function inventory(){
   	$items=Items::leftJoin('category','items.fk_category_id','category.id')->select('category_name','items.item_name','items.product_code','quantity','sale_price')->where('items.status',1)->paginate(50);
   	return view('backend.report.inventory',compact('items'));
   }
}
