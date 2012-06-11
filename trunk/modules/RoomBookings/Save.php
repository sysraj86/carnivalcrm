<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/RoomBookings/RoomBookings.php');
require_once('include/formbase.php');
require_once('modules/RoomBookingsLine/RoomBookingsLine.php');
require_once('modules/RoomBookingsSevice/RoomBookingsSevice.php');
include("config.php");
global $sugar_config,$mod_strings;
$focus = new RoomBookings();

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

$focus->name = $mod_strings['LBL_NAME_FIRST'].'_'.$focus->hotels_roombookings_name;

$focus->save($check_notify); 

$return_id = $focus->id;
$deleted_count = 0;
// Save RoombookingsLine
$roombookings_line =  array(
    'id'        => $_POST['roombooking_line_id'],
    'deleted'   => $_POST['deleted'],
    'type'      => $_POST['type'],
    'quantity'  => $_POST['quantity'],
    'price'     => $_POST['price'],
    'currency'  => $_POST['currency'],
    'check_in'  => $_POST['check_in'],
    'check_out' => $_POST['check_out'],
);
$roombookings_line_count   = count($roombookings_line['id']);

for($i =0 ; $i <$roombookings_line_count; $i++){
    $deleted = $roombookings_line['deleted'][$deleted_count];    
    if( ($roombookings_line['type'][$i]         == '' || $roombookings_line['type'][$i]         == '0')  &&
        ($roombookings_line['quantity'][$i]     == '' || $roombookings_line['quantity'][$i]     == '0')  &&
        ($roombookings_line['price'][$i]        == '' || $roombookings_line['price'][$i]        == '0')  &&
        ($roombookings_line['currency'][$i]     == '' || $roombookings_line['currency'][$i]     == '0')  &&
        ($roombookings_line['check_in'][$i]     == '' || $roombookings_line['check_in'][$i]     == '0')  &&
        ($roombookings_line['check_out'][$i]    == '' || $roombookings_line['check_out'][$i]    == '0'))
    {
        $deleted = 1;
    }
    $roombookinglines = new RoomBookingsLine();
    $roombookinglines ->id = $roombookings_line['id'][$i];
    $roombookinglines ->deleted = $deleted;
    $roombookinglines ->type = $roombookings_line['type'][$i];
    $roombookinglines ->quantity = $roombookings_line['quantity'][$i];    
    $roombookinglines ->price = $roombookings_line['price'][$i];
    $roombookinglines ->currency = $roombookings_line['currency'][$i];
    $roombookinglines ->check_in = $roombookings_line['check_in'][$i];
    $roombookinglines ->check_out = $roombookings_line['check_out'][$i];
    $roombookinglines ->roombooking_id = $return_id;
    if($roombookinglines ->deleted == 1){
        $roombookinglines->mark_deleted($roombookinglines->id);
    }
    else{
        $roombookinglines->save();
    }
    $deleted_count++;
}


// Save Service

$Service =  array(
    'id'    => $_POST['service_id'],
    'deleted'   => $_POST['deleted'],
    'service'      => $_POST['service'],
);
$Service_count   = count($Service['id']);

for($i =0 ; $i <$Service_count; $i++){
    $deleted = $Service['deleted'][$deleted_count];
    if($Service['service'][$i] == '' || $Service['service'][$i] == '0')
    {
        $deleted = 1;
    }
    
    $ServiceLine = new RoomBookingsSevice();
    $ServiceLine ->id = $Service['id'][$i];
    $ServiceLine ->deleted = $deleted;
    $ServiceLine ->service = $Service['service'][$i];
    $ServiceLine ->roombooking_id = $return_id;
    if($ServiceLine ->deleted == 1){
        $ServiceLine->mark_deleted($ServiceLine->id);
    }
    else{
        $ServiceLine->save();
    }
    
    $deleted_count++;
}

handleRedirect($return_id,'RoomBookings');  
?>
