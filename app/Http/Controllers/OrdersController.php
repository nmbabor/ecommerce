<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderMail;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Model\Order;
use App\Model\Attributes;
use App\Model\AttributeOption;
use App\Model\PrimaryInfo;
use App\Model\Items;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData=Order::leftJoin('users','orders.fk_user_id','users.id')->select('orders.id','orders.invoice_id','orders.total_amount','orders.status','name','phone','email')->orderBy('orders.id','DESC')
        ->where('orders.status',1)->paginate(20);
        return view('backend.order.index',compact('allData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info=PrimaryInfo::first();
        $data=Order::leftJoin('users','orders.fk_user_id','users.id')->select('orders.*','name','phone','email')->where('orders.id',$id)->first();
        $cart=unserialize($data->cart);
        //return $cart;
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
        return view('backend.order.details',compact('data','cart','allAttribute','info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, Mailer $mailer)
    {
        $updateItem=array();
        $data=Order::findOrFail($id);
        $info=PrimaryInfo::first();
        $input['status']=$request->action;
        $cart=unserialize($data['cart']);
        foreach ($cart as $keys => $value) {
            $singleItem=Items::findOrFail($value->id);
            $updateItem['quantity']=$singleItem->quantity-$value->qty;
            if($request->action==2){
                $singleItem->update($updateItem);
            }
            if($request->action==0 and $data->status!=1){
                $updateItem['quantity']=$singleItem->quantity+$value->qty;
                $singleItem->update($updateItem);
            }

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
        
        $data->update($input);
        //return view('backend.mail.orderMail', ['data' => $data, 'cart'=>$cart, 'allAttribute'=>$allAttribute, 'input'=>$input,'info'=>$info]);
        /*Mail::send('backend.mail.orderMail', ['data' => $data, 'cart'=>$cart, 'allAttribute'=>$allAttribute, 'input'=>$input,'info'=>$info], function ($m) use ($data,$info) {
            $m->from('hellloecommerce2016@gmail.com', $info->company_name);

            $m->to($data->email, $data->name)->subject('Your Order List');
        });*/
       
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input=$request->except('_token');
        $data=Order::findOrFail($id);
        $data->update([
            'delivered_by'=>$input['delivered_by'],
            'date_time'=>$input['date_time'],
            'status'=>4,
        ]);
        return redirect()->back()->with('success','Delivered Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data=Order::findOrFail($id);
        try{
            $data->delete();
            $bug=0;
            $error=0;
        }catch(\Exception $e){
            $bug=$e->errorInfo[1];
            $error=$e->errorInfo[2];
        }
        if($bug==0){
       return redirect('order')->with('success','Data has been Successfully Deleted!');
        }elseif($bug==1451){
       return redirect('order')->with('error','This Data is Used anywhere ! ');

        }
        elseif($bug>0){
       return redirect('order')->with('error','Some thing error found !');

        }
    }
    public function received()
    {
        $allData=Order::leftJoin('users','orders.fk_user_id','users.id')->orderBy('id','desc')
        ->select('orders.id','orders.invoice_id','phone','orders.total_amount','email','name','orders.status')->where('orders.status',2)
        ->paginate(20);
        return view('backend.order.index',compact('allData'));
    }
    public function allOrder()
    {
        $allData=Order::leftJoin('users','orders.fk_user_id','users.id')
        ->select('orders.id','orders.invoice_id','phone','orders.total_amount','email','name','orders.status')
        ->orderBy('orders.id','DESC')->latest('orders.created_at')->paginate(20);
        return view('backend.order.index',compact('allData'));
    }
    public function delivered()
    {
        $allData=Order::leftJoin('users','orders.fk_user_id','users.id')->orderBy('id','desc')
        ->select('orders.id','orders.invoice_id','phone','orders.total_amount','email','name','orders.status')
        ->where('orders.status',4)
        ->paginate(20);
        return view('backend.order.index',compact('allData'));
    }
 public function cancelOrder()
    {
        $allData=Order::leftJoin('users','orders.fk_user_id','users.id')->orderBy('id','desc')
        ->select('orders.id','orders.invoice_id','phone','orders.total_amount','email','name','orders.status')
        ->where('orders.status',0)
        ->paginate(20);
        return view('backend.order.index',compact('allData'));
    }






}
