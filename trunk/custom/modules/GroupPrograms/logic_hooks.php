<?php
  $hook_version = 1;
    $hook_array = Array();
    $hook_array['before_save'] = Array();
    $hook_array['before_save'][] = Array(1,'updateDatetime', 'custom/modules/GroupPrograms/GroupProgramLogicHooks.php','GroupProgramLogicHooks', 'updateDatetime');  
    $hook_array['before_save'][] = Array(2,'updatechild2', 'custom/modules/GroupPrograms/GroupProgramLogicHooks.php','GroupProgramLogicHooks', 'updatechild2');  
    $hook_array['before_save'][] = Array(3,'updatechildefrom2to12', 'custom/modules/GroupPrograms/GroupProgramLogicHooks.php','GroupProgramLogicHooks', 'updatechildefrom2to12');  
    $hook_array['before_save'][] = Array(4,'updateAudlts', 'custom/modules/GroupPrograms/GroupProgramLogicHooks.php','GroupProgramLogicHooks', 'updateAudlts');
    
    $hook_array['process_record'] = Array();   
    $hook_array['process_record'][] = Array(1,'getNumOfCus', 'custom/modules/GroupPrograms/GroupProgramLogicHooks.php','GroupProgramLogicHooks', 'getNumOfCus');  
?>
