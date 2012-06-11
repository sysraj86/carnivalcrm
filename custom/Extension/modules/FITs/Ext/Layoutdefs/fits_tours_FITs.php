<?php
// created: 2011-08-19 10:28:21
$layout_defs["FITs"]["subpanel_setup"]["fits_tours"] = array (
  'order' => 100,
  'module' => 'Tours',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_TOURS_FROM_TOURS_TITLE',
  'get_subpanel_data' => 'fits_tours',
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
