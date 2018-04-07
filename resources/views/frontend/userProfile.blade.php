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
                                    <!-- Nav tabs -->
                                      <ul class="nav nav-tabs" role="tablist">
                                       
                                        <li role="presentation" class="active"><a href="{{ URL::to('myProfile')}}">Update Profile</a></li>
                                      
                                        <li role="presentation"><a href="{{ URL::to('changeUserPassword')}}" >Change Password</a></li>
                                       
                                        
                                      </ul>
                                      <!-- Tab panes -->
                                <div role="tabpanel" class="tab-pane active" id="profile" style=" margin-top: 25px;">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        {!! Form::open(array('url' => 'userProfileUpdate','class'=>'form-horizontal author_form','method'=>'POST','files'=>'true')) !!}

                                        {{Form::hidden('id',Auth::user()->id)}}

                                              <div class="form-group">
                                                <label for="inputName3" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                  <input name="name" type="text" class="form-control" id="inputName3" value="{{Auth::user()->name}}">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                  <input name="email" type="email" class="form-control" id="inputEmail3" value="{{Auth::user()->email}}">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="inputPhone3" class="col-sm-2 control-label">Phone</label>
                                                <div class="col-sm-10">
                                                  <input name="phone" type="text" class="form-control" id="inputPhone3" value="{{Auth::user()->phone}}">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                  <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                              </div>
                                            
                                            <div class="clearfix"></div>
                                        {!! Form::close(); !!}
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