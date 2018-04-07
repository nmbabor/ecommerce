@extends('frontend.app')
@section('content')
<? if(Session::has('commonData')){
	$commonData=Session::get('commonData');
	$currency_symbol=$commonData['primaryInfo']->currency_symbol;
	} ?>
<style type="text/css">
	td, th {
	    padding: 5px;
	    text-align: center;
	}
</style>
<div class="container">
<div class="row">
<div class="payment_info">
		<div class="panel panel-default">
		  <div class="panel-heading">My Wishlist</div>
		  <div class="panel-body">
		    <table class="shop_table cart" cellspacing="0" border="1">
				<thead>
					<tr>
						<th width="10%">Image</th>
						<th>Product</th>
						<th width="10%">Price</th>
						<th width="15%">Date</th>
						<th width="15%">Add to cart</th>
						<th width="10%">Remove</th>
					</tr>
				</thead>
			   
				<tbody>
					@foreach($allData as $data)
					<tr>
						<td>
							<a href='{{URL::to("$data->link")}}'>
							@if($data->photo!=null)
								<img class="img-responsive attachment-shop_thumbnail size-shop_thumbnail wp-post-image cart_img" alt="{{ $data->item_name }}" src='{{asset("$data->photo")}}' />
							@else
								<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image cart_img" alt="{{ $data->item_name }}" src='{{asset("public/img/item/default.png")}}' />
							@endif

							</a>					
						</td>
						
						<td class="product-name">
							<a href='{{URL::to("$data->link")}}'>{{ $data->item_name }}</a><br>

						</td>
						<td class="product-price">
							<span class="woocommerce-Price-amount amount">
								<span class="woocommerce-Price-currencySymbol">{{$commonData['primaryInfo']->currency_symbol}}</span>{{ $data->sale_price }}
							</span>					
						</td>
						<td>{{date('jS M , Y',strtotime($data->created_at))}}</td>
						<td><a href='{{URL::to("$data->link")}}' class="btn btn-warning"><i class="fa fa-cart-plus"></i> Add to cart</a></td>
						<td><a href='{{URL::to("wishlist-delete/$data->id")}}' class="btn btn-danger"><i class="fa fa-times"></i></a></td>
					</tr>
				@endforeach
				</tbody>
			</table>

		  </div>
		</div>
	</div>
	</div>
	</div>
			
@endsection