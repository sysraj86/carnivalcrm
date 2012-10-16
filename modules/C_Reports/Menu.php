<?php
    global $mod_strings, $app_strings, $sugar_config;
    if(ACLController::checkAccess('C_Reports', 'list', true))$module_menu[]=Array("index.php?module=C_Reports&action=index", $mod_strings['LNK_NEW_RECORD'], "Reports");
    $module_menu[]=Array("index.php?module=C_Reports&action=reportuseractivitives", $mod_strings['LBL_REPORT_USER_ACTIVITIVES'], "Reports");
?>
