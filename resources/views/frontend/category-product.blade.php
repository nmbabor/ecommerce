@extends('frontend.app')
@section('content')
  <div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{URL::to('/')}}">Home</a></li>
          <li class='active'>{{$category->category_name}}</li>
        </ul>
      </div>
      <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'>
          <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> {{$category->category_name}}</div>
            <nav class="yamm megamenu-horizontal categoryMenu">
              <ul class="nav">
              @foreach($subCategory as $s_category)
              <? $subSub=App\Model\SubSubCategory::where(['fk_sub_category_id'=>$s_category->id,'status'=>1])->orderBy('serial_num','ASC')->pluck('sub_name','link'); ?>
                <li> <a href='{{URL::to("category/$s_category->cat_link/$s_category->link")}}'>{{$s_category->sub_category_name}}</a>@if(count($subSub)>0) <button class="btn btn-xs pull-right btn-warning " data-toggle="collapse" href="#subSubMenu{{$s_category->id}}" ><i class="fa fa-plus"></i></button> 
                  <ul  id="subSubMenu{{$s_category->id}}" class="panel-collapse collapse categorySubMenu">
                    
                     @foreach($subSub as $link => $name)
                      <li><a href='{{URL::to("category/$s_category->cat_link/$s_category->link/$link")}}'><i class="fa fa-angle-double-right"></i> {{$name}}</a></li>
                      @endforeach
                  </ul>
                  @endif
                </li>
              @endforeach
                <!-- /.menu-item -->
                
              </ul>
              <!-- /.nav --> 
            </nav>
            <!-- /.megamenu-horizontal --> 
          </div>
          <!-- /.side-menu --> 
          <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Special Deals</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            @foreach($special_product-> chunk(4) as $s_product)
              <div class="item">
                <div class="products special-product">
                @foreach($s_product as $data)
                  <div class="product">
                    <div class="product-micro">
                      <div class="rows product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href='{{URL::to("$data->link")}}'>
                    <?php if($products_photo[$data->id]){ ?>
                    <img style="max-height: 190px" src="{{asset($products_photo[$data->id])}}" alt="{{$data->item_name}}">
                    <?php }else{ ?>
                    <img style="min-height: 190px"   src="{{asset('public/img/item/default.png')}}" alt="">
                    <?php } ?>
                    </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href='{{URL::to("$data->link")}}'>{{$data->item_name}}</a></h3>
                            <div class="star-ratings-sprite"><span style="width:{{$data->rating}}%" class="star-ratings-sprite-rating"></span></div>
                            <div class="product-price"> <span class="price"> TK:{{$data->sale_price}} </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  @endforeach
              
                  
                </div>
              </div>
              @endforeach
             
              
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">Recent Items</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            @foreach($recentProduct-> chunk(4) as $s_product)
              <div class="item">
                <div class="products special-product">
                @foreach($s_product as $data)
                  <div class="product">
                    <div class="product-micro">
                      <div class="rows product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href='{{URL::to("$data->link")}}'>
                    <?php if($recent_photo[$data->id]){ ?>
                    <img src="{{asset($recent_photo[$data->id])}}" alt="{{$data->item_name}}">
                    <?php }else{ ?>
                    <img src="{{asset('public/img/item/default.png')}}" alt="">
                    <?php } ?>
                    </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href='{{URL::to("$data->link")}}'>{{$data->item_name}}</a></h3>
                            <div class="star-ratings-sprite"><span style="width:{{$data->rating}}%" class="star-ratings-sprite-rating"></span></div>
                            <div class="product-price"> <span class="price"> TK:{{$data->sale_price}} </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  @endforeach
              
                  
                </div>
              </div>
              @endforeach
             
              
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
          <!-- /.sidebar-module-container --> 
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'> 
          <!-- ========================================== SECTION – HERO =========================== -->
          <div class="search-result-container category_item">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">

                  @foreach($allData as $data)
                    <div class="col-sm-6 col-md-4">
                      <div class="products">
                        <div class="product">
                          <div class="product-image">
                            
                            <div class="image"> <a href='{{URL::to("$data->link")}}'>
                              <?php if($product_photo[$data->id]){ ?>
                              <img  src="{{asset($product_photo[$data->id])}}" alt="{{$data->item_name}}">
                              <?php }else{ ?>
                              <img   src="{{asset('public/img/item/default.png')}}" alt="">
                              <?php } ?>
                              </a> 
                              </div>
                            <!-- /.image -->
                            
                            <div class="tag new"><span>new</span></div>
                          </div>
                          <!-- /.product-image -->
                          
                          <div class="product-info text-left">
                            <h3 class="name"><a href='{{URL::to("$data->link")}}'>{{$data->item_name}}</a></h3>
                            <div class="star-ratings-sprite"><span style="width:{{$data->rating}}%" class="star-ratings-sprite-rating"></span></div>
                            <div class="product-price"> <span class="price">TK:{{$data->sale_price}}</span> <span class="price-before-discount">TK:{{$data->regular_price}}</span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                          <!-- /.product-info -->
                          <div class="cart clearfix animate-effect">
                            <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <a href='{{URL::to("$data->link")}}' data-toggle="tooltip" class="btn btn-primary icon" type="button" title="" data-original-title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                              </li>
                              <? 
                              if(Auth::check()){

                                $userId=Auth::user()->id;
                                $wish=App\Model\Wishlist::where(['fk_item_id'=>$data->id,'fk_user_id'=>$userId])->count();

                              }else{
                                $userId='';
                                $wish=0;
                              }
                               ?>
                              <li class="lnk wishlist"> 
                              @if($wish>0)
                                 <a data-toggle="tooltip" class="add-to-cart" data-original-title="Added to Wishlist"> <i class="icon fa fa-heart text-danger"></i> </a> 
                              @else
                                <a data-toggle="tooltip" class="add-to-cart" href='{{URL::to("wishlist-store?fk_item_id=$data->id&fk_user_id=$userId")}}' title="" data-original-title="Wishlist"> <i class="icon fa fa-heart"></i> </a> 
                              @endif
                              </li>
                            </ul>
                          </div>
                            <!-- /.action --> 
                          </div>
                          <!-- /.cart --> 
                        </div>
                        <!-- /.product --> 
                        
                      </div>
                      <!-- /.products --> 
                    </div>
                    @endforeach
                    <!-- /.item -->
                    
                   
                    <!-- /.item -->
                    
                   
                    <!-- /.item -->
                    
                  
                    <!-- /.item --> 
                  </div>
                  <!-- /.row --> 
                </div>
                <!-- /.category-product --> 
                
              </div>
              <!-- /.tab-pane -->
              
              <div class="tab-pane "  id="list-container"></div>
              <!-- /.tab-pane #list-container --> 
            </div>
            <!-- /.tab-content -->
            <div class="clearfix filters-container">
              <div class="text-right">
                <div class="">
                 {{$allData->render()}}
                  <!-- /.list-inline --> 
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right --> 
              
            </div>
            <!-- /.filters-container --> 
            
          </div>
          <!-- /.search-result-container --> 
          
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container --> 
  </div>
@endsection