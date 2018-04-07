@extends('backend.app')
@section('content')
<div class="tab_content">

<h4 class="box_title">
 <a href="{{URL::to('attribute/'.$allData['attributes']['category_id'])}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View attribute</a></h4>

 <div class="col-md-4">
 @if(isset($allData['attributes']))
     <p> <b>Attribute: </b>{{$allData['attributes']['name']}}<br> <b>Category: </b> {{$allData['attributes']['category_name']}}<br> 
     @if(isset($allData['attributes']['sub_category_name']) )
     <b>Sub Category: </b> {{$allData['attributes']['sub_category_name']}} 
     @endif</p>
@endif
 </div>
 <div class="col-md-8">
     {!! Form::open(array('route' => 'attribute-option.store','class'=>'form-horizontal','id'=>'form_submit')) !!}
    
        <div class="form-group">
                {{Form::label('name', 'Option Name', array('class' => 'col-md-3 control-label'))}}
                <div class="col-md-8">
                    {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Option Name','required'))}}
                </div>
            </div>
            <? $fk_attribute_id=$allData['fk_attribute_id']; ?>
            {{Form::hidden('fk_attribute_id',"$fk_attribute_id")}}
        <div class="form-group">
            <div class="col-md-8 col-md-offset-3">
                {{Form::submit('Submit',array('class'=>'btn btn-info'))}}
            </div>
        </div>
            
        {!! Form::close() !!}
 </div>
    

        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Option Name</th>
                    <th>attribute</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1;?>
            @foreach($allData['attribute'] as $data)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$data['name']}}</td>
                    <td>{{$data['attribute_name']}}</td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                    <td>{{$data['created_at']}}</td>
                    <td><a href="#editModal{{$data['id']}}" data-toggle="modal" class="btn btn-info"><i class="ion ion-compose"></i></a>
                    <!-- Modal -->
<div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit attribute Option</h4>
      </div>
        {!! Form::open(array('route' => ['attribute-option.update',$data->id],'class'=>'form-horizontal','method'=>'PUT')) !!}
      <div class="modal-body">
        <div class="form-group">
            {{Form::label('name', 'Option Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                {{Form::text('name',$data->name,array('class'=>'form-control','placeholder'=>'Option Name','required'))}}
                {{Form::hidden('id',$data->id)}}
                {{Form::hidden('fk_attribute_id',$data->fk_attribute_id)}}
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
                        {{Form::open(array('route'=>['attribute-option.destroy',$data->id],'method'=>'DELETE'))}}
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


            
        