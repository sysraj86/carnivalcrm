<?php
// created: 2011-08-24 10:09:40
$layout_defs["Hotels"]["subpanel_setup"]["hotels_roombookings"] = array (
  'order' => 100,
  'module' => 'RoomBookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HOTELS_ROOMBOOKINGS_FROM_ROOMBOOKINGS_TITLE',
  'get_subpanel_data' => 'hotels_roombookings',
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
