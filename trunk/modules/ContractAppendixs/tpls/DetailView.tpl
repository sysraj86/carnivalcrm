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
     <input title="export to wword" class="button" type="button" onclick="showPopup('doc');" value=" Export to Word" />
    </td>
    <td align='right'>{$ADMIN_EDIT}</td> 
</tr>
</form>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView" align="center">
    <tr>
        <td colspan="4"><h1>THÔNG TIN CHUNG</h1><br/></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" align="center">Số hợp đồng : </td>
        <td class="tabDetailViewDF"> {$NUMBER}</td> 
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Ngày</td>
        <td class="tabDetailViewDF">{$DATE}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Tháng</td>
        <td class="tabDetailViewDF">{$MONTH}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Năm</td>
        <td class="tabDetailViewDF">{$YEAR}</td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" > <b>BÊN A: CÔNG</b> </td>
        <td class="tabDetailViewDF"> <b> TY TNHH MỘT THÀNH VIÊN DV DL LỄ HỘI (CARNIVAL)</b></td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Do </td>
        <td class="tabDetailViewDF">{$SALUTATION} {$DAIDIENBENA}  </td>
        <td class="tabDetailViewDL">Chức vụ  </td>
        <td class="tabDetailViewDF">{$POSITION_A}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Địa chỉ :</td> 
        <td class="tabDetailViewDF"> {$ADDRESS_A}</td>
        <td class="tabDetailViewDL"> Điện thoại :</td> 
        <td class="tabDetailViewDF"> {$PHONE_A} </td>
    </tr>
    <tr>
          <td class="tabDetailViewDL"> Fax :</td> 
          <td class="tabDetailViewDF"> {$FAX} </td>
          <td class="tabDetailViewDL"> MST :</td>
        <td class="tabDetailViewDF"> {$MST_BENA} </td> 
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Tài khoản tại ngân hàng :</td> 
        <td class="tabDetailViewDF"> {$BANK_NAME} - TP Hồ Chí Minh</td>
        <td class="tabDetailViewDL"> Tên tài khoản :</td> 
        <td class="tabDetailViewDF"> {$ACCOUNT_NAME} </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Tên khoản VND :</td> 
        <td class="tabDetailViewDF"> {$ACCOUNT_VND} </td>
        <td class="tabDetailViewDL"> Tên khoản USD :</td> 
        <td class="tabDetailViewDF"> {$ACCOUNT_USD} </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Swift code :</td>
        <td class="tabDetailViewDF"> {$SWIFT_CODE} </td>
        <td class="tabDetailViewDL"> Địa chỉ ngân hàng :</td>
        <td class="tabDetailViewDF"> {$BANK_ADDRESS} </td>
    </tr>
    <tr>
        <td colspan="4" class="tabDetailViewDF"> Làm đại diện bên A </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><b>BÊN B</b>  </td>
        <td class="tabDetailViewDF">{$DAIDIENBENB}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Do  </td>
        <td class="tabDetailViewDF"> {$SALUTATION_B} {$DAIDIENBENB_NAME}</td>
        <td class="tabDetailViewDL"> Chức vụ</td>
        <td class="tabDetailViewDF"> {$POSITION_B}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Địa chỉ :</td>                    
        <td class="tabDetailViewDF"> {$ADDRESS_B} </td>
        <td class="tabDetailViewDL"> MST : </td>
        <td class="tabDetailViewDF"> {$MST_BENB}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Điện thoại: </td>
        <td class="tabDetailViewDF">{$PHONE_B} </td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="tabDetailView" border="0" width="100%">
    <tr>
        <td colspan="4"><h1>ĐỐI TƯỢNG CỦA HỢP ĐỒNG</h1></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Tên Tour</td>
        <td class="tabDetailViewDF"><a href="index.php?module=GroupPrograms&action=DetailView&record={$TOUR_ID}">{$TOUR_NAME}</a></td>
        <td class="tabDetailViewDL">Kết hợp</td>
        <td class="tabDetailViewDF">{$KETHOP}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Từ ngày</td>
        <td class="tabDetailViewDF">{$START_DATE}</td>
        <td class="tabDetailViewDL">Đến ngày</td>
        <td class="tabDetailViewDF">{$END_DATE}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Tổng số ngày</td>
        <td class="tabDetailViewDF">{$NUM_OF_DATE}</td>
        <td class="tabDetailViewDL">Tổng số đêm</td>
        <td class="tabDetailViewDF">{$NUM_OF_NIGHT}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Mục đích chuyến đi</td>
        <td class="tabDetailViewDF" colspan="3">{$PURPOSE}</td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" class="tabDetailView" border="0" width="100%"> 
    <tr>
        <td colspan="4"><h1>GIÁ TRỊ HỢP ĐỒNG</h1></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Giá tour trọn gói</td>
        <td class="tabDetailViewDF">Áp dụng cho đoàn <b><font color="red">{$SL_KHACH}</font></b> khách trở lên</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailView" colspan="4">
            <table cellpadding="0" cellspacing="0" border="1" width="100%" class="table_add tabDetailView" id="giatrihopdong">
                <thead>
                    <tr bgcolor="#CCCCCC">
                        <td align="center"> Độ Tuổi</td>
                        <td align="center"> Số lượng</td> 
                        <td align="center"> Giá tour</td>
                        <td align="center"> Thuế</td>
                        <td align="center"> Thành tiền</td>
                    </tr>
                </thead>
                <tbody>
                    {$CONTRACT_VALUE}
                </tbody>
                <tr>    
                    <td colspan="4" align="center" class="tabDetailViewDL" > Tổng cộng :</td>
                    <td align="center" class="tabDetailViewDF"> {$TONGTIEN} USD</td>

                </tr>

                <tr>
                    <td colspan="5" align="center" class="tabDetailViewDF" > Bằng chữ: <b>{$BANGCHU}</b> USD</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"> Nếu đoàn từ  </td>
        <td class="tabDetailViewDF">{$SL_KHACH_1} khách</td>
        <td class="tabDetailViewDL"> Giá tour </td>
        <td class="tabDetailViewDF">{$GIA_TOUR_1} {$TIENTE}  / khách</td>
    </tr>
    <tr>
        <td colspan="4" class="tabDetailViewDF" > Khách hàng vui lòng thanh toán bằng {$TIENTE_USD} hoặc  {$TIENTE_VND} theo tỷ giá của {$TEN_NGANHANG} </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" valign="top" >
            <h4> <u> Bao gồm</u></h4> 
        </td>
        <td class="tabDetailViewDF"> <font color="#FF0000">{$BAOGOM}</font>  </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" valign="top" >
            <h4> <u> Không bao gồm</u></h4> 
        </td>
        <td class="tabDetailViewDF">
             <font color="#FF0000">{$KHONGBAOGOM}</font>    
        </td>
    </tr>
    <tr>
        <td colspan="4"><h3>Ghi chú</h3></td>
    </tr>
    <tr>
         <td class="tabDetailViewDL">Trẻ em dưới 02 tuổi </td>
         <td class="tabDetailViewDF"><font color="#FF0000"><b>{$TREPERCENT}</b></font> % giá tour + thuế các loại (ngủ chung với người lớn)</td>
         <td class="tabDetailViewDL">Trẻ em từ 02 đến dưới 12 tuổi</td>
         <td class="tabDetailViewDF"><font color="#FF0000"><b>{$TREPERCENT_1}</b></font> % giá tour + thuế các loại (ngủ chung với người lớn)</td>
    </tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" class="tabDetailView" width="100%">
    <tr>
        <td class="tabDetailView" colspan="4"><h1>ĐIỀU KHOẢN THANH TOÁN</h1></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="20%">Số lần thanh toán</td>
        <td class="tabDetailViewDF" width="30%"><b><font color="red">{$SOLANTHANHTOAN}</font></b></td>
        <td class="tabDetailViewDL" width="20%">&nbsp;</td>
        <td class="tabDetailViewDF" width="30%">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailView" colspan="4">
          <fieldset>
                <table cellpadding="0" cellspacing="0" border="0" width="100%"  class="table_add tabDetailViewDF" id="dieukhoanthanhtoan" >
                    <tbody>
                        {$CONTRACT_CONDITION}
                    </tbody>
                </table>
            </fieldset>        
        </td>
    </tr>
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="20%"> Tên sân bay</td>
        <td class="tabDetailViewDF" width="30%">{$TENSANBAY}</td>
        <td class="tabDetailViewDL" width="20%">&nbsp;</td>
        <td class="tabDetailViewDF" width="30%">&nbsp;</td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tabDetailView">
    <tr>
        <td class="tabDetailViewDL">Tên tour</td>
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
        <td class="tabDetailViewDL" width="20%">Quyền lợi : Bên B được hưởng khoản công tác phí:</td>
        <td class="tabDetailViewDF" width="30%">{$BONUS} {$CURRENCY} X  {$GUIDE_NUM_OF_DATE} {$TOTAL_BONUS}<label class="currency">{$CURRENCY}</label></td>
        <td class="tabDetailViewDL">&nbsp;</td>
        <td class="tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Bằng chữ</td>
        <td align="center" colspan="3" class="tabDetailViewDF">{$INWORD}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Ngày hết hạn hợp đồng</td>
        <td class="tabDetailViewDF">{$EXPIRATION_DATE}</td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%" border="0" class="tabDetailView">
    <tr>
        <td class="tabDetailViewDL" width="20%"> Sale man</td>
        <td class="tabDetailViewDF" width="30%"> {$ASSIGNED_TO}</td>
        <td class="tabDetailViewDL" width="20%">&nbsp;</td>
        <td class="tabDetailViewDF" width="30%">&nbsp;</td>
    </tr>
</table>