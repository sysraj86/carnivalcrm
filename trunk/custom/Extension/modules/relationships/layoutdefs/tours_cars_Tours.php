<?php
// created: 2011-12-21 08:48:30
$layout_defs["Tours"]["subpanel_setup"]["tours_cars"] = array (
  'order' => 100,
  'module' => 'Cars',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_CARS_FROM_CARS_TITLE',
  'get_subpanel_data' => 'tours_cars',
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
