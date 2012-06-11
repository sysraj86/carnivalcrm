<?php
// created: 2011-09-06 14:37:07
$layout_defs["Airlines"]["subpanel_setup"]["airlines_ailinestickets_1"] = array (
  'order' => 100,
  'module' => 'AirlinesTickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AIRLINES_AIRLINESTICKETS_1_FROM_AIRLINESTICKETS_TITLE',
  'get_subpanel_data' => 'airlines_ailinestickets_1',
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
