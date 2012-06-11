<?php
    require_once('data/Tracker.php');
    require_once('modules/Contracts/Contract.php');
    require_once('modules/Contracts/Forms.php');
    require_once('include/MVC/View/SugarView.php');

    class Viewexport2word extends SugarView{
         var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }
        
        function display(){
            
            $focus = new Contract();
            $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR
            
            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
           
            $template = file_get_contents('modules/Contracts/tpls/export.tpl');
            
            $sql = "select * from contracts where id ='".$record."' and deleted = 0";
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result);
            
            $style = '<style>
                    v\:* {behavior:url(#default#VML);}
                    o\:* {behavior:url(#default#VML);}
                    w\:* {behavior:url(#default#VML);}
                    .shape {behavior:url(#default#VML);}
                    </style>';
                    
            $style_font = '<style>
                         /* Style Definitions */
                         table.MsoNormalTable
                            {mso-style-name:"Table Normal";
                            mso-tstyle-rowband-size:0;
                            mso-tstyle-colband-size:0;
                            mso-style-noshow:yes;
                            mso-style-priority:99;
                            mso-style-qformat:yes;
                            mso-style-parent:"";
                            mso-padding-alt:0in 5.4pt 0in 5.4pt;
                            mso-para-margin:0in;
                            mso-para-margin-bottom:.0001pt;
                            mso-pagination:widow-orphan;
                            font-size:10.0pt;
                            font-family:"Times New Roman","serif";}
                        table.MsoTableGrid
                            {mso-style-name:"Table Grid";
                            mso-tstyle-rowband-size:0;
                            mso-tstyle-colband-size:0;
                            mso-style-unhide:no;
                            border:solid windowtext 1.0pt;
                            mso-border-alt:solid windowtext .5pt;
                            mso-padding-alt:0in 5.4pt 0in 5.4pt;
                            mso-border-insideh:.5pt solid windowtext;
                            mso-border-insidev:.5pt solid windowtext;
                            mso-para-margin:0in;
                            mso-para-margin-bottom:.0001pt;
                            text-align:justify;
                            mso-pagination:widow-orphan;
                            font-size:10.0pt;
                            font-family:"Times New Roman","serif";}
                        </style>';
            

            //$ss=new XTemplate ('modules/Contracts/tpl/export.html');
            //$template = str_replace('LOICHAO','chao mung cac ban');
            /*$template = str_replace("MOD",          $mod_strings);
            $template = str_replace("APP",          $app_strings);
            $template = str_replace("THEME",        $theme);
            $template = str_replace("GRIDLINE",     ($gridline) ? $gridline : 0);
            $template = str_replace("IMAGE_PATH",   $image_path);
            $template = str_replace("PRINT_URL",   "index.php?".$GLOBALS['request_string']);*/  
           // $template = str_replace("{STYLE}",    $style,$template);
            //$template = str_replace("{STYLE_FONT}",    $style_font, $template);
            $template = str_replace("{ID}",           $row['id'] , $template);
            $template = str_replace("{ASSIGNED_TO}",  $row['assigned_user_name'], $template);
            $template = str_replace("{NAME}",  $row['name'], $template);
            $template = str_replace("{NUMBER}",  $row['number'], $template);
            $template = str_replace("{DATE}",  $row['date'], $template);  
            $template = str_replace("{MONTH}",  $row['month'], $template);  
            $template = str_replace("{YEAR}",  $row['year'], $template);  

            if(!empty($row['salutation_a']))   {
                $template = str_replace("{SALUTATION}", translate('xung_ho_dom','', $row['salutation_a']),$template)  ;  
            }
            else{
                $template = str_replace("{SALUTATION}",'',$template);
            }


            $template = str_replace("{DAIDIENBENA}", $row['daidienbena'],$template);
            $template = str_replace("{DAIDIENBENB}", $row['daidienbenb'],$template);
            $template = str_replace("{POSITION_A}", translate('position_dom','',$row['position_a']),$template);
            $template = str_replace("{ADDRESS_A}", $row['address_a'],$template);
            $template = str_replace("{PHONE_A}", $row['phone_a'],$template);
            $template = str_replace("{PHONE_B}", $row['phone_b'],$template);
            $template = str_replace("{FAX}", $row['fax'],$template);
            $template = str_replace("{MST_BENA}", $row['mst_bena'],$template);
            $template = str_replace("{BANK_NAME}",$row['bank_name'],$template);
            $template = str_replace("{ACCOUNT_NAME}",$row['account_name'],$template);
            $template = str_replace("{ACCOUNT_VND}",$row['account_vnd'],$template);
            $template = str_replace("{ACCOUNT_USD}",$row['account_usd'],$template);
            $template = str_replace("{SWIFT_CODE}", $row['account_usd'] ,$template);
            $template = str_replace("{BANK_ADDRESS}",$row['bank_address'],$template);
            $template = str_replace("{DAIDIENBENB_NAME}",$row['daidienbenb_name'],$template);
            if (!empty($row['salutation_b'])){
                $template = str_replace("{SALUTATION_B}", translate('xung_ho_dom','',$row['salutation_b']),$template);  
            }
            else{
                $template = str_replace("{SALUTATION_B}", "" ,$template);
            }
            if(!empty($row->position_b))  {
                $template = str_replace("{POSITION_B}", translate('position_dom','', $row['salutation_b']),$template);     
            }
            else{
                $template = str_replace("{POSITION_B}","",$template );
            }

            $template = str_replace("{ADDRESS_B}",$row['address_b'],$template);   
            $template = str_replace("{MST_BENB}", $row['mst_benb'],$template);   
            $template = str_replace("{PHONE_B}", $row['phone_b'],$template);   
            $template = str_replace("{TOUR_NAME}",$row['tour_name'],$template);   
            $template = str_replace("{TOUR_ID}", $row['tour_id'],$template);   
            $template = str_replace("{PURPOSE}", $row['purpose'],$template );   
            $template = str_replace("{KETHOP}", $row['associate'] ,$template);   
            $template = str_replace("{START_DATE}", $row['start_date_contract'],$template );   
            $template = str_replace("{END_DATE}", $row['end_date_contract'],$template );
            $template = str_replace("{TREPERCENT}", $row['trepercent'],$template );   
            $template = str_replace("{TREPERCENT_1}", $row['trepercent_1'],$template );   
            $template = str_replace("{NUM_OF_NIGHT}", $row['num_of_night'],$template);
            $template = str_replace("{NUM_OF_DATE}", $row['num_of_date'],$template );

            $template = str_replace("{SL_KHACH}",$row['sl_khach'],$template);   
            /*$template = str_replace("DOTUOI",  $row->dotuoi);   
            $template = str_replace("TONG_SL_KHACH",  $row->tong_sl_khach);   
            $template = str_replace("GIA_TOUR",  $row->gia_tour);   
            $template = str_replace("THUE",  $row->thue);   
            $template = str_replace("THANHTIEN",  $row->thanhtien);*/   
            $template = str_replace("{CONTRACT_VALUE}",  $focus->get_contract_values_detailview($record),$template);

            $template = str_replace("{TONGTIEN}",  number_format($row['tongtien'],'2',',','.'),$template);   
            $template = str_replace("{BANGCHU}", $row['bangchu'],$template);   
            $template = str_replace("{SL_KHACH_1}",$row['sl_khach_1'],$template);   
            $template = str_replace("{GIA_TOUR_1}",  number_format($row['gia_tour_1'],'2',',','.'),$template);   
            $template = str_replace("{TIENTE}",    translate('currency_dom','', $row['tiente']),$template); 
            $template = str_replace("{TIENTE_USD}",    translate('currency_dom','', $row['tiente_usd']),$template);
            $template = str_replace("{TIENTE_VND}",    translate('currency_dom','',$row['tiente_vnd']),$template);
            $template = str_replace("{TEN_NGANHANG}",  $row['ten_nganhang'],$template);
            $template = str_replace("{BAOGOM}",   html_entity_decode(nl2br($row['baogom'])),$template);
            $template = str_replace("{KHONGBAOGOM}", html_entity_decode(nl2br($row['khongbaogom'])),$template);
            $template = str_replace("{DOTTHANHTOAN}", $row['dotthanhtoan'],$template);
            /*$template = str_replace("SUKIEN", $row->sukien);
            $template = str_replace("PHANTRAM", $row->phantram);
            $template = str_replace("TIENTHANHTOAN", $row->tienthanhtoan);
            $template = str_replace("BANGCHU1", $row->bangchu1);*/
            $template = str_replace("{CONTRACT_CONDITION}", $focus->get_contract_condition_detailview($record),$template);
            $template = str_replace("{SOLANTHANHTOAN}",$row['solanthanhtoan'],$template);
            $template = str_replace("{NGUOIDAIDIENBENB}",$row['nguoidaidienbenb'] ,$template);
            $template = str_replace("{NGUOIDAIDIENBENA}",$row['nguoidaidienbena'],$template);
            $template = str_replace("{TENSANBAY}",$row['tensanbay'],$template);



            //$ss->display('modules/Contracts/tpl/export.tpl');
            $size=strlen($template);
            $filename = "CONTRACT_".$row['number'].".doc";
            ob_end_clean();
            header("Cache-Control: private");
            header("Content-Type: application/force-download;");
            header("Content-Disposition:attachment; filename=\"$filename\"");
            header("Content-length:$size");
            echo $template;
            ob_flush(); 
            /*$ss->parse("main");
            $ss->out("main");*/

            /*$str = "<script>
            YAHOO.util.Event.addListener(window, 'load', SUGAR.util.fillShortcuts, $savedSearchSelects);
            </script>";

            echo $str; */
        }// end display
    } // and class
    



?>
