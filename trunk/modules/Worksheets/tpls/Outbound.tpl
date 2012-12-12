<html>
<head>
    <title>OB Package</title>

    {*<link rel="stylesheet" type="text/css" href="modules/Worksheets/css/jquery-ui.css">*}
    <link rel="stylesheet" type="text/css" href="modules/Worksheets/css/flick/jquery-ui-1.8.17.custom.css">
    <script type="text/javascript" src="modules/Worksheets/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="modules/Worksheets/js/jquery-ui-1.8.17.custom.min.js"></script>
    {*<script type="text/javascript" src="modules/Worksheets/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="modules/Worksheets/js/jquery.ui.widget.min.js"></script>*}
    <script type="text/javascript" src="modules/Worksheets/js/jquery.cookie.js"></script>
    {*<script type="text/javascript" src="modules/Worksheets/js/jquery.alphanumeric.js"></script>
    <script type="text/javascript" src="modules/Worksheets/js/jquery.alphanumeric.pack.js"></script>*}
    <script type="text/javascript" src="modules/Worksheets/js/calculate_ob_break.js"></script>
    <script type="text/javascript" src="modules/Worksheets/js/jquery.table.clone.js"></script>
    <script type="text/javascript" src="{sugar_getjspath file='custom/include/js/jquery.formatCurrency-1.3.0.js'}"></script>      
    <script type="text/javascript" src="{sugar_getjspath file='modules/Worksheets/js/FomatCurrency.js'}"></script> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    {literal}
    <style>
        .ct_sl1 {
            background-color: #99FFCC;
        }

        .ct_sl2 {
            background-color: #99FFFF;
        }

        .ct_sl3 {
            background-color: #FFFFCC;
        }

        .ct_sl4 {
            background-color: #FF99FF;
        }

        .disable {
            background: none repeat scroll 0% 0% #EEEEEE;
        }

        input {
            text-align: center;
        }

        input[type="text"] {
            font-size: 12px;
            padding: 2px 4px 3px 4px;
            border-radius: 3px;
            margin: 3px auto;
        }

        input[type="text"]:focus {
            box-shadow: 0 0 5px #ccf;
            outline:none;
        }

        input[type="button"],.cacbutton .button {
            padding: 3px 4px 3px 4px;
            border-radius: 4px;
        }

        .tinhtoan {
            color: red;
            font-size: 14px;
            font-style: inherit;
        }
        .lblNguoiLon{
            color:#f00;
        }
        .table-main-setting, .table-users-number {
            border-collapse: collapse;
            margin: 10px auto;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: block;
            padding:5px;
        }

        .table-main-setting:hover, .table-users-number:hover {
            box-shadow: 0 0 5px #ccc;
        }

        .table-main-setting > tbody > tr > td {
            /*   border: 1px solid #ccc;*/
            padding: 2px 10px 2px 5px;
        }

        .table-main-setting > tbody > tr > td.dataLabel {
            width: 100px;
            font-weight: bold;
            text-align: right;
        }

        .hanh-trinh {
            width: 184px !important;
        }

        .table-users-number > tbody > tr > td {
            padding: 2px 10px 2px 5px;
        }

        .table-users-number > tbody > tr > td.dataLabel {
            width: 115px;
            font-weight: bold;
            text-align: right;
        }

        .table-users-number > tbody > tr > td input[type="text"] {
            font-size: 12px;
            padding: 2px 4px 3px 4px;
            border-radius: 3px;
            margin: 3px auto;
        }

        .table-users-number > tbody > tr > td input[type="text"]:focus {
            box-shadow: 0 0 5px #ccf;
        }
    </style>
    <script type='text/javascript'>
        $(document).ready(
        function () {

            $("#tabs").tabs({
                cookie:{}
            });
            $('.madetour').click(function () {
                open_popup("GroupPrograms", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name":"ob_break", "field_to_name_array":{"id":"groupprogrd737rograms_ida", "groupprogram_code":"groupprograorksheets_name", "start_date_group":"ngaykhoihanh", "end_date_group":"ngayketthuc", "adults":"NguoiLon1", "child_2":"TreEm2Tuoi1", "childfrom2to12":"TreEm12Tuoi1"}}, "single", true);
            });
            $('.openuser').click(function () {
                open_popup('Users', 600, 400, '', true, false, {"call_back_function":"set_return", "form_name":"ob_break", "field_to_name_array":{"id":"assigned_user_id", "user_name":"assigned_user_name"}});
            });
            /*$('.madetour').mouseleave(function(){
            $('#NguoiLon2').val($('#NguoiLon1').val());
            $('#TreEm2Tuoi2').val($('#TreEm2Tuoi1').val());
            $('#TreEm12Tuoi2').val($('#TreEm12Tuoi1').val());
            });*/
            $('.disable').attr("readonly", true);
            var datepicker_setting = {
                showAnim:"drop",
                showOtherMonths:true,
                selectOtherMonths:true,
                dateFormat:"dd/mm/yy"
            };
            $("#ngaykhoihanh").datepicker(datepicker_setting);
            $("#ngayketthuc").datepicker(datepicker_setting);
            $("#ngaytygia").datepicker(datepicker_setting);
        }
        );
        /* Calendar.setup ({ inputField:'ngaytygia', ifFormat:'{$CALENDAR_DATEFORMAT}', showsTime:false, button:'ngaytygia_trigger', singleClick:true, step:1 });*/
        addToValidate('EditView', 'expiration', 'date', false, 'expiration');
    </script>
    {/literal}
</head>
<body>
    <form action="index.php" method="post" name="ob_break" id="ob_break">
        <input type="hidden" name="module" value="Worksheets">
        <input type="hidden" name="record" value="{$ID}">
        <input type="hidden" name="action">
        <input type="hidden" name="return_module" value="{$RETURN_MODULE}">
        <input type="hidden" name="return_id" value="{$RETURN_ID}">
        <input type="hidden" name="return_action" value="{$RETURN_ACTION}">

        <div class="cacbutton">
            <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button"
                onclick="this.form.action.value='Save';return check_form('ob_package');"
                type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  ">
            <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button"
                onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'"
                type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
            {if $ID neq ''}
            <input title="View Change Log" class="button"
                onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Worksheets", true, false, {$view_change_log} ); return false;'
                type="submit" value="View Change Log">
            {/if}
        </div>

        <!-- PHAN THIET LAP CHUNG -->
        <table class="table-main-setting" width="100%" cellspacing="0" cellpadding="0">
           <tr>
                <td class="dataLabel">Tên chiết tính</td>
                <td>
                    <input type="text" name="name" id="name" value="{$name}"/>
                </td>
                <td class="dataLabel">&nbsp;</td>
                <td class="dataLabel">&nbsp;</td>
            </tr>
            <tr>
                <td class="dataLabel">Tour code</td>
                <td>
                    <input type="text" name="groupprograorksheets_name" id="groupprograorksheets_name" value="{$MADETOUR}"/>
                    <input type="hidden" name="groupprogrd737rograms_ida" id="groupprogrd737rograms_ida"
                        value="{$MADETOUR_ID}"/>
                    <input type="button" name="btnTourcode" id="button" value="Select" class="madetour"/>
                </td>
                <td class="dataLabel">Hành trình</td>
                <td>
                    <input type="text" name="HanhTrinh" id="HanhTrinh" class="hanh-trinh" value="{$HANHTRINH}"/>
                    <input type="hidden" id="type" name="type" value="{$TYPE}">
                </td>
            </tr>
            <tr>
                <td height="24" class="dataLabel">Ngày Khởi Hành</td>
                <td align="left">
                    <input type="text" readonly="readonly" name="ngaykhoihanh" id="ngaykhoihanh" value="{$NGAYKHOIHANH}"/>
                </td>
                <td class="dataLabel">Ngày về</td>
                <td align="left">
                    <input type="text" readonly="readonly" name="ngayketthuc" value="{$NGAYKETTHUC}" id="ngayketthuc"/>
                </td>
            </tr>
            <tr>
                <td height="24" class="dataLabel">Phiên bản</td>
                <td align="left"><input type="text" name="version" id="version" size="10" value="{$VERSION}"></td>
                <td class="dataLabel">Ngày Tỷ Giá</td>
                <td align="left"><span class="dataField">
                        <input readonly="readonly" id='ngaytygia' name='ngaytygia'
                            onBlur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"
                            type="text" tabindex='1' size='15' maxlength='10'
                            value="{$NGAYTYGIA}"/>
                        {*<img
                            src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="ngaytygia_trigger"
                            align="absmiddle">(dd/mm/yy)*}</span></td>
            </tr>
            <tr>
                <td height="24" class="dataLabel">Tỷ Giá</td>
                <td align="left"><span class="dataField">
                        <input type="text" size="10" name="tygia" id="tygia"
                            value="{$TYGIA}">
                    </span></td>
                <td class="dataLabel">Tiền tệ</td>
                <td align="left"><label for="outbount_currency"></label>
                  <select name="outbound_currency" id="outbound_currency">{$outbound_currency}
                </select></td>
            </tr>
            <tr>
                <td height="24" class="dataLabel">Ghi chú</td>
                <td align="left"><textarea cols="60" rows="5" id="note" name="note">{$NOTE}</textarea></td>
                <td class="dataLabel">&nbsp;</td>
                <td align="left">&nbsp;</td>
            </tr>
        </table>

        <h2>SỐ LƯỢNG KHÁCH</h2>
        <table class="table-users-number" cellspacing="0" cellpadding="0">
            <tr>
                <td class="dataLabel"><span class="lblNguoiLon">Người lớn</span></td>
                <td><input name="NguoiLon1" type="text" class="giaban calculate" id="NguoiLon1"
                        value="{$NguoiLon1}" size="10"/>
                    <input name="NguoiLon2" type="text" class="giaban calculate" id="NguoiLon2"
                        value="{$NguoiLon2}" size="10"/></td>
                <td class="dataLabel" style="width:185px">Số lượng FOC cho khách hàng</td>
                <td><input type="text" name="foc_number" id="foc_number" value="{$FOC_NUMBER}" class="giaban" size="10"></td>
            </tr>
            <tr>
                <td height="25" class="dataLabel">Trẻ em dưới 2 tuổi</td>
                <td><input name="TreEm2Tuoi1" value="{$TXTTREEM2TUOI1}" type="text"
                        class="giaban calculate" id="TreEm2Tuoi1" size="10"/>
                    <input name="TreEm2Tuoi2" value="{$TXTTREEM2TUOI2}" type="text"
                        class="giaban calculate" id="TreEm2Tuoi2" size="10"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="dataLabel">Trẻ em từ 2- 12 tuổi</td>
                <td><input name="TreEm12Tuoi1" type="text" value="{$TXTTREEM12TUOI1}"
                        class="giaban calculate" id="TreEm12Tuoi1" size="10"/>
                    <input type="text" name="TreEm12Tuoi2" value="{$TXTTREEM12TUOI2}"
                        class="giaban calculate" id="TreEm12Tuoi2" size="10"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="dataLabel">Số bữa ăn</td>
                <td><input type="text" name="txtSoBuaAn1" value="{$TXTSOBUAAN1}"
                        class="giaban calculate" id="txtSoBuaAn1" size="10"/>
                    <input type="text" name="txtSoBuaAn2" value="{$TXTSOBUAAN2}"
                        class="giaban calculate" id="txtSoBuaAn2" size="10"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="dataLabel">Tour Leader</td>
                <td><input type="text" name="txtTourLeader1" value="{$TXTTOURLEADER1}"
                        class="giaban" id="txtTourLeader1" size="10"/>
                    <input type="text" name="txtTourLeader2" value="{$TXTTOURLEADER2}"
                        class="giaban" id="txtTourLeader2" size="10"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="dataLabel">FOC VMB</td>
                <td><input type="text" name="txtFOCVMB1" value="{$TXTFOCVMB1}" class="giaban"
                        id="txtFOCVMB1" size="10"/>
                    <input type="text" name="txtFOCVMB2" value="{$TXTFOCVMB2}" class="giaban"
                        id="txtFOCVMB2" size="10"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="dataLabel">FOC Land</td>
                <td><input type="text" value="{$TXTFOCLAND1}" name="txtFOCLand1"
                        class="giaban calculate" id="txtFOCLand1" size="10"/>
                    <input type="text" value="{$TXTFOCLAND2}" class="calculate" name="txtFOCLand2"
                        id="txtFOCLand2" size="10"/></td>
                <td align="left" class="dataLabel">Land 2 trẻ em</td>
                <td><input type="text" class="giaban calculate" name="land_treem" id="land_treem" value="{$LAND_TREEM}"
                        size="10"></td>
            </tr>
            <tr>
                <td class="dataLabel">FOC VMB nội địa</td>
                <td><input type="text" value="{$TXTFOCVMBNOIDIA1}" name="txtFOCVMBNoiDia1"
                        class="giaban" id="txtFOCVMBNoiDia1" size="10"/>
                    <input type="text" value="{$TXTFOCVMBNOIDIA2}" name="txtFOCVMBNoiDia2"
                        id="txtFOCVMBNoiDia2" class="calculate" size="10"/></td>
                <td class="dataLabel">CLTG</td>
                <td><input type="text" value="{$TXTCLTG}" class="giaban" name="txtCLTG"
                        id="txtCLTG" size="10"/></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td class="dataLabel">Single</td>
                <td><input type="text" name="single1" value="{$SINGLE1}" class="giaban"
                        id="single1" size="10"/>
                    <input type="text" name="single2" value="{$SINGLE1}" class="calculate"
                        id="single2" size="10"/></td>
                <td class="dataLabel"></td>
                <td></td>
            </tr>
        </table>
        <br>

        <div id="tabs">
            <ul>
                <li><a href="#tabs-2">CHI - VẬN CHUYỂN</a></li>
                <li><a href="#tabs-3">CHI - LANDFEE PACKAGE</a></li>
                <li><a href="#tabs-4">CHI - VISA</a></li>
                <li><a href="#tabs-5">CHI - HƯỚNG DẪN VIÊN</a></li>
                <li><a href="#tabs-6">CHI - DỊCH VỤ KHÁC</a></li>
                <li><a href="#tabs-1">THU</a></li>
                <li><a href="#tabs-8">CHI OPTION</a></li>
                <li><a href="#tabs-7">THU OPTION</a></li>
            </ul>
            <div id="tabs-1">
                <table>
                    <td class="dataLabel"><b>THU</b></td>
                    <tr>
                        <td colspan="4" align="center" class="ct_sl1">Ks 3 Sao</td>
                        <td colspan="3" align="center" class="ct_sl1">KS 4 Sao</td>
                        <td colspan="4" align="center" class="ct_sl2">Ks 3 Sao</td>
                        <td colspan="2" align="center" class="ct_sl2">Ks 4 Sao</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Người lớn</td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAONGUOILON1}" class="calculate" name="ks3saonguoilon1"
                                id="ks3saonguoilon1" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAONGUOILON2}" class="calculate convertcurrency" name="ks3saonguoilon2"
                                id="ks3saonguoilon2" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAONGUOILON3}" class="calculate convertcurrency" name="ks3saonguoilon3"
                                id="ks3saonguoilon3" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS4SAONGUOILON1}" class="calculate convertcurrency" name="ks4saonguoilon1"
                                id="ks4saonguoilon1" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS4SAONGUOILON2}" class="calculate convertcurrency" name="ks4saonguoilon2"
                                id="ks4saonguoilon2" size="10"/></td>
                        <td class="ct_sl1">$</td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAONGUOILON4}" class="calculate" name="ks3saonguoilon4"
                                id="ks3saonguoilon4" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAONGUOILON5}" class="calculate convertcurrency" name="ks3saonguoilon5"
                                id="ks3saonguoilon5" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAONGUOILON6}" class="calculate convertcurrency" name="ks3saonguoilon6"
                                id="ks3saonguoilon6" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS4SAONGUOILON3}" class="calculate convertcurrency" name="ks4saonguoilon3"
                                id="ks4saonguoilon3" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS4SAONGUOILON4}" class="calculate convertcurrency" name="ks4saonguoilon4"
                                id="ks4saonguoilon4" size="10"/></td>

                        <td class="ct_sl2">$</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Phụ thu khác (+)</td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOPHUTHUKHAC1}" name="ks3saophuthukhac1"
                                class="phuthukhac" id="ks3saophuthukhac1" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOPHUTHUKHAC2}" name="ks3saophuthukhac2"
                                class="phuthukhac convertcurrency" id="ks3saophuthukhac2" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOPHUTHUKHAC3}" name="ks3saophuthukhac3"
                                class="phuthukhac convertcurrency" id="ks3saophuthukhac3" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS4SAOPHUTHUKHAC1}" name="ks4saophuthukhac1"
                                class="phuthukhac convertcurrency" id="ks4saophuthukhac1" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS4SAOPHUTHUKHAC2}" name="ks4saophuthukhac2"
                                id="ks4saophuthukhac2" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl1">$</td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOPHUTHUKHAC4}" name="ks3saophuthukhac4"
                                class="phuthukhac" id="ks3saophuthukhac4" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOPHUTHUKHAC5}" name="ks3saophuthukhac5"
                                class="phuthukhac convertcurrency" id="ks3saophuthukhac5" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOPHUTHUKHAC6}" name="ks3saophuthukhac6"
                                class="phuthukhac convertcurrency" id="ks3saophuthukhac6" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS4SAOPHUTHUKHAC3}" name="ks4saophuthukhac3"
                                class="phuthukhac convertcurrency" id="ks4saophuthukhac3" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS4SAOPHUTHUKHAC4}" name="ks4saophuthukhac4"
                                class="phuthukhac convertcurrency" id="ks4saophuthukhac4" size="10"/></td>
                        <td class="ct_sl2">$</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Phụ thu khác (-)</td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOPHUTHUKHAC_1}" name="ks3saophuthukhac_1"
                                class="phuthukhac" id="ks3saophuthukhac_1" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOPHUTHUKHAC_2}" name="ks3saophuthukhac_2"
                                id="ks3saophuthukhac_2" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOPHUTHUKHAC_3}" name="ks3saophuthukhac_3"
                                id="ks3saophuthukhac_3" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS4SAOPHUTHUKHAC_1}" name="ks4saophuthukhac_1"
                                id="ks4saophuthukhac_1" class="phuthukhac convertcurrency" size="10"/></td>

                        <td class="ct_sl1"><input type="text" value="{$KS4SAOPHUTHUKHAC_2}" name="ks4saophuthukhac_2"
                                id="ks4saophuthukhac_2" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl1">$</td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOPHUTHUKHAC_4}" name="ks3saophuthukhac_4"
                                id="ks3saophuthukhac_4" class="phuthukhac" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOPHUTHUKHAC_5}" name="ks3saophuthukhac_5"
                                class="phuthukhac convertcurrency" id="ks3saophuthukhac_5" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOPHUTHUKHAC_6}" name="ks3saophuthukhac_6"
                                class="phuthukhac convertcurrency" id="ks3saophuthukhac_6" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS4SAOPHUTHUKHAC_3}" name="ks4saophuthukhac_3"
                                id="ks4saophuthukhac_3" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS4SAOPHUTHUKHAC_4}" name="ks4saophuthukhac_4"
                                id="ks4saophuthukhac_4" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl2">$</td>
                    </tr>
                    <tr>
                        <td height="27" class="dataLabel">Single Supp</td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOSINGLESUPP1}" name="ks3saosinglesupp1"
                                class="phuthukhac" id="ks3saosinglesupp1" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOSINGLESUPP2}" name="ks3saosinglesupp2"
                                class="phuthukhac convertcurrency" id="ks3saosinglesupp2" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS3SAOSINGLESUPP3}" name="ks3saosinglesupp3"
                                id="ks3saosinglesupp3" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS4SAOSINGLESUPP1}" name="ks4saosinglesupp1"
                                id="ks4saosinglesupp1" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$KS4SAOSINGLESUPP2}" name="ks4saosinglesupp2"
                                class="phuthukhac convertcurrency" id="ks4saosinglesupp2" size="10"/></td>
                        <td class="ct_sl1">$</td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOSINGLESUPP4}" name="ks3saosinglesupp4"
                                id="ks3saosinglesupp4" class="phuthukhac" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOSINGLESUPP5}" name="ks3saosinglesupp5"
                                id="ks3saosinglesupp5" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS3SAOSINGLESUPP6}" name="ks3saosinglesupp6"
                                id="ks3saosinglesupp6" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS4SAOSINGLESUPP3}" name="ks4saosinglesupp3"
                                class="phuthukhac convertcurrency" id="ks4saosinglesupp3" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$KS4SAOSINGLESUPP4}" name="ks4saosinglesupp4"
                                id="ks4saosinglesupp4" class="phuthukhac convertcurrency" size="10"/></td>
                        <td class="ct_sl2">$</td>
                    </tr>
                    <tr>
                        <td class="dataLabel"><b>Tổng thu NL</b></td>
                        <td colspan="3" align="right" class="ct_sl1"><input name="tongthunguoilon1" type="text"
                                class="disable tinhtoan convertcurrency" id="tongthunguoilon1"
                                value="{$TONGTHUNGUOILON1}" size="10"/></td>
                        <td class="ct_sl1">&nbsp;</td>
                        <td class="ct_sl1"><input name="tongthunguoilon2" type="text" class="disable tinhtoan convertcurrency" id="tongthunguoilon2"
                                value="{$TONGTHUNGUOILON2}" size="10"/></td>
                        <td class="ct_sl1">&nbsp;</td>
                        <td colspan="3" align="right" class="ct_sl2"><input name="tongthunguoilon3" type="text"
                                class="disable tinhtoan convertcurrency" id="tongthunguoilon3"
                                value="{$TONGTHUNGUOILON3}" size="10"/></td>
                        <td class="ct_sl2">&nbsp;</td>
                        <td class="ct_sl2"><input name="tongthunguoilon4" type="text" class="disable tinhtoan convertcurrency" id="tongthunguoilon4"
                                value="{$TONGTHUNGUOILON4}" size="10"/></td>
                        <td class="ct_sl2">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Trẻ em dưới 2 tuổi</td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM2TUOI1}" name="treem2tuoi1" class="treem"
                                id="treem2tuoi1" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM2TUOI2}" name="treem2tuoi2" class="treem convertcurrency"
                                id="treem2tuoi2" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM2TUOI3}" name="treem2tuoi3" class="treem convertcurrency"
                                id="treem2tuoi3" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM2TUOI4}" name="treem2tuoi4" id="treem2tuoi4"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM2TUOI5}" name="treem2tuoi5" id="treem2tuoi5"
                                class="treem convertcurrency" size="10"/></td>

                        <td class="ct_sl1">$</td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM2TUOI7}" name="treem2tuoi7" id="treem2tuoi7"
                                class="treem" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM2TUOI8}" name="treem2tuoi8" id="treem2tuoi8"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM2TUOI9}" name="treem2tuoi9" id="treem2tuoi9"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM2TUOI10}" name="treem2tuoi10" id="treem2tuoi10"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM2TUOI11}" name="treem2tuoi11" id="treem2tuoi11"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl2">$</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Trẻ em từ 2- 12 tuổi</td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM12TUOI1}" name="treem12tuoi1" id="treem12tuoi1"
                                class="treem" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM12TUOI2}" name="treem12tuoi2" id="treem12tuoi2"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM12TUOI3}" name="treem12tuoi3" id="treem12tuoi3"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM12TUOI4}" name="treem12tuoi4" id="treem12tuoi4"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl1"><input type="text" value="{$TREEM12TUOI5}" name="treem12tuoi5" id="treem12tuoi5"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl1">$</td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM12TUOI7}" name="treem12tuoi7" id="treem12tuoi7"
                                class="treem" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM12TUOI8}" name="treem12tuoi8" id="treem12tuoi8"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM12TUOI9}" name="treem12tuoi9" id="treem12tuoi9"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM12TUOI10}" name="treem12tuoi10" id="treem12tuoi10"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl2"><input type="text" value="{$TREEM12TUOI11}" name="treem12tuoi11" id="treem12tuoi11"
                                class="treem convertcurrency" size="10"/></td>
                        <td class="ct_sl2">$</td>
                    </tr>
                    <tr>
                        <td class="dataLabel"><b>Tổng thu TE</b></td>
                        <td class="ct_sl1">&nbsp;</td>
                        <td class="ct_sl1">&nbsp;</td>
                        <td class="ct_sl1"><input name="tongthute1" type="text" class="disable tinhtoan convertcurrency" id="tongthute1"
                                value="{$TONGTHUTE1}" size="10"/></td>
                        <td class="ct_sl1">&nbsp;</td>
                        <td class="ct_sl1"><input name="tongthute2" type="text" class="disable tinhtoan convertcurrency" id="tongthute2"
                                value="{$TONGTHUTE2}" size="10"/></td>
                        <td class="ct_sl1">&nbsp;</td>
                        <td colspan="3" align="right" class="ct_sl2"><input name="tongthute3" type="text" class="disable tinhtoan convertcurrency"
                                id="tongthute3" value="{$TONGTHUTE3}" size="10"/></td>
                        <td class="ct_sl2">&nbsp;</td>
                        <td class="ct_sl2"><input name="tongthute4" type="text" class="disable tinhtoan convertcurrency" id="tongthute4"
                                value="{$TONGTHUTE4}" size="10"/></td>
                        <td class="ct_sl2">&nbsp;</td>
                    </tr>

                </table>
          </div>
            <div id="tabs-2">
                <table>
                    <tr bgcolor="#6699FF">
                        <td class="dataLabel"><b>VẬN CHUYỂN</b></td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td colspan="7" align="right"><input name="tongchivanchuyen1" type="text" class="disable tinhtoan formatnumber convertcurrency"
                                id="tongchivanchuyen1" value="{$TONGCHIVANCHUYEN1}"/></td>
                        <td colspan="6" align="right"><input name="tongchivanchuyen2" type="text" class="disable tinhtoan formatnumber convertcurrency"
                                id="tongchivanchuyen2" value="{$TONGCHIVANCHUYEN2}"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">&nbsp;</td>
                        <td class="dataField"><strong>Ghi Chú</strong></td>
                        <td class="dataField"><strong>FOC</strong></td>
                        <td align="center" class="dataLabel">Số lượng Một</td>
                        <td>&nbsp;</td>
                        <td align="center" class="dataLabel">Đơn giá một</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center" class="dataLabel">Thành tiền một</td>
                        <td>&nbsp;</td>
                        <td align="center" class="dataLabel">Số lượng hai</td>
                        <td>&nbsp;</td>
                        <td align="center" class="dataLabel">Đơn giá hai</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td align="center" class="dataLabel">Thành tiền hai</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">VMB người lớn
                            <label for="ghichuvmbnl"></label></td>
                        <td class="dataField"><input name="ghichuvmbnl" type="text" id="ghichuvmbnl" value="{$NGHICHIVMBNL}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focvmbnguoilon" type="text" size="10"
                                id="focvmbnguoilon" value="{$FOCVMBNGUOILON}"></td>
                        <td><input type="text" value="{$VMBNGUOILON1}" name="vmbnguoilon1" class="calculate" id="vmbnguoilon1"
                                size="10"/></td>
                        <td><input name="vmbnguoilon2" type="text" id="vmbnguoilon2" value="x" size="10"/></td>
                        <td><input type="text" value="{$VMBNGUOILON3}" name="vmbnguoilon3" id="vmbnguoilon3" class="calculate dongia convertcurrency"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$VMBNGUOILON4}" name="vmbnguoilon4" id="vmbnguoilon4" class="calculate formatnumber convertcurrency"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" value="{$VMBNGUOILON5}" name="vmbnguoilon5" class="calculate" id="vmbnguoilon5"
                                size="10"/></td>
                        <td><input name="vmbnguoilon6" type="text" id="vmbnguoilon6" value="x" size="10"/></td>
                        <td><input type="text" value="{$VMBNGUOILON7}" name="vmbnguoilon7" class="calculate dongia convertcurrency" id="vmbnguoilon7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$VMBNGUOILON8}" name="vmbnguoilon8" class="calculate formatnumber convertcurrency" id="vmbnguoilon8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">TAX (TẠM TÍNH)</td>
                        <td class="dataField"><input name="ghichutaxtamtinh" type="text" id="ghichutaxtamtinh"
                                value="{$GHICHUTAXTAMTINH}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foctaxtamtinh" type="text" size="10"
                                id="foctaxtamtinh" value="{$FOCTAXTAMTINH}"></td>
                        <td><input type="text" value="{$TAXTAMTINH1}" name="taxtamtinh1" class="calculate" id="taxtamtinh1"
                                size="10"/></td>
                        <td><input name="taxtamtinh2" type="text" id="taxtamtinh2" value="x" size="10"/></td>
                        <td><input type="text" value="{$TAXTAMTINH3}" name="taxtamtinh3" class="calculate dongia convertcurrency" id="taxtamtinh3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$TAXTAMTINH4}" class="calculate formatnumber convertcurrency" name="taxtamtinh4" id="taxtamtinh4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" value="{$TAXTAMTINH5}" class="calculate" name="taxtamtinh5" id="taxtamtinh5"
                                size="10"/></td>
                        <td><input name="taxtamtinh6" type="text" id="taxtamtinh6" value="x" size="10"/></td>
                        <td><input type="text" value="{$TAXTAMTINH7}" class="calculate dongia convertcurrency" name="taxtamtinh7" id="taxtamtinh7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$TAXTAMTINH8}" class="calculate formatnumber convertcurrency" name="taxtamtinh8" id="taxtamtinh8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">VMB Nội Địa người lớn</td>
                        <td class="dataField"><input name="ghichuvmbndnl" type="text" id="ghichuvmbndnl" value="{$GHICHUVMBNDNL}">
                        </td>
                        <td class="dataField"><input class="calculate giaban" name="focvmbndnguoilon" type="text" size="10"
                                id="focvmbndnguoilon" value="{$FOCVMBNDNGUOILON}"></td>
                        <td><input type="text" class="calculate" value="{$VMBNGUOILONND1}" name="vmbnguoilonnd1" id="vmbnguoilonnd1"
                                size="10"/></td>
                        <td><input name="vmbnguoilonnd2" type="text" id="vmbnguoilonnd2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="vmbnguoilonnd3" value="{$VMBNGUOILONND3}" id="vmbnguoilonnd3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" name="vmbnguoilonnd4" value="{$VMBNGUOILONND4}" id="vmbnguoilonnd4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="calculate" name="vmbnguoilonnd5" value="{$VMBNGUOILONND5}" id="vmbnguoilonnd5"
                                size="10"/></td>
                        <td><input name="vmbnguoilonnd6" type="text" id="vmbnguoilonnd6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="vmbnguoilonnd7" value="{$VMBNGUOILONND7}" id="vmbnguoilonnd7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" name="vmbnguoilonnd8" value="{$VMBNGUOILONND8}" id="vmbnguoilonnd8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">XE ĐÓN TIỄN sân bay</td>
                        <td class="dataField"><input name="ghichuxedontien" type="text" id="ghichuxedontien"
                                value="{$GHICHUXEDONTIEN}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focxedontien" type="text" size="10"
                                id="focxedontien" value="{$FOCXEDONTIEN}"></td>
                        <td><input type="text" class="calculate" value="{$XEDONTIEN1}" name="xedontien1" id="xedontien1" size="10"/>
                        </td>
                        <td><input name="xedontien2" type="text" id="xedontien2" value="x" size="10"/></td>
                        <td><input type="text" value="{$XEDONTIEN3}" class="calculate dongia convertcurrency" name="xedontien3" id="xedontien3" size="10"/>
                        </td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$XEDONTIEN4}" class="calculate formatnumber convertcurrency" name="xedontien4" id="xedontien4" size="10"/>
                        </td>
                        <td>&nbsp;</td>
                        <td><input type="text" value="{$XEDONTIEN5}" class="calculate" name="xedontien5" id="xedontien5" size="10"/>
                        </td>
                        <td><input name="xedontien6" type="text" id="xedontien6" value="x" size="10"/></td>
                        <td><input type="text" value="{$XEDONTIEN7}" class="calculate dongia convertcurrency" name="xedontien7" id="xedontien7" size="10"/>
                        </td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$XEDONTIEN8}" class="calculate formatnumber convertcurrency" name="xedontien8" id="xedontien8" size="10"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">VMB trẻ em dưới 2 tuổi

                        </td>
                        <td class="dataField"><input name="chichuvmbte2tuoi" type="text" id="chichuvmbte2tuoi"
                                value="{$GHICHUVMBTE2TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focvmbteduoi2tuoi" title="nhập tỷ lệ % so với giá VMB người lớn để tính giá VMB cho trẻ em dưới 2 tuổi ví tỷ lệ 10% thì nhập là 10" type="text" size="10"
                                id="focvmbteduoi2tuoi" value="{$FOCVMBTEDUOI2TUOI}"></td>
                        <td><input type="text" value="{$VMBTREEM2TUOI1}" name="vmbtreem2tuoi1" class="treem2 calculate"
                                id="vmbtreem2tuoi1" size="10"/></td>
                        <td><input name="vmbtreem2tuoi2" type="text" id="vmbtreem2tuoi2" value="x" size="10"/></td>
                        <td><input type="text" value="{$VMBTREEM2TUOI3}" class="calculate dongia convertcurrency" name="vmbtreem2tuoi3" id="vmbtreem2tuoi3"
                                size="10" /></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$VMBTREEM2TUOI4}" class="calculate formatnumber convertcurrency" name="vmbtreem2tuoi4" id="vmbtreem2tuoi4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" value="{$VMBTREEM2TUOI5}" class="calculate" name="vmbtreem2tuoi5" id="vmbtreem2tuoi5"
                                size="10"/></td>
                        <td><input name="vmbtreem2tuoi6" type="text" id="vmbtreem2tuoi6" value="x" size="10"/></td>
                        <td><input type="text" value="{$VMBTREEM2TUOI7}" class="calculate dongia convertcurrency" name="vmbtreem2tuoi7" id="vmbtreem2tuoi7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$VMBTREEM2TUOI8}" class="calculate formatnumber convertcurrency" name="vmbtreem2tuoi8" id="vmbtreem2tuoi8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">VMB Nội địa trẻ em dưới 2 tuổi</td>
                        <td class="dataField"><input name="ghichuvmbndte2tuoi" type="text" id="ghichuvmbndte2tuoi"
                                value="{$GHICHUVMBNDTE2TUOI}" ></td>
                        <td class="dataField"><input class="calculate giaban" name="focvmbndteduoi2tuoi" type="text" size="10"
                                id="focvmbndteduoi2tuoi" value="{$FOCVMBNDTEDUOI2TUOI}" title="nhập tỷ lệ % so với giá người lớn để tính giá VMB nội địa cho trẻ em dưới 2 tuổi ví tỷ lệ 10% thì nhập là 10"></td>
                        <td><input type="text" value="{$VMBTREEM2TUOIND1}" name="vmbtreem2tuoind1" class="treem2 calculate"
                                id="vmbtreem2tuoind1" size="10"/></td>
                        <td><input name="vmbtreem2tuoind2" type="text" id="vmbtreem2tuoind2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VMBTREEM2TUOIND3}" name="vmbtreem2tuoind3"
                                id="vmbtreem2tuoind3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VMBTREEM2TUOIND4}" name="vmbtreem2tuoind4"
                                id="vmbtreem2tuoind4" size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="calculate" name="vmbtreem2tuoind5" value="{$VMBTREEM2TUOIND5}"
                                id="vmbtreem2tuoind5" size="10"/></td>
                        <td><input name="vmbtreem2tuoind6" type="text" id="vmbtreem2tuoind6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="vmbtreem2tuoind7" value="{$VMBTREEM2TUOIND7}"
                                id="vmbtreem2tuoind7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" name="vmbtreem2tuoind8" value="{$VMBTREEM2TUOIND8}"
                                id="vmbtreem2tuoind8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">VMB trẻ em từ 2-12 tuổi</td>
                        <td class="dataField"><input name="ghichuvmbte12tuoi" type="text" id="ghichuvmbte12tuoi"
                                value="{$GHICHUVMBTE12TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focvmbte12tuoi" type="text" size="10"
                                id="focvmbte12tuoi" value="{$FOCVMBTE12TUOI}" title="nhập tỷ lệ % so với giá người lớn để tính giá VMB cho trẻ em từ 2-12 tuổi ví tỷ lệ 75% thì nhập là 75" ></td>
                        <td><input type="text" name="vmbtreem12tuoi1" value="{$VMBTREEM12TUOI1}" class="treem12 calculate"
                                id="vmbtreem12tuoi1" size="10"/></td>
                        <td><input name="vmbtreem12tuoi2" type="text" id="vmbtreem12tuoi2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VMBTREEM12TUOI3}" name="vmbtreem12tuoi3"
                                id="vmbtreem12tuoi3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$VMBTREEM12TUOI4}" name="vmbtreem12tuoi4" id="vmbtreem12tuoi4" size="10" class="formatnumber convertcurrency"/>
                        </td>
                        <td>&nbsp;</td>
                        <td><input type="text" value="{$VMBTREEM12TUOI5}" class="calculate" name="vmbtreem12tuoi5"
                                id="vmbtreem12tuoi5" size="10"/></td>
                        <td><input name="vmbtreem12tuoi6" type="text" id="vmbtreem12tuoi6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VMBTREEM12TUOI7}" name="vmbtreem12tuoi7"
                                id="vmbtreem12tuoi7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VMBTREEM12TUOI8}" name="vmbtreem12tuoi8"
                                id="vmbtreem12tuoi8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">VMB Nội Địa trẻ em 2 - 12 tuổi</td>
                        <td class="dataField"><input name="ghichuvmbndte12tuoi" type="text" id="ghichuvmbndte12tuoi"
                                value="{$GHICHUVMBNDTE12TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focvmbndte12tuoi" type="text" size="10"
                                id="focvmbndte12tuoi" value="{$FOCVMBNDTE12TUOI}" title="nhập tỷ lệ % so với giá người lớn để tính giá VMB nội địa cho trẻ em từ 2-12 tuổi ví tỷ lệ 75% thì nhập là 75"></td>
                        <td><input type="text" value="{$VMBTREEM12TUOIND1}" name="vmbtreem12tuoind1" class="treem12 calculate"
                                id="vmbtreem12tuoind1" size="10"/></td>
                        <td><input name="vmbtreem12tuoind2" type="text" id="vmbtreem12tuoind2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VMBTREEM12TUOIND3}" name="vmbtreem12tuoind3"
                                id="vmbtreem12tuoind3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VMBTREEM12TUOIND4}" name="vmbtreem12tuoind4"
                                id="vmbtreem12tuoind4" size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="calculate" value="{$VMBTREEM12TUOIND5}" name="vmbtreem12tuoind5"
                                id="vmbtreem12tuoind5" size="10"/></td>
                        <td><input name="vmbtreem12tuoind6" type="text" id="vmbtreem12tuoind6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VMBTREEM12TUOIND7}" name="vmbtreem12tuoind7"
                                id="vmbtreem12tuoind7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VMBTREEM12TUOIND8}" name="vmbtreem12tuoind8"
                                id="vmbtreem12tuoind8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Tax trẻ em</td>
                        <td class="dataField"><input name="ghichutaxte" type="text" id="ghichutaxte" value="{$GHICHUTAXTE}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foctaxte" type="text" size="10" id="foctaxte"
                                value="{$FOCTAXTE}"></td>
                        <td><input type="text" class="calculate" value="{$TAXTREEM1}" name="taxtreem1" id="taxtreem1" size="10"/>
                        </td>
                        <td><input name="taxtreem2" type="text" id="taxtreem2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="taxtreem3" value="{$TAXTREEM3}" id="taxtreem3" size="10"/>
                        </td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" name="taxtreem4" value="{$TAXTREEM4}" id="taxtreem4" size="10"/>
                        </td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="calculate" name="taxtreem5" value="{$TAXTREEM5}" id="taxtreem5" size="10"/>
                        </td>
                        <td><input name="taxtreem6" type="text" id="taxtreem6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="taxtreem7" value="{$TAXTREEM7}" id="taxtreem7" size="10"/>
                        </td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" name="taxtreem8" value="{$TAXTREEM8}" id="taxtreem8" size="10"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="tabs-3">
                <table>
                    <tr bgcolor="#6699FF">
                        <td class="dataLabel"><b>LANDFEE PACKAGE</b></td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td colspan="7" align="right"><input name="sumlandfeepackage1" type="text" class="disable tinhtoan"
                                id="sumlandfeepackage1" value="{$SUMLANDFEEPACKAGE1}"/></td>
                        <td colspan="6" align="right"><input name="sumlandfeepackage2" type="text" class="disable tinhtoan convertcurrency"
                                id="sumlandfeepackage2" value="{$SUMLANDFEEPACKAGE2}"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><strong>Ghi Chú</strong></td>
                        <td><strong>FOC</strong></td>
                        <td class="dataLabel">Số lượng một</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Đơn giá một</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Thành tiền một</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Số lượng hai</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Đơn giá hai</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Thành tiền hai</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">LANDFEE 1: 3 sao</td>
                        <td><span class="dataField">
                                <input name="ghichulandfee1_3sao" type="text" id="ghichulandfee1_3sao"
                                    value="{$GHICHULANGFEE1_3SAO}">
                            </span></td>
                        <td><span class="dataField">
                                <input class="calculate giaban" name="foclandfee1_3sao" type="text" size="10"
                                    id="foclandfee1_3sao" value="{$FOCLANDFEE1_3SAO}">
                            </span></td>
                        <td><input type="text" class="disable" value="{$LANFEE1_3_1}" name="landfee1_3_1" id="landfee1_3_1" size="10"/></td>
                        <td><input name="landfee1_3_2" type="text" id="landfee1_3_2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANFEE1_3_3}" name="landfee1_3_3" id="landfee1_3_3" size="10"/>
                        </td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANFEE1_3_4}" name="landfee1_3_4" id="landfee1_3_4" size="10"/>
                        </td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable" value="{$LANFEE1_3_5}" name="landfee1_3_5" id="landfee1_3_5" size="10"/></td>
                        <td><input name="landfee1_3_6" type="text" id="landfee1_3_6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANFEE1_3_7}" name="landfee1_3_7" id="landfee1_3_7" size="10"/>
                        </td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANFEE1_3_8}" name="landfee1_3_8" id="landfee1_3_8" size="10"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">LANDFEE 2: 3 sao</td>
                        <td class="dataField"><input name="ghichulandfee2_3sao" type="text" id="ghichulandfee2_3sao"
                                value="{$GHICHULANDFEE2_3SAO}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foclandfee2_3sao" type="text" size="10"
                                id="foclandfee2_3sao" value="{$FOCLANDFEE2_3SAO}"></td>
                        <td><input type="text" class="disable" value="{$LANDFEE_2_3_1}" name="landfee_2_3_1" id="landfee_2_3_1" size="10"/>
                        </td>
                        <td><input name="landfee_2_3_2" type="text" id="landfee_2_3_2" value="x" size="10"/></td>
                        <td><input type="text" value="{$LANDFEE_2_3_3}" class="calculate dongia convertcurrency" name="landfee_2_3_3" id="landfee_2_3_3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE_2_3_4}" name="landfee_2_3_4" id="landfee_2_3_4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable" value="{$LANDFEE_2_3_5}" name="landfee_2_3_5" id="landfee_2_3_5" size="10"/>
                        </td>
                        <td><input name="landfee_2_3_6" type="text" id="landfee_2_3_6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE_2_3_7}" name="landfee_2_3_7" id="landfee_2_3_7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE_2_3_8}" name="landfee_2_3_8" id="landfee_2_3_8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">LANDFEE 1: 4 sao</td>
                        <td class="dataField"><input name="ghichulandfee1_4sao" type="text" id="ghichulandfee1_4sao"
                                value="{$GHICHULANDFEE1_4SAO}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foclandfee1_4sao" type="text" size="10"
                                id="foclandfee1_4sao" value="{$FOCLANDFEE1_4SAO}"></td>
                        <td><input type="text" class="disable" value="{$LANDFEE_1_4_1}" name="landfee_1_4_1" id="landfee_1_4_1" size="10"/>
                        </td>
                        <td><input name="landfee_1_4_2" type="text" id="landfee_1_4_2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE_1_4_3}" name="landfee_1_4_3" id="landfee_1_4_3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE_1_4_4}" name="landfee_1_4_4" id="landfee_1_4_4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable" value="{$LANDFEE_1_4_5}" name="landfee_1_4_5" id="landfee_1_4_5" size="10"/>
                        </td>
                        <td><input name="landfee_1_4_6" type="text" id="landfee_1_4_6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE_1_4_7}" name="landfee_1_4_7" id="landfee_1_4_7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE_1_4_8}" name="landfee_1_4_8" id="landfee_1_4_8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">LANDFEE 2: 4 sao</td>
                        <td class="dataField"><input name="ghichulandfee2_4sao" type="text" id="ghichulandfee2_4sao"
                                value="{$GHICHULANDFEE2_4SAO}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foclandfee2_4sao" type="text" size="10"
                                id="foclandfee2_4sao" value="{$FOCLANDFEE2_4SAO}"></td>
                        <td><input type="text" class="disable" value="{$LANDFEE_2_4_1}" name="landfee_2_4_1" id="landfee_2_4_1" size="10"/>
                        </td>
                        <td><input name="landfee_2_4_2" type="text" id="landfee_2_4_2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE_2_4_3}" name="landfee_2_4_3" id="landfee_2_4_3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE_2_4_4}" name="landfee_2_4_4" id="landfee_2_4_4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable" value="{$LANDFEE_2_4_5}" name="landfee_2_4_5" id="landfee_2_4_5" size="10"/>
                        </td>
                        <td><input name="landfee_2_4_6" type="text" id="landfee_2_4_6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE_2_4_7}" name="landfee_2_4_7" id="landfee_2_4_7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE_2_4_8}" name="landfee_2_4_8" id="landfee_2_4_8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Upgrade meal</td>
                        <td class="dataField"><input name="ghichuupgrademeal" type="text" id="ghichuupgrademeal"
                                value="{$GHICHUUPGRADEMEAL}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focupgrademeal" type="text" size="10"
                                id="focupgrademeal" value="{$FOCUPGRADEMEAL}"></td>
                        <td><input type="text" class="disable" value="{$UPGRADE_MEAL1}" name="upgrade_meal1" id="upgrade_meal1" size="10"/>
                        </td>
                        <td><input name="upgrade_meal2" type="text" value="{$UPGRADE_MEAL2}" class="calculate" id="upgrade_meal2"
                                size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$UPGRADE_MEAL3}" name="upgrade_meal3" id="upgrade_meal3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$UPGRADE_MEAL4}" name="upgrade_meal4" id="upgrade_meal4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable" value="{$UPGRADE_MEAL5}" name="upgrade_meal5" id="upgrade_meal5" size="10"/>
                        </td>
                        <td><input type="text" class="calculate" value="{$UPGRADE_MEAL6}" name="upgrade_meal6" id="upgrade_meal6"
                                size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$UPGRADE_MEAL7}" name="upgrade_meal7" id="upgrade_meal7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$UPGRADE_MEAL8}" name="upgrade_meal8" id="upgrade_meal8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Optional tour</td>
                        <td class="dataField"><input name="ghichuoptionaltour" type="text" id="ghichuoptionaltour"
                                value="{$GHICHUOPTIONALTOUR}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focoptionaltour" type="text" size="10"
                                id="focoptionaltour" value="{$FOCOPTIONALTOUR}"></td>
                        <td><input type="text" class="disable" value="{$OPTIONAL_TOUR1}" name="optional_tour1" id="optional_tour1"
                                size="10"/></td>
                        <td><input name="optional_tour2" type="text" id="optional_tour2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$OPTIONAL_TOUR3}" name="optional_tour3" id="optional_tour3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td colspan="2"><input type="text" value="{$OPTIONAL_TOUR4}" name="optional_tour4" id="optional_tour4" size="10" class="formatnumber convertcurrency"/>
                        </td>
                        <td><input type="text" class="disable" value="{$OPTIONAL_TOUR5}" name="optional_tour5" id="optional_tour5"
                                size="10"/></td>
                        <td><input name="optional_tour6" type="text" id="optional_tour6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$OPTIONAL_TOUR7}" name="optional_tour7" id="optional_tour7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$OPTIONAL_TOUR8}" name="optional_tour8" id="optional_tour8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Single Supp</td>
                        <td class="dataField"><input name="ghichusinglesupp" type="text" id="ghichusinglesupp" value="{$GHICHUSINGLESUPP}">
                        </td>
                        <td class="dataField"><input class="calculate giaban" name="focsinglesupp" type="text" size="10" id="focsinglesupp"
                                value="{$FOCSINGLESUPP}"></td>
                        <td><input type="text" class="disable" value="{$SINGLE_SUPP_1}" name="single_supp_1" id="single_supp_1" size="10"/>
                        </td>
                        <td><input name="single_supp_2" type="text" id="single_supp_2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$SINGLE_SUPP_3}" name="single_supp_3" id="single_supp_3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td colspan="2"><input type="text" value="{$SINGLE_SUPP_4}" class="calculate formatnumber convertcurrency" name="single_supp_4"
                                id="single_supp_4" size="10"/></td>
                        <td><input type="text" class="disable" value="{$SINGLE_SUPP_5}" name="single_supp_5" id="single_supp_5" size="10"/>
                        </td>
                        <td><input name="single_supp_6" type="text" id="single_supp_6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$SINGLE_SUPP_7}" name="single_supp_7" id="single_supp_7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$SINGLE_SUPP_8}" name="single_supp_8" id="single_supp_8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Landfee trẻ em (3 sao) - trẻ em dưới 2 tuổi</td>
                        <td class="dataField"><input name="ghichulandfete3sao2tuoi" type="text" id="ghichulandfete3sao2tuoi"
                                value="{$GHICHULANDFEETE3SAO2TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foclandfeete3saoteduoi2tuoi" type="text" size="10"
                                id="foclandfeete3saoteduoi2tuoi" value="{$FOCLANDFEETE3SAOTEDUOI2TUOI}"></td>
                        <td><input type="text" name="landfeetreem_2_3sao1" value="{$LANDFEETREEM_2_3_SAO1}" class="disable"
                                id="landfeetreem_2_3sao1" size="10"/></td>
                        <td><input name="landfeetreem_2_3sao2" type="text" id="landfeetreem_2_3sao2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEETREEM_2_3_SAO3}" name="landfeetreem_2_3sao3"
                                id="landfeetreem_2_3sao3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td colspan="2"><input type="text" value="{$LANDFEETREEM_2_3_SAO4}" class="calculate formatnumber convertcurrency" name="landfeetreem_2_3sao4"
                                id="landfeetreem_2_3sao4" size="10"/></td>
                        <td><input type="text" class="disable" value="{$LANDFEETREEM_2_3_SAO5}" name="landfeetreem_2_3sao5"
                                id="landfeetreem_2_3sao5" size="10"/></td>
                        <td><input name="landfeetreem_2_3sao6" type="text" id="landfeetreem_2_3sao6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEETREEM_2_3_SAO7}" name="landfeetreem_2_3sao7"
                                id="landfeetreem_2_3sao7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEETREEM_2_3_SAO8}" name="landfeetreem_2_3sao8"
                                id="landfeetreem_2_3sao8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Landfee trẻ em (3 sao) - trẻ em từ 2-12 tuổi</td>
                        <td class="dataField"><input name="ghichulandfeete3sao12tuoi" type="text" id="ghichulandfeete3sao12tuoi"
                                value="{$GHICHULANDFEETE3SAO12TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foclandfeete3saote12tuoi" type="text" size="10"
                                id="foclandfeete3saote12tuoi" value="{$FOCLANDFEETE3SAOTE12SAO}"></td>
                        <td><input type="text" name="landfeetreem12_3sao1" value="{$LANDFEETREEM12_3SAO1}" class="disable"
                                id="landfeetreem12_3sao1" size="10"/></td>
                        <td><input name="landfeetreem12_3sao2" type="text" id="landfeetreem12_3sao2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEETREEM12_3SAO3}" name="landfeetreem12_3sao3"
                                id="landfeetreem12_3sao3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td colspan="2"><input type="text" value="{$LANDFEETREEM12_3SAO4}" class="calculate formatnumber convertcurrency" name="landfeetreem12_3sao4"
                                id="landfeetreem12_3sao4" size="10"/></td>
                        <td><input type="text" class="disable" value="{$LANDFEETREEM12_3SAO5}" name="landfeetreem12_3sao5"
                                id="landfeetreem12_3sao5" size="10"/></td>
                        <td><input name="landfeetreem12_3sao6" type="text" id="landfeetreem12_3sao6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEETREEM12_3SAO7}" name="landfeetreem12_3sao7"
                                id="landfeetreem12_3sao7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEETREEM12_3SAO8}" name="landfeetreem12_3sao8"
                                id="landfeetreem12_3sao8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel"><p>Landfee trẻ em (4 sao) - trẻ em dưới 2 tuổi</p></td>
                        <td class="dataField"><input name="ghichulandfee4saote2tuoi" type="text" id="ghichulandfee4saote2tuoi"
                                value="{$GHICHULANDFEETE4SAO2TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foclandfee4saoteduoi2tuoi" type="text" size="10"
                                id="foclandfee4saoteduoi2tuoi" value="{$FOCLANDFEE4SAOTEDUOI2TUOI}"></td>
                        <td><input type="text" value="{$LANDFEE4SAO_TREEM2TUOI1}" name="landfee4sao_treem2tuoi1" class="disable"
                                id="landfee4sao_treem2tuoi1" size="10"/></td>
                        <td><input name="landfee4sao_treem2tuoi2" type="text" id="landfee4sao_treem2tuoi2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE4SAO_TREEM2TUOI3}" name="landfee4sao_treem2tuoi3"
                                id="landfee4sao_treem2tuoi3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td colspan="2"><input type="text" value="{$LANDFEE4SAO_TREEM2TUOI4}" class="calculate formatnumber convertcurrency"
                                name="landfee4sao_treem2tuoi4" id="landfee4sao_treem2tuoi4" size="10"/></td>
                        <td><input type="text" class="disable" value="{$LANDFEE4SAO_TREEM2TUOI5}" name="landfee4sao_treem2tuoi5"
                                id="landfee4sao_treem2tuoi5" size="10"/></td>
                        <td><input name="landfee4sao_treem2tuoi6" type="text" id="landfee4sao_treem2tuoi6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE4SAO_TREEM2TUOI7}" name="landfee4sao_treem2tuoi7"
                                id="landfee4sao_treem2tuoi7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE4SAO_TREEM2TUOI8}" name="landfee4sao_treem2tuoi8"
                                id="landfee4sao_treem2tuoi8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Landfee trẻ em (4 sao) - trẻ em từ 2-12 tuổi</td>
                        <td class="dataField"><input name="ghichulandfee4saote12tuoi" type="text" id="ghichulandfee4saote12tuoi"
                                value="{$GHICHULANDFEE4SAOTE12TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foclandfee4saote12tuoi" type="text" size="10"
                                id="foclandfee4saote12tuoi" value="{$FOCLANDFEETE4SAOTE12TUOI}"></td>
                        <td><input type="text" value="{$LANDFEE4SAO_TREEM12TUOI1}" name="landfee4sao_treem12tuoi1" class="disable"
                                id="landfee4sao_treem12tuoi1" size="10"/></td>
                        <td><input name="landfee4sao_treem12tuoi2" type="text" id="landfee4sao_treem12tuoi2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE4SAO_TREEM12TUOI3}" name="landfee4sao_treem12tuoi3"
                                id="landfee4sao_treem12tuoi3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td colspan="2"><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE4SAO_TREEM12TUOI4}"
                                name="landfee4sao_treem12tuoi4" id="landfee4sao_treem12tuoi4" size="10"/></td>
                        <td><input type="text" class="disable" value="{$LANDFEE4SAO_TREEM12TUOI5}" name="landfee4sao_treem12tuoi5"
                                id="landfee4sao_treem12tuoi5" size="10"/></td>
                        <td><input name="landfee4sao_treem12tuoi6" type="text" id="landfee4sao_treem12tuoi6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$LANDFEE4SAO_TREEM12TUOI7}" name="landfee4sao_treem12tuoi7"
                                id="landfee4sao_treem12tuoi7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$LANDFEE4SAO_TREEM12TUOI8}" name="landfee4sao_treem12tuoi8"
                                id="landfee4sao_treem12tuoi8" size="10"/></td>
                    </tr>
                </table>
            </div>
            <div id="tabs-4">
                <table>
                    <tr bgcolor="#6699FF">
                        <td class="dataLabel"><b>VISA</b></td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td colspan="7" align="right"><input name="sumvisa1" type="text" class="disable tinhtoan convertcurrency" id="sumvisa1"
                                value="{$SUMVISA1}"/></td>
                        <td colspan="6" align="right"><input name="sumvisa2" type="text" class="disable tinhtoan convertcurrency" id="sumvisa2"
                                value="{$SUMVISA2}"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">&nbsp;</td>
                        <td class="dataField"><strong>Ghi Chú</strong></td>
                        <td class="dataField"><strong>FOC</strong></td>
                        <td class="dataLabel">Số lượng một</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Đơn giá một</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Thành tiền một</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Số lượng hai</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Đơn giá hai</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Thành tiền hai</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Visa (Thủ tục thông hành)</td>
                        <td class="dataField"><b>
                                <input name="ghichuvisa" type="text" id="ghichuvisa" value="{$GHICHUVISA}">
                            </b></td>
                        <td class="dataField"><input class="calculate giaban" name="focvisa" type="text" size="10" id="focvisa"
                                value="{$FOCVISA}"></td>
                        <td><input type="text" name="visathonghanh1" value="{$VISATHONGHANH1}" id="visathonghanh1"
                                class="disable visa_value" size="10"/></td>
                        <td><input name="visathonghanh2" type="text" id="visathonghanh2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISATHONGHANH3}" name="visathonghanh3" id="visathonghanh3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VISATHONGHANH4}" name="visathonghanh4" id="visathonghanh4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable visa_value1" value="{$VISATHONGHANH5}" name="visathonghanh5"
                                id="visathonghanh5" size="10"/></td>
                        <td><input name="visathonghanh6" type="text" id="visathonghanh6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISATHONGHANH7}" name="visathonghanh7" id="visathonghanh7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VISATHONGHANH8}" name="visathonghanh8" id="visathonghanh8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Dịch thuật, công chứng hồ sơ</td>
                        <td class="dataField"><input name="ghichudichthuatcongchung" type="text" id="ghichudichthuatcongchung"
                                value="{$GHICHUDICHTHUATCONGCHUNG}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focdichthuatcongchung" type="text" size="10"
                                id="focdichthuatcongchung" value="{$FOCDICHTHUATCONGCHUNG}"></td>
                        <td><input type="text" name="visadichthuat1" value="{$VISADICHTHUAT1}" id="visadichthuat1"
                                class="disable visa_value" size="10"/></td>
                        <td><input name="visadichthuat2" type="text" id="visadichthuat2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISADICHTHUAT3}" name="visadichthuat3" id="visadichthuat3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VISADICHTHUAT4}" name="visadichthuat4" id="visadichthuat4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable visa_value1" value="{$VISADICHTHUAT5}" name="visadichthuat5"
                                id="visadichthuat5" size="10"/></td>
                        <td><input name="visadichthuat6" type="text" id="visadichthuat6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISADICHTHUAT7}" name="visadichthuat7" id="visadichthuat7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VISADICHTHUAT8}" name="visadichthuat8" id="visadichthuat8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel"> Phí chuyển phát hồ sơ</td>
                        <td class="dataField"><input name="ghichuchuyenphathoso" type="text" id="ghichuchuyenphathoso"
                                value="{$GHICHUCHUYENPHATHOSO}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focchuyenphat" type="text" size="10"
                                id="focchuyenphat" value="{$FOCCHUYENPHAT}"></td>
                        <td><input type="text" value="{$PHICHUYENPHATHOSO1}" name="phichuyenphathoso1" id="phichuyenphathoso1"
                                class="disable visa_value" size="10"/></td>
                        <td><input name="phichuyenphathoso2" type="text" id="phichuyenphathoso2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$PHICHUYENPHATHOSO3}" name="phichuyenphathoso3"
                                id="phichuyenphathoso3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$PHICHUYENPHATHOSO4}" name="phichuyenphathoso4"
                                id="phichuyenphathoso4" size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable visa_value1" value="{$PHICHUYENPHATHOSO5}" name="phichuyenphathoso5"
                                id="phichuyenphathoso5" size="10"/></td>
                        <td><input name="phichuyenphathoso6" type="text" id="phichuyenphathoso6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$PHICHUYENPHATHOSO7}" name="phichuyenphathoso7"
                                id="phichuyenphathoso7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$PHICHUYENPHATHOSO8}" name="phichuyenphathoso8"
                                id="phichuyenphathoso8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Phí thu mới</td>
                        <td class="dataField"><input name="ghichuphithumoi" type="text" id="ghichuphithumoi"
                                value="{$GHICHUPHITHUMOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focchiphimoi" type="text" size="10"
                                id="focchiphimoi" value="{$FOCCHIPHIMOI}"></td>
                        <td><input type="text" value="{$PHITHUMOI1}" name="phithumoi1" id="phithumoi1" class="disable visa_value"
                                size="10"/></td>
                        <td><input name="phithumoi2" type="text" id="phithumoi2" value="x" size="10"/></td>
                        <td><input type="text" value="{$PHITHUMOI3}" class="calculate dongia convertcurrency" name="phithumoi3" id="phithumoi3" size="10"/>
                        </td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$PHITHUMOI4}" class="calculate formatnumber convertcurrency" name="phithumoi4" id="phithumoi4" size="10"/>
                        </td>
                        <td>&nbsp;</td>
                        <td><input type="text" value="{$PHITHUMOI5}" class="disable visa_value1" name="phithumoi5" id="phithumoi5"
                                size="10"/></td>
                        <td><input name="phithumoi6" type="text" id="phithumoi6" value="x" size="10"/></td>
                        <td><input type="text" value="{$PHITHUMOI7}" class="calculate dongia convertcurrency" name="phithumoi9" id="phithumoi9" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$PHITHUMOI8}" class="calculate formatnumber convertcurrency" name="phithumoi8" id="phithumoi8" size="10"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Phí Visa trẻ em dưới 2 tuổi</td>
                        <td class="dataField"><input name="ghichuphivisate2tuoi" type="text" id="ghichuphivisate2tuoi"
                                value="{$GHICHUPHIVISATE2TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focphivisate2tuoi" type="text" size="10"
                                id="focphivisate2tuoi" value="{$FOCPHIVISA2TUOI}"></td>
                        <td><input type="text" value="{$VISATREEM2TUOI1}" name="visatreem2tuoi1" class="disable"
                                id="visatreem2tuoi1" size="10"/></td>
                        <td><input name="visatreem2tuoi2" type="text" id="visatreem2tuoi2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISATREEM2TUOI3}" name="visatreem2tuoi3"
                                id="visatreem2tuoi3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VISATREEM2TUOI4}" name="visatreem2tuoi4"
                                id="visatreem2tuoi4" size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable" value="{$VISATREEM2TUOI5}" name="visatreem2tuoi5"
                                id="visatreem2tuoi5" size="10"/></td>
                        <td><input name="visatreem2tuoi6" type="text" id="visatreem2tuoi6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISATREEM2TUOI7}" name="visatreem2tuoi7"
                                id="visatreem2tuoi7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VISATREEM2TUOI8}" name="visatreem2tuoi8"
                                id="visatreem2tuoi8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Phí Visa trẻ em từ 2 - 12 tuổi</td>
                        <td class="dataField"><input name="ghichuphivisate12tuoi" type="text" id="ghichuphivisate12tuoi"
                                value="{$GHICHUPHIVISATE12TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focchiphivisate12tuoi" type="text" size="10"
                                id="focchiphivisate12tuoi" value="{$FOCPHIVISATE12TUOI}"></td>
                        <td><input type="text" value="{$VISATREEM12TUOI1}" name="visatreem12tuoi1" class="disable"
                                id="visatreem12tuoi1" size="10"/></td>
                        <td><input name="visatreem12tuoi2" type="text" id="visatreem12tuoi2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISATREEM12TUOI3}" name="visatreem12tuoi3"
                                id="visatreem12tuoi3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VISATREEM12TUOI4}" name="visatreem12tuoi4"
                                id="visatreem12tuoi4" size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="disable" value="{$VISATREEM12TUOI5}" name="visatreem12tuoi5"
                                id="visatreem12tuoi5" size="10"/></td>
                        <td><input name="visatreem12tuoi6" type="text" id="visatreem12tuoi6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISATREEM12TUOI7}" name="visatreem12tuoi7"
                                id="visatreem12tuoi7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="calculate formatnumber convertcurrency" value="{$VISATREEM12TUOI8}" name="visatreem12tuoi8"
                                id="visatreem12tuoi8" size="10"/></td>
                    </tr>
                </table>
            </div>

            <div id="tabs-5">
                <table>
                    <tr bgcolor="#6699FF">
                        <td class="dataLabel"><b>HƯỚNG DẪN VIÊN</b></td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="6" align="right"><input name="sumguide1" type="text" class="disable tinhtoan convertcurrency" id="sumguide1"
                                value="{$SUMGUIDE1}"/></td>
                        <td>&nbsp;</td>
                        <td colspan="5" align="right"><input name="sumguide2" type="text" class="disable tinhtoan convertcurrency" id="sumguide2"
                                value="{$SUMGUIDE2}"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">&nbsp;</td>
                        <td class="dataLabel"><strong>Ghi chú</strong></td>
                        <td class="dataLabel"><strong>FOC</strong></td>
                        <td class="dataLabel">Số lượng một</td>
                        <td class="dataLabel">Số ngày một</td>
                        <td class="dataLabel">Đơn giá một</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Thành tiền một</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Số lượng một</td>
                        <td class="dataLabel">Số ngày hai</td>
                        <td class="dataLabel">Đơn giá hai</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Thành tiền hai</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Tour leader</td>
                        <td class="dataField"><input name="ghichutourleader" type="text" id="ghichutourleader"
                                value="{$GHICHUTOURLEADER}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foctourleader" type="text" size="10"
                                id="foctourleader" value="{$FOCTOURLEADER}"></td>
                        <td><input type="text" class="disable" value="{$TOUR_LEADER1}" name="tour_leader1" id="tour_leader1"
                                size="10"/></td>
                        <td><input type="text" class="calculate" value="{$TOUR_LEADER2}" name="tour_leader2" id="tour_leader2"
                                size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$TOUR_LEADER3}" name="tour_leader3" id="tour_leader3"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" value="{$TOUR_LEADER4}" name="tour_leader4" id="tour_leader4"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="calculate" value="{$TOUR_LEADER5}" name="tour_leader5" id="tour_leader5"
                                size="10"/></td>
                        <td><input type="text" class="calculate" value="{$TOUR_LEADER6}" name="tour_leader6" id="tour_leader6"
                                size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$TOUR_LEADER7}" name="tour_leader7" id="tour_leader7"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" value="{$TOUR_LEADER8}" name="tour_leader8" id="tour_leader8"
                                size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Chi phí khác</td>
                        <td class="dataField"><input name="ghichuchiphikhac" type="text" id="ghichuchiphikhac"
                                value="{$GHICHUCHIPHIKHAC}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focchiphikhac" type="text" size="10"
                                id="focchiphikhac" value="{$FOCCHIPHIKHAC}"></td>
                        <td><input type="text" class="calculate" name="chiphikhac1" id="chiphikhac1" value="{$CHIPHIKHAC1}"
                                size="10"/></td>
                        <td><input name="chiphikhac2" type="text" id="chiphikhac2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="chiphikhac3" id="chiphikhac3" value="{$CHIPHIKHAC3}"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" name="chiphikhac4" id="chiphikhac4" value="{$CHIPHIKHAC4}"
                                size="10"/></td>
                        <td>&nbsp;</td>
                        <td><input type="text" class="calculate" name="chiphikhac5" id="chiphikhac5" value="{$CHIPHIKHAC5}"
                                size="10"/></td>
                        <td><input name="chiphikhac6" type="text" id="chiphikhac6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="chiphikhac7" id="chiphikhac7" value="{$CHIPHIKHAC7}"
                                size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" name="chiphikhac8" id="chiphikhac8" value="{$CHIPHIKHAC8}"
                                size="10"/></td>
                    </tr>
                </table>
            </div>

            <div id="tabs-6">
                <table>
                    <tr bgcolor="#3399FF">
                        <td class="dataLabel"><b>DỊCH VỤ KHÁC</b></td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td align="center" class="dataField">&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="5" align="right"><input type="text" class="disable tinhtoan convertcurrency" value="{$SUMOTHERSERVICE1}"
                                name="sumotherservice1" id="sumotherservice1"/></td>
                        <td>&nbsp;</td>
                        <td colspan="5" align="right"><input type="text" class="disable tinhtoan convertcurrency" value="{$SUMOTHERSERVICE2}"
                                name="sumotherservice2" id="sumotherservice2"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">&nbsp;</td>
                        <td class="dataLabel"><strong>Ghi Chú</strong></td>
                        <td class="dataLabel"><strong>FOC</strong></td>
                        <td class="dataLabel">Số lượng một</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Đơn giá một</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Thành tiền một</td>
                        <td class="dataLabel">Số lượng hai</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Đơn giá hai</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="dataLabel">Thành tiền hai</td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Bảo hiểm</td>
                        <td class="dataField"><input name="ghichubaohiem" type="text" id="ghichubaohiem" value="{$GHICHUBAOHIEM}">
                        </td>
                        <td class="dataField"><input class="calculate giaban" name="focbaohiem" type="text" size="10"
                                id="focbaohiem" value="{$FOCBAOHIEM}"></td>
                        <td><input type="text" value="{$BAOHIEM1}" name="baohiem1" id="baohiem1" class="visa_value calculate"
                                size="10"/></td>
                        <td><input name="baohiem2" type="text" id="baohiem2" value="x" size="10"/></td>
                        <td><input type="text" value="{$BAOHIEM3}" class="calculate dongia convertcurrency" name="baohiem3" id="baohiem3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$BAOHIEM4}" class="disable formatnumber convertcurrency" name="baohiem4" id="baohiem4" size="10"/></td>
                        <td><input type="text" value="{$BAOHIEM5}" class="calculate visa_value1" name="baohiem5" id="baohiem5"
                                size="10"/></td>
                        <td><input name="baohiem6" type="text" id="baohiem6" value="x" size="10"/></td>
                        <td><input type="text" value="{$BAOHIEM7}" class="calculate dongia convertcurrency" name="baohiem7" id="baohiem7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$BAOHIEM8}" class="disable formatnumber convertcurrency" name="baohiem8" id="baohiem8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Bảo hiểm trẻ em dưới 2 tuổi</td>
                        <td class="dataField"><input name="ghichubaohiemte2tuoi" type="text" id="ghichubaohiemte2tuoi"
                                value="{$GHICHUBAOHIEMTE2TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focbaohiemteduoi2tuoi" type="text" size="10"
                                id="focbaohiemteduoi2tuoi" value="{$FOCBAOHIEMTEDUOI2TUOI}"></td>
                        <td><input type="text" value="{$BAOHIEMTREEM2TUOI1}" name="baohiemtreem2tuoi1" class="treem2 calculate"
                                id="baohiemtreem2tuoi1" size="10"/></td>
                        <td><input name="baohiemtreem2tuoi2" type="text" id="baohiemtreem2tuoi2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$BAOHIEMTREEM2TUOI3}" name="baohiemtreem2tuoi3"
                                id="baohiemtreem2tuoi3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" value="{$BAOHIEMTREEM2TUOI4}" name="baohiemtreem2tuoi4"
                                id="baohiemtreem2tuoi4" size="10"/></td>
                        <td><input type="text" class="calculate" value="{$BAOHIEMTREEM2TUOI5}" name="baohiemtreem2tuoi5"
                                id="baohiemtreem2tuoi5" size="10"/></td>
                        <td><input name="baohiemtreem2tuoi6" type="text" id="baohiemtreem2tuoi6" value="x" size="10"/></td>
                        <td><input type="text" name="baohiemtreem2tuoi7" value="{$BAOHIEMTREEM2TUOI7}" class="calculate dongia convertcurrency"
                                id="baohiemtreem2tuoi7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" value="{$BAOHIEMTREEM2TUOI8}" name="baohiemtreem2tuoi8"
                                id="baohiemtreem2tuoi8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Bảo hiểm trẻ em từ 2 - 12 tuổi</td>
                        <td class="dataField"><input name="ghichubaohiemte12tuoi" type="text" id="ghichubaohiemte12tuoi"
                                value="{$GHICHUBAOHIEMTE12TUOI}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focbaohiemte12tuoi" type="text" size="10"
                                id="focbaohiemte12tuoi" value="{$FOCBAOHIEMTE12TUOI}"></td>
                        <td><input type="text" value="{$BAOHIEMTREEM12TUOI1}" name="baohiemtreem12tuoi1" class="treem12 calculate"
                                id="baohiemtreem12tuoi1" size="10"/></td>
                        <td><input name="baohiemtreem12tuoi2" type="text" id="baohiemtreem12tuoi2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$BAOHIEMTREEM12TUOI3}" name="baohiemtreem12tuoi3"
                                id="baohiemtreem12tuoi3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" value="{$BAOHIEMTREEM12TUOI4}" name="baohiemtreem12tuoi4"
                                id="baohiemtreem12tuoi4" size="10"/></td>
                        <td><input type="text" class="calculate" value="{$BAOHIEMTREEM12TUOI4}" name="baohiemtreem12tuoi5"
                                id="baohiemtreem12tuoi5" size="10"/></td>
                        <td><input name="baohiemtreem12tuoi6" type="text" id="baohiemtreem12tuoi6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$BAOHIEMTREEM12TUOI5}" name="baohiemtreem12tuoi7"
                                id="baohiemtreem12tuoi7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" value="{$BAOHIEMTREEM12TUOI8}" name="baohiemtreem12tuoi8"
                                id="baohiemtreem12tuoi8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Tip</td>
                        <td class="dataField"><input name="ghichutip" type="text" id="ghichutip" value="{$GHICHUTIP}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foctip" type="text" size="10" id="foctip"
                                value="{$FOCTIP}"></td>
                        <td><input type="text" class="calculate" value="{$VISATIP1}" name="visatip1" id="visatip1" size="10"/></td>
                        <td><input type="text" class="calculate" value="{$VISATIP2}" name="visatip2" id="visatip2" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISATIP3}" name="visatip3" id="visatip3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" value="{$VISATIP4}" name="visatip4" id="visatip4" size="10"/></td>
                        <td><input type="text" class="calculate" value="{$VISATIP5}" name="visatip5" id="visatip5" size="10"/></td>
                        <td><input type="text" class="calculate" value="{$VISATIP6}" name="visatip6" id="visatip6" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" value="{$VISATIP7}" name="visatip7" id="visatip7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" value="{$VISATIP8}" name="visatip8" id="visatip8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">QUÀ TẶNG</td>
                        <td class="dataField">
                            <input name="ghichuquatang" type="text" id="ghichuquatang" value="{$GHICHUQUATANG}">
                        </td>
                        <td class="dataField"><input class="calculate giaban" name="focquatang" type="text" size="10"
                                id="focquatang" value="{$FOCQUATANG}"></td>
                        <td><input type="text" name="quatang1" id="quatang1" value="{$QUATANG1}" class="quatang calculate"
                                size="10"/></td>
                        <td><input name="quatang2" type="text" id="quatang2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="quatang3" value="{$QUATANG3}" id="quatang3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" name="quatang4" value="{$QUATANG4}" id="quatang4" size="10"/></td>
                        <td><input type="text" class="calculate" name="quatang5" value="{$QUATANG5}" id="quatang5" size="10"/></td>
                        <td><input name="quatang6" type="text" id="quatang6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="quatang7" value="{$QUATANG7}" id="quatang7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" name="quatang8" value="{$QUATANG8}" id="quatang8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Land 2</td>
                        <td class="dataField"><input name="ghichuland2" type="text" id="ghichuland2" value="{$GHICHULAND2}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focland2" type="text" size="10" id="focland2"
                                value="{$FOCLAND2}"></td>
                        <td><input type="text" value="{$LAND2_1}" name="land2_1" id="land2_1" class="quatang calculate" size="10"/>
                        </td>
                        <td><input name="land2_2" type="text" id="land2_2" value="x" size="10"/></td>
                        <td><input type="text" value="{$LAND2_3}" class="calculate dongia convertcurrency" name="land2_3" id="land2_3" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$LAND2_4}" class="disable formatnumber convertcurrency" name="land2_4" id="land2_4" size="10"/></td>
                        <td><input type="text" value="{$LAND2_5}" class="calculate" name="land2_5" id="land2_5" size="10"/></td>
                        <td><input name="land2_6" type="text" id="land2_6" value="x" size="10"/></td>
                        <td><input type="text" value="{$LAND2_7}" class="calculate dongia convertcurrency" name="land2_7" id="land2_7" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" value="{$LAND2_8}" class="disable formatnumber convertcurrency" name="land2_8" id="land2_8" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">CPK</td>
                        <td class="dataField"><input name="ghichucpk" type="text" id="ghichucpk" value="{$GHICHUCPK}"></td>
                        <td class="dataField"><input class="calculate giaban" name="foccpk" type="text" size="10" id="foccpk"
                                value="{$FOCCPK}"></td>
                        <td><input type="text" class="calculate" name="cpk1" id="cpk1" value="{$CPK1}" size="10"/></td>
                        <td><input name="cpk2" type="text" id="cpk2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="cpk3" id="cpk3" value="{$CPK3}" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" name="cpk4" id="cpk4" value="{$CPK4}" size="10"/></td>
                        <td><input type="text" class="calculate" name="cpk5" id="cpk5" value="{$CPK5}" size="10"/></td>
                        <td><input name="cpk6" type="text" id="cpk6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="cpk7" id="cpk7" value="{$CPK7}" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" name="cpk8" id="cpk8" value="{$CPK8}" size="10"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Chênh lệch tỷ giá</td>
                        <td class="dataField"><input name="ghichuchenhlachtygia" type="text" id="ghichuchenhlachtygia"
                                value="{$GHICHUCHENHLECHTYGIA}"></td>
                        <td class="dataField"><input class="calculate giaban" name="focchenhlechtygia" type="text" size="10"
                                id="focchenhlechtygia" value="{$FOCCHENHLECHTYGIA}"></td>
                        <td><input type="text" name="chenhlechtygia1" class="quatang calculate" id="chenhlechtygia1"
                                value="{$CHENHLECHTYGIA1}" size="10"/></td>
                        <td><input name="chenhlechtygia2" type="text" id="chenhlechtygia2" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="chenhlechtygia3" id="chenhlechtygia3"
                                value="{$CHENHLECHTYGIA3}" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" name="chenhlechtygia4" id="chenhlechtygia4"
                                value="{$CHENHLECHTYGIA4}" size="10"/></td>
                        <td><input type="text" class="calculate" name="chenhlechtygia5" id="chenhlechtygia5"
                                value="{$CHENHLECHTYGIA5}" size="10"/></td>
                        <td><input name="chenhlechtygia6" type="text" id="chenhlechtygia6" value="x" size="10"/></td>
                        <td><input type="text" class="calculate dongia convertcurrency" name="chenhlechtygia7" id="chenhlechtygia7"
                                value="{$CHENHLECHTYGIA7}" size="10"/></td>
                        <td>$</td>
                        <td>=</td>
                        <td><input type="text" class="disable formatnumber convertcurrency" name="chenhlechtygia8" id="chenhlechtygia8"
                                value="{$CHENHLECHTYGIA8}" size="10"/></td>
                    </tr>
                </table>
            </div>
            
            <div id="tabs-8">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="dataLabel"><b>CHI OPTIONS </b></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="1" style="border-collapse: collapse;" cellspacing="0"
                                cellpadding="0" class="table_clone" id="chi_option">
                                <thead>
                                    <tr>
                                        <td class="dataLabel"><strong>TỔNG CHI OPTIONS</strong></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><input type="text" name="tongtien_chi" id="tongtien_chi"
                                                class="disable tinhtoan" value="{$TONGTIEN_CHI}" size="20"/></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="dataLabel">Tên dịch vụ</td>
                                        <td class="dataLabel">Số lượng</td>
                                        <td>&nbsp;</td>
                                        <td class="dataLabel">Đơn giá một</td>
                                        <td class="dataLabel">Thành tiền</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    {if $ID eq '' or $COUNTCHIOPTION eq 0}

                                    <tr>
                                        <td><input type="text" name="chi_dichvu[]" id="chi_dichvu" class="chioption chi_dichvu" size="50"></td>
                                        <td><input type="text" name="chi_soluong[]" id="chi_soluong"  class="chioption numbers chi_soluong" size="15"></td>
                                        <td><input type="text" name="textfield3" id="textfield3" class="chioption x"  size="5" value="X"></td>
                                        <td><input type="text" name="chi_dongia[]" id="chi_dongia" class="chi_dongia chioption numbers dongia convertcurrency"  size="15"></td>
                                        <td><input type="text" name="chi_thanhtien[]" id="chi_thanhtien"  class="chioption numbers chi_thanhtien convertcurrency" size="15"></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><input type="button" class="btnAddRow" value="Add Row"/></td>
                                        <td><input type="button" class="btnDelRow" value="Delete Row"/></td>
                                    </tr>
                                    {/if}
                                    {$CHIHTML}
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            
            <div id="tabs-7">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="dataLabel"><b>THU OPTIONS</b></td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="1" style="border-collapse:collapse;" cellspacing="0"
                                cellpadding="0" class="table_clone" id="thu_option">
                                <thead>
                                    <tr>
                                        <td class="dataLabel"><strong>TỔNG THU OPTIONS</strong></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><input type="text" name="tongtien_thu" class="disable tinhtoan formatnumber"
                                                id="tongtien_thu" value="{$TONGTIEN_THU}" size="20"/></td>
                                        <td>&nbsp;</td>
                                        <td><input type="text" name="tongtien_thu1" class="disable tinhtoan formatnumber"
                                                id="tongtien_thu1" value="{$TONGTIEN_THU1}" size="20"/></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="dataLabel">Tên dịch vụ</td>
                                        <td class="dataLabel">Số lượng</td>
                                        <td>&nbsp;</td>
                                        <td class="dataLabel">Đơn giá một</td>
                                        <td class="dataLabel">Thành tiền</td>
                                        <td class="dataLabel">Đơn giá hai</td>
                                        <td class="dataLabel">Thành tiền</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    {if $ID eq '' or $COUNTTHUOPTION eq 0}

                                    <tr>
                                        <td><input type="text" name="thu_dichvu[]" id="thu_dichvu" class="thuoption thu_dichvu" size="50"></td>
                                        <td><input type="text" name="thu_soluong[]" id="thu_soluong" class="thuoption numbers thu_soluong" size="15"></td>
                                        <td><input type="text" name="textfield3" id="textfield3" class="thuoption x"  size="5" value="X"></td>
                                        <td><input type="text" name="thu_dongia[]" id="thu_dongia" class="thuoption numbers dongia thu_dongia1 convertcurrency" size="15"></td>
                                        <td><input type="text" name="thu_thanhtien[]" id="thu_thanhtien" class="thuoption numbers thu_thanhtien1 formatnumber convertcurrency" size="15"></td>
                                        <td><input type="text" name="thu_dongiamot[]" id="thu_dongiamot" class="thuoption numbers dongia thu_dongia2 convertcurrency" size="15"></td>
                                        <td><input type="text" name="thu_thanhtienmot[]" id="thu_thanhtienmot" class="thuoption numbers formatnumber thu_thanhtien2 convertcurrency" size="15"></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    {/if}
                                    {$THUHTML}
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            
            
            
        </div>
        <div id="tabs-9">
            <table cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;" width="100%">
                <tr>
                    <td>&nbsp;</td>
                    <td colspan="2" align="center" class="dataLabel">DƯỚI 2 TUỔI</td>
                    <td colspan="2" align="center" class="ct_sl1 dataLabel">TỪ 2-12 TUỔI</td>
                    <td colspan="2" align="center" class="ct_sl1 dataLabel">NGƯỜI LỚN</td>
                    <td>&nbsp;</td>
                    <td colspan="2" align="center" class="ct_sl2 dataLabel">DƯỚI 2 TUỔI</td>
                    <td colspan="2" align="center" class="ct_sl2 dataLabel">TỪ 2-12 TUỔI</td>
                    <td colspan="2" align="center" class="ct_sl2 dataLabel">NGƯỜI LỚN</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="center" class="ct_sl1 dataLabel">Ks 3*</td>
                    <td align="center" class="ct_sl1 dataLabel">Ks 4*</td>
                    <td align="center" class="ct_sl1 dataLabel">Ks 3*</td>
                    <td align="center" class="ct_sl1 dataLabel">Ks 4*</td>
                    <td align="center" class="ct_sl1 dataLabel">Ks 3*</td>
                    <td align="center" class="ct_sl1 dataLabel">Ks 4*</td>
                    <td>&nbsp;</td>
                    <td align="center" class="ct_sl2 dataLabel">Ks 3*</td>
                    <td align="center" class="ct_sl2 dataLabel">Ks 4*</td>
                    <td align="center" class="ct_sl2 dataLabel">Ks 3*</td>
                    <td align="center" class="ct_sl2 dataLabel">Ks 4*</td>
                    <td align="center" class="ct_sl2 dataLabel">Ks 3*</td>
                    <td align="center" class="ct_sl2 dataLabel">Ks 4*</td>
                </tr>
                <tr>
                    <td class="ct_sl3 dataLabel">TỔNG CHI</td>
                    <td class="ct_sl2"><input type="text" class="disable formatnumber convertcurrency" name="tongchi1" id="tongchi1" value="{$TONGCHI1}"
                            size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable formatnumber convertcurrency" name="tongchi2" id="tongchi2" value="{$TONGCHI2}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="tongchi3" id="tongchi3" value="{$TONGCHI3}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="tongchi4" id="tongchi4" value="{$TONGCHI4}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="tongchi5" id="tongchi5" value="{$TONGCHI5}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="tongchi6" id="tongchi6" value="{$TONGCHI6}"
                            size="10"/></td>
                    <td>&nbsp;</td>
                    <td class="ct_sl2"><input type="text" class="disable formatnumber convertcurrency" name="tongchi7" id="tongchi7" value="{$TONGCHI7}"
                            size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable formatnumber convertcurrency" name="tongchi8" id="tongchi8" value="{$TONGCHI8}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="tongchi9" id="tongchi9" value="{$TONGCHI9}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="tongchi10" id="tongchi10" value="{$TONGCHI10}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="tongchi11" id="tongchi11" value="{$TONGCHI11}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="tongchi12" id="tongchi12" value="{$TONGCHI12}"
                            size="10"/></td>
                </tr>
                <tr>
                    <td class="ct_sl3 dataLabel">GIÁ NET</td>
                    <td class="ct_sl2"><input type="text" class="disable formatnumber convertcurrency" name="gianet1" id="gianet1" value="{$GIANET1}"
                            size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable formatnumber convertcurrency" name="gianet2" id="gianet2" value="{$GIANET2}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="gianet3" id="gianet3" value="{$GIANET3}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="gianet4" id="gianet4" value="{$GIANET4}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="gianet5" id="gianet5" value="{$GIANET5}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="gianet6" id="gianet6" value="{$GIANET6}"
                            size="10"/></td>
                    <td>&nbsp;</td>
                    <td class="ct_sl2"><input type="text" class="disable formatnumber convertcurrency" name="gianet7" id="gianet7" value="{$GIANET7}"
                            size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable formatnumber convertcurrency" name="gianet8" id="gianet8" value="{$GIANET8}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="gianet9" id="gianet9" value="{$GIANET9}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="gianet10" id="gianet10" value="{$GIANET10}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="gianet11" id="gianet11" value="{$GIANET11}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable formatnumber convertcurrency" name="gianet12" id="gianet12" value="{$GIANET12}"
                            size="10"/></td>
                </tr>
                <tr>
                    <td class="ct_sl3 tinhtoan dataLabel">GIÁ BÁN</td>
                    <td class="ct_sl2"><input type="text" class="disable tinhtoan convertcurrency" name="giaban1" id="giaban1"
                            value="{$GIABAN1}" size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable tinhtoan convertcurrency" name="giaban2" id="giaban2"
                            value="{$GIABAN2}" size="10"/></td>
                    <td class="ct_sl3"><input name="giaban3" type="text" class="disable tinhtoan convertcurrency" id="giaban3"
                            value="{$GIABAN3}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable tinhtoan convertcurrency" name="giaban4" id="giaban4"
                            value="{$GIABAN4}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="giaban calculate tinhtoan convertcurrency" name="giaban5" id="giaban5"
                            value="{$GIABAN5}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="giaban calculate tinhtoan convertcurrency" name="giaban6" id="giaban6"
                            value="{$GIABAN6}" size="10"/></td>
                    <td>&nbsp;</td>
                    <td class="ct_sl2"><input type="text" class="disable tinhtoan convertcurrency" name="giaban7" id="giaban7"
                            value="{$GIABAN7}" size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable tinhtoan convertcurrency" name="giaban8" id="giaban8"
                            value="{$GIABAN8}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable tinhtoan convertcurrency" name="giaban9" id="giaban9"
                            value="{$GIABAN9}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable tinhtoan" name="giaban10" id="giaban10"
                            value="{$GIABAN10}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="giaban calculate tinhtoan convertcurrency" name="giaban11" id="giaban11"
                            value="{$GIABAN11}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="giaban calculate tinhtoan convertcurrency" name="giaban12" id="giaban12"
                            value="{$GIABAN12}" size="10"/></td>
                </tr>
                <tr>
                    <td class="ct_sl3 dataLabel">LÃI/KHÁCH</td>
                    <td class="ct_sl2"><input type="text" class="disable convertcurrency" name="laikhach1" id="laikhach1" value="{$LAIKHACH1}"
                            size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable convertcurrency" name="laikhach2" id="laikhach2" value="{$LAIKHACH2}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="laikhach3" id="laikhach3" value="{$LAIKHACH3}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="laikhach4" id="laikhach4" value="{$LAIKHACH4}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="laikhach5" id="laikhach5" value="{$LAIKHACH5}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="laikhach6" id="laikhach6" value="{$LAIKHACH6}"
                            size="10"/></td>
                    <td>&nbsp;</td>
                    <td class="ct_sl2"><input type="text" class="disable convertcurrency" name="laikhach7" id="laikhach7" value="{$LAIKHACH7}"
                            size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable convertcurrency" name="laikhach8" id="laikhach8" value="{$LAIKHACH8}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="laikhach9" id="laikhach9" value="{$LAIKHACH9}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="laikhach10" id="laikhach10"
                            value="{$LAIKHACH10}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="laikhach11" id="laikhach11"
                            value="{$LAIKHACH11}" size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="laikhach12" id="laikhach12"
                            value="{$LAIKHACH12}" size="10"/></td>
                </tr>
                <tr>
                    <td class="ct_sl3 dataLabel">TỔNG LÃI</td>
                    <td class="ct_sl2"><input type="text" class="disable convertcurrency" name="tonglai1" id="tonglai1" value="{$TONGLAI1}"
                            size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable convertcurrency" name="tonglai2" id="tonglai2" value="{$TONGLAI2}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="tonglai3" id="tonglai3" value="{$TONGLAI3}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="tonglai4" id="tonglai4" value="{$TONGLAI4}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="tonglai5" id="tonglai5" value="{$TONGLAI5}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="tonglai6" id="tonglai6" value="{$TONGLAI6}"
                            size="10"/></td>
                    <td>&nbsp;</td>
                    <td class="ct_sl2"><input type="text" class="disable convertcurrency" name="tonglai7" id="tonglai7" value="{$TONGLAI7}"
                            size="10"/></td>
                    <td class="ct_sl2"><input type="text" class="disable convertcurrency" name="tonglai8" id="tonglai8" value="{$TONGLAI8}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="tonglai9" id="tonglai9" value="{$TONGLAI9}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="tonglai10" id="tonglai10" value="{$TONGLAI10}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="tonglai11" id="tonglai11" value="{$TONGLAI11}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable convertcurrency" name="tonglai12" id="tonglai12" value="{$TONGLAI12}"
                            size="10"/></td>
                </tr>
                <tr>
                    <td class="ct_sl3 dataLabel">TỶ LỆ</td>
                    <td class="ct_sl2"><input type="text" class="disable" name="tyle1" id="tyle1" value="{$TYLE1}" size="10"/>
                    </td>
                    <td class="ct_sl2"><input type="text" class="disable" name="tyle2" id="tyle2" value="{$TYLE2}" size="10"/>
                    </td>
                    <td class="ct_sl3"><input type="text" class="disable" name="tyle3" id="tyle3" value="{$TYLE3}" size="10"/>
                    </td>
                    <td class="ct_sl3"><input type="text" class="disable" name="tyle4" id="tyle4" value="{$TYLE4}" size="10"/>
                    </td>
                    <td class="ct_sl3"><input type="text" class="disable" name="tyle5" id="tyle5" value="{$TYLE5}" size="10"/>
                    </td>
                    <td class="ct_sl3"><input type="text" class="disable" name="tyle6" id="tyle6" value="{$TYLE6}" size="10"/>
                    </td>
                    <td>&nbsp;</td>
                    <td class="ct_sl2"><input type="text" class="disable" name="tyle7" id="tyle7" value="{$TYLE7}" size="10"/>
                    </td>
                    <td class="ct_sl2"><input type="text" class="disable" name="tyle8" id="tyle8" value="{$TYLE8}" size="10"/>
                    </td>
                    <td class="ct_sl3"><input type="text" class="disable" name="tyle9" id="tyle9" value="{$TYLE9}" size="10"/>
                    </td>
                    <td class="ct_sl3"><input type="text" class="disable" name="tyle10" id="tyle10" value="{$TYLE10}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable" name="tyle11" id="tyle11" value="{$TYLE11}"
                            size="10"/></td>
                    <td class="ct_sl3"><input type="text" class="disable" name="tyle12" id="tyle12" value="{$TYLE12}"
                            size="10"/></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td class="dataLabel">{$MOD.LBL_ASSIGNED_TO_NAME}</td>
                    <td class="dataField">
                        <input type="text" id="assigned_user_name" size="40" name="assigned_user_name"
                            value="{$ASSIGNED_USER_NAME}"/>
                        <input type="hidden" id="assigned_user_id" name="assigned_user_id" value="{$ASSIGNED_USER_ID}"/>
                        <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                            tabindex='2' class="button openuser" value='Select'>
                        <input type="button" name="clear" id="clear"
                            onclick="this.form.assigned_user_name.value='';this.form.assigned_user_id.value='' ;"
                            value="Clear"/></td>

                </tr>
            </table>
        </div>
        <div class="cacbutton">
            <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button"
                onclick="this.form.action.value='Save';return check_form('ob_package');"
                type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  ">
            <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button"
                onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'"
                type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
            {if $ID neq ''}
            <input title="View Change Log" class="button"
                onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Worksheets", true, false, {$view_change_log} ); return false;'
                type="submit" value="View Change Log">
            {/if}
        </div>
    </form>

</body>
