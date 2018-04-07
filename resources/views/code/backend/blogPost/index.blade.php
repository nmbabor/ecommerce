@extends('backend.app')
@section('content')

<div class="tab_content">
@if ($errors->has('email'))
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>{{ $errors->first('email') }}</b> 
       </div>
    </div>
@endif
  <h3 class="box_title">All Post
 <a href="{{route('blogPost.create')}}" class="btn btn-default pull-right"> <i class="ion ion-plus"></i> Add new post</a></h3>
        <table class="table table-striped table-hover table-bordered center_table" id="my_table">
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($allPost as $data)
                <tr>
                    <td><a href="{{route('blogPost.show',$data->id)}}" class="top_post_title">
                    <? echo $data['post_title']; ?></a> </td>
                    <td>{{$data->author}}</td>
                    <td><i class="{{($data->status==1)? 'ion-checkmark-circled success' : 'ion-ios-close danger'}}"></i></td>
                    <td>{{$data->created_at}}</td>
                    <td>
        {!! Form::open(array('route' => ['blogPost.destroy',$data->id],'method'=>'DELETE')) !!}
            <button type="submit" class="btn btn-danger" onclick="return deleteConfirm()"><i class="ion ion-ios-trash-outline"></i></button>
        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pull-right">
        {{$allPost->render()}} 
        </div>
  </div>


@endsection