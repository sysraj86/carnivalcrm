{literal}
<link href="modules/GroupPrograms/datecss.css" media="all" rel="stylesheet" type="text/css">
<script type="text/javascript" src="modules/Tours/jquery.js"> </script> 
<script type="text/javascript" src="modules/Tours/jquery.table.clone.js"> </script>
<!--<script type="text/javascript" src="modules/GroupPrograms/jquery.table.addrow.js"> </script>-->
<script type="text/javascript" src="modules/GroupPrograms/jquery-ui-DateFormat.js"> </script>
<script type="text/javascript">
$(function(){
    $('.datetime').datepicker("destroy");
    $('.datetime').datepicker({showOn: 'button', buttonImage: 'themes/default/images/jscalendar.gif', buttonImageOnly: true,dateFormat: 'dd/mm/yy',yearRange:'-50,+20'});

/*Calendar.setup ({ {/literal} inputField : 'date1', ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : 'start_date_trigger1', singleClick : true, step : 1 {literal}});addToValidate('EditView', 'expiration', 'date', false,'expiration'  );
   //$('.btnAddRow').click(function(){
        var count = $('#table_clone').find(" tbody > tr").length;
          for(i =1 ; i<=count; i++){
            //alert(i);
              Calendar.setup ({ {/literal} inputField : 'date'+i, ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : 'start_date_trigger'+i, singleClick : true, step : 1 {literal}});addToValidate('EditView', 'expiration', 'date', false,'expiration'  );
          } 
   });*/  
   
   $('.service').click(function(){
        i = this.id.substring(this.id.length-1,this.id.length);
       open_popup($('#parent'+i).val(), 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"parent_id"+i, "name": "parent_name"+i,"tel": "tel"+i, "fax":"fax"+i,"address":"address"+i }}, "single", true);
   });
   
   $('.pick_up_car').click(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       open_popup("Cars", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "pick_up_car_id"+i, "name":"driver"+i, "phone": "driver_phone"+i, "number_plates":"number_plates"+i}}, "single", true);
   });
   
    $('.sightseeing_btn').click(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       open_popup("Cars", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "sightseeing_id"+i, "name":"driver_sight"+i, "phone": "driver_phone_sight"+i, "number_plates":"number_plates_sight"+i}}, "single", true);
   });
   
   $('.parent').change(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       $('#parent_name'+i).val("");
       $('#parent_id'+i).val("");
       $('#tel'+i).val("");
       $('#fax'+i).val("");
       $('#address'+i).val("");
       parent_namechangeQS();
       //onchange="document.EditView.parent_name.value='';document.EditView.parent_id.value='';parent_namechangeQS(); 
       checkParentType($('#parent'+i).val(), $('#btn_parent_name'+i));// document.EditView.btn_parent_name);"
       //alert($('#btn_parent_name'+i));
       
   });
   
   $('.checkhidden').click(function(){
       if($(this).is(':checked'))  
         {
            $(this).closest("tr").find(".phidden").show();
         }            
         else
         {
            $(this).closest("tr").find(".phidden").hide();
         }
   });
          
});

function parent_namechangeQS() {
    new_module = document.forms["EditView"].elements["parent_type"].value;
    if (typeof(disabledModules[new_module]) != 'undefined') {
        sqs_objects["EditView_parent_name"]["disable"] = true;
        document.forms["EditView"].elements["parent_name"].readOnly = true;
    } else {
        sqs_objects["EditView_parent_name"]["disable"] = false;
        document.forms["EditView"].elements["parent_name"].readOnly = false;
    }
    sqs_objects["EditView_parent_name"]["modules"] = new Array(new_module);
    if (typeof QSProcessedFieldsArray != 'undefined') {
        QSProcessedFieldsArray["EditView_parent_name"] = false;
    }
    enableQS(false);
}
</script>
{/literal}

<form action="index.php"  name="EditView" id="EditView" method="post">
            <input type="hidden"   name="module"         value="GroupPrograms">
            <input type="hidden"   name="record"         value="{$ID}"> 
            <input type="hidden"   name="action">
            <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
            <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
            <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
<div> 
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
            {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=GroupPrograms", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}  </div>
        
 <fieldset>
 <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">
 <legend><h1>Group Information</h1></legend>
     <tr>
         <td class="dataLabel">Code</td>
         <td class="dataField"><input type="text" size="50" id="groupprogram_code" name="groupprogram_code" value="{$CODE}"/></td>
     </tr>
     <tr>
        <td class="dataLabel">GITs</td>
        <td class="dataField">
            <input type="text" name="git_name" id="git_name" size="50" value="{$GITS}"/> 
            <input type="hidden" name="git_id" id="git_id" value="{$GIT_ID}"/>
            <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group" id="bnt_tour_name_group" onclick='open_popup("Accounts", 600, 400, "", true, false, {$gits_popup_request_data}, "single", true);'>
        </td>
     </tr>
     <tr>
        <td class="dataLabel">Tour name</td>
        <td class="dataField"><input class="sqsEnabled" name="tour_name" id="tour_name" size="50" type="text" value="{$TOUR_NAME}"/> <input type="hidden" id="tour_id" name="tour_id" value="{$TOUR_ID}" />
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group" id="bnt_tour_name_group" onclick='open_popup("Tours", 600, 400, "", true, false, {$tour_popup_request_data}, "single", true);'></td>
        
     </tr>
     <tr>
        <td class="dataLabel">Time</td> 
        <td class="dataField"> From <input type="text" size="11" id="start_date_group" name="start_date_group" value="{$START_DATE_GROUP}"/>&nbsp;&nbsp;&nbsp; 
        To <input type="text" size="11" id="end_date_group" name="end_date_group" value="{$END_DATE_GROUP}"/></td>
     </tr>
     <tr>
        <td class="dataLabel">Team Leader</td>
        <td class="dataField"><input type="text" name="team_leader" id="team_leader" size="25" value="{$TEAM_LEADER}"/>
        <input type="text" name="leader_phone"  id="leader_phone" value="{$LEADER_PHONE}" /> <input type="hidden" name="leader_id" id="leader_id" value="{$LEADER_ID}"/>
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_teamleader" id="bnt_teamleader" onclick='open_popup("TravelGuides", 600, 400, "", true, false, {$travelguide_popup_request_data}, "single", true);'>
         </td>
     </tr> 
     <tr>
        <td class="dataLabel">Guide (Pick up at Airport)</td>
        <td class="dataField"><input class="sqsEnabled" name="guide_pick_up_at_airport" id="guide_pick_up_at_airport" size="25" type="text" value="{$GUIDE_PICK_UP_AIRPORT}"/> 
        <input type="text" name="pick_up_phone" id="pick_up_phone" value="{$PICK_UP_PHONE}"/>
        <input type="hidden" id="guide_pick_up_at_airport_id" name="guide_pick_up_at_airport_id" value="{$GUIDE_PICK_UP_AT_AIRPORT_ID}" />
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_pick_up_name" id="bnt_pick_up_name" onclick='open_popup("Users", 600, 400, "", true, false, {$pick_up_airport}, "single", true);'>
        </td>
     </tr>
     <tr>
        <td class="dataLabel">Giude</td>
        <td class="dataField"><input class="sqsEnabled" name="guide" id="guide" size="25" type="text" value="{$GUIDE}"/>
         <input type="hidden" id="guide_id" name="guide_id" value="{$GUIDE_ID}" />
         <input type="text" id="guide_phone" name="guide_phone" value="{$GUIDE_PHONE}"/>
         <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_guide_name" id="bnt_guide_name" onclick='open_popup("Users", 600, 400, "", true, false, {$guide_users}, "single", true);'>
        </td>
     </tr>
     <tr>
        <td class="dataLabel">Operator</td>
        <td class="dataField"><input class="sqsEnabled" name="operator" id="operator" size="25" type="text" value="{$OPERATOR}"/> 
        <input type="hidden" id="assigned_user_id" name="assigned_user_id" value="{$ASSIGNED_USER_ID}" />
        <input type="text" name="operator_phone" id="operator_phone" value="{$OPERATOR_PHONE}"/>
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_operator_name" id="bnt_operator_name" onclick='open_popup("Users", 600, 400, "", true, false, {$operator_users}, "single", true);'>
        </td>
     </tr>
 </table>
 </fieldset>
 <br/>

 <br/>                                
    <div id="1">
        <fieldset>   
            <legend><h1>Sightseeing car</h1></legend>
            <!-- Sightseeing car--> 
            <table class="table_clone" id="bac"  cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                    <tr>       
                        <td><input type="text" id="number_plates_sight" name="number_plates_sight[]" value=""/></td>
                        <td><input type="text" id="driver_sight" name="driver_sight[]" value=""/></td>
                        <td>
                            <input type="button" class="btnAddRow"  value="Add Row"/>
                            <input type="button" class="btnDelRow" value="Delete Row"/>
                        </td>
                    </tr> 
                </tbody>                                                              
            </table>
        </fieldset>
    </div>
        
    <div id="2">
        <fieldset>
            <legend><h1>Sightseeing car2</h1></legend> 
            <table class="table_clone" id="bac222"  cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                    <tr>       
                        <td><input type="text" id="number_plates_sight" name="number_plates_sight[]" value=""/></td>
                        <td><input type="text" id="driver_sight" name="driver_sight[]" value=""/></td>
                        <td>
                            <input type="button" class="btnAddRow"  value="Add Row"/>
                            <input type="button" class="btnDelRow" value="Delete Row"/>
                        </td>
                    </tr> 
                </tbody>                                                              
            </table>
        </fieldset>
    </div>

  
  <div> 
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
            {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=GroupPrograms", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if} 
  </div>     
</form>