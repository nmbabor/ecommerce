@extends('backend.app')
@section('content')
<div class="tab_content">

  <h3 class="box_title">Inventory</h3>
  <div class="col-md-12">
	<div id="print_body">
		<table class="table table-bordered">
			<theading>
				<tr class="active">
					<th width="5%"  style="text-align: center">SL</th>
					<th  style="text-align: center">Item Name</th>
					<th  style="text-align: center">Code</th>
					<th  style="text-align: center">Category</th>
					<th  style="text-align: center" width="10%">Qty</th>
					<th  style="text-align: center" width="20%">Price</th>
				</tr>
			</theading>
			<tbody>
				<? $i=0; ?>
			@foreach($items as $item)
			<? $i++; ?>
				<tr>
					<td>{{$i}}</td>
					<td>{{$item->item_name}}</td>
					<td>{{$item->product_code}}</td>
					<td>{{$item->category_name}}</td>
					<td>{{$item->quantity}}</td>
					<td>{{$item->sale_price}}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	{{$items->render()}}
 </div>
@endsection