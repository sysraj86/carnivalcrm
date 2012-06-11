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
  'groupprograms_insurances' => 
  array (
    'id' => '3b0afb53-eb1d-21c2-0339-4ecf06687cb4',
    'relationship_name' => 'groupprograms_insurances',
    'lhs_module' => 'GroupPrograms',
    'lhs_table' => 'groupprograms',
    'lhs_key' => 'id',
    'rhs_module' => 'Insurances',
    'rhs_table' => 'insurances',
    'rhs_key' => 'id',
    'join_table' => 'groupprogras_insurances_c',
    'join_key_lhs' => 'groupprogr3b48rograms_ida',
    'join_key_rhs' => 'groupprogr5003urances_idb',
    'relationship_type' => 'one-to-one',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'insurances_fits' => 
  array (
    'id' => '4853cb6a-bdd0-fef6-bef2-4ecf0673daea',
    'relationship_name' => 'insurances_fits',
    'lhs_module' => 'Insurances',
    'lhs_table' => 'insurances',
    'lhs_key' => 'id',
    'rhs_module' => 'FITs',
    'rhs_table' => 'fits',
    'rhs_key' => 'id',
    'join_table' => 'insurances_fits_c',
    'join_key_lhs' => 'insurances87aeurances_ida',
    'join_key_rhs' => 'insurancese657itsfits_idb',
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
  'insurances_activities_calls' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Insurance Lists',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Insurances',
    'rhs_module' => 'Calls',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'insurances_activities_calls',
  ),
  'insurances_activities_meetings' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Insurance Lists',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Insurances',
    'rhs_module' => 'Meetings',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'insurances_activities_meetings',
  ),
  'insurances_activities_notes' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Insurance Lists',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Insurances',
    'rhs_module' => 'Notes',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'insurances_activities_notes',
  ),
  'insurances_activities_tasks' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Insurance Lists',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Insurances',
    'rhs_module' => 'Tasks',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'insurances_activities_tasks',
  ),
  'insurances_activities_emails' => 
  array (
    'rhs_label' => 'Activities',
    'lhs_label' => 'Insurance Lists',
    'rhs_subpanel' => 'Default',
    'lhs_module' => 'Insurances',
    'rhs_module' => 'Emails',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => true,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'insurances_activities_emails',
  ),
);
?>
