@extends('backend.app')
@section('content')
<div class="tab_content">

<h3 class="box_title">Add menu from Category 
 <a href="{{route('menu.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All </a>
 <a href="{{route('menu.create')}}" class="btn btn-danger pull-right"> <i class="ion ion-plus"></i> Add custom menu</a>
 <a href="{{URL::to('page-menu')}}" class="btn btn-warning pull-right"> <i class="ion ion-plus"></i> Add menu from page  </a>
 </h3>
    {!! Form::open(array('url' => 'category-menu','class'=>'form-horizontal','files'=>true)) !!}
         <div class="form-group  {{ $errors->has('category') ? 'has-error' : '' }}">
            
            {{Form::label('category', 'Category', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                    {{Form::select('category',$category,'null',array('class'=>'form-control chosen-select','placeholder'=>'','required'))}}
                @if ($errors->has('category'))
                    <span class="help-block">
                        <strong>{{ $errors->first('category') }}</strong>
                    </span>
                @endif
            </div>
        </div>
         <div id="sub_menu"><!-- Load Menu --></div>

        <div class="form-group">
            {{Form::label('serial_num', 'Serial', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
            <? $max=$max_serial+1; ?>
                {{Form::number('serial_num',"$max",array('class'=>'form-control','placeholder'=>'Serial Number','max'=>"$max",'min'=>'0'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),'1', ['class' => 'form-control'])}}
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </div>
    {!! Form::close() !!}

@endsection

@section('script')
<script type="text/javascript">
    
$('#category').change(function(){
    var value = this.value;
    $('#sub_menu').load("{{URL::to('sub-category-menu')}}"+'?cat='+value);
})
</script>
@endsection