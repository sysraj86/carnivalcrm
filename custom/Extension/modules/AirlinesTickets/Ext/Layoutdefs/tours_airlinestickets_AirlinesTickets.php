<?php
// created: 2011-12-24 21:20:11
$layout_defs["AirlinesTickets"]["subpanel_setup"]["tours_airlinestickets"] = array (
  'order' => 100,
  'module' => 'Tours',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_AIRLINESTICKETS_FROM_TOURS_TITLE',
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

unset($layout_defs["AirlinesTickets"]["subpanel_setup"]["tours_airlinestickets"]['top_buttons'][0]);