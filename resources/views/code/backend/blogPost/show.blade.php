@extends('backend.app')
@section('content')
<div class="tab_content">

<h3 class="box_title">Show The Post
  <a href="{{route('blogPost.index')}}" class="btn btn-default pull-right viewAll"> <i class="ion ion-navicon-round"></i>&nbsp; View All Post</a> 
  <a href="{{route('blogPost.edit',$data->id)}}" class="btn btn-default pull-right"> <i class="fa fa-pencil-square-o"></i> Edit Post</a> 
 </h3>
 <div class="col-md-10 col-md-offset-1">
 	<div class="col-md-12 post_meta">
 		<h2><? echo $data->post_title; ?></h2>
 		<div><span>Post by: {{$data->author}}</span> | <span>Post at: {{substr($data->created_at,0,10)}}</span></div>
 	<br>
 	</div>
 	<div class="col-md-12 post_description">
 		@if($data->post_photo==!null)
 			<img class="post_img" src="{{asset('public/img/blogPost/'.$data->post_photo)}}">
 		@endif

 		<p><? echo $data->post_description; ?></p>
 	</div>
	
 </div>




</div>
@endsection

