<?php
  if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class GroupProgramLogicHooks {
        function updateDatetime(&$bean, $event, $arguments){
            global $db;
            $id = $_POST['grouplists87eduplists_ida'];
            if( $id != ""){//add new
               $query = "UPDATE grouplists SET start_date ='".$bean->start_date_group. "', end_date ='".$bean->end_date_group ."' WHERE id='".$id."'";  
               $db->query($query);
            }
        }
        function updatechild2(&$bean,$event,$arguments){
            global $db;
            $id = $_POST['grouplists87eduplists_ida'];
            if( $id != ""){
                $sql = "SELECT
                f.last_name
                FROM grouplists_fits_c gf
                INNER JOIN fits f
                ON f.id = gf.grouplists4843itsfits_idb
                WHERE gf.deleted = 0
                AND f.deleted = 0 AND YEAR(NOW())-YEAR(birthday) < 2
                AND grouplistsd262uplists_ida = '".$id."'
                UNION ALL SELECT f.last_name FROM grouplists_accounts_c ga INNER JOIN accounts a ON ga.grouplistsa472ccounts_idb = a.id 
                INNER JOIN accounts_fits_c af ON a.id = af.accounts_fd483ccounts_ida INNER JOIN fits f ON f.id = af.accounts_f7035itsfits_idb 
                WHERE ga.deleted = 0 AND a.deleted = 0 AND f.deleted = 0 AND af.deleted = 0 AND YEAR(NOW())-YEAR(birthday) < 2    AND ga.grouplists228auplists_ida ='".$id."'" ;
                $result = $db->query($sql);
                $bean->child_2= $db->getRowCount($result);
            }
        }
        
        function updatechildefrom2to12(&$bean,$event,$arguments){
            global $db;
            $id = $_POST['grouplists87eduplists_ida'];
            if( $id != ""){
                $sql = "SELECT
                f.last_name
                FROM grouplists_fits_c gf
                INNER JOIN fits f
                ON f.id = gf.grouplists4843itsfits_idb
                WHERE gf.deleted = 0
                AND f.deleted = 0 AND YEAR(NOW())-YEAR(birthday) BETWEEN 2 AND 12
                AND grouplistsd262uplists_ida = '".$id."'
                UNION ALL SELECT f.last_name FROM grouplists_accounts_c ga INNER JOIN accounts a ON ga.grouplistsa472ccounts_idb = a.id 
                INNER JOIN accounts_fits_c af ON a.id = af.accounts_fd483ccounts_ida INNER JOIN fits f ON f.id = af.accounts_f7035itsfits_idb 
                WHERE ga.deleted = 0 AND a.deleted = 0 AND f.deleted = 0 AND af.deleted = 0 AND YEAR(NOW())-YEAR(birthday) BETWEEN 2 AND 12    AND ga.grouplists228auplists_ida ='".$id."'" ;
                $result = $db->query($sql);
                $bean->childfrom2to12= $db->getRowCount($result);
            }
        }
        function updateAudlts(&$bean,$event,$arguments){
            global $db;
            $id = $_POST['grouplists87eduplists_ida'];
            if( $id != ""){
                $sql = "SELECT
                f.last_name
                FROM grouplists_fits_c gf
                INNER JOIN fits f
                ON f.id = gf.grouplists4843itsfits_idb
                WHERE gf.deleted = 0
                AND f.deleted = 0 AND YEAR(NOW())-YEAR(birthday)> 12
                AND grouplistsd262uplists_ida = '".$id."'
                UNION ALL SELECT f.last_name FROM grouplists_accounts_c ga INNER JOIN accounts a ON ga.grouplistsa472ccounts_idb = a.id 
                INNER JOIN accounts_fits_c af ON a.id = af.accounts_fd483ccounts_ida INNER JOIN fits f ON f.id = af.accounts_f7035itsfits_idb 
                WHERE ga.deleted = 0 AND a.deleted = 0 AND f.deleted = 0 AND af.deleted = 0 AND YEAR(NOW())-YEAR(birthday) > 12 AND ga.grouplists228auplists_ida ='".$id."'" ;
                $result = $db->query($sql);
                $bean->childfrom2to12= $db->getRowCount($result);
            }

        }
        
        function getNumOfCus(&$bean,$event,$arguments){
            global $db;
            //$id = $_POST['grouplists87eduplists_ida'];
//            if( $id != ""){
//                $sql = "SELECT
//                f.last_name
//                FROM grouplists_fits_c gf
//                INNER JOIN fits f
//                ON f.id = gf.grouplists4843itsfits_idb
//                WHERE gf.deleted = 0
//                AND f.deleted = 0
//                AND grouplistsd262uplists_ida = '".$id."'
//                UNION ALL SELECT f.last_name FROM grouplists_accounts_c ga INNER JOIN accounts a ON ga.grouplistsa472ccounts_idb = a.id 
//                INNER JOIN accounts_fits_c af ON a.id = af.accounts_fd483ccounts_ida INNER JOIN fits f ON f.id = af.accounts_f7035itsfits_idb 
//                WHERE ga.deleted = 0 AND a.deleted = 0 AND f.deleted = 0 AND af.deleted = 0 AND ga.grouplists228auplists_ida ='".$id."'" ;
//                $result = $db->query($sql);
//                $bean->countofcus= $db->getRowCount($result);
//            }

            // fix bug 1266
            $made_tour = new GroupProgram();
            $made_tour->retrieve($bean->id);
            $group_list = new GroupLists();
            $group_list->retrieve($made_tour->grouplists87eduplists_ida);
            $bean->countofcus= $group_list->num_of_cus;
             
        }
    }
?>
