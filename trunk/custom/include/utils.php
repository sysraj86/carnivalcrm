<?php
    function getName($module,$input=array()){
        global $db;
        $sql = "
        SELECT name FROM {$module} WHERE {$input['name']} LIKE '{$input['value']}' AND deleted = 0
        ";
        $result = $db->query($sql);
        $row = $db->fetchByAssoc($result);
        return $row['name'];
    }
?>