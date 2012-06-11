<?php
// created: 2011-10-18 14:28:40
$dictionary["Comments"]["fields"]["groupprograms_comments"] = array (
  'name' => 'groupprograms_comments',
  'type' => 'link',
  'relationship' => 'groupprograms_comments',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Comments"]["fields"]["groupprogra_comments_name"] = array (
  'name' => 'groupprogra_comments_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogrcc65rograms_ida',
  'link' => 'groupprograms_comments',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Comments"]["fields"]["groupprogrcc65rograms_ida"] = array (
  'name' => 'groupprogrcc65rograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_comments',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_COMMENTS_FROM_COMMENTS_TITLE',
);
