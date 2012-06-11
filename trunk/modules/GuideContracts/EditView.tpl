{literal}
<script type="text/javascript" src="modules/Tours/jquery.js"> </script>  
<script type="text/javascript" src="modules/Contracts/doctien.js"> </script>   
<script type="text/javascript">
$(function(){
$('.currency').text($('option:selected',$('#currency')).text());

$('.continent').text($('option:selected',$('#partner')).text());

   $('#currency').change(function(){
        $('.currency').text($('option:selected',$(this)).text());  
        var str ='';
         if( $(this).val() == "usd"){
           str = DocTienBangChu($('#total_bonus').val())+" Đô la";
           $('#inword').val(str); 
         }
         else{
            str = DocTienBangChu($('#total_bonus').val())+" Việt Nam đồng";
            $('#inword').val(str);
         }
   });
   $('#partner').change(function(){
       $('.continent').text($('option:selected',$(this)).text());
   });
   
   $('#travleguide').mouseleave(function(){
        $('#representative_b').val($('#travelguidecontracts_name').val())
        $('#representative_a').val($('#representing_a').val())
   });
   
   $('#bonus').blur(function(){
         get_value();
   });
   $('#num_of_date').blur(function(){
        get_value();
   });
   
   function get_value(){
        var a = parseFloat($('#bonus').val());
        var b = parseFloat($('#num_of_date').val());
        var tt = a*b;
        if(!isNaN(tt)){
            $('#total_bonus').val(tt.toString())
        } 
        if( $('option:selected',$('#currency')).text() == "USD"){
          $('#inword').val(DocTienBangChu($('#total_bonus').val())+" Đô la");   
        }
        else{
            $('#inword').val(DocTienBangChu($('#total_bonus').val())+" Việt Nam đồng");  
        }
        
   }
   function get_currency(){
        return  $('#currency').val();
   }
});
          Calendar.setup ({ {/literal}
            inputField : "birthday",daFormat : "%d/%m/%Y",button : "birthday_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
        {literal} });addToValidate('EditView', 'expiration', 'date', false,'expiration' ); 
         Calendar.setup ({ {/literal}
            inputField : "date_issued",daFormat : "%d/%m/%Y",button : "date_issued_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
        {literal} });addToValidate('EditView', 'expiration', 'date', false,'expiration' );
         Calendar.setup ({ {/literal}
            inputField : "date_start",daFormat : "%d/%m/%Y",button : "date_start_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
        {literal} });addToValidate('EditView', 'expiration', 'date', false,'expiration' );
         Calendar.setup ({ {/literal}
            inputField : "date_end",daFormat : "%d/%m/%Y",button : "date_end_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
        {literal} });addToValidate('EditView', 'expiration', 'date', false,'expiration' );
         Calendar.setup ({ {/literal}
            inputField : "expiration_date",daFormat : "%d/%m/%Y",button : "expiration_date_trigger",singleClick : true,dateStr : "12/19/2009",step : 1
        {literal} });addToValidate('EditView', 'expiration', 'date', false,'expiration' );

</script>
{/literal}

<form action="index.php"  name="EditView" id="EditView" method="post">  
    <div>
         <input type="hidden"   name="module"         value="GuideContracts">
        <input type="hidden"   name="record"         value="{$ID}">
        <input type="hidden"   name="action">
        <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
        <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
        <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
        <input type="hidden" name="contact_role">
        <input type="hidden" name="relate_to" value="GuideContracts">
        <input type="hidden" name="relate_id" value="">
        <input type="hidden" name="offset" value="1"> 
    </div>
    <div>
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"   accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" onclick="this.form.action.value='Save';return check_form('EditView');" type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " /> 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
        onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
        type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
        {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=GuideContracts", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
    </div>
    <table class="tabForm" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td colspan="4">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="table_head">
                        <tr>
                            <td align="center">CTY TNHH MỘT THÀNH VIÊN <br /> DV DL LỄ HỘI <br /> <b> CARNIVAL TOURS. </b> <br /></td>
                            <td align="center">CỘNG HÒA XÃ HỘI CHỈ NGHĨA VIỆT NAM <br />
                                Độc Lập - Tự Do - Hạnh Phúc</td>
                        </tr>
                        <tr>
                            <td align="center"> 
                                Số<span class="required">*</span> : <input name="number" type="text" size="7" id="number" value="{$NUMBER}"/> / HĐCTV
                            </td>
                            <td align="center">
                                 Ngày <span class="required">*</span> <input name="date" type="text" id="date"  size="5" value="{$DATE}"/> Tháng <span class="required">*</span> <input type ="text" name="months" id="months" size="5" value="{$THANG}"/> Năm <span class="required">*</span> <input type="text" name="year"  id="year"  size="5" value="{$YEAR}"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><br/><br/><br/></td>
                        </tr>   
                        <tr>
                            <td colspan="2" align="center">
                                <h1> HỢP ĐỒNG HƯỚNG DẪN VIÊN</h1> 
                            </td>
                        </tr>
                    </table>
            </td>
        </tr>
        <tr>
            <td colspan="4"> <br/> <br/> <br/>  </td>
        </tr>
        <tr>
            <td> <u><b>+ BÊN A:</b> <span class="required">*</span> </u>  </td>
            <td class="dataField"> <input type="text" name="company_name" id="company_name" value="{$COMPANY_NAME}" size="50"/> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            <td class="dataLabel"> Địa chỉ </td>
            <td class="dataField"> <textarea cols="51" rows="3" name="address_a" id="address_a">{$ADDRESS_A}</textarea> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
         <tr>
            <td class="dataLabel"> Điện thoại </td>
            <td class="dataField"><input type="text" name="phone_a" id="phone_a" value="{$PHONE_A}"/> Fax: <input type="text" name="fax_a" id="fax_a" value="{$FAX_A}"/></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="dataLabel"> Do <select name="salutation" id="salutation">{$SALUTATION}</select> </td>
            <td class="dataField"> <input type="text" name="representing_a" id="representing_a" size="50" value="{$REPRESENTING_A}"/> Giám đốc làm đại diện </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="dataLabel"><u><b>+ BÊN B:</b> <span class="required">*</span> </u> </td>
            <td class="dataField"> 
                <input type="text" name="travelguidecontracts_name" id="travelguidecontracts_name" size="50" value="{$REPRESENTING_B}"/> 
                <input type="hidden" name="travelguidead0lguides_ida" id="travelguidead0lguides_ida" value="{$TRAVELGUIDE_ID}"/>
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' name="travleguide" id="travleguide" onclick='open_popup("TravelGuides", 600, 400, "", true, false, {$travelguide_popup_request_data}, "single", true);'>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="dataLabel"> Sinh ngày </td>
            <td class="dataField"> <input id='birthday' name='birthday' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$BIRTHDAY}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="birthday_trigger" align="absmiddle"> (dd/mm/yy)   </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="dataLabel"> Hộ chiếu</td>
            <td class="dataField"> <input type="text" name="passport_no" id="passport_no" value="{$PASSPORT}"/> Cấp ngày: <input id='date_issued' name='date_issued' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$DATE_ISSUED}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="date_issued_trigger" align="absmiddle"> (dd/mm/yy)  </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="dataLabel"> Điện thoại </td>
            <td class="dataField"> <input type="text" name="phone_b" id="phone_b" size="50" value="{$PHONE_B}"/> </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="dataLabel"> Địa chỉ </td>
            <td class="dataField"> <textarea cols="51" rows="3" name="address_b" id="address_b">{$ADDRESS_B}</textarea>  </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
        
            <td colspan="4"><br/>Hai bên cùng thỏa thuận và tiến hành ký kết hợp đồng theo các nội dung sau đây :</td>
        </tr>
        
    </table>
    <table class="tabForm" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td class="dataLabel"><u><b>Điều 1 :</b></u> Bên B đồng ý thực hiện công tác hướng dẫn cho đoàn đi du lịch </td>
        </tr>
        <tr>
            <td class="dataField">
                <input class="sqsEnabled" name="tour_name" id="tour_name" size="50" type="text" value="{$TOUR_NAME}"/>
                <input type="hidden" id="tour_id" name="tour_id" value="{$TOUR_ID}" />
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name" id="bnt_tour_name" onclick='open_popup("Tours", 600, 400, "", true, false, {$encoded_tour_popup_request_data}, "single", true);'>  
                Từ ngày <input id='date_start' name='date_start' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$DATE_START}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="date_start_trigger" align="absmiddle"> (dd/mm/yy) 
                cho đến  <input id='date_end' name='date_end' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$DATE_END}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="date_end_trigger" align="absmiddle"> (dd/mm/yy)
            </td>
        </tr>
        <tr>
            <td class="dataLabel"><b><u>Điều 2 :</u>  <u>Nghĩa vụ và quyền lợi bên B như sau :</u></b></td>
        </tr>
        <tr>
           <td class="dataField"> <i><u><b>+ Nghĩa vụ :</b></u></i> Thực hiện đúng theo như chương trình 
                <input type="text" name="journey" id="journey" size="70" value="{$JOURNEY}"/>
           </td>
        </tr> 
        <tr>
            <td class="dataField">mà bên A cung cấp, kiểm tra việc thực hiện chương trình, dịch vụ của đối tác tại <select name="partner" id="partner">{$PARTNER}</select></td>
        </tr>
        <tr>
            <td class="dataField">, có trách nhiệm phiên dịch và chăm sóc việc ăn, ở, đi lại của khách hàng, hỗ trợ và cung cấp các thông tin cần thiết khi khách có nhu cầu. Tuân thủ các qui định của hải quan Việt Nam và <b> <label class="continent">{$PARTNER}</label> </b> <!--<select name="continent" id="continent">{$CONTINENT}</select>--></td>
        </tr>
        <tr>
           <td class="dataLabel">
                - Chăm sóc khách hàng của bên A chu đáo. Trong trường hợp bên B không làm cho khách hàng bên A hài lòng thì sẽ bị trừ công tác phí từ 05 – 50% theo từng trường hợp cụ thể. <br/>
                - Trường hợp bên B hủy hợp đồng này vì bất cứ lý do gì thì bên B phải có trách nhiệm thông báo trước ít nhất 05 ngày cho bên A và bồi thường các khoản phát sinh (nếu có) mà bên A đã ứng ra đặt dịch vụ đồng thời có trách nhiệm giới thiệu một HDV tốt khác. <br/>  
                - Sau khi đi về, T/L có trách nhiệm viết báo cáo chi tiết các dịch vụ trong chuyến đi.   <br/>
                - Chụp hình cả đoàn mang về cho công ty Carnival tại từng thành phố đoàn đến, ít nhất 1 thành phố 1 tấm hình. <br/>
                - Có trách nhiệm mang về cho Carnival: namecard các nhà hàng, namecard khách sạn, brochures tại các nơi đoàn đến, các form khai xuất nhập cảnh.  <br/>
                - Có trách nhiệm đem toàn bộ hóa đơn, chứng từ, quyết toán tour cho Carnival trong vòng 3 ngày sau khi kết thúc chuyến đi. Trong quá trình đi tour, nếu có những chi phí phát sinh phải được Carnival đồng ý qua email, điện thoại, fax hoặc các thông tin liên hệ khác.  <br/>
                - Bên B có trách nhiệm thu hộ chiếu gốc của khách sau khi đi tour về cho bên A trình diện với LSQ đối với các tour Châu Âu. <br/>
                - Bên B luôn đứng trên phương diện là người của Carnival để làm việc với khách, PR các chương trình,…  <br/>
                - Không được phép uống bất kỳ loại bia, rượu nào trong quá trình đi tour.  <br/>
                    + Quyền lợi : Bên B được hưởng khoản công tác phí: 
           </td>
        </tr>
        <tr>
            <td class="dataField">
                <input type="text" name="bonus" id="bonus" value="{$BONUS}"/> <select name="currency" id="currency">{$CURRENCY}</select> X  <input type="text" name="num_of_date" id="num_of_date" value="{$NUM_OF_DATE}"/> ngày = <input type="text" name="total_bonus" id="total_bonus" value="{$TOTAL_BONUS}"/> <label class="currency">{$CURRENCY}</label>
            </td>
        </tr>
        <tr>
            <!--<td class="dataField"><br/><font color="red"><b> <label name="inword" id="inword" >{$INWORD}</label></b></font></td>-->
            <td class="dataField"><input type="text" name="inword" id="inword" size="70" value="{$INWORD}" readonly="readonly"/></td>
        </tr>
    </table>
    <table class="tabForm" cellpadding="0" cellspacing="0" width="100%">
         <tr>
            <td class="dataLabel">
                <b><i><u>Điều 3 :</u></i> Trách nhiệm của bên A</b> <br/>
                Cung cấp đầy đủ chương trình, danh sách đoàn, danh sách phòng (đính kèm form bàn giao đoàn) cho bên B.
                Có trách nhiệm thanh toán đầy đủ công tác phí sau khi bên B thực hiện đúng chương trình và thực hiện đúng các nghĩa vụ của bên B.  <br/>
                Bên A có quyền từ chối thanh toán các khoản chi phí phát sinh không hợp lệ, không có chứng từ. 
            </td>
        </tr>
        <tr>
            <td class="dataLabel">
                <b><u>Điều 4</u> : <u>Điều khoản chung :</u></b>  <br/>
                Bên A không chịu trách nhiệm về hành lý ký gửi cũng như xách tay của bên B, nếu bên B vi phạm qui định Hải quan và luật pháp Việt Nam và <b> <label class="continent" >{$PARTNER}</label></b> bên B sẽ tự chịu trách nhiệm về các hành vi của mình gây ra 
                Hợp đồng có hiệu lực kể từ ngày ký đến hết ngày <input id='expiration_date' name='expiration_date' onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"  type="text" tabindex='1' size='15' maxlength='10' value="{$EXPIRATION_DATE}"/> <img src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="expiration_date_trigger" align="absmiddle"> (dd/mm/yy)
                và được lập thành 2 bản, có giá trị như nhau, mỗi bên giữ 1 bản để cùng thực hiện 
            </td>
        </tr>
    </table>
    <table class="tabForm" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td  align="center"><b>BÊN B</b></td>
            <td  align="center"><b>BÊN A</b></td>
        </tr>
        <tr>
            <td  align="center"><input type="text" name="representative_b" id ="representative_b" size="40" value="{$REPRESENTATIVE_B}"/> </td>
            <td  align="center"><input type="text" name="representative_a" id ="representative_a" size="40" value="{$REPRESENTATIVE_A}"/> </td>
        </tr>
        <tr>
            <td class="dataField">
                {$MOD.LBL_ASSIGNED_TO_NAME} :
               
                <input class="sqsEnabled" tabindex="2" autocomplete="off" size="50" id="assigned_user_name" name="assigned_user_name"  title='{$APP.LBL_ASSIGNED_TO}' type="text" value="{$ASSIGNED_USER_NAME}"><input id='assigned_user_id' name='assigned_user_id' type="hidden" value="{$ASSIGNED_USER_ID}" />
                 <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name=btn1
                 onclick='open_popup("Users", 600, 400, "", true, false, {$encoded_users_popup_request_data});' />
            </td>
            <td>
                &nbsp;
            </td>
        </tr>
    </table>
    <div>
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"   accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" onclick="this.form.action.value='Save';return check_form('EditView');" type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " /> 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
        onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
        type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
        {if $ID neq ''}
        <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=GuideContracts", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
    </div>
    {$JAVASCRIPT}
</form>