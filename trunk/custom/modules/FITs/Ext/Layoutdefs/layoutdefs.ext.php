<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-19 10:23:47
$layout_defs["FITs"]["subpanel_setup"]["accounts_fits"] = array (
  'order' => 100,
  'module' => 'Accounts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_FITS_FROM_ACCOUNTS_TITLE',
  'get_subpanel_data' => 'accounts_fits',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-08-19 10:29:03
$layout_defs["FITs"]["subpanel_setup"]["activities"] = array (
  'order' => 10,
  'sort_order' => 'desc',
  'sort_by' => 'date_start',
  'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
  'type' => 'collection',
  'subpanel_name' => 'activities',
  'module' => 'Activities',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateTaskButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopScheduleMeetingButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopScheduleCallButton',
    ),
    3 => 
    array (
      'widget_class' => 'SubPanelTopComposeEmailButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'fits_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'fits_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'fits_activities_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);
$layout_defs["FITs"]["subpanel_setup"]["history"] = array (
  'order' => 20,
  'sort_order' => 'desc',
  'sort_by' => 'date_modified',
  'title_key' => 'LBL_HISTORY',
  'type' => 'collection',
  'subpanel_name' => 'history',
  'module' => 'History',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateNoteButton',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopArchiveEmailButton',
    ),
    2 => 
    array (
      'widget_class' => 'SubPanelTopSummaryButton',
    ),
  ),
  'collection_list' => 
  array (
    'meetings' => 
    array (
      'module' => 'Meetings',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'fits_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'fits_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'fits_activities_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'fits_activities_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'fits_activities_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);


// created: 2011-08-31 11:31:09
$layout_defs["FITs"]["subpanel_setup"]["fits_airlinestickets"] = array (
  'order' => 100,
  'module' => 'AirlinesTickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
  'get_subpanel_data' => 'fits_airlinestickets',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-08-19 10:30:15
$layout_defs["FITs"]["subpanel_setup"]["fits_billing"] = array (
  'order' => 100,
  'module' => 'Billing',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_BILLING_FROM_BILLING_TITLE',
  'get_subpanel_data' => 'fits_billing',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-11-11 22:50:07
$layout_defs["FITs"]["subpanel_setup"]["fits_cases"] = array (
  'order' => 100,
  'module' => 'Cases',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_CASES_FROM_CASES_TITLE',
  'get_subpanel_data' => 'fits_cases',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-11-21 16:43:46
$layout_defs["FITs"]["subpanel_setup"]["fits_commentairlines"] = array (
  'order' => 100,
  'module' => 'CommentAirlines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_COMMENTAIRLINES_FROM_COMMENTAIRLINES_TITLE',
  'get_subpanel_data' => 'fits_commentairlines',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-10-18 14:57:37
$layout_defs["FITs"]["subpanel_setup"]["fits_comments"] = array (
  'order' => 100,
  'module' => 'Comments',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_COMMENTS_FROM_COMMENTS_TITLE',
  'get_subpanel_data' => 'fits_comments',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-11-01 12:41:34
$layout_defs["FITs"]["subpanel_setup"]["fits_contracts"] = array (
  'order' => 100,
  'module' => 'Contracts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_CONTRACTS_FROM_CONTRACTS_TITLE',
  'get_subpanel_data' => 'fits_contracts',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-08-22 10:36:35
$layout_defs["FITs"]["subpanel_setup"]["fits_fitsfbaacitsfits_ida"] = array (
  'order' => 100,
  'module' => 'FITs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_FITS_FROM_FITS_R_TITLE',
  'get_subpanel_data' => 'fits_fitsfbaacitsfits_ida',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-09-05 10:45:41
$layout_defs["FITs"]["subpanel_setup"]["fits_groupprograms"] = array (
  'order' => 100,
  'module' => 'GroupPrograms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
  'get_subpanel_data' => 'fits_groupprograms',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);

unset($layout_defs["FITs"]["subpanel_setup"]["fits_groupprograms"]['top_buttons'][0]);

// created: 2011-10-26 00:43:22
$layout_defs["FITs"]["subpanel_setup"]["fits_oders"] = array (
  'order' => 100,
  'module' => 'Oders',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_ODERS_FROM_ODERS_TITLE',
  'get_subpanel_data' => 'fits_oders',
  'top_buttons' => 
  array (
    /* Fix issue 1169
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),*/
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-11-15 12:48:00
$layout_defs["FITs"]["subpanel_setup"]["fits_orders"] = array (
  'order' => 100,
  'module' => 'Orders',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_ORDERS_FROM_ORDERS_TITLE',
  'get_subpanel_data' => 'fits_orders',
  'top_buttons' => 
  array (
    /* Fix issue 1169
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),*/
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-08-19 15:05:02
$layout_defs["FITs"]["subpanel_setup"]["fits_passports"] = array (
  'order' => 100,
  'module' => 'Passports',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_PASSPORTS_FROM_PASSPORTS_TITLE',
  'get_subpanel_data' => 'fits_passports',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-09-20 09:12:33
$layout_defs["FITs"]["subpanel_setup"]["fits_quotes"] = array (
  'order' => 100,
  'module' => 'Quotes',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_QUOTES_FROM_QUOTES_TITLE',
  'get_subpanel_data' => 'fits_quotes',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-08-19 10:28:21
$layout_defs["FITs"]["subpanel_setup"]["fits_tours"] = array (
  'order' => 100,
  'module' => 'Tours',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FITS_TOURS_FROM_TOURS_TITLE',
  'get_subpanel_data' => 'fits_tours',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


// created: 2011-10-17 11:39:26
$layout_defs["FITs"]["subpanel_setup"]["groupprograms_fits"] = array (
  'order' => 100,
  'module' => 'GroupPrograms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_GROUPPROGRAMS_FITS_FROM_GROUPPROGRAMS_TITLE',
  'get_subpanel_data' => 'groupprograms_fits',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);

unset($layout_defs["FITs"]["subpanel_setup"]["groupprograms_fits"]['top_buttons'][0]);

  unset($layout_defs['FITs']['subpanel_setup']['fits_airlinestickets']);
  unset($layout_defs['FITs']['subpanel_setup']['fits_groupprograms']);
  unset($layout_defs['FITs']['subpanel_setup']['fits_oders']);//fix bug 1067



// created: 2011-08-08 11:54:02
$layout_defs["FITs"]["subpanel_setup"]["tours_fits"] = array (
  'order' => 100,
  'module' => 'Tours',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_FITS_FROM_TOURS_TITLE',
  'get_subpanel_data' => 'tours_fits',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


//auto-generated file DO NOT EDIT
$layout_defs['FITs']['subpanel_setup']['fits_cases']['override_subpanel_name'] = 'FITs_subpanel_fits_cases';


//auto-generated file DO NOT EDIT
$layout_defs['FITs']['subpanel_setup']['fits_contracts']['override_subpanel_name'] = 'FITs_subpanel_fits_contracts';


//auto-generated file DO NOT EDIT
$layout_defs['FITs']['subpanel_setup']['fits_fitsfbaacitsfits_ida']['override_subpanel_name'] = 'FITs_subpanel_fits_fitsfbaacitsfits_ida';


//auto-generated file DO NOT EDIT
$layout_defs['FITs']['subpanel_setup']['fits_groupprograms']['override_subpanel_name'] = 'FITs_subpanel_fits_groupprograms';


//auto-generated file DO NOT EDIT
$layout_defs['FITs']['subpanel_setup']['fits_orders']['override_subpanel_name'] = 'FITs_subpanel_fits_orders';


//auto-generated file DO NOT EDIT
$layout_defs['FITs']['subpanel_setup']['fits_passports']['override_subpanel_name'] = 'FITs_subpanel_fits_passports';


//auto-generated file DO NOT EDIT
$layout_defs['FITs']['subpanel_setup']['fits_quotes']['override_subpanel_name'] = 'FITs_subpanel_fits_quotes';

?>