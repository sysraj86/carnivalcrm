<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

require_once("modules/ECalendar/SaveInvitees.php");
require_once("modules/ECalendar/functions.php");

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
if(!empty($_REQUEST['record']))
	$bean->retrieve($_REQUEST['record']);
	
if(!$bean->ACLAccess('Save')) {
	$json_arr = array(
		'succuss' => 'no',
	);
	echo json_encode($json_arr);
	die;	
}

	
$bean->name = $_REQUEST['name'];	
$bean->date_start = $_REQUEST['date_start'];
$bean->date_end = $_REQUEST['date_start'];
$bean->duration_hours = $_REQUEST['duration_hours'];
$bean->duration_minutes = $_REQUEST['duration_minutes'];
if($_REQUEST['reminder_checked'])
	$bean->reminder_time = $_REQUEST['reminder_time']; 
else
	$bean->reminder_time = -1;
if($_REQUEST['cur_module'] == 'Calls')
	$bean->direction = $_REQUEST['direction'];
if($_REQUEST['cur_module'] == 'Meetings')
	$bean->location = $_REQUEST['location'];
$bean->status = $_REQUEST['status'];
$bean->assigned_user_id = $_REQUEST['assigned_user_id'];
$bean->parent_type = $_REQUEST['parent_type'];
$bean->parent_id = $_REQUEST['parent_id'];
$bean->description = $_REQUEST['description'];

if(empty($_REQUEST['rec_id_c']) && empty($_REQUEST['no_recurence']) ){
	$bean->repeat_type_c = $_REQUEST['repeat_type_c'];
	$bean->repeat_interval_c = $_REQUEST['repeat_interval_c'];
	$bean->repeat_end_date_c = $_REQUEST['repeat_end_date_c'];
	$bean->repeat_days_c = $_REQUEST['repeat_days_c'];	
}

if(empty($_REQUEST['record']) && strpos($_POST['user_invitees'],$bean->assigned_user_id) === false)
	$_POST['user_invitees'] .= ",".$bean->assigned_user_id;
// fill invites and save the entry
invitees_filling($bean); 

//$bean->save($GLOBALS['check_notify']);
	
if($r_id = $bean->id){

	$u = new User();
	$u->retrieve($bean->assigned_user_id);
	
	/*if(empty($_POST['user_invitees'])){
		$bean->set_accept_status($u, 'none');
		$_POST['user_invitees'] = $bean->assigned_user_id;
	}*/

	$arr_rec = array();
	if(empty($_REQUEST['rec_id_c']) && empty($_REQUEST['no_recurence']) && ($_REQUEST['repeat_type_c'] != '') ){
		include("modules/ECalendar/SaveReccurence.php");
	}
	if(empty($_REQUEST['rec_id_c']) && $_REQUEST['repeat_type_c'] == '' ){
		remove_recurence($bean,$table_name,$jn,$bean->id);
	}

	$bean->retrieve($r_id); 

	global $timedate;
	$start = to_timestamp_from_uf($bean->date_start);
			
	if($_REQUEST['cur_module'] == 'Calls')
		$users = $bean->get_call_users();
	if($_REQUEST['cur_module'] == 'Meetings')
		$users = $bean->get_meeting_users();
	$user_ids = array();	
	foreach($users as $u)
		$user_ids[] = $u->id;
				
					

	$description = $bean->description;
	$description = str_replace("\r\n","<br>",$description);
	$description = str_replace("\r","<br>",$description);
	$description = str_replace("\n","<br>",$description);

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
		'time_start' => timestamp_to_user_formated2($start,$GLOBALS['timedate']->get_time_format()),
		'duration_hours' => $bean->duration_hours,
		'duration_minutes' => $bean->duration_minutes,
		'description' => html_entity_decode($description,ENT_QUOTES),
		'status' => $bean->status,
		'users' => $user_ids,
		'rec_id_c' => $bean->$jn,
		'repeat_type_c' => $bean->repeat_type_c,
		'repeat_interval_c' => $bean->repeat_interval_c,
		'repeat_end_date_c' => $bean->repeat_end_date_c,
		'repeat_days_c' => $bean->repeat_days_c,
		'arr_rec' => $arr_rec,	
		'detailview' => 1,	
		'editview' => 1,	
	);

}else{
	$json_arr = array(
		'succuss' => 'no',
	);
}

ob_clean();
echo json_encode($json_arr);


?>
