<div class="form-group  {{ $errors->has('category') ? 'has-error' : '' }}">
            
    {{Form::label('sub_menu', 'Sub Category', array('class' => 'col-md-3 control-label'))}}
    <div class="col-md-8">
    {{Form::select('sub_menu[]',$subCategory,'null',array('class'=>'form-control chosen-select-no-results1','placeholder'=>'','multiple'=>'true'))}}
        @if ($errors->has('category'))
            <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
        @endif
    </div>
</div>
<script src="{{ asset('public/backend/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/backend/js/chosen.jquery.js') }}" type="text/javascript"></script>
<script type="text/javascript">
 $(".chosen-select-no-results1").chosen({width:"100%"});  
</script>