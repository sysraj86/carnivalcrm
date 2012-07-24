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
                            '<td class="labelField">&nbsp;</td>'+
                            '<td class="dataField" colspan="5">&nbsp;</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td class="dataLabel">'+
                                'Countries:'+
                            '</td>'+
                            '<td class="dataField">'+
                                 '<select name="tour_program_countries[]" class="jk_list_countries" multiple="multiple" size="4">'+
                                        '{{countries}}'+
                                 '</select>'+
                                  '<input type="hidden" value="{{countries_count}}" name="tour_program_countries_count[]"/>'+
                            '</td>'+
                            '<td class="dataLabel">'+
                                'Area:'+
                            '</td>'+
                            '<td class="dataField">'+
                                 '<select name="tour_program_areas[]" class="jk_list_areas" multiple="multiple" size="4">'+
                                     '{{areas}}'+
                                 '</select>'+
                                 '<input type="hidden" value="{{areas_count}}" name="tour_program_areas_count[]"/>'+
                            '</td>'+
                            '<td class="dataLabel">'+
                                'Citites'+
                            '</td>'+
                            '<td>'+
                                '<select name="destinations[]" class="jk_list_destinations" multiple="multiple" size="4">'+
                                     '{{cities}}'+
                                '</select>'+
                                '<input type="hidden" value="{{cities_count}}" name="destination_selected_count[]"/>'+
                            '</td>'+
                            '<td>'+
                                    'Locations'+
                            '</td>'+
                             '<td>'+
								'<select name="tour_program_locations[]" multiple="multiple" class="jk_list_locations" size="4" data-editorId="description_pro_{{current_row}}">'+
                                    '{{locations}}'+
                                '</select>'+
                                '<input type="hidden" name="location_selected_count[]" value="{{locations_count}}"/>'+
                            '</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td class="dataLabel">Notes</td>'+
                            '<td class="dataField" colspan="5"><input type="text" name="notes[]" size="35" id="notes_{{current_row}}" value="{{note}}"/></td>'+
                            '<td class="dataLabel">'+
                                'Picture'+
                            '</td>'+
                            '<td class="dataField"><input type="file" name="uploadfile[]" id="uploadfile_{{current_row}}"/>'+
                            '</td>'+
                       '</tr>'+
                        '<tr>'+
                            '<td class="dataLabel">Description</td>'+
                            '<td class="dataField" colspan="5">'+
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