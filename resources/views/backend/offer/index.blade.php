@extends('backend.app')
@section('content')

<div class="tab_content">

  <h3 class="box_title">Offers
 <a href="{{route('offer.create')}}" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Item Name</th>
                    <th>Discount</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Offer Type</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <? $i=0; ?>
            @foreach($allData as $data)
            <? $i++; ?>
                <tr>
                    <td>{{$i}}</td>
                    <td><a href="{{route('offer.edit',$data->id)}}">{{$data->item_name}}</a></td>
                    <td>{{$data->discount}}</td>
                    <td>{{date('d-m-Y',strtotime($data->start_date))}}</td>
                    <td>{{date('d-m-Y',strtotime($data->end_date))}}</td>
                    <td>{{($data->offer_type==1)?'Todays Offer':'Regular Offer'}}</td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                    <td>{{date('d-m-Y',strtotime($data->created_at))}}</td>
                    <td>
        <a href="{{route('offer.edit',$data->id)}}" class="btn btn-info waves-effect w-xs waves-light m-r-5 m-b-10 action_btn" title="Item Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        {!! Form::open(array('route' => ['offer.destroy',$data->id],'method'=>'DELETE')) !!}
            <button type="submit" class="btn btn-danger action_btn" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
        {{$allData->render()}} 
        </div>
  </div>


@endsection
