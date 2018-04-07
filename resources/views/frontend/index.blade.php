@extends('frontend.app')
@section('content')
      
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      @if(Request::path()=='/')
      @include('frontend._partials.sidebar')
      @endif
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">  
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
          @foreach($allslider as $slider)
            <div class="item" style="background-image: url({{asset($slider->slide_photo)}});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">{{$slider->top_caption}}</div>
                  <div class="big-text fadeInDown-1"> {{$slider->slide_caption}}</div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{$slider->bottom_caption}}</span> </div>
                  @if($slider->fk_category_id!=null)
                  <div class="button-holder fadeInDown-3"> <a href='{{URL::to("category/$slider->link")}}' class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
                  @endif
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            @endforeach
            <!-- /.item -->
            
           
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
            @foreach($salesSupport as $support)
              <div class="col-md-4 col-sm-4 col-lg-4">
              <a href="{{$support->link}}">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">{{$support->title}}</h4>
                    </div>
                  </div>
                  <h6 class="text">{{$support->sub_title}}</h6>
                </div>
              </a>
              </div>
            @endforeach
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <br>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== -->
      <? $adi=0; ?>
      @foreach($homecategory as $category)
      <? $adi++; ?>
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">{{$category->category_name}}</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
               @foreach($homeSub[$category->id] as $key => $subCat)
              <li class="{{($key==0)?'active':''}}"><a data-transition-type="backSlide" href="#cat_{{$subCat->fk_category_id}}_sub_{{$subCat->id}}" data-toggle="tab">{{$subCat->sub_category_name}}</a></li>
              @endforeach
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
          @foreach($homeSub[$category->id] as $key=> $subCats)
            <div class="tab-pane {{($key==0)?'in active':''}}" id="cat_{{$subCats->fk_category_id}}_sub_{{$subCats->id}}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                @foreach($homeproduct[$subCats->id] as $product)
                  <div class="item item-carousel mix {{$category->id}}_{{$product->fk_sub_category_id}}">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href='{{URL::to("$product->link")}}'>
                          <?php if($product->small_photo){ ?>
                          <img  src="{{asset($product->small_photo)}}" alt="{{$product->item_name}}">
                          <?php }else{ ?>
                          <img style="min-height: 190px"  src="{{asset('public/img/item/default.png')}}" alt="">
                          <?php } ?>
                          </a> </div>
                          <!-- /.image -->
                          
                          <!-- <div class="tag sale"><span>sale</span></div> -->
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href='{{URL::to("$product->link")}}'>{{$product->item_name}}</a></h3>
                          <div class="star-ratings-sprite"><span style="width:{{$product->rating}}%" class="star-ratings-sprite-rating"></span></div>

                          <div class="product-price"> <span class="price">TK:{{$product->sale_price}} </span> <span class="price-before-discount">TK:{{$product->regular_price}}</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <a href='{{URL::to("$product->link")}}' data-toggle="tooltip" class="btn btn-primary icon" type="button" title="" data-original-title="Add Cart"> <i class="fa fa-shopping-cart"></i> </a>
                              </li>
                              <? 
                              if(Auth::check()){

                                $userId=Auth::user()->id;
                                $wish=App\Model\Wishlist::where(['fk_item_id'=>$product->id,'fk_user_id'=>$userId])->count();

                              }else{
                                $userId='';
                                $wish=0;
                              }
                               ?>
                              <li class="lnk wishlist"> 
                              @if($wish>0)
                                 <a data-toggle="tooltip" class="add-to-cart" data-original-title="Added to Wishlist"> <i class="icon fa fa-heart text-danger"></i> </a> 
                              @else
                                <a data-toggle="tooltip" class="add-to-cart" href='{{URL::to("wishlist-store?fk_item_id=$product->id&fk_user_id=$userId")}}' title="" data-original-title="Wishlist"> <i class="icon fa fa-heart"></i> </a> 
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
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane --> 
        @endforeach
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs index_main_banner">
          <div class="row">
          @if(isset($advertisement[$adi]))
            <div class="col-md-6 col-sm-6">
              <div class="wide-banner cnt-strip">
                <div class="image"> 
                <a href="{{$advertisement[$adi]->link}}" target="_blank">
                @if($advertisement[$adi]->is_photo==1)
                  @if($advertisement[$adi]->photo!=null)
                  <? $adPhoto=$advertisement[$adi]->photo; ?>
                  @if(file_exists($adPhoto))
                  <img class="img-responsive" src='{{asset("$adPhoto")}}' alt="{{$advertisement[$adi]->caption}}">
                  @endif
                  @endif
                @else
                <? echo $advertisement[$adi]->script ?>
                @endif 
                </a>
                </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
          @endif
          <? $adi+=1; ?>
          @if(isset($advertisement[$adi]))
            <div class="col-md-6 col-sm-6">
              <div class="wide-banner cnt-strip">
                <div class="image"> 
                <a href="{{$advertisement[$adi]->link}}" target="_blank">
                @if($advertisement[$adi]->is_photo==1)
                  @if($advertisement[$adi]->photo!=null)
                  <? $adPhoto=$advertisement[$adi]->photo; ?>
                  @if(file_exists($adPhoto))
                  <img class="img-responsive" src='{{asset("$adPhoto")}}' alt="{{$advertisement[$adi]->caption}}">
                  @endif
                  @endif
                @else
                <? echo $advertisement[$adi]->script ?>
                @endif 
                </a>
                </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
          
          @endif
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
      @endforeach
        <!-- ============================================== SCROLL TABS ============================================== -->
       <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">latest form blog</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
             @foreach($allblog as $blog)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href='{{URL::to("blog/$blog->link")}}'> <img src='{{asset("$blog->photo")}}' alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href='{{URL::to("blog/$blog->link")}}'>{{$blog->title}}</a></h3>
                    <span class="info">{{date('jS M Y',strtotime($blog->created_at))}}</span>
                    <a href='{{URL::to("blog/$blog->link")}}' class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
            @endforeach
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
       
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    <div id="brands-carousel" class="logo-slider wow fadeInUp">
      <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
       <!--  @foreach($allData['brands'] as $brand)
          <div class="item m-t-15"> <a href="#" class="image"> <img data-echo='{{asset("public/img/brand/$brand->photo")}}' src='{{asset("public/img/brand/$brand->photo")}}' alt="{{$brand->name}}" title="{{$brand->name}}"> </a> </div>
        @endforeach -->
          <!--/.item--> 
        </div>
        <!-- /.owl-carousel #logo-slider --> 
      </div>
      <!-- /.logo-slider-inner --> 
      
    </div>
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
      </div>
    <!-- /.container --> 
  </div>
@endsection
@section('script')

@endsection

