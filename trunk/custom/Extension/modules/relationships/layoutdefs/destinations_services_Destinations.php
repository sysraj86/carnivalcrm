<?php
// created: 2011-11-01 14:20:09
$layout_defs["Destinations"]["subpanel_setup"]["destinations_services"] = array (
  'order' => 100,
  'module' => 'Services',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DESTINATIONS_SERVICES_FROM_SERVICES_TITLE',
  'get_subpanel_data' => 'destinations_services',
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
