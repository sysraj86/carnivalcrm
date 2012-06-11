<?php
// created: 2011-12-14 17:44:23
$layout_defs["Billing"]["subpanel_setup"]["billing_transports"] = array (
  'order' => 100,
  'module' => 'Transports',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_BILLING_TRANSPORTS_FROM_TRANSPORTS_TITLE',
  'get_subpanel_data' => 'billing_transports',
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
