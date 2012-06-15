<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class  Tour extends SugarBean
{

    var $new_schema = true;
    var $module_dir = 'Tours';
    var $object_name = 'Tour';
    var $table_name = 'tours';
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
    var $description;
    var $tour_code;
    var $noiden;
    var $description_pro;
    var $date_time;
    var $start_date;
    var $end_date;
    var $division;
    var $contract_value;
    var $tour_name;
    var $currency;
    var $destination;
    var $note;
    var $operator;
    var $operator_id;
    var $transport;
    var $duration;
    var $picture;
    var $deparment;
    var $destination_from_id;
    var $tour_type;
    var $destination_to_id;
    var $accounts_tours_name;
    var $accounts_t4d21ccounts_ida;
    var $is_template;
    var $template_name;
    var $area;
    var $synced;
    var $is_hot_tour;
    var $is_favorite_tour;
    var $is_active;
    var $show_in_home;
    var $order_num;
    var $frame_type;

    /**
     * Default consturctor
     * @return void
     */
    function Tour()
    {
        global $sugar_config;
        parent::SugarBean();
        $this->getDestinationToList();
    }

    /**
     * Get summary text
     * Text for Last view bar
     * @return string
     */
    function get_summary_text()
    {
        return "$this->name";
    }

    /**
     * Count programe line
     * @return int
     */
    function get_tour_program_line_count()
    {
        $result = $this->get_tour_program_lines($this->id);
        $n = $this->db->getRowCount($result);
        return $n;
    }

    function getEditViewHTMLTourProgramLines()
    {

        global $sugar_config, $app_list_strings;
        $result = $this->get_tour_program_lines($this->id);
        $html = "";
        $count = 0;
        $list_countries = get_select_options_with_id(Country::get_list_countries(), '');
        while ($row = $this->db->fetchByAssoc($result)) {
            $count++;
            /**
             * Xu li destination
             */
            // khoi tao phan tu dau tien cua list select/option
            $location_html = '<option data-description=""value="">None</option>';
            $lc_selected_count = 0;
            //neu destination rong~
            if (!empty($row['destination'])) {
                //get selected destination
                $des_selected = json_decode(base64_decode($row['destination']));
                $des_selected_count = is_array($des_selected) ? count($des_selected) : 0;
                //generate option list of destination
                $parent = get_select_options_with_id($app_list_strings['destination_dom_list'], $des_selected);
                if ($des_selected_count) {
                    // load location theo nhung destination da chon
                    $location = $this->getLocationsByDes($des_selected);
                    // lay du lieu location da chon tu database
                    $location_selected = json_decode(base64_decode($row['location'], true));
                    ///dem xem co bao nhieu location da duoc chon
                    $lc_selected_count = (is_array($location_selected) && count($location) > 0) ? count($location_selected) : 0;
                    foreach ($location as $l) {
                        //description
                        $des = ($l['description'] != null) ? $l['description'] : '';
                        //id
                        $id = $l['id'];
                        $name = $l['name'];
                        $str_seected = '';
                        if (is_array($location_selected))
                            $str_seected = (in_array($l['id'], $location_selected)) ? 'selected' : '';

                        $location_html .= '<option ' . $str_seected . ' data-description="' . $des . '" value="' . $id . '">' . $name . '</option>';
                    }
                }
            }
            else {
                $parent = get_select_options_with_id($app_list_strings['destination_dom_list'], '');
            }
            //    echo "<!--";print_r($parent); echo "-->";
            $list_countries = get_select_options_with_id($app_list_strings['countries_dom'],'');
            $html .= '<tr id="TR_table_clone_' . $count . '">';
            $html .= '<td>';
            $html .= '<fieldset>';
            $html .= '<table  cellpadding="0" cellspacing="0" width="100%" class="tabForm">';
            $html .= '<tr>' .
                '<td colspan="8">' .
                '<h2 class="font_6 in_line">NGÀY <span class="day_num">' . $count . '</span>:</h2>' .
                '</td>' .
                '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Title:</td>';
            $html .= '<td class="dataField"><input type="text" name="title[]" size="35" id="title_' . $count . '" value="' . $row['title'] . '"/></td>';
            $html .= '<td class="dataLabel">&nbsp;</td>
                                        <td class="dataField" colspan="5">
                                           &nbsp;
                                        </td>';
            $html .= '</tr>';
            $html .= '<tr>
                        <td class="dataLabel">
                                Countries:
                            </td>
                            <td class="dataField">
                                <select name="tour_country" class="jk_list_countries" multiple="multiple" size="4">
                                    '.$list_countries.'
                                </select>
                            </td>
                            <td class="dataLabel">
                                Areas:
                            </td>
                            <td class="dataField">
                                <select name="tour_country" class="jk_list_areas" multiple="multiple" size="4">
                                    <option value="">--None--</option>
                                </select>
                            </td>
                            <td class="dataLabel">
                                Cities:
                            </td>
                            <td class="dataField">
                                <select name="destinations[]" class="jk_list_destinations" multiple="multiple" size="4">
                                    '. $parent .'
                                </select>
                                <input type="hidden" value="' . $des_selected_count . '" name="destination_selected_count[]"/>
                            </td>
                            <td class="dataLabel">
                                <span>Locations:</span>

                            </td>
                            <td class="dataField">
                                <select multiple="multiple" name="locations[]" class="jk_list_locations" size="4"
                                        data-editorId="description_pro_'.$count.'">
                                    '. $location_html.'
                                </select>
                                <input type="hidden" value="' . $lc_selected_count . '" name="location_selected_count[]"/>
                            </td>
                    </tr>';
           /* $html .= '<td colspan="2">';
            $html .= '<span>Countries:</span>';
            $html .= '<select multiple size="3">';
            $html .= $list_countries;
            $html .= '</select>';
            $html .= '<span>Areas:</span>';
            $html .= '<select multiple size="3">';
            $html .= '<option value="">--None--</option>';
            $html .= '</select>';
            $html .= '<span>Cities:</span>';
            $html .= '<select name="destinations[]" class="jk_list_destinations" multiple="multiple" size="4">';
            $html .= $parent;
            $html .= '</select>';
            $html .= ' <input type="hidden" value="' . $des_selected_count . '" name="destination_selected_count[]"/>';
            // $html .= '<td class="dataLabel">Type <select id="parent" name="parent[]" class="parent">'.$parent.'</select> </td>';
            $html .= '' .
                '<span>Locations:</span>' .
                '<select multiple="multiple" name="locations[]" class="jk_list_locations" size="4" data-editorId="description_pro_' . $count . '">' .
                $location_html .
                '</select>' .
                ' <input type="hidden" value="' . $lc_selected_count . '" name="location_selected_count[]"/>' .
                '</td>';

            //$html .= '<td class="dataLabel">Destination</td>' ;
            //$html .= '<td class="dataField"><input type="text" name="destination[]" size="35" id="destination" value="'.$row['destination'].'"/></td>';
            $html .= '</tr>';*/
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Notes</td>';
            $html .= '<td class="dataField" colspan="5"><input type="text" name="notes[]" size="35" id="notes_' . $count . '" value="' . $row['notes'] . '"/></td>';
            // $html .= '<td class="dataLabel">Picture</td>';
            $html .= ' <td class="dataLabel">' .
                'Picture:' .
                '</td>';
            $html .= '<td class="dataField"><input type="file" name="uploadfile[]" id ="uploadfile" /> </td>';

            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="dataLabel">Description</td>';
            $html .= '<td class="dataField" colspan="5"><textarea  class="jk_editor" cols="75" rows="15" id="description_pro_' . $count . '" name="description_pro[]">' . html_entity_decode($row['description'], ENT_COMPAT, 'UTF-8') . '</textarea> <input type="hidden" class="id" name="tour_program_id[]" id="tour_program_id_' . $count . '" value="' . $row['id'] . '"/>

                                            <input type="hidden" name="deleted[]" class="deleted" id="deleted_' . $count . '" value="0"/>
                                            <input type="hidden" name="images[]" id="images_' . $count . '" value="' . $row['picture'] . '"/> </td>';
            $html .= '<td class="dataLabel"></td>';
            if (!empty($row['picture'])) {
                $html .= '<td class="tour_program_image dataField"> <img src="' . $sugar_config['site_url'] . "/modules/images/" . $row['picture'] . '" width="300" height="300"/> </td>';
            }
            else {
                $html .= '<td class="dataLabel tour_program_image">&nbsp;</td>';
            }

            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</fieldset>';
            $html .= '</td>';
            $html .= '<td>';
            $html .= '<input type="button" class="btnAddRow" value="Add row"/>';
            $html .= '<input type="button" class="btnDelRow" value="Delete row"/>';

            $html .= '</td>';
            $html .= '</tr>';

        }
        //echo $html;
        return $html;
    }

    /**
     * Generate html for Detail view
     * @param $id of tour
     * @return string HTML
     */
    function getDetailViewHTMLTourProgramDetail($id)
    {
        global $sugar_config, $app_list_strings;
        $result = $this->get_tour_program_lines($id);
        $html = "";

        $i = 1;
        while ($row = $this->db->fetchByAssoc($result)) {
            $tp_destination = json_decode(base64_decode($row['destination']));
            $tp_locations = json_decode(base64_decode($row['location']));
            $ds = $app_list_strings['destination_dom_list'];
            $destination_html = "";
            $location_html = "";
            if (count($tp_destination) > 0) {
                $destination_html = "<ul>";
                foreach ($tp_destination as $id) {
                    $destination_html .= "<li>" . $ds[$id] . "</li>";
                }
                $destination_html .= "</ul>";

                $location_html = '<ul>';

                $lcs = $this->getLocationsByDes($tp_destination);
                foreach ($lcs as $lc) {
                    if (in_array($lc['id'], $tp_locations)) {
                        $location_html .= '<li>' . $lc['name'] . '</li>';
                    }
                }
                $location_html .= '</ul>';

            }

            $html .= '<tr>';
            $html .= '<td>';
            $html .= '<fieldset>';
            $html .= '<table cellpadding="0" cellspacing="0" border="0" width="100%" style="border: 1px solid;">';
            $html .= '<tr>' .
                '<td colspan="4">' .
                '<h2 class="font_6">NGÀY: ' . $i . '</h2>' .
                '</td>' .
                '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width ="15%" >Title:</td>';
            $html .= '<td class="tabDetailViewDF" width ="35%">' . $row['title'] . '</td>';
            $html .= '<td class="tabDetailViewDL" width ="15%" >Destinations:</td>';
            $html .= '<td class="tabDetailViewDF" width ="35%">' . $destination_html . '</td>';
            $html .= '</tr>';

            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width ="15%" >Notes</td>';
            $html .= '<td class="tabDetailViewDF">' . $row['notes'] . '</td>';
            $html .= '<td class="tabDetailViewDL" width ="15%" >Location: </td>';
            $html .= '<td class="tabDetailViewDF" width ="35%">' . $location_html . '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td class="tabDetailViewDL" width ="15%">Description</td>';
            # $html .= '<!--' . $row['description_pro'] . '-->';
            $html .= '<td class="tabDetailViewDF" width ="35%">' . html_entity_decode($row['description'], ENT_QUOTES, 'UTF-8') . '</td>';
            $html .= '<td class="tabDetailViewDL" width ="15%">&nbsp;</td>';
            if (!empty($row['picture'])) {
                $html .= '<td class="tabDetailViewDF" width ="35%"> <img src="' . $sugar_config['site_url'] . "/modules/images/" . $row['picture'] . '" width="300" height="300"/> </td>';
            }
            else {
                $html .= '<td class="tabDetailViewDF" width ="35%">&nbsp;</td>';
            }
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</fieldset>';
            $html .= '</td>';
            $html .= '</tr>';
            $i++;
        }
        //echo $html;
        return $html;
    }

    /**
     * Get tour programe lines by tour id
     * @param $id id of tour
     * @return resource
     */
    public function get_tour_program_lines($id)
    {
        $sql = "select * from tourprograms where tour_id = '" . $id . "' and deleted =0";
        $this->db->query("SET NAMES 'utf8'");
        $result = $this->db->query($sql);
        return $result;
    }

    function get_data_to_expor2word($id = 0)
    {
        $ID = ($id > 0) ? $id : $this->id;
        global $sugar_config;
        $result = $this->get_tour_program_lines($ID);
        $html = "";

        $i = 1;
        while ($row = $this->db->fetchByAssoc($result)) {
            if (!empty($row['picture'])) {
                $img = $sugar_config['site_url'] . "/modules/images/" . $row['picture'];
            }
            else {
                $img = '';
            }
            //title
            $html .= "<p class=MsoNormal style='margin-top:3.0pt;margin-right:0in;margin-bottom:3.0pt;
            margin-left:0in;text-align:justify;line-height:115%'><b style='mso-bidi-font-weight:
            normal'><u><span style='color:blue'> Ngày $i " . $row['title'] . "<o:p></o:p></span></u></b></p>";
            //note
            $html .= "<p class=MsoNormal style='margin-top:3.0pt;margin-right:0in;margin-bottom:3.0pt;
            margin-left:0in;text-align:justify;line-height:115%'><b style='mso-bidi-font-weight:
            normal'><i style='mso-bidi-font-style:normal'><span lang=FR style='mso-ansi-language:
            FR'>" . $row['notes'] . "</span></i></b></p>";
            //body
            $html .= "<p class=MsoBodyText style='line-height:115%'>";
            //image
            if (!empty($img)) {
                $html .= '<!--[if gte vml 1]>
                    <v:shape id="Picture_x0020_12"
                             o:spid="_x0000_s1027" type="#_x0000_t75"
                             alt="Description: Description: http://files.myopera.com/phanthietvn/blog/94413770.jpg"
                             style="position:absolute;margin-left:113pt;margin-top:15.6pt;width:153pt;
                 height:111.5pt;z-index:-251658240;visibility:visible;mso-wrap-style:square;
                 mso-width-percent:0;mso-height-percent:0;mso-wrap-distance-left:9pt;
                 mso-wrap-distance-top:0;mso-wrap-distance-right:9pt;
                 mso-wrap-distance-bottom:0;mso-position-horizontal:right;
                 mso-position-horizontal-relative:margin;mso-position-vertical:absolute;
                 mso-position-vertical-relative:text;mso-width-percent:0;mso-height-percent:0;
                 mso-width-relative:page;mso-height-relative:page">
                        <v:imagedata src="' . $img . '" o:title="94413770"/>
                        <w:wrap type="square" anchorx="margin"/>
                    </v:shape>
                    <![endif]-->
                    <![if !vml]>
                    <img width=204 height=149 src="' . $img . '"
                         align=right hspace=12 alt="Description: Description: http://files.myopera.com/phanthietvn/blog/94413770.jpg"
                         v:shapes="Picture_x0020_12"><![endif]>';
            }
            $html .= $row['description'];
            $html .= "</p>";
            $i++;

        }
        //echo $html;
        return $html;
    }

    function getDestinationToList()
    {
        global $db, $app_list_strings;
        $sql = "select name,id from destinations where deleted =0";
        $result = $db->query($sql);
        while ($row = $db->fetchByAssoc($result)) {
            $app_list_strings['destination_dom_list'][$row['id']] = $row['name'];
        }
    }

    public static function destinationToList()
    {
        global $db, $app_list_strings;
        $sql = "select name,id from destinations where deleted =0";
        $result = $db->query($sql);
        while ($row = $db->fetchByAssoc($result)) {
            $app_list_strings['destination_dom_list'][$row['id']] = $row['name'];
        }
    }

    function getLocationsByDes($des_ids)
    {
        global $db, $app_list_strings;
        if ($des_ids != null) {
            if (is_array($des_ids)) {
                $whereClause = "";
                $t = true;
                foreach ($des_ids as $id) {
                    if ($t) {
                        $whereClause .= " or ";
                        $t = false;
                    }
                    $whereClause .= "destinatio010enations_ida = '$id'";
                }
                $query = "SELECT DISTINCT dl.destinatio2a7dcations_idb AS id, l.name, l.description " .
                    "FROM locations l JOIN destinations_locations_c dl ON l.id = dl.destinatio2a7dcations_idb " .
                    ' where 1>1 ' . $whereClause;
                $result = $db->query($query);

                $locations = array();

                while ($row = $db->fetchByAssoc($result)) {
                    $location = array();
                    $location["name"] = $row["name"];
                    $location["description"] = $row["description"];
                    $location["id"] = $row['id'];
                    $locations[] = $location;
                    //  array_push($locations,$location);
                    $app_list_strings['location_dom_list'][$row['id']] = $row['name'];
                }

                return $locations;
            }
        }
        return null;
    }

    function fill_field($fields = array())
    {
        foreach ($fields as $key => $value) {
            $this->$key = $value;
        }
    }

    public static function get_tour_num()
    {
        global $db;
        $query = "select count(*) as tour_num from tours where deleted = 0";

        $result = $db->query($query);
        $row = $db->fetchByAssoc($result);
        return $row['tour_num'];
    }
    public function getListAreas(){
        global $db;
        $query = "SELECT id, name,code FROM c_areas";
       $result = $db->query($query);
        $areas = array();
        while($row = $db->fetchByAssoc($result)){
            $area = array();
            $area['id'] = $row['id'];
            $area['name'] = $row['name'];
           $area['code'] = $row['code'];
            $areas[] = $area;
        }
        return $areas;
    }
    function  sync()
    {

        if (!$this->synced) {
            return $this->SaveToSqlServer();
        }
        return false;
    }

    function SaveToSqlServer()
    {
        global $sugar_config, $app_list_strings;
        //db variables
        $db_username = "";
        $db_password = "";
        $db_server_name = "";
        $db_name = "";
        //query variables

        /*Connect server*/
        $config = $sugar_config['WebsiteDBConfig'];
        extract($config, EXTR_OVERWRITE);
        $connectionInfo = array(
            "UID" => $db_username,
            "PWD" => $db_password,
            "Database" => $db_name,
            "CharacterSet" => "UTF-8"
        );
        $con = sqlsrv_connect($db_server_name, $connectionInfo);
        if ($con == false) { //if connection not success
            sqlsrv_close($con);
            echo "Unable to connect";
            die(print_r(sqlsrv_errors(), true));
        }
        //Khoi tao mang tham so. insert vao db
        //noi den
        $destinations = explode('^,^', $this->noiden);
        $count = count($destinations);
        $i = 0;
        $noichon = "";
        foreach ($destinations as $des) {
            $noichon .= $app_list_strings['destination_dom_list'][$des];
            $noichon .= ($count - 1 > $i++) ? ", " : "";
        }
        // ten truong trinh tom tat
        $name_sumary = (strlen($this->name) > 33) ? substr($this->name, 0, 33) + "..." : $this->name;
        //tong quan
        $tongquan = $this->description;
        $tongquan .= "<br/>";
        // chi tiet truong trinh
        $chitiet = $this->GenerateChiTietTruongTrinh();
        $date_entered_arr = explode(' ', $this->date_entered);
        $date_arr = explode('/', $date_entered_arr[0]);
        $date_entered = $date_arr[1] . '/' . $date_arr[0] . '/' . $date_arr[2] . ' ' . $date_entered_arr[1];
        $params = array(
            $noichon,
            $noichon,
            $this->duration,
            $this->duration,
            $this->tour_code,
            $this->start_date,
            $this->name,
            $this->name,
            $name_sumary,
            $name_sumary,
            $tongquan,
            $tongquan,
            $chitiet,
            $chitiet,
            $this->contract_value,
            $this->contract_value,
            $this->type,
            $this->is_hot_tour,
            $this->is_favorite_tour,
            $date_entered,
            $this->is_active,
            $sugar_config['site_url'] . "/modules/images/" . $this->picture,
            $this->order_num,
            $this->show_in_home,
            $this->id
        );
        /** CHECK IS EXIST */
        $query = "SELECT Count(ID) as RowNo FROM Tours WHERE crm_tour_id = ?";
        $params_check_exist = array($this->id); //set param
        $result = sqlsrv_query($con, $query, $params_check_exist); ///get $result
        if ($result === false) {
            echo "Error in executing query!";
            die(print_r(sqlsrv_errors(), true));
        }
        $row = sqlsrv_fetch_array($result);
        if ($row['RowNo'] > 0) { //if exist then update
            $update_query = "UPDATE [Tours]
                      SET [Noichon] = ?, [NoiChonEN] = ?
                         ,[SoNgayDem] = ?, [SoNgayDemEN] = ?
                         ,[TourCode] = ?
                         ,[NgayKhoiHanh] = ? ,[TenChuongTrinh] = ? ,[TenChuongTrinhEN] = ?
                         ,[TenChuongTrinhTomTat] = ? ,[TenChuongTrinhTomTatEN] = ?
                         ,[TongQuan] =? ,[TongQuanEN] = ?
                         ,[ChiTiet] = ? ,[ChiTietEN] = ?
                         ,[GiaTours] = ? ,[GiaToursEN] = ?
                         ,[TypeTourID] = ?
                         ,[IsHotTours] = ?
                         ,[IsFavoriteTours] = ?
                         ,[CreatDate] =?
                         ,[Actives] = ?
                         ,[Avatar] = ?
                         ,[ViewSort] = ?
                         ,[ViewHome] = ?
                    WHERE crm_tour_id = ?";


            /* $result =  $this->get_tour_program_lines($this->id);*/


            $result = sqlsrv_query($con, $update_query, $params);
            if ($result === false) {
                echo "Error in executing query!";
                die(print_r(sqlsrv_errors(), true));
            }
            return true;
        }
        /**query**/
        $query = "INSERT INTO Tours (" .
            "Noichon, NoiChonEn, SoNgayDem, SoNgayDemEN, TourCode, NgayKhoiHanh, TenChuongTrinh," .
            "TenChuongTrinhEN, TenChuongTrinhTomTat, TenChuongTrinhTomTatEN, TongQuan, TongQuanEN, ChiTiet, ChiTietEN, GiaTours, GiaToursEN, TypeTourID," .
            "IsHotTours, IsFavoriteTours, CreatDate, Actives, Avatar, ViewSort, ViewHome,crm_tour_id) " .
            "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

        $result = sqlsrv_query($con, $query, $params);
        if ($result === false) {
            echo "Error in executing query!";
            die(print_r(sqlsrv_errors(), true));
        }
        return true;
        //clean
        sqlsrv_free_stmt($result);
        sqlsrv_close($con);
    }

    function GenerateChiTietTruongTrinh()
    {
        global $sugar_config;
        $result = $this->get_tour_program_lines($this->id);
        $html = "";

        $i = 1;
        while ($row = $this->db->fetchByAssoc($result)) {
            $notes = ($row['notes']) ? "(" . $row['notes'] . ")" : "";
            $html .= "<div>";
            $html .= "<strong style='text-decoration:underline'>Ngày $i: " . $row['name'] . "</strong>&nbsp;" . $notes . "<br/>";
            $html .= "<div style='min-height: 154px'>";
            $html .= html_entity_decode_utf8($row['description']);
            $html .= "<img width='196' style='float:right' src='" . $sugar_config['site_url'] . "/modules/images/" . $row['picture'] . "' alt='Image'/>";
            $html .= "</div>";
            $html .= "</div>";
            $i++;
        }
        //echo $html;
        return $html;
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
