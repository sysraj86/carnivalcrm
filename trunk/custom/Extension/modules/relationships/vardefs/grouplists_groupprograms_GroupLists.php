<?php
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
