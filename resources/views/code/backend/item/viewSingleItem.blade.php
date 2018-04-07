@extends('backend.app')
@section('content')
<style type="text/css">
  .form-group{margin:10px 0;}
  .tools a{color: #000;}
  .wrapper {padding: 0;}
</style>
<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">View Item</h3>
    
    <div class="col-md-12">

        <section class="panel">
            <header class="panel-heading">
              Item
                <span class="tools pull-right">
                  <a href="{{URL::to('/addPackage/'.$id)}}" class="btn btn-info">Add packages</a>
                  <a href="{{URL::to('/itemUpdate/'.$id)}}" class="btn btn-primary">Edit Item</a>
                  <a href="{{URL::to('/item')}}" class="btn btn-success">Add New Item</a>
                  <a href="{{URL::to('/viewItems')}}" class="btn btn-warning">View Items</a>
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-cog"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="custom-modal-text">
                  <table class="table table-bordered" cellspacing="0">
                  <tr>
                    <th>Item Status </th>
                    <td><?php echo $item->status; ?></td>
                  </tr>
                  <tr>
                    <th>Item Name </th>
                    <td><?php echo $item->item_name; ?></td>
                  </tr>
                  <tr>
                    <th>Featureing Item Type </th>
                    <td><?php 
                      if($item->is_featured==1){
                        echo "Special Item";
                      }else{
                        echo "Normal Item";
                      }
                     ?></td>
                  </tr>
                  <tr>
                    <th>Item Image</th>
                          <td><img class="live_img_view" id="banner-image" src='{{asset("public/img/item$item->photo_path")}}' alt="" style="width:50%;"></td>
                  </tr>
                  <tr>
                    <th>Short Description</th>
                    <td><?php echo $item->short_description; ?></td>
                  </tr>
                  <tr>
                    <th>Category Name</th>
                    <td><?php echo $item->category_name; ?></td>
                  </tr>
                  @if($item->sub_category_name!=null)
                  <tr>
                    <th>Sub Category Name</th>
                    <td><?php echo $item->sub_category_name; ?></td>
                  </tr>
                  @endif
                  
                  <tr>
                    <th>Sale Price</th>
                    <td><?php echo $item->sale_price; ?></td>
                  </tr>

                  <tr>
                    <th>Regular Price</th>
                    <td><?php echo $item->regular_price; ?></td>
                  </tr>
                  
                  <tr>
                    <th>Ext Price</th>
                    <td><?php echo $item->ext_price; ?></td>
                  </tr>
                  
                  
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

