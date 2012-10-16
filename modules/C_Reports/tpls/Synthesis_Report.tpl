<html>
    <head>
        <title></title>
         
        {literal}
        
        <link rel="stylesheet" type="text/css" href="modules/C_Reports/css/reportStyle.css">|
        <script type="text/javascript" src="custom/include/js/jquery.js"></script>
        <script type="text/javascript" src="custom/include/js/jquery.min.js"></script>
        <script type="text/javascript" src="custom/include/js/CustomDatePicker.js"></script>
        <script type="text/javascript" src="modules/C_Reports/js/Reports.js"></script>
        {/literal}
    </head>
    <body>
        <form action="index.php" method="post" id="frmForm">
            <table cellpadding="0" cellspacing="0" width="100%" border="1" style="border-collapse: collapse;">
                <tr>
                    <td class="dataLabel">
                        <input type="hidden" name="module"  value="C_Reports"/>
                        <input type="hidden" name="action"  value="synthesis_report" />
                        <input type="hidden" name="type" id="type" value="{$TYPE}"/>
                        <input type="hidden" name="report_option" id="report_option" value="{$report_option}"/>
                    </td>
                </tr> 
                <tr>
                    <td class="dataLabel" ><h3 align="center">{$MOD.LBL_SYNTHESIS_REPORT}</h3></td>
                </tr> 
                <tr>
                    <td class="dataLabel"><b>{$MOD.LBL_REPORT_OPTION}</b></td>
                </tr> 
                
                <tr>
                    <td valign="top" class="dataField">
                        <input type="hidden" name="report_option" id="person_id"  value="person" class="report_option" {$PERSON_CHECK}/>{$MOD.LBL_SALE_PERSON}&nbsp; 
                        <span class="required">*</span>
                    </td>
                </tr>
            
                <!--<tr class="group_option" style="display: none;">
                <td class="dataField" >
                <select name="list_group[]" id="list_group" multiple="multiple" size="5" >{$GROUP_OPTION}</select>
                </td>
                <tr class="person_option" style="display: none;">
                <td class="dataField">
                <select name="user_ids[]" id="user_ids" multiple="multiple" size="5">{$USER_ID}</select>
                </td>
                </tr>-->
                <tr>
                    <td class="dataField">
                        <select name="lst_user[]" multiple="multiple" id="lst_user" class="lst_user">{$lst_user}</select>
                    </td>
                </tr>
                <tr>
                    <td class="dataField">
                        <b>{$MOD.LBL_REPORT_FILTER} <span class="required">*</span></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input onclick="clear_sel('start_end_yes')" type="radio" name="time_range" class="time_range" tabindex="108" id="today" size="" value="today"   > Today   
                        <input onclick="clear_sel('start_end_yes')" type="radio" name="time_range" class="time_range" tabindex="108" id="yesterday" size="" value="yesterday"> Yesterday
                        <input onclick="clear_sel('start_end_yes')" type="radio" name="time_range" class="time_range" tabindex="108" id="thisweek" size="" value="thisweek"> This week
                        <input onclick="clear_sel('start_end_yes')" type="radio" name="time_range" class="time_range" tabindex="108" id="lastweek" size="" value="lastweek"> Last week
                        <input onclick="clear_sel('start_end_yes')" type="radio" name="time_range" class="time_range" tabindex="108" id="thismonth" size="" value="thismonth"> This month
                        <input onclick="clear_sel('start_end_yes')" type="radio" name="time_range" class="time_range" tabindex="108" id="lastmonth" size="" value="lastmonth"> Last month
                        <br/>  <br />
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Or &nbsp;<input onclick="clear_sel('time_range')" class="time_range" type="checkbox" name="start_end_yes" tabindex="108" id="start_end_yes" size="" value="1">
                        <b>{$MOD.LBL_START_DATE}</b> &nbsp;&nbsp;
                        <input autocomplete="off" type="text" name="start_date" id="start_date"  value="{$start_date}" title='' tabindex='1' size="11" maxlengtd="10" class="datePicker">
                        <input  name="date_format" id="date_format" type="hidden"  value="{$date_format}">
                        <b>{$MOD.LBL_END_DATE}</b>&nbsp;&nbsp;
                        <input autocomplete="off" type="text" name="end_date" id="end_date"  value="{$end_date}" title='' tabindex='1' size="11" maxlengtd="10" class="datePicker">
                    </td>
                </tr>
                <tr>
                    <td class="dataLabel"><div id="warning"></div></td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" name="submit" value="{$MOD.LBL_BUTTON_REPORT}"></td>
                </tr>                                                                                                       
            </table>
        </form>
        <div>
            {$CONTENT}
        </div>
    </body>
</html>