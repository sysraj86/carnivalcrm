<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

/**
 * Advanced, robust set of sales and support modules.
 * Extensions to OpenSales for SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Greg Soper <greg.soper@salesagility.com>
 */

/**
 * Advanced, robust set of sales and support modules.
 * ORIGINAL AUTHOR
 *
 * @package OpenSales for SugarCRM
 * @subpackage Products
 * @copyright 2008 php|webpros.com(tm)  http://www.phpwebpros.com/
 * 
 *
 * @author Rustin Phares <rustin.phares@phpwebpros.com>
 */

$dictionary['TransportContracts'] = array(
'table' => 'transportcontracts',
'fields' => array (
  'id' => 
  array (
    'name' => 'id',
    'vname' => 'LBL_NAME',
    'type' => 'id',
    'required'=>true,
    'reportable'=>false,
  ),
  'deleted' => 
  array (
    'name' => 'deleted',
    'type' => 'bool',
    'default' => '0',
    'required'=>true,
  ),
  'date_modified' => 
  array (
    'name' => 'date_modified',
    'type' => 'datetime',
    'required' => true,
  ),
  'contract_id' => array(
    'name'     => 'contract_id',
    'vname'    => '',
    'type'     => 'id',
    'required' => true,
  ),
  
   'loaixe'      => array(
        'name'      => 'loaixe',
        'vname'     => '',
        'type'      => 'varchar',
        'len'       => 50
   ),
   
   'soxe'    => array(
        'name'  => 'soxe',
        'vname' => '',
        'type'  => 'varchar',
        'len'   => 50,
   ),
      
   'lotrinh'      => array(
        'name'      => 'lotrinh',
        'vname'     => '',
        'type'      => 'varchar',
        'len'       => 255,
   ),
   'thoigiansudung' => array(
        'name'      => 'thoigiansudung',
        'vname'     => '',
        'type'      => 'varchar',
        'len'       => 255,
   ),
   
   
  'dongia'   => array(
    'name'      => 'dongia',
    'vname'     => '',
    'type'      => 'currency',
    'dbType'    => 'double',
  ), 
  
  /*'file_ext' =>
  array (
    'name' => 'file_ext',
    'vname' => 'LBL_FILE_EXTENSION',
    'type' => 'varchar',
    'len' => '25',
    'importable' => 'false',
  ),
  'file_mime_type' =>
  array (
    'name' => 'file_mime_type',
    'vname' => 'LBL_MIME',
    'type' => 'varchar',
    'len' => '100',
     'importable' => 'false',
  ),   */
  

  
    
  /*
  'quote_id' =>
  array(
  	'name'       => 'quote_id',
  	'type'       => 'id',
  	'required'   =>  true,
  ),
  'product_id' =>
  array(
  	'name'       => 'product_id',
  	'type'       => 'id',
  ),
  'product_name' =>
  array(
  	'name'       => 'product_name',
  	'vname'      => '',
  	'type'       => 'varchar',
  	'len'        =>  50,
  ),
  'product_qty' =>
  array(
  	'name'       => 'product_qty',
  	'vname'      => '',
  	'type'       => 'int',
  ),
  'product_cost_price' =>
  array(
  	'name'       => 'product_cost_price',
  	'vname'      => '',
  	'dbType'	 => 'decimal',
  	'type'		 => 'currency',
  	'len'		 => '16,2',
  ),
  'product_list_price' =>
  array(
  	'name'       => 'product_list_price',
  	'vname'      => '',
  	'dbType'	 => 'decimal',
  	'type'		 => 'currency',
  	'len'		 => '16,2',
  ),
  'product_unit_price' =>
  array(
  	'name'       => 'product_unit_price',
  	'vname'      => '',
  	'dbType'	 => 'decimal',
  	'type'		 => 'currency',
  	'len'		 => '16,2',
  ),
  
  'vat_amt' =>
  array(
  	'name'       => 'vat_amt',
  	'vname'      => '',
  	'dbType'	 => 'decimal',
  	'type'		 => 'currency',
  	'len'		 => '16,2',
  ), 
  
  'vat' =>
  array(
  	'name'       => 'vat',
  	'vname'      => '',
  	'type'       => 'varchar',
  	'len'        =>  250,
  ),
  
   
  'product_total_price' =>
  array(
  	'name'       => 'product_total_price',
  	'vname'      => '',
  	'dbType'	 => 'decimal',
  	'type'		 => 'currency',
  	'len'		 => '16,2',
  ),
  'product_note' =>
  array(
  	'name'       => 'product_note',
  	'vname'      => '',
  	'type'       => 'text',
  ),*/
),
 

'indices' => array (
       array('name' =>'transport_contract_spk', 'type' =>'primary', 'fields'=>array('id')),
      )
);
