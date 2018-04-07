@extends('backend.app')
@section('content')

  	<h3 class="box_title">User Profile
 		<a href="{{route('view-users.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View all user</a>
 	</h3>

		 {!! Form::open(array('route' => 'view-users.store','class'=>'form-horizontal','method'=>'POST')) !!}
	    <div class="modal-body">
	        
	        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
	            {{Form::label('password', 'New Password', array('class' => 'col-md-4 control-label'))}}
	            <div class="col-md-8">
	                {{Form::password('password',array('class'=>'form-control','placeholder'=>'Password','required'))}}
	                 @if ($errors->has('password'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('password') }}</strong>
	                    </span>
	                @endif
	            </div>
	        </div>
	        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
	            {{Form::label('password_confirmation', 'Password Confirmation', array('class' => 'col-md-4 control-label'))}}
	            <div class="col-md-8">
	                {{Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>'Password Confirmation','required'))}}
	                 @if ($errors->has('password_confirmation'))
	                    <span class="help-block">
	                        <strong>{{ $errors->first('password_confirmation') }}</strong>
	                    </span>
	                @endif
	            </div>
	        </div>
	        {{Form::hidden('id',$data->id)}}
	    </div>
	      <div class="modal-footer">
	      <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"> Save Password</i></button>
	    </div>
	        {!! Form::close() !!}


	







@endsection