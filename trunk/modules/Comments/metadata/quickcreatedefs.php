<?php
$module_name = 'Comments';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
  array (
    'templateMeta' => 
    array (
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
    ),
    'panels' => 
    array (
    'LBL_THONGTINCHUNG' => 
    array(
        array (
          'fits_comments_name',
          'groupprogra_comments_name',
        ),
        array(
          'ngay',
          'lichtrinh',
        ),
        ),
    ),
  ),
);
?>
