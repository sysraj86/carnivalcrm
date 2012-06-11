<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    class GroupListLogicHook {


        function updateDateTime(&$bean, $event, $arguments){
            global $db;
            $id = $_POST['grouplistsf242rograms_idb'] ;
            if($id){
                $query = " SELECT start_date_group, end_date_group FROM  groupprograms WHERE id ='".$id."' AND deleted = 0";
                $result = $db->query($query);
                $row = $db->fetchByAssoc($result);  
                $bean->start_date = $row['start_date_group'] ;
                $bean->end_date = $row['end_date_group'];
            } 
        }

        function updateAge($bean,$event,$arguments){
            global $db;
            $id = $_POST['grouplistsf242rograms_idb'] ;
            if($id){
                $sql1 = " SELECT
                f.last_name
                FROM grouplists_fits_c gf
                INNER JOIN fits f
                ON f.id = gf.grouplists4843itsfits_idb INNER JOIN grouplists g ON g.id = gf.grouplistsd262uplists_ida
                INNER JOIN grouplists_roupprograms_c ggc ON ggc.grouplists87eduplists_ida = g.id 
                WHERE gf.deleted = 0 AND ggc.deleted = 0
                AND f.deleted = 0 AND (YEAR(NOW())-YEAR(birthday)) < 2 AND ggc.grouplistsf242rograms_idb= '".$id."'
                UNION ALL SELECT   f.last_name FROM grouplists_accounts_c ga  INNER JOIN accounts a   ON ga.grouplistsa472ccounts_idb = a.id
                INNER JOIN accounts_fits_c af
                ON a.id = af.accounts_fd483ccounts_ida
                INNER JOIN fits f
                ON f.id = af.accounts_f7035itsfits_idb
                INNER JOIN grouplists g
                ON g.id = ga.grouplists228auplists_ida
                INNER JOIN grouplists_roupprograms_c ggc
                ON g.id = ggc.grouplists87eduplists_ida
                WHERE g.deleted = 0
                AND ggc.deleted = 0
                AND ga.deleted = 0
                AND a.deleted = 0
                AND f.deleted = 0
                AND af.deleted = 0
                AND YEAR(NOW()) - YEAR(birthday)<2
                AND  ggc.grouplistsf242rograms_idb = '".$id."'";
                $result = $db->query($sql1);
                $child2 = $db->getRowCount($result);

                $sql2 = " SELECT
                f.last_name
                FROM grouplists_fits_c gf
                INNER JOIN fits f
                ON f.id = gf.grouplists4843itsfits_idb INNER JOIN grouplists g ON g.id = gf.grouplistsd262uplists_ida
                INNER JOIN grouplists_roupprograms_c ggc ON ggc.grouplists87eduplists_ida = g.id 
                WHERE gf.deleted = 0 AND ggc.deleted = 0
                AND f.deleted = 0 AND (YEAR(NOW())-YEAR(birthday)) BETWEEN 2 AND 12 AND ggc.grouplistsf242rograms_idb= '".$id."'
                UNION ALL SELECT   f.last_name FROM grouplists_accounts_c ga  INNER JOIN accounts a   ON ga.grouplistsa472ccounts_idb = a.id
                INNER JOIN accounts_fits_c af
                ON a.id = af.accounts_fd483ccounts_ida
                INNER JOIN fits f
                ON f.id = af.accounts_f7035itsfits_idb
                INNER JOIN grouplists g
                ON g.id = ga.grouplists228auplists_ida
                INNER JOIN grouplists_roupprograms_c ggc
                ON g.id = ggc.grouplists87eduplists_ida
                WHERE g.deleted = 0
                AND ggc.deleted = 0
                AND ga.deleted = 0
                AND a.deleted = 0
                AND f.deleted = 0
                AND af.deleted = 0
                AND YEAR(NOW()) - YEAR(birthday) BETWEEN 2 AND 12
                AND  ggc.grouplistsf242rograms_idb = '".$id."'";
                $result1 = $db->query($sql2);
                $child2to12 = $db->getRowCount($result1);

                $sql3 = " SELECT
                f.last_name
                FROM grouplists_fits_c gf
                INNER JOIN fits f
                ON f.id = gf.grouplists4843itsfits_idb INNER JOIN grouplists g ON g.id = gf.grouplistsd262uplists_ida
                INNER JOIN grouplists_roupprograms_c ggc ON ggc.grouplists87eduplists_ida = g.id 
                WHERE gf.deleted = 0 AND ggc.deleted = 0
                AND f.deleted = 0 AND (YEAR(NOW())-YEAR(birthday)) > 12 AND ggc.grouplistsf242rograms_idb= '".$id."'
                UNION ALL SELECT   f.last_name FROM grouplists_accounts_c ga  INNER JOIN accounts a   ON ga.grouplistsa472ccounts_idb = a.id
                INNER JOIN accounts_fits_c af
                ON a.id = af.accounts_fd483ccounts_ida
                INNER JOIN fits f
                ON f.id = af.accounts_f7035itsfits_idb
                INNER JOIN grouplists g
                ON g.id = ga.grouplists228auplists_ida
                INNER JOIN grouplists_roupprograms_c ggc
                ON g.id = ggc.grouplists87eduplists_ida
                WHERE g.deleted = 0
                AND ggc.deleted = 0
                AND ga.deleted = 0
                AND a.deleted = 0
                AND f.deleted = 0
                AND af.deleted = 0
                AND YEAR(NOW()) - YEAR(birthday) > 12
                AND  ggc.grouplistsf242rograms_idb = '".$id."'";
                $result2 = $db->query($sql3);
                $adults = $db->getRowCount($result2);

                $sql4 = " SELECT
                f.last_name
                FROM grouplists_fits_c gf
                INNER JOIN fits f
                ON f.id = gf.grouplists4843itsfits_idb INNER JOIN grouplists g ON g.id = gf.grouplistsd262uplists_ida
                INNER JOIN grouplists_roupprograms_c ggc ON ggc.grouplists87eduplists_ida = g.id 
                WHERE gf.deleted = 0 AND ggc.deleted = 0
                AND f.deleted = 0  AND ggc.grouplistsf242rograms_idb= '".$id."'
                UNION ALL SELECT   f.last_name FROM grouplists_accounts_c ga  INNER JOIN accounts a   ON ga.grouplistsa472ccounts_idb = a.id
                INNER JOIN accounts_fits_c af
                ON a.id = af.accounts_fd483ccounts_ida
                INNER JOIN fits f
                ON f.id = af.accounts_f7035itsfits_idb
                INNER JOIN grouplists g
                ON g.id = ga.grouplists228auplists_ida
                INNER JOIN grouplists_roupprograms_c ggc
                ON g.id = ggc.grouplists87eduplists_ida
                WHERE g.deleted = 0
                AND ggc.deleted = 0
                AND ga.deleted = 0
                AND a.deleted = 0
                AND f.deleted = 0
                AND af.deleted = 0
                AND  ggc.grouplistsf242rograms_idb = '".$id."'"; 

                $result3 = $db->query($sql4);
                $countcus = $db->getRowCount($result3);

                $query = "UPDATE groupprograms set adults ='".$adults."', child_2 = '".$child2."' , childfrom2to12 ='".$child2to12."', countofcus='".$countcus."'";
                $db->query($query);
                $bean->num_of_cus = $countcus;
            }

        }

        function get_num_of_cus(&$bean,$event,$arguments){
            global $db;
            $id = $_REQUEST['record'];
            if($id){
                $sql = "SELECT f.last_name
                FROM fits f INNER JOIN grouplists_fits_c gc ON f.id = gc.grouplists4843itsfits_idb
                INNER JOIN grouplists g ON g.id = gc.grouplistsd262uplists_ida
                WHERE g.deleted = 0 AND gc.deleted =0 AND f.deleted =0 AND g.id ='".$id."'
                UNION ALL
                SELECT
                f.last_name
                FROM fits f INNER JOIN accounts_fits_c af ON f.id = af.accounts_f7035itsfits_idb
                INNER JOIN accounts a ON a.id = af.accounts_fd483ccounts_ida INNER JOIN 
                grouplists_accounts_c ga ON a.id = ga.grouplistsa472ccounts_idb INNER JOIN
                grouplists g ON g.id = ga.grouplists228auplists_ida  
                WHERE g.deleted = 0
                AND ga.deleted = 0
                AND a.deleted = 0
                AND f.deleted = 0
                AND af.deleted = 0 AND g.id ='".$id."'";
                $result = $db->query($sql);
                $bean->num_of_cus = $db->getRowCount($result);
            }

        }
    }
?>
