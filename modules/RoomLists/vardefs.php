<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['RoomLists'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'roomlists',
    'unified_search' => true,
    
    'fields'  => array(
    
        'tenks' => array(
          'name'    => 'tenks',
          'vname'   => 'LBL_HOTEL_NAME',
          'type'    => 'varchar',
          'len'     => 255,
          'required' => true,
        ),
        
        'ks_id' => array(
            'name'  => 'ks_id',
            'vname' => 'LBL_KS_ID',
            'type'  => 'id',
            'required'  => true,
        ),
        
        'made_tour' => array(
          'name'    => 'made_tour',
          'vname'   => 'LBL_MADETOUR',
          'type'    => 'varchar',
          'len'     => 255,
          'required' => true,
        ),
        
        'made_tour_id'  => array(
          'name'    => 'made_tour_id',
          'vname'   => 'LBL_MADE_TOUR_ID',
          'type'    => 'id',
        ),
        
        'content'   => array(
          'name'    => 'content',
          'vname'   => 'LBL_CONTENT',
          'type'    => 'text',
        ),
        
        'department'  => array(
            'name'      => 'department',
            'vname'     => 'LBL_DEPARTMENT',
            'type'      => 'enum',
            'required'  => true,
            'options'   => 'roomlist_department_dom',
        ),
        
        'party_name'    => array(
          'name'    => 'party_name',
          'vname'   => 'LBL_PARTY_NAME',
          'type'    => 'varchar',
          'len'     => 255,
        ),
        
        'tour_guide' => array(
          'name'    => 'tour_guide',
          'vname'   => 'LBL_TOUR_GUIDE',
          'type'    => 'varchar',
          'len'     => 250,
        ),
        
        'custom'    => array(
          'name'    => 'custom',
          'vname'   => '',
          'type'    => 'varchar',
          'source'  => 'non-db',
        ),
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('RoomLists','RoomLists', array('default', 'assignable', ));
?>
