<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 


require_once("modules/ECalendar/functions.php");

global $beanFiles,$beanList;

if($_REQUEST['cur_module'] == 'Calls'){
	require_once("modules/Calls/Call.php");
	$bean = new Call();
	$type = 'call';
	$table_name = 'calls';
	$jn = "call_id_c";		
}
if($_REQUEST['cur_module'] == 'Meetings'){
	require_once("modules/Meetings/Meeting.php");
	$bean = new Meeting();
	$type = 'meeting';
	$table_name = 'meetings';
	$jn = "meeting_id_c";
}


$bean->retrieve($_REQUEST['record']);

if(!$bean->ACLAccess('DetailView')) {
	$json_arr = array(
		'succuss' => 'no',
	);
	echo json_encode($json_arr);
	die;	
}

if($bean->ACLAccess('Save'))
	$editview = 1;
else
	$editview = 0;


if($r_id = $bean->id){

	$bean->retrieve($r_id); 


	if(!empty($bean->parent_type) && !empty($bean->parent_id)){
		require_once($beanFiles[$beanList[$bean->parent_type]]);
		$par = new $beanList[$bean->parent_type]();
		$par->retrieve($bean->parent_id);	
	}
		

	global $timedate;
        $start = to_timestamp_from_uf($bean->date_start);

	$json_arr = array(
		'succuss' => 'yes',
		'record_name' => html_entity_decode($bean->name,ENT_QUOTES),
		'record' => $bean->id,
		'type' => $type,
		'assigned_user_id' => $bean->assigned_user_id,
		'user_id' => '',
		'user_name' => $bean->assigned_user_name,
		'date_start' => $bean->date_start,
		'start' => $start,
		'duration_hours' => $bean->duration_hours,
		'duration_minutes' => $bean->duration_minutes,
		'reminder_time' => $bean->reminder_time,
		'status' => $bean->status,
		'time_start' => timestamp_to_user_formated2($start,$GLOBALS['timedate']->get_time_format()),
		'direction' => $bean->direction,
		'location' => $bean->location,
		'description' => html_entity_decode($bean->description,ENT_QUOTES),
		'parent_type' => $bean->parent_type,
		'parent_name' => $par->name,
		'parent_id' => $bean->parent_id,
		'rec_id_c' => $bean->$jn,
		'repeat_type_c' => $bean->repeat_type_c,
		'repeat_interval_c' => $bean->repeat_interval_c,
		'repeat_end_date_c' => $bean->repeat_end_date_c,
		'repeat_days_c' => $bean->repeat_days_c,
		'editview' => $editview,
	);

}else{
	$json_arr = array(
		'succuss' => 'no',
	);
}
	ob_clean();
	echo json_encode($json_arr);


?>
