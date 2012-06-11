<?php
// created: 2011-11-21 16:43:46
$layout_defs["FITs"]["subpanel_setup"]["fits_commentairlines"] = array (
  'order' => 100,
  'module' => 'CommentAirlines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_COMMENTAIRLINES_FROM_COMMENTAIRLINES_TITLE',
  'get_subpanel_data' => 'fits_commentairlines',
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
