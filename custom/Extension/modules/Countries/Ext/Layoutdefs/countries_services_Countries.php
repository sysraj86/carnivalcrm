<?php
// created: 2012-02-18 11:07:24
$layout_defs["Countries"]["subpanel_setup"]["countries_services"] = array (
  'order' => 100,
  'module' => 'Services',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_COUNTRIES_SERVICES_FROM_SERVICES_TITLE',
  'get_subpanel_data' => 'countries_services',
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
