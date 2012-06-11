<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$mod_strings = array (
'LBL_MODULE_NAME' => 'Е-Календарь' ,
'LBL_MODULE_TITLE' => 'Е-Календарь' ,
'LNK_NEW_CALL' => 'Назначить звонок' ,
'LNK_NEW_MEETING' => 'Назначить встречу' ,
'LNK_NEW_APPOINTMENT' => 'Назначить встречу/звонок' ,
'LNK_NEW_TASK' => 'Создать задачу' ,
'LNK_CALL_LIST' => 'Звонки' ,
'LNK_MEETING_LIST' => 'Встречи' ,
'LNK_TASK_LIST' => 'Задачи' ,
'LNK_VIEW_CALENDAR' => 'Сегодня' ,
'LNK_IMPORT_CALLS'=>'Импорт звонков',
'LNK_IMPORT_MEETINGS'=>'Импорт встреч',
'LNK_IMPORT_TASKS'=>'Импорт задач',
'LBL_MONTH' => 'Месяц' ,
'LBL_DAY' => 'День' ,
'LBL_YEAR' => 'Год' ,
'LBL_WEEK' => 'Неделя' ,
'LBL_PREVIOUS_MONTH' => 'Предыдущий месяц' ,
'LBL_PREVIOUS_DAY' => 'Предыдущий день' ,
'LBL_PREVIOUS_YEAR' => 'Предыдущий год' ,
'LBL_PREVIOUS_WEEK' => 'Предыдущая неделя' ,
'LBL_NEXT_MONTH' => 'Следующий месяц' ,
'LBL_NEXT_DAY' => 'Следующий день' ,
'LBL_NEXT_YEAR' => 'Следующий год' ,
'LBL_NEXT_WEEK' => 'Следующая неделя' ,
'LBL_AM' => 'AM',
'LBL_PM' => 'PM',
'LBL_SCHEDULED' => 'Запланировано' ,
'LBL_BUSY' => 'Занято' ,
'LBL_CONFLICT' => 'Конфликт' ,
'LBL_USER_CALENDARS' => 'Пользовательские календари' ,
'LBL_SHARED' => 'Сводный' ,
'LBL_PREVIOUS_SHARED' => 'Пред.' ,
'LBL_NEXT_SHARED' => 'След.' ,
'LBL_SHARED_CAL_TITLE' => 'Сводный календарь' ,
'LBL_USERS' => 'Пользователь' ,
'LBL_REFRESH' => 'Обновить' ,
'LBL_EDIT' => 'Править' ,
'LBL_SELECT_USERS' => 'Выбор пользователей для просмотра календаря' ,
'LBL_FILTER_BY_TEAM' => 'Фильтрация списка пользователей по группам:' ,
'LBL_ASSIGNED_TO_NAME' => 'Ответственный(ая)',
'LBL_DATE' => 'Начальные дата и время',

//''=>'',
//info box
'LBL_I_DESC'=>'Описание',//'Description',
'LBL_I_START_DT'=>'Начало',//'Start Date Time',
'LBL_I_DURATION'=>'Продолжительность',//'Duration',
'LBL_I_TITLE'=>'Дополнительная информация',//'Additional Details',
'LBL_I_NAME'=>'Название',//'Name',

//recurrence tab
'LBL_REPEAT_END_DATE'=>'Дата окончания',//'End Date',
'LBL_REPEAT_INTERVAL'=>'Интервал повторов',//'Repeat Interval',
'LBL_REPEAT_TYPE'=>'Тип повторов',//'Repeat Type',
'LBL_REPEAT_DAYS'=>'Дни повторов',//'Repeat Days',

//genaral tab
'LBL_WHOLE_DAY'=>'Целый день',

//validation msg
'LBL_NO_USER'=>'Нет совпадений для поля: Ответственный(ая)',//No match for field: Assigned to
'LBL_SUBJECT'=>'Тема',
'LBL_DURATION'=>'Продолжительность',
'LBL_STATUS'=>'Статус',
'LBL_DATE_TIME'=>'Дата и Время',

//--
'LBL_YES' => 'Да',
'LBL_NO' => 'Нет',
'LBL_SETTINGS' => 'Настройки календаря',
'LBL_CREATE_NEW_RECORD' => 'Создать новую запись',
'LBL_LOADING' => 'Загрузка.........',
'LBL_EDIT_RECORD' => 'Изменить запись',
'LBL_ERROR_SAVING' => 'Ошибка при сохранении',
'LBL_ERROR_LOADING' => 'Ошибка при загрузке',
'LBL_ANOTHER_BROWSER' => 'Данный браузер не поддерживает нужных функций',
'LBL_FIRST_TEAM' => 'Извените. Нельза удалить первый елемент последовательности',
'LBL_REMOVE_PARTICIPANTS' => 'Вы не можете удалить всех учасников',

//settings box
'LBL_SETTINGS_WEEK_STARTS'=>'Первый день недели:', 
'LBL_SETTINGS_TIME_STARTS'=>'Время начала', 
'LBL_SETTINGS_TIME_ENDS'=>'Время окончания:', 
'LBL_SETTINGS_TASKS_SHOW'=>'Показывать Задачи:', 
'LBL_SETTINGS_TITLE'=>'Настройки:',
'LBL_SETTINGS_RECURRENCE'=>'Повторы:',

//buttons
'LBL_SAVE_BUTTON'=>'Сохранить',
'LBL_DELETE_BUTTON'=>'Удалить',
'LBL_APPLY_BUTTON'=>'Приминить',
'LBL_CANCEL_BUTTON'=>'Отменить',
'LBL_CLOSE_BUTTON'=>'Закрыть',

//tabs
'LBL_GENERAL_TAB'=>'Основное',
'LBL_PARTICIPANTS_TAB' =>'Учасники',
'LBL_RECURENCE_TAB' =>'Повторы',


	'repeat_types' => array(
		''	=>	'Нет',
		'Daily'	=>	'Ежедневно',
		'Weekly' =>	'Еженедельно',
		'Monthly' =>	'Ежемесячно',
		'Yearly' =>	'Ежегодно',
	),


);


$mod_list_strings = array (

  'dom_cal_weekdays' => array (
      'Вс' ,
      'Пн' ,
      'Вт' ,
      'Ср' ,
      'Чт' ,
      'Пт' ,
      'Сб' ,
       ),
   'dom_cal_weekdays_long' => array (
      'Воскресенье' ,
      'Понедельник' ,
      'Вторник' ,
      'Среда' ,
      'Четверг' ,
      'Пятница' ,
      'Суббота' ,
        ),
      
   'dom_cal_month' => array (
      '' ,
      'Янв' ,
      'Фев' ,
      'Мар' ,
      'Апр' ,
      'Май' ,
      'Июн' ,
      'Июл' ,
      'Авг' ,
      'Сен' ,
      'Окт' ,
      'Ноя' ,
      'Дек' ,
        ),
   'dom_cal_month_long' => array (
      '' ,
      'Январь' ,
      'Февраль' ,
      'Март' ,
      'Апрель' ,
      'Май' ,
      'Июнь' ,
      'Июль' ,
      'Август' ,
      'Сентябрь' ,
      'Октябрь' ,
      'Ноябрь' ,
      'Декабрь' ,
        )

      );

?>
