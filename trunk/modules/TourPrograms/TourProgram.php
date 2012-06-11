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

if(!class_exists('SugarBean')) {
	require_once('data/SugarBean.php');
}

// Do not actually declare, use the functions statically
class TourProgram extends SugarBean {
	var $db;
	var $field_name_map;

	// Stored fields
	var $id;
	var $date_modified;
	var $deleted;
    var $tour_id;
	var $title;
    var $destination;
    var $location;
	var $notes;
	var $description;
	var $picture;
    var $uploadfile;
	
	var $object_name = 'TourProgram';
	var $table_name = 'tourprograms';
	
	var $disable_row_level_security = true;
	var $module_dir = 'TourPrograms';
	var $field_defs = array();
	var $field_defs_map = array();
	var $new_schema = true;

	// Do not actually declare, use the functions statically
	function UserPreference() {
		parent::SugarBean();
	
	}


	
}

?>
