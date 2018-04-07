@extends('backend.app')
@section('content')
<div class="tab_content col-md-12" style="padding-top:0;">
    
    <div class="col-md-12 no_padding">

        <section class="panel">
            <header class="panel-heading">
              Sms History
                <span class="tools pull-right top_bar">
                <b>Balance: {{$quantity}}</b>
                    <a href="javascript:;" class="fa fa-times"></a>
                 </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Phone Number</th>
                            <th>Message</th>
                            <th>Message Id</th>
                            <th>Status</th>
                            <th>Error</th>
                        </tr>
                    </thead>
                    <tbody>
                   <? $s=0; ?>
                    @foreach($allData as $data)
                        <tr>
                            <td>{{$s}}</td>
                            <td>{{$data->number}}</td>
                            <td>{{$data->message}}</td>
                            <td>{{$data->message_id}}</td>
                            <td>{{$data->status}}</td>
                            <td>{{$data->error}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    {{$allData->render()}}
            </div>
        </div>
    </section>
 
    </div>        
</div>



@endsection