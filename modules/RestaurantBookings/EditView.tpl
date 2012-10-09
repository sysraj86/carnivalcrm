{literal}
<link href="modules/GroupPrograms/datecss.css" media="all" rel="stylesheet" type="text/css">
<script type="text/javascript" src="custom/include/js/jquery.js"> </script> 
<script type="text/javascript" src="custom/include/js/jquery.table.clone.js"> </script>
<script type="text/javascript" src="custom/include/js/jquery-ui-DateFormat.js"> </script>
<script type="text/javascript" src="custom/include/js/popupRequest.js"> </script>
<script type="text/javascript" src="custom/include/js/CustomDatePicker.js"></script>
<script type="text/javascript" src="custom/include/js/CustomSelectField.js"></script>
<script type="text/javascript" src="modules/RestaurantBookings/js/RestaurantBookings.js"></script>
 {/literal}
<form  id="EditView"  name="EditView" method="post"   action="index.php" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0" width="100%" border="0"> 
        <tr>
            <td>
                <input type="hidden"   name="module"         value="RestaurantBookings">
                <input type="hidden"   name="record"         value="{$ID}">
                <input type="hidden"   name="action">
                <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
                <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
                <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
                <input type="hidden" name="contact_role">
                <input type="hidden" name="relate_to" value="Tours">
                <input type="hidden" name="relate_id" value="">
                <input type="hidden" name="offset" value="1">
                <input type="hidden" name="count" value="{$RES_COUNT}"/>
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
                <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=RoomBookings", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
                {/if}
            </td>
        </tr>
    
    </table>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center" class="tabForm">
        
        <tr>
            <td class="dataLabel" width="150">{$MOD.LBL_TO} :<span class="required">*</span></td>
            <td class="dataField">
                <input data="Button=cleardata,selectdata|Module=Restaurants|Fields=id,name,address,tel,fax|Inputs=restaurant437baurants_ida,restaurantstbookings_name,res_address,res_tel,res_fax" class="select" type="text" name="restaurantstbookings_name" id="restaurantstbookings_name" value="{$RES}" size="58"/>
                <input type="hidden" name="restaurant437baurants_ida" id="restaurant437baurants_ida" value="{$RES_ID}"/>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_RES_ADDRESS} :</td>
            <td class="dataField"><textarea id="res_address" name="res_address" cols="60" rows="2">{$RES_ADDRESS}</textarea></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_ATTN_RES_NAME} :<span class="required">*</span></td>
            <td class="dataField">
                <input type="text" name="attn_res_name" id="attn_res_name" value="{$ATTN_RES_NAME}" size="30"/> &nbsp;&nbsp;&nbsp;
                <input data="Button=cleardata,selectdata|Module=Contacts|Fields=id,name,phone_mobile|Inputs=attn_res_name_id,attn_res_name,attn_res_phone" class="select" type="text" name="attn_res_phone" id="attn_res_phone" value="{$ATTN_RES_PHONE}"/>
                <input type="hidden" name="attn_res_name_id" id="attn_res_name_id" value="{$ATTN_RES_NAME_ID}"/>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_TEL} :</td>
            <td class="dataField">
                <input type="text" size="24" name="res_tel" id="res_tel" value="{$RES_TEL}"/> &nbsp;
                 Fax: 
                <input type="text" size="24" name="res_fax" id="res_fax" value="{$RES_FAX}"/>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_FROM} :</td>
            <td class="dataField"><input type="text" name="company" id="company" size="50" value="{$FROM}"> </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_ATTN_NAME} :</td>
            <td class="dataField">
                <input type="text" name="attn_name" id="attn_name" value="{$ATTN_NAME}" size="30"/> &nbsp;&nbsp;&nbsp;
                <input data="Button=cleardata,selectdata|Module=Users|Fields=id,user_name,phone_work,email1|Inputs=attn_id,attn_name,attn_phone,attn_email" class="select" type="text" name="attn_phone" id="attn_phone" value="{$ATTN_PHONE}"/>
                <input type="hidden" name="attn_id" id="attn_id" value="{$ATTN_ID}"/>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_EMAIL} :</td>
            <td class="dataField"><input type="text" name="attn_email" id="attn_email" value="{$ATTN_EMAIL}" size="50"/></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_RES_TEL} :</td>
            <td class="dataField">
                <input type="text" size="24" name="attn_tel" id="attn_tel" value="{$TEL}"/> &nbsp;
                 {$MOD.LBL_RES_FAX} :
                <input type="text" size="24" name="attn_fax" id="attn_fax" value="{$FAX}"/> 
            </td>
        </tr>
        <tr>
            <td colspan="2" class="dataLabel"><h1 align="center"> <font size="8">{$MOD.LBL_TITLE}</font></h1></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_OPERATING_DATE} : 
            </td>
             <td class="dataField">
                <input type="text" name="date_time" id="date_time" value="{$DATE_TIME}">
                <input class="datePicker" id='operating_date' name='operating_date'  type="text" tabindex='1' size='15' maxlength='10' value="{$OPERATING_DATE}"/>   
            </td>
        </tr>
        <tr>
        <td class="dataLabel">{$MOD.LBL_MADE_TOUR} :<span class="required">*</span></td>
            <td class="dataField">
                
                <input data="Button=cleardata,selectdata|Module=GroupPrograms|Fields=id,groupprogram_code,countofcus|Inputs=groupprogr880erograms_ida,groupprogratbookings_name,quantity_pax" class="select" type="text" name="groupprogratbookings_name" id="groupprogratbookings_name" size="50" value="{$MADETOUR}"/>
                <input type="hidden" name="groupprogr880erograms_ida" id="groupprogr880erograms_ida" value="{$MADETOUR_ID}"/>
            </td>
        </tr>
        <tr>
        <td class="dataLabel">
            {$MOD.LBL_NATIONLITY} :
        </td>
        <td class="dataField">
            <select name="nationlity" name="nationlity">{$NATIONLITY} </select> 
        </td>
        </tr>
        <tr>
            <td class="dataLabel">
            {$MOD.LBL_QUANTITY_PAX} :
        </td>
            <td class="dataField">
                 <input type="text" id="quantity_pax" name="quantity_pax" size="50" value="{$QUANTITY_PAX}">
            </td>
        </tr>
        <tr>
        <td class="dataLabel">
            {$MOD.LBL_GUIDE} :
        </td>
            <td class="dataField"> 
                <input type="text" name="guide" id="guide" value="{$GUIDE}" size="40"/> 
                &nbsp;<input data="Button=cleardata,selectdata|Module=TravelGuides|Fields=id,name,phone|Inputs=guide_id,guide,guide_phone" class="select" type="text" name="guide_phone" id="guide_phone" value="{$GUIDE_PHONE}"/>
                <input type="hidden" name="guide_id" id="guide_id" value="{$GUIDE_ID}"> 
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <fieldset>
            <legend> {$MOD.LBL_BOOKING_LIST} </legend>
                <table class="table_clone" id="booking_line" cellpadding="0" cellspacing="0" border="0" width="100%">
                 <thead>
                    <tr>
                       <th>{$MOD.LBL_TIME}</th>
                       <th>{$MOD.LBL_QUANTITY}</th>
                       <th>{$MOD.LBL_UNIT_PRICE}</th>
                       <th>{$MOD.LBL_MENU}</th>
                    </tr>
                 </thead>
                 <tbody>
                 {if $ID eq '' or $RES_COUNT eq 0}
                    <tr>
                        <td class="dataField" align="center" valign="top">
                            <input type="text" name="date_booking_time[]" id="date_booking_time" size="35" value="">
                            <!--<input type="text" id='date_booking' size="7" name='date_booking[]' class="datetime" onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" />(dd/mm/yy)-->
                        </td>
                        <td class="dataField" align="center" valign="top"><input type="text" size="30" name="quantity[]" id="quantity" value=""/><input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"><input type="hidden" name="service_line_id[]" name="service_line_id" value=""></td>
                        <td class="dataField" align="center" valign="top"><input type="text" size="30" name="price[]" id="price" value=""/></td>
                        <td class="dataField" align="center" valign="middle">
                            <textarea cols="60" rows="10" id="menu" name="menu[]">{$MENU}</textarea> 
                        </td> 
                        <td class="dataField" valign="top"><input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button foodmenu" value='Select' name="btn_menu_nam[]" id="btn_menu_nam"></td>
                        <td class="dataField" align="center"> 
                            <input type="button" class="btnAddRow"  value="Add Row"/>
                            <input type="button" class="btnDelRow" value="Delete Row"/>
                        </td>
                    </tr>
                    {/if}
                    {$BOOKINGLINE}
                 </tbody>
                </table>
                </fieldset> 
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_GIA} :</td>
            <td class="dataField"><input type="text" name="gia" id="gia" value="{$GIA}"></td>
        </tr>
        <tr>
            <td colspan="2" class="dataField">
            <br/>
            <u>{$MOD.LBL_NOTES} :</u>
            <br/>
                <textarea cols="200" rows="8" id="notes" name="notes">{$NOTES}</textarea>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_CONFIRM} :</td>
            <td class="dataField"><input type="radio" name="confirm" value="1" {$YES} id="confirm" title="" />Yes <input type="radio" name="confirm" value="0" {$NO} id="confirm" title="" />No</td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DATE} :</td>
            <td class="dataField"><input id='date' name='date' class="datePicker"  type="text" tabindex='1' size='15' maxlength='10' value="{$DATE}"/> 
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DEADLINE} :</td>
            <td class="dataField"><input id='deadline' name='deadline' class="datePicker" type="text" tabindex='1' size='15' maxlength='10' value="{$DEADLINE}"/> 
            
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DEPARMENT} :</td>
            <td class="dataField"> <input type="text" name="deparment" id="deparment" size="35" value="{$DEPARMENT}"/>
            </td>
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