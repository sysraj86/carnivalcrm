<?php
// created: 2011-08-05 11:51:56
$dictionary["GroupProgram"]["fields"]["tours_groupprograms"] = array (
  'name' => 'tours_groupprograms',
  'type' => 'link',
  'relationship' => 'tours_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_GROUPPROGRAMS_FROM_TOURS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["tours_groupprograms_name"] = array (
  'name' => 'tours_groupprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_GROUPPROGRAMS_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_groufc45mstours_ida',
  'link' => 'tours_groupprograms',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["tours_groufc45mstours_ida"] = array (
  'name' => 'tours_groufc45mstours_ida',
  'type' => 'link',
  'relationship' => 'tours_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);
