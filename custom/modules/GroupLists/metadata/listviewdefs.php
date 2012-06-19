<?php
$module_name = 'GroupLists';
$listViewDefs [$module_name] = 
array (
  'CODE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_GROUPLIST_CODE',
    'link' => true,
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'GROUP_TYPE' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_GROUP_TYPE',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'GROUPLISTS_PPROGRAMS_NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
    'module' => 'GroupPrograms',
    'id' => 'MADE_TOUR_ID',
    'related_fields' => 
    array (
      0 => 'grouplistsf242rograms_idb',
    ),
    'sortable' => true,
    'link' => true,
    'default' => true,
  ),
  'NUM_OF_CUS' => 
  array (
    'width' => '9%',
    'label' => 'LBL_NUM_OF_CUS',
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
