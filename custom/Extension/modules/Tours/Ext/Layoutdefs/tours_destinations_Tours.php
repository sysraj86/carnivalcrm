<?php
// created: 2011-12-12 15:39:15
$layout_defs["Tours"]["subpanel_setup"]["tours_destinations"] = array (
  'order' => 100,
  'module' => 'Destinations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_DESTINATIONS_FROM_DESTINATIONS_TITLE',
  'get_subpanel_data' => 'tours_destinations',
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
