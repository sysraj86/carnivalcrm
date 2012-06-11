<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/ServiceBookings/ServiceBookings.php');
require_once('include/formbase.php');
require_once('modules/ServiceBookingsLine/ServiceBookingsLine.php');
include("config.php");
global $sugar_config,$mod_strings;
$focus = new ServiceBookings();

$focus->retrieve($_POST['record']);

if(!$focus->ACLAccess('Save')){
        ACLController::displayNoAccess(true);
        sugar_cleanup(true);
}
if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
    $check_notify = TRUE;
}else{
    $check_notify = FALSE;
}

foreach($focus->column_fields as $field){
    if(isset($_POST[$field])){
        $value = $_POST[$field];
        $focus->$field = $value;
    }
}

foreach($focus->additional_column_fields as $field){
    if(isset($_POST[$field])){
        $value = $_POST[$field];
        $focus->$field = $value;
    }
}

$focus->name = $mod_strings['LBL_NAME_FIRST'].'_'.$focus->services_seebookings_name;

$focus->save($check_notify); 

$return_id = $focus->id;
$deleted_count = 0;
$servicebookings_line =  array(
    'id'        => $_POST['service_line_id'],
    'deleted'   => $_POST['deleted'],
    'service'   => $_POST['service'],
    'quantity'  => $_POST['quantity'],
    'price'     => $_POST['price'],
    'content'   => $_POST['content'],
);
$servicebookings_line_count   = count($servicebookings_line['id']);

for($i =0 ; $i <$servicebookings_line_count; $i++){
    $deleted = $servicebookings_line['deleted'][$deleted_count];
    if( 
    ($servicebookings_line['service'][$i]   == '' || $servicebookings_line['service'][$i]   == '0') &&
    ($servicebookings_line['quantity'][$i]  == '' || $servicebookings_line['quantity'][$i]  == '0') &&
    ($servicebookings_line['price'][$i]     == '' || $servicebookings_line['price'][$i]     == '0') &&
    ($servicebookings_line['content'][$i]   == '' || $servicebookings_line['content'][$i]   == '0'))
    {
       $deleted = 1; 
    }
    $servicebookinglines = new ServiceBookingsLine();
    $servicebookinglines ->id                   = $servicebookings_line['id'][$i];
    $servicebookinglines ->deleted              = $deleted;
    $servicebookinglines ->service              = $servicebookings_line['service'][$i];
    $servicebookinglines ->quantity             = $servicebookings_line['quantity'][$i];
    $servicebookinglines ->price                = $servicebookings_line['price'][$i];
    $servicebookinglines ->content              = $servicebookings_line['content'][$i];
    $servicebookinglines ->servicebooking_id    = $return_id;
    if($servicebookinglines ->deleted == 1){
        $servicebookinglines->mark_deleted($roombookinglines->id);
    }
    else{
        $servicebookinglines->save();
    }
    $deleted_count++;
}

handleRedirect($return_id,'ServiceBookings');  
?>
