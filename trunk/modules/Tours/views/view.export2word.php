<?php
    require_once('modules/Tours/Tour.php');
    require_once('modules/Tours/Forms.php');

    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            $tour = new Tour();

            global $sugar_config;
           // $ss = new Sugar_Smarty();
            $db = DBManagerFactory::getInstance();
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            $tour->retrieve($record);
            $template = file_get_contents('modules/Tours/tpls/exports/template-dos.htm');
            $template = str_replace('${SITE_URL}',$sugar_config['site_url'],$template);
            //$sql = "select * from tours where id ='".$record."' and deleted = 0";
            /*$sql = " SELECT t.id,t.name,t.tour_code,t.picture,
                        t.duration,t.transport2, t.operator,t.description,
                        t.deleted,t.tour_code,t.from_place,t.to_place,
                        t.start_date,t.end_date,t.division,contract_value,currency_id,
                        currency,u.first_name,u.last_name
                    FROM tours t
                    INNER JOIN users u
                    ON t.assigned_user_id = u.id
                    WHERE t.id = '".$record."' AND t.deleted = 0 AND u.deleted = 0 ";
            $result = $db->query($sql);
            $row = $db->fetchByAssoc($result); 

             $template = str_replace("{ID}",$row['id'],$template);
            if(!empty($row['name'])){
                 $template = str_replace("{NAME}",$row['name'],$template ); 
            }
            else{
                 $template = str_replace("{NAME}",'',$template);
            }
            $template = str_replace("{CODE}",$row['tour_code'],$template );
            
            
            //Kiem tra ton tai cua hinh   
            if(!empty($row['picture'])){
                 $img = "<img src='".$sugar_config['site_url']."/modules/images/".$row['picture']."' width='500' height='350'/>";
                 $template = str_replace('{PICTURE}',$img,$template);
            }else{
                 $template = str_replace('{PICTURE}',"",$template);
            }
            
            
            //transport           
            /*$values = explode('^,^', $row['transport']);
            
            $transport = array();
            foreach($values as $val){
                $transport[] = translate('transport_dom', '', $val);
            }
            $transport = implode(", ",$transport );*/
        
          /*  $template = str_replace("{TRANSPORT}",$row['transport2'],$template);
            $template = str_replace("{DURATION}",$row['duration'],$template);   
            $template = str_replace("{SITE_URL}",$sugar_config['site_url'],$template );  
            $template = str_replace("{TOURCODE}",$row['tour_code'],$template );  
            $template = str_replace("{FROM}", $row['from_place'],$template);  
            $template = str_replace("{TO}", $row['to_place'],$template ); 
            $template = str_replace("{START_DATE}", $row['start_date'],$template); 
            $template = str_replace("{END_DATE}", $row['end_date'],$template); 
            $template = str_replace("{VALUE}", $row['contract_value'],$template);  
            $template = str_replace("{CURRENCY}",   translate('currency_dom','',$row['currency']),$template);  
            $template = str_replace("{DIVISION}",   translate('division_dom','',$row['division']),$template);  
            $template = str_replace("{ASSIGNED_TO}", $row['first_name'].' '.$row['last_name'],$template);  
            $template = str_replace("{OPERATOR}", $row['operator'],$template);  
            $template = str_replace("{DESCRIPTION}", html_entity_decode(nl2br( $row['description'])),$template);  
            $template = str_replace("{TOUR_PROGRAM_LINE_DETAIL}", $tour->get_data_to_expor2word($record),$template);*/

            $template = str_replace('${CODE}',$tour->tour_code,$template);
            $template = str_replace('${NAME}',$tour->name, $template);
            $template = str_replace('${TRANSPORT}',$tour->transport2, $template);
            $template = str_replace('${START_DATE}',$tour->start_date, $template);
            $template = str_replace('${DURATION}',$tour->duration, $template);
            $template = str_replace('${PICTURE}',$sugar_config['site_url']."/modules/images/".$tour->picture, $template);
            $template = str_replace('${TOUR_PROGRAM_LINES}',html_entity_decode_utf8($tour->get_data_to_expor2word()),$template);
            $size=strlen($template);
            $filename = "TOUR_PROGRAM_".$tour->name.".doc";
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
