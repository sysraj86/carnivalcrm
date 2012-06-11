<?php
// created: 2011-08-08 10:22:17

$layout_defs["Accounts"]["subpanel_setup"]["tours_accounts"] = array (
  'order' => 100,
  'module' => 'Tours',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_ACCOUNTS_FROM_TOURS_TITLE',
  'get_subpanel_data' => 'tours_accounts',
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
