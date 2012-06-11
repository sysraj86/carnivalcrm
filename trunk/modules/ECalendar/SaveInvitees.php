<?php
/*********************************************************************************
* ECalendar is a Calendar for SugarCRM developed by Letrium, Inc.
* Copyright (C) 2010 Letrium Inc.
*
* This program is free software; you can redistribute it and/or modify it under
* the terms of the GNU General Public License version 3 as published by the
* Free Software Foundation with the addition of the following permission added
* to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
* IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
* OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
*
* This program is distributed in the hope that it will be useful, but WITHOUT
* ANY WARRANTY;  without even the implied warranty of MERCHANTABILITY or FITNESS
* FOR A PARTICULAR PURPOSE. See  the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along with
* this program; if  not, see http://www.gnu.org/licenses or write to the Free
* Software Foundation, Inc., 51  Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
*
* You can contact Letrium Inc. at email address crm@letrium.com.
*
* ECalendar, Copyright (C) Letrium Inc., Yuri Kuznetsov.
*
* In accordance with Section 7(b) of the GNU General Public License version 3,
* these Appropriate Legal Notices must retain the display of the "Letrium" label.
*
*For more information on how to apply and follow the GNU GPL, see http://www.gnu.org/licenses.
********************************************************************************/

function invitees_filling($bean,$notify = true){

	if($_REQUEST['cur_module'] == 'Meetings'){
		

		if(!empty($_POST['user_invitees'])) {
		    	   $userInvitees = explode(',', trim($_POST['user_invitees'], ','));
		    	} else {
		    	   $userInvitees = array();	
		    	}
		    
			// Calculate which users to flag as deleted and which to add
			$deleteUsers = array();
		    	$bean->load_relationship('users');
		    	// Get all users for the meeting
		    	$q = 'SELECT mu.user_id, mu.accept_status FROM meetings_users mu WHERE mu.meeting_id = \''.$bean->id.'\'';
		    	$r = $bean->db->query($q);
		    	$acceptStatusUsers = array();
		    	while($a = $bean->db->fetchByAssoc($r)) {
		    		  if(!in_array($a['user_id'], $userInvitees)) {
		    		  	 $deleteUsers[$a['user_id']] = $a['user_id'];
		    		  } else {
		    		     $acceptStatusUsers[$a['user_id']] = $a['accept_status'];  
		    		  }
		    	}
		    		
		    	if(count($deleteUsers) > 0) {
		    		$sql = '';
		    		foreach($deleteUsers as $u) {
		    		        $sql .= ",'" . $u . "'";
		    		}
		    		$sql = substr($sql, 1);
		    		// We could run a delete SQL statement here, but will just mark as deleted instead
		    		$sql = "UPDATE meetings_users set deleted = 1 where user_id in ($sql) AND meeting_id = '". $bean->id . "'";
		    		$bean->db->query($sql);
		    	}	  
		    
			// Get all contacts for the meeting
		    	if(!empty($_POST['contact_invitees'])) {
		    	   $contactInvitees = explode(',', trim($_POST['contact_invitees'], ','));
		    	} else {
		    	   $contactInvitees = array();	
		    	}
		    
			$deleteContacts = array();
		    	$bean->load_relationship('contacts');
		    	$q = 'SELECT mu.contact_id, mu.accept_status FROM meetings_contacts mu WHERE mu.meeting_id = \''.$bean->id.'\'';
		    	$r = $bean->db->query($q);
		    	$acceptStatusContacts = array();
		    	while($a = $bean->db->fetchByAssoc($r)) {
		    		  if(!in_array($a['contact_id'], $contactInvitees)) {
		    		  	 $deleteContacts[$a['contact_id']] = $a['contact_id'];
		    		  }	else {
		    		  	 $acceptStatusContacts[$a['contact_id']] = $a['accept_status'];
		    		  }
		    	}
		    	
		    	if(count($deleteContacts) > 0) {
		    		$sql = '';
		    		foreach($deleteContacts as $u) {
		    		        $sql .= ",'" . $u . "'";
		    		}
		    		$sql = substr($sql, 1);
		    		// We could run a delete SQL statement here, but will just mark as deleted instead
		    		$sql = "UPDATE meetings_contacts set deleted = 1 where contact_id in ($sql) AND meeting_id = '". $bean->id . "'";
		    		$bean->db->query($sql);
		    	}
		
			if(!empty($_POST['lead_invitees'])) {
		    	   $leadInvitees = explode(',', trim($_POST['lead_invitees'], ','));
		    	} else {
		    	   $leadInvitees = array();	
		    	}
		    
			$deleteLeads = array();
		    	$bean->load_relationship('leads');
		    	$q = 'SELECT mu.lead_id, mu.accept_status FROM meetings_leads mu WHERE mu.meeting_id = \''.$bean->id.'\'';
		    	$r = $bean->db->query($q);
		    	$acceptStatusLeads = array();
		    	while($a = $bean->db->fetchByAssoc($r)) {
		    		  if(!in_array($a['lead_id'], $leadInvitees)) {
		    		  	 $deleteLeads[$a['lead_id']] = $a['lead_id'];
		    		  }	else {
		    		  	 $acceptStatusLeads[$a['lead_id']] = $a['accept_status'];
		    		  }
		    	}
		    	
		    	if(count($deleteLeads) > 0) {
		    		$sql = '';
		    		foreach($deleteLeads as $u) {
		    		        $sql .= ",'" . $u . "'";
		    		}
		    		$sql = substr($sql, 1);
		    		// We could run a delete SQL statement here, but will just mark as deleted instead
		    		$sql = "UPDATE meetings_leads set deleted = 1 where lead_id in ($sql) AND meeting_id = '". $bean->id . "'";
		    		$bean->db->query($sql);
		    	}
		    	////	END REMOVE
		    	///////////////////////////////////////////////////////////////////////////
		
		    
		    	///////////////////////////////////////////////////////////////////////////
		    	////	REBUILD INVITEE RELATIONSHIPS
		    	$bean->users_arr = array();
		    	$bean->users_arr = $userInvitees;
		    	$bean->contacts_arr = array();
		    	$bean->contacts_arr = $contactInvitees;
			$bean->leads_arr = array();
		    	$bean->leads_arr = $leadInvitees;
		
		    	if(!empty($_POST['parent_id']) && $_POST['parent_type'] == 'Contacts') {
		    		$bean->contacts_arr[] = $_POST['parent_id'];
		    	}
		    
			if(!empty($_POST['parent_id']) && $_POST['parent_type'] == 'Leads') {
		    		$bean->leads_arr[] = $_POST['parent_id'];
		    	}
		    	
		    	
		    	$bean->save($notify);	    	

		    	
		    	// Process users
		    	$existing_users = array();
		    	if(!empty($_POST['existing_invitees'])) {
		    	   $existing_users =  explode(",", trim($_POST['existing_invitees'], ','));
		    	}
		    
		    	foreach($bean->users_arr as $user_id) {
		    	    if(empty($user_id) || isset($existing_users[$user_id]) || isset($deleteUsers[$user_id])) {
		    			continue;
		    		}
		    		
		    		if(!isset($acceptStatusUsers[$user_id])) {
		    			$bean->users->add($user_id);
		    		} else {
		    			// update query to preserve accept_status
		    			$qU  = 'UPDATE meetings_users SET deleted = 0, accept_status = \''.$acceptStatusUsers[$user_id].'\' ';
		    			$qU .= 'WHERE meeting_id = \''.$bean->id.'\' ';
		    			$qU .= 'AND user_id = \''.$user_id.'\'';
		    			$bean->db->query($qU);
		    		} 
		    	}
		    	
			// Process contacts
		    	$existing_contacts =  array();
		    	if(!empty($_POST['existing_contact_invitees'])) {
		    	   $existing_contacts =  explode(",", trim($_POST['existing_contact_invitees'], ','));
		    	}
		    	    
		    	foreach($bean->contacts_arr as $contact_id) {
		    		if(empty($contact_id) || isset($exiting_contacts[$contact_id]) || isset($deleteContacts[$contact_id])) {
		    			continue;
		    		}
		    		
		    		if(!isset($acceptStatusContacts[$contact_id])) {
		    		    $bean->contacts->add($contact_id);
		    		} else {
		    			// update query to preserve accept_status
		    			$qU  = 'UPDATE meetings_contacts SET deleted = 0, accept_status = \''.$acceptStatusContacts[$contact_id].'\' ';
		    			$qU .= 'WHERE meeting_id = \''.$bean->id.'\' ';
		    			$qU .= 'AND contact_id = \''.$contact_id.'\'';
		    			$bean->db->query($qU);
		    		}
		    	}
		
			// Process leads
		    	$existing_leads =  array();
		    	if(!empty($_POST['existing_lead_invitees'])) {
		    	   $existing_leads =  explode(",", trim($_POST['existing_lead_invitees'], ','));
		    	}
		    	    
		    	foreach($bean->leads_arr as $lead_id) {
		    		if(empty($lead_id) || isset($exiting_leads[$lead_id]) || isset($deleteLeads[$lead_id])) {
		    			continue;
		    		}
		    		
		    		if(!isset($acceptStatusLeads[$lead_id])) {
		    		    $bean->leads->add($lead_id);
		    		} else {
		    			// update query to preserve accept_status
		    			$qU  = 'UPDATE meetings_leads SET deleted = 0, accept_status = \''.$acceptStatusLeads[$lead_id].'\' ';
		    			$qU .= 'WHERE meeting_id = \''.$bean->id.'\' ';
		    			$qU .= 'AND lead_id = \''.$lead_id.'\'';
		    			$bean->db->query($qU);
		    		}
		    	}
    



	
	}
	
	if($_REQUEST['cur_module'] == 'Calls'){
	
		    	if(!empty($_POST['user_invitees'])) {
		    	   $userInvitees = explode(',', trim($_POST['user_invitees'], ','));
		    	} else {
		    	   $userInvitees = array();	
		    	}
		    
			// Calculate which users to flag as deleted and which to add
			$deleteUsers = array();
		    	$bean->load_relationship('users');
		    	// Get all users for the call
		    	$q = 'SELECT mu.user_id, mu.accept_status FROM calls_users mu WHERE mu.call_id = \''.$bean->id.'\'';
		    	$r = $bean->db->query($q);
		    	$acceptStatusUsers = array();
		    	while($a = $bean->db->fetchByAssoc($r)) {
		    		  if(!in_array($a['user_id'], $userInvitees)) {
		    		  	 $deleteUsers[$a['user_id']] = $a['user_id'];
		    		  } else {
		    		     $acceptStatusUsers[$a['user_id']] = $a['accept_status'];  
		    		  }
		    	}
		    		
		    	if(count($deleteUsers) > 0) {
		    		$sql = '';
		    		foreach($deleteUsers as $u) {
				// make sure we don't delete the assigned user
				if ( $u != $bean->assigned_user_id )
		    		        $sql .= ",'" . $u . "'";
		    		}
		    		$sql = substr($sql, 1);
		    		// We could run a delete SQL statement here, but will just mark as deleted instead
		    		$sql = "UPDATE calls_users set deleted = 1 where user_id in ($sql) AND call_id = '". $bean->id . "'";
		    		$bean->db->query($sql);
		    	}	  
		    
			// Get all contacts for the call
		    	if(!empty($_POST['contact_invitees'])) {
		    	   $contactInvitees = explode(',', trim($_POST['contact_invitees'], ','));
		    	} else {
		    	   $contactInvitees = array();	
		    	}
		    
			$deleteContacts = array();
		    	$bean->load_relationship('contacts');
		    	$q = 'SELECT mu.contact_id, mu.accept_status FROM calls_contacts mu WHERE mu.call_id = \''.$bean->id.'\'';
		    	$r = $bean->db->query($q);
		    	$acceptStatusContacts = array();
		    	while($a = $bean->db->fetchByAssoc($r)) {
		    		  if(!in_array($a['contact_id'], $contactInvitees)) {
		    		  	 $deleteContacts[$a['contact_id']] = $a['contact_id'];
		    		  }	else {
		    		  	 $acceptStatusContacts[$a['contact_id']] = $a['accept_status'];
		    		  }
		    	}
		    	
		    	if(count($deleteContacts) > 0) {
		    		$sql = '';
		    		foreach($deleteContacts as $u) {
		    		        $sql .= ",'" . $u . "'";
		    		}
		    		$sql = substr($sql, 1);
		    		// We could run a delete SQL statement here, but will just mark as deleted instead
		    		$sql = "UPDATE calls_contacts set deleted = 1 where contact_id in ($sql) AND call_id = '". $bean->id . "'";
		    		$bean->db->query($sql);
		    	}
		
			if(!empty($_POST['lead_invitees'])) {
		    	   $leadInvitees = explode(',', trim($_POST['lead_invitees'], ','));
		    	} else {
		    	   $leadInvitees = array();	
		    	}
		    
			// Calculate which leads to flag as deleted and which to add
			$deleteLeads = array();
		    	$bean->load_relationship('leads');
		    	// Get all leads for the call
		    	$q = 'SELECT mu.lead_id, mu.accept_status FROM calls_leads mu WHERE mu.call_id = \''.$bean->id.'\'';
		    	$r = $bean->db->query($q);
		    	$acceptStatusLeads = array();
		    	while($a = $bean->db->fetchByAssoc($r)) {
		    		  if(!in_array($a['lead_id'], $leadInvitees)) {
		    		  	 $deleteLeads[$a['lead_id']] = $a['lead_id'];
		    		  } else {
		    		     $acceptStatusLeads[$a['user_id']] = $a['accept_status'];  
		    		  }
		    	}
		    		
		    	if(count($deleteLeads) > 0) {
		    		$sql = '';
		    		foreach($deleteLeads as $u) {
				// make sure we don't delete the assigned user
				if ( $u != $bean->assigned_user_id )
		    		        $sql .= ",'" . $u . "'";
		    		}
		    		$sql = substr($sql, 1);
		    		// We could run a delete SQL statement here, but will just mark as deleted instead
		    		$sql = "UPDATE calls_leads set deleted = 1 where lead_id in ($sql) AND call_id = '". $bean->id . "'";
		    		$bean->db->query($sql);
		    	}
		    	////	END REMOVE
		    	///////////////////////////////////////////////////////////////////////////
		
		    
		    	///////////////////////////////////////////////////////////////////////////
		    	////	REBUILD INVITEE RELATIONSHIPS
		    	$bean->users_arr = array();
		    	$bean->users_arr = $userInvitees;
		    	$bean->contacts_arr = array();
		    	$bean->contacts_arr = $contactInvitees;
			$bean->leads_arr = array();
		    	$bean->leads_arr = $leadInvitees;
		
		    	if(!empty($_POST['parent_id']) && $_POST['parent_type'] == 'Contacts') {
		    		$bean->contacts_arr[] = $_POST['parent_id'];
		    	}
		    
			if(!empty($_POST['parent_id']) && $_POST['parent_type'] == 'Leads') {
		    		$bean->leads_arr[] = $_POST['parent_id'];
		    	}	
		    	
		    	
		    	$bean->save($notify);
		    	
		    
		    	// Process users
		    	$existing_users = array();
		    	if(!empty($_POST['existing_invitees'])) {
		    	   $existing_users =  explode(",", trim($_POST['existing_invitees'], ','));
		    	}
		    
		    	foreach($bean->users_arr as $user_id) {
		    	    if(empty($user_id) || isset($existing_users[$user_id]) || isset($deleteUsers[$user_id])) {
		    			continue;
		    		}
		    		
		    		if(!isset($acceptStatusUsers[$user_id])) {
		    			$bean->users->add($user_id);
		    		} else {
		    			// update query to preserve accept_status
		    			$qU  = 'UPDATE calls_users SET deleted = 0, accept_status = \''.$acceptStatusUsers[$user_id].'\' ';
		    			$qU .= 'WHERE call_id = \''.$bean->id.'\' ';
		    			$qU .= 'AND user_id = \''.$user_id.'\'';
		    			$bean->db->query($qU);
		    		} 
		    	}
		    	
			// Process contacts
		    	$existing_contacts =  array();
		    	if(!empty($_POST['existing_contact_invitees'])) {
		    	   $existing_contacts =  explode(",", trim($_POST['existing_contact_invitees'], ','));
		    	}
		    	    
		    	foreach($bean->contacts_arr as $contact_id) {
		    		if(empty($contact_id) || isset($exiting_contacts[$contact_id]) || isset($deleteContacts[$contact_id])) {
		    			continue;
		    		}
		    		
		    		if(!isset($acceptStatusContacts[$contact_id])) {
		    		    $bean->contacts->add($contact_id);
		    		} else {
		    			// update query to preserve accept_status
		    			$qU  = 'UPDATE calls_contacts SET deleted = 0, accept_status = \''.$acceptStatusContacts[$contact_id].'\' ';
		    			$qU .= 'WHERE call_id = \''.$bean->id.'\' ';
		    			$qU .= 'AND contact_id = \''.$contact_id.'\'';
		    			$bean->db->query($qU);
		    		}
		    	}
		
			// Process leads
		    	$existing_leads =  array();
		    	if(!empty($_POST['existing_lead_invitees'])) {
		    	   $existing_contacts =  explode(",", trim($_POST['existing_lead_invitees'], ','));
		    	}
		    	    
		    	foreach($bean->leads_arr as $lead_id) {
		    		if(empty($lead_id) || isset($existing_leads[$lead_id]) || isset($deleteLeads[$lead_id])) {
		    			continue;
		    		}
		    		
		    		if(!isset($acceptStatusLeads[$lead_id])) {
		    		    $bean->leads->add($lead_id);
		    		} else {
		    			// update query to preserve accept_status
		    			$qU  = 'UPDATE calls_leads SET deleted = 0, accept_status = \''.$acceptStatusLeads[$lead_id].'\' ';
		    			$qU .= 'WHERE call_id = \''.$bean->id.'\' ';
		    			$qU .= 'AND lead_id = \''.$lead_id.'\'';
		    			$bean->db->query($qU);
		    		}
		    	}	    	
	
	}
}
?>
