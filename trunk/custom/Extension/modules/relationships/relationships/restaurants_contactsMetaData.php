<?php
// created: 2011-08-19 11:04:24
$dictionary["restaurants_contacts"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'restaurants_contacts' => 
    array (
      'lhs_module' => 'Restaurants',
      'lhs_table' => 'restaurants',
      'lhs_key' => 'id',
      'rhs_module' => 'Contacts',
      'rhs_table' => 'contacts',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'restaurants_contacts_c',
      'join_key_lhs' => 'restaurantd2e4aurants_ida',
      'join_key_rhs' => 'restauranta17fontacts_idb',
    ),
  ),
  'table' => 'restaurants_contacts_c',
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
      'name' => 'restaurantd2e4aurants_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'restauranta17fontacts_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'restaurants_contactsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'restaurants_contacts_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'restaurantd2e4aurants_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'restaurants_contacts_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'restauranta17fontacts_idb',
      ),
    ),
  ),
);
?>
