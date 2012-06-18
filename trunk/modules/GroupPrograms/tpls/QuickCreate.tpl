{literal}
 <script type="text/javascript" src="custom/include/js/jquery.js"></script>
 <script type="text/javascript" src="custom/include/js/CustomDatePicker.js"></script>
 <script type="text/javascript" src="custom/include/js/CustomSelectField.js"></script>
 <script type="text/javascript">
    addToValidate('MadeTourQuickCreate', 'groupprogram_code', 'varchar', true,'Code' );
    addToValidate('MadeTourQuickCreate', 'tour_name', 'varchar', true,'Tour name' );
    addToValidate('MadeTourQuickCreate', 'grouplists_pprograms_name', 'relate', true,'GroupLists' );
 </script>
{/literal}
<form name="MadeTourQuickCreate" id="MadeTourQuickCreate" action="index.php" method="post">
<table cellpadding="0" cellspacing="0" width="100%" border="0">
    <tr>
        <td>
            <input type="hidden" name="module" value="GroupPrograms">
            {if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}
            <input type="hidden" name="record" value="">
            {else}
            <input type="hidden" name="record" value="{$fields.id.value}">
            {/if}
            <input type="hidden" name="isDuplicate" value="false">
            <input type="hidden" name="return_action" value="{$REQUEST.return_action}">
            <input type="hidden" name="return_module" value="{$REQUEST.return_module}">
            <input type="hidden" name="return_id" value="{$REQUEST.return_id}">
            <input type="hidden" name="action" value='Save'>
            <input type="hidden" name="is_ajax_call" value='1'>
            {if !empty($smarty.request.return_module)}
            <input type="hidden" name="relate_to" value="{if $smarty.request.return_relationship}{$smarty.request.return_relationship}{elseif empty($isDCForm)}{$smarty.request.return_module}{/if}">
            <input type="hidden" name="relate_id" value="{$smarty.request.return_id}">
            {/if} 
            <input type="hidden" name="offset" value="1">
            <input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
        </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" width="100%" border="0"> 
    <tr>
        <td align="left" style="padding-bottom: 2px;">
            <input title="Save [Alt+S]" accessKey="S" class="button" onclick="this.form.action.value='Save';if(check_form 
            ('MadeTourQuickCreate'))return SUGAR.subpanelUtils.inlineSave(this.form.id, 'madeToursQuickCreate_save_button');return false;" type="submit" name="madeToursQuickCreate_save_button" id="madeToursQuickCreate_save_button" 
             value="Save">
            <input title="Cancel [Alt+X]" accessKey="X" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate 
            ('MadeTourQuickCreate');return false;" type="submit" name="madeTourQuickCreate_cancel_button" 
             id="madeTourQuickCreate_cancel_button" value="Cancel">  
            <input title="Full Form [Alt+F]" accessKey="F" class="button" onclick="this.form.return_action.value 
            ='DetailView'; this.form.action.value='EditView'; if(typeof(this.form.to_pdf)!='undefined') this.form 
            .to_pdf.value='0';" type="submit" name="madeToursQuickCreate_full_form_button" id="madeToursQuickCreate_full_form_button" 
             value="Full Form"> <input type="hidden" name="full_form" value="full_form"> 
            </td>
    </tr>
    <td align="right" nowrap><span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span> {$APP.NTC_REQUIRED}</td>
</table>

<fieldset>
 <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">
 <legend><h1>Overview Information</h1></legend>
     <tr>
         <td class="dataLabel">Code <span class="required">*</span></td>
         <td class="dataField"><input type="text" size="50" id="groupprogram_code" name="groupprogram_code" value="{$CODE}"</td>
     </tr>
     <tr>
        <td class="dataLabel">Group List <span class="required">*</span></td>
        <td class="dataField">
            <input type="text" data="Button=cleardata,selectdata|Module=GroupLists|Fields=id,name|Inputs=grouplists87eduplists_ida,grouplists_pprograms_name" class="select" name="grouplists_pprograms_name" id="grouplists_pprograms_name" size="50" value="{$GITS}"/> 
            <input type="hidden" name="grouplists87eduplists_ida" id="grouplists87eduplists_ida" value="{$GIT_ID}"/>
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group" id="bnt_tour_name_group" onclick='open_popup("GroupLists", 600, 400, "", true, false, {$gits_popup_request_data}, "single", true);'>-->
        </td>
     </tr>
     <tr>
        <td class="dataLabel">Tour name <span class="required">*</span></td>
        <td class="dataField">
        <input class="select" data="Button=cleardata,selectdata|Module=Tours|Fields=id,name,start_date,end_date,tour_code|Inputs=tour_id,tour_name,start_date_group,end_date_group,tour_code" name="tour_name" id="tour_name" size="50" type="text" value="{$TOUR_NAME}"/> <input type="hidden" id="tour_id" name="tour_id" value="{$TOUR_ID}" />
        <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group" id="bnt_tour_name_group" onclick='open_popup("Tours", 600, 400, "", true, false, {$tour_popup_request_data}, "single", true);'>--></td>
        
     </tr>
     <tr>
        <td class="dataLabel">Tour Code</td>
        <td class="dataField">
        <input readonly="true" name="tour_code" id="tour_code" size="50" type="text" value="{$TOUR_CODE}"/>
        <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group" id="bnt_tour_name_group" onclick='open_popup("Tours", 600, 400, "", true, false, {$tour_popup_request_data}, "single", true);'>--></td>
        
     </tr>
     <tr>
        <td class="dataLabel">Time</td> 
        <td class="dataField" > 
            From <input type="text" class="datePicker" size="11" id="start_date_group" name="start_date_group" value="{$START_DATE_GROUP}"/>&nbsp;&nbsp;&nbsp;
            To <input type="text" size="11" class="datePicker" id="end_date_group" name="end_date_group" value="{$END_DATE_GROUP}"/>
        </td>
     </tr>
     <tr>
        <td class="dataLabel">Worksheet</td>
        <td class="dataField">
            <input type="text" data="Button=cleardata,selectdata|Module=Worksheets|Fields=id,name|Inputs=groupprogr53b5ksheets_idb,groupprograorksheets_name" class="select" name="groupprograorksheets_name" id="groupprograorksheets_name" value="{$WORKSHEET}" size="50"/>
            <input type="hidden" id="groupprogr53b5ksheets_idb" name="groupprogr53b5ksheets_idb" value="{$WORKSHEET_ID}"/>
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_worksheet" id="bnt_worksheet" onclick='open_popup("Worksheets", 600, 400, "", true, false, {$worksheet_popup_request_data}, "single", true);'>-->
        </td>
     </tr> 
      <tr>
        <td class="dataLabel">Insurance List</td>
        <td class="dataField">
            <input type="text" data="Button=cleardata,selectdata|Module=Insurances|Fields=id,name|Inputs=groupprogr5003urances_idb,groupprogransurances_name" class="select" name="groupprogransurances_name" id="groupprogransurances_name" value="{$INSURANCE}" size="50"/>
            <input type="hidden" id="groupprogr5003urances_idb" name="groupprogr5003urances_idb" value="{$INSURANCE_ID}"/>
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_insurance" id="bnt_insurance" onclick='open_popup("Insurances", 600, 400, "", true, false, {$insurance_popup_request_data}, "single", true);'></td>-->
        </td>
     </tr>      
      <tr>
        <td class="dataLabel">Visa List</td>
        <td class="dataField">
            <input type="text" data="Button=cleardata,selectdata|Module=PassportList|Fields=id,name|Inputs=groupprogrc66dortlist_idb,groupprograsportlist_name" class="select" name="groupprograsportlist_name" id="groupprograsportlist_name" value="{$PASSPORT}" size="50"/>
            <input type="hidden" id="groupprogrc66dortlist_idb" name="groupprogrc66dortlist_idb" value="{$PASSPORT_ID}"/>
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_passport" id="bnt_passport" onclick='open_popup("Passports", 600, 400, "", true, false, {$passport_popup_request_data}, "single", true);'></td> -->
        </td>
     </tr> 
     <tr>
        <td class="dataLabel">Airlines Tickets</td>
        <td class="dataField">
            <input type="text" data="Button=cleardata,selectdata|Module=AirlinesTicketsLists|Fields=id,name|Inputs=groupprogr60cctslists_idb,groupprograketslists_name" class="select" name="groupprograketslists_name" id="groupprograketslists_name" value="{$TICKER}" size="50"/>
            <input type="hidden" id="groupprogr60cctslists_idb" name="groupprogr60cctslists_idb" value="{$TICKET_ID}"/>
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_airlines_tickets" id="bnt_airlines_tickets" onclick='open_popup("AirlinesTickets", 600, 400, "", true, false, {$airlines_tickets_popup_request_data}, "single", true);'></td>       -->
        </td>
     </tr>                                                                                                  
 </table>
    </fieldset> 
    
  <!--<fieldset>
  <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">
  <legend><h1>Guide & Operator</h1></legend> 
     <tr>
        <td class="dataLabel">Team Leader</td>
        <td class="dataField"><input type="text" name="team_leader" id="team_leader" size="25" value="{$TEAM_LEADER}"/>
        <input type="text" name="leader_phone"  id="leader_phone" value="{$LEADER_PHONE}" /> <input type="hidden" name="leader_id" id="leader_id" value="{$LEADER_ID}"/>
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_teamleader" id="bnt_teamleader" onclick='open_popup("TravelGuides", 600, 400, "", true, false, {$leader_popup_request_data}, "single", true);'>
         </td>
     </tr> 
     <tr>
        <td class="dataLabel">Guide (Pick up at Airport)</td>
        <td class="dataField"><input class="sqsEnabled" name="guide_pick_up_at_airport" id="guide_pick_up_at_airport" size="25" type="text" value="{$GUIDE_PICK_UP_AIRPORT}"/> 
        <input type="text" name="pick_up_phone" name="pick_up_phone" value="{$PICK_UP_PHONE}"/>
        <input type="hidden" id="guide_pick_up_at_airport_id" name="guide_pick_up_at_airport_id" value="{$GUIDE_PICK_UP_AT_AIRPORT_ID}" />
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_pick_up_name" id="bnt_pick_up_name" onclick='open_popup("TravelGuides", 600, 400, "", true, false, {$pick_up_airport}, "single", true);'>
        </td>
     </tr>
     <tr>
        <td class="dataLabel">Giude</td>
        <td class="dataField"><input class="sqsEnabled" name="guide" id="guide" size="25" type="text" value="{$GUIDE}"/>
         <input type="hidden" id="guide_id" name="guide_id" value="{$GUIDE_ID}" />
         <input type="text" id="guide_phone" name="guide_phone" value="{$GUIDE_PHONE}"/>
         <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_guide_name" id="bnt_guide_name" onclick='open_popup("TravelGuides", 600, 400, "", true, false, {$guide_users}, "single", true);'>
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
 </fieldset>    -->
</form>