<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  Contract extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'Contracts';
        var $object_name = 'Contract';
        var $table_name = 'contracts';
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
        var $number;
        var $date;
        var $month;
        var $year;
        
        var $daidienbena;
        var $daidienbenb;
        var $daidienbenb_name;
        var $mst_bena;
        var $mst_benb;
        var $position_a;
        var $position_b;
        var $address_a;
        var $address_b;
        var $phone_a;
        var $phone_b;
        var $bank_address;
        
        var $bank_name;
        var $swift_code;
        var $account_name;
        var $account_vnd;
        var $account_usd;
        var $tour_name; 
        var $tour_id; 
        var $associate;
        var $purpose;
        var $end_date_contract;
        var $start_date_contract;
        var $fax;
        var $sl_khach;
        var $baogom;
        var $khongbaogom;        
        var $tiente;        
        var $tiente_usd;        
        var $tiente_vnd;        
        
        var $gia_tour_1;
        var $sl_khach_1;
        var $ten_nganhang;
        var $solanthanhtoan;
        var $dotthanhtoan;
        var $bangchu1;
        
        var $nguoidaidienbena;
        var $nguoidaidienbenb;
        var $tensanbay;
        var $salutation_a;
        var $salutation_b;
        var $num_of_date;
        var $num_of_night;
        var $trepercent_1;
        var $trepercent;
        var $template_ddown_c;
        var $type;
        
        // for related fields
        var $account_id;
        var $hotel_id;
        var $restaurant_id;
        var $travelguide_id;
        var $transport_id;
        
        var $additional_column_fields = array('account_id','hotel_id','restaurant_id','travelguide_id','transport_id');
        
        var $relationship_fields = array(
             'account_id'   => 'accounts',
             'hotel_id'     => 'hotels',
             'restaurant_id' => 'restaurants',
             'travelguide_id'  => 'travelguides',
             //'transport_id'    => 'transports'
        );
        
        
        
        function Contract(){
            global $sugar_config;
            parent::SugarBean();
            $this->populateTemplates();
        }
        function get_summary_text() {
            return "$this->name";
        }
        function populateTemplates(){
            global $app_list_strings, $current_user;

            $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='Contracts'";        
            $res = $this->db->query($sql);
            while($row = $this->db->fetchByAssoc($res)){
                $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
            }
        }
        
        
        
        function save ($check_notify = false){
            if(!empty($this->number)){
                $this->name =$this->number; 
            }
            return parent::save($check_notify);
        }
        
        function contract_values_line_count(){
            $sql = "select * from contract_values where contract_value_id ='".$this->id."'and deleted = 0";
            $result = $this->db->query($sql);
            return $this->db->getRowCount($result);             
        }
        // get value of contracts values edit
        function get_contract_values_editview_line(){
            $sql = "select * from contract_values where contract_value_id ='".$this->id."'and deleted = 0";
            $result = $this->db->query($sql);
            // define html code
            $html = "";
            while($row = $this->db->fetchByAssoc($result)){
                $html .= '<tr>';
                     $html .= '<td  align="center"> ';
                        $html .= '<input name="age[]" type="text" id="age" value="'.$row['age'].'" />';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                         $html .= '<input name="tong_sl_khach[]" type="text" id="tong_sl_khach" class="tinhtoan" value="'.$row['num_of_cus'].'" />';
                     $html .= '</td> ';
                     $html .= '<td align="center">';
                        $html .= '<input name="gia_tour[]" type="text" id="gia_tour" class="tinhtoan " value="'.$row['tour_cost'].'" /> USD';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input name="thue[]" type="text" id="thue" class="tinhtoan" value="'.$row['tax'].'" /> USD';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input readonly="readonly" name="thanhtien[]" type="text" id="thanhtien" class="tinhtoan thanhtien" value="'.number_format($row['money'],'2','.','').'"  />USD';
                        $html .= '<input type="hidden" name="contract_value_id[]" id="contract_value_id" value="'.$row['id'].'"/> <input type="hidden" name="deleted[]" id="deleted" value="0"/>';
                     $html .= '</td>';
                     $html .= '<td align="center">';
                        $html .= '<input type="button" class="btnAddRow" value="Add row" />';
                        $html .= '<input type="button" class="btnDelRow" value="Delete row" />';
                     $html .= '</td>';
                 $html .= '</tr> ';
            }
            return $html;
        }
        
        function contract_condition_line_count(){
            $sql = "select * from contract_conditions where contract_condition_id ='".$this->id."' and deleted = 0";
            $result = $this->db->query($sql);
            return $this->db->getRowCount($result);             
        }
        
        // get contract condition edit
        
        function get_contract_condition_editview_line(){
            global $app_list_strings;
            $sql = "select * from contract_conditions where contract_condition_id ='".$this->id."' and deleted = 0";
            $result = $this->db->query($sql);
            // define html code
            $html = "";
            while($row = $this->db->fetchByAssoc($result)){
                if(!empty($row['currency'])){
                    $curency = get_select_options_with_id($app_list_strings['currency_dom'],$row['currency']);
                }
                else{$curency = get_select_options_with_id($app_list_strings['currency_dom'],""); }
                $html .= '<tr>';
                    $html .= '<td>';
                        $html .= '<fieldset>';
                            $html .= '<table cellpadding="0" cellspacing="0" border="0" width="100%"> ';
                                $html .= '<tr>';
                                    $html .= '<td>';
                                        $html .= '<input name="dotthanhtoan[]" id="dotthanhtoan" type="text" value="'.$row['contract_phase'].'"/><input name="event[]" type="text" id="event" value="'.$row['event'].'"/> Bên B thanh toán cho bên A <input name="phantram[]" id="phantram" class="percent" type="text" value="'.$row['percent'].'"/> % số tiền là  <input name="tienthanhtoan[]" type="text"  id="tienthanhtoan" value="'.number_format($row['money'],'2','.','').'"/> <select name="tiente_thanhtoan[]" class="tientethanhtoan" id="tiente_thanhtoan">'.$curency.'</select> <br />';
                                        $html .= '<input type="hidden" name="contract_condition_id[]" id="contract_condition_id" value="'.$row['id'].'"/>  <input type="hidden" name="deleted[]" id="deleted" value="0"/>';
                                        $html .= 'Bằng chữ: <input name="in_word[]" type="text" id="in_word" value="'.$row['in_word'].'"  size="90"/>';
                                    $html .= '</td>';
                                $html .= '</tr>';
                            $html .= '</table>';
                        $html .= '</fieldset>';
                    $html .= '</td>';
                    $html .= '<td>';
                        $html .= '<input  type="button" class="btnAddRow" value="Add row" />';
                        $html .= '<input  type="button" class="btnDelRow" value="Delete" />';
                    $html .= '</td>';
                $html .= '</tr>';
            }
            
            return $html;  
        }
        
        
        // get detailview
        
        function get_contract_values_detailview($id){
            $sql = "select * from contract_values where contract_value_id ='".$id."'and deleted = 0";
            $result = $this->db->query($sql);
            // define html code
            $html = "";
            while($row = $this->db->fetchByAssoc($result)){
                $html .= '<tr>';
                     $html .= '<td  align="center" class="tabDetailViewDF"> ';
                        $html .= $row['age'];
                     $html .= '</td>';
                     $html .= '<td align="center" class="tabDetailViewDF">';
                         $html .= $row['num_of_cus'];
                     $html .= '</td> ';
                     $html .= '<td align="center" class="tabDetailViewDF">';
                        $html .= $row['tour_cost'] . ' USD';
                     $html .= '</td>';
                     $html .= '<td align="center" class="tabDetailViewDF">';
                        $html .= $row['tax']. ' USD';
                     $html .= '</td>';
                     $html .= '<td align="center" class="tabDetailViewDF">';
                        $html .= number_format($row['money'],'2','.',''). 'USD';
                     $html .= '</td>';
                     $html .= '<td align="center" class="tabDetailViewDF">';
                           $html .= '&nbsp;';
                     $html .= '</td>';
                 $html .= '</tr> ';
            }
            return $html;
        }
        
        function get_contract_condition_detailview($id){
            $sql = "select * from contract_conditions where contract_condition_id ='".$id."' and deleted = 0";
            $result = $this->db->query($sql);
            // define html code
            $html = "";
            while($row = $this->db->fetchByAssoc($result)){
                 if(!empty($row['currency'])){
                    $curency = translate('currency_dom','',$row['currency']);
                }else{
                    $curency = '';
                }
                $html .= '<tr>';
                    $html .= '<td>';
                        $html .= '<fieldset>';
                            $html .= '<table cellpadding="0" cellspacing="0" border="1" width="100%" style="border-collapse: collapse;"> ';
                                $html .= '<tr>';
                                    $html .= '<td>';
                                        $html .= $row['contract_phase'].' - '.$row['event'].' Bên B thanh toán cho bên A '.$row['percent'].'% số tiền là '.number_format($row['money'],'2','.','').' '.$curency.'<br/>';
                                        $html .= 'Bằng chữ: <b> '.$row['in_word'].'</b>';
                                    $html .= '</td>';
                                $html .= '</tr>';
                            $html .= '</table>';
                        $html .= '</fieldset>';
                    $html .= '</td>';
                    $html .= '<td>';
                        $html .= '&nbsp;';
                    $html .= '</td>';
                $html .= '</tr>';
            }
            
            return $html;
        }
        
        // transport contract
        
        // count
        function get_transportcontract_line_count(){
            $sql = "select * from transportcontracts where contract_id='".$this->id."' AND deleted =0";
            $result = $this->db->query($sql);
            return $this->db->getRowCount($result);
        }
        
        // get editview
        
        function get_transportcontract_editview(){
           $sql = "select * from transportcontracts where contract_id='".$this->id."' AND deleted =0";
            $result = $this->db->query($sql); 
             $html = "";
            while($row = $this->db->fetchByAssoc($result)){
                $html .= '<tr>';
                    $html .= '<td align="center"><input type="text" name="loaixe[]" id="loaixe" value="'.$row['loaixe'].'"/>  </td>';
                    $html .= '<td align="center"><input type="text" name="soxe[]" id="soxe" value="'.$row['soxe'].'"/></td>';
                    $html .= '<td align="center"><input type="text" name="lotrinh[]" id="lotrinh" value="'.$row['lotrinh'].'"/></td>';
                    $html .= '<td align="center"><input type="text" name="thoigiansudung[]" id="thoigiansudung" value="'.$row['thoigiansudung'].'"/></td>';
                    $html .= '<td align="center">';
                        $html .= '<input type="text" name="dongia[]" id="dongia" value="'.$row['dongia'].'"/>';
                        $html .= '<input type="hidden" name="transport_id" id"transport_id" value="'.$row['id'].'"/>';
                        $html .= '<input type="hidden" class="deleted" id="deleted" name="deleted[]" value="0"/>';
                    $html .= '</td>';
                    $html .= '<td align="center"> ';
                        $html .= '<input type="button" class="btnAddRow" value="Add row" />';
                        $html .= '<input type="button"  class="btnDelRow" value="Delete row" />';
                    $html .= '</td>';
                $html .= '</tr>';
            }
            return $html;
        }
        
        function get_transportcontract_detailview(){
           $sql = "select * from transportcontracts where contract_id='".$this->id."' AND deleted =0";
            $result = $this->db->query($sql); 
             $html = "";
            while($row = $this->db->fetchByAssoc($result)){
                $html .= '<tr>';
                    $html .= '<td align="center">'.$row['loaixe'].'</td>';
                    $html .= '<td align="center">'.$row['soxe'].'</td>';
                    $html .= '<td align="center">'.$row['lotrinh'].'</td>';
                    $html .= '<td align="center">'.$row['thoigiansudung'].'</td>';
                    $html .= '<td align="center">'.$row['dongia'].'</td>';
                $html .= '</tr>';
            }
            return $html;
        }
        
        function bean_implements($interface){
        switch($interface){
            case 'ACL':return true;
        }
        return false;
    }
     }
?>
