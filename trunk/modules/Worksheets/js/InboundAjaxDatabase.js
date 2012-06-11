$(function(){ 
    $('#btnAction').click(function(){
        $("#getdata").html('<img src="themes/default/images/loading.gif" align="absmiddle">&nbsp;Loading page...');
        if($('#worksheet_tour_id').val()==''){
            $('#getdata').html('<p><font color="red"><h1 align="center">BẠN CHƯA NHẬP TÊN TOUR, HÃY NHẬP TOUR TÊN</h1></font </p>');
            document.getElementById('#worksheet_tour_name').focus();
            return; 
        }
        if($("#thuesuathoa").val()== "" ){
            //alert("bạn chưa nhập thuế suất hoặc nhập sai dữ liệu");
            $('#getdata').html('<p><font color="red"><h1 align="center">BẠN CHƯA NHẬP SỐ LƯỢNG NGƯỜI LỚN</h1></font </p>'); 
            document.getElementById("thuesuathoa").focus();
            return;
        }
        if(isNaN(parseFloat($("#thuesuathoa").val()))){
            $('#getdata').html('<p><font color="red"><h1 align="center">SỐ LƯỢNG NGƯỜI LỚN HÓA PHẢI NHẬP SỐ</h1></font </p>'); 
            document.getElementById("thuesuathoa").focus();
            return;
        }
        if($("#sokhach").val()== ""){ 
            //alert("bạn chưa nhập số khách hoặc nhập sai dữ liệu");
            $('#getdata').html('<p><font color="red"><h1 align="center">BẠN CHƯA NHẬP SỐ LƯỢNG TRẺ EM</h1></font </p>'); 
            document.getElementById("sokhach").focus();
            return;
        }
        if(isNaN(parseFloat($("#sokhach").val()))){
            $('#getdata').html('<p><font color="red"><h1 align="center">SỐ LƯỢNG TRẺ EM PHẢI NHẬP SỐ</h1></font </p>'); 
            document.getElementById("sokhach").focus();
            return;
        }
        if(parseFloat($("#sokhach").val()) <=0 ){
            $('#getdata').html('<p><font color="red"><h1 align="center">SỐ KHÁCH PHẢI NHẬP LỚN HƠN KHÔNG</h1></font </p>'); 
            document.getElementById("sokhach").focus();
            return; 
        }
        
        /*if($("#tyle").val()== "" ){ 
            //alert("bạn chưa nhập số tỷ kệ hoặc nhập sai dữ liệu");
            $('#getdata').html('<p><font color="red"><h1 align="center">BẠN CHƯA NHẬP TỶ LỆ</h1></font </p>'); 
            document.getElementById("tyle").focus();
            return;
        }
        if(isNaN(parseFloat($("#tyle").val()))){
           $('#getdata').html('<p><font color="red"><h1 align="center">TỶ LỆ PHẢI NHẬP LÀ SỐ</h1></font </p>'); 
            document.getElementById("tyle").focus();
            return; 
        }*/ 
        a=0;
        $.ajax({
            type : 'POST',
            url : 'index.php?module=Worksheets&entryPoint=InboundAjaxDatabase',
            async:false,  // kiểm tra sự đồng bộ hóa.
            data: 
            {
                tour_id : $('#worksheet_tour_id').val(),
                type : $('#type').val(),
                record : $('#record').val(),
                assigned_user_id : $('#assigned_user_id').val(),
                tour_name : $('#worksheet_tour_name').val(),
                tourcode : $('#tourcode').val(),
                duration : $('#duration').val(),
                transport : $('#transport').val(),
                groupprograorksheets_name : $('#groupprograorksheets_name').val(),
                groupprogrd737rograms_ida : $('#groupprogrd737rograms_ida').val(),
                thuesuathoa : $('#thuesuathoa').val(),
                sokhach : $('#sokhach').val(),
                tyle : $('#tyle').val(),
                version : $('#version').val(),
                lotrinh : $('#lotrinh').val(),

            }, 
            success: function(server_response){
                //var script = document.createElement('script');                                              
               // script.src = 'modules/Worksheets/js/AjaxHotel.js';
                //script.type = 'text/javascript';
                a= server_response;
               // document.getElementsByTagName('head')[0].appendChild(script); 
                if(server_response == '0'){
                    $('#getdata').html('<p><font color="red"><h1 align="center">CHƯA CÓ DANH SÁCH CÁC KHOẢN MỤC, HÃY TẠO DANH SÁCH CÁC KHOẢN MỤC</h1></font </p>');
                }
                else{
                    $('#getdata').html(server_response) ;
                }
            }
        });
        //console.log(a);

    });
});
