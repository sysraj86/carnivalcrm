<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2011-08-08 10:22:17
$layout_defs["Tours"]["subpanel_setup"]["tours_accounts"] = array (
  'order' => 100,
  'module' => 'Accounts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
  'get_subpanel_data' => 'tours_accounts',
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


// created: 2011-08-19 10:40:14
$layout_defs["Tours"]["subpanel_setup"]["activities"] = array (
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
      'get_subpanel_data' => 'tours_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'tours_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForActivities',
      'get_subpanel_data' => 'tours_activities_calls',
    ),
  ),
  'get_subpanel_data' => 'activities',
);
$layout_defs["Tours"]["subpanel_setup"]["history"] = array (
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
      'get_subpanel_data' => 'tours_activities_meetings',
    ),
    'tasks' => 
    array (
      'module' => 'Tasks',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'tours_activities_tasks',
    ),
    'calls' => 
    array (
      'module' => 'Calls',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'tours_activities_calls',
    ),
    'notes' => 
    array (
      'module' => 'Notes',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'tours_activities_notes',
    ),
    'emails' => 
    array (
      'module' => 'Emails',
      'subpanel_name' => 'ForHistory',
      'get_subpanel_data' => 'tours_activities_emails',
    ),
  ),
  'get_subpanel_data' => 'history',
);


// created: 2012-03-14 15:47:46
$layout_defs["Tours"]["subpanel_setup"]["tours_airlinestickets_1"] = array (
  'order' => 100,
  'module' => 'AirlinesTickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_AIRLINESTICKETS_1_FROM_AIRLINESTICKETS_TITLE',
  'get_subpanel_data' => 'tours_airlinestickets_1',
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


// created: 2011-12-20 09:20:56
$layout_defs["Tours"]["subpanel_setup"]["tours_airlinestickets"] = array (
  'order' => 100,
  'module' => 'AirlinesTickets',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_AIRLINESTICKETS_FROM_AIRLINESTICKETS_TITLE',
  'get_subpanel_data' => 'tours_airlinestickets',
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


// created: 2011-08-19 10:46:04
$layout_defs["Tours"]["subpanel_setup"]["tours_airlines"] = array (
  'order' => 100,
  'module' => 'Airlines',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_AIRLINES_FROM_AIRLINES_TITLE',
  'get_subpanel_data' => 'tours_airlines',
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


// created: 2011-08-19 10:47:02
$layout_defs["Tours"]["subpanel_setup"]["tours_billing"] = array (
  'order' => 100,
  'module' => 'Billing',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_BILLING_FROM_BILLING_TITLE',
  'get_subpanel_data' => 'tours_billing',
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


// created: 2011-12-21 08:48:30
$layout_defs["Tours"]["subpanel_setup"]["tours_cars"] = array (
  'order' => 100,
  'module' => 'Cars',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_CARS_FROM_CARS_TITLE',
  'get_subpanel_data' => 'tours_cars',
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


// created: 2012-09-28 12:06:16
$layout_defs["Tours"]["subpanel_setup"]["tours_contractappendixs"] = array (
  'order' => 100,
  'module' => 'ContractAppendixs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_CONTRACTAPPENDIXS_FROM_CONTRACTAPPENDIXS_TITLE',
  'get_subpanel_data' => 'tours_contractappendixs',
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


// created: 2011-08-05 11:50:06
$layout_defs["Tours"]["subpanel_setup"]["tours_contracts"] = array (
  'order' => 100,
  'module' => 'Contracts',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_CONTRACTS_FROM_CONTRACTS_TITLE',
  'get_subpanel_data' => 'tours_contracts',
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


// created: 2012-01-10 09:17:34
$layout_defs["Tours"]["subpanel_setup"]["tours_costguides"] = array (
  'order' => 100,
  'module' => 'CostGuides',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_COSTGUIDES_FROM_COSTGUIDES_TITLE',
  'get_subpanel_data' => 'tours_costguides',
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


// created: 2011-12-12 15:39:15
$layout_defs["Tours"]["subpanel_setup"]["tours_destinations"] = array (
  'order' => 100,
  'module' => 'Destinations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_DESTINATIONS_FROM_DESTINATIONS_TITLE',
  'get_subpanel_data' => 'tours_destinations',
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


// created: 2011-08-08 11:54:02
$layout_defs["Tours"]["subpanel_setup"]["tours_fits"] = array (
  'order' => 100,
  'module' => 'FITs',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_FITS_FROM_FITS_TITLE',
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


// created: 2011-08-05 11:51:56
$layout_defs["Tours"]["subpanel_setup"]["tours_groupprograms"] = array (
  'order' => 100,
  'module' => 'GroupPrograms',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_GROUPPROGRAMS_FROM_GROUPPROGRAMS_TITLE',
  'get_subpanel_data' => 'tours_groupprograms',
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


// created: 2011-12-21 08:44:32
$layout_defs["Tours"]["subpanel_setup"]["tours_hotels"] = array (
  'order' => 100,
  'module' => 'Hotels',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_HOTELS_FROM_HOTELS_TITLE',
  'get_subpanel_data' => 'tours_hotels',
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


// created: 2011-12-12 15:42:52
$layout_defs["Tours"]["subpanel_setup"]["tours_locations"] = array (
  'order' => 100,
  'module' => 'Locations',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_LOCATIONS_FROM_LOCATIONS_TITLE',
  'get_subpanel_data' => 'tours_locations',
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


// created: 2011-08-19 10:41:51
$layout_defs["Tours"]["subpanel_setup"]["tours_oders"] = array (
  'order' => 100,
  'module' => 'Oders',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_ODERS_FROM_ODERS_TITLE',
  'get_subpanel_data' => 'tours_oders',
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


// created: 2011-12-21 08:47:00
$layout_defs["Tours"]["subpanel_setup"]["tours_restaurants"] = array (
  'order' => 100,
  'module' => 'Restaurants',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_RESTAURANTS_FROM_RESTAURANTS_TITLE',
  'get_subpanel_data' => 'tours_restaurants',
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


// created: 2011-12-06 08:51:25
$layout_defs["Tours"]["subpanel_setup"]["tours_services"] = array (
  'order' => 100,
  'module' => 'Services',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_TOURS_SERVICES_FROM_SERVICES_TITLE',
  'get_subpanel_data' => 'tours_services',
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
$layout_defs['Tours']['subpanel_setup']['tours_airlines']['override_subpanel_name'] = 'Tour_subpanel_tours_airlines';


//auto-generated file DO NOT EDIT
$layout_defs['Tours']['subpanel_setup']['tours_airlinestickets']['override_subpanel_name'] = 'Tour_subpanel_tours_airlinestickets';


//auto-generated file DO NOT EDIT
$layout_defs['Tours']['subpanel_setup']['tours_cars']['override_subpanel_name'] = 'Tour_subpanel_tours_cars';


//auto-generated file DO NOT EDIT
$layout_defs['Tours']['subpanel_setup']['tours_costguides']['override_subpanel_name'] = 'Tour_subpanel_tours_costguides';


//auto-generated file DO NOT EDIT
$layout_defs['Tours']['subpanel_setup']['tours_destinations']['override_subpanel_name'] = 'Tour_subpanel_tours_destinations';


//auto-generated file DO NOT EDIT
$layout_defs['Tours']['subpanel_setup']['tours_hotels']['override_subpanel_name'] = 'Tour_subpanel_tours_hotels';


//auto-generated file DO NOT EDIT
$layout_defs['Tours']['subpanel_setup']['tours_locations']['override_subpanel_name'] = 'Tour_subpanel_tours_locations';


//auto-generated file DO NOT EDIT
$layout_defs['Tours']['subpanel_setup']['tours_restaurants']['override_subpanel_name'] = 'Tour_subpanel_tours_restaurants';


//auto-generated file DO NOT EDIT
$layout_defs['Tours']['subpanel_setup']['tours_services']['override_subpanel_name'] = 'Tour_subpanel_tours_services';

?>