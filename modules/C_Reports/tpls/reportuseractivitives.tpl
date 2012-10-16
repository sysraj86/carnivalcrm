<html>
    <head>
        <title></title>
        {literal}
        <link rel="stylesheet" type="text/css" href="modules/C_Reports/css/reportStyle.css"> 
        <script type="text/javascript" src="custom/include/js/jquery.js"></script>
        <script type="text/javascript" src="custom/include/js/CustomDatePicker.js"></script>
        <script type="text/javascript" src="modules/C_Reports/js/clear_form.js"></script>

        {/literal}
    </head>
    <body>
        <hr class="horizontal_line"/>
        <form action="index.php" id="frmForm" name="frmForm" method="post">
             <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td>
                        <input type="hidden" name="module"  value="C_Reports"/>
                        <input type="hidden" name="action"  value="reportuseractivitives" />
                    </td>
                </tr>
                <tr>
                    <td colspan="9">
                       <h1 align="center" class="report_title"> {$MOD.LBL_REPORT_USER_ACTIVITIVES} </h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="9">
                       <h1> {$MOD.LBL_REPORT_OPTION} </h1>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="dataLabel">{$MOD.LBL_START}</td>
                    <td>
                        <input autocomplete="off" type="text" name="start_date" id="start_date" value="{$START_DATE}" size="11" maxlengtd="10" class="datePicker">
                    </td>
                    <td class="dataLabel">{$MOD.LBL_END}</td>
                    <td>
                        <input autocomplete="off" type="text" name="end_date" id="end_date" value="{$END_DATE}" size="11" maxlengtd="10" class="datePicker">
                    </td>
                    <td class="dataLabel">{$MOD.LBL_DEPARTMENT}</td>
                    <td>
                        <select autocomplete="off" multiple="multiple" name="department[]" id="department">{$DEPARTMENT}</select>
                    </td>
                    <td class="dataLabel">{$MOD.LBL_USER}</td>
                    <td>
                        <select autocomplete="off" multiple="multiple" name="user_id[]" id="user_id">{$USER_ID}</select>
                    </td>
                    <!--<td class="dataLabel">{$MOD.LBL_USER}</td>
                    <td>
                        <input type="text" data="Button=cleardata,selectdata|Module=Users|Fields=id,last_name|Inputs=user_id,user" class="select" value="{$USER}" id="user" name="user">
                        <input type="hidden" id="user_id" name="user_id" value="{$USER_ID}">
                    </td>--> 
                    <td align="right"><input type="submit"  name="submit_report" value="{$MOD.LBL_BUTTON_REPORT}">
                    <input type="button"  name="clear_from" onclick="clearForm(this.form)" value="{$MOD.LBL_CLEAR_BUTTON}">
                    </td>
                </tr>
            </table>
            
        
        <hr class="horizontal_line"/>
            {$RESULT}
            
            </form>
    </body>
</html>
