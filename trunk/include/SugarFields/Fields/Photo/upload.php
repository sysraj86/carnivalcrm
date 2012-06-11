<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version
 * 1.1.3 ("License"); You may not use this file except in compliance with the
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied.  See the License
 * for the specific language governing rights and limitations under the
 * License.
 * All copies of the Covered Code must include on each user interface screen:
 *    (i) the "Powered by SugarCRM" logo and
 *    (ii) the SugarCRM copyright notice
 * in the same form as they appear in the distribution.  See full license for
 * requirements.
 *
 * Your Warranty, Limitations of liability and Indemnity are expressly stated
 * in the License.  Please refer to the License for the specific language
 * governing these rights and limitations under the License.  Portions created
 * by SugarCRM are Copyright (C) 2004-2010 SugarCRM, Inc.; All Rights Reserved.
 *
 * Portions created by SYNOLIA are Copyright (C) 2004-2010 SYNOLIA. You do not
 * have the right to remove SYNOLIA copyrights from the source code or user
 * interface.
 *
 * All Rights Reserved. For more information and to sublicense, resell,rent,
 * lease, redistribute, assign or otherwise transfer Your rights to the Software
 * contact SYNOLIA at contact@synolia.com
***********************************************************************************/
/**********************************************************************************
 * The Initial Developer of the Original Code is scheinarts
 *      https://www.sugarcrm.com/forums/member.php?u=49631
 *      https://www.sugarcrm.com/forums/showthread.php?t=26723
 *                          
 * Contributor(s):      SYNOLIA - SYNOFIELDPHOTO
 *                      www.synolia.com - sugar@synolia.com
 **********************************************************************************/
global $current_user;

/*$name = '';
echo "<script language = 'javascript'>";  
    echo $name ."= document.getElementById('name').value;";
echo "</script>" ;
if($name == '') {
    echo 'You need enter Destination name first';
}*/

 
    
/*if( empty($_GET['id']) ){
    echo 'id required';
}
else
*/
if( empty($_POST['module']) ){
    echo 'module required';
}
elseif( empty($_POST['field']) ){
    echo 'field required';
}
else{
    $module_name = $_POST['module'];
    $field_name = $_POST['field'];
    
   // $name = $_FILES['file']['name'];
   global $beanList, $beanFiles, $sugar_config;
    $class_name = $beanList[$module_name];
    require_once($beanFiles[$class_name]);
    $seed = new $class_name();
    
    $seed->retrieve($_GET['id']);         
    require_once('include/formbase.php');
    $seed = populateFromPost('', $seed);
    
   // $seed->save();
    
    //$return_id = $seed->id;
    

    $max_size_picture = $sugar_config['max_size_picture'];
    if(empty($max_size_picture)){
        $max_size_picture = 1000000;
    }
    
    if($seed->ACLAccess('Save')){                                         
//        $new_name = $module_name.'_'.$field_name.'_'.$name.'.jpg';
        $new_name = $_FILES['file']['name']; //$module_name.'_'.$field_name.'_'.$return_id.'.jpg';
        $target_path = 'custom/SynoFieldPhoto/phpThumb/images/'.$new_name;
        if (    
            (
                    ($_FILES["file"]["type"] == "image/gif") 
                ||  ($_FILES["file"]["type"] == "image/jpeg") 
                ||  ($_FILES["file"]["type"] == "image/jpg") 
                ||  ($_FILES["file"]["type"] == "image/pjpeg") 
            )
            &&  
            (
                $_FILES["file"]["size"] < $max_size_picture
            )
        ){
            if ($_FILES["file"]["error"] > 0){
                echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
            }
            else{
                
        	    if (file_exists("phpThumb/images/" . $new_name)){
                    echo '<img src="custom/SynoFieldPhoto/phpThumb/phpThumb.php?src=images/' . $new_name . '&h=150&w=150&t='.time().'">';
                }
                else if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)){
        		    chmod($target_path, 0644);
                    //echo $target_path;
        		   echo '<img src="custom/SynoFieldPhoto/phpThumb/phpThumb.php?src=images/'. $new_name . '&h=150&w=150&t='.time().'">';
        	    }
            }
        }
        elseif($_FILES["file"]["size"] >= $max_size_picture){
            echo "Error: File too big " . formatSize($_FILES["file"]["size"]) . ": ". formatSize($max_size_picture) ." Max <br />";
        }
        else{
            echo "Error: " . $_FILES["file"]["type"] . " not allowded <br />";
        }
        
    }
    else{
        echo 'Not allowed to Edit this '.$class_name;
    }
}

function formatSize($size){
    switch (true){
    case ($size > 1099511627776):
        $size /= 1099511627776;
        $suffix = 'To';
    break;
    case ($size > 1073741824):
        $size /= 1073741824;
        $suffix = 'Go';
    break;
    case ($size > 1048576):
        $size /= 1048576;
        $suffix = 'Mo';   
    break;
    case ($size > 1024):
        $size /= 1024;
        $suffix = 'Ko';
        break;
    default:
        $suffix = 'o';
    }
    return round($size, 0).$suffix;
}  



?>

