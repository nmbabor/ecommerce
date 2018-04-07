@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Custom Order Info <a href="{{URL::to('/addCustomOrder')}}" class="pull-right btn btn-success">Add New Custom Order</a> <a href="{{URL::to('/viewCustomOrders')}}" class="pull-right btn btn-info">View Custom Orders</a></h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => ['addCustomOrder.update',$customOrderData->id],'class'=>'form-horizontal','method'=>'PUT','files'=>'true')) !!}
        
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            {{Form::label('title', 'Title', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                {{Form::text('title',$customOrderData->title,array('class'=>'form-control','placeholder'=>'Enter Title','required'))}}
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), $customOrderData->status, ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('photo_path') ? 'has-error' : '' }}">
            {{Form::label('photo_path', 'Image Select', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-6">
                <input type="file" name="photo_path" class="form-control" id="profile-image-select">
                @if ($errors->has('photo_path'))
                    <span class="help-block">
                        <strong>{{ $errors->first('photo_path') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <div class="select_image">
                        <img src='{{asset("public/img/customOrder$customOrderData->photo_path")}}' id="profile-image">
                    </div>
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
                    <option value="{{ $categoryData->id }}" @if($customOrderData->fk_category_id == $categoryData->id){{ "selected" }} @endif>{{ $categoryData->category_name }}</option>
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
                    <option value="{{ $subCategoryData->id }}" @if($customOrderData->fk_sub_category_id == $subCategoryData->id){{ "selected" }} @endif>{{ $subCategoryData->sub_category_name }}</option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>
        <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
            {{Form::label('price', 'Price', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-8">
                {{Form::number('price',$customOrderData->price,array('class'=>'form-control','placeholder'=>'Enter Price','required'))}}
                @if ($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        
        
        <input type="hidden" name="updated_by" value="{{ Auth::user()->email }}">
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
    $(".chosen-select-no-results").chosen({width:"96%"});

    $(".chosen-select-no-results1").chosen({width:"96%"}); 
  </script>

@endsection

