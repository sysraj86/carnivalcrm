<?php
// created: 2012-07-24 15:40:55
$layout_defs["Restaurants"]["subpanel_setup"]["restaurantsaurantbookings"] = array (
  'order' => 100,
  'module' => 'RestaurantBookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RESTAURANTS_RESTAURANTBOOKINGS_FROM_RESTAURANTBOOKINGS_TITLE',
  'get_subpanel_data' => 'restaurantsaurantbookings',
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
