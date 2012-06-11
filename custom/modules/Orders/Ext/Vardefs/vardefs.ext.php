<?php 
 //WARNING: The contents of this file are auto-generated


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


// created: 2011-11-29 14:33:21
$dictionary["Order"]["fields"]["orders_activities_calls"] = array (
  'name' => 'orders_activities_calls',
  'type' => 'link',
  'relationship' => 'orders_activities_calls',
  'source' => 'non-db',
);


// created: 2011-11-29 14:33:36
$dictionary["Order"]["fields"]["orders_activities_emails"] = array (
  'name' => 'orders_activities_emails',
  'type' => 'link',
  'relationship' => 'orders_activities_emails',
  'source' => 'non-db',
);


// created: 2011-11-29 14:33:27
$dictionary["Order"]["fields"]["orders_activities_meetings"] = array (
  'name' => 'orders_activities_meetings',
  'type' => 'link',
  'relationship' => 'orders_activities_meetings',
  'source' => 'non-db',
);


// created: 2011-11-29 14:33:30
$dictionary["Order"]["fields"]["orders_activities_notes"] = array (
  'name' => 'orders_activities_notes',
  'type' => 'link',
  'relationship' => 'orders_activities_notes',
  'source' => 'non-db',
);


// created: 2011-11-29 14:33:33
$dictionary["Order"]["fields"]["orders_activities_tasks"] = array (
  'name' => 'orders_activities_tasks',
  'type' => 'link',
  'relationship' => 'orders_activities_tasks',
  'source' => 'non-db',
);


// created: 2011-11-28 08:47:50
$dictionary["Order"]["fields"]["orders_quotes"] = array (
  'name' => 'orders_quotes',
  'type' => 'link',
  'relationship' => 'orders_quotes',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_ORDERS_QUOTES_FROM_QUOTES_TITLE',
);


 // created: 2012-04-23 09:57:50
$dictionary['Order']['fields']['quocgia']['default']='VIETNAM';

 
?>