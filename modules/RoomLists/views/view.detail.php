<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.detail.php');
    require_once('include/DetailView/DetailView.php');
    require_once("include/utils/layout_utils.php");
    class RoomListsViewDetail extends ViewDetail{

        // contructor
        function RoomListsViewDetail(){
            parent::ViewDetail(); 
        }
        function display(){
            $this->get_listcusdetail();
            parent::display();
        }
        
        function get_listcusdetail(){
            global $mod_strings;
            $temp = base64_decode($this->bean->content);
            $noidung = json_decode($temp);
            $html = '';
            $html .= '<table cellpadding="0" cellspacing="0" width="100%" class="h3Row">'; 
            foreach($noidung as $val){
                $room_name = $val->room_name;
                $room_type = translate('roomlist_room_type_dom','',$val->room_type) ;
                $room_class = $val->room_class;
                $room_remark = $val->room_remark;
                $room_number = $val->room_number;
                $room_note = $val->room_note;
                $list_cus = $val->list_cus;
                $html .= '<tr height="20">';
                $html .= '<td>';
                $html .= '<fieldset>'; 
                $html .= '<table cellpadding="0" cellspacing="0" width="100%" class="h3Row">';
                $html .= '<legend><h3>'.$room_name.'</h3></legend>';
                $html .= '<tr height="20">';
                        $html .= '<td class="tabDetailViewDL"><b>'.$mod_strings['LBL_ROOM_TYPE'].'</b></td>';
                            if($this->bean->department == 'ib'){ 
                                $html .= '<td class="tabDetailViewDL"><b>'.$mod_strings['LBL_ROOM_CLASS'].'</b></td>';
                                $html .= '<td class="tabDetailViewDL"><b>'.$mod_strings['LBL_ROOM_REMARK'].'</b></td>';
                            }
                            if($this->bean->department == 'dos'){
//                                $html .= '<td class="tabDetailViewDL"><b>'.$mod_strings['LBL_ROOM_NUMBER'].'</b></td>';
                                $html .= '<td class="tabDetailViewDL"><b>'.$mod_strings['LBL_ROOM_NOTE'].'</b></td>';
                            }
                      $html .= '</td>';
                      $html .= '</tr>';
                    $html .= '<tr height="20">';
                        $html .= '<td class="tabDetailViewDL">';
                            $html .= $room_type;
                        $html .= '</td>';
                            if($this->bean->department == 'ib'){ 
                                $html .= '<td class="tabDetailViewDL">'.$room_class.'</td>';
                                $html .= '<td class="tabDetailViewDL">'.$room_remark.'</td>';
                                $colspan = 3;
                            }
                            if($this->bean->department == 'dos'){
//                                $html .= '<td class="tabDetailViewDL">'.$room_number.'</td>';
                                $html .= '<td class="tabDetailViewDL">'.$room_note.'</td>';
                                $colspan = 2;
                            }
                      $html .= '</td>';
                      $html .= '</tr>';
                      $html .= '<tr height="20">';
                        $html .= '<td colspan="'.$colspan.'">';
                        $html .= '<fieldset>';
                        $html .= '<legend><h3>'.$mod_strings['LBL_ROOM_LIST_CUS'].'</h3></legend>'; 
                            $html .= '<table cellpadding="0" cellspacing="0" width="100%" class="h3Row">';
                            $html .= '<tr>';
                                $html .= '<td class="tabDetailViewDF"><h4>'.$mod_strings['LBL_CUS_NAME'].'</h4></td> <td class="tabDetailViewDF"><h4>'.$mod_strings['LBL_GENDER'].'</h4></td> <td class="tabDetailViewDF"><h4>'.$mod_strings['LBL_PHONE'].'</h4></td>';
                                $html .= '</tr>';
                                if(count($list_cus)>0){
                                   foreach($list_cus as $cus_val){
                                     $temp = explode('_',$cus_val);
                                     $cus_name  = $temp[1].' '.$temp['2'];
                                     $cus_gender  = $temp[3];
                                     $cus_phone  = $temp[4];
                                     $html .= '<tr>';
                                        $html .= '<td class="tabDetailViewDF">'.$cus_name.'</td>';
                                        $html .= '<td class="tabDetailViewDF">'.$cus_gender.'</td>';
                                        $html .= '<td class="tabDetailViewDF">'.$cus_phone.'</td>';
                                     $html .= '</tr>';
                                 } 
                                }
                        $html .= '</table>';
                        $html .= '</fieldset>';
                    $html .= '</td>';
                    $html .= '</tr>';
                $html .= '</table>';
                $html .= '</fieldset>';
                $html .= '</td>';
                $html .= '</tr>'; 
            }
            
            $html .= '</table>';
            
            $this->ss->assign('HTMLDETAIL', $html);
        }
    }

?>
