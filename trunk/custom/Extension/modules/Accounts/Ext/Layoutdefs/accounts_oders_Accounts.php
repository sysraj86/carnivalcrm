<?php
// created: 2011-10-26 00:36:45
$layout_defs["Accounts"]["subpanel_setup"]["accounts_oders"] = array (
  'order' => 100,
  'module' => 'Oders',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_ODERS_FROM_ODERS_TITLE',
  'get_subpanel_data' => 'accounts_oders',
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
