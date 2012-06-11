<?php
// created: 2011-10-18 18:13:25
$layout_defs["Destinations"]["subpanel_setup"]["destinations_restaurants"] = array (
  'order' => 100,
  'module' => 'Restaurants',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DESTINATIONS_RESTAURANTS_FROM_RESTAURANTS_TITLE',
  'get_subpanel_data' => 'destinations_restaurants',
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
