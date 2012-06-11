<?php
require_once("include/utils.php");
global $current_language;
global $current_user;
$calls_lang = return_module_language($current_language, "Calls");
$meetings_lang = return_module_language($current_language, "Meetings");

global $app_strings,$app_list_strings,$beanList;
global $timedate;
$gmt_default_date_start = $timedate->get_gmt_db_datetime();
$user_default_date_start  = $timedate->handle_offset($gmt_default_date_start, $GLOBALS['timedate']->get_date_time_format());


	if(!isset($time_separator))
		$time_separator = ":";
			
        //$CALENDAR_DATEFORMAT = $timedate->get_cal_date_format());
        //$USER_DATEFORMAT = $timedate->get_user_date_format());
        $date_format = $timedate->get_cal_date_format();
        $time_format = $timedate->get_user_time_format();
        $TIME_FORMAT = $time_format;      
        $t23 = strpos($time_format, '23') !== false ? '%H' : '%I';
        if(!isset($match[2]) || $match[2] == '') {
          $CALENDAR_FORMAT = $date_format . ' ' . $t23 . $time_separator . "%M";
        } else {
          $pm = $match[2] == "pm" ? "%P" : "%p";
          $CALENDAR_FORMAT = $date_format . ' ' . $t23 . $time_separator . "%M" . $pm;
        }


		$hours_arr = array ();
		$num_of_hours = 24;
		$start_at = 0;

		$TIME_MERIDIEM = "";
		$time_pref = $timedate->get_time_format();
		if(strpos($time_pref, 'a') || strpos($time_pref, 'A')) {
			$num_of_hours = 13;
			$start_at = 1;

			$options = strpos($time_pref, 'a') ? $app_list_strings['dom_meridiem_lowercase'] : $app_list_strings['dom_meridiem_uppercase'];
		   	$TIME_MERIDIEM = get_select_options_with_id($options, 'am');   
		   	
		   	$TIME_MERIDIEM = "<select name='date_start_meridiem' tabindex='100'>".$TIME_MERIDIEM."</select>";
		} 
		
		for ($i = $start_at; $i < $num_of_hours; $i ++) {
			$i = $i."";
			if (strlen($i) == 1) {
				$i = "0".$i;
			}
			$hours_arr[$i] = $i;
		}
        	$TIME_START_HOUR_OPTIONS = get_select_options_with_id($hours_arr, 1);
		$TIME_START_MINUTES_OPTIONS = get_select_options_with_id(0, 0);
		
	
	$reminder_t = $current_user->getPreference('reminder_time');
	if(empty($reminder_t)){
		$reminder_t = -1;
	}
     $reminderHTML = '<select name="reminder_time" tabindex="100">';
     $reminderHTML .= get_select_options_with_id($app_list_strings['reminder_time_options'], $reminder_t);
     $reminderHTML .= '</select>';
     		
		
?>



<input type="hidden" name="user_invitees">
<input type="hidden" name="contact_invitees">
<input type="hidden" name="lead_invitees">


<input type="hidden" name="repeat_type_c" id="repeat_type_c">
<input type="hidden" name="repeat_interval_c" id="repeat_interval_c">
<input type="hidden" name="repeat_end_date_c" id="repeat_end_date_c">
<input type="hidden" name="repeat_days_c" id="repeat_days_c">

<input type="hidden" name="no_recurence" id="no_recurence">

<input type="hidden" name="rec_id_c" id="rec_id_c" value="">


<table class="edit view tabForm" cellspacing="1" cellpadding="0" border="0" width="100%">

	<tr>
		<td></td>
		<td>
			<div style='padding: 4px 0 2px 0;'>
				<input type="radio" id="radio_meeting" onchange="if(this.checked){this.form.cur_module.value='Meetings'; this.form.return_module.value='Meetings'; this.form.direction.style.display='none'; $('#location').removeAttr('disabled'); }" checked="true"  name="appttype" tabindex="100"/>
				<?php
				echo $calls_lang['LNK_NEW_MEETING']."";
				
				?>
				
				<input type="radio" id="radio_call" onchange="if(this.checked){this.form.cur_module.value='Calls'; this.form.return_module.value='Calls'; this.form.direction.style.display = 'inline'; $('#location').attr('disabled','disabled'); }" name="appttype" tabindex="100"/>
				<?php
				echo $calls_lang['LNK_NEW_CALL']."";
				?>				
			</div>
		</td>
	</tr>
	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $calls_lang['LBL_SUBJECT']."";?>			
			<span class="required">*</span>
		</td>
		<td valign="top">
				<input id="name" type="text" tabindex="100" title="" value="" maxlength="" size="40" name="name"/>
			
		</td>
	</tr>

	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $calls_lang['LBL_STATUS'];?>
			<span class="required">*</span>
		</td>	
		<td valign="top">		
			<select name="direction" id="direction" title="" tabindex="100" style='display: none;'>
					<?php
						foreach($app_list_strings['call_direction_dom'] as $k => $v)
							echo '<option label="'.$v.'" value="'.$k.'">'.$v.'</option>';
					?>			
			</select>
			<select name="status" id="status" title="" tabindex="100">
					<?php
						foreach($app_list_strings['call_status_dom'] as $k => $v)
							echo '<option label="'.$v.'" value="'.$k.'">'.$v.'</option>';
					?>			
			</select>
		</td>	
	</tr>
	
	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $calls_lang['LBL_DATE_TIME']."";?>			
			<span class="required">*</span>		
		</td>	
		<td valign="top">
				<table border="0" cellpadding="0" cellspacing="0">
				<tr valign="middle">
				<td nowrap="nowrap">
				<input autocomplete="off" id="date_start_date" value="<?php echo $user_default_date_start; ?>" size="11" maxlength="10" title="" tabindex="100" onblur="combo_date_start.update(); " type="text">
				<img src="themes/default/images/jscalendar.gif" alt="Enter Date" id="date_start_trigger" align="absmiddle" border="0">&nbsp;
				</td>
				<td nowrap="nowrap">
					<div id="date_start_time_section" style='float:left;'>
						<select size="1" id="date_start_hours" tabindex="100" onchange="combo_date_start.update();">
							<?php echo $TIME_START_HOUR_OPTIONS; ?>
						</select>&nbsp;:
					&nbsp;
						<select size="1" id="date_start_minutes" tabindex="100" onchange="combo_date_start.update(); ">
							<?php echo $TIME_START_MINUTES_OPTIONS; ?>
						</select>
					&nbsp;
						<?php echo $TIME_MERIDIEM;?>
					</div>
					<br style='clear: both;'>	
				</td>
				</tr>
				</table>
				<input id="date_start" name="date_start" value="<?php echo $user_default_date_start; ?>" type="hidden">
				<script type="text/javascript" src="include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"></script>
				<script type="text/javascript">
					var combo_date_start = new Datetimecombo("<?php echo $user_default_date_start; ?>", "date_start", "<?php echo $TIME_FORMAT; ?>", 100, '', ''); 
					text = combo_date_start.html('SugarWidgetScheduler.update_time();');
					document.getElementById('date_start_time_section').innerHTML = text;
					eval(combo_date_start.jsscript('SugarWidgetScheduler.update_time();'));
				</script>
				<script type="text/javascript">
					function update_date_start_available() {
					      YAHOO.util.Event.onAvailable("date_start_date", this.handleOnAvailable, this); 
					}

					update_date_start_available.prototype.handleOnAvailable = function(me) {
						Calendar.setup ({
						onClose : update_date_start,
						inputField : "date_start_date",
						ifFormat : "<?php echo $CALENDAR_FORMAT;?>",
						daFormat : "<?php echo $CALENDAR_FORMAT;?>",
						button : "date_start_trigger",
						singleClick : true,
						step : 1,
						weekNumbers:false
						});
	
						//Call update for first time to round hours and minute values
						combo_date_start.update();
					}

					var obj_date_start = new update_date_start_available(); 
				</script>


		</td>
	</tr>
	
	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $calls_lang['LBL_DURATION']."";?>
			<span class="required">*</span>							
		</td>
		<td valign="top">
			<script type="text/javascript">function isValidDuration() { form = document.getElementById('EditView'); if ( form.duration_hours.value + form.duration_minutes.value <= 0 ) { alert('<?php echo $calls_lang["NOTICE_DURATION_TIME"];?>'); return false; } return true; }</script>
			<input name="duration_hours" id="duration_hours" tabindex="100" size="2" maxlength="2" type="text" value="1" onkeyup="SugarWidgetScheduler.update_time();">
			<select name="duration_minutes" id="duration_minutes" tabindex="100" onchange="SugarWidgetScheduler.update_time();">
				<option value="0" selected>00</option>
				<option value="15">15</option>
				<option value="30">30</option>
				<option value="45">45</option>
			</select>
			
			<input type="hidden" name="duration_hours_h" id="duration_hours_h">
			<input type="hidden" name="duration_minutes_h" id="duration_minutes_h">
			
			<span class="dateFormat"><?php echo $calls_lang["LBL_HOURS_MINUTES"];?></span>
			
		</td>
	</tr>	
	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $calls_lang['LBL_REMINDER']."";?>
		</td>	
		<td valign="top">	
			<input name="reminder_checked" type="hidden" value="0">
			<input name="reminder_checked" id="reminder_checked" onclick='toggleDisplay("should_remind_list");' type="checkbox" class="checkbox" value="1" tabindex="100" <?php if($reminder_t > -1) echo "checked"; ?>>
			<div style='float: right;line-height: 21px; height: 21px;'>&nbsp;</div><div id="should_remind_list" <?php if($reminder_t == -1) echo 'style="display:none"'; else  echo 'style="display:inline"';?> ><?php echo $reminderHTML;?></div><br style='clear:both;'>	
			<script type="text/javascript">
				var reminder_time = <?php echo $reminder_t;?>;
			</script>
		</td>	
	</tr>

	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $meetings_lang['LBL_LOCATION']."";?>
		</td>
		<td valign="top">	
			<input id="location" type="text" tabindex="100" title="" value="" maxlength="" size="40" name="location">
		</td>	
	</tr>

	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $calls_lang['LBL_ASSIGNED_TO_NAME'].":";?>
		</td>	
		<td valign="top">		
				<input name="assigned_user_name" class="sqsEnabled yui-ac-input" tabindex="100" id="assigned_user_name" size="" value="<?php echo $current_user->user_name; ?>" title="" autocomplete="off" type="text">
				<input name="assigned_user_id" id="assigned_user_id" value="<?php echo $current_user->id; ?>" type="hidden">
				<input name="btn_assigned_user_name" id="btn_assigned_user_name" tabindex="100" title="<?php echo $app_strings['LBL_SELECT_BUTTON_TITLE'];?>" accesskey="T" class="button" value="<?php echo $app_strings['LBL_SELECT_BUTTON_LABEL'];?>" onclick='open_popup("Users", 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"assigned_user_id","user_name":"assigned_user_name"}}, "single", true);' type="button">
				<input name="btn_clr_assigned_user_name" id="btn_clr_assigned_user_name" tabindex="100" title="<?php echo $app_strings['LBL_CLEAR_BUTTON_TITLE'];?>" accesskey="C" class="button" onclick="this.form.assigned_user_name.value = ''; this.form.assigned_user_id.value = '';" value="<?php echo $app_strings['LBL_CLEAR_BUTTON_LABEL'];?>" type="button">
				<script type="text/javascript">
				<!--
				enableQS(false);
				-->
				</script>

		</td>	
	</tr>
	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $app_strings['LBL_LIST_RELATED_TO'].":";?>
		</td>	
		<td valign="top">
		
			<?php
				$parent_types = $app_list_strings['record_type_display'];
				$disabled_parent_types = ACLController::disabledModuleList($parent_types,false, 'list');
				foreach($disabled_parent_types as $disabled_parent_type){
					if($disabled_parent_type != $focus->parent_type){
						unset($parent_types[$disabled_parent_type]);
					}
				}				

			?>
		
				<select name="parent_type" tabindex="100" id="parent_type" title="" onchange='document.EditView.parent_name.value="";document.EditView.parent_id.value="";  parent_namechangeQS(); checkParentType(document.EditView.parent_type.value, document.EditView.btn_parent_name);'>
					<?php
					$parent_types = $app_list_strings['parent_type_display'];		
					$disabled_parent_types = ACLController::disabledModuleList($parent_types,false, 'list');
					foreach($disabled_parent_types as $disabled_parent_type){
						unset($parent_types[$disabled_parent_type]);						
					}
					asort($parent_types);
					
					foreach($parent_types as $k => $v)
						echo '<option label="'.$v.'" value="'.$k.'">'.$v.'</option>';
					?>
				</select>
				<input name="parent_name" id="parent_name" class="sqsEnabled yui-ac-input" tabindex="100" size="" value="" autocomplete="off" type="text">
				

				<input name="parent_id" id="parent_id" value="" type="hidden">
				<input name="btn_parent_name" id="btn_parent_name" tabindex="100" title="<?php echo $app_strings['LBL_SELECT_BUTTON_TITLE'];?>" accesskey="T" class="button" value="<?php echo $app_strings['LBL_SELECT_BUTTON_LABEL'];?>" onclick='open_popup(document.EditView.parent_type.value, 600, 400, "", true, false, {"call_back_function":"set_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name"}}, "single", true);' type="button">

				<input name="btn_clr_parent_name" id="btn_clr_parent_name" tabindex="100" title="<?php echo $app_strings['LBL_CLEAR_BUTTON_TITLE'];?>" accesskey="C" class="button" onclick="this.form.parent_name.value = ''; this.form.parent_id.value = '';" value="<?php echo $app_strings['LBL_CLEAR_BUTTON_LABEL'];?>" type="button">
				<script type="text/javascript">
				function parent_namechangeQS() {
					new_module = document.forms["EditView"].elements["parent_type"].value;
					if(typeof(disabledModules[new_module]) != 'undefined'){
						sqs_objects["EditView_parent_name"]["disable"] = true;
						document.forms["EditView"].elements["parent_name"].readOnly = true;
					} else{
						sqs_objects["EditView_parent_name"]["disable"] = false;
						document.forms["EditView"].elements["parent_name"].readOnly = false;
					}
					sqs_objects["EditView_parent_name"]["modules"] = new Array(new_module);
					if(typeof QSProcessedFieldsArray != 'undefined'){
					   QSProcessedFieldsArray["EditView_parent_name"] = false;
					}					
				    enableQS(false);
				    QSFieldsArray.EditView_parent_name.sqs.modules = new Array(new_module);
				}
				</script>
				
				<script>var disabledModules=[];</script>				
				<script language="javascript">
					if(typeof sqs_objects == 'undefined'){
						var sqs_objects = new Array;
					}
					sqs_objects['EditView_parent_name']={"form":"EditView","method":"query","modules":[$("#parent_type option:selected").val()],"group":"or","field_list":["name","id"],"populate_list":["parent_name","parent_id"],"required_list":["parent_id"],"conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],"order":"name","limit":"30","no_match_text":"No Match"};
				</script>

				

		</td>	
	</tr>


	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $calls_lang['LBL_SEND_BUTTON_LABEL'].":";?>
		</td>	
		<td valign="top">
			<input type='checkbox' id='send_invites' name='send_invites' tabindex="100" value="1">
		</td>
	</tr>	
	

	<tr>
		<td width="20%" valign="top" scope="row">
			<?php echo $calls_lang['LBL_DESCRIPTION'];?>
		</td>	
		<td valign="top">
			<textarea id='description' name='description' cols='60' rows='5' tabindex="100"></textarea>
		</td>
	</tr>



	


</table>

	<script language="javascript">
		if(typeof sqs_objects == 'undefined'){
			var sqs_objects = new Array;
		}
		sqs_objects['EditView_assigned_user_name']={"form":"EditView","method":"get_user_array","field_list":["user_name","id"],"populate_list":["assigned_user_name","assigned_user_id"],"required_list":["assigned_user_id"],"conditions":[{"name":"user_name","op":"like_custom","end":"%","value":""}],"limit":"30","no_match_text":"No Match"};
	</script>

<?php

?>
