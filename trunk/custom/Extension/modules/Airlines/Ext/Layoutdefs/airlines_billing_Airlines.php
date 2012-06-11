<?php
// created: 2011-08-19 11:21:27
$layout_defs["Airlines"]["subpanel_setup"]["airlines_billing"] = array (
  'order' => 100,
  'module' => 'Billing',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AIRLINES_BILLING_FROM_BILLING_TITLE',
  'get_subpanel_data' => 'airlines_billing',
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
