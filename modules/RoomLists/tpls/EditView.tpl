<html>
    <head>
        <title></title>
        <script type="text/javascript" src="custom/include/js/jquery.js"></script>
        <script type="text/javascript" src="modules/RoomLists/js/jquery.table.clone.js"></script>
        <script type="text/javascript" src="modules/RoomLists/js/RoomList.js"></script>
        <script type="text/javascript" src="modules/RoomLists/js/AjaxDatabase.js"></script>
    </head>
    <body>
        <form action="index.php" method="post" name="EditView" id="EditView">
            <input type="hidden"   name="module"         value="Roomlists">
            <input type="hidden"   name="record"         value="{$ID}">
            <input type="hidden"   name="isDuplicate" value="false">
            <input type="hidden"   name="action">
            <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
            <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
            <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
            <input type="hidden" name="contact_role">
            <input type="hidden" name="relate_to" value="Roomlists">
            <input type="hidden" name="relate_id" value="">
            <input type="hidden" name="offset" value="1">
            <input title="Save [Alt+S]" accessKey="S" class="button" onclick="this.form.action.value='Save';selectAllOptions(); check_form('EditView');" type="submit" name="button" value="Save"> 
            <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
                onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
                type="submit" name="button" value="{$APP.LBL_CANCEL_BUTTON_LABEL}"/>
            {if $ID neq ''}
            <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Roomlists", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
            {/if}
            <fieldset>
                <legend><h3>{$MOD.LBL_OVERVIEW}</h3></legend>
                <table width="100%" class="tabForm" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="dataLabel">{$MOD.LBL_DEPARTMENT} <span class="required">*</span></td>
                        <td class="dataField"><select name="department" id="department">{$department}</select>
                        <td class="dataLabel">&nbsp;</td>
                        <td class="dataField"> &nbsp;</td>                     
                    </tr>
                    <tr>
                        <td class="dataLabel">{$MOD.LBL_NAME} <span class="required">*</span></td>
                        <td class="dataField"><input type="text" name="name" id="name" size="35" value="{$name}"/>
                        <td class="dataLabel">{$MOD.LBL_MADETOUR} <span class="required">*</span> </td>
                        <td class="dataField"> 
                            <input type="text" name="made_tour" id="made_tour" size="35" value="{$made_tour}" />
                            <input type="hidden" name="made_tour_id" id="made_tour_id" class="made_tour_id" value="{$made_tour_id}">
                            {if $ID eq ''}<button title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                            tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group"
                            id="bnt_tour_name_group"
                            onclick='open_popup("GroupPrograms", 600, 400, "", true, false, {$made_tour_popup_request_data}, "single", true);'>
                        <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055"
                             alt=""></button>
                    <button title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                            tabindex='3' class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                            onclick='this.form.tour_name.value="";this.form.made_tour.value="";this.form.made_tour_id.value="";'>
                        <img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591"
                             alt=""></button> {/if}
                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">{if $ID eq ''} {$MOD.GET_LIST} <input type="checkbox" class="get_hotel_cus"> <span class="waitting"></span> {/if}</td>
                        <td class="dataLabel">&nbsp;</td>
                        <td class="dataLabel">&nbsp;</td>
                        <td class="dataLabel">&nbsp;</td>
                    </tr>
                    <tr>
                        {if $ID eq ''}<td class="dataLabel">{$MOD.LBL_LIST_HOTEL}</td>                                                           
                        <td class="dataField"> 
                            <select name="dsks" class="dsks" size="3"></select> 
                            <input type="button" name="AddHotel" class="AddHotel" value=">>">
                        </td>
                        {/if}
                        <td class="dataLabel">{$MOD.LBL_HOTEL_NAME}<span class="required">*</span></td>
                        <td class="dataField"><input type="text" name="tenks" id="tenks" class="tenks" size="35" value="{$tenks}"  /> <input type="hidden" name="ks_id" id="ks_id" class="ks_id" value="{$ks_id}">
                    </tr>
                    <tr class="inbound">
                        <td class="dataLabel inbound">{$MOD.LBL_PARTY_NAME}</td> 
                        <td class="dataField inbound"><input type="text" name="party_name" id="party_name" value="{$party_name}" size="35"></td>
                        <td class="dataLabel inbound">{$MOD.LBL_TOUR_GUIDE}</td> 
                        <td class="dataField inbound"><input type="text" name="tour_guide" id="tour_guide" value="{$tour_guide}" size="35"></td>
                    </tr>
                    <tr>    
                        <td>
                            {$MOD.LBL_ASSIGNED_TO_NAME}
                        </td>
                        <td>
                            <input class="sqsEnabled" tabindex="2" size="35" autocomplete="off" id="assigned_user_name" name="assigned_user_name"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$ASSIGNED_USER_NAME}"><input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
                                                        <button title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                            tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group"
                            id="bnt_tour_name_group"
                            onclick='open_popup("Users", 600, 400, "", true, false, {$user_popup_request_data}, "single", true);'>
                        <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055"
                             alt=""></button>
                    <button title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                            tabindex='3' class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                            onclick='this.form.tour_name.value="";this.form.assigned_user_name.value="";this.form.assigned_user_id.value="";'>
                        <img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591"
                             alt=""></button>

                        </td>
                        <td class="dataLabel"> &nbsp;</td>
                        <td class="dataLabel"> &nbsp;</td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend><h3>{$MOD.LBL_DETAIL}</h3></legend>
                <div class="tabForm">
                    <table width="100%" class="table_clone" id="chitiet">
                        <tbody>
                        {if $ID eq ''} 
                            <tr class="chitiet_row">
                                <td class="dataLabel">
                                    <fieldset>
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="dataField">{$MOD.LBL_ROOM_NAME} &nbsp; &nbsp; <input type="text" name="room_name[]" id="room_name" /></td>
                                                    <td class="dataField">{$MOD.LBL_ROOM_TYPE} &nbsp; &nbsp; <select name="room_type[]" id="room_type">{$room_type}</select></td>
                                                    <td class="dataField room_class">{$MOD.LBL_ROOM_CLASS} &nbsp; &nbsp; <input type="text" name="room_class[]" id="room_class" /></td>
                                                    <td class="dataField room_remark">{$MOD.LBL_ROOM_REMARK} &nbsp; &nbsp; <input type="text" name="room_remark[]" id="room_remark" /></td>
                                                    <!--<td class="dataField room_number">{$MOD.LBL_ROOM_NUMBER} &nbsp; &nbsp; <input type="text" name="room_number[]" id="room_number" /></td>-->
                                                    <td class="dataField room_note">{$MOD.LBL_ROOM_NOTE} &nbsp; &nbsp; <input type="text" name="room_note[]" id="room_note" /></td>
                                                    
                                                    <td class="dataField phidden" valign="middle">{$MOD.LIST_CUS}<select name="dskh" class="dskh" multiple="multiple" size="4"></select> <input type="button" class="addCus" value=">>"/></td>
                                                    <td><input type="button" class="return_cus" value="<<"> <select name="dskhtrongphong[]" class="dskhtrongphong" id="dskhtrongphong" multiple="multiple" size="4"> </select></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </fieldset>  
                                </td>
                                <td><input type="button" class="btnAddRow" value="Add row"/>  <input type="button" class="btnDelRow" value="Delete Row"></td>
                                
                            </tr>
                            {/if}
                            {$LIST_CUS_DETAIL} 
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <input title="Save [Alt+S]" accesskey="S" onclick="this.form.action.value='Save'; return selectAllOptions();" type="submit" name="button" value="Save">
            <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
                onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
                type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  "/>
            {if $ID neq ''}
            <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Roomlists", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
            {/if}
        </form>


    </body>
</html>
