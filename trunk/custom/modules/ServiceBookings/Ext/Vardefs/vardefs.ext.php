<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-10-04 10:29:08
$dictionary["ServiceBookings"]["fields"]["c_approval_ervicebookings"] = array (
  'name' => 'c_approval_ervicebookings',
  'type' => 'link',
  'relationship' => 'c_approval_servicebookings',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_C_APPROVAL_SERVICEBOOKINGS_FROM_C_APPROVAL_TITLE',
);


// created: 2011-08-24 10:58:19
$dictionary["ServiceBookings"]["fields"]["groupprograervicebookings"] = array (
  'name' => 'groupprograervicebookings',
  'type' => 'link',
  'relationship' => 'groupprograms_servicebookings',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_SERVICEBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["ServiceBookings"]["fields"]["groupprograebookings_name"] = array (
  'name' => 'groupprograebookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_SERVICEBOOKINGS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr0d2frograms_ida',
  'link' => 'groupprograervicebookings',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'required'   =>true,
  'rname' => 'groupprogram_code',
);
$dictionary["ServiceBookings"]["fields"]["groupprogr0d2frograms_ida"] = array (
  'name' => 'groupprogr0d2frograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_servicebookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPPROGRAMS_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);


// created: 2011-08-24 10:11:51
$dictionary["ServiceBookings"]["fields"]["restaurantservicebookings"] = array (
  'name' => 'restaurantservicebookings',
  'type' => 'link',
  'relationship' => 'restaurants_servicebookings',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_SERVICEBOOKINGS_FROM_RESTAURANTS_TITLE',
);
$dictionary["ServiceBookings"]["fields"]["restaurantsebookings_name"] = array (
  'name' => 'restaurantsebookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_RESTAURANTS_SERVICEBOOKINGS_FROM_RESTAURANTS_TITLE',
  'save' => true,
  'id_name' => 'restaurant96e9aurants_ida',
  'link' => 'restaurantservicebookings',
  'table' => 'restaurants',
  'module' => 'Restaurants',
  'required'    => true,
  'rname' => 'name',
);
$dictionary["ServiceBookings"]["fields"]["restaurant96e9aurants_ida"] = array (
  'name' => 'restaurant96e9aurants_ida',
  'type' => 'link',
  'relationship' => 'restaurants_servicebookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_RESTAURANTS_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);


// created: 2012-08-06 15:50:49
$dictionary["ServiceBookings"]["fields"]["services_servicebookings"] = array (
  'name' => 'services_servicebookings',
  'type' => 'link',
  'relationship' => 'services_servicebookings',
  'source' => 'non-db',
  'vname' => 'LBL_SERVICES_SERVICEBOOKINGS_FROM_SERVICES_TITLE',
);
$dictionary["ServiceBookings"]["fields"]["services_seebookings_name"] = array (
  'name' => 'services_seebookings_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SERVICES_SERVICEBOOKINGS_FROM_SERVICES_TITLE',
  'save' => true,
  'id_name' => 'services_sde2fervices_ida',
  'link' => 'services_servicebookings',
  'table' => 'services',
  'module' => 'Services',
  'rname' => 'name',
);
$dictionary["ServiceBookings"]["fields"]["services_sde2fervices_ida"] = array (
  'name' => 'services_sde2fervices_ida',
  'type' => 'link',
  'relationship' => 'services_servicebookings',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SERVICES_SERVICEBOOKINGS_FROM_SERVICEBOOKINGS_TITLE',
);

?>