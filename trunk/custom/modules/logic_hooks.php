<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_ui_footer'] = Array(); 
$hook_array['after_ui_footer'][] = Array(10, 'popup_onload', 'modules/SecurityGroups/AssignGroups.php','AssignGroups', 'popup_onload'); 
$hook_array['after_ui_frame'] = Array(); 
$hook_array['after_ui_frame'][] = Array(20, 'mass_assign', 'modules/SecurityGroups/AssignGroups.php','AssignGroups', 'mass_assign'); 
$hook_array['after_ui_frame'][] = Array(40, 'version_check', 'modules/SecurityGroups/VersionCheck.php','VersionCheck', 'version_check'); 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(30, 'popup_select', 'modules/SecurityGroups/AssignGroups.php','AssignGroups', 'popup_select'); 



?>