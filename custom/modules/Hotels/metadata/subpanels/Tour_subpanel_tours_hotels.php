<?php
// created: 2012-03-19 09:05:52
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'tel' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_HOTEL_TEL',
    'width' => '10%',
    'default' => true,
  ),
  'destinations_hotels_name' => 
  array (
    'type' => 'relate',
    'link' => 'destinations_hotels',
    'vname' => 'LBL_DESTINATIONS_HOTELS_FROM_DESTINATIONS_TITLE',
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
    'width' => '7%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Hotels',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Hotels',
    'width' => '5%',
    'default' => true,
  ),
);
?>
