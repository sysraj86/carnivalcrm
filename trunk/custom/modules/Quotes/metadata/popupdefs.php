<?php
$popupMeta = array (
    'moduleMain' => 'Quotes',
    'varName' => 'Quotes',
    'orderBy' => 'quotes.name',
    'whereClauses' => array (
  'name' => 'quotes.name',
  'code' => 'quotes.code',
  'contacts_quotes_name' => 'quotes.contacts_quotes_name',
  'service_cost' => 'quotes.service_cost',
  'total_cost' => 'quotes.total_cost',
  'accounts_quotes_name' => 'quotes.accounts_quotes_name',
  'fits_quotes_name' => 'quotes.fits_quotes_name',
  'quotes_tours_name' => 'quotes.quotes_tours_name',
  'current_user_only' => 'quotes.current_user_only',
  'assigned_user_id' => 'quotes.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'code',
  5 => 'contacts_quotes_name',
  6 => 'service_cost',
  7 => 'total_cost',
  8 => 'accounts_quotes_name',
  9 => 'fits_quotes_name',
  10 => 'quotes_tours_name',
  11 => 'current_user_only',
  12 => 'assigned_user_id',
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
    'name' => 'name',
    'width' => '10%',
  ),
  'contacts_quotes_name' => 
  array (
    'type' => 'relate',
    'link' => 'contacts_quotes',
    'label' => 'LBL_CONTACTS_QUOTES_FROM_CONTACTS_TITLE',
    'width' => '10%',
    'name' => 'contacts_quotes_name',
  ),
  'accounts_quotes_name' => 
  array (
    'type' => 'relate',
    'link' => 'accounts_quotes',
    'label' => 'LBL_ACCOUNTS_QUOTES_FROM_ACCOUNTS_TITLE',
    'width' => '10%',
    'name' => 'accounts_quotes_name',
  ),
  'fits_quotes_name' => 
  array (
    'type' => 'relate',
    'link' => 'fits_quotes',
    'label' => 'LBL_FITS_QUOTES_FROM_FITS_TITLE',
    'width' => '10%',
    'name' => 'fits_quotes_name',
  ),
  'quotes_tours_name' => 
  array (
    'type' => 'relate',
    'link' => 'quotes_tours',
    'label' => 'LBL_QUOTES_TOURS_FROM_TOURS_TITLE',
    'width' => '10%',
    'name' => 'quotes_tours_name',
  ),
  'service_cost' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_SERVICE_COST',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'service_cost',
  ),
  'total_cost' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_TOTAL_COST',
    'currency_format' => true,
    'width' => '10%',
    'name' => 'total_cost',
  ),
  'current_user_only' => 
  array (
    'label' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
    'width' => '10%',
    'name' => 'current_user_only',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
);
