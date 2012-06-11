<?php
// created: 2011-09-06 12:14:34
$layout_defs["TicketExchangeOrders"]["subpanel_setup"]["ticketexchars_ticketorder"] = array (
  'order' => 100,
  'module' => 'TicketOrder',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TICKETEXCHANGEORDERS_TICKETORDER_FROM_TICKETORDER_TITLE',
  'get_subpanel_data' => 'ticketexchars_ticketorder',
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
