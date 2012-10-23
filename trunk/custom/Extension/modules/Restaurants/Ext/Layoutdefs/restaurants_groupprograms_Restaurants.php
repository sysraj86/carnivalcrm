<?php
// created: 2011-10-18 18:00:33
$layout_defs["Restaurants"]["subpanel_setup"]["restaurants_groupprograms"] = array (
  'order' => 100,
  'module' => 'GroupPrograms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
  'get_subpanel_data' => 'restaurants_groupprograms',
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

unset($layout_defs["Restaurants"]["subpanel_setup"]["restaurants_groupprograms"]['top_buttons'][0]);