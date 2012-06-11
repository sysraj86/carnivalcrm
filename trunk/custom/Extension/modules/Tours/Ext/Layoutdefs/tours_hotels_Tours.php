<?php
// created: 2011-12-21 08:44:32
$layout_defs["Tours"]["subpanel_setup"]["tours_hotels"] = array (
  'order' => 100,
  'module' => 'Hotels',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_HOTELS_FROM_HOTELS_TITLE',
  'get_subpanel_data' => 'tours_hotels',
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
