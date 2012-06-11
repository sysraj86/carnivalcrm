<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/ECalendar/DateTimeUtil.php');

require_once('include/utils/activity_utils.php');

function sort_func_by_act_date2($act0,$act1)
{
	if ($act0->start_time->ts == $act1->start_time->ts)
	{
		return 0;
	}

	return ($act0->start_time->ts < $act1->start_time->ts) ? -1 : 1;
}

class ECalendar 
{

	
	var $view = 'month';
	var $date_time;
	var $slices_arr = array();
        // for monthly calendar view, if you want to see all the
        // days in the grid, otherwise you only see that months
	var $show_only_current_slice = false;
	var $show_activities = true;
	var $show_tasks = true;
	var $activity_focus;
        var $show_week_on_month_view = true;
	var $use_24 = 1;
	var $toggle_appt = true;
	var $slice_hash = array();
	var $shared_users_arr = array();
	
	var $acts_arr2 = array(); // letrium yura

	function ECalendar($view='day',$time_arr=array())
	{
		global $current_user;
		global $sugar_config;
		if ( $current_user->getPreference('time'))
		{
			$time = $current_user->getPreference('time');
		}
		else
		{
			$time = $sugar_config['default_time_format'];
		}
        	
		if( substr_count($time, 'h') > 0)
		{
			$this->use_24 = 0;
		}

		$this->view = $view;

		if ( isset($time_arr['activity_focus']))
		{
			$this->activity_focus =  new ECalendarActivity($time_arr['activity_focus']);
			$this->date_time =  $this->activity_focus->start_time;
		}
		else
		{
			$this->date_time = new DateTimeUtil2($time_arr,true);
		}

		if (!( $view == 'day' || $view == 'month' || $view == 'year' || $view == 'week' || $view == 'shared') )
		{
			sugar_die ("view needs to be one of: day, week, month, shared, or year");
		}

		if ( empty($this->date_time->year))
		{
			sugar_die ("all views: year was not set");
		}
		else if ( $this->view == 'month' &&  empty($this->date_time->month))
		{
			sugar_die ("month view: month was not set");
		}
		else if ( $this->view == 'week' && empty($this->date_time->week))
		{
			sugar_die ("week view: week was not set");
		}
		else if ( $this->view == 'shared' && empty($this->date_time->week))
		{
			sugar_die ("shared view: shared was not set");
		}
		else if ( $this->view == 'day' &&  empty($this->date_time->day) && empty($this->date_time->month))
		{
			sugar_die ("day view: day and month was not set");
		}
		
		// monday start fix
		global $first_day_of_a_week;
		//echo $this->day_of_week;
		if(($view == 'week' || $view == 'shared') && $first_day_of_a_week == "Monday" && $this->date_time->day_of_week == 0){
			$this->date_time = $this->date_time->get_yesterday();
			header("Location: index.php?action=index&module=ECalendar&view=".$this->view."&".$this->date_time->get_date_str());
		}
		// end monday start fix

		$this->create_slices();

	}
	function add_shared_users(&$shared_users_arr)
	{
		$this->shared_users_arr = $shared_users_arr;
	}

	function get_view_name($view)
	{
		if ($view == 'month')
		{
			return "MONTH";
		}
		else if ($view == 'week')
		{
			return "WEEK";
		}
		else if ($view == 'day')
		{
			return "DAY";
		}
		else if ($view == 'year')
		{
			return "YEAR";
		}
		else if ($view == 'shared')
		{
			return "SHARED";
		}
		else
		{
			sugar_die ("get_view_name: view ".$this->view." not supported");
		}
	}

    function isDayView() {
        return $this->view == 'day';
    }

	function get_slices_arr()
	{
		return $this->slices_arr;
	}


	function create_slices()
	{

		global $current_user;


		if ( $this->view == 'month')
		{
			$days_in_month = $this->date_time->days_in_month;

			
			$first_day_of_month = $this->date_time->get_day_by_index_this_month(0);
			$num_of_prev_days = $first_day_of_month->day_of_week;
			// do 42 slices (6x7 grid)
			
			global $first_day_of_a_week;
			$ifrom = 0;
			$ito = 42;
			if($first_day_of_a_week == "Monday"){
				if ($num_of_prev_days == 0) 
					$num_of_prev_days = 7; 
				$ifrom++; $ito++;	
			}


			for($i=$ito;$i < $ito;$i++)
			{
				$slice = new Slice2('day',$this->date_time->get_day_by_index_this_month($i-$num_of_prev_days));
				$this->slice_hash[$slice->start_time->get_mysql_date()] = $slice;
				array_push($this->slices_arr,  $slice->start_time->get_mysql_date());
			}

		}
		else if ( $this->view == 'week' || $this->view == 'shared')
		{
			$days_in_week = 7;
			
			global $first_day_of_a_week;
			$ioffset = 0;
			if($first_day_of_a_week == "Monday")
				$ioffset = 1 ;
			

			for($i=0;$i<$days_in_week;$i++)
			{
				$slice = new Slice2('day',$this->date_time->get_day_by_index_this_week($i + $ioffset));
				$this->slice_hash[$slice->start_time->get_mysql_date()] = $slice;
				array_push($this->slices_arr,  $slice->start_time->get_mysql_date());
			}
		}
		else if ( $this->view == 'day')
		{
			$hours_in_day = 24;

			for($i=0;$i<$hours_in_day;$i++)
			{
				$slice = new Slice2('hour',$this->date_time->get_datetime_by_index_today($i));
				$this->slice_hash[$slice->start_time->get_mysql_date().":".$slice->start_time->hour ] = $slice;
				$this->slices_arr[] =  $slice->start_time->get_mysql_date().":".$slice->start_time->hour;
			}
		}
		else if ( $this->view == 'year')
		{

			for($i=0;$i<12;$i++)
			{
				$slice = new Slice2('month',$this->date_time->get_day_by_index_this_year($i));
				$this->slice_hash[$slice->start_time->get_mysql_date()] = $slice;
				array_push($this->slices_arr,  $slice->start_time->get_mysql_date());
			}
		}
		else
		{
			sugar_die("not a valid view:".$this->view);
		}

	}

	function add_activities($user,$type='sugar') {
		if($this->view == 'week' || $this->view == 'shared') {
			$start_date_time = $this->date_time->get_first_day_of_last_week();
			$end_date_time = $this->date_time->get_first_day_of_next_week();
		} else {
			$start_date_time = $this->date_time;
			$end_date_time = $this->date_time;
		}
		
		if($this->view == 'month'){
			$start_date_time = $this->date_time->get_first_day_of_last_month();
			$end_date_time = $this->date_time->get_first_day_of_next_month();	
		}

		$acts_arr = array();
		if ( $type == 'vfb') {
			$acts_arr = ECalendarActivity::get_freebusy_activities($user, $start_date_time, $end_date_time);
		} else {
			$GLOBALS['log']->debug("in ECalendar.php user->object_name=".$user->object_name);

			//Added for RM  Dec 25 2005 by CareBrains
			if ( $user->object_name == 'User' )
			{ 
				$acts_arr = ECalendarActivity::get_activities($user->id, $this->show_tasks, $start_date_time, $end_date_time, $this->view);
			} else {
	//END			
				$acts_arr = ECalendarActivity::get_res_activities($user->id, $this->show_tasks, $start_date_time, $end_date_time, 'week');
			}
    		}
	    $GLOBALS['log']->debug("in add_activities count(act_arr)=".count($acts_arr));
	    // loop thru each activity for this user
		for ($i = 0;$i < count($acts_arr);$i++) {
				$act = $acts_arr[$i];
	      // get "hashed" time slots for the current activity we are looping through
				$hash_list =DateTimeUtil2::getHashList($this->view,$act->start_time,$act->end_time);

				for($j=0;$j < count($hash_list); $j++) {
					if ( !isset($this->slice_hash[$hash_list[$j]]) || !isset($this->slice_hash[$hash_list[$j]]->acts_arr[$user->id])) {
						$this->slice_hash[$hash_list[$j]]->acts_arr[$user->id] = array();
					}
					$this->slice_hash[$hash_list[$j]]->acts_arr[$user->id][] = $act;
				}
			

				$this->acts_arr2[$user->id][] = $act;
			
		}
		
		
	}

	function occurs_within_slice(&$slice,&$act)
	{
		// if activity starts within this slice
		// OR activity ends within this slice
		// OR activity starts before and ends after this slice
		if ( ( $act->start_time->ts >= $slice->start_time->ts &&
			 $act->start_time->ts <= $slice->end_time->ts )
			||
			( $act->end_time->ts >= $slice->start_time->ts &&
			$act->end_time->ts <= $slice->end_time->ts )
			||
			( $act->start_time->ts <= $slice->start_time->ts &&
			$act->end_time->ts >= $slice->end_time->ts )
		)
		{
			//print "act_start:{$act->start_time->ts}<BR>";
			//print "act_end:{$act->end_time->ts}<BR>";
			//print "slice_start:{$slice->start_time->ts}<BR>";
			//print "slice_end:{$slice->end_time->ts}<BR>";
			return true;
		}

		return false;

	}

	function get_previous_date_str()
	{
		if ($this->view == 'month')
		{
			$day = $this->date_time->get_first_day_of_last_month();
		}
		else if ($this->view == 'week' || $this->view == 'shared')
		{
			$day = $this->date_time->get_first_day_of_last_week();
		}
		else if ($this->view == 'day')
		{
			$day = $this->date_time->get_yesterday();
		}
		else if ($this->view == 'year')
		{
			$day = $this->date_time->get_first_day_of_last_year();
		}
		else
		{
			return "get_previous_date_str: notdefined for this view";
		}
		return $day->get_date_str();
	}

	function get_next_date_str()
	{
		if ($this->view == 'month')
		{
			$day = $this->date_time->get_first_day_of_next_month();
		}
		else
		if ($this->view == 'week' || $this->view == 'shared' )
		{
			$day = $this->date_time->get_first_day_of_next_week();
		}
		else
		if ($this->view == 'day')
		{
			$day = $this->date_time->get_tomorrow();
		}
		else
		if ($this->view == 'year')
		{
			$day = $this->date_time->get_first_day_of_next_year();
		}
		else
		{
			sugar_die("get_next_date_str: not defined for view");
		}
		return $day->get_date_str();
	}

	function get_start_slice_idx()
	{

		if ($this->isDayView())
		{
			$start_at = 8;

			for($i=0;$i < 8; $i++)
			{
				if (count($this->slice_hash[$this->slices_arr[$i]]->acts_arr) > 0)
				{
					$start_at = $i;
					break;
				}
			}
			return $start_at;
		}
		else
		{
			return 0;
		}
	}
	function get_end_slice_idx()
	{
		if ( $this->view == 'month')
		{
			return $this->date_time->days_in_month - 1;
		}
		else if ( $this->view == 'week' || $this->view == 'shared')
		{
			return 6;
		}
		else if ($this->isDayView())
		{
			$end_at = 18;

			for($i=$end_at;$i < 23; $i++)
			{
				if (count($this->slice_hash[$this->slices_arr[$i+1]]->acts_arr) > 0)
				{
					$end_at = $i + 1;
				}
			}


			return $end_at;

		}
		else
		{
			return 1;
		}
	}


}

class Slice2
{
	var $view = 'day';
	var $start_time;
	var $end_time;
	var $acts_arr = array();

	function Slice2($view,$time)
	{
		$this->view = $view;
		$this->start_time = $time;

		if ( $view == 'day')
		{
			$this->end_time = $this->start_time->get_day_end_time();
		}
		if ( $view == 'hour')
		{
			$this->end_time = $this->start_time->get_hour_end_time();
		}

	}
	function get_view()
	{
		return $this->view;
	}

}

// global to switch on the offet

$DO_USER_TIME_OFFSET = false;

class ECalendarActivity
{
	var $sugar_bean;
	var $start_time;
	var $end_time;

	function ECalendarActivity($args)
	{
    // if we've passed in an array, then this is a free/busy slot
    // and does not have a sugarbean associated to it
		global $DO_USER_TIME_OFFSET;

    if ( is_array ( $args ))
    {
       $this->start_time = $args[0];     
       $this->end_time = $args[1];     
       $this->sugar_bean = null;
       return;
    }
 
    // else do regular constructor..

    $sugar_bean = $args;
		global $timedate;
		$this->sugar_bean = $sugar_bean;


		if ($sugar_bean->object_name == 'Task')
		{
	
			$dbDT = $timedate->to_db($this->sugar_bean->date_due);
			$dbDT = $timedate->swap_formats($dbDT,'Y-m-d H:i:s','Y-m-d H:i');
			list($dbDate,$dbTime) = explode(" ",$dbDT);
			
			$this->start_time =DateTimeUtil2::get_time_start(
				$dbDate,
				$dbTime
			);
			if ( empty($this->start_time))
			{
				return null;
			}

			$this->end_time = $this->start_time;
			
			
		}
		else
		{
            // Convert it back to database time so we can properly manage it for getting the proper start and end dates
			list($dbDate,$dbTime) = $timedate->to_db_date_time($this->sugar_bean->date_start, $this->sugar_bean->time_start);
            $this->sugar_bean->time_start = $dbTime;
			$this->start_time =DateTimeUtil2::get_time_start($dbDate,$dbTime);
			
		$this->end_time =DateTimeUtil2::get_time_end(
			$this->start_time,
         		$this->sugar_bean->duration_hours,
        		$this->sugar_bean->duration_minutes
			);
		}

	}

	function get_occurs_within_where_clause($table_name, $rel_table, $start_ts_obj, $end_ts_obj, $field_name='date_start', $view) {
		global $timedate;
		$dtUtilArr = array();
		switch ($view) {
			case 'month':
				$start_ts = $start_ts_obj->get_first_day_of_this_month();
				$end_ts = $end_ts_obj->get_first_day_of_next_month();
				break;
			default:
				// Date for the past 5 days as that is the maximum duration of a single activity
				$dtUtilArr['ts'] = $start_ts_obj->ts - (86400*5);
				$start_ts = new DateTimeUtil2($dtUtilArr, false);
				// Date for the next 5 days as that is the maximum duration of a single activity
				$dtUtilArr['ts'] = $end_ts_obj->ts + (86400*5);
				$end_ts = new DateTimeUtil2($dtUtilArr, false);
				break;
		}
		$start_mysql_date = explode('-', $start_ts->get_mysql_date());
		$start_mysql_date_time = explode(' ',$timedate->handle_offset(date($GLOBALS['timedate']->get_db_date_time_format(), $start_ts->ts), $timedate->dbDayFormat, true));

		$end_mysql_date = explode('-', $end_ts->get_mysql_date());
		$end_mysql_date_time = explode(' ',$timedate->handle_offset(date($GLOBALS['timedate']->get_db_date_time_format(), $end_ts->ts), $timedate->dbDayFormat, true));
			
		$where =  "(". db_convert($table_name.'.'.$field_name,'date_format',array("'%Y-%m-%d'"),array("'YYYY-MM-DD'")) ." >= '{$start_mysql_date_time[0]}' AND ";
		$where .= db_convert($table_name.'.'.$field_name,'date_format',array("'%Y-%m-%d'"),array("'YYYY-MM-DD'")) ." <= '{$end_mysql_date_time[0]}')";
			
		if($rel_table != '') {
			$where .= ' AND '.$rel_table.'.accept_status != \'decline\'';
		} 
		return $where;
	}

  function get_freebusy_activities(&$user_focus,&$start_date_time,&$end_date_time)
  {
 

		  $act_list = array();
      $vcal_focus = new vCal();
      $vcal_str = $vcal_focus->get_vcal_freebusy($user_focus);

      $lines = explode("\n",$vcal_str);

      foreach ($lines as $line)
      {
        $dates_arr = array();
        if ( preg_match('/^FREEBUSY.*?:([^\/]+)\/([^\/]+)/i',$line,$matches))
        {
          $dates_arr[] =DateTimeUtil2::parse_utc_date_time($matches[1]);
          $dates_arr[] =DateTimeUtil2::parse_utc_date_time($matches[2]);
          $act_list[] = new ECalendarActivity($dates_arr); 
        }
      }
		  usort($act_list,'sort_func_by_act_date2');
      return $act_list;
  }


 	function get_activities($user_id, $show_tasks, &$view_start_time, &$view_end_time, $view) {
		global $current_user;
		$act_list = array();
		$seen_ids = array();
		
		
		// get all upcoming meetings, tasks due, and calls for a user
		if(ACLController::checkAccess('Meetings', 'list', $current_user->id == $user_id)) {
			$meeting = new Meeting();

			if($current_user->id  == $user_id) {
				$meeting->disable_row_level_security = true;
			}

			$where = ECalendarActivity::get_occurs_within_where_clause($meeting->table_name, $meeting->rel_users_table, $view_start_time, $view_end_time, 'date_start', $view);
			$focus_meetings_list = build_related_list_by_user_id($meeting,$user_id,$where);
			foreach($focus_meetings_list as $meeting) {
				if(isset($seen_ids[$meeting->id])) {
					continue;
				}
				
				$seen_ids[$meeting->id] = 1;
				$act = new ECalendarActivity($meeting);
	
				if(!empty($act)) {
					$act_list[] = $act;
				}
			}
		}
		
		if(ACLController::checkAccess('Calls', 'list',$current_user->id  == $user_id)) {
			$call = new Call();
	
			if($current_user->id  == $user_id) {
				$call->disable_row_level_security = true;
			}
	
			$where = ECalendarActivity::get_occurs_within_where_clause($call->table_name, $call->rel_users_table, $view_start_time, $view_end_time, 'date_start', $view);
			$focus_calls_list = build_related_list_by_user_id($call,$user_id,$where);
	
			foreach($focus_calls_list as $call) {
				if(isset($seen_ids[$call->id])) {
					continue;
				}
				$seen_ids[$call->id] = 1;
	
				$act = new ECalendarActivity($call);
				if(!empty($act)) {
					$act_list[] = $act;
				}
			}
		}


		if($show_tasks) {
			if(ACLController::checkAccess('Tasks', 'list',$current_user->id == $user_id)) {
				$task = new Task();
	
				$where = ECalendarActivity::get_occurs_within_where_clause('tasks', '', $view_start_time, $view_end_time, 'date_due', $view);
				$where .= " AND tasks.assigned_user_id='$user_id' ";
	
				$focus_tasks_list = $task->get_full_list("", $where,true);
	
				if(!isset($focus_tasks_list)) {
					$focus_tasks_list = array();
				}
	
				foreach($focus_tasks_list as $task) {
					$act = new ECalendarActivity($task);
					if(!empty($act)) {
					$act_list[] = $act;
				}
			}
		}
		}

		usort($act_list,'sort_func_by_act_date2');
		
		return $act_list;
	}

//Added for RM  Dec. 10, 2005 by CareBrains
 	function get_res_activities($res_id,$show_tasks,&$view_start_time,&$view_end_time, $view) {
		global $current_user;
		$act_list = array();
		$seen_ids = array();
		$GLOBALS['log']->debug("Now in get_res_activities res_id=".$res_id);

		// get all upcoming meetings, tasks due, and calls for a user
			$meeting = new Meeting();

			$where = ECalendarActivity::get_occurs_within_where_clause($meeting->table_name, $meeting->rel_resources_table, $view_start_time,$view_end_time, 'date_start', $view);
			$focus_meetings_list = array();
			$focus_meetings_list += build_related_list_by_res_id($meeting,$res_id,$where);
			$GLOBALS['log']->debug("Now in get_res_activities focus_meeting_list=".count($focus_meetings_list));

			foreach($focus_meetings_list as $meeting) {
				if (isset($seen_ids[$meeting->id])) {
					continue;
				}

				$seen_ids[$meeting->id] = 1;
				$act = new ECalendarActivity($meeting);
				$GLOBALS['log']->debug("get_res_activities meeting_id=".$meeting->id);

				if ( ! empty($act)) {
					$act_list[] = $act;
				}
			}
		usort($act_list,'sort_func_by_act_date2');
		return $act_list;
	}
}

?>
