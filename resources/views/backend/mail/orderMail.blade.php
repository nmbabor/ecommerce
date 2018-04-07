<? $currency_symbol=$info->currency_symbol; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation </title>
	<style type="text/css">
		table, th, td {
		    
		    text-align: center;
		}
		table td, th{
			border: 1px solid #ddd;
			padding: 5px;
		}
		.cart_image{width: 100px;height:80px;float: left;}
		.label{padding: 2px;text-shadow: 1px 1px 1px #000;font-size: 15px;}
		.label-info{color:blue;}
		.label-success{color:green;}
		.label-warning{color:yellow;}
		.label-danger{color:red;}

	</style>
</head>
<body>
<h5 class="pull-right">Order is 
    @if($input['status']==1)
    <label class="label label-info">Processing</label>
    @elseif($input['status']==2)
    <label class="label label-success">Accepted</label>
    @elseif($input['status']==3)
    <label class="label label-warning">Pending</label>
    @elseif($input['status']==0)
    <label class="label label-danger">Cancel</label>
    @endif
    </h5>
<table width="100%" >
	<tr>
		<td><b>Name: </b>  {{$data->name}}</td>
		<td><b>Invoice: </b>   {{$data->invoice_id}}</td>
		<td><b>Email: </b>   {{$data->email}}</td>
	</tr>
	<tr>
		<td><b>Region: </b> {{$data->region}}</td>
		<td><b>Country: </b> {{$data->country}}</td>
		<td><b>Shipping address: </b> {{$data->address}}</td>
		
	</tr>
	<tr>
		<td><b>Payment Method: </b> {{$data->payment_method}}</td>
		<td><b>Date: </b> {{substr($data->created_at,0,10)}}</td>
		<td></td>
		
	</tr>
</table>
<h3>Oder List</h3>
<table width="100%">
	<thead>
		<tr>
			<th>PRODUCT</th>
			<th>PRODUCT NAME</th>
			<th>OPTION</th>
			<th>PRICE</th>
			<th>TEX</th>
			<th>QUANTITY</th>
			<th>TOTAL</th>
		</tr>
	</thead>
	<tbody>
	<? $cart=unserialize($data['cart']);
	
	 ?>
		@foreach($cart as $rowKey => $product)
                <tr>
                <?
                $item=$product->options;
                 $photo= DB::table('item_photo')->where('fk_item_id',$product->id)->value('photo');
                 $link= $item->link;
                 ?>
                    <td class="p-image"><a href='{{URL::to("$link")}}'>
                    @if($photo!=null)
                    <img class="cart_image" alt="{{ $product->name }}" src='{{asset("public/img/item/$photo")}}'>
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
                    
                </tr>
            @endforeach
	</tbody>
</table>
<table style="float: right;">
    <tbody>
        <tr class="g-total">
            <td><b>Grand Total: </b></td>
            <td><span>{{$currency_symbol}}{{ $data->total_amount }}</span></td>
        </tr>                                           
    </tbody>
</table>
<p>Thank you for your order. Please stay with <a href="{{URL::to('/')}}">{{$info->company_name}}</a></p>
</body>
</html>