<?php
/*********************************************************************************
* ECalendar is a Calendar for SugarCRM developed by Letrium, Inc.
* Copyright (C) 2010 Letrium Inc.
*
* This program is free software; you can redistribute it and/or modify it under
* the terms of the GNU General Public License version 3 as published by the
* Free Software Foundation with the addition of the following permission added
* to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
* IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
* OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
*
* This program is distributed in the hope that it will be useful, but WITHOUT
* ANY WARRANTY;  without even the implied warranty of MERCHANTABILITY or FITNESS
* FOR A PARTICULAR PURPOSE. See  the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along with
* this program; if  not, see http://www.gnu.org/licenses or write to the Free
* Software Foundation, Inc., 51  Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
*
* You can contact Letrium Inc. at email address crm@letrium.com.
*
* ECalendar, Copyright (C) Letrium Inc., Yuri Kuznetsov.
*
* In accordance with Section 7(b) of the GNU General Public License version 3,
* these Appropriate Legal Notices must retain the display of the "Letrium" label.
*
*For more information on how to apply and follow the GNU GPL, see http://www.gnu.org/licenses.
********************************************************************************/
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $theme;
global $current_user;


global $first_day_of_a_week;

$first_day_of_a_week = $current_user->getPreference('week_start_day');
if(empty($first_day_of_a_week))
	$first_day_of_a_week = 'Sunday';
	

require_once('modules/ECalendar/templates/templates_calendar.php');
require_once('modules/ECalendar/ECalendar.php');

require_once("modules/ECalendar/functions.php");

require_once("modules/Calls/Call.php");
require_once("modules/Meetings/Meeting.php");

setlocale( LC_TIME ,$current_language);


if(!ACLController::checkAccess('Calendar', 'list', true)){
	ACLController::displayNoAccess(true);
}


if(isset($GLOBALS['sugar_config']['sugar_version']) && $GLOBALS['sugar_config']['sugar_version'] != '5.5.4'){
	$icon = "<a href='index.php?module=".$_REQUEST['module']."&action=index'><img src='".SugarThemeRegistry::current()->getImageURL('icon_Calendar_32.png',false)."' align='absmiddle'></a>";
	echo get_module_title("ECalendar", $icon."<span class='pointer'>&raquo;</span>".$mod_strings['LBL_MODULE_TITLE'], false);
}else
	echo get_module_title("ECalendar", "".$mod_strings['LBL_MODULE_TITLE'], false);
	


if ( empty($_REQUEST['view']))
	$_REQUEST['view'] = 'week';

$date_arr = array();

if ( isset($_REQUEST['ts']))
	$date_arr['ts'] = $_REQUEST['ts'];

if ( isset($_REQUEST['day']))
	$date_arr['day'] = $_REQUEST['day'];

if ( isset($_REQUEST['month']))
	$date_arr['month'] = $_REQUEST['month'];

if ( isset($_REQUEST['week']))
	$date_arr['week'] = $_REQUEST['week'];

if ( isset($_REQUEST['year'])){
	if ($_REQUEST['year'] > 2037 || $_REQUEST['year'] < 1970){
		print("Sorry, calendar cannot handle the year you requested");
		print("<br>Year must be between 1970 and 2037");
		exit;
	}
	$date_arr['year'] = $_REQUEST['year'];
}


function add_zero($t){
	if($t < 10)
		return "0" . $t;
	else
		return $t;
}





// today adjusted for user's timezone
if(empty($date_arr)) {
	global $timedate;
	$gmt_today = $timedate->get_gmt_db_datetime();
	$user_today = $timedate->handle_offset($gmt_today, $GLOBALS['timedate']->get_db_date_time_format());
	preg_match('/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/',$user_today,$matches);
	$date_arr = array(
	      'year'=>$matches[1],
	      'month'=>$matches[2],
	      'day'=>$matches[3],
	      'hour'=>$matches[4],
	      'min'=>$matches[5]
	);
}else{
	$gmt_today = $date_arr['year'] . "-" . add_zero($date_arr['month']) . "-" . add_zero($date_arr['day']);
	$user_today = $timedate->handle_offset($gmt_today, $GLOBALS['timedate']->get_db_date_time_format());	
}

$real_today_unix = to_timestamp($timedate->get_gmt_db_date());


$args['calendar'] = new ECalendar($_REQUEST['view'], $date_arr);

$show_tasks = $current_user->getPreference('show_tasks');
$rec_enabled = $current_user->getPreference('rec_enabled');


$args['calendar']->show_tasks = $show_tasks;

if ($_REQUEST['view'] == 'day' || $_REQUEST['view'] == 'week' || $_REQUEST['view'] == 'month' ){
	global $current_user;
	$args['calendar']->add_activities($current_user);	
}


if($_REQUEST['view'] == 'shared') {


			global $ids;
			global $current_user;
			global $mod_strings;
			global $app_list_strings, $current_language, $currentModule, $action, $app_strings;
			$current_module_strings = return_module_language($current_language, 'ECalendar');

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

			$tools = '<div align="right"><a href="index.php?module='.$currentModule.'&action='.$action.'&view=shared" class="tabFormAdvLink">&nbsp;<a href="javascript: toggleDisplay(\'shared_cal_edit\');" class="tabFormAdvLink">'.get_image('edit', 'alt="'.$current_module_strings['LBL_EDIT_USERLIST'].'"  border="0"  align="absmiddle"').'&nbsp;'.$current_module_strings['LBL_EDIT_USERLIST'].'</a></div>';

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
            </td><td valign=\"top\">

			<table cellpadding=\"1\" cellspacing=\"1\" border=\"0\" class=\"edit view\" align=\"center\">
			<tr>
				<td valign='top' nowrap><b>".$current_module_strings['LBL_USERS']."</b></td>
				<td valign='top' id=\"shared_ids_td\"><select id=\"shared_ids\" name=\"shared_ids[]\" multiple size='8'>";

				echo get_select_options_with_id(get_user_array(false), $ids);

			echo "	</select></td>
				<td><a onclick=\"up('shared_ids');\">".get_image('uparrow_big', 'border="0" style="margin-bottom: 1px;" alt="'.$app_strings['LBL_SORT'].'"')."</a><br>
				<a onclick=\"down('shared_ids');\">".get_image('downarrow_big', 'border="0" style="margin-top: 1px;"  alt="'.$app_strings['LBL_SORT'].'"')."</a></td>
			</tr>
			<tr>";
			echo "<td align=\"right\" colspan=\"2\"><input class=\"button\" type=\"submit\" title=\"".$app_strings['LBL_SELECT_BUTTON_TITLE']."\" accessKey=\"".$app_strings['LBL_SELECT_BUTTON_KEY']."\" value=\"".$app_strings['LBL_SELECT_BUTTON_LABEL']."\" /> <input class=\"button\" onClick=\"javascript: toggleDisplay('shared_cal_edit');\" type=\"button\" title=\"".$app_strings['LBL_CANCEL_BUTTON_TITLE']."\" accessKey=\"".$app_strings['LBL_CANCEL_BUTTON_KEY']."\" value=\"".$app_strings['LBL_CANCEL_BUTTON_LABEL']."\"/></td>
			</tr>
			</table>
			</td></tr>
			</table>
			</form>			
			</div></p>
			";			
				global $current_user, $shared_user;
				
				$shared_user = new User();
				foreach($ids as $member){
					$shared_user->retrieve($member);
					$args['calendar']->add_activities($shared_user);
				}
}


require_once("include/TimeDate.php");
global $timedate;
$ActRecords = array(); 

if($_REQUEST['view'] == "week" ||  $_REQUEST['view'] == "day" || $_REQUEST['view'] == "month" || $_REQUEST['view'] == "shared")
	foreach($args['calendar']->acts_arr2 as $user_id => $acts)
			foreach($acts as $act){
				$newAct = array();
				$newAct['type'] = strtolower($act->sugar_bean->object_name);
				$newAct['name'] = addslashes(html_entity_decode($act->sugar_bean->name,ENT_QUOTES));
				$newAct['user_id'] = $user_id;
				$newAct['assigned_user_id'] = $act->sugar_bean->assigned_user_id;
				$newAct['id'] = $act->sugar_bean->id;	
				
				$beanA = new $act->sugar_bean->object_name();
				$beanA->retrieve($newAct['id']);
					
				$newAct['rec_id_c'] = "";		
				if($newAct['type'] == 'call')
					$newAct['rec_id_c'] = $beanA->call_id_c;
				
				if($newAct['type'] == 'meeting')
					$newAct['rec_id_c'] = $beanA->meeting_id_c;
					
				if($act->sugar_bean->ACLAccess('DetailView')){
					$newAct['detailview'] = 1;
				}else
					$newAct['detailview'] = 0;
				if($act->sugar_bean->ACLAccess('Save')){
					$newAct['editview'] = 1;
				}else
					$newAct['editview'] = 0;
				if(empty($beanA->id)){
					$newAct['detailview'] = 0;
					$newAct['editview'] = 0;
				}
					
					

				$newAct['date_start'] = $act->sugar_bean->date_start;	
				$date_unix = to_timestamp_from_uf($act->sugar_bean->date_start);
				
				if($newAct['type'] == 'task'){
				 	$newAct['date_start'] = $act->sugar_bean->date_due;
				 	//$newAct['date_start'] = $timedate->swap_formats($newAct['date_start'],'Y-m-d H:i:s',$timedate->get_date_time_format());
					$date_unix = to_timestamp_from_uf($newAct['date_start']);	
				}
								
				$newAct['start'] = $date_unix;
				$newAct['time_start'] = timestamp_to_user_formated2($newAct['start'],$GLOBALS['timedate']->get_time_format());
				
				
				if($newAct['type'] == 'task'){
					$newAct['duration_hours'] = 0;
					$newAct['duration_minutes'] = 0;
					//$newAct['date_due'] = $act->sugar_bean->date_due;
				}else{
					$newAct['duration_hours'] = $act->sugar_bean->duration_hours;
					$newAct['duration_minutes'] = $act->sugar_bean->duration_minutes;
				}
				
				if(empty($newAct['duration_hours']))
					$newAct['duration_hours'] = 0;
				if(empty($newAct['duration_minutes']))
					$newAct['duration_minutes'] = 0;
				
				if($newAct['detailview'] == 1){
					$newAct['status'] = $act->sugar_bean->status;
															
				}
				
				$newAct['description'] = $act->sugar_bean->description;
				

				
				$ActRecords[] = $newAct;
			}				


$args['view'] = $_REQUEST['view'];





?>
<script type="text/javascript" language="JavaScript">
<!-- Begin
function toggleDisplay(id){

	if(this.document.getElementById( id).style.display=='none'){
		this.document.getElementById( id).style.display='inline'
		if(this.document.getElementById(id+"link") != undefined){
			this.document.getElementById(id+"link").style.display='none';
		}
	}else{
		this.document.getElementById(  id).style.display='none'
		if(this.document.getElementById(id+"link") != undefined){
			this.document.getElementById(id+"link").style.display='inline';
		}
	}
}
		//  End -->
	</script>
	

<?php 

if($_REQUEST['view'] == "week" ||  $_REQUEST['view'] == "day" || $_REQUEST['view'] == "month" || $_REQUEST['view'] == "year" || $_REQUEST['view'] == "shared"){
	echo "<div style='width: 100%; margin-top: 12px;'>";
	
	echo "<div style='float:left; width: 50%;'>";
	$tabs = array('day', 'week', 'month', 'year', 'shared');
	foreach($tabs as $tab) { 
		?>
		<input type="button" class="button" <?php if($args['view'] == $tab) {?>selected="selected" <?php } ?> value=" <?php echo $mod_strings["LBL_".$args['calendar']->get_view_name($tab)]; ?> " title="<?php echo $mod_strings["LBL_".$args['calendar']->get_view_name($tab)]; ?>" onclick="window.location.href='index.php?module=ECalendar&action=index&view=<?php echo $tab; ?><?php echo $args['calendar']->date_time->get_date_str(); ?>'">&nbsp;
		<?php
	}

	
	echo "</div>";
	echo "<div style='float:left; text-align: right; width: 50%; font-size: 12px;'>";
	if($_REQUEST['view'] != "year")
		echo "<span style='margin-right: 40px;'><label style='cursor: pointer;'>".$GLOBALS['mod_strings']['LBL_WHOLE_DAY']." <input type='checkbox' id='whole_day_checkbox' onclick='toggle_whole_day();' style='position: relative; top:-3px;'></label></span>";	
	echo "<a href='#' class='tabFormAdvLink' onclick='toggle_settings()'><img border='0' align='absmiddle' width='13' height='13' src='".SugarThemeRegistry::current()->getImageURL('edit.gif',false)."'> ".$GLOBALS['mod_strings']['LBL_SETTINGS']."</a>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;</div>";
	echo "<div style='clear: both;'></div>";	
	echo "</div>";


?>
	<div id="settings_div" align="center" style="display:none;"></div>
<?php

	global $mod_strings;
	echo "<div class='monthHeader'>";
		echo "<div style='float: left; width: 20%;'>";
			template_get_previous_calendar($args);
		echo "</div>";
		
		echo "<div style='float: left; width: 60%; text-align: center;'><h3>";
			template_echo_date_info($args['view'],$args['calendar']->date_time);
		echo "</h3></div>";		

		echo "<div style='float: right;'>";
			template_get_next_calendar($args);
		echo "</div>";
		echo "<br style='clear:both; '>";
	echo "</div>";
}




if($_REQUEST['view'] == "week")
	include("PageWeek.php");
else
	if($_REQUEST['view'] == "day")
		include("PageDay.php");	
	else
		if($_REQUEST['view'] == "month")
			include("PageMonth.php");
		else	
			if($_REQUEST['view'] == "year")
				include("PageYear.php");			
			else
				include("PageShared.php");
	
if($_REQUEST['view'] == "week" ||  $_REQUEST['view'] == "day" || $_REQUEST['view'] == "month" || $_REQUEST['view'] == "year" || $_REQUEST['view'] == "shared"){
	echo "<div class='monthFooter'>";
		echo "<div style='float: left;'>";
			template_get_previous_calendar($args);
		echo "</div>";
		echo "<div style='float: right;'>";
			template_get_next_calendar($args);
		echo "</div>";
	echo "</div>";
	echo "<br style='clear:both; '>";
}	

?>
