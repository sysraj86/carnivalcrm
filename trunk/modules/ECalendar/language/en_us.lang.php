<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


$mod_strings = array (
  'LBL_MODULE_NAME'=>'ECalendar',
  'LBL_MODULE_TITLE'=>'ECalendar',
  'LNK_NEW_CALL' => 'Schedule Call',
  'LNK_NEW_MEETING' => 'Schedule Meeting',
  'LNK_NEW_APPOINTMENT' => 'Create Appointment',
  'LNK_NEW_TASK' => 'Create Task',
  'LNK_CALL_LIST' => 'Calls',
  'LNK_MEETING_LIST' => 'Meetings',
  'LNK_TASK_LIST' => 'Tasks',
  'LNK_VIEW_CALENDAR' => 'Today',
  'LNK_IMPORT_CALLS'=>'Import Calls',
  'LNK_IMPORT_MEETINGS'=>'Import Meetings',
  'LNK_IMPORT_TASKS'=>'Import Tasks',
  'LBL_MONTH' => 'Month',
  'LBL_DAY' => 'Day',
  'LBL_YEAR' => 'Year',
  'LBL_WEEK' => 'Week',
  'LBL_PREVIOUS_MONTH' => 'Previous Month',
  'LBL_PREVIOUS_DAY' => 'Previous Day',
  'LBL_PREVIOUS_YEAR' => 'Previous Year',
  'LBL_PREVIOUS_WEEK' => 'Previous Week',
  'LBL_NEXT_MONTH' => 'Next Month',
  'LBL_NEXT_DAY' => 'Next Day',
  'LBL_NEXT_YEAR' => 'Next Year',
  'LBL_NEXT_WEEK' => 'Next Week',
  'LBL_AM' => 'AM',
  'LBL_PM' => 'PM',
  'LBL_SCHEDULED' => 'Scheduled',
  'LBL_BUSY' => 'Busy',
  'LBL_CONFLICT' => 'Conflict',
  'LBL_USER_CALENDARS' => 'User Calendars',
  'LBL_SHARED' => 'Shared',
  'LBL_PREVIOUS_SHARED' => 'Previous',
  'LBL_NEXT_SHARED' => 'Next',
  'LBL_SHARED_CAL_TITLE' => 'Shared Calendar',
  'LBL_USERS' => 'User',
  'LBL_REFRESH' => 'Refresh',
  'LBL_EDIT_USERLIST' => 'Edit Userlist',
  'LBL_SELECT_USERS' => 'Select users for calendar display',
  'LBL_FILTER_BY_TEAM' => 'Filter user list by team:',
  'LBL_ASSIGNED_TO_NAME' => 'Assigned to',
  'LBL_DATE' => 'Start Date & Time',



//other
  'LBL_YES' => 'Yes',
  'LBL_NO' => 'No',
  'LBL_SETTINGS' => 'Settings',
  'LBL_CREATE_NEW_RECORD' => 'Create New Activity',
  'LBL_LOADING' => 'Loading.........',
  'LBL_SAVING' => 'Saving.........',
  'LBL_EDIT_RECORD' => 'Edit Activity',
  'LBL_ERROR_SAVING' => 'Error while saving',
  'LBL_ERROR_LOADING' => 'Error while loading',
  'LBL_ANOTHER_BROWSER' => 'Please try another browser to add more teams.',
  'LBL_FIRST_TEAM' => 'Sorry. You can not remove the first item.',
  'LBL_REMOVE_PARTICIPANTS' => 'You can not remove all invitees.',

//info box
'LBL_I_DESC'=>'Description',
'LBL_I_START_DT'=>'Start Date Time',
'LBL_I_DUE_DT'=>'Due Date Time',
'LBL_I_DURATION'=>'Duration',
'LBL_I_TITLE'=>'Additional Details',
'LBL_I_NAME'=>'Subject',

//recurrence tab
'LBL_REPEAT_END_DATE'=>'End Date',
'LBL_REPEAT_INTERVAL'=>'Repeat Interval',
'LBL_REPEAT_TYPE'=>'Repeat Type',
'LBL_REPEAT_DAYS'=>'Repeat Days',

//genaral tab
'LBL_WHOLE_DAY'=>'Whole day',

//validation msg
'LBL_NO_USER'=>'No match for field: Assigned to',
'LBL_SUBJECT'=>'Subject',
'LBL_DURATION'=>'Duration',
'LBL_STATUS'=>'Status',
'LBL_DATE_TIME'=>'Date and Time',

'LBL_RECURRENCE'=>'Recurrence',

//settings box
'LBL_SETTINGS_WEEK_STARTS'=>'First day of week:', 
'LBL_SETTINGS_TIME_STARTS'=>'Start time:', 
'LBL_SETTINGS_TIME_ENDS'=>'End time:', 
'LBL_SETTINGS_TASKS_SHOW'=>'Show tasks:', 
'LBL_SETTINGS_TITLE'=>'Settings:',
'LBL_SETTINGS_RECURRENCE'=>'Recurrence:',

//buttons
'LBL_SAVE_BUTTON'=>'Save',
'LBL_DELETE_BUTTON'=>'Delete',
'LBL_APPLY_BUTTON'=>'Apply',
'LBL_CANCEL_BUTTON'=>'Cancel',
'LBL_CLOSE_BUTTON'=>'Close',

//tabs
'LBL_GENERAL_TAB'=>'Details',
'LBL_PARTICIPANTS_TAB' =>'Invitees',
'LBL_RECURENCE_TAB' =>'Recurrence',

'repeat_types' => array(
	''	=>	'None',
	'Daily'	=>	'Daily',
	'Weekly' =>	'Weekly',
	'Monthly' =>	'Monthly',
	'Yearly' =>	'Yearly',
),
  
);

$mod_list_strings = array(
	'dom_cal_weekdays'=>
		array(
			"Sun",
			"Mon",
			"Tue",
			"Wed",
			"Thu",
			"Fri",
			"Sat",
		),
	'dom_cal_weekdays_long'=>
		array(
			"Sunday",
			"Monday",
			"Tuesday",
			"Wednesday",
			"Thursday",
			"Friday",
			"Saturday",
		),
	'dom_cal_month'=>
		array(
			"",
			"Jan",
			"Feb",
			"Mar",
			"Apr",
			"May",
			"Jun",
			"Jul",
			"Aug",
			"Sep",
			"Oct",
			"Nov",
			"Dec",
		),
	'dom_cal_month_long'=>
		array(
			"",
			"January",
			"February",
			"March",
			"April",
			"May",
			"June",
			"July",
			"August",
			"September",
			"October",
			"November",
			"December",
		),
);
?>
