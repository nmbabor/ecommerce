@extends('backend.app')
@section('content')
<? $url1=Request::path();
    $url2=explode('/', $url1);
    $url=$url2[0];
 ?>
<div class="tab_content">

<h3 class="box_title">Add New
 <a href='{{route("$url.index")}}' class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
	{!! Form::open(array('route' => "$url.store",'class'=>'form-horizontal','files'=>true)) !!}
	    
	    <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
            {{Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                <label class="slide_upload" for="file">
                    <!--  -->
                    <img id="image_load">
                </label>
                {{Form::file('photo',array('id'=>'file','style'=>'display:none','required'))}}
                 @if ($errors->has('photo'))
	                    <span class="help-block" style="display:block">
	                        <strong>{{ $errors->first('photo') }}</strong>
	                    </span>
	                @endif
            </div>
        </div>
        <div class="form-group">
            {{Form::label('title', 'Title', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::textArea('title',"",array('class'=>'form-control','placeholder'=>'Title','rows'=>'2','required'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::textArea('description',"",array('class'=>'form-control','placeholder'=>'Description','id'=>'ckeditor'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))}}

            <div class="col-md-8">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),'1', ['class' => 'form-control'])}}
            </div>
        </div>
            
	    <div class="form-group">
	        <div class="col-md-9 col-md-offset-3">
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div>
      </div>
	{!! Form::close() !!}

@endsection

