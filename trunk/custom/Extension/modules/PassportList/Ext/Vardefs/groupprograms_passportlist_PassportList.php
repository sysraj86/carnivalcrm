<?php
// created: 2011-08-22 17:06:06
$dictionary["PassportList"]["fields"]["groupprogras_passportlist"] = array (
  'name' => 'groupprogras_passportlist',
  'type' => 'link',
  'relationship' => 'groupprograms_passportlist',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["PassportList"]["fields"]["groupprograsportlist_name"] = array (
  'name' => 'groupprograsportlist_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr20c9rograms_ida',
  'link' => 'groupprogras_passportlist',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["PassportList"]["fields"]["groupprogr20c9rograms_ida"] = array (
  'name' => 'groupprogr20c9rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_passportlist',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_PASSPORTLIST_FROM_GROUPPROGRAMS_TITLE',
);
