@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Add New User</h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => 'users.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!}
        
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{Form::label('name', 'User Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Enter User Name','required'))}}
                @if ($errors->has('role_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <!--  -->
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            {{Form::label('email', 'Email', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::email('email','',array('class'=>'form-control','placeholder'=>'Enter Email','required'))}}
                @if ($errors->has('role_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}} ">
                              
          <label for="pass1" class="col-sm-3 control-label">Password*</label>
          <div class="col-sm-8">
            {{ Form::password('password', ['class' => 'form-control','placeholder'=>'Password min 6','required','id'=>'pass1'])}}

            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
        </div>
        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}} ">
          <label for="passWord2" class="col-sm-3 control-label">Confirm Password *</label>
          <div class="col-sm-8">
            {{ Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>'Confirm Password','data-parsley-equalto'=>'#pass1','required','id'=>'passWord2'])}}
            
            @if ($errors->has('password_confirmation'))
              <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
            @endif
          </div>
        </div>
        <div class="form-group clearfix accessUser">
            <h3 class="text-center">Permission Role</h3>
            <hr>
            <div class="col-md-3"></div>
            <div class="col-md-6">
            @if(isset($roles))
            @foreach($roles as $role)
                <div class="checkbox checkbox-success">
                    <input name="fk_role_id[]" type="checkbox" id="inlineCheckbox<?php echo $role->id; ?>" value="<?php echo $role->id; ?>">
                    <label for="inlineCheckbox<?php echo $role->id; ?>" style="padding-left:0;"> <?php echo $role->role_name; ?> </label>
                </div>
            @endforeach
            @endif
            </div>
            <div class="col-md-3"></div>

        </div>
        <input type="hidden" name="created_by" value="{{ Auth::user()->email }}">
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">Confirm </button>
            </div>
        </div>
            
            
        {!! Form::close() !!}
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
