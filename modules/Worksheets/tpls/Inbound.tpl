<html >
    <head>
        <title>Chiết tính DOS</title>
        <link rel="stylesheet" type="text/css" href="modules/Worksheets/css/jquery-ui.css"> 
        <link rel="stylesheet" type="text/css" href="modules/Worksheets/css/ui.theme.css"> 
        <script type="text/javascript" src="modules/Worksheets/js/jquery.js"></script>
        <script type="text/javascript" src="modules/Worksheets/js/jquery-ui.min.js"></script>   
        <script type="text/javascript" src="modules/Worksheets/js/jquery.ui.widget.min.js"></script>   
        <script type="text/javascript" src="modules/Worksheets/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="modules/Worksheets/js/InboundAjaxDatabase.js"></script>
        <script type="text/javascript" src="modules/Worksheets/js/AjaxHotel.js"></script>
        <script type="text/javascript" src="modules/js/popupRequest.js"></script> 
        <script type="text/javascript" src="modules/Worksheets/js/Inbound_Calculate.js"></script>
        <script type="text/javascript" src="custom/include/js/jquery.formatCurrency-1.3.0.js"></script>      
        <script type="text/javascript" src="modules/Worksheets/js/FomatCurrency.js"></script> 
        <script type="text/javascript" src="modules/Worksheets/js/Ajaxcostguide.js"></script>
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
            td .dataField{
                text-align: center !important;
            }
        </style>

        <script type="text/javascript">
            window.onbeforeunload = function(){
                var isEnabled = false;  
                if(isEnabled){  
                    var e = e || window.event;  

                    if (e) {  
                        e.returnValue = 'WHY?';  
                    }  
                    else{  
                        return 'WHY?';  
                    }  
                }
                fConfirm();
            } 

            $(document).ready(function(){
                $('#btntourname').click(function(){
                    filterPopup("deparment_advanced", "type", "Tours",  {"call_back_function":"set_return", "form_name": "inbound", "field_to_name_array":{"id": "worksheet_tour_id", "name":"worksheet_tour_name","duration":"duration","tour_code":"tourcode","transport2":"transport","tour_destination":"lotrinh","start_date":"ngaybatdau","end_date":"ngayketthuc"}});
                    /*open_popup("Tours", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "inbound", "field_to_name_array":{"id": "worksheet_tour_id", "name":"worksheet_tour_name","duration":"duration","tour_code":"tourcode","transport2":"transport","tour_destination":"lotrinh"}}, "single", true);*/
                    return false;
                });
                $('#btnMadeTour').click(function(){
                    open_popup("GroupPrograms", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "inbound", "field_to_name_array":{"id": "groupprogrd737rograms_ida", "groupprogram_code":"groupprograorksheets_name","countofcus":"sokhach",}}, "single", true);
                    return false;
                });
                $('.openuser').click(function(){
                    open_popup('Users',600,400,'',true,false, {"call_back_function":"set_return","form_name":"inbound","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}) ;
                });
            });


            function fConfirm()
            {    
                //do something with p1, p2, p3, p4....
                //this shows the default dialog box  
                //event.returnValue = 'Any changes will be lost if you proceed.';
                //this shows the custom confirm box, but it doesn't stop the page from 
                //refreshing even the user click the "Cancel" button
                if(!confirm("Bạn có muốn thoát không? nếu thoát thì sẽ mất dữ liệu không được lưu!.")){
                    return false;
                }
                return true;
            }
        </script>
        {/literal}

    </head>

    <body>
        <form id="inbound" name="inbound" method="post" action="index.php">
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
            <!--BẮT ĐẦU PHẦN TỔNG QUAN -->  
            <fieldset>
                <legend><h3>THÔNG TIN CHUNG</h3></legend>
                <table width="100%" border="1" class="tabForm" style="border-collapse:collapse;" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="dataLabel">Tên chiết tính</td>
                    <td style="text-align: left;" colspan="8"><input type="text" name="name" id="name" value="{$name}" size="50"></td>
                </tr>
                    <tr>
                        <td class="dataLabel">Tên tour</td>
                        <td><span class="center">
                                <input name="worksheet_tour_name" type="text" id="worksheet_tour_name" readonly="readonly" value="{$TOUR_NAME}" size="50" />
                                <input name="worksheet_tour_id" type="hidden" id="worksheet_tour_id" value="{$TOUR_ID}">
                                <input type="hidden" name="type" id="type" value="{$TYPE}">
                                {if $ID eq ''}
                                <button name="btntourname" id="btntourname" value="Select" class="button"> <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=2125008055" alt=""></button>
                                <button title="Clear [Alt+C]" accesskey="C" type="button" tabindex="3" class="button" value="Clear" name="" id="" onclick="this.form.worksheet_tour_name.value='';this.form.worksheet_tour_id.value='' ;"=""><img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=446605591" alt=""> </button>
                                {/if}
                            </span></td>
                        <td class="dataLabel">Mã tour</td>
                        <td class="dataField"><input name="tourcode" type="text" id="tourcode" size="15" value="{$TOURCODE}"/></td>
                        <td class="dataLabel">Ngày khởi hành</td>
                        <td class="dataField"> <input name="ngaybatdau" type="text" id="ngaybatdau" size="15" value="{$ngaybatdau}"/> </td>
                        <td class="dataLabel">Ngày kết thúc</td>
                        <td class="dataField"><input name="ngayketthuc" type="text" id="ngayketthuc" size="15" value="{$ngayketthuc}" /></td>
                        <td class="dataLabel">&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Lộ trình</td>
                        <td> <input name="lotrinh" type="text" id="lotrinh" value="{$LOTRINH}" size="50" /></td>
                        <td class="dataLabel">Hướng dẫn viên</td>
                        <td class="dataField"><input type="text" name="huongdanvien" id="huongdanvien" size="15" value="{$huongdanvien}"></td>
                        <td class="dataLabel">Khoảng thời gian</td>
                        <td class="dataField"> <input name="duration" type="text" id="duration" size="15" value="{$DURATION}"/> </td>
                        <td class="dataLabel">Phương tiện</td>
                        <td class="dataField"><input name="transport" type="text" id="transport" size="15" value="{$TRANSPORT}" /></td>
                    </tr>
                    </tr>
                    <tr>
                        <td class="dataLabel">Made Tour</td>
                        <td>
                            <input name="groupprograorksheets_name" type="text" id="groupprograorksheets_name" value="{$MADETOUR_NAME}" size="50" />
                            <input name="groupprogrd737rograms_ida" type="hidden" id="groupprogrd737rograms_ida" value="{$MADETOUR_ID}">
                            <button class="button" name="btnMadeTour" id="btnMadeTour" value="Select"> <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=2125008055" alt=""></button>
                            <button title="Clear [Alt+C]" accesskey="C" type="button" tabindex="3" class="button" value="Clear" name="" id="" onclick="this.form.groupprograorksheets_name.value='';this.form.groupprogrd737rograms_ida.value='' ;"=""><img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=446605591" alt=""> </button>
                        </td>
                        <td class="dataLabel">Số lượng người lớn</td>
                        <td class="dataField"><input name="thuesuathoa" type="text" id="thuesuathoa" class="khoanmuc soluongnguoilon" size="15" value="{$THUESUATHOA}" /></td>
                        <td class="dataLabel">Số lượng trẻ em</td>
                        <td class="dataField"><input name="sokhach" type="text" id="sokhach" class="soluongtreem" style="text-align: center;" size="15"  value="{$SOKHACH}"/></td>
                        <td class="dataLabel">Tỷ lệ</td>
                        <td class="dataField"><input name="tyle" type="text" id="tyle" size="15" class="khoanmuc" value="{$TYLE}" /></td>
                        <td><input type="button" class="button" name="btnAction" id="btnAction" value="Thực hiện" {if $ID neq ''} style="display: none;" {/if} /> </td>
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
            <!--KẾT THÚC PHẦN TỔNG QUAN -->

            <!-- PHẦN CHÍ PHÍ CỦA CHIẾT TÍNH -->                
            <fieldset>
                <legend><h3>CHI PHÍ</h3></legend>
                <div id="getdata">
                    {if $ID neq ''}{$HTML}{/if}
                </div>
            </fieldset>  
            <!-- KẾT THÚC PHẦN CHI PHÍ -->

            <!-- CHI PHI CONG TAC CUA HDV -->

            <fieldset>
                <legend><h3>CHI PHÍ HDV + LÁI XE</h3></legend>
                <div>
                    <p>&nbsp;</p>
                    <a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30"/></a>
                    <div class="displayandshow">
                        <table class="tabForm" width="100%" cellpadding="0" cellspacing="0" border="0">
                            <tfoot>
                                <tr>
                                    <td width="16%"><input type="text" style="display: none;" value=""/></td>
                                    <td width="12%"><input type="text" style="display: none;"/></td>
                                    <td width="12%"><input type="text" style="display: none;" value=""/></td>
                                    <td width="12%"><input type="text" style="display: none;" value=""/></td>
                                    <td width="12%"><input type="text" class="center" name="tongchi_hvd" id="tongchi_hvd" value="{$tongchi_hvd}"/></td>
                                    <td width="12%"><input type="text" style="display: none;" value=""/></td>
                                    <td width="12%"><input type="text" class="center" name="tongthue_hvd" id="tongthue_hvd" value="{$tongthue_hvd}"/></td>
                                    <td width="12%">&nbsp;</td>
                                </tr>
                            </tfoot>
                            <tr>
                                <td colspan="7">
                                    <fieldset>
                                        <legend><h4>Miền bắc</h4></legend>
                                        <table class="table_clone" id="cphdv_mb" cellpadding="0" cellspacing="0" width="100%" border="0">
                                            <thead>
                                                <tr>
                                                    <td class="dataLabel"><input type="checkbox" class="checkedbox" name="checkbox" id="checkbex" value="mienbac" >Chọn <div id="waitting"></div></td>
                                                    <td class="dataLabel"> <select class="listcongtacphi" name="listcongtacphi" id="listcongtacphi" size="5" ></select></td>
                                                    <td class="dataLabel"><input type="button" class="button btnAddHDV" value="Add row"></td>
                                                    <td class="dataLabel" colspan="5">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="dataLabel">Loại chí phí</td>
                                                    <td class="dataLabel">Số lượng</td>
                                                    <td class="dataLabel">Đơn giá</td>
                                                    <td class="dataLabel">Số đêm/lần</td>
                                                    <td class="dataLabel">Thành tiền</td>
                                                    <td class="dataLabel">Thuế suất</td>
                                                    <td class="dataLabel">Thuế</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {$htmlhdvmb}
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="dataLabel">Tổng chí phí</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" class="center" name="tongchi_hvd_mb" id="tongchi_hvd_mb" value="{$tongchi_hvd_mb}"/></td>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" class="center" name="tongthue_hvd_mb" id="tongthue_hvd_mb" value="{$tongthue_hvd_mb}"/></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <fieldset>
                                        <legend><h4>Miền trung</h4></legend>
                                        <table class="table_clone" id="cphdv_mt" cellpadding="0" cellspacing="0" width="100%" border="0">
                                            <thead>
                                                <tr>
                                                    <td class="dataLabel"><input type="checkbox" class="checkedbox" name="checkbox" id="checkbex" value="mientrung" >Chọn <div id="waitting"></div> </td>
                                                    <td class="dataLabel"> <select class="listcongtacphi" name="listcongtacphi" id="listcongtacphi" size="5"></select></td>
                                                    <td class="dataLabel"><input type="button" class="button btnAddHDV" value="Add row"></td>
                                                    <td class="dataLabel" colspan="4">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="dataLabel">Loại chí phí</td>
                                                    <td class="dataLabel">Số lượng</td>
                                                    <td class="dataLabel">Đơn giá</td>
                                                    <td class="dataLabel">Số đêm/lần</td>
                                                    <td class="dataLabel">Thành tiền</td>
                                                    <td class="dataLabel">Thuế suất</td>
                                                    <td class="dataLabel">Thuế</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                                {$htmlhdvmt}  
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="dataLabel">Tổng chí phí</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" class="center" name="tongchi_hvd_mt" id="tongchi_hvd_mt" value="{$tongchi_hvd_mt}"/></td>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" class="center" name="tongthue_hvd_mt" id="tongthue_hvd_mt" value="{$tongthue_hvd_mt}"/></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <fieldset>
                                        <legend><h4>Miền nam</h4></legend>
                                        <table class="table_clone" id="cphdv_mn" cellpadding="0" cellspacing="0" width="100%" border="0">
                                            <thead>
                                                <tr>
                                                    <td class="dataLabel"><input type="checkbox" class="checkedbox" name="checkbox" id="checkbex" value="miennam">Chọn <div id="waitting"></div></td>
                                                    <td class="dataLabel"> <select class="listcongtacphi" name="listcongtacphi" id="listcongtacphi" size="5"></select></td>
                                                    <td class="dataLabel"><input type="button" class="button btnAddHDV" value="Add row"></td>
                                                    <td class="dataLabel" colspan="4">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td class="dataLabel">Loại chí phí</td>
                                                    <td class="dataLabel">Số lượng</td>
                                                    <td class="dataLabel">Đơn giá</td>
                                                    <td class="dataLabel">Số đêm/lần</td>
                                                    <td class="dataLabel">Thành tiền</td>
                                                    <td class="dataLabel">Thuế suất</td>
                                                    <td class="dataLabel">Thuế</th>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </thead>  
                                            <tbody>
                                                {$htmlhdvmn}  
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="dataLabel"> Tổng chí phí</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" class="center" name="tongchi_hvd_mn" id="tongchi_hvd_mn" value="{$tongchi_hvd_mn}"/></td>
                                                    <td>&nbsp;</td>
                                                    <td><input type="text" class="center" name="tongthue_hvd_mn" id="tongthue_hvd_mn" value="{$tongthue_hvd_mn}"/></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </fieldset>
                                </td>
                            </tr> 
                        </table>
                    </div> 
                </div> 
            </fieldset>

            <!-- KET THUC CHI PHI CONG TAC CUA HDV-->

            <!-- CHI PHI KHAC -->

            <fieldset class="tabForm" >
                <legend><h3>CHI PHÍ KHÁC</h3></legend>
                <div>
                    <p>&nbsp;</p>
                    <a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30"/></a>
                    <div class="displayandshow"> 
                        <table class="table_clone" cellpadding="4" id="chiphikhac" cellspacing="4" width="100%" style="border-collapse: collapse;">
                            <thead>
                                <tr>
                                    <th>Loại dịch vụ</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <!--                            <th>FOC</th>-->
                                    <th>Thành tiền</th>
                                    <th>Thuế suất</th>
                                    <th>Thuế</th>
                                    <th>&nbsp;</th>
                                </tr>
                                <tfoot>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th class="dataField">&nbsp;</th>
                                        <th class="dataField">&nbsp;</th>
                                        <th class="dataField">&nbsp;</th>
                                        <td class="dataField"><input type="text" class="center" id="chiphikhac_tongcong" name="chiphikhac_tongcong" value="{$chiphikhac_tongcong}"></td>
                                        <td class="dataField"><input type="text" class="center" id="chiphikhac_tongthue" name="chiphikhac_tongthue" value="{$chiphikhac_tongthue}"></td>
                                        <th class="dataField">&nbsp;</th>  
                                        <th class="dataField">&nbsp;</th>  
                                    </tr>
                                </tfoot>
                            </thead>

                            <tbody>
                                {if $ID eq '' or $COUNTCPK eq 0}
                                <tr>
                                    <td class="dataField"><input type="text" class="loaidichvu" name="chiphikhac_loaidichvu[]" id="chiphikhac_loaidichvu"></td>
                                    <td class="dataField"><input type="text" class="soluong cpk_soluong highlight center" name="chiphikhac_soluong[]" id="chiphikhac_soluong"></td>
                                    <td class="dataField"><input type="text" class="dongia center" name="chiphikhac_dongia[]" id="chiphikhac_dongia"></td>
                                    <!--                            <td class="dataField"><input type="text" class="foc center" name="chiphikhac_foc[]" id="chiphikhac_foc"></td>-->
                                    <td class="dataField"><input type="text" class="thanhtien center" name="chiphikhac_thanhtien[]" id="chiphikhac_thanhtien"></td>
                                    <td class="dataField"><input type="text" class="thuesuat center" name="chiphikhac_thuesuat[]" id="chiphikhac_thuesuat"></td>
                                    <td class="dataField"><input type="text" class="vat center" name="chiphikhac_vat[]" id="chiphikhac_vat"></td>
                                    <td class="dataField"><input type="button" class="btnAddRow" value="Add Row"> <input type="button" class="btnDelRow" value="Delete Row"></td>
                                </tr>
                                {/if}
                                {$CHIPHIKHACHTML}
                            </tbody>
                        </table>
                    </div>
                </div>
            </fieldset>

            <!-- kET THUC PHAN CHI PHI KHAC -->


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
                        <td class="center"><input name="tongchiphi" class="center" type="text" id="tongchiphi" value="{$TONGCHIPHI}"/></td>
                        <td class="center"><input name="tongthue" class="center" type="text" id="tongthue" value="{$TONGTHUE}"/></td>
                        <td class="center">&nbsp;</td>
                        <td class="center">&nbsp;</td>
                        <td class="center">&nbsp;</td>
                    </tr>
                </table>
            </fieldset>

            <!-- PHẦN CÁC KHOẢN GIÁ BÁN CỦA CHIẾT TÍNH-->

            <fieldset>
                <legend><h3>GIÁ BÁN</h3></legend>
                <div>
                    <p>&nbsp;</p>
                    <a class="showdiv"><img src="custom/themes/default/images/btndown.png" width="30" height="30"/></a> &nbsp; <a class="hidediv"><img src="custom/themes/default/images/btnup.png" width="30" height="30"/></a>
                    <div class="displayandshow">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tabForm">
                            <tr>
                                <td class="dataLabel"><h4>Giá Bán</h4></td>
                                <td class="dataLabel"><h4>Số lượng</h4></td>
                                <td class="dataLabel"><h4>Đơn Giá</h4></td>
                                <td class="dataLabel"><h4>FOC</h4></td>
                                <td class="dataLabel"><h4>Thành Tiền</h4></td>
                                <td class="dataLabel"><h4>Thuế Suất</h4></td>
                                <td class="dataLabel"><h4>Thuế </h4></td>
                            </tr>

                            <tr>
                                <td class="dataLabel" colspan="7"><h3>1) GIÁ CÓ VMB/TÀU HỎA</h3></td>
                            </tr>

                            <tr>
                                <td class="dataLabel">Khách người lớn</td>
                                <td class="dataField"><input class="soluong giaban_sl_nl highlight center" type="text" id="sl_khach_nl_1" name="sl_khach_nl_1" value="{$sl_khach_nl_1}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_khach_nl_1" name="dg_khach_nl_1" value="{$dg_khach_nl_1}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_khach_nl_1" name="foc_khach_nl_1" value="{$foc_khach_nl_1}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_khach_nl_1" name="tt_khach_nl_1" value="{$tt_khach_nl_1}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_khach_nl_1" name="ts_khach_nl_1" value="{$ts_khach_nl_1}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_khach_nl_1" name="thue_khach_nl_1" value="{$thue_khach_nl_1}"></td>
                            </tr>

                            <tr>
                                <td class="dataLabel">Trẻ em từ 5-11 tuổi</td>
                                <td class="dataField"><input class="soluong giaban_sl_te highlight center" type="text" id="sl_treem_1" name="sl_treem_1" value="{$sl_treem_1}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_treem_1" name="dg_treem_1" value="{$dg_treem_1}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_treem_1" name="foc_khach_nl_1" value="{$foc_treem_1}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_treem_1" name="tt_treem_1" value="{$tt_treem_1}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_treem_1" name="ts_treem_1" value="{$ts_treem_1}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_treem_1" name="thue_treem_1" value="{$thue_treem_1}"></td>
                            </tr>

                            <tr>
                                <td class="dataLabel">Phụ thu phòng đơn</td>
                                <td class="dataField"><input class="soluong center" type="text" id="sl_phuthuphongdon_1" name="sl_phuthuphongdon_1" value="{$sl_phuthuphongdon_1}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_phuthuphongdon_1" name="dg_phuthuphongdon_1" value="{$dg_phuthuphongdon_1}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_phuthuphongdon_1" name="foc_khach_nl_1" value="{$foc_treem_1}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_phuthuphongdon_1" name="tt_phuthuphongdon_1" value="{$tt_phuthuphongdon_1}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_phuthuphongdon_1" name="ts_phuthuphongdon_1" value="{$ts_phuthuphongdon_1}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_phuthuphongdon_1" name="thue_phuthuphongdon_1" value="{$thue_phuthuphongdon_1}"></td>
                            </tr>

                            <tr>
                                <td class="dataLabel">Phụ thu khác</td>
                                <td class="dataField"><input class="soluong center" type="text" id="sl_phuthukhac_1" name="sl_phuthukhac_1" value="{$sl_phuthukhac_1}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_phuthukhac_1" name="dg_phuthukhac_1" value="{$dg_phuthukhac_1}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_phuthukhac_1" name="foc_phuthukhac_1" value="{$foc_phuthukhac_1}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_phuthukhac_1" name="tt_phuthukhac_1" value="{$tt_phuthukhac_1}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_phuthukhac_1" name="ts_phuthukhac_1" value="{$ts_phuthukhac_1}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_phuthukhac_1" name="thue_phuthukhac_1" value="{$thue_phuthukhac_1}"><td>
                            </tr>

                            <tr>
                                <td class="dataLabel" colspan="7"><h3> 2) GIÁ KHÔNG CÓ VMB/TÀU HỎA</h3></td>
                            </tr>

                            <tr>
                                <td class="dataLabel">Khách người lớn</td>
                                <td class="dataField"><input class="soluong giaban_sl_nl highlight center" type="text" id="sl_khach_nl_2" name="sl_khach_nl_2" value="{$sl_khach_nl_2}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_khach_nl_2" name="dg_khach_nl_2" value="{$dg_khach_nl_2}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_khach_nl_2" name="foc_khach_nl_2" value="{$foc_khach_nl_2}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_khach_nl_2" name="tt_khach_nl_2" value="{$tt_khach_nl_2}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_khach_nl_2" name="ts_khach_nl_2" value="{$ts_khach_nl_2}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_khach_nl_2" name="thue_khach_nl_2" value="{$thue_khach_nl_2}"></td>
                            </tr>

                            <tr>
                                <td class="dataLabel">Trẻ em từ 5-11 tuổi</td>
                                <td class="dataField"><input class="soluong giaban_sl_te highlight center" type="text" id="sl_treem_2" name="sl_treem_2" value="{$sl_treem_2}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_treem_2" name="dg_treem_2" value="{$dg_treem_2}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_treem_2" name="foc_khach_nl_2" value="{$foc_treem_2}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_treem_2" name="tt_treem_2" value="{$tt_treem_2}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_treem_2" name="ts_treem_2" value="{$ts_treem_2}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_treem_2" name="thue_treem_2" value="{$thue_treem_2}"></td>
                            </tr>

                            <tr>
                                <td class="dataLabel">Phụ thu phòng đơn</td>
                                <td class="dataField"><input class="soluong center" type="text" id="sl_phuthuphongdon_2" name="sl_phuthuphongdon_2" value="{$sl_phuthuphongdon_2}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_phuthuphongdon_2" name="dg_phuthuphongdon_2" value="{$dg_phuthuphongdon_2}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_phuthuphongdon_2" name="foc_khach_nl_2" value="{$foc_treem_2}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_phuthuphongdon_2" name="tt_phuthuphongdon_2" value="{$tt_phuthuphongdon_2}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_phuthuphongdon_2" name="ts_phuthuphongdon_2" value="{$ts_phuthuphongdon_2}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_phuthuphongdon_2" name="thue_phuthuphongdon_2" value="{$thue_phuthuphongdon_2}"></td>
                            </tr>

                            <tr>
                                <td class="dataLabel">Phụ thu khác</td>
                                <td class="dataField"><input class="soluong center" type="text" id="sl_phuthukhac_2" name="sl_phuthukhac_2" value="{$sl_phuthukhac_2}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_phuthukhac_2" name="dg_phuthukhac_2" value="{$dg_phuthukhac_2}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_phuthukhac_2" name="foc_phuthukhac_2" value="{$foc_phuthukhac_2}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_phuthukhac_2" name="tt_phuthukhac_2" value="{$tt_phuthukhac_2}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_phuthukhac_2" name="ts_phuthukhac_2" value="{$ts_phuthukhac_2}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_phuthukhac_2" name="thue_phuthukhac_2" value="{$thue_phuthukhac_2}"><td>
                            </tr>

                            <tr>
                                <td class="dataLabel" colspan="7"><h3> 3) CHẾ ĐỘ MIỄN PHÍ F.O.C</h3></td>
                            </tr>

                            <tr>
                                <td class="dataLabel"><input type="text" id="foc_option" name="foc_option" value="{$foc_option}" size="40"/></td>
                                <td class="dataField"><input class="soluong center" type="text" id="sl_foc_16" name="sl_foc_16" value="{$sl_foc_16}"></td>
                                <td class="dataField"><input class="dongia center" type="text" id="dg_foc_16" name="dg_foc_16" value="{$dg_foc_16}"></td>
                                <td class="dataField"><input class="foc center" type="text" id="foc_foc_16" name="foc_foc_16" value="{$foc_foc_16}"></td>
                                <td class="dataField"><input class="thanhtien center" type="text" id="tt_foc_16" name="tt_foc_16" value="{$tt_foc_16}"></td>
                                <td class="dataField"><input class="thuesuat center" type="text" id="ts_foc_16" name="ts_foc_16" value="{$ts_foc_16}"></td>
                                <td class="dataField"><input class="vat center" type="text" id="thue_foc_16" name="thue_foc_16" value="{$thue_foc_16}"></td>
                            </tr>

                            <!-- <tr>
                            <td class="dataLabel">FOC (với đoàn 10-15 người)</td>
                            <td class="dataField"><input class="soluong center" type="text" id="sl_treem_2" name="sl_foc_1015" value="{$sl_foc_1015}"></td>
                            <td class="dataField"><input class="dongia center" type="text" id="dg_foc_1015" name="dg_foc_1015" value="{$dg_foc_1015}"></td>
                            <td class="dataField"><input class="foc center" type="text" id="foc_foc_1015" name="foc_foc_1015" value="{$foc_foc_1015}"></td>
                            <td class="dataField"><input class="thanhtien center" type="text" id="tt_foc_1015" name="tt_foc_1015" value="{$tt_foc_1015}"></td>
                            <td class="dataField"><input class="thuesuat center" type="text" id="ts_foc_1015" name="ts_foc_1015" value="{$ts_foc_1015}"></td>
                            <td class="dataField"><input class="vat center" type="text" id="thue_foc_1015" name="thue_foc_1015" value="{$thue_foc_1015}"></td>
                            </tr>

                            <tr>
                            <td class="dataLabel">FOC (với đoàn dưới 10 người)</td>
                            <td class="dataField"><input class="soluong center" type="text" id="sl_foc_10" name="sl_foc_10" value="{$sl_foc_10}"></td>
                            <td class="dataField"><input class="dongia center" type="text" id="dg_foc_10" name="dg_foc_10" value="{$dg_foc_10}"></td>
                            <td class="dataField"><input class="foc center" type="text" id="foc_foc_10" name="foc_foc_10" value="{$foc_foc_10}"></td>
                            <td class="dataField"><input class="thanhtien center" type="text" id="tt_foc_10" name="tt_foc_10" value="{$tt_foc_10}"></td>
                            <td class="dataField"><input class="thuesuat center" type="text" id="ts_foc_10" name="ts_foc_10" value="{$ts_foc_10}"></td>
                            <td class="dataField"><input class="vat center" type="text" id="thue_foc_10" name="thue_foc_10" value="{$thue_foc_10}"></td>
                            </tr> -->


                            <tr>
                                <td class="dataLabel"><h3>TỔNG GIÁ BÁN</h3></td>
                                <td class="dataField">&nbsp;</td>
                                <td class="dataField">&nbsp;</td>
                                <td class="dataField">&nbsp;</td>
                                <td class="dataField"><input class="center" type="text" id="tongcong_giaban" name="tongcong_giaban" value="{$tongcong_giaban}"></td>
                                <td class="dataField">&nbsp;</td>
                                <td class="dataField"><input class="center" type="text" id="tongthue_giaban" name="tongthue_giaban" value="{$tongthue_giaban}"></td>
                            </tr>

                        </table>
                    </div>
                </div>
            </fieldset>

            <!-- KẾT THÚC PHẦN CÁC KHOẢN GIÁ BÁN -->


            <!-- BÁO CÁO CHI TIẾT-->
            <fieldset>
                <legend><h3>CHI TIẾT</h3></legend>
                <table width="100%" border="1" cellspacing="0" cellpadding="0" class="tabForm" style="border-collapse:collapse">
                    <tr>
                        <td>&nbsp;</td>
                        <th>DUYỆT</th>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td width="15%" class="dataLabel">VAT ĐẦU RA</td>
                        <td width="25%" class="center dataField"><input name="vatdaura" class="center" type="text" id="vatdaura"  value="{$VATDAURA}" /></td>
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
                        <td width="15%" class="dataLabel">VAT ĐẦU VÀO</td>
                        <td class="center dataField"><input name="vatdauvao" class="center" type="text" id="vatdauvao"  value="{$VATDAUVAO}" /></td>
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
                        <td width="15%" class="dataLabel">VAT PHẢI ĐÓNG</td>
                        <td width="25%" class="center dataField"><input name="vatphaidong" class="center" type="text" id="vatphaidong"  value="{$VATPHAIDONG}" /></td>
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
                        <td width="15%" class="dataLabel">DOANH THU</td>
                        <td width="25%" class="center dataField"><input name="doanhthu" class="center" type="text" id="doanhthu" value="{$DOANHTHU}" /></td>
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
                        <td width="15%" class="dataLabel">TỔNG CHI PHÍ</td>
                        <td width="25%" class="center dataField"><input name="tongchiphi1" class="center" type="text" id="tongchiphi1" value="{$TONGCHIPHI1}" /></td>
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
                        <td width="15%" class="dataLabel">GIÁ VỐN / 1 KHÁCH</td>
                        <td width="25%" class="center dataField"><input name="giavontrenkhach" class="center" type="text" id="giavontrenkhach"  value="{$GIAVONTRENKHACH}" /></td>
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
                        <td width="25%" class="center dataField"><input name="giabantrenkhach" class="center" type="text" id="giabantrenkhach" value="{$GIABANTRENKHACH}"/></td>
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
                        <td width="15%" class="dataLabel">LÃI KHÁCH</td>
                        <td width="25%" class="center dataField"><input name="laikhach" class="center" type="text" id="laikhach" value="{$LAIKHACH}" /></td>
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
                        <td width="15%" class="dataLabel">TỔNG LÃI</td>
                        <td width="25%" class="center dataField"><input name="tonglai" class="center" type="text" id="tonglai" value="{$TONGLAI}" /></td>
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
                        <td width="15%" class="dataLabel">TỶ LỆ SAU VAT</td>
                        <td width="25%" class="center dataField"><input name="tylesauthuevat" class="center" type="text" id="tylesauthuevat" value="{$tylesauthuevat}" /> 
                            %</td>
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
                        <td width="15%" class="notcenter dataLabel">VAT TNDN</td>
                        <td width="25%" class="center dataField"><input name="thuethunhapdn" class="center" type="text" id="thuethunhapdn" value="{$thuethunhapdn}" /></td>
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
                        <td width="15%" class="notcenter dataLabel">LÃI RÒNG (NETT PROFIT)</td>
                        <td width="25%" class="center dataField"><input name="lairongnettprofit" class="center" type="text" id="lairongnettprofit" value="{$lairongnettprofit}" /></td>
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
                        <td width="15%" class="dataLabel">TỶ LỆ SAU VAT TNDN</td>
                        <td width="25%" class="center dataField"><input name="tylesauthuetndn" class="center" type="text" id="tylesauthuetndn" value="{$tylesauthuetndn}" /> 
                            %</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                </table>

            </fieldset>
            <!-- KẾT THÚC BÁO CÁO CHI TIẾT-->
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
