/***
* Using calaulate in Inbound Worksheet and function Add new row
* Author: Nguyễn Đức Hải
* Date Publish: 2011/12/14
*/
$(document).ready(function(){
    $('.highlight').css('background','#FFF531'); 
    setInterval(
        (function x() {
           getSokhach();
            return x;
        })(), 5000
    );
    /////////////
    /*slNguoilon = $('#thuesuathoa').val();
    slTreem = $('#sokhach').val();
    
    soluongvmb = parseFloat(unformat($('.soluongnguoilon').val()))+parseFloat(unformat($('.soluongtreem').val())) ;
//    $('.vemaybay_soluong').val(soluongvmb);
    if($('.vemaybay_soluong').val()==0 || $('.vemaybay_soluong').val() == ''){
        $(this).val(soluongvmb);
    }
    if($('.thamquan_soluongte').val()==0 || $('.thamquan_soluongte').val() ==''){
        $('.thamquan_soluongnl').val(slTreem);  
    }
    if($('.thamquan_soluongnl').val()==0 || $('.thamquan_soluongnl').val()==''){
        $('.thamquan_soluongnl').val(slNguoilon);
    }
    
    if($('.cpk_soluong').val()==0 ||$('.cpk_soluong').val() == ''){
       $('.cpk_soluong').val(slNguoilon+slTreem);
    }
    
    if($('.giaban_sl_nl').val() == 0 || $('.giaban_sl_nl').val()==''){
        $('.giaban_sl_nl').val(slNguoilon);
    }
    if($('.giaban_sl_te').val() == 0 || $('.giaban_sl_te').val() ==''){
        $('.giaban_sl_te').val(slTreem);
    } */
    ///////////////
    
    $('.showdiv').hide();
    
    $('.hidediv').live('click',function(){
        $(this).closest('fieldset').find('.displayandshow').hide();
        $(this).closest('fieldset').find('.showdiv').show();
        $(this).hide();
    });
    
    $('.showdiv').live('click',function(){
        $(this).closest('fieldset').find('.displayandshow').show();
        $(this).closest('fieldset').find('.hidediv').show();
        $(this).hide();
    });
    
    
    
    
    if($('.thuesuat').val() == '' || $('.thuesuat').val()==0){
       $('.thuesuat').val('10');
    }
    
    if($(".center").val()==""){
        $(this).val("0");         
    }
    $(".center").live('focus',function(){
        if($(this).val()== 0){
            $(this).val("");   
        }
    });
    $(".center").live('blur',function(){
        if($(this).val()==""){
            $(this).val("0");
        }
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
        isControlKey || String.fromCharCode(event.which ) == "." || String.fromCharCode(event.which ) == ",") { // Opera assigns values for control keys.
            return;
        } else {
            event.preventDefault();
        }
    });
    CheckTableClone();
    // add new row to hotel
    $('.btnKSAddRow').live('click',function(i){
        if($(this).closest('tr').find('.tenkhachsan').val()== null){
            alert("bạn chưa chọn khách sạn !");
            $(this).closest('tr').find('.tenkhachsan').focus();
            return;
        }
        if($(this).closest('tr').find('.hangphong').val()== null){
            alert("bạn chưa chọn hạng phòng !");
            $(this).closest('tr').find('.hangphong').focus();
            return;
        }
        var tableID = $(this).closest('table').attr('id');
        var ks_id = $(this).closest('tr').find('.tenkhachsan').val();
        var ks_name = $(this).closest("tr").find(".tenkhachsan option:[value="+ks_id+"]").text();
        var hangphong = $(this).closest('tr').find('.hangphong').val();
        addNewRowKS(ks_name,ks_id,hangphong,tableID);
        CheckTableClone();
        $(this).closest('tr').find('.hangphong, .tenkhachsan').val(null);
    });

    // add new row for chi phi huong dan vien + lai xe
    $('.btnAddHDV').live('click',function(i){
        if($(this).closest('tr').find('.listcongtacphi').val()==null){
            alert('bạn chưa chọn loại chi phí');
           $(this).closest('tr').find('.listcongtacphi').focus();
           return; 
        }
         var tableID = $(this).closest('table').attr('id');
         var val = $(this).closest('tr').find('.listcongtacphi').val();
         var label = $(this).closest("tr").find(".listcongtacphi option:[value="+val+"]").text();
         addNewRowHDV(val,label,tableID);
         CheckTableClone(); 
         $(this).closest('tr').find('.listcongtacphi').val(null);
    });
    
    
    // add new row 
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
            $(this).closest("table").find(" tbody tr:last").find(".check_tam_ung").each(function()
            {
                $(this).attr("checked",false);

            });

        }
    });

    // delete row
    $(".btnDelRow").live('click',function(i)
    {
        if($(this).closest('table').attr('class')=='table_clone') {
            $(this).closest("tr").remove();
            CheckTableClone();
            tinhtongchichovemaybay();
            tinhtongchinhahang();
            tinhtoanchiphikhachsan();
            tinhtoanchiphivanchuyen();
            tinhtoanchiphivanchuyen();
            tinhtoanchiphidichvu();
            tinhtoanchiphithamquan();
            tinhtoanchohdvvalaixe();
            tinhtoanchiphikhac();
            tinhtoantongchiphi();
            tinhtoangiaban();
            tinhtoanchitiet();
        }
    });

    $('.dongia,.thanhtien').live('blur',function(){
          $this = $(this);
          fmCurrency($this,2);
    });

    // tinh toan 
    $('.center, .dongia, .soluong, .thanhtien, .songay, .thuesuat').live('blur',function(){
        $this = $(this);
        tinhtoan($this);
    }) ;
    
    $('.dongia_option').live('change',function(){
          $this = $(this);
          tinhtoan($this);
    }) ;
    
    function tinhtoan(name){
        dongia = parseFloat(unformat($(name).closest('tr').find('.dongia').val()));
        soluong = parseFloat(unformat($(name).closest('tr').find('.soluong').val()));
        songay = parseFloat(unformat($(name).closest('tr').find('.songay').val()));
        foc = parseFloat(unformat($(name).closest('tr').find('.foc').val()));
        dongia_option = $(name).closest("tr").find(".dongia_option");
        var thanhtien ;
        if(isNaN(foc)){foc = 0;}
        if(isNaN(songay)){songay=1;} 
        if(foc>soluong){
            alert('FOC không được lớn hơn Số lượng');
            $(this).closest('tr').find('.foc').val().focus();
            return;
        }
        if(dongia_option){
            if(dongia_option.val()=="trongoi"){
                thanhtien = (soluong-foc)*dongia; 
                $(name).closest("tr").find(".songay").hide();  
            }
            else{
                $(name).closest("tr").find(".songay").show(); 
                thanhtien = (soluong-foc)*dongia*songay; 
            }   
        }
        
        thuesuat = parseFloat(unformat($(name).closest('tr').find('.thuesuat').val()));
        vat =  Math.round(thanhtien/((100/thuesuat)+1)).toFixed(2);
        if(!isNaN(thanhtien)){
            $(name).closest('tr').find('.thanhtien').val(thanhtien);
            fmCurrency($(name).closest('tr').find('.thanhtien').val(thanhtien),2);
        }
        if(!isNaN(vat)){
            $(name).closest('tr').find('.vat').val(vat);
            fmCurrency($(name).closest('tr').find('.vat'),2);
        }
        tinhtongchichovemaybay();
        tinhtongchinhahang();
        tinhtoanchiphikhachsan();
        tinhtoanchiphivanchuyen();
        tinhtoanchiphivanchuyen();
        tinhtoanchiphidichvu();
        tinhtoanchiphithamquan();
        tinhtoanchohdvvalaixe();
        tinhtoanchiphikhac();
        tinhtoantongchiphi();
        tinhtoangiaban();
        tinhtoanchitiet();
    }
        
    // tinh toan chi tiet phan tham quan
    $('.thamquan_dongianl, .thamquan_soluongnl, .thamquan_dongiate, .thamquan_soluongte, .thanhtien, .songay , .thuesuat, .vat, .center').live('blur',function(){
        giathamquannl = parseFloat(unformat($(this).closest('tr').find('.thamquan_dongianl').val()));
        giathamquanslnl = parseFloat(unformat($(this).closest('tr').find('.thamquan_soluongnl').val()));
        thamquan_dongiate = parseFloat(unformat($(this).closest('tr').find('.thamquan_dongiate').val()));
        thamquan_soluongte = parseFloat(unformat($(this).closest('tr').find('.thamquan_soluongte').val()));
        songay = parseFloat($(this).closest('tr').find('.songay').val());
        thuesuat = parseFloat($(this).closest('tr').find('.thuesuat').val());
        thanhtien = (giathamquannl*giathamquanslnl*songay) + (thamquan_dongiate*thamquan_soluongte*songay);
        ts= (100/thuesuat)+1; 
        vat = Math.round(thanhtien/ts).toFixed(2);
        if(!isNaN(thanhtien)){
            $(this).closest('tr').find('.thanhtien').val(thanhtien);
            fmCurrency($(this).closest('tr').find('.thanhtien'),2);
        }
        if(!isNaN(vat)){
            $(this).closest('tr').find('.vat').val(vat);
            fmCurrency($(this).closest('tr').find('.vat'),2);
        }
            tinhtongchichovemaybay();
            tinhtongchinhahang();
            tinhtoanchiphikhachsan();
            tinhtoanchiphivanchuyen();
            tinhtoanchiphivanchuyen();
            tinhtoanchiphidichvu();
            tinhtoanchiphithamquan();
            tinhtoanchohdvvalaixe();
            tinhtoanchiphikhac();
            tinhtoantongchiphi();
            tinhtoangiaban();
            tinhtoanchitiet();
    }); 
    // hotel calculate
    $('.phongdon, .soluongphongdon, .phongdoi, .soluongphongdoi, .phongba, .soluongphongba, .songaydem, .thanhtien, .thuesuat, .center').live('blur' ,function(){
        phongdon =  parseFloat(unformat($(this).closest('tr').find('.phongdon').val()));
        soluongphongdon =  parseFloat(unformat($(this).closest('tr').find('.soluongphongdon').val()));
        phongdoi =  parseFloat(unformat($(this).closest('tr').find('.phongdoi').val()));
        soluongphongdoi =  parseFloat(unformat($(this).closest('tr').find('.soluongphongdoi').val()));
        phongba =  parseFloat(unformat($(this).closest('tr').find('.phongba').val()));
        soluongphongba =  parseFloat(unformat($(this).closest('tr').find('.soluongphongba').val()));
        songaydem =  parseFloat(unformat($(this).closest('tr').find('.songaydem').val()));
        thuesuat =  parseFloat(unformat($(this).closest('tr').find('.thuesuat').val()));
        thanhtien =  (phongdon*soluongphongdon*songaydem)+ (phongdoi*soluongphongdoi*songaydem) +(phongba*soluongphongba*songaydem);
        ts= (100/thuesuat)+1;
        vat = Math.round(thanhtien/ts).toFixed(2);
        if(!isNaN(thanhtien)){
            $(this).closest('tr').find('.thanhtien').val(thanhtien);
            fmCurrency($(this).closest('tr').find('.thanhtien'),2);
        }
        if(!isNaN(vat)){
            $(this).closest('tr').find('.vat').val(vat);
            fmCurrency($(this).closest('tr').find('.vat'),2);
        }
        tinhtongchichovemaybay();
        tinhtongchinhahang();
        tinhtoanchiphikhachsan();
        tinhtoanchiphivanchuyen();
        tinhtoanchiphivanchuyen();
        tinhtoanchiphidichvu();
        tinhtoanchiphithamquan();
        tinhtoanchohdvvalaixe();
        tinhtoanchiphikhac();
        tinhtoantongchiphi();
        tinhtoangiaban();
        tinhtoanchitiet();
    });
    
    

});


// function tinhtong chi phi cho ve may bay
function tinhtongchichovemaybay(){
    tongthanhtienmb = 0; tongthuemb=0;
    tongthanhtienmt = 0; tongthuemt= 0;
    tongthanhtienmn = 0; tongthuemn= 0;
    // tong chi o mien bac
    count = $("#vemaybay_mb").find("tbody > tr").length; 
    if(count>0){
        for(i=1;i<=count;i++){
            thanhtien1 = parseFloat(unformat($("#vemaybay_mb_thanhtien"+i).val()));
            thue1 = parseFloat(unformat($('#vemaybay_mb_vat'+i).val()));
            if(isNaN(thanhtien1)){thanhtien1=0;}
            tongthanhtienmb += thanhtien1;
             if(isNaN(thue1)){thue1=0;} 
             tongthuemb += thue1;
        }
    }
    if(!isNaN(tongthanhtienmb)){
        $('#vemaybay_mb_tongthanhtien').val(tongthanhtienmb);
        fmCurrency($('#vemaybay_mb_tongthanhtien'),2);
    }
    if(!isNaN(tongthuemb)){
        $('#vemaybay_mb_tongthue').val(tongthuemb);
        fmCurrency($('#vemaybay_mb_tongthue'),2);
    }

    //    tong chi o mien trung
    count1 = $('#vemaybay_mt').find('tbody > tr').length;
    if(count1>0){
        for(j=1; j<=count1;j++){
            thanhtien2 = parseFloat(unformat($('#vemaybay_mt_thanhtien'+j).val()));
            tongthanhtienmt += thanhtien2;
            tongthuemt += parseFloat(unformat($('#vemaybay_mt_vat'+j).val()));
        }
    }
    if(!isNaN(tongthanhtienmt)){
        $('#vemaybay_mt_tongthanhtien').val(tongthanhtienmt);
        fmCurrency($('#vemaybay_mt_tongthanhtien'),2);
    }
    if(!isNaN(tongthuemt)){
        $('#vemaybay_mt_tongthue').val(tongthuemt);        
        fmCurrency($('#vemaybay_mt_tongthue'),2);
    }
    // tong chi o mien nam
    count2 = $('#vemaybay_mn').find('tbody tr').length;
    if(count2>0){
        for(n=1; n<=count2;n++){
            tongthanhtienmn += parseFloat(unformat($('#vemaybay_mn_thanhtien'+n).val()));
            tongthuemn += parseFloat(unformat($('#vemaybay_mn_vat'+n).val()));
        }
    }
    if(!isNaN(tongthanhtienmn)){
        $('#vemaybay_mn_tongthanhtien').val(tongthanhtienmn);
        fmCurrency($('#vemaybay_mn_tongthanhtien'),2);
    }
    if(!isNaN(tongthuemn)){
        $('#vemaybay_mn_tongthue').val(tongthuemn);
        fmCurrency($('#vemaybay_mn_tongthue'),2);
    }
    tongtien = tongthanhtienmb+tongthanhtienmt+tongthanhtienmn;
    tongthue = tongthuemb+tongthuemt+tongthuemn;
    if(!isNaN(tongthue)){
        $('#vemaybay_tongthanhtien').val(tongtien);
        fmCurrency($('#vemaybay_tongthanhtien'),2);
    }
    if(!isNaN(tongthue)){
        $('#vemaybay_tongthue').val(tongthue);
        fmCurrency($('#vemaybay_tongthue'),2);
    }
}

// tinh toan tong chi cho nha hang
function tinhtongchinhahang(){
    tongthanhtienmb =0; tongthuemb = 0;
    tongthanhtienmt = 0; tongthuemt = 0;
    tongthanhtienmn = 0; tongthuemn = 0;
    // tong chi o mien bac
    count = $('#nhahang_mienbac').find('tbody > tr').length;
    if(count>0){
        for(i=1;i<=count;i++){
            tongthanhtienmb += parseFloat(unformat($('#nh_thanhtien_mb'+i).val()));
            tongthuemb += parseFloat(unformat($('#nh_thue_mb'+i).val()));
        }
        if(!isNaN(tongthanhtienmb)){
            $('#nhahang_tongthanhtien_mienbac').val(tongthanhtienmb);
            fmCurrency($('#nhahang_tongthanhtien_mienbac'),2);
        }
        if(!isNaN(tongthuemb)){
            $('#nhahang_tongthue_mienbac').val(tongthuemb) ;
            fmCurrency($('#nhahang_tongthue_mienbac'),2);
        }
    }
    // tong chi o mien trung
    count1 = $('#nhahang_mientrung').find('tbody > tr').length;
    if(count1>0){
        for(i=1;i<=count1;i++){
            tongthanhtienmt += parseFloat(unformat($('#nh_thanhtien_mt'+i).val()));
            tongthuemt += parseFloat(unformat($('#nh_thue_mt'+i).val()));
        }
        if(!isNaN(tongthanhtienmt)){
            $('#nhahang_tongthanhtien_mientrung').val(tongthanhtienmt);
            fmCurrency($('#nhahang_tongthanhtien_mientrung'),2);
        }
        if(!isNaN(tongthuemt)){
            $('#nhahang_tongthue_mientrung').val(tongthuemt);
            fmCurrency($('#nhahang_tongthue_mientrung'),2);
        }
    }
    // tong chi o mien nam
    count2 = $('#nhahang_miennam').find('tbody > tr').length;
    if(count2>0){
        for(i=1;i<=count2;i++){
            tongthanhtienmn += parseFloat(unformat($('#nh_thanhtien_mn'+i).val()));
            tongthuemn += parseFloat(unformat($('#nh_thue_mn'+i).val()));
        }
        if(!isNaN(tongthanhtienmn)){
            fmCurrency($('#nhahang_tongthanhtien_miennam'),2);
        }
        if(!isNaN(tongthuemn)){
            fmCurrency($('#nhahang_tongthue_miennam'),2);
        }
    }
    tongtien = tongthanhtienmb+tongthanhtienmt+tongthanhtienmn;
    tongthue = tongthuemb+tongthuemt+tongthuemn;
    if(!isNaN(tongtien)){
        $('#nhahang_tongthanhtien').val(tongtien);
        fmCurrency($('#nhahang_tongthanhtien'),2);
    }
    if(!isNaN(tongthue)){
        $('#nhahang_tongthue').val(tongthue);
        fmCurrency($('#nhahang_tongthue'),2);
    }

}

// tinh toan tong chi phan khach san
function tinhtoanchiphikhachsan(){
    tongthanhtienmb =0; tongthuemb = 0;
    tongthanhtienmt = 0; tongthuemt = 0;
    tongthanhtienmn = 0; tongthuemn = 0;
    // chi phi o mien bac
    count = $('#ks_mb').find('tbody > tr').length;
    if(count>0){
        for(i=1;i<=count;i++){
            tongthanhtienmb += parseFloat(unformat($('#thanhtien_ks_mb'+i).val()));
            tongthuemb += parseFloat(unformat($('#vat_ks_mb'+i).val()));
        }
        if(!isNaN(tongthanhtienmb)){
            $('#khachsan_tongthanhtien_mienbac').val(tongthanhtienmb);
            fmCurrency($('#khachsan_tongthanhtien_mienbac'),2);
        }
        if(!isNaN(tongthuemb)){
            $('#khachsan_tongthue_mienbac').val(tongthuemb);
            fmCurrency($('#khachsan_tongthue_mienbac'),2);
        }
    }
    // chi phi mien trung
    count1 = $('#ks_mt').find('tbody > tr').length;
    if(count1>0){
        for(i=1;i<=count1;i++){
            tongthanhtienmt += parseFloat(unformat($('#thanhtien_ks_mt'+i).val()));
            tongthuemt += parseFloat(unformat($('#vat_ks_mt'+i).val()));
        }
        if(!isNaN(tongthanhtienmt)){
            $('#khachsan_tongthanhtien_mientrung').val(tongthanhtienmt);
            fmCurrency($('#khachsan_tongthanhtien_mientrung'),2);
        }
        if(!isNaN(tongthuemt)){
            $('#khachsan_tongthue_mientrung').val(tongthuemt);
            fmCurrency($('#khachsan_tongthue_mientrung'),2);
        }
    }
    // chi phi o mien nam
    count2 = $('#ks_mn').find('tbody > tr').length;
    if(count2>0){
        for(i=1;i<=count2;i++){
            tongthanhtienmn += parseFloat(unformat($('#thanhtien_ks_mn'+i).val()));
            tongthuemn += parseFloat(unformat($('#vat_ks_mn'+i).val()));
        }
        if(!isNaN(tongthanhtienmn)){
            $('#khachsan_tongthanhtien_miennam').val(tongthanhtienmn);
            fmCurrency($('#khachsan_tongthanhtien_miennam'),2);
        }
        if(!isNaN(tongthuemn)){
            $('#khachsan_tongthue_miennam').val(tongthuemn);
            fmCurrency($('#khachsan_tongthue_miennam'),2);
        }
    }
    tongtien = tongthanhtienmb+tongthanhtienmt+tongthanhtienmn;
    tongthue = tongthuemb+tongthuemt+tongthuemn;
    if(!isNaN(tongtien)){
        $('#khachsan_tongthanhtien').val(tongtien);
        fmCurrency($('#khachsan_tongthanhtien'),2);
    }
    if(!isNaN(tongthue)){
        $('#khachsan_tongthue').val(tongthue);
        fmCurrency($('#khachsan_tongthue'),2);
    }
}

// tinh toan chi phi cho phan van chuyen
function tinhtoanchiphivanchuyen(){
    tongthanhtienmb =0; tongthuemb = 0;
    tongthanhtienmt = 0; tongthuemt = 0;
    tongthanhtienmn = 0; tongthuemn = 0;
    // chi phi van chuyen o mien bac
    count = $('#vanchuyen_mienbac').find('tbody > tr').length;
    if(count>0){
        for(i=1;i<=count;i++){
            tongthanhtienmb += parseFloat(unformat($('#vanchuyen_thanhtien_mb'+i).val()));
            tongthuemb += parseFloat(unformat($('#vanchuyen_vat_mb'+i).val()));
        }
        if(!isNaN(tongthanhtienmb)){
            $('#vanchuyen_tongthanhtien_mienbac').val(tongthanhtienmb);
            fmCurrency($('#vanchuyen_tongthanhtien_mienbac'),2);
        }
        if(!isNaN(tongthuemb)){
            $('#vanchuyen_tongthue_mienbac').val(tongthuemb);
            fmCurrency($('#vanchuyen_tongthue_mienbac'),2);
        }
    }
    // chi phi van chuyen o mien trung
    count1 = $('#vanchuyen_mientrung').find('tbody > tr').length;
    if(count1>0){
        for(i=1;i<=count1;i++){
            tongthanhtienmt += parseFloat(unformat($('#vanchuyen_thanhtien_mt'+i).val()));
            tongthuemt += parseFloat(unformat($('#vanchuyen_vat_mt'+i).val()));
        }
        if(!isNaN(tongthanhtienmt)){
            $('#vanchuyen_tongthanhtien_mientrung').val(tongthanhtienmt);
            fmCurrency($('#vanchuyen_tongthanhtien_mientrung'),2);
        }
        if(!isNaN(tongthuemt)){
            $('#vanchuyen_tongthue_mientrung').val(tongthuemt);
            fmCurrency($('#vanchuyen_tongthue_mientrung'),2);
        }
    }
    // chi phi van chuyen o mien nam
    count2 = $('#vanchuyen_miennam').find('tbody > tr').length;
    if(count2>0){
        for(i=1;i<=count2;i++){
            tongthanhtienmn += parseFloat(unformat($('#vanchuyen_thanhtien_mn'+i).val()));
            tongthuemn += parseFloat(unformat($('#vanchuyen_vat_mn'+i).val()));
        }
        if(!isNaN(tongthanhtienmn)){
            $('#vanchuyen_tongthanhtien_miennam').val(tongthanhtienmn);
            fmCurrency($('#vanchuyen_tongthanhtien_miennam'),2);
        }
        if(!isNaN(tongthuemn)){
            $('#vanchuyen_tongthue_miennam').val(tongthuemn);
            fmCurrency($('#vanchuyen_tongthue_miennam'),2);
        }
    }
    tongtien = tongthanhtienmb+tongthanhtienmt+tongthanhtienmn;
    tongthue = tongthuemb+tongthuemt+tongthuemn;
    if(!isNaN(tongtien)){
        $('#vanchuyen_tongthanhtien').val(tongtien);
        fmCurrency($('#vanchuyen_tongthanhtien'),2);
    }
    if(!isNaN(tongthue)){
        fmCurrency($('#vanchuyen_tongthue'),2);
    }

}

// tinh toan chi phi cho dich vu
function tinhtoanchiphidichvu(){
    tongthanhtienmb =0; tongthuemb = 0;
    tongthanhtienmt = 0; tongthuemt = 0;
    tongthanhtienmn = 0; tongthuemn = 0;
    // chi phi dich vu o mien bac
    count = $('#dichvu_mienbac').find('tbody > tr').length;
    if(count>0){
        for(i=1;i<=count;i++){
            tongthanhtienmb += parseFloat(unformat($('#services_thanhtien_mb'+i).val()));
            tongthuemb += parseFloat(unformat($('#services_vat_mb'+i).val()));
        }
        if(!isNaN(tongthanhtienmb)){
            $('#service_tongthanhtien_mienbac').val(tongthanhtienmb);
            fmCurrency($('#service_tongthanhtien_mienbac'),2);
        }
        if(!isNaN(tongthuemb)){
            $('#service_tongthue_mienbac').val(tongthuemb);
            fmCurrency($('#service_tongthue_mienbac'),2);
        }
    }
    // chi phi dich vu o mien trung
    count1 = $('#dichvu_mientrung').find('tbody > tr').length;
    if(count1>0){
        for(i=1;i<=count1;i++){
            tongthanhtienmt += parseFloat(unformat($('#services_thanhtien_mt'+i).val()));
            tongthuemt += parseFloat(unformat($('#services_vat_mt'+i).val()));
        }
        if(!isNaN(tongthanhtienmt)){
            $('#service_tongthanhtien_mientrung').val(tongthanhtienmt);
            fmCurrency($('#service_tongthanhtien_mientrung'),2);
        }
        if(!isNaN(tongthuemt)){
            $('#service_tongthue_mientrung').val(tongthuemt);
            fmCurrency($('#service_tongthue_mientrung'),2);
        }
    }
    // chi phi dich vu o mien nam
    count2 = $('#dichvu_miennam').find('tbody > tr').length;
    if(count2>0){
        for(i=1;i<=count2;i++){
            tongthanhtienmn += parseFloat(unformat($('#services_thanhtien_mn'+i).val()));
            tongthuemn += parseFloat(unformat($('#services_vat_mn'+i).val()));
        }
        if(!isNaN(tongthanhtienmn)){
            $('#service_tongthanhtien_miennam').val(tongthanhtienmn);
            fmCurrency($('#service_tongthanhtien_miennam'),2);
        }
        if(!isNaN(tongthuemn)){
            $('#service_tongthue_miennam').val(tongthuemn);
            fmCurrency($('#service_tongthue_miennam'),2);
        }
    }
    tongtien = tongthanhtienmb+tongthanhtienmt+tongthanhtienmn;
    tongthue = tongthuemb+tongthuemt+tongthuemn;
    if(!isNaN(tongtien)){
        $('#service_tongthanhtien').val(tongtien);
        fmCurrency($('#service_tongthanhtien'),2);
    }
    if(!isNaN(tongthue)){
        $('#service_tongthue').val(tongthue);
        fmCurrency($('#service_tongthue'),2);
    } 
}

// tinh toan chi phi tham quan
function tinhtoanchiphithamquan(){
    tongthanhtienmb =0; tongthuemb = 0;
    tongthanhtienmt = 0; tongthuemt = 0;
    tongthanhtienmn = 0; tongthuemn = 0;
    // chi phi tham quan o mien bac
    count = $('#thamquan_mienbac').find('tbody > tr').length;
    if(count>0){
        for(i=1;i<=count;i++){
            tongthanhtienmb += parseFloat(unformat($('#thamquan_thanhtien_mb'+i).val()));
            tongthuemb += parseFloat(unformat($('#thamquan_vat_mb'+i).val()));
        }
        if(!isNaN(tongthanhtienmb)){
            $('#thamquan_tongthanhtien_mienbac').val(tongthanhtienmb);
            fmCurrency($('#thamquan_tongthanhtien_mienbac'),2);
        }
        if(!isNaN(tongthuemb)){
            $('#thamquan_tongthue_mienbac').val(tongthuemb);
            fmCurrency($('#thamquan_tongthue_mienbac'),2);
        }
    }
    // chi phi tham quan o mien trung
    count1 = $('#thamquan_mientrung').find('tbody > tr').length;
    if(count1>0){
        for(i=1;i<=count1;i++){
            tongthanhtienmt += parseFloat(unformat($('#thamquan_thanhtien_mt'+i).val()));
            tongthuemt += parseFloat(unformat($('#thamquan_vat_mt'+i).val()));
        }
        if(!isNaN(tongthanhtienmt)){
            $('#thamquan_tongthanhtien_mientrung').val(tongthanhtienmt);
            fmCurrency($('#thamquan_tongthanhtien_mientrung'),2);
        }
        if(!isNaN(tongthuemt)){
            $('#thamquan_tongthue_mientrung').val(tongthuemt);
            fmCurrency($('#thamquan_tongthue_mientrung'),2);
        }
    }
    // chi phi tham quan o mien nam
    count2 = $('#thamquan_miennam').find('tbody > tr').length;
    if(count2>0){
        for(i=1;i<=count2;i++){
            tongthanhtienmn += parseFloat(unformat($('#thamquan_thanhtien_mn'+i).val()));
            tongthuemn += parseFloat(unformat($('#thamquan_vat_mn'+i).val()));
        }
        if(!isNaN(tongthanhtienmn)){
            $('#thamquan_tongthanhtien_miennam').val(tongthanhtienmn);
            fmCurrency($('#thamquan_tongthanhtien_miennam'),2);
        }
        if(!isNaN(tongthuemn)){
            $('#thamquan_tongthue_mienam').val(tongthuemn);
            fmCurrency($('#thamquan_tongthue_mienam'),2);
        }
    }
    tongtien = tongthanhtienmb+tongthanhtienmt+tongthanhtienmn;
    tongthue = tongthuemb+tongthuemt+tongthuemn;
    if(!isNaN(tongtien)){
        $('#thamquan_tongthanhtien').val(tongtien);
        fmCurrency($('#thamquan_tongthanhtien'),2);
    }
    if(!isNaN(tongthue)){
        $('#thamquan_tongthue').val(tongthue);
        fmCurrency($('#thamquan_tongthue'),2);
    }    
}

//  tinh toan chi phi huong dan vien + lai xe
function tinhtoanchohdvvalaixe(){
    tongthanhtienmb =0; tongthuemb = 0;
    tongthanhtienmt = 0; tongthuemt = 0;
    tongthanhtienmn = 0; tongthuemn = 0;
    var countmb =  $('#cphdv_mb').find('tbody > tr').length;
    var countmt =  $('#cphdv_mt').find('tbody > tr').length;
    var countmn =  $('#cphdv_mn').find('tbody > tr').length;
    for(i=1;i<=countmb;i++){
        tongthanhtienmb += parseFloat(unformat($('#thanhtien_cphdv_mb'+i).val()));
        tongthuemb += parseFloat(unformat($('#vat_cphdv_mb'+i).val()));
    }
    if(!isNaN(tongthanhtienmb)){
        $('#tongchi_hvd_mb').val(tongthanhtienmb);
        fmCurrency($('#tongchi_hvd_mb'),2);
    }
    if(!isNaN(tongthuemb)){
        $('#tongthue_hvd_mb').val(tongthuemb);
        fmCurrency($('#tongthue_hvd_mb'),2);
    }
    // miem trung
    for(i=1;i<=countmt;i++){
        tongthanhtienmt += parseFloat(unformat($('#thanhtien_cphdv_mt'+i).val()));
        tongthuemt += parseFloat(unformat($('#vat_cphdv_mt'+i).val()));
    }
    if(!isNaN(tongthanhtienmt)){
        $('#tongchi_hvd_mt').val(tongthanhtienmt) ;
        fmCurrency($('#tongchi_hvd_mt'),2);
    }
    if(!isNaN(tongthuemt)){
        $('#tongthue_hvd_mt').val(tongthuemt);
        fmCurrency($('#tongthue_hvd_mt'),2);
    }
    // mien nam
    for(i=1;i<=countmn;i++){
        tongthanhtienmn += parseFloat(unformat($('#thanhtien_cphdv_mn'+i).val()));
        tongthuemn += parseFloat(unformat($('#vat_cphdv_mn'+i).val()));
    }
    if(!isNaN(tongthanhtienmn)){
        $('#tongchi_hvd_mn').val(tongthanhtienmn);
        fmCurrency($('#tongchi_hvd_mn'),2);
    }
    if(!isNaN(tongthuemn)){
        $('#tongthue_hvd_mn').val(tongthuemn);
        fmCurrency($('#tongthue_hvd_mn'),2);
    }
    tongchiphi = tongthanhtienmb+tongthanhtienmt+tongthanhtienmn;
    if(!isNaN(tongchiphi)){
        $('#tongchi_hvd').val(tongchiphi);
        fmCurrency($('#tongchi_hvd'),2);
    } 
    tongthue = tongthuemn+tongthuemt+tongthuemb;
    if(!isNaN(tongthue)){
        $('#tongthue_hvd').val(tongthue);
        fmCurrency($('#tongthue_hvd'),2);
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
        fmCurrency($('#chiphikhac_tongcong'),2);
    }
    if(!isNaN(tongthuechiphikhac)){
        $('#chiphikhac_tongthue').val(tongthuechiphikhac);
        fmCurrency($('#chiphikhac_tongthue'),2);
    }
}

// tinh toan gia ban
function tinhtoangiaban(){
    tt_khach_nl_1 = parseFloat(unformat($('#tt_khach_nl_1').val()));
    tt_treem_1 = parseFloat(unformat($('#tt_treem_1').val()));
    tt_phuthuphongdon_1 = parseFloat(unformat($('#tt_phuthuphongdon_1').val()));
    tt_phuthukhac_1 = parseFloat(unformat($('#tt_phuthukhac_1').val()));
    tt_khach_nl_2 = parseFloat(unformat($('#tt_khach_nl_2').val()));
    tt_treem_2 = parseFloat(unformat($('#tt_treem_2').val()));
    tt_phuthuphongdon_2 = parseFloat(unformat($('#tt_phuthuphongdon_2').val()));
    tt_phuthukhac_2 = parseFloat(unformat($('#tt_phuthukhac_2').val()));
    // foc
    tt_foc_16 = parseFloat(unformat($('#tt_foc_16').val()));

    tonggiaban = tt_khach_nl_1+tt_treem_1+tt_phuthuphongdon_1+tt_phuthukhac_1+tt_khach_nl_2+tt_treem_2+tt_phuthuphongdon_2+tt_phuthukhac_2-tt_foc_16;
    if(!isNaN(tonggiaban)){
        $('#tongcong_giaban').val(tonggiaban);
        fmCurrency($('#tongcong_giaban'),2);
    }

    // thue cho gia ban
    thue_khach_nl_1 = parseFloat(unformat($('#thue_khach_nl_1').val()));
    thue_treem_1 = parseFloat(unformat($('#thue_treem_1').val()));
    thue_phuthuphongdon_1 = parseFloat(unformat($('#thue_phuthuphongdon_1').val()));
    thue_phuthukhac_1 = parseFloat(unformat($('#thue_phuthukhac_1').val()));
    thue_khach_nl_2 = parseFloat(unformat($('#thue_khach_nl_2').val()));
    thue_treem_2 = parseFloat(unformat($('#thue_treem_2').val()));
    thue_phuthuphongdon_2 = parseFloat(unformat($('#thue_phuthuphongdon_2').val()));
    thue_phuthukhac_2 = parseFloat(unformat($('#thue_phuthukhac_2').val()));

    // tong thue gia ban thue
    tongthuegiaban = thue_khach_nl_1+thue_treem_1+thue_phuthuphongdon_1+thue_phuthukhac_1+thue_khach_nl_2+thue_treem_2+thue_phuthuphongdon_2+thue_phuthukhac_2;
    if(!isNaN(tongthuegiaban)){
        $('#tongthue_giaban').val(tongthuegiaban);
        fmCurrency($('#tongthue_giaban'),2);
    }

}
// tinh toan tong chi phi
function tinhtoantongchiphi(){
    vemaybay = parseFloat(unformat($('#vemaybay_tongthanhtien').val()));
    nhahang = parseFloat(unformat($('#nhahang_tongthanhtien').val()));
    khachsan = parseFloat(unformat($('#khachsan_tongthanhtien').val()));
    dichvu = parseFloat(unformat($('#service_tongthanhtien').val()));
    vanchuyen = parseFloat(unformat($('#vanchuyen_tongthanhtien').val()));
    thamquan = parseFloat(unformat($('#thamquan_tongthanhtien').val()));
    huongdanvien= parseFloat(unformat($('#tongchi_hvd').val()));
    chiphikhac = parseFloat(unformat($('#chiphikhac_tongcong').val()));
    tongchi = vemaybay+nhahang+khachsan+dichvu+vanchuyen+thamquan+chiphikhac+huongdanvien;
    if(!isNaN(tongchi)){
        $('#tongchiphi').val(tongchi);
        fmCurrency($('#tongchiphi'),2);
    }
    // tong chi thue
    vemaybaythue = parseFloat(unformat($('#vemaybay_tongthue').val()));
    nhahangthue = parseFloat(unformat($('#nhahang_tongthue').val()));
    khachsanthue = parseFloat(unformat($('#khachsan_tongthue').val()));
    dichvuthue = parseFloat(unformat($('#service_tongthue').val()));
    vanchuyenthue = parseFloat(unformat($('#vanchuyen_tongthue').val()));
    thamquanthue = parseFloat(unformat($('#thamquan_tongthue').val()));
    chiphikhacthue = parseFloat(unformat($('#chiphikhac_tongthue').val()));
    huongdanvienthue = parseFloat(unformat($('#tongthue_hvd').val()));
    tongchithue = vemaybaythue+nhahangthue+khachsanthue+dichvuthue+vanchuyenthue+thamquanthue+chiphikhacthue+huongdanvienthue;
    if(!isNaN(tongchithue)){
        $('#tongthue').val(tongchithue);
        fmCurrency($('#tongthue'),2);
    }
}

// tinh toan chi tiet
function tinhtoanchitiet(){
    vatdauvao = parseFloat(unformat($('#tongthue').val()));
    vatdaura = parseFloat(unformat($('#tongthue_giaban').val()));
    tonggiaban = parseFloat(unformat($('#tongcong_giaban').val()));
    tongchi = parseFloat(unformat($('#tongchiphi').val()));
    sokhach = parseFloat(unformat($('#sokhach').val()));
    thuesuathoa = parseFloat(unformat($('#thuesuathoa').val()));
    tyle = parseFloat(unformat($('#tyle').val()));
    vatphaidong = vatdaura-vatdauvao;
    doanhthu = tonggiaban-vatdaura;
    tongchiphi = tongchi-vatdauvao;
    giavontrenkhach = Math.round(tongchiphi/sokhach).toFixed(2);
    giabantrenkhach = Math.round(doanhthu/sokhach).toFixed(2);
    laikhach =giabantrenkhach-giavontrenkhach;
    tonglai = laikhach*sokhach;
    tylesauthue = Math.round(tonglai/doanhthu*100).toFixed(2);
    thuethunhapdoanhnghiep = Math.round(tonglai*25/100).toFixed(2);
    lairong = tonglai-thuethunhapdoanhnghiep;
    tylesauthuethunhapdoanhnghiep = Math.round(lairong/doanhthu*100).toFixed(2);

    if(!isNaN(vatdaura)){
        $('#vatdaura').val(vatdaura);  
        fmCurrency($('#vatdaura'),2);
    }
    if(!isNaN(vatdauvao)){
        $('#vatdauvao').val(vatdauvao); 
        fmCurrency($('#vatdauvao'),2);
    }
    if(!isNaN(vatphaidong)){
        $('#vatphaidong').val(vatphaidong);  
        fmCurrency($('#vatphaidong'),2);
    }
    if(!isNaN(doanhthu)){
        $('#doanhthu').val(doanhthu); 
        fmCurrency($('#doanhthu'),2);
    }
    if(!isNaN(tongchiphi)){
        $('#tongchiphi1').val(tongchiphi);   
        fmCurrency($('#tongchiphi1'),2);
    }
    if(!isNaN(giavontrenkhach)){
        $('#giavontrenkhach').val(giavontrenkhach);
        fmCurrency($('#giavontrenkhach'),2);        
    }
    if(!isNaN(giabantrenkhach)){
        $('#giabantrenkhach').val(giabantrenkhach); 
        fmCurrency($('#giabantrenkhach'),2);
    }
    if(!isNaN(laikhach)){
        $('#laikhach').val(laikhach);   
        fmCurrency($('#laikhach'),2);
    }
    if(!isNaN(tonglai)){
        $('#tonglai').val(tonglai); 
        fmCurrency($('#tonglai'),2);
    }
    if(!isNaN(tylesauthue)){
        $('#tylesauthuevat').val(tylesauthue); 
        fmCurrency($('#tylesauthuevat'),2);
    }
    if(!isNaN(thuethunhapdoanhnghiep)){
        $('#thuethunhapdn').val(thuethunhapdoanhnghiep); 
        fmCurrency($('#thuethunhapdn'),2);
    }
    if(!isNaN(lairong)){
        $('#lairongnettprofit').val(lairong);  
        fmCurrency($('#lairongnettprofit'),2);
    }
    if(!isNaN(tylesauthuethunhapdoanhnghiep)){
        $('#tylesauthuetndn').val(tylesauthuethunhapdoanhnghiep);   
        fmCurrency($('#tylesauthuetndn'),2);
    }
}


// function add new row for hotel
function addNewRowKS(ks_name,ks_id,hangphong,id){
    var newRow = '';
    newRow += '<tr>';
    newRow += '<td><input type="text" class="tenkhachsan" name="tenkhachsan_'+id+'[]" id="tenkhachsan_'+id+'" size="35" value="'+ks_name+'" /><input type="hidden" name="ks_id_'+id+'[]" id="ks_id_'+id+'" value="'+ks_id+'" </td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="phongdon dongia center" name="SGL_'+id+'[]" id="SGL_'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="soluongphongdon center" name="SGL_SL_'+id+'[]" id="SGL_SL_'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="phongdoi dongia center" name="DBL_'+id+'[]" id="DBL_'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="soluongphongdoi center" name="DBL_SL_'+id+'[]" id="DBL_SL_'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="phongba dongia center" name="TPL_'+id+'[]" id="TPL_'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="soluongphongba center" name="TPL_SL_'+id+'[]" id="TPL_SL'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="foc center" name="foc'+id+'[]" id="foc'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="hangphong center" name="hangphong_'+id+'[]" id="hangphong_'+id+'" value="'+hangphong+'"  size="15" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="songaydem center" name="songaydem_'+id+'[]" id="songaydem_'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="thanhtien center" name="thanhtien_'+id+'[]" id="thanhtien_'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="thuesuat center" name="thuesuat_'+id+'[]" id="thuesuat_'+id+'" value="10" size="10" /></td>';
    newRow += '<td align="center"><input type="text" style="text-align: center;" class="vat center" name="vat_'+id+'[]" id="vat_'+id+'" value="0" size="10" /></td>';
    newRow += '<td align="center"><input type="button" class="btnDelRow" value="Delete Row" /></td>';
    newRow += '</tr>';
    $('#'+id).find('tbody').append(newRow); 

}

// funtion add new row for chi phi huong dan vien

function addNewRowHDV(value,label,tableID){
    var newRow  = '<tr>';
    newRow += '<td> <input type="text" name="loaichiphi_'+tableID+'[]" id="loaichiphi_'+tableID+'" value="'+label+'"/> </td>';
    newRow += '<td> <input type="text" class="center soluong" name="soluong_'+tableID+'[]" id="soluong_'+tableID+'" value="0"/> </td>';
    newRow += '<td> <input type="text" class="center dongia" name="dongia_'+tableID+'[]" id="dongia_'+tableID+'" value="'+value+'"/> </td>';
    newRow += '<td> <input type="text" class="center songay" name="solan'+tableID+'[]" id="solan_'+tableID+'" value="0"/> </td>';
    newRow += '<td> <input type="text" class="center thanhtien" name="thanhtien_'+tableID+'[]" id="thanhtien_'+tableID+'" value="0"/> </td>';
    newRow += '<td> <input type="text" class="center thuesuat" name="thuesuat_'+tableID+'[]" id="thuesuat_'+tableID+'" value="10"/> </td>';
    newRow += '<td> <input type="text" class="center vat"  name="vat_'+tableID+'[]" id="vat_'+tableID+'" value="0"/> </td>';
    newRow += '<td align="center"><input type="button" class="btnDelRow" value="Delete Row" /></td>';  
    newRow += '</tr>';
     $('#'+tableID).find('tbody').append(newRow); 
}

function CheckTableClone()
{    
    $(".table_clone").each(function()
    {    
        // set Atribute for table

        //maxcount default 5
        if($(this).attr("maxcount")==null)
            {
            $(this).attr("maxcount",50);
        }
        // get Table ID
        var tableID=$(this).attr("id");
        // lam sao de cap nhat cac TR la con truc tiep cua Table do thoi
        // cap nhat id cho cac TR
        var count=0;
        var tongdong = 0;
        $(this).find(" tbody tr").each(function(i)
        {
            if($(this).closest("table").attr("class")=="table_clone")
                {
                tongdong++;
            }
        });
        $(this).find(" tbody tr").each(function(i)
        {
            i++;
            var trID="TR_"+tableID;

            if($(this).closest("table").attr("class")=="table_clone")
                {
                // so luong tr cua table can clone
                count++;
                trID="TR_"+tableID+count;      

                $(this).attr("id",trID);

                var chiso=count;

                $(this).find("select,input,span,textarea").each(function()
                {
                    var eID=$(this).attr("id");
                    var d;
                    if(count==tongdong){d = count-1;}else{d=count;}
                    var sl = soluongchuso(d);
                    var endChar=eID.substr(eID.length-sl,sl);
                    // neu ky tu cuoi cung la con so
                    if(!isNaN(endChar) && (endChar!=chiso))
                        {
                        //id da loai bo ky tu cuoi
                        eID_After=eID.substr(0,eID.length-sl)+chiso;
                        $(this).attr('id',eID_After);
                    }

                    else if(isNaN(endChar))
                        {

                        eID_After=eID+chiso;
                        $(this).attr('id',eID_After);
                    }
                });
            }
        });
    });

}
function soluongchuso(chuso){
    if(chuso<1){return 1;}
    var sobandau = chuso;
    var dem = 0;
    while(parseInt(sobandau) != 0){
        sobandau /= 10;
        dem ++;  
    }
    return dem; 
} 

function getSokhach(){
    slNguoilon =  parseFloat(unformat($('.soluongnguoilon').val()));
    slTreem = parseFloat(unformat($('.soluongtreem').val())) ; 
    if((slNguoilon != '' && slTreem != '')&& (!isNaN(slNguoilon) && !isNaN(slTreem))){
        soluongvmb = parseFloat(unformat($('.soluongnguoilon').val()))+parseFloat(unformat($('.soluongtreem').val())) ;
        $('.vemaybay_soluong').each(function(){
            if($(this).val()==0 || $(this).val() ==''){
                $(this).val(soluongvmb);  
            }
        });
        $('.thamquan_soluongte').each(function(){
            if($(this).val() == 0 || $(this).val() == ''){
                $(this).val(slTreem);
            }
        });

        $('.thamquan_soluongnl').each(function(){
            if($(this).val() ==0 || $(this).val()==''){
                $(this).val(slNguoilon);
            }
        });

        $('.cpk_soluong').each(function(){
            if($(this).val() ==0 || $(this).val() == ''){
                $(this).val(slNguoilon+slTreem); 
            }
        });

        $('.giaban_sl_nl').each(function(){
            if($(this).val() ==0 || $(this).val() == ''){
                $(this).val(slNguoilon);
            }
        });
        $('.giaban_sl_te').each(function(){
            if($(this).val() == 0 || $(this).val() == ''){
                $(this).val(slTreem);
            }
        }); 
    }


}