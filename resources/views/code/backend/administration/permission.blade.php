@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Permission</h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => 'permission.store','class'=>'form-horizontal')) !!}
        
            <div class="form-group {{ $errors->has('permission_name') ? 'has-error' : '' }}">
            {{Form::label('permission_name', 'Permission Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('permission_name','',array('class'=>'form-control','placeholder'=>'Enter Permission Name','required'))}}
                @if ($errors->has('permission_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('permission_name') }}</strong>
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

        <section class="panel">
            <header class="panel-heading">
                View Permissions
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
                            <th>Permission Name</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($permissionDatas as $data)
                    <?php $i++; ?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$data->permission_name}}</td>
                            <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                            
                            <td><a href="#editModal{{$data->id}}" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                            <!-- Modal -->
                                <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" permission="dialog">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Permission</h4>
                                      </div>
                                        {!! Form::open(array('route' => ['permission.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
                                      <div class="modal-body">
                                        <div class="form-group">
                                            {{Form::label('permission_name', 'Permission Name', array('class' => 'col-md-3 control-label'))}}
                                            <div class="col-md-9">
                                                {{Form::text('permission_name',$data->permission_name,array('class'=>'form-control','placeholder'=>'Permission Name','required'))}}
                                                {{Form::hidden('id',$data->id)}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {{Form::label('status', 'Permission Status', array('class' => 'col-md-3 control-label'))}}
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
                                {{Form::open(array('route'=>['permission.destroy',$data->id],'method'=>'DELETE'))}}
                                    <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
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

