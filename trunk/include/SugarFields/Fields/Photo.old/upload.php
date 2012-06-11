<?php
$target_path = 'phpThumb/images/' . basename( $_FILES["file"]["name"]);

if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/jpg") && ($_FILES["file"]["size"] < 20000)){
  if ($_FILES["file"]["error"] > 0){
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  }else{
	if (file_exists("phpThumb/images/" . $_FILES["file"]["name"])){
      echo '<br />' . $_FILES["file"]["name"] . ' already exists.';
    }else if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)){
		chmod($target_path, 0644);
		echo '<img src="phpThumb/phpThumb.php?src=images/' . $_FILES["file"]["name"] . '&h=80&w=80">';
	}
  }
 }
?>

