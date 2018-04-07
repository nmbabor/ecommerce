@extends('backend.app')
@section('content')


<h3 class="box_title">Edit 
 <a href="{{route('product.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All </a></h3>
    {!! Form::open(array('route' => ['product.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)) !!}
        
        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
            {{Form::label('photo', 'Photo', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                <label class="upload_photo upload" for="file">
                    <!--  -->
                    <img src="{{asset('public/img/product/'.$data->photo)}}" id="image_load">
                    <i class="upload_hover ion ion-ios-camera-outline"></i>
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
            {{Form::label('name', 'Product Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'Product Name','required'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('product_code', 'Product Code', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('product_code',$data->product_code,array('class'=>'form-control','placeholder'=>'Product Code','required'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::textArea('description',$data->description,array('class'=>'form-control','placeholder'=>'Write some thing about project','rows'=>'5'))}}
            </div>
        </div>

        <div class="form-group">
            {{Form::label('fk_category_id', 'Category', array('class' => 'col-md-3 control-label'))}}

            <div class="col-md-8">
                <select name="fk_category_id" class="form-control">
                <option value="">--select--</option>
                @foreach($category as $cat)
                    <option value="{{$cat->id}}" <? echo($data->fk_category_id=$cat->id) ? 'selected' : '' ?>>{{$cat->name}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            {{Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))}}

            <div class="col-md-8">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])}}
            </div>
        </div>
            {{Form::hidden('id',$data->id)}}
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      
	{!! Form::close() !!}

@endsection

