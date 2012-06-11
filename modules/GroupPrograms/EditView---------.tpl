{literal}
<link href="modules/GroupPrograms/datecss.css" media="all" rel="stylesheet" type="text/css">
<script type="text/javascript" src="modules/Tours/jquery.js"> </script> 
<script type="text/javascript" src="modules/Tours/jquery.table.clone.js"> </script>
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
        //alert(i);
       open_popup($('#parent'+i).val(), 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"parent_id"+i, "name": "parent_name"+i}}, "single", true);
   });
   
   $('.parent').change(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       $('#parent_name'+i).val("");
       $('#parent_id'+i).val("");
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
        <td class="dataLabel">Tour name</td>
        <td class="dataField"><input class="sqsEnabled" name="tour_name" id="tour_name" size="50" type="text" value="{$TOUR_NAME}"/> <input type="hidden" id="tour_id" name="tour_id" value="{$TOUR_ID}" />
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group" id="bnt_tour_name_group" onclick='open_popup("Tours", 600, 400, "", true, false, {$tour_popup_request_data}, "single", true);'></td>
        <td class="dataLabel">Time</td> 
        <td class="dataField"><input type="text" size="11" id="start_date_group" name="start_date_group" value="{$START_DATE_GROUP}"/>&nbsp;&nbsp;&nbsp; <input type="text" size="11" id="end_date_group" name="end_date_group" value="{$END_DATE_GROUP}"/></td>
     </tr>
     <tr>
        <td class="dataLabel">Team Leader</td>
        <td class="dataField"><input type="text" name="team_leader" id="team_leader" size="50" value="{$TEAM_LEADER}"/></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
     </tr>
     <tr>
        <td class="dataLabel">Pick up car</td>
        <td class="dataField"><textarea cols="60" rows="4" id="pick_up_car" name="pick_up_car">{$PICK_UP_CAR}</textarea></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
     </tr>
     <tr>
        <td class="dataLabel">Sightseeing car</td>
        <td class="dataField"><textarea cols="60" rows="4" id="sightseeing_car" name="sightseeing_car">{$SIGHTSEEING_CAR}</textarea></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
     </tr>
     <tr>
        <td class="dataLabel">Guide (Pick up at Airport)</td>
        <td class="dataField"><input class="sqsEnabled" name="guide_pick_up_at_airport" id="guide_pick_up_at_airport" size="50" type="text" value="{$GUIDE_PICK_UP_AIRPORT}"/> <input type="hidden" id="guide_pick_up_at_airport_id" name="guide_pick_up_at_airport_id" value="{$GUIDE_PICK_UP_AT_AIRPORT_ID}" />
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_pick_up_name" id="bnt_pick_up_name" onclick='open_popup("Users", 600, 400, "", true, false, {$pick_up_airport}, "single", true);'></td>
        <td class="dataLabel">Giude</td>
        <td class="dataField"><input class="sqsEnabled" name="guide" id="guide" size="50" type="text" value="{$GUIDE}"/> <input type="hidden" id="guide_id" name="guide_id" value="{$GUIDE_ID}" />
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_guide_name" id="bnt_guide_name" onclick='open_popup("Users", 600, 400, "", true, false, {$guide_users}, "single", true);'></td>
     </tr>
     <tr>
        <td class="dataLabel">Operator</td>
        <td class="dataField"><input class="sqsEnabled" name="operator" id="operator" size="50" type="text" value="{$OPERATOR}"/> <input type="hidden" id="assigned_user_id" name="assigned_user_id" value="{$ASSIGNED_USER_ID}" />
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_operator_name" id="bnt_operator_name" onclick='open_popup("Users", 600, 400, "", true, false, {$operator_users}, "single", true);'></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
     </tr>
 </table>
 </fieldset>
 <!-- chuong trinh trong ke hoach doan -->
  <fieldset>
  <table cellpadding="0" cellspacing="0" class="table_clone" id="table_clone" width="100%">
 <legend><h1>Group Programs</h1></legend> 
  <tbody>
  {if $ID eq ''}
    <tr>
        <td>
            <table class="tabForm" cellpadding="0"  cellspacing="0" width="100%">
                    <tr>
                        <td class="dataLabel">Date</td>
                        <!--<td class="dataField"><input id='date' name='date[]' class="datetime" onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$START_DATE}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="start_date_trigger" name="start_date_trigger[]" align="absmiddle"> (dd/mm/yy)  </td>  -->  
                        <td class="dataField"><input id='date' class="datetime" name='date[]' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$START_DATE}"/>(dd/mm/yy)  </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Section of date <input type="checkbox" class="checkhidden"  value="1" id="sectionOfDate" name="sectionOfDate[]"/></td>
                        <td class="dataField"><input type="text" name="section_of_date[]" class="phidden" size="50" id="section_of_date" style="display: none;"></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Service 
                            <select id="parent" class="parent" name="parent[]">
                                <option value="Restaurants">Restaurant</option>
                                <option value="Hotels">Hotel</option>
                                <option value="Destinations">Destination</option>
                            </select>
                        </td>
                        <td class="dataField">
                            <input class="sqsEnabled" name="parent_name[]" id="parent_name" size="50" type="text" value=""/> <input type="hidden" id="parent_id" name="parent_id[]" value="" />
                            <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button service" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="btn_parent_name[]" id="btn_parent_name" >
                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Other <input type="checkbox" class="checkhidden" id="other" name="other[]"/></td>
                        <td class="dataField"><input type="text" name="service_other[]" class="phidden" id="service_other" size="50" style="display: none;"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Address</td>
                        <td class="dataField"><textarea cols="60" rows="4" id="address" name="address[]"></textarea></td>
                    </tr>
                    <tr>
                        <td class="dataField">Tel </td> 
                        <td class="dataField"><input type="text" name="tel[]" id="tel" class="tel" size="35"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Fax</td>
                        <td class="dataField"><input type="text" name="fax[]" id="fax" size="35"/></td>  
                    </tr> 
                    <tr>
                        <td class="dataLabel">Contact</td>
                        <td class="dataField"> <textarea name="contact[]" id="contact" rows="4" cols="90"> </textarea></td>
                    </tr>
                     <tr>
                        <td class="dataLabel">Content</td>
                        <td class="dataField"><textarea cols="90" rows="6" id="content" name="content[]"></textarea> <input type="hidden" name="groupprogram_id[]" id="groupprogram_id" value="" /> <input type="hidden" name="deleted[]" id="deleted" value="0" /> </td>  
                    </tr>
            </table>
        </td>
        <td>
            <input type="button" class="btnAddRow"  value="Add Row"/>
            <input type="button" class="btnDelRow" value="Delete Row"/>
        </td>
    </tr>
    {/if}
    {$GROUP_PROGRAM_LINE}
    
  </tbody>
  </table>
  </fieldset>
  
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