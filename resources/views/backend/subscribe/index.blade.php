@extends('backend.app')
@section('content')

<div class="tab_content">

  <h3 class="box_title">Subscribe
 <a href="{{route('subscribe.create')}}" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Send Mail</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <? $i=1; ?>
            @foreach($allData as $data)
                <tr>
                    <td>{{$i++}}.</td>
                    <td><a href="{{route('subscribe.edit',$data->id)}}">{{$data->email}}</a></td>

                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>

                    <td>{{$data->created_at}}</td>
                    <td>
                    {!! Form::open(array('route' => ['subscribe.destroy',$data->id],'method'=>'DELETE')) !!}
                        <a href="{{route('subscribe.edit',$data->id)}}" class="btn btn-info" style="color:#fff;"><i class="fa fa-pencil"></i></a>
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
