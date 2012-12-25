<?php
if (isset($_REQUEST['id']) && isset($_REQUEST['dachuyengiao'])) {
    $id = $_REQUEST['id']; // service ID
    $dachuyengiao = $_REQUEST['dachuyengiao']; // service ID
    $result = array();
    if($id != '' && $dachuyengiao == 0){
       $madetour = new GroupProgram();
       $madetour->retrieve($id);
       $task = new Task();
       $task->assigned_user_id = $madetour->operator_id;
       $task->name = 'Xác nhận Thực Hiện Tour'; 
       $task->description = 'Xác nhận với bộ phận Sales rằng đã nhận chuyển giao Thực Hiện Tour, chọn completed để xác nhận !'; 
       $task->parent_id = $madetour->id; 
       $task->parent_type = 'GroupPrograms'; 
       $task->priority = 'High'; 
       $task->parent_name = $madetour->name; 
       $result['result'] = $task->save();
       $result['task_id'] = $task->id;
    }elseif($id != '' && $dachuyengiao == 1){
       $dachuyengiao_task = $_REQUEST['dachuyengiao_task'];
       $task = new Task();
       $task->retrieve($dachuyengiao_task);
       $task->status = 'Completed';
       $result['result'] = $task->save();
    }
    if($result['result']){
       $result['result'] = 1;  
    } 
    else
        $result['result'] = 0; 
}else{
    $result['result'] = 0;
}
echo json_encode($result);