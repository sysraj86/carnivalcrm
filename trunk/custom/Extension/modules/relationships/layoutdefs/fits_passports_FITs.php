<?php
// created: 2011-08-19 15:05:02
$layout_defs["FITs"]["subpanel_setup"]["fits_passports"] = array (
  'order' => 100,
  'module' => 'Passports',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_PASSPORTS_FROM_PASSPORTS_TITLE',
  'get_subpanel_data' => 'fits_passports',
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
