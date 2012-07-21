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

            $template = str_replace('${TOUR_NOTE}',html_entity_decode_utf8($tour->description),$template);
            $template = str_replace('${CODE}',$tour->tour_code,$template);
            $template = str_replace('${NAME}',$tour->name, $template);
            $template = str_replace('${TRANSPORT}',$tour->transport2, $template);
            $template = str_replace('${START_DATE}',$tour->start_date, $template);
            $template = str_replace('${DURATION}',$tour->duration, $template);
            
            // Hieu fix issue 1438
            if($tour->picture){
                $main_picture = '
                    <!--[if gte vml 1]>
                    <o:wrapblock>
                        <v:shape id="Picture_x0020_11"
                                 o:spid="_x0000_s1028" type="#_x0000_t75"
                                 alt=""
                                 style=\'position:absolute;margin-left:0;margin-top:0;width:470.55pt;height:234pt;
                  z-index:251657216;visibility:visible;mso-wrap-style:square;
                  mso-width-percent:0;mso-height-percent:0;mso-wrap-distance-left:9pt;
                  mso-wrap-distance-top:0;mso-wrap-distance-right:9pt;
                  mso-wrap-distance-bottom:0;mso-position-horizontal:center;
                  mso-position-horizontal-relative:margin;mso-position-vertical:absolute;
                  mso-position-vertical-relative:text;mso-width-percent:0;mso-height-percent:0;
                  mso-width-relative:page;mso-height-relative:page\'>
                            <v:imagedata src="'.$sugar_config['site_url']."/modules/images/".$tour->picture.'"
                                         o:title="phan%20thiet%20beach"/>
                            <o:lock v:ext="edit" aspectratio="f"/>
                            <w:wrap type="topAndBottom" anchorx="margin"/>
                        </v:shape><![endif]--><![if !vml]><img width=627 height=312
                                                               src="'.$sugar_config['site_url']."/modules/images/".$tour->picture.'"
                                                               alt=""
                                                               v:shapes="Picture_x0020_11"><![endif]><!--[if gte vml 1]></o:wrapblock>
                    <![endif]-->
                ';   
            }else{
                $main_picture = '';
            }
            $template = str_replace('${PICTURE}', $main_picture, $template);
            // End issue 1438
            
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
