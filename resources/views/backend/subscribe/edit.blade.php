@extends('backend.app')
@section('content')


<h3 class="box_title">Edit 
 <a href="{{route('subscribe.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All </a></h3>
    {!! Form::open(array('route' => ['subscribe.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)) !!}
       
        <div class="form-group">
            {{Form::label('email', 'Email', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::email('email',$data->email,array('class'=>'form-control','placeholder'=>'Email'))}}
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

