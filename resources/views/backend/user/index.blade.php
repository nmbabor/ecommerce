@extends('backend.app')
    @section('content')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
                            @if ($errors->has('email'))
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>{{ $errors->first('email') }}</b> 
                                   </div>
                                </div>
                            @endif
                                
                                     
<h4 class="header-title m-t-0 m-b-30"><i class="fa fa-pencil" aria-hidden="true"></i> View All User Information <a href="{{route('users.create')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> Add new user</a></h4>
                                    <hr>
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Type</th>
                                                    <th width="15%">Created At</th>
                                                    <th width="5%">Edit</th>
                                                    <th width="5%">Delete</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            <? $i=1; ?>
                                        @foreach($allUsers as $data)
                                                <tr>
                    <td>{{$i++}}</td>
                    <td> <a href="{{route('users.show',$data->id)}}" class="btn btn-link">{{$data->name}}</a></td>
                    <td>{{$data->email}}</td>
                    <td> 
                    @if($data->type==1)
                    Administrator
                    @else
                    Moderator
                    @endif
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td><a href="#editModal{{$data->id}}" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit User</h4>
      </div>
        {!! Form::open(array('route' => ['users.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
      <div class="modal-body">
        <div class="form-group">
            {{Form::label('name', 'Name', array('class' => 'col-md-4 control-label'))}}
            <div class="col-md-8">
                {{Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'Name','required'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email', array('class' => 'col-md-4 control-label'))}}
            <div class="col-md-8">
                {{Form::email('email',$data->email,array('class'=>'form-control','placeholder'=>'Email','required'))}}
            </div>
            {{Form::hidden('id',$data->id)}}
        </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{Form::submit('Save changes',array('class'=>'btn btn-info'))}}
      </div>
        {!! Form::close() !!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

                    </td>
                    <td>
        {!! Form::open(array('route' => ['users.destroy',$data->id],'method'=>'DELETE')) !!}
            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
                                               
                                            </tbody>
                                        </table>
                                        <div class="pull-right">
                                        {{$allUsers->render()}} 
                                        </div>
        @endsection