<div class="form-group">
    {{Form::label('fk_item_id', 'Select Item', array('class' => 'col-md-3 control-label'))}}
    <div class="col-md-8">
        <select name="fk_item_id" data-placeholder="Choose a Item..." class="form-control chosen-select-item" style="width: 100%;" onchange="price(this.value)">
            <option value=""></option>
            <? foreach ($items as $item) { ?>
            <option value="<? echo $item->id ?>"><? echo $item->item_name ?></option>
            <?} ?>
        </select>
    </div>
    
</div>
<script src="{{ asset('public/backend/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/backend/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    var config = {
      '.chosen-select-item'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>