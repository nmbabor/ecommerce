@extends('backend.app')
@section('content')
<div class="col-md-12">
	<p align="center"><u>Order response sms configuration</u></p>
	    {!! Form::open(array('url' =>'postConfig','method'=>'POST','class'=>'form-horizontal','files'=>true)) !!}
	    <div class="form-group">
			<label class="control-label col-md-2"><b>Order Message : </b></label>
			<div class="col-md-10">
			{{Form::textArea('order_sms',$data->order_sms,['class'=>'form-control','placeholder'=>'Type Order Response message here...','rows'=>'4','required'])}}
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2"><b>Order Response</b></label>
			<div class="col-md-4">
			 {{Form::select('order_response', array('1' => 'Yes', '2' => 'No'),$data->order_response, ['class' => 'form-control'])}}
			</div>
		</div>
		<input type="hidden" name="id" value="{{$data->id}}">
		<div class="form-group">
			<div class="col-md-10 col-md-offset-2">
				<button type="submit" class="btn btn-success">Save</button>
			</div>
		</div>
	{{Form::close()}}
</div>
@endsection