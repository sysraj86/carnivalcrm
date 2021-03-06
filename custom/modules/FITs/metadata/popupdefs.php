<?php
$popupMeta = array (
    'moduleMain' => 'FITs',
    'varName' => 'FITs',
    'orderBy' => 'fits.first_name, fits.last_name',
    'whereClauses' => array (
  'code' => 'fits.code',
  'name' => 'fits.name',
  'gender' => 'fits.gender',
  'email1' => 'fits.email1',
  'provice_city' => 'fits.provice_city',
  'phone_mobile' => 'fits.phone_mobile',
  'phone_home' => 'fits.phone_home',
  'phone_fax' => 'fits.phone_fax',
  'religion' => 'fits.religion',
  'fit_action' => 'fits.fit_action',
  'potential' => 'fits.potential',
  'nationality' => 'fits.nationality',
  'fits_fits_name' => 'fits.fits_fits_name',
  'accounts_fits_name' => 'fits.accounts_fits_name',
  'current_user_only' => 'fits.current_user_only',
  'assigned_user_name' => 'fits.assigned_user_name',
  'identy_card' => 'fits.identy_card',
),
    'searchInputs' => array (
  2 => 'code',
  3 => 'name',
  4 => 'gender',
  5 => 'email1',
  6 => 'provice_city',
  7 => 'phone_mobile',
  8 => 'phone_home',
  9 => 'phone_fax',
  10 => 'religion',
  11 => 'fit_action',
  12 => 'potential',
  13 => 'nationality',
  14 => 'fits_fits_name',
  15 => 'accounts_fits_name',
  16 => 'current_user_only',
  17 => 'assigned_user_name',
  18 => 'identy_card',
),
    'searchdefs' => array (
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'name' => 'code',
  ),
  'name' => 
  array (
    'type' => 'name',
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'gender' => 
  array (
    'type' => 'radioenum',
    'studio' => 'visible',
    'label' => 'LBL_GENDER',
    'width' => '10%',
    'name' => 'gender',
  ),
  'email1' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_EMAIL_ADDRESS',
    'width' => '10%',
    'name' => 'email1',
  ),
  'phone_mobile' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_MOBILE_PHONE',
    'width' => '10%',
    'name' => 'phone_mobile',
  ),
  'phone_home' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_HOME_PHONE',
    'width' => '10%',
    'name' => 'phone_home',
  ),
  'phone_fax' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_FAX_PHONE',
    'width' => '10%',
    'name' => 'phone_fax',
  ),
  'religion' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_RELIGION',
    'sortable' => false,
    'width' => '10%',
    'name' => 'religion',
  ),
  'nationality' => 
  array (
    'type' => 'multienum',
    'label' => 'LBL_NATIONALITY',
    'width' => '10%',
    'name' => 'nationality',
  ),
  'provice_city' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_PROVINCE_CITY',
    'sortable' => false,
    'width' => '10%',
    'name' => 'provice_city',
  ),
  'fit_action' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_FIT_ACTION',
    'sortable' => false,
    'width' => '10%',
    'name' => 'fit_action',
  ),
  'potential' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_POTENTIAL',
    'sortable' => false,
    'width' => '10%',
    'name' => 'potential',
  ),
  'fits_fits_name' => 
  array (
    'type' => 'relate',
    'link' => 'fits_fits',
    'label' => 'LBL_FITS_FITS_FROM_FITS_L_TITLE',
    'width' => '10%',
    'name' => 'fits_fits_name',
  ),
  'accounts_fits_name' => 
  array (
    'type' => 'relate',
    'link' => 'accounts_fits',
    'label' => 'LBL_ACCOUNTS_FITS_FROM_ACCOUNTS_TITLE',
    'width' => '10%',
    'name' => 'accounts_fits_name',
  ),
  'current_user_only' => 
  array (
    'label' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
    'width' => '10%',
    'name' => 'current_user_only',
  ),
  'assigned_user_name' => 
  array (
    'link' => 'assigned_user_link',
    'type' => 'relate',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'width' => '10%',
    'name' => 'assigned_user_name',
  ),
  'identy_card' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_IDENTY_CARD',
    'width' => '10%',
    'name' => 'identy_card',
  ),
),
    'listviewdefs' => array (
  'CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
    'link' => true,
    'name' => 'code',
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'link' => true,
    'orderBy' => 'last_name',
    'default' => true,
    'related_fields' => 
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
    ),
    'name' => 'name',
  ),
  'PHONE_MOBILE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_MOBILE_PHONE',
    'default' => true,
    'name' => 'phone_mobile',
  ),
  'EMAIL1' => 
  array (
    'width' => '15%',
    'label' => 'LBL_EMAIL_ADDRESS',
    'sortable' => false,
    'link' => true,
    'customCode' => '{$EMAIL1_LINK}{$EMAIL1}</a>',
    'default' => true,
    'name' => 'email1',
  ),
  'ACCOUNTS_FITS_NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_ACCOUNT_NAME',
    'default' => true,
    'name' => 'accounts_fits_name',
  ),
  'ADDRESS' => 
  array (
    'width' => '20%',
    'label' => 'LBL_ADDRESS',
    'default' => true,
    'name' => 'address',
  ),
  'DEPARMENT' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DEPARMENT',
    'default' => true,
    'name' => 'deparment',
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => true,
    'name' => 'created_by_name',
  ),
),
);
