<?php
// created: 2011-09-07 20:29:53
$dictionary["restaurants_foodmenu"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'restaurants_foodmenu' => 
    array (
      'lhs_module' => 'Restaurants',
      'lhs_table' => 'restaurants',
      'lhs_key' => 'id',
      'rhs_module' => 'FoodMenu',
      'rhs_table' => 'foodmenu',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'restaurants_foodmenu_c',
      'join_key_lhs' => 'restaurant3385aurants_ida',
      'join_key_rhs' => 'restauranta31eoodmenu_idb',
    ),
  ),
  'table' => 'restaurants_foodmenu_c',
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
      'name' => 'restaurant3385aurants_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'restauranta31eoodmenu_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'restaurants_foodmenuspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'restaurants_foodmenu_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'restaurant3385aurants_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'restaurants_foodmenu_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'restauranta31eoodmenu_idb',
      ),
    ),
  ),
);
?>
