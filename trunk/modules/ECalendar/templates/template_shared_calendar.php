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
/*********************************************************************************

 ********************************************************************************/
include_once("modules/ECalendar/ECalendar.php");
include_once("modules/ECalendar/templates/templates_calendar.php");

function template_shared_calendar(&$args) {
global $current_user;
global $app_strings;
global $mod_strings;
$date_arr= array("activity_focus"=>$args['activity_focus']);
$calendar = new ECalendar("day",$date_arr);
$calendar->show_tasks = false;
$calendar->toggle_appt = false;
foreach($args['users'] as $user)
{
/*
	if ($user->id != $current_user->id)
	{
*/
		$calendar->add_activities($user,'vfb');
/*
	}
*/
}
?>
<p>

<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td><h3><?php echo $mod_strings['LBL_USER_CALENDARS']; ?></h3>
</td>
<td align=right>
<h3><?php template_echo_date_info("day",$calendar->date_time);?></h3>
</td></tr></table>
<table cellpadding="0" cellspacing="0" width="100%" border="0" class="list view">
        <tr height="20">
        <td scope="col" width="25%" ><?php echo $app_strings['LBL_LIST_NAME']; ?></td>
<?php
 $start_slice_idx = $calendar->get_start_slice_idx();
  $end_slice_idx = $calendar->get_end_slice_idx();
  $cur_slice_idx = 1;
  $slice_args = array();
  for($cur_slice_idx=$start_slice_idx;$cur_slice_idx<=$end_slice_idx;$cur_slice_idx++)
  {
        $slice_args['slice'] = $calendar->slice_hash[$calendar->slices_arr[$cur_slice_idx]];
        $slice_args['calendar'] = $calendar;
        //print_r($cur_time);
  ?>
	<td ><?php template_echo_slice_date($slice_args) ; ?></td>
<?php
  }
?>
        </tr>
<?php
$oddRow = true;
foreach($args['users'] as $curr_user)
{

	if($oddRow)
	{
		$row_class = 'oddListRowS1';
	} else
	{
		$row_class = 'evenListRowS1';
	}
	$oddRow = !$oddRow;
?>
<tr height="20" class="<?php echo $row_class; ?>"> 
<td scope="row" valign="top"><a href="index.php?action=DetailView&module=Users&record=<?php echo $curr_user->id; ?>" >
<?php echo $curr_user->full_name; ?></a></td>
<?php
  // loop through each slice for this user and show free/busy
  for($cur_slice_idx=$start_slice_idx;$cur_slice_idx<=$end_slice_idx;$cur_slice_idx++)
  {

  $cur_slice =  $calendar->slice_hash[$calendar->slices_arr[$cur_slice_idx]];

  // if this current activitiy occurs within this time slice
	if ( Calendar::occurs_within_slice($cur_slice,$calendar->activity_focus))
	{
/*
		$got_conflict = 0;
		if ( isset($cur_slice->acts_arr[$curr_user->id]) )
		{
			foreach( $cur_slice->acts_arr[$curr_user->id] as $act)
			{
				if ($act->sugar_bean->id != $calendar->activity_focus->sugar_bean->id)
				{
					$got_conflict = 1;
				}
			}
		}
*/

		if (isset($cur_slice->acts_arr[$curr_user->id]) && count($cur_slice->acts_arr[$curr_user->id]) > 1)
		{
?>

  <td class="listViewCalConflictAppt">&nbsp;</td>
<?php
		} else
		{
?>
  <td class="listViewCalCurrentAppt">&nbsp;</td>
<?php
		}
	}
	else if ( isset($cur_slice->acts_arr[$curr_user->id]))
	{
  ?>
  <td class="listViewCalOtherAppt">&nbsp;</td>
<?php
	}
	else
	{
  ?>
  <td>&nbsp;</td>
<?php
	}
     
  }
?>

</tr>

<?php 
} 
?>
</table>

<table width="100%" cellspacing="2" cellpadding="0" border="0">
<tr height="15">
	<td width="100%"></td>
    <td class="listViewCalCurrentApptLgnd"><img src="<?php echo SugarThemeRegistry::current()->getImageURL('blank.gif'); ?>" alt="<?php echo $mod_strings['LBL_SCHEDULED']; ?>" width="15" height="15">&nbsp;</td>
    <td>&nbsp;<?php echo $mod_strings['LBL_SCHEDULED']; ?>&nbsp;</td>
    <td class="listViewCalOtherApptLgnd"><img src="<?php echo SugarThemeRegistry::current()->getImageURL('blank.gif'); ?>" alt="<?php echo $mod_strings['LBL_BUSY']; ?>" width="15" height="15">&nbsp;</td>
    <td>&nbsp;<?php echo $mod_strings['LBL_BUSY']; ?>&nbsp;</td>
    <td class="listViewCalConflictApptLgnd"><img src="<?php echo SugarThemeRegistry::current()->getImageURL('blank.gif'); ?>" alt="<?php echo $mod_strings['LBL_CONFLICT']; ?>" width="15" height="15">&nbsp;</td>
    <td>&nbsp;<?php echo $mod_strings['LBL_CONFLICT']; ?></td>
</tr>
</table>
</p>
<?php

}

?>
