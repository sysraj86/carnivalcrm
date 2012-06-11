<?php
    /**
    * Display edit view for create and edit room list
    * Author Hai Duc Nguyen
    * date publish: 2012/02/01
    */
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
    require_once("modules/RoomLists/RoomLists.php");
    require_once('data/Tracker.php');
    require_once('modules/Releases/Release.php');
    require_once("modules/RoomLists/Forms.php");
    global $db;
    global $app_strings;
    global $mod_strings;
    global $mod_strings;
    global $current_user;
    global $sugar_version, $sugar_config,$app_list_strings;

    $focus       = new RoomLists();
    $seedRelease = new Release();
    $json = getJSONobj();

    $ss = new Sugar_Smarty();

    if(isset($_REQUEST['record'])) {
        $focus->retrieve($_REQUEST['record']);
    }
    if(isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
        $focus->id = "";
    }


    // BUILD MODULE TITLE LINE  
    echo "\n<p>\n";
    echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$focus->name, true);
    echo "\n</p>\n";

    global $theme;
    $theme_path = "themes/".$theme."/";
    $image_path = $theme_path."images/";
    require_once ($theme_path.'layout_utils.php');

    $GLOBALS['log']->info("RoomBookings edit view");

    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id']))     $ss->assign("RETURN_ID",     $_REQUEST['return_id']);
    if (empty($focus->assigned_user_id) && empty($focus->id))  $focus->assigned_user_id   = $current_user->id;
    if (empty($focus->assigned_name)    && empty($focus->id))  $focus->assigned_user_name = $current_user->full_name;
    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');  
    }

    require_once('include/QuickSearchDefaults.php');
    $qsd = new QuickSearchDefaults();
    $sqs_objects = array(
    'assigned_user_name' => $qsd->getQSUser(),
    );
    $quicksearch_js  = $qsd->getQSScripts();
    $quicksearch_js .= '<script type="text/javascript" language="javascript">sqs_objects = ' . $json->encode($sqs_objects) . '</script>';


    $ss->assign("MOD", $mod_strings);
    $ss->assign("APP", $app_strings);
    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }

    $ss->assign("THEME",             $theme);
    $ss->assign("IMAGE_PATH",        $image_path);$ss->assign("PRINT_URL", "index.php?".$GLOBALS['request_string']);
    $ss->assign("JAVASCRIPT",        get_set_focus_js().get_validate_record_js(). $quicksearch_js);
    $ss->assign('ID',$focus->id);
    $ss->assign('name',$focus->name);
    $ss->assign('made_tour',$focus->made_tour);
    $ss->assign('made_tour_id',$focus->made_tour_id);
    $ss->assign('tenks',$focus->tenks);
    $ss->assign('ks_id',$focus->ks_id);
    $ss->assign('party_name',$focus->party_name);
    $ss->assign('tour_guide',$focus->tour_guide);
    $ss->assign('room_type',get_select_options_with_id($app_list_strings['roomlist_room_type_dom'],''));
    $ss->assign('department',get_select_options_with_id($app_list_strings['roomlist_department_dom'],$focus->department) );
    $ss->assign("ASSIGNED_USER_NAME",       $focus->assigned_user_name);
    $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
    $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
    
    $temp = base64_decode($focus->content);
    $noidung = json_decode($temp);
    $html = '';
    if(count($noidung)>0){
        foreach($noidung as $val){
            $room_name = $val->room_name;
            $room_type = get_select_options_with_id($app_list_strings['roomlist_room_type_dom'],$val->room_type) ;
            $room_class = $val->room_class;
            $room_remark = $val->room_remark;
            $room_number = $val->room_number;
            $room_note = $val->room_note;
            $list_cus = $val->list_cus; 
            $option = '';
            if(count($list_cus)>0){
                foreach($list_cus as $cus_val){
                    $list_temp = explode('_',$cus_val);
                    $option .= '<option value="'.$cus_val.'">'.$list_temp[0].$list_temp[1].' '.$list_temp[2].'</option>';
                } 
            }
            $html .= '<tr class="chitiet_row">';
            $html .= '<td class="dataLabel">';
            $html .= '<fieldset>';
            $html .= '<table width="100%" cellpadding="0" cellspacing="0">';
            $html .= '<tbody>';
            $html .= '<tr>';
                $html .= '<td class="dataField">'.$mod_strings['LBL_ROOM_NAME'].'<input type="text" name="room_name[]" id="room_name"  value="'.$room_name.'"/></td>';
                $html .= '<td class="dataField">'.$mod_strings['LBL_ROOM_TYPE'].' &nbsp; &nbsp; <select name="room_type[]" id="room_type" />'.$room_type.'</select></td>';
                $html .= '<td class="dataField room_class">'.$mod_strings['LBL_ROOM_CLASS'].' &nbsp; &nbsp; <input type="text" name="room_class[]" id="room_class" value="'.$room_class.'"/></td>';
                $html .= '<td class="dataField room_remark">'.$mod_strings['LBL_ROOM_REMARK'].' &nbsp; &nbsp; <input type="text" name="room_remark[]" id="room_remark" value="'.$room_remark.'" /></td>';
//                $html .= '<td class="dataField room_number">'.$mod_strings['LBL_ROOM_NUMBER'].' &nbsp; &nbsp; <input type="text" name="room_number[]" id="room_number" value="'.$room_number.'" /></td> ';
                $html .= '<td class="dataField room_note">'.$mod_strings['LBL_ROOM_NOTE'].' &nbsp; &nbsp; <input type="text" name="room_note[]" id="room_note" value="'.$room_note.'" /></td>';
                $html .= '<td class="dataField phidden" valign="middle" style="display:none;">'.$mod_strings['LIST_CUS'].'<select name="dskh" class="dskh" multiple="multiple" size="4"></select><input type="button" class="addCus" value=">>"/></td>';
                $html .= '<td><input type="button" class="return_cus" value="<<" style="display:none;"/> <select name="dskhtrongphong[]" class="dskhtrongphong" id="dskhtrongphong" multiple="multiple" size="4">'.$option.'</select></td>';
            $html .= '</tr>';
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</fieldset>';
            $html .= '</td>';
            $html .= '<td><input type="button" class="btnAddRow" value="Add row"/> <input type="button" class="btnDelRow" value="Delete Row"> </td>';
            $html .= '</tr>';
        }
    }    
    $ss->assign('LIST_CUS_DETAIL',$html);
    


    // sales man

    $user_popup_request_data = array(
        'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => array(
        'id' => 'assigned_user_id',
        'full_name' => 'assigned_user_name', 
    ),
    );
    $ss->assign('user_popup_request_data',json_encode($user_popup_request_data));

    // view change log
    $view_chang_log_data = array(
        "call_back_function" => "set_return",
        "form_name" => "EditView",
        "field_to_name_array" => '[]',
    );
    $ss->assign('view_change_log', $json->encode($view_chang_log_data));

    // made tour
    
    $made_tour_request_data = array(
       'call_back_function' => 'set_return',
        'form_name' => 'EditView',
        'field_to_name_array' => array(
        'id' => 'made_tour_id',
        'name' => 'made_tour', 
    ),
    );
    
    $ss->assign('made_tour_popup_request_data',$json->encode($made_tour_request_data));

    $ss->display("modules/RoomLists/tpls/EditView.tpl");
?>
