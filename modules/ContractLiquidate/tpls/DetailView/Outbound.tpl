<link rel="stylesheet" type="text/css" href="modules/ContractLiquidate/css/ContractLiquidate.css">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <form action="index.php"  name="DetailView" id="DetailView" method="post">
        <input type="hidden"   name="module"         value="ContractLiquidate">
        <input type="hidden"   name="record"         value="{$ID}"> 
        <input type="hidden"   name="action">
        <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
        <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
        <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
        <tr>
            <td style="padding-bottom: 2px;">
                <input title="{$APP.LBL_EDIT_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='ContractLiquidate'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$ID}'; this.form.action.value='EditView'" 
                    type="submit" 
                    name="Edit" 
                    value="  {$APP.LBL_EDIT_BUTTON_LABEL}  "> 
                <input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='ContractLiquidate'; this.form.return_action.value='index'; this.form.isDuplicate.value=true; this.form.action.value='EditView'" 
                    type="submit" 
                    name="Duplicate" 
                    value=" {$APP.LBL_DUPLICATE_BUTTON_LABEL} "> 
                <input title="{$APP.LBL_DELETE_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='ContractLiquidate'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}')" 
                    type="submit" 
                    name="Delete" 
                    value=" {$APP.LBL_DELETE_BUTTON_LABEL} ">

                <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=ContractLiquidate", true, false,  ); return false;' type="submit" value="View Change Log">
                <input title="export to word" class="button" type="button" onclick="showPopup('doc');" value=" Export to Word" />
            </td> 
        </tr>
    </form>
</table>
<table cellpadding="0" cellpadding="0" border="0" width="100%" class="tabDetailView">
    <tr>
        <td class="tabDetailViewDF" colspan="4"><h1>THÔNG TIN CHUNG</h1></td>
    </tr>
        <tr>
        <td class="tabDetailViewDL">Số hợp đồng: </td>
        <td class="tabDetailViewDF"> {$NUMBER}</td>
        <td class="tabDetailViewDL">Hợp đồng gốc: </td>
        <td class="tabDetailViewDF"><a href="index.php?module=Contracts&action=DetailView&record={$CONTRACT_ID}">{$CONTRACT}</a></td> 
    </tr>
    <tr>
        <td class="tabDetailViewDL">Ngày:</td>
        <td class="tabDetailViewDF">{$DATE}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr> 
</table>                          
<table class="tabForm" width="100%" >
<tr>
<td>
<table class="table_content_detail" width="1024" cellpadding="0" cellspacing="0">


<tr align="center">
    <td class="td_content" width="304" rowspan="2"><b>Nội Dung</b></td>
    <td class="td_content" width="360" colspan="3"><b>Kế hoạch</b></td>
    <td class="td_content" width="360" colspan="3"><b>Thực tế</b></td>
</tr>
<tr align="center">
    <td class="td_content" width="120"><b>Đơn giá(USD)</b></td>
    <td class="td_content" width="120"><b>SL</b></td>
    <td class="td_content" width="120"><b>Thành tiền(USD)</b></td>
    <td class="td_content" width="120"><b>Đơn giá(USD)</b></td>
    <td class="td_content" width="120"><b>SL</b></td>
    <td class="td_content" width="120"><b>Thành tiền(USD)</b></td>
</tr>
<tr>
<td class="td_content" id="amount" colspan="7"><b>I/Tổng giá trị hợp đồng</b></td>
<!--<td class="td_content" id="amount" >&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>  -->

</tr>
 {$GIATRIHOPDONG}
<tr>
<td class="td_content" ><b>Tổng cộng</b></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay" ><p align="right">{$TONGCONG_CONTRACT_KEHOACH}</p></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="right">{$TONGCONG_CONTRACT_THUCTE}</p></td> 

</tr>
<tr>
<td class="td_content" id="amount"colspan="7"><b>II/Chi phí phát sinh tăng</b></td>
<!--<td class="td_content" id="amount" >&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>    -->

</tr>
{$PHATSINHTANG}
<tr>
<td class="td_content" ><b>Tổng cộng</b></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>    
<td class="td_content" id="amount_pay"><p align="right">{$TONGCONG_TANG_KEHOACH}</p></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="right">{$TONGCONG_TANG_THUCTE}</p></td>

</tr>
<tr>
<td class="td_content" id="amount"colspan="7"><b>III/Chi phí phát sinh giảm</b></td>
<!--<td class="td_content" id="amount" >&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>
<td class="td_content" id="amount">&nbsp;</td>-->  

</tr>
{$PHATSINHGIAM} 
<tr>
<td class="td_content" ><b>Tổng cộng</b></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="right">{$TONGCONG_GIAM_KEHOACH}</p></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="right">{$TONGCONG_GIAM_THUCTE}</p></td> 

</tr>
<tr>
<td class="td_content" ><b>Tổng giá trị Tour</b></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_tour"><p align="right">{$TONGTIEN_KEHOACH}</p></td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" >&nbsp;</td>
<td class="td_content" id="amount_tour"><p align="right">{$TONGTIEN_THUCTE}</p></td> 

</tr>
<tr>
<td class="td_content"><b>III/Số tiền bên B đã thanh toán cho bên A</b></td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="right">{$TIENTHANHTOAN}</p></td> 

</tr>
{if $TIENCONLAI > $TIENTRALAI}
<tr>
<td class="td_content"><b>VI/Số tiền bên B còn nợ bên A</b></td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="right">{$TIENCONLAI}</p></td>  
</tr>
{/if}
{if $TIENTRALAI > $TIENCONLAI }
<tr>
<td class="td_content"><b>VI/Số tiền bên A còn nợ bên B</b></td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content">&nbsp;</td>
<td class="td_content" id="amount_pay"><p align="right">{$TIENTRALAI}</p></td>
</tr>
{/if}
<tr>
    <td colspan="8" class="td_content" align="center">Bằng chữ : &nbsp;{$BANGCHU}&nbsp;đô la mỹ </td>
</tr>
</table>
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" class="tabForm" width="100%" border="0">
    <tr>
        <td class="tabDetailViewDL" width="20%">
            {$MOD.LBL_ASSIGNED_TO_NAME} :
        </td>
        <td class="tabDetailViewDF">{$ASSIGNED_USER_NAME} </td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
</table>