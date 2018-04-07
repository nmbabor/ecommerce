@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Add New Item</h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => 'item.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!}
        
            <div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
            {{Form::label('item_name', 'Item Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('item_name','',array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))}}
                @if ($errors->has('item_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('item_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        
        <div class="form-group col-sm-12 role_select" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-9">
              <select name="fk_category_id" data-placeholder="- Select -" style="width:350px;" class="chosen-select-no-results" tabindex="10" required="required">
                @if($categoryDatas)
                  <option value=""> - Select - </option>
                  @foreach($categoryDatas as $categoryData)
                    <option value="<?php echo $categoryData->id; ?>"><?php echo $categoryData->category_name; ?></option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>
        <div class="form-group col-sm-12 role_select" >
          <label class="control-label col-sm-3">Select Sub Category* </label>
          <div class="col-sm-9">
              <select name="fk_sub_category_id" data-placeholder="- Select -" style="width:350px;" class="chosen-select-no-results" tabindex="10">
                
                  <option value=""> - Select - </option>
                @if($subCategoryDatas)
                  @foreach($subCategoryDatas as $subCategoryData)
                    <option value="<?php echo $subCategoryData->id; ?>"><?php echo $subCategoryData->sub_category_name; ?></option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>
        <div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
            {{Form::label('sale_price', 'Sale Price', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::number('sale_price','',array('class'=>'form-control','placeholder'=>'Enter Sale Price','required'))}}
                @if ($errors->has('sale_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sale_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('regular_price') ? 'has-error' : '' }}">
            {{Form::label('regular_price', 'Regular Price', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::number('regular_price','',array('class'=>'form-control','placeholder'=>'Enter Regular Price','required'))}}
                @if ($errors->has('regular_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('regular_price') }}</strong>
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
    $(document).ready(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-image').attr('src', e.target.result);
            }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile-image-select").change(function(){
            readURL(this);
        });
    });
    /*select option using choice*/
    $(".chosen-select-no-results").chosen({width:"100%"});

    $(".chosen-select-no-results1").chosen({width:"100%"}); 
  </script>

@endsection

