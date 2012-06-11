<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['TicketOrder'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'TicketOrders',
    'unified_search' => true,
    
    'fields'  => array(  
    
        'passenger'    => array(
            'name'      => 'passenger',
            'vname'     => 'LBL_PASSENGER',
            'type'      => 'varchar',
        ),
        'itinerary'    => array(
            'name'      => 'itinerary',
            'vname'     => 'LBL_ITINERARY',
            'type'      => 'varchar',
        ),
        'bookingclass'    => array(
            'name'      => 'bookingclass',
            'vname'     => 'LBL_BOOKING_CLASS',
            'type'      => 'varchar',
        ),
        'code'  => array(
          'name'    => 'code',
          'vname'   => 'LBL_CODE',
          'type'    => 'varchar',
          'len'     => 150,
        ),
        'autocode'    => array(
            'name' => 'autocode',
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
    
    ),
    
    'indices' => array (

),
    
    'relationship' => array(
        
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('TicketOrder','TicketOrder', array('default', 'assignable', ));
?>
