<?php
// created: 2011-08-19 11:00:50
$dictionary["Billing"]["fields"]["groupprograms_billing"] = array (
  'name' => 'groupprograms_billing',
  'type' => 'link',
  'relationship' => 'groupprograms_billing',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_BILLING_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["Billing"]["fields"]["groupprogras_billing_name"] = array (
  'name' => 'groupprogras_billing_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_BILLING_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr28ddrograms_ida',
  'link' => 'groupprograms_billing',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["Billing"]["fields"]["groupprogr28ddrograms_ida"] = array (
  'name' => 'groupprogr28ddrograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_billing',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_BILLING_FROM_BILLING_TITLE',
);
