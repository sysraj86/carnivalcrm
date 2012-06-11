<?php
// created: 2011-10-21 10:42:19
$layout_defs["Accounts"]["subpanel_setup"]["accounts_tours"] = array (
  'order' => 100,
  'module' => 'Tours',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_TOURS_FROM_TOURS_TITLE',
  'get_subpanel_data' => 'accounts_tours',
  'top_buttons' => 
  array (
/* fixbug 649 
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),*/
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
