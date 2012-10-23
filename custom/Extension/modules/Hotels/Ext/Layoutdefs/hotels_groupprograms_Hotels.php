<?php
// created: 2011-10-26 11:39:34
$layout_defs["Hotels"]["subpanel_setup"]["hotels_groupprograms"] = array (
  'order' => 100,
  'module' => 'GroupPrograms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_HOTELS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
  'get_subpanel_data' => 'hotels_groupprograms',
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

unset($layout_defs["Hotels"]["subpanel_setup"]["hotels_groupprograms"]['top_buttons'][0]);