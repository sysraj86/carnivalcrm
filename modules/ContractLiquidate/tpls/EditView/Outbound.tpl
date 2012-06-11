
{literal}  
<link rel="stylesheet" type="text/css" href="modules/ContractLiquidate/css/ContractLiquidate.css">
<script type="text/javascript" src="custom/include/js/doctien.js"> </script> 
<script type="text/javascript" src="custom/include/js/jquery.js"> </script>    
<script type="text/javascript" src="custom/include/js/jquery.table.clone.js"> </script>
<script type="text/javascript" src="custom/include/js/ParentType.js"> </script>
<script type="text/javascript" scr="custom/include/js/popupRequest.js"></script>
<script type="text/javascript" src="include/javascript/popup_parent_helper.js?s={SUGAR_VERSION}&c={JS_CUSTOM_VERSION}"></script>
<script type="text/javascript" src="modules/ContractLiquidate/js/caculating.js"></script>
<script type="text/javascript">

    

    Calendar.setup ({ {/literal}
        inputField : "date",daFormat : "%d/%m/%Y",button : "date_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
    {literal} });addToValidate('EditView', 'expiration', 'date', false,'expiration' );
</script>
{/literal}

<form action="index.php"  name="EditView" id="EditView" method="post">
    <input type="hidden"   name="module"         value="ContractLiquidate">
    <input type="hidden"   name="record"         value="{$ID}"> 
    <input type="hidden"   name="action">
    <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
    <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
    <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
    <input type="hidden"   name="type"  value="Outbound">
    <div class="container"> 
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
        {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=ContractLiquidate", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
    </div>
    <table cellpadding="0" cellpadding="0" border="0" width="100%" class="tabForm">
        <tr>
            <td class="dataLabel">Số&nbsp;<span class="required">*</span>&nbsp;:</td>
            <td class="dataField"><input name="number" type="text"  id="number" value="{$NUMBER}"/>
            <input type="hidden" id="type" name="type" value="{$TYPE}"/></td>
            <td class="dataLabel">Hợp đồng gốc &nbsp;<span class="required">*</span> &nbsp;:</td>
            <td class="dataField"> 
            <input type="text" name="contract" id="contract" value="{$CONTRACT}">
            <input type="hidden" name="contract_id" id="contract_id" value="{$CONTRACT_ID}">
            <input type="button" name="btn_contract" id="btn_contract" value="Select" class="button contract">         
            </td>
        </tr>
        <tr>
            <td class="dataLabel">Ngày :</td>
            <td class="dataField"><input id='date' name='date' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$DATE}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="date_trigger" align="absmiddle"> (dd/mm/yy) </td>
            <td class="dataLabel"></td>
            <td class="dataField"></td>
        </tr>
    
     </table>
    <div class="tabForm">
        <p><b>{$MOD.LBL_CONTENT} :</b></p>
    </div>
    


<table class="tabForm" width="100%" >
<tr>
<td>
<table class="table_content" width="1024" cellpadding="0" cellspacing="0">


<tr align="center">
    <td class="td_content" width="324" rowspan="2"><b>Nội Dung</b></td>
    <td class="td_content" width="300" colspan="3"><b>Kế hoạch</b></td>
    <td class="td_content" width="300" colspan="3"><b>Thực tế</b></td>
    <td class="td_content" width="100">&nbsp;</td>
</tr>
<tr align="center">
    <td class="td_content" width="100"><b>Đơn giá(USD)</b></td>
    <td class="td_content" width="100"><b>SL</b></td>
    <td class="td_content" width="100"><b>Thành tiền(USD)</b></td>
    <td class="td_content" width="100"><b>Đơn giá(USD)</b></td>
    <td class="td_content" width="100"><b>SL</b></td>
    <td class="td_content" width="100"><b>Thành tiền(USD)</b></td>
    <td class="td_add_del" width="100"> &nbsp;</td>
</tr>
<tr>
<td class="td_content" id="amount" colspan="7"><b>I/Tổng giá trị hợp đồng</b></td>
<!--<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>-->
<td class="td_add_del" >&nbsp;</td>

</tr>
<tr>
<td  colspan="8">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table_clone" id="giatrihopdong">
        <tbody>
        {if $ID eq '' or $GIATRIHOPDONG_COUNT eq 0} 
            <tr>
                <td class="td_row" width="324"><p align="center"><input size="57" type="text" name="contract_value_name[]" id="contract_value_name">
                <input type="hidden" name="contract_value_id[]" id="contract_value_id">
                <input type="hidden" name="deleted[]" id="deleted"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" value="0" size="10" type="text" name="contract_dongia_kehoach[]" id="contract_dongia_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" value="0" size="10" type="text" name="contract_soluong_kehoach[]" id="contract_soluong_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" value="0" readonly="readonly" size="10" type="text" name="contract_thanhtien_kehoach[]" id="contract_thanhtien_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" value="0" size="10" type="text" name="contract_dongia_thucte[]" id="contract_dongia_thucte"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" value="0" size="10" type="text" name="contract_soluong_thucte[]" id="contract_soluong_thucte"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" value="0" readonly="readonly" size="10" type="text" name="contract_thanhtien_thucte[]" id="contract_thanhtien_thucte"></p></td>
                <td class="td_add_del" align="center" width="100">
                     <input  type="button" class="btnAddRow" value="Add" />
                     <input  type="button" class="btnDelRow" value="Del" />
                </td>
            </tr>
           {/if}
           {$GIATRIHOPDONG} 
        </tbody>
    </table> 
 </td>
</tr>
<tr>
<td class="td_content" ><b>Tổng cộng</b></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input readonly="readonly" size="10" type="text" name="tongcong_contract_kehoach" id="tongcong_contract_kehoach" value="{$TONGCONG_CONTRACT_KEHOACH}"></p></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input readonly="readonly" size="10" type="text" name="tongcong_contract_thucte" id="tongcong_contract_thucte" value="{$TONGCONG_CONTRACT_THUCTE}"></p></td>
<td class="td_add_del">&nbsp;</td> 

</tr>
<tr>
<td class="td_content" id="amount" colspan="7"><b>II/Chi phí phát sinh tăng</b></td>
<!--<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>  -->
<td class="td_add_del">&nbsp;</td>

</tr>
<tr>
<td colspan="8">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table_clone" id="phatsinhtang">
        <tbody>
        {if $ID eq '' or $PHATSINHTANG_COUNT eq 0}
             <tr>
                <td class="td_row" width="324"><p align="center"><input size="57" type="text" name="phatsinhtang_name[]" id="phatsinhtang_name">
                <input type="hidden" name="phatsinhtang_id[]" id="phatsinhtang_id">
                <input type="hidden" name="deleted[]" id="deleted"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" value="0" size="10" type="text" name="phatsinhtang_dongia_kehoach[]" id="phatsinhtang_dongia_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" value="0" size="10" type="text" name="phatsinhtang_soluong_kehoach[]" id="phatsinhtang_soluong_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" value="0" readonly="readonly" size="10" type="text" name="phatsinhtang_thanhtien_kehoach[]" id="phatsinhtang_thanhtien_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" value="0" size="10" type="text" name="phatsinhtang_dongia_thucte[]" id="phatsinhtang_dongia_thucte"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" value="0" size="10" type="text" name="phatsinhtang_soluong_thucte[]" id="phatsinhtang_soluong_thucte"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" value="0" readonly="readonly" size="10" type="text" name="phatsinhtang_thanhtien_thucte[]" id="phatsinhtang_thanhtien_thucte"></p></td>
                <td class="td_add_del" align="center" width="100">
                     <input  type="button" class="btnAddRow" value="Add" />
                     <input  type="button" class="btnDelRow" value="Del" />
                </td>
            </tr>
        {/if}
        {$PHATSINHTANG}
        </tbody>
    </table> 
 </td>

</tr>
<tr>
<td class="td_content" ><b>Tổng cộng</b></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input readonly="readonly" size="10" type="text" name="tongcong_tang_kehoach" id="tongcong_tang_kehoach" value="{$TONGCONG_TANG_KEHOACH}"></p></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input readonly="readonly" size="10" type="text" name="tongcong_tang_thucte" id="tongcong_tang_thucte" value="{$TONGCONG_TANG_THUCTE}"></p></td>
<td class="td_add_del">&nbsp;</td> 

</tr>
<tr>
<td class="td_content" id="amount" colspan="7"><b>III/Chi phí phát sinh giảm</b></td>
<!--<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>-->
<td class="td_add_del">&nbsp;</td>  

</tr>
<tr>
<td colspan="8">
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table_clone" id="phatsinhgiam">
        <tbody>
        {if $ID eq '' or $PHATSINHGIAM_COUNT eq 0}
             <tr>
                <td class="td_row" width="324"><p align="center"><input size="57" type="text" name="phatsinhgiam_name[]" id="phatsinhgiam_name">
                <input type="hidden" name="phatsinhgiam_id[]" id="phatsinhgiam_id">
                <input type="hidden" name="deleted[]" id="deleted"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" value="0"  size="10" type="text" name="phatsinhgiam_dongia_kehoach[]" id="phatsinhgiam_dongia_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" value="0" size="10" type="text" name="phatsinhgiam_soluong_kehoach[]" id="phatsinhgiam_soluong_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" value="0" readonly="readonly" size="10" type="text" name="phatsinhgiam_thanhtien_kehoach[]" id="phatsinhgiam_thanhtien_kehoach"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" value="0" size="10" type="text" name="phatsinhgiam_dongia_thucte[]" id="phatsinhgiam_dongia_thucte"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" value="0" size="10" type="text" name="phatsinhgiam_soluong_thucte[]" id="phatsinhgiam_soluong_thucte"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" value="0" readonly="readonly" size="10" type="text" name="phatsinhgiam_thanhtien_thucte[]" id="phatsinhgiam_thanhtien_thucte"></p></td>
                <td class="td_add_del" align="center" width="100">
                     <input  type="button" class="btnAddRow" value="Add" />
                     <input  type="button" class="btnDelRow" value="Del" />
                </td>
            </tr>
        {/if}
        {$PHATSINHGIAM}
        </tbody>
    </table> 
 </td>

</tr>
<tr>
<td class="td_content" ><b>Tổng cộng</b></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input readonly="readonly" size="10" type="text" name="tongcong_giam_kehoach" id="tongcong_giam_kehoach" value="{$TONGCONG_GIAM_KEHOACH}"></p></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input readonly="readonly" size="10" type="text" name="tongcong_giam_thucte" id="tongcong_giam_thucte" value="{$TONGCONG_GIAM_THUCTE}"></p></td>
<td class="td_add_del">&nbsp;</td> 

</tr>
<tr>
<td class="td_content" ><b>Tổng giá trị Tour</b></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_tour"><p align="center"><input readonly="readonly" size="10" type="text" name="tongtien_kehoach" id="tongtien_kehoach" value="{$TONGTIEN_KEHOACH}"></p></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_tour"><p align="center"><input readonly="readonly" size="10" type="text" name="tongtien_thucte" id="tongtien_thucte" value="{$TONGTIEN_THUCTE}"></p></td> 
<td class="td_add_del">&nbsp;</td>

</tr>
<tr>
<td class="td_content"><b>III/Số tiền bên B đã thanh toán cho bên A</b></td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input class="thanhtoan" size="10" type="text" name="tienthanhtoan" id="tienthanhtoan"  value="{$TIENTHANHTOAN}"></p></td>
<td class="td_add_del">&nbsp;</td> 

</tr>
<tr>
<td class="td_content"><b>VI/Số tiền bên B còn nợ bên A</b></td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input readonly="readonly" size="10" type="text" name="tienconlai" id="tienconlai"  value="{$TIENCONLAI}"></p></td>
<td class="td_add_del">&nbsp;</td>  

</tr>
<tr>
<td class="td_content"><b>VI/Số tiền bên A còn nợ bên B</b></td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="center"><input readonly="readonly" size="10" type="text" name="tientralai" id="tientralai"  value="{$TIENTRALAI}"></p></td>
<td class="td_add_del">&nbsp;</td> 

</tr>
<tr>
    <td colspan="8" class="td_content" align="center">Bằng chữ : &nbsp;<input name="bangchu" type="text" size="90" id="bangchu" value="{$BANGCHU}" /> USD </td>
</tr>
</table>
</td>
</tr>
</table>

  <br /><br /><br />

    
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
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=ContractLiquidate", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
    </div>
</form>
