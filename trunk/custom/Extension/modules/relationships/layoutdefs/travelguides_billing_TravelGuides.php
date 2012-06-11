<?php
// created: 2011-12-14 18:12:44
$layout_defs["TravelGuides"]["subpanel_setup"]["travelguides_billing"] = array (
  'order' => 100,
  'module' => 'Billing',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TRAVELGUIDES_BILLING_FROM_BILLING_TITLE',
  'get_subpanel_data' => 'travelguides_billing',
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
