<?php
// created: 2011-08-22 10:53:04
$layout_defs["GroupLists"]["subpanel_setup"]["grouplists_fits"] = array (
  'order' => 100,
  'module' => 'FITs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GROUPLISTS_FITS_FROM_FITS_TITLE',
  'get_subpanel_data' => 'grouplists_fits',
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
