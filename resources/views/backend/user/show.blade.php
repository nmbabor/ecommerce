@extends('backend.app')
    @section('content')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
<h4 class="header-title m-t-0 m-b-30"><i class="fa fa-pencil" aria-hidden="true"></i> User Information
    @if(Auth::user()->type==1) <a href="{{route('users.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View all user</a>@endif
</h4>
                                    <hr>

         {!! Form::open(array('route' => ['users.update',$data->id],'class'=>'form-horizontal','method'=>'PUT','files'=>true)) !!}
                       <input type="hidden" name="id" value="{{$data->id}}">      
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="fullName" class="col-sm-3 control-label">Full Name* : </label>
    <div class="col-sm-7">
        <input type="text" name="name" parsley-trigger="change" value="{{$data->name}}" required
           placeholder="Enter Full Name" class="form-control" id="fullName">
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
        <input type="email" name="email" value=" {{$data->email}} " required parsley-type="email" class="form-control"
               id="inputEmail3" placeholder="Email">
               @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
    </div>
</div>
<div class="form-group  {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-sm-3 control-label">Phone Number*</label>
    <div class="col-sm-7">
        <input name="phone" id="phone" type="number" value="{{$data->phone}}" placeholder="01xxxxxxxxx" required class="form-control">
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>
 @if(Auth::user()->type==1)
<div class="form-group">
    {{Form::label('type', 'Type', array('class' => 'col-md-3 control-label'))}}
    <div class="col-md-7">
        {{Form::select('type', array('1' => 'Administrator', '3' => 'Moderator'),$data->type, ['class' => 'form-control'])}}
    </div>
</div>
@endif
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
           @if($data->image!=null)
                <img src="{{asset($data->image)}}" id="image_load">
                @else
                <img src="{{asset('public/img/demo.png')}}" id="image_load">
           @endif 
        </div>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-3 col-sm-8">
        <a class="btn btn-warning btn-trans waves-effect w-md waves-success m-b-5" href="{{route('users.edit',$data->id)}}" >Change Password</a>
        <button type="submit" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5">
            Save
        </button>
    </div>
</div>
    {!! Form::close() !!}
                
        @endsection