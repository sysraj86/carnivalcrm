<?php
		
?>

<table class="edit view tabForm" cellspacing="1" cellpadding="0" border="0" width="100%">

	<tr>
		<td scope="row">
			<?php echo $GLOBALS['mod_strings']['LBL_REPEAT_TYPE'].":"; ?>
		</td>
		<td>
			<select id='repeat_type' name='repeat_type' onChange='repeat_type_selected();'>
			<?php
					$repeat_types = $GLOBALS['mod_strings']['repeat_types'];

					foreach($repeat_types as $k => $v)
						echo "<option value='".$k."'>".$v."</option>";			
			?>				
			</select>
		</td>
		
		<td scope="row">
			<?php echo $GLOBALS['mod_strings']['LBL_REPEAT_INTERVAL'].":"; ?>		
		</td>
		<td>
			<select id='repeat_interval' name='repeat_interval'>
				<option value=''>1</option>
			<?php
				for($i = 2; $i <= 31; $i++)
					echo "<option value='".$i."'>".$i."</option>";			
				
			?>
			</select>
		</td>			
	</tr>
	<tr>
		<td scope="row">
			<?php echo $GLOBALS['mod_strings']['LBL_REPEAT_END_DATE'].":"; ?>	
		</td>
		<td>
			<?php
			
			$default_end_date = $today_unix + 24*60*60*date("t",$today_unix - date('Z'));
			$default_end_date = timestamp_to_user_formated2($default_end_date,$GLOBALS['timedate']->get_date_format());				
			
			?>
			<input autocomplete="off" name="repeat_end_date" id="repeat_end_date" value="<?php echo $default_end_date;?>" title="" tabindex="105" size="11" maxlength="10" type="text">
			<img src="themes/default/images/jscalendar.gif" alt="Enter Date" id="repeat_end_date_trigger" align="absmiddle" border="0">
			<script type="text/javascript">
			Calendar.setup ({
			inputField : "repeat_end_date",
			daFormat : "<?php echo $CALENDAR_FORMAT;?>",
			button : "repeat_end_date_trigger",
			singleClick : true,
			dateStr : "<?php echo $default_end_date;?>",
			step : 1,
			weekNumbers:false
			}
			);
			</script>
		</td>	
	</tr>
	<tr>
		
		<td scope="row">
			<div class='weeks_checks_div'>
			<?php echo $GLOBALS['mod_strings']['LBL_REPEAT_DAYS'].":"; ?>
			</div>	
		</td>
		
		<td>
			<div class='weeks_checks_div'>
			<?php				  
				foreach($GLOBALS['app_list_strings']['dom_cal_day_long'] as $k => $v)
					if($k != '0')
						echo "<input type='checkbox' class='weeks_checks' name='repeat_days[]' value='".$k."'> ".$v . "<br>";	
			?>	
			</div>		
		</td>
	</tr>
	
</table>

<?php

?>
