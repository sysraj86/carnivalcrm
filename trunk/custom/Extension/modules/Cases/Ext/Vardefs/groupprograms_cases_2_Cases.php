<?php
// created: 2011-08-17 18:15:27
$dictionary["Case"]["fields"]["groupprograms_cases_2"] = array (
  'name' => 'groupprograms_cases_2',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_2',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_2_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Case"]["fields"]["groupprogras_cases_2_name"] = array (
  'name' => 'groupprogras_cases_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_2_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr06d7rograms_ida',
  'link' => 'groupprograms_cases_2',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Case"]["fields"]["groupprogr06d7rograms_ida"] = array (
  'name' => 'groupprogr06d7rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_cases_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_CASES_2_FROM_CASES_TITLE',
);
