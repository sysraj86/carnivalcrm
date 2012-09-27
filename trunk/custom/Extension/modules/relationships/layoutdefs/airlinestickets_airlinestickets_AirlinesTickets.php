<?php
// created: 2012-09-25 18:15:46
$layout_defs["AirlinesTickets"]["subpanel_setup"]["airlinesticirlinestickets"] = array (
  'order' => 100,
  'module' => 'AirlinesTickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AIRLINESTICKETS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_R_TITLE',
  'get_subpanel_data' => 'airlinesticirlinestickets',
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
