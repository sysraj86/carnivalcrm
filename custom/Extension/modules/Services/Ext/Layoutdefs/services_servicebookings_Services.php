<?php
// created: 2012-08-06 15:50:49
$layout_defs["Services"]["subpanel_setup"]["services_servicebookings"] = array (
  'order' => 100,
  'module' => 'ServiceBookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_SERVICES_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
  'get_subpanel_data' => 'services_servicebookings',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
