<?php
// created: 2011-08-19 10:59:39
$dictionary["Document"]["fields"]["groupprograms_documents"] = array (
  'name' => 'groupprograms_documents',
  'type' => 'link',
  'relationship' => 'groupprograms_documents',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_DOCUMENTS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Document"]["fields"]["groupprogradocuments_name"] = array (
  'name' => 'groupprogradocuments_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_DOCUMENTS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogra1d4rograms_ida',
  'link' => 'groupprograms_documents',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Document"]["fields"]["groupprogra1d4rograms_ida"] = array (
  'name' => 'groupprogra1d4rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_documents',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_DOCUMENTS_FROM_DOCUMENTS_TITLE',
);
