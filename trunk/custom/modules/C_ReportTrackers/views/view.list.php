<?php if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.list.php');

    class C_ReportTrackersViewList extends ViewList {
        
        public function C_ReportTrackersViewList(){
            //$this->display();
        }

	    function display() {

            header('Location: index.php?module=C_ReportTrackers&action=report');
	    } // end display
    } // end class
?>
