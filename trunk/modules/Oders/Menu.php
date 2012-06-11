<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('Oders', 'edit', true))$module_menu[]=Array("index.php?module=Oders&action=EditView&return_module=Oders&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateOders", 'Oders');
if(ACLController::checkAccess('Oders', 'list', true))$module_menu[]=Array("index.php?module=Oders&action=index&return_module=Oders&return_action=DetailView", $mod_strings['LNK_LIST'],"Oders", 'Oders');
if(ACLController::checkAccess('Oders', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=Oders&return_module=Oders&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'Oders');
?>
