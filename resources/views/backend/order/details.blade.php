@extends('backend.app')
@section('content')
<? if(Session::has('commonData')){
    $commonData=Session::get('commonData');
    $currency_symbol=$commonData['primaryInfo']->currency_symbol;
    $companyInfo=$commonData['primaryInfo'];
    
    } ?>
<div class="col-lg-12 col-md-12 col-sm-12">
@if(count($cart)>0)
<div id="print_body">
    <style type="text/css">
        .cart_image{width: 100px;height:80px;float: left;}
        .printable{display: none;}
        @media print {
            #print_body{overflow: hidden;margin-top: -100px}
            .printable{display:inline-block;}
            .no-print{display: none;}
            .col-md-6{width: 50%;float: left;}
            .row{width: 100%;overflow: hidden;}
            a[href]:after {
                content: none !important;
              }
              .customerInfo p{margin: 0;line-height: 16px;}
              input{border: 0;}

        @page {
            size: auto;
            margin: 1cm;
            margin-top: 0 !important;
        }
          
        }        
    </style>
    <div class="print_top printable" style="width: 100%; overflow: hidden;border-bottom:1px solid #ddd;padding-bottom: 5px;margin-bottom: 5px;">
        <div class="view_logo" style="margin: 0 auto;width: 100%;text-align: center;">
            
            <h3 style="margin-top: 0;margin-left: 20px;"><img class="print-logo" src='{{asset("public/img/$companyInfo->logo")}}' style="width: 100px; height: auto;margin-right:30px;"><strong>{{$companyInfo->company_name}}</strong></h3>
        </div>
        <div class="view_company_info" style="width: 100%; float: left; margin-left: 10px;text-align: center;">
            <?php echo $companyInfo->address; ?><br />
            Phone: {{$companyInfo->mobile_no}}, Email: {{$companyInfo->email}}
        </div>
    </div>
<div class="row">
<div class="col-md-6 customerInfo">
    <p><b>Invoice: </b> {{$data->invoice_id}} </p>
    <p><b> Name: </b> {{$data->name}} </p>
    <p><b>Email: </b> {{$data->email}} </p>
    <p><b>Phone no: </b> {{$data->phone}} </p>
    <p><b>Order Date: </b> {{date('h:i A, jS M, Y',strtotime($data->created_at))}}</p>
    
</div>
<div class="col-md-4 customerInfo">
    <p><b>Country: </b> {{$data->country}} </p>
    <p><b>Region: </b> {{$data->region}}</p>
    <p><b>Address: </b> {{$data->address}} </p>
    <p><b>Payment Method: </b> {{$data->payment_method}}</p>
    @if($data->ref_id!=null)
    <p><b>Trx ID: </b> {{$data->ref_id}}</p>
    @endif
    <p><b>Delivery Date: </b> {{date('h:i A, jS M, Y',strtotime($data->date_time))}}</p>

    
</div>
<div class="col-md-2 no-print">
    <h5 class="pull-right">Order  
    @if($data->status==1)
    <label class="label label-info">Processing</label>
    @elseif($data->status==2)
    <label class="label label-primary">Accepted</label>
    @elseif($data->status==3)
    <label class="label label-warning">Pending</label>
    @elseif($data->status==0)
    <label class="label label-danger">Cancel</label>
    @elseif($data->status==4)
    <label class="label label-success">Delivered</label>
    @endif
    </h5>
</div>
</div>
<br>
    <div class="cart-tables">
        <table class="table table-bordered">
            <thead>
                <tr>
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
                $item=$product->options;
                 $link= $item->link;
                 ?>
                   
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

                    <td>
                    <b>{{$product->qty}}</b>
                    </td>
                    <td class="p-total">{{$currency_symbol}}{{ $product->total }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6"">
            @if($data->delivery==1)
                <p>Delivered in 2 - 5 days at doorstep(Around Dhaka) for <b>{{$currency_symbol}} {{$commonData['primaryInfo']->doorstep}}</b>.</p>
            @else
                <p>Delivered in 3 - 10 days at nearby pick-up station for <b> {{$currency_symbol}} {{$commonData['primaryInfo']->pick_up_station}}</b>.</p>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>Grand Total  </th>
                    <th>{{$currency_symbol}}{{ $data->total_amount }}</th>
                </tr>
            </table>
            <p>Delivered By : {{ $data->delivered_by }}</p>
        </div>
        <p align="center" style="width: 100%">Thank you for your order. Please stay with <a href="{{URL::to('/')}}">{{$info->company_name}}</a></p>
    </div>
</div>

        <div class="col-md-6 col-md-offset-6">
        @if($data->status==2)
            <div class="dalivery">
                {!! Form::open(['route'=>['order.update',$data->id],'method'=>'PUT']) !!}
                <div class="form-group">
                    <label class="col-md-12">Delivered By</label>
                    <div class="col-md-12">
                        <input type="text" name="delivered_by" placeholder="Delivered By" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Date and Time</label>
                    <div class="col-md-12">
                        <input type="datetime-local" name="date_time" value="{{date('Y-m-d\TH:i')}}" placeholder="Date Time" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>&nbsp;</label>
                    <div class="col-md-12">
                        <button class="btn btn-success">Delivered</button>
                        @if($data->status!=0)
                            <a href='{{URl::to("order/$data->id/edit?action=0")}}' class="btn btn-danger">Cancel</a>
                        @endif
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        @else
            <div class="order_action">
            @if($data->status!=2 and $data->status!=4)
                <a href='{{URl::to("order/$data->id/edit?action=2")}}' class="btn btn-success">Accept</a>
            @endif
            @if($data->status!=3 and $data->status!=1)
                <a href='{{URl::to("order/$data->id/edit?action=3")}}' class="btn btn-warning">Pending</a>
            @endif
            @if($data->status!=0)
                <a href='{{URl::to("order/$data->id/edit?action=0")}}' class="btn btn-danger">Cancel</a>
            @endif
            <button class="btn btn-primary"  onclick="printPage('print_body')">Print</button>
            </div>
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
</div>                  
@endsection
@section('script')
<script src="{{asset('public/backend/js/printThis.js')}}"></script>
<script type="text/javascript">
    function printPage(id){
        $('#'+id).printThis({
            importStyle: false,
        });
    }
</script>
@endsection
