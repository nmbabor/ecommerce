@extends('backend.app')
    @section('content')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            
<h4 class="header-title m-t-0 m-b-30"><i class="fa fa-pencil" aria-hidden="true"></i> User Information <a href="{{route('users.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View all user</a></h4>
                                    <hr>

{!! Form::open(array('route' => 'users.store','class'=>'form-horizontal','files'=>true)) !!}
                                    
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="fullName" class="col-sm-3 control-label">Full Name* : </label>
    <div class="col-sm-7">
        <input type="text" name="name" parsley-trigger="change" required
           placeholder="Enter Full Name" class="form-control" id="fullName" value="{{ old('name') }}">
           @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="inputEmail3" class="col-sm-3 control-label">Email* :</label>
    <div class="col-sm-7">
        <input type="email" name="email" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="Email" value="{{ old('email') }}">
               @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
    </div>
</div>
<div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="pass1" class="col-sm-3 control-label">Password*</label>
    <div class="col-sm-7">
        <input name="password" id="pass1" type="password" placeholder="Password" required class="form-control">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    <label for="passWord2" class="col-sm-3 control-label">Confirm Password *</label>
    <div class="col-sm-7">
        <input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2" name="password_confirmation">
        @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
        @endif
    </div>
</div>
<div class="form-group  {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-sm-3 control-label">Phone Number*</label>
    <div class="col-sm-7">
        <input name="phone" id="phone" type="number" placeholder="01xxxxxxxxx" required class="form-control">
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group">
    {{Form::label('type', 'Type', array('class' => 'col-md-3 control-label'))}}
    <div class="col-md-7">
        {{Form::select('type', array('1' => 'Administrator', '3' => 'Moderator'),'3', ['class' => 'form-control'])}}
    </div>
</div>
<div class="form-group  {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="file" class="col-sm-3 control-label">Choose Image* :</label>
    <div class="col-sm-5">
        <input name="image" id="file" type="file" placeholder="Profile Picture"  class="form-control">
        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-sm-2">
        <div class="profile_image">
            <img id="image_load">
        </div>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5">
            Register
        </button>
    </div>
</div>
    {!! Form::close() !!}
                            

                
        @endsection