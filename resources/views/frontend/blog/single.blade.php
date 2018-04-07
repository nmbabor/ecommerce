@extends('frontend.app')
@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{URL::to('/')}}">Home</a></li>
				<li class='active'>{{$data->title}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post">
	<img style="min-width: 100%" class="img-responsive" src='{{asset("$data->photo")}}' alt="{{$data->title}}">
	<h1>{{$data->title}}</h1>
	<!-- <span class="author">John Doe</span>
	<span class="review">7 Comments</span> -->
	<span class="date-time"><?php echo date_format($data->created_at,"l jS M, Y"); ?></span>
	<p><?php echo $data->description; ?></p>
	
</div>

									
				</div>
				<div class="col-md-3 sidebar">
  					<div class="sidebar-widget">
			          <h3 class="section-title">Recent Post</h3>
			          <div class="sidebar-widget-body outer-top-xs">
			            <div class="special-offer outer-top-xs">
			                @foreach($recentPost as $data)
			                <div class="special-product">
			                  <div class="product">
			                    <div class="product-micro">
			                      <div class="row product-micro-row">
			                        <div class="col col-xs-5">
			                          <div class="product-image">
			                            <div class="image"> 
			                          <a href='{{URL::to("blog/$data->link")}}'>
			                    @if($data->photo!=null)
			                    	<img src="{{asset($data->photo)}}" alt="{{$data->title}}">
			                   	@else
			                    	<img src="{{asset('public/img/item/default.png')}}" alt="">
			                   	@endif
			                    	</a> 
			                    </div>
			                            <!-- /.image --> 
			                            
			                          </div>
			                          <!-- /.product-image --> 
			                        </div>
			                        <!-- /.col -->
			                        <div class="col col-xs-7">
			                          <div class="product-info">
			                            <h3 class="name"><a href='{{URL::to("blog/$data->link")}}'>{{$data->title}}</a></h3>
			                            <!-- /.product-price --> 
			                            
			                          </div>
			                        </div>
			                        <!-- /.col --> 
			                      </div>
			                      <!-- /.product-micro-row --> 
			                    </div>
			                    <!-- /.product-micro --> 
			                    
			                  </div>
			              </div>
			              @endforeach
			             
			              
			            </div>
			          </div>
			          <!-- /.sidebar-widget-body --> 
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection