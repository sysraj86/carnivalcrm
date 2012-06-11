<?php
// created: 2011-10-18 18:17:09
$layout_defs["Countries"]["subpanel_setup"]["countries_restaurants"] = array (
  'order' => 100,
  'module' => 'Restaurants',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_COUNTRIES_RESTAURANTS_FROM_RESTAURANTS_TITLE',
  'get_subpanel_data' => 'countries_restaurants',
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
