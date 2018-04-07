@extends('frontend.app')
@section('content')
<section class="content">
    <div class="container"> 
        

        <div class="col-md-9 no-padding pull-right">
                @include('frontend._partials.slider')

            <div class="main_content">
                <div class="p-carousel-title">
                    <h2>Special Item</h2>
                </div>
                <div class="row">
                    <div class="single-p-slide-homepage-three">
                    @foreach($allData['specialItem'] as $specialItem)
                    <? $cat_link=str_replace(' ','-',$specialItem->category_name);
                        $item_link= str_replace(' ','-',$specialItem->item_name);
                        $cat_link=strtolower($cat_link);
                        $item_link=strtolower($item_link);
                    ?>
                        <div class="col-md-4">
                            <div class="single-product-items">
                                <div class="single-items">
                                    <a href='{{URL::to("category/$cat_link/$specialItem->id/$item_link")}}' class="single-product">
                                        <img class="primary-img" src='{{asset("public/img/item/$specialItem->photo_path")}}' alt="">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h4><a href='{{URL::to("category/$cat_link/$specialItem->id/$item_link")}}'> {{$specialItem->item_name}} </a></h4>
                                    <h4><span class="line"></span><span>${{$specialItem->sale_price}}</span></h4>
                                    
                                </div>
                                  
                            </div>
                        </div>
                    @endforeach   
                    </div>
                </div>
                <div class="p-carousel-title">
                    <h2>Latest Item</h2>
                </div>
                <div class="row">
                    <div class="single-p-slide-homepage-three">
                    <? 
                    //$latestItem =  (array) $allData['latest_item'];
                    $latestItem1 = json_decode(json_encode($allData['latest_item']),TRUE);
                    $latestItem=$latestItem1['data'];
                    if($allData['latestCount']<$allData['limit']){
                    $loopNumber=floor($allData['latestCount']/2);
                    $total_item=$allData['latestCount'];
                    }else{
                    $loopNumber=floor($allData['limit']/2);
                    $total_item=$allData['limit'];
                        
                    }
                    $checkOdd=$total_item%2>0;
                        $track=0;
                        for ($i=0; $i < $loopNumber ; $i++) { 
                            echo '<div class="col-md-4">';
                            for ($j=0; $j <2 ; $j++) {
                                $photo=$latestItem[$track]['photo_path'];
                                ?>
                        
                            <div class="single-product-items">
                            <? $cat_link=str_replace(' ','-',$latestItem[$track]['category_name']);
                                    $item_link= str_replace(' ','-',$latestItem[$track]['item_name']);
                                    $cat_link=strtolower($cat_link);
                                    $item_link=strtolower($item_link);
                                    $id = $latestItem[$track]['id'];
                                ?>
                                <div class="blog-image">
                                    <a href='{{URL::to("category/$cat_link/$id/$item_link")}}' class="">
                                        <img class="primary-img" src='{{asset("public/img/item/$photo")}}' alt="">
                                    </a>
                                    
                                </div>
                                <div class="product-info">

                                    <h4><a href="#">{{$latestItem[$track]['item_name']}}</a></h4>
                                    <h4>
                                    @if($latestItem[$track]['sale_price']!=null)
                                        <span class="line"></span><span>${{$latestItem[$track]['sale_price']}}</span>
                                    @endif
                                    </h4>
                                    
                                </div>
                            </div>
                            <?
                            $track++;
                        }
                            echo '</div>';
                        }
                        if($checkOdd==true){?>
                        <div class="col-md-4">
                            <div class="single-product-items">
                                <div class="blog-image">
                                    <a href="#" class="">
                                        <img class="primary-img" src='{{asset("public/img/item/$photo")}}' alt="">
                                    </a>
                                    <div class="product-hover">
                                        <div class="product-links">
                                            <a href="#"><i class="fa fa-search"></i></a>  
                                        </div>
                                        <div class="p-bottom-cart">
                                            <a href="cart.html" class="hover-cart">ADD TO <span>CART</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4><a href="#">{{$latestItem[$track]['item_name']}}</a></h4>
                                    <h4>
                                    @if($latestItem[$track]['sale_price']!=null)
                                        <span class="line"></span><span>${{$latestItem[$track]['sale_price']}}</span>
                                    @endif
                                    </h4>
                                    
                                </div>
                            </div>
                        </div>
                                <?}?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 left-sidebar">
            @include('frontend._partials.sidebar')
        </div><!-- End side bar -->
            

        </div>

</section>
        <!--Home Three Brand Area Start-->
        <!-- <section class="home-three-brand-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="brand-title-home-three">
                            <h2>OUR Clients</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="brand-home-three">
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-1.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-2.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-3.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-4.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-5.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-6.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-7.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-8.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-brand">
                                <a href="#"><img src="{{asset('public/img/brand/brand-9.png')}}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!--End of Home Three Brand Area-->
        <!--Service Area Start-->
        <section class="service-area">
            <div class="container">
                <div class="row">
                    <div class="single-service">
                        <div class="service-icon">
                            <div class="service-tablecell">
                                <img src="{{asset('public/img/serv-1.png')}}" alt="">
                            </div>
                        </div>
                        <h4>High quality</h4>
                        <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit </p>
                    </div>
                    <div class="single-service">
                        <div class="service-icon">
                            <div class="service-tablecell">
                                <img src="{{asset('public/img/serv-2.png')}}" alt="">
                            </div>
                        </div>
                        <h4>Fast delivery</h4>
                        <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit </p>
                    </div>
                    <div class="single-service">
                        <div class="service-icon">
                            <div class="service-tablecell">
                                <img src="{{asset('public/img/serv-3.png')}}" alt="">
                            </div>
                        </div>
                        <h4>24/7 Support</h4>
                        <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit </p>
                    </div>
                    <div class="single-service">
                        <div class="service-icon">
                            <div class="service-tablecell">
                                <img src="{{asset('public/img/serv-4.png')}}" alt="">
                            </div>
                        </div>
                        <h4>14 - day returns</h4>
                        <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit </p>
                    </div>
                    <div class="single-service">
                        <div class="service-icon">
                            <div class="service-tablecell">
                                <img src="{{asset('public/img/serv-5.png')}}" alt="">
                            </div>
                        </div>
                        <h4>Secure checkout</h4>
                        <p>Lorem ipsum dolor sit amet, conseetur adipiscing elit </p>
                    </div>
                </div>
            </div>
        </section>
        <!--End of Service Area-->

@endsection