@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Custom Order Type Info <a href="{{URL::to('/viewCustomOrderTypes')}}" class="pull-right btn btn-success">View Custom Order Types</a> <a href="{{URL::to('/customOrderType')}}" class="pull-right btn btn-info">Add Custom Order Type</a></h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => ['customOrderType.update',$customOrderTypeData->id],'class'=>'form-horizontal','method'=>'PUT','files'=>'true')) !!}
        <div class="form-group col-sm-12 role_select" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-9">
              <select name="fk_custom_id" data-placeholder="- Select -" style="width:350px;" class="chosen-select-no-results" tabindex="10" required="required">
                @if($customOrderTypeDatas)
                  <option value=""> - Select - </option>
                  @foreach($customOrderTypeDatas as $customData)
                    <option value="{{ $customData->id }}" @if($customOrderTypeData->fk_custom_id == $customData->id){{ "selected" }} @endif>{{ $customData->title }}</option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>
        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {{Form::label('title', 'Title', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::text('title',$customOrderTypeData->title,array('class'=>'form-control','placeholder'=>'Enter Title','required'))}}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        <div class="form-group {{ $errors->has('max_select') ? 'has-error' : '' }}">
            {{Form::label('max_select', 'Max Select', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::number('max_select',$customOrderTypeData->max_select,array('class'=>'form-control','placeholder'=>'Enter Max Select','required'))}}
                @if ($errors->has('max_select'))
                    <span class="help-block">
                        <strong>{{ $errors->first('max_select') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('min_select') ? 'has-error' : '' }}">
            {{Form::label('min_select', 'Min Select', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::number('min_select',$customOrderTypeData->min_select,array('class'=>'form-control','placeholder'=>'Enter Min Select','required'))}}
                @if ($errors->has('min_select'))
                    <span class="help-block">
                        <strong>{{ $errors->first('min_select') }}</strong>
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

