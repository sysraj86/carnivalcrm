<?php
// created: 2011-08-19 10:59:38
$dictionary["groupprograms_documents"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'groupprograms_documents' => 
    array (
      'lhs_module' => 'GroupPrograms',
      'lhs_table' => 'groupprograms',
      'lhs_key' => 'id',
      'rhs_module' => 'Documents',
      'rhs_table' => 'documents',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'groupprograms_documents_c',
      'join_key_lhs' => 'groupprogra1d4rograms_ida',
      'join_key_rhs' => 'groupprogrb020cuments_idb',
    ),
  ),
  'table' => 'groupprograms_documents_c',
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
      'name' => 'groupprogra1d4rograms_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'groupprogrb020cuments_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
    5 => 
    array (
      'name' => 'document_revision_id',
      'type' => 'varchar',
      'len' => '36',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'groupprograms_documentsspk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'groupprograms_documents_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'groupprogra1d4rograms_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'groupprograms_documents_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'groupprogrb020cuments_idb',
      ),
    ),
  ),
);
?>
