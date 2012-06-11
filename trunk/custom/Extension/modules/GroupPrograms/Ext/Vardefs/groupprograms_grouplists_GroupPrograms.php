<?php
// created: 2011-09-13 11:54:59
$dictionary["GroupProgram"]["fields"]["groupprograms_grouplists"] = array (
  'name' => 'groupprograms_grouplists',
  'type' => 'link',
  'relationship' => 'groupprograms_grouplists',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPLISTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["groupprograrouplists_name"] = array (
  'name' => 'groupprograrouplists_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPLISTS_TITLE',
  'save' => true,
  'id_name' => 'groupprogr9ea5uplists_idb',
  'link' => 'groupprograms_grouplists',
  'table' => 'grouplists',
  'module' => 'GroupLists',
  'rname' => 'name',
);
$dictionary["GroupProgram"]["fields"]["groupprogr9ea5uplists_idb"] = array (
  'name' => 'groupprogr9ea5uplists_idb',
  'type' => 'link',
  'relationship' => 'groupprograms_grouplists',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPPROGRAMS_GROUPLISTS_FROM_GROUPLISTS_TITLE',
);
