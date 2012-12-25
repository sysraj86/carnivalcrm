<?php
// created: 2012-12-22 12:23:37
$layout_defs["Opportunities"]["subpanel_setup"]["opportunities_quotes"] = array (
  'order' => 100,
  'module' => 'Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OPPORTUNITIES_QUOTES_FROM_QUOTES_TITLE',
  'get_subpanel_data' => 'opportunities_quotes',
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
