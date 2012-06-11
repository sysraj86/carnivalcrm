<?php
// created: 2011-09-20 09:12:33
$layout_defs["FITs"]["subpanel_setup"]["fits_quotes"] = array (
  'order' => 100,
  'module' => 'Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_QUOTES_FROM_QUOTES_TITLE',
  'get_subpanel_data' => 'fits_quotes',
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
