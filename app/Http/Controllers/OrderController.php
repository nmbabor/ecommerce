<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Order;

class OrderController extends Controller
{
    public function index(){
    	$allData=Order::leftJoin('users','orders.fk_user_id','=','users.id')->orderBy('id','desc')
    	->select('orders.id','orders.invoice_id','orders.phone','orders.total_amount','users.email','users.name')
    	->paginate(20);
    	return view('backend.order.index',compact('allData'));
    }
}
