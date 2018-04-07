@extends('backend.app')
@section('content')

<div class="tab_content">

  <h3 class="box_title">Sliders
 <a href="{{route('slider.create')}}" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new slide</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Slide Photo </th>
                    <th>Slide Caption</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $data)
                <tr>
                    <td>{{$data->serial_num}}</td>
                    <td><a href="{{route('slider.edit',$data->id)}}"> <img class="slider_img" src="{{asset('public/img/slides/'.$data->slide_photo)}}" width="200px"> </a></td>
                    <td>{{$data->slide_caption}}</td>

                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>

                    <td>{{$data->created_at}}</td>
                    <td>
        {!! Form::open(array('route' => ['slider.destroy',$data->id],'method'=>'DELETE')) !!}
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
