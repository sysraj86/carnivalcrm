<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <form action="index.php"  name="DetailView" id="DetailView" method="post">
        <input type="hidden"   name="module"         value="Contracts">
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
                    onclick="this.form.return_module.value='Contracts'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$ID}'; this.form.action.value='EditView'" 
                    type="submit" 
                    name="Edit" 
                    value="  {$APP.LBL_EDIT_BUTTON_LABEL}  "> 
                <input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='Contracts'; this.form.return_action.value='index'; this.form.isDuplicate.value=true; this.form.action.value='EditView'" 
                    type="submit" 
                    name="Duplicate" 
                    value=" {$APP.LBL_DUPLICATE_BUTTON_LABEL} "> 
                <input title="{$APP.LBL_DELETE_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='Contracts'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}')" 
                    type="submit" 
                    name="Delete" 
                    value=" {$APP.LBL_DELETE_BUTTON_LABEL} ">

                <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Contracts", true, false,  ); return false;' type="submit" value="View Change Log">
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
        <td class="tabDetailViewDL">Tháng:</td>
        <td class="tabDetailViewDF">{$MONTH}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Năm:</td>
        <td class="tabDetailViewDF">{$YEAR}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" > <b>BÊN A: </b> </td>
        <td class="tabDetailViewDF"> <b> CÔNG TY TNHH MỘT THÀNH VIÊN DV DL LỄ HỘI (CARNIVAL)</b></td>
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
        <td class="tabDetailViewDL"> Tài khoản tại ngân hàng:</td> 
        <td class="tabDetailViewDF"> {$BANK_NAME} - TP Hồ Chí Minh</td>
        <td class="tabDetailViewDL"> Tên chủ tài khoản:</td> 
        <td class="tabDetailViewDF"> {$ACCOUNT_NAME} </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Tên khoản VND:</td> 
        <td class="tabDetailViewDF"> {$ACCOUNT_VND} </td>
        <td class="tabDetailViewDL"> Tên khoản USD:</td> 
        <td class="tabDetailViewDF"> {$ACCOUNT_USD} </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Swift code:</td>
        <td class="tabDetailViewDF"> {$SWIFT_CODE} </td>
        <td class="tabDetailViewDL"> Địa chỉ ngân hàng:</td>
        <td class="tabDetailViewDF"> {$BANK_ADDRESS} </td>
    </tr>
    <tr>
        <td colspan="4" class="tabDetailViewDF"> Làm đại diện bên A </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> <b>BÊN B </b>:</td>
        <td class="tabDetailViewDF">
            <a href="index.php?module={$PARENT}&action=DetailView&record={$PARENT_ID}">{$PARENT_NAME}</a>
        </td>
        {if $PARENT eq 'TravleGuides'}    
        <td class="tabDetailViewDL travelguide" {if $ID eq ''} style="display: none;" {/if}>Năm sinh</td>
        <td class="tabDetailViewDF travelguide" {if $ID eq ''} style="display: none;" {/if}>{$BIRTHDAY}</td>
        {/if} 
    </tr>
    {if $PARENT eq 'TravleGuides'} 
    <tr class="travelguide" {if $ID eq ''} style="display: none;" {/if}>
    <td class="tabDetailViewDL">Hướng dẫn viên</td>
    <td class="tabDetailViewDF">{$GUIDER_TYPE}</td>
    <td class="tabDetailViewDL">Số thẻ</td>
    <td class="tabDetailViewDF">{$GUIDE_CARD_NO}</td>
    </tr>
    {/if}
    {if $PARENT eq 'Accounts' or $PARENT eq 'FITs' or $PARENT eq 'Restaurants' or $PARENT eq 'Hotels'}
    <tr class="chung">
        <td class="tabDetailViewDL" > Do: </td>
        <td class="tabDetailViewDF"> {$SALUTATION_B} {$DAIDIENBENB_NAME}</td>
        <td class="tabDetailViewDL">Chức vụ: </td>
        <td class="tabDetailViewDF"> {$POSITION_B}</td>
    </tr>
    {if $PARENT eq 'FITs'}
    <tr class="hochieukhachle">
        <td class="tabDetailViewDL">{$MOD.LBL_SOHOCHIEUKHACHLE}</td>
        <td class="tabDetailViewDF">{$SOHOCHIEUKHACHLE}</td>
        <td class="tabDetailViewDL">{$MOD.LBL_NGAYCAPHOCHIEU}</td>
        <td class="tabDetailViewDF">{$NGAYCAPHOCHIEU}</td>
    </tr>
   {/if} 
    <tr>
        <td class="tabDetailViewDL"> Địa chỉ:</td>                    
        <td class="tabDetailViewDF"> {$ADDRESS_B} </td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>    
    </tr>

    <tr class="chung">
        <td class="tabDetailViewDL">Số tài khoản:</td>
        <td class="tabDetailViewDF">{$SOTAIKHOANBENB}</td>
        <td class="tabDetailViewDL"> MST: </td>
        <td class="tabDetailViewDF"> {$MST_BENB}</td>
    </tr>
    <tr class="chung">
        <td class="tabDetailViewDL"> Tài khoản tại ngân hàng:</td> 
        <td> {$BANK_NAME_B}</td> 
        <td class="tabDetailViewDL"> Tên chủ tài khoản:</td> 
        <td>{$ACCOUNT_NAME_B} </td>
    </tr>
    {/if}
    {if $PARENT eq 'TravleGuides'} 
    <tr class="travelguide" {if $ID eq ''} style="display: none;" {/if}>
    <td class="tabDetailViewDL">Ngày sinh</td>
    <td class="tabDetailViewDF">{$BIRTHDAY}</td>
    <td class="tabDetailViewDL">Số hộ chiếu</td>
    <td class="tabDetailViewDF">{$PASSPORT}</td>
    </tr>
    {/if}
    <tr>
        {if $PARENT eq 'TravleGuides'} 
        <td class="tabDetailViewDL travelguide" {if $ID eq ''} style="display: none;" {/if}>Ngày cấp</td>
        <td class="tabDetailViewDF travelguide" {if $ID eq ''} style="display: none;" {/if}> {$DATE_ISSUED}</td>
        {/if}
        <td class="tabDetailViewDL">Điện thoại</td>
        <td class="tabDetailViewDF"> {$PHONE_B} </td>
    </tr>
</table>

{if $PARENT eq 'Transports'} 


<!-- hợp đồng thuê xe -->
<table class="hopdongthuexe tabForm" {if $ID eq ''} style="display: none;" {/if}cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
    <td colspan="6"><h2>NỘI DUNG HỢP ĐỒNG</h2></td>
</tr>
<tr>
    <td colspan="6">
        <table cellpadding="0" id="hopdongthuexe" class="table_clone" cellspacing="0" border="1" style="border-collapse: collapse;" width="100%">
            <thead>
                <tr bgcolor="#EEEEEE"><th>Loại xe</th><th>Số xe</th><th>Lộ trình</th><th>Thời gian sử dụng</th><th>Đơn giá</th><th>&nbsp;</th></tr>
            </thead>
            <tbody>
               {$TRANSPORTCONTRACT_LINE}
            </tbody>    
        </table>
    </td>
</tr>
<tr>
    <td colspan="5" align="center" class="tabDetailViewDL">Tổng cộng</td>
    <td class="tabDetailViewDF">{$GIATRIHOPDONGXE}</td>
</tr>
</table> 
<table class="hopdongthuexe tabForm" cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <td colspan="2"><h2>PHƯƠNG THỨC THANH TOÁN</h2></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Bên B thanh toán chuyển khoản cho bên A </td>
        <td class="tabDetailViewDF">{$HOPDONGTHUEXE_PERCENT} %</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Bằng chữ</td>
        <td class="tabDetailViewDF">{$HOPDONGTHUEXE_INWORD}</td>
    </tr>
</table>
{/if}
<table cellpadding="0" cellspacing="0" class="tabDetailView" border="0" width="100%">
    <tr>
        <td colspan="4"> <h2 class="hopdongdichvu"> ĐỐI TƯỢNG CỦA HỢP ĐỒNG</h2> <h2 class="travelguide" style="display: none;">TRÁCH NHIỆM BÊN A</h2> </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL khac">Tên Tour:  <span class="required">*</span></td>
        <td class="tabDetailViewDF khac"><a href="index.php?module=GroupPrograms&action=DetailView&record={$TOUR_ID}">{$TOUR_NAME}</a></td>
        <td class="tabDetailViewDL hopdongdichvu">Kết hợp:</td>
        <td class="tabDetailViewDF hopdongdichvu">{$KETHOP}</td>
        {if $PARENT eq 'TravelGuides'}
        <td class="travelguide tabDetailViewDL" {if $ID eq ''} style="display: none;" {/if}>Số lượng khách</td>
        <td class="travelguide tabDetailViewDF" {if $ID eq ''}style="display: none;"{/if}> {$NUM_OF_CUS_GUIDE}</td>
        {/if}
    </tr>
    <tr>
        <td class="tabDetailViewDL khac">Từ ngày:</td>
        <td class="tabDetailViewDF khac">{$CONTRACT_START_DATE}</td>
        <td class="tabDetailViewDL khac">Đến ngày:</td>
        <td class="tabDetailViewDF khac">{$CONTRACT_END_DATE}</td>
    </tr>
    <tr class="hopdongdichvu">
        <td class="tabDetailViewDL">Tổng số ngày:</td>
        <td class="tabDetailViewDF">{$NUM_OF_DATE}</td>
        <td class="tabDetailViewDL">Tổng số đêm:</td>
        <td class="tabDetailViewDF">{$NUM_OF_NIGHT}</td>
    </tr>
    <tr class="hopdongdichvu">
        <td class="tabDetailViewDL">Mục Đích chuyến đi:</td>
        <td class="tabDetailViewDF">{$PURPOSE}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
</table>
{if $PARENT eq 'TravleGuides'} 
<table class="tabForm travelguide" {if $ID eq ''} style="display: none;" {/if} cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
    <td colspan="4"><h2>TRÁCH NHIỆM BÊN A</h2></td>
</tr>
<tr>
    <td class="tabDetailViewDL">Giá trị hợp đồng</td>
    <td class="tabDetailViewDF">{$CONTRACT_GUIDE_COST}</td>
    <td class="tabDetailViewDL">Bằng chữ</td>
    <td class="tabDetailViewDF">{$GUIDE_INWORD}</td>
</tr>
</table>
{/if}
{if $PARENT eq 'Accounts' or $PARENT eq 'FITs' or $PARENT eq 'Restaurants' or $PARENT eq 'Hotels'}
<div class="hopdongdichvu">
    <table class="tabForm" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td colspan="4"><h1>GIÁ TRỊ HỢP ĐỒNG</h1></td>
        </tr>
        <tr>
            <td class="tabDetailViewDL"> Giá tour trọn gói</td>
            <td class="tabDetailViewDF">( Áp dụng cho đoàn  {$SL_KHACH} khách trở lên) </td>
            <td class="tabDetailViewDL">&nbsp;</td>
            <td class="tabDetailViewDF">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4">
                <table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse:collapse" class="table_clone" id="giatrihopdong">
                    <thead>
                        <tr bgcolor="#CCCCCC">
                            <th align="center">&nbsp;</th>
                            <th align="center"> Số lượng</th> 
                            <th align="center"> Giá tour</th>
                            <th align="center"> Thuế</th>
                            <th align="center"> Thành tiền</th>
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
            <td class="tabDetailViewDL"></td>
        </tr>
        <tr>    
            <th class="tabDetailViewDL" align="center"> Tổng cộng</th>
            <td align="center" class="tabDetailViewDF"> {$TONGTIEN} USD</td>
            <td class="tabDetailViewDL">&nbsp;</td>
            <td class="tabDetailViewDF">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="4" class="tabDetailViewDF" align="center"> Bằng chữ: {$BANGCHU} USD</td>
        </tr>
        <tr>
            <td colspan="4"> Nếu đoàn từ {$SL_KHACH_1} khách , giá tour  {$GIA_TOUR_1} {$TIENTE} / khách </td>
        </tr>
        <tr>
            <td colspan="4"> Khách hàng vui lòng thanh toán bằng {$TIENTE_USD}  hoặc {$TIENTE_VND}  theo tỷ giá của {$TEN_NGANHANG} </td>
        </tr>
        <tr>
            <td colspan="4">
                <h4> <u> Bao gồm</u></h4> 
                {$BAOGOM}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h4> <u> Không bao gồm</u></h4> 
                {$KHONGBAOGOM}
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <h4> <u> Ghi chú</u></h4>
                <p align="justify">
                    - Trẻ em dưới 02 tuổi {$TREPERCENT}"  % giá tour + thuế các loại (ngủ chung với người lớn) <br />
                    - Trẻ em từ 02 đến dưới 12 tuổi {$TREPERCENT_1} % giá tour + thuế các loại (ngủ chung với người lớn)<br />
                </p>
            </td>
        </tr>                        
    </table>
    <table class="tabDetailView" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr>
            <td colspan="4"><h1>ĐIỀU KHOẢN VỀ THANH TOÁN</h1></td>
        </tr>
        <tr> 
            <td class="tabDetailViewDL">Số đợt thanh toán :{$SOLANTHANHTOAN}</td>
            <td class="tabDetailViewDF">&nbsp;</td>
            <td class="tabDetailViewDL">&nbsp;</td>
            <td class="tabDetailViewDF">&nbsp;</td>
        </tr>
        <tr>
            <td class="tabDetailViewDF" colspan="4">
                <fieldset>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table_clone" id="dieukhoanthanhtoan">
                        <tbody>
                            {$CONTRACT_CONDITIONS}
                        </tbody>
                    </table>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
            <td class="tabDetailViewDL" width="20%">Tên sân bay</td>
            <td class="tabDetailViewDF" width="30%">{$TENSANBAY}</td>
            <td class="tabDetailViewDL">&nbsp;</td>
            <td class="tabDetailViewDF">&nbsp;</td>
        </tr>
    </table>   
</div>
{/if}
<div id="dieukhoanhuyphat">
    <h1>{$MOD.LBL_DIEUKIENHUYPHAT} </h1>
    <table class="tabDetailView" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_TIENHUYPHAT}</td>
            <td class="tabDetailViewDF">{$TIENHUYPHAT} {$TIENTEHUYPHAT}</td>
            <td class="tabDetailViewDL">&nbsp;</td>
            <td class="tabDetailViewDF">&nbsp;</td>
        </tr>
    </table>
</div>
<table cellpadding="0" cellspacing="0" class="tabForm" width="100%" border="0">
    <tr>
        <td class="tabDetailViewDL" width="20%">{$MOD.LBL_ASSIGNED_TO_NAME} </td>
        <td class="tabDetailViewDF">{$ASSIGNED_USER_NAME} </td>
        <td class="tabDetailViewDL">
              Template :  
        </td>
        <td class="tabDetailViewDF">
               <a href="index.php?module=AOS_PDF_Templates&action=DetailView&record={$template_ddown_c_id}" target="_blank">{$template_ddown_c_name}</a>
        </td>
    </tr>
</table>