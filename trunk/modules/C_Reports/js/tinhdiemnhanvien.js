$(document).ready(function(){
    checkSaleMan();
    $('#check_sale_man').click(function(){
       checkSaleMan();
       $('#export').hide(); 
    });
    /**
    * Bat su kien thay doi tren phan require để an button Export.
    */
    $('.selectdata').click(function(){
       $('#export').hide(); 
    });
    $('.cleardata').click(function(){
       $('#export').hide(); 
    });
    $('#department').change(function(){
       $('#export').hide(); 
    });
    $('#ky').change(function(){
       $('#export').hide(); 
    });
    $('#thang').change(function(){
       $('#export').hide(); 
    });
    $('#nam').click(function(){
       $('#export').hide(); 
    });
    //
    function checkSaleMan(){
        if($('#check_sale_man').attr('checked') == true){
            $('#check_sale_man').val('1');
            $('#check_sale_man').closest('td').next().show();
            $('#check_sale_man').closest('td').next().next().hide();
            $('#check_sale_man').closest('td').next().next().next().hide();
            $('#tinhdiem').show();
            $('#xephang').show();
            $('#tinhdiemsales').hide();
            $('#tinhdiemtelesales').hide();
            $('#xephangsales').hide();
            $('#xephangtelesales').hide();
        }else{
            $('#check_sale_man').val('0');
            $('#sale_man').val('');
            $('#sale_man_id').val('');
            $('#tinhdiem').hide();
            $('#xephang').hide();
            $('#check_sale_man').closest('td').next().hide();
            $('#check_sale_man').closest('td').next().next().show();
            $('#check_sale_man').closest('td').next().next().next().show();
            $('.selectdata').hide();
            $('#tinhdiemsales').show();
            $('#tinhdiemtelesales').show();
            $('#xephangsales').show();
            $('#xephangtelesales').show();
        }
    }
    
    $('.hover').hover(function(){
        $(this).attr('style','background-color: #FFE4B5; height: 30px;');
    },function(){
        $(this).attr('style','background-color: #F5FFFA; height: 30px;');
    });

});