{literal}
<style>
    .ct_sl1{
        background-color:#9FC;
    }
    .ct_sl2{
        background-color:#9FF;
    }
    .ct_sl3{
        background-color:#FFC;
    }
    .ct_sl4{
        background-color:#F9F;    
    }

    .disable{
        background:#EEEEEE;  
    }
    input{
        text-align:center;
    }
    table{
        border:1px;
        border-collapse:collapse
    }
    .tr_color{
        background-color:#CCC;
    }
</style>
{/literal}
<table width="100%" cellpadding="0" cellspacing="0" border="0">
    <form action="index.php"  name="DetailView" id="DetailView" method="post">
        <input type="hidden"   name="module"         value="Worksheets">
        <input type="hidden"   name="record"         value="{$ID}"> 
        <input type="hidden"   name="action">
        <input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
        <input type="hidden"   name="return_id"      value="{$RETURN_ID}">
        <input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
        <tr>
            <td style="padding-bottom: 2px;">
                <input title="{$APP.LBL_EDIT_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='Worksheets'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$ID}'; this.form.action.value='EditView'" 
                    type="submit" 
                    name="Edit" 
                    value="  {$APP.LBL_EDIT_BUTTON_LABEL}  "> 
                <input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='Worksheets'; this.form.return_action.value='index'; this.form.isDuplicate.value=true; this.form.action.value='EditView'" 
                    type="submit" 
                    name="Duplicate" 
                    value=" {$APP.LBL_DUPLICATE_BUTTON_LABEL} "> 
                <input title="{$APP.LBL_DELETE_BUTTON_TITLE}" 
                    accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" 
                    class="button" 
                    onclick="this.form.return_module.value='Worksheets'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}')" 
                    type="submit" 
                    name="Delete" 
                    value=" {$APP.LBL_DELETE_BUTTON_LABEL} ">
                <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Worksheets", true, false,  {$view_change_log} ); return false;' type="submit" value="View Change Log">
            </td>
        </tr>
    </form>
</table>

<table cellpadding="0" cellspacing="0" width="100%" border="0" class="tabDetailView">
    <tr>
        <td class="tabDetailViewDL">Tour code</td>
        <td class="tabDetailViewDF">
            <a href="index.php?module=Tours&action=DetailView&record={$MADETOUR_ID}" class="tabDetailViewDFLink">{$MADETOUR}</a>
        </td>
        <td class="tabDetailViewDL">Hành trình</td>
        <td class="tabDetailViewDF">{$HANHTRINH}</td>
    </tr>
    <tr>
        <td height="24" class="tabDetailViewDL">Ngày KH</td>
        <td class="tabDetailViewDF">{$NGAYKHOIHANH}</td>
        <td class="tabDetailViewDL">Ngày về</td>
        <td class="tabDetailViewDF">{$NGAYKETTHUC}</td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" class="tabDetailView" cellpadding="0" style="border-collapse:collapse">

    <tr>
        <td class="tabDetailViewDL" width="25%">Người lớn </td>
        <td class="tabDetailViewDF ct_sl1">{$NguoiLon1}</td>
        <td class="ct_sl2 tabDetailViewDF" >{$NguoiLon2}</td>
        <td class="ct_sl2 tabDetailViewDL"><strong>Số lượng FOC cho khách hàng :</strong>{$FOC_NUMBER}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL"  width="25%">Trẻ em dưới 2 tuổi</td>
        <td class="ct_sl1 tabDetailViewDF">{$TXTTREEM2TUOI1}</td>
        <td class="ct_sl2 tabDetailViewDF"> {$TXTTREEM2TUOI2}</td>
        <td class="ct_sl2 tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%"> Trẻ em từ 2- 12 tuổi</td>
        <td class="ct_sl1 tabDetailViewDF">{$TXTTREEM12TUOI1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TXTTREEM12TUOI2}</td>
        <td class="ct_sl2 tabDetailViewDL">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Số bữa ăn</td>
        <td class="ct_sl1 tabDetailViewDF">{$TXTSOBUAAN1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TXTSOBUAAN2}</td>
        <td class="ct_sl2 tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Tour Leader</td>
        <td class="ct_sl1 tabDetailViewDF">{$TXTTOURLEADER1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TXTTOURLEADER2}</td>
        <td class="ct_sl2 tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">FOC VMB</td>
        <td class="ct_sl1 tabDetailViewDF">{$TXTFOCVMB1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TXTFOCVMB2}</td>
        <td class="ct_sl2 tabDetailViewDF">&nbsp;</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">FOC Land</td>
        <td class="ct_sl1 tabDetailViewDF">{$TXTFOCLAND1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TXTFOCLAND2}</td>
        <td class="ct_sl2 tabDetailViewDF"><strong>Land 2 trẻ em:</strong>{$LAND_TREEM}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">FOC VMB nội địa</td>
        <td class="ct_sl1 tabDetailViewDF"> {$TXTFOCVMBNOIDIA1}</td>
        <td class="ct_sl2 tabDetailViewDF"> {$TXTFOCVMBNOIDIA2}</td>
        <td class="ct_sl2 tabDetailViewDF">CLTG {$TXTCLTG}  {$CURRENCY}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">Single</td>
        <td class="ct_sl1 tabDetailViewDF"> {$SINGLE1} </td>
        <td class="ct_sl2 tabDetailViewDF"> {$SINGLE1} </td>
        <td align="center" class="ct_sl2">&nbsp;</td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse: collapse;">
    <tr class="tr_color"><td colspan="11" class="tabDetailViewDF tr_color"><b>THU</b></td></tr>
    <tr>
        <td>&nbsp;</td>
        <td class="ct_sl1 tabDetailViewDF">&nbsp;</td>
        <td class="ct_sl1 tabDetailViewDF">Ks 3 Sao</td>
        <td class="ct_sl1 tabDetailViewDF">&nbsp;</td>
        <td colspan="2" align="center" class="ct_sl1 tabDetailViewDF" >KS 4 Sao</td>
        <td class="ct_sl2 tabDetailViewDF">&nbsp;</td>
        <td class="ct_sl2 tabDetailViewDF">Ks 3 Sao</td>
        <td class="ct_sl2 tabDetailViewDF">&nbsp;</td>
        <td colspan="2" align="center" class="ct_sl2 tabDetailViewDF" >Ks 4 Sao</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Người lớn</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAONGUOILON1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAONGUOILON2}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAONGUOILON3}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS4SAONGUOILON1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS4SAONGUOILON2}$</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAONGUOILON4}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAONGUOILON5}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAONGUOILON6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS4SAONGUOILON3}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS4SAONGUOILON4} $</td>

    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Phụ thu khác (+)</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOPHUTHUKHAC1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOPHUTHUKHAC2}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOPHUTHUKHAC3}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS4SAOPHUTHUKHAC1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS4SAOPHUTHUKHAC2}$</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOPHUTHUKHAC4}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOPHUTHUKHAC5}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOPHUTHUKHAC6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS4SAOPHUTHUKHAC3}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS4SAOPHUTHUKHAC4}$</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Phụ thu khác (-)</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOPHUTHUKHAC_1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOPHUTHUKHAC_2}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOPHUTHUKHAC_3}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS4SAOPHUTHUKHAC_1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS4SAOPHUTHUKHAC_2} $</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOPHUTHUKHAC_4}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOPHUTHUKHAC_5}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOPHUTHUKHAC_6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS4SAOPHUTHUKHAC_3}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS4SAOPHUTHUKHAC_4} $</td>

    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Single Supp</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOSINGLESUPP1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOSINGLESUPP2}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS3SAOSINGLESUPP3}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS4SAOSINGLESUPP1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$KS4SAOSINGLESUPP2} $</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOSINGLESUPP4}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOSINGLESUPP5}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS3SAOSINGLESUPP6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS4SAOSINGLESUPP3}</td>
        <td class="ct_sl2 tabDetailViewDF">{$KS4SAOSINGLESUPP4} $</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%"><b>Tổng thu NL</b></td>
        <td class="tabDetailViewDF ct_sl1">&nbsp;</td>
        <td class="tabDetailViewDF ct_sl1">&nbsp;</td>
        <td class="ct_sl1 tabDetailViewDF">{$TONGTHUNGUOILON1}</td>
        <td class="ct_sl1 tabDetailViewDF">&nbsp;&nbsp;&nbsp;</td>
        <td class="ct_sl1 tabDetailViewDF">{$TONGTHUNGUOILON2}</td>
        <td class="tabDetailViewDF ct_sl2">&nbsp;</td>
        <td class="tabDetailViewDF ct_sl2">&nbsp;</td>
        <td class="ct_sl2 tabDetailViewDF">{$TONGTHUNGUOILON3}</td>
        <td class="ct_sl2 tabDetailViewDF">&nbsp;</td>
        <td class="ct_sl2 tabDetailViewDF">{$TONGTHUNGUOILON4} </td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Trẻ em dưới 2 tuổi</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM2TUOI1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM2TUOI2}</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM2TUOI3}</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM2TUOI4}</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM2TUOI5} $</td>

        <td class="ct_sl2 tabDetailViewDF">{$TREEM2TUOI7}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM2TUOI8}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM2TUOI9}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM2TUOI10}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM2TUOI11} $</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Trẻ em từ 2- 12 tuổi</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM12TUOI1}</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM12TUOI2}</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM12TUOI3}</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM12TUOI4}</td>
        <td class="ct_sl1 tabDetailViewDF">{$TREEM12TUOI5} $</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM12TUOI7}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM12TUOI8}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM12TUOI9}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM12TUOI10}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TREEM12TUOI11}$</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%"><b>Tổng thu TE</b></td>
        <td class="tabDetailViewDF ct_sl1">&nbsp;</td>
        <td class="tabDetailViewDF ct_sl1">&nbsp;</td>
        <td class="ct_sl1 tabDetailViewDF">{$TONGTHUTE1}</td>
        <td class="ct_sl1 tabDetailViewDF">&nbsp;</td>
        <td class="ct_sl1 tabDetailViewDF">{$TONGTHUTE2} $</td>
        <td class="tabDetailViewDF ct_sl2">&nbsp;</td>
        <td class="tabDetailViewDF ct_sl2">&nbsp;</td>
        <td class="ct_sl2 tabDetailViewDF">{$TONGTHUTE3}</td>
        <td class="ct_sl2 tabDetailViewDF">&nbsp;</td>
        <td class="ct_sl2 tabDetailViewDF">{$TONGTHUTE4}</td>
    </tr>
</table>
<!-- Land fee  -->
<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="11" class="tabDetailViewDF"><b>CHI</b></td>
    </tr>
    <tr bgcolor="#6699FF">
        <td class="tabDetailViewDL" width="25%"><b>VẬN CHUYỂN</b></td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$TONGCHIVANCHUYEN1}</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$TONGCHIVANCHUYEN2}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">VMB người lớn</td>
        <td class="tabDetailViewDF">{$VMBNGUOILON1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBNGUOILON3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBNGUOILON4}</td>
        <td class="tabDetailViewDF">{$VMBNGUOILON5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBNGUOILON7}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBNGUOILON8}</td>

    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">TAX (TẠM TÍNH)</td>
        <td class="tabDetailViewDF">{$TAXTAMTINH1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$TAXTAMTINH3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$TAXTAMTINH4}</td>
        <td class="tabDetailViewDF">{$TAXTAMTINH5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$TAXTAMTINH7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$TAXTAMTINH8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">VMB Nội Địa người lớn</td>
        <td class="tabDetailViewDF">{$VMBNGUOILONND1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBNGUOILONND3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBNGUOILONND4}</td>
        <td class="tabDetailViewDF"> {$VMBNGUOILONND5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBNGUOILONND7}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBNGUOILONND8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">XE ĐÓN TIỄN sân bay</td>
        <td class="tabDetailViewDF">{$XEDONTIEN1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$XEDONTIEN3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$XEDONTIEN4}$</td>
        <td class="tabDetailViewDF">{$XEDONTIEN5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$XEDONTIEN7}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$XEDONTIEN8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">VMB trẻ em dưới 2 tuổi (10%)</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOI3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOI4}</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOI5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOI7}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOI8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">VMB Nội địa trẻ em dưới 2 tuổi</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOIND1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOIND3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOIND4}</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOIND5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOIND7}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBTREEM2TUOIND8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">VMB trẻ em từ 2-12 tuổi</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOI3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOI4}</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOI5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOI7}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOI8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">VMB Nội Địa trẻ em 2 - 12 tuổi</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOIND1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOIND3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOIND4}</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOIND5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOIND7}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VMBTREEM12TUOIND8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Tax trẻ em</td>
        <td class="tabDetailViewDF">{$TAXTREEM1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$TAXTREEM3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$TAXTREEM4}</td>
        <td class="tabDetailViewDF">{$TAXTREEM5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$TAXTREEM7}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$TAXTREEM8}</td>
    </tr>
</table>
<table border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0">
    <tr class="tr_color">
        <td class="tabDetailViewDL" width="25%"><b>LANDFEE PACKAGE</b></td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$SUMLANDFEEPACKAGE1}</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$SUMLANDFEEPACKAGE2}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">LANDFEE 1: 3 sao</td>
        <td class="tabDetailViewDF">{$LANFEE1_3_1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANFEE1_3_3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANFEE1_3_4}</td>
        <td class="tabDetailViewDF">{$LANFEE1_3_5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANFEE1_3_7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANFEE1_3_8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">LANDFEE 2: 3 sao</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_3_1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_3_3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_3_4}</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_3_5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_3_7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_3_8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL">LANDFEE 1: 4 sao</td>
        <td class="tabDetailViewDF">{$LANDFEE_1_4_1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE_1_4_3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE_1_4_4}</td>
        <td class="tabDetailViewDF">{$LANDFEE_1_4_5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE_1_4_7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE_1_4_8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">LANDFEE 2: 4 sao</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_4_1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_4_3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_4_4}</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_4_5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_4_7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE_2_4_8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Upgrade meal</td>
        <td class="tabDetailViewDF">{$UPGRADE_MEAL1}</td>
        <td class="tabDetailViewDF">{$UPGRADE_MEAL2}</td>
        <td class="tabDetailViewDF">{$UPGRADE_MEAL3}$</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$UPGRADE_MEAL4}</td>
        <td class="tabDetailViewDF">{$UPGRADE_MEAL5}</td>
        <td class="tabDetailViewDF">{$UPGRADE_MEAL6}</td>
        <td class="tabDetailViewDF">{$UPGRADE_MEAL7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$UPGRADE_MEAL8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Optional tour</td>
        <td class="tabDetailViewDF">{$OPTIONAL_TOUR1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$OPTIONAL_TOUR3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$OPTIONAL_TOUR4}</td>
        <td class="tabDetailViewDF">{$OPTIONAL_TOUR5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$OPTIONAL_TOUR7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$OPTIONAL_TOUR8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Single Supp</td>
        <td class="tabDetailViewDF">{$SINGLE_SUPP_1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$SINGLE_SUPP_3}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$SINGLE_SUPP_4}</td>
        <td class="tabDetailViewDF">{$SINGLE_SUPP_5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$SINGLE_SUPP_7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$SINGLE_SUPP_8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Landfee trẻ em (3 sao) - trẻ em dưới 2 tuổi</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM_2_3_SAO1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM_2_3_SAO3}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM_2_3_SAO4}</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM_2_3_SAO5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM_2_3_SAO7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM_2_3_SAO8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Landfee trẻ em (3 sao) - trẻ em từ 2-12 tuổi </td>
        <td class="tabDetailViewDF">{$LANDFEETREEM12_3SAO1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM12_3SAO3}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM12_3SAO4}</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM12_3SAO5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM12_3SAO7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEETREEM12_3SAO8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%"><p>Landfee trẻ em (4 sao) - trẻ em dưới 2 tuổi</p></td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM2TUOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM2TUOI3}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM2TUOI4}</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM2TUOI5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM2TUOI7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM2TUOI8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Landfee trẻ em (4 sao) - trẻ em từ 2-12 tuổi</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM12TUOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM12TUOI3}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM12TUOI4}</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM12TUOI5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM12TUOI7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LANDFEE4SAO_TREEM12TUOI8}</td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" width="100%" border="1" style="border-collapse: collapse;" class="tabDetailView">
    <tr class="tr_color">
        <td class="tabDetailViewDL"><b>VISA</b></td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$SUMVISA1}</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$SUMVISA2}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%"><b>Visa (Thủ tục thông hành)</b></td>
        <td class="tabDetailViewDF">{$VISATHONGHANH1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VISATHONGHANH3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISATHONGHANH4}</td>
        <td class="tabDetailViewDF">{$VISATHONGHANH5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VISATHONGHANH7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISATHONGHANH8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Dịch thuật, công chứng hồ sơ</td>
        <td class="tabDetailViewDF">{$VISADICHTHUAT1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VISADICHTHUAT3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISADICHTHUAT4}</td>
        <td class="tabDetailViewDF">{$VISADICHTHUAT5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VISADICHTHUAT7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISADICHTHUAT8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Phí chuyển phát hồ sơ</td>
        <td class="tabDetailViewDF">{$PHICHUYENPHATHOSO1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$PHICHUYENPHATHOSO3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$PHICHUYENPHATHOSO4}</td>
        <td class="tabDetailViewDF">{$PHICHUYENPHATHOSO5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$PHICHUYENPHATHOSO7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$PHICHUYENPHATHOSO8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Phí thu mới</td>
        <td class="tabDetailViewDF">{$PHITHUMOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$PHITHUMOI3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$PHITHUMOI4}</td>
        <td class="tabDetailViewDF">{$PHITHUMOI5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$PHITHUMOI7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$PHITHUMOI8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Phí Visa trẻ em dưới 2 tuổi</td>
        <td class="tabDetailViewDF">{$VISATREEM2TUOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VISATREEM2TUOI3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISATREEM2TUOI4}</td>
        <td class="tabDetailViewDF">{$VISATREEM2TUOI5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VISATREEM2TUOI7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISATREEM2TUOI8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Phí Visa trẻ em từ 2 - 12 tuổi</td>
        <td class="tabDetailViewDF">{$VISATREEM12TUOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VISATREEM12TUOI3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISATREEM12TUOI4}</td>
        <td class="tabDetailViewDF">{$VISATREEM12TUOI5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$VISATREEM12TUOI7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISATREEM12TUOI8}</td>
    </tr>
</table>

<table class="tabDetailView" border="1" style="border-collapse: collapse;" width="100%" cellpadding="0" cellspacing="0">
  <tr class="tr_color">
        <td class="tabDetailViewDL" width="25%"><b>HƯỚNG DẪN VIÊN</b></td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$SUMGUIDE1}</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$SUMGUIDE2}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Tour leader</td>
        <td class="tabDetailViewDF">{$TOUR_LEADER1}</td>
        <td class="tabDetailViewDF">{$TOUR_LEADER2}</td>
        <td class="tabDetailViewDF">{$TOUR_LEADER3}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$TOUR_LEADER4}</td>
        <td class="tabDetailViewDF">{$TOUR_LEADER5}</td>
        <td class="tabDetailViewDF">{$TOUR_LEADER6}</td>
        <td class="tabDetailViewDF">{$TOUR_LEADER7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$TOUR_LEADER8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Chi phí khác</td>
        <td class="tabDetailViewDF">{$CHIPHIKHAC1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$CHIPHIKHAC3}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$CHIPHIKHAC4}</td>
        <td class="tabDetailViewDF">{$CHIPHIKHAC5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$CHIPHIKHAC7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$CHIPHIKHAC8}</td>
    </tr>
</table>

<table width="100%" cellpadding="0" cellspacing="0" class="tabDetailView" border="1" style="border-collapse: collapse;">
    <tr class="tr_color">
        <td class="tabDetailViewDL" width="25%"><b>DỊCH VỤ KHÁC</b></td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$SUMOTHERSERVICE1}</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">&nbsp;</td>
        <td class="tabDetailViewDF tr_color">{$SUMOTHERSERVICE2}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Bảo hiểm</td>
        <td class="tabDetailViewDF">{$BAOHIEM1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$BAOHIEM3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$BAOHIEM4}</td>
        <td class="tabDetailViewDF">{$BAOHIEM5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$BAOHIEM7}</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$BAOHIEM8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Bảo hiểm trẻ em dưới 2 tuổi</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM2TUOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM2TUOI3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM2TUOI4}</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM2TUOI5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM2TUOI7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM2TUOI8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Bảo hiểm trẻ em từ 2 - 12 tuổi</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM12TUOI1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM12TUOI3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM12TUOI4}</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM12TUOI4}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM12TUOI5} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$BAOHIEMTREEM12TUOI8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Tip</td>
        <td class="tabDetailViewDF">{$VISATIP1}</td>
        <td class="tabDetailViewDF">{$VISATIP2}</td>
        <td class="tabDetailViewDF">{$VISATIP3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISATIP4}</td>
        <td class="tabDetailViewDF">{$VISATIP5}</td>
        <td class="tabDetailViewDF">{$VISATIP6}</td>
        <td class="tabDetailViewDF">{$VISATIP7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$VISATIP8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%"><b> QUÀ TẶNG</b></td>
        <td class="tabDetailViewDF">{$QUATANG1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$QUATANG3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$QUATANG4}</td>
        <td class="tabDetailViewDF">{$QUATANG5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$QUATANG7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$QUATANG8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Land 2</td>
        <td class="tabDetailViewDF">{$LAND2_1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LAND2_3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LAND2_4}</td>
        <td class="tabDetailViewDF">{$LAND2_5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$LAND2_7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$LAND2_8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">CPK</td>
        <td class="tabDetailViewDF">{$CPK1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$CPK3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$CPK4}</td>
        <td class="tabDetailViewDF">{$CPK5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$CPK7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$CPK8}</td>
    </tr>
    <tr>
        <td class="tabDetailViewDL" width="25%">Chênh lệch tỷ giá</td>
        <td class="tabDetailViewDF">{$CHENHLECHTYGIA1}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$CHENHLECHTYGIA3} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$CHENHLECHTYGIA4}</td>
        <td class="tabDetailViewDF">{$CHENHLECHTYGIA5}</td>
        <td class="tabDetailViewDF">X</td>
        <td class="tabDetailViewDF">{$CHENHLECHTYGIA7} $</td>
        <td class="tabDetailViewDF">=</td>
        <td class="tabDetailViewDF">{$CHENHLECHTYGIA8}</td>
    </tr>
</table>

<table cellpadding="0" cellspacing="0" border="1" style="border-collapse: collapse;" width="100%" class="tabDetailView">
    <tr>
        <td>&nbsp;</td>
        <td colspan="2" align="center" class="ct_sl1 tabDetailViewDF">DƯỚI 2 TUỔI</td>
        <td colspan="2" align="center" class="ct_sl1 tabDetailViewDF">TỪ 2-12 TUỔI</td>
        <td colspan="2" align="center" class="ct_sl1 tabDetailViewDF">NGƯỜI LỚN</td>
        <td colspan="2" align="center" class="ct_sl2 tabDetailViewDF">DƯỚI 2 TUỔI</td>
        <td colspan="2" align="center" class="ct_sl2 tabDetailViewDF">TỪ 2-12 TUỔI</td>
        <td colspan="2" align="center" class="ct_sl2 tabDetailViewDF">NGƯỜI LỚN</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="center" class="ct_sl1 tabDetailViewDF">Ks 3*</td>
        <td align="center" class="ct_sl1 tabDetailViewDF">Ks 4*</td>
        <td align="center" class="ct_sl1 tabDetailViewDF">Ks 3*</td>
        <td align="center" class="ct_sl1 tabDetailViewDF">Ks 4*</td>
        <td align="center" class="ct_sl1 tabDetailViewDF">Ks 3*</td>
        <td align="center" class="ct_sl1 tabDetailViewDF">Ks 4*</td>
        <td align="center" class="ct_sl2 tabDetailViewDF">Ks 3*</td>
        <td align="center" class="ct_sl2 tabDetailViewDF">Ks 4*</td>
        <td align="center" class="ct_sl2 tabDetailViewDF">Ks 3*</td>
        <td align="center" class="ct_sl2 tabDetailViewDF">Ks 4*</td>
        <td align="center" class="ct_sl2 tabDetailViewDF">Ks 3*</td>
        <td align="center" class="ct_sl2 tabDetailViewDF">Ks 4*</td>
    </tr>
    <tr>
        <td width="25%" class="ct_sl3 tabDetailViewDL">TỔNG CHI</td>
        <td  class="ct_sl2 tabDetailViewDF">{$TONGCHI1}</td>
        <td  class="ct_sl2 tabDetailViewDF">{$TONGCHI2}</td>
        <td  class="ct_sl3 tabDetailViewDF">{$TONGCHI3}</td>
        <td  class="ct_sl3 tabDetailViewDF">{$TONGCHI4}</td>
        <td  class="ct_sl3 tabDetailViewDF">{$TONGCHI5}</td>
        <td  class="ct_sl3 tabDetailViewDF">{$TONGCHI6}</td>
        <td  class="ct_sl2 tabDetailViewDF">{$TONGCHI7}</td>
        <td  class="ct_sl2 tabDetailViewDF">{$TONGCHI8}</td>
        <td  class="ct_sl3 tabDetailViewDF">{$TONGCHI9}</td>
        <td  class="ct_sl3 tabDetailViewDF">{$TONGCHI10}</td>
        <td  class="ct_sl3 tabDetailViewDF">{$TONGCHI11}</td>
        <td  class="ct_sl3 tabDetailViewDF">{$TONGCHI12}</td>
    </tr>
    <tr>
        <td width="25%" class="ct_sl3 tabDetailViewDL">GIÁ NET</td>
        <td class="ct_sl2 tabDetailViewDF">{$GIANET1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$GIANET2}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIANET3}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIANET4}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIANET5}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIANET6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$GIANET7}</td>
        <td class="ct_sl2 tabDetailViewDF">{$GIANET8}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIANET9}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIANET10}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIANET11}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIANET12}</td>
    </tr>
    <tr>
        <td width="25%" class="ct_sl3 tabDetailViewDL">GIÁ BÁN</td>
        <td class="ct_sl2 tabDetailViewDF">{$GIABAN1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$GIABAN2}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIABAN3}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIABAN4}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIABAN5}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIABAN6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$GIABAN7}</td>
        <td class="ct_sl2 tabDetailViewDF">{$GIABAN8}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIABAN9}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIABAN10}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIABAN11}</td>
        <td class="ct_sl3 tabDetailViewDF">{$GIABAN12}</td>
    </tr>
    <tr>
        <td width="25%" class="ct_sl3 tabDetailViewDL">LÃI/KHÁCH</td>
        <td class="ct_sl2 tabDetailViewDF">{$LAIKHACH1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$LAIKHACH2}</td>
        <td class="ct_sl3 tabDetailViewDF">{$LAIKHACH3}</td>
        <td class="ct_sl3 tabDetailViewDF">{$LAIKHACH4}</td>
        <td class="ct_sl3 tabDetailViewDF">{$LAIKHACH5}</td>
        <td class="ct_sl3 tabDetailViewDF">{$LAIKHACH6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$LAIKHACH7}</td>
        <td class="ct_sl2 tabDetailViewDF">{$LAIKHACH8}</td>
        <td class="ct_sl3 tabDetailViewDF">{$LAIKHACH9}</td>
        <td class="ct_sl3 tabDetailViewDF">{$LAIKHACH10}</td>
        <td class="ct_sl3 tabDetailViewDF">{$LAIKHACH11}</td>
        <td class="ct_sl3 tabDetailViewDF">{$LAIKHACH12}</td>
    </tr>
    <tr>
        <td width="25%" class="ct_sl3 tabDetailViewDL">TỔNG LÃI</td>
        <td class="ct_sl2 tabDetailViewDF">{$TONGLAI1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TONGLAI2}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TONGLAI3}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TONGLAI4}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TONGLAI5}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TONGLAI6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TONGLAI7}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TONGLAI8}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TONGLAI9}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TONGLAI10}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TONGLAI11}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TONGLAI12}</td>
    </tr>
    <tr>
        <td width="25%" class="ct_sl3 tabDetailViewDL">TỶ LỆ</td>
        <td class="ct_sl2 tabDetailViewDF">{$TYLE1}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TYLE2}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TYLE3}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TYLE4}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TYLE5}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TYLE6}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TYLE7}</td>
        <td class="ct_sl2 tabDetailViewDF">{$TYLE8}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TYLE9}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TYLE10}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TYLE11}</td>
        <td class="ct_sl3 tabDetailViewDF">{$TYLE12}</td>
    </tr>
</table>