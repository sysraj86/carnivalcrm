<?php
// created: 2011-11-15 12:48:00
$dictionary["Order"]["fields"]["fits_orders"] = array (
  'name' => 'fits_orders',
  'type' => 'link',
  'relationship' => 'fits_orders',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_ORDERS_FROM_FITS_TITLE',
);
$dictionary["Order"]["fields"]["fits_orders_name"] = array (
  'name' => 'fits_orders_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_FITS_ORDERS_FROM_FITS_TITLE',
  'save' => true,
  'id_name' => 'fits_order6297ersfits_ida',
  'link' => 'fits_orders',
  'table' => 'fits',
  'module' => 'FITs',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Order"]["fields"]["fits_order6297ersfits_ida"] = array (
  'name' => 'fits_order6297ersfits_ida',
  'type' => 'link',
  'relationship' => 'fits_orders',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_FITS_ORDERS_FROM_ORDERS_TITLE',
);
