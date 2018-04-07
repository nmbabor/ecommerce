@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Add New Item <a href="{{URL::to('/viewItems')}}" class="pull-right btn btn-success">View Items</a></h3>
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
        <div class="form-group col-sm-12">
            <label class="control-label col-sm-3">Featureing Item type* </label>
            <div class="col-sm-8">
                <select name="is_featured" class="form-control">
                  <option value="0">Normal Item</option>
                  <option value="1">Special Item</option>
                </select>
            </div>
        </div>
        <div class="form-group {{ $errors->has('photo_path') ? 'has-error' : '' }}">
            {{Form::label('photo_path', 'Image Select', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                <input type="file" name="photo_path" class="form-control" id="profile-image-select" required="required">
                @if ($errors->has('photo_path'))
                    <span class="help-block">
                        <strong>{{ $errors->first('photo_path') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <div class="select_image">
                        <img src="" id="profile-image">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12 role_select" >
          <label class="control-label col-sm-3">Short Description  </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="short_description" rows="5"  style="width:96%;"></textarea>
          </div>
        </div>
        <div class="form-group col-sm-12 role_select" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-9">
              <select name="fk_category_id" data-placeholder="- Select -" style="width:350px;" class="chosen-select-no-results" tabindex="10" required="required" onchange="categoryType(this.value)">
                @if($categoryDatas)
                  <option value=""> - Select - </option>
                  @foreach($categoryDatas as $categoryData)
                    <option value="<?php echo $categoryData->id; ?>"><?php echo $categoryData->category_name; ?></option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>
        <div id="categoryType"></div>
        
        <div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
            {{Form::label('sale_price', 'Sale Price', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::number('sale_price','',array('class'=>'form-control','placeholder'=>'Enter Sale Price','step'=>'any'))}}
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
                {{Form::number('regular_price','',array('class'=>'form-control','placeholder'=>'Enter Regular Price','step'=>'any'))}}
                @if ($errors->has('regular_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('regular_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('ext_price') ? 'has-error' : '' }}">
            {{Form::label('ext_price', 'Extra Price.', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::number('ext_price','',array('class'=>'form-control','placeholder'=>'Enter Extra Price.'))}}
                @if ($errors->has('ext_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ext_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group col-sm-12 role_select" >
          <label class="control-label col-sm-3">Meta Description </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="meta_description" rows="5"  style="width:96%;"></textarea>
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
    /*category wise tag select*/
        function categoryType(value){
          //alert(value);
          $("#categoryType").load('{{ URL::to('categoryType')}}'+'/'+value);
        }
    /*end category*/
    /*select option using choice*/
    $(".chosen-select-no-results").chosen({width:"96%"});

    $(".chosen-select-no-results1").chosen({width:"96%"}); 
  </script>

@endsection

