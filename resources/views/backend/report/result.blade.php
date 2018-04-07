@extends('backend.app')
@section('content')
<div class="tab_content">

  <h3 class="box_title">Sales Report</h3>
	<div class="col-md-12">
		    {!! Form::open(array('url' =>'reports','method'=>'get','class'=>'form-horizontal')) !!}
			<div class="form-group col-md-4">
				<div class="col-md-12">
				 {{Form::date('from',date('Y-m-d'), ['class' => 'form-control'])}}
				</div>
			</div>
			<div class="col-md-1">
				<div class="form-group">
					<div class="col-md-12">
						<input type="text" value="TO" class="form-control" readonly>
					</div>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="col-md-12">
				 {{Form::date('to',date('Y-m-d'), ['class' => 'form-control'])}}
				</div>
			</div>
			<div class="form-group  col-md-3">
				<div class="col-md-12">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="button" class="btn btn-info" onclick="printPage('print_body')">Print</button>
				</div>
			</div>
		{{Form::close()}}
	<hr>
	</div>
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
					<th  style="text-align: center" width="20%">Total Amount</th>
				</tr>
			</theading>
			<tbody>
				<? 
				$i=0; 
				$totaQty=0;
				$totaAmount=0;
				?>
				@foreach($result as $data)
				<? 
					$i++;
					$totaQty+=$data->total_quantity;
					$totaAmount+=$data->total_amount;
				?>
				<tr>
					<td>{{$i}}</td>
					<td>{{$data->item_name}}</td>
					<td>{{$data->product_code}}</td>
					<td>{{$data->category_name}}</td>
					<td>{{$data->total_quantity}}</td>
					<td>{{$data->total_amount}}</td>
				</tr>
				@endforeach
			</tbody>
			<tfooter>
				<tr class="success">
					<th colspan="4">Total = </th>
					<th>{{$totaQty}}</th>
					<th>{{$totaAmount}}</th>
				</tr>
			</tfooter>
			
		</table>
	</div>
	</div>

</div>
@endsection
@section('script')
<script src="{{asset('public/backend/js/printThis.js')}}"></script>
<script type="text/javascript">
    function printPage(id){
        $('#'+id).printThis();
    }
</script>
@endsection