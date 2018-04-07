@extends('frontend.app')
@section('content')
<? if(Session::has('commonData')){
    $commonData=Session::get('commonData');
    $currency_symbol=$commonData['primaryInfo']->currency_symbol;
    
    } ?>
<div class="col-lg-12 col-md-12 col-sm-12">
@if(count($cart)>0)
<div class="row">
<div class="col-md-4">
    <p><b>invoice: </b> {{$data->invoice_id}} </p>
    <p><b> Name: </b> {{$data->name}} </p>
    <p><b>Email: </b> {{$data->email}} </p>
    <p><b>Phone no: </b> {{$data->phone}} </p>
    <p><b>Date: </b> {{substr($data->created_at,0,10)}}</p>
    
</div>
<div class="col-md-4">
    <p><b>Country: </b> {{$data->country}} </p>
    <p><b>Region: </b> {{$data->region}}</p>
    <p><b>Shipping address: </b> {{$data->address}} </p>
    <p><b>Payment Method: </b> {{$data->payment_method}}</p>
    @if($data->ref_id!=null)
    <p><b>Trx ID: </b> {{$data->ref_id}}</p>
    @endif
    
</div>
<div class="col-md-4">
    <h5 class="pull-right">Order is 
    @if($data->status==1)
    <label class="label label-info">Processing</label>
    @elseif($data->status==2)
    <label class="label label-success">Accepted</label>
    @elseif($data->status==3)
    <label class="label label-warning">Pending</label>
    @elseif($data->status==0)
    <label class="label label-danger">Cancel</label>
    @endif
    </h5>
</div>
</div>
    <div class="cart-table table-responsive">
        <table>
            <thead>
                <tr>
                    <th class="p-image">Product</th>
                    <th class="p-name">Product Name</th>
                    <th class="p-amount">Option</th>
                    <th class="p-amount">Price</th>
                    <th class="p-amount">Tex</th>
                    <th class="p-quantity">Quantity</th>
                    <th class="p-total">Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cart as $rowKey => $product)
                <tr>
                <?
                $photo= DB::table('item_photo')->where('fk_item_id',$product->id)->value('small_photo');
                $item=$product->options;
                 $link= $item->link;
                 ?>
                    <td class="p-image"><a href='{{URL::to("$link")}}'>
                @if($photo!=null)
                    <img class="cart_image" alt="{{ $product->name }}" src='{{asset("$photo")}}'>
                @else
                    <img class="cart_image" alt="{{ $product->name }}" src='{{asset("public/img/item/default.png")}}'>
                @endif
                    </a></td>
                    <td class="p-name">
                        <a href='{{URL::to("$link")}}'>{{ $product->name }}</a>
                        

                    </td>
                    <td class="p-amount">
                        <span class="amount">
                    @if(count($allAttribute[$rowKey])>0)
                        @foreach($allAttribute[$rowKey]['attributes'] as $attributes)
                            <p><b>{{$attributes->name}}: </b>
                            @foreach($allAttribute[$rowKey]['attributeOptions'][$attributes->id] as $option => $attributeOptions)
                            <?php
                              if($attributeOptions!=null){
                                if($option>0){
                                echo ','.$attributeOptions->name.'('.$attributeOptions->attribute_price.' '.$currency_symbol.')';
                                }else{
                                  echo $attributeOptions->name.'('.$attributeOptions->attribute_price.' '.$currency_symbol.')';
                                }
                              }
                                ?>
                            @endforeach
                            </p>
                        @endforeach
                    @endif
                        <p class="c-p-size"><? echo ($item->instruction!=null) ? "<span>Instruction : </span>".$item->instruction : ''?>
                            </p>
                            <p class="c-p-size"><? echo ($item->package!=null) ? "<span>Package/Size : </span>".$item->package : ''?>
                            </p></span>
                    </td>
                    <td class="p-amount"><span class="amount">{{$currency_symbol}}{{ $product->price }}</span></td>
                    <td class="p-amount"><span class="amount">{{$currency_symbol}}{{ $product->tax }}</span></td>

                    <td class="p-quantity cart_quantity">
                    <b>{{$product->qty}}</b>
                    </td>
                    <td class="p-total">{{$currency_symbol}}{{ $product->total }}</td>
                    <td class="p-action"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        
        <div class="col-md-4 col-md-offset-8">
            <div class="cart-coupon-rightside">
                <div class="amount-table table-responsive">
                    <table>
                        <tbody>
                            <tr>
                                @if($data->delivery==1)
                                    <p>Delivered in 2 - 5 days at your doorstep(Around Dhaka) for {{$currency_symbol}} {{$commonData['primaryInfo']->doorstep}}.</p>
                                    @else
                                    <p>Delivered in 3 - 10 days at nearby pick-up station for {{$currency_symbol}} {{$commonData['primaryInfo']->pick_up_station}}.</p>
                                @endif
                            </tr>
                            <tr class="g-total">
                                <td>Grand Total</td>
                                <td><span>{{$currency_symbol}}{{ $data->total_amount }}</span></td>
                            </tr> 

                        </tbody>
                    </table>
                </div>
            </div>
            @if($data->status==4)
                <p>Delivered By : {{$data->delivered_by}}</p>
                <p>Date and Time : {{date('h:i A, jS M, Y',strtotime($data->date_time))}}</p>
            @endif
            
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h2>No Items in Cart!</h2>
        </div>
    </div>
@endif
</div>
            
@endsection