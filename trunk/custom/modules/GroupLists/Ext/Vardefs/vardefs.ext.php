<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-22 11:02:04
$dictionary["GroupLists"]["fields"]["grouplists_accounts"] = array (
  'name' => 'grouplists_accounts',
  'type' => 'link',
  'relationship' => 'grouplists_accounts',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPLISTS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
);


// created: 2011-08-22 10:53:04
$dictionary["GroupLists"]["fields"]["grouplists_fits"] = array (
  'name' => 'grouplists_fits',
  'type' => 'link',
  'relationship' => 'grouplists_fits',
  'source' => 'non-db',
  'side' => 'right',
  'vname' => 'LBL_GROUPLISTS_FITS_FROM_FITS_TITLE',
);


// created: 2011-09-13 14:15:20
$dictionary["GroupLists"]["fields"]["grouplists_groupprograms"] = array (
  'name' => 'grouplists_groupprograms',
  'type' => 'link',
  'relationship' => 'grouplists_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["GroupLists"]["fields"]["grouplists_pprograms_name"] = array (
  'name' => 'grouplists_pprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'grouplistsf242rograms_idb',
  'link' => 'grouplists_groupprograms',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["GroupLists"]["fields"]["grouplistsf242rograms_idb"] = array (
  'name' => 'grouplistsf242rograms_idb',
  'type' => 'link',
  'relationship' => 'grouplists_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
);


// created: 2011-09-13 11:54:59
$dictionary["GroupLists"]["fields"]["groupprograms_grouplists"] = array (
  'name' => 'groupprograms_grouplists',
  'type' => 'link',
  'relationship' => 'groupprograms_grouplists',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPPROGRAMS_TITLE',
);
$dictionary["GroupLists"]["fields"]["groupprograrouplists_name"] = array (
  'name' => 'groupprograrouplists_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPPROGRAMS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr019frograms_ida',
  'link' => 'groupprograms_grouplists',
  'table' => 'groupprograms',
  'module' => 'GroupPrograms',
  'rname' => 'name',
);
$dictionary["GroupLists"]["fields"]["groupprogr019frograms_ida"] = array (
  'name' => 'groupprogr019frograms_ida',
  'type' => 'link',
  'relationship' => 'groupprograms_grouplists',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPPROGRAMS_TITLE',
);

?>