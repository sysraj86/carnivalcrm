<?php
$module_name = 'Tours';
$listViewDefs [$module_name] = 
array (
  'TOUR_CODE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TOUR_CODE',
    'default' => true,
    'link' => true,
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'START_DATE' => 
  array (
    'width' => '5%',
    'label' => 'LBL_START_DATE',
    'default' => true,
  ),
  'END_DATE' => 
  array (
    'width' => '5%',
    'label' => 'LBL_END_DATE',
    'default' => true,
  ),
  'STATUS' => 
  array (
    'width' => '15%',
    'label' => 'LBL_STATUS',
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
  'SYNCED' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_TOUR_IS_SYNCED',
    'width' => '5%',
    'default' => true,
  //  'customCode'=>'<input type="checkbox" {$SYNCED eq 0} checked="checked" {/if} class="checkbox"/>'
  ),
);
?>
