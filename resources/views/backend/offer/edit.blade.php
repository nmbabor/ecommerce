@extends('backend.app')
@section('content')


<h3 class="box_title">Edit Offer
 <a href="{{route('offer.index')}}" class="btn btn-default pull-right"> <i class="ion ion-navicon-round"></i> View All</a></h3>
    {!! Form::open(array('route' => ['offer.update', $data->id],'method'=>'PUT','class'=>'form-horizontal','files'=>true)) !!}
       <div class="form-group" >
          <label class="control-label col-sm-3">Select Category* </label>
          <div class="col-sm-8">
              <select name="fk_category_id" data-placeholder="- Select -" style="width:100%;" class="chosen-select" tabindex="10" required="required" onchange="loadSubCategory(this.value)">
                @if($category)
                  @foreach($category as $categoryData)
                    <option value="{{ $categoryData->id }}" @if($itemInfo->fk_category_id == $categoryData->id){{ "selected" }} @endif>{{ $categoryData->category_name }}</option>
                  @endforeach
                @endif
              </select>
              
          </div>
        </div>

        
        <div id="loadSubCategory">
            @if($itemInfo->fk_sub_category_id!=null)
            <div class="form-group" >
              <label class="control-label col-sm-3">Select Sub Category* </label>
              <div class="col-sm-8">
                  <select name="fk_sub_category_id" data-placeholder="- Select -" style="width:100%;" class="chosen-selects" tabindex="10">
                    @if($subCategory)
                      @foreach($subCategory as $subCategoryData)
                        @if($itemInfo->fk_category_id == $subCategoryData->fk_category_id)
                            <option value="{{ $subCategoryData->id }}" @if($itemInfo->fk_sub_category_id == $subCategoryData->id){{ "selected" }} @endif>{{ $subCategoryData->sub_category_name }}</option>
                        @endif
                      @endforeach
                    @endif
                  </select>
                  
              </div>
            </div>
            @endif
        </div>
        <div id="loadItem">
            <div class="form-group">
                {{Form::label('fk_item_id', 'Select Item', array('class' => 'col-md-3 control-label'))}}
                <div class="col-md-8">
                    <select name="fk_item_id" data-placeholder="Choose a Item..." class="form-control chosen" style="width: 100%;" onchange="price(this.value)">
                        <option value=""></option>
                        <? foreach ($items as $item) { ?>
                        <option value="<? echo $item->id ?>" {{($item->id==$data->fk_item_id)?'selected':''}}><? echo $item->item_name ?></option>
                        <?} ?>
                    </select>
                </div>
                
            </div>

        </div>
        <div class="form-group">
            {{Form::label('discount','Discount',['class'=>'control-label col-md-3'])}}
            <div class="col-md-2">
                <div class="input-group">
                  {{Form::number('discount',$data->discount,['class'=>'form-control','placeholder'=>'Ex: 33','min'=>'0','step'=>'any','id'=>'discount'])}}
                  <div class="input-group-addon">%</div>
                </div>
                <span>Discount(%)</span>
            </div>
            <div class="col-md-3">
                {{Form::number('regular_price',$data->regular_price,['class'=>'form-control','placeholder'=>'Regular Price','min'=>'0','step'=>'any','id'=>'regularPrice'])}}
                <span>Regular Price</span>
            </div>
            <div class="col-md-3">
                {{Form::number('sale_price',$data->sale_price,['class'=>'form-control','placeholder'=>'Sale Price','min'=>'0','step'=>'any','id'=>'salePrice'])}}
                <span>Sale Price</span>
            </div>
        </div>
        <div class="form-group">
            {{Form::label('start_date','Day',['class'=>'control-label col-md-3'])}}
            <div class="col-md-4">
                {{Form::date('start_date',$data->start_date,['class'=>'form-control','placeholder'=>'Start Date'])}}
                <span>Start Date</span>
            </div>
            
            <div class="col-md-4">
                {{Form::date('end_date',$data->end_date,['class'=>'form-control','placeholder'=>'End Date'])}}
                <span>End this offer before this date.</span>
            </div>
        </div>
        <div class="form-group">
            {{Form::label('offer_type', 'Offer Type', array('class' => 'col-md-3 control-label'))}}

            <div class="col-md-4">
                {{Form::select('offer_type', array('1' => 'Todays Offer', '2' => 'Regular Offer'),$data->offer_type, ['class' => 'form-control'])}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('status', 'Status', array('class' => 'col-md-3 control-label'))}}

            <div class="col-md-8">
                {{Form::select('status', array('1' => 'Active', '2' => 'Inactive'),$data->status, ['class' => 'form-control'])}}
            </div>
        </div>
            {{Form::hidden('id',$data->id)}}
        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      
	{!! Form::close() !!}

@endsection

@section('script')
<script type="text/javascript">
    function loadSubCategory(id){
            $("#loadSubCategory").load("{{ URL::to('loadSubCategory')}}"+'/'+id);
            $("#loadItem").load("{{ URL::to('loadItem')}}"+'?id='+id+'&type=cat');
    }
    function loadItem(id){
            $("#loadItem").load("{{ URL::to('loadItem')}}"+'?id='+id+'&type=sub');
    }
    function price(id){
         $.get("{{ URL::to('offer')}}/"+id, function(response){ 
            $('#regularPrice').val(response['regular_price'])
            $('#salePrice').val(response['sale_price'])
            $('#discount').val(response['discount'])
        });
    }
</script>
@endsection