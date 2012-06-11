<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <form action="index.php"  name="DetailView" id="DetailView" method="post">
        <input type="hidden"   name="module"         value="ContractAppendixs">
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
                    onclick="this.form.return_module.value='ContractAppendixs'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$ID}'; this.form.action.value='EditView'" 
                    type="submit" 
                    name="Edit" 
                    value="  {$APP.LBL_EDIT_BUTTON_LABEL}  "> 
                <input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='ContractAppendixs'; this.form.return_action.value='index'; this.form.isDuplicate.value=true; this.form.action.value='EditView'" 
                    type="submit" 
                    name="Duplicate" 
                    value=" {$APP.LBL_DUPLICATE_BUTTON_LABEL} "> 
                <input title="{$APP.LBL_DELETE_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='ContractAppendixs'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}')" 
                    type="submit" 
                    name="Delete" 
                    value=" {$APP.LBL_DELETE_BUTTON_LABEL} ">

                <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=ContractAppendixs", true, false,  ); return false;' type="submit" value="View Change Log">
                <input title="export to word" class="button" type="button" onclick="showPopup('doc');" value=" Export to Word" />
            </td>
            <td align='right'>{$ADMIN_EDIT}</td> 
        </tr>
    </form>
</table>
<table cellpadding="0" cellpadding="0" border="0" width="100%" class="tabDetailView">
    <tr>
        <td class="tabDetailViewDF" colspan="4"><h1>THÔNG TIN CHUNG</h1></td>
    </tr>
        <tr>
        <td class="tabDetailViewDL" align="center">Hợp đồng gốc: </td>
        <td class="tabDetailViewDF"><a href="index.php?module=Contracts&action=DetailView&record={$CONTRACT}">{$CONTRACT_NUMBER}</a></td> 
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">Số hợp đồng: </td>
        <td class="tabDetailViewDF"> {$NUMBER}</td> 
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Ngày:</td>
        <td class="tabDetailViewDF">{$DATE}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" > <b>BÊN A: </b> </td>
        <td class="tabDetailViewDF"> <b>CÔNG TY TNHH MỘT THÀNH VIÊN DV DL LỄ HỘI (CARNIVAL)</b></td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Do: </td>
        <td class="tabDetailViewDF">{$SALUTATION} {$DAIDIENBENA}  </td>
        <td class="tabDetailViewDL">Chức vụ:  </td>
        <td class="tabDetailViewDF">{$POSITION_A}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Địa chỉ:</td> 
        <td class="tabDetailViewDF"> {$ADDRESS_A}</td>
        <td class="tabDetailViewDL"> Điện thoại:</td> 
        <td class="tabDetailViewDF"> {$PHONE_A} </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Fax:</td> 
        <td class="tabDetailViewDF"> {$FAX} </td>
        <td class="tabDetailViewDL"> MST:</td>
        <td class="tabDetailViewDF"> {$MST_BENA} </td> 
    </tr>

    <tr>
        <td class="tabDetailViewDL"> <b>BÊN B </b>:</td>
        <td class="tabDetailViewDF">
             <a href="index.php?module={$PARENT}&action=DetailView&record={$PARENT_ID}">{$PARENT_NAME}</a>
        </td>
    </tr>
    {if $PARENT eq 'Accounts' or $PARENT eq 'FITs' or $PARENT eq 'Restaurants' or $PARENT eq 'Hotels' or $PARENT eq 'Transports'}
    <tr>
        <td class="tabDetailViewDL" > Do: </td>
        <td class="tabDetailViewDF">{$SALUTATION_B} {$DAIDIENBENB_NAME}
        </td>
        <td class="tabDetailViewDL">Chức vụ: </td>
        <td class="tabDetailViewDF">{$POSITION_B}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Địa chỉ:</td>                    
        <td class="tabDetailViewDF"> {$ADDRESS_B}</td>
        <td class="tabDetailViewDL">Điện thoại</td>
        <td class="tabDetailViewDF">{$PHONE_B}</td>
    </tr>

    <tr class="hopdongdichvu">
        <td class="tabDetailViewDL">Số tài khoản:</td>
        <td class="tabDetailViewDF">{$SOTAIKHOANBENB}</td>
        <td class="tabDetailViewDL"> MST: </td>
        <td class="tabDetailViewDF"> {$MST_BENB}</td>
    </tr>

    {/if}
    {if $PARENT eq 'TravelGuides'}
    <tr class="travelguide">
    <td class="tabDetailViewDL">Ngày sinh</td>
    <td class="tabDetailViewDF">{$BIRTHDAY}</td>
    <td class="tabDetailViewDL">Số hộ chiếu</td>
    <td class="tabDetailViewDF">{$PASSPORT}</td>
    </tr>
    {/if}
    <tr>
    {if $PARENT eq 'TravelGuides'}
        <td class="tabDetailViewDL travelguide">Ngày cấp</td>
        <td class="tabDetailViewDF travelguide">{$DATE_ISSUED}</td>
    {/if}
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    
</table>                          
{if $PARENT eq 'Accounts' or $PARENT eq 'FITs' or $PARENT eq 'Restaurants' or $PARENT eq 'Hotels' or $PARENT eq 'Transports'}
<div class="hopdongdichvu" class="tabDetailView">
    <table cellpadding="0" cellspacing="0" class="tabDetailView" border="0" width="100%">
       <tr>
            <td colspan="4" class="dataLabel"><b>Sau khi bàn bạc thỏa thuận, hai bên cùng thống nhất thực hiện các điều khoản sau:  </b></td>
        </tr>
        <tr><td colspan="4" class="dataLabel">
              
            <p><b>I/&nbsp;&nbsp;Bên B có nhu cầu phát sinh trong Tour :
            <a href="index.php?module=GroupPrograms&action=DetailView&record={$TOUR_ID}">{$TOUR}</a>
              &nbsp; với nội dung như sau : 
            </b></p>
        </td>
        </tr>
        <tr>
            <td colspan="4">
                <table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse:collapse" class="table_clone" id="giatrihopdong">
                    <thead>
                        <tr bgcolor="#CCCCCC">
                            <th align="center">Dịch vụ</th>
                            <th align="center">Số lượng</th> 
                            <th align="center">Đơn giá</th>
                            <th align="center">Thuế</th>
                            <th align="center">Thành tiền</th>
                            <th align="center">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        {$CONTRACT_VALUES}
                    </tbody>
                </table>

            </td>
        </tr>
        <tr>
            <td align="right" width="25%"> Tổng cộng: &nbsp;</td>   
            <td colspan="3" class="dataField" align="left">{$TONGTIEN}&nbsp;USD</td>   
        </tr>
        <tr>
            <td align="right" width="25%"> Bằng chữ : &nbsp;</td>   
            <td colspan="3" class="dataField" align="left">{$BANGCHU}&nbsp; USD </td>
        </tr>
        
    </table>
    <div class="tabForm">
        <p><b>II/ &nbsp;&nbsp;Điều khoản thanh toán :</b> 
        </p>
    </div>
    <table class="tabDetailView" cellpadding="0" cellspacing="0" border="0" width="100%">
        
        <tr>
            <td class="tabDetailViewDF" colspan="4">
                <fieldset>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" id="dieukhoanthanhtoan">
                        <tbody>
                        <tr>
                        <td style="font-size: 14px;"></td>
                        </tr>
                            {$CONTRACT_CONDITIONS}
                        </tbody>
                    </table>
                </fieldset>
            </td>
        </tr>
        
    </table> 
</div>
{/if}
{if $PARENT eq 'TravelGuides'}
<div class="travelguide" {if $ID eq ''} style="display: none;" {/if}>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tabDetailView">
    <tr>
        <td class="tabDetailViewDL">Tên tour </td>
        <td class="tabDetailViewDF">
            <a href="index.php?module=GroupPrograms&action=DetailView&record={$TOUR_ID}">{$TOUR_NAME}</a>
        </td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Từ ngày</td>
        <td class="tabDetailViewDF">{$START_DATE}</td>
        <td class="tabDetailViewDL">Đến ngày</td>
        <td class="tabDetailViewDF">{$END_DATE}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Hành trình</td>
        <td class="tabDetailViewDF">{$JOURNEY}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" colspan="2">Quyền lợi : Bên B được hưởng khoản công tác phí:</td>
        <td class="tabDetailViewDF" colspan="2">{$BONUS}{$GUIDE_CURRENCY} {$GUIDE_NUM_OF_DATE} {$TOTAL_BONUS} <label class="currency">{$CURRENCY}</label></td>
    </tr>
    <tr>
        <td align="center" colspan="4">{$GUIDE_INWORD}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Ngày hết hạn hợp đồng</td>
        <td class="tabDetailViewDF">{$EXPIRATION_DATE}</td>
    </tr>
</table>
</div>
{/if} 
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