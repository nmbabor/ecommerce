@extends('backend.app')
@section('content')

<div class="tab_content">

  <h3 class="box_title">Category
 <a href="{{route('categories.create')}}" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $data)
                <tr>
                    <td>{{$data->serial_num}}</td>
                    <td><a href="{{route('categories.edit',$data->id)}}"> {{$data->category_name}} </a></td>

                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>

                    <td>{{$data->created_at}}</td>
                    <td>
            <a href="{{route('categories.edit',$data->id)}}" class="btn btn-warning"><i class="ion ion-compose"></i></a> 

        {!! Form::open(array('route' => ['categories.destroy',$data->id],'method'=>'DELETE','class'=>'delete_button')) !!}
            <button type="submit" class="btn btn-danger " onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
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
