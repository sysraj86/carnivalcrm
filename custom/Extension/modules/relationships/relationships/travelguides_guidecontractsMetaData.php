<?php
// created: 2011-08-31 09:23:22
$dictionary["travelguides_guidecontracts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'travelguides_guidecontracts' => 
    array (
      'lhs_module' => 'TravelGuides',
      'lhs_table' => 'travelguides',
      'lhs_key' => 'id',
      'rhs_module' => 'GuideContracts',
      'rhs_table' => 'guidecontracts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'travelguideidecontracts_c',
      'join_key_lhs' => 'travelguidead0lguides_ida',
      'join_key_rhs' => 'travelguidde3cntracts_idb',
    ),
  ),
  'table' => 'travelguideidecontracts_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'travelguidead0lguides_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'travelguidde3cntracts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'travelguideguidecontractsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'travelguideguidecontracts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'travelguidead0lguides_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'travelguideguidecontracts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'travelguidde3cntracts_idb',
      ),
    ),
  ),
);
?>
