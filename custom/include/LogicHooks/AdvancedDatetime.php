<?php



/*******************************************************************************
 * This file is integral part of the project "Advanced Datetime" for SugarCRM.
 * 
 * "Advanced Datetime" is a project created by: 
 * Dispage - Patrizio Gelosi
 * Via A. De Gasperi 91 
 * P. Potenza Picena (MC) - Italy
 * 
 * (Hereby referred to as "DISPAGE")
 * 
 * Copyright (c) 2010-2011 DISPAGE.
 * 
 * The contents of this file are released under the GNU General Public License
 * version 3 as published by the Free Software Foundation that can be found on
 * the "LICENSE.txt" file which is integral part of the SUGARCRM(TM) project. If
 * the file is not present, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You may not use the present file except in compliance with the License.
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied.  See the License
 * for the specific language governing rights and limitations under the
 * License.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * Dispage" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by Dispage".
 * 
 ******************************************************************************/

    class AdvancedDatetime {

        function convertDateTime2DBFormat (&$bean, $event, $args = null) {

            global $timedate, $sugar_version;

            if (!isset($sugar_version)) require ('sugar_version.php');

            if (isset($bean->field_defs)) {
                foreach ($bean->field_defs as $field_name => $field_params) {
                    if ($field_params['type'] == 'advanceddatetime' || $field_params['type'] == 'datetimecombo' && $sugar_version < '6') {
                      if (isset($bean->$field_name) && !(strlen($bean->$field_name) < 7 && (!isset($field_params['ext2']) || $field_params['ext2'] == 'datetime')))
                          $bean->$field_name = $this->convertDateTime2DB($bean->$field_name, isset($field_params['ext2']) ? $field_params['ext2'] : 'datetime');
                      elseif (isset($field_params['display_default']) && !empty($field_params['display_default']))
                          $bean->$field_name = date($timedate->dbDayFormat . ' ' . $timedate->dbTimeFormat, strtotime ($field_params['display_default']));
                    }
                }
            }
        }

        function convertDateTime2UserFormat (&$bean, $event, $args = null) {

            global $sugar_version;

            if (!isset($sugar_version)) require ('sugar_version.php');

            if (isset($bean->field_defs)) {
                foreach ($bean->field_defs as $field_name => $field_params) {
                    if ($field_params['type'] == 'advanceddatetime' || $field_params['type'] == 'datetimecombo' && $sugar_version < '6') {
                         $this->convertAdvanceddatetime($bean->$field_name, $field_params);
                    }
                }
            }
        }
        
        function convertAdvanceddatetime (& $field, $field_params) {
        
            global $current_user, $timedate;

            if (!isset($field_params['ext2']) || $field_params['ext2'] == 'datetime' || $field_params['ext2'] == 'time' && $GLOBALS['app']->controller->action == 'EditView') {
                $dbformat = $timedate->dbDayFormat . ' ' . $timedate->dbTimeFormat;
                if ($timedate->check_matching_format($field, $dbformat)) {
                   $field = $timedate->swap_formats($field, $dbformat, $timedate->get_date_time_format(true, $current_user));
                }
            } 
            elseif ($field_params['ext2'] == 'lengthtime') {
                $field = $this->convertInt2Lengthtime($field);
            } 
            elseif ($timedate->check_matching_format($field, $timedate->dbTimeFormat)) {
                $field = $timedate->swap_formats($field, $timedate->dbTimeFormat, $timedate->get_time_format(true, $current_user));
            }
        }
        
        function convertDateTime2DB ($value, $type) {

            global $timedate, $current_user;

            if (strpos($value, ' ') !== false) {
                list($date, $time) = explode(' ', $value);
            }
            elseif ($current_user && $timedate->check_matching_format($value, $timedate->get_date_format($current_user))) {
                $date = $value;
            }
            else {
                $time = $value;
            }

            if ($type == 'lengthtime') {
                return $this->convertLengthtime2Int($time);
            }
            elseif (isset($time) && !empty($time)) {
                if ($timedate->check_matching_format($value, $timedate->get_db_date_time_format())) {
                    return $value;
                }
                else {
                    $array_datetime = $timedate->to_db_date_time($date, $time);
                    if (!array_filter($array_datetime)) $array_datetime = array('2000-01-01', '00:00:00');
                    if (isset($date) && !empty($date)) {
                        return implode(' ', $array_datetime);
                    } else {
                        return $array_datetime[0] . ' ' . $timedate->to_db_time($time, false);
                    }
                }
            }
            else {
                return $timedate->to_db_date($date, false);
            }
        }

        function convertLengthtime2Int ($time) {

            $time = preg_replace('/[ap]m$/', '', $time);
            $time_array = preg_split('/[:.]/', $time, -1, PREG_SPLIT_NO_EMPTY);
            if (count($time_array) < 3) $time_array = array_merge($time_array, array_fill(0, 3 - count($time_array), 0));
            $time_array = array_reverse($time_array);

            return array_sum(array_map(create_function('$v,$e', 'return $v*pow(60,$e);'), $time_array, range(0, 2)));
        }

        function convertInt2Lengthtime ($db_value) {

            global $current_user, $timedate;

            if ($db_value < 0) {
                $db_value = abs($db_value);
                $coeff = -1;
            }
            else
                $coeff = 1;
            return preg_replace('/^(\D*)(\d)+/', $coeff * floor($db_value / 60 / 60),  date($timedate->get_time_format(false, $current_user), $db_value % (60 * 60)));
        }

        function convertInt2DateTime ($db_value, $type) {

            global $current_user, $timedate;

            switch ($type) {
                case 'time' : case 'datetime' :
                    return date($timedate->get_date_time_format(true, $current_user), $db_value);
                case 'lengthtime' :
                    return $this->convertInt2Lengthtime($db_value);
            }
        }

        function convertDB2Int ($date) {
            preg_match("/^(\d{4})-(\d{2})-(\d{2})(?> (\d{2}):(\d{2}):(\d{2}))?$/", $date, $chunks);

            return mktime($chunks[4] | 0, $chunks[5] | 0, $chunks[6] | 0, $chunks[2], $chunks[3], $chunks[1]);
        }
    }


    class AdvancedDatetimeOperations extends AdvancedDatetime {

        var $dateTimeTable = array();

        function AdvancedDatetimeOperations ($bean) {

            if (!isset($bean->field_defs)) return;

            foreach ($bean->field_defs as $name => $params) {
                if ($params['type'] == 'advanceddatetime') {
                    $this->addDateTime($name, isset($params['ext2']) ? $params['ext2'] : 'datetime', $bean->$name, $bean->fetched_row[$name]);
                }
            }
        }
        
        //Hoc Bui
        
        function add_date($givendate,$day=0,$mth=0,$yr=0) {
            $cd = strtotime($givendate);
            $newdate = date('Y-m-d', mktime(0,0,0,date('m',$cd)+$mth,
            date('d',$cd)+$day, date('Y',$cd)+$yr));
            return $newdate;
        }
        
        function sub_date($givendate,$day=0,$mth=0,$yr=0) {
            $cd = strtotime($givendate);
            $newdate = date('Y-m-d', mktime(0,0,0,date('m',$cd)-$mth,
            date('d',$cd)-$day, date('Y',$cd)-$yr));
            return $newdate;
        }

        function calc_date(&$start_date, &$end_date, $type='today'){
           
            
             switch($type){
                        
                        case 'today':
                            $start_date = date('Y-m-d');
                            $end_date = date('Y-m-d');
                            break;
                        case 'yesterday':
                            
                            $end_date = date('Y-m-d');
                            $time = $this->convertDB2Int($end_date);
                            $time = $time - 24*60*60;
                            
                            $start_date = $this->convertInt2DateTime($time, 'datetime');
                            $start_date = $this->convertDateTime2DB($start_date, 'datetime');
                        
                            break;
                        case 'thisweek':
                            
                            $end_date = date('Y-m-d');
                            $day_o_week = date('N');//1-Monday, 7-Sunday
                            
                            while($day_o_week>=1){
                                $time = $this->convertDB2Int($end_date);
                                $time = $time - 24*60*60;
                                $day_o_week--;
                            }    
                            $start_date = $this->convertInt2DateTime($time, 'datetime');
                            $start_date = $this->convertDateTime2DB($start_date, 'datetime');  
                        
                            break;
                        case 'lastweek':
                            
                            $this_end_date = date('Y-m-d');
                            $day_o_week = date('N');//1-Monday, 7-Sunday
                            
                            while($day_o_week>=1){
                                $time = $this->convertDB2Int($this_end_date);
                                $time = $time - 24*60*60;
                                $day_o_week--;
                            }    
                            $this_start_date = $this->convertInt2DateTime($time, 'datetime');
                            $this_start_date = $this->convertDateTime2DB($this_start_date, 'datetime');
                            
                            
                            $time =   $this->convertDB2Int($this_start_date) - 24*60*60;//ngay dau tuan cua tuan hien tai - 1 = ngay cuoi cung cua tuan trc do
                            
                            $end_date = $this->convertInt2DateTime($time, 'datetime');
                            $end_date = $this->convertDateTime2DB($end_date, 'datetime');
                            
                            $time =   $this->convertDB2Int($this_start_date) - 6*24*60*60; //ngay cuoi tuan - 6 = ngay dau tuan
                            $start_date = $this->convertInt2DateTime($time, 'datetime');
                            $start_date = $this->convertDateTime2DB($start_date, 'datetime');
                        
                            break;
                        case 'thisweek':
                            break;
                            
                        case 'lastweek':
                            break;
                            
                            
                       default:
                            $start_date = date('Y-m-d');
                            $end_date = date('Y-m-d');
                        break;     
                            
                    }
            
        }
        
        function calc_date2(&$start_date, &$end_date, $type='today'){
           
             $now = date('Y-m-d');
             $day_o_week = date('N');//thu trong tuan - 1-Monday, 7-Sunday
             $num_o_month = date('t');//so ngay cua thang, 28-31
             $day_o_month = date('j');//ngay thu bao nhieu trong thang, 1-31
             $month = date('n');//thang bao nhieu, 1-12
             $year = date('Y');//nam, 2011
             
             switch($type){
                        
                        case 'today':
                            $start_date = $end_date = $now;                           
                            break;
                            
                        case 'yesterday': 
                            $start_date = $end_date= $this->sub_date($now,1); 
                            break;
                            
                        case 'thisweek':
                            $start_date = $this->sub_date($now, abs($day_o_week-1));
                            $end_date = $this->add_date($now, abs(7-$day_o_week));
                            break;
                            
                        case 'lastweek': 
                            $end_date = $this->sub_date($now, abs($day_o_week-1));
                            $end_date = $this->sub_date($end_date,1);
                            $start_date = $this->sub_date($end_date,6); 
                            break;
                            
                        case 'thismonth':
                            $start_date = $this->sub_date($now, abs($day_o_month-1));
                            $end_date = $this->add_date($now, abs($num_o_month-$day_o_month));
                            break;
                            
                        case 'lastmonth':
                            $end_date = $this->sub_date($now, abs($day_o_month-1));
                            $end_date = $this->sub_date($end_date,1);
                            $ts = mktime(0,0,0,($month-1),1,$year);
                            $start_date =  date("Y-m-d", $ts);                            
                            break;
                            
                       default:
                            $start_date = date('Y-m-d');
                            $end_date = date('Y-m-d');
                        break;     
                            
                    }
            
        }
        
        //end Hoc Bui

        function addDateTime ($name, $type, $value = '', $db_value = '') {

            if (empty($db_value) && $type != 'error')
                $db_value = $this->convertDateTime2DB($value, $type);

            $this->dateTimeTable[$name] = array(
                'type' => $type,
                'value' => $value,
                'db_value' => $db_value
            );

        }

        function getNewCustomName ($type, $value = null, $guessType = false, $name = '') {

            global $current_user, $timedate;

            if ($guessType && !isset($type)) {
                if ($timedate->check_matching_format($value, $timedate->dbTimeFormat)) {
                    $type = 'datetime';
                }
                elseif (preg_match('/^\d+[:.]\d{1,2}(?>[:.]\d{1,2})?$/', $value)) {
                    $type = 'lengthtime';
                }
                elseif ($timedate->check_matching_format($value, $timedate->get_date_time_format(true, $current_user)) || $timedate->check_matching_format($value, $timedate->get_date_format($current_user))) {
                    $type = 'datetime';
                }
                elseif ($timedate->check_matching_format($value, $timedate->get_time_format(true, $current_user))) {
                    $type = 'time';
                }
                elseif (preg_match('/^\d+$/', $value)) {
                    $type = 'lengthtime';
                    $value = $this->convertInt2Lengthtime($value);
                }
                else {
                    $type = 'error';
                    $value = 'NO_VALUE_ERROR';
                }
            }
            if ($type != 'error')
                $db_value = $this->convertDateTime2DB($value, $type);

            if (!$name) {
              $i = 1;
              while (isset($this->dateTimeTable[$name = "customDateTime_$i"])) {
                  $i++;
              }
            }
            $this->addDateTime($name, $type, $value, $db_value);
            return $name;
        }

        function getDateTimeDefs ($date) {

            if (!isset($this->dateTimeTable[$date])) {
                $date = $this->getNewCustomName(null, $date, true);
            }
            return $this->dateTimeTable[$date];
        }

        function calc_result ($defs1, $defs2, $op) {

            $date = $defs1['db_value'];

            $stamp = $defs2['type'] == 'lengthtime' ? $date : $this->convertDB2Int($date);

            switch ($defs2['type']) {
                case 'datetime' :
                case 'time' :
                    switch ($op) {
                        case 'sub' :
                            $stamp -= $this->convertDB2Int($defs2['db_value']);
                            $res_type = 'lengthtime';
                            break;
                        default :
                            return array('error', 'TYPE_MISMATCH_ERROR');
                    }
                    break;
                case 'lengthtime' :
                    switch ($op) {
                        case 'sub' :
                            $stamp -= $defs2['db_value'];
                            $res_type = $defs1['type'];
                            break;
                        case 'add' :
                            $stamp += $defs2['db_value'];
                            break;
                        case 'floor' :
                            $stamp = floor($stamp / $defs2['db_value']) * $defs2['db_value'];
                            $res_type = $defs1['type'];
                            break;
                        case 'ceil' :
                            $stamp = ceil($stamp / $defs2['db_value']) * $defs2['db_value'];
                            $res_type = $defs1['type'];
                            break;
                    }
                    break;
            }
            if ($op == 'add') $res_type = $defs1['type'];

            return array($res_type, $this->convertInt2DateTime($stamp, $res_type));
        }

        function opDate ($date1, $date2, $op) {

            $defs1 = $this->getDateTimeDefs($date1);
            $defs2 = $this->getDateTimeDefs($date2);

            if ($defs1['type'] == 'error') return $date1;
            if ($defs2['type'] == 'error') return $date2;

            list($res_type, $date_res) = $this->calc_result($defs1, $defs2, $op);

            return $this->getNewCustomName($res_type, $date_res);
        }

        function subDate ($date1, $date2) {

            return $this->opDate($date1, $date2, 'sub');
        }

        function addDate ($date1, $date2) {

            $date_res = $date1;

            if (gettype($date2) == 'array') {
                foreach ($date2 as $k => $date_2_add) {
                    $date_res = $this->opDate($date_res, $date_2_add, 'add');
                }
            }
            else
                $date_res = $this->opDate($date_res, $date2, 'add');

            return $date_res;
        }

        function floorDate ($date1, $date2) {

            return $this->opDate($date1, $date2, 'floor');
        }

        function ceilDate ($date1, $date2) {

            return $this->opDate($date1, $date2, 'ceil');
        }

        function getValue ($date) {

            if (!isset($this->dateTimeTable[$date]))
                return $GLOBALS['app_strings']['LBL_ENHANCED_STUDIO_ADVANCEDDATETIME']['NO_VALUE_ERROR'];
            if ($this->dateTimeTable[$date]['type'] == 'error')
                return $GLOBALS['app_strings']['LBL_ENHANCED_STUDIO_ADVANCEDDATETIME'][$this->dateTimeTable[$date]['value']];
            else {
                if ($this->dateTimeTable[$date]['type'] == 'time')
                    return preg_replace('/^[^ ]+ +/', '', $this->dateTimeTable[$date]['value']);
                else
                    return $this->dateTimeTable[$date]['value'];
            }
        }

        function setValue ($date, $value, $type = null) {

            $this->getNewCustomName($type, $value, true, $date);
        }
    }
?>
