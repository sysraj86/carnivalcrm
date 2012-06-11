<?php
// created: 2011-09-09 10:08:10
$layout_defs["Airlines"]["subpanel_setup"]["airlines_ticketorder"] = array (
  'order' => 100,
  'module' => 'TicketOrder',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AIRLINES_TICKETORDER_FROM_TICKETORDER_TITLE',
  'get_subpanel_data' => 'airlines_ticketorder',
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
