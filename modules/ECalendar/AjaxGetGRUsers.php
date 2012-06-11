<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

error_reporting(0);

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



	$users_arr = array();
	require_once("modules/Users/User.php");
	
	
	$user_ids = explode(",", trim($_REQUEST['users'],','));
	
	$user_ids = array_unique($user_ids);
	

	require_once('include/json_config.php');
	global $json;
        $json = getJSONobj();
        $json_config = new json_config();        
       
        foreach($user_ids as $u_id){
        	if(empty($u_id))
        		continue;
        	$bean = new User();
        	$bean->retrieve($u_id);
        	array_push($users_arr, $json_config->populateBean($bean));        	
        }
        
        $GRjavascript = "\n" . $json_config->global_registry_var_name."['focus'].users_arr = " . $json->encode($users_arr) . ";\n";       	
        ob_clean();
        echo $GRjavascript;

?>
