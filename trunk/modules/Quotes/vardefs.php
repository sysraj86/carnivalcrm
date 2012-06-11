<?php
   if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
   
   $dictionary['Quotes'] = array ('audited'=>true,
    'comment' => '',
    'table' => 'quotes',
    'unified_search' => true,
    
    'fields'  => array(
    'sender'  => array(
      'name'    => 'sender',
      'vname'   => 'LBL_SENDER',
      'type'    => 'varchar',
    ),
    
    'senddate'  => array(
      'name'    => 'senddate',
      'vname'   => 'LBL_SENDDATE',
      'type'    => 'date',
      'display_default' => 'now',
    ),
    
    'service_cost'  => array(
      'name'    => 'service_cost',
      'vname'   => 'LBL_SERVICE_COST',
      'type'    => 'currency',
      'dbType'  => 'double',
    ),
    'surcharge'  => array(
      'name'    => 'surcharge',
      'vname'   => 'LBL_SURCHARGE',
      'type'    => 'text',
    ),

    
    'airline_journey' => array(
      'name'    => 'airline_journey',
      'vname'   => 'LBL_AIRLINE_JOURNEY',
      'type'    => 'varchar',
      'len'     => 250,
    ),
    
    'airline_ticket_cost'    => array(
      'name'    => 'airline_ticket_cost',
      'vname'   => 'LBL_ARILINE_TICKET_COST',
      'type'    => 'currency',
      'dbType'  => 'double',
    ),
    
    'total_cost'    => array(
      'name'    => 'total_cost',
      'vname'   => 'LBL_TOTAL_COST',
      'type'    => 'currency',
      'dbType'  => 'double',
    ),
    
    'total_cus' => array(
      'name'    => 'total_cus',
      'vname'   => 'LBL_TOTAL_CUS',
      'type'    => 'int',
      'len'     => 10,
    ),
    
    'transport' =>  array(
      'name'    => 'transport',
      'vname'   => 'LBL_TRANSPORT',
      'type'    => 'text',
    ),
    
    'hotel' =>  array(
      'name'   => 'hotel',
      'vname'  => 'LBL_HOTEL' ,
      'type'   => 'text' ,
    ),
    
    'room'  => array(
      'name'    => 'room',
      'vname'   => 'LBL_ROOM',
      'type'    => 'text',
    ),
    
    'food'  => array(
      'name'    => 'food',
      'vname'   => 'LBL_FOOD',
      'type'    => 'text',
    ),
    
    'guide'     => array(
      'name'    => 'guide',
      'vname'   => 'LBL_GUIDE',
      'type'    => 'text',
    ),
    'insurance' => array(
      'name'    => 'insurance',
      'vname'   => 'LBL_INSURANCE',
      'type'    => 'text',
    ),
    'other'     => array(
      'name'    => 'other',
      'vname'   => 'LBL_OTHER',
      'type'    => 'text',
    ),
    
    'not_content'   => array(
      'name'    => 'not_content',
      'vname'   => 'LBL_NOT_CONTENT',
      'type'    => 'text',
    ),
    'child_cost'   => array(
      'name'    => 'child_cost',
      'vname'   => 'LBL_CHILD_COST_INFORMATIONS',
      'type'    => 'text',
    ),
    'code' => 
  array (
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
  
  // chi tiet gia
  
  'cost_detail' => array(
    'name'  => 'cost_detail',
    'vname' => 'LBL_COST_DETAIL',
    'type'  => 'text',
  ),
  
   'department'  => array(
        'name'      => 'department',
        'vname'     => 'LBL_DEPARTMENT',
        'type'      => 'enum',
        'required'  => true,
        'options'   => 'roomlist_department_dom',
   ),
   
   
   'parent_type'=>
      array(
            'name'=>'parent_type',
            'vname'=>'LBL_QUOTES_PARENT_TYPE',
            'type' => 'parent_type',
            'dbType'=>'varchar',
            'required'=>false,
            'group'=>'parent_name',
            'options'=> 'quotes_parent_type_display',
            'len'=>255,
            'comment' => 'The Sugar object to which the call is related'
          ),

      'parent_name'=>
      array(
            'name'=> 'parent_name',
            'parent_type'=>'quotes_parent_type_display' ,
            'type_name'=>'parent_type',
            'id_name'=>'parent_id',
            'vname'=>'LBL_LIST_RELATED_TO',
            'type'=>'parent',
            'source' => 'non-db', 
            'group'=>'parent_name',
            'dbType'=>'varchar',
            'len' => 255,
            'options'=> 'quotes_parent_type_display',
      ),
      'parent_id'=>
      array(
          'name'=>'parent_id',
          'vname'=>'LBL_LIST_RELATED_TO_ID',
          'type'=>'id',
          'group'=>'parent_name',
          'reportable'=>false,
          'comment' => 'The ID of the parent Sugar object identified by parent_type'
      ),
      
      'ib_include'  => array(
        'name'      => 'ib_include',
        'vname'     => 'LBL_IB_INCLUDE',
        'type'      => 'text',
      ),
      
      'ob_notes'    => array(
        'name'      => 'ob_notes',
        'vname'     => 'LBL_OB_NOTES',
        'type'      => 'text',
      ),
   
   'flight_schedules'   => array(
     'name'     => 'flight_schedules',
     'vname'    => 'LBL_FLIGHT_SCHEDULER',
     'type'     => 'text',
   ),
   
  
    ),
    
    'relationship' => array(
    
    ),
    
    'optimistic_lock'=>true,
    
    
    
);
VardefManager::createVardef('Quotes','Quotes', array('default', 'assignable', ));
?>
            