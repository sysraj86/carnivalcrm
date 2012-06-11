{literal}
<script type="text/javascript" src="modules/Tours/jquery.js"> </script>         
<script type="text/javascript" src="include/javascript/popup_parent_helper.js?s={SUGAR_VERSION}&c={JS_CUSTOM_VERSION}"></script>
<script type="text/javascript">
$(function(){
    $('#currency').change(function(){
        $('.currency').text($('option:selected',$(this)).text());
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
        $('#inword').val(DocTienBangChu($('#total_bonus').val()));
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
        {$JAVASCRIPT}
</script>
 {/literal}
<form  id="EditView"  name="EditView" method="post"   action="index.php" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0" width="100%" border="0"> 
        <tr>
            <td>
                <input type="hidden"   name="module"         value="GuideContracts">
                <input type="hidden"   name="record"         value="{$ID}">
                <input type="hidden"   name="action">
                <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
                <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
                <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
                <input type="hidden" name="contact_role">
                <input type="hidden" name="relate_to" value="Tours">
                <input type="hidden" name="relate_id" value="">
                <input type="hidden" name="offset" value="1">
            </td>
        </tr>
        <tr>
            <td style="padding-bottom: 2px;">
                 <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"   accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
                     onclick="this.form.action.value='Save';return check_form('EditView');" 
                      type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " /> 
               <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
                      onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
                      type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  "/>
               {if $ID neq ''}
                <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=GuideContracts", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
                {/if}
            </td>
        </tr>
    </table>
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
                                 Ngày <span class="required">*</span> <input name="date" type="text" id="date"  size="5" value="{$DATE}"/> <!--Tháng <span class="required">*</span> <input name="month" type="text"  id="month" size="5" value="{$MONTH}"/> -->Năm <span class="required">*</span> <input name="year" type="text" id="year"  size="5" value="{$YEAR}"/>
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
    <div>
        <input title="{$APP.LBL_SAVE_BUTTON_TITLE}"   accessKey="{$APP.LBL_SAVE_BUTTON_KEY}"   class="button" 
            onclick="this.form.action.value='Save';return check_form('EditView');" 
            type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  " /> 
        <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button" 
            onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'" 
            type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  "/>
        {if $ID neq ''}
            <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Tours", true, false, {$view_change_log} ); return false;' type="submit" value="View Change Log">
        {/if}
    </div>

</form>
