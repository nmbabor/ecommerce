@extends('backend.app')
@section('content')

<div class="tab_content">

  <h3 class="box_title work_title">{{$url}}
 <a href='{{route("$url.create")}}' class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Title </th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1; ?>
            @foreach($allData as $data)
                <tr>
                    <td>{{$i++}}</td>
                    <td><a href='{{route("$url.edit",$data->id)}}'> <h5>{{$data->title}}</h5> </a></td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>

                    <td>{{$data->created_at}}</td>
                    <td>
        {!! Form::open(array('route' => ["$url.destroy",$data->id],'method'=>'DELETE')) !!}
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
