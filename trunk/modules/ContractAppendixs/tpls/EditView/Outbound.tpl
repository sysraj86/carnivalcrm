{literal}
<script type="text/javascript" src="custom/include/js/doctien.js"> </script> 
<script type="text/javascript" src="custom/include/js/jquery.js"> </script>    
<script type="text/javascript" src="custom/include/js/jquery.table.clone.js"> </script>
<script type="text/javascript" src="custom/include/js/ParentType.js"> </script>
<script type="text/javascript" scr="custom/include/js/popupRequest.js"></script>
<script type="text/javascript" src="modules/ContractAppendixs/js/calculating.js"></script>
<script type="text/javascript" src="custom/include/js/CustomDatePicker.js"></script>
<script type="text/javascript" src="custom/include/js/CustomSelectField.js"></script>
{/literal}

<form action="index.php"  name="EditView" id="EditView" method="post">
    <input type="hidden"   name="module"         value="ContractAppendixs">
    <input type="hidden"   name="record"         value="{$ID}"> 
    <input type="hidden"   name="action">
    <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
    <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
    <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
    <input type="hidden"   name="type"id="type"  value="{$TYPE}"/></td>
    <div class="container"> 
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
        {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Contracts", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
    </div>
    <table cellpadding="0" cellpadding="0" border="0" width="100%" class="tabForm">
        <tr>
            <td class="dataLabel">{$MOD.LBL_NUMBER}<span class="required">*</span>&nbsp;:</td>
            <td class="dataField"><input name="number" type="text" id="number" value="{$NUMBER}"/>
            
            <td class="dataLabel">{$MOD.LBL_CONTRACT}<span class="required">*</span> &nbsp;:</td>
            <td class="dataField"> 
            <input type="hidden" name="contract" id="contract" value="{$CONTRACT}">
            <input type="hidden" name="date_contract" id="date_contract" value="{$DATE_CONTRACT}"> 
            <input type="text" name="number_contract" id="number_contract" value="{$NUMBER_CONTRACT}">
            <input type="button" name="btn_contract" id="btn_contract" value="Select" class="button contract"> 
            
            </td>
        </tr>
        <tr>
             <td class="dataLabel">{$MOD.LBL_DATE_OF_CONTRACTS} &nbsp;<span class="required">*</span> &nbsp;:</td>
             <td class="dataField"><input class="datePicker" id='date' name='date' align="absmiddle"></td>
             <td class="dataLabel">&nbsp;</td> 
             <td class="dataField">&nbsp;</td> 
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_CONTRACT_PARENT_TYPE}:</td>
            <td class="dataField">
                <select id="parent_type" class="parent_type" name="parent_type">{$PARENT_TYPE}</select>
            </td>
        </tr>
        <tr>    
            <td colspan="2" > <b>{$MOD.LBL_BENA}</b> </td>
            <td class="dataLabel">&nbsp;</td>
            <td class="dataField">&nbsp;</td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DO}<span class="required">*</span>:</td>
            <td class="dataField"> <select id="salutation_a" name="salutation_a" >{$SALUTATION_A}</select>
            <input type="text" data="Button=cleardata,selectdata|Module=Users|Fields=full_name|Inputs=daidienbena" class="select" name="daidienbena" id="daidienbena" size="35" value="{$DAIDIENBENA}" />
            <!--<input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button daidienbena" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_daidienbena" id="bnt_daidienbena">-->  
            </td>
            <td class="dataLabel"> {$MOD.LBL_CHUCVU}:   </td>
            <td class="dataField"><select id="position_a" name="position_a" >{$POSITION_A}</select></td>
        </tr>
        <tr>
            <td class="dataLabel"> {$MOD.LBL_ADDRESS}:</td> 
            <td> <textarea name="address_a" id="address_a" cols="50" rows="3">{$ADDRESS_A}</textarea></td>
            <td class="dataLabel"> {$MOD.LBL_PHONE}:</td> 
            <td> <input name="phone_a" id="phone_a" type="text" value="{$PHONE_A}"  size="35"/> </td>
        </tr>
        <tr>
            <td class="dataLabel"> {$MOD.LBL_FAX}:</td> 
            <td > <input name="fax" id="fax" type="text" value="{$FAX}"  size="35"/> </td> 
            <td class="dataLabel"> {$MOD.LBL_TAX}:</td> 
            <td> <input name="mst_bena" id="mst_bena" value="{$MST_BENA}" type="text"  size="35" /> </td>  
        </tr>
        
        <tr>
            <td> <b>{$MOD.LBL_BEN_B} </b><span class="required">*</span>:</td>
            <td class="dataField">
                <input type="text" name="parent_name" id="parent_name" size="40" value="{$PARENT_NAME}"/>
                <input type="hidden" name="parent_id" name="parent_id" value="{$PARENT_ID}">
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button parent_name" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_parent_name" id="bnt_parent_name">  
            </td>
        </tr>

        <tr class="hopdongdichvu">
        <td class="dataLabel hopdongdichvu" >{$MOD.LBL_DO}<span class="required">*</span>: </td>
        <td class="dataField hopdongdichvu"> 
        <select id="salutation_b" name="salutation_b" >{$SALUTATION_B}</select>
        <input name="daidienbenb_name" id="daidienbenb_name" type="text"  size="35" value="{$DAIDIENBENB_NAME}"/>
        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button daidienbenbname" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_daidienbenb" id="bnt_daidienbenb">  
        </td>
        <td class="dataLabel hopdongdichvu">{$MOD.LBL_CHUCVU}: </td>
        <td class="dataField hopdongdichvu"><select id="position_b" name="position_b" >{$POSITION_B}</select></td>
        </tr>
        <tr>
            <td class="dataLabel"> {$MOD.LBL_ADDRESS}:</td>                    
            <td class="dataField"> <textarea name="address_b" id="address_b" cols="50" rows="3">{$ADDRESS_B}</textarea> </td>
            <td class="dataLabel">{$MOD.LBL_PHONE}:</td>
        <td class="dataField"><input name="phone_b" id="phone_b" size="35" type="text" value="{$PHONE_B}"/> </td>
        </tr>

        <tr class="hopdongdichvu">
        <td class="dataLabel">{$MOD.LBL_BANK_ACCOUNT}:</td>
        <td class="dataField"><input type="text" name="sotaikhoanbenb" id="sotaikhoanbenb" value="{$SOTAIKHOANBENB}"></td>
        <td class="dataLabel"> {$MOD.LBL_TAX}: </td>
        <td class="dataField"> <input name="mst_benb" id="mst_benb" size="35" type="text" value="{$MST_BENB}" /></td>
        </tr>
        
        <tr class="travelguide">
        <td class="dataLabel">{$MOD.LBL_NGAYSINH}:</td>
        <td class="dataField"><input class="datePicker" type="text" name="birthday" id="birthday" value="{$BIRTHDAY}"/></td>
        <td class="dataLabel">{$MOD.LBL_SOHOCHIEU}:</td>
        <td class="dataField"><input type="text" name="passport_no_guide" id="passport_no_guide" value="{$PASSPORT}"></td>
        </tr>
        <tr class="travelguide"> 
        <td class="dataLabel">{$MOD.LBL_NGAYCAP}:</td>
        <td class="dataField"><input class="datePicker" type="text" name="date_issued_guide" id="date_issued_guide" value="{$DATE_ISSUED}"/></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataField">&nbsp;</td>
        </tr>
        
        
    </table>  
     
    
    
    <table class="tabForm" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td colspan="4" class="dataLabel"><b>{$MOD.LBL_DIEUKHOAN_TITLE}:</b></td>
        </tr>
        <tr><td colspan="4">
              
            <p><b>I/&nbsp;&nbsp;{$MOD.LBL_DIEUKHOAN_TITLE1} :
            <input type="text" name="tour" id="tour" size="40" value="{$TOUR}"/>
            <input type="hidden" name="tour_id" id="tour_id" value="{$TOUR_ID}"/>
            <input type="button" name="btn_tour" id="btn_tour" value="Select" class="button tour">
              &nbsp; {$MOD.LBL_DIEUKHOAN_TITLE2}: 
            </b></p>
        </td>
        </tr>
        
        <tr>
            <td colspan="4">
                <table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse:collapse" class="table_clone" id="giatrihopdong">
                    <thead>
                        <tr bgcolor="#CCCCCC">
                            <th align="center">{$MOD.LBL_DICHVU}</th>
                            <th align="center">{$MOD.LBL_SOLUONG}</th>
                            <th align="center">{$MOD.LBL_DONGIA}</th>
                            <th align="center">{$MOD.LBL_THUE}</th>
                            <th align="center">{$MOD.LBL_THANHTIEN}</th>
                            <th align="center">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        {if $ID eq '' or $CONTRACT_VALUE_COUNT eq 0}
                        <tr>
                            <td align="center"> 
                                <input name="service[]" type="text" id="service" value="{$SERVICE}" />
                            </td>
                            <td align="center">
                                <input name="num_of_service[]" type="text" id="num_of_service" class="tinhtoan" value="{$NUMOFSERVICE}" />
                            </td>
                            <td align="center">
                                <input name="unit[]" type="text" id="unit" class="tinhtoan " value="{$UNIT}" /> USD
                            </td>
                            <td align="center">
                                <input name="thue[]" type="text" id="thue" class="tinhtoan" value="{$THUE}" />  USD
                            </td>
                            <td align="center">
                                <input readonly="readonly" name="thanhtien[]" type="text" id="thanhtien" class="tinhtoan thanhtien" value="{$THANHTIEN}"  /> USD
                                <input type="hidden" name="contract_appendixs_value_id[]" id="contract_appendixs_value_id" value=""/> <input type="hidden" name="deleted[]" id="deleted" value="0"/>
                            </td>
                            <td align="center">
                                <input type="button" class="btnAddRow
                                " value="Add row" />
                                <input type="button"  class="btnDelRow" value="Delete row" />
                            </td>
                        </tr>
                        <br/>
                        {/if}
                        {$CONTRACT_VALUES}
                    </tbody>
                </table>

            </td>
        </tr>
        <tr>
            <td align="right" width="25%"> {$MOD.LBL_TONGCONG}: &nbsp;</td>   
            <td colspan="3" class="dataField" align="left"><input readonly="readonly" name="tongtien" type="text" id="tongtien" value="{$TONGTIEN}"  /> USD</td>   
        </tr>
        <tr>
            <td align="right" width="25%"> {$MOD.LBL_BANGCHU}: &nbsp;</td>   
            <td colspan="3" class="dataField" align="left"><input name="bangchu" type="text" readonly="readonly" size="90" id="bangchu" value="{$BANGCHU}" /> USD </td>
        </tr>
        <tr>
            <td align="right" width="25%"> {$MOD.LBL_TUONGDUONG}: &nbsp;</td>   
            <td class="dataField">
               <input readonly="readonly" name="tongtien_" type="text" id="tongtien_" value="{$TONGTIEN}"  /><span><b>X</b></span> <input name="tigia" type="text" size="30" id="tigia" value="{$TIGIA}" /><span><b>=</b></span> <input name="tongtien2" type="text" size="30" id="tongtien2" value="" /> <select class="tiente" id="tiente" name="tiente">{$TIENTE}</select>
            </td>
        </tr>
        
        
    </table>
    <div class="tabForm">
        <p><b>II/ {$MOD.LBL_DIEUKHOANTHANHTOAN}:</b> 
        </p>
    </div>
    <table class="tabForm" cellpadding="0" cellspacing="0" border="0" width="100%">
        
        <tr>
            <td class="dataField" colspan="4">
                <fieldset>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table_clone" id="dieukhoanthanhtoan">
                        <tbody>
                            {if $ID eq '' or $CONTRACT_CONDITION_LINE_COUNT eq 0}
                            <tr>
                                <td>
                                    <fieldset>
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tabForm"> 
                                            <tr>
                                                <td>
                                                    <input name="dotthanhtoan[]" id="dotthanhtoan" type="text" value="{$DOTTHANHTOAN}"/> {$MOD.LBL_DIEUKHOAN_TITLE3}: 
                                                    <input name="phantram[]" id="phantram" class="percent" type="text" value="{$PHANTRAM}"/> % {$MOD.LBL_DIEUKHOAN_TITLE4}
                                                    <input name="tienthanhtoan[]" type="text" readonly="readonly"  id="tienthanhtoan" value="{$TIENTHANHTOAN}"/>
                                                    <select name="tiente_thanhtoan[]" class="tientethanhtoan" id="tiente_thanhtoan">{$TIENTE2}</select> <br />
                                                    <input type="hidden" name="contract_condition_id[]" id="contract_condition_id" value=""/>  <input type="hidden" name="deleted[]" id="deleted" value="0"/>
                                                    {$MOD.LBL_BANGCHU}: <input name="in_word[]" type="text" readonly="readonly" id="in_word" value="{$BANGCHU1}"  size="90"/>
                                                </td>
                                            </tr>
                                        </table>
                                    </fieldset>
                                </td>
                                <td>
                                    <input  type="button" class="btnAddRow" value="Add row" />
                                    <input  type="button" class="btnDelRow" value="Delete" />
                                </td>
                            </tr>
                            {/if}
                            {$CONTRACT_CONDITIONS}
                        </tbody>
                    </table>
                </fieldset>
            </td>
        </tr>
        
    </table> 
    </div>

    <fieldset>
        <legend>{$MOD.LBL_TEMPLATE} :</legend>
        <table class="tabForm" width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td class="dataField"><select name="template_ddown_c[]" id="template_ddown_c" multiple="multiple">{$TEMPLATE} </select></td>
            </tr>
        </table>
    </fieldset> 
    <table cellpadding="0" cellspacing="0" class="tabForm" width="100%" border="0">
        <tr>
            <td class="dataLabel" width="20%">
                {$MOD.LBL_ASSIGNED_TO_NAME} :
            </td>
            <td class="dataField" width="30%">
                <input class="sqsEnabled" tabindex="2" autocomplete="off" size="50" id="assigned_user_name" name="assigned_user_name"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$ASSIGNED_USER_NAME}">
                <input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name=btn1
                    onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_users_popup_request_data});' />
            </td>
            <td class="dataLabel">&nbsp;</td>
            <td class="dataField">&nbsp;</td>
        </tr>
    </table>
    <div class="container"> 
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}">
        {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Contracts", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
    </div>
</form>
