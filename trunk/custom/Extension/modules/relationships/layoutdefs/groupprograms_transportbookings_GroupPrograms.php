<?php
// created: 2011-09-10 08:42:47
$layout_defs["GroupPrograms"]["subpanel_setup"]["groupprogransportbookings"] = array (
  'order' => 100,
  'module' => 'TransportBookings',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GROUPPROGRAMS_TRANSPORTBOOKINGS_FROM_TRANSPORTBOOKINGS_TITLE',
  'get_subpanel_data' => 'groupprogransportbookings',
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
