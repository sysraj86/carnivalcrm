<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/GroupPrograms/GroupProgram.php');
require_once('include/formbase.php');
require_once('modules/GroupsProgramsLine/GroupsProgramsLine.php');
require_once('modules/Guide/Guide.php'); 
require_once('modules/TeamLeader/TeamLeader.php'); 
require_once('modules/PickUpCars/PickUpCars.php');  
require_once('modules/SightSeeingCars/SightSeeingCars.php');  
include("config.php");
global $sugar_config;

$focus = new GroupProgram();

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
 if(!empty($focus->tour_name)){
    $focus->name = $focus->tour_name; 
 }
$focus->save($check_notify); 

$return_id = $focus->id;
$deleted_count = 0;

// save to module Team leader


$leader =array(
    'id'                => $_POST['team_leader_id'],
    'leader_id'          => $_POST['leader_id'],
    'team_leader'        => $_POST['team_leader'],
    'leader_phone'       => $_POST['leader_phone'],
    'deleted'           => $_POST['deleted'],
);

$leader_count = count($leader['id']);
for($j=0; $j<$leader_count; $j++){
    $team_leader = new TeamLeader();
    $team_leader->id = $leader['id'][$j];
    $team_leader->leader_id = $leader['leader_id'][$j];
    $team_leader->team_leader = $leader['team_leader'][$j];
    $team_leader->leader_phone = $leader['leader_phone'][$j]; 
    $team_leader->deleted = $leader['deleted'][$deleted_count]; 
    $team_leader->groupprogram_id = $return_id;
    
    if($team_leader->deleted == 1){
        $team_leader->mark_deleted($team_leader->id);
    }else{
        $team_leader->save();
    }
    $deleted_count++;
}


// save to module Guide

$guide =array(
    'id'                => $_POST['guide_record'],
    'guide_id'          => $_POST['guide_id'],
    'guide_name'        => $_POST['guide_name'],
    'guide_phone'       => $_POST['guide_phone'],
    'deleted'           => $_POST['deleted'],
);

$guide_count = count($guide['id']);
for($j=0; $j<$guide_count; $j++){
    $guides = new Guide();
    $guides->id = $guide['id'][$j];
    $guides->guide_id = $guide['guide_id'][$j];
    $guides->guide_name = $guide['guide_name'][$j];
    $guides->guide_phone = $guide['guide_phone'][$j]; 
    $guides->deleted = $guide['deleted'][$deleted_count]; 
    $guides->groupprogram_id = $return_id;
    
    if($guides->deleted == 1){
        $guides->mark_deleted($guides->id);
    }else{
        $guides->save();
    }
    $deleted_count++;
}

// save to module pick up car

$pick_up_car =array(
    'id'                => $_POST['pick_id'],
    'pick_up_car_id'    => $_POST['pick_up_car_id'],
    'number_plates'     => $_POST['number_plates'],
    'driver'            => $_POST['driver'],
    'driver_phone'      => $_POST['driver_phone'],
    'deleted'           => $_POST['deleted'],
);

$pick_up_car_line_count = count($pick_up_car['id']);
for($j=0; $j<$pick_up_car_line_count; $j++){
    $pickupcar = new PickUpCars();
    $pickupcar->id = $pick_up_car['id'][$j];
    $pickupcar->pick_up_car_id = $pick_up_car['pick_up_car_id'][$j];
    $pickupcar->number_plates = $pick_up_car['number_plates'][$j];
    $pickupcar->driver = $pick_up_car['driver'][$j]; 
    $pickupcar->driver_phone = $pick_up_car['driver_phone'][$j]; 
    $pickupcar->deleted = $pick_up_car['deleted'][$deleted_count]; 
    $pickupcar->groupprogram_id = $return_id;
    
    if($pickupcar->deleted == 1){
        $pickupcar->mark_deleted($pickupcar->id);
    }else{
        $pickupcar->save();
    }
    $deleted_count++;
}


// save to module sightseeing car

$sightseeing_car = array(
   'id'                         => $_POST['sightseeing_car_id'],
   'sightseeing_id'             => $_POST['sightseeing_id'],
   'number_plates_sight'        => $_POST['number_plates_sight'],
   'driver_sight'               => $_POST['driver_sight'],
   'driver_phone_sight'         => $_POST['driver_phone_sight'],
   'deleted'                    => $_POST['deleted'],
);

$sightseeing_car_line_count = count($sightseeing_car['id']);

for($i=0; $i<$sightseeing_car_line_count; $i++){
    $sightseeingcar = new SightSeeingCars();
    $sightseeingcar -> id = $sightseeing_car['id'][$i];
    $sightseeingcar -> sightseeing_car_id = $sightseeing_car['sightseeing_id'][$i];
    $sightseeingcar -> number_plates_sight = $sightseeing_car['number_plates_sight'][$i];
    $sightseeingcar -> driver_sight = $sightseeing_car['driver_sight'][$i];
    $sightseeingcar -> driver_phone_sight = $sightseeing_car['driver_phone_sight'][$i];
    $sightseeingcar -> deleted = $sightseeing_car['deleted'][$deleted_count];
    $sightseeingcar -> groupprogram_id = $return_id;
    
    if($sightseeingcar->deleted ==1){
        $sightseeingcar->mark_deleted($sightseeingcar->id);
    }
    else{
        $sightseeingcar->save();
    }
    $deleted_count++;
}



// save to modules Groupprogramline
$group_program_line = array(
  'id'                  => $_POST['groupprogramline_id'], 
  'date'                => $_POST['date'],
  'section_of_date'     => $_POST['section_of_date'],
  'parent'              => $_POST['parent'],
  'parent_id'           => $_POST['parent_id'],
  'parent_name'         => $_POST['parent_name'],
  'service_other'       => $_POST['service_other'],
  'address'             => $_POST['address'],
  'tel'                 => $_POST['tel'],
  'fax'                 => $_POST['fax'],
  'contact'             => $_POST['contact_name'],
  'contact_id'          => $_POST['contact_id'],
  'contact_phone'       => $_POST['contact_phone'],
  'content'             => $_POST['content'],
  'deleted'             => $_POST['deleted'],
);

// save contract_values

$group_program_line_count = count($group_program_line['id']); 

for($i = 0; $i<$group_program_line_count; $i++){
    $group_program_lines = new GroupsProgramsLine()  ;
    $group_program_lines ->id = $group_program_line['id'][$i]; 
    $group_program_lines ->groupprogram_id = $return_id;  
    $group_program_lines ->date = $group_program_line['date'][$i];
    $group_program_lines ->section_of_date = $group_program_line['section_of_date'][$i];
    $group_program_lines ->parent = $group_program_line['parent'][$i];
    $group_program_lines ->parent_name = $group_program_line['parent_name'][$i];
    $group_program_lines ->parent_id = $group_program_line['parent_id'][$i];
    $group_program_lines ->service_other = $group_program_line['service_other'][$i];
    $group_program_lines ->address = $group_program_line['address'][$i];
    $group_program_lines ->tel = $group_program_line['tel'][$i];
    $group_program_lines ->fax = $group_program_line['fax'][$i];
    $group_program_lines ->contact = $group_program_line['contact'][$i];
    $group_program_lines ->contact_id = $group_program_line['contact_id'][$i];
    $group_program_lines ->contact_phone = $group_program_line['contact_phone'][$i];
    $group_program_lines ->content = $group_program_line['content'][$i];
    $group_program_lines ->deleted = $group_program_line['deleted'][$deleted_count];
    
    if($group_program_lines->deleted == 1){
        $group_program_lines ->mark_deleted($group_program_lines ->id );
    }    
    else{
        $group_program_lines->save();
    }
    $deleted_count++;
}


handleRedirect($return_id,'GroupPrograms');     
?>
