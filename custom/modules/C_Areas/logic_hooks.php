 <?php
  $hook_version = 1;
  $hook_array = array();
  $hook_array['after_save'] = array();
  $hook_array['after_save'][] = array(1,'Create n-n Relationship with Country when import','custom/modules/C_Areas/AreasLogicHook.php','AreasLogicHook','createN2NRelationship');
?>

