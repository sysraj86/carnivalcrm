<?php
  class smpl_HopDongDichVu_Sample{
      function getType() {
            return 'Contracts';
        }
        function getBody() {
            $d_image = explode('?',SugarThemeRegistry::current()->getImageURL('company_logo.png'));
            return '
               <table cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;margin-left:30;" width="100%" class="table_add" id="giatrihopdong">
                            <thead>
                                <tr bgcolor="#CCCCCC">
                                    <td align="center" style="border-style: solid; border-width: 0.5px;">Độ Tuổi</td>
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Số lượng</td> 
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Giá tour</td>
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Thuế</td>
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractvalues_age   </td>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractvalues_num_of_cus </td>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractvalues_tour_cost </td>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractvalues_tax </td>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractvalues_money USD </td>
                             </tr> 
                            </tbody>
            </table>
            <p> </p>
            
            <table cellpadding="0" cellspacing="0"  style="margin-left:30;" width="100%" class="table_add tabDetailViewDF" id="dieukhoanthanhtoan" >
                <tbody>
                <tr>
                    <td style="padding-top:5px;" >
                    $contractconditions_contract_phase - $contractconditions_event, bên B thanh toán cho bên A $contractconditions_percent số tiền là $contractconditions_money $contractconditions_currency
                    </td>
                </tr>
                <tr>
                    <td style="padding-left:50px;">
                    <i>(Bằng chữ: <b> $contractconditions_in_word</b>)</i> 
                    </td>
                </tr>
                </tbody>
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
