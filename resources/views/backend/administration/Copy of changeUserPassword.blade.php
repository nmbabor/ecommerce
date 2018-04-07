@extends('backend.layout.app')
    @section('content')
    <style>
    .full_contain{width: 100%;overflow: hidden;margin: 20px auto;}
    .form-group{margin: 5px auto;}
    </style>

    <div class="col-md-12 noPadding">
        <div class="card-box">
             
			<h4 class="header-title m-t-0 m-b-30"><i class="fa fa-pencil" aria-hidden="true"></i> Update Profile <a class="btn btn-default" href="{{ URL::to('viewUsers')}}" style="float: right;"><i class="fa fa-eye" aria-hidden="true"></i> View My Profile</a></h4>
            
            <hr>

            <div class="main_article_content">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
               
                <li role="presentation"><a href="{{ URL::to('userUpdate/'.$id)}}">Update User Profile</a></li>
              
                <li role="presentation" class="active"><a href="#" >Change Password</a></li>
               
                
              </ul>
              <!-- Tab panes -->
              <div class="full_contain" style="">
                <div role="tabpanel" class="tab-pane active" id="englishVersion">
                  <!-- <div class="col-sm-1"></div> -->  
                  <div class="col-sm-12">

                  {!! Form::open(array('url' => 'userPasswordUpdate/'.$id,'method'=>'POST','class'=>'form-horizontal')) !!}

                        
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
                  <!-- <div class="col-sm-1"></div> -->  
                </div>
                <div role="tabpanel" class="tab-pane" id="banglaVersion">
                    
                </div>
              </div>

            </div>
        </div>
    </div><!-- end col -->
        
    <script src="{{ asset('public/assets/backend/js/jquery.min.js') }}" type="text/javascript"></script>
    <!-- image view -->
      <script type="text/javascript">
        $(document).ready(function(){
            function readURL(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#banner-image').attr('src', e.target.result);
                }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#banner-image-select").change(function(){
                readURL(this);
            });
        });
      </script>
      <!-- article type condition -->
      
                
@endsection