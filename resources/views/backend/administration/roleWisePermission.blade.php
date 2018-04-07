@extends('backend.app')
@section('content')

<div class="tab_content col-md-12" style="padding-top:0;">
<h3 class="box_title">Role Wise Permission</h3>
    <div class="box-body col-md-10">
        {!! Form::open(array('route' => 'roleWisePermission.store','class'=>'form-horizontal','method'=>'POST','files'=>'true')) !!}  
          <div class="form-group col-sm-12 role_select" >
              <label class="control-label col-sm-3">Select Role* </label>
              <div class="col-sm-9">
                  <select name="fk_role_id" required="required" class="form-control" onchange="roleWisePermission(this.value)">
                    @if($roleDatas)
                      <option value="-1"> - Select - </option>
                      @foreach($roleDatas as $roleData)
                        <option value="<?php echo $roleData->id; ?>"><?php echo $roleData->role_name; ?></option>
                      @endforeach
                    @endif
                  </select>
                  
              </div>
          </div>

          <div id="roleWisePermission"></div>
          <hr class="col-md-12">
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <!-- {{ Form::submit('Confirm') }} --> 
              <button type="submit" class="btn btn-success btn-trans waves-effect w-md waves-success m-b-5">
                <span class="btn-label">
                    <i class="fa fa-check"></i>
                </span>
                Confirm
              </button>
            </div>
          </div>
        {!! Form::close() !!}
    </div>
    <hr class="col-md-12">
            
</div>

@endsection



<!-- adds type away permission -->
<script src="{{ asset('public/assets/backend/js/jquery.min.js') }}" type="text/javascript"></script>
  
  <script type="text/javascript">
    function roleWisePermission(value){
      //alert(value);
      $("#roleWisePermission").load('{{ URL::to('loadPermission')}}'+'/'+value);
      if(value === -1){
        $("#roleWisePermission").hide();
      }
      //alert(value);
    }
</script>

<script type="text/javascript">

function deleteConfirm(){
  var con= confirm("Do you want to delete?");
  if(con){
    return true;
  }else 
  return false;
}
</script>