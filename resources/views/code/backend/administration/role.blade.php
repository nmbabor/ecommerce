@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Role</h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => 'role.store','class'=>'form-horizontal')) !!}
        
            <div class="form-group {{ $errors->has('role_name') ? 'has-error' : '' }}">
            {{Form::label('role_name', 'Role Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('role_name','',array('class'=>'form-control','placeholder'=>'Enter Role Name','required'))}}
                @if ($errors->has('role_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">Confirm </button>
            </div>
        </div>
            
            
        {!! Form::close() !!}
    </div>
    <hr class="col-md-12">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Role Name</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0; ?>
            @foreach($roleDatas as $data)
            <?php $i++; ?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$data->role_name}}</td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                    
                    <td><a href="#editModal{{$data->id}}" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
                        <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Role</h4>
                              </div>
                                {!! Form::open(array('route' => ['role.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
                              <div class="modal-body">
                                <div class="form-group">
                                    {{Form::label('role_name', 'Role Name', array('class' => 'col-md-3 control-label'))}}
                                    <div class="col-md-9">
                                        {{Form::text('role_name',$data->role_name,array('class'=>'form-control','placeholder'=>'Role Name','required'))}}
                                        {{Form::hidden('id',$data->id)}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Role Status', array('class' => 'col-md-3 control-label'))}}
                                    <div class="col-md-4">
                                        {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])}}
                                    </div>
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
                        {{Form::open(array('route'=>['role.destroy',$data->id],'method'=>'DELETE'))}}
                            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
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