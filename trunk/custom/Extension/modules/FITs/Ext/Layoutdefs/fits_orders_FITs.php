<?php
// created: 2011-11-15 12:48:00
$layout_defs["FITs"]["subpanel_setup"]["fits_orders"] = array (
  'order' => 100,
  'module' => 'Orders',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_ORDERS_FROM_ORDERS_TITLE',
  'get_subpanel_data' => 'fits_orders',
  'top_buttons' => 
  array (
    /* Fix issue 1169
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),*/
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
