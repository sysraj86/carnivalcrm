<?php
// created: 2011-08-19 10:58:01
$dictionary["Case"]["fields"]["groupprograms_cases"] = array (
  'name' => 'groupprograms_cases',
  'type' => 'link',
  'relationship' => 'groupprograms_cases',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Case"]["fields"]["groupprograms_cases_name"] = array (
  'name' => 'groupprograms_cases_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr446brograms_ida',
  'link' => 'groupprograms_cases',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Case"]["fields"]["groupprogr446brograms_ida"] = array (
  'name' => 'groupprogr446brograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_cases',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_FROM_CASES_TITLE',
);
