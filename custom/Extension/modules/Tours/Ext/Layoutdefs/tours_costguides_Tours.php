<?php
// created: 2012-01-10 09:17:34
$layout_defs["Tours"]["subpanel_setup"]["tours_costguides"] = array (
  'order' => 100,
  'module' => 'CostGuides',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_COSTGUIDES_FROM_COSTGUIDES_TITLE',
  'get_subpanel_data' => 'tours_costguides',
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
