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
                    <th width="20%">Properties</th>
                    <th>Value</th>
                  </tr>
                  <tr>
                    <th>Item Link </th>
                    <td><a href='{{URL::to("$item->link")}}' target="_blank">{{URL::to("$item->link")}}</a></td>
                  </tr>
                  <tr>
                    <th>Item Status </th>
                    <td> <?php 
                          if($item->status==1){
                            echo "Active";
                          }else{
                            echo "Inactive";
                          }
                         ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Item Name </th>
                    <td><?php echo $item->item_name; ?></td>
                  </tr>
                  <tr>
                    <th>Product Code </th>
                    <td><?php echo $item->product_code; ?></td>
                  </tr>
                  <tr>
                    <th>Short Description</th>
                    <td><?php echo $item->long_title; ?></td>
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
                    <th>Description</th>
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
                  @if($item->sub_name!=null)
                  <tr>
                    <th>Sub Sub Category Name</th>
                    <td><?php echo $item->sub_name; ?></td>
                  </tr>
                  @endif
                  @if($item->brand_name!=null)
                  <tr>
                    <th>Brand </th>
                    <td><?php echo $item->brand_name; ?></td>
                  </tr>
                  @endif
                  
                  <tr>
                    <th>Sale Price (Lower)</th>
                    <td><?php echo $item->sale_price; ?></td>
                  </tr>

                  <tr>
                    <th>Highest Price</th>
                    <td><?php echo $item->regular_price; ?></td>
                  </tr>
                  <tr>
                    <th>Total Quantity</th>
                    <td><?php echo $item->quantity; ?></td>
                  </tr>
                  @foreach($attributes as $key => $attr)
                    <tr>
                      <th>
                        {{$attr->name}}
                      </th>

                      <td>
                      @foreach($attributeOptions[$attr->id] as $key => $option)
                      <?php
                      if($option!=null){
                        if($key>0){
                        echo ','.$option->name;
                        }else{
                          echo $option->name;
                        }
                      }
                        ?>
                      @endforeach
                      </td>
                    </tr>
                  @endforeach
                  <tr>
                    <th>Created By</th>
                    <td><?php echo $item->creator_name; ?></td>
                  </tr>
                  @if($item->editor_name!=null)
                  <tr>
                    <th>Updated By</th>
                    <td><?php echo $item->editor_name; ?></td>
                  </tr>
                  @endif
                </table>
              </div>
               @if(count($photo)>0)
                <div class="item_photo">
                @foreach($photo as $iPhoto)
                    <img src='{{asset("$iPhoto->small_photo")}}'>
                @endforeach
                </div>
              @endif
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

