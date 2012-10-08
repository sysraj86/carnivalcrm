<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
  /******************************************************************************
  * Author : Le Gia Thanh
  * Function : Xep Hang Nhan Vien
  */
  
  include_once('modules/FITs/FITs.php');
  class CustomerRating{
      
      /**
      * Ham cap nhat cho khach hang ngay khi hop dong duoc ky,
      * neu la khach doan thi se cap nhat cho tat ca khach hang trong doan do.
      * 
      * @param mixed $customer_id
      * @param mixed $customer_type
      * @return CustomerRating
      */
    function Rating($customer_id,$customer_type){
        global $app_list_strings,$db;
        $total = 0;
        $rate = '';
        $deparment = '';
        $type = '';
        
        // Tinh tong doanh so cua nhan vien nay
        $sql = '
            SELECT *
            FROM contracts c
            WHERE c.parent_id = "'.$customer_id.'"
                AND c.parent_type = "'.$customer_type.'"
                AND c.deleted = 0
        ';
        
        $result = $db->query($sql);
        while($row = $db->fetchByAssoc($result)){
            $total += $row['tongtien'];
        }
    
        if($customer_type == 'FITs'){
            $this->updateRating($customer_id,'fit',$total);  
        }elseif($customer_type == 'Accounts'){
            $sql = '
                SELECT f.id
                FROM fits f JOIN accounts_fits_c afc ON f.id = afc.accounts_f7035itsfits_idb AND afc.deleted = 0
                LEFT JOIN accounts a ON a.id = afc.accounts_fd483ccounts_ida AND a.deleted = 0 AND a.id = "'.$customer_id.'"
                WHERE f.deleted = 0
            ';
            $result = $db->query($sql);
            while($row = $db->fetchByAssoc($result)){
                $this->updateRating($row['id'],'git',$total);      
            }
        }
    }
    
    /**
    * Cap nhat diem cho nhan vien
    * 
    * @param mixed $id
    * @param mixed $type
    * @param mixed $total
    */
    function updateRating($id,$type,$total){
        global $db;
        $customer = new FITs();
        $customer->retrieve($id);
        $deparment = $customer->deparment;
        if($customer->deparment == 'ope'){
            $deparment = 'sales';
        }
        
        $rate = $this->getRating($type,$deparment,$total);
        if($rate != ''){
            //$rate = translate('fit_level_dom','',$rate);
            $sql = '
            UPDATE fits
            SET fits.level = "'.$rate.'"
            WHERE fits.id = "'.$customer->id.'"
            ';
            $result = $db->query($sql);
        }
        
          
    }
    /**
    * Tinh loai khach hang va lay loai khach hang.
    * 
    * @param mixed $type
    * @param mixed $department
    * @param mixed $total
    */
    function getRating($type,$department,$total){
        global $app_list_strings;
        $quyTacXepHang = $app_list_strings;
        $rate = '';
        if($total >= $quyTacXepHang[$type.'_'.$department.'_vip']['min']){
            $rate = $quyTacXepHang[$type.'_'.$department.'_vip']['type'];   
        }elseif($total >= $quyTacXepHang[$type.'_'.$department.'_a']['min'] && $total < $quyTacXepHang[$type.'_'.$department.'_a']['max']){
            $rate = $quyTacXepHang[$type.'_'.$department.'_a']['type'];
        }elseif($total >= $quyTacXepHang[$type.'_'.$department.'_b']['min'] && $total < $quyTacXepHang[$type.'_'.$department.'_b']['max']){
            $rate = $quyTacXepHang[$type.'_'.$department.'_b']['type'];
        }elseif($total >= $quyTacXepHang[$type.'_'.$department.'_c']['min'] && $total < $quyTacXepHang[$type.'_'.$department.'_c']['max']){
            $rate = $quyTacXepHang[$type.'_'.$department.'_c']['type'];
        }
        return $rate; 
    }        
  }
?>
