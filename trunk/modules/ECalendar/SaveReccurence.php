<?php

$rtype = $_REQUEST['repeat_type_c'];
$repeat_days = $_REQUEST['repeat_days_c'];
$interval = $_REQUEST['repeat_interval_c'];

$timezone = $GLOBALS['timedate']->getUserTimeZone();
global $timedate;

$start_unix = to_timestamp_from_uf($_REQUEST['date_start']);

$end_unix = to_timestamp($GLOBALS['timedate']->swap_formats($_REQUEST['repeat_end_date_c'],$GLOBALS['timedate']->get_date_format(),'Y-m-d H:i:s'));

$end_unix = $end_unix + 60*60*24 - 1;

$start_day = date("w",$start_unix - date('Z',$start_unix)) + 1;
$start_dayM = date("j",$start_unix - date('Z',$start_unix));

if($rtype == 'Weekly' || $rtype == 'Monthly (day)')
	$start_unix = $start_unix - 60*60*24*($start_day - 1);

remove_recurence($bean,$table_name,$jn,$bean->id);

$ft = true;


if(!empty($_REQUEST['repeat_type_c']) && !empty($_REQUEST['repeat_end_date_c']) ){
	
	if(empty($interval) && $interval == 0)
		$interval = 1;


	$cur_date = $start_unix;
	
	
	$i = 0;
	if($rtype == 'Weekly' || $rtype == 'Monthly (day)')
		$i--;
	
	while($cur_date <= $end_unix){
	
		$i++;
		
		if($rtype == 'Daily'){
			$step = 60*60*24;			
		}
			
		else if($rtype == 'Monthly'){
			$step = 60*60*24 * date('t',$cur_date - date('Z',$cur_date));
			$this_month = date('n',$cur_date - date('Z',$cur_date));
			$next_month = date('n',$cur_date + $step - date('Z',$cur_date));	
			if($next_month - $this_month == 2 || $next_month - $this_month == -10){	
				$day_number = intval(date('d',$cur_date + $step - date('Z',$cur_date))) + 1;							
				$step += 60*60*24 * date('t',$cur_date + $step - $day_number*24*3600 - date('Z',$cur_date));
				$i++;
			}						
		}
		
		else if($rtype == 'Yearly'){
			$step = 60*60*24 * 365;
			if( date('d',$cur_date + $step - date('Z',$cur_date)) !=  date('d',$cur_date - date('Z',$cur_date)) )
				$step += 60*60*24;					
		}
		
		else if($rtype == 'Weekly'){
			$step = 60*60*24*7;
			
			if($i % $interval == 0)
				for($d = $start_day; $d < 7; $d++)
					if(strpos($repeat_days,(string)($d + 1)) !== false){
						if($cur_date + $d*60*60*24 > $end_unix)
							break;
						$arr_rec[] = create_clone($bean,$cur_date + $d*60*60*24,$jn);															
					}							
			$start_day = 0;							
		}
				
		/*else if($rtype == 'Monthly (day)'){
			$step = 60*60*24 * date('t',$cur_date - date('Z',$cur_date));
			
			if($i % $interval == 0 && $start_dayM <= $start_day)
				for($d = $start_day; $d < 7; $d++){
					$dd = date('w',$cur_date + $d*60*60*24 - date('Z',$cur_date));
					if(strpos($repeat_days,(string)($dd + 1)) !== false){
						if($cur_date + $d*60*60*24 > $end_unix)
							break;
						$arr_rec[] = create_clone($bean,$cur_date + $d*60*60*24,$jn);															
					}
				}							
			$start_day = 0;	
			$start_dayM = 0;						
		}*/	
		else
			die("Bad type");		
		
		
		$cur_date += $step;		
			
	
		if($i % $interval != 0)
			continue;
		
		if($cur_date > $end_unix)
			break;
			
		if($rtype == 'Weekly' || $rtype == 'Monthly (day)')
			continue;		

		$arr_rec[] = create_clone($bean,$cur_date,$jn);
	}
}
	
?>
