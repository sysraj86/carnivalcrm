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

            input[type="text"]:focus {
                box-shadow: 0 0 5px #ccf;
                outline:none;
            }
            table.table_content{
                border:1px solid;
                border-collapse:collapse;
                margin: 10px auto;
                display: block;
                padding:5px;
            }
            table.table_content > tbody> tr >td{
                border-bottom:1px solid #999 !important;
                border-right:1px solid #999 !important;
                border-collapse:collapse !important;
                padding:2px;
            }

            div#ib_content{
                border-collapse: collapse;
                margin: 10px auto;
                border-radius: 5px;
                border: 1px solid #ccc;
                display: block;
                padding:5px;
				background:linear-gradient(center top , #FFFFFF 0px, #F2F2F2 100%) repeat scroll 0 0 transparent !important;
            }
            div#ib_content > fieldset{
                border:none;
            }

            div#ib_content > fieldset{:hover {
                box-shadow: 0 0 5px #ccc;
            }

            input[type="text"] {
                font-size: 12px;
                padding: 2px 4px 3px 4px;
                border-radius: 3px;
                margin: 3px auto;
            }
            
            .calculate {
                text-align: right;
            }

        </style>

        <script type="text/javascript">
            /*window.onbeforeunload = function(){
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
            }*/ 

            $(document).ready(function(){
                jQuery('#content').find('#ib_content').css('width',window.screen.availWidth-45);
                jQuery('#content').find('#ib_content').css('height',window.screen.height-350);
                jQuery('#content').find('#ib_content').css('overflow','scroll');
                jQuery('.calculate').css('text-align','right');
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
                <legend><h3>OVERVIEW</h3></legend>
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
                                <button title="Clear [Alt+C]" accesskey="C" type="button" tabindex="3" class="button" value="Clear" name="" id="" onClick="this.form.worksheet_tour_name.value='';this.form.worksheet_tour_id.value='' ;"=""><img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=446605591" alt=""> </button>
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
                            <button title="Clear [Alt+C]" accesskey="C" type="button" tabindex="3" class="button" value="Clear" name="" id="" onClick="this.form.groupprograorksheets_name.value='';this.form.groupprogrd737rograms_ida.value='' ;"=""><img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&amp;c=1&amp;developerMode=446605591" alt=""> </button>
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
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <!-- CONTENT OF IB -->
            <div id="ib_content">
              <fieldset> <legend> <h2>DETAIL INFORMATION </h2></legend>
                  <table width="100%" border="0" style="border:1px; border-collapse:collapse" class="table_content" cellspacing="0">
                      <tbody>
                          <tr>
                              <td colspan="4" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999">&nbsp;</td>
                              <td colspan="5" align="center" valign="middle" bgcolor="#FF33FF" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>1-2pax 4-seat</strong></td>
                              <td colspan="5" align="center" valign="middle" bgcolor="#FFFF99" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>3-4pax 7-seat</strong></td>
                              <td colspan="5" align="center" valign="middle" bgcolor="#99FFFF" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>5-7pax 16-seat</strong></td>
                              <td colspan="5" align="center" valign="middle" bgcolor="#9966FF" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>8-12pax 29seat</strong></td>
                              <td colspan="5" align="center" valign="middle" bgcolor="#999999" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>13-16pax 35seat</strong></td>
                              <td colspan="4" align="center" valign="middle" bgcolor="#999999" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>13-16pax 35seat (15+1FOC)</strong></td>
                              <td colspan="7" align="center" valign="middle" bgcolor="#33CCFF" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>17-30pax 45seat (30+2FOC)</strong></td>
                              <td rowspan="2" align="center" valign="middle" bgcolor="#FF0000" class="dataLabel" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>SGL Supp</strong></td>
                              <td rowspan="2" align="center" bgcolor="#FF0000" style="text-align:center; border-top:1px solid #999 ; border-left:1px solid #999"><strong>TAX Supp</strong></td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><b>SERVICE</b></td>
                              <td class="dataLabel"><b>Unite price</b></td>
                              <td class="dataLabel"><b>Quantity</b></td>
                              <td class="dataLabel"><b>Total Price</b></td>
                              <td bgcolor="#FF33FF"></td>
                              <td bgcolor="#FF33FF"><input name="soluongkh1" type="text" class="calculate" id="soluongkh1" value="{$soluongkh1}" size="10" /></td>
                              <td bgcolor="#FF33FF"><input name="soluongkh2" type="text" class="calculate" id="soluongkh2" value="{$soluongkh2}" size="10" /></td>
                              <td bgcolor="#FF33FF" class="dataLabel" style="text-align:center"><label id="tax1">Tax 1</label></td>
                              <td bgcolor="#FF33FF" class="dataLabel" style="text-align:center"><label id="tax2">Tax 2</label></td>
                              <td bgcolor="#FFFF99"></td>
                              <td bgcolor="#FFFF99"><input name="soluongkh3" type="text" class="calculate" id="soluongkh3" value="{$soluongkh3}" size="10" /></td>
                              <td bgcolor="#FFFF99"><input name="soluongkh4" type="text" class="calculate" id="soluongkh4" value="{$soluongkh4}" size="10" /></td>
                              <td bgcolor="#FFFF99" class="dataLabel" style="text-align:center"><label id="tax3">Tax 3</label></td>
                              <td bgcolor="#FFFF99" class="dataLabel" style="text-align:center"><label id="tax4">Tax 4</label></td>
                              <td bgcolor="#99FFFF"></td>
                              <td bgcolor="#99FFFF"><input name="soluongkh5" type="text" class="calculate" id="soluongkh5" value="{$soluongkh5}" size="10" /></td>
                              <td bgcolor="#99FFFF"><input name="soluongkh6" type="text" class="calculate" id="soluongkh6" value="{$soluongkh6}" size="10" /></td>
                              <td bgcolor="#99FFFF" class="dataLabel" style="text-align:center"><label id="tax5">Tax 5</label></td>
                              <td bgcolor="#99FFFF" class="dataLabel" style="text-align:center"><label id="tax6">Tax 6</label></td>
                              <td bgcolor="#9966FF"></td>
                              <td bgcolor="#9966FF"><input name="soluongkh7" type="text" class="calculate" id="soluongkh7" value="{$soluongkh7}" size="10" /></td>
                              <td bgcolor="#9966FF"><input name="soluongkh8" type="text" class="calculate" id="soluongkh8" value="{$soluongkh8}" size="10" /></td>
                              <td bgcolor="#9966FF" class="dataLabel" style="text-align:center"><label id="tax7">Tax 7</label></td>
                              <td bgcolor="#9966FF" class="dataLabel" style="text-align:center"><label id="tax8">Tax 8</label></td>
                              <td bgcolor="#999999"></td>
                              <td bgcolor="#999999"><input name="soluongkh9" type="text" class="calculate" id="soluongkh9" value="{$soluongkh9}" size="10" /></td>
                              <td bgcolor="#999999"><input name="soluongkh10" type="text" class="calculate" id="soluongkh10" value="{$soluongkh10}" size="10" /></td>
                              <td bgcolor="#999999" class="dataLabel" style="text-align:center"><label id="tax9">Tax 9</label></td>
                              <td bgcolor="#999999" class="dataLabel" style="text-align:center"><label id="tax10">Tax 10</label></td>
                              <td bgcolor="#999999"><input name="soluongkh11" type="text" class="calculate" id="soluongkh11" value="{$soluongkh11}" size="10" /></td>
                              <td bgcolor="#999999"><input name="soluongkh12" type="text" class="calculate" id="soluongkh12" value="{$soluongkh12}" size="10" /></td>
                              <td bgcolor="#999999" class="dataLabel" style="text-align:center"><label id="tax11">Tax 11</label></td>
                              <td bgcolor="#999999" class="dataLabel" style="text-align:center"><label id="tax12">Tax 12</label></td>
                              <td bgcolor="#33CCFF"></td>
                              <td bgcolor="#33CCFF"><input name="soluongkh13" type="text" class="calculate" id="soluongkh13" value="{$soluongkh13}" size="10" /></td>
                              <td bgcolor="#33CCFF"><input name="soluongkh14" type="text" class="calculate" id="soluongkh14" value="{$soluongkh14}" size="10" /></td>
                              <td bgcolor="#33CCFF"><input name="soluongkh15" type="text" class="calculate" id="soluongkh15" value="{$soluongkh15}" size="10" /></td>
                              <td bgcolor="#33CCFF" class="dataLabel" style="text-align:center"><label id="tax13">Tax 13</label></td>
                              <td bgcolor="#33CCFF" class="dataLabel" style="text-align:center"><label id="tax14">Tax 14</label></td>
                              <td bgcolor="#33CCFF" class="dataLabel" style="text-align:center"><label id="tax15">Tax 15</label></td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>TRANSFER</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle" class="dataLabel"><strong>VND/km</strong></td>
                              <td><input class="calculate" readonly="true" name="transfer1" type="text" id="transfer1" value="{$transfer1}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer2" type="text" id="transfer2" value="{$transfer2}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer3" type="text" id="transfer3" value="{$transfer3}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer4" type="text" id="transfer4" value="{$transfer4}" size="10" /></td>
                              <td align="center" valign="middle" class="dataLabel"><strong>VND/km</strong></td>
                              <td><input class="calculate" readonly="true" name="transfer5" type="text" id="transfer5" value="{$transfer5}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer6" type="text" id="transfer6" value="{$transfer6}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer7" type="text" id="transfer7" value="{$transfer7}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer8" type="text" id="transfer8" value="{$transfer8}" size="10" /></td>
                              <td class="dataLabel"><strong>VND/km</strong></td>
                              <td><input class="calculate" readonly="true" name="transfer9" type="text" id="transfer9" value="{$transfer9}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer10" type="text" id="transfer10" value="{$transfer10}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer11" type="text" id="transfer11" value="{$transfer11}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer12" type="text" id="transfer12" value="{$transfer12}" size="10" /></td>
                              <td class="dataLabel"><strong>VND/km</strong></td>
                              <td><input class="calculate" readonly="true" name="transfer13" type="text" id="transfer13" value="{$transfer13}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer14" type="text" id="transfer14" value="{$transfer14}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer15" type="text" id="transfer15" value="{$transfer15}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer16" type="text" id="transfer16" value="{$transfer16}" size="10" /></td>
                              <td align="center" class="dataLabel"><strong>VND/km</strong></td>
                              <td><input class="calculate" readonly="true" name="transfer17" type="text" id="transfer17" value="{$transfer17}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer18" type="text" id="transfer18" value="{$transfer18}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer19" type="text" id="transfer19" value="{$transfer19}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer20" type="text" id="transfer20" value="{$transfer20}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer21" type="text" id="transfer21" value="{$transfer21}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer22" type="text" id="transfer22" value="{$transfer22}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer23" type="text" id="transfer23" value="{$transfer23}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer24" type="text" id="transfer24" value="{$transfer24}" size="10" /></td>
                              <td align="center" class="dataLabel"><strong>VND/km</strong></td>
                              <td><input class="calculate" readonly="true" name="transfer25" type="text" id="transfer25" value="{$transfer25}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer26" type="text" id="transfer26" value="{$transfer26}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer27" type="text" id="transfer27" value="{$transfer27}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer28" type="text" id="transfer28" value="{$transfer28}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer29" type="text" id="transfer29" value="{$transfer29}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="transfer30" type="text" id="transfer30" value="{$transfer30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">South (Km)</td>
                              <td><input class="calculate" name="transfer_south" type="text" id="transfer_south" value="{$transfer_south}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_south_km1" type="text" id="transfer_south_km1" value="{$transfer_south_km1}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_south_km2" type="text" id="transfer_south_km2" value="{$transfer_south_km2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_south_km3" type="text" id="transfer_south_km3" value="{$transfer_south_km3}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_south_km4" type="text" id="transfer_south_km4" value="{$transfer_south_km4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_south_km5" type="text" id="transfer_south_km5" value="{$transfer_south_km5}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_south_km6" type="text" id="transfer_south_km6" value="{$transfer_south_km6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Middle (Km)</td>
                              <td><input class="calculate" name="transfer_middle" type="text" id="transfer_middle" value="{$transfer_middle}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_middle_km1" type="text" id="transfer_middle_km1" value="{$transfer_middle_km1}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_middle_km2" type="text" id="transfer_middle_km2" value="{$transfer_middle_km2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_middle_km3" type="text" id="transfer_middle_km3" value="{$transfer_middle_km3}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_middle_km4" type="text" id="transfer_middle_km4" value="{$transfer_middle_km4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_middle_km5" type="text" id="transfer_middle_km5" value="{$transfer_middle_km5}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_middle_km6" type="text" id="transfer_middle_km6" value="{$transfer_middle_km6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">North (Km)</td>
                              <td><input class="calculate" name="transfer_north" type="text" id="transfer_north" value="{$transfer_north}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_north_km1" type="text" id="transfer_north_km1" value="{$transfer_north_km1}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_north_km2" type="text" id="transfer_north_km2" value="{$transfer_north_km2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_north_km3" type="text" id="transfer_north_km3" value="{$transfer_north_km3}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_north_km4" type="text" id="transfer_north_km4" value="{$transfer_north_km4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_north_km5" type="text" id="transfer_north_km5" value="{$transfer_north_km5}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="transfer_north_km6" type="text" id="transfer_north_km6" value="{$transfer_north_km6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="4" style="border-left:1px solid #999">&nbsp;</td>
                              <td class="dataLabel"><strong>Package</strong></td>
                              <td colspan="4">&nbsp;</td>
                              <td><strong>Package</strong></td>
                              <td colspan="4">&nbsp;</td>
                              <td align="center" class="dataLabel"><strong>Package</strong></td>
                              <td colspan="4">&nbsp;</td>
                              <td align="center"><strong>Package</strong></td>
                              <td colspan="4">&nbsp;</td>
                              <td class="dataLabel"><strong>Package</strong></td>
                              <td colspan="4">&nbsp;</td>
                              <td colspan="4">&nbsp;</td>
                              <td align="center"><strong>Package</strong></td>
                              <td colspan="8">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">South (Package)</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="south_package1" type="text" id="south_package1" value="{$south_package1}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="south_package2" type="text" id="south_package2" value="{$south_package2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="south_package3" type="text" id="south_package3" value="{$south_package3}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="south_package4" type="text" id="south_package4" value="{$south_package4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="south_package5" type="text" id="south_package5" value="{$south_package5}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="south_package6" type="text" id="south_package6" value="{$south_package6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Middle (Package)</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="middle_package1" type="text" id="middle_package1" value="{$middle_package1}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="middle_package2" type="text" id="middle_package2" value="{$middle_package2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="middle_package3" type="text" id="middle_package3" value="{$middle_package3}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="middle_package4" type="text" id="middle_package4" value="{$middle_package4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="middle_package5" type="text" id="middle_package5" value="{$middle_package5}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="middle_package6" type="text" id="middle_package6" value="{$middle_package6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">North (Package)</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="north_package1" type="text" id="north_package1" value="{$north_package1}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="north_package2" type="text" id="north_package2" value="{$north_package2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="north_package3" type="text" id="north_package3" value="{$north_package3}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="north_package4" type="text" id="north_package4" value="{$north_package4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="north_package5" type="text" id="north_package5" value="{$north_package5}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="north_package6" type="text" id="north_package6" value="{$north_package6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>BOAT</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="boat_sum" type="text" id="boat_sum" value="{$boat_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="boat1" type="text" id="boat1" value="{$boat1}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat2" type="text" id="boat2" value="{$boat2}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat3" type="text" id="boat3" value="{$boat3}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat4" type="text" id="boat4" value="{$boat4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="boat5" type="text" id="boat5" value="{$boat5}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat6" type="text" id="boat6" value="{$boat6}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat7" type="text" id="boat7" value="{$boat7}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat8" type="text" id="boat8" value="{$boat8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="boat9" type="text" id="boat9" value="{$boat9}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat10" type="text" id="boat10" value="{$boat10}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat11" type="text" id="boat11" value="{$boat11}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat12" type="text" id="boat12" value="{$boat12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="boat13" type="text" id="boat13" value="{$boat13}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat14" type="text" id="boat14" value="{$boat14}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat15" type="text" id="boat15" value="{$boat15}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat16" type="text" id="boat16" value="{$boat16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="boat17" type="text" id="boat17" value="{$boat17}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat18" type="text" id="boat18" value="{$boat18}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat19" type="text" id="boat19" value="{$boat19}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat20" type="text" id="boat20" value="{$boat20}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat21" type="text" id="boat21" value="{$boat21}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat22" type="text" id="boat22" value="{$boat22}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat23" type="text" id="boat23" value="{$boat23}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat24" type="text" id="boat24" value="{$boat24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="boat25" type="text" id="boat25" value="{$boat25}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat26" type="text" id="boat26" value="{$boat26}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat27" type="text" id="boat27" value="{$boat27}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat28" type="text" id="boat28" value="{$boat28}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat29" type="text" id="boat29" value="{$boat29}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="boat30" type="text" id="boat30" value="{$boat30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{if $ID eq '' OR $count_boat eq '0'}
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><input name="boat_service[]" type="text" id="boat_service" size="30" /></td>
                              <td><input class="calculate boat_price" name="boat_price[]" type="text" id="boat_price" size="10" /></td>
                              <td><input class="calculate boat_num" name="boat_num[]" type="text" id="boat_num[]" size="10" /></td>
                              <td><input class="calculate boat_money" readonly="true" name="boat_money[]" type="text" id="boat_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{/if}
                        {$boat_html}
                          <tr>
                              <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>GUIDE</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input name="guide_sum" readonly="true" type="text" class="calculate" id="guide_sum" value="{$guide_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="guide1" type="text" id="guide1" value="{$guide1}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="guide2" type="text" id="guide2" value="{$guide2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="guide3" type="text" id="guide3" value="{$guide3}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="guide4" type="text" id="guide4" value="{$guide4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="guide5" type="text" id="guide5" value="{$guide5}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="guide6" type="text" id="guide6" value="{$guide6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="guide7" type="text" id="guide7" value="{$guide7}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="guide8" type="text" id="guide8" value="{$guide8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="guide9" type="text" id="guide9" value="{$guide9}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="guide10" type="text" id="guide10" value="{$guide10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="guide11" type="text" id="guide11" value="{$guide11}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="guide12" type="text" id="guide12" value="{$guide12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="true" name="guide13" type="text" id="guide13" value="{$guide13}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="guide14" type="text" id="guide14" value="{$guide14}" size="10" /></td>
                              <td><input class="calculate" readonly="true" name="guide15" type="text" id="guide15" value="{$guide15}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">South</td>
                              <td><input name="guide_south_price" type="text" class="calculate" id="guide_south_price" value="{$guide_south_price}" size="10" /></td>
                              <td><input name="guide_south_num" type="text" class="calculate" id="guide_south_num" value="{$guide_south_num}" size="10" /></td>
                              <td><input name="guide_south_money" type="text" class="calculate" readonly="true" id="guide_south_money" value="{$guide_south_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Middle</td>
                              <td><input name="guide_middle_price" type="text" class="calculate" id="guide_middle_price" value="{$guide_middle_price}" size="10" /></td>
                              <td><input name="guide_middle_num" type="text" class="calculate" id="guide_middle_num" value="{$guide_middle_num}" size="10" /></td>
                              <td><input name="guide_middle_money" type="text" class="calculate" readonly="true" id="guide_middle_money" value="{$guide_middle_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">North</td>
                              <td><input name="guide_north_price" type="text" class="calculate" id="guide_north_price" value="{$guide_north_price}" size="10" /></td>
                              <td><input name="guide_north_num" type="text" class="calculate" id="guide_north_num" value="{$guide_north_num}" size="10" /></td>
                              <td><input name="guide_north_money" type="text" class="calculate" readonly="true" id="guide_north_money" value="{$guide_north_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>GROUP MISCELLANEOUS (Include VAT)</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="group_sum" type="text" id="group_sum" value="{$group_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="group1" type="text" id="group1" value="{$group1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group2" type="text" id="group2" value="{$group2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group3" type="text" id="group3" value="{$group3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group4" type="text" id="group4" value="{$group4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="group5" type="text" id="group5" value="{$group5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group6" type="text" id="group6" value="{$group6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group7" type="text" id="group7" value="{$group7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group8" type="text" id="group8" value="{$group8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="group9" type="text" id="group9" value="{$group9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group10" type="text" id="group10" value="{$group10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group11" type="text" id="group11" value="{$group11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group12" type="text" id="group12" value="{$group12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="group13" type="text" id="group13" value="{$group13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group14" type="text" id="group14" value="{$group14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group15" type="text" id="group15" value="{$group15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group16" type="text" id="group16" value="{$group16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="group17" type="text" id="group17" value="{$group17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group18" type="text" id="group18" value="{$group18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group19" type="text" id="group19" value="{$group19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group20" type="text" id="group20" value="{$group20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group21" type="text" id="group21" value="{$group21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group22" type="text" id="group22" value="{$group22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group23" type="text" id="group23" value="{$group23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group24" type="text" id="group24" value="{$group24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="group25" type="text" id="group25" value="{$group25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group26" type="text" id="group26" value="{$group26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group27" type="text" id="group27" value="{$group27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group28" type="text" id="group28" value="{$group28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group29" type="text" id="group29" value="{$group29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="group30" type="text" id="group30" value="{$group30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{if $ID eq '' OR $count_group1_fit eq '0'}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="group1_service[]" type="text" id="group1_service[]" size="30" /></td>
                              <td><input class="calculate group_price"  name="group1_price[]" type="text" id="group1_price" size="10" /></td>
                              <td><input class="calculate group_num"  name="group1_num[]" type="text" id="group1_num" size="10" /></td>
                              <td><input class="calculate group_money" readonly="readonly" name="group1_money[]" type="text" id="group1_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{/if}
                        {$group1_html}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>GROUP MISCELLANEOUS (Not VAT)</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{if $ID eq '' OR $count_group2 eq ''}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="group2_service[]" type="text" id="group2_service[]" size="30" /></td>
                              <td><input class="calculate group_price" name="group2_price[]" type="text" id="group2_price" size="10" /></td>
                              <td><input class="calculate group_num" name="group2_num[]" type="text" id="group2_num[]" size="10" /></td>
                              <td><input class="calculate group_money" readonly="readonly" name="group2_money[]" type="text" id="group2_money[]" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{/if}
                        {$group2_html}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
						
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>ENTRANCE</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="entrance_sum" type="text" id="entrance_sum" value="{$entrance_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="entrance1" type="text" id="entrance1" value="{$entrance1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="entrance2" type="text" id="entrance2" value="{$entrance2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="entrance3" type="text" id="entrance3" value="{$entrance3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="entrance4" type="text" id="entrance4" value="{$entrance4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="entrance5" type="text" id="entrance5" value="{$entrance5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="entrance6" type="text" id="entrance6" value="{$entrance6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="entrance7" type="text" id="entrance7" value="{$entrance7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="entrance8" type="text" id="entrance8" value="{$entrance8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="entrance9" type="text" id="entrance9" value="{$entrance9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="entrance10" type="text" id="entrance10" value="{$entrance10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="entrance11" type="text" id="entrance11" value="{$entrance11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="entrance12" type="text" id="entrance12" value="{$entrance12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" name="entrance13" type="text" id="entrance13" value="{$entrance13}" size="10" /></td>
                              <td><input class="calculate" name="entrance14" type="text" id="entrance14" value="{$entrance14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="entrance15" type="text" id="entrance15" value="{$entrance15}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{if $ID eq '' OR $count_entrance eq '0'}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="entrance_service[]" type="text" id="entrance_service[]" size="30" /></td>
                              <td><input class="calculate entrance_price" name="entrance_price[]" type="text" id="entrance_price" size="10" /></td>
                              <td><input class="calculate entrance_num" name="entrance_num[]" type="text" id="entrance_num" size="10" /></td>
                              <td><input class="calculate entrance_money" readonly="readonly" name="entrance_money[]" type="text" id="entrance_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{/if}
                            {$entrance_html}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>TICKETS</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="ticket_sum" type="text" id="ticket_sum" value="{$ticket_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="ticket1" type="text" id="ticket1" value="{$ticket1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="ticket2" type="text" id="ticket2" value="{$ticket2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="ticket3" type="text" id="ticket3" value="{$ticket3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="ticket4" type="text" id="ticket4" value="{$ticket4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="ticket5" type="text" id="ticket5" value="{$ticket5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="ticket6" type="text" id="ticket6" value="{$ticket6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="ticket7" type="text" id="ticket7" value="{$ticket7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="ticket8" type="text" id="ticket8" value="{$ticket8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="ticket9" type="text" id="ticket9" value="{$ticket9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="ticket10" type="text" id="ticket10" value="{$ticket10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="ticket11" type="text" id="ticket11" value="{$ticket11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="ticket12" type="text" id="ticket12" value="{$ticket12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="ticket13" type="text" id="ticket13" value="{$ticket13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="ticket14" type="text" id="ticket14" value="{$ticket14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="ticket15" type="text" id="ticket15" value="{$ticket15}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{if $ID eq '' OR $count_ticket eq '0'}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="tickets_service[]" type="text" id="tickets_service[]" size="30" /></td>
                              <td><input class="calculate tickets_price" name="tickets_price[]" type="text" id="tickets_price" size="10" /></td>
                              <td><input class="calculate tickets_num" name="tickets_num" type="text" id="tickets_num[]" size="10" /></td>
                              <td><input class="calculate tickets_money" readonly="readonly" name="tickets_money[]" type="text" id="tickets_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{/if}
                        {$html_ticket}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>FIT MISCELLANEOUS (gồm VAT)</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="fit_sum" type="text" id="fit_sum" value="{$fit_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="fit1" type="text" id="fit1" value="{$fit1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit2" type="text" id="fit2" value="{$fit2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit3" type="text" id="fit3" value="{$fit3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit4" type="text" id="fit4" value="{$fit4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="fit5" type="text" id="fit5" value="{$fit5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit6" type="text" id="fit6" value="{$fit6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit7" type="text" id="fit7" value="{$fit7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit8" type="text" id="fit8" value="{$fit8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="fit9" type="text" id="fit9" value="{$fit9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit10" type="text" id="fit10" value="{$fit10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit11" type="text" id="fit11" value="{$fit11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit12" type="text" id="fit12" value="{$fit12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="fit13" type="text" id="fit13" value="{$fit13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit14" type="text" id="fit14" value="{$fit14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit15" type="text" id="fit15" value="{$fit15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit16" type="text" id="fit16" value="{$fit16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="fit17" type="text" id="fit17" value="{$fit17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit18" type="text" id="fit18" value="{$fit18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit19" type="text" id="fit19" value="{$fit19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit20" type="text" id="fit20" value="{$fit20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit21" type="text" id="fit21" value="{$fit21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit22" type="text" id="fit22" value="{$fit22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit23" type="text" id="fit23" value="{$fit23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit24" type="text" id="fit24" value="{$fit24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="fit25" type="text" id="fit25" value="{$fit25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit26" type="text" id="fit26" value="{$fit26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit27" type="text" id="fit27" value="{$fit27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit28" type="text" id="fit28" value="{$fit28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit29" type="text" id="fit29" value="{$fit29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="fit30" type="text" id="fit30" value="{$fit30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{if $ID eq '' OR $count_fit1 eq '0'}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="fit1_service[]" type="text" id="fit1_service[]" size="30" /></td>
                              <td><input class="calculate fit_price" name="fit1_price[]" type="text" id="fit1_price" size="10" /></td>
                              <td><input class="calculate fit_num" name="fit1_num[]" type="text" id="fit1_num[]" size="10" /></td>
                              <td><input class="calculate fit_money" readonly="readonly" name="fit1_money[]" type="text" id="fit1_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{/if}
                        {$html_fit1}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>FIT MISCELLANEOUS (không VAT)</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{if $ID eq '' OR $count_fit2 eq '0'}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="fit2_service[]" type="text" id="fit2_service[]" size="30" /></td>
                              <td><input class="calculate fit_price" name="fit2_price[]" type="text" id="fit2_price" size="10" /></td>
                              <td><input class="calculate fit_num" name="fit2_num[]" type="text" id="fit2_num" size="10" /></td>
                              <td><input class="calculate fit_money" readonly="readonly" name="fit2_money[]" type="text" id="fit2_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{/if}
                        {$html_fit2}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>MEALS 1</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_sum" type="text" id="meal1_sum" value="{$meal1_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_1" type="text" id="meal1_1" value="{$meal1_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_2" type="text" id="meal1_2" value="{$meal1_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_3" type="text" id="meal1_3" value="{$meal1_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_4" type="text" id="meal1_4" value="{$meal1_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_5" type="text" id="meal1_5" value="{$meal1_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_6" type="text" id="meal1_6" value="{$meal1_6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_7" type="text" id="meal1_7" value="{$meal1_7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_8" type="text" id="meal1_8" value="{$meal1_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_9" type="text" id="meal1_9" value="{$meal1_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_10" type="text" id="meal1_10" value="{$meal1_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_11" type="text" id="meal1_11" value="{$meal1_11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_12" type="text" id="meal1_12" value="{$meal1_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_13" type="text" id="meal1_13" value="{$meal1_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_14" type="text" id="meal1_14" value="{$meal1_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_15" type="text" id="meal1_15" value="{$meal1_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_16" type="text" id="meal1_16" value="{$meal1_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_17" type="text" id="meal1_17" value="{$meal1_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_18" type="text" id="meal1_18" value="{$meal1_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_19" type="text" id="meal1_19" value="{$meal1_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_20" type="text" id="meal1_20" value="{$meal1_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_21" type="text" id="meal1_21" value="{$meal1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_22" type="text" id="meal1_22" value="{$meal1_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_23" type="text" id="meal1_23" value="{$meal1_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_24" type="text" id="meal1_24" value="{$meal1_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_25" type="text" id="meal1_25" value="{$meal1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_26" type="text" id="meal1_26" value="{$meal1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_27" type="text" id="meal1_27" value="{$meal1_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_28" type="text" id="meal1_28" value="{$meal1_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_29" type="text" id="meal1_29" value="{$meal1_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_30" type="text" id="meal1_30" value="{$meal1_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>South</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south_sum" type="text" id="meal1_south_sum" value="{$meal1_south_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south1" type="text" id="meal1_south1" value="{$meal1_south1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south2" type="text" id="meal1_south2" value="{$meal1_south2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south3" type="text" id="meal1_south3" value="{$meal1_south3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south4" type="text" id="meal1_south4" value="{$meal1_south4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south5" type="text" id="meal1_south5" value="{$meal1_south5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south6" type="text" id="meal1_south6" value="{$meal1_south6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south7" type="text" id="meal1_south7" value="{$meal1_south7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south8" type="text" id="meal1_south8" value="{$meal1_south8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south9" type="text" id="meal1_south9" value="{$meal1_south9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south10" type="text" id="meal1_south10" value="{$meal1_south10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south11" type="text" id="meal1_south11" value="{$meal1_south11}" size="10" /></td>
                              <td><input name="meal1_south12" type="text" id="meal1_south12" value="{$meal1_south12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south13" type="text" id="meal1_south13" value="{$meal1_south13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south14" type="text" id="meal1_south14" value="{$meal1_south14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south15" type="text" id="meal1_south15" value="{$meal1_south15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south16" type="text" id="meal1_south16" value="{$meal1_south16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south17" type="text" id="meal1_south17" value="{$meal1_south17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south18" type="text" id="meal1_south18" value="{$meal1_south18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south19" type="text" id="meal1_south19" value="{$meal1_south19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south20" type="text" id="meal1_south20" value="{$meal1_south20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south21" type="text" id="meal1_south21" value="{$meal1_south21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south22" type="text" id="meal1_south22" value="{$meal1_south22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south23" type="text" id="meal1_south23" value="{$meal1_south23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south24" type="text" id="meal1_south24" value="{$meal1_south24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south25" type="text" id="meal1_south25" value="{$meal1_south25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south26" type="text" id="meal1_south26" value="{$meal1_south26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south27" type="text" id="meal1_south27" value="{$meal1_south27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south28" type="text" id="meal1_south28" value="{$meal1_south28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south29" type="text" id="meal1_south29" value="{$meal1_south29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south30" type="text" id="meal1_south30" value="{$meal1_south30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal1_south_breakfirst_price" type="text" id="meal1_south_breakfirst_price" value="{$meal1_south_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_south_breakfirst_num" type="text" id="meal1_south_breakfirst_num" value="{$meal1_south_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south_breakfirst_money" type="text" id="meal1_south_breakfirst_money" value="{$meal1_south_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal1_south_lunch_price" type="text" id="meal1_south_lunch_price" value="{$meal1_south_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_south_lunch_num" type="text" id="meal1_south_lunch_num" value="{$meal1_south_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south_lunch_money" type="text" id="meal1_south_lunch_money" value="{$meal1_south_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal1_south_dinner_price" type="text" id="meal1_south_dinner_price" value="{$meal1_south_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_south_dinner_num" type="text" id="meal1_south_dinner_num" value="{$meal1_south_dinner_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south_dinner_money" type="text" id="meal1_south_dinner_money" value="{$meal1_south_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal1_south_other_price" type="text" id="meal1_south_other_price" value="{$meal1_south_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_south_other_num" type="text" id="meal1_south_other_num" value="{$meal1_south_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_south_other_money" type="text" id="meal1_south_other_money" value="{$meal1_south_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>Middle</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_miidle_sum" type="text" id="meal1_miidle_sum" value="{$meal1_miidle_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle1" type="text" id="meal1_middle1" value="{$meal1_middle1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle2" type="text" id="meal1_middle2" value="{$meal1_middle2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle3" type="text" id="meal1_middle3" value="{$meal1_middle3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle4" type="text" id="meal1_middle4" value="{$meal1_middle4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle5" type="text" id="meal1_middle5" value="{$meal1_middle5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle6" type="text" id="meal1_middle6" value="{$meal1_middle6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle7" type="text" id="meal1_middle7" value="{$meal1_middle7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle8" type="text" id="meal1_middle8" value="{$meal1_middle8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle9" type="text" id="meal1_middle9" value="{$meal1_middle9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle10" type="text" id="meal1_middle10" value="{$meal1_middle10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle11" type="text" id="meal1_middle11" value="{$meal1_middle11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle12" type="text" id="meal1_middle12" value="{$meal1_middle12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle13" type="text" id="meal1_middle13" value="{$meal1_middle13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle14" type="text" id="meal1_middle14" value="{$meal1_middle14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle15" type="text" id="meal1_middle15" value="{$meal1_middle15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle16" type="text" id="meal1_middle16" value="{$meal1_middle16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle17" type="text" id="meal1_middle17" value="{$meal1_middle17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle18" type="text" id="meal1_middle18" value="{$meal1_middle18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle19" type="text" id="meal1_middle19" value="{$meal1_middle19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle20" type="text" id="meal1_middle20" value="{$meal1_middle20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle21" type="text" id="meal1_middle21" value="{$meal1_middle21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle22" type="text" id="meal1_middle22" value="{$meal1_middle22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle23" type="text" id="meal1_middle23" value="{$meal1_middle23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle24" type="text" id="meal1_middle24" value="{$meal1_middle24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle25" type="text" id="meal1_middle25" value="{$meal1_middle25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle26" type="text" id="meal1_middle26" value="{$meal1_middle26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle27" type="text" id="meal1_middle27" value="{$meal1_middle27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle28" type="text" id="meal1_middle28" value="{$meal1_middle28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle29" type="text" id="meal1_middle29" value="{$meal1_middle29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle30" type="text" id="meal1_middle30" value="{$meal1_middle30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal1_middle_breakfirst_price" type="text" id="meal1_middle_breakfirst_price" value="{$meal1_middle_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_middle_breakfirst_num" type="text" id="meal1_middle_breakfirst_num" value="{$meal1_middle_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle_breakfirst_money" type="text" id="meal1_middle_breakfirst_money" value="{$meal1_middle_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal1_middle_lunch_price" type="text" id="meal1_middle_lunch_price" value="{$meal1_middle_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_middle_lunch_num" type="text" id="meal1_middle_lunch_num" value="{$meal1_middle_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle_lunch_money" type="text" id="meal1_middle_lunch_money" value="{$meal1_middle_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal1_middle_dinner_price" type="text" id="meal1_middle_dinner_price" value="{$meal1_middle_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_middle_dinner_num" type="text" id="meal1_middle_dinner_num" value="{$meal1_middle_dinner_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle_dinner_money" type="text" id="meal1_middle_dinner_money" value="{$meal1_middle_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal1_middle_other_price" type="text" id="meal1_middle_other_price" value="{$meal1_middle_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_middle_other_num" type="text" id="meal1_middle_other_num" value="{$meal1_middle_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_middle_other_money" type="text" id="meal1_middle_other_money" value="{$meal1_middle_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                            <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>North</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north_sum" type="text" id="meal1_north_sum" value="{$meal1_north_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north1" type="text" id="meal1_north1" value="{$meal1_north1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north2" type="text" id="meal1_north2" value="{$meal1_north2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north3" type="text" id="meal1_north3" value="{$meal1_north3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north4" type="text" id="meal1_north4" value="{$meal1_north4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north5" type="text" id="meal1_north5" value="{$meal1_north5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north6" type="text" id="meal1_north6" value="{$meal1_north6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north7" type="text" id="meal1_north7" value="{$meal1_north7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north8" type="text" id="meal1_north8" value="{$meal1_north8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north9" type="text" id="meal1_north9" value="{$meal1_north9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north10" type="text" id="meal1_north10" value="{$meal1_north10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north11" type="text" id="meal1_north11" value="{$meal1_north11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north12" type="text" id="meal1_north12" value="{$meal1_north12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north13" type="text" id="meal1_north13" value="{$meal1_north13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north14" type="text" id="meal1_north14" value="{$meal1_north14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north15" type="text" id="meal1_north15" value="{$meal1_north15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north16" type="text" id="meal1_north16" value="{$meal1_north16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north17" type="text" id="meal1_north17" value="{$meal1_north17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north18" type="text" id="meal1_north18" value="{$meal1_north18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north19" type="text" id="meal1_north19" value="{$meal1_north19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north20" type="text" id="meal1_north20" value="{$meal1_north20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north21" type="text" id="meal1_north21" value="{$meal1_north21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north22" type="text" id="meal1_north22" value="{$meal1_north22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north23" type="text" id="meal1_north23" value="{$meal1_north23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north24" type="text" id="meal1_north24" value="{$meal1_north24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north25" type="text" id="meal1_north25" value="{$meal1_north25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north26" type="text" id="meal1_north26" value="{$meal1_north26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north27" type="text" id="meal1_north27" value="{$meal1_north27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north28" type="text" id="meal1_north28" value="{$meal1_north28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north29" type="text" id="meal1_north29" value="{$meal1_north29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north30" type="text" id="meal1_north30" value="{$meal1_north30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal1_north_breakfirst_price" type="text" id="meal1_north_breakfirst_price" value="{$meal1_north_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_north_breakfirst_num" type="text" id="meal1_north_breakfirst_num" value="{$meal1_north_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north_breakfirst_money" type="text" id="meal1_north_breakfirst_money" value="{$meal1_north_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal1_north_lunch_price" type="text" id="meal1_north_lunch_price" value="{$meal1_north_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_north_lunch_num" type="text" id="meal1_north_lunch_num" value="{$meal1_north_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north_lunch_money" type="text" id="meal1_north_lunch_money" value="{$meal1_north_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal1_north_dinner_price" type="text" id="meal1_north_dinner_price" value="{$meal1_north_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_north_dinner_num" type="text" id="meal1_north_dinner_num" value="{$meal1_north_dinner_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north_dinner_money" type="text" id="meal1_north_dinner_money" value="{$meal1_north_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal1_north_other_price" type="text" id="meal1_north_other_price" value="{$meal1_north_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal1_north_other_num" type="text" id="meal1_north_other_num" value="{$meal1_north_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal1_north_other_money" type="text" id="meal1_north_other_money" value="{$meal1_north_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>HOTEL 1</strong></td>
                              <td class="dataLabel">Room</td>
                              <td class="dataLabel">Nite</td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_sum" type="text" id="hotel1_sum" value="{$hotel1_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_1" type="text" id="hotel1_1" value="{$hotel1_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_2" type="text" id="hotel1_2" value="{$hotel1_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_3" type="text" id="hotel1_3" value="{$hotel1_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_4" type="text" id="hotel1_4" value="{$hotel1_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_5" type="text" id="hotel1_5" value="{$hotel1_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_6" type="text" id="hotel1_6" value="{$hotel1_6}" size="10" /></td>
                              <td><input name="hotel1_7" type="text" id="hotel1_7" value="{$hotel1_7}" size="10" /></td>
                              <td><input name="hotel1_8" type="text" id="hotel1_8" value="{$hotel1_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_9" type="text" id="hotel1_9" value="{$hotel1_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_10" type="text" id="hotel1_10" value="{$hotel1_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_11" type="text" id="hotel1_11" value="{$hotel1_11}" size="10" /></td>
                              <td><input  class="calculate" readonly="readonly"name="hotel1_12" type="text" id="hotel1_12" value="{$hotel1_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_13" type="text" id="hotel1_13" value="{$hotel1_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_14" type="text" id="hotel1_14" value="{$hotel1_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_15" type="text" id="hotel1_15" value="{$hotel1_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_16" type="text" id="hotel1_16" value="{$hotel1_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_17" type="text" id="hotel1_17" value="{$hotel1_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_18" type="text" id="hotel1_18" value="{$hotel1_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_19" type="text" id="hotel1_19" value="{$hotel1_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_20" type="text" id="hotel1_20" value="{$hotel1_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_21" type="text" id="hotel1_21" value="{$hotel1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_22" type="text" id="hotel1_22" value="{$hotel1_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_23" type="text" id="hotel1_23" value="{$hotel1_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_24" type="text" id="hotel1_24" value="{$hotel1_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_25" type="text" id="hotel1_25" value="{$hotel1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_26" type="text" id="hotel1_26" value="{$hotel1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_27" type="text" id="hotel1_27" value="{$hotel1_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_28" type="text" id="hotel1_28" value="{$hotel1_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_29" type="text" id="hotel1_29" value="{$hotel1_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel1_30" type="text" id="hotel1_30" value="{$hotel1_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
						{if $ID eq '' OR $count_hotel1 eq '0'}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="hotel1_service[]" type="text" id="hotel1_service[]" size="30" /></td>
                              <td><input class="calculate hotel1_price" name="hotel1_price[]" type="text" id="hotel1_price" size="10" /></td>
                              <td><input class="calculate hotel1_num" name="hotel1_num[]" type="text" id="hotel1_num" size="10" /></td>
                              <td><input class="calculate hotel1_money" readonly="readonly" name="hotel1_money[]" type="text" id="hotel1_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{/if}
                            {$hotel1_html}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">FOC</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="foc1_21" type="text" id="foc1_21" value="{$foc1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc1_22" type="text" id="foc1_22" value="{$foc1_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc1_23" type="text" id="foc1_23" value="{$foc1_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc1_24" type="text" id="foc1_24" value="{$foc1_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="foc1_25" type="text" id="foc1_25" value="{$foc1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc1_26" type="text" id="foc1_26" value="{$foc1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc1_27" type="text" id="foc1_27" value="{$foc1_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc1_28" type="text" id="foc1_28" value="{$foc1_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc1_29" type="text" id="foc1_29" value="{$foc1_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc1_30" type="text" id="foc1_30" value="{$foc1_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">NETT</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett1_1" type="text" id="nett1_1" value="{$nett1_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_2" type="text" id="nett1_2" value="{$nett1_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_3" type="text" id="nett1_3" value="{$nett1_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_4" type="text" id="nett1_4" value="{$nett1_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett1_5" type="text" id="nett1_5" value="{$nett1_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_6" type="text" id="nett1_6" value="{$nett1_6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_7" type="text" id="nett1_7" value="{$nett1_7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_8" type="text" id="nett1_8" value="{$nett1_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett1_9" type="text" id="nett1_9" value="{$nett1_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_10" type="text" id="nett1_10" value="{$nett1_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly"  name="nett1_11" type="text" id="nett1_11" value="{$nett1_11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_12" type="text" id="nett1_12" value="{$nett1_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett1_13" type="text" id="nett1_13" value="{$nett1_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_14" type="text" id="nett1_14" value="{$nett1_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_15" type="text" id="nett1_15" value="{$nett1_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_16" type="text" id="nett1_16" value="{$nett1_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett1_17" type="text" id="nett1_17" value="{$nett1_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_18" type="text" id="nett1_18" value="{$nett1_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_19" type="text" id="nett1_19" value="{$nett1_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_20" type="text" id="nett1_20" value="{$nett1_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_21" type="text" id="nett1_21" value="{$nett1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_22" type="text" id="nett1_22" value="{$nett1_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_23" type="text" id="nett1_23" value="{$nett1_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_24" type="text" id="nett1_24" value="{$nett1_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett1_25" type="text" id="nett1_25" value="{$nett1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_26" type="text" id="nett1_26" value="{$nett1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_27" type="text" id="nett1_27" value="{$nett1_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_28" type="text" id="nett1_28" value="{$nett1_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_29" type="text" id="nett1_29" value="{$nett1_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_30" type="text" id="nett1_30" value="{$nett1_30}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_31" type="text" id="nett1_31" value="{$nett1_31}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett1_32" type="text" id="nett1_32" value="{$nett1_32}" size="10" /></td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SERVICE CHARGE</td>
                              <td><input class="calculate" name="service1_rate" type="text" id="service1_rate" value="{$service1_rate}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service1_1" type="text" id="service1_1" value="{$service1_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service1_2" type="text" id="service1_2" value="{$service1_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service1_5" type="text" id="service1_5" value="{$service1_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service1_6" type="text" id="service1_6" value="{$service1_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service1_9" type="text" id="service1_9" value="{$service1_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service1_10" type="text" id="service1_10" value="{$service1_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service1_13" type="text" id="service1_13" value="{$service1_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service1_14" type="text" id="service1_14" value="{$service1_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service1_17" type="text" id="service1_17" value="{$service1_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service1_18" type="text" id="service1_18" value="{$service1_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service1_21" type="text" id="service1_21" value="{$service1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service1_22" type="text" id="service1_22" value="{$service1_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service1_25" type="text" id="service1_25" value="{$service1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service1_26" type="text" id="service1_26" value="{$service1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service1_27" type="text" id="service1_27" value="{$service1_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service1_31" type="text" id="service1_31" value="{$service1_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SELL 1 - VND</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd1" type="text" id="sell1_vnd1" value="{$sell1_vnd1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd2" type="text" id="sell1_vnd2" value="{$sell1_vnd2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd3" type="text" id="sell1_vnd3" value="{$sell1_vnd3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd4" type="text" id="sell1_vnd4" value="{$sell1_vnd4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd5" type="text" id="sell1_vnd5" value="{$sell1_vnd5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd6" type="text" id="sell1_vnd6" value="{$sell1_vnd6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd7" type="text" id="sell1_vnd7" value="{$sell1_vnd7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd8" type="text" id="sell1_vnd8" value="{$sell1_vnd8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd9" type="text" id="sell1_vnd9" value="{$sell1_vnd9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd10" type="text" id="sell1_vnd10" value="{$sell1_vnd10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd11" type="text" id="sell1_vnd11" value="{$sell1_vnd11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd12" type="text" id="sell1_vnd12" value="{$sell1_vnd12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd13" type="text" id="sell1_vnd13" value="{$sell1_vnd13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd14" type="text" id="sell1_vnd14" value="{$sell1_vnd14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd15" type="text" id="sell1_vnd15" value="{$sell1_vnd15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd16" type="text" id="sell1_vnd16" value="{$sell1_vnd16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd17" type="text" id="sell1_vnd17" value="{$sell1_vnd17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd18" type="text" id="sell1_vnd18" value="{$sell1_vnd18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd19" type="text" id="sell1_vnd19" value="{$sell1_vnd19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd20" type="text" id="sell1_vnd20" value="{$sell1_vnd20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd21" type="text" id="sell1_vnd21" value="{$sell1_vnd21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd22" type="text" id="sell1_vnd22" value="{$sell1_vnd22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd23" type="text" id="sell1_vnd23" value="{$sell1_vnd23}" size="10" /></td>
                              <td><input name="sell1_vnd24" type="text" id="sell1_vnd24" value="{$sell1_vnd24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd25" type="text" id="sell1_vnd25" value="{$sell1_vnd25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd26" type="text" id="sell1_vnd26" value="{$sell1_vnd26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd27" type="text" id="sell1_vnd27" value="{$sell1_vnd27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd28" type="text" id="sell1_vnd28" value="{$sell1_vnd28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd29" type="text" id="sell1_vnd29" value="{$sell1_vnd29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd30" type="text" id="sell1_vnd30" value="{$sell1_vnd30}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd31" type="text" id="sell1_vnd31" value="{$sell1_vnd31}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_vnd32" type="text" id="sell1_vnd32" value="{$sell1_vnd32}" size="10" /></td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SELL 1 - USD</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd1" type="text" id="sell1_usd1" value="{$sell1_usd1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd2" type="text" id="sell1_usd2" value="{$sell1_usd2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd5" type="text" id="sell1_usd5" value="{$sell1_usd5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd6" type="text" id="sell1_usd6" value="{$sell1_usd6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd9" type="text" id="sell1_usd9" value="{$sell1_usd9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd10" type="text" id="sell1_usd10" value="{$sell1_usd10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd11" type="text" id="sell1_usd11" value="{$sell1_usd11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd12" type="text" id="sell1_usd12" value="{$sell1_usd12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd13" type="text" id="sell1_usd13" value="{$sell1_usd13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd14" type="text" id="sell1_usd14" value="{$sell1_usd14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd17" type="text" id="sell1_usd17" value="{$sell1_usd17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd18" type="text" id="sell1_usd18" value="{$sell1_usd18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd21" type="text" id="sell1_usd21" value="{$sell1_usd21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd22" type="text" id="sell1_usd22" value="{$sell1_usd22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd23" type="text" id="sell1_usd23" value="{$sell1_usd23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd24" type="text" id="sell1_usd24" value="{$sell1_usd24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd25" type="text" id="sell1_usd25" value="{$sell1_usd25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd26" type="text" id="sell1_usd26" value="{$sell1_usd26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd27" type="text" id="sell1_usd27" value="{$sell1_usd27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell1_usd31" type="text" id="sell1_usd31" value="{$sell1_usd31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">TAX TO BE PAID</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax1_1" type="text" id="tax1_1" value="{$tax1_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax1_2" type="text" id="tax1_2" value="{$tax1_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax1_5" type="text" id="tax1_5" value="{$tax1_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax1_6" type="text" id="tax1_6" value="{$tax1_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax1_9" type="text" id="tax1_9" value="{$tax1_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax1_10" type="text" id="tax1_10" value="{$tax1_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax1_13" type="text" id="tax1_13" value="{$tax1_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax1_14" type="text" id="tax1_14" value="{$tax1_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax1_17" type="text" id="tax1_17" value="{$tax1_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax1_18" type="text" id="tax1_18" value="{$tax1_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax1_21" type="text" id="tax1_21" value="{$tax1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax1_22" type="text" id="tax1_22" value="{$tax1_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax1_25" type="text" id="tax1_25" value="{$tax1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax1_26" type="text" id="tax1_26" value="{$tax1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax1_27" type="text" id="tax1_27" value="{$tax1_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax1_31" type="text" id="tax1_31" value="{$tax1_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">PROFIT/PAX</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit1_1" type="text" id="profit1_1" value="{$profit1_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit1_2" type="text" id="profit1_2" value="{$profit1_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit1_5" type="text" id="profit1_5" value="{$profit1_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit1_6" type="text" id="profit1_6" value="{$profit1_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit1_9" type="text" id="profit1_9" value="{$profit1_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit1_10" type="text" id="profit1_10" value="{$profit1_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit1_13" type="text" id="profit1_13" value="{$profit1_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit1_14" type="text" id="profit1_14" value="{$profit1_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit1_17" type="text" id="profit1_17" value="{$profit1_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit1_18" type="text" id="profit1_18" value="{$profit1_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit1_21" type="text" id="profit1_21" value="{$profit1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit1_22" type="text" id="profit1_22" value="{$profit1_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit1_25" type="text" id="profit1_25" value="{$profit1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit1_26" type="text" id="profit1_26" value="{$profit1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit1_27" type="text" id="profit1_27" value="{$profit1_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit1_31" type="text" id="profit1_31" value="{$profit1_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">TOTAL PROFIT</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total1_1" type="text" id="total1_1" value="{$total1_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total1_2" type="text" id="total1_2" value="{$total1_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total1_5" type="text" id="total1_5" value="{$total1_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total1_6" type="text" id="total1_6" value="{$total1_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total1_9" type="text" id="total1_9" value="{$total1_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total1_10" type="text" id="total1_10" value="{$total1_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total1_13" type="text" id="total1_13" value="{$total1_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total1_14" type="text" id="total1_14" value="{$total1_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total1_17" type="text" id="total1_17" value="{$total1_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total1_18" type="text" id="total1_18" value="{$total1_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total1_21" type="text" id="total1_21" value="{$total1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total1_22" type="text" id="total1_22" value="{$total1_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total1_25" type="text" id="total1_25" value="{$total1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total1_26" type="text" id="total1_26" value="{$total1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total1_27" type="text" id="total1_27" value="{$total1_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total1_31" type="text" id="total1_31" value="{$total1_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">% OF INTEREST</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest1_1" type="text" id="interest1_1" value="{$interest1_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest1_2" type="text" id="interest1_2" value="{$interest1_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest1_5" type="text" id="interest1_5" value="{$interest1_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest1_6" type="text" id="interest1_6" value="{$interest1_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest1_9" type="text" id="interest1_9" value="{$interest1_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest1_10" type="text" id="interest1_10" value="{$interest1_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest1_13" type="text" id="interest1_13" value="{$interest1_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest1_14" type="text" id="interest1_14" value="{$interest1_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest1_17" type="text" id="interest1_17" value="{$interest1_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest1_18" type="text" id="interest1_18" value="{$interest1_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest1_21" type="text" id="interest1_21" value="{$interest1_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest1_22" type="text" id="interest1_22" value="{$interest1_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest1_25" type="text" id="interest1_25" value="{$interest1_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest1_26" type="text" id="interest1_26" value="{$interest1_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest1_27" type="text" id="interest1_27" value="{$interest1_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest1_31" type="text" id="interest1_31" value="{$interest1_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>MEALS 2</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_sum" type="text" id="meal2_sum" value="{$meal2_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_1" type="text" id="meal2_1" value="{$meal2_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_2" type="text" id="meal2_2" value="{$meal2_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_3" type="text" id="meal2_3" value="{$meal2_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_4" type="text" id="meal2_4" value="{$meal2_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_5" type="text" id="meal2_5" value="{$meal2_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_6" type="text" id="meal2_6" value="{$meal2_6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_7" type="text" id="meal2_7" value="{$meal2_7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_8" type="text" id="meal2_8" value="{$meal2_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_9" type="text" id="meal2_9" value="{$meal2_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_10" type="text" id="meal2_10" value="{$meal2_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_11" type="text" id="meal2_11" value="{$meal2_11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_12" type="text" id="meal2_12" value="{$meal2_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_13" type="text" id="meal2_13" value="{$meal2_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_14" type="text" id="meal2_14" value="{$meal2_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_15" type="text" id="meal2_15" value="{$meal2_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_16" type="text" id="meal2_16" value="{$meal2_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_17" type="text" id="meal2_17" value="{$meal2_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_18" type="text" id="meal2_18" value="{$meal2_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_19" type="text" id="meal2_19" value="{$meal2_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_20" type="text" id="meal2_20" value="{$meal2_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_21" type="text" id="meal2_21" value="{$meal2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_22" type="text" id="meal2_22" value="{$meal2_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_23" type="text" id="meal2_23" value="{$meal2_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_24" type="text" id="meal2_24" value="{$meal2_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_25" type="text" id="meal2_25" value="{$meal2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_26" type="text" id="meal2_26" value="{$meal2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_27" type="text" id="meal2_27" value="{$meal2_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_28" type="text" id="meal2_28" value="{$meal2_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_29" type="text" id="meal2_29" value="{$meal2_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_30" type="text" id="meal2_30" value="{$meal2_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>South</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south_sum" type="text" id="meal2_south_sum" value="{$meal2_south_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south1" type="text" id="meal2_south1" value="{$meal2_south1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south2" type="text" id="meal2_south2" value="{$meal2_south2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south3" type="text" id="meal2_south3" value="{$meal2_south3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south4" type="text" id="meal2_south4" value="{$meal2_south4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south5" type="text" id="meal2_south5" value="{$meal2_south5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south6" type="text" id="meal2_south6" value="{$meal2_south6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south7" type="text" id="meal2_south7" value="{$meal2_south7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south8" type="text" id="meal2_south8" value="{$meal2_south8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south9" type="text" id="meal2_south9" value="{$meal2_south9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south10" type="text" id="meal2_south10" value="{$meal2_south10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south11" type="text" id="meal2_south11" value="{$meal2_south11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south12" type="text" id="meal2_south12" value="{$meal2_south12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south13" type="text" id="meal2_south13" value="{$meal2_south13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south14" type="text" id="meal2_south14" value="{$meal2_south14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south15" type="text" id="meal2_south15" value="{$meal2_south15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south16" type="text" id="meal2_south16" value="{$meal2_south16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south17" type="text" id="meal2_south17" value="{$meal2_south17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south18" type="text" id="meal2_south18" value="{$meal2_south18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south19" type="text" id="meal2_south19" value="{$meal2_south19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south20" type="text" id="meal2_south20" value="{$meal2_south20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south21" type="text" id="meal2_south21" value="{$meal2_south21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south22" type="text" id="meal2_south22" value="{$meal2_south22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south23" type="text" id="meal2_south23" value="{$meal2_south23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south24" type="text" id="meal2_south24" value="{$meal2_south24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south25" type="text" id="meal2_south25" value="{$meal2_south25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south26" type="text" id="meal2_south26" value="{$meal2_south26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south27" type="text" id="meal2_south27" value="{$meal2_south27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south28" type="text" id="meal2_south28" value="{$meal2_south28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south29" type="text" id="meal2_south29" value="{$meal2_south29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south30" type="text" id="meal2_south30" value="{$meal2_south30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal2_south_breakfirst_price" type="text" id="meal2_south_breakfirst_price" value="{$meal2_south_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_south_breakfirst_num" type="text" id="meal2_south_breakfirst_num" value="{$meal2_south_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south_breakfirst_money" type="text" id="meal2_south_breakfirst_money" value="{$meal2_south_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal2_south_lunch_price" type="text" id="meal2_south_lunch_price" value="{$meal2_south_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_south_lunch_num" type="text" id="meal2_south_lunch_num" value="{$meal2_south_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south_lunch_money" type="text" id="meal2_south_lunch_money" value="{$meal2_south_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal2_south_dinner_price" type="text" id="meal2_south_dinner_price" value="{$meal2_south_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_south_dinner_num" type="text" id="meal2_south_dinner_num" value="{$meal2_south_dinner_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south_dinner_money" type="text" id="meal2_south_dinner_money" value="{$meal2_south_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal2_south_other_price" type="text" id="meal2_south_other_price" value="{$meal2_south_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_south_other_num" type="text" id="meal2_south_other_num" value="{$meal2_south_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_south_other_money" type="text" id="meal2_south_other_money" value="{$meal2_south_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                            <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>Middle</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_miidle_sum" type="text" id="meal2_miidle_sum" value="{$meal2_miidle_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle1" type="text" id="meal2_middle1" value="{$meal2_middle1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle2" type="text" id="meal2_middle2" value="{$meal2_middle2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle3" type="text" id="meal2_middle3" value="{$meal2_middle3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle4" type="text" id="meal2_middle4" value="{$meal2_middle4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle5" type="text" id="meal2_middle5" value="{$meal2_middle5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle6" type="text" id="meal2_middle6" value="{$meal2_middle6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle7" type="text" id="meal2_middle7" value="{$meal2_middle7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle8" type="text" id="meal2_middle8" value="{$meal2_middle8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle9" type="text" id="meal2_middle9" value="{$meal2_middle9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle10" type="text" id="meal2_middle10" value="{$meal2_middle10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle11" type="text" id="meal2_middle11" value="{$meal2_middle11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle12" type="text" id="meal2_middle12" value="{$meal2_middle12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle13" type="text" id="meal2_middle13" value="{$meal2_middle13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle14" type="text" id="meal2_middle14" value="{$meal2_middle14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle15" type="text" id="meal2_middle15" value="{$meal2_middle15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle16" type="text" id="meal2_middle16" value="{$meal2_middle16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle17" type="text" id="meal2_middle17" value="{$meal2_middle17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle18" type="text" id="meal2_middle18" value="{$meal2_middle18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle19" type="text" id="meal2_middle19" value="{$meal2_middle19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle20" type="text" id="meal2_middle20" value="{$meal2_middle20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle21" type="text" id="meal2_middle21" value="{$meal2_middle21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle22" type="text" id="meal2_middle22" value="{$meal2_middle22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle23" type="text" id="meal2_middle23" value="{$meal2_middle23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle24" type="text" id="meal2_middle24" value="{$meal2_middle24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle25" type="text" id="meal2_middle25" value="{$meal2_middle25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle26" type="text" id="meal2_middle26" value="{$meal2_middle26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle27" type="text" id="meal2_middle27" value="{$meal2_middle27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle28" type="text" id="meal2_middle28" value="{$meal2_middle28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle29" type="text" id="meal2_middle29" value="{$meal2_middle29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle30" type="text" id="meal2_middle30" value="{$meal2_middle30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal2_middle_breakfirst_price" type="text" id="meal2_middle_breakfirst_price" value="{$meal2_middle_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_middle_breakfirst_num" type="text" id="meal2_middle_breakfirst_num" value="{$meal2_middle_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle_breakfirst_money" type="text" id="meal2_middle_breakfirst_money" value="{$meal2_middle_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal2_middle_lunch_price" type="text" id="meal2_middle_lunch_price" value="{$meal2_middle_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_middle_lunch_num" type="text" id="meal2_middle_lunch_num" value="{$meal2_middle_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle_lunch_money" type="text" id="meal2_middle_lunch_money" value="{$meal2_middle_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal2_middle_dinner_price" type="text" id="meal2_middle_dinner_price" value="{$meal2_middle_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_middle_dinner_num" type="text" id="meal2_middle_dinner_num" value="{$meal2_middle_dinner_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle_dinner_money" type="text" id="meal2_middle_dinner_money" value="{$meal2_middle_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal2_middle_other_price" type="text" id="meal2_middle_other_price" value="{$meal2_middle_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_middle_other_num" type="text" id="meal2_middle_other_num" value="{$meal2_middle_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_middle_other_money" type="text" id="meal2_middle_other_money" value="{$meal2_middle_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                            <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>North</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north_sum" type="text" id="meal2_north_sum" value="{$meal2_north_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north1" type="text" id="meal2_north1" value="{$meal2_north1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north2" type="text" id="meal2_north2" value="{$meal2_north2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north3" type="text" id="meal2_north3" value="{$meal2_north3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north4" type="text" id="meal2_north4" value="{$meal2_north4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north5" type="text" id="meal2_north5" value="{$meal2_north5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north6" type="text" id="meal2_north6" value="{$meal2_north6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north7" type="text" id="meal2_north7" value="{$meal2_north7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north8" type="text" id="meal2_north8" value="{$meal2_north8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north9" type="text" id="meal2_north9" value="{$meal2_north9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north10" type="text" id="meal2_north10" value="{$meal2_north10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north11" type="text" id="meal2_north11" value="{$meal2_north11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north12" type="text" id="meal2_north12" value="{$meal2_north12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north13" type="text" id="meal2_north13" value="{$meal2_north13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north14" type="text" id="meal2_north14" value="{$meal2_north14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north15" type="text" id="meal2_north15" value="{$meal2_north15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north16" type="text" id="meal2_north16" value="{$meal2_north16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north17" type="text" id="meal2_north17" value="{$meal2_north17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north18" type="text" id="meal2_north18" value="{$meal2_north18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north19" type="text" id="meal2_north19" value="{$meal2_north19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north20" type="text" id="meal2_north20" value="{$meal2_north20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north21" type="text" id="meal2_north21" value="{$meal2_north21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north22" type="text" id="meal2_north22" value="{$meal2_north22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north23" type="text" id="meal2_north23" value="{$meal2_north23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north24" type="text" id="meal2_north24" value="{$meal2_north24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north25" type="text" id="meal2_north25" value="{$meal2_north25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north26" type="text" id="meal2_north26" value="{$meal2_north26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north27" type="text" id="meal2_north27" value="{$meal2_north27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north28" type="text" id="meal2_north28" value="{$meal2_north28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north29" type="text" id="meal2_north29" value="{$meal2_north29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north30" type="text" id="meal2_north30" value="{$meal2_north30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal2_north_breakfirst_price" type="text" id="meal2_north_breakfirst_price" value="{$meal2_north_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_north_breakfirst_num" type="text" id="meal2_north_breakfirst_num" value="{$meal2_north_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north_breakfirst_money" type="text" id="meal2_north_breakfirst_money" value="{$meal2_north_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal2_north_lunch_price" type="text" id="meal2_north_lunch_price" value="{$meal2_north_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_north_lunch_num" type="text" id="meal2_north_lunch_num" value="{$meal2_north_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north_lunch_money" type="text" id="meal2_north_lunch_money" value="{$meal2_north_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal2_north_dinner_price" type="text" id="meal2_north_dinner_price" value="{$meal2_north_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_north_dinner_num" type="text" id="meal2_north_dinner_num" value="{$meal2_north_dinner_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north_dinner_money" type="text" id="meal2_north_dinner_money" value="{$meal2_north_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal2_north_other_price" type="text" id="meal2_north_other_price" value="{$meal2_north_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal2_north_other_num" type="text" id="meal2_north_other_num" value="{$meal2_north_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal2_north_other_money" type="text" id="meal2_north_other_money" value="{$meal2_north_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>HOTEL 2</strong></td>
                              <td class="dataLabel">Room</td>
                              <td class="dataLabel">Nite</td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_sum" type="text" id="hotel2_sum" value="{$hotel2_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_1" type="text" id="hotel2_1" value="{$hotel2_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_2" type="text" id="hotel2_2" value="{$hotel2_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_3" type="text" id="hotel2_3" value="{$hotel2_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_4" type="text" id="hotel2_4" value="{$hotel2_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_5" type="text" id="hotel2_5" value="{$hotel2_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_6" type="text" id="hotel2_6" value="{$hotel2_6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_7" type="text" id="hotel2_7" value="{$hotel2_7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_8" type="text" id="hotel2_8" value="{$hotel2_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_9" type="text" id="hotel2_9" value="{$hotel2_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_1" type="text" id="hotel2_1" value="{$hotel2_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_11" type="text" id="hotel2_11" value="{$hotel2_11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_12" type="text" id="hotel2_12" value="{$hotel2_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_13" type="text" id="hotel2_13" value="{$hotel2_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_14" type="text" id="hotel2_14" value="{$hotel2_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_15" type="text" id="hotel2_15" value="{$hotel2_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_16" type="text" id="hotel2_16" value="{$hotel2_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_17" type="text" id="hotel2_17" value="{$hotel2_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_18" type="text" id="hotel2_18" value="{$hotel2_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_19" type="text" id="hotel2_19" value="{$hotel2_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_20" type="text" id="hotel2_20" value="{$hotel2_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_21" type="text" id="hotel2_21" value="{$hotel2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_22" type="text" id="hotel2_22" value="{$hotel2_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_23" type="text" id="hotel2_23" value="{$hotel2_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_24" type="text" id="hotel2_24" value="{$hotel2_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_25" type="text" id="hotel2_25" value="{$hotel2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_26" type="text" id="hotel2_26" value="{$hotel2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_27" type="text" id="hotel2_27" value="{$hotel2_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_28" type="text" id="hotel2_28" value="{$hotel2_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_29" type="text" id="hotel2_29" value="{$hotel2_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel2_30" type="text" id="hotel2_30" value="{$hotel2_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{if $ID eq '' OR $count_hotel2 eq '0'}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="hotel2_service[]" type="text" id="hotel2_service[]" size="30" /></td>
                              <td><input class="calculate hotel2_price" name="hotel2_price[]" type="text" id="hotel2_price" size="10" /></td>
                              <td><input class="calculate hotel2_num" name="hotel2_num[]" type="text" id="hotel2_num" size="10" /></td>
                              <td><input class="calculate hotel2_money" readonly="readonly" name="hotel2_money[]" type="text" id="hotel2_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{/if}
                            {$hotel2_html}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">FOC</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="foc2_21" type="text" id="foc2_21" value="{$foc2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc2_22" type="text" id="foc2_22" value="{$foc2_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc2_23" type="text" id="foc2_23" value="{$foc2_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc2_24" type="text" id="foc2_24" value="{$foc2_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="foc2_25" type="text" id="foc2_25" value="{$foc2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc2_26" type="text" id="foc2_26" value="{$foc2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc2_27" type="text" id="foc2_27" value="{$foc2_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc2_28" type="text" id="foc2_28" value="{$foc2_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc2_29" type="text" id="foc2_29" value="{$foc2_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc2_30" type="text" id="foc2_30" value="{$foc2_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">NETT</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett2_1" type="text" id="nett2_1" value="{$nett2_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_2" type="text" id="nett2_2" value="{$nett2_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_3" type="text" id="nett2_3" value="{$nett2_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_4" type="text" id="nett2_4" value="{$nett2_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett2_5" type="text" id="nett2_5" value="{$nett2_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_6" type="text" id="nett2_6" value="{$nett2_6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_7" type="text" id="nett2_7" value="{$nett2_7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_8" type="text" id="nett2_8" value="{$nett2_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett2_9" type="text" id="nett2_9" value="{$nett2_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_10" type="text" id="nett2_10" value="{$nett2_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_11" type="text" id="nett2_11" value="{$nett2_11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_12" type="text" id="nett2_12" value="{$nett2_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett2_13" type="text" id="nett2_13" value="{$nett2_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_14" type="text" id="nett2_14" value="{$nett2_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_15" type="text" id="nett2_15" value="{$nett2_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_16" type="text" id="nett2_16" value="{$nett2_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett2_17" type="text" id="nett2_17" value="{$nett2_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_18" type="text" id="nett2_18" value="{$nett2_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_19" type="text" id="nett2_19" value="{$nett2_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_20" type="text" id="nett2_20" value="{$nett2_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_21" type="text" id="nett2_21" value="{$nett2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_22" type="text" id="nett2_22" value="{$nett2_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_23" type="text" id="nett2_23" value="{$nett2_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_24" type="text" id="nett2_24" value="{$nett2_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett2_25" type="text" id="nett2_25" value="{$nett2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_26" type="text" id="nett2_26" value="{$nett2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_27" type="text" id="nett2_27" value="{$nett2_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_28" type="text" id="nett2_28" value="{$nett2_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_29" type="text" id="nett2_29" value="{$nett2_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_30" type="text" id="nett2_30" value="{$nett2_30}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_31" type="text" id="nett2_31" value="{$nett2_31}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett2_32" type="text" id="nett2_32" value="{$nett2_32}" size="10" /></td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SERVICE CHARGE</td>
                              <td><input class="calculate" name="service2_rate" type="text" id="service2_rate" value="{$service2_rate}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service2_1" type="text" id="service2_1" value="{$service2_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service2_2" type="text" id="service2_2" value="{$service2_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service2_5" type="text" id="service2_5" value="{$service2_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service2_6" type="text" id="service2_6" value="{$service2_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service2_9" type="text" id="service2_9" value="{$service2_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service2_10" type="text" id="service2_10" value="{$service2_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service2_13" type="text" id="service2_13" value="{$service2_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service2_14" type="text" id="service2_14" value="{$service2_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service2_17" type="text" id="service2_17" value="{$service2_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service2_18" type="text" id="service2_18" value="{$service2_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service2_21" type="text" id="service2_21" value="{$service2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service2_22" type="text" id="service2_22" value="{$service2_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service2_25" type="text" id="service2_25" value="{$service2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service2_26" type="text" id="service2_26" value="{$service2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service2_27" type="text" id="service2_27" value="{$service2_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service2_31" type="text" id="service2_31" value="{$service2_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SELL 2 - VND</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd1" type="text" id="sell2_vnd1" value="{$sell2_vnd1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd2" type="text" id="sell2_vnd2" value="{$sell2_vnd2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd3" type="text" id="sell2_vnd3" value="{$sell2_vnd3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd4" type="text" id="sell2_vnd4" value="{$sell2_vnd4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd5" type="text" id="sell2_vnd5" value="{$sell2_vnd5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd6" type="text" id="sell2_vnd6" value="{$sell2_vnd6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd7" type="text" id="sell2_vnd7" value="{$sell2_vnd7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd8" type="text" id="sell2_vnd8" value="{$sell2_vnd8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd9" type="text" id="sell2_vnd9" value="{$sell2_vnd9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd10" type="text" id="sell2_vnd10" value="{$sell2_vnd10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd11" type="text" id="sell2_vnd11" value="{$sell2_vnd11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd12" type="text" id="sell2_vnd12" value="{$sell2_vnd12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd13" type="text" id="sell2_vnd13" value="{$sell2_vnd13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd14" type="text" id="sell2_vnd14" value="{$sell2_vnd14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd15" type="text" id="sell2_vnd15" value="{$sell2_vnd15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd16" type="text" id="sell2_vnd16" value="{$sell2_vnd16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd17" type="text" id="sell2_vnd17" value="{$sell2_vnd17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd18" type="text" id="sell2_vnd18" value="{$sell2_vnd18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd19" type="text" id="sell2_vnd19" value="{$sell2_vnd19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd20" type="text" id="sell2_vnd20" value="{$sell2_vnd20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd21" type="text" id="sell2_vnd21" value="{$sell2_vnd21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd22" type="text" id="sell2_vnd22" value="{$sell2_vnd22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd23" type="text" id="sell2_vnd23" value="{$sell2_vnd23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd24" type="text" id="sell2_vnd24" value="{$sell2_vnd24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd25" type="text" id="sell2_vnd25" value="{$sell2_vnd25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd26" type="text" id="sell2_vnd26" value="{$sell2_vnd26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd27" type="text" id="sell2_vnd27" value="{$sell2_vnd27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd28" type="text" id="sell2_vnd28" value="{$sell2_vnd28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd29" type="text" id="sell2_vnd29" value="{$sell2_vnd29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd30" type="text" id="sell2_vnd30" value="{$sell2_vnd30}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd31" type="text" id="sell2_vnd31" value="{$sell2_vnd31}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_vnd32" type="text" id="sell2_vnd32" value="{$sell2_vnd32}" size="10" /></td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SELL 2 - USD</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd1" type="text" id="sell2_usd1" value="{$sell2_usd1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd2" type="text" id="sell2_usd2" value="{$sell2_usd2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd5" type="text" id="sell2_usd5" value="{$sell2_usd5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd6" type="text" id="sell2_usd6" value="{$sell2_usd6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd9" type="text" id="sell2_usd9" value="{$sell2_usd9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd10" type="text" id="sell2_usd10" value="{$sell2_usd10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd13" type="text" id="sell2_usd13" value="{$sell2_usd13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd14" type="text" id="sell2_usd14" value="{$sell2_usd14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd17" type="text" id="sell2_usd17" value="{$sell2_usd17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd18" type="text" id="sell2_usd18" value="{$sell2_usd18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd21" type="text" id="sell2_usd21" value="{$sell2_usd21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd22" type="text" id="sell2_usd22" value="{$sell2_usd22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd25" type="text" id="sell2_usd25" value="{$sell2_usd25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd26" type="text" id="sell2_usd26" value="{$sell2_usd26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd27" type="text" id="sell2_usd27" value="{$sell2_usd27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell2_usd31" type="text" id="sell2_usd31" value="{$sell2_usd31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">TAX TO BE PAID</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax2_1" type="text" id="tax2_1" value="{$tax2_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax2_2" type="text" id="tax2_2" value="{$tax2_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax2_5" type="text" id="tax2_5" value="{$tax2_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax2_6" type="text" id="tax2_6" value="{$tax2_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax2_9" type="text" id="tax2_9" value="{$tax2_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax2_10" type="text" id="tax2_10" value="{$tax2_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax2_13" type="text" id="tax2_13" value="{$tax2_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax2_14" type="text" id="tax2_14" value="{$tax2_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax2_17" type="text" id="tax2_17" value="{$tax2_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax2_18" type="text" id="tax2_18" value="{$tax2_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax2_21" type="text" id="tax2_21" value="{$tax2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax2_22" type="text" id="tax2_22" value="{$tax2_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax2_25" type="text" id="tax2_25" value="{$tax2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax2_26" type="text" id="tax2_26" value="{$tax2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax2_27" type="text" id="tax2_27" value="{$tax2_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax2_31" type="text" id="tax2_31" value="{$tax2_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">PROFIT/PAX</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit2_1" type="text" id="profit2_1" value="{$profit2_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit2_2" type="text" id="profit2_2" value="{$profit2_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit2_5" type="text" id="profit2_5" value="{$profit2_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit2_6" type="text" id="profit2_6" value="{$profit2_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit2_9" type="text" id="profit2_9" value="{$profit2_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit2_10" type="text" id="profit2_10" value="{$profit2_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit2_13" type="text" id="profit2_13" value="{$profit2_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit2_14" type="text" id="profit2_14" value="{$profit2_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit2_17" type="text" id="profit2_17" value="{$profit2_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit2_18" type="text" id="profit2_18" value="{$profit2_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit2_21" type="text" id="profit2_21" value="{$profit2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit2_22" type="text" id="profit2_22" value="{$profit2_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit2_25" type="text" id="profit2_25" value="{$profit2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit2_26" type="text" id="profit2_26" value="{$profit2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit2_27" type="text" id="profit2_27" value="{$profit2_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit2_31" type="text" id="profit2_31" value="{$profit2_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">TOTAL PROFIT</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total2_1" type="text" id="total2_1" value="{$total2_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total2_2" type="text" id="total2_2" value="{$total2_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total2_5" type="text" id="total2_5" value="{$total2_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total2_6" type="text" id="total2_6" value="{$total2_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total2_9" type="text" id="total2_9" value="{$total2_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total2_10" type="text" id="total2_10" value="{$total2_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total2_13" type="text" id="total2_13" value="{$total2_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total2_14" type="text" id="total2_14" value="{$total2_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total2_17" type="text" id="total2_17" value="{$total2_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total2_18" type="text" id="total2_18" value="{$total2_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total2_21" type="text" id="total2_21" value="{$total2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total2_22" type="text" id="total2_22" value="{$total2_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total2_25" type="text" id="total2_25" value="{$total2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total2_26" type="text" id="total2_26" value="{$total2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total2_27" type="text" id="total2_27" value="{$total2_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total2_31" type="text" id="total2_31" value="{$total2_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">% OF INTEREST</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest2_1" type="text" id="interest2_1" value="{$interest2_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest2_2" type="text" id="interest2_2" value="{$interest2_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest2_5" type="text" id="interest2_5" value="{$interest2_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest2_6" type="text" id="interest2_6" value="{$interest2_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest2_9" type="text" id="interest2_9" value="{$interest2_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest2_10" type="text" id="interest2_10" value="{$interest2_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest2_13" type="text" id="interest2_13" value="{$interest2_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest2_14" type="text" id="interest2_14" value="{$interest2_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest2_17" type="text" id="interest2_17" value="{$interest2_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest2_18" type="text" id="interest2_18" value="{$interest2_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest2_21" type="text" id="interest2_21" value="{$interest2_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest2_22" type="text" id="interest2_22" value="{$interest2_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest2_25" type="text" id="interest2_25" value="{$interest2_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest2_26" type="text" id="interest2_26" value="{$interest2_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest2_27" type="text" id="interest2_27" value="{$interest2_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest2_31" type="text" id="interest2_31" value="{$interest2_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>MEALS 3</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_sum" type="text" id="meal3_sum" value="{$meal3_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_1" type="text" id="meal3_1" value="{$meal3_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_2" type="text" id="meal3_2" value="{$meal3_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_3" type="text" id="meal3_3" value="{$meal3_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_4" type="text" id="meal3_4" value="{$meal3_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_5" type="text" id="meal3_5" value="{$meal3_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_6" type="text" id="meal3_6" value="{$meal3_6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_7" type="text" id="meal3_7" value="{$meal3_7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_8" type="text" id="meal3_8" value="{$meal3_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_9" type="text" id="meal3_9" value="{$meal3_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_10" type="text" id="meal3_10" value="{$meal3_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_11" type="text" id="meal3_11" value="{$meal3_11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_12" type="text" id="meal3_12" value="{$meal3_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_13" type="text" id="meal3_13" value="{$meal3_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_14" type="text" id="meal3_14" value="{$meal3_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_15" type="text" id="meal3_15" value="{$meal3_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_16" type="text" id="meal3_16" value="{$meal3_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_17" type="text" id="meal3_17" value="{$meal3_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_18" type="text" id="meal3_18" value="{$meal3_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_19" type="text" id="meal3_19" value="{$meal3_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_20" type="text" id="meal3_20" value="{$meal3_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_21" type="text" id="meal3_21" value="{$meal3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_22" type="text" id="meal3_22" value="{$meal3_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_23" type="text" id="meal3_23" value="{$meal3_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_24" type="text" id="meal3_24" value="{$meal3_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_25" type="text" id="meal3_25" value="{$meal3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_26" type="text" id="meal3_26" value="{$meal3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_27" type="text" id="meal3_27" value="{$meal3_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_28" type="text" id="meal3_28" value="{$meal3_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_29" type="text" id="meal3_29" value="{$meal3_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_30" type="text" id="meal3_30" value="{$meal3_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>South</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south_sum" type="text" id="meal3_south_sum" value="{$meal3_south_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south1" type="text" id="meal3_south1" value="{$meal3_south1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south2" type="text" id="meal3_south2" value="{$meal3_south2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south3" type="text" id="meal3_south3" value="{$meal3_south3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south4" type="text" id="meal3_south4" value="{$meal3_south4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south5" type="text" id="meal3_south5" value="{$meal3_south5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south6" type="text" id="meal3_south6" value="{$meal3_south6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south7" type="text" id="meal3_south7" value="{$meal3_south7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south8" type="text" id="meal3_south8" value="{$meal3_south8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south9" type="text" id="meal3_south9" value="{$meal3_south9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south10" type="text" id="meal3_south10" value="{$meal3_south10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south11" type="text" id="meal3_south11" value="{$meal3_south11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south12" type="text" id="meal3_south12" value="{$meal3_south12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south13" type="text" id="meal3_south13" value="{$meal3_south13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south14" type="text" id="meal3_south14" value="{$meal3_south14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south15" type="text" id="meal3_south15" value="{$meal3_south15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south16" type="text" id="meal3_south16" value="{$meal3_south16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south17" type="text" id="meal3_south17" value="{$meal3_south17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south18" type="text" id="meal3_south18" value="{$meal3_south18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south19" type="text" id="meal3_south19" value="{$meal3_south19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south20" type="text" id="meal3_south20" value="{$meal3_south20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south21" type="text" id="meal3_south21" value="{$meal3_south21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south22" type="text" id="meal3_south22" value="{$meal3_south22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south23" type="text" id="meal3_south23" value="{$meal3_south23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south24" type="text" id="meal3_south24" value="{$meal3_south24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south25" type="text" id="meal3_south25" value="{$meal3_south25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south26" type="text" id="meal3_south26" value="{$meal3_south26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south27" type="text" id="meal3_south27" value="{$meal3_south27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south28" type="text" id="meal3_south28" value="{$meal3_south28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south29" type="text" id="meal3_south29" value="{$meal3_south29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south30" type="text" id="meal3_south30" value="{$meal3_south30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal3_south_breakfirst_price" type="text" id="meal3_south_breakfirst_price" value="{$meal3_south_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_south_breakfirst_num" type="text" id="meal3_south_breakfirst_num" value="{$meal3_south_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south_breakfirst_money" type="text" id="meal3_south_breakfirst_money" value="{$meal3_south_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal3_south_lunch_price" type="text" id="meal3_south_lunch_price" value="{$meal3_south_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_south_lunch_num" type="text" id="meal3_south_lunch_num" value="{$meal3_south_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south_lunch_money" type="text" id="meal3_south_lunch_money" value="{$meal3_south_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal3_south_dinner_price" type="text" id="meal3_south_dinner_price" value="{$meal3_south_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_south_dinner_num" type="text" id="meal3_south_dinner_num" value="{$meal3_south_dinner_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south_dinner_money" type="text" id="meal3_south_dinner_money" value="{$meal3_south_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal3_south_other_price" type="text" id="meal3_south_other_price" value="{$meal3_south_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_south_other_num" type="text" id="meal3_south_other_num" value="{$meal3_south_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_south_other_money" type="text" id="meal3_south_other_money" value="{$meal3_south_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                            <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>Middle</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_miidle_sum" type="text" id="meal3_miidle_sum" value="{$meal3_miidle_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle1" type="text" id="meal3_middle1" value="{$meal3_middle1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle2" type="text" id="meal3_middle2" value="{$meal3_middle2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle3" type="text" id="meal3_middle3" value="{$meal3_middle3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle4" type="text" id="meal3_middle4" value="{$meal3_middle4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle5" type="text" id="meal3_middle5" value="{$meal3_middle5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle6" type="text" id="meal3_middle6" value="{$meal3_middle6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle7" type="text" id="meal3_middle7" value="{$meal3_middle7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle8" type="text" id="meal3_middle8" value="{$meal3_middle8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle9" type="text" id="meal3_middle9" value="{$meal3_middle9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle10" type="text" id="meal3_middle10" value="{$meal3_middle10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle11" type="text" id="meal3_middle11" value="{$meal3_middle11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle12" type="text" id="meal3_middle12" value="{$meal3_middle12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle13" type="text" id="meal3_middle13" value="{$meal3_middle13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle14" type="text" id="meal3_middle14" value="{$meal3_middle14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle15" type="text" id="meal3_middle15" value="{$meal3_middle15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle16" type="text" id="meal3_middle16" value="{$meal3_middle16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle17" type="text" id="meal3_middle17" value="{$meal3_middle17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle18" type="text" id="meal3_middle18" value="{$meal3_middle18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle19" type="text" id="meal3_middle19" value="{$meal3_middle19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle20" type="text" id="meal3_middle20" value="{$meal3_middle20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle21" type="text" id="meal3_middle21" value="{$meal3_middle21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle22" type="text" id="meal3_middle22" value="{$meal3_middle22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle23" type="text" id="meal3_middle23" value="{$meal3_middle23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle24" type="text" id="meal3_middle24" value="{$meal3_middle24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle25" type="text" id="meal3_middle25" value="{$meal3_middle25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle26" type="text" id="meal3_middle26" value="{$meal3_middle26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle27" type="text" id="meal3_middle27" value="{$meal3_middle27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle28" type="text" id="meal3_middle28" value="{$meal3_middle28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle29" type="text" id="meal3_middle29" value="{$meal3_middle29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle30" type="text" id="meal3_middle30" value="{$meal3_middle30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal3_middle_breakfirst_price" type="text" id="meal3_middle_breakfirst_price" value="{$meal3_middle_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_middle_breakfirst_num" type="text" id="meal3_middle_breakfirst_num" value="{$meal3_middle_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle_breakfirst_money" type="text" id="meal3_middle_breakfirst_money" value="{$meal3_middle_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal3_middle_lunch_price" type="text" id="meal3_middle_lunch_price" value="{$meal3_middle_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_middle_lunch_num" type="text" id="meal3_middle_lunch_num" value="{$meal3_middle_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle_lunch_money" type="text" id="meal3_middle_lunch_money" value="{$meal3_middle_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal3_middle_dinner_price" type="text" id="meal3_middle_dinner_price" value="{$meal3_middle_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_middle_dinner_num" type="text" id="meal3_middle_dinner_num" value="{$meal3_middle_dinner_num}" size="10" /></td>
                              <td><input class="calculate" name="meal3_middle_dinner_money" type="text" id="meal3_middle_dinner_money" value="{$meal3_middle_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal3_middle_other_price" type="text" id="meal3_middle_other_price" value="{$meal3_middle_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_middle_other_num" type="text" id="meal3_middle_other_num" value="{$meal3_middle_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_middle_other_money" type="text" id="meal3_middle_other_money" value="{$meal3_middle_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" class="dataLabel" style="border-left:1px solid #999">&nbsp;</td>
                        </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>North</strong></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north_sum" type="text" id="meal3_north_sum" value="{$meal3_north_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north1" type="text" id="meal3_north1" value="{$meal3_north1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north2" type="text" id="meal3_north2" value="{$meal3_north2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north3" type="text" id="meal3_north3" value="{$meal3_north3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north4" type="text" id="meal3_north4" value="{$meal3_north4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north5" type="text" id="meal3_north5" value="{$meal3_north5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north6" type="text" id="meal3_north6" value="{$meal3_north6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north7" type="text" id="meal3_north7" value="{$meal3_north7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north8" type="text" id="meal3_north8" value="{$meal3_north8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north9" type="text" id="meal3_north9" value="{$meal3_north9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north10" type="text" id="meal3_north10" value="{$meal3_north10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north11" type="text" id="meal3_north11" value="{$meal3_north11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north12" type="text" id="meal3_north12" value="{$meal3_north12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north13" type="text" id="meal3_north13" value="{$meal3_north13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north14" type="text" id="meal3_north14" value="{$meal3_north14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north15" type="text" id="meal3_north15" value="{$meal3_north15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north16" type="text" id="meal3_north16" value="{$meal3_north16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north17" type="text" id="meal3_north17" value="{$meal3_north17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north18" type="text" id="meal3_north18" value="{$meal3_north18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north19" type="text" id="meal3_north19" value="{$meal3_north19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north20" type="text" id="meal3_north20" value="{$meal3_north20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north21" type="text" id="meal3_north21" value="{$meal3_north21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north22" type="text" id="meal3_north22" value="{$meal3_north22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north23" type="text" id="meal3_north23" value="{$meal3_north23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north24" type="text" id="meal3_north24" value="{$meal3_north24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north25" type="text" id="meal3_north25" value="{$meal3_north25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north26" type="text" id="meal3_north26" value="{$meal3_north26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north27" type="text" id="meal3_north27" value="{$meal3_north27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north28" type="text" id="meal3_north28" value="{$meal3_north28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north29" type="text" id="meal3_north29" value="{$meal3_north29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north30" type="text" id="meal3_north30" value="{$meal3_north30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Breakfirst</td>
                              <td><input class="calculate" name="meal3_north_breakfirst_price" type="text" id="meal3_north_breakfirst_price" value="{$meal3_north_breakfirst_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_north_breakfirst_num" type="text" id="meal3_north_breakfirst_num" value="{$meal3_north_breakfirst_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north_breakfirst_money" type="text" id="meal3_north_breakfirst_money" value="{$meal3_north_breakfirst_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Lunch</td>
                              <td><input class="calculate" name="meal3_north_lunch_price" type="text" id="meal3_north_lunch_price" value="{$meal3_north_lunch_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_north_lunch_num" type="text" id="meal3_north_lunch_num" value="{$meal3_north_lunch_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north_lunch_money" type="text" id="meal3_north_lunch_money" value="{$meal3_north_lunch_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Dinner</td>
                              <td><input class="calculate" name="meal3_north_dinner_price" type="text" id="meal3_north_dinner_price" value="{$meal3_north_dinner_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_north_dinner_num" type="text" id="meal3_north_dinner_num" value="{$meal3_north_dinner_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north_dinner_money" type="text" id="meal3_north_dinner_money" value="{$meal3_north_dinner_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">Other</td>
                              <td><input class="calculate" name="meal3_north_other_price" type="text" id="meal3_north_other_price" value="{$meal3_north_other_price}" size="10" /></td>
                              <td><input class="calculate" name="meal3_north_other_num" type="text" id="meal3_north_other_num" value="{$meal3_north_other_num}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="meal3_north_other_money" type="text" id="meal3_north_other_money" value="{$meal3_north_other_money}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999"><strong>HOTEL 3</strong></td>
                              <td class="dataLabel">Room</td>
                              <td class="dataLabel">Nite</td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_sum" type="text" id="hotel3_sum" value="{$hotel3_sum}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_1" type="text" id="hotel3_1" value="{$hotel3_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_2" type="text" id="hotel3_2" value="{$hotel3_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_3" type="text" id="hotel3_3" value="{$hotel3_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_4" type="text" id="hotel3_4" value="{$hotel3_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_5" type="text" id="hotel3_5" value="{$hotel3_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_6" type="text" id="hotel3_6" value="{$hotel3_6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_7" type="text" id="hotel3_7" value="{$hotel3_7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_8" type="text" id="hotel3_8" value="{$hotel3_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_9" type="text" id="hotel3_9" value="{$hotel3_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_10" type="text" id="hotel3_10" value="{$hotel3_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_11" type="text" id="hotel3_11" value="{$hotel3_11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_12" type="text" id="hotel3_12" value="{$hotel3_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_13" type="text" id="hotel3_13" value="{$hotel3_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_14" type="text" id="hotel3_14" value="{$hotel3_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_15" type="text" id="hotel3_15" value="{$hotel3_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_16" type="text" id="hotel3_16" value="{$hotel3_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_17" type="text" id="hotel3_17" value="{$hotel3_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_18" type="text" id="hotel3_18" value="{$hotel3_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_19" type="text" id="hotel3_19" value="{$hotel3_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_20" type="text" id="hotel3_20" value="{$hotel3_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_21" type="text" id="hotel3_21" value="{$hotel3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_22" type="text" id="hotel3_22" value="{$hotel3_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_23" type="text" id="hotel3_23" value="{$hotel3_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_24" type="text" id="hotel3_24" value="{$hotel3_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_25" type="text" id="hotel3_25" value="{$hotel3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_26" type="text" id="hotel3_26" value="{$hotel3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_27" type="text" id="hotel3_27" value="{$hotel3_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_28" type="text" id="hotel3_28" value="{$hotel3_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_29" type="text" id="hotel3_29" value="{$hotel3_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="hotel3_30" type="text" id="hotel3_30" value="{$hotel3_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{if $ID eq '' OR $count_hotel3 eq ''}
                          <tr>
                              <td style="border-left:1px solid #999"><input name="hotel3_service[]" type="text" id="hotel3_service[]" size="30" /></td>
                              <td><input class="calculate hotel3_price" name="hotel3_price[]" type="text" id="hotel3_price" size="10" /></td>
                              <td><input class="calculate hotel3_num" name="hotel3_num[]" type="text" id="hotel3_num" size="10" /></td>
                              <td><input class="calculate hotel3_money" readonly="readonly" name="hotel3_money[]" type="text" id="hotel3_money" size="10" /></td>
                              <td>&nbsp;</td>
                              <td align="center" valign="middle"><input type="button" class="btnAdd" value="Add"/></td>
                              <td align="center" valign="middle"><input type="button" class="btnDel" value="Delete"/></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>
							{/if}
                            {$hotel3_html}
                          <tr>
                              <td colspan="42" style="border-left:1px solid #999">&nbsp;</td>
                          </tr>
                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">FOC</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="foc3_21" type="text" id="foc3_21" value="{$foc3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc3_22" type="text" id="foc3_22" value="{$foc3_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc3_23" type="text" id="foc3_23" value="{$foc3_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc3_24" type="text" id="foc3_24" value="{$foc3_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="foc3_25" type="text" id="foc3_25" value="{$foc3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc3_26" type="text" id="foc3_26" value="{$foc3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc3_27" type="text" id="foc3_27" value="{$foc3_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc3_28" type="text" id="foc3_28" value="{$foc3_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc3_29" type="text" id="foc3_29" value="{$foc3_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="foc3_30" type="text" id="foc3_30" value="{$foc3_30}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">NETT</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett3_1" type="text" id="nett3_1" value="{$nett3_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_2" type="text" id="nett3_2" value="{$nett3_2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_3" type="text" id="nett3_3" value="{$nett3_3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_4" type="text" id="nett3_4" value="{$nett3_4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett3_5" type="text" id="nett3_5" value="{$nett3_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_6" type="text" id="nett3_6" value="{$nett3_6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_7" type="text" id="nett3_7" value="{$nett3_7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_8" type="text" id="nett3_8" value="{$nett3_8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett3_9" type="text" id="nett3_9" value="{$nett3_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_10" type="text" id="nett3_10" value="{$nett3_10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_11" type="text" id="nett3_11" value="{$nett3_11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_12" type="text" id="nett3_12" value="{$nett3_12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett3_13" type="text" id="nett3_13" value="{$nett3_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_14" type="text" id="nett3_14" value="{$nett3_14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_15" type="text" id="nett3_15" value="{$nett3_15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_16" type="text" id="nett3_16" value="{$nett3_16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett3_17" type="text" id="nett3_17" value="{$nett3_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_18" type="text" id="nett3_18" value="{$nett3_18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_19" type="text" id="nett3_19" value="{$nett3_19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_20" type="text" id="nett3_20" value="{$nett3_20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_21" type="text" id="nett3_21" value="{$nett3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_22" type="text" id="nett3_22" value="{$nett3_22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_23" type="text" id="nett3_23" value="{$nett3_23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_24" type="text" id="nett3_24" value="{$nett3_24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="nett3_25" type="text" id="nett3_25" value="{$nett3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_26" type="text" id="nett3_26" value="{$nett3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_27" type="text" id="nett3_27" value="{$nett3_27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_28" type="text" id="nett3_28" value="{$nett3_28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_29" type="text" id="nett3_29" value="{$nett3_29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_30" type="text" id="nett3_30" value="{$nett3_30}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_31" type="text" id="nett3_31" value="{$nett3_31}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="nett3_32" type="text" id="nett3_32" value="{$nett3_32}" size="10" /></td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SERVICE CHARGE</td>
                              <td><input class="calculate" name="service3_rate" type="text" id="service3_rate" value="{$service3_rate}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service3_1" type="text" id="service3_1" value="{$service3_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service3_2" type="text" id="service3_2" value="{$service3_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service3_5" type="text" id="service3_5" value="{$service3_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service3_6" type="text" id="service3_6" value="{$service3_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service3_9" type="text" id="service3_9" value="{$service3_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service3_10" type="text" id="service3_10" value="{$service3_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service3_13" type="text" id="service3_13" value="{$service3_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service3_14" type="text" id="service3_14" value="{$service3_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service3_17" type="text" id="service3_17" value="{$service3_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service3_18" type="text" id="service3_18" value="{$service3_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service3_21" type="text" id="service3_21" value="{$service3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service3_22" type="text" id="service3_22" value="{$service3_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service3_25" type="text" id="service3_25" value="{$service3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service3_26" type="text" id="service3_26" value="{$service3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="service3_27" type="text" id="service3_27" value="{$service3_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="service3_31" type="text" id="service3_31" value="{$service3_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SELL 3 - VND</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd1" type="text" id="sell3_vnd1" value="{$sell3_vnd1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd2" type="text" id="sell3_vnd2" value="{$sell3_vnd2}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd3" type="text" id="sell3_vnd3" value="{$sell3_vnd3}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd4" type="text" id="sell3_vnd4" value="{$sell3_vnd4}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd5" type="text" id="sell3_vnd5" value="{$sell3_vnd5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd6" type="text" id="sell3_vnd6" value="{$sell3_vnd6}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd7" type="text" id="sell3_vnd7" value="{$sell3_vnd7}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd8" type="text" id="sell3_vnd8" value="{$sell3_vnd8}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd9" type="text" id="sell3_vnd9" value="{$sell3_vnd9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd10" type="text" id="sell3_vnd10" value="{$sell3_vnd10}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd11" type="text" id="sell3_vnd11" value="{$sell3_vnd11}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd12" type="text" id="sell3_vnd12" value="{$sell3_vnd12}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd13" type="text" id="sell3_vnd13" value="{$sell3_vnd13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd14" type="text" id="sell3_vnd14" value="{$sell3_vnd14}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd15" type="text" id="sell3_vnd15" value="{$sell3_vnd15}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd16" type="text" id="sell3_vnd16" value="{$sell3_vnd16}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd17" type="text" id="sell3_vnd17" value="{$sell3_vnd17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd18" type="text" id="sell3_vnd18" value="{$sell3_vnd18}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd19" type="text" id="sell3_vnd19" value="{$sell3_vnd19}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd20" type="text" id="sell3_vnd20" value="{$sell3_vnd20}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd21" type="text" id="sell3_vnd21" value="{$sell3_vnd21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd22" type="text" id="sell3_vnd22" value="{$sell3_vnd22}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd23" type="text" id="sell3_vnd23" value="{$sell3_vnd23}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd24" type="text" id="sell3_vnd24" value="{$sell3_vnd24}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd25" type="text" id="sell3_vnd25" value="{$sell3_vnd25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd26" type="text" id="sell3_vnd26" value="{$sell3_vnd26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd27" type="text" id="sell3_vnd27" value="{$sell3_vnd27}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd28" type="text" id="sell3_vnd28" value="{$sell3_vnd28}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd29" type="text" id="sell3_vnd29" value="{$sell3_vnd29}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd30" type="text" id="sell3_vnd30" value="{$sell3_vnd30}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd31" type="text" id="sell3_vnd31" value="{$sell3_vnd31}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_vnd32" type="text" id="sell3_vnd32" value="{$sell3_vnd32}" size="10" /></td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">SELL 3 - USD</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd1" type="text" id="sell3_usd1" value="{$sell3_usd1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd2" type="text" id="sell3_usd2" value="{$sell3_usd2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd5" type="text" id="sell3_usd5" value="{$sell3_usd5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd6" type="text" id="sell3_usd6" value="{$sell3_usd6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd9" type="text" id="sell3_usd9" value="{$sell3_usd9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd10" type="text" id="sell3_usd10" value="{$sell3_usd10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd13" type="text" id="sell3_usd13" value="{$sell3_usd13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd14" type="text" id="sell3_usd14" value="{$sell3_usd14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd17" type="text" id="sell3_usd17" value="{$sell3_usd17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd18" type="text" id="sell3_usd18" value="{$sell3_usd18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd21" type="text" id="sell3_usd21" value="{$sell3_usd21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd22" type="text" id="sell3_usd22" value="{$sell3_usd22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd25" type="text" id="sell3_usd25" value="{$sell3_usd25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd26" type="text" id="sell3_usd26" value="{$sell3_usd26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd27" type="text" id="sell3_usd27" value="{$sell3_usd27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="sell3_usd31" type="text" id="sell3_usd31" value="{$sell3_usd31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">TAX TO BE PAID</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax3_1" type="text" id="tax3_1" value="{$tax3_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax3_2" type="text" id="tax3_2" value="{$tax3_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax3_5" type="text" id="tax3_5" value="{$tax3_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax3_6" type="text" id="tax3_6" value="{$tax3_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax3_9" type="text" id="tax3_9" value="{$tax3_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax3_10" type="text" id="tax3_10" value="{$tax3_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax3_13" type="text" id="tax3_13" value="{$tax3_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax3_14" type="text" id="tax3_14" value="{$tax3_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax3_17" type="text" id="tax3_17" value="{$tax3_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax3_18" type="text" id="tax3_18" value="{$tax3_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax3_21" type="text" id="tax3_21" value="{$tax3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax3_22" type="text" id="tax3_22" value="{$tax3_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax3_25" type="text" id="tax3_25" value="{$tax3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax3_26" type="text" id="tax3_26" value="{$tax3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="tax3_27" type="text" id="tax3_27" value="{$tax3_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="tax3_31" type="text" id="tax3_31" value="{$tax3_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">PROFIT/PAX</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit3_1" type="text" id="profit3_1" value="{$profit3_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit3_2" type="text" id="profit3_2" value="{$profit3_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit3_5" type="text" id="profit3_5" value="{$profit3_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit3_6" type="text" id="profit3_6" value="{$profit3_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit3_9" type="text" id="profit3_9" value="{$profit3_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit3_10" type="text" id="profit3_10" value="{$profit3_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit3_13" type="text" id="profit3_13" value="{$profit3_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit3_14" type="text" id="profit3_14" value="{$profit3_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit3_17" type="text" id="profit3_17" value="{$profit3_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit3_18" type="text" id="profit3_18" value="{$profit3_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit3_21" type="text" id="profit3_21" value="{$profit3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit3_22" type="text" id="profit3_22" value="{$profit3_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit3_25" type="text" id="profit3_25" value="{$profit3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit3_26" type="text" id="profit3_26" value="{$profit3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="profit3_27" type="text" id="profit3_27" value="{$profit3_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="profit3_31" type="text" id="profit3_31" value="{$profit3_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">TOTAL PROFIT</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total3_1" type="text" id="total3_1" value="{$total3_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total3_2" type="text" id="total3_2" value="{$total3_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total3_5" type="text" id="total3_5" value="{$total3_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total3_6" type="text" id="total3_6" value="{$total3_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total3_9" type="text" id="total3_9" value="{$total3_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total3_10" type="text" id="total3_10" value="{$total3_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total3_13" type="text" id="total3_13" value="{$total3_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total3_14" type="text" id="total3_14" value="{$total3_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total3_17" type="text" id="total3_17" value="{$total3_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total3_18" type="text" id="total3_18" value="{$total3_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total3_21" type="text" id="total3_21" value="{$total3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total3_22" type="text" id="total3_22" value="{$total3_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total3_25" type="text" id="total3_25" value="{$total3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total3_26" type="text" id="total3_26" value="{$total3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="total3_27" type="text" id="total3_27" value="{$total3_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="total3_31" type="text" id="total3_31" value="{$total3_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>

                          <tr>
                              <td class="dataLabel" style="border-left:1px solid #999">% OF INTEREST</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest3_1" type="text" id="interest3_1" value="{$interest3_1}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest3_2" type="text" id="interest3_2" value="{$interest3_2}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest3_5" type="text" id="interest3_5" value="{$interest3_5}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest3_6" type="text" id="interest3_6" value="{$interest3_6}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest3_9" type="text" id="interest3_9" value="{$interest3_9}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest3_10" type="text" id="interest3_10" value="{$interest3_10}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest3_13" type="text" id="interest3_13" value="{$interest3_13}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest3_14" type="text" id="interest3_14" value="{$interest3_14}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest3_17" type="text" id="interest3_17" value="{$interest3_17}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest3_18" type="text" id="interest3_18" value="{$interest3_18}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest3_21" type="text" id="interest3_21" value="{$interest3_21}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest3_22" type="text" id="interest3_22" value="{$interest3_22}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest3_25" type="text" id="interest3_25" value="{$interest3_25}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest3_26" type="text" id="interest3_26" value="{$interest3_26}" size="10" /></td>
                              <td><input class="calculate" readonly="readonly" name="interest3_27" type="text" id="interest3_27" value="{$interest3_27}" size="10" /></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td><input class="calculate" readonly="readonly" name="interest3_31" type="text" id="interest3_31" value="{$interest3_31}" size="10" /></td>
                              <td>&nbsp;</td>
                          </tr>
                      </tbody>
                  </table>
                </fieldset>
            </div>

            <!-- END CONTENT -->

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
