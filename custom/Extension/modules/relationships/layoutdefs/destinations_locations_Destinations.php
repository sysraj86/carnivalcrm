<?php
// created: 2011-08-19 16:15:29
$layout_defs["Destinations"]["subpanel_setup"]["destinations_locations"] = array (
  'order' => 100,
  'module' => 'Locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DESTINATIONS_LOCATIONS_FROM_LOCATIONS_TITLE',
  'get_subpanel_data' => 'destinations_locations',
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
