<?php
// created: 2012-03-02 10:56:44
$layout_defs["Countries"]["subpanel_setup"]["c_areas_countries"] = array (
  'order' => 100,
  'module' => 'C_Areas',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_C_AREAS_COUNTRIES_FROM_C_AREAS_TITLE',
  'get_subpanel_data' => 'c_areas_countries',
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
?>
