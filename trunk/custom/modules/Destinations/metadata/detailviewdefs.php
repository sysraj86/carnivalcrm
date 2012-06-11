<?php
$module_name = 'Destinations';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
      ),
      0 => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'code',
        ),
        1 => 
        array (
          0 => 'area',
          1 => 
          array (
            'name' => 'countries_dtinations_name',
            'label' => 'LBL_COUNTRIES_DESTINATIONS_FROM_COUNTRIES_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'c_areas_destinations_name',
            'label' => 'LBL_C_AREAS_DESTINATIONS_FROM_C_AREAS_TITLE',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
        4 => 
        array (
          0 => 'assigned_user_name',
          1 => 'picture',
        ),
      ),
    ),
  ),
);
?>
