<?php
// created: 2011-08-24 10:11:51
$layout_defs["Restaurants"]["subpanel_setup"]["restaurantservicebookings"] = array (
  'order' => 100,
  'module' => 'ServiceBookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RESTAURANTS_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
  'get_subpanel_data' => 'restaurantservicebookings',
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
