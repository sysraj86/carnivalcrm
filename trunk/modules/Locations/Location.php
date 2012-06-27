<?php
     if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');   
     
     class  Location extends SugarBean{
         
        var $new_schema = true;
        var $module_dir = 'Locations';
        var $object_name = 'Location';
        var $table_name = 'locations';
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
        var $image;
        var $picture;
        var $localtion_code;
        
        function Location(){
            global $sugar_config;
            parent::SugarBean();
       $this->emailAddress = new SugarEmailAddress(); 
    }
    
     function retrieve($id = -1, $encode=true) { 
        $ret_val = parent::retrieve($id, $encode); 
        $this->emailAddress->handleLegacyRetrieve($this); 
        return $ret_val; 
    } 
     
    function save($check_notify=false) { 
        $this->emailAddress->handleLegacySave($this, $this->module_dir); 
        $email1_ori = $this->email1; 
        $email2_ori = $this->email2; 
        $this->in_workflow = false; 
        parent::save($check_notify); 
        $override_email = array(); 
        if($this->in_workflow) {// workflow will edit this $this->email1 and $this->email2 
            if($email1_ori != $this->email1) { 
                $override_email['emailAddress0'] = $this->email1; 
            } 
            if($email2_ori != $this->email2) { 
                $override_email['emailAddress1'] = $this->email2; 
            } 
        } 
        $this->emailAddress->save($this->id, $this->module_dir, $override_email,'','','','',$this->in_workflow); 
        
        global $sugar_config; 
            if(!empty($_FILES['image_file'])){
                if($_FILES['image_file']['error']==0){
                    $file_name = $_FILES['image_file']['name'];
                    $tmp_name = $_FILES['image_file']['tmp_name'];
                    $ext = explode('.',$file_name);
                    $img_ext = $ext[count($ext)-1];
                    $img_valid = false;
                    $image_extension = 'jpg_jpeg_gif_bmp_png';
                    $image_extension_arr = explode('_',$image_extension);
                    for($i =0 ; $i<count($image_extension_arr); $i++)  {
                        if($img_ext != $image_extension_arr[$i])  {
                            $img_valid = true;
                        }
                    }
                    if($img_valid == false) {
                        echo "<script language='javascript'> alert('file ảnh không hợp lệ'); </script>";
                        return;
                    }
                    if(is_file('modules/images/'.$this->image)){
                        @unlink('modules/images/'.$this->image) ;
                    }
                    $destination = 'modules/images/'.$file_name;
                    if(move_uploaded_file($tmp_name,$destination)){
                        $this->picture = "<img src='".$sugar_config['site_url']."/modules/images/".$file_name."' width='350' height='200'/>";
                        $this->image = $file_name;  
                    } 
                }
                
            } 
            return $this->id;    
            //return parent::save($check_notify); 
         
    } 
     
    function get_list_view_data() { 
        global $system_config; 
        global $current_user; 
        $temp_array = $this->get_list_view_array(); 
        $temp_array['NAME'] = $this->name; 
        $temp_array['EMAIL1'] = $this->emailAddress->getPrimaryAddress($this);
        $this->email1 =  $temp_array['EMAIL1'];
        $temp_array['EMAIL1_LINK'] = $current_user->getEmailLink('email1', $this, '', '', 'ListView'); 
        return $temp_array; 
    }
        
        function get_summary_text() {
            return "$this->name";
        }
        /*function save($check_notify = false){ 
            global $sugar_config; 
            if(!empty($_FILES['image_file'])){
                if($_FILES['image_file']['error']==0){
                    $file_name = $_FILES['image_file']['name'];
                    $tmp_name = $_FILES['image_file']['tmp_name'];
                    $ext = explode('.',$file_name);
                    $img_ext = $ext[count($ext)-1];
                    $img_valid = false;
                    $image_extension = 'jpg_jpeg_gif_bmp_png';
                    $image_extension_arr = explode('_',$image_extension);
                    for($i =0 ; $i<count($image_extension_arr); $i++)  {
                        if($img_ext != $image_extension_arr[$i])  {
                            $img_valid = true;
                        }
                    }
                    if($img_valid == false) {
                        echo "<script language='javascript'> alert('file ảnh không hợp lệ'); </script>";
                        break;
                    }
                    if(is_file('modules/images/'.$this->image)){
                        @unlink('modules/images/'.$this->image) ;
                    }
                    $destination = 'modules/images/'.$file_name;
                    if(move_uploaded_file($tmp_name,$destination)){
                        $this->picture = "<img src='".$sugar_config['site_url']."/modules/images/".$file_name."' width='350' height='200'/>";
                        $this->image = $file_name;  
                    } 
                }
                
            }     
            return parent::save($check_notify); 
        }                                      */
        
        
        function bean_implements($interface){
        switch($interface){
            case 'ACL':return true;
        }
        return false;
    }
     }
?>
