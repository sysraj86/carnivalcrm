$(function(){
    CheckTableClone();
    if($('.thuesuat').val() == ''){
       $('.thuesuat').val('10');
    }
    
    if($(".center").val()==""){
        $(this).val('0');
    }
    $(".center").focus(function(){
        if($(this).val()== 0){
            $(this).val("");   
        }
    });
    //$(".center").numeric();
    $(".center").blur(function(){
        if($(this).val()==""){
            $(this).val("0");
        }
    });
    
        $(".btnAddRow").live('click',function(){
        if($(this).closest('table').attr('class')=='table_clone') {
            var lastRow = $(this).closest('table').find('tbody > tr:last');
            var ttt = $(this).closest('table').find('tbody > tr:last').clone(true);
            ttt.insertAfter(lastRow);
            CheckTableClone(); 
            $(this).closest("table").find(" tbody tr:last").find("input:text,textarea").each(function()
            {
                $(this).val("0");

            });
            //jQuery(this).closest("table").find(" tbody tr:last").find(".check_tam_ung").attr("checked",false);
        }
    });
    

    // Xoa
    jQuery(this).find(".btnDelRow").click(function(i)
    {
        jQuery(this).closest("tr").remove();
        CheckTableClone();
        tongchinhahang();
        tinhtongchikhachsan(); 
        tinhtongchivanchuyen();
        tinhtongchichodichvu();
        tinhtongchichothamquan();
        tinhtoanchiphikhac();
        tinhtoantongchiphi(); 
        tinhtoantongthue();
    });

    // only input number in text box
    $(".center, .khoanmuc").live('keypress', function(event) {
        // Backspace, tab, enter, end, home, left, right
        // We don't support the del key in Opera because del == . == 46.
        var controlKeys = [8, 9, 13, 35, 36, 37, 39];
        // IE doesn't support indexOf
        var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
        // Some browsers just don't raise events for control keys. Easy.
        // e.g. Safari backspace.
        if (!event.which || // Control keys in most browsers. e.g. Firefox tab is 0
        (49 <= event.which && event.which <= 57) || // Always 1 through 9
        (48 == event.which && $(this).attr("value")) || // No 0 first digit
        isControlKey || String.fromCharCode(event.which ) == ".") { // Opera assigns values for control keys.
            return;
        } else {
            event.preventDefault();
        }
    });
    //unformatNumber(n, num_grp_sep, dec_sep)
    
    $('.dongia, .thanhtien, .giachuthue, .tamung, giathamkhao, .center').live('blur',function(){
        if($(this).val()!='' && !isNaN($(this).val())){
            $(this).val(formatNumber($(this).val(), num_grp_sep, dec_sep, 0, 0));  
        }
    });
    // tính toán chi tiết                                                                         
    $('.dongia, .soluong, .songay, .thanhtien, .thuesuat, .giachuthue, .vat, .center, .khoanmuc').live("blur",function(){
        $this=$(this);
        //fmCurrency($this,0);
        tinhtoan($this);  
        
    });
    
    $('.dongia_option').live('change',function(){
        $this=$(this);
        tinhtoan($this);
    }) ;

    // ham tinh toan
    function tinhtoan(name){
        dg = parseFloat(unformat($(name).closest("tr").find(".dongia").val()));
        sl = parseFloat(unformat($(name).closest("tr").find(".soluong").val()));
        sn = parseFloat(unformat($(name).closest("tr").find(".songay").val()));
        ts = parseFloat(unformat($(name).closest("tr").find(".thuesuat").val()));
        foc = parseFloat(unformat($(name).closest('tr').find('.foc').val()));
        dongia_option = $(name).closest("tr").find(".dongia_option");
        if(isNaN(foc)){foc=0;}
        if(isNaN(sn)){sn=1;}
        var tt;
        if(dongia_option){
            if(dongia_option.val()=="trongoi"){
                tt = dg*(sl-foc); 
                $(name).closest("tr").find(".songay").hide();  
            }
            else{
                $(name).closest("tr").find(".songay").show(); 
                tt = dg*(sl-foc)*sn;
            }   
        }

        giachuathue = Math.round(tt/(1+(ts/100))).toFixed(0);
        if(!isNaN(tt)){
            $(name).closest("tr").find(".thanhtien").val(tt);
            fmCurrency($(name).closest("tr").find(".thanhtien"),0);
        }
        if(!isNaN(giachuathue)){
            $(name).closest("tr").find(".giachuathue").val(giachuathue);
            fmCurrency($(name).closest("tr").find(".giachuathue"),0)
        }
        if(!isNaN(tt-giachuathue)){
            $(name).closest("tr").find(".vat").val(tt-giachuathue);
            fmCurrency($(name).closest("tr").find(".vat"),0);
        }
        checkdata();
        tinhtongchiphivemaybay();
        tongchinhahang();
        tinhtongchikhachsan(); 
        tinhtongchivanchuyen();
        tinhtongchichodichvu();
        tinhtongchichothamquan();
        tinhtoanchiphikhac();
        tinhtoantongchiphi(); 
        tinhtoantongthue(); 
    }
     
    // thay doi gia tham khao khi chon khoan muc khac

    $(".servicename").live('change',function(){
        var val = $(this).val();
        $(this).closest("tr").find(".giathamkhao").val($(this).closest("tr").find(".giathamkhao_an option:[value="+val+"]").text());
        $(this).closest("tr").find(".service_name").val($(this).closest("tr").find(".servicename option:[value="+val+"]").text());
        $(this).closest("tr").find(".center").val(0);
       // $(this).closest("tr").find(".check_tam_ung").attr("checked",false);
    }); 


    $(".check_tam_ung").live('click',function(){
        if($(this).is(':checked')){
            thanhtien = $(this).closest('tr').find('.thanhtien').val();
            $(this).closest('tr').find('.tamung').val(thanhtien);
        
        }
        else{
            $(this).closest('tr').find('.tamung').val('0');
        }
    });
});



/*$(".center").keypress(function(e){
if (!e)
var e = window.event;

var keycode = e.keyCode;
if (e.which)
keycode = e.which;
if ((keycode==null) || (keycode==0) || (keycode==8) ||  (keycode==9) || (keycode==13) || (keycode==27)){
return true;
}
else if ((("0123456789").indexOf(String.fromCharCode(keycode)) > -1)) {
return true;
}
else if (false && (String.fromCharCode(keycode) == ".")) { 
return true;
}              
else{
e.preventDefault();
}
});*/

// function allow input decimal number
/*function numbersonly(e, decimal) {
var key;
var keychar;

if (window.event) {
key = window.event.keyCode;
}
else if (e) {
key = e.which;
}
else {
return true;
}
keychar = String.fromCharCode(key);

if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
return true;
}
else if ((("0123456789").indexOf(keychar) > -1)) {
return true;
}
else if (decimal && (keychar == ".")) { 
return true;
}
else
return false;
} */


// phần tính toán tổng chi cho các dịch vụ

// tổng chi cho nhà hàng
function tongchinhahang(){
    var sum = 0; 
    var tongthue = 0;
    var count = $("#nhahang").find("tbody > tr").length;
    for(i = 1; i<=count; i++ ){
        tongtien = parseFloat(unformat($("#nh_thanhtien"+i).val()));          
        thue = parseFloat(unformat($("#nh_vat"+i).val()));
        sum += tongtien;
        tongthue += thue;
    }
    if(!isNaN(sum)){
        $("#nhahang_tongthanhtien").val(sum);
        fmCurrency($("#nhahang_tongthanhtien"),0)
    }
    if(!isNaN(tongthue)){
        $("#nhahang_tongthue").val(tongthue);
        fmCurrency($("#nhahang_tongthue"),0)
    }
}

// chi phi cho khách sạn 
function tinhtongchikhachsan(){
    var sum = 0;
    var tongthue = 0;
    var count = $("#khachsan").find("tbody > tr").length;
    for(i = 1; i<=count; i++ ){
        tongtien = parseFloat(unformat($("#ks_thanhtien"+i).val()));
        thue = parseFloat(unformat($("#ks_vat"+i).val()));
        sum += tongtien;
        tongthue += thue;
    }
    if(!isNaN(sum)){
        $("#khachsan_tongthanhtien").val(sum);
        fmCurrency($("#khachsan_tongthanhtien"),0);
    }
    if(!isNaN(tongthue)){
        $("#khachsan_tongthue").val(tongthue);
        fmCurrency($("#khachsan_tongthue"),0);
    }
}

// chi phí cho vận chuyển
function tinhtongchivanchuyen(){
    var sum = 0;
    var tongthue = 0;
    var count = $("#vanchuyen").find("tbody > tr").length;
    for(i = 1; i<=count; i++ ){
        tongtien = parseFloat(unformat($("#vanchuyen_thanhtien"+i).val()));
        thue =  parseFloat(unformat($("#vanchuyen_vat"+i).val()));
        sum += tongtien;
        tongthue += thue;
    }
    if(!isNaN(sum)){
        $("#vanchuyen_tongthanhtien").val(sum);
        fmCurrency($("#vanchuyen_tongthanhtien"),0);
    }
    if(!isNaN(tongthue)){
        $("#vanchuyen_tongthue").val(tongthue);
        fmCurrency($("#vanchuyen_tongthue"),0);
    }
}

// chi phí cho phần dịch vụ
function tinhtongchichodichvu(){
    var sum = 0;
    var tongthue = 0;
    var count = $("#dichvu").find("tbody > tr").length;
    for(i = 1; i<=count; i++ ){
        tongtien = parseFloat(unformat($("#services_thanhtien"+i).val()));
        thue = parseFloat(unformat($("#services_vat"+i).val()));
        sum += tongtien;
        tongthue += thue;
    }
    if(!isNaN(sum)){
        $("#service_tongthanhtien").val(sum);
        fmCurrency( $("#service_tongthanhtien"),0);
    }
    if(!isNaN(tongthue)){
        $("#service_tongthue").val(tongthue);
        fmCurrency($("#service_tongthue"),0);
    }
}

// chi phí cho phần tham quan

function tinhtongchichothamquan(){
    var sum = 0;
    var tongthue = 0;
    var count = $("#thamquan").find("tbody > tr").length;
    for(i = 1; i<=count; i++ ){
        tongtien = parseFloat(unformat($("#thamquan_thanhtien"+i).val()));
        thue = parseFloat(unformat($("#thamquan_vat"+i).val()));
        sum += tongtien;
        tongthue += thue;
    }
    if(!isNaN(sum)){
        $("#thamquan_tongthanhtien").val(sum);
        fmCurrency($("#thamquan_tongthanhtien"),0);
    }
    if(!isNaN(tongthue)){
        $("#thamquan_tongthue").val(tongthue);
        fmCurrency($("#thamquan_tongthue"),0)
    }
}


// function check clone table

function CheckTableClone(){    
    jQuery(".table_clone").each(function()
    {    
        var tongdong = 0;
        jQuery(this).find(" tbody tr").each(function(i)
        {
            if(jQuery(this).closest("table").attr("class")=="table_clone"){
                tongdong++;
            }
        });
        var count = 0;
        jQuery(this).find(" tbody tr").each(function(i)
        {
            count++;
            if(jQuery(this).closest("table").attr("class")=="table_clone")
                {
                var chiso=count;
                jQuery(this).find("select,input,span,textarea,button").each(function()
                {
                    var eID = $(this).attr('id');
                    digit = eID.match(/\d+$/);
                    if(digit !=null && !isNaN(digit)){
                        eID_After = eID.replace(digit,chiso); 
                    }
                    else{
                        eID_After = eID+chiso;
                    } 
                    jQuery(this).attr('id',eID_After);  
                });
            }
        });
    });
} 
 /***
 * tinh tong chi phi cho ve may bay 
 */

function tinhtongchiphivemaybay(){
    tongtien = 0;
    tongthue = 0;
    count = $('#vemaybay').find('tbody > tr').length; 
    for(i=1;i<=count;i++){
        tongtien += parseFloat(unformat($('#vemaybay_thanhtien'+i).val()));
        tongthue += parseFloat(unformat($('#vemaybay_vat'+i).val()));
    }
    if(!isNaN(tongtien)){
        $('#vemaybay_tongthanhtien').val(tongtien);
        fmCurrency($('#vemaybay_tongthanhtien'),0);
    }
    if(!isNaN(tongthue)){
        $('#vemaybay_tongthue').val(tongthue);
        fmCurrency($('#vemaybay_tongthue'),0);
    }
}

// tinh toan chi phi khac
function tinhtoanchiphikhac(){
    tongtienchiphikhac = 0;
    tongthuechiphikhac = 0;            
    count = $('#chiphikhac').find('tbody > tr').length;
    for(i=1;i<=count;i++){
        tongtienchiphikhac += parseFloat(unformat($('#chiphikhac_thanhtien'+i).val()));
        tongthuechiphikhac += parseFloat(unformat($('#chiphikhac_vat'+i).val()));
    }
    if(!isNaN(tongtienchiphikhac)){
        $('#chiphikhac_tongcong').val(tongtienchiphikhac);
        fmCurrency($('#chiphikhac_tongcong'),0);
    }
    if(!isNaN(tongthuechiphikhac)){
        $('#chiphikhac_tongthue').val(tongthuechiphikhac);
        fmCurrency($('#chiphikhac_tongthue'),0);
    }
}        

// function tinh toán tổng chi phí
function tinhtoantongchiphi(){
    vmb = parseFloat(unformat($('#vemaybay_tongthanhtien').val())); 
    nh = parseFloat(unformat($("#nhahang_tongthanhtien").val()));
    ks = parseFloat(unformat($("#khachsan_tongthanhtien").val()));
    vc = parseFloat(unformat($("#vanchuyen_tongthanhtien").val())); 
    dv = parseFloat(unformat($("#service_tongthanhtien").val()));
    tq = parseFloat(unformat($("#thamquan_tongthanhtien").val()));
    chiphikhac = parseFloat(unformat($("#chiphikhac_tongcong").val()));
    if(isNaN(nh)){
        nh = 0;
    }
    if(isNaN(ks)){
        ks = 0;
    }
    if(isNaN(vc)){
        vc = 0;
    }
    if(isNaN(dv)){
        dv = 0;
    }
    if(isNaN(tq)){
        tq = 0;
    }
    if(isNaN(chiphikhac)){
        chiphikhac = 0;
    }
    if(isNaN(vmb)){vmb =0}
    tongchi = vmb+nh+ks+vc+dv+tq+chiphikhac;
    if(!isNaN(tongchi)){
        $("#tongchiphi").val(tongchi);
        fmCurrency($("#tongchiphi"),0);
    }
    tyle = Math.round(tongchi*(parseFloat($("#tyle").val())/100)).toFixed(0);
    if(!isNaN(tyle)){
        $("#tientheotyle").val(tyle);
        fmCurrency($("#tientheotyle"),0);
    }
    hh = parseFloat(unformat($("#hoahong").val())); 
    giaban = parseFloat(tongchi)+parseFloat(tyle)+parseFloat(hh);

    if(!isNaN(giaban)){
        $("#giaban").val(giaban);
        fmCurrency($("#giaban"),0);
    }
    sokhach = parseFloat(unformat($("#sokhach").val()));
    giabantrenmotkhach = Math.round(giaban/sokhach).toFixed(0);
    $("#giabantrenmotnguoi").val(giabantrenmotkhach);
    fmCurrency($("#giabantrenmotnguoi"),0);
    // tinh toan vat dau ra
    vatdaura = Math.round(giaban - giaban/(1+(parseFloat($("#thuesuathoa").val()/100)))).toFixed(0);
    if(!isNaN(vatdaura)){
        $("#vatdaura").val(vatdaura);
        fmCurrency($("#vatdaura"),0);
    }
    $("#vatdauvao").val($("#tongthue").val());
    vatdauvao = parseFloat(unformat($("#vatdauvao").val()));
    //   vat phải đóng
    vatphaidong = vatdaura-vatdauvao;
    if(!isNaN(vatphaidong)){
        $("#vatphaidong").val(vatphaidong);
        fmCurrency($("#vatphaidong"),0);
    }
    // doanh thu
    doanhthu = giaban-vatdaura;
    if(!isNaN(doanhthu)){
        $("#doanhthu").val(doanhthu);
        fmCurrency($("#doanhthu"),0);
    }
    // thue dau vao
    thuedauvao = parseFloat(unformat($("#tongthue").val()));
    // tinh tong chi
    hoahong = parseFloat(unformat($("#hoahong").val()));
    if(hoahong == ''){
        hoahong = 0;
    }
    tongchiphi = Math.round(tongchi-thuedauvao+hoahong).toFixed(0);

    if(!isNaN(tongchiphi)){
        $("#tongchiphi1").val(tongchiphi);
        fmCurrency($("#tongchiphi1").val(tongchiphi),0);
    }

    // gia von tren khach
    vontrenkhach = Math.round(tongchiphi/sokhach).toFixed(0);
    if(!isNaN(vontrenkhach)){
        $("#giavontrenkhach").val(vontrenkhach);
        fmCurrency($("#giavontrenkhach"),0);
    }

    // gia ban tren khach

    giabantrenkhach = Math.round(doanhthu/sokhach).toFixed(0);
    if(!isNaN(giabantrenkhach)){
        $("#giabantrenkhach").val(giabantrenkhach);
        fmCurrency($("#giabantrenkhach"),0);
    }

    // lai khach 

    laikhach = Math.round(giabantrenkhach-vontrenkhach).toFixed(0);
    if(!isNaN(laikhach)){
        $("#laikhach").val(laikhach);
        fmCurrency($("#laikhach"),0);
    }
    // tong lai
    tonglai = Math.round(laikhach*sokhach).toFixed(0);
    if(!isNaN(tonglai)){
        $("#tonglai").val(tonglai);
        fmCurrency($("#tonglai"),0);
    }

    // ty le sau thue

    tylesauthue = Math.round((tonglai/doanhthu)*100).toFixed(0);
    if(!isNaN(tylesauthue)){
        $("#tylesauthue").val(tylesauthue);
        fmCurrency($("#tylesauthue"),0);
    }


}
// tính toán phần thuế 
function tinhtoantongthue(){
    nh = parseFloat(unformat($("#nhahang_tongthue").val()));
    ks = parseFloat(unformat($("#khachsan_tongthue").val()));
    vc = parseFloat(unformat($("#vanchuyen_tongthue").val())); 
    dv = parseFloat(unformat($("#service_tongthue").val()));
    tq = parseFloat(unformat($("#thamquan_tongthue").val()));
    chiphikhac = parseFloat(unformat($("#chiphikhac_tongthue").val()));
    vmb = parseFloat(unformat($('#vemaybay_tongthue').val()));

    if(isNaN(nh)){
        nh = 0;
    }
    if(isNaN(ks)){
        ks = 0;
    }
    if(isNaN(vc)){
        vc = 0;
    }
    if(isNaN(dv)){
        dv = 0;
    }
    if(isNaN(tq)){
        tq = 0;
    }
    if(isNaN(chiphikhac)){
        chiphikhac = 0;
    }
    if(isNaN(vmb)){vmb = 0;}
    tongthue = vmb+nh+ks+vc+dv+tq+chiphikhac;
    if(!isNaN(tongthue)){
        $("#tongthue").val(tongthue);
        fmCurrency($("#tongthue"),0);
    }
}
