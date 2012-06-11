<?php
// created: 2011-09-20 08:44:38
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'quotes_tours_name' => 
  array (
    'type' => 'relate',
    'link' => 'quotes_tours',
    'vname' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'service_cost' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_SERVICE_COST',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'total_cost' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_TOTAL_COST',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'airline_ticket_cost' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_ARILINE_TICKET_COST',
    'currency_format' => true,
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
    'module' => 'Quotes',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Quotes',
    'width' => '5%',
    'default' => true,
  ),
);
?>
