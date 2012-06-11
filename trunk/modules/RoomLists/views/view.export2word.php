<?php
    require_once('modules/RoomLists/RoomLists.php');
    require_once('modules/RoomLists/Forms.php');        

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config;
            global $mod_strings;
            global $curent_language;
            $focus = new RoomLists();
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/RoomLists/tpls/RoomLists1.htm');
            $focus->retrieve($record);
            $template = str_replace('{SITE_URL}',$sugar_config['site_url'],$template);
            if($focus->department == 'ib' || $focus->department == 'ob'){
                $template = str_replace('{LBL_TITLE}',$mod_strings['LBL_TITLE'],$template);
                $template = str_replace('{LBL_TOUR}',$mod_strings['LBL_TOUR'],$template);
                $template = str_replace('{LBL_HOTEL_NAME}',$mod_strings['LBL_HOTEL_NAME'],$template);
                $template = str_replace('{LBL_ROOM_NAME}',$mod_strings['LBL_ROOM_NAME'],$template);
                $template = str_replace('{LBL_NUMBER}',$mod_strings['LBL_NUMBER'],$template);
                $template = str_replace('{LBL_CUS_NAME}',$mod_strings['LBL_CUS_NAME'],$template);
                $template = str_replace('{LBL_CUS_GENDER}',$mod_strings['LBL_GENDER'],$template);
                $template = str_replace('{LBL_PHONE}',$mod_strings['LBL_PHONE'],$template);
                $template = str_replace('{LBL_ROOM_TYPE}',$mod_strings['LBL_ROOM_TYPE'],$template);
                $template = str_replace('{LBL_ROOM_CLASS}',$mod_strings['LBL_ROOM_CLASS'],$template);
                $template = str_replace('{LBL_ROOM_REMARK}',$mod_strings['LBL_ROOM_REMARK'],$template);
                $template = str_replace('{LBL_ROOM_NOTE}',$mod_strings['LBL_ROOM_NOTE'],$template);
                $template = str_replace('{LBL_TOTAL}',$mod_strings['LBL_TOTAL'],$template);
                 
            }
            if($focus->department == 'dos'){
                $template = str_replace('{LBL_TITLE}','Danh sách phòng '.$focus->made_tour,$template);
                $template = str_replace('{LBL_TOUR}','Tên tour',$template);
                $template = str_replace('{LBL_HOTEL_NAME}','Khách sạn',$template);
                $template = str_replace('{LBL_ROOM_NAME}','SỐ PHÒNG',$template);
                $template = str_replace('{LBL_NUMBER}','STT',$template);
                $template = str_replace('{LBL_CUS_NAME}','HỌ VÀ TÊN',$template);
                $template = str_replace('{LBL_CUS_GENDER}','GIỚI TÍNH',$template);
                $template = str_replace('{LBL_PHONE}','SỐ ĐT',$template);
                $template = str_replace('{LBL_ROOM_TYPE}','LOẠI PHÒNG',$template);
                $template = str_replace('{LBL_TOTAL}','TỔNG CỘNG',$template);
            }
            $template = str_replace('{TOUR_NAME}',$focus->made_tour,$template);
            $template = str_replace('{HOTEL_NAME}',$focus->tenks,$template); 
            $made_tour_id = $focus->made_tour_id;
            $groupprogram =  new GroupProgram();
            $groupprogram ->retrieve($made_tour_id);
            $start_date = $groupprogram->start_date_group;
            $end_date = $groupprogram->end_date_group;
            $tour_code = $groupprogram->tour_code;
            $group_name = $groupprogram->grouplists_pprograms_name;
            
            $inbound = " <td width=104 valign=top style='width:77.7pt;border:solid windowtext 1.0pt;
                  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
                  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                  normal'>".$mod_strings['LBL_ROOM_CLASS']."</p>
                  </td>
                  
                  <td width=106 valign=top style='width:79.5pt;border:solid windowtext 1.0pt;
                      border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
                      solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                      <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                      normal'>".$mod_strings['LBL_ROOM_REMARK']."</p>
                      </td>";
            $dos = " <td width=102 valign=top style='width:76.8pt;border:solid windowtext 1.0pt;
              border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
              solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
              <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
              normal'>GHI CHÚ</p>
              </td> " ;
            
            if($focus->department == 'dos'){
                $name_label  = 'HỌ VÀ TÊN';
            }
            
            if($focus->department == 'ob'){
                $template = str_replace('{INBOUND}','',$template); 
                $template = str_replace('{DOS}','',$template);
                $head = "<p class=MsoNormal><b style='mso-bidi-font-weight:normal'>From :".$start_date." &nbsp;&nbsp;&nbsp; To : ".$end_date."<o:p></o:p></b></p>";
                $template = str_replace('{OUTBOUND_HEAD}',$head,$template);
                $cus_mun = $mod_strings['LBL_PAX'] ; 
            }
            
            if($focus->department == 'ib' || $focus->department == 'dos'){
                
                $cus_name_label = "<td width=210 valign=top style='width:157.5pt;border:solid windowtext 1.0pt;
                  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
                  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                  normal'><span class=SpellE>".$name_label."</span></p>
                  </td>";
            }
            if($focus->department == 'ob'){
                $cus_name_label = "<td width=210 valign=top style='width:157.5pt;border:solid windowtext 1.0pt;
                  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
                  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                  normal'><span class=SpellE>".$mod_strings['LBL_FIRST_NAME']."</span></p>
                  </td>
                  
                  <td width=210 valign=top style='width:157.5pt;border:solid windowtext 1.0pt;
                  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
                  solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt'>
                  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                  normal'><span class=SpellE>".$mod_strings['LBL_LAST_NAME']."</span></p>
                  </td>
                  
                  ";
            }
             $template = str_replace('{CUS_NAME}',$cus_name_label,$template);
              
            $html ="";
            $temp = base64_decode($focus->content);
            $noidung = json_decode($temp);
            $stt = 1;
            $total_room =0;
            if(count($noidung)>0){
                foreach($noidung as $val){
                    $total_room++;
                    $room_name  = $val->room_name;
                    $room_type = translate('roomlist_room_type_dom','',$val->room_type) ;
                    $room_class = $val->room_class;
                    $room_remark = $val->room_remark;
                    $room_number = $val->room_number;
                    $room_note = $val->room_note;
                    $list_cus   = $val->list_cus;
                    $count = count($list_cus);
                        $html .= "<tr style='mso-yfti-irow:1;mso-yfti-lastrow:yes'>";
                        $html .= "<td width=104 rowspan=".$count." valign=top style='width:78.35pt;border:solid windowtext 1.0pt;
                              border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
                              padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                              <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                              normal'><o:p>".$room_name."</o:p></p>
                              </td>";                   
                        $html .= "<td width=104 rowspan=".$count." valign=top style='width:77.7pt;border-top:none;
                                  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                                  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                                  normal'><o:p>".$room_type."</o:p></p>
                                  </td>" ;
                        if($focus->department == 'ib'){
                            $html .= "<td width=104 rowspan=".$count." valign=top style='width:77.7pt;border-top:none;
                                      border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                      mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                      mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                                      <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                                      normal'><o:p>".$room_class."</o:p></p>
                                      </td>";     //"<td width=128 style='width:95.75pt;border:solid windowtext 1.0pt;border-top:
                            $html .= "<td width=106 rowspan=".$count." valign=top style='width:79.5pt;border-top:none;
                                      border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                      mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                      mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                                      <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                                      normal'><o:p>".$room_remark."</o:p></p>
                                      </td>";
                        } 
                        if($focus->department =='dos'){
                           $html .= "<td width=102 rowspan=".$count." valign=top style='width:76.8pt;border-top:none;
                              border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                              <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                              normal'><o:p>".$room_note."</o:p></p>
                              </td>";
                        }
                        $cus_val = $list_cus[0];
                        $temp = explode('_',$cus_val);
                        $html .= "<td width=41 valign=top style='width:72.05pt;border-top:none;border-left:
                              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                              <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                              normal'><o:p>".$stt."</o:p></p>
                              </td>";
                        if($focus->department == 'ib' || $focus->department == 'dos'){
                           $cus_name  = $temp[1].' '.$temp['2'];
                          $html .= "<td width=147 valign=top style='width:72.05pt;border-top:none;border-left:
                              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                              <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                              normal'><o:p>".$cus_name."</o:p></p>
                              </td>"; 
                        }
                        if($focus->department == 'ob'){
                            $first_name  = $temp[1];
                            $last_name = $temp['2'];
                            $html .= "<td width=147 valign=top style='width:72.05pt;border-top:none;border-left:
                              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                              <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                              normal'><o:p>".$first_name."</o:p></p>
                              </td>"; 
                              $html .= "<td width=147 valign=top style='width:72.05pt;border-top:none;border-left:
                              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                              <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                              normal'><o:p>".$last_name."</o:p></p>
                              </td>";
                        }
                        $stt++;
                        for($i = 1;$i < count($list_cus);$i++){
                            $cus_val = $list_cus[$i];
                            $temp = explode('_',$cus_val);
                            $cus_name  = $temp[0];
                            $cus_gender  = $temp[1];
                            $cus_phone  = $temp[2];
                            $html .= "<tr style='mso-yfti-irow:2;height:4.5pt'>";
                              $html .= "<td width=41 valign=top style='width:72.05pt;border-top:none;border-left:
                              none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                              mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                              mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                              <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                              normal'><o:p>".$stt."</o:p></p>";
                              $html .= "</td>";
                               if($focus->department == 'ib' || $focus->department == 'dos'){
                                   $cus_name  = $temp[1].' '.$temp['2'];
                                  $html .= "<td width=147 valign=top style='width:72.05pt;border-top:none;border-left:
                                      none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                      mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                      mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                                      <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                                      normal'><o:p>".$cus_name."</o:p></p>
                                      </td>"; 
                                }
                                if($focus->department == 'ob'){
                                    $first_name  = $temp[1];
                                    $last_name = $temp['2'];
                                    $html .= "<td width=147 valign=top style='width:72.05pt;border-top:none;border-left:
                                      none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                      mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                      mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                                      <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                                      normal'><o:p>".$first_name."</o:p></p>
                                      </td>"; 
                                      $html .= "<td width=147 valign=top style='width:72.05pt;border-top:none;border-left:
                                      none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
                                      mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
                                      mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:4.5pt'>
                                      <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
                                      normal'><o:p>".$last_name."</o:p></p>
                                      </td>";
                                }
                             $html .= "</tr> ";
                            $html .= "</tr>";
                            $stt++;
                        }
                }
            }
            
            $total = $stt-1;
            if($focus->department == 'dos'){
                $name_label  = 'HỌ VÀ TÊN';
                $template = str_replace('{INBOUND}','',$template); 
                $template = str_replace('{DOS}',$dos,$template); 
                $head = "<p class=MsoNormal> Tên đoàn : ".$group_name." <br/>
                Tour Code: ".$tour_code." 
                <br/>Ngày khởi hành : ".$start_date." &nbsp;&nbsp;&nbsp; Ngày kết thúc : ".$end_date."
                <br/> Số Lượng : ".$total."  Khách
                </p>";
                $template = str_replace('{OUTBOUND_HEAD}',$head,$template); 
                $cus_mun = 'Khách' ;
                $template = str_replace('{TOTAL}','',$template); 
            }
            if ($focus->department == 'ob'){
                $template = str_replace('{TOTAL}',$mod_strings['LBL_TOTAL']." : ".$total.' '.$cus_mun,$template); 
            }
            
            if($focus->department == 'ib'){
               $template = str_replace('{INBOUND}',$inbound,$template); 
               $template = str_replace('{DOS}','',$template);
                $name_label = $mod_strings['LBL_CUS_NAME'];
                $cus_mun = $mod_strings['LBL_PAX'] ;
                $head = "<table width='100%' border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                        <td> Tour code: </td> <td>".$tour_code."</td>
                        <td> Party name </td> <td>".$focus->party_name." </td>
                    </tr>
                    <tr>
                         <td> Arival : </td> <td> ".$start_date." </td>
                         <td> Departure : </td> <td>".$end_date."</td>
                    </tr>
                    <tr>
                        <td> Number of pax : </td> <td>".$total."</td>
                        <td>Tour Guide: </td><td>".$focus->tour_guide."</td>
                    </tr>
                </table> ";
                $template = str_replace('{OUTBOUND_HEAD}',$head,$template); 
                $template = str_replace('{TOTAL}','Total room: '.$total_room,$template);                
            }
            
            
            
            $template = str_replace('{DATA_DETAIL}',$html,$template);
            $size=strlen($template);
            $filename = "Danh Sach Phong.doc";
            ob_end_clean();
            header("Cache-Control: private");
            header("Content-Type: application/force-download;");
            header("Content-Disposition:attachment; filename=\"$filename\"");
            header("Content-length:$size");
            echo $template;
            ob_flush(); 
        }
    }
?>
