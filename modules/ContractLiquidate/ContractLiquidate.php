<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  ContractLiquidate extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'ContractLiquidate';
        var $object_name = 'ContractLiquidate';
        var $table_name = 'contractliquidate';
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
        var $type;
        var $number; 
        var $contract; 
        var $contract_id; 
        var $date;
        var $tongcong_contract_kehoach;
        var $tongcong_contract_thucte;
        var $tongcong_tang_kehoach;
        var $tongcong_tang_thucte;
        var $tongcong_giam_kehoach;
        var $tongcong_giam_thucte;
        var $tongtien_kehoach;
        var $tongtien_thucte;
        var $tienthanhtoan;         
        var $tienconlai; 
        var $tientralai; 
        var $bangchu;
        var $template_ddown_c;  
        
        function ContractLiquidate(){
            global $sugar_config;
            parent::SugarBean();
            $this->populateTemplates();
        }
        function get_summary_text() {
            return "$this->name";
        }

        
        //////////////////////////////////CUSTOM//////////////////////
        ///////////////////////EDIT////////////////////
        //Load template
        function populateTemplates(){
            global $app_list_strings, $current_user;

            $sql = "SELECT id, name FROM aos_pdf_templates WHERE deleted='0' AND type='ContractLiquidate'";        
            $res = $this->db->query($sql);
            while($row = $this->db->fetchByAssoc($res)){
                $app_list_strings['template_ddown_c_list'][$row['id']] = $row['name'];
            }
        }
        // Dem so luong dong cua gia tri hop dong
        function giatrihopdong_count(){
           $sql = "select * from contractliquidatevalues where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);
           return $this->db->getRowCount($result); 
        }
        // Lay dong cua gia tri hop dong 
        function giatrihopdong_edit(){
           $sql = "select * from contractliquidatevalues where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);           
           $html = '';
           while($row = $this->db->fetchByAssoc($result)){
               $html.='<tr>
                <td class="td_row" width="324"><p align="center"><input size="57" type="text" name="contract_value_name[]" id="contract_value_name" value="'.$row['contract_value_name'].'">
                <input type="hidden" name="contract_value_id[]" id="contract_value_id" value="'.$row['id'].'"><input type="hidden" name="deleted[]" id="deleted"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" size="10" type="text" name="contract_dongia_kehoach[]" id="contract_dongia_kehoach" value="'.number_format($row['contract_dongia_kehoach'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" size="10" type="text" name="contract_soluong_kehoach[]" id="contract_soluong_kehoach" value="'.$row['contract_soluong_kehoach'].'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" size="10" readonly="readonly" type="text" name="contract_thanhtien_kehoach[]" id="contract_thanhtien_kehoach" value="'.number_format($row['contract_thanhtien_kehoach'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" size="10" type="text" name="contract_dongia_thucte[]" id="contract_dongia_thucte" value="'.number_format($row['contract_dongia_thucte'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" size="10" type="text" name="contract_soluong_thucte[]" id="contract_soluong_thucte" value="'.$row['contract_soluong_thucte'].'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan" size="10" readonly="readonly" type="text" name="contract_thanhtien_thucte[]" id="contract_thanhtien_thucte" value="'.number_format($row['contract_thanhtien_thucte'],'2','.','').'"></p></td>
                <td class="td_add_del" align="center" width="100">
                     <input  type="button" class="btnAddRow" value="Add" />
                     <input  type="button" class="btnDelRow" value="Del" />
                </td>
            </tr>';
           }
           return $html; 
        }
        // Dem so luong dong cua phat sinh tang
        function phatsinhtang_count(){
           $sql = "select * from contractliquidateincre where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);
           return $this->db->getRowCount($result); 
        }
        // Lay dong cua phat sinh tang
        function phatsinhtang_edit(){
           $sql = "select * from contractliquidateincre where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);
           $html = '';
           while($row = $this->db->fetchByAssoc($result)){
               $html.='<tr>
                <td class="td_row" width="324"><p align="center"><input size="57" type="text" name="phatsinhtang_name[]" id="phatsinhtang_name" value="'.$row['phatsinhtang_name'].'">
                <input type="hidden" name="phatsinhtang_id[]" id="phatsinhtang_id" value="'.$row['id'].'"><input type="hidden" name="deleted[]" id="deleted"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" size="10" type="text" name="phatsinhtang_dongia_kehoach[]" id="phatsinhtang_dongia_kehoach" value="'.number_format($row['phatsinhtang_dongia_kehoach'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" size="10" type="text" name="phatsinhtang_soluong_kehoach[]" id="phatsinhtang_soluong_kehoach" value="'.$row['phatsinhtang_soluong_kehoach'].'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" readonly="readonly" size="10" type="text" name="phatsinhtang_thanhtien_kehoach[]" id="phatsinhtang_thanhtien_kehoach" value="'.number_format($row['phatsinhtang_thanhtien_kehoach'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" size="10" type="text" name="phatsinhtang_dongia_thucte[]" id="phatsinhtang_dongia_thucte" value="'.number_format($row['phatsinhtang_dongia_thucte'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" size="10" type="text" name="phatsinhtang_soluong_thucte[]" id="phatsinhtang_soluong_thucte" value="'.$row['phatsinhtang_soluong_thucte'].'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_tang" readonly="readonly" size="10" type="text" name="phatsinhtang_thanhtien_thucte[]" id="phatsinhtang_thanhtien_thucte" value="'.number_format($row['phatsinhtang_thanhtien_thucte'],'2','.','').'"></p></td>
                <td class="td_add_del" align="center" width="100">
                     <input  type="button" class="btnAddRow" value="Add" />
                     <input  type="button" class="btnDelRow" value="Del" />
                </td>
            </tr>';
           }
           return $html;  
        }
        // Dem so luong dong cua phat sinh giam
        function phatsinhgiam_count(){
           $sql = "select * from contractliquidatedecre where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);
           return $this->db->getRowCount($result); 
        }
        // Lay dong cua phat sinh giam
        function phatsinhgiam_edit(){
           $sql = "select * from contractliquidatedecre where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);
           $html = '';
           while($row = $this->db->fetchByAssoc($result)){
               $html.='<tr>
                <td class="td_row" width="324"><p align="center"><input size="57" type="text" name="phatsinhgiam_name[]" id="phatsinhgiam_name" value="'.$row['phatsinhgiam_name'].'">
                <input type="hidden" name="phatsinhgiam_id[]" id="phatsinhgiam_id" value="'.$row['id'].'"><input type="hidden" name="deleted[]" id="deleted"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" size="10" type="text" name="phatsinhgiam_dongia_kehoach[]" id="phatsinhgiam_dongia_kehoach" value="'.number_format($row['phatsinhgiam_dongia_kehoach'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" size="10" type="text" name="phatsinhgiam_soluong_kehoach[]" id="phatsinhgiam_soluong_kehoach" value="'.$row['phatsinhgiam_soluong_kehoach'].'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" readonly="readonly" size="10" type="text" name="phatsinhgiam_thanhtien_kehoach[]" id="phatsinhgiam_thanhtien_kehoach" value="'.number_format($row['phatsinhgiam_thanhtien_kehoach'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" size="10" type="text" name="phatsinhgiam_dongia_thucte[]" id="phatsinhgiam_dongia_thucte" value="'.number_format($row['phatsinhgiam_dongia_thucte'],'2','.','').'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" size="10" type="text" name="phatsinhgiam_soluong_thucte[]" id="phatsinhgiam_soluong_thucte" value="'.$row['phatsinhgiam_soluong_thucte'].'"></p></td>
                <td class="td_row" width="100"><p align="center"><input class="tinhtoan_giam" readonly="readonly" size="10" type="text" name="phatsinhgiam_thanhtien_thucte[]" id="phatsinhgiam_thanhtien_thucte" value="'.number_format($row['phatsinhgiam_thanhtien_thucte'],'2','.','').'"></p></td>
                <td class="td_add_del" align="center" width="100">
                     <input  type="button" class="btnAddRow" value="Add" />
                     <input  type="button" class="btnDelRow" value="Del" />
                </td>
            </tr>';
           } 
           return $html;
        }
        /////////////////////DETAIL//////////////////
        
        // Lay dong cua gia tri hop dong 
        function giatrihopdong_detail(){
           $sql = "select * from contractliquidatevalues where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);           
           $html = '';
           while($row = $this->db->fetchByAssoc($result)){
               $html.='<tr>
                <td class="td_row"><p align="right">'.$row['contract_value_name'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['contract_dongia_kehoach'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.$row['contract_soluong_kehoach'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['contract_thanhtien_kehoach'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['contract_dongia_thucte'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.$row['contract_soluong_thucte'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['contract_thanhtien_thucte'],'1','.','').'</p></td>
            </tr>';
           }
           return $html; 
        }
        
        // Lay dong cua phat sinh tang
        function phatsinhtang_detail(){
           $sql = "select * from contractliquidateincre where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);
           $html = '';
           while($row = $this->db->fetchByAssoc($result)){
               $html.='<tr>
                <td class="td_row"><p align="center">'.$row['phatsinhtang_name'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['phatsinhtang_dongia_kehoach'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.$row['phatsinhtang_soluong_kehoach'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['phatsinhtang_thanhtien_kehoach'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['phatsinhtang_dongia_thucte'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.$row['phatsinhtang_soluong_thucte'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['phatsinhtang_thanhtien_thucte'],'1','.','').'</p></td>
            </tr>';
           }
           return $html;  
        }
        
         // Lay dong cua phat sinh giam
        function phatsinhgiam_detail(){
           $sql = "select * from contractliquidatedecre where contract_liquidate_id = '".$this->id."' and deleted = 0";
           $result = $this->db->query($sql);
           $html = '';
           while($row = $this->db->fetchByAssoc($result)){
               $html.='<tr>
                <td class="td_row"><p align="right">'.$row['phatsinhgiam_name'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['phatsinhgiam_dongia_kehoach'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.$row['phatsinhgiam_soluong_kehoach'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['phatsinhgiam_thanhtien_kehoach'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['phatsinhgiam_dongia_thucte'],'1','.','').'</p></td>
                <td class="td_row"><p align="right">'.$row['phatsinhgiam_soluong_thucte'].'</p></td>
                <td class="td_row"><p align="right">'.number_format($row['phatsinhgiam_thanhtien_thucte'],'1','.','').'</p></td>
            </tr>';
           } 
           return $html;
        }
        ///////////////////////////////// END  //////////////////////
        function bean_implements($interface){
        switch($interface){
            case 'ACL':return true;
        }
        return false;
    }
     }
?>
