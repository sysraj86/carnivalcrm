<table width="100%" cellpadding="0" cellspacing="0" border="0">
<form action="index.php"  name="DetailView" id="DetailView" method="post">
<input type="hidden"   name="module"         value="TransportBookings">
<input type="hidden"   name="record"         value="{$ID}"> 
<input type="hidden"   name="action">
<input type="hidden"   name="isDuplicate" value="false">
<input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
<input type="hidden"   name="return_id"      value="{$RETURN_ID}">
<input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
<tr>
    <td style="padding-bottom: 2px;">
         <input title="{$APP.LBL_EDIT_BUTTON_TITLE}" 
            accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" 
            class="button" 
            onclick="this.form.return_module.value='TransportBookings'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$ID}'; this.form.action.value='EditView'" 
            type="submit" 
            name="Edit" 
            value="  {$APP.LBL_EDIT_BUTTON_LABEL}  "> 
     <input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" 
            accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" 
            class="button" 
            onclick="this.form.return_module.value='TransportBookings'; this.form.return_action.value='DetailView'; this.form.isDuplicate.value=true; this.form.action.value='EditView';this.form.return_id.value='{$ID}';SUGAR.ajaxUI.submitForm(this.form);" 
            type="submit" 
            name="Duplicate" 
            value=" {$APP.LBL_DUPLICATE_BUTTON_LABEL} "> 
     <input title="{$APP.LBL_DELETE_BUTTON_TITLE}" 
            accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" 
            class="button" 
            onclick="this.form.return_module.value='TransportBookings'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}')" 
            type="submit" 
            name="Delete" 
            value=" {$APP.LBL_DELETE_BUTTON_LABEL} ">
     <input title="export to word" class="button" type="button" onclick="window.location.href='index.php?module=TransportBookings&action=exporttoword&record={$ID}'" value=" Export to Word" />       
     <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=TransportBookings", true, false,  {$view_change_log} ); return false;' type="submit" value="View Change Log">
     
    </td>
</tr>
</table>
</form>


    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView" align="center">
    
        <tr>
            <td class="tabDetailViewDL" width="150">{$MOD.LBL_CODE} :</td>
            <td class="tabDetailViewDF">{$CODE}</td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_TRANSPORT} :</td>
            <td class="tabDetailViewDF"><a href="index.php?module=Transports&action=DetailView&record={$TRANSPORTS_ID}" class="tabDetailViewDFLink">{$TRANSPORTS}</a></td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_ADDRESS} :</td>
            <td class="tabDetailViewDF">{$ADDRESS}</td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_ATTN} :</td>
            <td class="tabDetailViewDF"><a href="index.php?module=TravelGuides&action=DetailView&record={$ATTN_TO_NAME_ID}" class="tabDetailViewDFLink">{$ATTN_TO_NAME}</a> - {$ATTN_TO_PHONE} </td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_TEL} :</td>
            <td class="tabDetailViewDF">{$TEL_TO} &nbsp;&nbsp;&nbsp;{$MOD.LBL_FAX} :&nbsp;&nbsp;  {$FAX_TO}</a></td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_FROM_CO} :</td>
            <td class="tabDetailViewDF">{$FROM_CO}</a></td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_ATTN} :</td>
            <td class="tabDetailViewDF"><a href="index.php?module=TravelGuides&action=DetailView&record={$ATTN_FROM_NAME_ID}" class="tabDetailViewDFLink">{$ATTN_FROM_NAME}</a> - {$ATTN_FROM_PHONE} </td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_EMAIL} :</td>
            <td class="tabDetailViewDF">{$EMAIL}</td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_TEL} :</td>
            <td class="tabDetailViewDF">{$TEL_FROM} &nbsp;&nbsp;&nbsp;Fax :&nbsp;&nbsp;  {$FAX_FROM}</a></td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_MADETOUR} :</td> 
            <td class="tabDetailViewDF"><a href="index.php?module=GroupPrograms&action=DetailView&record={$MADETOUR_ID}">{$MADETOUR}</a></td>
        </tr>
    </table>
</fieldset>


<!-- TransportBookings line-->
<fieldset>
 <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView" align="center">
<h1 align="center"><font size="6">{$MOD.LBL_TITLE}</font></h1>
  <tr>
    <td style="text-align: justify;" class="tabDetailViewDL">{$MOD.LBL_NAMELINE}</td>
    <td style="text-align: justify;" class="tabDetailViewDL">{$MOD.LBL_DATELINE}</td>
    <td style="text-align: justify;" class="tabDetailViewDL">{$MOD.LBL_UNITPRICELINE}</td>
    <td style="text-align: justify;" class="tabDetailViewDL">{$MOD.LBL_TYPELINE}</td>
    <td style="text-align: justify;" class="tabDetailViewDL">{$MOD.LBL_CONTENTLINE}</td>
</tr>
{$TRANSPORTSBOOKING_LINE}
</table>
</fieldset>
<fieldset>
  <table cellpadding="0" cellspacing="0" width="100%" class="tabDetailView"> 
    <tr>
        <td class="tabDetailViewDL" width="150">{$MOD.LBL_GIA} :</td>
        <td class="tabDetailViewDF">{$GIA}</td>
    </tr>
    <tr>                                
        <td align="center" colspan="2"><br><h2>Giá trên đã bao gồm thuế {$VAT}&nbsp;% VAT, phí cầu đường.</h2></td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"><b><u>{$MOD.LBL_REQUIRE} :</u></b></td>
        <td class="tabDetailViewDF">{$REQUIRE}</td>
    </tr>
    <tr> 
        <td class="tabDetailViewDL">{$MOD.LBL_CONFIRM} :</td>
        <td class="tabDetailViewDF">{$CONFIRM}</td>         
    </tr>
    <tr>
        <td class="tabDetailViewDL">{$MOD.LBL_DATE} :</td>
        <td class="tabDetailViewDF">{$DATE}</td>
    </tr>
    <tr> 
        <td class="tabDetailViewDL">{$MOD.LBL_DEADLINE} :</td>
        <td class="tabDetailViewDF">{$DEADLINE}</td>  
    </tr>
    <tr>
        <td class="tabDetailViewDL">{$MOD.LBL_OPERATOR}  :</td>
        <td class="tabDetailViewDF">{$OPERATOR}</td> 
    </tr>
  </table>
  </fieldset>
  
<!-- BEGIN: subpanel -->
<span sugar='slot23'>{$SUBPANEL}</span sugar='slot'>
<!-- END: subpanel --> 