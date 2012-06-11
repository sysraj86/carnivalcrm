<?php
    require_once('modules/Worksheets/Worksheets.php');

    class Viewexport2excel extends SugarView{
        
        function Viewexport2excel(){
            parent::SugarView();
        }
        function display(){
            $focus = new Worksheets(); 
            global $app_list_strings;            
            $template = '';
            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            global $sugar_config,$current_user;
            $focus->retrieve($record);
            $temp = base64_decode($focus->content); 
            $noidung = json_decode($temp);
            $tongtamung = 0;
            $nhtamung = 0;
            if($focus->type == "DOS"){
                $sql = "SELECT gl.name, gl.code
                        FROM groupprograms AS gp INNER JOIN grouplists_roupprograms_c gpgl ON gp.id = gpgl.grouplistsf242rograms_idb    
                        INNER JOIN grouplists gl ON gl.id = gpgl.grouplists87eduplists_ida WHERE gp.deleted =0 AND gl.deleted =0 AND gpgl.deleted =0 AND  gp.id ='".$focus->groupprogrd737rograms_ida."'";
                        $result = $focus->db->query($sql);
                        $row = $focus->db->fetchByAssoc($result);
                $template = file_get_contents('modules/Worksheets/tpls/export/ChiettinhDos_files/sheet001.htm');
                $template = str_replace('{TENDOAN}',$row['name'],$template);
                $template = str_replace('{MADOAN}',$row['code'],$template);
                $template = str_replace('{site_url}',$sugar_config['site_url'],$template);
                $template = str_replace('{TOUR_NAME}',$focus->worksheet_tour_name,$template);
                $template = str_replace('{TOUR_CODE}',$focus->tourcode,$template); 
                $template = str_replace('{DURATION}',$focus->duration,$template); 
                $template = str_replace('{TRANSPORT}',$focus->transport,$template);  
                $template = str_replace('{THUESUATHOA}',$focus->thuesuathoa,$template); 
                $template = str_replace('{SOKHACH}',$focus->sokhach,$template);  
                $template = str_replace('{LOTRINH}',$focus->lotrinh,$template);  
                $template = str_replace('{NGUOITHUCHIEN}',$current_user->full_name,$template);  
                $template = str_replace('{DATE}',date('d/m/Y'),$template);
               
                // loading tam ung cua airline ticket
                $vemaybay = $noidung->vemaybay;
                $airArr =  $focus ->getAirlineTicket($this->worksheet_tour_id);
                if(count($airArr)>0){
                    foreach($airArr as $val){
                        $app_list_strings['list_airlinetiket_dom'][$val['id']]=$val['name'];
                    }
                }
                $html = '';
                if($vemaybay){
                    $airSum = 0;
                    foreach($vemaybay as $vmb){
                        if($vmb->vemaybay_check_tam_ung !=0){
                            $html .= "<tr height=21 style='height:15.75pt'>"; 
                                $html .= "<td height=21 class=xl84 style='height:15.75pt'>".translate('list_airlinetiket_dom','',$vmb->vemaybay)."</td>";
                                $html .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$vmb->vemaybay_giathamkhao."</td>";
                                $html .= "<td class=xl100><span style='mso-spacerun:yes'>     </span>".$vmb->vemaybay_dongia."</td>";
                                $html .= "<td class=xl84><span style='mso-spacerun:yes'>    </span>".$vmb->vemaybay_soluong."</td>";
                                $html .= "<td class=xl84><span style='mso-spacerun:yes'></span>".$vmb->nh_songay." </td>";
                                $html .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$vmb->vemaybay_thanhtien." </td>";
                                $html .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$vmb->vemaybay_tamung."<span style='mso-spacerun:yes'>  </span></td>";
                            $html .= '</tr>';
                            $airArr += unformat_number($vmb->vemaybay_tamung);
                        }
                    }
                    
                }
                $template = str_replace('{VMBHTML}',$html,$template);
                // lay tam ung cho nha hang
                $nhahang = $noidung->nhahang; 
                $nhArr = array();
                $nhArr = $focus->getRestaurantData($focus->worksheet_tour_id);
                foreach($nhArr as $arr){
                    $app_list_strings['list_restaurant_dom'][$arr['id']] = $arr['name'];
                }
                if($nhahang){
                    $nhHtml = '';
                    foreach($nhahang as $nhval){
                        if($nhval->nh_tamung != 0){
                            $nhHtml .= "<tr height=21 style='height:15.75pt'>";
                            $nhHtml .= "<td height=21 class=xl84 style='height:15.75pt'>".translate('list_restaurant_dom','',$nhval->nh_id)."</td>";
                            $nhHtml .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$nhval->nh_giathamkhao."</td>";
                            $nhHtml .= "<td class=xl100><span style='mso-spacerun:yes'>     </span>".$nhval->nh_dongia."</td>";
                            $nhHtml .= "<td class=xl84><span style='mso-spacerun:yes'>    </span>".$nhval->nh_soluong."</td>";
                            $nhHtml .= "<td class=xl84><span style='mso-spacerun:yes'></span>".$nhval->nh_songay." </td>";
                            $nhHtml .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$nhval->nh_thanhtien." </td>";
                            $nhHtml .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$nhval->nh_tamung."<span style='mso-spacerun:yes'>  </span></td>";
                            $nhHtml .= "</tr> ";
                            $nhtamung += unformat_number($nhval->nh_tamung);
                        }
                    }
                }
                $template = str_replace('{NHHTML}',$nhHtml,$template); 
                // lay tam ung cho khach san
                $kshtml = "";
                $khachsan = $noidung->khachsan;
                $ksArr = array();
                $ksArr = $focus->getHotelData($focus->worksheet_tour_id);
                foreach($ksArr as $arrks){
                    $app_list_strings['list_khach_san_dom'][$arrks['id']] = $arrks['name'];
                }
                if(!empty($khachsan)){
                    $kstamung = 0;
                    foreach($khachsan as $ksval){
                        if($ksval->ks_tamung != 0){
                            $kshtml .= "<tr height=21 style='height:15.75pt'>";
                            $kshtml .= "<td height=21 class=xl84 style='height:15.75pt'>".$ksval->ks_name."</td>";
                            $kshtml .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$ksval->ks_giathamkhao."</td>";
                            $kshtml .= "<td class=xl100><span style='mso-spacerun:yes'>     </span>".$ksval->ks_dongia."</td>";
                            $kshtml .= "<td class=xl84><span style='mso-spacerun:yes'>    </span>".$ksval->ks_soluong."</td>";
                            $kshtml .= "<td class=xl84><span style='mso-spacerun:yes'></span>".$ksval->ks_songay." </td>";
                            $kshtml .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$ksval->ks_thanhtien." </td>";
                            $kshtml .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$ksval->ks_tamung."<span style='mso-spacerun:yes'>  </span></td>";
                            $kshtml .= "</tr> ";
                            $kstamung += unformat_number($ksval->ks_tamung);
                        }
                    }
                }
                $template = str_replace('{KSHTML}',$kshtml,$template);

                // lay du lieu phan van chuyen
                $vanchuyen = $noidung->vanchuyen;
                $vcArr = array();
                $vcArr = $focus->getTransportData($focus->worksheet_tour_id);
                foreach($vcArr as $arrtrans){
                    $app_list_strings['list_vanchuyen_dom'][$arrtrans['id']] ='Xe '.$arrtrans['name'].' chỗ';
                 }
                $vctamung = 0;
                $vchtml = "";
                if($vanchuyen){
                    foreach($vanchuyen as $vcval){
                        if($vcval->vanchuyen_tamung != 0){
                            $vchtml .= "<tr height=21 style='height:15.75pt'>";
                            $vchtml .= "<td height=21 class=xl84 style='height:15.75pt'>".translate('list_vanchuyen_dom','', $vcval->vanchuyen_name)."</td>";
                            $vchtml .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$vcval->vanchuyen_giathamkhao."</td>";
                            $vchtml .= "<td class=xl100><span style='mso-spacerun:yes'>     </span>".$vcval->vanchuyen_dongia."</td>";
                            $vchtml .= "<td class=xl84><span style='mso-spacerun:yes'>    </span>".$vcval->vanchuyen_soluong."</td>";
                            $vchtml .= "<td class=xl84><span style='mso-spacerun:yes'></span>".$vcval->vanchuyen_songay."&nbsp;&nbsp;".translate('vanchuyen_dongia_option','',$vcval->dongia_option)." </td>";
                            $vchtml .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$vcval->vanchuyen_thanhtien." </td>";
                            $vchtml .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$vcval->vanchuyen_tamung."<span style='mso-spacerun:yes'>  </span></td>";
                            $vchtml .= "</tr> ";
                            $vctamung += unformat_number($vcval->vanchuyen_tamung);
                        }
                    }
                }
                $template = str_replace("{HTMLVANCHUYEN}",$vchtml,$template);
                // lay phan tam ung dich vu
                $dichvu = $noidung->dichvu;
                $dvArr = array();
                $dvArr = $focus->getServiceData($focus->worksheet_tour_id);
                foreach($dvArr as $arrsv){
                  $app_list_strings['list_dichvu_dom'][$arrsv['id']] = $arrsv['name'];
                }
                if($dichvu){
                    $dvtamung;
                    $dvhtml = "";
                    foreach($dichvu as $dvVal){
                        if($dvVal->services_tamung != 0){
                            $dvhtml .= "<tr height=21 style='height:15.75pt'>";
                            $dvhtml .= "<td height=21 class=xl84 style='height:15.75pt'>".translate('list_dichvu_dom','',$dvVal->services_name)."</td>";
                            $dvhtml .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$dvVal->services_giathamkhao."</td>";
                            $dvhtml .= "<td class=xl100><span style='mso-spacerun:yes'>     </span>".$dvVal->services_dongia."</td>";
                            $dvhtml .= "<td class=xl84><span style='mso-spacerun:yes'>    </span>".$dvVal->services_soluong."</td>";
                            $dvhtml .= "<td class=xl84><span style='mso-spacerun:yes'></span>".$dvVal->services_songay." </td>";
                            $dvhtml .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$dvVal->services_thanhtien." </td>";
                            $dvhtml .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$dvVal->services_tamung."<span style='mso-spacerun:yes'>  </span></td>";
                            $dvhtml .= "</tr> "; 
                            $dvtamung += unformat_number($dvVal->services_tamung);
                        }
                    }
                }
                $template = str_replace("{DICHVUHTML}",$dvhtml,$template);

                // lay tam ung phan tham quan
                $thamquan = $noidung->thamquan;
                $tqArr = array(); 
                $tqArr = $focus->getSightseeingData($focus->worksheet_tour_id);
                foreach($tqArr as $arrtq){
                    $app_list_strings['list_thamquan_dom'][$arrtq['id']]= $arrtq['name'];
                }
                $tqhtml = "";
                $tqtamung = 0;
                if($thamquan){
                    foreach($thamquan as $tqval){
                        if($tqval->thamquan_tamung != 0){
                            $tqhtml .= "<tr height=21 style='height:15.75pt'>";
                            $tqhtml .= "<td height=21 class=xl84 style='height:15.75pt'>".translate('list_thamquan_dom','',$tqval->thamquan_name)."</td>";
                            $tqhtml .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$tqval->thamquan_giathamkhao."</td>";
                            $tqhtml .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$tqval->thamquan_dongia."</td>";
                            $tqhtml .= "<td class=xl84><span style='mso-spacerun:yes'></span>".$tqval->thamquan_soluong."</td>";
                            $tqhtml .= "<td class=xl84><span style='mso-spacerun:yes'></span>".$tqval->thamquan_songay." </td>";
                            $tqhtml .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$tqval->thamquan_thanhtien." </td>";
                            $tqhtml .= "<td class=xl100><span style='mso-spacerun:yes'></span>".$tqval->thamquan_tamung."<span style='mso-spacerun:yes'>  </span></td>";
                            $tqhtml .= "</tr> "; 
                            $tqtamung += unformat_number($tqval->thamquan_tamung);
                        }
                    }
                }
                
                // chi phi khac
                $html = '';
                $chiphikhac = $noidung->chiphikhac;
                if(count($chiphikhac)>0){
                    $sumCPK = 0;
                    foreach($chiphikhac as $value){
                        if($value->cpk_check_tam_ung !=0){
                            $html .= "<tr height=21 style='height:15.75pt'>"; 
                                $html .= "<td height=21 class=xl84 style='height:15.75pt'>".$value->chiphikhac_loaidichvu."</td>";
                                $html .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$value->chiphikhac_giathamkhao."</td>";
                                $html .= "<td class=xl84><span style='mso-spacerun:yes'>    </span>".$value->chiphikhac_dongia."</td>";
                                $html .= "<td class=xl100><span style='mso-spacerun:yes'>     </span>".$value->chiphikhac_soluong."</td>";
                                $html .= "<td class=xl100><span style='mso-spacerun:yes'>     </span>&nbsp;</td>";
                                $html .= "<td class=xl84><span style='mso-spacerun:yes'></span>".$value->chiphikhac_thanhtien." </td>";
                                $html .= "<td class=xl100><span style='mso-spacerun:yes'>  </span>".$value->chiphikhac_tamung."<span style='mso-spacerun:yes'>  </span></td>";
                            $html .= '</tr>';
                          $sumCPK += unformat_number($value->chiphikhac_tamung);  
                        }
                    }
                    
                    
                }
                $template = str_replace('{CPKHTML}',$html,$template);
                
                $tongtamung = $nhtamung+$kstamung+$vctamung+$dvtamung+$tqtamung+$sumCPK+$airSum;
                $template = str_replace("{TONGCONG}",number_format($tongtamung,2,'.',','),$template);
                $template = str_replace('{THAMQUANHTML}',$tqhtml,$template);
                ob_clean();
                header("Pragma: cache");
                $template = chr(255).chr(254).mb_convert_encoding($template, "UTF-16LE", "UTF-8");
                header("Content-type: application/x-msdownload");
                header("Content-disposition: xls; filename=Tam_Ung_Cho_Tour.xls; size=".strlen($template));
                echo $template;
                exit(); 
            }
        }
     }
?>
