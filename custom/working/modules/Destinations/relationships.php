<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2011 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

$relationships = array (
  'countries_destinations' => 
  array (
    'id' => '4f3a256f-263b-f1cc-162d-4eaf9d3f67f9',
    'relationship_name' => 'countries_destinations',
    'lhs_module' => 'Countries',
    'lhs_table' => 'countries',
    'lhs_key' => 'id',
    'rhs_module' => 'Destinations',
    'rhs_table' => 'destinations',
    'rhs_key' => 'id',
    'join_table' => 'countries_destinations_c',
    'join_key_lhs' => 'countries_5a12untries_ida',
    'join_key_rhs' => 'countries_bc13nations_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'destinations_hotels' => 
  array (
    'id' => '54615540-ae25-1c26-4005-4eaf9d236b85',
    'relationship_name' => 'destinations_hotels',
    'lhs_module' => 'Destinations',
    'lhs_table' => 'destinations',
    'lhs_key' => 'id',
    'rhs_module' => 'Hotels',
    'rhs_table' => 'hotels',
    'rhs_key' => 'id',
    'join_table' => 'destinations_hotels_c',
    'join_key_lhs' => 'destinatio6fe0nations_ida',
    'join_key_rhs' => 'destinatiocbebshotels_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'destinations_locations' => 
  array (
    'id' => '54c9b9c3-ae06-5b36-daed-4eaf9dc24073',
    'relationship_name' => 'destinations_locations',
    'lhs_module' => 'Destinations',
    'lhs_table' => 'destinations',
    'lhs_key' => 'id',
    'rhs_module' => 'Locations',
    'rhs_table' => 'locations',
    'rhs_key' => 'id',
    'join_table' => 'destinations_locations_c',
    'join_key_lhs' => 'destinatio010enations_ida',
    'join_key_rhs' => 'destinatio2a7dcations_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'destinations_restaurants' => 
  array (
    'id' => '5530e30a-0b0d-a27e-1bbd-4eaf9da388bf',
    'relationship_name' => 'destinations_restaurants',
    'lhs_module' => 'Destinations',
    'lhs_table' => 'destinations',
    'lhs_key' => 'id',
    'rhs_module' => 'Restaurants',
    'rhs_table' => 'restaurants',
    'rhs_key' => 'id',
    'join_table' => 'destination_restaurants_c',
    'join_key_lhs' => 'destinatio9a61nations_ida',
    'join_key_rhs' => 'destinatio712aaurants_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'destinations_transports' => 
  array (
    'id' => '5598f932-34ff-8695-3376-4eaf9d85f11d',
    'relationship_name' => 'destinations_transports',
    'lhs_module' => 'Destinations',
    'lhs_table' => 'destinations',
    'lhs_key' => 'id',
    'rhs_module' => 'Transports',
    'rhs_table' => 'transports',
    'rhs_key' => 'id',
    'join_table' => 'destinations_transports_c',
    'join_key_lhs' => 'destinatio458bnations_ida',
    'join_key_rhs' => 'destinatio9d10nsports_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'destinations_services' => 
  array (
    'rhs_label' => 'Services',
    'lhs_label' => 'Destinations',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'Destinations',
    'rhs_module' => 'Services',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'destinations_services',
  ),
);
?>
