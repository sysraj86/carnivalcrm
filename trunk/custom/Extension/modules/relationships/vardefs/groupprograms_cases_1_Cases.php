<?php
// created: 2011-08-17 18:13:33
$dictionary["Case"]["fields"]["groupprograms_cases_1"] = array (
  'name' => 'groupprograms_cases_1',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_1',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_1_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Case"]["fields"]["groupprogras_cases_1_name"] = array (
  'name' => 'groupprogras_cases_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_1_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr9b03rograms_ida',
  'link' => 'groupprograms_cases_1',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Case"]["fields"]["groupprogr9b03rograms_ida"] = array (
  'name' => 'groupprogr9b03rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_1_FROM_CASES_TITLE',
);
