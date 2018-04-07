@extends('backend.app')
@section('content')
<style type="text/css">
  .form-group{margin:10px 0;}
  .tools a{color: #000;}
</style>
<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">View Custom Order</h3>

    <div class="col-md-12 no_padding">

        <section class="panel">
            <header class="panel-heading">
              All Custom Orders
                <span class="tools pull-right">
                <a href="{{URL::to('/addCustomOrder')}}" class="btn btn-success">Add New Custom Order</a>
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
                            <th>Title</th>
                            <th>Price</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    @foreach($customOrderDatas as $data)
                        @if(Auth::user()->email == "admin@codeplanners.com")
                            <td>{{$i++}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->price}}</td>
                            <td>{{$data->category_name}}</td>
                            <td>{{$data->status}}<!-- <i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i> --></td>
                            <td>
                            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$data->id}}"> View </a>

                                <!-- Modal -->
                            <div class="modal fade" id="myModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                          <th width="50%">Title</th>
                                          <td>{{ $data->title }}</td>
                                        </tr>
                                        <tr>
                                          <th width="50%">Category Name</th>
                                          <td>{{ $data->category_name }}</td>
                                        </tr>
                                        <tr>
                                          <th width="50%">Sub Category Name</th>
                                          <td>{{ $data->sub_category_name }}</td>
                                        </tr>
                                        <tr>
                                          <th width="50%">Image Path</th>
                                          <td>
                                             <img src="public/img/customOrder/{{ $data->photo_path }}" style="width: 50%;">
                                          </td>
                                        </tr>
                                        <tr>
                                          <th width="50%">Created At</th>
                                          <td>{{ $data->created_at }}</td>
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
                          </td>
                          <td>
                            <!-- edit section -->
                            <a href="customOrderUpdate/<?php echo $data->id; ?>" class="btn btn-info waves-effect w-xs waves-light m-r-5 m-b-10"> Edit </a>
                            <!-- end edit section -->
                          </td>
                          <td>
                            <!-- delete section -->
                            {{Form::open(array('route'=>['addCustomOrder.destroy',$data->id],'method'=>'DELETE'))}}
                            {{ Form::hidden('id',$data->id)}}
                              <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()">Delete</button>
                            {!! Form::close() !!}
                            <!-- end delete section -->

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

