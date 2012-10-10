<?php
// created: 2011-12-21 08:44:32
$layout_defs["Hotels"]["subpanel_setup"]["tours_hotels"] = array (
  'order' => 100,
  'module' => 'Tours',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_HOTELS_FROM_TOURS_TITLE',
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

unset($layout_defs["Hotels"]["subpanel_setup"]["tours_hotels"]['top_buttons'][0]);