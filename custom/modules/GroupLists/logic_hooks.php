<?php
  $hook_version = 1;
    $hook_array = Array();
    $hook_array['before_save'] = Array();
    $hook_array['before_save'][] = array(1,'AutoCode','custom/include/LogicHooks/Auto_made_code.php','Autocode','Madecode');
    $hook_array['before_save'][] = Array(2,'updateDateTime', 'custom/modules/GroupLists/GroupListLogicHook.php','GroupListLogicHook', 'updateDateTime');  
    $hook_array['before_save'][] = Array(3,'updateAge', 'custom/modules/GroupLists/GroupListLogicHook.php','GroupListLogicHook', 'updateAge');  
    $hook_array['after_retrieve'][] = Array(1,'getnumofcus', 'custom/modules/GroupLists/GroupListLogicHook.php','GroupListLogicHook', 'updateNumberOfCusomer');  
?>
