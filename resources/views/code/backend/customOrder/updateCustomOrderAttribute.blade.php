@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Custom Order Attribute Info <a href="{{URL::to('/viewCustomOrderAttributes')}}" class="pull-right btn btn-success">View Custom Order Attributes</a> <a href="{{URL::to('/customOrderAttribute')}}" class="pull-right btn btn-info">Add Custom Order Attribute</a></h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => ['customOrderAttribute.update',$customOrderAttributeData->id],'class'=>'form-horizontal','method'=>'PUT','files'=>'true')) !!}
        <div class="form-group col-sm-12 role_select" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-9">
              <select name="fk_custom_type_id" data-placeholder="- Select -" style="width:350px;" class="chosen-select-no-results" tabindex="10" required="required">
                @if($customOrderTypeDatas)
                  <option value=""> - Select - </option>
                  @foreach($customOrderTypeDatas as $customData)
                    <option value="{{ $customData->id }}" @if($customOrderAttributeData->fk_custom_type_id == $customData->id){{ "selected" }} @endif>{{ $customData->title }}</option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{Form::label('name', 'Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('name',$customOrderAttributeData->name,array('class'=>'form-control','placeholder'=>'Enter Name','required'))}}
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        
        
        <input type="hidden" name="updated_by" value="{{ Auth::user()->email }}">
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">Update </button>
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

