@extends('backend.app')
@section('content')

<div class="tab_content">

  <h3 class="box_title">Category
 <a href="{{route('categories.create')}}" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new</a></h3>
        <table class="table table-striped table-hover table-bordered center_table category_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Show in Home</th>
                    <th>Items</th>
                    <th>Sub Category</th>
                    <th>Attribute</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allData as $data)
                <tr>
                    <td>{{$data->serial_num}}</td>
                    <td><a href="{{route('categories.edit',$data->id)}}"><i class="{{$data->icon_class}}"></i> {{$data->category_name}} </a></td>

                    <td><i class="{{($data->home_status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i> </td>

                    <td><a class="label label-success" href='{{URL::to("item-show/$data->id")}}'>Items</a></td>
                    <td><a class="label label-primary" href='{{URL::to("subCategory/$data->id")}}'>Sub Category</a></td>
                    <td><a class="label label-info" href='{{URL::to("attribute/$data->id")}}'><i class="fa fa-plus"></i> Attribute</a></td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                    <td>{{$data->created_at}}</td>
                    <td>
            <a href="{{route('categories.edit',$data->id)}}" class="label label-warning"><i class="ion ion-compose"></i></a> 

        {!! Form::open(array('route' => ['categories.destroy',$data->id],'method'=>'DELETE','class'=>'delete_button')) !!}
            <button type="submit" class="label label-danger " onclick="return deleteConfirm()" style="border:0;padding:7px 10px;"><i class="ion ion-ios-trash-outline"></i></button>
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
