<?php
// created: 2011-10-18 18:00:33
$dictionary["GroupProgram"]["fields"]["restaurants_groupprograms"] = array (
  'name' => 'restaurants_groupprograms',
  'type' => 'link',
  'relationship' => 'restaurants_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_RESTAURANTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["restaurantspprograms_name"] = array (
  'name' => 'restaurantspprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurant7162aurants_ida',
  'link' => 'restaurants_groupprograms',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["restaurant7162aurants_ida"] = array (
  'name' => 'restaurant7162aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);
