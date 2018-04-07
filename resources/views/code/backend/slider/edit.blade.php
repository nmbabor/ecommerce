@extends('backend.app')
@section('content')


<h3 class="box_title">Edit Slide
 <a href="{{route('slider.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All Slide</a></h3>
    {!! Form::open(array('route' => ['slider.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)) !!}
        
        <div class="form-group {{ $errors->has('slide_photo') ? 'has-error' : '' }}">
            {{Form::label('slide_photo', 'Slide Photo', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                <label class="upload_photo upload" for="file">
                    <!--  -->
                    <img src="{{asset('public/img/slides/'.$data->slide_photo)}}" id="image_load">
                    <i class="upload_hover ion ion-ios-camera-outline"></i>
                </label>
                {{Form::file('slide_photo',array('id'=>'file','style'=>'display:none'))}}
                 @if ($errors->has('slide_photo'))
                        <span class="help-block" style="display:block">
                            <strong>{{ $errors->first('slide_photo') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="form-group">
            {{Form::label('serial_num', 'Serial', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
            <? $max=$max_serial+1; ?>
                {{Form::number('serial_num',"$data->serial_num",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('slide_caption', 'Slide Caption', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('slide_caption',$data->slide_caption,array('class'=>'form-control','placeholder'=>'Slide Caption'))}}
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

