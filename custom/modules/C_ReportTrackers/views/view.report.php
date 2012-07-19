<?php

class C_ReportTrackersViewReport extends SugarView {

	function C_ReportTrackersViewReport() {
 		parent::SugarView();
	}

	function display() {


global $db;
global $app_strings;
global $app_list_strings;
global $mod_strings;
global $theme;
global $currentModule;
global $current_language;
global $gridline;
global $current_user;
global $sugar_flavor;

require_once("custom/modules/".$currentModule."/calendar.class.php");
require_once("custom/modules/".$currentModule."/cms_seo.class.php");
require_once("custom/modules/".$currentModule."/db_criteria.class.php");


$theme_path = "themes/".$theme."/";
$image_path = $theme_path."images/";

$image_path_default = "themes/default/images/";

require_once($theme_path.'layout_utils.php');


if (empty($_REQUEST['user_id'])) $_REQUEST['user_id'] = '';


// display the form, or problem


if (empty($_REQUEST['start_date'])) $_REQUEST['start_date'] = date("m")."/01/".date("Y");

if (empty($_REQUEST['end_date'])) $_REQUEST['end_date'] = '';

//var_dump($_REQUEST);
?>

<h1><?php echo $mod_strings['LBL_TITLE']; ?></h1>

<p><div>

<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr>
<tr><td class="tabForm">
<form name=reportfm action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
<input type="hidden" name="module" value="<?php echo $currentModule; ?>">
<input type="hidden" name="action" value="report" />
<strong><?php echo $mod_strings['LBL_OPTIONS']; ?></strong> 
&nbsp;<br /><br />
<strong><?php echo $mod_strings['LBL_USER']; ?></strong> &nbsp;
<select size="1" style="margin:0;" name="user_id">
<?php
// Get the current users.
$query = "SELECT *, user_name as username FROM users WHERE 1 ORDER BY user_name ASC";
//var_dump($query);
$result = $db->query($query);
while ($row = $db->fetchByAssoc($result)) {
	$users[$row['id']] = $row;
?>
<option<?php if ($row['id'] == $_REQUEST['user_id']) { echo ' selected="selected"'; } ?> 
	value="<?php echo $row['id']; ?>"><?php echo $row['first_name'].' '.$row['last_name'].' ('.$row['user_name'].')'; ?>
<?php
}
?>
</select>
&nbsp;<br /><br />
<strong><?php echo $mod_strings['LBL_START_DATE']; ?></strong>
<input autocomplete="off" type="text" name="start_date" id="start_date" 
value="<?php echo htmlspecialchars($_REQUEST['start_date']); ?>" title='' tabindex='1' size="11" maxlength="10">
<img border="0" src="themes/default/images/jscalendar.gif" alt="Start Date" id="start_date_trigger" align="absmiddle" />
<script type="text/javascript">
Calendar.setup ({
inputField : "start_date",
daFormat : "%m/%d/%Y",
button : "start_date_trigger",
singleClick : true,
dateStr : "12/19/2009",
step : 1
}
);
</script>
&nbsp;
<strong><?php echo $mod_strings['LBL_END_DATE']; ?></strong>
<input autocomplete="off" type="text" name="end_date" id="end_date" 
value="<?php echo htmlspecialchars($_REQUEST['end_date']); ?>" title='' tabindex='1' size="11" maxlength="10">
<img border="0" src="themes/default/images/jscalendar.gif" alt="End Date" id="end_date_trigger" align="absmiddle" />
<script type="text/javascript">
Calendar.setup ({
inputField : "end_date",
daFormat : "%m/%d/%Y",
button : "end_date_trigger",
singleClick : true,
dateStr : "12/19/2009",
step : 1
}
);
</script>
&nbsp;
<span class="FontSoftSmall">(mm/dd/yyyy)</span>
<br /><br />
<input class="button" type="submit" name="submit" value="<?php echo $mod_strings['LBL_REPORT']; ?>" align="bottom">
<input type="hidden" name="report_trigger" value="yes">
</form>
</td></tr></table>


<table border="0" cellpadding="0" cellspacing="0" width="730">
<tr><td align="left"><br /></td></tr></table>



<?php
if (!empty($_REQUEST['report_trigger'])) { 
?>



<table border="0" cellpadding="0" cellspacing="3" width="100%" class="h3Row"><tr>
<td align="left" valign="top" colspan="2"><img src="<?php echo $image_path_default; ?>spacer.gif" 
alt="spacer" width="10" height="2" border="0"><h3 style="margin: 0px;"><?php echo $mod_strings['LBL_RESULT']; ?></h3><img 
src="<?php echo $image_path_default; ?>spacer.gif" alt="spacer" width="10" height="2" border="0"></td>
</tr></table>

<table border="0" cellpadding="0" cellspacing="0" width="100%"><tr>
<tr><td class="tabForm">
<strong>ID: </strong> <?php echo $_REQUEST['user_id']; ?><br />
<strong><?php echo $mod_strings['LBL_USER']; ?>: </strong> <?php echo $users[$_REQUEST['user_id']]['first_name'].' '.$users[$_REQUEST['user_id']]['last_name']; ?><br />
<strong><?php echo $mod_strings['LBL_USERNAME']; ?>: </strong>  <?php echo $users[$_REQUEST['user_id']]['user_name']; ?><br />
<br />
<?php

/*
CREATE TABLE `tracker` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` varchar(36) default NULL,
  `module_name` varchar(255) default NULL,
  `item_id` varchar(36) default NULL,
  `item_summary` varchar(255) default NULL,
  `date_modified` datetime default NULL,
  `action` varchar(255) default NULL,
  `session_id` int(11) default NULL,
  `visible` tinyint(1) default '0',
  PRIMARY KEY  (`id`),
  KEY `idx_tracker_iid` (`item_id`),
  KEY `idx_tracker_userid_vis_id` (`user_id`,`visible`,`id`),
  KEY `idx_tracker_userid_itemid_vis` (`user_id`,`item_id`,`visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=388878 ;
*/

// Search Criteria Definition
$search_criteria_definition = array(
	array(
		'name' => 'id',
		'field_names' => 'id',
		'condition' => '=',
		'type' => 'string',
		'case_sensitive' => false,
		'exact_match' => false,
	),
	array(
		'name' => 'start_date',
		'field_names' => 'date_modified',
		'condition' => '>=',
		'type' => 'date',
		'case_sensitive' => false,
		'exact_match' => false,
	),
	array(
		'name' => 'end_date',
		'field_names' => 'date_modified ',
		'condition' => '<=',
		'type' => 'date',
		'case_sensitive' => false,
		'exact_match' => false,
	),
	array(
		'name' => 'user_id',
		'field_names' => 'user_id',
		'condition' => '=',
		'type' => 'string',
		'case_sensitive' => false,
		'exact_match' => false,
	),
);

$cal = new cms_calendar();

// Adjust the ending date value.
if (!empty($_REQUEST['end_date'])) $_REQUEST['end_date'] = $cal->format_date_yyyymmdd_to_mmddyyyy($cal->add_delta_ymd($cal->format_date_mmddyyyy_to_yyyymmdd($_REQUEST['end_date']), 0, 0, 1));

// Get the calls GROUP'ed by date and user
$criteria = new db_criteria();
$criteria->criteria_definition = $search_criteria_definition;
$criteria->request = $_REQUEST;
$where_criteria = $criteria->mysql_build_criteria_expression();
if (empty($where_criteria)) $where_criteria = '1';

$query = "SELECT *, CONVERT_TZ(date_modified, '+00:00', '+07:00') AS moddate FROM tracker ".
		" WHERE deleted != 1 && ".$where_criteria." ".
		" ORDER BY date_modified DESC LIMIT 10000";
//var_dump($query);
$result = $db->query($query);

?>
<h2><?php echo $mod_strings['LBL_ACTIVITY']; ?></h2>
<br />

<table border="0" cellpadding="5" cellspacing="0" width="100%">

<tr class="listViewThS1">
<td class="listViewThS1" width="20%" nowrap="nowrap"><strong>Module</strong></td>
<td class="listViewThS1" width="40%"><strong><?php echo $mod_strings['LBL_SUMMARY']; ?></strong></td>
<td class="listViewThS1" width="20%" nowrap="nowrap"><strong><?php echo $mod_strings['LBL_ACTION']; ?></strong></td>
<td class="listViewThS1" width="20%" nowrap="nowrap"><strong><?php echo $mod_strings['LBL_DATETIME']; ?></strong></td>
</tr>
<?php
$cnt = 0;
while ($row = $db->fetchByAssoc($result)) {
?>
	<tr class="<?php if ($cnt%2 == 0) { echo 'tabDetailViewDL2'; } else { echo 'tabDetailViewDF2'; } ?>">
<?php
	$cnt++;
?>
	<td class="<?php if ($cnt%2 == 0) { echo 'tabDetailViewDL2'; } else { echo 'tabDetailViewDF2'; } ?>"><?php echo htmlspecialchars($app_list_strings['moduleList'][$row['module_name']]); ?></td>
	<td class="<?php if ($cnt%2 == 0) { echo 'tabDetailViewDL2'; } else { echo 'tabDetailViewDF2'; } ?>"><?php echo htmlspecialchars($row['item_summary']); ?></td>
	<td class="<?php if ($cnt%2 == 0) { echo 'tabDetailViewDL2'; } else { echo 'tabDetailViewDF2'; } ?>"><?php 
	if ($row['action'] == 'index') {
		echo '<a href="index.php?module='.urlencode($row['module_name']).'&action=index">'.htmlspecialchars($row['action']).'</a>';
	} elseif ($row['action'] == 'detailview') {
		echo '<a href="index.php?module='.urlencode($row['module_name']).'&action=DetailView&record='.$row['item_id'].'">'.htmlspecialchars($row['action']).'</a>';
	} else {
		echo htmlspecialchars($row['action']);
	}
	?></td>
	<td class="<?php if ($cnt%2 == 0) { echo 'tabDetailViewDL2'; } else { echo 'tabDetailViewDF2'; } ?>" nowrap="nowrap"><?php echo htmlspecialchars($row['moddate']); ?> GMT</td>
	</tr>
<?php
}
?>
</table>
<p>
<br/>
<b><?php echo $mod_strings['LBL_TOTAL']; ?>: <?php echo $cnt; ?></b>
</p>

<?php
} // end of if ($_REQUEST['report_trigger']
?>


</p></div>



<?php

	} // end of display
} // end of class

?>
