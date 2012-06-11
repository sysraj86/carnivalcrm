<?php
// created: 2011-08-19 10:30:15
$dictionary["Billing"]["fields"]["fits_billing"] = array (
  'name' => 'fits_billing',
  'type' => 'link',
  'relationship' => 'fits_billing',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_BILLING_FROM_FITS_TITLE',
);
$dictionary["Billing"]["fields"]["fits_billing_name"] = array (
  'name' => 'fits_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_BILLING_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_billie73aingfits_ida',
  'link' => 'fits_billing',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Billing"]["fields"]["fits_billie73aingfits_ida"] = array (
  'name' => 'fits_billie73aingfits_ida',
  'type' => 'link',
  'relationship' => 'fits_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_BILLING_FROM_BILLING_TITLE',
);
