<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class AccountsViewEdit extends ViewEdit {
	private $manager;

    function init($bean = null, $view_object_map = array()) {
		parent::init($bean, $view_object_map);

		require_once('custom/include/utils/DevToolKitManager.php');

		$this->manager = new DevToolKitManager($this);
    }

	function display() {
		$this->manager->display();
		$this->ev->process();

		echo $this->ev->display();
	}

	function process() {
		parent::process();
		$this->manager->process();
	}
}
?>
