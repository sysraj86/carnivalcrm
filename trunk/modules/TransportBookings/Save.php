<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/TransportBookings/TransportBookings.php');
require_once('include/formbase.php');
require_once('modules/TransportBookingsLine/TransportBookingsLine.php'); 
include("config.php");
global $sugar_config;

$focus = new TransportBookings();

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

$focus->name = $mod_strings["LBL_NAME_FIRST"].'_'.$focus->transports_tbookings_name;
$focus->save($check_notify); 

$return_id = $focus->id; 
$deleted_count = 0;
// save to modules TransportBookingsLine
$line = array(
  'id_booking'          => $_POST['id_booking'],
  'name_booking'        => $_POST['name_booking'], 
  'operating_date'      => $_POST['operating_date'],
  'unit_price'          => $_POST['unit_price'],
  'type'                => $_POST['type'],
  'route'               => $_POST['route'],
  'deleted'             => $_POST['deleted'],
);

// save contract_values

$transport_bookings_line_count = count($line['id_booking']); 

for($i = 0; $i<$transport_bookings_line_count; $i++){
    $deleted = $line['deleted'][$deleted_count];
    if(
    ($line['name_booking'][$i]      == '' || $line['name_booking'][$i]      == '0') &&
    ($line['operating_date'][$i]    == '' || $line['operating_date'][$i]    == '0') &&
    ($line['unit_price'][$i]        == '' || $line['unit_price'][$i]        == '0') &&
    ($line['type'][$i]              == '' || $line['type'][$i]              == '0') &&
    ($line['route'][$i]             == '' || $line['route'][$i]             == '0')
    )
    {
        $deleted = 1;
    }
    $transport_bookings_line = new TransportBookingsLine()  ;
    $transport_bookings_line ->id = $line['id_booking'][$i]; 
    $transport_bookings_line ->transportbookings_id = $return_id;
    $transport_bookings_line ->name_booking = $line['name_booking'][$i];  
    $transport_bookings_line ->operating_date = $line['operating_date'][$i];
    $transport_bookings_line ->unit_price = $line['unit_price'][$i];
    $transport_bookings_line ->type = $line['type'][$i];
    $transport_bookings_line ->route = $line['route'][$i];
    $transport_bookings_line ->deleted = $deleted;
    
    if($transport_bookings_line->deleted == 1){
        $transport_bookings_line ->mark_deleted($transport_bookings_line ->id );
    }else{
        $transport_bookings_line->save();
    }
    $deleted_count ++;
}


handleRedirect($return_id,'TransportBookings');     
?>
