<?php
    

    class Viewexporttoword extends SugarView{
        var $ss ;
        function Viewexporttoword() {
            parent::SugarView();
        }

        function display(){
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';

            $template = file_get_contents('modules/Passports/tpls/export.tpl');

            
            $sql = " SELECT * FROM passports WHERE id = '".$record."' AND deleted = 0";
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result); 

             $template = str_replace("{ID}",$row['id'],$template);
            function yes_no($ques){
                if($ques == 'co'){
                    return 'Có';
                }else{
                    return 'Không';
                }
            }
            function TinhTrangHonNhan($tinhtranghonnhan){
                if($tinhtranghonnhan == 'docthan'){
                    return 'Độc thân';
                }else{
                    if($tinhtranghonnhan == 'cogiadinh'){
                        return 'Có gia đình';
                    }else{
                        return 'Ly thân';
                    }
                }
            }
            
            if(!empty($row['NAME'])){
                 $template = str_replace("{NAME}",$row['NAME'],$template ); 
            }
            else{
                 $template = str_replace("{NAME}",'',$template);
            }
            $template = str_replace("{HOVATEN}",$row['hovaten'],$template );
            $gioitinh = 'Nam';
            if($row['gioitinh'] == 'nu'){
                $gioitinh = 'Nữ';   
            }  
            $template = str_replace("{GIOITINH}",$gioitinh,$template);  
            $template = str_replace("{TENKHAC}", $row['tenkhac'],$template ); 
            $template = str_replace("{NGAYSINH}", $row['ngaysinh'],$template);
            $template = str_replace("{TINHTRANGHONNHAN}", TinhTrangHonNhan($row['tinhtranghonnhan']),$template); 
            $template = str_replace("{NOISINH}", $row['noisinh'],$template);
            $template = str_replace("{QUOCGIA}", $row['quocgia'],$template);
            $template = str_replace("{QUOCTICH}", $row['quoctich'],$template);
            $template = str_replace("{QUOCTICHKHAC}", $row['quoctichkhac'],$template);
            $template = str_replace("{CMND}", $row['socmnd'],$template);
            $template = str_replace("{HOKHAUTHUONGTRU}", html_entity_decode(nl2br($row['hokhauthuongtru'])),$template);
            $template = str_replace("{DIACHINHANVISA}", html_entity_decode(nl2br($row['diachinhanvisa'])),$template);
            $template = str_replace("{SODIENTHOAINHA}", $row['sodienthoainha'],$template);
            $template = str_replace("{SODIENTHOAIDIDONG}", $row['sodienthoaididong'],$template);
            $template = str_replace("{EMAIL}", $row['email'],$template);
            $template = str_replace("{SOHOCHIEU}", $row['sohochieu'],$template);
            $template = str_replace("{NGAYCAP}", $row['ngaycap'],$template);
            $template = str_replace("{NGAYHETHAN}", $row['ngayhethan'],$template);
            $template = str_replace("{QUOCGIACAP}", $row['quocgiacap'],$template);
            $template = str_replace("{THANHPHOCAP}", $row['thanhphocap'],$template);
            $template = str_replace("{BIDANHCAPHOCHIEU}", yes_no($row['tungbimathochieu']),$template);
            $template = str_replace("{TENCONGTY}", $row['tencongty'],$template);
            $template = str_replace("{DIACHICONGTY}", $row['diachicongty'],$template);
            $template = str_replace("{DIENTHOAICONGTY}", $row['dienthoaicongty'],$template);
            $template = str_replace("{SOFAX}", $row['sofax'],$template);
            $template = str_replace("{CHUCVU}", $row['chucvu'],$template);
            $template = str_replace("{MUCLUONG}", $row['mucluonghangthang'],$template);
            $template = str_replace("{MOTACONGVIEC}", html_entity_decode(nl2br($row['motacongviec'])),$template);
            $template = str_replace("{TENCONGTYCU}", html_entity_decode(nl2br($row['congtycu'])),$template);
            $template = str_replace("{DIACHICONGTYCU}",  html_entity_decode(nl2br($row['diachicongtycu'])),$template); 
            $template = str_replace("{CHUCVUCONGTYCU}", $row['chucvucongtycu'],$template); 
            $template = str_replace("{DIENTHOAICONGTYCU}", $row['dienthoaicongtycu'],$template); 
            $template = str_replace("{TENCAPTREN}", $row['captren'],$template); 
            $template = str_replace("{NGAYVAOLAMCONGTYCU}", $row['ngayvaolam'],$template); 
            $template = str_replace("{NGAYKETTHUCCONGTYCU}", $row['ngayketthuc'],$template); 
            $template = str_replace("{MOTACONGVIECCONGTYCU}", $row['motacongvieccu'],$template); 
            $template = str_replace("{TRUONGTUNGHOC}",  html_entity_decode(nl2br($row['truongdahoc'])),$template); 
            $template = str_replace("{DIACHITRUONG}",  html_entity_decode(nl2br($row['diachitruong'])),$template); 
            $template = str_replace("{NGANHHOC}", $row['nganhhoc'],$template); 
            $template = str_replace("{NGAYVAOHOC}", $row['ngaynhaphoc'],$template); 
            $template = str_replace("{NGAYKETTHUCKHOAHOC}", $row['ngayketthuchoc'],$template); 
            $template = str_replace("{HOTENCHA}", $row['hotencha'],$template); 
            $template = str_replace("{NGAYSINHCHA}", $row['ngaysinhcha'],$template); 
            $template = str_replace("{HOTENME}", $row['hotenme'],$template); 
            $template = str_replace("{NGAYSINHME}", $row['ngaysinhme'],$template); 
            $template = str_replace("{PHAIKHONG}", yes_no($row['chamedangonoiden']),$template);
            $template = str_replace("{HOTENVOCHONG}", $row['hotenvochong'],$template); 
            $template = str_replace("{NGAYSINHVOCHONG}", $row['ngaysinhvochong'],$template); 
            $template = str_replace("{QUOCTICHVOCHONG}", $row['quoctichvochong'],$template); 
            $template = str_replace("{DIACHIVOCHONG}", $row['diachivochong'],$template); 
            $template = str_replace("{NGAYDUTINHDI}", $row['ngaydiden'],$template); 
            $template = str_replace("{TENNGUOICUNGDI}", $row['nguoicungdi'],$template); 
            $template = str_replace("{QUOCGIATUNGDI}",  html_entity_decode(nl2br($row['quocgiatungden'])),$template);
            $template = str_replace("{MUCDICHDIDEN}", $row['mucdichchuyendi'],$template); 
            $template = str_replace("{NGUOICHITRACHUYENDI}", $row['nguoichitra'],$template); 
            $template = str_replace("{THOIGIANO}", $row['thoigiano'],$template); 
            $template = str_replace("{TUNGDUOCCAPTHITHUC}", yes_no($row['tungduoccapthithuc']),$template); 
            $template = str_replace("{NGAYDUOCCAPVISA}", $row['ngaycapvisa'],$template); 
            $template = str_replace("{SOVISADUOCCAP}", $row['sovisa'],$template); 
            $template = str_replace("{QUOCGIACAPVISA}", $row['quocgiacapvisa'],$template); 
            $template = str_replace("{THANHPHOCAPVISA}", $row['thanhphocapvisa'],$template); 
            $template = str_replace("{LOAIVISADUOCCAP}", $row['loaivisa'],$template); 
            $template = str_replace("{TUNGLANVANTAY}", yes_no($row['lanvantay']),$template); 
            $template = str_replace("{TUNGMATVISA}", yes_no($row['matvisa']),$template); 
            $template = str_replace("{NOITUNGDEN}", $row['noitungden'],$template); 
            $template = str_replace("{NGAYDADEN}", $row['ngayden'],$template); 
            $template = str_replace("{SONGAYO}", $row['songayo'],$template); 
            $template = str_replace("{VISABITUCHOI}", $row['visabituchoi'],$template); 
            $template = str_replace("{LYDOBITUCHOI}",  html_entity_decode(nl2br($row['lydobituchoi'])),$template); 
            $template = str_replace("{NOITHANNHANO}", $row['thannhanoday'],$template); 
            $template = str_replace("{HOTENTHANNHAN}", $row['hotenthannhan'],$template); 
            $template = str_replace("{QUANHECUATHANNHAN}", $row['moiquanhe'],$template); 
            $template = str_replace("{TINHTRANGHONNHANTHANNHAN}", $row['tinhtranghonnhanthanhnhan'],$template); 
            $template = str_replace("{SODIENTHOAITHANNHAN}", $row['sodienthoaithannhan'],$template); 
            $template = str_replace("{DIACHITHANNHAN}", $row['diachithannhan'],$template); 
            $template = str_replace("{THEODANGPHAI}", yes_no($row['thuocdangphai']),$template); 
            $template = str_replace("{TOCHUCXAHOI}", yes_no($row['tochucxahoi']),$template); 
            $template = str_replace("{KYNANGDACBIET}", yes_no($row['kynangchuyendung']),$template); 
            $template = str_replace("{PHUCVUQUANDOI}", yes_no($row['phucvuquandoi']),$template); 
            $template = str_replace("{BENHTRUYENNHIEM}", yes_no($row['benhtruyennhiem']),$template); 
            $template = str_replace("{PHUCVUTOCHUCDACBIET}", yes_no($row['tochucdacbiet']),$template); 
            $template = str_replace("{SUDUNGMATUY}", yes_no($row['nghienmatuy']),$template); 
            $template = str_replace("{TIENANTIENXU}", yes_no($row['tienantiensu']),$template); 
            $template = str_replace("{VIPHAMHOACHAT}", yes_no($row['viphamhoachat']),$template); 
            $template = str_replace("{VIPHAMMAIDAM}", yes_no($row['viphammaidam']),$template); 
            $template = str_replace("{THAMGIAHOPPHAP}", yes_no($row['thamgiahopphap']),$template); 
            $template = str_replace("{HOATDONGKHUNGBO}", yes_no($row['thamgiakhungbo']),$template); 
            $template = str_replace("{HOTROKHUNGBO}", yes_no($row['hotrokhungbo']),$template); 
            $template = str_replace("{THANHVIENKHUNGBO}", yes_no($row['thanhvienkhungbo']),$template); 
            $template = str_replace("{THAMGIANANDIETCHUNG}", yes_no($row['thamgiadietchung']),$template); 
            $template = str_replace("{THAMGIANGUOCDAI}", yes_no($row['thamgianguocdai']),$template); 
            $template = str_replace("{THAMGIACHINHTRI}", yes_no($row['thamgiachinhtri']),$template); 
            $template = str_replace("{TUBOQUYENCONGDAN}", yes_no($row['boquyencongdan']),$template);
            
            $size=strlen($template);
            $filename = "Đơn xin thị thực của ".strtoupper($row['hovaten']).".doc";
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
