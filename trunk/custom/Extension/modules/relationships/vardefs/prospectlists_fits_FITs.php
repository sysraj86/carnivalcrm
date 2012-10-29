<?php
// created: 2012-10-26 19:00:56
$dictionary["FITs"]["fields"]["prospectlists_fits"] = array (
  'name' => 'prospectlists_fits',
  'type' => 'link',
  'relationship' => 'prospectlists_fits',
  'source' => 'non-db',
  'vname' => 'LBL_PROSPECTLISTS_FITS_FROM_PROSPECTLISTS_TITLE',
);
$dictionary["FITs"]["fields"]["prospectlists_fits_name"] = array (
  'name' => 'prospectlists_fits_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PROSPECTLISTS_FITS_FROM_PROSPECTLISTS_TITLE',
  'save' => true,
  'id_name' => 'prospectli3a05ctlists_ida',
  'link' => 'prospectlists_fits',
  'table' => 'prospect_lists',
  'module' => 'ProspectLists',
  'rname' => 'name',
);
$dictionary["FITs"]["fields"]["prospectli3a05ctlists_ida"] = array (
  'name' => 'prospectli3a05ctlists_ida',
  'type' => 'link',
  'relationship' => 'prospectlists_fits',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_PROSPECTLISTS_FITS_FROM_FITS_TITLE',
);
