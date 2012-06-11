<?php
// created: 2012-03-02 11:57:23
$dictionary["c_areas_destinations"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'c_areas_destinations' => 
    array (
      'lhs_module' => 'C_Areas',
      'lhs_table' => 'c_areas',
      'lhs_key' => 'id',
      'rhs_module' => 'Destinations',
      'rhs_table' => 'destinations',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'c_areas_destinations_c',
      'join_key_lhs' => 'c_areas_de9d4fc_areas_ida',
      'join_key_rhs' => 'c_areas_de577anations_idb',
    ),
  ),
  'table' => 'c_areas_destinations_c',
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
      'name' => 'c_areas_de9d4fc_areas_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'c_areas_de577anations_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'c_areas_destinationsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'c_areas_destinations_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'c_areas_de9d4fc_areas_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'c_areas_destinations_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'c_areas_de577anations_idb',
      ),
    ),
  ),
);
?>
