<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-09-09 10:33:00
$layout_defs["TicketOrder"]["subpanel_setup"]["ticketorder_accounts"] = array (
  'order' => 100,
  'module' => 'Accounts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TICKETORDER_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'get_subpanel_data' => 'ticketorder_accounts',
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

?>