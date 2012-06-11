<?php
// created: 2011-12-06 08:51:25
$dictionary["tours_services"] = array (
  'true_relationship_type' => 'many-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_services' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'Services',
      'rhs_table' => 'services',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_services_c',
      'join_key_lhs' => 'tours_serv1f4cestours_ida',
      'join_key_rhs' => 'tours_serv55f6ervices_idb',
    ),
  ),
  'table' => 'tours_services_c',
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
      'name' => 'tours_serv1f4cestours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_serv55f6ervices_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_servicesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_services_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_serv1f4cestours_ida',
        1 => 'tours_serv55f6ervices_idb',
      ),
    ),
  ),
);
?>
