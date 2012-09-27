<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class  GroupProgram extends SugarBean
{

    var $new_schema = true;
    var $module_dir = 'GroupPrograms';
    var $object_name = 'GroupProgram';
    var $table_name = 'groupprograms';
    var $importable = true;
    var $id;
    var $date_entered;
    var $date_modified;
    var $modified_user_id;
    var $assigned_user_id;
    var $created_by;
    var $created_by_name;
    var $currency_id;
    var $modified_by_name;
    var $name;
    var $status;
    var $notes;
    var $description;
    var $groupprogram_code;
    var $tour_name;
    var $tour_code;
    var $tour_id;
    var $start_date_group;
    var $end_date_group;

    var $guide_pick_up_at_airport;
    var $guide_pick_up_at_airport_id;
    var $pick_up_phone;

    var $operator;
    var $operator_phone;
    var $groupprograorksheets_name;
    var $groupprogr53b5ksheets_idb;
    var $groupprogransurances_name;
    var $groupprogr5003urances_idb;
    var $groupprograsportlist_name;
    var $groupprogrc66dortlist_idb;
    var $groupprograketslists_name;
    var $groupprogr60cctslists_idb;
    var $grouplists87eduplists_ida;
    var $grouplists_pprograms_name;
    var $adults;
    var $child_2;
    var $childfrom2to12;
    var $work_sheet_content;
    var $worsheet_type;

    function GroupProgram()
    {
        global $sugar_config;
        parent::SugarBean();
    }

    function get_summary_text()
    {
        return "$this->name";
    }

    // get infor guide
    function guide_count()
    {
        $sql = "select * from guide where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        return $this->db->getRowCount($result);
    }


    function get_guide_editview($app, $mod)
    {
        $sql = "select * from guide where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr class="tabForm">
                        <td class="dataLabel" width="26.4%">Guide :</td>
                        <td class="dataField">
                        <input type="text" name="guide_name[]" id="guide_name" size="25" value="' . $row['guide_name'] . '"/>
                        <input type="text" name="guide_phone[]"  id="guide_phone" data="Button=cleardata,selectdata|Module=TravelGuides|Fields=id,name,phone|Inputs=guide_id,guide_name,guide_phone" class="select" value="' . $row['guide_phone'] . '" />
                        <input type="hidden" name="guide_id[]" id="guide_id" value="' . $row['guide_id'] . '"/>
                        <input type="hidden" name="guide_record[]" id="guide_record" value="' . $row['id'] . '"/>
                        <input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"/>
                        <input title="' . $app['LBL_SELECT_BUTTON_TITLE'] . '" accessKey="' . $app['LBL_SELECT_BUTTON_KEY'] . '" type="button" class="button guide" name="btn_guide[]" id="btn_guide" value="' . $app['LBL_SELECT_BUTTON_LABEL'] . '">
                        <input type="button" class="btnAddRow"  value="Add Row"/>
                        <input type="button" class="btnDelRow" value="Delete Row"/>
                         </td>
                  </tr>';
        }
        return $html;
    }

    // get info teamleader
    function leader_count()
    {
        $sql = "select * from teamleader where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        return $this->db->getRowCount($result);
    }

    function get_leader_editview($app, $mod)
    {
        $sql = "select * from teamleader where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr class="tabForm">
                        <td class="dataLabel" width="26.4%">' . $mod['LBL_TEAM_LEADER'] . ' :</td>
                        <td class="dataField">
                        <input type="text" name="team_leader[]" id="team_leader" size="25" value="' . $row['team_leader'] . '"/>
                        <input type="text" name="leader_phone[]"  id="leader_phone" data="Button=cleardata,selectdata|Module=TravelGuides|Fields=id,name,phone|Inputs=leader_id,team_leader,leader_phone" class="select" value="' . $row['leader_phone'] . '" />
                        <input type="hidden" name="leader_id[]" id="leader_id" value="' . $row['leader_id'] . '"/>
                        <input type="hidden" name="team_leader_id[]" id="team_leader_id" value="' . $row['id'] . '"/>
                        <input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"/>
                        <input title="' . $app['LBL_SELECT_BUTTON_TITLE'] . '" accessKey="' . $app['LBL_SELECT_BUTTON_KEY'] . '" type="button" class="button leader" name="btn_leader[]" id="btn_leader" value="' . $app['LBL_SELECT_BUTTON_LABEL'] . '">
                        <input type="button" class="btnAddRow"  value="Add Row"/>
                        <input type="button" class="btnDelRow" value="Delete Row"/>
                         </td>
                  </tr>';
        }
        return $html;
    }

    // get detail view pick up car

    function pick_up_car_line_count()
    {
        $sql = "select * from pickupcars where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        return $this->db->getRowCount($result);
    }


    function pick_up_car_detailview()
    {
        $sql = "select * from pickupcars where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr>';
            $html .= '<td align="center">' . $row['number_plates'] . '</td>';
            $html .= '<td align="center">' . $row['driver'] . '</td>';
            $html .= '<td align="center">' . $row['driver_phone'] . '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function get_leader_detailview()
    {
        $sql = "select * from teamleader  where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL">Team leader</td>
                            <td class="tabDetailViewDF"><a href="index.php?module=TravelGuides&action=DetailView&record=' . $row['leader_id'] . '" class="tabDetailViewDFLink">' . $row['team_leader'] . '</a>&nbsp&nbsp' . $row['leader_phone'] . '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function get_guide_detailview()
    {
        $sql = "select * from guide  where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL">Guide</td>
                            <td class="tabDetailViewDF"><a href="index.php?module=TravelGuides&action=DetailView&record=' . $row['guide_id'] . '" class="tabDetailViewDFLink">' . $row['guide_name'] . '</a>&nbsp&nbsp' . $row['guide_phone'] . '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function get_pickup_car_editview($app, $mod)
    {
        $sql = "select * from pickupcars where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr class="tabForm">';
            $html .= '<td>'.$mod['LBL_NUM_PLATE'].':'.'<input type="text" id="number_plates" name="number_plates[]" value="' . $row['number_plates'] . '"/></td>';
            $html .= '<td>'.$mod['LBL_DRIVER'].':'.'<input type="text" id="driver" name="driver[]" value="' . $row['driver'] . '"/></td>';
            $html .= '<td>';
            $html .= $mod['LBL_DRIVER_PHONE'].':'.'<input type="text" id="driver_phone" name="driver_phone[]" value="' . $row['driver_phone'] . '"/>';

            $html .= '</td>';
            $html .= '<td>';
            $html .= '<input type="hidden" id="pick_up_car_id" name="pick_up_car_id[]" data="Button=cleardata,selectdata|Module=Cars|Fields=id,number_plates,driver_name,phone|Inputs=pick_up_car_id,number_plates,driver,driver_phone" class="select" value="' . $row['pick_up_car_id'] . '"/>';
            $html .= '<input type="hidden" id="pick_id" name="pick_id[]" value="' . $row['id'] . '"/> ';
            $html .= '<input type="hidden" id="deleted" name="deleted[]" class="deleted" value="0"/>';
            $html .= '</td>';
            $html .= '<td>';
            $html .= '<input type="button" class="btnAddRow"  value="Add Row"/>';
            $html .= '<input type="button" class="btnDelRow" value="Delete Row"/>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }


    function sightseeing_car_line_count()
    {
        $sql = "select * from sightseeingcars  where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        return $this->db->getRowCount($result);
    }

    // get detail view pick up car

    function sightseeing_car_detailview()
    {
        $sql = "select * from sightseeingcars  where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr>';
            $html .= '<td align="center">' . $row['number_plates_sight'] . '</td>';
            $html .= '<td align="center">' . $row['driver_sight'] . '</td>';
            $html .= '<td align="center">' . $row['driver_phone_sight'] . '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    // get editview sightseeing car
    function sightseeing_car_editview($app, $mod)
    {
        $sql = "select * from sightseeingcars  where groupprogram_id ='" . $this->id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr class="tabForm">';
            $html .= '<td>'.$mod['LBL_NUM_PLATE'].':'.'<input type="text" id="number_plates_sight" name="number_plates_sight[]" value="' . $row['number_plates_sight'] . '"/></td>';
            $html .= '<td>'.$mod['LBL_DRIVER'].':'.'<input type="text" id="driver_sight" name="driver_sight[]" value="' . $row['driver_sight'] . '"/></td>';
            $html .= '<td>';
            $html .= $mod['LBL_DRIVER_PHONE'].':'.'<input type="text" id="driver_phone_sight" name="driver_phone_sight[]" value="' . $row['driver_phone_sight'] . '"/> ';
            
            $html .= '</td>';
            $html .= '<td>';
            $html .= '<input type="hidden" id="sightseeing_id" name="sightseeing_id[]" value="' . $row['sightseeing_id'] . '"> ';
            $html .= '<input type="hidden" id="deleted" name="deleted[]"  class="deleted" value="0"> ';
            $html .= '<input type="hidden" id="sightseeing_car_id" name="sightseeing_car_id[]" data="Button=cleardata,selectdata|Module=Cars|Fields=id,number_plates,driver_name,phone|Inputs=sightseeing_car_id,number_plates_sight,driver_sight,driver_phone_sight" class="select" value="' . $row['id'] . '"/> ';
            $html .= '</td>';
            $html .= '<td>';
            $html .= '<input type="button" class="btnAddRow"  value="Add Row"/>';
            $html .= '<input type="button" class="btnDelRow" value="Delete Row"/>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }


    function groupProgram_line_count()
    {
        $sql = "select * from groupsprogramslines where groupprogram_id ='" . $this->id . "' and deleted =0";
        $result = $this->db->query($sql);
        return $this->db->getRowCount($result);
    }

    // get edit view group program line
    function get_groupProgram_editview($app, $mod)
    {
        global $app_list_strings;
        $sql = "select * from groupsprogramslines where groupprogram_id ='" . $this->id . "' and deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            // if service type (Restaurants || Hotels) da duoc tron va worksheet id ko rong
            // (da co worksheet moi chon duoc service)
            if (!empty($row['parent']) && !empty($this->groupprogr53b5ksheets_idb)) {
                //service type
                $parent_type = get_select_options($app_list_strings['service_type_dom'], $row['parent']);
                //neu service name ko rong
                //generate ra list option
                if (!empty($row['parent_name'])) {
                    $this->jk_set_service_by_type($row['parent']);
                    $services = get_select_options_with_id($app_list_strings['service_item_by_worksheet'], $row['parent_id']);
                } else {
                    $this->jk_set_service_by_type($row['parent']);
                    $services = get_select_options_with_id($app_list_strings['service_item_by_worksheet'], '');
                }
            }
            else {
                //nguoc lai chi load service type
                $parent_type = get_select_options($app_list_strings['service_type_dom'], '');
                //service la list rong
                $services = "<option value=''>None</option>";
            }

            if (!empty($row['section_of_date'])) {
                $section_date = get_select_options($app_list_strings['section_of_date_dom'], $row['section_of_date']);
            }
            else {
                $section_date = get_select_options($app_list_strings['section_of_date_dom'], '');
            }
            $html .= '<tr>';
            $html .= '<td>';
            $html .= '<table class="tabForm" cellpadding="0"  cellspacing="0" width="100%">';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Date</td>';
            if (!empty($row['date'])) {
                $html .= '<td class="dataField"><input id=\'date\' class="datetime" name=\'date[]\' onblur="parseDate(this, \'{$CALENDAR_DATEFORMAT}\');"  type="text" tabindex=\'1\' size=\'15\' maxlength=\'10\' value="' . date('d/m/Y', strtotime($row['date'])) . '"/> (dd/mm/yy) </td>';
            }
            else {
                $html .= '<td class="dataField"><input id=\'date\' class="datetime" name=\'date[]\' onblur="parseDate(this, \'{$CALENDAR_DATEFORMAT}\');"  type="text" tabindex=\'1\' size=\'15\' maxlength=\'10\' value=""/> (dd/mm/yy) </td>';
            }
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Section of date</td>';
            $html .= '<td class="dataField"><select id="section_of_date" name="section_of_date[]"' . $section_date . '</seclect></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Service ' .
                '<select id="parent" name="parent[]" class="parent jk_what_service">' . $parent_type . '</select>' .
                '</td>';
            $html .= '<td class="dataField">' .
                '<select id="list_service_item" class="jk_list_service_items" name="parent_id[]">' .
                $services .
                '</select>' .
                '<input type="hidden" id="parent_name" name="parent_name[]" value="' . $row['parent_name'] . '" />';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            if (!empty($row['service_other'])) {
                $html .= '<td class="dataLabel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Other <input type="checkbox" class="checkhidden" checked="checked" id="other" name="other[]"/></td>';
                $html .= '<td class="dataLabel"><input type="text" name="service_other[]" id="service_other" class="phidden" size="50" value="' . $row['service_other'] . '"></td>';
            }
            else {
                $html .= '<td class="dataLabel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Other <input type="checkbox" class="checkhidden" id="other" name="other[]"/></td>';
                $html .= '<td class="dataLabel"><input type="text" name="service_other[]" id="service_other" class="phidden" size="50" value="' . $row['service_other'] . '" style="display:none;"></td>';
            }

            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Address</td>';
            $html .= '<td class="dataField"><textarea cols="60" rows="4" id="address" name="address[]">' . $row['address'] . '</textarea></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataField">Tel </td>';
            $html .= '<td class="dataField"><input type="text" name="tel[]" id="tel" class="tel" size="35" value="' . $row['tel'] . '"/></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Fax</td>';
            $html .= '<td class="dataField"><input type="text" name="fax[]" id="fax" size="35" value="' . $row['fax'] . '" /></td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Contact</td>';
            $html .= '<td class="dataField">';
            $html .= '<input type="text" name="contact_name[]" id="contact_name" value="' . $row['contact'] . '" size="30"/>';
            $html .= '<input type="text" name="contact_phone[]" id="contact_phone" value="' . $row['contact_phone'] . '" size="30"/>';
            $html .= '<input type="hidden" name="contact_id[]" id="contact_id" data="Button=cleardata,selectdata|Module=Contacts|Fields=id,name,phone_mobile|Inputs=contact_id,contact_name,contact_phone" class="select" value="' . $row['contact_id'] . '"/>';
            $html .= '</td> ';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Content</td>';
            $html .= '<td class="dataField"><textarea data="Button=cleardata,selectdata|Module=FoodMenu|Fields=id,description|Inputs=content_id,content" class="select" cols="90" rows="6" id="content" name="content[]">' . $row['content'] . '</textarea>';
            $html .= '<input type="hidden" name="content_id[]" id="content_id" value="' . $row['content_id'] . '" />
                                    <input type="hidden" name="deleted[]" class="deleted" id="deleted" value="0" />
                                    <input type="hidden" name="groupprogramline_id[]" id="groupprogramline_id" value="' . $row['id'] . '" />';
            $html .= '</td></tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '<td>';
            $html .= '<input type="button" class="btnAddRow"  value="Add Row"/>';
            $html .= '<input type="button" class="btnDelRow" value="Delete Row"/>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function get_group_program_detailview($id = '')
    {
        $sql = "select * from groupsprogramslines where groupprogram_id ='" . $id . "' and deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            if (!empty($row['section_of_date'])) {
                $section = translate('section_of_date_dom', '', $row['section_of_date']);
            }
            else {
                $section = translate('section_of_date_dom', '', '');
            }
            $html .= '<tr>';
            $html .= '<td>';
            $html .= '<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView">';
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL">Date</td>';
            $html .= '<td class="tabDetailViewDF">' . date('d/m/Y', strtotime($row['date'])) . '</td>';
            if (!empty($row['section_of_date'])) {
                $html .= '<td class="tabDetailViewDL">Section of date</td>';
                $html .= '<td class="tabDetailViewDF">' . $section . '</td>';
            }
            else {
                $html .= '<td class="tabDetailViewDL" width="20%">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF" width="30%">&nbsp;</td>';
            }
            $html .= '</tr>';
            /*if(!empty($row['section_of_date'])){
              $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL">Section of date</td>';
                $html .= '<td class="tabDetailViewDF">'.$section.'</td>';
                $html .= '<td class="tabDetailViewDL" width="20%">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF" width="30%">&nbsp;</td>';
              $html .= '</tr>';
            }*/
            if (!empty($row['parent'])) {
                $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="20%">' . $row['parent'] . '</td>';
                $html .= '<td class="tabDetailViewDF" width="30%"><a href="index.php?module="' . $row["parent"] . '"&action=DetailView&record=' . $row['parent_id'] . '">' . $row['parent_name'] . '</a></td>';
                $html .= '<td class="tabDetailViewDL" width="20%">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF" width="30%">&nbsp;</td>';
                $html .= '</tr>';
            }
            if (!empty($row['service_other'])) {
                $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" width="20%">Other</td>';
                $html .= '<td class="tabDetailViewDF" width="30%">' . $row['service_other'] . '</td>';
                $html .= '<td class="tabDetailViewDL" width="20%">&nbsp;</td>';
                $html .= '<td class="tabDetailViewDF" width="30%">&nbsp;</td>';
                $html .= '</tr>';
            }
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="20%">Tel</td>';
            $html .= '<td class="tabDetailViewDF" width="30%">' . $row['tel'] . '</td>';
            $html .= '<td class="tabDetailViewDL" width="20%">Fax</td>';
            $html .= '<td class="tabDetailViewDF" width="30%">' . $row['fax'] . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="20%">Address</td>';
            $html .= '<td class="tabDetailViewDF" width="30%">' . $row['address'] . '</td>';
            $html .= '<td class="tabDetailViewDL" width="20%">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF" width="30%">&nbsp;</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="20%">Contact</td>';
            $html .= '<td class="tabDetailViewDF" width="30%">' . $row['contact'] . '&nbsp;- &nbsp; ' . $row['contact_phone'] . '</td>';
            $html .= '<td class="tabDetailViewDL" width="20%">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF" width="30%">&nbsp;</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width="20%">Content</td>';
            $html .= '<td class="tabDetailViewDF" width="30%">' . html_entity_decode(nl2br($row['content'])) . '</td>';
            $html .= '<td class="tabDetailViewDL" width="20%">&nbsp;</td>';
            $html .= '<td class="tabDetailViewDF" width="30%">&nbsp;</td>';
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function get_groupprogram_for_export($id = '')
    {
        $sql = "select * from groupsprogramslines where groupprogram_id ='" . $id . "' and deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            if (!empty($row['section_of_date'])) {
                $section_of_date = translate('section_of_date_dom', '', $row['section_of_date']);
            }
            else {
                $section_of_date = translate('section_of_date_dom', '', '');
            }
            $html .= '<tr>';
            $html .= '<td>';
            if (!empty($row['date'])) {
                $html .= $row['date'];
            }
            else {
                $html .= $row['section_of_date'];
            }
            $html .= '</td>';
            $html .= '<td>';
            if (!empty($row['parent_name'])) {
                $html .= $row['parent_name'];
            }
            else {
                $html .= $row['service_other'];
            }
            $html .= '</td>';
            $html .= '<td>';
            $html .= html_entity_decode(nl2br($row['content']));
            $html .= '</td>';
            $html .= '<td>';
            $html .= html_entity_decode(nl2br($row['address']));
            $html .= '</td>';
            $html .= '<td>';
            $html .= $row['tel'] . '<br/>' . $row['fax'];
            $html .= '</td>';
            $html .= '<td>';
            $html .= html_entity_decode(nl2br($row['contact']));
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function get_pick_up_car_export($id = '')
    {
        $sql = "select * from pickupcars where groupprogram_id ='" . $id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr>';
            $html .= '<td>';
            $html .= '<table cellspacing="0" cellpadding="0" border="1" style="border_collapse: collapse">';
            $html .= '<tr>';
            $html .= '<td>';
            $html .= $row['number_plates'];
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>';
            $html .= $row['driver'] . '<br/>' . $row['driver_phone'];
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function get_sighitseeing_car_export($id = '')
    {
        $sql = "select * from sightseeingcars where groupprogram_id ='" . $id . "'And deleted =0";
        $result = $this->db->query($sql);
        $html = '';
        while ($row = $this->db->fetchByAssoc($result)) {
            $html .= '<tr>';
            $html .= '<td>';
            $html .= '<table cellspacing="0" cellpadding="0" border="1" style="border_collapse: collapse">';
            $html .= '<tr>';
            $html .= '<td>';
            $html .= $row['number_plates_sight'];
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td>';
            $html .= $row['driver_sight'] . '<br/>' . $row['driver_phone_sight'];
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
        }
        return $html;
    }

    function get_quanity($id)
    {
        $sql = "select * from fits f,groupprograms_fits_c gfc where gfc.groupprogr52d0rograms_ida ='" . $id . "' and gfc.groupprogr6551itsfits_idb = f.id and f.deleted = 0 and gfc.deleted = 0";
        $result = $this->db->query($sql);
        return $this->db->getRowCount($result);
    }

    function get_Group($id)
    {
        $sql = "select g.name as name from grouplists_roupprograms_c grc,grouplists g where grc.grouplistsf242rograms_idb = '" . $id . "' and g.id = grc.grouplists87eduplists_ida and grc.deleted=0 and g.deleted=0";
        $result = $this->db->query($sql);
        $row = $this->db->fetchByAssoc($result);
        return $row['name'];
    }

    /**
     * lay noi dung cua worksheet bang id $this->groupprogr53b5ksheets_idb
     * @return mixed $content (type is object)
     */
    function jk_get_worksheet_content()
    {
        global $db;
        $query = "select content,type from worksheets where id = '" . $this->groupprogr53b5ksheets_idb . "' and deleted = 0";
        //execute query
        $result = $db->query($query);
        //get row
        $row = $db->fetchByAssoc($result);
        //get content and decode
        $content = base64_decode($row['content']);
        $this->worsheet_type = $row['type'];
        return json_decode($content);
    }

    /**
     * @param $type: dich vu (Hotels hay Restaurants)
     * @return void
     */
    function jk_set_service_by_type($type = 'None')
    {
        global $app_list_strings;
        $app_list_strings['service_item_by_worksheet'] = array();
        if (!isset($this->work_sheet_content)) {
            $this->work_sheet_content = $this->jk_get_worksheet_content();
        }
        $content = $this->work_sheet_content;
        switch ($type) {
            case 'Hotels':
            if(strtolower($this->worsheet_type) == 'Inbound'){
               $hotels = array_merge($content->khachsan_mienbac, $content->khachsan_mientrung, $content->khachsan_miennam); 
            }
            else if(strtolower($this->worsheet_type) == 'dos')  {
                $hotels = $content->khachsan; 
            }
                if (isset($hotels)) {
                    foreach ($hotels as $item) {
                        //id cua nha hang
                        $id = $item->nh_id;
                        //name cua nha hang
                        $name = $item->nh_name;
                        $app_list_strings['service_item_by_worksheet'][$id] = $name;
                    }
                }
                break;
            case 'Restaurants':
            if(strtolower($this->worsheet_type) == 'Inbound'){ 
                $restaurants = array_merge($content->nhahang_mienbac,$content->nhahang_mientrung,$content->nhahang_miennam);
            }
             else if(strtolower($this->worsheet_type) == 'dos')  {
                  $restaurants = $content->nhahang;
             }
                if (isset($restaurants)) {
                    foreach ($restaurants as $item) {
                        //id cua nha hang
                        $id = $item->nh_id;
                        //name cua nha hang
                        $name = $item->nh_name;
                        $app_list_strings['service_item_by_worksheet'][$id] = $name;
                    }
                }
                break;
            default:
                $app_list_strings['service_item_by_worksheet']['None'] = '';
                break;
        }
    }

    function bean_implements($interface)
    {
        switch ($interface) {
            case 'ACL':
                return true;
        }
        return false;
    }
}

?>
