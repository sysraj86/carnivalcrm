<?php

function check_owt($i,$j,$r_start,$r_end){
	if($i*60+$j < $r_start || $i*60+$j >= $r_end)
		return "owt";
	else
		return "";
}

function timestamp_to_user_formated2($t,$format = false){
	global $timedate;
	if($format == false)
		$f = $timedate->get_date_time_format();
	else
		$f = $format;			
	return date($f,$t - date('Z',$t) );	
}

function to_timestamp_from_uf($d){	
	$db_d = $GLOBALS['timedate']->swap_formats($d,$GLOBALS['timedate']->get_date_time_format(),'Y-m-d H:i:s');
	$ts_d = to_timestamp($db_d);	
	return $ts_d;	
}

function to_timestamp($db_d){
	$date_parsed = date_parse($db_d);
	$date_unix = gmmktime($date_parsed['hour'],$date_parsed['minute'],$date_parsed['second'],$date_parsed['month'],$date_parsed['day'],$date_parsed['year']);
	return $date_unix;
}


function clone_rec($bean){
	
	$obj = clone $bean;
	$obj->id = "";

	return $obj;
}

function create_clone($bean,$cur_date,$jn){

		$obj = clone_rec($bean);	
		$obj->date_start = timestamp_to_user_formated2($cur_date);
		$obj->date_end = timestamp_to_user_formated2($cur_date);	
		$obj->$jn = $bean->id;
		//$obj->save();		
					
		invitees_filling($obj,false);
		$obj_id = $obj->id;	
		
		$date_unix = $cur_date;	
		return 	array(
				'record' => $obj_id,
				'start' => $date_unix,
		);
}

function get_invitees_list($bean,$type){
			$userInvitees = array();
			$q = 'SELECT mu.user_id, mu.accept_status FROM '.$type.'s_users mu WHERE mu.'.$type.'_id = \''.$bean->id.'\' AND mu.deleted = 0 ';
			$r = $bean->db->query($q);
			while($a = $bean->db->fetchByAssoc($r))
				$userInvitees[] = $a['user_id'];			
					
			return $userInvitees;					
}

function remove_recurence($bean,$table_name,$jn,$record){
	$qu = " 
		UPDATE	".$table_name." t
		JOIN 	".$table_name."_cstm c ON t.id = c.id_c
		SET t.deleted = 1 	 
		WHERE c.".$jn." = '".addslashes($record)."'
	";
	$bean->db->query($qu);
	$qu = " 
		UPDATE	".$table_name."_users t
		SET t.deleted = 1 	 
		WHERE t.user_id = '".addslashes($_REQUEST['record'])."'
	";	
	$bean->db->query($qu);
}


?>
