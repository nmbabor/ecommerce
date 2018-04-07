
<select name="fk_permission_id[]" data-placeholder="Type to view" style="width:350px;" multiple class="chosen-select-no-results" tabindex="11">
  <option value=""></option>
  

<?php

foreach($permissionDatas as $permissionData){

$flag=0;
$counter=0;
foreach($roleWisePermissions as $p){
  ++$counter;

  if($permissionData->id == $p->fk_permission_id){
    ?>
    <option class="uncheck" value="<?php echo $permissionData->id; ?>"selected> <?php echo $permissionData->permission_name; ?></option>
    
  <?php
    $flag=0;
    break;
    
  }else{
    $flag++;
    continue;
  }
}
if($flag>0 || $counter==0 ){
  ?>
  <option value="<?php echo $permissionData->id; ?>"><?php echo $permissionData->permission_name; ?></option>
  
  <?php
}

}

?>
</select>
<div id="loadDelete"></div>
<!-- adds type away permission -->
      <script src="{{ asset('public/backend/js/jquery.min.js') }}" type="text/javascript"></script>
      <script src="{{ asset('public/backend/js/chosen.jquery.js') }}" type="text/javascript"></script>


      <!-- article type condition -->
      <script type="text/javascript">
        /*chosen select option start*/
         $(".chosen-select-no-results").chosen({width:"100%"}); 
      </script>
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
       /*$('.search-choice-close').click(function(){
            alert('hi');
            var exist_val = $(this).val();
            var isChecked = $(this).prop('checked');
            if(true != isChecked){

            	$(this).prev().val(exist_val);
            }else{
            	$(this).prev().val('');
            }
            
          	
          });*//**/

       $('.search-choice-close').click(function() {
        var exist_val = $(this).attr('data-option-array-index');
        //alert(exist_val);
        $('<input name="permission[]" type="hidden" />').appendTo('#loadDelete').val(exist_val);

        });

      </script>
      
