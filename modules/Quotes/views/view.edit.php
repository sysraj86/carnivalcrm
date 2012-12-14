<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/MVC/View/views/view.edit.php');

    class QuotesViewEdit extends ViewEdit {
        function QuotesViewEdit(){
            parent::ViewEdit();
        }

        function display(){
            $this->assignNotId();
            $this->assign();
            parent::display();
            
        }
        
        function assignNotId(){
            global $app_list_strings;
               $this->ev->ss->assign('ib_hotel_standard',get_select_options_with_id($app_list_strings['quotes_ib_hotel_standard'],''));
               $this->ev->ss->assign('dos_hotel_standard',get_select_options_with_id($app_list_strings['quotes_dos_hotel_standard'],''));
               $this->ev->ss->assign('ob_currency',get_select_options_with_id($app_list_strings['currency_dom'],''));
        }
        
        function assign(){
            global $app_list_strings; 
            $content = $this->bean->cost_detail;
            $content = base64_decode($content);
            $content = json_decode($content);
            $this->ev->ss->assign('tour_name',$_REQUEST['tour_name']) ;
            $this->ev->ss->assign('tour_id',$_REQUEST['tour_id']) ;
            $this->ev->ss->assign('is_tour',$_REQUEST['is_tour']) ;
            $html = '';
            if($this->bean->department == 'dos'){
                $cost_detail =  $content->dos_cost_detail;
                if(count($cost_detail)>0){
                    foreach($cost_detail as $val){
                        $html .= '<tr height="15">';
                            $html .= '<td class="tdborder"><select name="dos_hotel_standard[]" id="dos_hotel_standard">'.get_select_options($app_list_strings['quotes_dos_hotel_standard'],$val->dos_hotel_standard).'</select></td>';
                            $html .= '<td class="tdborder"><input type="text" class="ticket_cost" name="ticket_cost[]" id="tickect_cost" value="'.$val->ticket_cost.'" /></td>';
                            $html .= '<td class="tdborder"><input type="text" class="facility_cost" name="facility_cost[]" id="facility_cost" value="'.$val->facility_cost.'"  /></td>';
                            $html .= '<td class="tdborder"><input type="text" class="single_room" name="single_room[]" id="single_room"  value="'.$val->single_room.'" /></td>';
                            $html .= '<td class="tdborder"><input type="text" class="foreign" name="foreign[]" id="foreign" value="'.$val->foreign.'"  /></td>';
                            $html .= '<td class="tdborder"><input type="button" class="btnAddRow" value="Add Row" /> &nbsp; <input type="button" class="btnDeleteRow" value="Delete Row"/></td>';
                      $html .= '</tr>';
                    }
                }
                $this->ev->ss->assign('doshtml',$html); 
                $this->ev->ss->assign('countdos',count($cost_detail)); 
            }
            
            if($this->bean->department =='ib'){
                $cost_detail_head = $content->cost_detail_head;
                $this->ev->ss->assign('group_site1',$cost_detail_head->group_site1);
                $this->ev->ss->assign('group_site2',$cost_detail_head->group_site2);
                $this->ev->ss->assign('group_site3',$cost_detail_head->group_site3);
                $this->ev->ss->assign('group_site4',$cost_detail_head->group_site4);
                $this->ev->ss->assign('group_site5',$cost_detail_head->group_site5);
                $this->ev->ss->assign('group_site6',$cost_detail_head->group_site6);
                $ib_cose_detai = $content->ib_cose_detai;
                if(count($ib_cose_detai)>0){
                    foreach($ib_cose_detai as $val){
                        $html .= '<tr height="15">';
                            $html .= '<td class="tdborder"><select name="ib_hotel_standard[]" id="ib_hotel_standard">'.get_select_options_with_id($app_list_strings['quotes_ib_hotel_standard'],$val->ib_hotel_standard).'</select></td>';
                            $html .= '<td class="tdborder"><input type="text" name="group_site1_cost[]" id="group_site1_cost" value="'.$val->group_site1_cost.'"/></td>';
                            $html .= '<td class="tdborder"><input type="text" name="group_site2_cost[]" id="group_site2_cost" value="'.$val->group_site2_cost.'"/></td>';
                            $html .= '<td class="tdborder"><input type="text" name="group_site3_cost[]" id="group_site3_cost" value="'.$val->group_site3_cost.'"/></td>';
                            $html .= '<td class="tdborder"><input type="text" name="group_site4_cost[]" id="group_site4_cost" value="'.$val->group_site4_cost.'"/></td>';
                            $html .= '<td class="tdborder"><input type="text" name="group_site5_cost[]" id="group_site5_cost" value="'.$val->group_site5_cost.'"/></td>';
                            $html .= '<td class="tdborder"><input type="text" name="group_site6_cost[]" id="group_site6_cost" value="'.$val->group_site6_cost.'"/></td>';
                            $html .= '<td class="tdborder"><input type="button" class="btnAddRow" value="Add Row" /> &nbsp; <input type="button" class="btnDeleteRow" value="Delete Row"/></td>';
                        $html .= '</tr>';
                    }
                }
                $this->ev->ss->assign('ibhtml',$html);
                $this->ev->ss->assign('countib',count($ib_cose_detai));
            }
            if($this->bean->department =='ob'){
                $ob_cost_detail = $content->ob_cost_detail;
                $this->ev->ss->assign('ob_price',$ob_cost_detail->price);
                $this->ev->ss->assign('ob_tax',$ob_cost_detail->tax);
                $this->ev->ss->assign('ob_currency',get_select_options_with_id($app_list_strings['currency_dom'],$ob_cost_detail->currency));
                $this->ev->ss->assign('ob_total_price',$ob_cost_detail->total_price);
                $this->ev->ss->assign('price_note',$ob_cost_detail->price_note);
            }
        
        }
    }
?>
