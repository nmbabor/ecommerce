@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Item Info <a href="{{URL::to('/viewItems')}}" class="pull-right btn btn-success">View Items</a></h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => ['item.update',$item->id],'class'=>'form-horizontal','method'=>'PUT','files'=>'true')) !!}
        
            <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
            
                {{Form::label('link', 'Item Link', array('class' => 'col-md-3 control-label'))}}
                <div class="col-md-9">
                    <div class="input-group">
                        <div class="input-group-addon">{{URL::to('')}}/</div>
                        {{Form::text('link',$item->link,array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))}}
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
                {{Form::text('item_name',$item->item_name,array('class'=>'form-control','placeholder'=>'Enter Item Name','required'))}}
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
                {{Form::text('product_code',$item->product_code,array('class'=>'form-control','placeholder'=>'Product Code','required'))}}
                @if ($errors->has('product_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('product_code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'), $item->status, ['class' => 'form-control'])}}
                </div>
            </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Short Description  </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="long_title" rows="2" >{{$item->long_title}}</textarea>
          </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3">Featureing Item Type * </label>
            <div class="col-sm-9">
                {{ Form::select('is_featured', ['0' => 'Normal Item', '1' => 'Special Item'], $item->is_featured, ['class'=> 'form-control','data-title'=> 'Single Select','data-style'=> 'btn-default btn-block','data-menu-style'=>'dropdown-blue'])}}
            </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Description* </label>
          <div class="col-sm-9">
              <textarea class="form-control" name="short_description" rows="5" id="ckeditor"><?php echo $item->short_description; ?></textarea>
              
          </div>
        </div>
        <div class="form-group role_select" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-9">
              <select name="fk_category_id" data-placeholder="- Select -" style="width:100%;" class="chosen-select" tabindex="10" required="required" onchange="categoryType(this.value)">
                @if($category)
                  @foreach($category as $categoryData)
                    <option value="{{ $categoryData->id }}" @if($item->fk_category_id == $categoryData->id){{ "selected" }} @endif>{{ $categoryData->category_name }}</option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>

        <div id="loadSubCategory">
          @if($item->fk_sub_category_id!=null)
          <div id="oldTag" class="form-group role_select" >
            <label class="control-label col-sm-3">Select Sub Category* </label>
            <div class="col-sm-9">
                <select name="fk_sub_category_id" data-placeholder="- Select -" style="width:100%;" class="chosen-selects" tabindex="10" id="sub_category" ">
                  @if($subCategory)
                    @foreach($subCategory as $subCategoryData)
                      @if($item->fk_category_id == $subCategoryData->fk_category_id)
                          <option value="{{ $subCategoryData->id }}" @if($item->fk_sub_category_id == $subCategoryData->id){{ "selected" }} @endif>{{ $subCategoryData->sub_category_name }}</option>
                      @endif
                    @endforeach
                  @endif
                </select>
                
            </div>
          </div>
          @endif
        </div>
        <div id="subSubCategory">
          @if($item->fk_sub_sub_category_id!=null)
          <div id="oldSubSub" class="form-group role_select" >
            <label class="control-label col-sm-3">Select Sub Sub Category* </label>
            <div class="col-sm-9">
                <select name="fk_sub_sub_category_id" data-placeholder="- Select -" style="width:100%;" class="chosen-selects" tabindex="10" id="sub_sub_category">
                  @if($subSubCategory)
                    @foreach($subSubCategory as $subSubData)
                        <option value="{{ $subSubData->id }}" @if($item->fk_sub_sub_category_id == $subSubData->id){{ "selected" }} @endif>{{ $subSubData->sub_name }}</option>
                    @endforeach
                  @endif
                </select>
                
            </div>
          </div>
          @endif
        </div>

         <div class="form-group role_select" >
          <label class="control-label col-sm-3">Select Brand </label>
          <div class="col-sm-9">
              <select name="fk_brand_id" data-placeholder="- Select -" style="width:100%;" class="chosen-select" tabindex="10">
                @if($brands)
                  <option value=""></option>
                  @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" @if($item->fk_brand_id == $brand->id){{ "selected" }} @endif>{{ $brand->name }}</option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>
        <div class="form-group {{ $errors->has('sale_price') ? 'has-error' : '' }}">
            {{Form::label('sale_price', 'Sale Price (Lower)', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                {{Form::number('sale_price',$item->sale_price,array('class'=>'form-control','placeholder'=>'Sale Price (Lower)','step'=>'any'))}}
                @if ($errors->has('sale_price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('sale_price') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('regular_price') ? 'has-error' : '' }}">
            {{Form::label('regular_price', 'Highest Price', array('class' => 'col-md-3 control-label'))}}
            <div class="col-md-9">
                {{Form::number('regular_price',$item->regular_price,array('class'=>'form-control','placeholder'=>'Highest Price','step'=>'any'))}}
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
                {{Form::number('quantity',$item->quantity,array('class'=>'form-control','placeholder'=>'Quantity'))}}
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
              <textarea class="form-control" name="meta_description" rows="5"><? echo $item->meta_description ?></textarea>
          </div>
        </div>
        
        <div id="attributes">
          <div id="attr">
            <p style="text-align: center;font-weight: bold;text-decoration: underline;">Attributes</p>
            @foreach($attributes as $attr)
            <div class="form-group col-sm-12 role_select" >
              <label class="control-label col-sm-3">{{$attr->name}}</label>
              <div class="col-sm-9">
              @foreach($options[$attr->id] as $key => $opt)
            <?
                $flag=0;
                $counter=0;
                if(!empty($attributeOptions[$attr->id])){
                   foreach ($attributeOptions[$attr->id] as $value) {
                    ++$counter;
                    if($value!=null && $opt->id==$value->id){?>
                        <label><input type="checkbox" name="attributes[{{$attr->id}}][]" value="{{$opt->id}}" checked> {{$opt->name}}</label> 
                <?
                $flag=0;
                break;
                    }else{
                        $flag++;
                        continue;
                      }
                }
            }
                if($flag>0 || $counter==0 ){?>
                    <label><input type="checkbox" name="attributes[{{$attr->id}}][]" value="{{$opt->id}}"> {{$opt->name}}</label>
                <?}?>
              

              @endforeach
              </div>
            </div>
            @endforeach
        </div>
        </div>
         <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                {{Form::label('photo', 'Image', array('class' => 'control-label col-md-3'))}}
                <div class="col-md-9">
                    <div id="formdiv">
                        <div class="img_control">
                          <? 
                          if(!empty($photos)){
                            foreach ($photos as $photo) { ?>
                            <div id="filediv">
                                <div id="abcd" class="abcd"><img id="previewimg" src="{{asset($photo['small_photo'])}}"><input type="hidden" id="exist_file" value="<? echo $photo['id']; ?>" /><img id="exist_img" src="{{asset('public/img/x.png')}}" alt="X" title="Delete"></div>
                            </div>

                             <?} } ?>
                             <div id="filediv"><input name="photo[]" type="file" id="files"/></div>
                             <div id="loadDelete"><!-- Load Delete value --></div>
                        <input type="button" id="add_more" class="upload btn btn-warning" value="Add More Photo"/>
                        </div>
                    </div>
                    @if ($errors->has('photo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
                    @endif
                </div>
             </div>
        
        
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <button type="submit" class="btn btn-success">Update </button>
            </div>
        </div>
            
            
        {!! Form::close() !!}
    </div>
    <hr class="col-md-12">
           
</div>
@endsection
@section('script')
<script type="text/javascript">
$(".chosen-select-no-results").chosen({width:"96%"});
    $(".chosen-select-no-results1").chosen({width:"96%"});
    /*category wise tag select*/
        function categoryType(value){
          //alert(value);
          $("#loadSubCategory").html('');
          $("#loadSubCategory").load('{{ URL::to("loadSubCat")}}'+'/'+value);
          $('#subSubCategory').html('');
          $('#attributes').load("{{URL::to('item/create')}}"+'?cat='+value);
        }

    $('#sub_category').change(function(){
        var value = this.value;
        $('#attributes').load("{{URL::to('item/create')}}"+'?sub='+value);
        $('#subSubCategory').load("{{URL::to('loadSubSubCategory')}}/"+value);
    }).change();
 
     $('#sub_sub_category').change(function(){
        var value = this.value;
        $('#attributes').load("{{URL::to('item/create')}}"+'?sub_sub='+value);
    })
    
  </script>

@endsection


