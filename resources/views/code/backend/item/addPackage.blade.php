@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Add Package Item <a href="{{URL::to('/viewItems')}}" class="pull-right btn btn-info">View Items</a><a href="{{URL::to('/item')}}" class="pull-right btn btn-success">Add New Item</a></h3>
    <div class="box-body col-md-12">
        {!! Form::open(array('url' => ['addPackageCreate',$id],'class'=>'form-horizontal','method'=>'POST')) !!}
            <h3 class="text-center">{{$item->item_name}}</h3>
            <hr class="col-md-12" style="border: 1px solid #ccc;">
        <div class="col-md-12">
            <div class="{{ $errors->has('package_title') ? 'has-error' : '' }}">
            {{Form::label('package_title', 'Package Title:', array('class' => 'col-md-2 control-label'))}}
                <div class="col-md-3">
                    {{Form::text('package_title','',array('class'=>'form-control','placeholder'=>'Enter Package Title','required'))}}
                    @if ($errors->has('package_title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('package_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class=" {{ $errors->has('price') ? 'has-error' : '' }}">
            {{Form::label('price', 'Package Price', array('class' => 'col-md-2 control-label'))}}
                <div class="col-md-3">
                    {{Form::number('price','',array('class'=>'form-control','placeholder'=>'Enter Package Price','required'))}}
                    @if ($errors->has('price'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="fk_item_id">
            <div class="">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-7">
                  <button type="submit" class="btn btn-success">Confirm </button>
                </div>
            </div>
            
            
        {!! Form::close() !!}
    
    <hr class="col-md-12">
    <div class="col-md-12">
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Package Title</th>
                    <th>Package Price</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=0; ?>
            @foreach($packageDatas as $data)
            <?php $i++; ?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$data->package_title}}</td>
                    <td>{{$data->price}}</td>
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
                                {!! Form::open(array('url' => ['packageUpdate',$data->id],'class'=>'form-horizontal','method'=>'POST')) !!}
                              <div class="modal-body">
                                <div class="form-group">
                                    {{Form::label('PackageTitle', 'Package Title', array('class' => 'col-md-3 control-label'))}}
                                    <div class="col-md-9">
                                        {{Form::text('package_title',$data->package_title,array('class'=>'form-control','placeholder'=>'Package package_title','required'))}}
                                        {{Form::hidden('id',$data->id)}}
                                    </div>
                                </div>
                                <input type="hidden" value="<?php echo $id; ?>" name="fk_item_id">
                                <div class="form-group">
                                    {{Form::label('price', 'Package Price', array('class' => 'col-md-3 control-label'))}}
                                    <div class="col-md-9">
                                        {{Form::text('price',$data->price,array('class'=>'form-control','placeholder'=>'Package Price','required'))}}
                                        {{Form::hidden('id',$data->id)}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Package Status', array('class' => 'col-md-3 control-label'))}}
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
                        {{Form::open(array('url'=>['packageDestroy',$data->id],'method'=>'POST'))}}
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