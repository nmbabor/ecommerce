@extends('frontend.app')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>{{$page->name}}</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
    <div class="container">
        <div class="row">
            <div class="single-page">
                
            
            <div class="col-md-3">
                <div class="sidebar-module-container">
                    <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                        <h3 class="section-title">Read more here</h3>
                        <div class="sidebar-widget-body m-t-10">
                            <ul class="singlePageUl">
                            @foreach($pages as $link => $name)
                                <li><a class="{{($link==$page->link)?'active':''}}" href='{{URL::to("page/$link")}}'><i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$name}}</a></li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="wrapper-contact-style singlePageContent">
                    <h3>{{$page->title}}</h3>
                    <hr>
                    @if(count($pagePhoto)>0)
                    <div id="hero">
                      <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                      @foreach($pagePhoto as $data)
                        <div class="item" style="background-image: url({{asset('public/img/pages/'.$data->photo)}});"></div>
                    @endforeach
                      </div>
                      <!-- /.owl-carousel --> 
                    </div>
                    @endif
                    <div class="about-us-wrapper">
                        <br>
                        <div class="text"><?php echo $page->description; ?></div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection