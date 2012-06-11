<?php
// created: 2011-10-01 09:52:14
$layout_defs["AirlinesTickets"]["subpanel_setup"]["airlinestickets_fits"] = array (
  'order' => 100,
  'module' => 'FITs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AIRLINESTICKETS_FITS_FROM_FITS_TITLE',
  'get_subpanel_data' => 'airlinestickets_fits',
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
