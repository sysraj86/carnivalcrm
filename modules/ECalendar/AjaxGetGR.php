<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 

error_reporting(0);

		require_once('include/json_config.php');
		global $json;
        	$json = getJSONobj();
        	$json_config = new json_config();
        	$GRjavascript = $json_config->getFocusData($_REQUEST['type'], $_REQUEST['record']);
        	ob_clean();
        	echo $GRjavascript;

?>
