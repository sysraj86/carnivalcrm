<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class OdersViewEdit extends ViewEdit {
	function OdersViewEdit(){
 		parent::ViewEdit();
 	}
	
	function display(){
		$this->setFields();
		parent::display();

	}
	
	function setFields(){
        if($this->bean->parent_type == 'Accounts'){
            $this->ss->assign('Account','checked="checked"');
        }
        else if($this->bean->parent_type == 'FITs'){
             $this->ss->assign('FITs','checked="checked"');
        }
	}	

}
?>
