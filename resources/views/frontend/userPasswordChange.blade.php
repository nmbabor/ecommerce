@extends('frontend.app')
@section('content')
<style type="text/css">
    .card{width: 97%;
    overflow: hidden;
    background-color: #fff;
    padding: 15px;
    margin: 0 15px;}
    .form-group{width: 100%;overflow: hidden;}
</style>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            
                            <div class="row">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">My Profile </h4>
                                    </div>
                                    <hr>
                                    @if(Session::has('success'))
    
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                           <b>{!! Session::get('success')!!}</b> 
                                        </div>
                                    
                                    @elseif(Session::has('error'))
                                        
                                        <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                           <b>{!! Session::get('error')!!}</b> 
                                           </div>
                                        
                                    @endif
                                    <!-- Nav tabs -->
                                      <ul class="nav nav-tabs" role="tablist">
                                       
                                        <li role="presentation" ><a href="{{ URL::to('myProfile')}}">Update Profile</a></li>
                                      
                                        <li role="presentation" class="active"><a href="{{ URL::to('changeUserPassword')}}" >Change Password</a></li>
                                       
                                        
                                      </ul>
                                      <!-- Tab panes -->
                                <div role="tabpanel" class="tab-pane active" id="profile" style=" margin-top: 25px;">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        {!! Form::open(array('url' => 'userPasswordUpdate','method'=>'POST','class'=>'form-horizontal')) !!}

                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}} ">
                                          <label class="col-sm-4 control-label">Old Password  <star> *</star></label>
                                          <div class="col-sm-8">
                                            {{ Form::password('old_password', ['class' => 'form-control','placeholder'=>'Old Password','required'])}}

                                            @if ($errors->has('old_password'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                              </span>
                                            @endif
                                            
                                          </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}} ">
                                          <label class="col-sm-4 control-label">New Password  <star> *</star></label>
                                          <div class="col-sm-8">
                                            {{ Form::password('password', ['class' => 'form-control','placeholder'=>'New Password','required'])}}

                                            @if ($errors->has('password'))
                                              <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                              </span>
                                            @endif
                                          </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}} ">
                                          <label class="col-sm-4 control-label">Confirm New Password : <star> *</star></label>
                                          <div class="col-sm-8">
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
                                          <div class="col-sm-offset-4 col-sm-8">
                                            <button type="submit" class="btn btn-warning">
                                              <span class="btn-label">
                                                <i class="fa fa-check"></i>
                                              </span>
                                              Update
                                            </button>
                                          </div>
                                        </div>
                                      {!! Form::close() !!}
                                    </div>
                                    <div class="col-md-1"></div>
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane" id="view">
                    
                                </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                
@endsection