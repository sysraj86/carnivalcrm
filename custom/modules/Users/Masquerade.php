<?php


global $current_user;
if(is_admin($current_user) && !empty($_REQUEST['record'])) {
	require_once('modules/Users/User.php');
	
	$mask_user = new User();
	$mask_user->retrieve($_REQUEST['record']);
	if($mask_user != null) {
		global $current_user;
		$_SESSION['masquerade_user'] = $GLOBALS['current_user'];
		$GLOBALS['current_user'] = $mask_user;
		$current_user = $mask_user;
		$_SESSION['authenticated_user_id'] = $mask_user->id;
		
		$GLOBALS['log']->debug("User ".$_SESSION['masquerade_user']->user_name." is Masquerading as ".$mask_user->user_name);
		
		header('Location: index.php?module=Home&action=index');
	}

}


?>