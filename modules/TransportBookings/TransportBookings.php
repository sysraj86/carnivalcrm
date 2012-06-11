<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  TransportBookings extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'TransportBookings';
        var $object_name = 'TransportBookings';
        var $table_name = 'TransportBookings';
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
        var $transports6e65nsports_ida;
        var $transports_tbookings_name;
        var $address;
        var $from_co;
        var $attn_to_name_id;
        var $attn_to_name;
        var $attn_to_phone;
        var $email;
        var $tel_to;
        var $fax_to;
        var $attn_from_name_id;
        var $attn_from_name;
        var $attn_from_phone;
        var $tel_from;
        var $fax_from;
        var $vat;
        var $require_transports; 
        var $confirm;
        var $date;
        var $operator;
        var $groupprogratbookings_name;
        var $groupprogrd5earograms_ida;
        
        function TransportBookings(){
            global $sugar_config;
            parent::SugarBean();
            $this->from_co = "Carnival Company"; 
        }
        function get_summary_text() {
            return "$this->name";
        }
        /////////Custom
        function transportBookings_line_count(){
            $sql = "select * from TransportBookingsLine where transportbookings_id ='".$this->id."' and deleted =0";
            $result = $this->db->query($sql);
            return $this->db->getRowCount($result);
        }
        
        function get_transportBookings_editview(){
            global $app_list_strings;
            $sql = "select * from TransportBookingsLine where transportbookings_id ='".$this->id."' and deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
                                                                                                                                  
                $html.="<tr>
                        <td class='dataLabel'><input name='name_booking[]' id='name_booking' type='text' value='".$row['name_booking']."'></td>";
                if(!empty($row['operating_date'])){
                    $html .= "<td class='dataField'><input id='date' class='datetime' name='operating_date[]' onblur='parseDate(this, \"{$CALENDAR_DATEFORMAT}\");'  type='text'' tabindex='1' size='15' maxlength='10' value='".date('d/m/Y',strtotime($row['operating_date']))."'/> </td>";  
                                    }
                else{ 
                    $html .= "<td class='dataField'>
                    <input id='operating_date' class='datetime' name='operating_date[]' onblur='parseDate(this, \"{$CALENDAR_DATEFORMAT}\");'  type='text' tabindex='1' size='15' maxlength='10' value=''/> </td>";}
                $html.="<td class='dataField'><input name='unit_price[]' id='unit_price' type='text' value='".$row['unit_price']."'></td>
                        <td class='dataField'><input name='type[]' id='type' type='text' value='".$row['type']."'></td>
                        <td class='dataField'><textarea cols='60' rows='5' name='route[]' id='route'>".$row['route']."</textarea></td>
                        <input type='hidden' name='id_booking[]' id='id_booking' value='".$row['id']."' />
                        <input type='hidden' name='deleted[]' class='deleted' id='deleted' value='0' /> </td>
                        <td>
                                <input type='button' class='btnAddRow'  value='Add Row'/>
                                <input type='button' class='btnDelRow' value='Delete Row'/>
                        </td>
                    </tr>";
            }
            return $html;
        }
        
        function get_transportBookings_detailview(){
            global $app_list_strings;
            $sql = "select * from TransportBookingsLine where transportbookings_id ='".$this->id."' and deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
                                                                                                                                  
            $html.="
            <tr><td style='text-align: justify;' class='tabDetailViewDF'>".$row['name_booking']."</td>   
                <td style='text-align: justify;' class='tabDetailViewDF'>".date('d/m/Y',strtotime($row['operating_date']))." </td>  
                <td style='text-align: justify;' class='tabDetailViewDF'>".$row['unit_price']."</td>
                <td style='text-align: justify;' class='tabDetailViewDF'>".$row['type']."</td>
                <td style='text-align: justify;' class='tabDetailViewDF'>".html_entity_decode(nl2br($row['route']))."</textarea></td>
            </tr>";
            }
            return $html;
        }
        
        function get_transportBookings_export($record){
            global $app_list_strings;
            $sql = "select * from TransportBookingsLine where transportbookings_id ='".$record."' and deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
                                                                                                                                  
            $html.="
            <tr><td style='text-align: center;'>".$row['name_booking']."</td>   
                <td style='text-align: center;'>".date('d/m/Y',strtotime($row['operating_date']))." </td>  
                <td style='text-align: center;'>".$row['unit_price']."</td>
                <td style='text-align: center;'>".$row['type']."</td>
                <td style='text-align: justify;' width='300'>".html_entity_decode(nl2br($row['route']))."</td>
            </tr>";
            }
            return $html;
        }
        /////////End Custom
        function bean_implements($interface){
        switch($interface){
            case 'ACL':return true;
            }
            return false;
        }
     }
?>
