<?php
// created: 2011-08-19 16:16:42
$layout_defs["Countries"]["subpanel_setup"]["countries_destinations"] = array (
  'order' => 100,
  'module' => 'Destinations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_COUNTRIES_DESTINATIONS_FROM_DESTINATIONS_TITLE',
  'get_subpanel_data' => 'countries_destinations',
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
