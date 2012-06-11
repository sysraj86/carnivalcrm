<?php
// created: 2011-11-28 08:47:50
$dictionary["Quotes"]["fields"]["orders_quotes"] = array (
  'name' => 'orders_quotes',
  'type' => 'link',
  'relationship' => 'orders_quotes',
  'source' => 'non-db',
  'vname' => 'LBL_ORDERS_QUOTES_FROM_ORDERS_TITLE',
);
$dictionary["Quotes"]["fields"]["orders_quotes_name"] = array (
  'name' => 'orders_quotes_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ORDERS_QUOTES_FROM_ORDERS_TITLE',
  'save' => true,
  'id_name' => 'orders_quo2e0asorders_ida',
  'link' => 'orders_quotes',
  'table' => 'orders',
  'module' => 'Orders',
  'rname' => 'name',
);
$dictionary["Quotes"]["fields"]["orders_quo2e0asorders_ida"] = array (
  'name' => 'orders_quo2e0asorders_ida',
  'type' => 'link',
  'relationship' => 'orders_quotes',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ORDERS_QUOTES_FROM_QUOTES_TITLE',
);
