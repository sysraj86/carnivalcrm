<?php
$module_name = 'Destinations';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'enctype' => 'multipart/form-data',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/Destinations/js/dropdown.js',
        ),
      ),
      'useTabs' => false,
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'countries_dtinations_name',
            'label' => 'LBL_COUNTRY_NAME',
          ),
          1 => 
          array (
            'name' => 'destination_region',
            'label' => 'LBL_DESTINATION_REGION',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'department',
            'label' => 'LBL_DEPARTMENT',
          ),
          1 => 
          array (
            'name' => 'area',
            'customCode' => '{html_options name="area" id="area" options=$fields.area.options selected=$fields.area.value}&nbsp;<em>(Uses for Worksheets)</em>',
          ),
        ),
        3 => 
        array (
          0 => 'assigned_user_name',
          1 => 'description',
        ),
      ),
    ),
  ),
);
?>
