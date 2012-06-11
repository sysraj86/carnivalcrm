<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once("include/utils.php");  // for autogen ID 
    
    class CustomFlexRelateLogicHook {
        function updateRelate(&$bean, $event, $arguments){
            global $db;
            
            // Cau hinh thong so cho cac module co quan he
            // table: bang quan he
            // parentID: Cot trong ban quan he luu tru ID cua module duoc Select
            // recordID: Cot trong ban quan he luu tru ID cua module chua nut Select
            $relateModuleConfig = array(
                'Accounts' => array(
                    'table' => 'accounts_quotes_c',
                    'parentIDKey' => 'accounts_qd96cccounts_ida',
                    'recordIDKey' => 'accounts_q5e58squotes_idb',
                ),
                'FITs' => array(
                    'table' => 'fits_quotes_c',
                    'parentIDKey' => 'fits_quotedcbetesfits_ida',
                    'recordIDKey' => 'fits_quote8d28squotes_idb',
                ),
            );    

            // Lay ra cac gia tri cho quan he moi
            $recordID = $bean->id;
            $relateModule = $bean->parent_type;
            $parentID = $bean->parent_id;
            $relateTable = $relateModuleConfig[$relateModule]['table'];
            $parentIDKey = $relateModuleConfig[$relateModule]['parentIDKey'];
            $recordIDkey = $relateModuleConfig[$relateModule]['recordIDKey'];
            
            // Lay ra cac gia tri cua quan he cu
            $oldRelateModule = $bean->fetched_row['parent_type'];
            $oldParentID = $bean->fetched_row['parent_id'];
            $oldRelateTable = $relateModuleConfig[$oldRelateModule]['table'];
            $oldParentIDKey = $relateModuleConfig[$oldRelateModule]['parentIDKey'];
            $oldRecordIDkey = $relateModuleConfig[$oldRelateModule]['recordIDKey'];
            
            // Xu ly
            if($parentID != $oldParentID && $oldParentID !=''){  // Khi co su thay doi
                $id = create_guid(); // Tao ID cho relate record theo chuan cua Sugar
                // Tao quan he moi
                if ($parentID != ''){    // Parent ID ton tai thi moi tao quan he
                    $sql_set_relate = ' INSERT INTO '.$relateTable.' (id, '.$recordIDkey.', '.$parentIDKey.', date_modified, deleted)
                                        VALUES ("'.$id.'","'.$recordID.'","'.$parentID.'", NOW(), 0)';
                    $db->query($sql_set_relate);
                }
                
                // Xoa quan he cu
                $sql_del_relate = ' UPDATE '.$oldRelateTable.' 
                                    SET deleted = 1 
                                    WHERE '.$oldRecordIDkey.' = "'.$recordID.'" AND '.$oldParentIDKey.' = "'.$oldParentID.'"';
                $db->query($sql_del_relate);
            }
            if($oldParentID == ''){
                $id = create_guid(); // Tao ID cho relate record theo chuan cua Sugar
                // Tao quan he moi
                if ($parentID != ''){    // Parent ID ton tai thi moi tao quan he
                    $sql_set_relate = ' INSERT INTO '.$relateTable.' (id, '.$recordIDkey.', '.$parentIDKey.', date_modified, deleted)
                                        VALUES ("'.$id.'","'.$recordID.'","'.$parentID.'", NOW(), 0)';
                    $db->query($sql_set_relate);
                }
            }
        }
    }
?>