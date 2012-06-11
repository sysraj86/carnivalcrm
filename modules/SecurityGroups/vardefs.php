<?php

$dictionary['SecurityGroup'] = array(
	'table'=>'securitygroups',
	'audited'=>true,
	'fields'=>array (
	'noninheritable' => 
	array (
		'name' => 'noninheritable',
		'vname' => 'LBL_NONINHERITABLE',
		'type' => 'bool',
		'reportable'=>false,
		'comment' => 'Indicator for whether a group can be inherited by a record'
	),
	
	'users' => array(
	  'name' => 'users',
	  'type' => 'link',
	  'relationship' => 'securitygroups_users',
	  'source' => 'non-db',
	  'vname'=>'LBL_USERS',
	),
	'aclroles' => array(
	  'name' => 'aclroles',
	  'type' => 'link',
	  'relationship' => 'securitygroups_acl_roles',
	  'source' => 'non-db',
	  'vname'=>'LBL_ROLES',
	),

),
	'relationships'=>array (
),
	'optimistic_lock'=>true,
);
require_once('include/SugarObjects/VardefManager.php');
VardefManager::createVardef('SecurityGroups','SecurityGroup', array('basic','assignable'));
?>