<?php
// created: 2012-03-19 08:59:45
$subpanel_layout['list_fields'] = array (
  'number_plates' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_NUMBER_PLATES',
    'width' => '10%',
    'widget_class' => 'SubPanelDetailViewLink',
    'default' => true,
  ),
  'driver_name' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'link'  => true,
    'default' => true,
  ),
  'numofseat' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_NUMOFSEAT',
    'width' => '10%',
    'default' => true,
  ),
  'phone' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_PHONE',
    'width' => '10%',
    'default' => true,
  ),
  'area' => 
  array (
    'type' => 'enum',
    'default' => true,
    'vname' => 'LBL_AREA',
    'sortable' => false,
    'width' => '10%',
  ),
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '45%',
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
