<?php
$module_name = 'Billing';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_BILLING_CODE',
    'default' => true,
    'link' => true,
  ),
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'TYPE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TYPE',
    'default' => true,
  ),
  'BILLING_COST' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_BILLING_COST',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PARENT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_FLEX_RELATE',
    'dynamic_module' => 'PARENT_TYPE',  
    'id' => 'PARENT_ID', 
    'link' => true,
    'default' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
      ),
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
