<?php
// created: 2012-01-10 09:17:34
$dictionary["tours_costguides"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'tours_costguides' => 
    array (
      'lhs_module' => 'Tours',
      'lhs_table' => 'tours',
      'lhs_key' => 'id',
      'rhs_module' => 'CostGuides',
      'rhs_table' => 'costguides',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'tours_costguides_c',
      'join_key_lhs' => 'tours_costd7b8estours_ida',
      'join_key_rhs' => 'tours_cost5ff4tguides_idb',
    ),
  ),
  'table' => 'tours_costguides_c',
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
      'name' => 'tours_costd7b8estours_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'tours_cost5ff4tguides_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'tours_costguidesspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'tours_costguides_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'tours_costd7b8estours_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'tours_costguides_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'tours_cost5ff4tguides_idb',
      ),
    ),
  ),
);
?>
