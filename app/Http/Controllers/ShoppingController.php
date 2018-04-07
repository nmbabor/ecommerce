<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Items;

use App\Http\Requests;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\Attributes;
use App\Model\AttributeOption;
use App\Model\SmsConfig;
use App\Model\UserInfo;
use Cart;
use DB;
use Auth;
use Session;

class ShoppingController extends Controller
{
    public function cart(Request $request) {
        //update/ add new item to cart
        $allData=$request->all();
        $allAttribute=array();
         
        
        $package=null;
        if ($request->isMethod('post')) {
            $product_id = $request->id;
            $product = Items::leftJoin('category','items.fk_category_id','=','category.id')
	        ->select('items.id','items.link','items.item_name')
	        ->where('items.id',$product_id)
	        ->first();
            if(isset($allData['attributes'])){
                $attributes=$allData['attributes'];
            }else{
                $attributes=array();
            }
            /*--For attriute check box--*/
            $extra=0;
            if(isset($attributes) and count($attributes)>0){

            	foreach ($attributes as $key => $attribute) {

                    if($attribute[0]!=null){
                    foreach ($attribute as $attr) {
            	   $extra_price=AttributeOption::select('attribute_price')->where('id',$attr)->first();
                   $extra=$extra+$extra_price->attribute_price;
                     }
                    }
                  
                }
            }
            /*--For Package--*/
            if(isset($request->package_id)){
            	$package_id=$request->package_id;
            		$package=DB::table('item_packages')
            		->where('id',$package_id)
            		->first()->package_title;
            }

            	$request->price +=$extra;
            Cart::add(array('id' => $product_id, 'name' => $product->item_name, 'qty' => $request->quantity, 'price' => $request->price,'options'=>['attributes'=>$attributes,'instruction'=>$request->instruction,'package'=>$package,'link'=>$product->link,'photo_path'=>$product->photo_path]));
            return redirect()->back()->with('success','Add to cart Successfully.');
        }

        //increment the quantity
        if ($request->rowId && ($request->increment) == 1) {
            $item = Cart::get($request->rowId );
            Cart::update($request->rowId , $item->qty + 1);
            return redirect('cart');
        }

        //decrease the quantity
        if ($request->rowId  && ($request->decrease) == 1) {	
            $item = Cart::get($request->rowId);

            Cart::update($request->rowId, $item->qty - 1);
             return redirect('cart');
        }


        $cart = Cart::content();

        foreach ($cart as $keys => $value) {
           $attributeOption =  $value->options->attributes;
            if(!empty($attributeOption)){
                foreach ($attributeOption as $key => $value) {
                    $allAttribute[$keys]['attributes'][]=Attributes::select('id','name')->where('id',$key)->first();
                    foreach($value as $attr){
                        $allAttribute[$keys]['attributeOptions'][$key][]=AttributeOption::select('name','attribute_price')->where('id',$attr)->first();
                    }
                }   
            }else{
                 $allAttribute[$keys]=array();
            }
        }

        \Session::put('title_msg','Shopping cart');
        \SEssion::put('metaDescription','Your Total order review in shopping cart');
        return view('frontend.cart', array('cart' => $cart,'allAttribute'=>$allAttribute));
    }
    public function cart_remove_item(Request $request){
    	if($request->rowId) {	
            Cart::remove($request->rowId);
             return redirect('cart');
        }
    }
    public function clear_cart() {
        Cart::destroy();
        return redirect('cart');
    }

    public function checkout() {
        if(Auth::check()){
            $user_id=Auth::user()->id;
            $user_info=Order::where('fk_user_id',$user_id)->first();
         }




        $userInfo=array();
        if(Cart::count()>0){
            $cart = Cart::content();
            if(Auth::check()){
                $userInfo=UserInfo::where('fk_user_id',Auth::user()->id)->first();
            }
        }

       



    	if(Cart::count()>0){
    		$cart = Cart::content();
            foreach ($cart as $keys => $value) {
           $attributeOption =  $value->options->attributes;
            if(!empty($attributeOption)){
                foreach ($attributeOption as $key => $value) {
                    $allAttribute[$keys]['attributes'][]=Attributes::select('id','name')->where('id',$key)->first();
                    foreach($value as $attr){
                        $allAttribute[$keys]['attributeOptions'][$key][]=AttributeOption::select('name','attribute_price')->where('id',$attr)->first();
                    }
                }   
            }else{
                 $allAttribute[$keys]=array();
            }
        }
            \Session::put('title_msg','Checkout');
        \Session::put('metaDescription','Order and buy your products safely.');
        	return view('frontend.checkout',compact('cart','allAttribute','userInfo','user_info'));
    	}else{
    		return redirect('');
    	}
    }
    public function postCheckout(Request $request){



        $cart=Cart::content();
    	$input = $request->except('_token');
        $validator = \Validator::make($request->all(), [
                    'address' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }
               // return $input;
        $id=Order::max('id')+1;
        
        
       

         
         $user_info=UserInfo::where('fk_user_id',Auth::user()->id)->first();
        
         
         if(count($user_info)==0) {
             UserInfo::create([
                'fk_user_id'=>Auth::user()->id,
                'country'=>$request->country,
                'address'=>$request->address,
                'region'=>$request->region
                ]);
         }
      $input['fk_user_id']=Auth::user()->id;
        $input['invoice_id'] = date('ymd').$id;
        $input['cart'] = serialize($cart);
        try{
            $orderId=Order::create($input)->id;
            foreach ($cart as $key => $value) {
                OrderItem::create([
                    'fk_order_id'=>$orderId,
                    'fk_item_id'=>$value->id,
                    'qty'=>$value->qty,
                    'amount'=>$value->price,
                    'attributes'=>serialize($value->options->attributes),
                    'package'=>$value->options->package,
                ]);
            }
            $bug=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $bug2=$e->errorInfo[2];
        }
         if($bug==0){
            
            $config=SmsConfig::first();
            if($config['order_response']>0){
                if($config['sms_quantity']>0){
                    $user= $config->user_name;
                    $password= $config->password;
                    $from= $config->from;
                    $number=$input['phone'];
                    $msg=$config->order_sms;
                    $msg=str_replace(' ','%20',$msg);
                    if($number!=null and strlen($number)>10){
                        $bookingCode=$input['invoice_id'];
                    $xml = file_get_contents("https://api.mobireach.com.bd/SendTextMultiMessage?Username=$user&Password=$password&From=$from&To=$number&Message=$msg%20Your%20booking%20code%20is%20$bookingCode");
                    }
                    $qty['sms_quantity']=$config->sms_quantity-1;
                    $config->update($qty);
                } 
            }    
            Cart::destroy();
            Session::put('invoice_id',$input['invoice_id']);   
        return redirect('checkout-success')->with('success','We Successfully Received your order');
        }else{
            return redirect()->back()->with('error','Something Error Found ! '.$bug2);
        }
    }
    public function successCheckout(){
        if(Session::has('invoice_id')){
            $invoice_id=Session::get('invoice_id');
            \Session::put('title_msg','Order Received');
        \SEssion::put('metaDescription','Your Order is successfully Received.');
        return  view('frontend.checkoutSuccess',compact('invoice_id'));
        }else{
            return redirect()->back();
        }
    }

    public function search($query) {
        return view('products', array('title' => 'Welcome', 'description' => '', 'page' => 'products'));
    }


     public function shippingInfo($val){

         if($val!=1){
        
       
        return view('frontend.shipping.shippingAddress');
    }
       
    }
}
