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

<div class="body-content">
	<div class="container">
    <div class="contact-page">
		<div class="row">
			<div class="col-md-9 contact-form">
				<div class="col-md-12 contact-title">
					<h4>Contact Form</h4>
				</div>
			<form class="register-form" role="form">
				<div class="col-md-4 ">
						<div class="form-group">
					    <label class="info-title" for="exampleInputName">Your Name <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="Your Name" required>
					  </div>
				</div>
				<div class="col-md-4">
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email Address" required>
					  </div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
				    <label class="info-title" for="exampleInputTitle">Title <span>*</span></label>
				    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="Title" required>
				  </div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
				    <label class="info-title" for="exampleInputComments">Your Comments <span>*</span></label>
				    <textarea class="form-control unicase-form-control" id="exampleInputComments" placeholder="Your Comments" rows="4" required></textarea>
				  </div>
				</div>
				<div class="col-md-12 outer-bottom-small m-t-20">
					<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
				</div>
			</form>
			</div>
			<div class="col-md-3 contact-info">
				<div class="contact-title">
					<h4>Information</h4>
				</div>
				<div class="clearfix address">
					<span class="contact-i"><i class="fa fa-map-marker"></i></span>
					<span class="contact-span">{{$info->address}}</span>
				</div>
				<div class="clearfix phone-no">
					<span class="contact-i"><i class="fa fa-mobile"></i></span>
					<span class="contact-span">{{$info->mobile_no}}</span>
				</div>
				<div class="clearfix email">
					<span class="contact-i"><i class="fa fa-envelope"></i></span>
					<span class="contact-span"><a href="#">{{$info->email}} </a></span>
				</div>
				<br>

			</div>
			<div class="col-md-12 contact-map outer-bottom-vs">
					<iframe src="{{$info->map_embed}}" width="600" height="450"  style="border:0"></iframe>
				</div>
		</div><!-- /.contact-page -->
	</div><!-- /.row -->
</div>
</div>
@endsection