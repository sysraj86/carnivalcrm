<?php
$module_name = 'Destinations';
$viewdefs [$module_name] =
    array(
        'DetailView' =>
        array(
            'templateMeta' =>
            array(
                'form' =>
                array(
                    'enctype' => 'multipart/form-data',
                ),
                0 =>
                array(
                    'buttons' =>
                    array(
                        0 => 'EDIT',
                        1 => 'DUPLICATE',
                        2 => 'DELETE',
                    ),
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
                        1 => 'code',
                    ),
                    1 =>
                    array(
                        0 => array(
                            'name' => 'c_areas_destinations_name',
                            'label' => 'LBL_C_AREAS_DESTINATIONS_FROM_C_AREAS_TITLE'
                        ),
                        1 =>
                        array(
                            'name' => 'countries_dtinations_name',
                            'label' => 'LBL_COUNTRIES_DESTINATIONS_FROM_COUNTRIES_TITLE',
                        ),
                    ),
                    2 =>
                    array(
                        0 => array(
                            'name' => 'area',
                            'customLabel' => '{$MOD.LBL_AREA}&nbsp;<em>(Uses for Worksheets)</em>'
                        ),
                        1 => '',
                    ),
                    3 =>
                    array(
                        0 => 'description',
                        1 => 'assigned_user_name',
                    ),
                    4 =>
                    array(
                        array(
                            'name' => 'date_entered',
                            //'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
                            'label' => 'LBL_DATE_ENTERED',
                        ),
                        array(
                            'name' => 'date_modified',
                            // 'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
                            'label' => 'LBL_DATE_MODIFIED',
                        ),
                    ),
                ),
            ),
        ),
    );
?>
