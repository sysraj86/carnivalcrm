<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2012-08-22 10:31:18
$layout_defs["C_Areas"]["subpanel_setup"]["countries_c_areas"] = array (
  'order' => 100,
  'module' => 'Countries',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_COUNTRIES_C_AREAS_FROM_COUNTRIES_TITLE',
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

?>