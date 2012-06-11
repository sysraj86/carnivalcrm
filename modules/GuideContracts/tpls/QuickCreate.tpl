{*

/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/




*}

{literal}
<script type="text/javascript" src="modules/Tours/jquery.js"> </script>  
<script type="text/javascript" src="modules/Tours/jquery.table.clone.js"> </script>        
<!-- <script type="text/javascript" src="modules/GroupPrograms/jquery.table.addrow.js"> </script> -->   
<script type="text/javascript">

$(function(){
   $('.btnAddRow').click(function(){
       alert('hello');
   });
});
        Calendar.setup ({ {/literal} inputField : 'start_date', ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : 'start_date_trigger', singleClick : true, step : 1 {literal} });addToValidate('EditView', 'expiration', 'date', false,'expiration'  );
        
        Calendar.setup ({ {/literal}
            //inputField : "end_date", ifFormat : "{$CALENDAR_DATEFORMAT}", showsTime : false, button : "end_date_trigger", singleClick : true, step : 2, weekNumbers:false
            inputField : "end_date",daFormat : "%d/%m/%Y",button : "end_date_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
        {literal} });addToValidate('EditView', 'expiration', 'date', false,'expiration' );  
</script>
 {/literal}

<form name="toursQuickCreate" id="toursQuickCreate" method="POST" action="index.php">
<input type="hidden" name="module" value="Tours">
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
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
    <td align="left" style="padding-bottom: 2px;">
        <input title="Save [Alt+S]" accessKey="S" class="button" onclick="this.form.action.value='Save';if(check_form 
        ('toursQuickCreate'))return SUGAR.subpanelUtils.inlineSave(this.form.id, 'toursQuickCreate_save_button');return false;" type="submit" name="toursQuickCreate_save_button" id="toursQuickCreate_save_button" 
         value="Save">
        <input title="Cancel [Alt+X]" accessKey="X" class="button" onclick="return SUGAR.subpanelUtils.cancelCreate 
        ('toursQuickCreate');return false;" type="submit" name="toursQuickCreate_cancel_button" 
         id="toursQuickCreate_cancel_button" value="Cancel">  
        <input title="Full Form [Alt+F]" accessKey="F" class="button" onclick="this.form.return_action.value 
        ='DetailView'; this.form.action.value='EditView'; if(typeof(this.form.to_pdf)!='undefined') this.form 
        .to_pdf.value='0';" type="submit" name="toursQuickCreate_full_form_button" id="toursQuickCreate_full_form_button" 
         value="Full Form"> <input type="hidden" name="full_form" value="full_form"> 
    </td>
    <td align="right" nowrap><span class="required">{$APP.LBL_REQUIRED_SYMBOL}</span> {$APP.NTC_REQUIRED}</td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="edit view">
<tr>
<td>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <th align="left" scope="row" colspan="4"><h4><slot>{$MOD.LBL_ACCOUNT_INFORMATION}</slot></h4></th>
    </tr>
        <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">  
        <legend><h2>Tour overview</h2></legend> 
            <tr>
                <td class="dataLabel">Tour code</td>
                <td class="dataField"><input type="text" name="tour_code" id="tour_code" value="{$TOURCODE}" size="35"/></td>
                <td class="dataLabel">Tour name</td>
                <td class="dataField"><input name="name" id="name" value="{$NAME}" type="text" size="35" /></td>
            </tr>
            <tr>
                <td class="dataLabel">From</td>
                <td class="dataField">
                    <input type="text" name="from_place" id="from_place" value="{$FROM}" size="35" />
                    <input type="hidden" id="location_to_id" name="location_to_id" value="{$LOCATION_ID}" />
                    <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="location" id="location" onclick='open_popup("Locations", 600, 400, "", true, false, {$location_to_popup_request_data}, "single", true);'>
                </td>
                <td class="dataLabel">To</td>
                <td class="dataField">
                     <input name="to_place" id="to_place" type="text" value="{$TO_PLACE}" size="35"/>
                     <input type="hidden" id="location_id" name="location_id" value="{$LOCATION_ID}" />
                     <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="location" id="location" onclick='open_popup("Locations", 600, 400, "", true, false, {$location_popup_request_data}, "single", true);'>
                </td>
            </tr>
            <tr>
                <td class="dataLabel">Date of departure</td>
                <td class="dataField"><input id='start_date' name='start_date' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$START_DATE}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="start_date_trigger" align="absmiddle"> (dd/mm/yy)  </td>
                <td class="dataLabel">Date of the end</td>
                <td class="dataField"><input id='end_date' name='end_date' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$END_DATE}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="end_date_trigger" align="absmiddle">(dd/mm/yy)   </td>
            </tr>
            <tr>
                <td class="dataLabel">Duration</td>
                <td class="dataField"><input type="text" id="duration" name="duration" size="35" value="{$DURATION}"/></td>
                <td class="dataLabel"> Transport</td>
                <td class="dataField"> <select id="transport" name="transport" multiple="multiple">{$TRANSPORT}</select> </td>
            </tr>
            <tr>
                <td class="dataLabel">Deparment</td>
                <td class="dataField"><select id="deparment" name="deparment">{$DEPARMENT}</select></td>
                <td class="dataLabel">Type</td>
                <td class="dataField"><select id="tour_type" name="tour_type">{$TOUR_TYPE}</select></td>
            </tr>
            <tr>
                <td class="dataLabel">Picture</td>
                <td class="dataField"><input type="file" name="upload_image" id="upload_image"/></td>
                <td class="dataLabel">&nbsp;</td>
                {if $PICTURE eq ''}
                <td class="dataLabel">&nbsp;</td> 
                 {/if}
                <td class="dataLabel">{$PICTURE}</td> 
            </tr>  
            <tr>
                <td class="dataLabel">Contract Value</td>
                <td class="dataField"><input type="text" name="contract_value" id="contract_value" value="{$VALUECONTRACT}" size="35" /></td>
                <td class="dataLabel">Currency</td>
                <td class="dataField"><select name="currency" id="currency">{$CURRENCY}</select></td>
            </tr>
            <tr>
                <td class="dataLabel">Division</td>
                <td class="dataField"><select name="division" id="division" >{$DIVISION}</select></td>
                <td class="dataLabel">Line manager</td>
                <td class="dataField">
                    <input class="sqsEnabled" tabindex="2" autocomplete="off" id="assigned_user_name" name="assigned_user_name"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$ASSIGNED_USER_NAME}"><input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
                     <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="btn1"
                     onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_users_popup_request_data});' />
                    
                    <!--<input class="sqsEnabled" tabindex="2" autocomplete="off" id="assigned_user_name" name="assigned_user_name"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$ASSIGNED_USER_NAME}"><input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
                    <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name=btn1 onclick='open_popup("Users", 600, 400, "", true, false, '');' />-->
                </td>
            </tr> 
            <tr>
                <td class="dataLabel">Operator</td>
                <td class="dataField">
                    <input class="sqsEnabled" tabindex="2" autocomplete="off" id="operator" name="operator"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$OPERATOR}"><input id='operator_id' name='operator_id' type="hidden" value="{$OPERATOR_ID}" />
                     <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="operator_name"
                     onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_operator_popup_request_data});' />
                </td>
                <td class="dataLabel">&nbsp;</td>
                <td class="dataLabel">&nbsp;</td>
            </tr> 
            <tr>
                <td class="dataLabel">Tour note</td>
                <td class="dataField"><textarea cols="75" rows="6" id="description" name="description">{$DESCRIPTION}</textarea></td>
            </tr>                                                                     
        </table>     
    
  <!-- <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">  
        <legend><h2>Tour Information</h2></legend> 
            <tr>
                <td class="dataLabel">Tour code</td>
                <td class="dataField"><input type="text" name="tour_code" id="tour_code" value="{$TOURCODE}" size="35"/></td>
                <td class="dataLabel">Tour name</td>
                <td class="dataField"><input name="name" id="name" value="{$NAME}" type="text" size="35" /></td>
            </tr>
            <tr>
               <td class="dataLabel">From</td>
                <td class="dataField">
                    <input type="text" name="from_place" id="from_place" value="{$FROM}" size="35" />
                    <input type="hidden" id="location_to_id" name="location_to_id" value="{$LOCATION_ID}" />
                    <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="location" id="location" onclick='open_popup("Locations", 600, 400, "", true, false, {$location_to_popup_request_data}, "single", true);'>
                </td>
                <td class="dataLabel">To</td>
                <td class="dataField">
                     <input name="to_place" id="to_place" type="text" value="{$TO_PLACE}" size="35"/>
                     <input type="hidden" id="location_id" name="location_id" value="{$LOCATION_ID}" />
                     <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="location" id="location" onclick='open_popup("Locations", 600, 400, "", true, false, {$location_popup_request_data}, "single", true);'>
                </td>
            </tr>
            <tr>
                <td class="dataLabel">Date of departure</td>
                <td class="dataField"><input id='start_date' name='start_date' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$START_DATE}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="start_date_trigger" align="absmiddle"> (dd/mm/yy)  </td>
                <td class="dataLabel">Date of the end</td>
                <td class="dataField"><input id='end_date' name='end_date' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$END_DATE}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="end_date_trigger" align="absmiddle">(dd/mm/yy)   </td>
            </tr>  
            <tr>
                <td class="dataLabel">Contract Value</td>
                <td class="dataField"><input type="text" name="contract_value" id="contract_value" value="{$VALUECONTRACT}" size="35" /></td>
                <td class="dataLabel">Currency</td>
                <td class="dataField"><select name="currency" id="currency">{$CURRENCY}</select></td>
            </tr>
            <tr>
                <td class="dataLabel">Division</td>
                <td class="dataField"><select name="division" id="division" >{$DIVISION}</select></td>
                <td class="dataLabel">Line manager</td>
                <td class="dataField">
                    <input class="sqsEnabled" tabindex="2" autocomplete="off" id="assigned_user_name" name="assigned_user_name"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$ASSIGNED_USER_NAME}"><input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
                     <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name=btn1
                     onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_users_popup_request_data});' />
                </td>
            </tr> 
            <tr>
                <td class="dataLabel">Operator</td>
                <td class="dataLabel">
                    <input class="sqsEnabled" tabindex="2" autocomplete="off" id="operator" name="operator"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$OPERATOR}"><input id='operator_id' name='operator_id' type="hidden" value="{$OPERATOR_ID}" />
                     <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="operator_name"
                     onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_operator_popup_request_data});' />
                </td>
                <td class="dataLabel">&nbsp;</td>
                <td class="dataLabel">&nbsp;</td>
            </tr> 
            <tr>
                <td class="dataLabel">Tour note</td>
                <td class="dataField"><textarea cols="75" rows="6" id="description" name="description">{$DESCRIPTION}</textarea></td>
            </tr>                                                                     
        </table>     
    </table>      -->
    </form>
<script>
    {$additionalScripts}
</script>