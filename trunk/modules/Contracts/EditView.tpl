{literal}  
<style type="text/css"> 
body {
	
	margin: 0;
	padding: 0;
	font: 10px normal Verdana, Arial, Helvetica, sans-serif;
	color: #444;
    font-size: 2em;
}
input{
    text-align: center;
}
h1 {font-size: 2em; margin: 20px 0;}
.container {width: 100%; margin: 10px auto;}
ul.tabs {
	margin: 0;
	padding: 0;
	float: left;
	list-style: none;
	height: 32px;
	border-bottom: 1px solid #999;
	border-left: 1px solid #999;
	width: 100%;
}
ul.tabs li {
	float: left;
	margin: 0;
	padding: 0;
	height: 31px;
	line-height: 31px;
	border: 1px solid #999;
	border-left: none;
	margin-bottom: -1px;
	background: #e0e0e0;
	overflow: hidden;
	position: relative;
}
ul.tabs li a {
	text-decoration: none;
	color: #000;
	display: block;
	font-size: 1.2em;
	padding: 0 20px;
	border: 1px solid #fff;
	outline: none;
}
ul.tabs li a:hover {
	background: #ccc;
}	
html ul.tabs li.active, html ul.tabs li.active a:hover  {
	background: #fff;
	border-bottom: 1px solid #fff;
}
.tab_container {
	border: 1px solid #999;
	border-top: none;
	clear: both;
	float: left; 
	width: 100%;
	background: #fff;
    
	-moz-border-radius-bottomright: 5px;
	-khtml-border-radius-bottomright: 5px;
	-webkit-border-bottom-right-radius: 5px;
	-moz-border-radius-bottomleft: 5px;
	-khtml-border-radius-bottomleft: 5px;
	-webkit-border-bottom-left-radius: 5px;
}
.tab_content {
	padding: 20px;
	font-size: 1.4em;
}
.tab_content h2 {
	font-weight: normal;
	padding-bottom: 10px;
	border-bottom: 1px dashed #ddd;
	font-size: 1.8em;
}
.tab_content h3 a{
	color: #254588;
}
.tab_content img {
	float: left;
	margin: 0 20px 20px 0;
	border: 1px solid #ddd;
	padding: 5px;
}
.table_head{
	font-size:1.5em;
}
table {
    font-size: 1em;
}

#kyten{
    border: 1px solid;
    margin: 10px auto;
}
#table_kyten {
    font-size: 1em;
}

</style> 
{/literal}
{literal}    
<script type="text/javascript" src="modules/Contracts/jquery.js"></script> 
<script type="text/javascript" src="modules/Contracts/jquery.table.clone.js"> </script>
<!--<script type="text/javascript" src="modules/GroupPrograms/jquery.table.addrow.js"> </script> -->
<script type="text/javascript" src="modules/Contracts/doctien.js"> </script>
 <script type="text/javascript" src="include/javascript/popup_parent_helper.js?s={SUGAR_VERSION}&c={JS_CUSTOM_VERSION}"></script> 
<script language="javascript" >
	$(function(){
		$(".tab_content").hide(); //Hide all content
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content
		
		//On Click Event
		$("ul.tabs li").click(function() {
			$("ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".tab_content").hide(); //Hide all tab content
			var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active content
			return false;
		});
                   
        $('.tinhtoan').blur(function(){
                 var id = this.id.substring(this.id.length-1,this.id.length); 
                 var sl =  parseFloat($('#tong_sl_khach'+id).val());
                 var giatour = parseFloat($('#gia_tour'+id).val());  
                 var thue = parseFloat($('#thue'+id).val());  
                 var thanhtien  = (sl*giatour)+(thue*sl);
                 if(!isNaN(thanhtien)){
                    $('#thanhtien'+id).val(thanhtien.toString()); 
                 }
                  calculateSum(this);
                  $('#bangchu').val(DocTienBangChu($('#tongtien').val()));
                  
        }) ;
                                       
        $('.percent').blur(function(){
            var tt = parseFloat($('#tongtien').val());
             var id = this.id.substring(this.id.length-1,this.id.length);
             var percent = parseFloat($('#phantram'+id).val());
             if(!isNaN(tt) && !isNaN(percent)){
                var thanhtien = (tt * percent)/100;
                $('#tienthanhtoan'+id).val(thanhtien.toString());
             }
             $('#in_word'+id).val(DocTienBangChu($('#tienthanhtoan'+id).val()));
        });
        
        $('.tientethanhtoan').change(function(){
             var id = this.id.substring(this.id.length-1,this.id.length);
             var currency = $('#tiente_thanhtoan'+id).val();
             if(currency == 'vnd'){
                $('#in_word'+id).val($('#in_word'+id).val()+' đồng');
             }
             else{$('#in_word'+id).val($('#in_word'+id).val()+' đô la');}
        });
        
        $('#daidienbena').blur(function(){
           $('.daidienbena').text($(this).val());
        });
        $('#daidienbenb_name').blur(function(){
           $('.daidienbena').text($(this).val());
        });
            
    }) ;
       
    function calculateSum(name){
       // var count = $(name).closest("table").find(" tbody tr:last").find('.thanhtien').attr('id');
        var count = $(name).closest("table").find(" tbody tr").length;
                 //count = count.substring(count.length-1,count.length);
                 //alert(count);
                 var sum = 0;
                  for (i = 1 ; i <= count ; i++ ){
                    if($('#deleted'+i).val()!= 1){
                      var tt = parseFloat($('#thanhtien'+i).val());
                      if(!isNaN(tt)){
                        sum += tt;
                      }
                    }     
                  } 
                 $('#tongtien').val(sum.toString());
    }
{$JAVASCRIPT}
</script>
 {/literal}  
<form action="index.php"  name="EditView" id="EditView" method="post">
            <input type="hidden"   name="module"         value="Contracts">
            <input type="hidden"   name="record"         value="{$ID}"> 
            <input type="hidden"   name="action">
            <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
            <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
            <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
<div class="container tabForm"> 
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
            {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Contracts", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
<table cellpadding="0" cellspacing="0" width="100%" border="1" style="border-collapse: collapse;"> 
    <tr>
        <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="table_head">
                        <tr>
                            <td align="center">CTY TNHH MỘT THÀNH VIÊN <br /> DV DL LỄ HỘI <br /> <b> CARNIVAL TOURS. </b> <br /></td>
                            <td align="center">CỘNG HÒA XÃ HỘI CHỈ NGHĨA VIỆT NAM <br />
                                Độc Lập - Tự Do - Hạnh Phúc</td>
                        </tr>
                        <tr>
                            <td align="center"> 
                                {$MOD.LBL_NUMBER}<span class="required">*</span> : <input name="number" type="text"  id="number" value="{$NUMBER}"/>
                            </td>
                            <td>&nbsp;

                            </td>
                        </tr>   
                        <tr>
                            <td colspan="2" align="center">
                                <h1> HỢP ĐỒNG DỊCH VỤ</h1> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                - Căn cứ Bộ Luật Dân Sự Số 33/2005/QH ngày 14/06/2005 của Quốc Hội Nước Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam. <br />
                                - Căn cứ vào Luật Thương mại số 36/2005/QH11 ngày 14/06/2005 của Quốc Hội Nước Cộng Hòa Xã Hội Chủ Nghĩa Việt Nam. <br />
                                - Căn cứ vào yêu cầu và khả năng đáp ứng của mỗi bên
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Hôm nay {$MOD.LBL_DATE} <span class="required">*</span> <input name="date" type="text" id="date"  size="5" value="{$DATE}"/> {$MOD.LBL_MONTH} <span class="required">*</span> <input name="month" type="text"  id="month" size="5" value="{$MONTH}"/> {$MOD.LBL_YEAR} <span class="required">*</span> <input name="year" type="text" id="year"  size="5" value="{$YEAR}"/> hai bên chúng tôi gồm
                            </td>
                        </tr>
                    </table>
                    <br />
                    <ul class="tabs"> 
                        <li><a href="#tab1">Tổng quan</a></li> 
                        <li><a href="#tab2">Điều I</a></li> 
                        <li><a href="#tab3">Điều II</a></li> 
                        <li><a href="#tab4">Điều III</a></li> 

                        <li><a href="#tab5">Điều IV</a></li> 
                        <li><a href="#tab6">Điều V</a></li> 
                        <li><a href="#tab7">Điều VI</a></li> 
                        <li><a href="#tab8">Điều VII</a></li> 
                        <li><a href="#tab9">Điều VIII</a></li> 
                        <!--<li><a href="#tab10">Ký tên</a></li>-->
                    </ul> 
                    <div class="tab_container"> 
                        <div id="tab1" class="tab_content"> 
                            <table cellpadding="0" cellspacing="0" border="0" align="center">
                                <tr>    
                                    <td colspan="2" > <b>BÊN A: CÔNG TY TNHH MỘT THÀNH VIÊN DV DL LỄ HỘI (CARNIVAL)</b> </td>
                                </tr>
                                <tr>
                                    <td>Do <select id="salutation_a" name="salutation_a" >{$SALUTATION_A}</select> <span class="required">*</span></td>
                                    <td> <input name="daidienbena" type="text"  id="daidienbena" size="35" value="{$DAIDIENBENA}" />  Chức vụ  <select id="position_a" name="position_a" >{$POSITION_A}</select> </td>
                                </tr>
                                <tr>
                                    <td> Địa chỉ :</td> 
                                    <td> <textarea name="address_a" id="address_a" cols="60" rows="3">{$ADDRESS_A}</textarea></td>
                                </tr>
                                <tr>
                                    <td> Điện thoại :</td> 
                                    <td> <input name="phone_a" id="phone_a" type="text" value="{$PHONE_A}"  size="35"/> </td> 
                                </tr>
                                <tr>
                                    <td> Fax :</td> 
                                    <td> <input name="fax" id="fax" type="text" value="{$FAX}"  size="35"/> </td> 
                                </tr>
                                <tr>
                                    <td> MST :</td> <td> <input name="mst_bena" id="mst_bena" value="{$MST_BENA}" type="text"  size="35" /> </td> 
                                </tr>
                                <tr>
                                    <td> Tài khoản tại ngân hàng :</td> 
                                    <td> <input name="bank_name" id="bank_name" type="text"  value="{$BANK_NAME}" size="35"/> - TP Hồ Chí Minh</td> 
                                </tr>
                                <tr>
                                    <td> Tên tài khoản</td> 
                                    <td><textarea name="account_name" id="account_name" cols="45" rows="3"> {$ACCOUNT_NAME}  </textarea> </td>
                                </tr>
                                <tr>
                                    <td> Tên khoản VND</td> 
                                    <td> <input name="account_vnd" id="account_vnd" type="text" value="{$ACCOUNT_VND}" size="35"/> </td>
                                </tr>
                                <tr>
                                    <td> Tên khoản USD</td> 
                                    <td> <input name="account_usd" id="account_usd" type="text" value="{$ACCOUNT_USD}"  size="35"/> </td>
                                </tr>
                                <tr>
                                    <td> Swift code</td>
                                    <td> <input name="swift_code" id="swift_code" type="text" value="{$SWIFT_CODE}"  size="35"/> </td>
                                </tr>
                                <tr>
                                    <td> Địa chỉ ngân hàng </td>
                                    <td> <textarea name="bank_address" id="bank_address" cols="45" rows="3"> {$BANK_ADDRESS} </textarea>  </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> Làm đại diện bên A </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> BÊN B <span class="required">*</span>: <input name="daidienbenb" id="daidienbenb" type="text" value="{$DAIDIENBENB}" size="35"/> </td>
                                </tr>
                                <tr>
                                    <td> Do <select id="salutation_b" name="salutation_b" >{$SALUTATION_B}</select> <span class="required">*</span> </td>
                                    <td> <input name="daidienbenb_name" id="daidienbenb_name" type="text"  size="35" value="{$DAIDIENBENB_NAME}"/> Chức vụ <select id="position_b" name="position_b" >{$POSITION_B}</select></td>
                                </tr>
                                <tr>
                                    <td> Địa chỉ</td>                    
                                    <td> <textarea name="address_b" id="address_b" cols="45" rows="3">{$ADDRESS_B}</textarea> </td>
                                </tr>

                                <tr>
                                    <td> MST </td>
                                    <td> <input name="mst_benb" id="mst_benb" size="35" type="text" value="{$MST_BENB}" /></td>
                                </tr>

                                <tr>
                                    <td>Điện thoại</td>
                                    <td><input name="phone_b" id="phone_b" size="35" type="text" value="{$PHONE_B}"/> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><br /> Làm đại diện bên B <br /> Sau khi bàn bạc thỏa thuận, hai bên cùng thống nhất thực hiện các điều khoản sau:  </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <select name="template_ddown_c[]" id="template_ddown_c" multiple="multiple"> {$TEMPLATE} </select></td>
                                </tr>
                            </table>
                        </div> 
                        <div id="tab2" class="tab_content"> 
                            <h2> <u> Điều 1:</u> ĐỐI TƯỢNG CỦA HỢP ĐỒNG</h2>
                            Bên A tổ chức cho bên B chuyến đi tham quan tour <input class="sqsEnabled" name="tour_name" id="tour_name" size="50" type="text" value="{$TOUR_NAME}"/> <input type="hidden" id="tour_id" name="tour_id" value="{$TOUR_ID}" />
                            <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name" id="bnt_tour_name" onclick='open_popup("Tours", 600, 400, "", true, false, {$encoded_tour_popup_request_data}, "single", true);'>  
                            <input name="associate" id="associate" size="50" type="text" value="{$KETHOP}"/>   <br /> từ ngày <input name="start_date_contract" type="text"  id="start_date_contract" value="{$START_DATE}"/> đến ngày <input name="end_date_contract"  id="end_date_contract" type="text" value="{$END_DATE}" /> tổng cộng 
                            <input id="num_of_date" name="num_of_date" size="5" type="text" value="{$NUM_OF_DATE}"/> ngày <input id="num_of_night" name="num_of_night" type="text" size="5" value="{$NUM_OF_NIGHT}"/> đêm <br />
                            Mục Đích chuyến đi <input name="purpose" type="text" id="purpose" size="50" value="{$PURPOSE}"/>
                        </div> 
                        <div id="tab3" class="tab_content"> 
                            <h2> <u>ĐIỀU 2:</u> TRÁCH NHIỆM CỦA BÊN A </h2>
                            2.1 Tổ chức chuyến đi cho bên B theo đúng chương trình như điều 1.<br/>
                            2.2 Hướng dẫn bên B làm thủ tục xin visa.<br/>
                            2.3 Giữ hộ chiếu của bên B từ khi xin được visa cho đến ngày khởi hành chuyến đi<br/>
                            2.4 Phổ biến cho bên B các qui định về an ninh tại nước đến       
                        </div> 
                        <div id="tab4" class="tab_content"> 
                            <h2> <u> ĐIỀU 3:</u>TRÁCH NHIỆM BÊN B</h2>
                            3.1 Đáp ứng các yêu cầu về thủ tục giấy tờ do bên A yêu cầu để xin visa. Khởi hành đung như lịch trình của đoàn, không về sau hoặc về trễ hơn trừ lý do thiên tai, lũ lụt, hãng hàng không đình công và cả đoàn đều bị trễ. <br />
                            3.2 Đảm bảo cung cấp toàn bộ giấy tờ hợp pháp. Nếu có vi phạm phải chịu trách nhiệm trước pháp luật.<br />
                            3.3 Tự chịu trách nhiệm quản lý về hàng hóa,tài sản,sức khỏe và y tế cá nhân tronng suốt chuyến đi.
                        </div> 

                        <div id="tab5" class="tab_content"> 
                            <table cellpadding="0" cellspacing="0"  width="100%">
                                <tr>
                                    <td colspan="2">  <h2> <u> ĐIỀU 4:</u> GIÁ TRỊ HỢP ĐỒNG</h2> </td>
                                </tr>
                                <tr>
                                    <td> <b> Giá tour trọn gói</b></td>
                                    <td align="right">( Áp dụng cho đoàn  <input name="sl_khach"  id="sl_khach" value="{$SL_KHACH}" type="text" size="4" /> khách trở lên) </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse:collapse" class="table_clone" id="giatrihopdong">
                                            <thead>
                                                <tr bgcolor="#CCCCCC">
                                                    <th align="center">&nbsp;</th>
                                                    <th align="center"> Số lượng</th> 
                                                    <th align="center"> Giá tour</th>
                                                    <th align="center"> Thuế</th>
                                                    <th align="center"> Thành tiền</th>
                                                    <th align="center">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             {if $ID eq '' or $CONTRACT_VALUE_COUNT eq 0}
                                                <tr>
                                                    <td  align="center"> 
                                                    {$CONTRACT_VALUE_COUNT} 
                                                        <input name="age[]" type="text" id="age" value="{$DOTUOI}" />
                                                    </td>
                                                    <td align="center">
                                                        <input name="tong_sl_khach[]" type="text" id="tong_sl_khach" class="tinhtoan" value="{$TONG_SL_KHACH}" />
                                                    </td>
                                                    <td align="center">
                                                        <input name="gia_tour[]" type="text" id="gia_tour" class="tinhtoan " value="{$GIA_TOUR}" />
                                                    </td>
                                                    <td align="center">
                                                        <input name="thue[]" type="text" id="thue" class="tinhtoan" value="{$THUE}" />
                                                    </td>
                                                    <td align="center">
                                                        <input name="thanhtien[]" type="text" id="thanhtien" class="tinhtoan thanhtien" value="{$THANHTIEN}"  />USD
                                                        <input type="hidden" name="contract_value_id[]" id="contract_value_id" value=""/> <input type="hidden" name="deleted[]" id="deleted" value="0"/>
                                                    </td>
                                                    <td align="center">
                                                        <input type="button" class="btnAddRow" value="Add row" />
                                                        <input type="button"  class="btnDelRow" value="Delete row" />
                                                    </td>
                                                </tr>
                                                <br/>
                                                {/if}
                                                {$CONTRACT_VALUES}
                                            </tbody>
                                            <thead>
                                                <tr>    
                                                    <th colspan="4" align="center"> Tổng cộng</th>
                                                    <td align="center"> <input name="tongtien" type="text" id="tongtien" value="{$TONGTIEN}"  /> USD</td>
                                                    <td>&nbsp; </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="6" align="center"> Bằng chữ: <input name="bangchu" type="text" size="90" id="bangchu" value="{$BANGCHU}" /> </td>
                                                </tr>
                                            </thead>
                                        </table>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"> Nếu đoàn từ <input name="sl_khach_1" size="5" type="text" id="sl_khach_1" value="{$SL_KHACH_1}" /> khách , giá tour <input name="gia_tour_1" type="text" id="gia_tour_1" value="{$GIA_TOUR_1}" /> <select name="tiente" id="tiente">{$TIENTE} </select> / khách </td>
                                </tr>

                                <tr>
                                    <td colspan="2"> Khách hàng vui lòng thanh toán bằng <select name="tiente_usd" id="tiente_usd">{$TIENTE_USD} </select> hoặc <select name="tiente_vnd" id="tiente_vn"> {$TIENTE_VND} </select> theo tỷ giá của <input name="ten_nganhang" type="text" id="ten_nganhang"  size="50" value="{$TEN_NGANHANG}"/> </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h4> <u> Bao gồm</u></h4> 
                                        <textarea name="baogom" cols="100" rows="12" id="baogom">{$BAOGOM}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h4> <u> Không bao gồm</u></h4> 
                                        <textarea name="khongbaogom" cols="100" rows="12" id="khongbaogom">{$KHONGBAOGOM}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h4> <u> Ghi chú</u></h4>
                                        <p align="justify">
                                            - Trẻ em dưới 02 tuổi <input name="trepercent" type="text" size="3" id="trepercent" value="{$TREPERCENT}" /> % giá tour + thuế các loại (ngủ chung với người lớn) <br />
                                            - Trẻ em từ 02 đến dưới 12 tuổi <input name="trepercent_1" type="text" size="3" id="trepercent_1" value="{$TREPERCENT_1}" /> % giá tour + thuế các loại (ngủ chung với người lớn)<br />
                                            - Trẻ em từ 12 tuổi trở lên bằng giá tour người lớn <br />
                                            - Do chi phí xăng dầu có thể tăng vào thời điểm xuất vé mà không được báo trước. Chúng tôi 
                                            sẽ xuất trình công văn của hàng không về việc tăng phụ thu (nếu có) và xin đề nghị khách cho tăng giá tương ứng. <br />
                                            - Trình tự các điểm tham quan trong chương trình có thể thay đổi tùy theo thời điểm khởi hành.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div id="tab6" class="tab_content"> 
                            <h2> <u> ĐIỀU 5:</u> ĐIỀU KHOẢN THANH TOÁN</h2>
                            <b>5.1 Thanh toán làm <input name="solanthanhtoan" type="text" size="4"  id="solanthanhtoan" value="{$SOLANTHANHTOAN}"/> đợt</b>
                            <fieldset>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table_clone" id="dieukhoanthanhtoan">
                                    <tbody>
                                      {if $ID eq '' or $CONTRACT_CONDITION_LINE_COUNT eq 0}
                                        <tr>
                                            <td>
                                                <fieldset>
                                                    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tabForm"> 
                                                        <tr>
                                                            <td>
                                                                <input name="dotthanhtoan[]" id="dotthanhtoan" type="text" value="{$DOTTHANHTOAN}"/><input name="event[]" type="text" id="event" value="{$SUKIEN}"/> Bên B thanh toán cho bên A <input name="phantram[]" id="phantram" class="percent" type="text" value="{$PHANTRAM}"/> % số tiền là  <input name="tienthanhtoan[]" type="text"  id="tienthanhtoan" value="{$TIENTHANHTOAN}"/> <select name="tiente_thanhtoan[]" class="tientethanhtoan" id="tiente_thanhtoan"> <option value="vnd">VND</option> <option value="usd">USD </option> </select> <br />
                                                                <input type="hidden" name="contract_condition_id[]" id="contract_condition_id" value=""/>  <input type="hidden" name="deleted[]" id="deleted" value="0"/>
                                                                Bằng chữ: <input name="in_word[]" type="text" id="in_word" value="{$BANGCHU1}"  size="90"/>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </fieldset>
                                            </td>
                                            <td>
                                                <input  type="button" class="btnAddRow" value="Add row" />
                                                <input  type="button" class="btnDelRow" value="Delete" />
                                            </td>
                                        </tr>
                                        {/if}
                                       {$CONTRACT_CONDITIONS}
                                    </tbody>
                                </table>
                                <br/>
                                <b>5.2 Hình thức thanh toán :</b>
                                -Bên A thanh toán hợp đồng bằng tiền mặt hoặc chuyển khoản theo tỉ giá chính thức
                                của Ngân hàng Ngoại thương Việt Nam tại thời điểm thanh toán.
                            </fieldset>
                        </div> 

                        <div id="tab7" class="tab_content" align="justify"> 
                            <p align="justify">
                                <h2> <u>ĐIỀU 6:</u> ĐIỀU LUẬT HỦY PHẠT</h2>
                                6.1 Nếu bên A hủy chuyến đi: <br />
                                Cố ý hủy chuyến đi mà không có lý do chính đáng, bên A phải bồi thường cho bên B như sau:
                                <center> 
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td> - Ngay sau khi ký hợp đồng</td>
                                            <td> : bị phạt 20% tổng giá trị hợp đồng </td>
                                        </tr>
                                        <tr>
                                            <td> - Trước ngày khởi hành 7 ngày</td>
                                            <td> : bị phạt 40% tổng giá trị hợp đồng </td>
                                        </tr>
                                        <tr>
                                            <td> - Trước ngày khởi hành 02-06 ngày</td>
                                            <td> : bị phạt 60% tổng giá trị hợp đồng </td>
                                        </tr>
                                        <tr>
                                            <td> - Trong vòng 24 tiếng</td>
                                            <td> : bị phạt 80% tổng giá trị hợp đồng </td>
                                        </tr>
                                    </table>
                                </center>        

                                Nếu lý do hoãn hay hủy bỏ chuyến đi rơi vào một trong nguyên nhân sau đây thì bên A không phải bồi thường bất cứ khoản nào cho bên B.<br/>

                                - Các thay đổi không báo trước của hãng hàng không <br/>
                                - Các yếu tố khách quan khác như thời tiết, các ngày ngày nghỉ lễ không báo trước của     các Lãnh Sự Quán, Đại Sứ Quán, chiến tranh, đình công …<br />
                                &nbsp; <br />
                                6.2 Nếu bên B hủy chuyến đi: <br />
                                Trong trường hợp bên B tự ý hủy toàn bộ chuyến đi, bên B sẽ bồi thường cho bên A như sau: <br />

                                <center> 
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td> - Ngay sau khi ký hợp đồng</td>
                                            <td> : bị phạt 20% tổng giá trị hợp đồng </td>
                                        </tr>
                                        <tr>
                                            <td> - Trước ngày khởi hành 7 ngày</td>
                                            <td> : bị phạt 40% tổng giá trị hợp đồng </td>
                                        </tr>
                                        <tr>
                                            <td> - Trước ngày khởi hành 02-06 ngày</td>
                                            <td> : bị phạt 60% tổng giá trị hợp đồng </td>
                                        </tr>
                                        <tr>
                                            <td> - Trong vòng 24 tiếng</td>
                                            <td> : bị phạt 80% tổng giá trị hợp đồng </td>
                                        </tr>
                                    </table>
                                </center> 
                                Trong trường hợp có thành viên bên B không tham gia chuyến đi, bên B sẽ bồi thường cho bên A như sau: 
                                <center> 
                                    <table cellpadding="0" cellspacing="0" border="0">
                                        <tr>
                                            <td> - Ngay sau khi ký hợp đồng</td>
                                            <td> : bị phạt 20% tổng giá trị hợp đồng / khách </td>
                                        </tr>
                                        <tr>
                                            <td> - Trước ngày khởi hành 7 ngày</td>
                                            <td> : bị phạt 40% tổng giá trị hợp đồng /khách </td>
                                        </tr>
                                        <tr>
                                            <td> - Trước ngày khởi hành 02-06 ngày</td>
                                            <td> : bị phạt 60% tổng giá trị hợp đồng / khách</td>
                                        </tr>
                                        <tr>
                                            <td> - Trong vòng 24 tiếng</td>
                                            <td> : bị phạt 80% tổng giá trị hợp đồng / khách</td>
                                        </tr>
                                    </table>
                                </center> 
                                Lưu ý: các qui định về thời gian trên đây chỉ áp dụng theo giờ hành chính và ngày làm việc </p>
                        </div> 
                        <div id="tab8" class="tab_content" align="justify"> 
                            <h2> <u>ĐIỀU 7: </u>ĐIỀU KHOẢN KHÁC</h2>
                            7.1 Bên A không chịu trách nhiệm về tinh thần cũng như vật chất do những sự cố khách quan gây ra tại nước du lịch sở tại như: thất thoát hành lý vì bất cứ lý do nào, thiên tai, hạn hán, chiến tranh, xung đột chính trị, đình công, biểu tình, hỏa hoạn, trì hoãn chuyến bay do thời tiết. Trong các trường hợp này bên B phải tự trang trải các khoản phí tổn thất ngoài ý muốn.<br/>
                            7.2 Bên A không chịu trách nhiệm bồi thường về vấn đề bảo hiểm ( không chi trả các khoản chi phí nếu có sự cố xảy ra bên A sẽ hỗ trợ về mặt thủ tục để nộp hồ sơ bảo hiểm )<br />
                            7.3 Bên A không chịu trách nhiệm về các vấn đề liên quan đến sức khỏe cá nhân, bảo hiểm y tế, nhân mạng, chết chóc.<br />
                            7.4 Bên A không chịu trách nhiệm trong tường hợp Khách hàng bị từ chối tại cửa khẩu mặc dù quý khách đã có visa ( vì một lý do nào đó mà quan chức an ninh không đồng ý cho nhập cảnh), bên A sẽ hỗ trợ về mặt thủ tục cho Quý khách trong trường hợp đến khi quý khách đến Việt Nam. Bên B sẽ chịu mọi chi phí phát sinh trong trường hợp này.<br />
                            7.5 Trong trường hợp đoàn đã khởi hành, vì bất kỳ lý do nào mà khách tham dự tour tách khỏi đoàn thì các khoản chi phí dịch vụ sẽ không được hoàn trả<br />
                            7.6 Trường hợp đoàn không đủ 10 khách/đoàn thì bên A sẽ tính lại giá tour áp dụng cho đoàn dưới 10 khách.
                        </div> 

                        <div id="tab9" class="tab_content" align="justify"> 
                            <h2>  <u>ĐIỀU 8:</u> ĐIỀU KHOẢN CUỐI </h2>
                            81. Hai bên cam kết thực hiện đầy đủ các điều khoản đã ghi trong hợp đồng, không bên nào được đơn phương sửa đổi hợp đồng nếu không có ý kiến thống nhất của bên kia. Mọi tranh chấp được giải quyết trên cơ sở hợp tác hai bên cùng có lợi. Nếu không giải quyết được thì việc tranh chấp sẽ do Tòa an TP.HCM giải quyết. <br />
                            8.2 Hợp đồng thành lập thành 04 bản có giá trị ngang nhau kể từ ngày ký cho đến ngày thứ 15 sau khi kết thúc chuyến đi, mỗi bên giữ 02 bản đẻ cùng thực hiện.<br />
                            8.3 Chương trình du lịch đính kềm được xem như là phụ lục của hợp đồng. Chương trình có thể thay đổi thứ tự các điểm tham quan cho phù hợp với tình hình thực tế nhưng số lượng các diểm tham quan không thay đổi.<br />
                            8.4 Sau 15 ngày của ngày kết thúc chuyến đi, hợp động xem như đã được thanh lý.     
                        </div> 
                        <!--<div id="tab10" class="tab_content"> 
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tr>
                        <td align="center">
                        ĐẠI DIỆN BÊN B <br /><br /><br /><br /><br /><br />

                        <input name="nguoidaidienbenb" id="nguoidaidienbenb" size="40" type="text" value="{$NGUOIDAIDIENBENB}" />
                        </td>
                        <td align="center">
                        ĐẠI DIỆN BÊN A <br /><br /><br /><br /><br /><br />

                        <input name="nguoidaidienbena" id="nguoidaidienbena" size="40" type="text" value="{$NGUOIDAIDIENBENA}" />
                        </td>
                        </tr>
                        <tr>   
                        <td colspan="2"> <i> Ghi chú: Đính kèm chương trình tham quan du lịch <br />
                        (*) ngày kết thúc tour là ngày đoàn về đến sân bay <input name="tensanbay" id="tensanbay" value="{$TENSANBAY}"  value="" type="text"  size="35"/> theo đúng thời gian thể hiện trong điều (1).
                        </i> </td>
                        </tr>
                        </table>
                        </div> -->            

                    </div> 

                    <div id="kyten" > 
                        <table cellpadding="0" cellspacing="0" border="0" width="100%" id="table_kyten">
                            <tr>
                                <td align="center">
                                    <b>ĐẠI DIỆN BÊN B</b> <br /><br /><br /><br /><br /><br />
                                    <label class="daidienbenb">{$DAIDIENBENB_NAME}</label>
                                </td>
                                <td align="center">
                                    <b>ĐẠI DIỆN BÊN A</b> <br /><br /><br /><br /><br /><br />

                                    <label class="daidienbena">{$DAIDIENBENA}</label>
                                </td>
                            </tr>
                            <tr>   
                                <td colspan="2"> <br/><br/> <i> Ghi chú: Đính kèm chương trình tham quan du lịch <br />
                                        (*) ngày kết thúc tour là ngày đoàn về đến sân bay <input name="tensanbay" id="tensanbay" value="{$TENSANBAY}" type="text"  size="35"/> theo đúng thời gian thể hiện trong điều (1).
                                </i> </td>
                            </tr>
                        </table>
                        <br/>

                        <table cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    {$MOD.LBL_ASSIGNED_TO_NAME}
                                </td>
                                <td>
                                    <input class="sqsEnabled" tabindex="2" autocomplete="off" id="assigned_user_name" name="assigned_user_name"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$ASSIGNED_USER_NAME}"><input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
                                     <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name=btn1
                                     onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_users_popup_request_data});' />

                                </td>
                            </tr>
                        </table>
                    </div>

                    <br/>
                </td>

            </tr>

</table>
	    <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"  accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
          onclick="this.form.action.value='Save';return check_form('EditView');" 
          type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " > 
          <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
          onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
          type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
        {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Contracts", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
</div> 

</form>