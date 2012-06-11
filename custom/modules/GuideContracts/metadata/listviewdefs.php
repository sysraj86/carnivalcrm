<?php
$module_name = 'GuideContracts';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'REPRESENTING_A' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_REPRESENTING_A',
    'width' => '10%',
    'default' => true,
  ),
  'TRAVELGUIDECONTRACTS_NAME' => 
  array (
    'type' => 'relate',
    'link' => 'travelguideguidecontracts',
    'label' => 'LBL_TRAVELGUIDES_GUIDECONTRACTS_FROM_TRAVELGUIDES_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'PHONE_B' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_PHONE',
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
