<?php
// created: 2011-08-19 10:30:15
$layout_defs["FITs"]["subpanel_setup"]["fits_billing"] = array (
  'order' => 100,
  'module' => 'Billing',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_BILLING_FROM_BILLING_TITLE',
  'get_subpanel_data' => 'fits_billing',
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
