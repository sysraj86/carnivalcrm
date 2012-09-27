<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['AirlinesTickets'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'airlinestickets',
    'unified_search' => true,  
    
    'fields'  => array(  
         'code' => array(
            'required' => false,
            'name' => 'code',
            'vname' => 'LBL_CODE',
            'type' => 'varchar',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'len' => '255',
            'size' => '20',
         ),
       
         'autocode' =>
         array(
            'required' => true,
            'name' => 'autocode',
            'type' => 'int',
            'vname' => '',
            'type' => 'int',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => 0,
            'audited' => 0,
            'reportable' => 0,
            'len' => '25',
         ),
    'type' => 
          array (
            'required' => false,
            'name' => 'type',
            'vname' => 'LBL_TYPE',
            'type' => 'enum',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'len' => 100,
            'size' => '20',
            'options' => 'airline_type_dom',
            'studio' => 'visible',
          ),
         'from_itinerary' => 
          array (
            'required' => false,
            'name' => 'from_itinerary',
            'vname' => 'LBL_FROM_ITINERARY',
            'type' => 'varchar',
            'massupdate' => 0,
            'comments' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'len' => '255',
            'size' => '20',
          ),
         'itinerary' => 
          array (
            'required' => false,
            'name' => 'itinerary',
            'vname' => 'LBL_ITINERARY',
            'type' => 'varchar',
            'massupdate' => 0,
            'comments' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'len' => '255',
            'size' => '20',
          ),
          'time' =>
          array(
            'name' => 'time',
            'required' => false,
            'vname' => 'LBL_NGAYGIOBAY',
            'type' => 'datetimecombo',
            'massupdate' => 0,
            'comments' => '',
            'help' => '',
            'importable' => 'true',
            'duplicate_merge' => 'disabled',
            'duplicate_merge_dom_value' => '0',
            'audited' => false,
            'reportable' => true,
            'size' => '20',
            'enable_range_search' => false,
            'dbType' => 'datetime',
          ),
          
       /*   'status' => 
              array (
                'required' => true,
                'name' => 'status',
                'vname' => 'LBL_STATUS',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => 'Pendding',
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => true,
                'reportable' => true,
                'len' => 100,
                'size' => '20',
                'options' => 'Approval_Status',
                'studio' => 'visible',
                'dependency' => false,
              ),
               */
          'notes' => 
              array (
                'name' => 'notes',
                'vname' => 'LBL_NOTES',
                'type' => 'text',
                'comment' => 'Full text of the note',
                'rows' => '6',
                'cols' => '80',
                'required' => true,
                'massupdate' => 0,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'size' => '20',
                'studio' => 'visible',
              ),
              
              'booking_class'   => array(
                'name'  => 'booking_class',
                'vname' => 'LBL_BOOKING_CLASS',
                'type'  => 'varchar',
                'len'   => 150,
              ),
              
              'booking_code'    => array(
                'name'      => 'booking_code',
                'vname'     => 'LBL_BOOKING_CODE',
                'type'      => 'varchar',
                'len'       => 150,
              ),
              'tax_fee_change'  => array(
                'name'  => 'tax_fee_change',
                'vname' => 'LBL_TAX_FEE_CHANGE',
                'type'  => 'currency',
                'dbType' => 'double',
              ),
              
              'commisson'   => array(
                'name'  => 'commisson',
                'type'  => 'varchar',
                'vname' => 'LBL_COMMISSON',
                'len'   => 255,
              ),
              
              'nett'    => array(
                'name'  => 'nett',
                'vname' => 'LBL_NETT',
                'type'  => 'varchar',
                'len'   => 250,
              ),
              'roe' => array(
                'name'  => 'roe',
                'vname' => 'LBL_ROE',
                'type'  => 'currency',
                'dbType'   => 'double',
              ),
              
              'equivalent_in_vn'  =>  array(
                'name'  => 'equivalent_in_vn',
                'vname' => 'LBL_EQUIVAL_IN_VN',
                'type'  => 'currency',
                'dbType' => 'double',
              ),
              
              'messenger'   => array(
                'name'  => 'messenger',
                'vname' => 'LBL_MESSENGER',
                'type'  => 'text',
              ),
              
              'airlines_representative' => array(
                'name'  => 'airlines_representative',
                'vname' => 'LBL_AIRLINE_REPRESENTATIVE',
                'type'  => 'varchar',
                'len'   => 250,
              ),
              
              'ticket_agency'   => array(
                'name'  => 'ticket_agency',
                'vname' => 'LBL_TICKET_AGENCY',
                'type'  => 'varchar',
                'len'   => 250,
              ),
              
              'fare'    => array(
                'name'  => 'fare',
                'vname' => 'LBL_FARE',
                'type'  => 'currency',
                'dbType'=> 'double',
              ),
              
              'airline_status'   => array(
                'name'  => 'airline_status',
                'vname' => 'LBL_STATUS',
                'type'  => 'enum',
                'options' => 'airline_ticket_status',
              ),
              
              // area 
              
            'area'  => array(
                'name'    => 'area',
                'vname'   => 'LBL_AREA',
                'type'    => 'enum',
                'options' => 'khachsan_area',
                'len'     => 150,
            ),
    
    ),
    
    'indices' => array (
    
),
    
    'relationship' => array(
        
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('AirlinesTickets','AirlinesTickets', array('default', 'assignable', ));
?>
