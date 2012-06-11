<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
  require_once('modules/Destinations/Destination.php');
  require_once('include/formbase.php');
  require_once('include/upload_file.php');  
  
  $focus = new Destination();

  $focus->retrieve($_POST['record']);

if(!$focus->ACLAccess('Save')){
        ACLController::displayNoAccess(true);
        sugar_cleanup(true);
}
if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
    $check_notify = TRUE;
}else{
    $check_notify = FALSE;
}

foreach($focus->column_fields as $field){
    if(isset($_POST[$field])){
        $value = $_POST[$field];
        $focus->$field = $value;
    }
}

foreach($focus->additional_column_fields as $field){
    if(isset($_POST[$field])){
        $value = $_POST[$field];
        $focus->$field = $value;
    }
} 
if (!empty($this->uploadfile)) {
   $this->picture = $this->uploadfile;
}
$focus->save($check_notify); 

$return_id = $focus->id;
  
  
  if(!empty($_POST['uploadfile'])){
        $file_name = $_FILES['uploadfile']['name'];
        $ext = explode('.',$file_name);
        $img_ext = $ext[count($ext)-1];
        $image_extension = 'jpg_jpeg_gif_bmp_png';
        $image_extension_arr = explode('_',$image_extension);
        for($i =0 ; $i<count($image_extension_arr); $i++)  {
          if($img_ext != $image_extension_arr[$i])  {
              echo "<script language='javascript'> alert('file ảnh không hợp lệ'); </script>";
          }
        }
        move_uploaded_file($_FILES['uploadfile']['tmp_name'],'modules/images/'.$_FILES['uploadfile']['tmp_name']); 
  }
   handleRedirect($return_id,'Destinations');
?>
