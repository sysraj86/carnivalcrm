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
    'id' => 'e01cdb57-77b4-9b3b-bf78-4f3e0235cd6d',
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
  'countries_hotels' => 
  array (
    'id' => 'e132e02d-11b4-ea4b-1a77-4f3e0212678e',
    'relationship_name' => 'countries_hotels',
    'lhs_module' => 'Countries',
    'lhs_table' => 'countries',
    'lhs_key' => 'id',
    'rhs_module' => 'Hotels',
    'rhs_table' => 'hotels',
    'rhs_key' => 'id',
    'join_table' => 'countries_hotels_c',
    'join_key_lhs' => 'countries_d511untries_ida',
    'join_key_rhs' => 'countries_97f9shotels_idb',
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
  'countries_restaurants' => 
  array (
    'id' => 'e29759c0-3604-5964-0065-4f3e02c4214c',
    'relationship_name' => 'countries_restaurants',
    'lhs_module' => 'Countries',
    'lhs_table' => 'countries',
    'lhs_key' => 'id',
    'rhs_module' => 'Restaurants',
    'rhs_table' => 'restaurants',
    'rhs_key' => 'id',
    'join_table' => 'countries_restaurants_c',
    'join_key_lhs' => 'countries_8307untries_ida',
    'join_key_rhs' => 'countries_024aaurants_idb',
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
  'countries_transports' => 
  array (
    'id' => 'e3c5290a-688c-0588-1ea3-4f3e0220b6a1',
    'relationship_name' => 'countries_transports',
    'lhs_module' => 'Countries',
    'lhs_table' => 'countries',
    'lhs_key' => 'id',
    'rhs_module' => 'Transports',
    'rhs_table' => 'transports',
    'rhs_key' => 'id',
    'join_table' => 'countries_transports_c',
    'join_key_lhs' => 'countries_f24buntries_ida',
    'join_key_rhs' => 'countries_0579nsports_idb',
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
  'countries_services' => 
  array (
    'rhs_label' => 'Services',
    'lhs_label' => 'Countries',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'Countries',
    'rhs_module' => 'Services',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'countries_services',
  ),
);
?>
