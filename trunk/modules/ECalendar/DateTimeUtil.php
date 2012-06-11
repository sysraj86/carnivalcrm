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

class DateTimeUtil2
{
		var $timezone;
		var $sec;
		var $min;
		var $hour;
		var $zhour;
		var $day;
		var $zday;
		var $day_of_week;
		var $day_of_week_short;
		var $day_of_week_long;
		var $day_of_year;
		var $week;
		var $month;
		var $zmonth;
		var $month_short;
		var $month_long;
		var $year;
		var $am_pm;
		var $tz_offset;

		// unix epoch time
		var $ts;
	function get_time_start( $date_start, $time_start)
	{	
		$match=array();
		
		preg_match("/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})/",$date_start,$match);
		$time_arr = array();
		$time_arr['year'] = $match[1];
		$time_arr['month'] = $match[2];
		$time_arr['day'] = $match[3];

		if ( empty( $time_start) )
		{
			$time_arr['hour'] = 0;
			$time_arr['min'] = 0;
		}
		else
		{
			if (preg_match("/^(\d\d*):(\d\d*):(\d\d*)$/",$time_start,$match))
			{
				$time_arr['hour'] = $match[1];
				$time_arr['min'] = $match[2];
			}
			else if ( preg_match("/^(\d\d*):(\d\d*)$/",$time_start,$match))
			{
				$time_arr['hour'] = $match[1];
				$time_arr['min'] = $match[2];
			}
		}
		return new DateTimeUtil2($time_arr,true);

	}
	function get_time_end( $start_time, $duration_hours,$duration_minutes)
	{
		if ( empty($duration_hours))
		{
			$duration_hours = "00";
		}
		if ( empty($duration_minutes))
		{
			$duration_minutes = "00";
		}

		$added_seconds = ($duration_hours * 60 * 60 + $duration_minutes * 60 ) - 1; 

		$time_arr = array();
		$time_arr['year'] = $start_time->year;
		$time_arr['month'] = $start_time->month;
		$time_arr['day'] = $start_time->day;
		$time_arr['hour'] = $start_time->hour;
		$time_arr['min'] = $start_time->min;
		$time_arr['sec'] = $added_seconds;
		return new DateTimeUtil2($time_arr,true);

	}

	function get_date_str()
	{
		
		$arr = array();
		if ( isset( $this->hour))
		{
		 array_push( $arr, "hour=".$this->hour);
		}
		if ( isset( $this->day))
		{
		 array_push( $arr, "day=".$this->day);
		}
		if ( isset( $this->month))
		{
		 array_push( $arr, "month=".$this->month);
		}
		if ( isset( $this->year))
		{
		 array_push( $arr, "year=".$this->year);
		}
		return  ("&".implode('&',$arr));
	}

	function get_tomorrow()
	{
			$date_arr = array('day'=>($this->day + 1),		
			'month'=>$this->month,
			'year'=>$this->year);

		return new DateTimeUtil2($date_arr,true);
	}
	function get_yesterday()
	{
			$date_arr = array('day'=>($this->day - 1),		
			'month'=>$this->month,
			'year'=>$this->year);

		return new DateTimeUtil2($date_arr,true);
	}

	function get_mysql_date()
	{
		return $this->year."-".$this->zmonth."-".$this->zday;
	}
	function get_mysql_time()
	{
		return $this->hour.":".$this->min;
	}

  function parse_utc_date_time($str)
  {
    preg_match('/(\d{4})(\d{2})(\d{2})T(\d{2})(\d{2})(\d{2})Z/',$str,$matches);

    $date_arr = array(
      'year'=>$matches[1],
      'month'=>$matches[2],
      'day'=>$matches[3],
      'hour'=>$matches[4],
      'min'=>$matches[5]);

      $date_time = new DateTimeUtil2($date_arr,true);

      $date_arr = array('ts'=>$date_time->ts + $date_time->tz_offset);

      return new DateTimeUtil2($date_arr,true);
  }

	function get_utc_date_time()
	{
		return $this->year.$this->zmonth.$this->zday. "T".$this->zhour.$this->min."00Z";
	}

	function get_first_day_of_last_year()
	{
			$date_arr = array('day'=>1,		
			'month'=>1,
			'year'=>($this->year - 1));

		return new DateTimeUtil2($date_arr,true);

	}
	function get_first_day_of_next_year()
	{
			$date_arr = array('day'=>1,		
			'month'=>1,
			'year'=>($this->year + 1));

		return new DateTimeUtil2($date_arr,true);

	}

	function get_first_day_of_next_week()
	{	
		global $first_day_of_a_week;
		$ni = 0;
		if($first_day_of_a_week == "Monday")
			$ni++;			
			
		$first_day = $this->get_day_by_index_this_week($ni);
			$date_arr = array('day'=>($first_day->day + 7),		
			'month'=>$first_day->month,
			'year'=>$first_day->year);

		return new DateTimeUtil2($date_arr,true);

	}
	function get_first_day_of_last_week()
	{
		
		global $first_day_of_a_week;
		$ni = 0;
		if($first_day_of_a_week == "Monday")
			$ni++;
	
		$first_day = $this->get_day_by_index_this_week($ni);
			$date_arr = array('day'=>($first_day->day - 7),		
			'month'=>$first_day->month,
			'year'=>$first_day->year);

		return new DateTimeUtil2($date_arr,true);
	}
	function get_first_day_of_last_month()
	{
		if ($this->month == 1)
		{
			$month = 12;
			$year = $this->year - 1;
		}
		else
		{
			$month = $this->month - 1;
			$year = $this->year ;
		}
			$date_arr = array('day'=>1,		
			'month'=>$month,
			'year'=>$year);

		return new DateTimeUtil2($date_arr,true);

	}
	function get_first_day_of_this_month()
	{
		$month = $this->month;
		$year = $this->year ;
		$date_arr = array('day'=>1,		
		'month'=>$month,
		'year'=>$year);

		return new DateTimeUtil2($date_arr,true);

	}	
	function get_first_day_of_next_month()
	{
		$date_arr = array('day'=>1,		
			'month'=>($this->month + 1),
			'year'=>$this->year);
		return new DateTimeUtil2($date_arr,true);
	}


	function fill_in_details()
	{
		global $mod_strings;
		$hour = 0;
		$min = 0;
		$sec = 0;
		$day = 1;
		$month = 1;
		$year = 1970;

		if ( isset($this->sec))
		{
			$sec = $this->sec;
		}
		if ( isset($this->min))
		{
			$min = $this->min;
		}
		if ( isset($this->hour))
		{
			$hour = $this->hour;
		}
		if ( isset($this->day))
		{
			$day= $this->day;
		}
		if ( isset($this->month))
		{
			$month = $this->month;
		}
		if ( isset($this->year))
		{
			$year = $this->year;
		}
		else
		{
			sugar_die ("fill_in_details: year was not set");
		}
		$this->ts = mktime($hour,$min,$sec,$month,$day,$year);
		$this->load_ts($this->ts);

	}

	function load_ts($timestamp)
	{
	//	global $mod_list_strings;
		global $current_language;
		$mod_list_strings = return_mod_list_strings_language($current_language,"ECalendar");
		if ( empty($timestamp))
		{
		
			$timestamp = time();
		}

		$this->ts = $timestamp;
   		global $timedate;

		$date_str = date('i:G:H:j:d:t:w:z:L:W:n:m:Y:Z',$timestamp);
		$tdiff = $timedate->adjustmentForUserTimeZone();
		list(
		$this->min,
		$this->hour,
		$this->zhour,
		$this->day,
		$this->zday,
		$this->days_in_month,
		$this->day_of_week,
		$this->day_of_year,
		$is_leap,
		$this->week,
		$this->month,
		$this->zmonth,
		$this->year,
		$this->tz_offset)
		 = explode(':',$date_str);
		$this->tz_offset = date('Z') - $tdiff * 60;
		
		$this->day_of_week_short =$mod_list_strings['dom_cal_weekdays'][$this->day_of_week];
		$this->day_of_week_long=$mod_list_strings['dom_cal_weekdays_long'][$this->day_of_week];
		$this->month_short=$mod_list_strings['dom_cal_month'][$this->month];
		$this->month_long=$mod_list_strings['dom_cal_month_long'][$this->month];

		$this->days_in_year = 365;

		if ($is_leap == 1)
		{
			$this->days_in_year += 1;
		}


	}

	function DateTimeUtil2(&$time,$fill_in_details)
	{	
		if (! isset( $time) || count($time) == 0 )
		{
			$this->load_ts(null);
		}
		else if ( isset( $time['ts']))
		{
			$this->load_ts($time['ts']);
		}
		else if ( isset( $time['date_str']))
		{
			list($this->year,$this->month,$this->day)= 
				explode("-",$time['date_str']);
			if ($fill_in_details == true)
			{
				$this->fill_in_details();
			}
		}
		else
		{
			if ( isset($time['sec']))
			{
        			$this->sec = $time['sec'];
			}
			if ( isset($time['min']))
			{
        			$this->min = $time['min'];
			}
			if ( isset($time['hour']))
			{
        			$this->hour = $time['hour'];
			}
			if ( isset($time['day']))
			{
        			$this->day = $time['day'];
			}
			if ( isset($time['week']))
			{
        			$this->week = $time['week'];
			}
			if ( isset($time['month']))
			{
        			$this->month = $time['month'];
			}
			if ( isset($time['year']) && $time['year'] >= 1970)
			{
        			$this->year = $time['year'];
			}
			else
			{
				return null;
			}

			if ($fill_in_details == true)
			{
				$this->fill_in_details();
			}

		}
	}

	function dump_date_info()
	{
		echo "min:".$this->min."<br>\n";
		echo "hour:".$this->hour."<br>\n";
		echo "day:".$this->day."<br>\n";
		echo "month:".$this->month."<br>\n";
		echo "year:".$this->year."<br>\n";
	}

	function get_hour()
	{
		$hour = $this->hour;
		if ($this->hour > 12)
		{
			$hour -= 12;
		}
		else if ($this->hour == 0)
		{
			$hour = 12;
		}
		return $hour;
	}
	
	function get_24_hour()
	{
		return $this->hour;
	}
	
	function get_am_pm()
	{
		if ($this->hour >=12)
		{
			return "PM";
		}
		return "AM";
	}
	
	function get_day()
	{
		return $this->day;
	}

	function get_month()
	{
		return $this->month;
	}

	function get_day_of_week_short()
	{
		return $this->day_of_week_short;
	}
	function get_day_of_week()
	{
		return $this->day_of_week_long;
	}


	function get_month_name()
	{
		return $this->month_long;
	}

	function get_datetime_by_index_today($hour_index)
	{
		$arr = array();

		if ( $hour_index < 0 || $hour_index > 23  )
		{
			sugar_die("hour is outside of range");
		}

		$arr['hour'] = $hour_index;
		$arr['min'] = 0;
		$arr['day'] = $this->day;

		$arr['month'] = $this->month;
		$arr['year'] = $this->year;

		return new DateTimeUtil2($arr,true);
	}

	function get_hour_end_time()
	{
		$arr = array();
		$arr['hour'] = $this->hour;
		$arr['min'] = 59;
		$arr['sec'] = 59;
		$arr['day'] = $this->day;

		$arr['month'] = $this->month;
		$arr['year'] = $this->year;

		return new DateTimeUtil2($arr,true);
	}

	function get_day_end_time()
	{
		$arr = array();
		$arr['hour'] = 23;
		$arr['min'] = 59;
		$arr['sec'] = 59;
		$arr['day'] = $this->day;

		$arr['month'] = $this->month;
		$arr['year'] = $this->year;

		return new DateTimeUtil2($arr,true);
	}

	function get_day_by_index_this_week($day_index)
	{
		$arr = array();

		global $first_day_of_a_week;
		$ifrom = 0;
		$ito = 6;
		if($first_day_of_a_week == "Monday"){
			$ifrom++; $ito++;
		}

		if ( $day_index < $ifrom || $day_index > $ito  )
		{
			sugar_die("day is outside of week range");
		}

		$arr['day'] = $this->day + 
			($day_index - $this->day_of_week);

		$arr['month'] = $this->month;
		$arr['year'] = $this->year;

		return new DateTimeUtil2($arr,true);
	}
	function get_day_by_index_this_year($month_index)
	{
		$arr = array();
		$arr['month'] = $month_index+1;
		$arr['year'] = $this->year;
		// wp: Find the last day of the month requested, ensure that is the ceiling of the day param
		$arr['day'] = min(strftime("%d", mktime(0, 0, 0, $arr['month']+1, 0, $arr['year'])), $this->day);

		return new DateTimeUtil2($arr,true);
	}

	function get_day_by_index_this_month($day_index)
	{
		$arr = array();
		$arr['day'] = $day_index + 1;
		$arr['month'] = $this->month;
		$arr['year'] = $this->year;

		return new DateTimeUtil2($arr,true);
	}

	function getHashList($view, &$start_time, &$end_time)
	{
		$hash_list = array();
        
        if (version_compare(phpversion(), '5.0') < 0) 
            $new_time = $start_time;
        else 
            $new_time = clone($start_time);
        
		$arr = array();

		if ( $view != 'day')
		{
		  $end_time = $end_time->get_day_end_time();
		}


		if (empty($new_time->ts))
		{
			return;
		}

		if ( $new_time->ts == $end_time->ts)
		{
			$end_time->ts+=1;
		}

		 while( $new_time->ts < $end_time->ts)
		 {
		     
		  $arr['month'] = $new_time->month;
		  $arr['year'] = $new_time->year;
		  $arr['day'] = $new_time->day;
		  $arr['hour'] = $new_time->hour;
		  if ( $view == 'day')
		  {
		   $hash_list[] = $new_time->get_mysql_date().":".$new_time->hour;
		   $arr['hour'] += 1;
		  }
		  else
		  {
		   $hash_list[] = $new_time->get_mysql_date();
		   $arr['day'] += 1;
		  }
		  $new_time = new DateTimeUtil2($arr,true);
    }
		return $hash_list;
	}

}

?>
