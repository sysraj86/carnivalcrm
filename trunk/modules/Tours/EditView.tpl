{literal}

<script type="text/javascript" src="custom/include/js/jquery.js"></script>

<script type="text/javascript"
        src="include/javascript/popup_parent_helper.js?s={SUGAR_VERSION}&c={JS_CUSTOM_VERSION}"></script>
<script type="text/javascript" src="modules/Tours/js/tinymce/tiny_mce.js"></script>
<!-- <script type="text/javascript" src="modules/GroupPrograms/jquery.table.addrow.js"> </script> -->
<script type="text/javascript">
$(function () {
    /*   $('.destination_name').click(function () {
        i = this.id.substring(this.id.length - 1, this.id.length);
        //alert(i);
        open_popup($('#parent' + i).val(), 600, 400, "", true, false, {"call_back_function":"set_return", "form_name":"EditView", "field_to_name_array":{"id":"parent_id" + i, "name":"destination" + i }}, "single", true);
    });*/

    $('.parent').change(function () {
        i = this.id.substring(this.id.length - 1, this.id.length);
        $('#destination' + i).val("");
        $('#parent_id' + i).val("");
        parent_namechangeQS();
        checkParentType($('#parent' + i).val(), $('#destination_name' + i));
    });
    $('.clear').click(function () {
        i = this.id.substring(this.id.length - 1, this.id.length);
        $('#uploadfile' + i).val("");
        $('#notes' + i).val("");
        checkParentType($('#uploadfile' + i).val(), $('#notes' + i));
    });

});

function parent_namechangeQS() {
    new_module = document.forms["EditView"].elements["parent_type"].value;
    if (typeof(disabledModules[new_module]) != 'undefined') {
        sqs_objects["EditView_parent_name"]["disable"] = true;
        document.forms["EditView"].elements["parent_name"].readOnly = true;
    } else {
        sqs_objects["EditView_parent_name"]["disable"] = false;
        document.forms["EditView"].elements["parent_name"].readOnly = false;
    }
    sqs_objects["EditView_parent_name"]["modules"] = new Array(new_module);
    if (typeof QSProcessedFieldsArray != 'undefined') {
        QSProcessedFieldsArray["EditView_parent_name"] = false;
    }
    enableQS(false);
}
        Calendar.setup ({ {/literal} inputField:'start_date', ifFormat:'{$CALENDAR_DATEFORMAT}', showsTime:false, button:'start_date_trigger', singleClick:true, step:1 {literal} });addToValidate('EditView', 'expiration', 'date', false, 'expiration');

        Calendar.setup ({ {/literal}
    //inputField : "end_date", ifFormat : "{$CALENDAR_DATEFORMAT}", showsTime : false, button : "end_date_trigger", singleClick : true, step : 2, weekNumbers:false
    inputField:"end_date",daFormat:"%d/%m/%Y",button:"end_date_trigger",singleClick:true,dateStr:"12/19/2009",step:1
{literal} });
addToValidate('EditView', 'expiration', 'date', false, 'expiration');
addToValidate('EditView', 'deparment', 'string', true, 'Department');
addToValidate('EditView', 'tour_code_area', 'string', true, 'Area code');
addToValidate('EditView', 'tour_code_num', 'int', true, 'Num code');
addToValidate('EditView', 'tour_code_no', 'string', true, 'Code no.');
addToValidate('EditView', 'tour_code_department', 'string', true, 'Department code');
addToValidate('EditView', 'tour_num', 'string', true, 'Tour Num');
addToValidate('EditView', 'area', 'string', true, 'Tour area');
/*{$JAVASCRIPT}*/
</script>
<style type="text/css">
    .dataLabel {
        font-weight: bold
    }
</style>
{/literal}
<form id="EditView" name="EditView" method="post" action="index.php" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" width="100%" border="0">
    <tr>
        <td>
            <input type="hidden" name="module" value="Tours">
            <input type="hidden" name="record" value="{$ID}">
            <input type="hidden" name="action">
            <input type="hidden" name="return_module" value="{$RETURN_MODULE}">
            <input type="hidden" name="return_id" value="{$RETURN_ID}">
            <input type="hidden" name="return_action" value="{$RETURN_ACTION}">
            <input type="hidden" name="contact_role">
            <input type="hidden" name="relate_to" value="Tours">
            <input type="hidden" name="relate_id" value="">
            <input type="hidden" name="offset" value="1">
            <input type="hidden" name="count" value="{$TOURPROGRAM_LINE_COUNT}"/>
            <input type="hidden" name="tour_picture_name" value="{$PICTURE_NAME}"/>
        </td>
    </tr>
    <tr>
        <td style="padding-bottom: 2px;">
            <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button"
                   onclick="this.form.action.value='Save';return check_form('EditView');"
                   type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  "/>
            <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button"
                   onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'"
                   type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  "/>
        {if $ID neq ''}
            <input title="View Change Log" class="button"
                   onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Tours", true, false, {$view_change_log} ); return false;'
                   type="submit" value="View Change Log">
        {/if}
        </td>
    </tr>

</table>
<fieldset>
    <table cellpadding="0" cellspacing="0" width="100%" class="tabForm">
        <legend><h2>Tour overview</h2></legend>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DEPARMENT}<span class="required">*</span>:</td>
            <td class="dataField">
                <select name="deparment" id="department">{$DEPARMENT}</select>
                <select id="frame_type" name="frame_type">{$FRAME_TYPE}</select>

                <div class="in_line wrap_template">
                    <select disabled="disabled" id="templates" name="template_id">
                        <option value="">--Select template--</option>
                    </select>
                </div>
            </td>
            <td class="dataLabel">{$MOD.LBL_LIST_NAME}<span class="required">*</span></td>
            <td class="dataField"><input name="name" id="name" value="{$NAME}" type="text" size="35"/></td>
        </tr>
        <!-- <tr>
                <td class="dataLabel">{$MOD.LBL_FROM_PLACE}</td>
                <td class="dataField">
                    <input type="text" name="from_place" id="from_place" value="{$FROM_PLACE}" size="35" />
                    <input type="hidden" id="destination_from_id" name="destination_from_id" value="{$DESTINATION_FROM_ID}" />
                    <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' onclick='open_popup("Destinations", 600, 400, "", true, false, {$destination_from_popup_data_request}, "single", true);'>
                </td>
                <td class="dataLabel">{$MOD.LBL_TO_PLACE}</td>
                <td class="dataField">
                     <input name="to_place" id="to_place" type="text" value="{$TO_PLACE}" size="35"/>
                     <input type="hidden" id="destination_to_id" name="destination_to_id" value="{$DESTINATION_TO_ID}" />
                     <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button" tabindex='2' class="button" value='Select' onclick='open_popup("Destinations", 600, 400, "", true, false, {$destination_to_popup_data_request}, "single", true);'>
                </td>
            </tr> -->
        <tr>
            <td class="dataLabel">{$MOD.LBL_TOUR_CODE} <span class="required">*</span></td>
            <td class="dataField" id="tour_code">{*<span sugar='slot0b'><input type="text" name="tour_code" id="tour_code"
                                                                          value="{$TOURCODE}" size="35"/> </span sugar='slot0'>*}
                <input type="text" readonly="readonly" style="width:40px" value="{$TOUR_CODE_AREA}"
                       name="tour_code_area" id="tour_code_area"/>
                <input type="text" style="width:40px" name="tour_code_num" value="{$TOUR_CODE_NUM}" id="tour_code_num"/>
                <span>/</span>
                <input type="text" readonly="readonly" style="width:40px" name="tour_code_department"
                       value="{$TOUR_CODE_DEPARTMENT}" id="tour_code_department"/>
            {if $IS_TEMPLATE eq 0}
                <span>-</span>
                <input type="text" readonly="readonly" style="width:40px" name="tour_num" value="{$TOUR_NUM}"
                       id="tour_num"/>
            {/if}
            </td>

            <td class="dataLabel">
            {$MOD.LBL_DURATION} :
            </td>
            <td class="dataField">
                <input type="text" id="duration" name="duration" size="35" value="{$DURATION}"/>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_START_DATE} :</td>
            <td class="dataField"><input id='start_date' name='start_date'
                                         onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" type="text"
                                         tabindex='1' size='15' maxlength='10' value="{$START_DATE}"/> <img
                    src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="start_date_trigger"
                    align="absmiddle"> (dd/mm/yy)
            </td>

            <td class="dataLabel">{$MOD.LBL_TYPE} :</td>
            <td class="dataField"><select id="type" name="type">{$TYPE}</select></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_END_DATE} :</td>
            <td class="dataField">
                <input readonly="readonly" id='end_date' name='end_date'
                       onblur="parseDate(this, '{$CALENDAR_DATEFORMAT}');" type="text"
                       tabindex='1' size='15' maxlength='10' value="{$END_DATE}"/> <img
                    src="themes/default/images/jscalendar.gif" alt="{$APP.LBL_ENTER_DATE}" id="end_date_trigger"
                    align="absmiddle">(dd/mm/yy)
                <input type="button" id="addDays" value="Add days"/>
            </td>
            <td class="dataLabel">{$MOD.LBL_STATUS} :</td>
            <td class="dataField"><select id="status" name="status">{$STATUS}</select></td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_TOUR_AREA}</td>
            <td class="dataField">
                <select name="area" id="area">{$TOUR_AREA}</select>
            </td>
            <td class="dataLabel" valign="top">{$MOD.LBL_TRANSPORT} :</td>
            <td class="dataField"><select id="transport" name="transport[]"
                                          multiple="multiple">{$TRANSPORT}</select></td>
        </tr>
        <tr>
            <td class="dataLabel" valign="top">{$MOD.LBL_DESTINATION}&nbsp;<span class="required">({$MOD.LBL_NOTE}
                ) :</span>
            </td>
            <td class="dataField"><select id="noiden" name="noiden[]" multiple="multiple">{$DESTINATION}</select>
            </td>
            <td class="dataLabel">
            {$MOD.LBL_TOUR_IS_TEMPLATE}:
            </td>
            <td>
                <input style="height:18px" type="checkbox" name="is_template" value="1"
                       {if $IS_TEMPLATE eq 1}checked="true"{/if}/>
            {if $IS_TEMPLATE eq 1}
                <input style="width:175px" name="template_name" class="textbox" value="{$TEMPLATE_NAME}" type="text"/>
            {/if}
            </td>
        </tr>
    {*   <tr>
        <td class="dataLabel">{$MOD.LBL_TOUR_TYPE} :</td>
        <td class="dataField"></td>
    </tr>*}
        <tr>
            <td class="dataLabel">{$MOD.LBL_PICTURE} :</td>
            <td id="tour_picture" class="dataField">
            {if $PICTURE neq ''}
                {$PICTURE}<br/>
            {/if}
                <input type="file" name="upload_image" id="upload_image"/>
            </td>
            <td></td>
            <td style="font-size:15px; line-height: 24px">
                <input style="height:22px" {if $IS_HOT_TOUR eq 1}checked{/if} name="is_hot_tour"
                       type="checkbox">&nbsp;<span>Hot Tour</span><br/>
                <input style="height:22px" {if $IS_FAVORITE_TOUR eq 1}checked{/if} name="is_favorite_tour"
                       type="checkbox">&nbsp;<span>Favorite Tour</span><br/>
                <input style="height:22px" {if $SHOW_IN_HOME eq 1}checked{/if} name="show_in_home" type="checkbox">&nbsp;<span>Show In Home</span><br>
                <input style="height:22px" {if $IS_ACTIVE eq 1}checked{/if} name="is_active"
                       type="checkbox">&nbsp;<span>Publish in web</span><br>
            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_CONTRACT_VALUE} :</td>
            <td class="dataField">
                <input type="text" name="contract_value" id="contract_value" value="{$VALUECONTRACT}" size="35"/>
                <select name="currency" id="currency">{$CURRENCY}</select>
            </td>
            <td class="dataLabel">
                Order
            </td>
            <td class="dataField">
                <input type="text" style="width:50px" value="{$ORDER}" name="order_num"/>
            </td>
        </tr>

        <tr>


        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_DESCRIPTION} :</td>
            <td class="dataField"><textarea class="jk_editor" cols="75" rows="6" id="description"
                                            name="description">{$DESCRIPTION}</textarea></td>
            <td class="dataLabel">

            </td>
            <td class="dataField">

            </td>
        </tr>
        <tr>
            <td class="dataLabel">{$MOD.LBL_ASSIGNED_TO_NAME} :</td>
            <td class="dataField">
                <input type="text" id="assigned_user_name" name="assigned_user_name" value="{$ASSIGNED_USER_NAME}"/>
                <input type="hidden" id="assigned_user_id" name="assigned_user_id" value="{$ASSIGNED_USER_ID}"/>
                <input title="{$APP.LBL_SELECT_BUTTON_TITLE}" accessKey="{$APP.LBL_SELECT_BUTTON_KEY}" type="button"
                       tabindex='2' class="button" value='Select'
                       onclick='open_popup("Employees", 600, 400, "", true, false, {$assigned_to_name_popup_data}, "single", true);'>
            </td>
            <td class="datalabel">

            </td>
            <td>
            </td>
        </tr>
    </table>
</fieldset>
<br/>
<fieldset>
    <table cellpadding="0" cellspacing="0" width="100%" class="table_clone" id="table_clone" maxcount="50">
        <legend><h2>Tour program detail</h2></legend>
        <tbody id="tourprogram_line">
        {if $ID eq '' or $TOURPROGRAM_LINE_COUNT eq 0}
        <tr id="TR_table_clone_1">
            <td>
                <fieldset>
                    <table cellpadding="0" cellspacing="0" width="100%" id="tour_program_1" class="tabForm">
                        <thead>
                        <tr>
                            <td colspan="4">
                                <h2 class="font_6 in_line">
                                    NGÀY <span class="day_num">1</span>:
                                </h2>
                            </td>
                        </tr>
                        <tr>
                            <td class="dataLabel">Title:</td>
                            <td class="dataField">
                                <input type="text" name="title[]" size="35" id="title_1"/>
                            </td>
                            <td class="dataLabel" colspan="2">
                                <span>Countries: </span>
                                <select name="tour_country" class="jk_list_countries" multiple="multiple" size="4">
                                    {$COUNTRIES}
                                </select>
                                <span>Areas: </span>
                                <select name="tour_country" class="jk_list_areas" multiple="multiple" size="4">
                                    <option value=''>--None--</option>
                                </select>
                                <span>Cities: </span>
                                <select name="destinations[]" class="jk_list_destinations" multiple="multiple" size="4">
                                    {$DESTINATION}
                                </select>
                                <input type="hidden" value="0" name="destination_selected_count[]"/>
                                <span>Locations:</span>
                                <select multiple="multiple" name="locations[]" class="jk_list_locations" size="4"
                                        data-editorId="description_pro_1">
                                    <option value="">None</option>
                                </select>
                                <input type="hidden" value="0" name="location_selected_count[]"/>
                            </td>
                        </tr>
                        <tr>
                            <td class="dataLabel">Notes</td>
                            <td class="dataField"><input type="text" name="notes[]" size="35" id="notes_1"/></td>
                            <td class="dataLabel">
                                <span>Picture:</span>
                            </td>
                            <td class="dataLabel"><input type="file" name="uploadfile[]" id="uploadfile_1"/>
                                <input class="clear" name="clear[]" id="clear_1" type="button"
                                       accesskey="{$APP.LBL_CLEAR_BUTTON_KEY}" title="{$APP.LBL_CLEAR_BUTTON_TITLE}"
                                       value="{$APP.LBL_CLEAR_BUTTON_LABEL}">
                            </td>
                        </tr>
                        <tr>
                            <td class="dataLabel">Description</td>
                            <td class="dataField">
                                <textarea class="jk_editor" cols="75" rows="15" id="description_pro_1"
                                          name="description_pro[]"></textarea></td>
                            <td class="dataLabel">&nbsp;</td>
                            <td class="dataField">
                                <input type="hidden" name="tour_program_id[]" id="tour_program_id_1"/>
                                <input type="hidden" name="images[]" id="images_1" value=""/>
                                <input type='hidden' name='deleted[]' id='deleted_1' class="deleted"/>
                            </td>
                        </tr>
                        </thead>
                    </table>
                </fieldset>
            </td>
            <td>
                <input type="button" class="btnAddRow" value="Add row"/>
                <input type="button" class="btnDelRow" value="Delete row"/>
            </td>
        </tr>
        {/if}
        {$TOURPROGRAM}
        </tbody>
    </table>
</fieldset>
<div>
    <input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button"
           onclick="this.form.action.value='Save';return check_form('EditView');"
           type="submit" name="button" value="  {$APP.LBL_SAVE_BUTTON_LABEL}  "/>
    <input title="{$APP.LBL_CANCEL_BUTTON_TITLE}" accessKey="{$APP.LBL_CANCEL_BUTTON_KEY}" class="button"
           onclick="this.form.action.value='{$RETURN_ACTION}'; this.form.module.value='{$RETURN_MODULE}'; this.form.record.value='{$RETURN_ID}'"
           type="submit" name="button" value="  {$APP.LBL_CANCEL_BUTTON_LABEL}  "/>
{if $ID neq ''}
    <input title="View Change Log" class="button"
           onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=Tours", true, false, {$view_change_log} ); return false;'
           type="submit" value="View Change Log">
{/if}
</div>

</form>
<script type="text/javascript" src="modules/Tours/js/Tours.js"></script>
<script type="text/javascript" src="modules/Tours/js/TourPrograms.js"></script>
<script type="text/javascript" src="modules/Tours/js/TourTemplates.js"></script>
<script type="text/javascript" src="modules/Tours/js/TourProgramTemplate.js"></script>
<script type="text/javascript" src="modules/Tours/js/Implementing.js"></script>
