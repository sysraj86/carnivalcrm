<?php
// created: 2011-09-21 10:55:25
$layout_defs["Contracts"]["subpanel_setup"]["contracts_apendixcontract"] = array (
  'order' => 100,
  'module' => 'AppendixContract',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_CONTRACTS_APPENDIXCONTRACT_FROM_APPENDIXCONTRACT_TITLE',
  'get_subpanel_data' => 'contracts_apendixcontract',
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
