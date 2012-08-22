<?php
// created: 2012-08-22 10:31:18
$layout_defs["Countries"]["subpanel_setup"]["countries_c_areas"] = array (
  'order' => 100,
  'module' => 'C_Areas',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_COUNTRIES_C_AREAS_FROM_C_AREAS_TITLE',
  'get_subpanel_data' => 'countries_c_areas',
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
