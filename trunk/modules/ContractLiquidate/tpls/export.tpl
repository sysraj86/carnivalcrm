<form id="AppendixContract" name="AppendixContract" method="post" action="">
  <table width="100%" cellpadding="0" cellspacing="0" border="0" style="padding:2px">
    <tr>
      <td align="center"><p>CTY TNHH MTV DV DL LỄ HỘI </p>
      <p>( CARNIVAL CO.)</p>
      <p>--oOo--</p></td>
      <td align="center"><p>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</p>
      <p>Độc Lập - Tự Do - Hạnh Phúc</p>
      <p>----------------------------</p></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><strong>PHỤ LỤC HỢP ĐỒNG</strong></td>
    </tr>
  </table>
  <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tabForm">
    <tr>
        <td class="dataLabel" style="text-align: inherit;" colspan="4">
             Hôm nay, ngày <input type="text" name="date" id="date" size="5" value="{$DATE}"/>
             tháng <input type="text" name="month" id="month" size="5" value="{$MONTH}"/>
             năm <input type="text" name="year" id="year" size="5" value="{$YEAR}"/> chúng tôi gồm
         </td>
    </tr>
    <tr>
        <td class="dataLabel"><u><b>BÊN A:</b></u></td>
        <td class="dataLabel"><b>CÔNG TY TNHH MỘT THÀNH VIÊN DỊCH VỤ DU LỊCH LỄ HỘI (CARNIVAL CO.)</b></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">Đại diện</td>
        <td class="dataField"><input type="text" name="daidienbena" id="daidienbena" value="{$DAIDIENBENA}" size="40"/></td>
        <td class="dataLabel">Chức vụ</td>
        <td class="dataField"><select name="chucvu" id="chucvu">{$CHUCVU}</select></td>
    </tr>
    <tr>
        <td class="dataLabel">Địa chỉ</td>
        <td class="dataField"><textarea cols="41" rows="2" name="diachi" id="diachi">{$DIACHI}</textarea></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataField">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">Điện thoại</td>
        <td class="dataField"><input type="text" name="dienthoai" id="dienthoai" value="{$DIENTHOAI}" size="40"/></td>
        <td class="dataLabel">FAX</td>
        <td class="dataField"><input type="text" name="fax" id="fax" value="{$FAX}"size="40"/></td>
    </tr>
    <tr>
        <td class="dataLabel">Mã số thuế</td>
        <td class="dataField"><input type="text" name="masothue" id="masothue" value="{$MASOTHUE}" size="40"/></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel"><b><u>BÊN B</u></b></td>
        <td class="dataField"><input type="text" name="masothue" id="masothue" value="{$MASOTHUE}" size="70"/></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">Đại diện</td>
        <td class="dataField"><input type="text" name="daidienbena" id="daidienbena" value="{$DAIDIENBENA}" size="40"/></td>
        <td class="dataLabel">Chức vụ</td>
        <td class="dataField"><select name="chucvu" id="chucvu">{$CHUCVU}</select></td>
    </tr>
    <tr>
        <td class="dataLabel">Địa chỉ</td>
        <td class="dataField"><textarea cols="41" rows="2" name="diachi" id="diachi">{$DIACHI}</textarea></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataField">&nbsp;</td>
    </tr>
    <tr>
        <td class="dataLabel">Điện thoại</td>
        <td class="dataField"><input type="text" name="dienthoai" id="dienthoai" value="{$DIENTHOAI}" size="40"/></td>
        <td class="dataLabel">FAX</td>
        <td class="dataField"><input type="text" name="fax" id="fax" value="{$FAX}"size="40"/></td>
    </tr>
    <tr>
        <td class="dataLabel">Mã số thuế</td>
        <td class="dataField"><input type="text" name="masothue" id="masothue" value="{$MASOTHUE}" size="40"/></td>
        <td class="dataLabel">&nbsp;</td>
        <td class="dataLabel">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="4" class="dataLabel">Sau khi bàn bạc thỏa thuận, hai bên chúng tôi cùng thông nhất như sau:</td>
    </tr>
    <tr>
        <td class="dataField" colspan="4" valign="top">
            <b><i>I/</i></b>  <textarea cols="120" rows="5" id="dieukhoan1" name="dieukhoan1">{$DIEUKHOAN1}</textarea>
        </td>                                                                                                        
    </tr>
    <tr>
        <td class="dataLabel"> Giá tour </td>
        <td class="dataField"><input name="chuyendi" id="chuyendi" size="40" value="{$CHUYENDI}"></td>
        <td colspan="2" class="dataField">
            <input type="text" id="giatour" name="giatour" size="5" value="{$GIATOUR}"><select id="tiente" name="tiente">{$TIENTE}</select> 
            <input type="text" id="soluongkhach" name="soluongkhach" size="5" value="{$SOLUONGKHACH}"/> =
            <input type="text" id="thanhtien" name="thanhtien" size="20" value="{$THANHTIEN}"/><label class="tiente"></label>
        </td>
    </tr>
    <tr>
        <td class="dataField" colspan="4" align="center"><b>TỔNG CỘNG:</b> <label class="tongcong">{$TONGCONG}</label></td> 
    </tr>
    <tr>
        <td class="dataField" colspan="4" align="center"><b>Tương đương:</b> 
            <label class="tongcong">{$TONGCONG}</label>X 
            <input type="text" id="tienquydoi" name="tienquydoi" value="{$TIENQUYDOI}"> 
            <select name="tientequydoi" id="tientequydoi">{$TIENTEQUYDOI}</select>
        </td>
    </tr>
    <tr>
        <td colspan="4" class="dataField" align="center">Bằng chữ: <input name="bangchu" id="bangchu" value="{$BANGCHU}" size="70"></td>
    </tr>
    <tr>
        <td colspan="4" class="dataLabel"><b>II/ Phương thức thanh toán</b></td>
    </tr>
    <tr>
        <td colspan="4" class="dataField">
            <textarea cols="120" rows="5" id="phuongthucthanhtoan" name="phuongthucthanhtoan">{$PHUONGTHUCTHANHTOAN}</textarea>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="dataField" align="center"><br/><b>ĐẠI DIỆN BÊN A</b><br/><br/><br/>
            <label class="daidienbena">{$DAIDIENBENA}</label>
        </td>
        <td colspan="2" class="dataField" align="center"><br/><b>ĐẠI DIỆN BÊN B</b><br/><br/><br/>
            <label class="daidienbenb">{$DAIDIENBENB}</label>
        </td>
    </tr>
  </table>
</form>
