@extends('backend.app')
@section('content')
<div class="tab_content">

<h3 class="box_title">Add New
 <a href="{{route('categories.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
	{!! Form::open(array('route' => 'categories.store','class'=>'form-horizontal','id'=>'form_submit')) !!}
    
        <div class="form-group {{ $errors->has('category_name') ? 'has-error' : '' }}">
            {{Form::label('category_name', 'Category Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('category_name','',array('class'=>'form-control','placeholder'=>'Category Name','required'))}}
                @if ($errors->has('category_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-md-2">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('serial_num', 'Serial', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
            <? $max=$max_serial+1; ?>
                {{Form::number('serial_num',"$max",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))}}
            </div>
        </div>
        <div class="form-group">

            <div class="col-md-3 col-md-offset-3">
                <label for="add_attribute"><input type="checkbox" name="is_extension" value="1" id="add_attribute"> Add Attribute</label>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-3">
                {{Form::submit('Submit',array('class'=>'btn btn-info'))}}
            </div>
        </div>
            
        {!! Form::close() !!}
@endsection

