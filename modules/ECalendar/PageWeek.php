<?php

$t_step = 30;

include("modules/ECalendar/ECal_common.php");


$Tw = date("w",$today_unix - date('Z',$today_unix));
$Ti = date("i",$today_unix - date('Z',$today_unix));
$Ts = date("s",$today_unix - date('Z',$today_unix));
$Th = date("H",$today_unix - date('Z',$today_unix));
$Td = date("d",$today_unix - date('Z',$today_unix));
$Tm = date("m",$today_unix - date('Z',$today_unix));
$Ty = date("Y",$today_unix - date('Z',$today_unix));
$timezone = $GLOBALS['timedate']->getUserTimeZone();

$week_start_unix = $today_unix - $Ts - 60*$Ti - 60*60*$Th - 60*60*24*($Tw);// - $timezone['gmtOffset']*60;

if($startday == "Monday")
	$week_start_unix = $week_start_unix + 60*60*24;
$week_start = date("m/d/Y H:i:s",$week_start_unix);
$week_end_unix = $week_start_unix + 60*60*24*7;
if($startday == "Monday")
	$week_end_unix = $week_end_unix + 60*60*24;
$week_end = date("m/d/Y H:i:s",$week_end_unix);


echo "<div id='week_div'>";
	
	
	echo "<div class='left_time_col'>";
		echo "<div class='day_head'>&nbsp;</div>";		
		for($i = 0; $i < 24; $i++){
			for($j = 0; $j < 60; $j += $t_step){
				if($j == 0) 
					$innerText = timestamp_to_user_formated2($week_start_unix + $i * 3600 ,$GLOBALS['timedate']->get_time_format());
				else
					$innerText = "&nbsp;"; 
				$hc = check_owt($i,$j,$r_start,$r_end);
				echo "<div class='left_cell ".$hc."'>".$innerText."</div>";
			}
		}	
	echo "</div>";

	echo "<div class='week_block'>";

	for($d = 0; $d < 7; $d++){
		$curr_time = $week_start_unix + $d*86400;	


		echo "<div class='day_col'>";
			if($real_today_unix == $curr_time)
				$headstyle = " today";
			else
				$headstyle = "";
			echo "<div class='day_head".$headstyle."'><a href='index.php?module=ECalendar&action=index&view=day&hour=0&day=".timestamp_to_user_formated2($curr_time,'j')."&month=".timestamp_to_user_formated2($curr_time,'n')."&year=".timestamp_to_user_formated2($curr_time,'Y')."'>".$weekday_names[$d]." ".timestamp_to_user_formated2($curr_time,'d')."</a></div>";		
			for($i = 0; $i < 24; $i++){
				for($j = 0; $j < 60; $j += $t_step){
					$hc = check_owt($i,$j,$r_start,$r_end);						
					$timestr = timestamp_to_user_formated2($curr_time,$GLOBALS['timedate']->get_time_format());							
					echo "<div id='t_".$curr_time."' class='t_cell ".$hc."' lang='".$timestr."' datetime='".timestamp_to_user_formated2($curr_time)."'></div>";
					$curr_time += $t_step*60;
				}
			}
		echo "</div>";
	}
	
	echo "</div>";	

echo "</div>";




?>
