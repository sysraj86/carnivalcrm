<?php
// created: 2012-03-19 09:11:20
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'tel' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_RES_TEL',
    'width' => '10%',
    'default' => true,
  ),
  'website' => 
  array (
    'type' => 'url',
    'vname' => 'LBL_WEBSITE',
    'width' => '10%',
    'default' => true,
  ),
  'address' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_RES_ADDRESS',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'area' => 
  array (
    'type' => 'enum',
    'vname' => 'LBL_AREA',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
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
    'module' => 'Restaurants',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Restaurants',
    'width' => '5%',
    'default' => true,
  ),
);
?>
