<?php
  class smpl_PhuLucHopDongDichVu_Sample{
      function getType() {
            return 'ContractAppendixs';
        }
        function getBody() {
            $d_image = explode('?',SugarThemeRegistry::current()->getImageURL('company_logo.png'));
            return '
                      
                      <div class="Section1">
<table border="0" width="100%">
<tbody>
<tr>
<td>
<p align="center">CTY TNHH MTV DV DL LỄ HỘI</p>
<p align="center">(CARNIVAL CO.</p>
<p align="center">--o0o—</p>
<p align="center">Số:$contractappendixs_number/OPE</p>
</td>
<td>
<p align="center">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
<p align="center">Độc lập – Tự do – Hạnh phúc</p>
<p align="center">---------------------------------</p>
 </td>
</tr>
</tbody>
</table>
</div>
<p> </p>
<p align="center"><span><strong>PHỤ LỤC HỢP ĐỒNG</strong></span></p>
<p> </p>
<p>Hôm nay, ngày $contractappendixs_date , chúng tôi gồm:</p>
<p> </p>
<p><strong><span>BÊN A</span>: CÔNG TY TNHH MỘT THÀNH VIÊN DỊCH VỤ DU LỊCH LỄ HỘI (CARNIVAL CO.)</strong></p>
<p>Đại diện          :           <strong>Bà</strong> <strong>ĐINH KIM PHƯỢNG</strong>   Chức vụ: Giám Đốc</p>
<p>Địa chỉ             :           357 Võ Văn Tần, Phường 5, Quận 3, Tp. Hồ Chí Minh</p>
<p>Điện thoại       :           (08) 3834 2384 – (08) 3834 2385     </p>
<p>Fax                  :           (08) 38342386</p>
<p>Mã số thuế      :           0302089445</p>
<p>           </p>
<p><span> </span></p>
<p><strong><span>BÊN B</span></strong>      : $contractappendixs_parent_name</p>
<p>Đại diện          :           $contractappendixs_salutation_b<strong> $contractappendixs_daidienbenb_name</strong>         Chức vụ:  $contractappendixs_position_b</p>
<p>Địa chỉ             :            $contractappendixs_address_b</p>
<p>Điện thoại       :           $contractappendixs_phone_b</p>
<p>Fax                  :           $contractappendixs_fax</p>
<p>MST                :           $contractappendixs_mst_benb</p>
<p> </p>
<p>Sau khi bàn bạc thỏa thuận, hai bên cùng thống nhất như sau:</p>
<p><strong>I/</strong> <strong>Giá trị hợp đồng:</strong></p>
<p>Tour : $contractappendixs_tours_contrappendixs_name</p>
<table id="giatrihopdong" class="table_add" style="width: 100%;" border="1" cellspacing="0" cellpadding="0">
<thead>
<tr bgcolor="#CCCCCC">
<td align="center">Dịch Vụ</td>
<td align="center">Số lượng</td>
<td align="center">Đơn giá</td>
<td align="center">Thuế</td>
<td align="center">Thành tiền</td>
</tr>
</thead>
<tbody>
<tr>
<td align="center">$contractappendixvalues_service</td>
<td align="center">$contractappendixvalues_num_of_service</td>
<td align="center">$contractappendixvalues_unit</td>
<td align="center">$contractappendixvalues_tax</td>
<td align="center">$contractappendixvalues_amount</td>
</tr>
</tbody>
</table>
<p><strong><br /> </strong><strong><span>TỔNG CỘNG</span></strong><span>:</span>   $contractappendixs_tongtien </p>
<p><strong>                        Tương đương: $contractappendixs_tongtien X $contractappendixs_tigia = $contractappendixs_tongtien2 $contractappendixs_tiente</strong></p>
<p>   </p>
<p><strong>                     Bằng chữ : $contractappendixs_bangchu</strong></p>
<p> </p>
<p><strong>II/  Phương thức thanh toán:</strong></p>
<p>Bên B sẽ thanh toán <strong>$contractappendixs_tongtien2 $contractappendixs_tiente</strong><strong> (<strong>$contractappendixs_bangchu</strong></strong><strong>)</strong> cho bên A trước ngày khởi hành hai tuần dựa theo hợp đồng số $contractappendixs_contract</p>
<p>Tất cả các điều khoản sẽ được áp dụng theo hợp đồng số $contractappendixs_contract ký ngày $contractappendixs_date_of_contracts</p>
<p>Phụ lục này được lập thành 2 bản, mỗi bên giữ một bản có giá trị như nhau kể từ ngày ký. </p>
<br />
<table width="100%">
<tr><td align="center"><strong>ĐẠI DIỆN BÊN A</strong></td><td align="center"><strong>ĐẠI DIỆN BÊN B</strong></td></tr>
<tr><td height="100"></td><td></td></tr>
<tr><td align="center"><strong>$contractappendixs_daidienbena</strong></td><td align="center"><strong>$contractappendixs_daidienbenb_name</strong></td></tr>
</table>    
            ';
        }
        function getHeader() {
            return '';
        }
        function getFooter() {
        global $locale;
        return '<table style="width: 100%; border: 0pt none; border-spacing: 0pt;">
                <tbody>
                <tr>
                <td>'.translate('LBL_PAGE','AOS_PDF_Templates').' {PAGENO}</td>
                <td style="text-align: right;">{DATE '.$locale->getPrecedentPreference('default_date_format').'}</td>
                </tr>
                </tbody>
                </table>';
        }
  }
?>
