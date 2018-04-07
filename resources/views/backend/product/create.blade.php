@extends('backend.app')
@section('content')
<div class="tab_content">

<h3 class="box_title">Add New 
 <a href="{{route('product.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All </a></h3>
	{!! Form::open(array('route' => 'product.store','class'=>'form-horizontal','files'=>true)) !!}
	    
	    <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
            {{Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                <label class="slide_upload" for="file">
                    <!--  -->
                    <img id="image_load">
                </label>
                {{Form::file('photo',array('id'=>'file','style'=>'display:none'))}}
                 @if ($errors->has('photo'))
	                    <span class="help-block" style="display:block">
	                        <strong>{{ $errors->first('photo') }}</strong>
	                    </span>
	                @endif
            </div>
        </div>
         <div class="form-group">
            {{Form::label('fk_category_id', 'Category', array('class' => 'col-md-3 control-label'))}}

            <div class="col-md-8">
                <select name="fk_category_id" class="form-control" required>
                <option value="">--select--</option>
                @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group">
            {{Form::label('name', 'Product Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Product Name','required'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('product_code', 'Product Code', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('product_code','',array('class'=>'form-control','placeholder'=>'Product Code','required'))}}
            </div>
        </div>

        <div class="form-group">
            {{Form::label('title', ' Title', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('title','',array('class'=>'form-control','placeholder'=>' Project title','required'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('price', ' Price', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('price','',array('class'=>'form-control','placeholder'=>' Price','required'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('discount', ' Discount', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('discount','',array('class'=>'form-control','placeholder'=>'discount'))}}
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

