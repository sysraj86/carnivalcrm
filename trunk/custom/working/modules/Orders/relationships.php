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
  'fits_orders' => 
  array (
    'id' => '9b6c30fe-19fd-e79a-b314-4ed46a2a7486',
    'relationship_name' => 'fits_orders',
    'lhs_module' => 'FITs',
    'lhs_table' => 'fits',
    'lhs_key' => 'id',
    'rhs_module' => 'Orders',
    'rhs_table' => 'orders',
    'rhs_key' => 'id',
    'join_table' => 'fits_orders_c',
    'join_key_lhs' => 'fits_order6297ersfits_ida',
    'join_key_rhs' => 'fits_order39b7sorders_idb',
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
  'orders_quotes' => 
  array (
    'id' => 'be6670e3-6af9-6c1f-6b0b-4ed46a3732fe',
    'relationship_name' => 'orders_quotes',
    'lhs_module' => 'Orders',
    'lhs_table' => 'orders',
    'lhs_key' => 'id',
    'rhs_module' => 'Quotes',
    'rhs_table' => 'quotes',
    'rhs_key' => 'id',
    'join_table' => 'orders_quotes_c',
    'join_key_lhs' => 'orders_quo2e0asorders_ida',
    'join_key_rhs' => 'orders_quoe6desquotes_idb',
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
  'orders_activities_calls' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Orders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Orders',
    'rhs_module' => 'Calls',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'orders_activities_calls',
  ),
  'orders_activities_meetings' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Orders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Orders',
    'rhs_module' => 'Meetings',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'orders_activities_meetings',
  ),
  'orders_activities_notes' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Orders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Orders',
    'rhs_module' => 'Notes',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'orders_activities_notes',
  ),
  'orders_activities_tasks' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Orders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Orders',
    'rhs_module' => 'Tasks',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'orders_activities_tasks',
  ),
  'orders_activities_emails' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Orders',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Orders',
    'rhs_module' => 'Emails',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'orders_activities_emails',
  ),
);
?>
