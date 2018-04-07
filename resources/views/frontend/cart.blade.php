@extends('frontend.app')
@section('content')
<? if(Session::has('commonData')){
	$commonData=Session::get('commonData');
	$currency_symbol=$commonData['primaryInfo']->currency_symbol;
	} ?>
<div class="container">
<div class="row">
	<div id="contents" role="main" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="post-27 page type-page status-publish hentry">
			<div class="entry-content">
				<div class="vc_row wpb_row vc_row-fluid">
					<div class="wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner ">
							<div class="wpb_wrapper">
								<div class="woocommerce">
									@if(count($cart)>0)
                            		<form action="#">
										<table class="shop_table cart" cellspacing="0" border="1">
											<thead>
												<tr>
													<th width="4%">&nbsp;</th>
													<th width="10%">Image</th>
													<th>Product</th>
													<th width="10%">Price</th>
													<th width="10%">Tax</th>
													<th width="15%">Quantity</th>
													<th width="15%">Total</th>
												</tr>
											</thead>
										   
											<tbody>
											@foreach($cart as $rowKey => $product)
                                            <?
                                            $item=$product->options;
                                            //foreach ($item as $option)
                                             $photo= DB::table('item_photo')->where('fk_item_id',$product->id)->value('small_photo');
                                             $link= $item->link;
                                             ?>
												<tr class="cart_item">
													<td class="product-remove">
														<a href='{{url("cart-remove-item?rowId=$product->rowId")}}' class="remove" title="Remove this item">&#215;</a>					
													</td>
													
													<td>
														<a href='{{URL::to("$link")}}'>
														@if($photo!=null)
															<img class="img-responsive attachment-shop_thumbnail size-shop_thumbnail wp-post-image cart_img" alt="{{ $product->name }}" src='{{asset("$photo")}}' />
														@else
															<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image cart_img" alt="{{ $product->name }}" src='{{asset("public/img/item/default.png")}}' />
														@endif

														</a>					
													</td>
													
													<td class="product-name">
														<a href='{{URL::to("$link")}}'>{{ $product->name }}</a>
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
                                              
                                                    <p class="c-p-size"><? echo ($item->package!=null) ? "<span>Package/Size : </span>".$item->package : ''?>
                                                    </p>			
													</td>
												
													<td class="product-price">
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">{{$commonData['primaryInfo']->currency_symbol}}</span>{{ $product->price }}
														</span>					
													</td>
												 	<td class="product-price">
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">{{$commonData['primaryInfo']->currency_symbol}}</span>{{ $product->tax }}
														</span>					
													</td>
												 	
													<td class="product-quantity">
														<div class="quantity">
															<a class="decrease" href='{{url("cart?rowId=$product->rowId&decrease=1")}}'><i class="fa fa-minus-square-o"></i></a>
																<input type="number" step="1" min="0" max="" value="{{$product->qty}}" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" />
															<a class="increment" href='{{url("cart?rowId=$product->rowId&increment=1")}}'><i class="fa fa-plus-square-o"></i></a>
														</div>
													</td>
												 
													<td class="product-subtotal">
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">{{$commonData['primaryInfo']->currency_symbol}}</span>{{ $product->total }}
														</span>					
													</td>
												</tr>
											 @endforeach
												<tr>
													<td colspan="6" class="actions">
														<!-- <div class="coupon">
															<label for="coupon_code">Coupon:</label> 
															<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code" /> 
															<input type="submit" class="button" name="apply_coupon" value="Apply Coupon" />
														</div> -->
													
													</td>
												</tr>
											</tbody>
										</table>
										<div class="r-c-btn">
														<a class="btn btn-info" href="{{url('clear-cart')}}" class="continue-s">Clear Cart</a>
										</div>
									</form>
								
									<div class="cart-collaterals">
										<div class="cart_total">
											<div class="cart_totals ">
												<h2>Cart Totals</h2>
												<table cellspacing="0" class="shop_table shop_table_responsive">
													<tbody>
														<tr class="cart-subtotal">
															<th>Subtotal</th>
															
															<td>
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">{{$currency_symbol}}</span>{{Cart::subtotal()}}
																</span>
															</td>
														</tr>
														<tr class="cart-subtotal">
															<th>Tex</th>
															
															<td>
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">{{$currency_symbol}}</span>{{Cart::tax()}}
																</span>
															</td>
														</tr>
														
														<tr class="order-total">
															<th>Total</th>
															
															<td>
																<strong>
																	<span class="woocommerce-Price-amount amount">
																		<span class="woocommerce-Price-currencySymbol">{{$currency_symbol}}</span>{{Cart::total()}}
																	</span>
																</strong> 
															</td>
														</tr>
													</tbody>
												</table>
												
												<div class="wc-proceed-to-checkout">
													<a href="{{url('checkout')}}" class="btn btn-info">Proceed to Checkout</a>
													<br>
												</div>
												<br>
											 
											</div>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection