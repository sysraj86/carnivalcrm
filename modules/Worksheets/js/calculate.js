$(function(){
     if($(".giaban,.phuthukhac, .treem, .calculate, .disable").val()==''){
         $(".giaban,.phuthukhac, .treem, .calculate, .disable").val('0');
     }
   $(".giaban,.phuthukhac, .treem, .calculate").numeric();
    
    $(".giaban,.phuthukhac, .treem, .calculate, .disable").focus(function(){
       if($('#'+this.id).val()== 0){
        $('#'+this.id).val('');   
       }
     
    });
     $(".giaban,.phuthukhac, .treem, .calculate").blur(function(){
         if($('#'+this.id).val()==''){
            $('#'+this.id).val('0');
        }
        giaban();
        phuthu();
        tongthunguoilon(); 
        tongthutreem();
        getvaluevanchuyen();
        calculator();
        tongchivanchuyen();
        tinhtongchiphi();
        chiphidichvukhac();
        tinhtongchilandfee();
        tinhtoanvisa();
        tinhchiphihuongdanvien();
        reportsummary();
     });
    /*(function(){
        if ( event.keyCode == 46 || event.keyCode == 8 ) {
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        } */
    //});

});
function giaban(){
    // phan tre em
        $('#treem2tuoi1').val($('#TreEm2Tuoi1').val());
        $('#treem2tuoi2').val(($('#ks3saonguoilon2').val()* 0.3).toString());
        if(!isNaN($('#treem2tuoi1').val())*($('#treem2tuoi2').val())){
            $('#treem2tuoi3').val(($('#treem2tuoi1').val())*($('#treem2tuoi2').val()));
        }

        $('#treem2tuoi4').val(($('#ks4saonguoilon1').val()*0.3).toString());
        if(!isNaN((parseFloat($('#treem2tuoi4').val()))*(parseFloat($('#treem2tuoi1').val())))){
            $('#treem2tuoi5').val((parseFloat($('#treem2tuoi4').val()))*(parseFloat($('#treem2tuoi1').val())));
        }

        $('#treem12tuoi1').val($('#TreEm12Tuoi1').val());
        $('#treem12tuoi2').val(($('#ks3saonguoilon2').val()* 0.75).toString());
        $('#treem12tuoi3').val(($('#treem12tuoi1').val())*($('#treem12tuoi2').val()));

        $('#treem2tuoi7').val($('#TreEm2Tuoi2').val());
        $('#treem2tuoi8').val(($('#ks3saonguoilon5').val()* 0.3).toString());
        if(!isNaN($('#treem2tuoi7').val()*($('#treem2tuoi8').val()))){
            $('#treem2tuoi9').val(($('#treem2tuoi7').val())*($('#treem2tuoi8').val())); 
        }
        $('#treem12tuoi7').val($('#TreEm12Tuoi2').val());
        $('#treem12tuoi8').val(($('#ks3saonguoilon5').val()* 0.75).toString());
        if(!isNaN($('#treem2tuoi8').val()* $('#treem12tuoi7').val())){
            $('#treem12tuoi9').val(($('#treem12tuoi8').val())*( $('#treem12tuoi7').val()));  
        }

        $('#treem12tuoi4').val(($('#ks4saonguoilon1').val()*0.75).toString());
        if(!isNaN(($('#treem12tuoi4').val())*($('#treem12tuoi1').val()))){
            $('#treem12tuoi5').val(($('#treem12tuoi4').val())*($('#treem12tuoi1').val())); 
        }

        $('#treem2tuoi10').val(($('#ks4saonguoilon3').val()*0.3).toString());
        if(!isNaN(($('#treem2tuoi7').val())*($('#treem2tuoi10').val()))){
            $('#treem2tuoi11').val(($('#treem2tuoi7').val())*($('#treem2tuoi10').val()));
        }

        $('#treem12tuoi10').val(($('#ks4saonguoilon3').val()*0.75).toString());
        if(!isNaN($('#treem12tuoi10').val()*$('#treem12tuoi7').val())){
            $('#treem12tuoi11').val($('#treem12tuoi10').val()*$('#treem12tuoi7').val());
        }
        // phan ben trai
        $('#ks3saonguoilon2').val($('#giaban5').val());
        $('#ks3saonguoilon1').val(parseInt($('#NguoiLon1').val())-parseInt($('#foc_number').val()));
        var soluong = parseFloat($('#ks3saonguoilon1').val());
        var ks3sao1 = parseFloat($('#ks3saonguoilon2').val());
        var ttks3sao1 = soluong * ks3sao1;
        if(!isNaN(ttks3sao1)){
            $('#ks3saonguoilon3').val(ttks3sao1.toString());
        }
        $('#ks4saonguoilon1').val($('#giaban6').val());
        var ks4sao1 = parseFloat($('#ks4saonguoilon1').val());
        var ttks4sao1 = soluong*ks4sao1;
        if(!isNaN(ttks4sao1)){
            $('#ks4saonguoilon2').val(ttks4sao1.toString());
        }

        // phan ben phai
        $('#ks3saonguoilon4').val(parseFloat($('#NguoiLon2').val())-parseFloat($('#foc_number').val()));
        $('#ks3saonguoilon5').val($('#giaban11').val());
        var soluong1 = parseFloat($('#ks3saonguoilon4').val());
        var ks3sao2 = parseFloat( $('#ks3saonguoilon5').val());
        var ttks3sao2 = soluong1*ks3sao2;
        if(!isNaN(ttks3sao2)){
            $('#ks3saonguoilon6').val(ttks3sao2.toString());
        }

        $('#ks4saonguoilon3').val($('#giaban12').val());
        var ks4sao2 = parseFloat($('#ks4saonguoilon3').val());
        var ttks4sao2 = soluong1*ks4sao2; 
        if(!isNaN(ttks4sao2)){
            $('#ks4saonguoilon4').val(ttks4sao2.toString()) ;
        }
}
function phuthu(){
   var sl1 = parseFloat($('#ks3saophuthukhac1').val());
        var dg1 = parseFloat($('#ks3saophuthukhac2').val());
        var tt1 = sl1*dg1;
        if(!isNaN(tt1)){
            $('#ks3saophuthukhac3').val(tt1.toString());
        }

        var dg2 = parseFloat($('#ks4saophuthukhac1').val());
        var tt2 = sl1*dg2;
        if(!isNaN(tt2)){
            $('#ks4saophuthukhac2').val(tt2.toString()); 
        }

        var sl2 = parseFloat($('#ks3saophuthukhac4').val());
        var dg3 = parseFloat($('#ks3saophuthukhac5').val());
        var tt3 = sl2*dg3;
        if(!isNaN(tt3)){
            $('#ks3saophuthukhac6').val(tt3.toString());
        }

        var dg4 = parseFloat($('#ks4saophuthukhac3').val());
        var tt4 = sl2*dg4;
        if(!isNaN(tt4)){
            $('#ks4saophuthukhac4').val(tt4.toString());
        }

        var sl3 = parseFloat($('#ks3saophuthukhac_1').val());
        var dg5 = parseFloat($('#ks3saophuthukhac_2').val());
        var tt5 = sl3*dg5;
        if(!isNaN(tt5)){
            $('#ks3saophuthukhac_3').val(tt5.toString());
        }
        var dg6 = parseFloat($('#ks4saophuthukhac_1').val());
        var tt6 = sl3*dg6;
        if(!isNaN(tt6)){
            $('#ks4saophuthukhac_2').val(tt6.toString());
        }
        var sl4 = parseFloat($('#ks3saophuthukhac_4').val());
        var dg7 = parseFloat($('#ks3saophuthukhac_5').val());
        var tt7 = sl4*dg7;
        if(!isNaN(tt7)){
            $('#ks3saophuthukhac_6').val(tt7.toString());
        }
        var dg8 = parseFloat($('#ks4saophuthukhac_3').val());
        var tt8 = sl4*dg8;
        if(!isNaN(tt8)){
            $('#ks4saophuthukhac_4').val(tt8.toString());
        }
        var sl5 = parseFloat($('#ks3saosinglesupp1').val());
        var dg9 = parseFloat($('#ks3saosinglesupp2').val());
        var tt9 = sl5*dg9;
        if(!isNaN(tt9)){
            $('#ks3saosinglesupp3').val(tt9.toString());
        }
        var dg10 =parseFloat($('#ks4saosinglesupp1').val());
        var tt10 = sl5*dg10;
        if(!isNaN(tt10)){
            $('#ks4saosinglesupp2').val(tt10.toString());
        }

        var sl6 = parseFloat($('#ks3saosinglesupp4').val());
        var dg11 = parseFloat($('#ks3saosinglesupp5').val());
        var tt11 = sl6*dg11;
        if(!isNaN(tt11)){
            $('#ks3saosinglesupp6').val(tt11.toString());
        }
        var dg12 =parseFloat($('#ks4saosinglesupp3').val());
        var tt12 = sl6*dg12;
        if(!isNaN(tt12)){
            $('#ks4saosinglesupp4').val(tt12.toString());
        }  
}
function tongthunguoilon(){
    // tong thu khách sạn 3 sao một
    var a = parseFloat($('#ks3saonguoilon3').val());
    var b = parseFloat($('#ks3saophuthukhac3').val());
    var c = parseFloat($('#ks3saophuthukhac_3').val());
    var d = parseFloat($('#ks3saosinglesupp3').val());
    $('#tongthunguoilon1').val(((a+b+c+d)*1).toString());

    // tong thu khach san 3 sao hai
    var e = parseFloat($('#ks3saonguoilon6').val());
    var f = parseFloat($('#ks3saophuthukhac6').val());
    var g = parseFloat($('#ks3saophuthukhac_6').val());
    var h = parseFloat($('#ks3saosinglesupp6').val());
    $('#tongthunguoilon3').val((e+f+g+h).toString());

    // tong thu khach san 4 sao mot
    var i = parseFloat($('#ks4saonguoilon2').val());
    var k = parseFloat($('#ks4saophuthukhac2').val());
    var l = parseFloat($('#ks4saophuthukhac_2').val());
    var m = parseFloat($('#ks4saosinglesupp2').val());
    $('#tongthunguoilon2').val((i+k+l+m).toString());

    // tong thu khach san 4 sao hai 
    var n = parseFloat($('#ks4saonguoilon4').val());
    var p = parseFloat($('#ks4saophuthukhac4').val());
    var q = parseFloat($('#ks4saophuthukhac_4').val());
    var t = parseFloat($('#ks4saosinglesupp4').val());
    $('#tongthunguoilon4').val((n+p+q+t).toString());
}

function tongthutreem(){
    // tong thu tre em mot
    var a = parseFloat($('#treem2tuoi3').val());
    var b = parseFloat($('#treem12tuoi3').val());
    $('#tongthute1').val((a+b).toString());

    var c = parseFloat($('#treem2tuoi5').val());
    var d = parseFloat($('#treem12tuoi5').val());
    $('#tongthute2').val((c+d).toString());

    var e = parseFloat($('#treem2tuoi9').val());
    var f = parseFloat($('#treem12tuoi9').val());
    $('#tongthute3').val((e+f).toString());

    var g = parseFloat($('#treem2tuoi11').val());
    var h = parseFloat($('#treem12tuoi11').val());
    $('#tongthute4').val((g+h).toString());

}


function getvaluevanchuyen(){
    // phan ben trai
    $('#vmbnguoilon1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCVMB1').val()));
    $('#taxtamtinh1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val()));
    $('#vmbnguoilonnd1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCVMBNoiDia1').val
    ()));
    /*$('#vmbtreem2tuoi1').val(parseInt($('#TreEm2Tuoi1').val()));
    $('#vmbtreem2tuoind1').val(parseInt($('#TreEm2Tuoi1').val()));
    $('#vmbtreem12tuoi1').val(parseInt($('#TreEm12Tuoi1').val()));
    $('#vmbtreem12tuoind1').val(parseFloat($('#TreEm12Tuoi1').val()));*/
    $('#taxtreem1').val(parseFloat($('TreEm2Tuoi1').val())+parseFloat($('#TreEm12Tuoi1')));
    $('#landfee1_3_1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val()));
    $('#landfee_2_3_1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val()));
    $('#landfee_1_4_1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val()));
    $('#landfee_2_4_1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val()));
    $('#upgrade_meal1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val()));
    $('#optional_tour1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val()));
    $('#single_supp_1').val(parseFloat($('#single1').val()));
    
    $('.visa_value').val(parseInt($('#txtTourLeader1').val())+parseInt($('#NguoiLon1').val()));
    $('#visatreem2tuoi1').val(parseInt($('#TreEm2Tuoi1').val()));
    $('#visatreem12tuoi1').val(parseInt($('#TreEm12Tuoi1').val()));
    $('#tour_leader1').val(parseInt($('#txtTourLeader1').val()));
    $('#chiphikhac1').val(parseInt($('#txtTourLeader1').val()));
    $('.treem2').val(parseInt($('#TreEm2Tuoi1').val()));
    $('.treem12').val(parseInt($('#TreEm12Tuoi1').val()));
    $('.quatang').val($('#NguoiLon1').val());
    $('#taxtreem1').val(parseInt($('#TreEm2Tuoi1').val())+parseFloat($('#TreEm12Tuoi1').val()));
  
    $('#visatip1, #cpk1, #chenhlechtygia1, #quatang1').val($('#NguoiLon1').val());
    if($('#land_treem').val()!= ''){
        $('#land2_1').val(parseFloat($('#NguoiLon1').val())+ parseFloat($('#land_treem').val()));   
    }
    else {$('#land2_1').val($('#NguoiLon1').val());}
    
    $('#landfeetreem_2_3sao1').val(parseFloat($('#TreEm2Tuoi1').val()));
    
    $('#landfee4sao_treem2tuoi1').val(parseFloat($('#TreEm2Tuoi1').val()));
    
    $('#landfeetreem12_3sao1').val(parseFloat($('#TreEm12Tuoi1').val()));
    
    $('#landfee4sao_treem12tuoi1').val(parseFloat($('#TreEm12Tuoi1').val()));
    // get value bên phái
    // phan van chuyen
    $('#vmbnguoilon5').val($('#NguoiLon2').val());
    $('#taxtamtinh5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val()));
    $('#vmbnguoilonnd5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCVMBNoiDia1').val()));
    $('#vmbtreem2tuoi5').val($('#TreEm2Tuoi2').val());
    $('#vmbtreem2tuoind5').val($('#TreEm2Tuoi2').val());
    $('#vmbtreem12tuoi5').val($('#TreEm12Tuoi2').val());
    $('#vmbtreem12tuoind5').val($('#TreEm12Tuoi2').val());
    $('#taxtreem5').val(parseFloat($('#TreEm2Tuoi2').val())+parseFloat($('#TreEm12Tuoi2').val()));
    
    // phan landfee
    $('#landfee1_3_5').val(parseFloat($('#NguoiLon2').val()) + parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val()));
    
    $('#landfee_2_3_5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val()));
    
    $('#landfee_1_4_5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val()));
    
    $('#landfee_2_4_5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val()));
    
    $('#upgrade_meal5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val()));
    
    $('#optional_tour5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val()));
    
    $('#single_supp_5').val(parseFloat($('#single2').val()));
    
    $('#landfeetreem_2_3sao5').val(parseFloat($('#TreEm2Tuoi2').val()));
    
    $('#landfee4sao_treem2tuoi5').val(parseFloat($('#TreEm2Tuoi2').val()));
    
    $('#landfeetreem12_3sao5').val(parseFloat($('#TreEm12Tuoi2').val()));
    
    $('#landfee4sao_treem12tuoi5').val(parseFloat($('#TreEm12Tuoi2').val()));
    
    $('.visa_value1').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val()));
    
    $('#visatreem2tuoi5').val($('#TreEm2Tuoi2').val());
    
    $('#visatreem12tuoi5').val($('#TreEm12Tuoi2').val());
    
    $('#baohiemtreem2tuoi5').val($('#TreEm2Tuoi2').val());
    
    $('#baohiemtreem12tuoi5').val($('#TreEm12Tuoi2').val());
    
    $('#visatip5, #quatang5, #cpk5, #chenhlechtygia5').val($('#NguoiLon2').val());
    
    if($('#land_treem').val()!= ''){
        $('#land2_5').val(parseFloat($('#NguoiLon2').val())+ parseFloat($('#land_treem').val()));   
    }
    else {$('#land2_5').val($('#NguoiLon2').val());}
    $('#tour_leader5').val($('#txtTourLeader2').val());
    
    
    // tính số ngày của thực hiện tour
    var start = $('#ngaykhoihanh').val();
    var end = $('#ngayketthuc').val();
    startarr = start.split('/');
    endarr = end.split('/');
    var start_date = new Date(startarr[2],startarr[1]-1,startarr[0]);
    var end_date = new Date(endarr[2],endarr[1]-1,endarr[0]);
    var no_date = end_date - start_date;
    no_date = no_date/1000/60/60/24;
    $('#tour_leader2').val(no_date+1);
    $('#tour_leader6').val(no_date+1);
    $('#visatip2').val(no_date+1);
    $('#visatip6').val(no_date+1);
    
    
    // lay chi phi cua tre em trong van chuyen
    // bên trái
    $('#vmbtreem2tuoi3').val($('#vmbnguoilon3').val()*0.1);
    $('#vmbtreem12tuoi3').val($('#vmbnguoilon3').val()*0.75);
    $('#taxtreem3').val($('#taxtamtinh3').val());
    $('#vmbtreem12tuoind3').val($('#vmbnguoilonnd3').val());
    $('#vmbtreem2tuoind3').val(parseFloat($('#vmbnguoilonnd3').val()*0/100));
    
    // bên phải
    $('#vmbtreem2tuoi7').val($('#vmbnguoilon7').val()*0.1);
    $('#vmbtreem12tuoi7').val($('#vmbnguoilon7').val()*0.75);
    $('#taxtreem7').val($('#taxtamtinh7').val());
    $('#vmbtreem12tuoind7').val($('#vmbnguoilonnd7').val());
    $('#vmbtreem2tuoind7').val(parseFloat($('#vmbnguoilonnd7').val()*0/100));
    
    //lấy chi phí của trẻ em phần landfee 
    // bên trái
    $('#landfeetreem_2_3sao3').val(Math.round(parseFloat($('#landfee1_3_3').val()*0.7)).toFixed(2));
    $('#landfeetreem12_3sao3').val(Math.round(parseFloat($('#landfee_2_3_3').val()*0.7)).toFixed(2));
    $('#landfee4sao_treem2tuoi3').val(Math.round(parseFloat($('#landfee_1_4_3').val())*0.7).toFixed(2));
    $('#landfee4sao_treem12tuoi3').val(Math.round(parseFloat($('#landfee_2_4_3').val())*0.7).toFixed(2));
    
    // bên phải
     $('#landfeetreem_2_3sao7').val(Math.round(parseFloat($('#landfee1_3_7').val()*0.7)).toFixed(2));
    $('#landfeetreem12_3sao7').val(Math.round(parseFloat($('#landfee_2_3_7').val()*0.7)).toFixed(2));
    $('#landfee4sao_treem2tuoi7').val(Math.round(parseFloat($('#landfee_1_4_7').val()*0.7)).toFixed(2));
    $('#landfee4sao_treem12tuoi7').val(Math.round(parseFloat($('#landfee_2_4_7').val()*0.7)).toFixed(2));
    
    // lấy số bữa ăn
    $('#upgrade_meal2').val($('#txtSoBuaAn1').val());
    $('#upgrade_meal6').val($('#txtSoBuaAn2').val());
}
// tinh toan phan chi
function calculator(){
    // tinh toan chi phi van chuyen
    // chi ve may bay nguoi lon
    if(!isNaN(parseFloat($('#vmbnguoilon1').val())*parseFloat($('#vmbnguoilon3').val()))){
        $('#vmbnguoilon4').val(parseFloat($('#vmbnguoilon1').val())*parseFloat($('#vmbnguoilon3').val()));
    }
    if(!isNaN(parseFloat($('#vmbnguoilon5').val())*parseFloat($('#vmbnguoilon7').val()))){
        $('#vmbnguoilon8').val(parseFloat($('#vmbnguoilon5').val())*parseFloat($('#vmbnguoilon7').val()));
    }
    // chi tax tam tinh
    if(!isNaN(parseFloat($('#taxtamtinh1').val())*parseFloat($('#taxtamtinh3').val()))){
        $('#taxtamtinh4').val(parseFloat($('#taxtamtinh3').val())*parseFloat($('#taxtamtinh1').val()));
    }
    if(!isNaN(parseFloat($('#taxtamtinh5').val())*parseFloat($('#taxtamtinh7').val()))){
        $('#taxtamtinh8').val(parseFloat($('#taxtamtinh5').val())*parseFloat($('#taxtamtinh7').val()));
    }
    // chi ve may bay nguoi lon noi dia
    if(!isNaN(parseFloat($('#vmbnguoilonnd1').val())*parseFloat($('#vmbnguoilonnd3').val()))){
        $('#vmbnguoilonnd4').val(parseFloat($('#vmbnguoilonnd1').val())*parseFloat($('#vmbnguoilonnd3').val()));
    }
    if(!isNaN(parseFloat($('#vmbnguoilonnd5').val())*parseFloat($('#vmbnguoilonnd7').val()))){
        $('#vmbnguoilonnd8').val(parseFloat($('#vmbnguoilonnd5').val())*parseFloat($('#vmbnguoilonnd7').val()));
    } 
    // chi xe don tien tai san bay
    if(!isNaN(parseFloat($('#xedontien1').val())*parseFloat($('#xedontien3').val()))){
        $('#xedontien4').val(parseFloat($('#xedontien1').val())*parseFloat($('#xedontien3').val()));
    }
    if(!isNaN(parseFloat($('#xedontien5').val())*parseFloat($('#xedontien7').val()))){
        $('#xedontien8').val(parseFloat($('#xedontien5').val())*parseFloat($('#xedontien7').val()));
    }

    // chi vé máy bay trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat($('#vmbtreem2tuoi1').val())*parseFloat($('#vmbtreem2tuoi3').val()))){
        $('#vmbtreem2tuoi4').val(parseFloat($('#vmbtreem2tuoi1').val())*parseFloat($('#vmbtreem2tuoi3').val()));
    }
    if(!isNaN(parseFloat($('#vmbtreem2tuoi5').val())*parseFloat($('#vmbtreem2tuoi7').val()))){
        $('#vmbtreem2tuoi8').val(parseFloat($('#vmbtreem2tuoi5').val())*parseFloat($('#vmbtreem2tuoi7').val()));
    }
    // chi vé máy bay trẻ em dưới 2 tuổi nội địa
    if(!isNaN(parseFloat($('#vmbtreem2tuoind1').val())*parseFloat($('#vmbtreem2tuoind3').val()))){
        $('#vmbtreem2tuoind4').val(parseFloat($('#vmbtreem2tuoind1').val())*parseFloat($('#vmbtreem2tuoind3').val()));
    }
    if(!isNaN(parseFloat($('#vmbtreem2tuoind5').val())*parseFloat($('#vmbtreem2tuoind7').val()))){
        $('#vmbtreem2tuoind8').val(parseFloat($('#vmbtreem2tuoind5').val())*parseFloat($('#vmbtreem2tuoind7').val()));
    }

    // vé máy bay trẻ em từ 2 - 12 tuổi
    if(!isNaN(parseFloat($('#vmbtreem12tuoi1').val())*parseFloat($('#vmbtreem12tuoi3').val()))){
        $('#vmbtreem12tuoi4').val(parseFloat($('#vmbtreem12tuoi1').val())*parseFloat($('#vmbtreem12tuoi3').val()));
    }
    if(!isNaN(parseFloat($('#vmbtreem12tuoi5').val())*parseFloat($('#vmbtreem12tuoi7').val()))){
        $('#vmbtreem12tuoi8').val(parseFloat($('#vmbtreem12tuoi5').val())*parseFloat($('#vmbtreem12tuoi7').val()));
    }
    // chi vé máy bay trẻ em từ 1- 12 tuổi nội địa
    if(!isNaN(parseFloat($('#vmbtreem12tuoind1').val())*parseFloat($('#vmbtreem12tuoind3').val()))){
        $('#vmbtreem12tuoind4').val(parseFloat($('#vmbtreem12tuoind1').val())*parseFloat($('#vmbtreem12tuoind3').val()));
    }

    if(!isNaN(parseFloat($('#vmbtreem12tuoind5').val())*parseFloat($('#vmbtreem12tuoind7').val()))){
        $('#vmbtreem12tuoind8').val(parseFloat($('#vmbtreem12tuoind5').val())*parseFloat($('#vmbtreem12tuoind7').val()));
    }

    // tax chi
    if(!isNaN(parseFloat($('#taxtreem1').val())*parseFloat($('#taxtreem3').val()))){
        $('#taxtreem4').val(parseFloat($('#taxtreem1').val())*parseFloat($('#taxtreem3').val()));
    }
    if(!isNaN(parseFloat($('#taxtreem5').val())*parseFloat($('#taxtreem7').val()))){
        $('#taxtreem8').val(parseFloat($('#taxtreem5').val())*parseFloat($('#taxtreem7').val()));
    }

    // phần landfee
    // landfee 1:3 sao 
    if(!isNaN(parseFloat($('#landfee1_3_1').val())*parseFloat($('#landfee1_3_3').val()))){
        $('#landfee1_3_4').val(parseFloat($('#landfee1_3_1').val())*parseFloat($('#landfee1_3_3').val()));
    }

    if(!isNaN(parseFloat($('#landfee1_3_5').val())*parseFloat($('#landfee1_3_7').val()))){
        $('#landfee1_3_8').val(parseFloat($('#landfee1_3_5').val())*parseFloat($('#landfee1_3_7').val()));
    }

    // landfee 2:3 sao 
    if(!isNaN(parseFloat($('#landfee_2_3_1').val())*parseFloat($('#landfee_2_3_3').val()))){
        $('#landfee_2_3_4').val(parseFloat($('#landfee_2_3_1').val())*parseFloat($('#landfee_2_3_3').val()));
    }

    if(!isNaN(parseFloat($('#landfee_2_3_5').val())*parseFloat($('#landfee_2_3_7').val()))){
        $('#landfee_2_3_8').val(parseFloat($('#landfee_2_3_5').val())*parseFloat($('#landfee_2_3_7').val()));
    }
    // landfee 1:4 sao
    if(!isNaN(parseFloat($('#landfee_1_4_1').val())*parseFloat($('#landfee_1_4_3').val()))){
        $('#landfee_1_4_4').val(parseFloat($('#landfee_1_4_1').val())*parseFloat($('#landfee_1_4_3').val()));
    }
    if(!isNaN(parseFloat($('#landfee_1_4_5').val())*parseFloat($('#landfee_1_4_7').val()))){
        $('#landfee_1_4_8').val(parseFloat($('#landfee_1_4_5').val())*parseFloat($('#landfee_1_4_7').val()));
    }

    // landfee 2:4 sao 
    if(!isNaN(parseFloat($('#landfee_2_4_1').val())*parseFloat($('#landfee_2_4_3').val()))){
        $('#landfee_2_4_4').val(parseFloat($('#landfee_2_4_1').val())*parseFloat($('#landfee_2_4_3').val()));
    }
    if(!isNaN(parseFloat($('#landfee_2_4_5').val())*parseFloat($('#landfee_2_4_7').val()))){
        $('#landfee_2_4_8').val(parseFloat($('#landfee_2_4_5').val())*parseFloat($('#landfee_2_4_7').val()));
    }

    // upgrade meal 
    if(!isNaN(parseFloat($('#upgrade_meal1').val())*parseFloat($('#upgrade_meal3').val())*parseFloat($('#upgrade_meal2').val()))){
        $('#upgrade_meal4').val(parseFloat($('#upgrade_meal1').val())*parseFloat($('#upgrade_meal3').val())*parseFloat($('#upgrade_meal2').val()));
    }
    if(!isNaN(parseFloat($('#upgrade_meal5').val())*parseFloat($('#upgrade_meal7').val())* parseFloat($('#upgrade_meal6').val()))){
        $('#upgrade_meal8').val(parseFloat($('#upgrade_meal5').val())*parseFloat($('#upgrade_meal6').val())*parseFloat($('#upgrade_meal7').val()));
    }
    // option tour
    if(!isNaN(parseFloat($('#optional_tour1').val())*parseFloat($('#optional_tour3').val()))){
        $('#optional_tour4').val(parseFloat($('#optional_tour1').val())*parseFloat($('#optional_tour3').val()));
    }
    if(!isNaN(parseFloat($('#optional_tour5').val())*parseFloat($('#optional_tour7').val()))){
        $('#optional_tour8').val(parseFloat($('#optional_tour5').val())*parseFloat($('#optional_tour7').val()));
    }

    // single supp
    if(!isNaN(parseFloat($('#single_supp_1').val())*parseFloat($('#single_supp_3').val()))){
        $('#single_supp_4').val(parseFloat($('#single_supp_1').val())*parseFloat($('#single_supp_3').val()));
    }

    if(!isNaN(parseFloat($('#single_supp_5').val())*parseFloat($('#single_supp_7').val()))){
        $('#single_supp_8').val(parseFloat($('#single_supp_5').val())*parseFloat($('#single_supp_7').val()));
    }

    // Landfee tre em (3 sao) - trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat($('#landfeetreem_2_3sao1').val())*parseFloat($('#landfeetreem_2_3sao3').val()))){
        $('#landfeetreem_2_3sao4').val(parseFloat($('#landfeetreem_2_3sao1').val())*parseFloat($('#landfeetreem_2_3sao3').val()));
    }
    if(!isNaN(parseFloat($('#landfeetreem_2_3sao5').val())*parseFloat($('#landfeetreem_2_3sao7').val()))){
        $('#landfeetreem_2_3sao8').val(parseFloat($('#landfeetreem_2_3sao5').val())*parseFloat($('#landfeetreem_2_3sao7').val()));
    }

    // Landfee trẻ em (3 sao) - trẻ em từ 2-12 tuổi    
    if(!isNaN(parseFloat($('#landfeetreem12_3sao1').val())*parseFloat($('#landfeetreem12_3sao3').val()))){
        $('#landfeetreem12_3sao4').val(parseFloat($('#landfeetreem12_3sao1').val())*parseFloat($('#landfeetreem12_3sao3').val()));
    }
    if(!isNaN(parseFloat($('#landfeetreem12_3sao5').val())*parseFloat($('#landfeetreem12_3sao7').val()))){
        $('#landfeetreem12_3sao8').val(parseFloat($('#landfeetreem12_3sao5').val())*parseFloat($('#landfeetreem12_3sao7').val()));
    }

    // Landfee trẻ em (4 sao) - trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat($('#landfee4sao_treem2tuoi1').val())*parseFloat($('#landfee4sao_treem2tuoi3').val()))){
        $('#landfee4sao_treem2tuoi4').val(parseFloat($('#landfee4sao_treem2tuoi1').val())*parseFloat($('#landfee4sao_treem2tuoi3').val()));
    }
    if(!isNaN(parseFloat($('#landfee4sao_treem2tuoi5').val())*parseFloat($('#landfee4sao_treem2tuoi7').val()))){
        $('#landfee4sao_treem2tuoi8').val(parseFloat($('#landfee4sao_treem2tuoi5').val())*parseFloat($('#landfee4sao_treem2tuoi7').val()));
    }

    // Landfee trẻ em (4 sao) - trẻ em từ 2-12 tuổi 
    if(!isNaN(parseFloat($('#landfee4sao_treem12tuoi1').val())*parseFloat($('#landfee4sao_treem12tuoi3').val()))){
        $('#landfee4sao_treem12tuoi4').val(parseFloat($('#landfee4sao_treem12tuoi1').val())*parseFloat($('#landfee4sao_treem12tuoi3').val()));
    }
    if(!isNaN(parseFloat($('#landfee4sao_treem12tuoi5').val())*parseFloat($('#landfee4sao_treem12tuoi7').val()))){
        $('#landfee4sao_treem12tuoi8').val(parseFloat($('#landfee4sao_treem12tuoi5').val())*parseFloat($('#landfee4sao_treem12tuoi7').val()));
    }

    // chi visa 
    // visa thông hành
    if(!isNaN(parseFloat($('#visathonghanh1').val())*parseFloat($('#visathonghanh3').val()))){
        $('#visathonghanh4').val(parseFloat($('#visathonghanh1').val())*parseFloat($('#visathonghanh3').val()));
    }
    if(!isNaN(parseFloat($('#visathonghanh5').val())*parseFloat($('#visathonghanh7').val()))){
        $('#visathonghanh8').val(parseFloat($('#visathonghanh5').val())*parseFloat($('#visathonghanh7').val()));
    }
    // dich thuat cong chung 
    if(!isNaN(parseFloat($('#visadichthuat1').val())*parseFloat($('#visadichthuat3').val()))){
        $('#visadichthuat4').val(parseFloat($('#visadichthuat1').val())*parseFloat($('#visadichthuat3').val()));
    }
    if(!isNaN(parseFloat($('#visadichthuat5').val())*parseFloat($('#visadichthuat7').val()))){
        $('#visadichthuat8').val(parseFloat($('#visadichthuat5').val())*parseFloat($('#visadichthuat7').val()));
    }

    // Visa Phí chuyển phát hồ sơ

    if(!isNaN(parseFloat($('#phichuyenphathoso1').val())*parseFloat($('#phichuyenphathoso3').val()))){
        $('#phichuyenphathoso4').val(parseFloat($('#phichuyenphathoso1').val())*parseFloat($('#phichuyenphathoso3').val()));
    }
    if(!isNaN(parseFloat($('#phichuyenphathoso5').val())*parseFloat($('#phichuyenphathoso7').val()))){
        $('#phichuyenphathoso8').val(parseFloat($('#phichuyenphathoso5').val())*parseFloat($('#phichuyenphathoso7').val()));
    }
    // visa Phí thu mới
    if(!isNaN(parseFloat($('#phithumoi1').val())*parseFloat($('#phithumoi3').val()))){
        $('#phithumoi4').val(parseFloat($('#phithumoi1').val())*parseFloat($('#phithumoi3').val()));
    }
    if(!isNaN(parseFloat($('#phithumoi5').val())*parseFloat($('#phithumoi7').val()))){
        $('#phithumoi8').val(parseFloat($('#phithumoi5').val())*parseFloat($('#phithumoi7').val()));
    }

    // Phí Visa trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat($('#visatreem2tuoi1').val())*parseFloat($('#visatreem2tuoi3').val()))){
        $('#visatreem2tuoi4').val(parseFloat($('#visatreem2tuoi1').val())*parseFloat($('#visatreem2tuoi3').val()));
    }
    if(!isNaN(parseFloat($('#visatreem2tuoi5').val())*parseFloat($('#visatreem2tuoi7').val()))){
        $('#visatreem2tuoi8').val(parseFloat($('#visatreem2tuoi5').val())*parseFloat($('#visatreem2tuoi7').val()));
    }

    if(!isNaN(parseFloat($('#visatreem12tuoi1').val())*parseFloat($('#visatreem12tuoi3').val()))){
        $('#visatreem12tuoi4').val(parseFloat($('#visatreem12tuoi1').val())*parseFloat($('#visatreem12tuoi3').val()));
    }
    if(!isNaN(parseFloat($('#visatreem12tuoi5').val())*parseFloat($('#visatreem12tuoi7').val()))){
        $('#visatreem12tuoi8').val(parseFloat($('#visatreem12tuoi5').val())*parseFloat($('#visatreem12tuoi7').val()));
    }

    // chi phi huong dan vien

    if(!isNaN(parseFloat($('#tour_leader1').val())*parseFloat($('#tour_leader2').val())* parseFloat($('#tour_leader3').val()))){
        $('#tour_leader4').val(parseFloat($('#tour_leader1').val())*parseFloat($('#tour_leader2').val())*parseFloat($('#tour_leader3').val())        );
    }
    if(!isNaN(parseFloat($('#tour_leader5').val())*parseFloat($('#tour_leader6').val())* parseFloat($('#tour_leader7').val()))){
        $('#tour_leader8').val(parseFloat($('#tour_leader5').val())*parseFloat($('#tour_leader6').val())*parseFloat($('#tour_leader7').val())        );
    }

    if(!isNaN(parseFloat($('#chiphikhac1').val())*parseFloat($('#chiphikhac3').val()))){
        $('#chiphikhac4').val(parseFloat($('#chiphikhac1').val())*parseFloat($('#chiphikhac3').val()));
    }
    if(!isNaN(parseFloat($('#chiphikhac5').val())*parseFloat($('#chiphikhac7').val()))){
        $('#chiphikhac8').val(parseFloat($('#chiphikhac5').val())*parseFloat($('#chiphikhac7').val()));
    }

    // chi phi khac
    if(!isNaN(parseFloat($('#baohiem1').val())*parseFloat($('#baohiem3').val()))){
        $('#baohiem4').val(parseFloat($('#baohiem1').val())*parseFloat($('#baohiem3').val()));
    }
    if(!isNaN(parseFloat($('#baohiem5').val())*parseFloat($('#baohiem7').val()))){
        $('#baohiem8').val(parseFloat($('#baohiem5').val())*parseFloat($('#baohiem7').val()));
    }

    // Bảo hiểm trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat($('#baohiemtreem2tuoi1').val())*parseFloat($('#baohiemtreem2tuoi3').val()))){
        $('#baohiemtreem2tuoi4').val(parseFloat($('#baohiemtreem2tuoi1').val())*parseFloat($('#baohiemtreem2tuoi3').val()));
    }
    if(!isNaN(parseFloat($('#baohiemtreem2tuoi5').val())*parseFloat($('#baohiemtreem2tuoi7').val()))){
        $('#baohiemtreem2tuoi8').val(parseFloat($('#baohiemtreem2tuoi7').val())*parseFloat($('#baohiemtreem2tuoi7').val()));
    }

    //Bảo hiểm trẻ em từ 2 - 12 tuổi    
    if(!isNaN(parseFloat($('#baohiemtreem12tuoi1').val())*parseFloat($('#baohiemtreem12tuoi3').val()))){
        $('#baohiemtreem12tuoi4').val(parseFloat($('#baohiemtreem12tuoi1').val())*parseFloat($('#baohiemtreem12tuoi3').val()));
    }
    if(!isNaN(parseFloat($('#baohiemtreem12tuoi5').val())*parseFloat($('#baohiemtreem12tuoi7').val()))){
        $('#baohiemtreem12tuoi8').val(parseFloat($('#baohiemtreem12tuoi5').val())*parseFloat($('#baohiemtreem12tuoi7').val()));
    }

    // chi phí visa tip
    if(!isNaN(parseFloat($('#visatip1').val())*parseFloat($('#visatip3').val())*parseFloat($('#visatip2').val()))){
        $('#visatip4').val(parseFloat($('#visatip1').val())*parseFloat($('#visatip3').val())*parseFloat($('#visatip2').val()));
    }
    if(!isNaN(parseFloat($('#visatip5').val())*parseFloat($('#visatip2').val())*parseFloat($('#visatip7').val()))){
        $('#visatip8').val(parseFloat($('#visatip5').val())*parseFloat($('#visatip7').val())*parseFloat($('#visatip6').val()));
    } 

    // chi phí quà tặng
    if(!isNaN(parseFloat($('#quatang1').val())*parseFloat($('#quatang3').val()))){
        $('#quatang4').val(parseFloat($('#quatang1').val())*parseFloat($('#quatang3').val()));
    }
    if(!isNaN(parseFloat($('#quatang5').val())*parseFloat($('#quatang7').val()))){
        $('#quatang8').val(parseFloat($('#quatang5').val())*parseFloat($('#quatang7').val()));
    }
    // chi phí khác land
    if(!isNaN(parseFloat($('#land2_1').val())*parseFloat($('#land2_3').val()))){
        $('#land2_4').val(parseFloat($('#land2_1').val())*parseFloat($('#land2_3').val()));
    }
    if(!isNaN(parseFloat($('#land2_5').val())*parseFloat($('#land2_7').val()))){
        $('#land2_8').val(parseFloat($('#land2_5').val())*parseFloat($('#land2_7').val()));
    }
    // chi phí khác cpk
    if(!isNaN(parseFloat($('#cpk1').val())*parseFloat($('#cpk3').val()))){
        $('#cpk4').val(parseFloat($('#cpk1').val())*parseFloat($('#cpk3').val()));
    }
    if(!isNaN(parseFloat($('#cpk5').val())*parseFloat($('#cpk5').val()))){
        $('#cpk8').val(parseFloat($('#cpk5').val())*parseFloat($('#cpk7').val()));
    }
    // chi phí khác chênh lệch tỷ giá
    var tygia3sao = parseFloat($('#tongthunguoilon1').val()) + parseFloat($('#tongthute1').val());
    var tygia4sao = parseFloat($('#tongthunguoilon2').val()) + parseFloat($('#tongthute2').val());
    var tygia ;
    var tyle = parseFloat($('#txtCLTG').val())/100;
    if(tygia3sao > tygia4sao){
        tygia = tygia3sao*tyle;
        $('#chenhlechtygia4').val(Math.round(tygia).toFixed(2));
    }
    else{
        tygia = tygia4sao*tyle;
        $('#chenhlechtygia4').val(Math.round(tygia).toFixed(2));
    }

    var tygia3sao1 = parseFloat($('#tongthunguoilon3').val()) + parseFloat($('#tongthute4').val());
    var tygia4sao1 = parseFloat($('#tongthunguoilon3').val()) + parseFloat($('#tongthute4').val());
    if(tygia3sao1 > tygia4sao1){
        
        $('#chenhlechtygia8').val(tygia3sao1 * (parseFloat($('#txtCLTG').val())/100));
    }
    else{$('#chenhlechtygia8').val(tygia4sao1 * (parseFloat($('#txtCLTG').val())/100));}

    $('#chenhlechtygia3').val(Math.round(parseFloat($('#chenhlechtygia4').val())/parseFloat($('#chenhlechtygia1').val())).toFixed(2));

    $('#chenhlechtygia7').val(Math.round(parseFloat($('#chenhlechtygia8').val())/parseFloat($('#chenhlechtygia5').val())).toFixed(2));     
}

function tinhtongchiphi(){
    // tinh toan tong chi 
    // chi phi tre em duoi 2 tuoi ks3 sao 1
    if(parseFloat($('#treem2tuoi1').val())> 0){
        $('#tongchi1').val(Math.round((parseFloat($('#vmbtreem2tuoi4').val())+parseFloat($('#vmbtreem2tuoind4').val()))/(parseFloat($('#taxtreem4').val())/parseFloat($('#taxtreem1').val()))*parseFloat($('#treem2tuoi1').val())+parseFloat($('#landfeetreem_2_3sao4').val())+parseFloat($('#visatreem2tuoi4').val())+parseFloat($('#baohiemtreem2tuoi4').val())).toFixed(2));
    }
    else{$('#tongchi1').val('0');}

    // chi phi tre em duoi 2 tuoi ks4 sao 1
    if(parseFloat($('#treem2tuoi1').val())>0){
        tt =(parseFloat($('#vmbtreem2tuoi4').val())+parseFloat($('#vmbtreem2tuoind4').val()))/(parseFloat($('#taxtreem4').val())/parseFloat($('#taxtreem1').val()))*parseFloat($('#treem2tuoi1').val())+parseFloat($('#landfee4sao_treem2tuoi4').val())+parseFloat($('#visatreem2tuoi4').val())+parseFloat($('#baohiemtreem2tuoi4').val());
        $('#tongchi2').val(Math.round(tt).toFixed(2));
    }
    else{$('#tongchi2').val('0');}

    // chi phi tre em tu 2 -12 tuoi ks3 sao 1
    if(parseFloat($('#treem12tuoi1').val())>0) {
        $('#tongchi3').val(Math.round((parseFloat($('#vmbtreem12tuoi4').val())+parseFloat($('#vmbtreem12tuoind4').val()))+(parseFloat($('#taxtreem4').val())/parseFloat($('#taxtreem1').val()))*parseFloat($('#treem12tuoi1').val())+parseFloat($('#landfee_1_4_4').val())+parseFloat($('#landfee_2_4_4').val())+parseFloat($('#visatreem12tuoi4').val())+parseFloat($('#baohiemtreem12tuoi4').val())).toFixed(2));
    }
    else{ $('#tongchi3').val('0');}

    if(parseFloat($('#treem12tuoi1').val())>0){
        $('#tongchi4').val(Math.round(parseFloat($('#vmbtreem12tuoi4').val())+(parseFloat($('#taxtreem4').val())/parseFloat($('#taxtreem1').val())) * parseFloat($('#treem12tuoi1').val())+ parseFloat($('#vmbtreem12tuoind4').val()) + parseFloat($('#landfee4sao_treem2tuoi4').val())+parseFloat($('#landfee4sao_treem12tuoi4').val()) + parseFloat($('#visatreem12tuoi4').val()) + parseFloat($('#baohiemtreem12tuoi4').val())).toFixed(2)); 
    }
    else{ $('#tongchi4').val('0');}

    // tong chi nguoi lon
    // tong chi ks3* nguoi lon 
    if(parseFloat($('#landfee1_3_4').val())+parseFloat($('#landfee_2_3_4').val())> 0){
        var tongcongchi = parseFloat($('#tongchivanchuyen1').val()) + parseFloat($('#sumlandfeepackage1').val()) + parseFloat($('#sumvisa1').val()) + parseFloat($('#sumguide1').val()) + parseFloat($('#sumotherservice1').val());
        var giaban; 
        if(parseFloat($('#giaban6').val())> parseFloat($('#giaban5').val())){
            giaban = ((parseFloat($('#tongthunguoilon2').val())+parseFloat($('#tongthute2').val()))-(parseFloat($('#tongthunguoilon1').val())+parseFloat($('#tongthute1').val())))*(1 + parseFloat($('#txtCLTG').val())/100 );
        }
        else {giaban = 0;}
        $('#tongchi5').val(Math.round((tongcongchi-giaban-parseFloat($('#landfee_1_4_4').val())-parseFloat($('#landfee_2_4_4').val()))).toFixed(2));
    }
    else{ $('#tongchi5').val('0');} 

    // tong chi ks4* nguoi lon
    if (parseFloat($('#landfee_1_4_4').val())+ parseFloat($('#landfee_2_4_4').val())> 0){
        var tongcongchi = parseFloat($('#tongchivanchuyen1').val()) + parseFloat($('#sumlandfeepackage1').val()) + parseFloat($('#sumvisa1').val()) + parseFloat($('#sumguide1').val()) + parseFloat($('#sumotherservice1').val());
        $('#tongchi6').val(Math.round(tongcongchi - parseFloat($('#landfee1_3_4').val())- parseFloat($('#landfee_2_3_4').val())).toFixed(2));
    }
    else{$('#tongchi6').val('0');}

    // tong chi ks3* tre em duoi 2 tuoi 2

    if(parseFloat($('#treem2tuoi7').val())>0){
        $('#tongchi7').val(Math.round(parseFloat($('#vmbtreem2tuoi8').val())+parseFloat($('#vmbtreem2tuoind8').val())+(parseFloat($('#taxtreem8').val())/parseFloat($('#taxtreem5').val()))*parseFloat($('#treem2tuoi7').val())+parseFloat($('#visatreem2tuoi8').val())+ parseFloat($('#baohiemtreem2tuoi8').val())).toFixed(2));
    }
    else{$('#tongchi7').val('0');}

    // tong chi ks4* tre em duoi 2 tuoi 2
    if(parseFloat($('#treem2tuoi7').val())>0){
        $('#tongchi8').val(Math.round(parseFloat($('#vmbtreem2tuoi8').val())+parseFloat($('#vmbtreem2tuoind8').val())+(parseFloat($('#taxtreem8').val())/parseFloat($('#taxtreem5').val()))*parseFloat($('#treem2tuoi7').val())+parseFloat($('#visatreem2tuoi8').val())+ parseFloat($('#baohiemtreem2tuoi8').val())).toFixed(2));
    }

    // tong chi ks3* tre em tu 2 - 12 tuoi 2
   if(parseFloat($('#treem12tuoi7').val())>0){
        $('#tongchi9').val(Math.round(parseFloat($('#vmbtreem12tuoi8').val()) + parseFloat($('#vmbtreem12tuoind8').val()) + (parseFloat($('#taxtreem8').val())/parseFloat($('#taxtreem5').val())) * parseFloat($('#treem12tuoi7').val()) + parseFloat($('#landfeetreem_2_3sao8').val())+parseFloat($('#landfeetreem12_3sao8').val()) + parseFloat($('#visatreem12tuoi8').val()) + parseFloat($('#baohiemtreem12tuoi8').val())).toFixed(2));
    }
    else{$('#tongchi9').val('0');}

    // tong chi ks4* tre em tu 2 - 12 tuoi 2
    if(parseFloat($('#treem12tuoi7').val())>0){
        $('#tongchi10').val(Math.round(parseFloat($('#vmbtreem12tuoind8').val())+ parseFloat($('#vmbtreem12tuoind8').val())+(parseFloat($('#taxtreem8').val())/parseFloat($('#taxtreem5').val())) * parseFloat($('#treem12tuoi7').val())+ parseFloat($('#landfee4sao_treem2tuoi8').val()) + parseFloat($('#landfee4sao_treem12tuoi8').val()) +  parseFloat($('#visatreem12tuoi8').val()) + parseFloat($('#baohiemtreem12tuoi8').val())).toFixed(2));
    }
    else{$('#tongchi10').val('0');}

    // tong chi ks3* nguoi lon 2

    if(parseFloat($('#landfee1_3_8').val())+parseFloat($('#landfee_2_3_8').val()) > 0){
        var sumchiphi = parseFloat($('#tongchivanchuyen2').val()) + parseFloat($('#sumlandfeepackage2').val())+parseFloat($('#sumvisa2').val()) + parseFloat($('#sumguide2').val()) + parseFloat($('#sumotherservice2').val());
        var giaban1;
        if(parseFloat($('#giaban12').val())>parseFloat($('#giaban11').val())){
            giaban1 = (parseFloat($('#tongthunguoilon4').val())+parseFloat($('#tongthute4').val()))-(parseFloat($('#tongthunguoilon3').val())+parseFloat($('#tongthute3').val()))*(1 + parseFloat($('#txtCLTG').val())/100 );
        }
        else{giaban1=0;}

        $('#tongchi11').val(Math.round(sumchiphi-giaban1 - parseFloat($('#landfee_1_4_8').val())- parseFloat($('#landfee_2_4_8').val())).toFixed(2));
    }
    else{$('#tongchi11').val('0')}

    if(parseFloat($('#landfee_1_4_8').val())+parseFloat($('#landfee_2_4_8').val())>0){
        var sumchiphi1 = parseFloat($('#tongchivanchuyen2').val()) + parseFloat($('#sumlandfeepackage2').val())+parseFloat($('#sumvisa2').val()) + parseFloat($('#sumguide2').val()) + parseFloat($('#sumotherservice2').val());

        $('#tongchi12').val(Math.round(sumchiphi1 -parseFloat($('#landfee1_3_8').val())- parseFloat($('#landfee_2_3_8').val())).toFixed(2));
    }
    else {$('#tongchi12').val('0');}
}

// tong chi van chuyen

function tongchivanchuyen(){
    // tong chi van chuyen 1
    // vé máy bay người lớn 1
    var vmbnl1 = parseFloat($('#vmbnguoilon4').val());
    // tax tạm tính 1
    var taxtt1 = parseFloat($('#taxtamtinh4').val());
    // vé máy bay nội địa người lớn 1
    var vmbnguoilonnoidia1 = parseFloat($('#vmbnguoilonnd4').val());
    // XE ĐÓN TIỄN sân bay 1
    var xedontien1 = parseFloat($('#xedontien4').val());
    //VMB trẻ em dưới 2 tuổi (10%) 1
    var vmbtreem2tuoi1 = parseFloat($('#vmbtreem2tuoi4').val());
    // VMB Nội địa trẻ em dưới 2 tuổi 1
    var vmbtreem2tuoind1 = parseFloat($('#vmbtreem2tuoind4').val());
    //VMB trẻ em từ 2-12 tuổi
    var vmbtreem12tuoi1 = parseFloat($('#vmbtreem12tuoi4').val());
    // VMB Nội Địa trẻ em 2 - 12 tuổi 1
    var vmbtreem12tuoind1 = parseFloat($('#vmbtreem12tuoind4').val());
    // tax trẻ em 1
    var taxtreem1 = parseFloat($('#taxtreem4').val());
    // tinh tong 
    var tongcong = vmbnl1+taxtt1+vmbnguoilonnoidia1+xedontien1+vmbtreem2tuoi1+vmbtreem2tuoind1+vmbtreem12tuoi1+vmbtreem12tuoind1+taxtreem1;
    if(!isNaN(tongcong)){
        $('#tongchivanchuyen1').val(tongcong.toString());
    }
    // tong chi van chuyen 2
    // vé máy bay người lớn 2
    var vmbnl2 = parseFloat($('#vmbnguoilon8').val());
    // tax tạm tính 2
    var taxtt2 = parseFloat($('#taxtamtinh8').val());
    // vé máy bay nội địa người lớn 2
    var vmbnguoilonnoidia2 = parseFloat($('#vmbnguoilonnd8').val());
    // XE ĐÓN TIỄN sân bay 2
    var xedontien2 = parseFloat($('#xedontien8').val());
    //VMB trẻ em dưới 2 tuổi (10%) 2
    var vmbtreem2tuoi2 = parseFloat($('#vmbtreem2tuoi8').val());
    // VMB Nội địa trẻ em dưới 2 tuổi 2
    var vmbtreem2tuoind2 = parseFloat($('#vmbtreem2tuoind8').val());
    //VMB trẻ em từ 2-12 tuổi 2
    var vmbtreem12tuoi2 = parseFloat($('#vmbtreem12tuoi8').val());
    // VMB Nội Địa trẻ em 2 - 12 tuổi 2
    var vmbtreem12tuoind2 = parseFloat($('#vmbtreem12tuoind8').val());
    // tax trẻ em 2
    var taxtreem2 = parseFloat($('#taxtreem8').val());
    // tinh tong 
    var tongcong1 = vmbnl2+taxtt2+vmbnguoilonnoidia2+xedontien2+vmbtreem2tuoi2+vmbtreem2tuoind2+vmbtreem12tuoi2+vmbtreem12tuoind2+taxtreem2;
    if(!isNaN(tongcong1)){
        $('#tongchivanchuyen2').val(tongcong1.toString());
    }

}

// tính tổng chỉ phí của landfee

function tinhtongchilandfee(){
    // tổng chi landfee 1
    // LANDFEE 1: 3 sao 1
    var landfee_1_3_1 = parseFloat($('#landfee1_3_4').val());
    // LANDFEE 2: 3 sao 1
    var landfee_2_3_1 = parseFloat($('#landfee_2_3_4').val());
    // LANDFEE 1: 4 sao 1
    var landfee_1_4_1 = parseFloat($('#landfee_1_4_4').val());
    // LANDFEE 2: 4 sao
    var landfee_2_4_1 = parseFloat($('#landfee_2_4_4').val());
    // upgrade_meal 1
    var upgrade_meal1 = parseFloat($('#upgrade_meal4').val());
    // optional_tour 1
    var optional_tour1 = parseFloat($('#optional_tour4').val());
    // single_supp_1
    var single_supp_1 = parseFloat($('#single_supp_4').val());
    // Landfee trẻ em (3 sao) - trẻ em dưới 2 tuổi 
    var landfeetreem_2_3sao1 = parseFloat($('#landfeetreem_2_3sao4').val());
    // landfeetreem12_3sao 1
    var landfeetreem12_3sao1 = parseFloat($('#landfeetreem12_3sao4').val());
    // landfee4sao_treem2tuoi 1
    var landfee4sao_treem2tuoi1 = parseFloat($('#landfee4sao_treem2tuoi4').val());
    // landfee4sao_treem12tuoi 1
    var landfee4sao_treem12tuoi1 = parseFloat($('#landfee4sao_treem12tuoi4').val());
    // tổng cộng
    var tongcong = landfee_1_3_1+landfee_2_3_1+landfee_1_4_1+landfee_2_4_1+upgrade_meal1+optional_tour1+single_supp_1+landfeetreem_2_3sao1+landfeetreem12_3sao1+landfee4sao_treem2tuoi1+landfee4sao_treem12tuoi1;
    if(!isNaN(tongcong)){
        $('#sumlandfeepackage1').val(tongcong.toString());
    }

    // tổng chi landfee 2
    // LANDFEE 1: 3 sao 2
    var landfee_1_3_2 = parseFloat($('#landfee1_3_8').val());
    // LANDFEE 2: 3 sao 2
    var landfee_2_3_2 = parseFloat($('#landfee_2_3_8').val());
    // LANDFEE 1: 4 sao 2
    var landfee_1_4_2 = parseFloat($('#landfee_1_4_8').val());
    // LANDFEE 2: 4 sao 2
    var landfee_2_4_2 = parseFloat($('#landfee_2_4_8').val());
    // upgrade_meal 2
    var upgrade_meal2 = parseFloat($('#upgrade_meal8').val());
    // optional_tour 2
    var optional_tour2 = parseFloat($('#optional_tour8').val());
    // single_supp_2
    var single_supp_2 = parseFloat($('#single_supp_8').val());
    // Landfee trẻ em (3 sao) - trẻ em dưới 2 tuổi 2
    var landfeetreem_2_3sao2 = parseFloat($('#landfeetreem_2_3sao8').val());
    // landfeetreem12_3sao 2
    var landfeetreem12_3sao2 = parseFloat($('#landfeetreem12_3sao8').val());
    // landfee4sao_treem2tuoi 2
    var landfee4sao_treem2tuoi2 = parseFloat($('#landfee4sao_treem2tuoi8').val());
    // landfee4sao_treem12tuoi 2
    var landfee4sao_treem12tuoi2 = parseFloat($('#landfee4sao_treem12tuoi8').val());
    // tổng cộng
    var tongcong1 = landfee_1_3_2+landfee_2_3_2+landfee_1_4_2+landfee_2_4_2+upgrade_meal2+optional_tour2+single_supp_2+landfeetreem_2_3sao2+landfeetreem12_3sao2+landfee4sao_treem2tuoi2+landfee4sao_treem12tuoi2;
    if(!isNaN(tongcong1)){
        $('#sumlandfeepackage2').val(tongcong1.toString());
    }

}

// tính toán tổng chi visa

function tinhtoanvisa(){
    // tính tổng chi visa 1
    // visa thông hành 
    var visathonghanh1 = parseFloat($('#visathonghanh4').val());
    // visa dịch thuật công chứng hồ sơ
    var visadichthuat1 = parseFloat($('#visadichthuat4').val());
    // phí chuyển hồ sơ
    var phichuyenphathoso1 = parseFloat($('#phichuyenphathoso4').val());
    // phí thu mới
    var phithumoi1 = parseFloat($('#phithumoi4').val());
    // phí visa trẻ em dưới 2 tuổi 
    var visatreem2tuoi1 = parseFloat($('#visatreem2tuoi4').val());
    // phí visa trẻ em từ 2-12 tuổi
    var visatreem12tuoi1 = parseFloat($('#visatreem12tuoi4').val());
    // tính tổng
    var tongcong = visathonghanh1+visadichthuat1+phichuyenphathoso1+phithumoi1+visatreem2tuoi1+visatreem12tuoi1;
    if(!isNaN(tongcong)){
        $('#sumvisa1').val(tongcong.toString());
    }
    
        // tính tổng chi visa 2
    // visa thông hành 2 
    var visathonghanh2 = parseFloat($('#visathonghanh8').val());
    // visa dịch thuật công chứng hồ sơ
    var visadichthuat2 = parseFloat($('#visadichthuat8').val());
    // phí chuyển hồ sơ
    var phichuyenphathoso2 = parseFloat($('#phichuyenphathoso8').val());
    // phí thu mới
    var phithumoi2 = parseFloat($('#phithumoi8').val());
    // phí visa trẻ em dưới 2 tuổi 
    var visatreem2tuoi2 = parseFloat($('#visatreem2tuoi8').val());
    // phí visa trẻ em từ 2-12 tuổi
    var visatreem12tuoi2 = parseFloat($('#visatreem12tuoi8').val());
    // tính tổng
    var tongcong2 = visathonghanh2+visadichthuat2+phichuyenphathoso2+phithumoi2+visatreem2tuoi2+visatreem12tuoi2;
    if(!isNaN(tongcong2)){
        $('#sumvisa2').val(tongcong2.toString());
    }
    
}

// tính toán chi phí hướng dẫn viên 
function tinhchiphihuongdanvien(){
    // chi phí hướng dẫn viên 1
    // Tour leader
    var tour_leader1 = parseFloat($('#tour_leader4').val());
    // chi phí khác 
    var chiphikhac1 = parseFloat($('#chiphikhac4').val());
    // tổng cộng
    var tongcong = tour_leader1+chiphikhac1;
    if(!isNaN(tongcong)){
        $('#sumguide1').val(tongcong.toString());
    }
    
    // chi phí hướng dẫn viên 2
    // Tour leader
    var tour_leader2 = parseFloat($('#tour_leader8').val());
    // chi phí khác 
    var chiphikhac2 = parseFloat($('#chiphikhac8').val());
    // tổng cộng
    var tongcong2 = tour_leader2+chiphikhac2;
    if(!isNaN(tongcong2)){
        $('#sumguide2').val(tongcong2.toString());
    }
}

// chi phí dịch vụ khác 
function chiphidichvukhac(){
    // chi phí khác 1
    // bảo hiểm 1
    var baohiem1 = parseFloat($('#baohiem4').val());
    // bảo hiểm trẻ em dưới 2 tuổi
    //var baohiemtreem2tuoi1 = parseFloat($('#baohiemtreem2tuoi4').val());
    // bảo hiểm trẻ từ 2- 12 tuổi
    //var baohiemtreem12tuoi1 = parseFloat($('#baohiemtreem12tuoi4').val());
     // visa tip 
    var visatip1 = parseFloat($('#visatip4').val());
    // quà tặng 
    var quatang1 = parseFloat($('#quatang4').val());
    // land 2
    var land2_1 = parseFloat($('#land2_1').val());
    // CPK
    var cpk1 = parseFloat($('#cpk4').val());
    // chênh lệch tỷ giá
    var chenhlechtygia1 = parseFloat($('#chenhlechtygia4').val());
    // tính tổng cộng
    var tongcong = baohiem1+visatip1+quatang1+land2_1+cpk1+chenhlechtygia1;
    if(!isNaN(tongcong)){
        $('#sumotherservice1').val(tongcong.toString());
    }
    // chi phí khác 2
    // bảo hiểm 2
    var baohiem2 = parseFloat($('#baohiem8').val());
    // bảo hiểm trẻ em dưới 2 tuổi
    //var baohiemtreem2tuoi2 = parseFloat($('#baohiemtreem2tuoi8').val());
    // bảo hiểm trẻ từ 2- 12 tuổi
    //var baohiemtreem12tuoi2 = parseFloat($('#baohiemtreem12tuoi8').val());
     // visa tip 
    var visatip2 = parseFloat($('#visatip8').val());
    // quà tặng 
    var quatang2 = parseFloat($('#quatang8').val());
    // land 2
    var land2_2 = parseFloat($('#land2_8').val());
    // CPK
    var cpk2 = parseFloat($('#cpk8').val());
    // chênh lệch tỷ giá
    var chenhlechtygia2 = parseFloat($('#chenhlechtygia8').val());
    
    var tongcong1 = baohiem2+visatip2+quatang2+land2_2+cpk2+chenhlechtygia2;
    if(!isNaN(tongcong1)){
        $('#sumotherservice2').val(tongcong1.toString());
    }  
}

function reportsummary(){
    // giá net
    if(parseFloat($('#treem2tuoi1').val())!= 0){
        $('#gianet1').val(Math.round(parseFloat($('#tongchi1').val())/parseFloat($('#treem2tuoi1').val())).toFixed(2));
        $('#gianet2').val(Math.round(parseFloat($('#tongchi2').val())/parseFloat($('#treem2tuoi1').val())).toFixed(2));  
    }
    if(parseFloat($('#treem12tuoi1').val())!= 0){
        $('#gianet3').val(Math.round(parseFloat($('#tongchi3').val())/parseFloat($('#treem12tuoi1').val())).toFixed(2));
        $('#gianet4').val(Math.round(parseFloat($('#tongchi4').val())/parseFloat($('#treem12tuoi1').val())).toFixed(2));
    }
    if($('#ks3saonguoilon1').val()!=0){
        $('#gianet5').val(Math.round(parseFloat($('#tongchi5').val())/parseFloat($('#ks3saonguoilon1').val())).toFixed(2));
        $('#gianet6').val(Math.round(parseFloat($('#tongchi6').val())/parseFloat($('#ks3saonguoilon1').val())).toFixed(2));
    }
    
    if($('#treem2tuoi7').val()!= 0){
        $('#gianet7').val(Math.round(parseFloat($('#tongchi7').val())/parseFloat($('#treem2tuoi7').val())).toFixed(2));
        $('#gianet8').val(Math.round(parseFloat($('#tongchi8').val())/parseFloat($('#treem2tuoi7').val())).toFixed(2));
    }
    
    if($('#treem12tuoi7').val()!= 0){
        $('#gianet9').val(Math.round(parseFloat($('#tongchi9').val())/parseFloat($('#treem12tuoi7').val())).toFixed(2));
        $('#gianet10').val(Math.round(parseFloat($('#tongchi10').val())/parseFloat($('#treem12tuoi7').val())).toFixed(2));
    }
    
    if($('#ks3saonguoilon4').val()!= 0){
        $('#gianet11').val(Math.round(parseFloat($('#tongchi11').val())/parseFloat($('#ks3saonguoilon4').val())).toFixed(2));
        $('#gianet12').val(Math.round(parseFloat($('#tongchi12').val())/parseFloat($('#ks3saonguoilon4').val())).toFixed(2));
    }
    // giá bán
    $('#giaban1').val(Math.round($('#treem2tuoi2').val()).toFixed(2));
    $('#giaban2').val(Math.round($('#treem2tuoi4').val()).toFixed(2));
    $('#giaban3').val(Math.round($('#treem12tuoi2').val()).toFixed(2));
    $('#giaban4').val(Math.round($('#treem12tuoi4').val()).toFixed(2));
    $('#giaban7').val(Math.round($('#treem2tuoi8').val()).toFixed(2));
    $('#giaban8').val(Math.round($('#treem2tuoi10').val()).toFixed(2));
    $('#giaban9').val(Math.round($('#treem12tuoi8').val()).toFixed(2));
    $('#giaban10').val(Math.round($('#treem12tuoi10').val()).toFixed(2));
    
    // lãi khách
    $('#laikhach1').val(Math.round(parseFloat($('#giaban1').val())-parseFloat($('#gianet1').val())).toFixed(2));
    $('#laikhach2').val(Math.round(parseFloat($('#giaban2').val())-parseFloat($('#gianet2').val())).toFixed(2));
    $('#laikhach3').val(Math.round(parseFloat($('#giaban3').val())-parseFloat($('#gianet3').val())).toFixed(2));
    $('#laikhach4').val(Math.round(parseFloat($('#giaban4').val())-parseFloat($('#gianet4').val())).toFixed(2));
    $('#laikhach5').val(Math.round(parseFloat($('#giaban5').val())-parseFloat($('#gianet5').val())).toFixed(2));
    $('#laikhach6').val(Math.round(parseFloat($('#giaban6').val())-parseFloat($('#gianet6').val())).toFixed(2));
    $('#laikhach7').val(Math.round(parseFloat($('#giaban7').val())-parseFloat($('#gianet7').val())).toFixed(2));
    $('#laikhach8').val(Math.round(parseFloat($('#giaban8').val())-parseFloat($('#gianet8').val())).toFixed(2));
    $('#laikhach9').val(Math.round(parseFloat($('#giaban9').val())-parseFloat($('#gianet9').val())).toFixed(2));
    $('#laikhach10').val(Math.round(parseFloat($('#giaban10').val())-parseFloat($('#gianet10').val())).toFixed(2));
    $('#laikhach11').val(Math.round(parseFloat($('#giaban11').val())-parseFloat($('#gianet11').val())).toFixed(2));
    $('#laikhach12').val(Math.round(parseFloat($('#giaban12').val())-parseFloat($('#gianet12').val())).toFixed(2));
    
    // tổng lãi
    $('#tonglai1').val(Math.round(parseFloat($('#treem2tuoi3').val())-parseFloat($('#tongchi1').val())).toFixed(2));
    $('#tonglai2').val(Math.round(parseFloat($('#treem2tuoi5').val())-parseFloat($('#tongchi2').val())).toFixed(2));
    $('#tonglai3').val(Math.round(parseFloat($('#treem12tuoi3').val())-parseFloat($('#tongchi3').val())).toFixed(2));
    $('#tonglai4').val(Math.round(parseFloat($('#treem12tuoi5').val())-parseFloat($('#tongchi4').val())).toFixed(2));
    $('#tonglai4').val(Math.round(parseFloat($('#treem12tuoi5').val())-parseFloat($('#tongchi4').val())).toFixed(2));
    $('#tonglai4').val(Math.round(parseFloat($('#treem12tuoi5').val())-parseFloat($('#tongchi4').val())).toFixed(2));
    $('#tonglai5').val(Math.round(parseFloat($('#tongthunguoilon1').val())-parseFloat($('#tongchi5').val())).toFixed(2));
    $('#tonglai6').val(Math.round(parseFloat($('#tongthunguoilon2').val())-parseFloat($('#tongchi6').val())).toFixed(2));
    $('#tonglai7').val(Math.round(parseFloat($('#treem2tuoi9').val())-parseFloat($('#tongchi7').val())).toFixed(2));
    $('#tonglai8').val(Math.round(parseFloat($('#treem2tuoi11').val())-parseFloat($('#tongchi8').val())).toFixed(2));
    $('#tonglai9').val(Math.round(parseFloat($('#treem12tuoi9').val())-parseFloat($('#tongchi9').val())).toFixed(2));
    $('#tonglai10').val(Math.round(parseFloat($('#treem12tuoi11').val())-parseFloat($('#tongchi10').val())).toFixed(2));
    $('#tonglai11').val(Math.round(parseFloat($('#tongthunguoilon3').val())-parseFloat($('#tongchi11').val())).toFixed(2));
    $('#tonglai12').val(Math.round(parseFloat($('#tongthunguoilon4').val())-parseFloat($('#tongchi12').val())).toFixed(2));
    
    var tl1 = (parseFloat($('#tonglai1').val())/parseFloat($('#treem2tuoi3').val()))*100;
    $('#tyle1').val((Math.round(tl1).toFixed(2)).toString()+' %');
    var tl2 = (parseFloat($('#tonglai2').val())/parseFloat($('#treem2tuoi5').val()))*100;
    $('#tyle2').val((Math.round(tl2).toFixed(2)).toString()+' %');
    var tl3 = (parseFloat($('#tonglai3').val())/parseFloat($('#treem12tuoi3').val()))*100;
    $('#tyle3').val((Math.round(tl3).toFixed(2)).toString()+' %');
    var tl4 = (parseFloat($('#tonglai4').val())/parseFloat($('#treem12tuoi5').val()))*100;
    $('#tyle4').val((Math.round(tl4).toFixed(2)).toString()+' %');
    var tl5 = (parseFloat($('#tonglai5').val())/parseFloat($('#tongthunguoilon1').val()))*100;
    $('#tyle5').val((Math.round(tl5).toFixed(2)).toString()+' %');
    var tl6 = (parseFloat($('#tonglai6').val())/parseFloat($('#tongthunguoilon2').val()))*100;
    $('#tyle6').val((Math.round(tl6).toFixed(2)).toString()+' %');
    var tl7 = (parseFloat($('#tonglai7').val())/parseFloat($('#treem2tuoi9').val()))*100;
    $('#tyle7').val((Math.round(tl7).toFixed(2)).toString()+' %');
    var tl8 = (parseFloat($('#tonglai8').val())/parseFloat($('#treem2tuoi11').val()))*100;
    $('#tyle8').val((Math.round(tl8).toFixed(2)).toString()+' %');
    var tl9 = (parseFloat($('#tonglai9').val())/parseFloat($('#treem12tuoi9').val()))*100;
    $('#tyle9').val((Math.round(tl9).toFixed(2)).toString()+' %');
    var tl10 = (parseFloat($('#tonglai10').val())/parseFloat($('#treem12tuoi11').val()))*100;
    $('#tyle10').val((Math.round(tl10).toFixed(2)).toString()+' %');
    var tl11 = (parseFloat($('#tonglai11').val())/parseFloat($('#tongthunguoilon3').val()))*100;
    $('#tyle11').val((Math.round(tl11).toFixed(2)).toString()+' %');
    var tl12 = (parseFloat($('#tonglai12').val())/parseFloat($('#tongthunguoilon4').val()))*100;
    $('#tyle12').val((Math.round(tl12).toFixed(2)).toString()+' %');
    
}

