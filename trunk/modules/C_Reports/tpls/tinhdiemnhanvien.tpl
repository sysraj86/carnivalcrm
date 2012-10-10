<html>
<head>
<title></title>
{literal} 
<link rel="stylesheet" type="text/css" href="modules/C_Reports/css/report.css">
<script type="text/javascript" src="custom/include/js/jquery.js"></script>
<script type="text/javascript" src="custom/include/js/CustomDatePicker.js"></script>
<script type="text/javascript" src="custom/include/js/CustomSelectField.js"></script>
<script type="text/javascript" src="modules/C_Reports/js/tinhdiemnhanvien.js"></script>

{/literal}
</head>
<body>
<h3><b>{$MOD.LBL_SALE_SCORE}</b> </h3>
<br>
<form id="EditView" name="EditView" action="index.php" method="get">
    <input type="hidden" name="module" value="{$CURRENT_MODULE}">
    <input type="hidden" name="action" value="tinhdiemnhanvien"/>
    
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;" class="tabForm">
     <tr>
            <td colspan="10" class="label"> 
                <b>{$MOD.LBL_TITLE} : </b>
            </td>
     </tr>
     <tr>
     <td style="text-align: right;">{$MOD.LBL_SALE_MAN} :<input type="checkbox" name="check_sale_man" id="check_sale_man" {$CHECK_SALE_MAN}></td>
     <td style="display: none;" class="dataField">
        <input type="text" name="sale_man" id="sale_man" value="{$SALE_MAN}">
        <input type="hidden" data="Button=cleardata,selectdata|Module=Users|Fields=id,name|Inputs=sale_man_id,sale_man" class="select" value="{$SALE_MAN_ID}" name="sale_man_id" id="sale_man_id">
     </td>
     <td style="text-align: right;">{$MOD.LBL_DEPARTMENT} :</td>
     <td class="dataField"><select name="department" id="department">{$DEPARTMENT}</select></td>
     <td style="text-align: right;">{$MOD.LBL_KY} :</td>
     <td class="dataField"><select name="ky" id="ky">{$KY}</select></td>
     <td style="text-align: right;">{$MOD.LBL_THANG} :</td>
     <td class="dataField"><select name="thang" id="thang">{$THANG}</select></td>
     <td style="text-align: right;">{$MOD.LBL_NAM} :</td>
     <td class="dataField"><input type="text" name="nam" id="nam" value="{$NAM}"></td>
     </tr>
     <tr>
        <td colspan="10" align="center">
            <input type="submit" name="tinhdiemsales" id="tinhdiemsales" value="{$MOD.LBL_TINH_DIEM_SALES}">
            <input type="submit" name="tinhdiemtelesales" id="tinhdiemtelesales" value="{$MOD.LBL_TINH_DIEM_TELESALES}">
            <input type="submit" name="xephangsales" id="xephangsales" value="{$MOD.LBL_XEP_HANG_SALES}">
            <input type="submit" name="xephangtelesales" id="xephangtelesales" value="{$MOD.LBL_XEP_HANG_TELESALES}">
            <input style="display: none;" type="submit" name="tinhdiem" id="tinhdiem" value="{$MOD.LBL_TINH_DIEM}">
            <input style="display: none;" type="submit" name="xephang" id="xephang" value="{$MOD.LBL_XEP_HANG}">
        </td>
    </tr>
    </table>
    
<h4><b>{$MOD.LBL_KETQUA}: {$TYPE_CALCULATE}</b></h4>     
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;" class="tabForm">
        <thead>
        {if $TYPE_VALUE eq 1}
        <tr align="center">           
            <td rowspan="2" class="head"><b>{$MOD.LBL_STT}</b></td>
            <td rowspan="2" class="head"><b>{$MOD.LBL_SALE_NAME}</b></td>
            <td rowspan="2" class="head"><b>{$MOD.LBL_PHONGBAN}</b></td>
            <td colspan="2" class="head"><b>{$MOD.LBL_LIST}</b></td>
            <td colspan="2" class="head"><b>{$MOD.LBL_LEADS}</b></td>
            <td colspan="2" class="head"><b>{$MOD.LBL_ACCOUNT}</b></td>
            <td colspan="2" class="head"><b>{$MOD.LBL_SUCCESS}</b></td>
            <td rowspan="2" class="head"><b>{$MOD.LBL_TOTAL}</b></td>
        {if $RATE eq 1} 
            <td rowspan="2" class="head"><b>{$MOD.LBL_RAKING}</b></td>
        {/if}
        </tr>
        <tr align="center">
            <td class="head"><b>{$MOD.LBL_QUANTITY}</b></td>
            <td class="head"><b>{$MOD.LBL_SCORE}</b></td>
            <td class="head"><b>{$MOD.LBL_QUANTITY}</b></td>
            <td class="head"><b>{$MOD.LBL_SCORE}</b></td>
            <td class="head"><b>{$MOD.LBL_QUANTITY}</b></td>
            <td class="head"><b>{$MOD.LBL_SCORE}</b></td>
            <td class="head"><b>{$MOD.LBL_QUANTITY}</b></td>
            <td class="head"><b>{$MOD.LBL_SCORE}</b></td>
        </tr>
        {/if}
        {if $TYPE_VALUE eq 2}
        <tr align="center">           
            <td rowspan="2" class="head"><b>{$MOD.LBL_STT}</b></td>
            <td rowspan="2" class="head"><b>{$MOD.LBL_SALE_NAME}</b></td>
            <td rowspan="2" class="head"><b>{$MOD.LBL_PHONGBAN}</b></td>
            <td colspan="2" class="head"><b>{$MOD.LBL_ACCOUNT}</b></td>
            <td colspan="2" class="head"><b>{$MOD.LBL_SUCCESS}</b></td>
            <td colspan="5" class="head"><b>{$MOD.LBL_CUSTOMERS}</b></td>
            <td rowspan="2" class="head"><b>{$MOD.LBL_TOTAL}</b></td>
        {if $RATE eq 1} 
            <td rowspan="2" class="head"><b>{$MOD.LBL_RAKING}</b></td>
        {/if}
        </tr>
        <tr align="center">
            <td class="head"><b>{$MOD.LBL_QUANTITY}</b></td>
            <td class="head"><b>{$MOD.LBL_SCORE}</b></td>
            <td class="head"><b>{$MOD.LBL_QUANTITY}</b></td>
            <td class="head"><b>{$MOD.LBL_SCORE}</b></td>
            <td class="head"><b>{$MOD.LBL_KHACHCU}</b></td>
            <td class="head"><b>{$MOD.LBL_KHACHMOI}</b></td>
            <td class="head"><b>{$MOD.LBL_TYLE}</b></td>
            <td class="head"><b>{$MOD.LBL_SCORE2}</b></td>
            <td class="head"><b>{$MOD.LBL_SCOREx2}</b></td>
        </tr>
        {/if}
     </thead>
     <tbody>
        <!--<tr style="background-color: #FFE4B5; height: 30px;">
            <td class="line">1</td>
            <td class="line">Lê Gia Thành</td>
            <td class="line">Sale</td>
            <td class="line">100</td>
            <td class="line">100</td>
            <td class="line">25</td>
            <td class="line">75</td>
            <td class="line">2</td>
            <td class="line">50</td>
            <td class="line">1</td>
            <td class="line">500</td>
            <td class="line">500</td>
            <td class="line">1000</td>
        </tr>
        <tr style="background-color: #F5FFFA; height: 30px;">
            <td class="line">1</td>
            <td class="line">Lê Gia Thành</td>
            <td class="line">Sale</td>
            <td class="line">100</td>
            <td class="line">100</td>
            <td class="line">25</td>
            <td class="line">75</td>
            <td class="line">2</td>
            <td class="line">50</td>
            <td class="line">1</td>
            <td class="line">500</td>
            <td class="line">500</td>
            <td class="line">1000</td>
        </tr>-->
        {$KETQUA}
     </tbody>
         
    </table>
    <!-- {if $COUNT neq 0} 
            {$PAGINGATION}      -->
     {/if}
</form>     
</body>
</html>