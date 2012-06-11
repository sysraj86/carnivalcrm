<?php
    $focus =new RoomLists();
    $focus->retrieve($_REQUEST['record']);
    $content = '';
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
    $count = count($_POST['room_name']);
    for($i=0; $i<$count; $i++){
        $LISTROOM[$i]->room_name = $_POST['room_name'][$i];
        $LISTROOM[$i]->room_type = $_POST['room_type'][$i];
        $LISTROOM[$i]->room_class = $_POST['room_class'][$i];
        $LISTROOM[$i]->room_remark = $_POST['room_remark'][$i];
//        $LISTROOM[$i]->room_number = $_POST['room_number'][$i];
        $LISTROOM[$i]->room_note = $_POST['room_note'][$i];
        $list_name = 'dskhtrongphong'.(string)($i+1);
        $LISTROOM[$i]->list_cus = $_POST[$list_name];
    }
    $focus->noidung = $LISTROOM;
    $_SESSION['content']    = $focus->noidung ;
    $content = json_encode($_SESSION['content']);
    $content = base64_encode($content);
    $focus->content = $content;
    $focus->save($check_notify);
    
    $return_id = $focus->id;

    echo "<script type='text/javascript'>
    window.location='index.php?module=RoomLists&action=DetailView&record=$return_id'
    </script>
    ";
    
    
?>
