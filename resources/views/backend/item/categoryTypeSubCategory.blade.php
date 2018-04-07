@if(isset($value) && count($subCat>0))    

  <div class="form-group role_select" >
    <label class="control-label col-sm-3">Select Sub Category* </label>
    <div class="col-sm-9">
    {{Form::select('fk_sub_category_id',$subCat,'',['class'=>'chosen-select-no-results_cat','id'=>'sub_category','placeholder'=>'Select Sub Category','required'])}}
        
    </div>
  </div>

@endif
<script type="text/javascript">
    $(".chosen-select-no-results_cat").chosen({width:"100%"});  
    $('#sub_category').change(function(){
                var value = this.value;
                $('#attributes').load("{{URL::to('item/create')}}"+'?sub='+value);
                $('#subSubCategory').load("{{URL::to('loadSubSubCategory')}}/"+value);
            })
  </script>