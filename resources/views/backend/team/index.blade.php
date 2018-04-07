@extends('backend.app')
@section('content')

<div class="tab_content">

  <h3 class="box_title">Our Team
 <a href="{{route('our-team.create')}}" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new </a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Photo </th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $data)
                <tr>
                    <td>{{$data->serial_num}}</td>
                    <td><a href="{{route('our-team.edit',$data->id)}}"> <img class="slider_img" src="{{asset('public/img/team/'.$data->photo)}}" width="200px"> </a></td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->designation}}</td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                    <td>{{$data->created_at}}</td>
                    <td>
        {!! Form::open(array('route' => ['our-team.destroy',$data->id],'method'=>'DELETE')) !!}
            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
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
