/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/26/11
 * Time: 11:30 AM
 */
 TourProgramTemplate = '<tr id="TR_table_clone_{{current_row}}">'+
            '<td>'+
                '<fieldset>'+
                    '<table cellpadding="0" cellspacing="0" width="100%" id="tour_program_1" class="tabForm">'+
                        '<thead>'+
                        '<tr>'+
                            '<td colspan="4">'+
                                '<h2 class="font_6 in_line"> NGÀY <span class="day_num">{{day_num}}</span>:'+
                                '</h2>'+
                            '</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td class="dataLabel">Title:</td>'+
                            '<td class="dataField">'+
                                '<input type="text" name="title[]" size="35" value="{{title}}" id="title_{{current_row}}"/>'+
                            '</td>'+
                            '<td class="dataLabel">'+
                                '<span>Countries:</span>'+
                                 '<select name="destinations[]" class="jk_list_destinations" multiple="multiple" size="4">'+
                                     '{{countries}}'+
                                 '</select>'+
                                '<span>Area:</span>'+
                                 '<select name="destinations[]" class="jk_list_destinations" multiple="multiple" size="4">'+
                                     '<option value="">--None--</option>'+
                                 '</select>'+
                                '<span>Cities:</span>'+
                                '<select name="destinations[]" class="jk_list_destinations" multiple="multiple" size="4">'+
                                    '{{destinations}}'+
                                '</select>'+
                                '<input type="hidden" value="0" name="destination_selected_count[]"/>'+
                                '<span>Locations:</span>'+
                                '<select name="locations[]" multiple="multiple" class="jk_list_locations" size="4" data-editorId="description_pro_{{current_row}}">'+
                                    '<option value="">None</option>'+
                                    '{{locations}}'+
                                '</select>'+
                                '<input type="hidden" name="location_selected_count[]" value="0"/>'+
                            '</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td class="dataLabel">Notes</td>'+
                            '<td class="dataField"><input type="text" name="notes[]" size="35" id="notes_{{current_row}}" value="{{note}}"/></td>'+
                            '<td class="dataLabel">'+
                                '<span>Picture:</span>'+
                            '</td>'+
                            '<td class="dataLabel"><input type="file" name="uploadfile[]" id="uploadfile_{{current_row}}"/>'+
                            '</td>'+
                       '</tr>'+
                        '<tr>'+
                            '<td class="dataLabel">Description</td>'+
                            '<td class="dataField">'+
                                '<textarea class="jk_editor" cols="75" rows="15" id="description_pro_{{current_row}}" name="description_pro[]">{{description}}</textarea></td>'+
                            '<td class="dataLabel tour_program_image">{{picture_html}}</td>'+
                            '<td class="dataField">'+
                                '<input type="hidden" name="tour_program_id[]" value="{{id}}" id="tour_program_id_{{current_row}}"/>'+
                                '<input type="hidden" name="images[]" id="images_{{current_row}}" value="{{picture}}"/>'+
                                '<input type="hidden" name="deleted[]" id="deleted_{{current_row}}" class="deleted" value="{{deleted}}"/>'+
                            '</td>'+
                        '</tr>'+
                        '</thead>'+
                    '</table>'+

                '</fieldset>'+
            '</td>'+
            '<td>'+
                '<input type="button" class="btnAddRow" value="Add row"/>'+
                '<input type="button" class="btnDelRow" value="Delete row"/>'+
            '</td>'+
        '</tr>';