<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Professional Subscription
 * Agreement ("License") which can be viewed at
 * http://www.sugarcrm.com/crm/products/sugar-professional-eula.html
 * By installing or using this file, You have unconditionally agreed to the
 * terms and conditions of the License, and You may not use this file except in
 * compliance with the License.  Under the terms of the license, You shall not,
 * among other things: 1) sublicense, resell, rent, lease, redistribute, assign
 * or otherwise transfer Your rights to the Software, and 2) use the Software
 * for timesharing or service bureau purposes such as hosting the Software for
 * commercial gain and/or for the benefit of a third party.  Use of the Software
 * may be subject to applicable fees and any use of the Software without first
 * paying applicable fees is strictly prohibited.  You do not have the right to
 * remove SugarCRM copyrights from the source code or user interface.
 *
 * All copies of the Covered Code must include on each user interface screen:
 *  (i) the "Powered by SugarCRM" logo and
 *  (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2009 SugarCRM, Inc.; All Rights Reserved.
 ********************************************************************************/
/////////////////////////////////
// template
/////////////////////////////////
global $timedate;
function template_cal_tabs(& $args) {
	global $mod_strings, $sugar_version, $sugar_config;	
	$tabs = array('day', 'week', 'month', 'year', 'shared');

	if($args['view'] != 'day'){
		echo '<script type="text/javascript" src="' . getJSPath('include/javascript/sugar_grp_overlib.js') . '"></script> 
			<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>';
	}
	
?>
<table id="cal_tabs" width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td>
<?php

	$time_arr = array();

	foreach($tabs as $tab) { 
?>
<input type="button" <?php if($args['view'] == $tab) {?>selected="selected" <?php } ?> value=" <?php echo $mod_strings["LBL_".$args['calendar']->get_view_name($tab)]; ?> " title="<?php echo $mod_strings["LBL_".$args['calendar']->get_view_name($tab)]; ?>" onclick="window.location.href='index.php?module=ECalendar&action=index&view=<?php echo $tab; ?><?php echo $args['calendar']->date_time->get_date_str(); ?>'">&nbsp;
<?php } ?>
</td>
</tr>
</table>

<?php

	}

	/////////////////////////////////
	// template
	/////////////////////////////////
	function template_cal_month_slice(& $args) {
?>
<?php

		template_echo_slice_date($args);
		$newargs = array();
		$cal_arr = array();
		$cal_arr['month'] = $args['slice']->start_time->month;
		$cal_arr['year'] = $args['slice']->start_time->year;
		$newargs['calendar'] = new ECalendar('month', $cal_arr);
		$newargs['calendar']->show_only_current_slice = true;
		$newargs['calendar']->show_activities = false;
		$newargs['calendar']->show_week_on_month_view = false;
		template_calendar_month($newargs);
?>
<?php

	}

	/////////////////////////////////
	// template
	/////////////////////////////////
	function template_echo_slice_activities(& $args) {
		global $app_list_strings, $current_user, $app_strings;

		$count = 0;

		if(empty($args['slice']->acts_arr[$current_user->id])) {
			return;
		}
		foreach($args['slice']->acts_arr[$current_user->id] as $act) {
			$fields = array();
			foreach($act->sugar_bean->field_name_map as $field) {	
					if(!empty($act->sugar_bean->$field['name']))
						$fields[strtoupper($field['name'])] = $act->sugar_bean->$field['name'];
			}
			if($act->sugar_bean->ACLAccess('DetailView') && file_exists('modules/' . $act->sugar_bean->module_dir . '/metadata/additionalDetails.php')) {
				require_once('modules/' . $act->sugar_bean->module_dir . '/metadata/additionalDetails.php');
				$ad_function = 'additionalDetails' . $act->sugar_bean->object_name;
				$results = $ad_function($fields);
				$results['string'] = str_replace(array("&#039", "'"), '\&#039', $results['string']); // no xss!
		
				if(trim($results['string']) == '') $results['string'] = $app_strings['LBL_NONE'];
			}
			
			$extra = "onmouseover=\"return overlib('" . 
					str_replace(array("\rn", "\r", "\n"), array('','','<br />'), $results['string'])
					. "', CAPTION, '{$app_strings['LBL_ADDITIONAL_DETAILS']}"
					. "', DELAY, 200, STICKY, MOUSEOFF, 1000, WIDTH, " 
					.(empty($results['width']) ? '300' : $results['width']) 
					. ", CLOSETEXT, '<img border=0  style=\'margin-left:2px; margin-right: 2px;\' src=".SugarThemeRegistry::current()->getImageURL('close.gif').">', "
					. "CLOSETITLE, '{$app_strings['LBL_ADDITIONAL_DETAILS_CLOSE_TITLE']}', CLOSECLICK, FGCLASS, 'olFgClass', "
					. "CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass');\" "
					. "onmouseout=\"return nd(1000);\" ";
			
					
			$count ++;
			echo '<div style="margin-top: 1px;"><table cellpadding="0" cellspacing="0" 
					border="0" width="100%"><tr>';
			if($act->sugar_bean->object_name == 'Call') { 
				echo '<td>' . SugarThemeRegistry::current()->getImage('Calls','alt="'.$app_list_strings['call_status_dom'][$act->sugar_bean->status].': '.$act->sugar_bean->name.'"') . '</td>
						<td width="100%"><a ' . $extra . ' href="index.php?module=Calls&action=DetailView&record=' . 
						$act->sugar_bean->id . '">' . $app_list_strings['call_status_dom'][$act->sugar_bean->status] . ': ' . $act->sugar_bean->name . '</a></td>';
			} else if($act->sugar_bean->object_name == 'Meeting') { 
				$out = '<td>' . SugarThemeRegistry::current()->getImage('Meetings','alt="'.$app_list_strings['meeting_status_dom'][$act->sugar_bean->status].': '.$act->sugar_bean->name.'"') . '</td>
						<td width="100%"><a ' . $extra . ' href="index.php?module=Meetings&action=DetailView&record=' . 
						$act->sugar_bean->id . '">' . $app_list_strings['meeting_status_dom'][$act->sugar_bean->status] . ': ' . $act->sugar_bean->name .'</a>';
				
				///////////////////////////////////////////////////////////////
				////	MEETING INTEGRATION
				if(method_exists($act->sugar_bean, 'hasIntegratedMeeting')) {
					if($act->sugar_bean->hasIntegratedMeeting()) {
						$out .= $act->sugar_bean->miIcon;
					}
				}
				////	END MEETING INTEGRATION
				///////////////////////////////////////////////////////////////
				$out .= "</td>";
				echo $out;
				
			} else if($act->sugar_bean->object_name == 'Task') {
				echo '<td>' .  SugarThemeRegistry::current()->getImage('Tasks','alt="'.$act->sugar_bean->status.': '.$act->sugar_bean->name.'"') . '</td>
						<td width="100%"><a ' . $extra . ' href="index.php?module=Tasks&action=DetailView&record=' . $act->sugar_bean->id . '">'.$app_list_strings['task_status_dom'][$fields['STATUS']].': ' . $act->sugar_bean->name . '</a></td>';
			}
			echo '</tr></table><div>';
		}
	}

	function template_echo_slice_activities_shared(& $args) {
		global $app_list_strings;
		
		global $shared_user, $timedate;
		$count = 0;
		if(empty($args['slice']->acts_arr[$shared_user->id])) {
			return;
		}
		
		$out = '';
		
		foreach($args['slice']->acts_arr[$shared_user->id] as $act) {
			$count ++;
			echo "<div style=\"margin-top: 1px;\">
			<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" width=\"100%\">";
			
			if($act->sugar_bean->object_name == 'Call') { 
				echo "<tr><td>";
				SugarThemeRegistry::current()->getImage('Calls','alt=\"'.$app_list_strings['call_status_dom'][$act->sugar_bean->status].': '.$act->sugar_bean->name.'\"'); 
				echo "</td>";
	
				if(empty($act->sugar_bean->name)) {
					echo "<td width=\"100%\">";
					echo $timedate->to_display_time($act->sugar_bean->time_start, true, false); 
					echo "</td></tr>";
				} else {
					echo "<td width=\"100%\">
						<a href=\"index.php?module=Calls&action=DetailView&record=".
						$act->sugar_bean->id."\">".
						$app_list_strings['call_status_dom'][$act->sugar_bean->status].":".
						$act->sugar_bean->name."(".
						$timedate->to_display_time($act->sugar_bean->time_start, true, false)."
						)</a></td></tr>";
				}
			} else if($act->sugar_bean->object_name == 'Meeting') { 
				echo "<td>".
					SugarThemeRegistry::current()->getImage('Meetings','alt=\"'.$app_list_strings['meeting_status_dom'][$act->sugar_bean->status].': '.$act->sugar_bean->name.'\"'); 
				echo "</td>";
			
				if(empty($act->sugar_bean->name)) {
					echo "<td width=\"100%\">".
						$timedate->to_display_time($act->sugar_bean->time_start, true, false); 
					echo "</td></tr>";
				} else {
					echo "<td width=\"100%\">
						<a href=\"index.php?module=Meetings&action=DetailView&record=".
						$act->sugar_bean->id."\">".
						$app_list_strings['meeting_status_dom'][$act->sugar_bean->status].":".
						$act->sugar_bean->name."<br>(".
						$timedate->to_display_time($act->sugar_bean->time_start, true, false).")
						</a>";
						
					// MEETING INTEGRATION
					if($act->sugar_bean->hasIntegratedMeeting()) {
						$out .= $act->sugar_bean->miIcon;
					}
					// END MEETING INTEGRATION

					$out .= "</td></tr>";
					echo $out;
				}
			} else if($act->sugar_bean->object_name == 'Task') { 
				echo "<td>".
					SugarThemeRegistry::current()->getImage('Tasks','alt="'.$act->sugar_bean->status.': '.$act->sugar_bean->name.'"'); 
				echo "</td>";
			
				if(empty($act->sugar_bean->name)) {
					echo "<td width=\"100%\">".
						$timedate->to_display_time($act->sugar_bean->time_due, true, false); 
					echo "</td></tr>";
				} else {
					echo "<td width=\"100%\">
						<a href=\"index.php?module=Tasks&action=DetailView&record=".
						$act->sugar_bean->id."\">".
						$act->sugar_bean->status.': '.$act->sugar_bean->name."(".
						$timedate->to_display_time($act->sugar_bean->time_due, true, false).")
						</a></td></tr>";
				}
			}
			echo "</table></div>";
		}
	}

	/////////////////////////////////
	// template
	/////////////////////////////////
	function template_cal_day_slice(& $args) {
		/*
			echo "cale:".$args['calendar']->view;
			echo "cal1:".$args['calendar']->date_time->month;
			echo "cal3:".$args['slice']->date_time->month;
		*/
		if($args['calendar']->show_only_current_slice == false || $args['calendar']->date_time->month == $args['slice']->start_time->month) {
			template_echo_slice_date($args);

			if($args['calendar']->show_activities == true) {
				template_echo_slice_activities($args);
			}

		}
	}

	/////////////////////////////////
	// template
	/////////////////////////////////
	function template_calendar(& $args) {
		global $timedate;
		if(isset($args['size']) && $args['size'] = 'small') {
			$args['calendar']->show_activities = false;
			$args['calendar']->show_week_on_month_view = false;
		}

		$newargs = array();
		$newargs['view'] = $args['view'];
		$newargs['calendar'] = $args['calendar'];
		if(!isset($args['size']) || $args['size'] != 'small') {
			template_cal_tabs($newargs);
		}

		if(isset($_REQUEST['view']) && $_REQUEST['view'] == 'shared') {
			global $ids;
			global $current_user;
			global $mod_strings;
			global $app_list_strings, $current_language, $currentModule, $action, $app_strings;
			$current_module_strings = return_module_language($current_language, 'Calendar');

			$ids = array();
			$user_ids = $current_user->getPreference('shared_ids');
			//get list of user ids for which to display data
			if(!empty($user_ids) && count($user_ids) != 0 && !isset($_REQUEST['shared_ids'])) {
				$ids = $user_ids;
			}
			elseif(isset($_REQUEST['shared_ids']) && count($_REQUEST['shared_ids']) > 0) {
				$ids = $_REQUEST['shared_ids'];
				$current_user->setPreference('shared_ids', $_REQUEST['shared_ids']);
			} else {
				//$ids = get_user_array(false);
				//$ids = array_keys($ids);
				$ids = array($current_user->id);
				
			}


			//get team id for which to display user list

			$team = $current_user->getPreference('team_id');

			if(!empty($team) && !isset($_REQUEST['team_id'])) {
				$team_id = $team;
			}
			elseif(isset($_REQUEST['team_id'])) {
				$team_id = $_REQUEST['team_id'];
				$current_user->setPreference('team_id', $_REQUEST['team_id']);
			} else {
				$team_id = '';
			}

			if(empty($_SESSION['team_id'])) {
				$_SESSION['team_id'] = "";
			}


			$tools = '<div align="right"><a href="index.php?module='.$currentModule.'&action='.$action.'&view=shared" class="tabFormAdvLink">&nbsp;<a href="javascript: toggleDisplay(\'shared_cal_edit\');" class="tabFormAdvLink">'.SugarThemeRegistry::current()->getImage('edit', 'alt="'.$current_module_strings['LBL_EDIT'].'"  border="0"  align="absmiddle"').'&nbsp;'.$current_module_strings['LBL_EDIT'].'</a></div>';

			echo get_form_header($mod_strings['LBL_SHARED_CAL_TITLE'], $tools, false);
			if(empty($_SESSION['shared_ids']))
				$_SESSION['shared_ids'] = "";

			echo "
			<script language=\"javascript\">
			function up(name) {
				var td = document.getElementById(name+'_td');
				var obj = td.getElementsByTagName('select')[0];
				obj =(typeof obj == \"string\") ? document.getElementById(obj) : obj;
				if(obj.tagName.toLowerCase() != \"select\" && obj.length < 2)
					return false;
				var sel = new Array();
			
				for(i=0; i<obj.length; i++) {
					if(obj[i].selected == true) {
						sel[sel.length] = i;
					}
				}
				for(i in sel) {
					if(sel[i] != 0 && !obj[sel[i]-1].selected) {
						var tmp = new Array(obj[sel[i]-1].text, obj[sel[i]-1].value);
						obj[sel[i]-1].text = obj[sel[i]].text;
						obj[sel[i]-1].value = obj[sel[i]].value;
						obj[sel[i]].text = tmp[0];
						obj[sel[i]].value = tmp[1];
						obj[sel[i]-1].selected = true;
						obj[sel[i]].selected = false;
					}
				}
			}
			
			function down(name) {
				var td = document.getElementById(name+'_td');
				var obj = td.getElementsByTagName('select')[0];
				if(obj.tagName.toLowerCase() != \"select\" && obj.length < 2)
					return false;
				var sel = new Array();
				for(i=obj.length-1; i>-1; i--) {
					if(obj[i].selected == true) {
						sel[sel.length] = i;
					}
				}
				for(i in sel) {
					if(sel[i] != obj.length-1 && !obj[sel[i]+1].selected) {
						var tmp = new Array(obj[sel[i]+1].text, obj[sel[i]+1].value);
						obj[sel[i]+1].text = obj[sel[i]].text;
						obj[sel[i]+1].value = obj[sel[i]].value;
						obj[sel[i]].text = tmp[0];
						obj[sel[i]].value = tmp[1];
						obj[sel[i]+1].selected = true;
						obj[sel[i]].selected = false;
					}
				}
			}
			</script>
			
			<div id='shared_cal_edit' style='display: none;'>
			<form name='shared_cal' action=\"index.php\" method=\"post\" >
			<input type=\"hidden\" name=\"module\" value=\"".$currentModule."\">
			<input type=\"hidden\" name=\"action\" value=\"".$action."\">
			<input type=\"hidden\" name=\"view\" value=\"shared\">
			<input type=\"hidden\" name=\"edit\" value=\"0\">
			<table cellpadding=\"0\" cellspacing=\"3\" border=\"0\" align=\"center\">
			<tr><th valign=\"top\"  align=\"center\" colspan=\"2\">
			";

			echo $current_module_strings['LBL_SELECT_USERS'];
			echo "
			</th>
			</tr>
			<tr><td valign=\"top\">";

            echo "
			<table cellpadding=\"1\" cellspacing=\"1\" border=\"0\" class=\"edit view\" align=\"center\">

			<tr>
				<td valign='top' nowrap><b>".$current_module_strings['LBL_FILTER_BY_TEAM']."</b></td>
				<td valign='top' id=\"teams\"><select id=\"team_id\" onchange='this.form.edit.value=1; this.form.submit();' name=\"team_id\">";

			$teams = get_team_array(false);
			array_unshift($teams, '');
			echo get_select_options_with_id($teams, $team_id);
		
			echo "</select></td>
			</tr>
			</table>";

			echo "
            </td><td valign=\"top\">

			<table cellpadding=\"1\" cellspacing=\"1\" border=\"0\" class=\"edit view\" align=\"center\">
			<tr>
				<td valign='top' nowrap><b>".$current_module_strings['LBL_USERS']."</b></td>
				<td valign='top' id=\"shared_ids_td\"><select id=\"shared_ids\" name=\"shared_ids[]\" multiple size='3'>";


			if(!empty($team_id)) {
				
				$team = new Team();
				$team->retrieve($team_id);
				$users = $team->get_team_members();
				$user_ids = array();
				foreach($users as $user) {
					$user_ids[$user->id] = $user->user_name;
				}
				echo get_select_options_with_id($user_ids, $ids);
			} else

				echo get_select_options_with_id(get_user_array(false), $ids);

			echo "	</select></td>
				<td><a onclick=\"up('shared_ids');\">".SugarThemeRegistry::current()->getImage('uparrow_big', 'border="0" style="margin-bottom: 1px;" alt="'.$app_strings['LBL_SORT'].'"')."</a><br>
				<a onclick=\"down('shared_ids');\">".SugarThemeRegistry::current()->getImage('downarrow_big', 'border="0" style="margin-top: 1px;"  alt="'.$app_strings['LBL_SORT'].'"')."</a></td>
			</tr>
			<tr>";
			echo "<td align=\"right\" colspan=\"2\"><input class=\"button\" type=\"submit\" title=\"".$app_strings['LBL_SELECT_BUTTON_TITLE']."\" accessKey=\"".$app_strings['LBL_SELECT_BUTTON_KEY']."\" value=\"".$app_strings['LBL_SELECT_BUTTON_LABEL']."\" /><input class=\"button\" onClick=\"javascript: toggleDisplay('shared_cal_edit');\" type=\"button\" title=\"".$app_strings['LBL_CANCEL_BUTTON_TITLE']."\" accessKey=\"".$app_strings['LBL_CANCEL_BUTTON_KEY']."\" value=\"".$app_strings['LBL_CANCEL_BUTTON_LABEL']."\"/></td>
			</tr>
			</table>
			</td></tr>
			</table>
			</form>";

		} // end "shared" view

		echo "</div></p>
		<script language=\"javascript\">";

		if(isset($_REQUEST['edit']) && $_REQUEST['edit'])
			echo "toggleDisplay('shared_cal_edit');";

		if(isset($_REQUEST['view']) && !empty($_REQUEST['month'])) {
			if($_REQUEST['view'] == 'day') {
			if(ACLController::checkAccess('Calls', 'edit', true)) {
				echo "
				document.CallSave.date_start.value = \"".$timedate->to_display_date($args['calendar']->date_time->get_mysql_date(), false)."\"
				document.CallSave.time_start.value = \"".$timedate->to_display_time($args['calendar']->date_time->get_mysql_time().':00', false)."\"";
			}
			}
		}
		echo "
		function set_dates(date,time)
		{
		document.CallSave.date_start.value = date;
		document.CallSave.time_start.value = time;
		
		}
		</script>
		<table id=\"daily_cal_table_outside\" width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"monthBox\">
		<tr>
		<td>
		  <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"monthHeader\">
		  <tr>
		  <td width=\"1%\" nowrap>";

		if(!isset($args['size']) || $args['size'] != 'small') {
			template_get_previous_calendar($args);
		}

		echo "
		  </td>
		  <td width=\" 98 % \" align=center scope='row'>";

		if(isset( $args['size']) && $args['size'] = 'small')
		{
		?>
		<a style="text-decoration: none;" 
			href="index.php?module=ECalendar&action=index&view=month&<?php echo $args['calendar']->date_time->get_date_str();?>">
<?php

	}
?>
<h3>
<?php template_echo_date_info($args['view'],$args['calendar']->date_time); ?>
</h3>
<?php

	if(isset($args['size']) && $args['size'] = 'small') {
		echo "</a>";
	}
?>

  </td>
  <td align="right" width="1%" nowrap><?php


	if(!isset($args['size']) || $args['size'] != 'small') {
		template_get_next_calendar($args);
	}
?> </td>
  </tr>
  </table>
</td>
</tr>
<tr>
<td class="monthCalBody">
<?php

	if($args['calendar']->view == 'month') {
		template_calendar_month($args);
	} else
		if($args['calendar']->view == 'year') {
			template_calendar_year($args);
		} else
			if($args['calendar']->view == 'shared') {
				
				global $current_user, $shared_user;
				$shared_args = array();
				foreach($args as $key => $val) {
					$shared_args[$key] = $val;
				}
				$shared_args['calendar'] = $args['calendar'];
				$shared_user = new User();
				foreach($ids as $member) {
					$shared_user->retrieve($member);
					$shared_args['calendar']->show_tasks = true;
					$shared_args['calendar']->add_activities($shared_user);
					$shared_args['show_link'] = 'off';
					if(($shared_user->id == $current_user->id))
						$shared_args['show_link'] = 'on';
					echo '<h5 class="calSharedUser">'.$shared_user->full_name.'</h5>';
					template_calendar_horizontal($shared_args);
				}
			} else {
				template_calendar_vertical($args);
			}
?>
</td>
</tr>
<tr>
<td>
  <table width="100%" cellspacing="0" cellpadding="0" class="monthFooter">
  <tr>
  <td width="50%"><?php template_get_previous_calendar($args); ?></td>
  <td align="right" width="50%"><?php template_get_next_calendar($args); ?></td>
  </tr>
  </table>

</td>
</tr>
</table>
<?php


}

function template_calendar_vertical(& $args) {
?>
  <table id="daily_cal_table" border="0" cellpadding="0" cellspacing="1" width="100%">
  <?php

	// need to change these values after we find out what activities
	// occur outside of these values
	$start_slice_idx = $args['calendar']->get_start_slice_idx();
	$end_slice_idx = $args['calendar']->get_end_slice_idx();
	
	$cur_slice_idx = 1;
	for($cur_slice_idx = $start_slice_idx; $cur_slice_idx <= $end_slice_idx; $cur_slice_idx ++) {
		$calendar = $args['calendar'];
		$args['slice'] = $calendar->slice_hash[$calendar->slices_arr[$cur_slice_idx]];
	
	//global $current_user;	
	//foreach($args['slice']->acts_arr[$current_user->id] as $act){
	//	echo 	$act->sugar_bean->id."<br>";;
	//}
	
?>

  <tr>
  <?php template_cal_vertical_slice($args); ?>
  </tr>
  <?php

	}
?>
  </table>
<?php

}

function template_calendar_horizontal(& $args) {
	echo "<table id=\"daily_cal_table\" border=\"0\" cellpadding=\"0\" cellspacing=\"1\" width=\"100%\"><tr>";

	// need to change these values after we find out what activities
	// occur outside of these values
	$start_slice_idx = $args['calendar']->get_start_slice_idx();
	$end_slice_idx = $args['calendar']->get_end_slice_idx();
	$cur_slice_idx = 1;
	for($cur_slice_idx = $start_slice_idx; $cur_slice_idx <= $end_slice_idx; $cur_slice_idx ++) {
		$calendar = $args['calendar'];
		$args['slice'] = $calendar->slice_hash[$calendar->slices_arr[$cur_slice_idx]];

		template_cal_horizontal_slice($args);
	}

	echo "</tr></table>";
}

function template_cal_vertical_slice(& $args) {
	global $timedate;
?>
<th width="1%" id="bodytime">
<?php template_echo_slice_date($args) ; ?>

</td>
<td width="99%" id="bodyitem">

<div style="display:none;" id='<?php echo template_echo_daily_view_24_hour($args); ?>_appt'> <?php

	require_once('modules/Calls/CallFormBase.php');
	$callForm = new CallFormBase();
	echo $callForm->getFormBody('', 'Calls', 'inlineCal'.template_echo_daily_view_24_hour($args).'CallSave', $timedate->to_display_date($args['calendar']->date_time->get_mysql_date(), false), $timedate->to_display_time(template_echo_daily_view_24_hour($args).':00:00', true, false))."<br>";
?></div>

<?php template_echo_slice_activities($args); ?>
</td>
<?php

}

function template_cal_horizontal_slice(& $args) {
	echo "<td width=\"14%\" id=\"bodyItem\" scope='row' valign=\"top\">";

	if($args['show_link'] == 'on') {
		template_echo_slice_date($args);
	} else {
		template_echo_slice_date_nolink($args);
	}

	template_echo_slice_activities_shared($args);

	echo "</td>";
}

function template_calendar_year(& $args) {
	$count = 0;
?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tr>
    <td class="yearCalBody">
  <table id="daily_cal_table" border="0" cellpadding="0"  cellspacing="1" width="100%">
<?php


	for($i = 0; $i < 4; $i ++) {
?>
<tr>
<?php

		for($j = 0; $j < 3; $j ++) {
			$args['slice'] = $args['calendar']->slice_hash[$args['calendar']->slices_arr[$count]];
?>

<td valign="top" align="center" scope='row' class="yearCalBodyMonth"><?php template_cal_month_slice($args); ?></td>

<?php

			$count ++;
		}
?>
</tr>
<?php

	}
?>
</table>
</td>
</tr>
</table>

<?php

}

function template_calendar_month(& $args) {
	global $mod_strings;
?>

<table width="100%" id="daily_cal_table" border="0" cellspacing="1" cellpadding="0" >
  <?php

	// need to change these values after we find out what activities
	// occur outside of these values
	/*
	  $start_slice_idx = $args['calendar']->get_start_slice_idx();
	  $end_slice_idx = $args['calendar']->get_end_slice_idx();
	  $cur_slice_idx = 1;
	*/
	$count = 0;
	if($args['calendar']->slice_hash[$args['calendar']->slices_arr[35]]->start_time->month != $args['calendar']->date_time->month) {
		$rows = 5;
	} else {
		$rows = 6;
	}
?>
<tr class="monthCalBodyTH">
<?php if($args['calendar']->show_week_on_month_view ) { ?>
<th width="1%" scope='row'><?php echo $mod_strings['LBL_WEEK']; ?></th>
<?php } ?>
<?php


	for($i = 0; $i < 7; $i ++) {
		$first_row_slice = $args['calendar']->slice_hash[$args['calendar']->slices_arr[$i]];
?>
<th width="14%"><?php //echo $first_row_slice->start_time->get_day_of_week_short(); ?></th>
<?php

	}
?>
</tr>
<?php


	if(isset($_REQUEST['view']) && $_REQUEST['view'] == 'month') {
		$height_class = "monthViewDayHeight";
	} else
		if(isset($args['size']) && $args['size'] == 'small') {
			$height_class = "";
		} else {
			$height_class = "monthViewDayHeight yearViewDayHeight";
		}

	for($i = 0; $i < $rows; $i ++) {
?>
<tr class="<?php echo $height_class; ?>">
<?php if($args['calendar']->show_week_on_month_view ) { ?>
<td scope='row'><a href="index.php?module=Calendar&action=index&view=week&<?php echo $args['calendar']->slice_hash[$args['calendar']->slices_arr[$count]]->start_time->get_date_str(); ?>"><?php echo $args['calendar']->slice_hash[$args['calendar']->slices_arr[$count + 1]]->start_time->week; ?></a></td>
<?php } ?>
<?php

		for($j = 0; $j < 7; $j ++) {
			$args['slice'] = $args['calendar']->slice_hash[$args['calendar']->slices_arr[$count]];
?>

<td <?php if($j==0 || $j==6) { ?>class="weekEnd"<?php } ?>><?php  template_cal_day_slice($args); ?></td>

<?php

			$count ++;
		}
?>
</tr>
<?php

	}
?>
</table>
<?php

}

function get_current_day(& $args) {
	global $timedate;
	static $user_today_timestamp = null;
	
	// adjust for user's TZ
	if(!isset($user_today_timestamp)) { 
	    $gmt_today = $timedate->get_gmt_db_datetime();
	    $user_today = $timedate->handle_offset($gmt_today, $GLOBALS['timedate']->get_db_date_time_format());
		preg_match_all('/\d*/', $user_today, $matches);
		$matches = $matches[0];
		$user_today_timestamp = mktime($matches[6], $matches[8], '0', $matches[2], $matches[4], $matches[0]);
	}
    
	$slice = $args['slice'];
	if($slice->start_time->get_mysql_date() == date($GLOBALS['timedate']->get_db_date_time_format(), $user_today_timestamp)) {
		return true;
	}
}

function template_echo_daily_view_hour(& $args) {

	$slice = $args['slice'];
	$hour = $slice->start_time->get_hour();
	return $hour;

}

function template_echo_daily_view_24_hour(& $args) {

	$slice = $args['slice'];
	$hour = $slice->start_time->get_24_hour();
	return $hour;

}

function template_echo_slice_date(& $args) {
	global $mod_strings;
    global $timedate;
	$slice = $args['slice'];

	if($slice->view != 'hour') {
		if($slice->start_time->get_day_of_week_short() == 'Sun' || $slice->start_time->get_day_of_week_short() == 'Sat') {
			echo "<a href=\"index.php?module=ECalendar&action=index&view=".$slice->get_view()."&".$slice->start_time->get_date_str()."\" ";
		} else {
			echo "<a href=\"index.php?module=ECalendar&action=index&view=".$slice->get_view()."&".$slice->start_time->get_date_str()."\" ";
		}
	}

	if($slice->view == 'day' &&($args['calendar']->view == 'week')) {
		echo ">";
		echo $slice->start_time->get_day_of_week_short();
		echo "&nbsp;";
		echo $slice->start_time->get_day();
	}
	elseif($args['calendar']->view == 'shared') {
		echo ">";
		echo $slice->start_time->get_day_of_week_short();
		echo "&nbsp;";
		echo $slice->start_time->get_day();
	} else
		if($slice->view == 'day') {
			echo ">";
			if($slice->start_time->get_month() == $args['calendar']->date_time->get_month()) {
				echo $slice->start_time->get_day();
			}
			//echo $slice->start_time->get_day();
		} else
			if($slice->view == 'month') {
				echo ">";
				echo $slice->start_time->get_month_name();
			} else
				if($slice->view == 'hour') {
					if($args['calendar']->toggle_appt == true) {
						echo '<a href="javascript:void  toggleDisplay(\''.$slice->start_time->get_24_hour().'_appt\');">';
					}
                    //Bug 13324, We are now using the users time format instead of a custom AM/PM setting
                    echo $timedate->to_display_time($slice->start_time->get_24_hour() . ":00:00", true, false);
				} else {
					sugar_die("template_echo_slice_date: view not supported");
				}

	echo "</a>";
}

function template_echo_slice_date_nolink(& $args) {
	global $mod_strings;
	$slice = $args['slice'];
	echo $slice->start_time->get_day_of_week_short();
	echo "&nbsp;";
	echo $slice->start_time->get_day();
}

function template_echo_date_info($view, $date_time) {
	global $current_user;
	$dateFormat = $current_user->getUserDateTimePreferences();
	
		
	if($view == 'month') {
	
		if(!isset($GLOBALS['app_strings']['LBL_NOTATION_MONTH']) && empty($GLOBALS['app_strings']['LBL_NOTATION_MONTH']))
			$d_format = "F Y";
		else
			$d_format = $GLOBALS['app_strings']['LBL_NOTATION_MONTH'];
		
		/*for($i=0; $i<strlen($dateFormat['date']); $i++) {
			switch($dateFormat['date']{$i}) {
				case "Y":
					echo " ".$date_time->year;
					break;
				case "m":
					echo " ".$date_time->get_month_name();
					break;
			}
		}*/
		
		echo date($d_format, mktime(0,0,0,$date_time->month,$date_time->day,$date_time->year));	

		
	} else
		if($view == 'week' || $view == 'shared') {
		
			
			if(!isset($GLOBALS['app_strings']['LBL_NOTATION_WEEK']) && empty($GLOBALS['app_strings']['LBL_NOTATION_WEEK']))
				$d_format = "F j Y";
			else
				$d_format = $GLOBALS['app_strings']['LBL_NOTATION_WEEK'];
			
		
			global $first_day_of_a_week;
			$ifrom = 0;
			$ito = 6;
			if($first_day_of_a_week == "Monday"){
				$ifrom++; $ito++;
			}		
			$first_day = $date_time->get_day_by_index_this_week($ifrom);
			$last_day = $date_time->get_day_by_index_this_week($ito);

			/*for($i=0; $i<strlen($dateFormat['date']); $i++) {
				switch($dateFormat['date']{$i}) {
					case "Y":
						echo " ".$first_day->year;
						break;
					case "m":
						echo " ".$first_day->get_month_name();
						break;
					case "d":
						echo " ".$first_day->get_day();
						break;
				}
			}*/
			echo date($d_format, mktime(0,0,0,$first_day->month,$first_day->day,$first_day->year));	
			echo " - ";
			/*for($i=0; $i<strlen($dateFormat['date']); $i++) {
				switch($dateFormat['date']{$i}) {
					case "Y":
						echo " ".$last_day->year;
						break;
					case "m":
						echo " ".$last_day->get_month_name();
						break;
					case "d":
						echo " ".$last_day->get_day();
						break;
				}
			}*/
			
			echo date($d_format, mktime(0,0,0,$last_day->month,$last_day->day,$last_day->year));	
		} else
			if($view == 'day') {
			
				
				if(!isset($GLOBALS['app_strings']['LBL_NOTATION_DAY']) && empty($GLOBALS['app_strings']['LBL_NOTATION_DAY']))
					$d_format = "l F j Y";
				else
					$d_format = $GLOBALS['app_strings']['LBL_NOTATION_DAY'];
				
				
				/*echo $date_time->get_day_of_week()." ";

				for($i=0; $i<strlen($dateFormat['date']); $i++) {
					switch($dateFormat['date']{$i}) {
						case "Y":
							echo " ".$date_time->year;
							break;
						case "m":
							echo " ".$date_time->get_month_name();
							break;
						case "d":
							echo " ".$date_time->get_day();
							break;
					}
				}*/
				
				echo date($d_format, mktime(0,0,0,$date_time->month,$date_time->day,$date_time->year));					
				
			} else
				if($view == 'year') {
					echo $date_time->year;
				} else {
					sugar_die("echo_date_info: date not supported");
				}
}

function template_get_next_calendar(& $args) {
	
	global $mod_strings;
	global $image_path;
?>
<a href="index.php?action=index&module=ECalendar&view=<?php echo $args['calendar']->view; ?>&<?php echo $args['calendar']->get_next_date_str(); ?>">
<?php echo $mod_strings["LBL_NEXT_".$args['calendar']->get_view_name($args['calendar']->view)]; ?>&nbsp;
<?php 
//echo SugarThemeRegistry::current()->getImage('calendar_next','alt="'. $mod_strings["LBL_NEXT_".$args['calendar']->get_view_name($args['calendar']->view)].'" align="absmiddle" border="0"'); 
echo get_image($image_path.'calendar_next','alt="'. $mod_strings["LBL_NEXT_".$args['calendar']->get_view_name($args['calendar']->view)].'" align="absmiddle" border="0"'); 
?>
</a>
<?php

}

function template_get_previous_calendar(& $args) {
	global $mod_strings;
	global $image_path;
?>
<a href="index.php?action=index&module=ECalendar&view=<?php echo $args['calendar']->view; ?>&<?php echo $args['calendar']->get_previous_date_str(); ?>">
<?php 
//echo SugarThemeRegistry::current()->getImage('calendar_previous','alt="'. $mod_strings["LBL_PREVIOUS_".$args['calendar']->get_view_name($args['calendar']->view)].'" align="absmiddle" border="0"'); 
echo get_image($image_path.'calendar_previous','alt="'. $mod_strings["LBL_PREVIOUS_".$args['calendar']->get_view_name($args['calendar']->view)].'" align="absmiddle" border="0"'); 
?>&nbsp;&nbsp;<?php echo $mod_strings["LBL_PREVIOUS_".$args['calendar']->get_view_name($args['calendar']->view)]; ?></a>
<?php

}
?>

