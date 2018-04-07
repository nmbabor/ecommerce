@extends('backend.app')
@section('content')
<div class="tab_content">

<h4 class="box_title">Attribute  @if(isset($allData['sub_sub_category']))
{{ "of '".$allData['sub_sub_category']['sub_category_name'].' : '.$allData['sub_sub_category']['sub_name']."'"}}
<? $sub_cat_id=$allData['sub_sub_category']['sub_category_id']; ?>
@endif
 <a href='{{URL::to("subSubCategory/$sub_cat_id")}}' class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View Sub Sub Category</a></h4>
 
    {!! Form::open(array('route' => 'attribute.store','class'=>'form-horizontal','id'=>'form_submit')) !!}
    
        <div class="form-group">
                {{Form::label('name', 'Attribute Name', array('class' => 'col-md-3 control-label'))}}
                <div class="col-md-8">
                    {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Attribute Name','required'))}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('attribute_type', 'Attribute type', array('class' => 'col-md-3 control-label'))}}
                <div class="col-md-6">
                    <select name="attribute_type" class="form-control" required>
                        <option value="">--select--</option>
                        <option value="1">select option</option>
                        <option value="2">Check box</option>
                    </select>
                </div>
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
                </div>
            </div>
            <div class="form-group">
                {{Form::label('required', 'Required', array('class' => 'col-md-3 control-label'))}}
                <div class="col-md-2">
                    <label><input type="radio" name="required" value="1"> Yes</label>
                    <label><input type="radio" name="required" value="0" checked=""> No</label>
                </div>
                {{Form::label('mina', 'Min', array('class' => 'col-md-1 control-label'))}}
                <div class="col-md-2">
                     {{Form::number('min','',array('class'=>'form-control','placeholder'=>'Minimum'))}}
                </div>
                {{Form::label('max', 'Max', array('class' => 'col-md-1 control-label'))}}
                <div class="col-md-2">
                    {{Form::number('max','',array('class'=>'form-control','placeholder'=>'Maximum'))}}
                </div>
                
            </div>
            <? $fk_category_id=$allData['sub_sub_category']['category_id']; ?>
            <? $fk_subcategory_id=$allData['sub_sub_category']['sub_category_id']; ?>
            <? $fk_sub_sub_category_id=$allData['fk_sub_sub_category_id']; ?>
            {{Form::hidden('fk_sub_sub_category_id',"$fk_sub_sub_category_id")}}
            {{Form::hidden('fk_subcategory_id',"$fk_subcategory_id")}}
            {{Form::hidden('fk_category_id',"$fk_category_id")}}
        <div class="form-group">
            <div class="col-md-8 col-md-offset-3">
                {{Form::submit('Submit',array('class'=>'btn btn-info'))}}
            </div>
        </div>
            
        {!! Form::close() !!}

        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Attribute Name</th>
                    <th>Type</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Option</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1;?>
            @foreach($allData['attribute'] as $data)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$data['name']}}</td>
                    <td>
                    @if($data['attribute_type']==1)
                    Select Option
                    @elseif($data['attribute_type'] == 2)
                    Check box
                    @endif
                    </td>
                    <td>{{$data['category_name']}}</td>
                    <td>{{$data['sub_category_name']}}</td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                    <td>{{$data['created_at']}}</td>
                    <td><a class="btn btn-info" href='{{URL::to("attribute-option/$data->id")}}'><i class="fa fa-plus"></i> Option</a></td>
                    <td><a href="#editModal{{$data['id']}}" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit attributes</h4>
      </div>
        {!! Form::open(array('route' => ['attribute.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
      <div class="modal-body">
        <div class="form-group">
            {{Form::label('name', 'Attributes Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                {{Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'attributes Name','required'))}}
                {{Form::hidden('id',$data->id)}}
                {{Form::hidden('fk_category_id',$data->fk_category_id)}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('attribute_type', 'Attribute Type', array('class' => 'col-md-3 control-label'))}}

            <div class="col-md-5">
                {{Form::select('attribute_type', array('1' => 'Select Option', '2' => 'Check Box'),$data->attribute_type, ['class' => 'form-control'])}}
            </div>

            <div class="col-md-4">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])}}
            </div>
        </div>
         <div class="form-group">
                {{Form::label('required', 'Required', array('class' => 'col-md-3 control-label'))}}
                <div class="col-md-2">
                    <label><input type="radio" name="required" value="1" {{($data->required==1)? 'checked' : ''}}> Yes</label>
                    <label><input type="radio" name="required" value="0" {{($data->required==0)? 'checked' : ''}}> No</label>
                </div>
                {{Form::label('mina', 'Min', array('class' => 'col-md-1 control-label'))}}
                <div class="col-md-2">
                     {{Form::number('min',$data->min,array('class'=>'form-control','placeholder'=>'Minimum'))}}
                </div>
                {{Form::label('max', 'Max', array('class' => 'col-md-1 control-label'))}}
                <div class="col-md-2">
                    {{Form::number('max',$data->max,array('class'=>'form-control','placeholder'=>'Maximum'))}}
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
                        {{Form::open(array('route'=>['attribute.destroy',$data->id],'method'=>'DELETE'))}}
                            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
        </div>
    
@endsection


            
        