<?php
// created: 2011-10-26 10:52:09
$layout_defs["Destinations"]["subpanel_setup"]["destinations_transports"] = array (
  'order' => 100,
  'module' => 'Transports',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_DESTINATIONS_TRANSPORTS_FROM_TRANSPORTS_TITLE',
  'get_subpanel_data' => 'destinations_transports',
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
