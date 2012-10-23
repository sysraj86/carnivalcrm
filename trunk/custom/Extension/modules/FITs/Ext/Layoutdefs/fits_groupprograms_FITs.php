<?php
// created: 2011-09-05 10:45:41
$layout_defs["FITs"]["subpanel_setup"]["fits_groupprograms"] = array (
  'order' => 100,
  'module' => 'GroupPrograms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
  'get_subpanel_data' => 'fits_groupprograms',
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

unset($layout_defs["FITs"]["subpanel_setup"]["fits_groupprograms"]['top_buttons'][0]);