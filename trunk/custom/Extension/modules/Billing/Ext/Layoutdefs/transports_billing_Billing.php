<?php
// created: 2011-12-14 18:08:58
$layout_defs["Billing"]["subpanel_setup"]["transports_billing"] = array (
  'order' => 100,
  'module' => 'Transports',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TRANSPORTS_BILLING_FROM_TRANSPORTS_TITLE',
  'get_subpanel_data' => 'transports_billing',
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
