@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Add New Item <a href="{{URL::to('/viewItems')}}" class="pull-right btn btn-success">View Items</a></h3>
    <div class="box-body col-md-11">
        {!! Form::open(array('route' => 'item.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!}
        
        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
            
            {{Form::label('link', 'Item Link', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                <div class="input-group">
                    <div class="input-group-addon">{{URL::to('')}}/</div>
                    {{Form::text('link','',array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))}}
                </div>
                @if ($errors->has('link'))
                    <span class="help-block">
                        <strong>{{ $errors->first('link') }}</strong>
                    </span>
                @endif
            </div>
            
        </div>
        <div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
            {{Form::label('item_name', 'Item Name', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                {{Form::text('item_name','',array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))}}
                @if ($errors->has('item_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('item_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('product_code') ? 'has-error' : '' }}">
            {{Form::label('product_code', 'Product Code', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-7">
                {{Form::text('product_code','',array('class'=>'form-control','placeholder'=>'Product Code','required'))}}
                @if ($errors->has('product_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('product_code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), '1', ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Short Description  </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="long_title" rows="2" ></textarea>
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Featureing Item type* </label>
            <div class="col-sm-9">
                <select name="is_featured" class="form-control">
                  <option value="0">Normal Item</option>
                  <option value="1">Special Item</option>
                </select>
            </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Description  </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="short_description" rows="5" id="ckeditor" ></textarea>
          </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-9">
              {{Form::select('fk_category_id',$category,'',['class'=>'form-control chosen-select-no-results','placeholder'=>'Select Category','required','onchange'=>'categoryType(this.value)'])}}
              
          </div>
        </div>
        <div id="loadSubCategory"></div>
        <div id="subSubCategory"></div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Select Brand </label>
          <div class="col-sm-9">
            {{Form::select('fk_brand_id',$brands,'',['class'=>'form-control chosen-select-no-results','placeholder'=>'Select Brands'])}}
          </div>
        </div>
        <div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
            {{Form::label('sale_price', 'Sale Price (Lower)', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                {{Form::number('sale_price','',array('class'=>'form-control','placeholder'=>'Sale Price (Lower)','step'=>'any'))}}
                @if ($errors->has('sale_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sale_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('regular_price') ? 'has-error' : '' }}">
            {{Form::label('regular_price', 'Highest Price ', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                {{Form::number('regular_price','',array('class'=>'form-control','placeholder'=>'Highest Price','step'=>'any'))}}
                @if ($errors->has('regular_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('regular_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
            {{Form::label('quantity', 'Total Quantity ', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                {{Form::number('quantity','',array('class'=>'form-control','placeholder'=>'Quantity'))}}
                @if ($errors->has('quantity'))
                    <span class="help-block">
                        <strong>{{ $errors->first('quantity') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Meta Description </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="meta_description" rows="5"></textarea>
          </div>
        </div>
        <div id="attributes"><!-- Load Attributes --></div>
        <div id="attribute"><!-- Load Attributes --></div>
        
        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
            {{Form::label('photo', 'Image', array('class' => 'control-label col-md-3'))}}
            <div class="col-md-8">
            <small>Max image size 2MB</small>
                <div id="formdiv">
                    <div class="img_control">
                      <div id="filediv">
                      {{ Form::file('photo[]', array('multiple'=>true,'id'=>'files','required')) }}
                      </div>
                        <div class="add_btn">
                            <input type="button" id="add_more" class="upload btn btn-warning" value="Add More Photo"/>
                        </div>
                    </div>
                </div>
                @if ($errors->has('photo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('photo') }}</strong>
                    </span>
                @endif
            </div>
         </div>
        
        <div class="from-group col-md-6 multiple_upload">
        <!-- Load multiple photo -->
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

@endsection

@section('script')



    <script type="text/javascript">
    $(".chosen-select-no-results").chosen({width:"100%"});

        $(".chosen-select-no-results1").chosen({width:"100%"});
         function categoryType(value){
            $("#loadSubCategory").load('{{ URL::to("loadSubCat")}}'+'/'+value);
            $('#attributes').load("{{URL::to('item/create')}}"+'?cat='+value);
        }
        /*function attributes(value){
            alert(value);
            $('#attribute').load("{{URL::to('item/create')}}"+'?sub='+value);
        }*/
        
        
    </script>
@endsection