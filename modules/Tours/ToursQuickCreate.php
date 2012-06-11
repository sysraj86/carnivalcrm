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



class ToursQuickCreate extends QuickCreate {
    
    var $javascript;
    
    function process() {
        global $current_user, $timedate, $app_list_strings, $current_language, $mod_strings;
        $mod_strings = return_module_language($current_language, 'Tours');
        
        parent::process();
  
        if($this->viaAJAX) { // override for ajax call
            $this->ss->assign('saveOnclick', "onclick='if(check_form(\"toursQuickCreate\")) return SUGAR.subpanelUtils.inlineSave(this.form.id, \"tours\"); else return false;'");
            $this->ss->assign('cancelOnclick', "onclick='return SUGAR.subpanelUtils.cancelCreate(\"subpanel_tours\")';");
            //$this->ss->assign('cancelOnclick', "onclick='return SUGAR.subpanelUtils.cancelCreate(\"subpanel_tours\")';");
        }
        
        $this->ss->assign('viaAJAX', $this->viaAJAX);

        $this->javascript = new javascript();
        $this->javascript->setFormName('toursQuickCreate');
        
        $focus = new Tour();
        $this->javascript->setSugarBean($focus);
        $this->javascript->addAllFields('');
        $json = getJSONobj();
         
        /*$this->ss->assign('CURRENCY',get_select_options_with_id($app_list_strings['currency_dom'], $focus->currency));
        $this->ss->assign('DIVISION',get_select_options_with_id($app_list_strings['division_dom'], $focus->currency));
        $this->ss->assign('DEPARMENT',get_select_options_with_id($app_list_strings['deparment_dom'], $focus->deparment));
        $this->ss->assign('TOUR_TYPE',get_select_options_with_id($app_list_strings['tour_type_dom'], $focus->tour_type));*/
        
        if(!empty($focus->tour_type)){
         $this->ss->assign('TOUR_TYPE', get_select_options_with_id($app_list_strings['tour_type_dom'],$focus->tour_name));
        }
        else {$this->ss->assign('TOUR_TYPE', get_select_options_with_id($app_list_strings['tour_type_dom'],''));}
        if(!empty($focus->deparment)){
            $this->ss->assign('DEPARMENT',get_select_options_with_id($app_list_strings['deparment_dom'],$focus->deparment));
        }
        else{$this->ss->assign('DEPARMENT',get_select_options_with_id($app_list_strings['deparment_dom'],''));}
        
        if(!empty($focus->transport)) {
            $this->ss->assign('TRANSPORT', get_select_options_with_id($app_list_strings['transport_dom'],$focus->transport));
        }
        else{ $this->ss->assign('TRANSPORT', get_select_options_with_id($app_list_strings['transport_dom'],''));}
        
        if(!empty($focus->division)){
                $this->ss->assign("DIVISION",           get_select_options_with_id($app_list_strings['division_dom'], $focus->division))  ; 
        }
        else{$this->ss->assign("DIVISION",           get_select_options_with_id($app_list_strings['division_dom'],''))  ; }
        
        if(!empty($focus->currency)){
           $this->ss->assign("CURRENCY",           get_select_options_with_id($app_list_strings['currency_dom'], $focus->currency))  ;  
        }
        else{$this->ss->assign("CURRENCY",           get_select_options_with_id($app_list_strings['currency_dom'],''))  ;  }
                 
        if(!empty($focus->picture)){
            $this->ss->assign('PICTURE',"<img src='".$sugar_config['site_url']."/modules/images/".$focus->picture."' width='350' height='200'/>") ;    
        }
        else{$this->ss->assign('PICTURE','');}
        
        $popup_request_data = array(
        'call_back_function' => 'set_return',
        'form_name' => 'toursQuickCreate',
        'field_to_name_array' => array(
            'id' => 'assigned_user_id',
            'user_name' => 'assigned_user_name',
            ),
        );
        $this->ss->assign('encoded_users_popup_request_data' , $json->encode($popup_request_data));

        // operator
        $encoded_operator_popup_request_data = array(
              'call_back_function' => 'set_return',
                'form_name' => 'toursQuickCreate',
                'field_to_name_array' => array(
                    'id' => 'operator_id',
                    'user_name' => 'operator',
                ),
        );
        
        $this->ss->assign('encoded_operator_popup_request_data', $json->encode($encoded_operator_popup_request_data));
        
        
        $location_popup_data_request = array(
            'call_back_function' => 'set_return',
            'form_name'  => 'toursQuickCreate',
            'field_to_name_array' => array(
            'id' => 'location_id',
            'name' => 'to_place',
        ),
        );

         $this->ss->assign('location_popup_request_data',$json->encode($location_popup_data_request));

        $location_to_popup_request_data = array(
            'call_back_function' => 'set_return',
            'form_name'  => 'toursQuickCreate',
            'field_to_name_array' => array(
            'id' => 'location_to_id',
            'name' => 'from_place',
        ),
        );

         $this->ss->assign('location_to_popup_request_data',$json->encode($location_to_popup_request_data));

        
        
        $this->ss->assign('additionalScripts', $this->javascript->getScript(false));
    }   
}
?>