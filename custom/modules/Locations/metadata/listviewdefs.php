<?php
$module_name = 'Locations';
$listViewDefs [$module_name] =
    array(
        'CODE' =>
        array(
            'width' => '15%',
            'label' => 'LBL_CODE',
            'default' => true,
            'link' => true,
        ),
        'NAME' =>
        array(
            'width' => '15%',
            'label' => 'LBL_NAME',
            'default' => true,
            'link' => true,
        ),
        'PHONE' =>
        array(
            'type' => 'phone',
            'label' => 'LBL_PHONE',
            'width' => '10%',
            'default' => true,
        ),
        'ADDRESS' =>
        array(
            'type' => 'varchar',
            'label' => 'LBL_ADDRESS',
            'width' => '10%',
            'default' => true,
        ),
        'DESTINATIONLOCATIONS_NAME' =>
        array(
            'width' => '20%',
            'label' => 'LBL_DESTINATION',
            'link' => true,
            'default' => true,
        ),
        'ASSIGNED_USER_NAME' =>
        array(
            'width' => '9%',
            'label' => 'LBL_ASSIGNED_TO_NAME',
            'module' => 'Employees',
            'id' => 'ASSIGNED_USER_ID',
            'default' => true,
        ),
    );
?>
