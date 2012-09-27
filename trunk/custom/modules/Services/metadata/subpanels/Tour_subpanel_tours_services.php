<?php
// created: 2012-09-27 17:57:15
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
    'type' => 'phone',
    'vname' => 'LBL_RES_TEL',
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
  'destination_services_name' => 
  array (
    'type' => 'relate',
    'link' => 'destinations_services',
    'vname' => 'LBL_DESTINATIONS_SERVICES_FROM_DESTINATIONS_TITLE',
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
