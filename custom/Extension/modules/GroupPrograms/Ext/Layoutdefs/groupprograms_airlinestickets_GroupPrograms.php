<?php
// created: 2011-08-31 11:29:59
$layout_defs["GroupPrograms"]["subpanel_setup"]["groupprograirlinestickets"] = array (
  'order' => 100,
  'module' => 'AirlinesTickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GROUPPROGRAMS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
  'get_subpanel_data' => 'groupprograirlinestickets',
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
