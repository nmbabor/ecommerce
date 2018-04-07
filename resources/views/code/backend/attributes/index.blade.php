@extends('backend.app')
@section('content')


<h3 class="box_title">Attributes</h3>
	<div class="box-body col-md-10">
		{!! Form::open(array('route' => 'attributes.store','class'=>'form-horizontal')) !!}
		<div class="form-group {{ $errors->has('attribute_name') ? 'has-error' : '' }}">
			{{Form::label('attribute_name', 'Attributes Name', array('class' => 'col-md-2 control-label'))}}
			<div class="col-md-10">
				{{Form::text('attribute_name','',array('class'=>'form-control','placeholder'=>'attributes Name','required'))}}
				@if ($errors->has('attribute_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('attribute_name') }}</strong>
                    </span>
	            @endif
			</div>
		</div>
		<div class="form-group">
			{{Form::label('type', 'Status', array('class' => 'col-md-2 control-label'))}}

			
				{{Form::hidden('type','1')}}
			<div class="col-md-10">
				{{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
				
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-10 col-md-offset-2">
				{{Form::submit('Submit',array('class'=>'btn btn-info'))}}
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
					<th>attributes Name</th>
					<th>Status</th>
					<th>Created At</th>
					<th>Updated At</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
			<? $i=1; ?>
			@foreach($allData as $data)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$data->attribute_name}}</td>
					<td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
					<td>{{$data->created_at}}</td>
					<td>{{$data->updated_at}}</td>
					<td><a href="#editModal{{$data->id}}" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
					<!-- Modal -->
<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit attributes</h4>
      </div>
        {!! Form::open(array('route' => ['attributes.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
      <div class="modal-body">
		<div class="form-group">
			{{Form::label('attribute_name', 'attributes Name', array('class' => 'col-md-3 control-label'))}}
			<div class="col-md-9">
				{{Form::text('attribute_name',$data->attribute_name,array('class'=>'form-control','placeholder'=>'attributes Name','required'))}}
				{{Form::hidden('id',$data->id)}}
			</div>
		</div>
		<div class="form-group">
			{{Form::label('type', 'Categroy Type', array('class' => 'col-md-3 control-label'))}}

			<div class="col-md-5">
				{{Form::select('type', array('1' => 'Portfolio', '2' => 'Blog'),$data->type, ['class' => 'form-control'])}}
			</div>

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
						{{Form::open(array('route'=>['attributes.destroy',$data->id],'method'=>'DELETE'))}}
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
