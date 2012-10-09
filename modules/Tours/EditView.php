<?php
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    require_once('modules/Tours/Tour.php');
    require_once('modules/Tours/Forms.php');
    require_once('data/Tracker.php');
    require_once('modules/Releases/Release.php');

    global $db;
    global $app_strings;
    global $mod_strings;
    global $mod_strings;
    global $current_user;
    global $sugar_version, $sugar_config;


    $focus = new Tour();
    $seedRelease = new Release();
    $json = getJSONobj();

    $ss = new Sugar_Smarty();

    if (isset($_REQUEST['record'])) {
        $focus->retrieve($_REQUEST['record']);
    }
    if (isset($_REQUEST['isDuplicate']) && $_REQUEST['isDuplicate'] == 'true') {
        $focus->id = "";
        $focus->number = "";
    }


    // BUILD MODULE TITLE LINE
    echo "\n<p>\n";
    echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'] . ": " . $focus->name, true);
    echo "\n</p>\n";

    global $theme;
    $theme_path = "themes/" . $theme . "/";
    $image_path = $theme_path . "images/";
    require_once ($theme_path . 'layout_utils.php');

    $GLOBALS['log']->info("Tour edit view");
    require_once('include/QuickSearchDefaults.php');
    $qsd = new QuickSearchDefaults();
    $sqs_objects = array(
    'assigned_user_name' => $qsd->getQSUser(),
    );
    $quicksearch_js = $qsd->getQSScripts();
    $quicksearch_js .= '<script type="text/javascript" language="javascript">sqs_objects = ' . $json->encode($sqs_objects) . '</script>';


    $ss->assign("MOD", $mod_strings);
    $ss->assign("APP", $app_strings);

    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id'])) $ss->assign("RETURN_ID", $_REQUEST['return_id']);

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }

    $ss->assign("THEME", $theme);
    $ss->assign("IMAGE_PATH", $image_path);
    $ss->assign("PRINT_URL", "index.php?" . $GLOBALS['request_string']);
    $ss->assign("JAVASCRIPT", get_set_focus_js() . get_validate_record_js() . $quicksearch_js);


    $ss->assign("ID", $focus->id);
    if (isset($focus->name))
        $ss->assign("NAME", $focus->name);
    else $ss->assign("NAME", "");
    $ss->assign("DATE_ENTERED", $focus->date_entered);
    $ss->assign("DATE_MODIFIED", $focus->date_modified);
    $ss->assign("CREATED_BY", $focus->created_by_name);
    $ss->assign("MODIFIED_BY", $focus->modified_by_name);

    if (empty($focus->assigned_user_id) && empty($focus->id)) $focus->assigned_user_id = $current_user->id;
    if (empty($focus->assigned_name) && empty($focus->id)) $focus->assigned_user_name = $current_user->full_name;
    $ss->assign("ASSIGNED_USER_OPTIONS", get_select_options_with_id(get_user_array(TRUE, "Active", $focus->assigned_user_id), $focus->assigned_user_id));
    $ss->assign("ASSIGNED_USER_NAME", $focus->assigned_user_name);
    $ss->assign("ASSIGNED_USER_ID", $focus->assigned_user_id);
    $ss->assign('CALENDAR_DATEFORMAT', $timedate->get_cal_date_format());
    $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());
    /***
    * Code generate ra tour area
    */
    $areas = $focus->loadAreaByDepartment($focus->deparment);
    //$area_options = "<option data-code='' value=''>--None--</option>";
    $area_pattern = "";
    $frame_types_pattern = "F|H|O";
    // fix bug 1567
    /*foreach ($areas as $value) {
    $selected = "";
    if($value['id']==$focus->area){
    $selected = "selected";
    }
    $area_options .= "<option $selected data-code='" . $value['code'] . "' data-country='" . $value['country_id'] . "' value='" . $value['id'] . "'>" . $value['name'].' - '.$value['country'] . "</option>";


    } */
    $country_id = '';
    if(count($areas)>0){
        $area_options .= '<option value ="">none</option>';  
        foreach($areas as $row){

            if($row['id'] == $focus->area && $row['country_id'] == $focus->country_id){
                $area_options .= "<option  selected='selected' data-code='" . $row['code'] . "' data-country='" . $row['country_id'] . "' value='" . $row['id'] . "' >" . $row['name'].'-'.$row['country']."</option>";         
            }
            else{
                $area_options .= "<option  data-code='" . $row['code'] . "' data-country='" . $row['country_id'] . "' value='" . $row['id'] . "' >" . $row['name'].'-'.$row['country']."</option>";         
            }
            $area_pattern .= ($area_pattern=="")? "":"|"; 
            $area_pattern .= $row['code'];
        }
    }
    $destination =  Destination::getDestinationsByArea($focus->country_id, $focus->area, $focus->deparment);
    if(!empty($focus->noiden)){
        $noiden = explode('^,^',$focus->noiden);
        $ss->assign('DESTINATIONS',get_select_options_with_id($destination,$noiden));
    }else{
        $ss->assign('DESTINATIONS','<option data-code="" value="">--None--</option>');

    }
    $ss->assign("TOUR_AREA", $area_options);
    //$ss->assign("TOUR_AREA", get_select_options_with_id($app_list_strings['destination_region_dom'],$focus->area)); 
    // custom
    if ($focus->tour_code) {
        // $tour_code_area = substr($focus->tour_code, 0, 5);
        if (preg_match('/^('.$frame_types_pattern.')('.$area_pattern.')(\d+)(\/)(\w+)-(\d+)$/', $focus->tour_code, $matches)) {
            $tour_frame_type = $matches[1];
            $tour_code_area = $matches[2];
            $tour_code_num = $matches[3];
            $tour_code_department = $matches[5];
            $tour_num = $matches[6];
        } else if(preg_match('/^('.$frame_types_pattern.')('.$area_pattern.')(\d+)(\/)(\w+)$/', $focus->tour_code, $matches)) {
                $tour_frame_type = $matches[1];
                $tour_code_area = $matches[2];
                $tour_code_num = $matches[3];
                $tour_code_department = $matches[5];
            }else{
                $tour_num = Tour::get_tour_num();
        }

    }
    if (empty($focus->id)) {
        $tour_code_area = "";
        $tour_code_num = "";
        $tour_code_department = "";
        $tour_num = Tour::get_tour_num();
    }

    $ss->assign("TOUR_CODE_AREA",$tour_frame_type.$tour_code_area);
    $ss->assign("TOUR_CODE_DEPARTMENT", $tour_code_department);
    $ss->assign("TOUR_CODE_NUM", $tour_code_num);
    $ss->assign("TOUR_NUM", $tour_num);
    $ss->assign("country_id", $focus->country_id);
    //$ss->assign("TOURCODE", $focus->tour_code);
    $ss->assign("TOUR_NAME", $focus->tour_name);
    //$ss->assign("TO_PLACE", $focus->to_place);
    //$ss->assign("FROM_PLACE", $focus->from_place);
    $ss->assign("DESTINATION_TO_ID", $focus->destination_to_id);
    $ss->assign("DESTINATION_FROM_ID", $focus->destination_from_id);
    $ss->assign("START_DATE", $focus->start_date);
    $ss->assign("END_DATE", $focus->end_date);
    $ss->assign("VALUECONTRACT", $focus->contract_value);

    $ss->assign("CURRENCY", get_select_options_with_id($app_list_strings['currency_dom'], $focus->currency));
    $ss->assign("DEPARMENT", get_select_options_with_id($app_list_strings['deparment_dom'], $focus->deparment));
    $ss->assign("DESCRIPTION", $focus->description);
    $ss->assign("ACCOUNT_NAME", $focus->accounts_tours_name);
    $ss->assign("ACCOUNT_ID", $focus->accounts_t4d21ccounts_ida);
    $ss->assign("DURATION", $focus->duration);


    if (!empty($focus->status)) {
        $ss->assign('STATUS', get_select_options_with_id($app_list_strings['tour_status_dom'], $focus->status));
    }
    else {
        $ss->assign('STATUS', get_select_options_with_id($app_list_strings['tour_status_dom'], ''));
    }

    if (!empty($focus->frame_type)) {
        $ss->assign('FRAME_TYPE', get_select_options_with_id($app_list_strings['tour_type_dom'], $focus->frame_type));
    }
    else {
        $ss->assign('FRAME_TYPE', get_select_options_with_id($app_list_strings['tour_type_dom'], ''));
    }

    if (!empty($focus->transport)) {
        $transport = explode('^,^', $focus->transport);
        $ss->assign('TRANSPORT', get_select_options_with_id($app_list_strings['transport_dom'], $transport));
    }
    else {
        $ss->assign('TRANSPORT', get_select_options_with_id($app_list_strings['transport_dom'], ''));
    }
    /*if (!empty($focus->noiden)) {
    $destination = explode('^,^', $focus->noiden);
    $ss->assign('DESTINATION', get_select_options_with_id($app_list_strings['destination_dom_list'], $destination));
    }
    else {
    $ss->assign('DESTINATION', get_select_options_with_id($app_list_strings['destination_dom_list'], ''));
    }*/
    if (!empty($focus->type)) {
        $ss->assign('TYPE', get_select_options_with_id($app_list_strings['tourprogram_type_dom'], $focus->type));
    }
    else {
        $ss->assign('TYPE', get_select_options_with_id($app_list_strings['tourprogram_type_dom'], ''));
    }

    if (!empty($focus->picture)) {
        $ss->assign('PICTURE', "<img src='modules/images/" . $focus->picture . "' width='300' height='300'/>");
    }
    else {
        $ss->assign('PICTURE', '');
    }
    $ss->assign('PICTURE_NAME', $focus->picture);

    $ss->assign("TOURPROGRAM", $focus->getEditViewHTMLTourProgramLines());
    $ss->assign("TOURPROGRAM_LINE_COUNT", $focus->get_tour_program_line_count());
    $ss->assign("NEW", "0");
    //IS TEMPLATE
    $ss->assign("IS_TEMPLATE", $focus->is_template);
    //TEMPLATE NAME
    $ss->assign("TEMPLATE_NAME", $focus->template_name);
    // load dat nuoc
    //$ss->assign("COUNTRIES", get_select_options_with_id(Country::get_list_countries(), ''));
    $popup_request_data = array(
    'call_back_function' => 'set_return',
    'form_name' => 'EditView',
    'field_to_name_array' => array(
    'id' => 'assigned_user_id',
    'user_name' => 'assigned_user_name',
    ),
    );
    $ss->assign('encoded_users_popup_request_data', $json->encode($popup_request_data));

    // operator
    $encoded_operator_popup_request_data = array(
    'call_back_function' => 'set_return',
    'form_name' => 'EditView',
    'field_to_name_array' => array(
    'id' => 'operator_id',
    'user_name' => 'operator',
    ),
    );

    $ss->assign('encoded_operator_popup_request_data', $json->encode($encoded_operator_popup_request_data));

    // view change log
    $view_chang_log_data = array(
    "call_back_function" => "set_return",
    "form_name" => "EditView",
    "field_to_name_array" => '[]',
    );
    $ss->assign('view_change_log', $json->encode($view_chang_log_data));

    // destination popup data

    $destination_from_popup_data_request = array(
    'call_back_function' => 'set_return',
    'form_name' => 'EditView',
    'field_to_name_array' => array(
    'id' => 'destination_from_id',
    'name' => 'from_place',
    ),
    );

    $ss->assign('destination_from_popup_data_request', $json->encode($destination_from_popup_data_request));

    $destination_to_popup_data_request = array(
    'call_back_function' => 'set_return',
    'form_name' => 'EditView',
    'field_to_name_array' => array(
    'id' => 'destination_to_id',
    'name' => 'to_place',
    ),
    );

    $ss->assign('destination_to_popup_data_request', $json->encode($destination_to_popup_data_request));

    // accounts_tours_popup_data

    $accounts_tours_popup_data = array(
    'call_back_function' => 'set_return',
    'form_name' => 'EditView',
    'field_to_name_array' => array(
    'id' => 'accounts_t4d21ccounts_ida',
    'name' => 'accounts_tours_name',
    ),

    );

    $ss->assign('accounts_tours_popup_data', $json->encode($accounts_tours_popup_data));

    // assigned to name popup

    $assigned_to_name_popup_data = array(
    'call_back_function' => 'set_return',
    'form_name' => 'EditView',
    'field_to_name_array' => array(
    'id' => 'assigned_user_id',
    'full_name' => 'assigned_user_name',
    ),

    );

    $ss->assign('assigned_to_name_popup_data', $json->encode($assigned_to_name_popup_data));

    require_once('include/javascript/javascript.php');
    $javascript = new javascript();
    $javascript->setFormName('EditView');
    $javascript->setSugarBean($focus);
    $javascript->addAllFields('');

    echo $javascript->getScript();
    $ss->display('modules/Tours/EditView.tpl');

    $str = "<script>
    YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts);
    </script>";

    echo $str;
?>
