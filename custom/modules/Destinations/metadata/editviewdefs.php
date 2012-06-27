<?php
$module_name = 'Destinations';
$viewdefs [$module_name] =
    array(
        'EditView' =>
        array(
            'templateMeta' =>
            array(
                'form' =>
                array(
                    'enctype' => 'multipart/form-data',
                ),
                'maxColumns' => '2',
                'widths' =>
                array(
                    0 =>
                    array(
                        'label' => '10',
                        'field' => '30',
                    ),
                    1 =>
                    array(
                        'label' => '10',
                        'field' => '30',
                    ),
                ),
                'includes' =>
                array(
                    0 =>
                    array(
                        'file' => 'custom/modules/Destinations/js/dropdown.js',
                    ),
                ),
                'useTabs' => false,
                'syncDetailEditViews' => true,
            ),
            'panels' =>
            array(
                'default' =>
                array(
                    0 =>
                    array(
                        0 => 'name',
                        1 =>
                        array(
                            'name' => 'code',
                            'label' => 'LBL_CODE',
                        ),
                    ),
                    1 =>
                    array(
                        0 =>
                        array(
                            'name' => 'countries_dtinations_name',
                            'label' => 'LBL_COUNTRY_NAME',
                        ),
                        1 => array(
                            'name' => 'c_areas_destinations_name',
                            'label' => 'LBL_C_AREAS_DESTINATIONS_FROM_C_AREAS_TITLE'
                        )
                    ),
                    2 =>
                    array(
                        0 => '',
                    ),
                    3 =>
                    array(
                        0 => 'description',
                    ),
                    4 =>
                    array(
                        0 => 'assigned_user_name',
                        1 => '',
                    ),
                ),
            ),
        ),
    );
?>
