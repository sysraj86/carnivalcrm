<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


$mod_strings = array (
  'LBL_MODULE_NAME'=>'EKalenteri',
  'LBL_MODULE_TITLE'=>'EKalenteri',
  'LNK_NEW_CALL' => 'Luo puhelu',
  'LNK_NEW_MEETING' => 'Luo tapaaminen',
  'LNK_NEW_APPOINTMENT' => 'Luo tapaaminen2',
  'LNK_NEW_TASK' => 'Luo tehtävä',
  'LNK_CALL_LIST' => 'Puhelut',
  'LNK_MEETING_LIST' => 'Tapaamiset',
  'LNK_TASK_LIST' => 'Tehtävät',
  'LNK_VIEW_CALENDAR' => 'Tänään',
  'LNK_IMPORT_CALLS'=>'Tuo puhelut',
  'LNK_IMPORT_MEETINGS'=>'Tuo tapaamiset',
  'LNK_IMPORT_TASKS'=>'Tuo tehtävät',
  'LBL_MONTH' => 'Kuukausi',
  'LBL_DAY' => 'Päivä',
  'LBL_YEAR' => 'Vuosi',
  'LBL_WEEK' => 'Viikko',
  'LBL_PREVIOUS_MONTH' => 'Edellinen kuukausi',
  'LBL_PREVIOUS_DAY' => 'Edellinen päivä',
  'LBL_PREVIOUS_YEAR' => 'Edellinen vuosi',
  'LBL_PREVIOUS_WEEK' => 'Edellinen viikko',
  'LBL_NEXT_MONTH' => 'Seuraava kuukausi',
  'LBL_NEXT_DAY' => 'Seuraava päivä',
  'LBL_NEXT_YEAR' => 'Seuraava vuosi',
  'LBL_NEXT_WEEK' => 'Seuraava viikko',
  'LBL_AM' => 'AM',
  'LBL_PM' => 'PM',
  'LBL_SCHEDULED' => 'Ajastettu',
  'LBL_BUSY' => 'Kiireinen',
  'LBL_CONFLICT' => 'Ristiriita',
  'LBL_USER_CALENDARS' => 'Käyttäjän kalenterit',
  'LBL_SHARED' => 'Jaettu',
  'LBL_PREVIOUS_SHARED' => 'Edellinen',
  'LBL_NEXT_SHARED' => 'Seuraava',
  'LBL_SHARED_CAL_TITLE' => 'Jaettu kalenteri',
  'LBL_USERS' => 'Käyttäjä',
  'LBL_REFRESH' => 'Päivitä',
  'LBL_EDIT' => 'Muokkaa',
  'LBL_SELECT_USERS' => 'Valitse käyttäjät, joiden kalenteri esitetään',
  'LBL_FILTER_BY_TEAM' => 'Näytä käyttäjälista tiimin mukaan:',
  'LBL_ASSIGNED_TO_NAME' => 'Vastuuhenkilö',
  'LBL_DATE' => 'Aloituspäivä ja -aika',



//other
  'LBL_YES' => 'Kyllä',
  'LBL_NO' => 'Ei',
  'LBL_SETTINGS' => 'Asetukset',
  'LBL_CREATE_NEW_RECORD' => 'Luo uusi tietue',
  'LBL_LOADING' => 'Ladataan.........',
  'LBL_EDIT_RECORD' => 'Muokkaa tietuetta',
  'LBL_ERROR_SAVING' => 'Virhe tallennettaessa',
  'LBL_ERROR_LOADING' => 'Virhe ladattaessa',
  'LBL_ANOTHER_BROWSER' => 'Yritä toista selainta lisätäksesi tiimejä.',
  'LBL_FIRST_TEAM' => 'Et voi poistaa ensimmäistä nimikettä.',
  'LBL_REMOVE_PARTICIPANTS' => 'Et voi poistaa kaikkia osallistujia.',

//info box
'LBL_I_DESC'=>'Kuvaus',
'LBL_I_START_DT'=>'Aloituspäivä ja -aika',
'LBL_I_DURATION'=>'Kesto',
'LBL_I_TITLE'=>'Lisätiedot',
'LBL_I_NAME'=>'Nimi',

//recurrence tab
'LBL_REPEAT_END_DATE'=>'End Date',
'LBL_REPEAT_INTERVAL'=>'Repeat Interval',
'LBL_REPEAT_TYPE'=>'Repeat Type',
'LBL_REPEAT_DAYS'=>'Repeat Days',

//genaral tab
'LBL_WHOLE_DAY'=>'Koko päivä',

//validation msg
'LBL_NO_USER'=>'Ei löydetty kentälle: vastuuhenkilö',
'LBL_SUBJECT'=>'Aihe',
'LBL_DURATION'=>'Kesto',
'LBL_STATUS'=>'Tila',
'LBL_DATE_TIME'=>'Päiväys ja aika',

//settings box
'LBL_SETTINGS_WEEK_STARTS'=>'Viikon ensimmäinen päivä', 
'LBL_SETTINGS_TIME_STARTS'=>'Aloitusaika', 
'LBL_SETTINGS_TIME_ENDS'=>'Lopetusaika', 
'LBL_SETTINGS_TASKS_SHOW'=>'Näytä tehtävät', 
'LBL_SETTINGS_TITLE'=>'Asetukset',

//buttons
'LBL_SAVE_BUTTON'=>'Tallenna',
'LBL_DELETE_BUTTON'=>'Poista',
'LBL_APPLY_BUTTON'=>'Käytä',
'LBL_CANCEL_BUTTON'=>'Peru',
'LBL_CLOSE_BUTTON'=>'Sulje',

//tabs
'LBL_GENERAL_TAB'=>'Yleinen',
'LBL_PARTICIPANTS_TAB' =>'Osallistujat',
'LBL_RECURENCE_TAB' =>'Toistuvuus',

'repeat_types' => array(
	''	=>	'ei mitään',
	'Daily'	=>	'päivittäin',
	'Weekly' =>	'viikottain',
	'Monthly' =>	'kuukausi',
	'Yearly' =>	'Vuosittain',
),
  
);

$mod_list_strings = array(
'dom_cal_weekdays'=>array(
"Su",
"Ma",
"Ti",
"Ke",
"To",
"Pe",
"La",
),
'dom_cal_weekdays_long'=>array(
"Sunnuntai",
"Maanantai",
"Tiistai",
"Keskiviikko",
"Torstai",
"Perjantai",
"Lautantai",
),
'dom_cal_month'=>array(
"",
"Tammi",
"Helmi",
"Maalis",
"Huhti",
"Touko",
"Kesä",
"Heinä",
"Elo",
"Syys",
"Loka",
"Marras",
"Joulu",
),
'dom_cal_month_long'=>array(
"",
"Tammikuu",
"Helmikuu",
"Maaliskuu",
"Huhtikuu",
"Toukokuu",
"Kesäkuu",
"Heinäkuu",
"Elokuu",
"Syyskuu",
"Lokakuu",
"Marraskuu",
"Joulukuu",
)
);
?>
