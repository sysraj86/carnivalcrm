<?php
// created: 2011-08-19 10:08:46
$dictionary["GroupProgram"]["fields"]["accounts_groupprograms"] = array (
  'name' => 'accounts_groupprograms',
  'type' => 'link',
  'relationship' => 'accounts_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GROUPPROGRAMS_FROM_ACCOUNTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["accounts_grpprograms_name"] = array (
  'name' => 'accounts_grpprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GROUPPROGRAMS_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_g640eccounts_ida',
  'link' => 'accounts_groupprograms',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["accounts_g640eccounts_ida"] = array (
  'name' => 'accounts_g640eccounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);
