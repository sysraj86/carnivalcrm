<?php
// created: 2012-09-28 12:06:16
$layout_defs["Tours"]["subpanel_setup"]["tours_contractappendixs"] = array (
  'order' => 100,
  'module' => 'ContractAppendixs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_CONTRACTAPPENDIXS_FROM_CONTRACTAPPENDIXS_TITLE',
  'get_subpanel_data' => 'tours_contractappendixs',
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
