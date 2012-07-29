<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class FITsLogicHook {

        function createAccount(&$bean, $event, $arguments) {

            global $current_user, $db;
            /*$bean->email1 = trim($bean->email1);*/
            if(!isset($_POST['record'])  && trim($bean->company_name) != ""){ #fix bug //dong nao co thong tin cty moi import cong ty
                
                $acc = new Account();
                
                
                //kiem tra xem co cong ty nao co ten giong nhu vay chua
                /*$query  = "SELECT id FROM accounts WHERE name LIKE '{$bean->company_name}' AND phone_office LIKE '{$bean->company_phone}' AND billing_address_street LIKE '{$bean->company_address}' AND deleted = 0";*/
                
                $query  = "SELECT id FROM accounts WHERE name LIKE '{$bean->company_name}' AND deleted = 0";
                      
                $result = $acc->db->query($query);  

                $row = $acc->db->fetchByAssoc($result);
                
                if($row['id']!= ""){//ton tai account
                    /*$bean->accounts_fd483ccounts_ida = $row['id'];
                    $bean->accounts_fits_name = $bean->company_name;*/
                    $fit_id = $bean->id;
                    $account_id = $row['id'];
                    $this->setRelationship($fit_id, $account_id);
                }else{//tao moi account sau do lay thong tin gan lai cho bean
                    
                    //$acc->retrieve();
                
                    $acc->name = $bean->company_name;  //required 
                    //$acc->address = $bean->company_address;
                    $acc->phone_office = $bean->company_phone;
                    //$acc->industry = $bean->company_industry;
                    $acc->assigned_user_id = $current_user->id;
                    
                    $acc->save();

                    /*$bean->accounts_fd483ccounts_ida = $acc->id;
                    $bean->accounts_f7035itsfits_idb = $bean->id;
                    $bean->accounts_fits_name = $acc->name; //fix bug 422*/
                    $fit_id = $bean->id;
                    $account_id = $acc->id;
                    $this->setRelationship($fit_id, $account_id);
                }
              
            }
            
        }
        
        // Tao relationship
        function setRelationship($fit_id, $account_id){
            global $db;
            $id = create_guid(); // Tao ID cho relate record theo chuan cua Sugar
            $queryIns = "   INSERT INTO accounts_fits_c
                            VALUES (
                                '".$id."',
                                NOW(),
                                0,
                                '".$account_id."',
                                '".$fit_id."'
                            )";
            $db->query($queryIns);            
        } 
    }
?>
