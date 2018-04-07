@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Sub Category</h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => 'subCategory.store','class'=>'form-horizontal')) !!}
        <div class="form-group {{ $errors->has('fk_category_id') ? 'has-error' : '' }}">
            {{Form::label('fk_category_id', 'Category Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                <select name="fk_category_id" class="form-control">
                @foreach($category as $row)
                    <option value="{{$row->id}}">{{$row->category_name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('fk_category_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fk_category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
            <div class="form-group {{ $errors->has('sub_category_name') ? 'has-error' : '' }}">
            {{Form::label('sub_category_name', 'Sub Category Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('sub_category_name','',array('class'=>'form-control','placeholder'=>'Sub Category Name','required'))}}
                @if ($errors->has('sub_category_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sub_category_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
            <div class="col-md-2">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
            </div>
            </div>
        </div>
            <div class="col-md-2 pull-right">
                {{Form::submit('Submit',array('class'=>'btn btn-info'))}}
            </div>
            
        {!! Form::close() !!}
    </div>
    <hr class="col-md-12">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Sub Category Name</th>
                    <th>Status</th>
                    <th>Attribute</th>
                    <th>Created At</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1; ?>
            @foreach($allData as $data)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$data->sub_category_name}}</td>
                    <td>{{$data->category_name}}</td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                    <td><a class="label label-success" href='{{URL::to("sub-attribute/$data->id")}}'><i class="fa fa-plus"></i> Attribute</a></td>
                    <td>{{$data->created_at}}</td>
                    <td><a href="#editModal{{$data->id}}" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Category</h4>
      </div>
        {!! Form::open(array('route' => ['subCategory.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
      <div class="modal-body">
     
        <div class="form-group">
            {{Form::label('fk_category_id', 'Category Name', array('class' => 'col-md-4 control-label'))}}
            <div class="col-md-8">
                <select name="fk_category_id" class="form-control">
                    <option value="">---select category---</option>
                    @foreach($category as $row)
                   <option value="{{$row->id}}" {{($data->fk_category_id==$row->id) ? 'selected' : '' }}>{{$row->category_name}}</option>
                   @endforeach
                </select>
                @if ($errors->has('fk_category_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fk_category_id') }}</strong>
                        </span>
                    @endif
            </div>
        </div>
        <div class="form-group">
            {{Form::label('sub_category_name', 'Sub Category Name', array('class' => 'col-md-4 control-label'))}}
            <div class="col-md-8">
                {{Form::text('sub_category_name',$data->sub_category_name,array('class'=>'form-control','placeholder'=>'Sub Category Name','required'))}}
                {{Form::hidden('id',$data->id)}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('sub_category_name', 'Sub Category Status', array('class' => 'col-md-4 control-label'))}}

            <div class="col-md-8">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), ($data->status==1)?'1':'2', ['class' => 'form-control'])}}
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
                        {{Form::open(array('route'=>['subCategory.destroy',$data->id],'method'=>'DELETE'))}}
                            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
        {{$allData->render()}}  
        </div>
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