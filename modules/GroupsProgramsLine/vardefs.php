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

$dictionary['GroupsProgramsLine'] = array(
'table' => 'groupsprogramslines',
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
  'groupprogram_id' => array(
    'name'     => 'groupprogram_id',
    'vname'    => '',
    'type'     => 'id',
    'required' => true,
  ),
  
   'date'      => array(
        'name'      => 'date',
        'vname'     => '',
        'type'      => 'date',
        'display_default'    => 'now',
   ),
   
   'section_of_date'    => array(
        'name'  => 'section_of_date',
        'vname' => '',
        'type'  => 'varchar',
        'len'   => 255,
   ),
      
   'parent'      => array(
        'name'      => 'parent',
        'vname'     => '',
        'type'      => 'varchar',
        'len'       => 150,
   ),
  'parent_name'   => array(
    'name'  => 'parent_name',
    'vname' => '',
    'type'  => 'varchar',
    'len'   => 255,
  ), 
  'parent_id' =>
  array (
     'name'=>'parent_id',
     'vname' => '',
     'type' => 'id',
     'reportable'   => false,
  ),
  
 'service_other' =>
  array (
    'name' => 'service_other',
    'vname' => '',
    'type' => 'varchar',
    'len' => 255,
  ),
  'address' => array(
    'name'      => 'address',
    'vname'     => '',
    'type'      => 'text',
  ),
  'tel' => array(
    'name'      => 'tel',
    'vname'     => '',
    'type'      => 'varchar',
    'len'       => 50,
  ),
  
  'fax' => array(
   'name'   => 'fax',
   'vname'  => '',
   'type'   => 'varchar',
   'len'    => 50,
  ),
  
  'contact' => array(
    'name'      => 'contact',
    'vname'     => '',
    'type'      => 'text',
  ),
  
  'content' => array(
    'name'  => 'content',
    'vname' => '',
    'type'  => 'text',
  ),
   'content_id'  => array(
    'name'      => 'content_id',
    'vname'     => '',
    'type'      => 'id',
  ),
  'contact_phone'   => array(
    'name'  => 'contact_phone',
    'vname' => '',
    'type'  => 'varchar'   ,
    'len'   => 50  
  ),
  
  'contact_id'  => array(
    'name'      => 'contact_id',
    'vname'     => '',
    'type'      => 'id',
  ),
),
 

'indices' => array (
       array('name' =>'groupsprogramsline_spk', 'type' =>'primary', 'fields'=>array('id')),
      )
);
    