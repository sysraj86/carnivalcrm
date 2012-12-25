<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['GroupProgram'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'groupprograms',
    'unified_search' => true,
    
    'fields'  => array( 
        
        'status'    => array(
            'name'  => 'status',
            'vname' => 'LBL_STATUS',
            'type'  => 'enum',
            'options'   => 'groupprogram_status_dom',
            
        ),
        
        'notes' => array(
          'name'   => 'notes',
          'vname'  => 'LBL_NOTES',
          'type'   => 'varchar',
          'len'    => 250,
        ),
        
        'groupprogram_code' => array(
          'name'    => 'groupprogram_code',
          'vname'   => 'LBL_CODE',
          'type'    => 'varchar',
          'required' => true,
        ),
    
        'tour_name' => array(
            'name'  => 'tour_name' ,
            'vname' => 'LBL_TOUR_NAME',
            'type'  => 'varchar',
            'len'   => 250,
            'required' => true, 
            
        ),
        'tour_code' => array(
            'name'  => 'tour_code' ,
            'vname' => 'LBL_TOURCODE',
            'type'  => 'varchar',
            'len'   => 250,
            'required' => true, 
            
        ),
                
        'tour_id'   => array(
          'name'    => 'tour_id',
          'vname'   => 'LBL_TOUR_ID',
          'type'    => 'id',
          'reportable'  => false,
        ),
        
        'start_date_group'    => array(
          'name'        => 'start_date_group',
          'vname'       => 'LBL_START_DATE',
          'type'        => 'date',
        ),
        
        'end_date_group' => array(
          'name'        => 'end_date_group',                                                    
          'vname'       => 'LBL_END_DATE',
          'type'        => 'date',
        ),
        
      
                
        'guide_pick_up_at_airport' => array(
            'name'          => 'guide_pick_up_at_airport',
            'vname'         => 'LBL_PICK_UP',
            'type'          => 'varchar',
            'len'           => 250,
        ),
        'guide_pick_up_at_airport_id'   => array(
          'name'        => 'guide_pick_up_at_airport_id',
          'vname'       => 'LBL_PICK_UP_ID',
          'type'        => 'id',
          'reportable'  => false,
        ),
        
        'pick_up_phone' =>array(
          'name'    => 'pick_up_phone',
          'vname'   => 'LBL_AIRPORT_PHONE',
          'type'    => 'varchar',
          'len'     => 50,
        ),
        
        
        
        'operator' => array(
          'name'        => 'operator',
          'vname'       => 'LBL_OPERATOR',
          'type'        => 'varchar',
          'len'         => 250,
        ),
        'operator_id' => array(
          'name'        => 'operator_id',
          'vname'       => 'LBL_OPERATOR_ID',
          'type'        => 'id',
        ), 
        
        'operator_phone'   => array(
          'name'        => 'operator_phone',
          'vname'       => 'LBL_OPERATOR_PHONE',
          'type'        => 'varchar',
          'len'         => 50
        ),
        'numofdate' => array(
            'name'  => 'numofdate',
            'vname' => 'LBL_NUM_OF_DATE',
            'type'  => 'int',
            'len'    => 5,
        ),
        
        'numofnight'  => array(
          'name'    => 'numofnight',
          'vname'   => 'LBL_NUM_OF_NIGHT',
          'type'    => 'int',
          'len'     => 5,
        ),
        'duration'  => array(
          'name'    => 'duration',
          'vname'   => 'LBL_DURATION',
          'type'    => 'varchar',
          'len'     => 100,
        ),
        
        'adults' => array(
            'name'  => 'adults',
            'LBL'   => 'LBL_ADULTS',
            'type'  => 'int',
            'len'   => 11,
        ),
        
        'child_2'  =>  array(
          'name'    => 'child_2',
          'vname'   => 'LBL_CHILD_2',
          'type'    => 'int',
          'len'     => 11,
        ),
        
        'childfrom2to12' => array(
          'name'    => 'childfrom2to12',
          'vname'   => 'LBL_FROM2TO12',
          'type'    => 'int',
          'len'     => 11,
        ),
        
        'countofcus' => array(
            'name'  => 'countofcus',
            'vname' => 'LBL_COUNT_CUS',
            'type'  => 'int',
            'len'   => 11,
        
        ),
    
        
    ),
    
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('GroupPrograms','GroupProgram', array('default', 'assignable', ));
?>
    
