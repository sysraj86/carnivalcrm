<?php
// created: 2011-10-26 10:56:10
$layout_defs["Countries"]["subpanel_setup"]["countries_transports"] = array (
  'order' => 100,
  'module' => 'Transports',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_COUNTRIES_TRANSPORTS_FROM_TRANSPORTS_TITLE',
  'get_subpanel_data' => 'countries_transports',
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
