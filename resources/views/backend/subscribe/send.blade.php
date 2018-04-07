@extends('backend.app')
@section('content')
<style type="text/css">
	.adv-table table tr td {
    padding: 2px 5px;
}
</style>
<div class="col-md-12">
	{!! Form::open(array('url' => 'send-email','class'=>'form-horizontal')) !!}
		<div class="form-group">
			<label class="control-label col-md-2"><b>To : </b></label>
			<div class="col-md-10">
			{{Form::text('email','',['class'=>'form-control','placeholder'=>'Email','id'=>'email','required'])}}
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2"><b>To : </b></label>
			<div class="col-md-10">
			{{Form::text('subject','',['class'=>'form-control','placeholder'=>'Subject','id'=>'subject','required'])}}
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2"><b>Message : </b></label>
			<div class="col-md-10">
			{{Form::textArea('message','',['class'=>'form-control','placeholder'=>'Type your message here...','rows'=>'4','required'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" class="btn btn-success btn-lg pull-right">Send</button>
			</div>
		</div>
	{{Form::close()}}
</div>
<div class="tab_content col-md-12" style="padding-top:0;">
    
    <div class="col-md-12 no_padding">

        <section class="panel">
        {!! Form::open(array('url' => 'subscribe/send','class'=>'form-horizontal','method'=>'get')) !!}
            <header class="panel-heading">
              Send email to subscriber
                <span class="tools pull-right top_bar">
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="adv-table col-md-10 col-md-offset-1">
                    <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="5%"><input type="checkbox" id="allChecked"></th>
                            <th>#</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                   <? $s=0; ?>
                    @foreach($allData as $data)
                   <? $s++; ?>
                        <tr>
                            <td><input type="checkbox" class="checkbox" value="{{$data->email}}" name="email[]"></td>
                            <td>{{$s}}</td>
                            <td>{{$data->email}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    {{$allData->render()}}
            </div>
        </div>
        <div class="form-group">
			<label class="col-md-10 col-md-offset-1">Subject</label>
			<div class="col-md-10 col-md-offset-1">
			{{Form::text('subject','',['class'=>'form-control','placeholder'=>'Subject','required'])}}
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-10 col-md-offset-1">Message</label>
			<div class="col-md-10 col-md-offset-1">
			{{Form::textArea('message','',['class'=>'form-control','placeholder'=>'Type your message here...','rows'=>'4','required'])}}
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-10 col-md-offset-1">
				<button type="submit" class="btn btn-primary pull-right">Send</button>
			</div>
		</div>
		{{Form::close()}}
    </section>
 
    </div>        
</div>

@endsection
@section('script')
<script type="text/javascript">
	$('#allChecked').on('change',function(){
		if(this.checked){
			$('.checkbox').each(function(){
			    this.checked = true;
			});
		}
		else{
			$('.checkbox').each(function(){ 
			    this.checked = false; 
			});
		}
	});
</script>
@endsection