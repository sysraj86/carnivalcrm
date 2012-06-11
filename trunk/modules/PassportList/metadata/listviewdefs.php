<?php
$module_name = 'PassportList';
$listViewDefs [$module_name] = 
array (

    'CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
    'link' => true, 
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'STATUS' => 
  array (
    'width' => '15%',
    'label' => 'LBL_STATUS',
    'default' => true,
    'link' => true,
  ),
  
  'GROUPPROGRASPORTLIST_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'groupprogras_passportlist',
    'label' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_GROUPPROGRAMS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
