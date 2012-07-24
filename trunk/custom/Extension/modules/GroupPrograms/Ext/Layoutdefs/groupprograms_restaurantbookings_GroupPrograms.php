<?php
// created: 2012-07-24 15:29:15
$layout_defs["GroupPrograms"]["subpanel_setup"]["groupprograaurantbookings"] = array (
  'order' => 100,
  'module' => 'RestaurantBookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GROUPPROGRAMS_RESTAURANTBOOKINGS_FROM_RESTAURANTBOOKINGS_TITLE',
  'get_subpanel_data' => 'groupprograaurantbookings',
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
