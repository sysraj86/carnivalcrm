<?php

$t_step = 15;

include("modules/ECalendar/ECal_common.php");

?>
<style type="text/css">
		.day_col, .left_time_col{
			border-top: 1px solid silver;	
		}
</style>
<?php



$Tw = date("w",$today_unix - date('Z',$today_unix));
$Ti = date("i",$today_unix - date('Z',$today_unix));
$Ts = date("s",$today_unix - date('Z',$today_unix));
$Th = date("H",$today_unix - date('Z',$today_unix));
$Td = date("d",$today_unix - date('Z',$today_unix));
$Tm = date("m",$today_unix - date('Z',$today_unix));
$Ty = date("Y",$today_unix - date('Z',$today_unix));
$timezone = $GLOBALS['timedate']->getUserTimeZone();

$day_start_unix = $today_unix - $Ts - 60*$Ti - 60*60*$Th; // - $timezone['gmtOffset']*60;

$day_start = date("m/d/Y H:i:s",$day_start_unix);


echo "<div id='week_div' style=' min-width: 300px;'>";

	
	echo "<div class='left_time_col'>";
		echo "<div class='day_head' style='display:none;'>&nbsp;</div>";		
		for($i = 0; $i < 24; $i++){
			for($j = 0; $j < 60; $j += $t_step){
				if($j == 0) 
					$innerText = timestamp_to_user_formated2($day_start_unix + $i * 3600 ,$GLOBALS['timedate']->get_time_format());
				else
					$innerText = "&nbsp;"; 
				$hc = check_owt($i,$j,$r_start,$r_end);
				echo "<div class='left_cell ".$hc."'>".$innerText."</div>";
			}
		}	
	echo "</div>";

		$d = 0;
		$curr_time = $day_start_unix + $d*86400;	
		echo "<div class='week_block'>";
			echo "<div class='day_col' style='width: 100%;'>";
				echo "<div class='day_head' style='display:none;'>&nbsp;</div>";		
				for($i = 0; $i < 24; $i++){
					for($j = 0; $j < 60; $j += $t_step){
						$hc = check_owt($i,$j,$r_start,$r_end);						
						$timestr = timestamp_to_user_formated2($curr_time,$GLOBALS['timedate']->get_time_format());							
						echo "<div id='t_".$curr_time."' class='t_cell ".$hc."' lang='".$timestr."' datetime='".timestamp_to_user_formated2($curr_time)."'></div>";
						$curr_time += $t_step*60;
					}
				}
			echo "</div>";
		echo "</div>";

echo "</div>";



?>
