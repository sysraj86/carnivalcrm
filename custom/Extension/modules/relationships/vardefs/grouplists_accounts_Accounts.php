<?php
// created: 2011-08-22 11:02:04
$dictionary["Account"]["fields"]["grouplists_accounts"] = array (
  'name' => 'grouplists_accounts',
  'type' => 'link',
  'relationship' => 'grouplists_accounts',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_ACCOUNTS_FROM_GROUPLISTS_TITLE',
);
$dictionary["Account"]["fields"]["grouplists_accounts_name"] = array (
  'name' => 'grouplists_accounts_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_ACCOUNTS_FROM_GROUPLISTS_TITLE',
  'save' => true,
  'id_name' => 'grouplists228auplists_ida',
  'link' => 'grouplists_accounts',
  'table' => 'grouplists',
  'module' => 'GroupLists',
  'rname' => 'name',
);
$dictionary["Account"]["fields"]["grouplists228auplists_ida"] = array (
  'name' => 'grouplists228auplists_ida',
  'type' => 'link',
  'relationship' => 'grouplists_accounts',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_GROUPLISTS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);
