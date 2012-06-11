<?php
// created: 2011-08-19 10:46:04
$layout_defs["Tours"]["subpanel_setup"]["tours_airlines"] = array (
  'order' => 100,
  'module' => 'Airlines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_AIRLINES_FROM_AIRLINES_TITLE',
  'get_subpanel_data' => 'tours_airlines',
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
