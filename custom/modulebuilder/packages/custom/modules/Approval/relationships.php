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
  'c_approval_groupprograms' => 
  array (
    'rhs_label' => 'Made Tours',
    'lhs_label' => 'Approval',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'C_Approval',
    'rhs_module' => 'GroupPrograms',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'c_approval_groupprograms',
  ),
  'c_approval_worksheets' => 
  array (
    'rhs_label' => 'Worksheets',
    'lhs_label' => 'Approval',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'C_Approval',
    'rhs_module' => 'Worksheets',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'c_approval_worksheets',
  ),
  'c_approval_roombookings' => 
  array (
    'rhs_label' => 'RoomBookings',
    'lhs_label' => 'Approval',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'C_Approval',
    'rhs_module' => 'RoomBookings',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'c_approval_roombookings',
  ),
  'c_approval_transportbookings' => 
  array (
    'rhs_label' => 'TransportBookings',
    'lhs_label' => 'Approval',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'C_Approval',
    'rhs_module' => 'TransportBookings',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'c_approval_transportbookings',
  ),
  'c_approval_servicebookings' => 
  array (
    'rhs_label' => 'ServiceBookings',
    'lhs_label' => 'Approval',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'C_Approval',
    'rhs_module' => 'ServiceBookings',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'c_approval_servicebookings',
  ),
  'c_approval_airlinestickets' => 
  array (
    'rhs_label' => 'AirlinesTickets',
    'lhs_label' => 'Approval',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'C_Approval',
    'rhs_module' => 'AirlinesTickets',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'c_approval_airlinestickets',
  ),
  'c_approval_contracts' => 
  array (
    'rhs_label' => 'Contracts',
    'lhs_label' => 'Approval',
    'lhs_subpanel' => 'default',
    'lhs_module' => 'C_Approval',
    'rhs_module' => 'Contracts',
    'relationship_type' => 'many-to-one',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'c_approval_contracts',
  ),
);
?>
