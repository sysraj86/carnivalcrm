<?php
// created: 2012-03-02 11:57:23
$layout_defs["C_Areas"]["subpanel_setup"]["c_areas_destinations"] = array (
  'order' => 100,
  'module' => 'Destinations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_C_AREAS_DESTINATIONS_FROM_DESTINATIONS_TITLE',
  'get_subpanel_data' => 'c_areas_destinations',
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
