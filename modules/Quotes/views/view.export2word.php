<?php
    require_once('modules/Tours/Tour.php');
    require_once('modules/Quotes/Quotes.php');
    require_once('modules/Tours/Forms.php');

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            $focus = new Tour();
            $quotes = new Quotes();
            global $sugar_config, $mod_strings;
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR
            $record         = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            $department     = isset($_GET["department"]) ? htmlspecialchars($_GET["department"]) : '';
            $template = file_get_contents('modules/Quotes/tpls/export.tpl');
            $quotes->retrieve($record);
            $focus->retrieve($quotes->quotes_toufa8brstours_idb);
            $content = $quotes->cost_detail;
            $content = base64_decode($content);
            $content = json_decode($content);
            
            $template = str_replace('{SITE_URL}',$sugar_config['site_url'],$template);   
            
            if(!empty($focus->picture)){
                $img = "<img src='".$sugar_config['site_url']."/modules/images/".$focus->picture."' width='600' height='350'/>";
            }else{
                $template = str_replace("{PICTURE}",'',$template); 
            }
            $html = '';
            if($quotes->department == 'dos'){
                $html .= '<table cellpadding="0" cellspacing="0" width="100%" border="0" class="content1">';
                $html .= '<tr><td>&nbsp;&nbsp; </td> </tr>';
                $html .= '<tr><td align="center"><i>'.$mod_strings['LBL_MOD_STRING_DOS_HEAD'].'</i></td> </tr>' ;
                $html .= '<tr><td align="center" style="font-size: 24px;">'.$focus->name.'</td></tr>';
                $html .= '<tr><td align="justify">'.$focus->description.' </tr>';
                $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" align="center">'.$img.'</td>';
                $html .= '</tr>';
                $html .= '<tr>';
                $html .= '<td class="tabDetailViewDL" align="left"><p>Thời gian : '.$focus->duration.' <br/> Mã tour: '.$focus->tour_code.' <br/> Phương tiện : '.$focus->transport2.' <br/> Khởi hành : '.$focus->start_date.'</p></td>';
                $html .= '</tr>';
                $html .= '</table> ';
                $template = str_replace('{HEAD}',$html,$template); 
                $html = '';
                $cost_detail =  $content->dos_cost_detail;
                if(count($cost_detail)>0){
                    $html .= '<div id="dos" align="center"><table width="100%" class="table_clone" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse">';
                    $html .= '<thead>';
                      $html .= '<tr height="15">';
                        $html .= '<td class="tdborder" rowspan="2" style="text-align:center">'.$mod_strings['LBL_DOS_TICKET_VN'].'</td>';
                        $html .= '<td class="tdborder" colspan="2" style="text-align:center">'.$mod_strings['LBL_DOS_TOUR_COST_VN'].'</td>';
                        $html .= '<td class="tdborder" colspan="2" style="text-align:center">'.$mod_strings['LBL_DOS_SURCHANGE_VN'].'</td>';
                      $html .= '</tr>';
                      $html .= '<tr height="15">';
                        $html .= '<td class="tdborder" style="text-align:center">'.$mod_strings['LBL_DOS_FARE_VN'].'</td>';
                        $html .= '<td class="tdborder" style="text-align:center">'.$mod_strings['LBL_DOS_FACILITY_COST_VN'].'</td>';
                        $html .= '<td class="tdborder" style="text-align:center">'.$mod_strings['LBL_DOS_SINGLE_ROM_VN'].'</td>';
                        $html .= '<td class="tdborder" style="text-align:center">'.$mod_strings['LBL_DOS_FOREIGN_VN'].'</td>';
                      $html .= '</tr>';
                      $html .= '</thead>';
                      $html .= '<tbody>';
                if(count($cost_detail)>0){
                    foreach($cost_detail as $val){
                        $html .= '<tr height="15">';
                            $html .= '<td class="tdborder" align="center">'.translate('quotes_dos_hotel_standard','',$val->dos_hotel_standard).'</td>';
                            $html .= '<td class="tdborder" align="center">'.number_format($val->ticket_cost,0,'','.').'</td>';
                            $html .= '<td class="tdborder" align="center">'.number_format($val->facility_cost,0,'','.').'</td>';
                            $html .= '<td class="tdborder" align="center">'.number_format($val->single_room,0,'','.').'</td>';
                            $html .= '<td class="tdborder" align="center">'.number_format($val->foreign,0,'','.').'</td>';
                      $html .= '</tr>';
                    }
                }
                $html .= '</tbody>';
                $html .= '</table> </div> ';
                $template = str_replace('{COST_DETAIL}',$html,$template); 
                }
                
                $html = '';
                $html .= '<h3 align="center">GIÁ TOUR TRỌN GÓI CHO CÁC DỊCH VỤ:</h3>';
                $html .= '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><h2><u><b>I. GIÁ TRÊN BAO GỒM:</b></u></h2></td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><u><b>Vận chuyển:</b></u><br/>'.html_entity_decode(nl2br($quotes->transport)) .'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><u><b>Khách sạn:</b></u><br/>'.html_entity_decode(nl2br($quotes->hotel)).'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><u><b>Hướng dẫn viên</b></u>: <br/> '.html_entity_decode(nl2br($quotes->guide)).'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><u><b>Tham quan</b></u><br/>'.html_entity_decode(nl2br($quotes->room)).'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><u><b>Ăn uống</b></u>: '.html_entity_decode(nl2br($quotes->food)).'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><u><b>Bảo hiểm</b></u>: <br/>'.html_entity_decode(nl2br($quotes->insurance)).'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><u><b>Khăn, nón, nước và quà tặng</b></u>: <br/>'.html_entity_decode(nl2br($quotes->other)).'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                 $html .= '<tr>';
                    $html .= '<td>&nbsp;</td>';
                 $html .= '</tr>';
                    $html .= '<td align="justify"><h2><u><b>II. GIÁ TRÊN KHÔNG BAO GỒM :</b></u></h2></td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify">'.html_entity_decode(nl2br($quotes->not_content)).'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify"><h2><u><b>III.GIÁ TOUR DÀNH CHO TRẺ EM</b></u> :</h2></td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify">'.html_entity_decode(nl2br($quotes->child_cost)).'</td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="center"><h2>THÔNG TIN HƯỚNG DẪN</h2></td>';
                 $html .= '</tr>';
                 $html .= '<tr>';
                    $html .= '<td align="justify">'.html_entity_decode(nl2br($quotes->surcharge)).'</td>';
                 $html .= '</tr>';
                $html .= '</table>';
                
                $html .= '<p align="center"> <br/> <b>CARNIVAL TOURS HÂN HẠNH PHỤC VỤ QUÝ KHÁCH</b> </p>' ;
                
                
                $template = str_replace('{DETAIL}',$html,$template);  
            }
            elseif($quotes->department == 'ib'){
                    $html .= '<p align="center" style="font-size: 24px;">'.$focus->name.'</p>';
                    $html .= '<table align="center" cellpadding="0" cellspacing="0">';
                        $html .= '<tr> <td>Duration : </td> <td>'.$focus->duration.'</td></tr>';
                        $html .= '<tr> <td>Code tour : </td> <td>'.$focus->tour_code.'</td></tr>';
                        $html .= '<tr> <td>Start : </td> <td>'.$focus->start_date.'</td></tr>';
                        $html .= '<tr> <td>Transport : </td> <td>'.$focus->transport2.'</td></tr>';
                        $html .= '<tr> <td>Depart from : </td> <td>Ha Noi City</td></tr>';
                    $html .= '</table>';
                    
                    $html .= '<div align="center">'.$img.'</div>';
                    $template = str_replace("{HEAD}",$html,$template); 
                    
                    $html = '';
                   $cost_detail_head = $content->cost_detail_head;
                $ib_cose_detai = $content->ib_cose_detai;
                
                $html .= '<div id="inbound">';
                    $html .= '<table width="100%" border="1" class="table_clone" cellspacing="0" cellpadding="2" style="border-collapse:collapse">';
                    $html .= '<thead>';
                      $html .= '<tr height="15">';
                        $html .= '<td colspan="7" style="text-align:center" class="tdborder"><strong>'.$mod_strings['LBL_IB_TABLE_TITLE'].'</strong></td>';
                      $html .= '</tr>';
                      $html .= '<tr height="15">';
                        $html .= '<td class="tdborder"><strong>'.$mod_strings['LBL_IB_GROUP_SIZE'].'</strong></td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site1.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site2.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site3.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site4.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site5.'</td>';
                        $html .= '<td class="tdborder">'.$cost_detail_head->group_site6.'</td>';
                      $html .= '</tr>';
                      $html .= '</thead>';
                      $html .= '<tbody>';
                if(count($ib_cose_detai)>0){
                    foreach($ib_cose_detai as $val){
                        $html .= '<tr height="15">';
                            $html .= '<td class="tdborder">'.translate('quotes_ib_hotel_standard','',$val->ib_hotel_standard).'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site1_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site1_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site1_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site1_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site1_cost.'</td>';
                            $html .= '<td class="tdborder">'.$val->group_site1_cost.'</td>';
                        $html .= '</tr>';
                    }
                }
                $html .= '</tbody>';
                $html .= '</table>';
                $html .= '</div>'; 
                $template = str_replace('{COST_DETAIL}',$html,$template);
                
                
               $html = '';
                $html .= '<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                   $html .= '<tr bgcolor="#CCCCCC">';
                     $html .= '<td align="center">'.$mod_strings['LBL_IB_INCLUDE'].'</td>';
                     $html .= '<td align="center">'.$mod_strings['LBL_IB_EXCLUDE'].'</td>';
                   $html .= '</tr>';
                   $html .= '<tr>';
                     $html .= '<td align="justify">'.html_entity_decode_utf8(nl2br($quotes->ib_include)).'</td>';
                     $html .= '<td align="justify">'.html_entity_decode_utf8(nl2br($quotes->not_content)).'</td>';
                   $html .= '</tr>';
                   $html .= '<tr bgcolor="#CCCCCC">';
                     $html .= '<td colspan="2" align="center">'.$mod_strings['LBL_IB_EXPORT_HOTEL'].'</td>';
                   $html .= '</tr>';
                   $html .= '<tr>';
                     $html .= '<td colspan="2" align="justify">'.html_entity_decode_utf8(nl2br($quotes->hotel)).'</td>';
                   $html .= '</tr>';
                   $html .= '<tr bgcolor="#CCCCCC" align="justify">';
                     $html .= '<td colspan="2" align="center">'.$mod_strings['LBL_IB_EXPORT_SURCHARGE'].'</td>';
                   $html .= '</tr>';
                   $html .= '<tr>';
                     $html .= '<td colspan="2" align="justify">'.html_entity_decode_utf8(nl2br($quotes->surcharge)).'</td>';
                   $html .= '</tr>';
                   $html .= '<tr bgcolor="#CCCCCC">';
                     $html .= '<td colspan="2" align="center">'.$mod_strings['LBL_IB_EXPORT_CHILD_POLICY'].'</td>';
                   $html .= '</tr>';
                   $html .= '<tr>';
                     $html .= '<td colspan="2" align="justify">'.html_entity_decode_utf8(nl2br($quotes->child_cost)).'</td>';
                   $html .= '</tr>';
                $html .= '</table>';
                
                $html .= '<p> &nbsp;</p>';
                $html .= '<p align="center">CARNIVAL TOURS – WITH YOU ALL THE WAY!</p>';
                
                $template = str_replace('{DETAIL}',$html,$template);
               
            }
            elseif($quotes->department == 'ob'){
                $html .= '<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<tr>';
                        $html .= '<td align="center">Chương trình du lịch</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td align="center"><font size="18pt">'.$focus->name.'</font></td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td>';
                            $html .= '<table align="center" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                                $html .= '<tr>';
                                    $html .= '<td align="left">Thời gian : '.$focus->duration.'</td>';
                                $html .= '</tr>';
                                $html .= '<tr>';
                                    $html .= '<td align="left">Tour Code : '.$focus->tour_code.'</td>'; 
                                $html .= '</tr>'; 
                                $html .= '<tr>'; 
                                    $html .= '<td align="left">Khởi hành : '.date('d/m/Y',strtotime($focus->start_date)).'</td>';   
                                $html .= '</tr>'; 
                                
                            $html .= '</table>';
                        $html .= '</td>';
                    $html .= '</tr>';
                $html .= '</table>';
                
                $html .= '<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">';
                    $html .= '<tr>';
                        $html .= '<td> Lịch bay tham khảo </td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td> <br/>'.html_entity_decode_utf8(nl2br($quotes->flight_schedules)).'</td>';
                    $html .= '</tr>';
                $html .= '</table>';
                
                $template = str_replace("{HEAD}",$html,$template); 
                
                $html = '';
                $ob_cost_detail = $content->ob_cost_detail; 
                $html .= '<table width="100%" border="0" class="table_clone" cellspacing="0" cellpadding="2" style="border-collapse:collapse">';
                        $html .= '<tr>';
                             $html .= '<td align="center">Giá: '.$ob_cost_detail->price.' '.translate('currency_dom','',$ob_cost_detail->currency).' + '.$ob_cost_detail->tax.' '.translate('currency_dom','',$ob_cost_detail->currency).'(Thuế) '.$ob_cost_detail->total_price.' '.translate('currency_dom','',$ob_cost_detail->currency).' </td>';
                        $html .= '</tr>';
                        $html .= '<tr>';
                            $html .= '<td align="center">'.html_entity_decode_utf8(nl2br($ob_cost_detail->price_note)).'</td>';
                        $html .= '</tr>';
                     $html .= '</table>';
                $template = str_replace('{COST_DETAIL}',$html,$template);
                $html = '';
                $html .= '<table cellspacing="0" cellpadding="0" border="0" style="border-collaspe:collapse" width="100%">';
                    $html .= '<tr>';
                        $html .= '<td> <u><b>'.$mod_strings['LBL_OB_INCLUDE_EXPORT'].'</b></u><br/>'.html_entity_decode_utf8(nl2br($quotes->ib_include)).'</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td><br/> <u><b>'.$mod_strings['LBL_OB_EXCLUDE_EXPORT'].'</b></u><br/>'.html_entity_decode_utf8(nl2br($quotes->not_content)).'</td>';
                    $html .= '</tr>';
                    $html .= '<tr>';
                        $html .= '<td><br/> <u><b>'.$mod_strings['LBL_OB_NOTE_EXPORT'].'</b></u><br/>'.html_entity_decode_utf8(nl2br($quotes->ob_notes)).'</td>';
                    $html .= '</tr>';
                $html .= '</table>';
                
                $html .= '<p align="center"><font size="14pt">Carnival Tours Kính Chúc Quý Khách Một Chuyến Du Lịch Vui Vẻ. </p></p>';
                
                $template = str_replace('{DETAIL}',$html,$template); 
                
                
            }
            $template = str_replace("{TOUR_PROGRAM_LINE_DETAIL}", html_entity_decode_utf8($focus->get_data_to_expor2word($focus->id)),$template);
             

            $size=strlen($template);
            $filename = $quotes->name.".doc";
            ob_end_clean();
            header("Cache-Control: private");
            header("Content-Type: application/force-download;");
            header("Content-Disposition:attachment; filename=\"$filename\"");
            header("Content-length:$size");
            echo $template;
            ob_flush(); 
        }  // end function
    } // end class
?>
