<?php
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
