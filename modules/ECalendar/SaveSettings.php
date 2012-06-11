<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

global $current_user;
global $timedate;


function to_db_time($hours,$minutes,$mer){
	$hours = intval($hours);
	$minutes = intval($minutes);
	$mer = strtolower($mer);
	if(!empty($mer)){
		if(($mer) == 'am')
			if($hours == 12)
				$hours = $hours - 12;
		if(($mer) == 'pm')
			if($hours != 12)
				$hours = $hours + 12;		
	}
	if($hours < 10)
		$hours = "0".$hours;
	if($minutes < 10)
		$minutes = "0".$minutes;	
	return $hours . ":". $minutes; 
}


$db_start = to_db_time($_REQUEST['d_start_hours'],$_REQUEST['d_start_minutes'],$_REQUEST['d_start_meridiem']);
$db_end = to_db_time($_REQUEST['d_end_hours'],$_REQUEST['d_end_minutes'],$_REQUEST['d_end_meridiem']);


$current_user->setPreference('d_start_time', $db_start, 0, 'global', $current_user);
$current_user->setPreference('d_end_time', $db_end, 0, 'global', $current_user);

$current_user->setPreference('week_start_day', $_REQUEST['start_day'], 0, 'global', $current_user);
$current_user->setPreference('show_tasks', $_REQUEST['show_tasks'], 0, 'global', $current_user);
$current_user->setPreference('rec_enabled', $_REQUEST['rec_enabled'], 0, 'global', $current_user);



if(isset($_REQUEST['day']) && !empty($_REQUEST['day']))
	header("Location: index.php?module=ECalendar&action=index&view=".$_REQUEST['view']."&hour=0&day=".$_REQUEST['day']."&month=".$_REQUEST['month']."&year=".$_REQUEST['year']);
else
	header("Location: index.php?module=ECalendar&action=index");
?>
