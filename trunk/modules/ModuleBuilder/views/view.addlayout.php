<?php
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004 - 2008 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
require_once('modules/ModuleBuilder/MB/AjaxCompose.php');


class ViewAddLayout extends SugarView{
	function ViewAddLayout(){
		parent::SugarView();
		
	}

	function display(){
        $this->fromModuleBuilder = isset ( $_REQUEST [ 'MB' ] ) || (!empty ( $_REQUEST [ 'view_package' ] ) && $_REQUEST [ 'view_package' ] != 'studio') ;
		if ($this->fromModuleBuilder) {
			return; //no support for MB
		}
		global $current_user;
		global $mod_strings;

		$smarty = new Sugar_Smarty();
		$smarty->assign('title' , $mod_strings['LBL_DEVELOPER_TOOLS']);
		$smarty->assign('question', $mod_strings['LBL_QUESTION_ADD_LAYOUT']);
        $smarty->assign('mod_strings', $mod_strings);
        
        $module_name = $_REQUEST['view_module'];

        //$securitygroups = array ( "Support" => "Support" , "Sales" => "Sales" ) ;
        //$copy_layouts = array ( "Default" => "Default", "Support" => "Support" , "Sales" => "Sales" ) ;
		
		//get security groups that do not have a layout for this module yet
		require_once('modules/SecurityGroups/SecurityGroup.php');
		$securitygroups = array();
		$copy_layouts = array("Default" => translate('LBL_DEFAULT', 'ModuleBuilder'));
		$groupFocus = new SecurityGroup();
		$groups = $groupFocus->get_list("name","",0,0,999);
        $custDirectory = "custom/modules/".$module_name."/metadata/";
		foreach($groups['list'] as $group) {
    		if(is_dir($custDirectory.$group->id)) {
    			$copy_layouts[$group->id] = $group->name;
    		} else {
				$securitygroups[$group->id] = $group->name;
			}
		}
		if(empty($securitygroups)) {
			$securitygroups["-1"] = "[Create a Group First]";
		}

 /**
 
         // assign fields and layout
         $smarty->assign ( 'available_fields', $parser->getAvailableFields () ) ;
         $smarty->assign ( 'layout', $parser->getLayout () ) ;
         $smarty->assign ( 'view_module', $this->editModule ) ;
         $smarty->assign ( 'view', $this->editLayout ) ;
         $smarty->assign ( 'maxColumns', $parser->getMaxColumns() ) ;
         $smarty->assign ( 'nextPanelId', $parser->getFirstNewPanelId() ) ;
         $smarty->assign ( 'fieldwidth', '150px' ) ;
        $smarty->assign ( 'translate', true ) ;
*/
        //$this->smarty->assign ( 'view_module', $_REQUEST['view_module'] ) ;
        //$this->smarty->assign ( 'rel', $relationship->getDefinition () ) ;
        //$this->smarty->assign ( 'mod_strings', $GLOBALS [ 'mod_strings' ] ) ;
        //$this->smarty->assign ( 'module_key', $relationship->lhs_module ) ;
        $smarty->assign ( 'securitygroups', array_keys ( $securitygroups ) ) ;
        $smarty->assign ( 'translated_securitygroups', $securitygroups ) ;	
        $smarty->assign ( 'copy_layouts', array_keys ( $copy_layouts ) ) ;
        $smarty->assign ( 'translated_copy_layouts', $copy_layouts ) ;	
        $smarty->assign ( 'view_module', $module_name ) ;	

        // set up language files
        //$smarty->assign ( 'language', $parser->getLanguage() ) ; // for sugar_translate in the smarty template
        //$smarty->assign('from_mb',$this->fromModuleBuilder);
		$mb = new ModuleBuilder ( ) ;
		if(!isset( $_REQUEST [ 'view_package' ]))  $_REQUEST [ 'view_package' ] = 'studio';
		$module = & $mb->getPackageModule ( $_REQUEST [ 'view_package' ], $_REQUEST [ 'view_module' ] ) ;
		$package = $mb->packages [ $_REQUEST [ 'view_package' ] ] ;
		$package->loadModuleTitles();        
		$ajax = new AjaxCompose();
		$ajax->addCrumb ( translate ( 'LBL_STUDIO', 'ModuleBuilder' ), 'ModuleBuilder.main("studio")' ) ;
        $ajax->addCrumb(translate($module_name), 'ModuleBuilder.getContent("module=ModuleBuilder&action=wizard&view_module='.$module_name.'")');
		$ajax->addCrumb ( translate ( 'LBL_LAYOUTS', 'ModuleBuilder' ), 'ModuleBuilder.getContent("module=ModuleBuilder&action=addlayout&layouts=1&view_module=' . $module_name . '")' ) ;
        $ajax->addCrumb ( $mod_strings['LBL_ADD_LAYOUT'], '' ) ;
        //$ajax->addSection ( 'center', $moduleName . ' ' . translate('LBL_ADD_LAYOUT'),
		$ajax->addSection('center', $mod_strings['LBL_ADD_LAYOUT'],$smarty->fetch('modules/ModuleBuilder/tpls/addlayout.tpl'));
		
		echo $ajax->getJavascript();
	}


	function generateHomeButtons() {
		//$this->buttons['Application'] = array ('action' => '', 'imageTitle' => 'Application', 'size' => '128', 'help'=>'appBtn');
		$this->buttons[$GLOBALS['mod_strings']['LBL_STUDIO']] = array ('action' => "ModuleBuilder.main('studio')", 'imageTitle' => 'Studio', 'size' => '128', 'help'=>'studioBtn');
		$this->buttons[$GLOBALS['mod_strings']['LBL_MODULEBUILDER']] = array ('action' => "ModuleBuilder.main('mb')", 'imageTitle' => 'ModuleBuilder', 'size' => '128', 'help'=>'mbBtn');



		$this->buttons[$GLOBALS['mod_strings']['LBL_DROPDOWNEDITOR']] = array ('action' => "ModuleBuilder.main('dropdowns')", 'imageTitle' => $GLOBALS['mod_strings']['LBL_HOME_EDIT_DROPDOWNS'], 'imageName' => 'DropDownEditor', 'size' => '128', 'help'=>'dropDownEditorBtn');
	}
}
