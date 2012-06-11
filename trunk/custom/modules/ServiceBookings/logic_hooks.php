 <?php
$hook_version = 1;
$hook_array = Array();
$hook_array['before_save'] = Array();
$hook_array['process_record'] = Array();
$hook_array['before_save'][] = array(1,'AutoCode','custom/include/LogicHooks/Auto_made_code.php','Autocode','Madecode');
$hook_array['process_record'][] = array(1,'BookingDeadlineAuto','custom/include/LogicHooks/Process.php','ProcessList','bookingDeadlineAuto');
?>