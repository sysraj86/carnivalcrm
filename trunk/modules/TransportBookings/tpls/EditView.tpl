{literal}
<link href="modules/TransportBookings/css/datecss.css" media="all" rel="stylesheet" type="text/css">
<script type="text/javascript" src="custom/include/js/jquery.js"> </script> 
<script type="text/javascript" src="custom/include/js/jquery.table.clone.js"> </script>
<script type="text/javascript" src="custom/include/js/jquery-ui-DateFormat.js"> </script>
<script type="text/javascript" src="custom/include/js/popupRequest.js"> </script>
<script type="text/javascript" src="custom/include/js/CustomDatePicker.js"></script>
<script type="text/javascript" src="custom/include/js/CustomSelectField.js"></script>
{/literal}

<form action="index.php"  name="EditView" id="EditView" method="post">
            <input type="hidden"   name="module"         value="TransportBookings"/>
            <input type="hidden"   name="record"         value="{$ID}"/> 
            <input type="hidden"   name="action"/>
            <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}"/>
            <input type="hidden"   name="return_id"      value="{$RETURN_ID}"/>
            <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}"/>
            <input type="hidden"   name="transportsbooking_line_count"  value="{$TRANSPORTSBOOKING_LINE_COUNT}"/>
<div> 
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
            {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=TransportBookings", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}  </div>
        
 <fieldset>
 <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">
 <legend><h1>Overview Information</h1></legend>
     <tr>
         <td class="dataLabel">{$MOD.LBL_TRANSPORT} :</td>
         <td class="dataField">
         <input type="text" size="60" id="transports_tbookings_name" name="transports_tbookings_name" value="{$TRANSPORTS}">
         <input data="Button=cleardata,selectdata|Module=Transports|Fields=id,name,address,phone|Inputs=transports6e65nsports_ida,transports_tbookings_name,address,tel_to" class="select" type="hidden" size="60" id="transports6e65nsports_ida" name="transports6e65nsports_ida" value="{$TRANSPORTS_ID}">
         <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_transports" id="bnt_transports" onclick='open_popup("Transports", 600, 400, "", true, false, {$transports_popup_request_data}, "single", true);'>  -->
         </td>
     </tr>
     <tr>  
        <td class="dataLabel"> {$MOD.LBL_ADDRESS} :</td>
        <td class="dataField"><input name="address" type="text" size="60" id="address" value="{$ADDRESS}"></td>
     </tr>
     <tr>
        <td class="dataLabel">{$MOD.LBL_ATTN} :</td>
        <td class="dataField">
            <input type="hidden" name="attn_to_name_id" id="attn_to_name_id" size="32" value="{$ATTN_TO_NAME_ID}"/>
            <input type="text" name="attn_to_name" id="attn_to_name" size="32" value="{$ATTN_TO_NAME}"/> 
            <input data="Button=cleardata,selectdata|Module=Contacts|Fields=id,name,phone_mobile|Inputs=attn_to_name_id,attn_to_name,attn_to_phone" class="select" type="text" name="attn_to_phone" id="attn_to_phone" size="20" value="{$ATTN_TO_PHONE}"/>
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_attn_to_name" id="bnt_attn_to_name" onclick='filterPopup("transports_contacts_name_advanced","transports_tbookings_name","Contacts", {$attn_to_popup_request_data}); return true'>-->
            
        </td>
     </tr>
     <tr>
        <td class="dataLabel">{$MOD.LBL_TEL} :</td>
        <td class="dataField">
            <input type="text" name="tel_to" id="tel_to" size="25" value="{$TEL_TO}"/>&nbsp;&nbsp;&nbsp;Fax&nbsp;&nbsp;                                                                                                          
            <input type="text" name="fax_to" id="fax_to" size="20" value="{$FAX_TO}"/>
        </td>
     </tr>
     <tr>
        <td class="dataLabel">{$MOD.LBL_FROM_CO} :</td> 
        <td class="dataField"><input type="text" size="60" id="from_co" name="from_co" value="{$FROM_CO}"/>
        </td>
     </tr>
     <tr>
        <td class="dataLabel">{$MOD.LBL_ATTN} :</td>
        <td class="dataField">
            <input type="hidden" name="attn_from_name_id" id="attn_from_name_id" value="{$ATTN_FROM_NAME_ID}" size="32"/>
            <input type="text" name="attn_from_name" id="attn_from_name" value="{$ATTN_FROM_NAME}" size="32"/>
            <input data="Button=cleardata,selectdata|Module=Users|Fields=id,user_name,phone_work,email1|Inputs=attn_from_name_id,attn_from_name,attn_from_phone,email" class="select" type="text" id="attn_from_phone" name="attn_from_phone" size="20" value="{$ATTN_FROM_PHONE}"/>
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="btn_attn_from_name" id="btn_attn_from_name" onclick='open_popup("Users", 600, 400, "", true, false, {$attn_from_popup_request_data}, "single", true);'></td>-->
        </td>
     </tr> 
      <tr>
        <td class="dataLabel">{$MOD.LBL_EMAIL} :</td>
        <td class="dataField">
            <input type="text" name="email" id="email" value="{$EMAIL}" size="60"/>
        </td>
     </tr>      
      <tr>
        <td class="dataLabel">{$MOD.LBL_TEL} :</td>
        <td class="dataField">
            <input type="text" name="tel_from" id="tel_from" size="25" value="{$TEL_FROM}"/>&nbsp;&nbsp;&nbsp;Fax&nbsp;&nbsp;
            <input type="text" name="fax_from" id="fax_from" size="20" value="{$FAX_FROM}"/>
        </td>
     </tr> 
     <tr>
        <td class="dataLabel">{$MOD.LBL_MADETOUR} : <span class="required">*</span></td>
        <td class="dataField">
            <input type="text" name="groupprogratbookings_name" id="groupprogratbookings_name" size="60" value="{$MADETOUR}"/>
            <input data="Button=cleardata,selectdata|Module=GroupPrograms|Fields=id,groupprogram_code|Inputs=groupprogrd5earograms_ida,groupprogratbookings_name" class="select" type="hidden" name="groupprogrd5earograms_ida" id="groupprogrd5earograms_ida" value="{$MADETOUR_ID}"/>
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="btn_madetour_from_name" id="btn_madetour_from_name" onclick='open_popup("GroupPrograms", 600, 400, "", true, false, {$madetour_from_popup_request_data}, "single", true);'></td>-->
        </td>
     </tr>                                                                                                  
 </table>
    </fieldset> 
    
 <br/>  

  <fieldset>
  <table cellpadding="0" cellspacing="0" class="table_clone" id="table_clone" width="100%">
 <legend><h1>{$MOD.LBL_TITLE}</h1></legend> 
  <tbody>
  <tr>
    <td class="dataLabel">{$MOD.LBL_NAMELINE}</td>
    <td class="dataLabel">{$MOD.LBL_DATELINE}</td>
    <td class="dataLabel">{$MOD.LBL_UNITPRICELINE}</td>
    <td class="dataLabel">{$MOD.LBL_TYPELINE}</td>
    <td class="dataLabel">{$MOD.LBL_CONTENTLINE}</td>
    <td class="dataLabel">&nbsp;</td>
</tr>

  {if $ID eq '' or $TRANSPORTSBOOKING_LINE_COUNT eq 0}
  <tr>
    <td class="dataField"><input name="name_booking[]" id="name_booking" type="text" value=""></td>
    <td class="dataField"><input name="operating_date[]" class="datetime" id="operating_date" type="text" value=""/></td>
    <td class="dataField"><input name="unit_price[]" id="unit_price" type="text" value=""></td>
    <td class="dataField"><input name="type[]" id="type" type="text" value=""></td>
    <td class="dataField"><textarea cols="40" rows="5" name="route[]" id="route"></textarea>
    <input type="hidden" name="id_booking[]" id="id_booking" value="" />
    <input type="hidden" name="deleted[]" class="deleted" id="deleted" value="0" /></td>
    
    <td>
            <input type="button" class="btnAddRow"  value="Add Row"/>
            <input type="button" class="btnDelRow" value="Delete Row"/>
    </td>
    
</tr>

    
    {/if}
    {$TRANSPORTSBOOKING_LINE}
    
  </tbody>
  </table>
  </fieldset>
  <fieldset>
  <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">
  <tr> 
        <td class="dataLabel">
           {$MOD.LBL_GIA} :      
        </td>
        <td class="dataField">
            <input type="text" name="gia" value="{$GIA}" id="gia">
        </td> 
    </tr> 
    <tr>                                
        <td colspan="2" class="dataLabel">
        <label>Giá trên đã bao gồm thuế <input name="vat" id="vat" type="text" value="{$VAT}"/> % VAT, phí cầu đường.</label></td>
    </tr>
    <tr>
        <td class="dataLabel"><b><u>{$MOD.LBL_REQUIRE} :</u></b></td>
        <td class="dataField">                                              
        <textarea name="require_transports" id="require_transports" cols="120" rows="8">{$REQUIRE}</textarea>
        </td> 
    </tr>
    <tr> 
        <td class="dataLabel">
           {$MOD.LBL_CONFIRM} :      
        </td>
        <td class="dataField">
            <input type="radio" name="confirm" value="1" {$YES} id="confirm" title="" />Yes <input type="radio" name="confirm" value="0" {$NO} id="confirm" title="" />No
        </td> 
    </tr>
    <tr>
        <td class="dataLabel">{$MOD.LBL_DATE} :</td>
        <td class="dataField">
        <input name="date" class="datePicker" id="date" type="text" value="{$DATE}"/>
        </td>
    </tr>
    <tr> 
        <td class="dataLabel"> {$MOD.LBL_DEADLINE} :
        </td>
        <td class="dataField">
        <input name="deadline" class="datePicker" id="deadline" type="text" value="{$DEADLINE}"/>
        </td>  
    </tr>
    <tr>
        <td class="dataLabel">
              {$MOD.LBL_OPERATOR} : 
        </td>
        <td class="dataField">
               <input name="operator" id="operator" type="text" value="{$OPERATOR}"/>
        </td>  
    </tr>
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
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=TransportBookings", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if} 
  </div>     
</form>
