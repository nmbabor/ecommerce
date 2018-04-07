@extends('backend.app')
@section('content')
<style type="text/css">
  .form-group{margin:10px 0;}
  .top_bar a{color: #000;}
</style>
<div class="tab_content col-md-12" style="padding-top:0;">
    
    <div class="col-md-12 no_padding">

        <section class="panel">
            <header class="panel-heading">
              View Orders
                <span class="tools pull-right top_bar">
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
                            <th>Invoice</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Total</th>
                            <th width="6%">Status</th>
                            <th colspan="3" width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    @foreach($allData as $data)
                        
                        <tr>
                            <td>{{$data->invoice_id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->total_amount}}</td>
                            
                            <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                            <td>
                            <a type="button" class="btn btn-success" href="singleItem/<?php echo $data->id; ?>" title="Item View"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                           
                            <td>
                            <!-- delete section -->
                            {{Form::open(array('route'=>['item.destroy',$data->id],'method'=>'DELETE'))}}
                            {{ Form::hidden('id',$data->id)}}
                              <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()" title="Item Delete">
                              <i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            {!! Form::close() !!}
                            <!-- end delete section -->

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

