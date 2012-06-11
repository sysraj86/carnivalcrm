<?php
// created: 2011-08-31 09:23:22
$dictionary["GuideContracts"]["fields"]["travelguideguidecontracts"] = array (
  'name' => 'travelguideguidecontracts',
  'type' => 'link',
  'relationship' => 'travelguides_guidecontracts',
  'source' => 'non-db',
  'vname' => 'LBL_TRAVELGUIDES_GUIDECONTRACTS_FROM_TRAVELGUIDES_TITLE',
);
$dictionary["GuideContracts"]["fields"]["travelguidecontracts_name"] = array (
  'name' => 'travelguidecontracts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TRAVELGUIDES_GUIDECONTRACTS_FROM_TRAVELGUIDES_TITLE',
  'save' => true,
  'id_name' => 'travelguidead0lguides_ida',
  'link' => 'travelguideguidecontracts',
  'table' => 'travelguides',
  'module' => 'TravelGuides',
  'rname' => 'name',
);
$dictionary["GuideContracts"]["fields"]["travelguidead0lguides_ida"] = array (
  'name' => 'travelguidead0lguides_ida',
  'type' => 'link',
  'relationship' => 'travelguides_guidecontracts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TRAVELGUIDES_GUIDECONTRACTS_FROM_GUIDECONTRACTS_TITLE',
);
