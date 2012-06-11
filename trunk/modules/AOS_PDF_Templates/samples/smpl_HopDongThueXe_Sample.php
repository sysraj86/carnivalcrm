<?php
class smpl_HopDongThueXe_Sample{
    function getType() {
            return 'Contracts';
        }
        function getBody() {
            $d_image = explode('?',SugarThemeRegistry::current()->getImageURL('company_logo.png'));
            return ' <table cellpadding="0" id="hopdongthuexe" class="table_clone" cellspacing="0" border="1" style="border-collapse: collapse;" width="60%">
                    <thead>
                        <tr bgcolor="#EEEEEE"><th>Loại xe</th><th>Số xe</th><th>Lộ trình</th><th>Thời gian sử dụng</th><th>Đơn giá</th></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align="center">$transportcontracts_loaixe</td>
                            <td align="center">$transportcontracts_soxe</td>
                            <td align="center">$transportcontracts_lotrinh</td>
                            <td align="center">$transportcontracts_thoigiansudung</td>
                            <td align="center">$transportcontracts_dongia</td>
                        </tr>
                    </tbody>    
                </table>';
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
