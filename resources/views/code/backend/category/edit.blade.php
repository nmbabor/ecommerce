@extends('backend.app')
@section('content')


<h3 class="box_title">Edit Category
 <a href="{{route('categories.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
    {!! Form::open(array('route' => ['categories.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)) !!}
        
        <div class="form-group">
            {{Form::label('serial_num', 'Serial', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
            <? $max=$max_serial+1; ?>
                {{Form::number('serial_num',"$data->serial_num",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('category_name', 'Category Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('category_name',$data->category_name,array('class'=>'form-control','placeholder'=>'Category Name'))}}
            </div>
            <div class="col-md-2">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])}}
            </div>
        </div>
            {{Form::hidden('id',$data->id)}}
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-warning" href='{{URL::to("attribute",$data->id)}}'><i class="fa fa-plus"> Attribute</i></a>
            </div>
        </div>
      
	{!! Form::close() !!}

@endsection

