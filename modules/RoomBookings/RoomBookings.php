<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  RoomBookings extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'RoomBookings';
        var $object_name = 'RoomBookings';
        var $table_name = 'roombookings';
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
        var $hotels_roombookings_name;
        var $hotels_rooc622shotels_ida;
        var $hotel_address;
        var $attn_hotel_name;
        var $attn_hotel_phone;
        var $attn_hotel_name_id;
        var $hotel_tel;
        var $hotel_fax;
        var $company;
        var $attn_name;
        var $attn_phone;
        var $attn_id;
        var $attn_email;
        var $attn_tel;
        var $attn_fax;
        var $groupprogrambookings_name;
        var $groupprogra66erograms_ida;
        var $nationlity;
        var $convention;
        var $cost;
        var $include;
        var $dining_plan;
        var $confirm;
        var $date;
        var $deparment;
        var $code;
        var $autocode;
        
        function RoomBookings(){
            global $sugar_config;
            parent::SugarBean();
        }
  
        function get_summary_text() {
            return "$this->name";
        }
        
        function get_bookingroom_count(){
            $sql = "select * from roombookingsline where roombooking_id ='".$this->id ."' AND deleted =0";
            $result = $this->db->query($sql);
            return $this->db->getRowCount($result);
        }
        
        function get_service_count(){
            $sql = "select * from roombookingssevice where roombooking_id ='".$this->id ."' AND deleted =0";
            $result = $this->db->query($sql);
            return $this->db->getRowCount($result);
        }
        
        // Ham lay Booking Line
        function get_bookingroom_editview(){
            global $app_list_strings;
            $sql = "select * from roombookingsline where roombooking_id ='".$this->id ."' AND deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            while($row = $this->db->fetchByAssoc($result))
            {   
                if(!empty($row['currency'])){
                    $currency = get_select_options_with_id($app_list_strings['currency_dom'],$row['currency']);
                }
                else{$currency = get_select_options_with_id($app_list_strings['currency_dom'],''); }
                
                
                $html .= '<tr>';
                        $html .= '<td class="dataField" align="center"><input type="text" name="type[]" id="type" value="'.$row['type'].'"/></td>';
                        $html .= '<td class="dataField" align="center"><input type="text" name="quantity[]" id="quantity" value="'.$row['quantity'].'"/>
                        <input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"><input type="hidden" name="roombooking_line_id[]" id="roombooking_line_id" value="'.$row['id'].'"></td>';
                        $html .= '<td class="dataField" align="center"><input type="text" name="price[]" id="price" value="'.$row['price'].'"/>
                        <select id="currency" name="currency[]">'.$currency.'</select></td>';
                        $html .= '<td class="dataField" align="center"><input type="text" id=\'check_in\' name=\'check_in[]\' class="datePicker" value="'.date('d/m/Y',strtotime($row['check_in'])).'"/></td>';
                        $html .= '<td class="dataField" align="center"><input type="text" id=\'check_out\' name=\'check_out[]\' class="datePicker" value="'.date('d/m/Y',strtotime($row['check_out'])).'"/></td>';
                        $html .= '<td class="dataField" align="center">';
                            $html .= '<input type="button" class="btnAddRow"  value="Add Row"/>';
                            $html .= '<input type="button" class="btnDelRow" value="Delete Row"/>';
                        $html .= '</td>';
                $html .= '</tr>';
            }
            
            return $html;
        }
        // Ham lay service
        function get_service_editview(){
            global $app_list_strings;
            $sql = "select * from roombookingssevice where roombooking_id ='".$this->id ."' AND deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
                $html.='<tr>
                      <td><textarea cols="200" rows="8" id="service" name="service[]">'.$row['service'].'</textarea>
                      <input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"></textarea>
                      <input type="hidden" name="service_id[]" id="service_id" value="'.$row['id'].'"></td>
                      <td>
                            <input type="button" class="btnAddRow"  value="Add Row"/>
                            <input type="button" class="btnDelRow" value="Delete Row"/>
                      </td>
                   </tr>' ;
            }
            
            return $html;
        }
        
        // Ham lay du lieu Booking Line
        function get_bookingroom_detailview($id = ''){
            $sql = "select * from roombookingsline where roombooking_id ='".$id ."' AND deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            
             while($row = $this->db->fetchByAssoc($result)){
                // Chuyen doi sang dang Tien te
                if(!empty($row['currency'])){
                    $currency = translate('currency_dom','',$row['currency']);
                }
                else{
                    $currency = ''; 
                }
                // Format lai kieu ngay
                if(!empty($row['check_in'])){
                    $date = new DateTime($row['check_in']);
                    $checkin = date_format($date,'d/m/Y');
                }
                else{
                    $checkin = ''; 
                }
                if(!empty($row['check_out'])){
                    $date = new DateTime($row['check_out']);
                    $checkout = date_format($date,'d/m/Y');
                }
                else{
                    $checkout = ''; 
                }
                ////////////////
                    
                $html .= '<tr>';
                    $html .= '<td  align="center">'.$row['type'].'</td>';
                    $html .= '<td  align="center">'.$row['quantity'].'</td>';
                    $html .= '<td  align="center">'.$row['price'].'&nbsp;'.$currency.'</td>';
                    $html .= '<td  align="center">'.$checkin.'</td>';
                    $html .= '<td  align="center">'.$checkout.'</td>';
                $html .= '</tr>';
                    
                
             }
             return $html;
        }
      
        // Lay Service
        function get_service_detail($id){
            global $app_list_strings;
            $sql = "select * from roombookingssevice where roombooking_id ='".$id ."' AND deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
                $html.='<tr>
                      <td>'.html_entity_decode(nl2br($row['service'])).'</td>
                   </tr>' ;
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
