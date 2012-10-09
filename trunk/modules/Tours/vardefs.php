<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$dictionary['Tour'] = array('audited' => true,
    'comment' => '',
    'table' => 'tours',
    'unified_search' => true,

    'fields' => array(

        'status' => array(
            'name' => 'status',
            'vname' => 'LBL_STATUS',
            'type' => 'enum',
            'options' => 'tour_status_dom',
        ),

        'tour_code' => array(
            'name' => 'tour_code',
            'vname' => 'LBL_TOUR_CODE',
            'type' => 'varchar',
            'required' => true,
            'len' => 50,
        ),
        /*'from_place' => array(
            'name' => 'from_place',
            'vname' => 'LBL_FROM_PLACE',
            'type' => 'varchar',
            'len' => 255,
        ),

        'to_place' => array(
            'name' => 'to_place',
            'vname' => 'LBL_TO_PLACE',
            'type' => 'varchar',
            'len' => 255,
        ),*/

        'noiden' => array(
            'name' => 'noiden',
            'vname' => 'LBL_DESTINATION',
            'type' => 'enum',
            'options' => 'destination_dom_list',
            'len' => 2048,
        ),

        'tour_destination' => array(
            'name' => 'tour_destination',
            'vname' => 'LBL_DESTINATION',
            'type' => 'text',
        ),


        'start_date' => array(
            'name' => 'start_date',
            'vname' => 'LBL_START_DATE',
            'type' => 'date',
            'display_default' => 'now'
        ),

        'end_date' => array(
            'name' => 'end_date',
            'vname' => 'LBL_END_DATE',
            'type' => 'date',
            'display_default' => 'now'
        ),
        'division' => array(
            'name' => 'division',
            'vname' => 'LBL_DIVISION',
            'type' => 'enum',
            'options' => 'division_dom',
        ),
        'contract_value' => array(
            'name' => 'contract_value',
            'vname' => 'LBL_CONTRACT_VALUE',
            'type' => 'currency',
            'dbType' => 'decimal',
            'len'   => 26,
            'precision' => 2,
        ),

        'currency_id' =>
        array(
            'required' => false,
            'name' => 'currency_id',
            'vname' => 'LBL_CURRENCY',
            'type' => 'id',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => 0,
            'audited' => 0,
            'reportable' => 0,
            'len' => 36,
            'studio' => 'visible',
            'function' =>
            array(
                'name' => 'getCurrencyDropDown',
                'returns' => 'html',
            ),
        ),

        /*'note'   => array(
             'name'  => 'note',
             'vname' => '',
             'type'  => 'varchar',
             'len'   => 10,
        ),*/


        'currency' => array(
            'name' => 'currency',
            'vname' => 'LBL_CURRENCY',
            'type' => 'enum',
            'len' => 20,
            'options' => 'currency_dom',
        ),

        'transport' => array(
            'name' => 'transport',
            'vname' => 'LBL_TRANSPORT',
            'type' => 'multienum',
            'options' => 'transport_dom',
        ),

        'transport2' => array(
            'name' => 'transport2',
            'vname' => 'LBL_TRANSPORT_2',
            'type' => 'varchar',
            'len' => 255,
        ),

        'duration' => array(
            'name' => 'duration',
            'vname' => 'LBL_DURATION',
            'type' => 'varchar',
        ),

        'picture' => array(
            'name' => 'picture',
            'vname' => 'LBL_PICTURE',
            'type' => 'varchar',
            'len' => 255,
        ),

        'deparment' => array(
            'name' => 'deparment',
            'vname' => 'LBL_DEPARMENT',
            'type' => 'enum',
            'options' => 'deparment_dom',
        ),
        'area' => array(
            'name' => 'area',
            'vname' => 'LBL_TOUR_AREA',
            'type' => 'enum',
            'options' => 'area_dom'
        ),
        'tour_type' => array(
            'name' => 'tour_type',
            'vname' => 'LBL_TOUR_TYPE',
            'type' => 'enum',
            'options' => 'tour_type_dom',
        ),
        'type' => array(
            'name' => 'type',
            'vname' => 'LBL_TYPE',
            'type' => 'enum',
            'options' => 'tourprogram_type_dom',
        ),
        'is_template' => array(
            'name' => 'is_template',
            'type' => 'bool',
            'vname' => 'LBL_TOUR_IS_TEMPLATE',

        ),
        'template_name' => array(
            'name' => 'template_name',
            'type' => 'varchar',
            'vname' => 'LBL_TEMPLATE_NAME',
        ),
        'synced' => array(
            'name' => 'synced',
            'type' => 'bool',
            'vname' => 'LBL_TOUR_IS_SYNCED',
        ),
        'is_hot_tour' => array(
            'name' => 'is_hot_tour',
            'type' => 'bool',
            'vname' => 'LBL_TOUR_IS_HOT_TOUR',
        ),
        'is_favorite_tour' => array(
            'name' => 'is_favorite_tour',
            'type' => 'bool',
            'vname' => 'LBL_TOUR_IS_HOT_TOUR',
        ),
        'show_in_home' => array(
            'name' => 'show_in_home',
            'type' => 'bool',
            'vname' => 'LBL_TOUR_IS_HOT_TOUR',
        ),
        'frame_type' => array(
            'name' => 'frame_type',
            'type' => 'varchar',
            'vname' => 'LBL_FRAME_TYPE',
        ),
        'is_active' => array(
            'name' => 'is_active',
            'type' => 'bool',
            'vname' => 'LBL_TOUR_IS_HOT_TOUR',
        ),
        'order_num' => array(
            'name' => 'order_num',
            'type' => 'int',
        ),
        
        'country_id' => array(
          'name'    => 'country_id' ,
          'vname'   => 'LBL_COUNTRY_ID',
          'type'    => 'id',
        ),
        
        'num_of_day'    => array(
          'name'    => 'num_of_day',
          'vname'   => 'LBL_NUMOF_DAY',
          'type'    => 'varchar',
          'len'     => 10,
        ),
        
    ),

    'relationship' => array(
        'tours_operator_user' =>
        array('lhs_module' => 'Users', 'lhs_table' => 'users', 'lhs_key' => 'id',
            'rhs_module' => 'Tours', 'rhs_table' => 'tours', 'rhs_key' => 'operator_user_id',
            'relationship_type' => 'one-to-many'),
    ),

    'optimistic_lock' => true,


);
VardefManager::createVardef('Tours', 'Tour', array('default', 'assignable',));
?>
