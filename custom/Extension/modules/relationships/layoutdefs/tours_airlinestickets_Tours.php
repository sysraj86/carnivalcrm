<?php
// created: 2011-12-20 09:20:56
$layout_defs["Tours"]["subpanel_setup"]["tours_airlinestickets"] = array (
  'order' => 100,
  'module' => 'AirlinesTickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
  'get_subpanel_data' => 'tours_airlinestickets',
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
