@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Add Special Item</h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => 'specialItem.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!}
            
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {{Form::label('title', 'Title Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('title','',array('class'=>'form-control','placeholder'=>'Enter Title Name','required'))}}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        
        
        
        <input type="hidden" name="created_by" value="{{ Auth::user()->email }}">
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">Confirm </button>
            </div>
        </div>
            
            
        {!! Form::close() !!}
    </div>
    <hr class="col-md-12">
           
</div>

<script src="{{ asset('public/backend/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/backend/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    
    /*select option using choice*/
    $(".chosen-select-no-results").chosen({width:"100%"});
  </script>

@endsection

