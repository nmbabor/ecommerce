@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Add New Custom Order Attribute <a href="{{URL::to('/viewCustomOrderAttributes')}}" class="pull-right btn btn-success">View Custom Order Attributes</a></h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => 'customOrderAttribute.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!}
            <div class="form-group col-sm-12 role_select" >
              <label class="control-label col-sm-3">Select Category* </label>
              <div class="col-sm-9">
                  <select name="fk_custom_type_id" data-placeholder="- Select -" style="width:350px;" class="chosen-select-no-results" tabindex="10" required="required">
                    @if($CustomOrderTypes)
                      <option value=""> - Select - </option>
                      @foreach($CustomOrderTypes as $categoryData)
                        <option value="<?php echo $categoryData->id; ?>"><?php echo $categoryData->title; ?></option>
                      @endforeach
                    @endif
                  </select>
                  
              </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{Form::label('name', 'Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('name','',array('class'=>'form-control','placeholder'=>'Enter Name','required'))}}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
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
    $(".chosen-select-no-results").chosen({width:"96%"});
  </script>

@endsection

