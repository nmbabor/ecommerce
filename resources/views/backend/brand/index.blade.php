@extends('backend.app')
@section('content')

<div class="tab_content">

  <h3 class="box_title">Brand
 <a href="{{route('all-brand.create')}}" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Brand Logo</th>
                    <th>Brand Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $data)
                <tr>
                    <td>{{$data->serial_num}}</td>
                    <td><a href="{{route('all-brand.edit',$data->id)}}"> <img class="slider_img" src="{{asset('public/img/brand/'.$data->photo)}}"> </a></td>
                    <td>{{$data->name}}</td>

                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>

                    <td>{{$data->created_at}}</td>
                    <td>
                    <a href="{{route('all-brand.edit',$data->id)}}" class="btn btn-info waves-effect w-xs waves-light m-r-5 m-b-10 action_btn" title="Item Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
        {!! Form::open(array('route' => ['all-brand.destroy',$data->id],'method'=>'DELETE')) !!}
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
