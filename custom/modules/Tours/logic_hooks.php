  <?php
  $hook_version = 1;
  $hook_array = array();
  $hook_array['before_save'] = array();
  $hook_array['before_save'][] = array(1,'UpdateTransport','custom/modules/Tours/UpdateTransport.php','UpdateTransport','transport');        
  $hook_array['before_save'][] = array(1,'UpdateDestination','custom/modules/Tours/UpdateTransport.php','UpdateTransport','destination');        
?>
