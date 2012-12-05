<?php
// created: 2012-12-05 15:27:15
$subpanel_layout['list_fields'] = array (
  'driver_name' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'link' => true,
  ),
  'number_plates' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_NUMBER_PLATES',
    'width' => '10%',
    'default' => true,
  ),
  'numofseat' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_NUMOFSEAT',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Contracts',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Contracts',
    'width' => '5%',
    'default' => true,
  ),
);
?>
