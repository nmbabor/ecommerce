@extends('frontend.app')
@section('content')
<?if(\Session::has('commonData')){
        $commonData=\Session::get('commonData');
        $info=$commonData['primaryInfo'];

    }
 ?>
			@if(isset($invoice_id))
			<div class="container">
			<div class="row">
			<div class="payment_info">
					<div class="panel panel-default">
					  <div class="panel-heading">Order Confirmation</div>
					  <div class="panel-body">
					    <p>Dear user,<br>
					    		  Thank you for choosing <a href="{{URL::to('/')}}">{{$info->company_name}}</a>
					    We Successfully Received your order. Your booking code is {{$invoice_id}}.
					    From now on, our representative will contact you within the next 4 hours.
					    Information relating to orders already have been informed via sms.<p>

					  </div>
					</div>
				</div>
				</div>
				</div>
				@endif
@endsection