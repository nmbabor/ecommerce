@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">User Update</h3>
    <div class="box-body col-md-10">
    @if(isset($userData))
        <ul class="nav nav-tabs" role="tablist">
               
            <li role="presentation" class="active"><a href="#">Update Profile</a></li>
            <li role="presentation"><a href="{{ URL::to('changeUserPassword/'.$id)}}">Change Password</a></li>
          </ul>
        {!! Form::open(array('route' => ['users.update',$id],'class'=>'form-horizontal','method'=>'PUT','files'=>'true')) !!}
        
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{Form::label('name', 'User Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('name',$userData->name,array('class'=>'form-control','placeholder'=>'Enter User Name','required'))}}
                @if ($errors->has('role_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '0' => 'Inactive'),$userData->status, ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <!--  -->
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {{Form::label('email', 'Email', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::email('email',$userData->email,array('class'=>'form-control','placeholder'=>'Enter Email','required'))}}
                @if ($errors->has('role_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <input type="hidden" name="password" value="{{$userData->password}}">
        <input type="hidden" name="updated_by" value="{{ Auth::user()->email }}">
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">Confirm </button>
            </div>
        </div>
            
            
        {!! Form::close() !!}
    @endif
    </div>
    <hr class="col-md-12">
           
</div>

@endsection
<script src="{{ asset('public/backend/js/jquery.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function(){
            function readURL(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profile-image').attr('src', e.target.result);
                }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#profile-image-select").change(function(){
                readURL(this);
            });
        });
      </script>
