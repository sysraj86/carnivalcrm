<html >
    <head>
        <title>Chiết tính DOS</title>
        {literal}
        <style> 
            .center { 
                text-align:center;
            }
            .khoanmuc{
                 text-align:center; 
            }
            td .notcenter{
                text-align:left;
            }
            .nh_tinhtoan{
                text-align: center;
            }
        </style>

        <script type="text/javascript" src="modules/Worksheets/js/jquery.js"></script>
        <script type="text/javascript" src="modules/Worksheets/js/DosAjaxGetDatabase.js"></script>
        <script type="text/javascript" src="modules/Worksheets/js/FomatCurrency.js"></script> 
        <script type="text/javascript" src="custom/include/js/jquery.formatCurrency-1.3.0.js"></script>  
        <script type="text/javascript" src="modules/js/popupRequest.js"></script>
        <script type="text/javascript">
            $(function(){
                $('#btntourname').click(function(){
                filterPopup("deparment_advanced", "type", "Tours",  {"call_back_function":"set_return", "form_name": "dos", "field_to_name_array":{"id": "worksheet_tour_id", "name":"worksheet_tour_name","duration":"duration","tour_code":"tourcode","transport2":"transport","tour_destination":"lotrinh"}});
                    /*open_popup("Tours", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "dos", "field_to_name_array":{"id": "worksheet_tour_id", "name":"worksheet_tour_name","duration":"duration","tour_code":"tourcode","transport2":"transport","tour_destination":"lotrinh"}}, "single", true);*/
                    return false;
                });
                $('#btnMadeTour').click(function(){
                    open_popup("GroupPrograms", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "dos", "field_to_name_array":{"id": "groupprogrd737rograms_ida", "groupprogram_code":"groupprograorksheets_name","countofcus":"sokhach",}}, "single", true);
                    return false;
                });
                $('.openuser').click(function(){
                    open_popup('Users',600,400,'',true,false, {"call_back_function":"set_return","form_name":"dos","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}) ;
                });
            });
        </script>
        {/literal}

    </head>

    <body >
        <form id="dos" name="dos" method="post" action="index.php">
            <input type="hidden"   name="module"  value="Worksheets">
            <input type="hidden"    name="record" id="record" value="{$ID}"> 
            <input type="hidden"    name="action">
            <input type="hidden"    name="return_module"  value="{$RETURN_MODULE}">
            <input type="hidden"    name="return_id"  id="return_id"    value="{$RETURN_ID}">
            <input type="hidden"    name="return_action"  value="{$RETURN_ACTION}">
            <div class="cacbutton">
                <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
                    onclick="this.form.action.value='Save';return check_form('ob_package');" 
                    type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
                <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
                    onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
                    type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
                {if $ID neq ''}
                <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Worksheets", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
                {/if}
            </div>
            <fieldset>
                <legend><h3>THÔNG TIN CHUNG</h3></legend>
                <table width="100%" border="1" class="tabForm" style="border-collapse:collapse;" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="dataLabel">Tên chiết tính</td>
                        <td colspan="8" style="text-align: left;"><input type="text" name="name" id="name" value="{$name}" size="50"></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Tên tour <span class="required">*</span></td>
                        <td><span class="center">
                                <input name="worksheet_tour_name" type="text" id="worksheet_tour_name" value="{$TOUR_NAME}" size="50" />
                                <input name="worksheet_tour_id" type="hidden" id="worksheet_tour_id" value="{$TOUR_ID}">
                                <input type="hidden" name="type" id="type" value="{$TYPE}">
                                {if $ID eq ''}
                                <button name="btntourname" id="btntourname" value="Select" class="button"> <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=2125008055" alt=""></button>
                                <button title="Clear [Alt+C]" accesskey="C" type="button" tabindex="3" class="button" value="Clear" name="" id="" onclick="this.form.worksheet_tour_name.value='';this.form.worksheet_tour_id.value='' ;"=""><img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=446605591" alt=""> </button>
                                {/if}
                            </span></td>
                        <td class="dataLabel">Tour Code</td>
                        <td class="dataField"><input name="tourcode" type="text" id="tourcode" size="15" value="{$TOURCODE}"/></td>
                        <td class="dataLabel">Thời gian</td>
                        <td class="dataField"> <input name="duration" type="text" id="duration" size="15" value="{$DURATION}"/> </td>
                        <td class="dataLabel">Phương tiện</td>
                        <td class="dataField"><input name="transport" type="text" id="transport" size="15" value="{$TRANSPORT}" /></td>
                        <td class="dataLabel">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                    <tr>
                        <td class="dataLabel">Lộ trình</td>
                        <td class="dataField"> <input name="lotrinh" type="text" id="lotrinh" value="{$LOTRINH}" size="50" /></td>
                        <td class="dataLabel">&nbsp;</td>
                        <td><span class="center">
                               &nbsp;
                            </span></td>
                        <td class="dataLabel">&nbsp;</td>
                        <td><span class="center">
                                &nbsp;
                            </span></td>
                        <td class="dataLabel">&nbsp;</td>
                        <td><span class="center">
                                &nbsp;
                            </span></td>
                        <td class="dataLabel">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    </tr>
                    <tr>
                        <td class="dataLabel">Made Tour</td>
                        <td class="dataField">
                                <input name="groupprograorksheets_name" type="text" id="groupprograorksheets_name" value="{$MADETOUR_NAME}" size="50" />
                                <input name="groupprogrd737rograms_ida" type="hidden" id="groupprogrd737rograms_ida" value="{$MADETOUR_ID}">
                                <button class="button" name="btnMadeTour" id="btnMadeTour" value="Select"> <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=2125008055" alt=""></button>
                                <button title="Clear [Alt+C]" accesskey="C" type="button" tabindex="3" class="button" value="Clear" name="" id="" onclick="this.form.groupprograorksheets_name.value='';this.form.groupprogrd737rograms_ida.value='' ;"=""><img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=446605591" alt=""> </button>
                        </td>
                        <td class="dataLabel">Thuế Suất hóa <span class="required">*</span></td>
                        <td class="dataField"><input name="thuesuathoa" type="text" id="thuesuathoa" class="khoanmuc" size="15" value="{$THUESUATHOA}" /></td>
                        <td class="dataLabel">Số khách <span class="required">*</span></td>
                        <td class="dataField"><input name="sokhach" type="text" id="sokhach" class="khoanmuc" size="15"  value="{$SOKHACH}"/></td>
                        <td class="dataLabel">Tỷ lệ <span class="required">*</span></td>
                        <td class="dataField"><input name="tyle" type="text" id="tyle" size="15" class="khoanmuc" value="{$TYLE}" /></td>
                        <td><input type="button" class="button" name="btnAction" id="btnAction" value="Thực hiện"  {if $ID neq ''} style="display: none;" {/if} /> </td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Version</td>
                        <td align="left"><input type="text" name="version" id="version" size="40" value="{$VERSION}"></td>
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                    </tr>
                    <tr>
                        <td class="dataLabel">Notes</td>
                        <td align="left" ><textarea cols="60" rows="5" id="note" name="note">{$NOTE}</textarea></td>
                        <td align="center">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td>    
                        <td class="dataLabel">&nbsp;</td> 
                    </tr>
                </table>
                </fieldset>
                <div id="getdata">
                {if $ID neq ''}<script type="text/javascript" src="modules/Worksheets/js/dos_calculate.js"></script>{/if}
                </div>
                {if $ID neq ''}{$HTML}{/if}
                
                 <!-- KẾT THÚC PHẦN CHI PHÍ -->
            <fieldset class="tabForm" >
                    <legend><h3>CHI PHÍ KHÁC</h3></legend>
                    <table class="table_clone" cellpadding="0" id="chiphikhac" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th>Loại dịch vụ</th>
                                <th>Giá tham khảo</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>FOC</th>
                                <th>Thành tiền</th>
                                <th>Thuế suất</th>
                                <th>Giá chưa thuế</th>
                                <th>VAT</th>
                                <th>Hình thức thanh toán</th>
                                <th>Tạm ứng</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            {if $ID eq '' or $COUNTCPK eq 0}
                            <tr>
                                <td class="dataField"><input type="text" class="loaidichvu" name="chiphikhac_loaidichvu[]" id="chiphikhac_loaidichvu"></td>
                                <td class="dataField"><input size="10" type="text" class="giathamkhao center" name="chiphikhac_giathamkhao[]" id="chiphikhac_giathamkhao"></td>
                                <td class="dataField"><input size="10" type="text" class="soluong center" name="chiphikhac_soluong[]" id="chiphikhac_soluong"></td>
                                <td class="dataField"><input size="10" type="text" class="dongia center" name="chiphikhac_dongia[]" id="chiphikhac_dongia"></td>
                                <td class="dataField"><input size="10" type="text" class="foc center" name="chiphikhac_foc[]" id="chiphikhac_foc"></td>
                                <td class="dataField"><input size="10" type="text" class="thanhtien center" name="chiphikhac_thanhtien[]" id="chiphikhac_thanhtien"></td>
                                <td class="dataField"><input size="10" type="text" class="thuesuat center" name="chiphikhac_thuesuat[]" id="chiphikhac_thuesuat"></td>
                                <td class="dataField"><input size="10" type="text" class="giachuathue center" name="chiphikhac_giachuathue[]" id="chiphikhac_giachuathue"></td>
                                <td class="dataField"><input size="10" type="text" class="vat center" name="chiphikhac_vat[]" id="chiphikhac_vat"></td>
                                <td class="center"><select name="chiphikhac_hinhthucthanhtoan[]" id="chiphikhac_hinhthucthanhtoan">{$CHIPHIKHACHHINHTHUCTHANHTOAN}</select> </td>
                                <td class="center"><input type = "checkbox" name="cpk_check_tam_ung[]" class ="check_tam_ung" id="cpk_check_tam_ung" > <input class="tq_tinhtoan center tamung" name="chiphikhac_tamung[]" type="text" id="chiphikhac_tamung" size="10" /></td>
                                <td class="dataField"><input type="button" class="btnAddRow" value="Add Row"> <input type="button" class="btnDelRow" value="Add Row"></td>
                            </tr>
                            {/if}
                            {$CHIPHIKHACHTML}
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>TỔNG CỘNG</th>
                                <th class="dataField">&nbsp;</th>
                                <th class="dataField">&nbsp;</th>
                                <th class="dataField">&nbsp;</th>
                                <th class="dataField">&nbsp;</th>
                                <td class="dataField"><input size="15" type="text" class="thanhtien center" id="chiphikhac_tongcong" name="chiphikhac_tongcong" value="{$chiphikhac_tongcong}"></td>
                                <th class="dataField">&nbsp;</th>
                                <th class="dataField">&nbsp;</th>
                                <td class="dataField"><input size="15" type="text" class="vat center" id="chiphikhac_tongthue" name="chiphikhac_tongthue" value="{$chiphikhac_tongthue}"></td>
                                <th class="dataField">&nbsp;</th>  
                                <th class="dataField">&nbsp;</th>  
                            </tr>
                        </tfoot>
                    </table>

            </fieldset>
                <!-- kET THUC PHAN CHI PHI KHAC -->
                
                 <!-- TINH TONG CHI PHI-->
                <fieldset>
                    <legend><h3>TỔNG CHI PHÍ</h3></legend>
                    <table cellpadding="0" cellspacing="0" border="1" class="tabForm" style="border-collapse: collapse;" width="100%">
                        <tr>
                            <td class="notcenter"><b>TỔNG CHI PHÍ</b></td>
                            <td>&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center"><input name="tongchiphi" class="center" type="text" id="tongchiphi" size="15" value="{$TONGCHIPHI}"/></td>
                            <td class="center"><input name="tongthue" class="center" type="text" id="tongthue" value="{$TONGTHUE}" size="15" /></td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                        </tr> 
                        <tr>
                            <td class="notcenter"><b>Tỷ lệ</b></td>
                            <td>&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center"><input name="tientheotyle" type="text" id="tientheotyle" class="center" size="15" value="{$TIENTHEOTYLE}" /></td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="notcenter"><b>HOA HỒNG</b></td>
                            <td>&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center"><input name="hoahong" class="center" type="text" id="hoahong" size="15" value="{$HOAHONG}" /></td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="notcenter"><b>GIÁ BÁN</b></td>
                            <td>&nbsp;</td>
                            <td class="center">&nbsp;</td> 
                            <td class="center"><input name="giabantrenmotnguoi" class="center" type="text" id="giabantrenmotnguoi" size="15" value="{$GIABANTRENMOTNGUOI}" /></td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center"><input name="giaban" class="center" type="text" id="giaban" size="15" value="{$GIABAN}" /></td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                            <td class="center">&nbsp;</td>
                        </tr>
                    </table>
                </fieldset>
            </fieldset>
              <!-- KET THUC TINH TONG CHI PHI -->
            <fieldset>
                <legend><h3>CHI TIẾT</h3></legend>
                <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tabForm" style="border-collapse:collapse">
                    <tr>
                        <td>&nbsp;</td>
                        <th>DUYỆT</th>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">VAT ĐẦU RA</td>
                        <td width="25%" class="center dataField"><input name="vatdaura" class="center" type="text" id="vatdaura" size="15" value="{$VATDAURA}" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">VAT ĐẦU VÀO</td>
                        <td class="center dataField"><input name="vatdauvao" class="center" type="text" id="vatdauvao" size="15" value="{$VATDAUVAO}" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">VAT PHẢI ĐÓNG</td>
                        <td width="25%" class="center dataField"><input name="vatphaidong" class="center" type="text" id="vatphaidong" size="15" value="{$VATPHAIDONG}" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">DOANH THU</td>
                        <td width="25%" class="center dataField"><input name="doanhthu" class="center" type="text" id="doanhthu" size="15" value="{$DOANHTHU}" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">TỔNG CHI PHÍ</td>
                        <td width="25%" class="center dataField"><input name="tongchiphi1" class="center" type="text" id="tongchiphi1" size="15" value="{$TONGCHIPHI1}" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">GIÁ VỐN/ 1 KHÁCH</td>
                        <td width="25%" class="center dataField"><input name="giavontrenkhach" class="center" type="text" id="giavontrenkhach" size="15" value="{$GIAVONTRENKHACH}" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">GIÁ BÁN/ 1 KHÁCH</td>
                        <td width="25%" class="center dataField"><input name="giabantrenkhach" class="center" type="text" id="giabantrenkhach" size="15" value="{$GIABANTRENKHACH}"/></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">LÃI KHÁCH</td>
                        <td width="25%" class="center dataField"><input name="laikhach" class="center" type="text" id="laikhach" size="15" value="{$LAIKHACH}" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataLabel">TỔNG LÃI</td>
                        <td width="25%" class="center dataField"><input name="tonglai" class="center" type="text" id="tonglai" size="15" value="{$TONGLAI}" /></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="notcenter dataField">TỶ LỆ SAU THUẾ</td>
                        <td width="25%" class="center dataField"><input name="tylesauthue" class="center" type="text" id="tylesauthue" size="15" value="{$TYLESAUTHUE}" /> 
                            %</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>

            </fieldset>

            <table class="tabForm" width="100%">
                <tr>
                    <td class="dataLabel">{$MOD.LBL_ASSIGNED_TO_NAME}</td>
                    <td class="dataField">
                        <input type="text" id="assigned_user_name" size="40" name="assigned_user_name" value="{$ASSIGNED_USER_NAME}" /> 
                        <input type="hidden" id="assigned_user_id" name="assigned_user_id" value="{$ASSIGNED_USER_ID}" />
                        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button openuser" value='Select'>
                        <input type="button" name="clear" id="clear" onclick="this.form.assigned_user_name.value='';this.form.assigned_user_id.value='' ;" value="Clear"/>
                    </td>

                </tr>                                                                    
            </table>
            
            <div class="cacbutton">
                <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
                    onclick="this.form.action.value='Save';return check_form('ob_package');" 
                    type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
                <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
                    onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
                    type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
                {if $ID neq ''}
                <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Worksheets", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
                {/if}
            </div>
        </form>
    </body> 
</html>
