<?php
  $hook_version = 1;
    $hook_array = Array();
    $hook_array['before_save'] = Array();
    $hook_array['before_save'][] = Array(1,'updateCode', 'custom/modules/Worksheets/WorksheetLogicHook.php','WorksheetLogicHook', 'updateCode');  
    $hook_array['process_record'][] = Array();  
    $hook_array['process_record'][] = Array(2,'outboutTourName','custom/modules/Worksheets/WorksheetLogicHook.php','WorksheetLogicHook', 'outboutTourName');  
?>
