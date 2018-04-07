@extends('backend.app')
@section('content')
<style type="text/css">
  .form-group{margin:10px 0;}
  .top_bar a{color: #000;}
</style>
<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">View Items</h3>
    
    <div class="col-md-12 no_padding">

        <section class="panel">
            <header class="panel-heading">
              All Items
                <span class="tools pull-right top_bar">
                <a href="{{URL::to('/item')}}" class="btn btn-success">Add New Item</a>
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
                            <th>Item Name</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th width="6%">Status</th>
                            <th width="12%">Type</th>
                            <th width="10%">Package</th>
                            <th colspan="2" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <? $i=1; ?>
                    @foreach($itemDatas as $data)
                        
                        <tr>
                            <td><a class="btn btn-link" href='{{URL::to("/singleItem/$data->id")}}' title="Item View">{{$data->item_name}}</a></td>
                            <td>{{$data->product_code}}</td>
                            <td>{{$data->category_name}}</td>
                            <td>{{$data->sale_price}}</td>
                            <td>{{$data->quantity}}</td>
                            
                            <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                            <td>
                                <?php 
                                  if($data->is_featured==1){
                                    echo "Special Item";
                                  }else{
                                    echo "Normal Item";
                                  }
                                 ?>
                            </td>
                            <td><a href='{{URL::to("/addPackage/$data->id")}}' class="btn btn-warning"> Packages</a></td>
                            <td>
                            <!-- edit section -->
                            <a href='{{URL::to("/itemUpdate/$data->id")}}' class="btn btn-info waves-effect w-xs waves-light m-r-5 m-b-10"  title="Item Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <!-- end edit section -->
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
                {{$itemDatas->render()}}
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

