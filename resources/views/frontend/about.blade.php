@extends('frontend.app')
@section('content')
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="#">Home</a></li>
                <li class='active'>Contact</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="container">
       <div class="row">
        @if(isset($aboutData))
            <div class="wrapper-contact-style">
                    <div class="about-us-wrapper">

                        <div class="text"><?php echo $aboutData->description; ?></div>
                    </div>
                </div>
                <!-- <div data-wow-delay="0.4s" class="about-us-image wow zoomInRight"><img src="{{asset('public/img/about-us-4.png')}}" alt="" class="img-responsive"></div> -->
            </div>
        @endif
        </div>
		</div>
 @endsection