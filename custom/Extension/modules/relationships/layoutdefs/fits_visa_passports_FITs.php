<?php
// created: 2011-08-19 10:34:31
$layout_defs["FITs"]["subpanel_setup"]["fits_visa_passports"] = array (
  'order' => 100,
  'module' => 'visa_Passports',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_VISA_PASSPORTS_FROM_VISA_PASSPORTS_TITLE',
  'get_subpanel_data' => 'fits_visa_passports',
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
