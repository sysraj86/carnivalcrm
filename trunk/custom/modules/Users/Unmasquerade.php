<?php


global $masquerade_user;

if(!empty($_SESSION['masquerade_user']) && is_admin($_SESSION['masquerade_user'])) {
	global $current_user;
	
	$GLOBALS['log']->debug("User ".$_SESSION['masquerade_user']->user_name." is Unmasquerading from ".$current_user->user_name);
	
	$GLOBALS['current_user'] = $_SESSION['masquerade_user'];
	$current_user = $_SESSION['masquerade_user'];
	$_SESSION['authenticated_user_id'] = $current_user->id;
	
	unset($_SESSION['masquerade_user']);
	

	header('Location: index.php?module=Users&action=ListView');
}



?>