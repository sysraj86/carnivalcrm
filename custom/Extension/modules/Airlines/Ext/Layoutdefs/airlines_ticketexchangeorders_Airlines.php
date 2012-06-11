<?php
// created: 2011-09-06 12:32:50
$layout_defs["Airlines"]["subpanel_setup"]["airlines_tiexchangeorders"] = array (
  'order' => 100,
  'module' => 'TicketExchangeOrders',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_AIRLINES_TICKETEXCHANGEORDERS_FROM_TICKETEXCHANGEORDERS_TITLE',
  'get_subpanel_data' => 'airlines_tiexchangeorders',
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
