<?php
// created: 2011-10-01 10:06:20
$layout_defs["AirlinesTickets"]["subpanel_setup"]["airlinestickets_accounts"] = array (
  'order' => 100,
  'module' => 'Accounts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AIRLINESTICKETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'get_subpanel_data' => 'airlinestickets_accounts',
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
