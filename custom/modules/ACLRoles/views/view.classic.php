<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class ACLRolesViewClassic extends ViewDetail {


 	function ACLRolesViewClassic(){
 		parent::ViewDetail(); 	
 		
        //turn off normal display of subpanels
        $this->options['show_subpanels'] = false;
 	}
 	
 	function display(){
		$this->dv->process();
		echo '<style type="text/css">@import url("custom/modules/ACLRoles/styles/securitygroups.css"); </style>';
 	
		$file = SugarController::getActionFilename($this->action);
		$this->includeClassicFile('modules/'. $this->module . '/'. $file . '.php');
 	} 	
}

?>
