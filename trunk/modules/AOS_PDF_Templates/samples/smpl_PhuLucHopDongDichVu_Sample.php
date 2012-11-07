<?php
  class smpl_PhuLucHopDongDichVu_Sample{
      function getType() {
            return 'ContractAppendixs';
        }
        function getBody() {
            $d_image = explode('?',SugarThemeRegistry::current()->getImageURL('company_logo.png'));
            return '<table cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;" width="60%" class="table_add" id="giatrihopdong">
                            <thead>
                                <tr bgcolor="#CCCCCC">
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Dịch Vụ</td>
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Số lượng</td> 
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Đơn giá</td>
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Thuế</td>
                                    <td align="center" style="border-style: solid; border-width: 0.5px;"> Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractappendixvalue_service </td>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractappendixvalue_num_of_service </td>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractappendixvalue_unit </td>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;"> $contractappendixvalue_tax </td>
                                 <td align="center" style="border-style: solid; border-width: 0.5px;">'.format_number('.$contractvalues_amount.'). 'USD </td>
                             </tr> 
                            </tbody>
            </table>
            <p> </p>
            
            <table cellpadding="0" cellspacing="0" border="0" style="border-collapse: collapse;" width="60%" class="table_add tabDetailViewDF" id="dieukhoanthanhtoan" >
                <tbody>
                    <tr>
                    <td style="border-style: solid; border-width: 0.5px; padding: 2px 6px;">
                        <fieldset>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%" style="border-collapse: collapse;"> 
                                <tr>
                                    <td style="border-style: solid; border-width: 0.5px;"> $contractconditions_contract_phase - $contractconditions_event Bên B thanh toán cho bên A $contractconditions_percent % số tiền là '.format_number('.$contractconditions_money.').' '.translate('currency_dom','$contractconditions_currency').'
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-style: solid; border-width: 0.5px;">  Bằng chữ: <b> $contractconditions_in_word</b> </td>
                                </tr>
                            </table>
                        </fieldset>
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
