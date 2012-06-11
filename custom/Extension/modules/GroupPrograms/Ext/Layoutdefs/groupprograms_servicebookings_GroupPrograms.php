<?php
// created: 2011-08-24 10:58:19
$layout_defs["GroupPrograms"]["subpanel_setup"]["groupprograervicebookings"] = array (
  'order' => 100,
  'module' => 'ServiceBookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GROUPPROGRAMS_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
  'get_subpanel_data' => 'groupprograervicebookings',
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
