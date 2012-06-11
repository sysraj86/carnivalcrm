<?php
// created: 2011-10-18 14:57:37
$layout_defs["FITs"]["subpanel_setup"]["fits_comments"] = array (
  'order' => 100,
  'module' => 'Comments',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_COMMENTS_FROM_COMMENTS_TITLE',
  'get_subpanel_data' => 'fits_comments',
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
