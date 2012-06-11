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

$dictionary['ServiceBookingsLine'] = array(
'table' => 'servicebookingsline',
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
  'servicebooking_id' => array(
    'name'     => 'servicebooking_id',
    'vname'    => '',
    'type'     => 'id',
    'required' => true,
  ),    
  'service'   => array(
     'name'     => 'service',
     'vname'    => '',
     'type'     => 'varchar',
     'len'      => 250,
   ),
   
   'quantity'      => array(
        'name'      => 'quantity',
        'vname'     => '',
        'type'      => 'int',
        'len'       => 11,
   ),

   
   'price'    => array(
        'name'  => 'price',
        'vname' => '',
        'type'  => 'currency',
        'dbType' => 'double',
   ),
      
   'content'      => array(
        'name'      => 'content',
        'vname'     => '',
        'type'      => 'text',
   ),
   

),
 

'indices' => array (
       array('name' =>'servicebookingsline_spk', 'type' =>'primary', 'fields'=>array('id')),
      )
);
