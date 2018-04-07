<div class="form-group">
    {{Form::label('subCategory', 'Sub Category', array('class' => 'col-md-3 control-label'))}}
    <div class="col-md-8">
        <select data-placeholder="Choose a Sub Category..." class="form-control chosen-select-sub" onchange="loadItem(this.value)" style="width: 100%;">
            <option value=""></option>
            <? foreach ($subCategory as $sub) { ?>
            <option value="<? echo $sub->id ?>"><? echo $sub->sub_category_name ?></option>
            <?} ?>
        </select>
    </div>
    
</div>
<script src="{{ asset('public/backend/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/backend/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    var config = {
      '.chosen-select-sub'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>