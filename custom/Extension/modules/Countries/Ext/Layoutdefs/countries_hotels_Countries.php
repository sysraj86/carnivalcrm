<?php
// created: 2011-10-18 18:15:44
$layout_defs["Countries"]["subpanel_setup"]["countries_hotels"] = array (
  'order' => 100,
  'module' => 'Hotels',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_COUNTRIES_HOTELS_FROM_HOTELS_TITLE',
  'get_subpanel_data' => 'countries_hotels',
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
