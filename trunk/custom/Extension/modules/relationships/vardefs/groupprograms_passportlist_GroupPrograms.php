<?php
// created: 2011-08-22 17:06:06
$dictionary["GroupProgram"]["fields"]["groupprogras_passportlist"] = array (
  'name' => 'groupprogras_passportlist',
  'type' => 'link',
  'relationship' => 'groupprograms_passportlist',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_PASSPORTLIST_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprograsportlist_name"] = array (
  'name' => 'groupprograsportlist_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_PASSPORTLIST_TITLE',
  'save' => true,
  'id_name' => 'groupprogrc66dortlist_idb',
  'link' => 'groupprogras_passportlist',
  'table' => 'PassportList',
  'module' => 'PassportList',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogrc66dortlist_idb"] = array (
  'name' => 'groupprogrc66dortlist_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_passportlist',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_PASSPORTLIST_TITLE',
);
