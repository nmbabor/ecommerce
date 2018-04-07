@extends('frontend.app')
@section('content')
  <div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="{{URL::to('/')}}">Home</a></li>
          <li class='active'>Search</li>
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
          <!-- ================================== TOP NAVIGATION ================================== -->
          <div class="side-menu animate-dropdown outer-bottom-xs">
            <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
            @foreach($all_category as $category)
            @if(count($all_sub_category)>0)
              <li class="dropdown menu-item"> 
              
              <a href='{{URL::to("category/$category->link")}}' class="dropdown-toggle"
              >{{$category->category_name}}</a>
             
             
              

                @if(count($all_sub_category)>0)
                <ul style="width:0px" class="dropdown-menu mega-menu">
                 
                  
                   
                 @foreach($all_sub_category[$category->id]-> chunk(4) as $s_category)
                    
                       
                        
                           @foreach($s_category as $data)
                          <li style=""><a href='{{URL::to("category/$category->link/$data->link")}}'>{{$data->sub_category_name}}</a></li>
                          @endforeach
                         
                         
                       
                       
                 

                       @endforeach
                 
                </ul>
                   @endif

                  <!-- /.yamm-content -->
                <!-- /.dropdown-menu --> 
                </li>
                 @else
                 <li>
                   <a href='{{URL::to("category/$category->link")}}'>{{$category->category_name}}</a>
                   </li>
                    @endif
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
          </div>
          <!-- /.side-menu --> 
          <!-- /.sidebar-module-container --> 
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'> 
          <!-- ========================================== SECTION – HERO =========================== -->
          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">

                  @foreach($allData as $data)
                    <div class="col-sm-6 col-md-4 ">
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
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container --> 
  </div>
@endsection