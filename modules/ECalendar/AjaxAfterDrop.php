<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

require_once("modules/Calls/Call.php");
require_once("modules/Meetings/Meeting.php");

if($_REQUEST['type'] == 'call')
	$bean = new Call();
if($_REQUEST['type'] == 'meeting')
	$bean = new Meeting();
	
$bean->retrieve($_REQUEST['record']);

if(!$bean->ACLAccess('Save')){
	die;	
}



$bean->date_start = $_REQUEST['datetime'];
$bean->date_end = $_REQUEST['date_end'];
$bean->save();

?>
