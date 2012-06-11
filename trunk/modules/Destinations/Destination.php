<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/formbase.php');

class  Destination extends SugarBean
{

    var $new_schema = true;
    var $module_dir = 'Destinations';
    var $object_name = 'Destination';
    var $table_name = 'destinations';
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
    var $address;
    var $uploadfile;
    var $picture;
    var $image;
    var $destination_code;

    function Destination()
    {
        global $sugar_config;
        parent::SugarBean();
    }


    function get_summary_text()
    {
        return "$this->name";
    }

    function save($check_notify = false)
    {
        global $sugar_config;
        if (!empty($_FILES['image_file'])) {
            if ($_FILES['image_file']['error'] == 0) {
                $file_name = $_FILES['image_file']['name'];
                $tmp_name = $_FILES['image_file']['tmp_name'];
                $ext = explode('.', $file_name);
                $img_ext = $ext[count($ext) - 1];
                $img_valid = false;
                $image_extension = 'jpg_jpeg_gif_bmp_png';
                $image_extension_arr = explode('_', $image_extension);
                for ($i = 0; $i < count($image_extension_arr); $i++) {
                    if ($img_ext != $image_extension_arr[$i]) {
                        $img_valid = true;
                    }
                }
                if ($img_valid == false) {
                    echo "<script language='javascript'> alert('file ảnh không hợp lệ'); </script>";
                    return;
                }
                if (is_file('modules/images/' . $this->image)) {
                    @unlink('modules/images/' . $this->image);
                }
                $destination = 'modules/images/' . $file_name;
                if (move_uploaded_file($tmp_name, $destination)) {
                    $this->picture = "<img src='" . $sugar_config['site_url'] . "/modules/images/" . $file_name . "' width='350' height='200'/>";
                    $this->image = $file_name;
                }
            }
            
        }
        return parent::save($check_notify);
    }

    function bean_implements($interface)
    {
        switch ($interface) {
            case 'ACL':
                return true;
        }
        return false;
    }

    public static function getDestinationsByArea($area)
    {
        global $db, $app_list_strings;
        $destinations = array();
        if (!empty($area)) {
            $query = "SELECT D.id,D.name FROM destinations D JOIN c_areas_destinations_c AD
            ON D.ID = AD.c_areas_de577anations_idb JOIN c_areas A
            ON A.ID = AD.c_areas_de9d4fc_areas_ida
            WHERE A.ID = '$area' and D.deleted=0";

            $result = $db->query($query);
            while ($row = $db->fetchByAssoc($result)) {
                $destinations[$row['id']] = $row['name'];
            }
            return $destinations;
        }
        $destinations[''] = '';
        return $destinations;
    }
}

?>
