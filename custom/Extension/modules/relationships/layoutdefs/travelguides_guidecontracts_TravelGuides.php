<?php
// created: 2011-08-31 09:23:22
$layout_defs["TravelGuides"]["subpanel_setup"]["travelguideguidecontracts"] = array (
  'order' => 100,
  'module' => 'GuideContracts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TRAVELGUIDES_GUIDECONTRACTS_FROM_GUIDECONTRACTS_TITLE',
  'get_subpanel_data' => 'travelguideguidecontracts',
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
