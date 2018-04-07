@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">User Password Update</h3>
    <div class="box-body col-md-10">
    
        <ul class="nav nav-tabs" role="tablist">
               
            <li role="presentation"><a href="{{ URL::to('userUpdate/'.$id)}}">Update Profile</a></li>
            <li role="presentation" class="active"><a href="">Change Password</a></li>
          </ul>
        {!! Form::open(array('url' => 'userPasswordUpdate/'.$id,'method'=>'POST','class'=>'form-horizontal')) !!}
        
            <div class="change_pass_section">
                <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}} ">
                  <label class="col-sm-3 control-label">New Password  <star> *</star></label>
                  <div class="col-sm-9">
                    {{ Form::password('password', ['class' => 'form-control','placeholder'=>'New Password','required'])}}

                    @if ($errors->has('password'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}} ">
                  <label class="col-sm-3 control-label">Confirm New Password : <star> *</star></label>
                  <div class="col-sm-9">
                    {{ Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>'Confirm Password','required'])}}
                    
                    @if ($errors->has('password_confirmation'))
                      <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>
                {{Form::hidden('id',Auth::user()->id)}}
                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" class="btn btn-warning">
                      <span class="btn-label">
                        <i class="fa fa-check"></i>
                      </span>
                      Update
                    </button>
                  </div>
                </div>
            </div>
          {!! Form::close() !!}
    
    </div>
    <hr class="col-md-12">
           
</div>

@endsection