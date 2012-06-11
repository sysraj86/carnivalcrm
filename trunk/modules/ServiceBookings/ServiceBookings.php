<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  ServiceBookings extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'ServiceBookings';
        var $object_name = 'ServiceBookings';
        var $table_name = 'servicebookings';
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
        var $servicebookings_code; 
        var $res_address; 
        var $attn_res_name; 
        var $attn_res_name_id; 
        var $attn_res_phone; 
        var $res_tel; 
        var $res_fax; 
        var $company; 
        var $attn_name; 
        var $attn_phone; 
        var $attn_id; 
        var $attn_email; 
        var $attn_tel; 
        var $attn_fax; 
        var $nationlity; 
        var $notes; 
        var $confirm; 
        var $date; 
        var $deparment; 
        var $date_time; 
        var $operating_date; 
        var $quantity_pax; 
        var $guide; 
        var $guide_id; 
        var $guide_phone; 
        var $groupprograebookings_name; 
        var $groupprogr0d2frograms_ida; 
        var $services_seebookings_name; 
        var $services_sde2fervices_ida; 
        
        function ServiceBookings(){
            global $sugar_config;
            parent::SugarBean();
        }
  
        function get_summary_text() {
            return "$this->name";
        }
        
        function get_servicebooking_line_count(){
            $sql = "select * from servicebookingsline where servicebooking_id ='".$this->id ."' AND deleted =0";
            $result = $this->db->query($sql);
            return $this->db->getRowCount($result);
        }
        
        function get_servicebooking_editview(){
            $sql = "select * from servicebookingsline where servicebooking_id ='".$this->id ."' AND deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
                $html .= '<tr>';
                        $html .= '<td class="dataField" align="center" valign="top">';
                            $html .= '<input type="text" name="service[]" id="service" size="35" value="'.$row['service'].'">';
                        $html .= '</td>';
                        $html .= '<td class="dataField" align="center" valign="top"><input type="text" size="30" name="quantity[]" id="quantity" value="'.$row['quantity'].'"/><input type="hidden" name="deleted[]" id="deleted" class="deleted" value="0"><input type="hidden" name="service_line_id[]" name="service_line_id" value="'.$row['id'].'"></td>';
                        $html .= '<td class="dataField" align="center" valign="top"><input type="text" size="30" name="price[]" id="price" value="'.$row['price'].'"/></td>';
                        $html .= '<td class="dataField" align="center"><textarea cols="60" rows="10" id="content" name="content[]">'.$row['content'].' </textarea> </td>';
                        $html .= '<td class="dataField" align="center"> ';
                            $html .= '<input type="button" class="btnAddRow"  value="Add Row"/>';
                            $html .= '<input type="button" class="btnDelRow" value="Delete Row"/>';
                        $html .= '</td>';
                 $html .= '</tr>';
            }
            return $html;
        }
        
        function get_servicebooking_detailview($id = ''){
            $sql = "select * from servicebookingsline where servicebooking_id ='".$id ."' AND deleted =0";
            $result = $this->db->query($sql);
            $html = '';
            while($row = $this->db->fetchByAssoc($result)){
                $html .= '<tr>';
                        $html .= '<td class="tabDetailViewDF" align="center" valign="top">';
                            $html .= $row['service'];
                        $html .= '</td>';
                        $html .= '<td class="tabDetailViewDF" align="center" valign="top">'.$row['quantity'].'</td>';
                        $html .= '<td class="tabDetailViewDF" align="center" valign="top">'.$row['price'].'</td>';
                        $html .= '<td class="tabDetailViewDF" align="center"><div align ="left"> '.html_entity_decode(nl2br($row['content'])).'</div></td>';
                 $htm .= '</tr>';
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
