<?php
// created: 2011-09-09 10:33:00
$dictionary["Account"]["fields"]["ticketorder_accounts"] = array (
  'name' => 'ticketorder_accounts',
  'type' => 'link',
  'relationship' => 'ticketorder_accounts',
  'source' => 'non-db',
  'vname' => 'LBL_TICKETORDER_ACCOUNTS_FROM_TICKETORDER_TITLE',
);
$dictionary["Account"]["fields"]["ticketorder_accounts_name"] = array (
  'name' => 'ticketorder_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_TICKETORDER_ACCOUNTS_FROM_TICKETORDER_TITLE',
  'save' => true,
  'id_name' => 'ticketordeeb77etorder_ida',
  'link' => 'ticketorder_accounts',
  'table' => 'TicketOrder',
  'module' => 'TicketOrder',
  'rname' => 'name',
);
$dictionary["Account"]["fields"]["ticketordeeb77etorder_ida"] = array (
  'name' => 'ticketordeeb77etorder_ida',
  'type' => 'link',
  'relationship' => 'ticketorder_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_TICKETORDER_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
