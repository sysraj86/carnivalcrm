<?php
// created: 2011-09-13 14:15:20
$dictionary["GroupProgram"]["fields"]["grouplists_groupprograms"] = array (
  'name' => 'grouplists_groupprograms',
  'type' => 'link',
  'relationship' => 'grouplists_groupprograms',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPLISTS_TITLE',
);
$dictionary["GroupProgram"]["fields"]["grouplists_pprograms_name"] = array (
  'name' => 'grouplists_pprograms_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPLISTS_TITLE',
  'save' => true,
  'id_name' => 'grouplists87eduplists_ida',
  'link' => 'grouplists_groupprograms',
  'table' => 'grouplists',
  'module' => 'GroupLists',
  'rname' => 'name',
  'required' => true,
);
$dictionary["GroupProgram"]["fields"]["grouplists87eduplists_ida"] = array (
  'name' => 'grouplists87eduplists_ida',
  'type' => 'link',
  'relationship' => 'grouplists_groupprograms',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_GROUPLISTS_GROUPPROGRAMS_FROM_GROUPLISTS_TITLE',
);
