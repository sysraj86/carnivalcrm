<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $current_user;

$dashletData['MessageDashlet']['searchFields'] = array('date_entered'     => array('default' => ''),
                                                          'date_modified'    => array('default' => ''),
                                                          'assigned_user_id' => array('type'    => 'assigned_user_name', 
                                                                                      'default' => $current_user->name));
$dashletData['MessageDashlet']['columns'] =  array(   'name' => array('width'   => '40', 
                                                                      'label'   => '',
                                                                      'link'    => false,
																	  'sortable'=>false,
                                                                      'default' => true), 
													
                                               );
?>