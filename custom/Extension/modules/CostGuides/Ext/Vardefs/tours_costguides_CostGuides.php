<?php
// created: 2012-01-10 09:17:34
$dictionary["CostGuides"]["fields"]["tours_costguides"] = array (
  'name' => 'tours_costguides',
  'type' => 'link',
  'relationship' => 'tours_costguides',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_COSTGUIDES_FROM_TOURS_TITLE',
);
$dictionary["CostGuides"]["fields"]["tours_costguides_name"] = array (
  'name' => 'tours_costguides_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TOURS_COSTGUIDES_FROM_TOURS_TITLE',
  'save' => true,
  'id_name' => 'tours_costd7b8estours_ida',
  'link' => 'tours_costguides',
  'table' => 'tours',
  'module' => 'Tours',
  'rname' => 'name',
);
$dictionary["CostGuides"]["fields"]["tours_costd7b8estours_ida"] = array (
  'name' => 'tours_costd7b8estours_ida',
  'type' => 'link',
  'relationship' => 'tours_costguides',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TOURS_COSTGUIDES_FROM_COSTGUIDES_TITLE',
);
