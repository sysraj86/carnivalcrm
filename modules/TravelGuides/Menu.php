<?php
    global $mod_strings, $app_strings, $sugar_config;
 
if(ACLController::checkAccess('TravelGuides', 'edit', true))$module_menu[]=Array("index.php?module=TravelGuides&action=EditView&return_module=TravelGuides&return_action=DetailView", $mod_strings['LNK_NEW_RECORD'],"CreateTravelGuides", 'TravelGuides');
if(ACLController::checkAccess('TravelGuides', 'list', true))$module_menu[]=Array("index.php?module=TravelGuides&action=index&return_module=TravelGuides&return_action=DetailView", $mod_strings['LNK_LIST'],"TravelGuides", 'TravelGuides');
if(ACLController::checkAccess('TravelGuides', 'import', true))$module_menu[]=Array("index.php?module=Import&action=Step1&import_module=TravelGuides&return_module=TravelGuides&return_action=index", $app_strings['LBL_IMPORT'],"Import", 'TravelGuides');
?>
