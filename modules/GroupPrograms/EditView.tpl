{literal}
<link href="modules/GroupPrograms/datecss.css" media="all" rel="stylesheet" type="text/css">
<script type="text/javascript" src="custom/include/js/jquery.js"></script>
<script type="text/javascript" src="custom/include/js/jquery.table.clone.js"></script>
<script type="text/javascript" src="custom/include/js/jquery-ui-DateFormat.js"></script>
<script type="text/javascript">

        $(function(){
    $('.datetime').datepicker("destroy");
    $('.datetime').datepicker({showOn: 'button', buttonImage: 'themes/default/images/jscalendar.gif', buttonImageOnly: true,dateFormat: 'dd/mm/yy',yearRange:'-50,+20'});

    /*Calendar.setup ({ {/literal} inputField : 'date1', ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : 'start_date_trigger1', singleClick : true, step : 1 {literal}});addToValidate('EditView', 'expiration', 'date', false,'expiration'  );
   //$('.btnAddRow').click(function(){
        var count = $('#table_clone').find(" tbody > tr").length;
          for(i =1 ; i<=count; i++){
            //alert(i);
              Calendar.setup ({ {/literal} inputField : 'date'+i, ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : 'start_date_trigger'+i, singleClick : true, step : 1 {literal}});addToValidate('EditView', 'expiration', 'date', false,'expiration'  );
          } 
   });*/

    $('.service').click(function() {
        i = this.id.substring(this.id.length - 1, this.id.length);
        //alert(i);
        open_popup($('#parent' + i).val(), 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"parent_id" + i, "name": "parent_name" + i,"tel": "tel" + i, "fax":"fax" + i,"address":"address" + i }}, "single", true);
    });

    $(".contact").click(function() {
        i = this.id.substring(this.id.length - 1, this.id.length);
        open_popup("Contacts", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "contact_id" + i, "name":"contact_name" + i, "phone_mobile":"contact_phone" + i }}, "single", true);
    });

    $(".pick_up_car").click(function() {
        i = this.id.substring(this.id.length - 1, this.id.length);
        open_popup("Cars", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "pick_up_car_id" + i, "name":"driver" + i, "phone": "driver_phone" + i, "number_plates":"number_plates" + i}}, "single", true);
    });
    $(".guide").click(function() {
        i = this.id.substring(this.id.length - 1, this.id.length);
        open_popup("TravelGuides", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "guide_id" + i, "name":"guide_name" + i, "phone": "guide_phone" + i}}, "single", true);
    });


    $(".leader").click(function() {
        i = this.id.substring(this.id.length - 1, this.id.length);
        open_popup("TravelGuides", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "leader_id" + i, "name":"team_leader" + i, "phone": "leader_phone" + i}}, "single", true);
    });
    $(".foodmenu").click(function() {
        i = this.id.substring(this.id.length - 1, this.id.length);
        open_popup("FoodMenu", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id":"content_id" + i,"description":"content" + i }}, "single", true);
    });


    $('.sightseeing_btn').click(function() {
        i = this.id.substring(this.id.length - 1, this.id.length);
        open_popup("Cars", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "sightseeing_id" + i, "name":"driver_sight" + i, "phone": "driver_phone_sight" + i, "number_plates":"number_plates_sight" + i}}, "single", true);
    });

    $('.parent').change(function() {
        i = this.id.substring(this.id.length - 1, this.id.length);
       /* $('#parent_name' + i).val("");
        $('#parent_id' + i).val("");
        $('#tel' + i).val("");
        $('#fax' + i).val("");
        $('#address' + i).val("");*/
        //parent_namechangeQS($(this));
        //onchange="document.EditView.parent_name.value='';document.EditView.parent_id.value='';parent_namechangeQS();
        checkParentType($('#parent' + i).val(), $('#btn_parent_name' + i));// document.EditView.btn_parent_name);"
        //alert($('#btn_parent_name'+i));

    });

    $('.checkhidden').click(function() {
        if ($(this).is(':checked')) {
            $(this).closest("tr").find(".phidden").show();
        }
        else {
            $(this).closest("tr").find(".phidden").hide();
        }
    });
});

function parent_namechangeQS(parent_name) {
    new_module = parent_name.val();
    debugger;
    if (typeof(disabledModules[new_module]) != 'undefined') {
        sqs_objects["EditView_parent_name"]["disable"] = true;
        parent_name.attr('readOnly',true);
    } else {
        sqs_objects["EditView_parent_name"]["disable"] = false;
        parent_name.attr('readOnly',false);
    }
    sqs_objects["EditView_parent_name"]["modules"] = new Array(new_module);
    if (typeof QSProcessedFieldsArray != 'undefined') {
        QSProcessedFieldsArray["EditView_parent_name"] = false;
    }
    enableQS(false);
}
</script>
{/literal}

<form action="index.php" name="EditView" id="EditView" method="post">
<input type="hidden" name="module" value="GroupPrograms"/>
<input type="hidden" name="record" value="{$ID}"/>
<input type="hidden" name="action"/>
<input type="hidden" name="return_module" value="{$RETURN_MODULE}"/>
<input type="hidden" name="return_id" value="{$RETURN_ID}"/>
<input type="hidden" name="return_action" value="{$RETURN_ACTION}"/>
<input type="hidden" name="pick_up_car_count" value="{$PICK_UP_CAR_COUNT}"/>
<input type="hidden" name="sightseeing_car_count" value="{$SIGHTSEEING_CAR_COUNT}"/>
<input type="hidden" name="groupprogram_line_count" value="{$GROUPPROGRAM_LINE_COUNT}"/>

<div>
    <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button"
           onclick="this.form.action.value='Save';return check_form('EditView');"
           type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  ">
    <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button"
           onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'"
           type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
{if $ID neq ''}
    <input title="View Change Log" class="button"
           onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=GroupPrograms", true, false, {$view_change_log} ); return false;'
           type="submit" value="View Change Log">
{/if}  </div>

<fieldset>
    <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">
        <legend><h1>Overview Information</h1></legend>
        <tr>
            <td class="dataLabel">{$MOD.LBL_CODE}<span class="required">*</span></td>
            <td class="dataField"><span sugar='slot'><input type="text" size="50" id="groupprogram_code"
                                                            name="groupprogram_code"
                                                            value="{$CODE}" </span sugar='slot'></td>
        </tr>
        <!--<tr>
        <td class="dataLabel">{$MOD.LBL_STATUS}</td>
        <td class="dataField"><select name="status" id="status">{$STATUS_DOM}</select><input type="text" id="notes" name="notes" value="{$NOTE}" size="28"/></td>
     </tr>  -->
        <tr>
            <td class="dataLabel">{$MOD.LBL_GROUP_NAME} <span class="required">*</span></td>
            <td class="dataField">
                <input readonly="true" type="text" name="grouplists_pprograms_name" id="grouplists_pprograms_name" size="50"
                       value="{$GITS}"/>
                <input type="hidden" name="grouplists87eduplists_ida" id="grouplists87eduplists_ida" value="{$GIT_ID}"/>
                <button title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                        tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group"
                        id="bnt_tour_name_group"
                        onclick='open_popup("GroupLists", 600, 400, "", true, false, {$gits_popup_request_data}, "single", true);'>
                    <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055"
                         alt=""></button>
                <button title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                        tabindex='3' class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                        onclick='this.form.grouplists_pprograms_name.value="";this.form.grouplists87eduplists_ida.value="";'>
                    <img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591"
                         alt=""></button>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_TOUR_NAME}<span class="required">*</span></td>
            <td class="dataField">
                <input class="sqsEnabled" name="tour_name" id="tour_name" size="50" type="text" value="{$TOUR_NAME}"/>
                <input type="hidden" id="tour_id" name="tour_id" value="{$TOUR_ID}"/>
                <button title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                        tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_tour_name_group"
                        id="bnt_tour_name_group"
                        onclick='open_popup("Tours", 600, 400, "", true, false, {$tour_popup_request_data}, "single", true);'>
                    <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055"
                         alt=""></button>
                <button title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                        tabindex='3' class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                        onclick='this.form.tour_name.value="";this.form.tour_id.value="";this.form.tour_code.value="";'>
                    <img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591"
                         alt=""></button>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_TOURCODE}</td>
            <td class="dataField"><input readonly="true" class="sqsEnabled" name="tour_code" id="tour_code" size="50" type="text"
                                         value="{$TOUR_CODE}"/></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_TIME}</td>
            <td class="dataField">
            {$MOD.LBL_START_DATE}
                <input class="datetime" type="text" size="11" id="start_date_group" name="start_date_group"
                       value="{$START_DATE_GROUP}" onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"/>&nbsp;-&nbsp;
            {$MOD.LBL_END_DATE}
                <input class="datetime" type="text" size="11" id="end_date_group" name="end_date_group"
                       value="{$END_DATE_GROUP}" onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');"/>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">Num of date</td>
            <td class="dataField"><input type="text" name="numofdate" id="numofdate" value="{$NUM_OF_DATE}"/></td>
        </tr>
        <tr>
            <td class="dataLabel">Num of night</td>
            <td class="dataField"><input type="text" name="numofnight" id="numofnight" value="{$NUM_OF_NIGHT}"/></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_WORKSHEET}</td>
            <td class="dataField">
                <input readonly="true" type="text" name="groupprograorksheets_name" id="groupprograorksheets_name" value="{$WORKSHEET}"
                       size="50"/>
                <input type="hidden" id="groupprogr53b5ksheets_idb" name="groupprogr53b5ksheets_idb"
                       value="{$WORKSHEET_ID}"/>
                <button title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                        tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_worksheet"
                        id="bnt_worksheet"
                        onclick='open_popup("Worksheets", 600, 400, "", true, false, {$worksheet_popup_request_data}, "single", true);'>
                    <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055"
                         alt=""></button>
                <button title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                        tabindex='3' class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                        onclick='this.form.groupprograorksheets_name.value="";this.form.groupprogr53b5ksheets_idb.value="";'>
                    <img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591"
                         alt=""></button>

            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_INSURANCE}</td>
            <td class="dataField">
                <input type="text" name="groupprogransurances_name" id="groupprogransurances_name" value="{$INSURANCE}"
                       size="50"/>
                <input type="hidden" id="groupprogr5003urances_idb" name="groupprogr5003urances_idb"
                       value="{$INSURANCE_ID}"/>
                <button title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                        tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_insurance"
                        id="bnt_insurance"
                        onclick='open_popup("Insurances", 600, 400, "", true, false, {$insurance_popup_request_data}, "single", true);'>
                    <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055"
                         alt=""></button>
                <button title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                        tabindex='3' class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                        onclick='this.form.groupprogransurances_name.value="";this.form.groupprogr5003urances_idb.value="";'>
                    <img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591"
                         alt=""></button>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_PASSPORT}</td>
            <td class="dataField">
                <input type="text" name="groupprograsportlist_name" id="groupprograsportlist_name" value="{$PASSPORT}"
                       size="50"/>
                <input type="hidden" id="groupprogrc66dortlist_idb" name="groupprogrc66dortlist_idb"
                       value="{$PASSPORT_ID}"/>
                <button title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                        tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_passport"
                        id="bnt_passport"
                        onclick='open_popup("PassportList", 600, 400, "", true, false, {$passport_popup_request_data}, "single", true);'>
                    <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055"
                         alt=""></button>
                <button title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                        tabindex='3' class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                        onclick='this.form.groupprograsportlist_name.value="";this.form.groupprogrc66dortlist_idb.value="";'>
                    <img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591"
                         alt=""></button>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_AIRLINE_TICKET}</td>
            <td class="dataField">
                <input type="text" name="groupprograketslists_name" id="groupprograketslists_name" value="{$TICKET}"
                       size="50"/>
                <input type="hidden" id="groupprogr60cctslists_idb" name="groupprogr60cctslists_idb"
                       value="{$TICKET_ID}"/>
                <button title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                        tabindex='2' class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_airlines_tickets"
                        id="bnt_airlines_tickets"
                        onclick='open_popup("AirlinesTicketsLists", 600, 400, "", true, false, {$airlines_tickets_popup_request_data}, "single", true);'>
                    <img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055"
                         alt=""></button>
                <button title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                        tabindex='3' class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                        onclick='this.form.groupprograketslists_name.value="";this.form.groupprogr60cctslists_idb.value="";'>
                    <img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591"
                         alt=""></button>
            </td>
        </tr>

    </table>
</fieldset>

<fieldset>
    <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">
        <legend><h1>Guide & Operator</h1></legend>
        <tr>
            <td colspan="2">
                <table class="table_clone" id="leader" width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    {if $ID eq '' or $LEADER_COUNT eq 0}
                    <tr class="tabForm">
                        <td class="dataLabel" width="26.2%">{$MOD.LBL_TEAM_LEADER}</td>
                        <td class="dataField">
                            <input type="text" name="team_leader[]" id="team_leader" size="25" value=""/>
                            <input type="text" name="leader_phone[]" id="leader_phone" value=""/>
                            <input type="hidden" name="leader_id[]" id="leader_id" value=""/>
                            <input type="hidden" name="team_leader_id[]" id="team_leader_id" value=""/>
                            <input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"/>
                            <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}"
                                   type="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' class="button leader"
                                   name="btn_leader[]" id="btn_leader">


                            <input type="button" class="btnAddRow" value="Add Row"/>
                            <input type="button" class="btnDelRow" value="Delete Row"/>
                        </td>
                    </tr>
                        {else}
                        {$LEADER}
                    {/if}
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_PICK_UP}</td>
            <td class="dataField">
                <input class="sqsEnabled" name="guide_pick_up_at_airport" id="guide_pick_up_at_airport" size="25"
                       type="text" value="{$GUIDE_PICK_UP_AIRPORT}"/>
                <input type="text" name="pick_up_phone" name="pick_up_phone" value="{$PICK_UP_PHONE}"/>
                <input type="hidden" id="guide_pick_up_at_airport_id" name="guide_pick_up_at_airport_id"
                       value="{$GUIDE_PICK_UP_AT_AIRPORT_ID}"/>
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                       class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_pick_up_name"
                       id="bnt_pick_up_name"
                       onclick='open_popup("TravelGuides", 600, 400, "", true, false, {$pick_up_airport}, "single", true);'>
                <input title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                       class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                       onclick='this.form.guide_pick_up_at_airport.value="";this.form.pick_up_phone.value="";this.form.guide_pick_up_at_airport_id.value="";'>
            </td>
        </tr>
        <tr>

            <td colspan="2">
                <table class="table_clone" id="guide" width="100%" cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                    {if $ID eq '' or $GUIDE_COUNT eq 0}
                    <tr class="tabForm">
                        <td class="dataLabel" width="26.2%">{$MOD.LBL_GUIDE}</td>
                        <td class="dataField">
                            <input type="text" name="guide_name[]" id="guide_name" size="25" value=""/>
                            <input type="text" name="guide_phone[]" id="guide_phone" value=""/>
                            <input type="hidden" name="guide_id[]" id="guide_id" value=""/>
                            <input type="hidden" name="guide_record[]" id="guide_record" value=""/>
                            <input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"/>
                            <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}"
                                   type="button" class="button guide" value='{$APP.LBL_SELECT_BUTTON_LABEL}'
                                   name="btn_guide[]" id="btn_guide">


                            <input type="button" class="btnAddRow" value="Add Row"/>
                            <input type="button" class="btnDelRow" value="Delete Row"/>
                        </td>
                    </tr>
                    {/if}
                    {$GUIDE}
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_OPERATOR}</td>
            <td class="dataField">
                <input class="sqsEnabled" name="operator" id="operator" size="25" type="text" value="{$OPERATOR}"/>
                <input type="hidden" id="assigned_user_id" name="assigned_user_id" value="{$ASSIGNED_USER_ID}"/>
                <input type="text" name="operator_phone" id="operator_phone" value="{$OPERATOR_PHONE}"/>
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                       class="button" value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="bnt_operator_name"
                       id="bnt_operator_name"
                       onclick='open_popup("Users", 600, 400, "", true, false, {$operator_users}, "single", true);'>
                <input title="{$APP.LBL_CLEAR_BUTTON_TITLE}" accessKey="{$APP.LBL_CLEAR_BUTTON_KEY}" type="button"
                       class="button" value='{$APP.LBL_CLEAR_BUTTON_LABEL}' name="" id=""
                       onclick='this.form.operator.value="";this.form.operator_phone.value="";this.form.assigned_user_id.value="";'>
            </td>
        </tr>
    </table>
</fieldset>
<br/>

<fieldset>
    <legend><h1>Pick up Car</h1></legend>
    <!-- Pick up car -->
    <table class="table_clone" id="pick_up_car" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody>
        {if $ID eq '' or $PICK_UP_CAR_COUNT eq 0}
        <tr class="tabForm">
            <td>{$MOD.LBL_NUM_PLATE}:<input type="text" id="number_plates" name="number_plates[]" value=""/></td>
            <td> {$MOD.LBL_DRIVER}: <input type="text" id="driver" name="driver[]" value=""/></td>
            <td>
                {$MOD.LBL_DRIVER_PHONE}: <input type="text" id="driver_phone" name="driver_phone[]" value=""/>
                <input type="hidden" id="pick_up_car_id" name="pick_up_car_id[]" value=""/>
                <input type="hidden" id="pick_id" name="pick_id[]" value=""/>
                <input type="hidden" id="deleted" name="deleted[]" class="deleted" value="0"/>
            </td>
            <td>
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                       tabindex='2' class="button pick_up_car" value='{$APP.LBL_SELECT_BUTTON_LABEL}'
                       name="bnt_pick_up_car" id="bnt_pick_up_car[]"/>

            </td>
            <td>
                <input type="button" class="btnAddRow" value="Add Row"/>
                <input type="button" class="btnDelRow" value="Delete Row"/>
            </td>
        </tr>
        {/if}
        {$PICKUP_CAR}
        </tbody>
    </table>
</fieldset>
<br/>
<fieldset>
    <legend><h1>Sightseeing car</h1></legend>
    <!-- Sightseeing car-->
    <table class="table_clone" id="sightseeing_car" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody>
        {if $ID eq '' or $SIGHTSEEING_CAR_COUNT eq 0}
        <tr class="tabForm">
            <td>{$MOD.LBL_NUM_PLATE}:<input type="text" id="number_plates_sight" name="number_plates_sight[]" value=""/></td>
            <td>{$MOD.LBL_DRIVER}:<input type="text" id="driver_sight" name="driver_sight[]" value=""/></td>
            <td>
                {$MOD.LBL_DRIVER_PHONE}:<input type="text" id="driver_phone_sight" name="driver_phone_sight[]" value=""/>
                <input type="hidden" id="sightseeing_id" name="sightseeing_id[]" value=""/>
                <input type="hidden" id="sightseeing_car_id" name="sightseeing_car_id[]" value=""/>
                <input type="hidden" id="deleted" name="deleted[]" class="deleted" value="0"/>
            </td>
            <td>
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                       tabindex='2' class="button sightseeing_btn" value='{$APP.LBL_SELECT_BUTTON_LABEL}'
                       name="sightseeing_btn" id="sightseeing_btn[]"/>

            </td>
            <td>
                <input type="button" class="btnAddRow" value="Add Row"/>
                <input type="button" class="btnDelRow" value="Delete Row"/>
            </td>
        </tr>
        {/if}
        {$SIGHTSEEING_CAR}
        </tbody>
    </table>
</fieldset>
<br/>
<!-- chuong trinh trong ke hoach doan -->
<fieldset>
    <table cellpadding="0" cellspacing="0" class="table_clone" id="groupprogramline" width="100%">
        <legend><h1>Group Programs Details</h1></legend>
        <tbody>
        {if $ID eq '' or $GROUPPROGRAM_LINE_COUNT eq 0}
        <tr>
            <td>
                <table class="tabForm" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td class="dataLabel">Date</td>
                        <td class="dataField"><input id='date' class="datetime" name='date[]'
                                                     onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" type="text"
                                                     tabindex='1' size='15' maxlength='10' value="{$START_DATE}"/>(dd/mm/yy)
                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Section of date</td>
                        <td class="dataField">
                            <select id="section_of_date" name="section_of_date[]">
                                <option value="">None</option>
                                <option value="sang">Sáng</option>
                                <option value="trua">Trưa</option>
                                <option value="chieu">Chiều</option>
                                <option value="toi">Tối</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Service
                            <select id="parent" class="parent jk_what_service" name="parent[]">
                                <option value="">None</option>
                                <option value="Restaurants">Restaurant</option>
                                <option value="Hotels">Hotel</option>
                            </select>
                        </td>
                        <td class="dataField">
                            <select id="list_service_item" class="jk_list_service_items" name="parent_id[]">
                                <option value="">None</option>
                            </select>
                            <input type="hidden" id="parent_id" name="parent_name[]" value=""/>
                            <span style="display: none" class="jk_service_loading"><img src="modules/images/ajax-loader.gif"/> </span>
                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Other <input type="checkbox"
                                                                                                class="checkhidden"
                                                                                                id="other"
                                                                                                name="other[]"/></td>
                        <td class="dataField"><input type="text" name="service_other[]" class="phidden"
                                                     id="service_other" size="50" style="display: none;"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Address</td>
                        <td class="dataField"><textarea cols="60" rows="4" id="address" name="address[]"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="dataField">Tel</td>
                        <td class="dataField"><input type="text" name="tel[]" id="tel" class="tel" size="35"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Fax</td>
                        <td class="dataField"><input type="text" name="fax[]" id="fax" size="35"/></td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Contact</td>
                        <td class="dataField">
                            <input type="text" name="contact_name[]" id="contact_name" value="" size="30"/>
                            <input type="text" name="contact_phone[]" id="contact_phone" value="" size="30"/>
                            <input type="hidden" name="contact_id[]" id="contact_id" value=""/>
                            <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}"
                                   type="button" tabindex='2' class="button contact"
                                   value='{$APP.LBL_SELECT_BUTTON_LABEL}' name="btn_contact[]" id="btn_contact">

                        </td>
                    </tr>
                    <tr>
                        <td class="dataLabel">Content</td>
                        <input type="hidden" name="content_id[]" id="content_id" value=""/>
                        <td class="dataField">
                            <textarea cols="90" rows="6" id="content" name="content[]"></textarea>
                            <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}"
                                   type="button" tabindex='2' class="button foodmenu" value='{$MOD.LBL_SELECTMENU}'
                                   name="btn_foodmenu[]" id="btn_foodmenu">
                            <input type="hidden" name="deleted[]" class="deleted" id="deleted" value="0"/>
                            <input type="hidden" name="groupprogramline_id[]" id="groupprogramline_id" value=""/>
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <input type="button" class="btnAddRow" value="Add Row"/>
                <input type="button" class="btnDelRow" value="Delete Row"/>
            </td>
        </tr>
        {/if}
        {$GROUP_PROGRAM_LINE}

        </tbody>
    </table>
</fieldset>

<div>
    <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button"
           onclick="this.form.action.value='Save';return check_form('EditView');"
           type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  ">
    <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button"
           onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'"
           type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  ">
{if $ID neq ''}
    <input title="View Change Log" class="button"
           onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=GroupPrograms", true, false, {$view_change_log} ); return false;'
           type="submit" value="View Change Log">
{/if}
</div>
<script type="text/javascript" src="modules/GroupPrograms/js/load_service.js"></script>
</form>
