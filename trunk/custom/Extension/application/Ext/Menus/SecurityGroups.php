<?php 
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $current_language, $app_strings, $current_user;

if(!empty($_SESSION['masquerade_user'])) {
	$module_menu[] = Array("index.php?module=Users&action=Unmasquerade", $app_strings['LBL_LOGOUT_AS'].$current_user->user_name,"Masquerade");
}


?>