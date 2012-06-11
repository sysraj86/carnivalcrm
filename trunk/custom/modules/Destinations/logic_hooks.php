<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
    $hook_version = 1; 
    $hook_array = Array(); 
    $hook_array['before_delete'][] = Array(1, 'deleteImg', 'custom/modules/Destinations/DestinationUploadHook.php','deleteImgHook', 'deleteImg'); 
    $hook_array['before_save'][] = array(1,'AutoCode','custom/include/LogicHooks/Auto_made_code.php','Autocode','Madecode');
?>