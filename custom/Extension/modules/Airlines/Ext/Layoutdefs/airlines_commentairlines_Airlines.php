<?php
// created: 2011-11-21 16:47:46
$layout_defs["Airlines"]["subpanel_setup"]["airlines_commentairlines"] = array (
  'order' => 100,
  'module' => 'CommentAirlines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AIRLINES_COMMENTAIRLINES_FROM_COMMENTAIRLINES_TITLE',
  'get_subpanel_data' => 'airlines_commentairlines',
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
