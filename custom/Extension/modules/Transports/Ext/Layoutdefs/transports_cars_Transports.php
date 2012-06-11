<?php
// created: 2011-11-09 10:14:26
$layout_defs["Transports"]["subpanel_setup"]["transports_cars"] = array (
  'order' => 100,
  'module' => 'Cars',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TRANSPORTS_CARS_FROM_CARS_TITLE',
  'get_subpanel_data' => 'transports_cars',
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
