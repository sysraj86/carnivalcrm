<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class deleteImgHook {

 function deleteImg(&$bean, $event, $arguments){
    // global $app_strings, $sugar_config;
//     
//     $img = $bean->picture;
     //$img = "<img src='".$sugar_config['site_url']."/SynoFieldPhoto/phpThumb/images/".$bean->image."' width='350' height='250'/>";
//     $img = "<img src='SynoFieldPhoto/phpThumb/phpThumb.php?src=images/".$bean->image."&h=400&w=250&t=".time()."'>";
//     $bean->uploadfile = $img;
//     $bean->description = $img;
//     $bean->picture = "abc";
//     $bean->picture2_c = $bean->picture;
     if(is_file('modules/images/'.$bean->image)){
        @unlink('modules/images/'.$bean->image) ;
    }
  }
}
?>
