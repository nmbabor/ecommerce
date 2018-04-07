@if(isset($value) && $subCategoryCount>0)    

  <div class="form-group col-sm-12 role_select" >
    <label class="control-label col-sm-3">Select Sub Category* </label>
    <div class="col-sm-9">
        <select name="fk_sub_category_id" data-placeholder="- Select -" style="width:350px;" class="chosen-select-no-results1" tabindex="10" required>
          
            <option value=""> - Select - </option>
            @if($subCategoryData)
              @foreach($subCategoryData as $subCategory)
                 @if($value == $subCategory->fk_category_id)
                  <option value="<?php echo $subCategory->id; ?>"><?php echo $subCategory->sub_category_name; ?></option>
                  @endif
              @endforeach
            @endif
        </select>
        
    </div>
  </div>

@endif

<script src="{{ asset('public/backend/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/backend/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(".chosen-select-no-results1").chosen({width:"96%"});  
     
  </script>