<?php
// created: 2011-08-19 10:41:51
$layout_defs["Tours"]["subpanel_setup"]["tours_oders"] = array (
  'order' => 100,
  'module' => 'Oders',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_ODERS_FROM_ODERS_TITLE',
  'get_subpanel_data' => 'tours_oders',
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
