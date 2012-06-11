<?php
// created: 2011-08-18 00:14:33
$layout_defs["PassportList"]["subpanel_setup"]["passportlist_passports"] = array (
  'order' => 100,
  'module' => 'Passports',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PASSPORTLIST_PASSPORTS_FROM_PASSPORTS_TITLE',
  'get_subpanel_data' => 'passportlist_passports',
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
