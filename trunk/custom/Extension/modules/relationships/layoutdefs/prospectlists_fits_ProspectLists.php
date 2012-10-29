<?php
// created: 2012-10-26 19:00:56
$layout_defs["ProspectLists"]["subpanel_setup"]["prospectlists_fits"] = array (
  'order' => 100,
  'module' => 'FITs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_PROSPECTLISTS_FITS_FROM_FITS_TITLE',
  'get_subpanel_data' => 'prospectlists_fits',
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
