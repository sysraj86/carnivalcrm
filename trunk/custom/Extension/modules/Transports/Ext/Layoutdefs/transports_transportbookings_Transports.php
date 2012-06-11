<?php
// created: 2011-09-10 08:39:23
$layout_defs["Transports"]["subpanel_setup"]["transports_nsportbookings"] = array (
  'order' => 100,
  'module' => 'TransportBookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TRANSPORTS_TRANSPORTBOOKINGS_FROM_TRANSPORTBOOKINGS_TITLE',
  'get_subpanel_data' => 'transports_nsportbookings',
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
