@extends('backend.app')
@section('content')
<div class="tab_content">

<h3 class="box_title">Add New Blog
 <a href="{{route('blogPost.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All Blog</a></h3>
 <div class="col-md-10 col-md-offset-1">
	{!! Form::open(array('route' => 'blogPost.store','class'=>'form-horizontal','files'=>true)) !!}
	    <div class="form-group {{ $errors->has('post_title') ? 'has-error' : '' }}">
	    {{Form::label('post_title','Blog Title',['class'=>'col-md-12'])}}

	        <div class="col-md-12">
	        	{{Form::textArea('post_title','',['class'=>'form-control','placeholder'=>'Blog Title','rows'=>'1','required'])}}
	                @if ($errors->has('post_title'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('post_title') }}</strong>
	                    </span>
	                @endif
	        </div>
	    </div>
	    
	    <div class="form-group {{ $errors->has('post_description') ? 'has-error' : '' }}">
	    {{Form::label('post_description','Blog Description',['class'=>'col-md-12'])}}

	        <div class="col-md-12">
	        	{{Form::textArea('post_description','',['class'=>'form-control','id'=>'ckeditor','placeholder'=>'Blog Description','rows'=>'8','required'])}}
	                @if ($errors->has('post_description'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('post_description') }}</strong>
	                    </span>
	                @endif
	        </div>
	    </div>
	    <div class="col-md-12 no-padding">
	    	<div class="form-group col-md-6 no-padding {{ $errors->has('post_photo') ? 'has-error' : '' }}">
	            {{Form::label('post_photo', 'Featured Image', array('class' => 'col-md-12'))}}
	            <div class="col-md-12">
	                <label class=" slide_upload" for="file">
	                	<!--  -->
	                	<img id="image_load">
	                </label>
	                <br>
	                {{Form::file('post_photo',array('id'=>'file','style'=>'display:none'))}}
	                @if ($errors->has('post_photo'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('post_photo') }}</strong>
	                    </span>
	                @endif
	            </div>
		     </div>

	    </div>
		<div class="form-group col-md-6 {{ $errors->has('status') ? 'has-error' : '' }}">
	    {{Form::label('status','Status',['class'=>'col-md-12'])}}

	        <div class="col-md-12">
	        {{Form::select('status',['1'=>'Active','2'=>'Inactive'],'1',['class'=>'form-control'])}}
	                @if ($errors->has('status'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('status') }}</strong>
	                    </span>
	                @endif
	        </div>
	    </div>
	    <div class="form-group">
	        <div class="col-md-12">
	            <button type="submit" class="btn btn-primary">Publish</button>
	        </div>
	    </div>
	{!! Form::close() !!}
 </div>

@endsection
