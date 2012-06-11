<?php
// created: 2011-12-12 15:42:52
$layout_defs["Tours"]["subpanel_setup"]["tours_locations"] = array (
  'order' => 100,
  'module' => 'Locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_LOCATIONS_FROM_LOCATIONS_TITLE',
  'get_subpanel_data' => 'tours_locations',
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
