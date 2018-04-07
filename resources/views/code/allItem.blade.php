@extends('frontend.app')
@section('content')
<section class="content">
    <div class="container"> 
        
        <div class="col-md-9 no-padding pull-right">
            <div class="main_content">
                <div class="p-carousel-title">
                    <h2>{{$name}}<? echo isset($sub_name)? " <i class='ion-chevron-right' ></i> <small> $sub_name</small>" : '' ?></h2>
                    <h3>Click On Item For Order And More Info</h3>
                    </div>
                <div class="row">
                    <div class="all_item">
                    @foreach($allData['data'] as $data)
                        <div class="col-md-4 col-sm-4">
                            <div class="single-product-items">
                                <div class="blog-image">
                                <? $cat_link=$allData['cat_link'];
                                $cat_link=strtolower($cat_link);
                                $item_link= str_replace(' ','-',$data->item_name);
                                $item_link=strtolower($item_link);
                                 ?>
                                    <a href='{{URL::to("category/$cat_link/$data->id/$item_link")}}'>
                                        <img class="primary-img" src='{{asset("public/img/item/$data->photo_path")}}' alt="">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h4><a href='{{URL::to("category/$cat_link/$data->id/$item_link")}}'>{{$data->item_name}} </a></h4>
                                    @if($data->sale_price!=null)
                                    <h4><span class="line"></span><span>${{$data->sale_price}}</span></h4>
                                    @endif
                                    
                                </div>
                            </div>
                        </div><!--/ Single Item -->
                    @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3 left-sidebar">
            @include('frontend._partials.sidebar')
        </div><!-- End side bar -->

    </div>
</section>
@endsection