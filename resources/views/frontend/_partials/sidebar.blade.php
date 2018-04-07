<div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
<!-- ================================== TOP NAVIGATION ================================== -->
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal main_mega_menu">
            <ul class="nav">
            @foreach($all_category as $category)
            <?
              $bigMenu=1;
               $totalSub=count($all_sub_category[$category->id]);
               if($totalSub<6){
                  $bigMenu=0;
                }

            ?>
              <li class="dropdown menu-item"> 
              
              <a href='{{URL::to("category/$category->link")}}' class="dropdown-toggle"
              ><i class="icon {{$category->icon_class}}" aria-hidden="true"></i> {{$category->category_name}}</a>
                @if(count($all_sub_category[$category->id])>0)
                <?
                
                $totalSub=count($all_sub_category[$category->id]);
                  $chunk=ceil($totalSub/3);
                ?>
                 <ul class="dropdown-menu mega-menu big_menu">
                @foreach($all_sub_category[$category->id]-> chunk($chunk) as $s_category)
                   <li class="column_one">
                    <ul>
                       @foreach($s_category as $data)
                      <li><a href='{{URL::to("category/$category->link/$data->link")}}'>{{$data->sub_category_name}}</a>
                        <? $subSub=App\Model\SubSubCategory::where(['fk_sub_category_id'=>$data->id,'status'=>1])->orderBy('serial_num','ASC')->pluck('sub_name','link'); ?>
                        <ul class="sub-sub-menu">
                          @foreach($subSub as $link => $name)
                          <li><a href='{{URL::to("category/$category->link/$data->link/$link")}}'>{{$name}}</a></li>
                          @endforeach
                          
                        </ul>
                      </li>
                      @endforeach
                    </ul>
                  </li>
                @endforeach
                 </ul>
                @endif

                  <!-- /.yamm-content -->
                <!-- /.dropdown-menu --> 
                </li>
                
                @endforeach
              <!-- /.menu-item -->
              
             
              <!-- /.menu-item -->
              
            
              <!-- /.menu-item -->
            
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">hot deals</h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
          @foreach($allData['topOffers'] as $offer)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <?
                        $rem = strtotime($offer->end_date) - time();
                        $day = floor($rem / 86400);
                        $hr  = floor(($rem % 86400) / 3600);
                        $min = floor(($rem % 3600) / 60);
                        $sec = ($rem % 60);
                        $photo=App\Model\ItemPhoto::where('fk_item_id',$offer->fk_item_id)->value('small_photo');
                    ?>
                  <div class="image">
                  <a href='{{URL::to("$offer->link")}}'>
                    @if(file_exists($photo))
                    <img src='{{asset("$photo")}}' alt=""> 
                    @else
                    <img src='{{asset("public/img/item/default.png")}}' alt=""> 

                    @endif
                  </a>
                  </div>
                  <div class="sale-offer-tag"><span>{{$offer->discount}}%<br>
                    off</span></div>
                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">{{$day}}</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">{{$hr}}</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">{{$min}}</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key">{{$sec}}</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href='{{URL::to("$offer->link")}}'>{{$offer->item_name}}</a></h3>
                  <div class="star-ratings-sprite"><span style="width:{{$offer->rating}}%" class="star-ratings-sprite-rating"></span></div>
                  <div class="product-price"> <span class="price">Tk. {{$offer->sale_price}}</span> <span class="price-before-discount">Tk. {{$offer->regular_price}}</span> </div>
                  <!-- /.product-price --> 
                  
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                      <a href='{{URL::to("$offer->link")}}' class="btn btn-primary cart-btn"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>
          @endforeach
          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <div class="sidebar-widget product-tag wow fadeInUp">
          <h3 class="section-title">Product tags</h3>
          <div class="sidebar-widget-body outer-top-xs">

            <div class="tag-list"> 
              <? $i=0; ?>
              @foreach($allData['homeTag'] as $tag)
              <? $i++; ?>
              <a class="item {{($i==2)?'active':''}}" title="{{$tag->sub_category_name}}" href='{{URl::to("category/$tag->cat_link/$tag->sub_link")}}'>{{$tag->sub_category_name}}</a> 
              @endforeach

             </div>
            <!-- /.tag-list --> 

          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
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
                    <img src="{{asset($products_photo[$data->id])}}" alt="{{$data->item_name}}">
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

        <div class="home-banner sidebar_banner">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- eshop-1 -->
          <ins class="adsbygoogle"
               style="display:block"
               data-ad-client="ca-pub-8770580490084389"
               data-ad-slot="4925609966"
               data-ad-format="auto"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script>
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
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">Newsletters</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>Sign Up for Our Newsletter!</p>
              {!! Form::open(array('url' => 'subscribe-store','class'=>'form-horizontal')) !!}
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter" required="">
              </div>
              <button class="btn btn-primary" >Subscribe</button>
              {!! Form::close() !!}
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
          <div id="advertisement" class="advertisement">
          @foreach($allData['reviews'] as $review)
            <div class="item">
              <div class="avatar"><img src='{{asset("$review->photo")}}' alt="{{$review->name}}"></div>
              <div class="testimonials"><em>"</em>{{$review->description}}<em>"</em></div>
              <div class="clients_author">{{$review->name}} <span>{{$review->designation}}</span> </div>
              <!-- /.container-fluid --> 
            </div>
            <!-- /.item -->
          @endforeach
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
</div>