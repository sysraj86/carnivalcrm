<?php
// created: 2012-11-15 15:45:08
$subpanel_layout['list_fields'] = array (
  'code' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SERVICE_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'transports_tbookings_name' => 
  array (
    'type' => 'relate',
    'link' => 'transports_nsportbookings',
    'vname' => 'LBL_TRANSPORTS_TRANSPORTBOOKINGS_FROM_TRANSPORTS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'groupprogratbookings_name' => 
  array (
    'type' => 'relate',
    'link' => 'groupprogransportbookings',
    'vname' => 'LBL_GROUPPROGRAMS_TRANSPORTBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
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
    'module' => 'TransportBookings',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'TransportBookings',
    'width' => '5%',
    'default' => true,
  ),
);
?>
