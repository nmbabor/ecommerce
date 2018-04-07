@extends('frontend.app')
@section('content')
	<? if(Session::has('commonData')){
	$commonData=Session::get('commonData');
	$currency_symbol=$commonData['primaryInfo']->currency_symbol;
	
	} ?>
	<div class="single-product clearfix">
		<div itemscope="" id="product-01" class="product">
			<div class="single-product-top row">

				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<div class="clearfix" id="content">
					<div class="clearfix col-md-2 no-padding" >
						<ul id="thumblist" class="clearfix" >
					    <? $j=0;?>
						@if(count($photos['itemPhoto'])>0)
							@foreach($photos['itemPhoto'] as $photo)
					    <? $j++;
					    $itemSinglePhoto=URL::to("public/img/item$photo->photo");
					    $itemSmallPhoto=URL::to("public/img/item/small$photo->photo");
					    ?>
							<li><a class="{{($j==1)?'zoomThumbActive':''}}" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<? echo  $itemSmallPhoto ?>',largeimage: '<? echo  $itemSinglePhoto ?>'}"><img src="<? echo  $itemSmallPhoto ?>"></a></li>
							@endforeach
						@else
							<li><img class="img-responsive" alt="{{$data->item_name}}" src='{{asset("public/img/item/default.png")}}'/></li>
						 @endif
						</ul>
						</div>
					    <div class="big-image clearfix col-md-10 no-padding">
					    <? $i=0;?>
					@if(count($photos['itemPhoto'])>0)
						<? foreach($photos['itemPhoto'] as $photo){?>
					    <? $i++;?>
					        <a href='{{asset("public/img/item/$photo->photo")}}' class="jqzoom" rel='gal1'  title="{{$data->item_name}}" >
						    @if($data->quantity==0)
								<span class="onsale">Sold!</span>
							@endif
					            <img class="img-responsive big-img" alt="{{$data->item_name}}" title="{{$data->item_name}}" src='{{asset("public/img/item/small$photo->photo")}}'>
					        </a>
					        <? if($i>0){break;} 
					        }?>
					 @else
					 <img class="img-responsive" alt="{{$data->item_name}}" src='{{asset("public/img/item/default.png")}}'/>
					 @endif

					    </div>
					</div>

				</div>
			
				<div class="product-summary col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<h1 class="product_title">{{$data->item_name}}</h1>
					<p><? echo $data->long_title ?></p>
					{!! Form::open(array('url' => 'cart','method'=>'POST')) !!}
					<div>
						<p class="price" id="packagePrice" style="margin-bottom: 0;">
							<ins><span>{{$currency_symbol}}</span><span id="item_price">{{$data->sale_price}}
                              </span>
							<span>

								<input id="package_price" type="hidden" name="price" value="{{$data->sale_price}}" >
									</span>
							</ins>
						</p>
						@if($data->regular_price>0)
						<small class="regular_price"> <del><? echo($data->regular_price>0)? "$currency_symbol $data->regular_price" : '' ?></del> </small>
						@endif

					</div>
					
					<input type="hidden" value="{{$data->id}}" name="id">
					<div class="product-summary-bottom clearfix">
						<div class="artt">
                        @if(count($itemPackage)>0)
                        <div class="col-sm-12">
                            <div class="form-group select-option">
                                <label class="col-sm-4">Select Option : </label>
                                <div class="col-sm-8">
                                <select name="package_id" class="form-control" onchange="packagePrice(this.value)" required >
                                    <option value=""> - select - </option>
                                    @foreach($itemPackage as $itemPackageData)
                                    <option value="{{$itemPackageData->id}}" >{{$itemPackageData->package_title}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                         </div>
                        @endif
                        </div>
                        <div class="artt col-sm-12">
                            <? $i=0; ?>
                            @foreach($attributes as $key => $attr)
                            <? $attrId=$attr['id']; ?>
                                @if($attr['attribute_type']==1)
                                <input type="hidden" id="oldSelectPrice{{$attrId}}" value="0" class="oldSelectPrice">

                                    <div class="form-group select-option">
                                        <label class="col-sm-4">{{$attr->name}} </label>
                                        
                                        <div class="col-sm-8">
                                        <select class="form-control" name="attributes[{{$attr->id}}][]" {{($attr['required']==1)? 'required' : ''}} <? if($attr['additional']!=0){?> onchange="loadAttrQty(this.value,{{$attrId}})"<?}?> id="attributesSelect">
                                            <option value="">--select--</option>
                                            @foreach($attributeOptions as $option)
                                            @if($option->fk_attribute_id==$attr->id)
                                            <option value="{{$option->opt_id}}">{{$option->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>

                                @elseif($attr['attribute_type']==2)
                                <? $required= ($attr['required']==1)? 'required' : '';
                                ?>
                                <input type="hidden" id="oldRadioPrice{{$attrId}}" value="0" class="oldRadioPrice">
                                <div class="form-group {{($attr['required']==1)? 'required' : ''}}{{$attrId}}" id="radio{{$attrId}}">
                                    <b class="radio_label" id="{{$attr['name']}}">{{$attr['name']}} :</b>
                                    <? $r=0; ?>
                                    @foreach($attributeOptions as $option)
                                        @if($option->fk_attribute_id==$attr->id)
                                        <? $r++; ?>
                                        <div class="radio_label">
	                                        <input id="radio-{{$option->opt_id}}" type="radio" class="single_radio" name="attributes[{{$attr->id}}][]" value="{{$option->opt_id}}" <? if($attr['additional']!=0){?>
	                                        	onchange="loadAttrQtyRadio(this.value,{{$attrId}})"
	                                        	<?} ?> {{($r==1)?$required:''}}> 
                                        	<label for="radio-{{$option->opt_id}}">
	                                        {{$option->name }}
                                        		
                                        	</label>
                                        </div>
                                        
                                        @endif
                                    @endforeach
                                </div>
                                @else
                                <div class="form-group checkbox {{($attr['required']==1)? 'required' : ''}}{{$attrId}}" id="checkbox{{$attrId}}">
                                    <h5 id="{{$attr['name']}}">{{$attr['name']}}</h5>
                                    @foreach($attributeOptions as $option)
                                        @if($option->fk_attribute_id==$attr->id)
                                        <div class="check_box_label">
	                                        <input id="checkbox-{{$option->opt_id}}" type="checkbox" class="single_checkbox" name="attributes[{{$attr->id}}][]" value="{{$option->opt_id}}" onchange="loadAttrQty1(this,this.value,{{$data->quantity}})"> 
                                        	<label for="checkbox-{{$option->opt_id}}">
	                                        {{$option->name }}
                                        		
                                        	</label>
                                        </div>
                                        
                                        @endif
                                    @endforeach
                                </div>
                                <script type="text/javascript">
                                $(document).ready(function(){
                                    var attr = "<? echo $attr['name'] ?>";
                                     $("#adToCart").click(function(){
                                <? if($attr['required']==1){?>
                                             checked = $(".required<? echo $attr['id'] ?> input[type=checkbox]:checked").length;
                                          if(!checked) {
                                            alert("You must check at least one "+attr);
                                            return false;
                                          }
                                    <?}if($attr['min']>0){?>
                                            var min = <? echo $attr['min']; ?>;
                                   
                                           if ($("#checkbox<? echo $attrId ?> input.single_checkbox:checked").length < min) {
                                                alert(attr+" Minimum Select "+min+" Option");
                                            }
                                    <?}?>
                                    });
                                 <? if($attr['max']>0){?>
                                        var max = <? echo $attr['max']; ?>;
                                        $("#checkbox<? echo $attrId ?> input.single_checkbox").on('change', function(evt) {
                                               if ($("#checkbox<? echo $attrId ?> input.single_checkbox:checked").length > max) {
                                                    $(this).prop('checked', false);
                                                    alert(attr+" Allowed only "+max);
                                                }
                                            });
                                        <? } ?>
                                    
            
                                });
                                </script>
                                    
                                @endif

                            @endforeach

                        </div>
                        <div class="qty-input">
                        	<b class="qty-label">Quantity:</b>
							<div class="quantity" style="margin-right: 5px;">
								<input type="number" step="1" min="1" max="{{$data->quantity}}" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric" id="item_quentity" />
								<input type="hidden" id="oldQuantity" value="{{$data->quantity}}">
							</div>&nbsp;
                        </div>
                        <br>
						@if($data->quantity>0)
						<button type="submit" class=" button alt single_add_to_button">Add to cart</button>
						@endif
							
							<div class="social-icon pull-right">
								<div class="social-icon-button"></div>

								<div class="social-share">
									<div class="social-share-fb social-share-item">
										<div class="fb-like" data-href="" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false"></div>
									</div>
		
									<!--Facebook Button-->
									<div class="social-share-twitter social-share-item">
										<a href="https://twitter.com/share" class="twitter-share-button" data-url="" data-text="Umas tika lorem narem" data-count="horizontal">Tweet</a>
										<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script> 
									</div>

									<!--Twitter Button-->
									<div class="social-share-linkedin social-share-item">
										<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script> 
										<script type="IN/Share" data-url="" data-counter="right"></script> 
									</div>
								</div>
							</div>
						{{Form::close()}}
					</div>
				</div>
			</div>
	
			<!-- .summary -->
			<div class="row">
				<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 tab-col-3">
					<div id="relate-01" class="carousel slide sw-related-product" data-ride="carousel" data-interval="0">
						<div class="block-title title1">
							<h2>
								<span>Latest Products</span>
							</h2>
							
							<div class="customNavigation nav-left-product">
								<a title="Previous" class="btn-bs prev-bs fa fa-angle-left" href="#relate-01" role="button" data-slide="prev"></a>
								<a title="Next" class="btn-bs next-bs fa fa-angle-right" href="#relate-01" role="button" data-slide="next"></a>
							</div>
						</div>
						
						<div class="carousel-inner">
							<div class="item active">
							@foreach($latestItem as $latest)
							<? $photo=$photos['latestItemPhoto'][$latest->id]; ?>
								<div class="bs-item cf">
									<div class="bs-item-inner">
										<div class="item-img">
										@if($latest->quantity==0)
											<span class="onsold">Sold</span>
										@endif
											<a href='{{URL::to("$latest->link")}}' title="Tausage porchetta">
											@if($photo!=null)
												<img width="180" height="180" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="{{$latest->item_name}}" src='{{asset("public/img/item/$photo->photo")}}' />
											@else
												<img width="180" height="180" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt="{{$latest->item_name}}" src='{{asset("public/img/item/default.png")}}' />
											@endif
											</a>
										</div>
										
										<div class="item-content">
											
											<h4>
												<a href='{{URL::to("$latest->link")}}' title="{{$latest->item_name}}">{{$latest->item_name}}</a>
											</h4>
											
											<p>
												<span class="woocommerce-Price-amount amount">
													<span class="woocommerce-Price-currencySymbol">{{$commonData['primaryInfo']->currency_symbol}}</span>
																		{{$latest->sale_price}}
												</span>
											</p>
										</div>
									</div>
								</div>
							@endforeach
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 tab-col-9 description">
					<div class="woocommerce-tabs wc-tabs-wrapper">
						<ul class="tabs wc-tabs">
							<li class="description_tab active">
								<a href="#tab-description">Description</a>
							</li>
							<li class="reviews_tab">
								<a href="#tab-reviews">Reviews ({{count($review)}})</a>
							</li>
							<li class="description_tab">
								<a href="#tab-size">Size Guide</a>
							</li>
							<li class="description_tab">
								<a href="#tab-return">Return Policy</a>
							</li>
						</ul>
						
						<div class="panel entry-content wc-tab" id="tab-description" style="display: block;">
							<? echo $data->short_description; ?>
						</div>
						<div class="panel entry-content wc-tab" id="tab-size" style="display: block;">
							<? echo(isset($extraInfo->size_guide)?$extraInfo->size_guide:'') ?>
						</div>
						<div class="panel entry-content wc-tab" id="tab-return" style="display: block;">
							<? echo(isset($extraInfo->return_policy)?$extraInfo->return_policy:'') ?>
						</div>
						<div class="panel entry-content wc-tab" id="tab-reviews" style="display: none;">
							<div id="reviews">
									<h2>Reviews</h2>
							@if(Auth::check()==true)
							@if(count($userReview)==0)											
								<div id="review_form_wrapper">
									<div id="review_form">
										<div id="respond" class="comment-respond">
											
											{!! Form::open(array('route' => 'review.store','class'=>'comment-form','id'=>'commentform')) !!}
											
												<p class="comment-form-rating">
													<label for="rating">Your Rating</label>
													
													<select name="rating" id="rating" style="display: none;" required>
														<option value="">Rate…</option>
														<option value="5">Perfect</option>
														<option value="4">Good</option>
														<option value="3">Average</option>
														<option value="2">Not that bad</option>
														<option value="1">Very Poor</option>
													</select>
												</p>
												<input type="hidden" name="fk_item_id" value="{{$data->id}}">
												 @if ($errors->has('rating'))
							                        <span class="help-block">
							                            <strong>{{ $errors->first('rating') }}</strong>
							                        </span>
							                    @endif
							                    @if ($errors->has('fk_user_id'))
							                        <span class="help-block">
							                            <strong class="text-danger">{{ $errors->first('fk_user_id') }}</strong>
							                        </span>
							                    @endif
												<p class="comment-form-comment">
													<label for="comment">Your Review</label>
													<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
												</p>
												@if ($errors->has('comment'))
							                        <span class="help-block">
							                            <strong class="text-danger">{{ $errors->first('comment') }}</strong>
							                        </span>
							                    @endif
												
												<p class="form-submit">
													<button class="btn btn-primary submit" id="submit" >Submit</button>
												</p>
											{{Form::close()}}
										</div>
										<!-- #respond -->
									</div>
								</div>
								@else
								@if($userReview->status==0)
								<div class="single-review">
								<p class="text-danger">Review is submitted for approval</p>
										<h4><i class="fa fa-user"></i> {{$userReview->name}} - <small class="text-success"> {{$userReview->rating}}<i class="fa fa-star"></i></small>
										@if($userReview->fk_user_id==Auth::user()->id)
										<small class="pull-right"><a href="#editModal{{$data->id}}" data-toggle="modal" class="fa fa-pencil-square text-primary"></a></small>
										@endif
										</h4>
					<!-- Modal -->
<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Review</h4>
      </div>
        {!! Form::open(array('route' => ['review.update',$userReview->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
      <div class="modal-body">
			<label>Your Rating</label>
			<div class="col-md-12 rating-radio">
			<? for ($i=1; $i < 6; $i++) { ?>
			<input type="radio" value="{{$i}}" name="rating" id="raitngs-{{$i}}" {{($userReview->rating==$i)?'checked':''}}>
				<label for="raitngs-{{$i}}"><i class="fa fa-star{{($userReview->rating==$i)?'':'-o'}}"></i></label>
			<?} ?>
				
			</div>
		<p class="comment-form-comment">
			<label for="comment col-md-12">Your Review</label>
			<textarea class="col-md-12" id="comment" name="comment" cols="45" rows="8" aria-required="true">{{$userReview->comment}}</textarea>
		</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{{Form::submit('Save changes',array('class'=>'btn btn-info'))}}
      </div>
		{!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
										<h6>{{$userReview->comment}}</h6>
									</div>
@endif
								@endif
								@endif
								<div id="comments">
								@if(count($review)>0)
								@foreach($review as $rev)
									<div class="single-review">
										<h4><i class="fa fa-user"></i> {{$rev->name}} - <small class="text-success"> {{$rev->rating}}<i class="fa fa-star"></i></small>
									@if(Auth::check())
										@if($rev->fk_user_id==Auth::user()->id)
										<small class="pull-right"><a href="#editModal{{$data->id}}" data-toggle="modal" class="fa fa-pencil-square text-primary"></a></small>
										@endif
									@endif
										</h4>
					<!-- Modal -->
<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Review</h4>
      </div>
        {!! Form::open(array('route' => ['review.update',$rev->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
      <div class="modal-body">
			<label>Your Rating</label>
			<div class="col-md-12 rating-radio">
			<? for ($i=1; $i < 6; $i++) { ?>
			<input type="radio" value="{{$i}}" name="rating" id="raitng-{{$i}}" {{($rev->rating==$i)?'checked':''}}>
				<label for="raitng-{{$i}}"><i class="fa fa-star{{($rev->rating==$i)?'':'-o'}}"></i></label>
			<?} ?>
				
			</div>
		<p class="comment-form-comment">
			<label for="comment col-md-12">Your Review</label>
			<textarea class="col-md-12" id="comment" name="comment" cols="45" rows="8" aria-required="true">{{$rev->comment}}</textarea>
		</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{{Form::submit('Save changes',array('class'=>'btn btn-info'))}}
      </div>
		{!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
										<h6>{{$rev->comment}}</h6>
									</div>
								@endforeach
								@else
									<p class="woocommerce-noreviews">There are no reviews yet.</p>
								@endif
								</div>
								@if(Auth::check()!=true)
									         <div class="col-md-12">
									            <div class="panel panel-default">
									              <div class="panel-heading"><i class="fa fa-sign-in"></i> For submit your review please login</div>
									              <div class="panel-body">
										              <div class="col-md-8 col-md-offset-2">
										              	<div class="facebok_login_box text-center">
										                      <p>Are you on Facebook?</p>
										                       <a href="{{URL::to('/login/facebook')}}" title="Login With Facebook" class="btn btn-primary"><i class="fa fa-facebook-official"></i> Login With Facebook</a>
										                  </div>
										                     <br>
										                <form class="form-inline" action="{{ url('/login') }}" method="POST">
										                {{ csrf_field() }}
										                  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
										                    <label class="sr-only" for="email">Email</label>
										                    <div class="input-group">
										                      <div class="input-group-addon"><i class="fa fa-user"></i></div>
										                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
										                    </div>
										                    @if ($errors->has('email'))
										                        <span class="help-block">
										                            <strong>{{ $errors->first('email') }}</strong>
										                        </span>
										                    @endif
										                  </div>
										                  <br>
										                  <br>
										                  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
										                    <label class="sr-only" for="password">Password</label>
										                    <div class="input-group">
										                      <div class="input-group-addon"><i class="fa fa-lock"></i></div>
										                      <input type="password" class="form-control" id="password" name="password" placeholder="password">
										                    </div>
										                    @if ($errors->has('password'))
										                        <span class="help-block">
										                            <strong>{{ $errors->first('password') }}</strong>
										                        </span>
										                    @endif
										                  </div>
										                  <br>
										                  <br>
										                  <div class="ft-link-p">
										                        <a href="{{url('/reset-password')}}" title="Forgot your password">Forgot your password?</a>
										                    </div>
										                    <br>
										                    
										                    <div class="actions">
										                        <div class="submit-login">          
										                            <input type="submit" class="button btn-submit-login" name="login" value="Login"/> or <a href="{{URL::to('register')}}">Registration</a>
										                        </div>
										                    </div>

										                </form>
										              </div>
									                  

									              </div>
									            </div>
									        </div>
									@endif
							
								<div class="clear"></div>
							</div>
						</div>

					</div>
					
					<div class="widget-1 widget-first widget sw_related_upsell_widget-2 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
						<div class="widget-inner">
							<div id="sw_related_upsell_widget-2" class="sw-woo-container-slider upsells-products responsive-slider clearfix" data-lg="4" data-md="2" data-sm="2" data-xs="1" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
								<div class="resp-slider-container">
									<div class="block-title">
										<strong>
											<span>Related Products</span>
										</strong>
										<div class="sn-img icon-bacsic2"></div>
									</div>
									
									<div class="slider responsive">
									@foreach($related as $rel)
									<? $photo=$photos['relatedPhoto'][$rel->id]; ?>
										<div class="item">
											<div class="item-wrap">
												<div class="item-detail">
													<div class="item-img products-thumb">
													@if($rel->quantity==0)
														<span class="onsale">Sold!</span>
													@endif
														<a href='{{URL::to("$rel->link")}}'>
															<div class="product-thumb-hover">
															@if($photo!=null)
																<img width="300" height="300" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="{{$rel->item_name}}" src='{{asset("public/img/item/$photo->photo")}}' />
															@else
																<img width="300" height="300" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="{{$rel->item_name}}" src='{{asset("public/img/item/default.png")}}' />
															@endif
															</div>
														</a>
															
														<button href="{{URL::to('quick-view/'.$rel->link)}}"  data-fancybox-type="ajax" class="fancybox fancybox.ajax sm_quickview_handler-list" title="{{$rel->item_name}}">Quick View</button>	
													</div>
													
													<div class="item-content">
														
														
														<h4>
															<a href='{{URL::to("$rel->link")}}' title="{{$rel->item_name}}">{{$rel->item_name}}</a>
														</h4>
														
														<div class="item-price">
															<span>
																
																<ins>
																	<span class="woocommerce-Price-amount amount">
																		<span class="woocommerce-Price-currencySymbol">{{$commonData['primaryInfo']->currency_symbol}}</span>
																		{{$rel->sale_price}}
																	</span>
																</ins>
															</span>
														</div>
											  
														<!-- add to cart, wishlist, compare -->
														<div class="add-info">
															
															<a href='{{URL::to("$rel->link")}}' class="button product_type_simple ajax_add_to_cart">Add to cart</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									@endforeach
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

@section('scripts')
<!-- <script type="text/javascript" src="{{asset('public/frontend/plugin/jzoom/jquery.elevatezoom.js')}}"></script> -->

<script type="text/javascript" src="{{asset('public/frontend/plugin/jqzoom/js/jquery.jqzoom-core.js')}}"></script>
<script>
$(document).ready(function() {
	$('.jqzoom').jqzoom({
            zoomType: 'reverse',
            lens:true,
            preloadImages: false,
            alwaysOn:false,
            zoomWidth: 550,  
	        zoomHeight: 350
        });
	
});


	function packagePrice(value){
		 $.get('{{URL::to("itemPackagePrice")}}/'+value, function(data){
		 	$('#item_price').html(data.price);
	        $('#package_price').val(data.price);
	        $('#item_quentity').attr('max',data.quantity);
	        $('#oldQuantity').val(data.quantity);
		 });
		 $('#attributesSelect option').prop('selected', function() {
	        return this.defaultSelected;
	    });
		 $('.oldRadioPrice').each(function(){ 
			    this.value = 0; 
			});
		 $('.oldSelectPrice').each(function(){ 
			    this.value = 0; 
			});
		 $('.single_radio').each(function(){ 
			    this.checked = false; 
			});
		 $('#oldSelectPrice').val(0);
        }
    
    function loadAttrQty(id,attr){

    	var price1=parseFloat($('#package_price').val(),10);
    	var oldSelectPrice=parseFloat($('#oldSelectPrice'+attr).val(),10);
    	var price=price1-oldSelectPrice;
    	 $.get('{{URL::to("loadAttrQty")}}/'+id, function(data){
            $('#item_quentity').attr('max',data.quantity);
            $('#item_price').html(price+data.price);
	        $('#package_price').val(price+data.price);
	        $('#oldSelectPrice'+attr).val(data.price);
	        $('#oldQuantity').val(data.quantity);
        });
    }
    function loadAttrQtyRadio(id,attr){
    	var price1=parseFloat($('#package_price').val(),10);
    	var oldSelectPrice=parseFloat($('#oldRadioPrice'+attr).val(),10);
    	var price=price1-oldSelectPrice;
    	 $.get('{{URL::to("loadAttrQty")}}/'+id, function(data){
            $('#item_quentity').attr('max',data.quantity);
            $('#item_price').html(price+data.price);
	        $('#package_price').val(price+data.price);
	        $('#oldRadioPrice'+attr).val(data.price);
	        $('#oldQuantity').val(data.quantity);
        });
    }
    function loadAttrQty1(checkboxValue,id,quantity){
    		var price=parseFloat($('#package_price').val(),10);
    		var oldQty=parseInt($('#oldQuantity').val(),10);
    	if(checkboxValue.checked){
	    	 $.get('{{URL::to("loadAttrQty")}}/'+id, function(data){
	            $('#item_quentity').attr('max',data.quantity);
	            $('#item_price').html(price+data.price);
	            $('#package_price').val(price+data.price);
	        });
	    	}else{
	    		$.get('{{URL::to("loadAttrQty")}}/'+id, function(data){
	    			$('#item_quentity').attr('max',oldQty);
	    			$('#item_price').html(price-data.price);
	            	$('#package_price').val(price-data.price);
	            	$('.single_checkbox').each(function(){ 
					    this.checked = false; 
					});
	    		});
	    	}
    }
</script>
@endsection