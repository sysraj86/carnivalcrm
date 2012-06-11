<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

 
require_once('include/EditView/QuickCreate.php');



class GroupProgramsQuickCreate extends QuickCreate {
    
    var $javascript;
    
    function process() {
        global $current_user, $timedate, $app_list_strings, $current_language, $mod_strings,$app_strings;
        $mod_strings = return_module_language($current_language, 'GroupPrograms');
        
        parent::process();
  
        if($this->viaAJAX) { // override for ajax call
            $this->ss->assign('saveOnclick', "onclick='if(check_form(\"toursQuickCreate\")) return SUGAR.subpanelUtils.inlineSave(this.form.id, \"tours\"); else return false;'");
            $this->ss->assign('cancelOnclick', "onclick='return SUGAR.subpanelUtils.cancelCreate(\"subpanel_groupprograms\")';");
            //$this->ss->assign('cancelOnclick', "onclick='return SUGAR.subpanelUtils.cancelCreate(\"subpanel_tours\")';");
        }
        
        $this->ss->assign('viaAJAX', $this->viaAJAX);
        $this->ss->assign('APP', $app_strings);

        $this->javascript = new javascript();
        $this->javascript->setFormName('MadeTourQuickCreate');
        
        $focus = new GroupProgram();
        $this->javascript->setSugarBean($focus);
        $this->javascript->addAllFields('');
        $json = getJSONobj();
        
        if(!empty($focus->status)){
            $this->ss->assign('STATUS_DOM', get_select_options($app_list_strings['groupprogram_status_dom'],$focus->status));
        }
        else {$this->ss->assign('STATUS_DOM', get_select_options($app_list_strings['groupprogram_status_dom'],''));}
        
            $git_popup_request_data = array(
                'call_back_function'  => 'set_return',
                'form_name'       => 'MadeTourQuickCreate',
                'field_to_name_array' => array(
                    'id'   => 'group_id',
                    'name'  => 'group_name',
                ),
            );

            $this->ss->assign('gits_popup_request_data', json_encode($git_popup_request_data));


            // worksheet popup request data

            $worksheet_popup_request_data = array(
                'call_back_function'    => 'set_return',
                'form_name'     => 'MadeTourQuickCreate',
                'field_to_name_array'   => array(
                    'id'  => 'worksheet_id' ,
                    'name' => 'worksheet',
                ),
            );

            $this->ss->assign('worksheet_popup_request_data', json_encode($worksheet_popup_request_data));

            // pick up airport guide
            $popup_request_data = array(
                'call_back_function' => 'set_return',
                'form_name' => 'MadeTourQuickCreate',
                'field_to_name_array' => array(
                    'id' => 'guide_pick_up_at_airport_id',
                    'name' => 'guide_pick_up_at_airport',
                    'phone' => 'pick_up_phone',
                    ),
            );
            $this->ss->assign('pick_up_airport', json_encode($popup_request_data));

            // insurance_popup_request_data

            $insurance_popup_request_data =array(
                'call_back_function'  => 'set_return',
                'form_name'       => 'MadeTourQuickCreate',
                'field_to_name_array' => array(
                    'id'    => 'insurance_id',
                    'name'  => 'insurance',
                ),
            );

            $this->ss->assign('insurance_popup_request_data',json_encode($insurance_popup_request_data));

            // airlines_tickets_popup_request_data 

            $airlines_tickets_popup_request_data = array(
                'call_back_function'   => 'set_return',
                'form_name'    => 'MadeTourQuickCreate',
                'field_to_name_array'  => array(
                    'id' =>'airlines_tickets_id',
                    'name'   => 'airlines_tickets',
                ),
            );

            $this->ss->assign('airlines_tickets_popup_request_data',json_encode($airlines_tickets_popup_request_data));

            // operator
            $popup_operator_request_data = array(
                'call_back_function' => 'set_return',
                'form_name' => 'MadeTourQuickCreate',
                'field_to_name_array' => array(
                    'id' => 'assigned_user_id',
                    'user_name' => 'operator',
                    'phone_mobile' => 'operator_phone',
                ),
            );
            $this->ss->assign('operator_users',json_encode($popup_operator_request_data));

            $popup_giude_request_data = array(
                'call_back_function' => 'set_return',
                'form_name' => 'MadeTourQuickCreate',
                'field_to_name_array' => array(
                    'id' => 'guide_id',
                    'name' => 'guide',
                    'phone' => 'guide_phone',
                    ),
            );

            $this->ss->assign('guide_users',json_encode($popup_giude_request_data));

            // leader popup request data

            $leader_popup_data_request = array(
                "call_back_function" => "set_return",
                "form_name" => "MadeTourQuickCreate",
                'field_to_name_array' => array(
                    'id' => 'leader_id',
                    'name' => 'team_leader',
                    'phone' => 'leader_phone',
                    )
            );
            $this->ss->assign('leader_popup_request_data',json_encode($leader_popup_data_request));
            
            // tour popup
            $tour_popup_request_data = array(
                'call_back_function'    => 'set_return',
                'form_name'                => 'MadeTourQuickCreate',
                'field_to_name_array'    => array(
                    'id'      => 'tour_id',
                    'name'    => 'tour_name',
                    'start_date' => 'start_date_group',
                    'end_date'   => 'end_date_group',
            ),
            );
            $this->ss->assign('tour_popup_request_data',$json->encode($tour_popup_request_data));        
        
        $this->ss->assign('additionalScripts', $this->javascript->getScript(false));
    }   
}
?>