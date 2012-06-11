<?php
// created: 2011-09-07 20:29:53
$layout_defs["Restaurants"]["subpanel_setup"]["restaurants_foodmenu"] = array (
  'order' => 100,
  'module' => 'FoodMenu',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RESTAURANTS_FOODMENU_FROM_FOODMENU_TITLE',
  'get_subpanel_data' => 'restaurants_foodmenu',
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
