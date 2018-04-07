@extends('backend.app')
@section('content')
<style type="text/css">
  .form-group{margin:10px 0;}
</style>
<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">View All Users</h3>
    
    <hr class="col-md-12">
    <div class="col-md-12">

        <section class="panel">
            <header class="panel-heading">
              All Users
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Role</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    @foreach($userDatas as $data)
                        @if($data->email != "admin@codeplanners.com")
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$data->role_name}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                            <td>
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$data->fk_user_id}}"> View </a>

                                <!-- Modal -->
                            <div class="modal fade" id="myModal{{$data->fk_user_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">User View</h4>
                                  </div>
                                  <div class="modal-body">
                                    <table class="table table-bordered" cellspacing="0">
                                        <tr>
                                          <th width="50%">Sl No.</th>
                                          <td>{{ $i }}</td>
                                        </tr>
                                        <tr>
                                          <th width="50%">Role Type</th>
                                          <td>{{ $data->role_name }}</td>
                                        </tr>
                                        <!--  -->
                                        <tr>
                                          <th width="50%">Created At</th>
                                          <td>{{ $data->created_at }}</td>
                                        </tr>
                                        <tr>
                                          <th width="50%">Created By</th>
                                          <td>{{ $data->created_by }}</td>
                                        </tr>
                                        
                                      </table>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- edit section -->
                            <a href="userUpdate/<?php echo $data->fk_user_id; ?>" class="btn btn-info waves-effect w-xs waves-light m-r-5 m-b-10"> Edit </a>
                            <!-- end edit section -->

                            <!-- start change password section -->
                            <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal-password{{$data->fk_user_id}}"> Change Password </a>

                                <!-- Modal -->
                            <div class="modal fade" id="myModal-password{{$data->fk_user_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">User Change Password</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="custom-modal-text">
                                      {!! Form::open(array('url' => 'userPasswordUpdate/'.$data->fk_user_id,'class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!}
                                        
                                        <div class="form-group col-md-12 {{ $errors->has('password') ? 'has-error' : ''}} ">
                    
                                            <label for="pass1" class="col-sm-4 control-label">New Password</label>
                                            <div class="col-sm-8">
                                              {{ Form::password('password', ['class' => 'form-control','placeholder'=>'Password min 6','required','id'=>'pass1'])}}

                                              @if ($errors->has('password'))
                                                <span class="help-block">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                              @endif
                                            </div>
                                          </div>
                                          <div class="form-group col-md-12 {{ $errors->has('password_confirmation') ? 'has-error' : ''}} ">
                                            <label for="passWord2" class="col-sm-4 control-label">Confirm New Password </label>
                                            <div class="col-sm-8">
                                              {{ Form::password('password_confirmation', ['class' => 'form-control','placeholder'=>'Confirm Password','required','id'=>'passWord2'])}}
                                              
                                              @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                              @endif
                                            </div>
                                          </div> 
                                          <div class="form-group col-md-12">
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
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            <!-- end change password section -->
                          </td>
                            
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
 
    </div>        
</div>

@endsection




<script type="text/javascript">

function deleteConfirm(){
  var con= confirm("Do you want to delete?");
  if(con){
    return true;
  }else 
  return false;
}
</script>

