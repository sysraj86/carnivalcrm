<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

require_once("modules/Calls/Call.php");
require_once("modules/Meetings/Meeting.php");
require_once("modules/ECalendar/functions.php");

if($_REQUEST['cur_module'] == 'Calls'){
	$bean = new Call();
	$table_name = 'calls';
	$jn = "call_id_c";
	
}
if($_REQUEST['cur_module'] == 'Meetings'){
	$bean = new Meeting();
	$table_name = 'meetings';
	$jn = "meeting_id_c";
}

$bean->retrieve($_REQUEST['record']);

if(!$bean->ACLAccess('delete')){
	die;	
}

$bean->mark_deleted($_REQUEST['record']);


if($_REQUEST['delete_recurring']){
	remove_recurence($bean,$table_name,$jn,$_REQUEST['record']);
}

	$json_arr = array(
		'succuss' => 'yes',
	);

	ob_clean();
	echo json_encode($json_arr);
	
?>
