{literal}
<script type="text/javascript" src="custom/include/js/jquery.js"> </script> 
<script type="text/javascript" src="custom/include/js/jquery.table.clone.js"> </script>
<script type="text/javascript" src="custom/include/js/jquery-ui-DateFormat.js"> </script>
<script type="text/javascript" src="custom/include/js/popupRequest.js"> </script>
<script type="text/javascript" src="custom/include/js/CustomDatePicker.js"></script>
<script type="text/javascript" src="custom/include/js/CustomSelectField.js"></script>

 {/literal}
<form  id="EditView"  name="EditView" method="post"   action="index.php" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0" width="100%" border="0"> 
        <tr>
            <td>
                <input type="hidden"    name="module"           value="RoomBookings">
                <input type="hidden"    name="record"           value="{$ID}">
                <input type="hidden"    name="action">
                <input type="hidden"    name="return_module"    value="{$RETURN_MODULE}">
                <input type="hidden"    name="return_id"        value="{$RETURN_ID}">
                <input type="hidden"    name="return_action"    value="{$RETURN_ACTION}">
                <input type="hidden"    name="contact_role">
                <input type="hidden"    name="relate_to"        value="Tours">
                <input type="hidden"    name="relate_id"        value="">
                <input type="hidden"    name="offset"           value="1">
                <input type="hidden"    name="count"            value="{$ROOMBOOKING_COUNT}"/>
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 2px;">
                 <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"   accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
                     onclick="this.form.action.value='Save';return check_form('EditView');" 
                      type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " /> 
               <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
                      onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
                      type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  "/>
               {if $ID neq ''}
                <input title="{$APP.LBL_VIEW_CHANGE_LOG}" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=RoomBookings", true, false, {$view_change_log} ); return false;' type="submit" value="{$APP.LBL_VIEW_CHANGE_LOG}">
                {/if}
            </td>
        </tr>
    
    </table>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="tabForm">
        <tr>
            <td class="dataLabel">{$MOD.LBL_HOTELS_ROOMBOOKINGS_FROM_HOTELS_TITLE} :<span class="required">*</span></td>
            <td class="dataField">
                <input type="text" name="hotels_roombookings_name" id="hotels_roombookings_name" value="{$HOTEL}" size="58" class="select" data="Button=cleardata,selectdata|Module=Hotels|Fields=id,name,address,tel,fax|Inputs=hotels_rooc622shotels_ida,hotels_roombookings_name,hotel_address,hotel_tel,hotel_fax"/>
                <input type="hidden" name="hotels_rooc622shotels_ida" id="hotels_rooc622shotels_ida" value="{$HOTEL_ID}"/>
                <!-- <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="btn_hotel_nam" id="btn_hotel_nam" onclick='open_popup("Hotels", 600, 400, "", true, false, {$hotel_popup_request_data}, "single", true);'> -->
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_RES_ADDRESS} :</td>
            <td class="dataField"><textarea id="hotel_address" name="hotel_address" cols="60" rows="2">{$HOTEL_ADDRESS}</textarea></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_ATTN_HOTEL_NAME} :<span class="required">*</span></td>
            <td class="dataField">
                <input type="hidden" name="attn_hotel_name_id" id="attn_hotel_name_id" value="{$ATTN_HOTEL_NAME_ID}"/>    
                <input type="text" name="attn_hotel_name" id="attn_hotel_name" value="{$ATTN_HOTEL_NAME}" size="30"/>-                   
                <input type="text" name="attn_hotel_phone" id="attn_hotel_phone" value="{$ATTN_HOTEL_PHONE}" class="select" data="Button=cleardata,selectdata|Module=Contacts|Fields=id,name,phone_mobile|Inputs=attn_hotel_name_id,attn_hotel_name,attn_hotel_phone"/>
                <!-- <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="btn_attn_hotel_nam" id="btn_attn_hotel_nam" onclick='filterPopup("hotels_contacts_name_advanced", "hotels_roombookings_name", "Contacts", {$contact_popup_request_data}); return false;'> -->
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_HOTEL_TEL} :</td>
            <td class="dataField">
                <input type="text" size="22" name="hotel_tel" id="hotel_tel" value="{$HOTEL_TEL}"/> &nbsp;
                 {$MOD.LBL_HOTEL_FAX} :
                <input type="text" size="22" name="hotel_fax" id="hotel_fax" value="{$HOTEL_FAX}"/>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_FROM} :</td>
            <td class="dataField"><input type="text" name="company" id="company" size="58" value="{$FROM}"> </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_ATTN_NAME} :</td>
            <td class="dataField">
                <input type="text" name="attn_name" id="attn_name" value="{$ATTN_NAME}" size="30"/>-
                <input type="text" name="attn_phone" id="attn_phone" value="{$ATTN_PHONE}"/>
                <input type="hidden" name="attn_id" id="attn_id" value="{$ATTN_ID}" class="select" data="Button=cleardata,selectdata|Module=Users|Fields=id,user_name,phone_work,email1|Inputs=attn_id,attn_name,attn_phone,attn_email"/>
                <!-- <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="btn_attn_hotel_nam" id="btn_attn_hotel_nam" onclick='open_popup("Users", 600, 400, "", true, false, {$user_popup_request_data}, "single", true);'> -->
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_EMAIL} :</td>
            <td class="dataField"><input type="text" name="attn_email" id="attn_email" value="{$ATTN_EMAIL}" size="58"/></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_HOTEL_TEL} :</td>
            <td class="dataField">
                <input type="text" size="22" name="attn_tel" id="attn_tel" value="{$TEL}"/> &nbsp;
                 {$MOD.LBL_HOTEL_FAX} :
                <input type="text" size="22" name="attn_fax" id="attn_fax" value="{$FAX}"/> 
            </td>
        </tr>
    </table>
    
    <table class="tabForm" cellpadding="0" cellspacing="0" width="100%" align="center" border="0">
        <tr>
            <td class="dataLabel" colspan="2"><h1 align="center"> <font size="8">{$MOD.LBL_TITLE}</font></h1></td>
        </tr>
        <tr>
            <td class="dataLabel" colspan="2"><u>{$MOD.LBL_ROOM_RESERVATION} :</u></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_MADE_TOUR_CODE} : <span class="required">*</span>      
            </td>
            <td class="dataField"> 
                <input type="text" name="groupprogrambookings_name" id="groupprogrambookings_name" size="37" value="{$MADETOUR}"/>
                <input type="hidden" name="groupprogra66erograms_ida" id="groupprogra66erograms_ida" value="{$MADETOUR_ID}" class="select" data="Button=cleardata,selectdata|Module=GroupPrograms|Fields=id,groupprogram_code|Inputs=groupprogra66erograms_ida,groupprogrambookings_name"/>
                <!-- <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="btn_madetour_nam" id="btn_madetour_nam" onclick='open_popup("GroupPrograms", 600, 400, "", true, false, {$madetour_popup_request_data}, "single", true);'> -->
                
            </td>
        </tr>
        <tr>
        <td class="dataLabel">{$MOD.LBL_NATIONLITY} :</td>
        <td class="dataField"><select name="nationlity" name="nationlity">{$NATIONLITY} </select> </td>
        </tr>
        <tr>
        <td class="dataLabel">{$MOD.LBL_CONTENT} :</td>
        <td class="dataField">
                <table class="table_clone" id="booking_line" cellpadding="0" cellspacing="0" border="0" width="100%">

                 <thead>
                    <tr>
                       <th>{$MOD.LBL_LINE_TYPE}</th> 
                       <th>{$MOD.LBL_LINE_QUANTITY}</th>
                       <th>{$MOD.LBL_LINE_UNIT_PRICE}</th>
                       <th>{$MOD.LBL_LINE_CHECK_IN}</th>
                       <th>{$MOD.LBL_LINE_CHECK_OUT}</th>
                       <th></th>
                    </tr>
                  </thead>
                 <tbody>
                 {if $ID eq '' or $ROOMBOOKING_COUNT eq 0}
                    <tr>
                        <td class="dataField" align="center"><input type="text" name="type[]" id="type" value=""/></td>
                        <td class="dataField" align="center"><input type="text" name="quantity[]" id="quantity" value=""/>
                        
                        <input type="hidden" name="roombooking_line_id[]" id="roombooking_line_id" value=""></td>
                        <td class="dataField" align="center"><input type="text" name="price[]" id="price" value=""/> 
                        <select id="currency" name="currency[]">
                        <option value="vnd">VND</option><option value="usd">USD</option></select></td>
                        <td class="dataField" align="center">
                        <input type="text" id='check_in' name='check_in[]' class="datePicker"  /></td>
                        <td class="dataField" align="center">
                        <input type="text" id='check_out' name='check_out[]' class="datePicker" /></td>
                        <td class="dataField" align="center">
                            <input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"> 
                            <input type="button" class="btnAddRow"  value="Add Row"/>
                            <input type="button" class="btnDelRow" value="Delete Row"/>
                        </td>
                    </tr>
                    {/if}
                    {$BOOKINGLINE}
                 </tbody>
                </table>
            </td>
        </tr>
        
        <tr>
            <td class="dataLabel" colspan="2">
            <u>{$MOD.LBL_ROOM_CONVENTION} :</u>
            </td>
        </tr>
        <tr><td colspan="2"><textarea cols="200" rows="8" id="convention" name="convention">{$CONVENTION}</textarea></td></tr>
        <tr>
            <td class="dataLabel" colspan="2">
            <u>{$MOD.LBL_ROOM_OTHER_SERVICE} :</u>
            </td>
        </tr>
        <tr> 
            <td class="dataLabel" colspan="2">
                <table  class="table_clone" id="other_service" cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                {if $ID eq '' or $SERVICE_COUNT eq 0}
                   <tr>
                      <td><textarea cols="200" rows="8" id="service" name="service[]"></textarea>
                      <input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0">
                      <input type="hidden" name="service_id[]" id="service_id" value=""></td>
                      <td>
                            <input type="button" class="btnAddRow"  value="Add Row"/>
                            <input type="button" class="btnDelRow" value="Delete Row"/>
                      </td>
                   </tr>
                   {/if}
                   {$SERVICE}
                </tbody>
                </table>
            </td>
         </tr>
         <br/>
        <tr>
            <td class="dataLabel">{$MOD.LBL_GIA} :</td>
            <td class="dataField"><input type="text" name="gia" value="{$GIA}" id="gia"></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_CONFIRM} :</td>
            <td class="dataField"><input type="radio" name="confirm" value="1" {$YES} id="confirm" title="" />Yes <input type="radio" name="confirm" value="0" {$NO} id="confirm" title="" />No</td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DATE} :</td>
            <td class="dataField"><input id='date' class="datePicker" name='date'  type="text" value="{$DATE}"/></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DEADLINE} :</td>
            <td class="dataField"><input id='deadline' class="datePicker" name='deadline'  type="text" value="{$DEADLINE}"/></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DEPARMENT} :</td>
            <td class="dataField"><input type="text" name="deparment" id="deparment" value="{$DEPARMENT}"/></td>
        </tr>
    </table>
    <div>
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"   accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " /> 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  "/>
        {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=RoomBookings", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
    </div>
</form>