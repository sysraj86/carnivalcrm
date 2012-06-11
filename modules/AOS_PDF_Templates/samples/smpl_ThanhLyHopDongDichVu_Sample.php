<?php
  class smpl_ThanhLyHopDongDichVu_Sample{
      function getType() {
            return "ContractLiquidate";
        }
        function getBody() {
            $d_image = explode("?",SugarThemeRegistry::current()->getImageURL("company_logo.png"));
            $sample = '  
      <table align="center">
<tr><td align="center">
<p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
<p>ĐỘC LẬP – TỰ DO – HẠNH PHÚC  </p>
<p>**************  </p>
<p><b>BIÊN BẢN THANH LÝ HỢP ĐỒNG
  TỔ CHỨC CHUYẾN ĐI THAM QUAN KẾT HỢP THAM DỰ HỘI NGHỊ  </b></p>
<p>(TỪ $contracts_start_date_contract->$contracts_end_date_contract) </p> 
</td></tr>
</table>

  

<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td colspan="4">
      <p>- Căn cứ vào hợp đồng số:<strong>$contracts_number</strong> ngày <strong>$contracts_date</strong> tháng <strong>$contracts_month</strong> năm <strong>$contracts_year</strong> về việc tổ chức chuyến đi $tours_name từ ngày <strong>$contracts_start_date_contract</strong>-><strong>$contracts_end_date_contract</strong>. 
      <br />
      - Căn cứ vào tình hình thực tế
      <br /><br />
      Hôm nay, ngày <strong>$contractliquidate_day</strong> tháng <strong>$contractliquidate_month</strong> năm <strong>$contractliquidate_year</strong>. Chúng tôi gồm có: </p>
      </td>
  </tr>
  <tr>
    <td width="12%">BÊN A: </td>
    <td colspan="3"><strong>CÔNG TY TNHH MỘT THÀNH VIÊN DỊCH VỤ DU LỊCH LỄ HỘI (CARNIVAL CO.)</strong></td>
  </tr>
  <tr>
    <td>Đại diện :</td>
    <td width="53%"><strong>$contracts_salutation_a $contracts_daidienbena</strong></td>
    <td width="20%">Chức vụ:</td>
    <td width="20%">$contracts_position_a </td>
  </tr>
  <tr>
    <td>Địa chỉ :</td>
    <td rowspan="2">$contracts_address_a</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Điện thoại :</td>
    <td>$contracts_phone_a</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fax :</td>
    <td>$contracts_fax_a</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mã số thuế :</td>
    <td>$contracts_mst_bena </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>BÊN B:</td>
    <td colspan="3"><strong>$contracts_parent_name</strong></td>
  </tr>
  <tr>
    <td>Đại diện :</td>
    <td><strong>$contracts_salutation_b $contracts_daidienbenb_name</strong></td>
    <td>Chức vụ:</td>
    <td>$contracts_position_b</td>
  </tr>
  <tr>
    <td>Địa chỉ :</td>
    <td rowspan="2">$contracts_address_b</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Điện thoại :</td>
    <td>$contracts_phone_b</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Fax :</td>
    <td>$contracts_fax_b</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mã số thuế :</td>
    <td>$contracts_mst_benb</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">Hai bên thống nhất thành lập biên bản thanh lý với nội dung sau :</td>
  </tr>
</table>
<table cellpadding="0" cellspacing="0" border="1" bordercolor="black" align="center">
  <tr>
    <td width="350" rowspan="2" align="center">Nội dung </td>
    <td colspan="3" align="center">Kế hoạch </td>
    <td colspan="3" align="center">Thực tế</td>
  </tr>
  <tr>
    <td width="150">Đơn giá(USD)</td>
    <td width="50">SL</td>
    <td width="180">Thành tiền(USD)</td>
    <td width="150">Đơn giá(USD)</td>
    <td width="50">SL</td>
    <td width="180">Thành tiền(USD) </td>
  </tr>
  <tr>
    <td>I/ Tổng giá trị hợp đồng </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>$contractliquidatevalues_contract_value_name</td>
    <td align="right">$contractliquidatevalues_contract_dongia_kehoach</td>
    <td align="right">$contractliquidatevalues_contract_soluong_kehoach</td>
    <td align="right">$contractliquidatevalues_contract_thanhtien_kehoach</td>
    <td align="right">$contractliquidatevalues_contract_dongia_thucte</td>
    <td align="right">$contractliquidatevalues_contract_soluong_thucte</td>
    <td align="right">$contractliquidatevalues_contract_thanhtien_thucte</td>
  </tr>
  <tr>
    <td>Tổng cộng </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tongcong_contract_kehoach</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tongcong_contract_thucte</td>
  </tr>
  <tr>
    <td>II/ Chi phí phát sinh tăng </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>$contractliquidateincre_phatsinhtang_name</td>
    <td align="right">$contractliquidateincre_phatsinhtang_dongia_kehoach</td>
    <td align="right">$contractliquidateincre_phatsinhtang_soluong_kehoach</td>
    <td align="right">$contractliquidateincre_phatsinhtang_thanhtien_kehoach</td>
    <td align="right">$contractliquidateincre_phatsinhtang_dongia_thucte</td>
    <td align="right">$contractliquidateincre_phatsinhtang_soluong_thucte</td>
    <td align="right">$contractliquidateincre_phatsinhtang_thanhtien_thucte</td>
  </tr>
  <tr>
    <td>Tổng cộng </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tongcong_tang_kehoach</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tongcong_tang_thucte</td>
  </tr>
  <tr>
    <td>III/ Chi phí phát sinh giảm </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>$contractliquidatedecre_phatsinhgiam_name</td>
    <td align="right">$contractliquidatedecre_phatsinhgiam_dongia_kehoach</td>
    <td align="right">$contractliquidatedecre_phatsinhgiam_soluong_kehoach</td>
    <td align="right">$contractliquidatedecre_phatsinhgiam_thanhtien_kehoach</td>
    <td align="right">$contractliquidatedecre_phatsinhgiam_dongia_thucte</td>
    <td align="right">$contractliquidatedecre_phatsinhgiam_soluong_thucte</td>
    <td align="right">$contractliquidatedecre_phatsinhgiam_thanhtien_thucte</td>
  </tr>
  <tr>
    <td>Tổng cộng </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tongcong_giam_kehoach</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tongcong_giam_thucte</td>
  </tr>
  <tr>
    <td>Tổng giá trị Tour </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tongtien_kehoach</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tongtien_thucte</td>
  </tr>
  <tr>
    <td>IV/ Số tiền bên B đã thanh toán cho bên A </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tienthanhtoan</td>
  </tr>
  <tr>
    <td>V/ Số tiền bên B còn nợ bên A </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tienconlai</td>
  </tr>
  <tr>
    <td>VI/ Số tiền bên A phải trả cho bên B </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right">$contractliquidate_tientralai</td>
  </tr>
  <tr>
    <td colspan="7" align="center"><b>( Bằng chữ : $contractliquidate_bangchu USD )</b></td>
  </tr>
</table>
<table>
<tr><td colspan="2">
<br />
Bên A cam kết hoàn trả hết số tiền còn lại sau khi nhận được thanh lý hợp đồng đã ký của bên B. 
Hai Bên đồng ý các nội dung trên và ký vào biên bản thanh lý, biên bản được lập thành 02 bản mỗi bên giữ 01 bản có giá trị pháp lý như nhau.
<br /> 
</td></tr>
<tr><td align="center">Đại Diện Bên B</td><td align="center">Đại Diện bên A</td></tr>
<tr><td height="92">&nbsp;</td>
<td>&nbsp;</td></tr>
<tr><td align="center"><strong>$contracts_daidienbenb_name</strong></td>
<td align="center"><strong>$contracts_daidienbena</strong></td>
</tr>
</table>
 '
                            
            ;
            
            return $sample;
        }
        function getHeader() {
            return "";
        }
        function getFooter() {
        global $locale;
        return '<table style="width: 100%; border: 0pt none; border-spacing: 0pt;">
                <tbody>
                <tr>
                <td>".translate("LBL_PAGE","AOS_PDF_Templates")." {PAGENO}</td>
                <td style="text-align: right;">{DATE ".$locale->getPrecedentPreference("default_date_format")."}</td>
                </tr>
                </tbody>
                </table>';
        }
  }
?>
