<?php
// created: 2011-10-26 00:43:22
$layout_defs["FITs"]["subpanel_setup"]["fits_oders"] = array (
  'order' => 100,
  'module' => 'Oders',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_ODERS_FROM_ODERS_TITLE',
  'get_subpanel_data' => 'fits_oders',
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
