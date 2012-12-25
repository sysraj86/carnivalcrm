/**
 * Created by Thanh Le From OnlineCRMVN.
 * User: Admin
 * Date: 21/12/2012
 * Time: 10:30:AM
 */
$(document).ready(function() {
    $('#chuyengiao').click(ChuyenGiao);
    function ChuyenGiao(){
        dachuyengiao = $('#dachuyengiao').val();
        if(dachuyengiao == '0'){
            id = $('[name=record]').val();
            $.ajax({
                type:"POST",
                url:"index.php?module=GroupProgram&entryPoint=ChuyenGiao",
                async:false,
                data:{id:id,dachuyengiao:dachuyengiao},
                success:function(data){ 
                    if (data != null){
                        data = JSON.parse(data);
                        if(data['result'] == 1){
                           $('#chuyengiao').val(SUGAR.language.get('GroupPrograms', 'LBL_XACNHANCHUYENGIAO')) 
                           $('#chuyengiao').attr('title',SUGAR.language.get('GroupPrograms', 'LBL_XACNHANCHUYENGIAO_TITLE')); 
                           $('#dachuyengiao').val('1');
                           $('#dachuyengiao_task').val(data.task_id);
                           alert('Chuyen giao thanh cong'); 
                        }
                    }
                }
            });
        }else if(dachuyengiao == '1'){
             id = $('[name=record]').val();
             dachuyengiao_task = $('#dachuyengiao_task').val();
            $.ajax({
                type:"POST",
                url:"index.php?module=GroupProgram&entryPoint=ChuyenGiao",
                async:false,
                data:{id:id,dachuyengiao:dachuyengiao,dachuyengiao_task:dachuyengiao_task},
                success:function(data){ 
                    if (data != null){
                        data = JSON.parse(data);
                        if(data['result'] == 1){
                           $('#chuyengiao').val(SUGAR.language.get('GroupPrograms', 'LBL_DAXACNHANCHUYENGIAO')) 
                           $('#chuyengiao').attr('title',SUGAR.language.get('GroupPrograms', 'LBL_DAXACNHANCHUYENGIAO')) 
                           $('#dachuyengiao').val('2');
                           alert('Xác nhận thanh cong'); 
                        }
                    }
                }
            });
        }
        
    }
});