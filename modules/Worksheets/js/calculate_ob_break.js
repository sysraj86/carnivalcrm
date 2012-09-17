$(function(){
    if($(".giaban,.phuthukhac, .treem, .calculate, .disable, .numbers").val()==''){
        $(".giaban,.phuthukhac, .treem, .calculate, .disable, .numbers").val('0');
    }
    //$(".giaban,.phuthukhac, .treem, .calculate").numeric();

    $(".giaban,.phuthukhac, .treem, .calculate, .disable, .numbers").focus(function(){
        if($('#'+this.id).val()== 0){
            $('#'+this.id).val('');   
        }

    });

    $('.dongia').blur(function(){
        $this = $(this);
        fmCurrency($this);
    });

    // convert currency

    jQuery('#outbound_currency').live('change',function(){
        if(jQuery(this).val()!=''){
            val=unformat(parseFloat(jQuery('#tygia').val()));
            if(!isNaN(val)){
                jQuery('.convertcurrency').each(function(){
                    currency = parseFloat(unformat(jQuery(this).val()));
                    value = currency*val;
                    jQuery(this).val(value);
                    fmCurrency(jQuery(this));
                });
            }
        }
    });

    $(".giaban,.phuthukhac, .treem, .calculate, .numbers").blur(function(){
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
        tinhtongchilandfee();
        chiphidichvukhac();
        tinhtoanvisa();
        tinhchiphihuongdanvien();
        reportsummary();
        checkfoc();
    });

    $('.chioption, .thuoption').blur(function(){
        var eID = $(this).attr('id');
        id = eID.match(/\d+$/);
        $('#thu_dichvu'+id).val($('#chi_dichvu'+id).val());
        $('#thu_soluong'+id).val($('#chi_soluong'+id).val());
        thuchioption($(this));
        tinhtongthuoption();
        tinhtongchioption();
        tinhtongchiphi(); 
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

function thuchioption(name){
    var eID = $(name).attr('id');
    id = eID.match(/\d+$/);
    $('#chi_thanhtien'+id).val(Math.round(parseFloat(unformat($('#chi_soluong'+id).val()))*parseFloat(unformat($('#chi_dongia'+id).val()))).toFixed(2));
    fmCurrency($('#chi_thanhtien'+id),2);
    $('#chi_thanhtienmot'+id).val(Math.round(parseFloat(unformat($('#chi_soluong'+id).val()))*parseFloat(unformat($('#chi_dongiamot'+id).val()))).toFixed(2));
    fmCurrency($('#chi_thanhtienmot'+id),2);
    $('#thu_thanhtienmot'+id).val(Math.round(parseFloat(unformat($('#thu_soluong'+id).val()))*parseFloat(unformat($('#thu_dongiamot'+id).val()))).toFixed(2));
    fmCurrency($('#thu_thanhtienmot'+id),2);
    $('#thu_thanhtien'+id).val(Math.round(parseFloat(unformat($('#thu_soluong'+id).val()))*parseFloat(unformat($('#thu_dongia'+id).val()))).toFixed(2));
    fmCurrency($('#thu_thanhtien'+id),2);
}

// tinh toan tong thu option
function tinhtongthuoption(){
    var count = $('#thu_option').find('tbody > tr').length;
    var sum = 0;
    var sum1= 0;
    for(i=1;i<=count;i++){
        var tt = parseFloat(unformat($('#thu_thanhtien'+i).val()));
        var tt1 = parseFloat(unformat($('#thu_thanhtienmot'+i).val()));
        sum += tt;
        sum1 += tt1;
    }
    $('#tongtien_thu').val(sum);
    fmCurrency($('#tongtien_thu'),2);
    $('#tongtien_thu1').val(sum1);
    fmCurrency($('#tongtien_thu1'),2);
}

// tinh toan tong chi option
function tinhtongchioption(){
    var count = $('#chi_option').find('tbody > tr').length;
    var sum = 0;
    for(i=1;i<=count;i++){
        var tt = parseFloat(unformat($('#chi_thanhtien'+i).val()));
        sum += tt;
    }
    $('#tongtien_chi').val(sum); 
    fmCurrency($('#tongtien_chi'),2);
}

// tinh toan gia ban
function giaban(){
    // phan tre em
    $('#treem2tuoi1').val($('#TreEm2Tuoi1').val());
    $('#treem2tuoi2').val(Math.round(unformat(($('#ks3saonguoilon2').val())* 0.3)).toFixed(2));
    if(!isNaN(unformat($('#treem2tuoi1').val()))*unformat($('#treem2tuoi2').val())){
        $('#treem2tuoi3').val(Math.round((unformat($('#treem2tuoi1').val()))*(unformat($('#treem2tuoi2').val()))).toFixed(2));
        fmCurrency($('#treem2tuoi3'),2) ;
    }

    $('#treem2tuoi4').val(Math.round(unformat($('#ks4saonguoilon1').val())*0.3).toFixed(2));
    if(!isNaN((parseFloat(unformat($('#treem2tuoi4').val())))*(parseFloat(unformat($('#treem2tuoi1').val()))))){
        $('#treem2tuoi5').val(Math.round((parseFloat(unformat($('#treem2tuoi4').val())))*(parseFloat(unformat($('#treem2tuoi1').val())))).toFixed(2));
        fmCurrency($('#treem2tuoi5'),2);
    }

    $('#treem12tuoi1').val($('#TreEm12Tuoi1').val());       
    $('#treem12tuoi2').val(Math.round(unformat($('#ks3saonguoilon2').val())* 0.75).toFixed(2));
    $('#treem12tuoi3').val(Math.round(unformat(($('#treem12tuoi1').val()))*($('#treem12tuoi2').val())).toFixed(2));
    fmCurrency($('#treem12tuoi3'),2);

    $('#treem2tuoi7').val($('#TreEm2Tuoi2').val());
    $('#treem2tuoi8').val(Math.round(unformat($('#ks3saonguoilon5').val())* 0.3).toFixed(2));
    if(!isNaN(unformat($('#treem2tuoi7').val())*(unformat($('#treem2tuoi8').val())))){
        $('#treem2tuoi9').val(Math.round((parseFloat(unformat($('#treem2tuoi7').val())))*(parseFloat(unformat($('#treem2tuoi8').val())))).toFixed(2)); 
        fmCurrency($('#treem2tuoi9'),2);
    }
    $('#treem12tuoi7').val($('#TreEm12Tuoi2').val());
    $('#treem12tuoi8').val(Math.round((unformat($('#ks3saonguoilon5').val())* 0.75)).toFixed(2));
    if(!isNaN(unformat($('#treem2tuoi8').val())* unformat($('#treem12tuoi7').val()))){
        $('#treem12tuoi9').val(Math.round((unformat($('#treem12tuoi8').val()))*( unformat($('#treem12tuoi7').val()))).toFixed(2));
        fmCurrency($('#treem12tuoi9'),2);
    }

    $('#treem12tuoi4').val(Math.round(($('#ks4saonguoilon1').val()*0.75)).toFixed(2));
    if(!isNaN((unformat($('#treem12tuoi4').val()))*(unformat($('#treem12tuoi1').val())))){
        $('#treem12tuoi5').val(Math.round(unformat(($('#treem12tuoi4').val()))*(unformat($('#treem12tuoi1').val()))).toFixed(2)); 
        fmCurrency($('#treem12tuoi5'),2);
    }

    $('#treem2tuoi10').val(Math.round(($('#ks4saonguoilon3').val()*0.3)).toFixed(2));
    if(!isNaN((unformat($('#treem2tuoi7').val()))*(unformat($('#treem2tuoi10').val())))){
        $('#treem2tuoi11').val(Math.round(unformat(($('#treem2tuoi7').val()))*(unformat($('#treem2tuoi10').val()))).toFixed(2));
    }

    $('#treem12tuoi10').val(Math.round(($('#ks4saonguoilon3').val()*0.75)).toFixed(2));
    if(!isNaN(unformat($('#treem12tuoi10').val())*unformat($('#treem12tuoi7').val()))){
        $('#treem12tuoi11').val(Math.round(unformat($('#treem12tuoi10').val())*unformat($('#treem12tuoi7').val())).toFixed(2));
        fmCurrency($('#treem12tuoi11'),2);
    }
    // phan ben trai
    $('#ks3saonguoilon2').val($('#giaban5').val());
    $('#ks3saonguoilon1').val(Math.round(parseInt(unformat($('#NguoiLon1').val()))-parseInt(unformat($('#foc_number').val()))).toFixed(2));
    var soluong = parseFloat(unformat($('#ks3saonguoilon1').val()));
    var ks3sao1 = parseFloat(unformat($('#ks3saonguoilon2').val()));
    var ttks3sao1 = soluong * ks3sao1;
    if(!isNaN(ttks3sao1)){
        $('#ks3saonguoilon3').val(Math.round(ttks3sao1).toFixed(2));
        fmCurrency($('#ks3saonguoilon3'),2);
    }
    $('#ks4saonguoilon1').val($('#giaban6').val());
    var ks4sao1 = parseFloat(unformat($('#ks4saonguoilon1').val()));
    var ttks4sao1 = soluong*ks4sao1;
    if(!isNaN(ttks4sao1)){
        $('#ks4saonguoilon2').val(Math.round(ttks4sao1).toFixed(2));
        fmCurrency($('#ks4saonguoilon2'),2);
    }

    // phan ben phai
    $('#ks3saonguoilon4').val(parseFloat(unformat($('#NguoiLon2').val()))-parseFloat(unformat($('#foc_number').val())));
    $('#ks3saonguoilon5').val($('#giaban11').val());
    var soluong1 = parseFloat(unformat($('#ks3saonguoilon4').val()));
    var ks3sao2 = parseFloat( unformat($('#ks3saonguoilon5').val()));
    var ttks3sao2 = soluong1*ks3sao2;
    if(!isNaN(ttks3sao2)){
        $('#ks3saonguoilon6').val(Math.round(ttks3sao2).toFixed(2));
        fmCurrency($('#ks3saonguoilon6'),2);
    }

    $('#ks4saonguoilon3').val($('#giaban12').val());
    var ks4sao2 = parseFloat(unformat($('#ks4saonguoilon3').val()));
    var ttks4sao2 = soluong1*ks4sao2; 
    if(!isNaN(ttks4sao2)){
        $('#ks4saonguoilon4').val(Math.round(ttks4sao2).toFixed(2)) ;
        fmCurrency($('#ks4saonguoilon4'),2);
    }
}
function phuthu(){
    var sl1 = parseFloat(unformat($('#ks3saophuthukhac1').val()));
    var dg1 = parseFloat(unformat($('#ks3saophuthukhac2').val()));
    var tt1 = sl1*dg1;
    if(!isNaN(tt1)){
        $('#ks3saophuthukhac3').val(Math.round(tt1).toFixed(2));
        fmCurrency($('#ks3saophuthukhac3'),2);
    }

    var dg2 = parseFloat(unformat($('#ks4saophuthukhac1').val()));
    var tt2 = sl1*dg2;
    if(!isNaN(tt2)){
        $('#ks4saophuthukhac2').val(Math.round(tt2).toFixed(2)); 
        fmCurrency($('#ks4saophuthukhac2'),2);
    }

    var sl2 = parseFloat(unformat($('#ks3saophuthukhac4').val()));
    var dg3 = parseFloat(unformat($('#ks3saophuthukhac5').val()));
    var tt3 = sl2*dg3;
    if(!isNaN(tt3)){
        $('#ks3saophuthukhac6').val(Math.round(tt3).toFixed(2));
        fmCurrency($('#ks3saophuthukhac6'),2);
    }

    var dg4 = parseFloat(unformat($('#ks4saophuthukhac3').val()));
    var tt4 = sl2*dg4;
    if(!isNaN(tt4)){
        $('#ks4saophuthukhac4').val(Math.round(tt4).toFixed(2));
        fmCurrency($('#ks4saophuthukhac4'),2);
    }

    var sl3 = parseFloat(unformat($('#ks3saophuthukhac_1').val()));
    var dg5 = parseFloat(unformat($('#ks3saophuthukhac_2').val()));
    var tt5 = sl3*dg5;
    if(!isNaN(tt5)){
        $('#ks3saophuthukhac_3').val(Math.round(tt5).toFixed(2));
        fmCurrency($('#ks3saophuthukhac_3'),2);
    }
    var dg6 = parseFloat(unformat($('#ks4saophuthukhac_1').val()));
    var tt6 = sl3*dg6;
    if(!isNaN(tt6)){
        $('#ks4saophuthukhac_2').val(Math.round(tt6).toFixed(2));
        fmCurrency($('#ks4saophuthukhac_2'),2);
    }
    var sl4 = parseFloat(unformat($('#ks3saophuthukhac_4').val()));
    var dg7 = parseFloat(unformat($('#ks3saophuthukhac_5').val()));
    var tt7 = sl4*dg7;
    if(!isNaN(tt7)){
        $('#ks3saophuthukhac_6').val(Math.round(tt7).toFixed(2));
        fmCurrency($('#ks3saophuthukhac_6'),2);
    }
    var dg8 = parseFloat(unformat($('#ks4saophuthukhac_3').val()));
    var tt8 = sl4*dg8;
    if(!isNaN(tt8)){
        $('#ks4saophuthukhac_4').val(Math.round(tt8).toFixed(2));
        fmCurrency($('#ks4saophuthukhac_4'),2);
    }
    var sl5 = parseFloat(unformat($('#ks3saosinglesupp1').val()));
    var dg9 = parseFloat(unformat($('#ks3saosinglesupp2').val()));
    var tt9 = sl5*dg9;
    if(!isNaN(tt9)){
        $('#ks3saosinglesupp3').val(Math.round(tt9).toFixed(2));
        fmCurrency($('#ks3saosinglesupp3'),2);
    }
    var dg10 =parseFloat(unformat($('#ks4saosinglesupp1').val()));
    var tt10 = sl5*dg10;
    if(!isNaN(tt10)){
        $('#ks4saosinglesupp2').val(Math.round(tt10).toFixed(2));
        fmCurrency($('#ks4saosinglesupp2'),2);
    }

    var sl6 = parseFloat(unformat($('#ks3saosinglesupp4').val()));
    var dg11 = parseFloat(unformat($('#ks3saosinglesupp5').val()));
    var tt11 = sl6*dg11;
    if(!isNaN(tt11)){
        $('#ks3saosinglesupp6').val(Math.round(tt11).toFixed(2));
        fmCurrency($('#ks3saosinglesupp6'),2);
    }
    var dg12 =parseFloat(unformat($('#ks4saosinglesupp3').val()));
    var tt12 = sl6*dg12;
    if(!isNaN(tt12)){
        $('#ks4saosinglesupp4').val(Math.round(tt12).toFixed(2));
        fmCurrency($('#ks4saosinglesupp4'),2)
    }  
}
function tongthunguoilon(){
    // tong thu khách sạn 3 sao một
    var a = parseFloat(unformat($('#ks3saonguoilon3').val()));
    var b = parseFloat(unformat($('#ks3saophuthukhac3').val()));
    var c = parseFloat(unformat($('#ks3saophuthukhac_3').val()));
    var d = parseFloat(unformat($('#ks3saosinglesupp3').val()));
    $('#tongthunguoilon1').val((a+b+c+d));
    fmCurrency($('#tongthunguoilon1'),2);

    // tong thu khach san 3 sao hai
    var e = parseFloat(unformat($('#ks3saonguoilon6').val()));
    var f = parseFloat(unformat($('#ks3saophuthukhac6').val()));
    var g = parseFloat(unformat($('#ks3saophuthukhac_6').val()));
    var h = parseFloat(unformat($('#ks3saosinglesupp6').val()));
    $('#tongthunguoilon3').val(Math.round(e+f+g+h).toFixed(2));
    fmCurrency($('#tongthunguoilon3'),2);

    // tong thu khach san 4 sao mot
    var i = parseFloat(unformat($('#ks4saonguoilon2').val()));
    var k = parseFloat(unformat($('#ks4saophuthukhac2').val()));
    var l = parseFloat(unformat($('#ks4saophuthukhac_2').val()));
    var m = parseFloat(unformat($('#ks4saosinglesupp2').val()));
    $('#tongthunguoilon2').val(Math.round(i+k+l+m).toFixed(2));
    fmCurrency($('#tongthunguoilon2'),2);

    // tong thu khach san 4 sao hai 
    var n = parseFloat(unformat($('#ks4saonguoilon4').val()));
    var p = parseFloat(unformat($('#ks4saophuthukhac4').val()));
    var q = parseFloat(unformat($('#ks4saophuthukhac_4').val()));
    var t = parseFloat(unformat($('#ks4saosinglesupp4').val()));
    $('#tongthunguoilon4').val(Math.round(n+p+q+t).toFixed(2));
    fmCurrency($('#tongthunguoilon4'),2);
}

function tongthutreem(){
    // tong thu tre em mot
    var a = parseFloat(unformat($('#treem2tuoi3').val()));
    var b = parseFloat(unformat($('#treem12tuoi3').val()));
    $('#tongthute1').val(Math.round(a+b).toFixed(2));
    fmCurrency($('#tongthute1'),2);

    var c = parseFloat(unformat($('#treem2tuoi5').val()));
    var d = parseFloat(unformat($('#treem12tuoi5').val()));
    $('#tongthute2').val(Math.round(c+d).toFixed(2));
    fmCurrency($('#tongthute2'),2);

    var e = parseFloat(unformat($('#treem2tuoi9').val()));
    var f = parseFloat(unformat($('#treem12tuoi9').val()));
    $('#tongthute3').val((e+f).toString());
    fmCurrency($('#tongthute3'),2);

    var g = parseFloat(unformat($('#treem2tuoi11').val()));
    var h = parseFloat(unformat($('#treem12tuoi11').val()));
    $('#tongthute4').val(Math.round(g+h).toFixed(2));
    fmCurrency($('#tongthute4'),2);

}


function getvaluevanchuyen(){
    // phan ben trai
    $('#vmbnguoilon1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCVMB1').val())- parseFloat($('#focvmbnguoilon').val()) );
    $('#taxtamtinh1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())- parseFloat($('#foctaxtamtinh').val()));
    $('#vmbnguoilonnd1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCVMBNoiDia1').val
    ())- parseFloat($('#focvmbndnguoilon').val()));
    $('#vmbtreem2tuoi1').val(parseInt($('#TreEm2Tuoi1').val()));
    $('#vmbtreem2tuoind1').val(parseInt($('#TreEm2Tuoi1').val()));
    $('#vmbtreem12tuoi1').val(parseInt($('#TreEm12Tuoi1').val()));
    $('#vmbtreem12tuoind1').val(parseFloat($('#TreEm12Tuoi1').val())-parseFloat($('#focvmbndte12tuoi').val()));
    $('#taxtreem1').val(parseFloat($('TreEm2Tuoi1').val())+parseFloat($('#TreEm12Tuoi1').val())-parseFloat($('#foctaxte').val()) );
    $('#landfee1_3_1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val())- parseFloat($('#foclandfee1_3sao').val()));
    $('#landfee_2_3_1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val())- parseFloat($('#foclandfee2_3sao').val()));
    $('#landfee_1_4_1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val())- parseFloat($('#foclandfee1_4sao').val()));
    $('#landfee_2_4_1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val())- parseFloat($('#foclandfee2_4sao').val()));
    $('#upgrade_meal1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val())- parseFloat($('#focupgrademeal').val()));
    $('#optional_tour1').val(parseFloat($('#txtTourLeader1').val())+parseFloat($('#NguoiLon1').val())-parseFloat($('#txtFOCLand1').val())- parseFloat($('#focoptionaltour').val()));
    $('#single_supp_1').val(parseFloat($('#single1').val())- parseFloat($('#focsinglesupp').val()));

    //$('.visa_value').val(parseInt($('#txtTourLeader1').val())+parseInt($('#NguoiLon1').val()));

    $('#visathonghanh1').val(parseInt($('#txtTourLeader1').val())+parseInt($('#NguoiLon1').val())- parseFloat($('#focvisa').val()));
    $('#visadichthuat1').val(parseInt($('#txtTourLeader1').val())+parseInt($('#NguoiLon1').val())- parseFloat($('#focdichthuatcongchung').val()));
    $('#phichuyenphathoso1').val(parseInt($('#txtTourLeader1').val())+parseInt($('#NguoiLon1').val())- parseFloat($('#focchuyenphat').val()));
    $('#phithumoi1').val(parseInt($('#txtTourLeader1').val())+parseInt($('#NguoiLon1').val())- parseFloat($('#focchiphimoi').val()));

    $('#baohiem1').val(parseInt($('#txtTourLeader1').val())+parseInt($('#NguoiLon1').val())- parseFloat($('#focbaohiem').val()));
    $('#baohiemtreem2tuoi1').val(parseInt($('#TreEm2Tuoi2').val())- parseFloat($('#focbaohiemteduoi2tuoi').val()));
    $('#baohiemtreem12tuoi1').val(parseInt($('#TreEm12Tuoi2').val())- parseFloat($('#focbaohiemte12tuoi').val()));


    $('#visatreem2tuoi1').val(parseInt($('#TreEm2Tuoi1').val())- parseFloat($('#focphivisate2tuoi').val()));
    $('#visatreem12tuoi1').val(parseInt($('#TreEm12Tuoi1').val())- parseFloat($('#focchiphivisate12tuoi').val()));
    $('#tour_leader1').val(parseInt($('#txtTourLeader1').val())- parseInt($('#foctourleader').val()));
    $('#chiphikhac1').val(parseInt($('#txtTourLeader1').val())-parseFloat($('#focchiphikhac').val()));
    //$('.treem2').val(parseInt($('#TreEm2Tuoi1').val()));
    //$('.treem12').val(parseInt($('#TreEm12Tuoi1').val()));
    //$('.quatang').val($('#NguoiLon1').val());
    $('#taxtreem1').val(parseInt($('#TreEm2Tuoi1').val())+parseFloat($('#TreEm12Tuoi1').val())-parseFloat($('#foctaxte').val()));

    //$('#visatip1, #cpk1, #chenhlechtygia1, #quatang1').val($('#NguoiLon1').val());  

    $('#visatip1').val($('#NguoiLon1').val()- parseFloat($('#foctip').val()));
    $('#quatang1').val(parseFloat($('#NguoiLon1').val())-parseFloat($('#focquatang').val()));
    $('#cpk1').val(parseFloat($('#NguoiLon1').val())-parseFloat($('#foccpk').val()));
    $('#chenhlechtygia1').val(parseFloat($('#NguoiLon1').val())-parseFloat($('#focchenhlechtygia').val()));

    $('#land2_1').val(parseFloat($('#NguoiLon1').val())+ parseFloat($('#land_treem').val()) -parseFloat($('#focland2').val()));  

    $('#landfeetreem_2_3sao1').val(parseFloat($('#TreEm2Tuoi1').val())- parseFloat($('#foclandfeete3saoteduoi2tuoi').val()));

    $('#landfee4sao_treem2tuoi1').val(parseFloat($('#TreEm2Tuoi1').val())- parseFloat($('#foclandfee4saoteduoi2tuoi').val()));

    $('#landfeetreem12_3sao1').val(parseFloat($('#TreEm12Tuoi1').val())- parseFloat($('#foclandfeete3saote12tuoi').val()));

    $('#landfee4sao_treem12tuoi1').val(parseFloat($('#TreEm12Tuoi1').val())- parseFloat($('#foclandfee4saote12tuoi').val()));
    // get value bên phái
    // phan van chuyen
    $('#vmbnguoilon5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCVMB2').val())- parseFloat($('#focvmbnguoilon').val()));
    $('#taxtamtinh5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val()) - parseFloat($('#foctaxtamtinh').val()));
    $('#vmbnguoilonnd5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCVMBNoiDia1').val())- parseFloat($('#focvmbndnguoilon').val()));
    $('#vmbtreem2tuoi5').val(parseFloat($('#TreEm2Tuoi2').val()));
    $('#vmbtreem2tuoind5').val(parseFloat($('#TreEm2Tuoi2').val()));
    $('#vmbtreem12tuoi5').val(parseFloat($('#TreEm12Tuoi2').val()));
    $('#vmbtreem12tuoind5').val(parseFloat($('#TreEm12Tuoi2').val()));
    $('#taxtreem5').val(parseFloat($('#TreEm2Tuoi2').val())+parseFloat($('#TreEm12Tuoi2').val()));
    $('#chiphikhac5').val(parseFloat($('#txtTourLeader2').val()));


    // phan landfee
    $('#landfee1_3_5').val(parseFloat($('#NguoiLon2').val()) + parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val())- parseFloat($('#foclandfee1_3sao').val()));

    $('#landfee_2_3_5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val())- parseFloat($('#foclandfee2_3sao').val()));

    $('#landfee_1_4_5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val())- parseFloat($('#foclandfee1_4sao').val()));

    $('#landfee_2_4_5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val())- parseFloat($('#foclandfee2_4sao').val()));

    $('#upgrade_meal5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val())- parseFloat($('#focupgrademeal').val()));

    $('#optional_tour5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())-parseFloat($('#txtFOCLand2').val())- parseFloat($('#focoptionaltour').val()));

    $('#single_supp_5').val(parseFloat($('#single2').val())- parseFloat($('#focsinglesupp').val()));

    $('#landfeetreem_2_3sao5').val(parseFloat($('#TreEm2Tuoi2').val())-parseFloat($('#foclandfeete3saoteduoi2tuoi').val()));

    $('#landfee4sao_treem2tuoi5').val(parseFloat($('#TreEm2Tuoi2').val())- parseFloat($('#foclandfee4saoteduoi2tuoi').val()));

    $('#landfeetreem12_3sao5').val(parseFloat($('#TreEm12Tuoi2').val())- parseFloat($('#foclandfeete3saote12tuoi').val()));

    $('#landfee4sao_treem12tuoi5').val(parseFloat($('#TreEm12Tuoi2').val())- parseFloat($('#foclandfee4saote12tuoi').val()));

    //$('.visa_value1').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val()));
    $('#visathonghanh5').val(parseFloat($('#NguoiLon2').val())+parseFloat($('#txtTourLeader2').val())- parseFloat($('#focvisa').val()));
    $('#visadichthuat5').val(parseInt($('#txtTourLeader2').val())+parseInt($('#NguoiLon2').val())- parseFloat($('#focdichthuatcongchung').val()));
    $('#phichuyenphathoso5').val(parseInt($('#txtTourLeader2').val())+parseInt($('#NguoiLon2').val())- parseFloat($('#focchuyenphat').val()));
    $('#phithumoi5').val(parseInt($('#txtTourLeader2').val())+parseInt($('#NguoiLon2').val())- parseFloat($('#focchiphimoi').val()));
    $('#baohiem5').val(parseInt($('#txtTourLeader2').val())+parseInt($('#NguoiLon2').val())- parseFloat($('#focbaohiem').val()));

    $('#visatreem2tuoi5').val(parseFloat($('#TreEm2Tuoi2').val())- parseFloat($('#focphivisate2tuoi').val()));

    $('#visatreem12tuoi5').val(parseFloat($('#TreEm12Tuoi2').val())- parseFloat($('#focchiphivisate12tuoi').val()));

    $('#baohiemtreem2tuoi5').val(parseFloat($('#TreEm2Tuoi2').val())- parseFloat($('#focbaohiemteduoi2tuoi').val()));

    $('#baohiemtreem12tuoi5').val(parseFloat($('#TreEm12Tuoi2').val())-parseFloat($('#focbaohiemte12tuoi').val()));
    $('#visatip5').val(parseFloat($('#NguoiLon2').val())- parseFloat($('#foctip').val()));
    $('#quatang5').val(parseFloat($('#NguoiLon2').val())-parseFloat($('#focquatang').val()));
    $('#cpk5').val(parseFloat($('#NguoiLon2').val())-parseFloat($('#foccpk').val()));
    $('#chenhlechtygia5').val(parseFloat($('#NguoiLon2').val())-parseFloat($('#focchenhlechtygia').val()));
    $('#land2_5').val(parseFloat($('#NguoiLon2').val())+ parseFloat($('#land_treem').val())- parseFloat($('#focland2').val()));   

    $('#tour_leader5').val(parseFloat($('#txtTourLeader2').val())- parseFloat($('#foctourleader').val()));


    // tính số ngày của thực hiện tour
    var start = $('#ngaykhoihanh').val();
    var end = $('#ngayketthuc').val();
    if(start != '' && end != ''){
        startarr = start.split('/');
        endarr = end.split('/');
        var start_date = new Date(startarr[2],startarr[1]-1,startarr[0]);
        var end_date = new Date(endarr[2],endarr[1]-1,endarr[0]);
        var no_date = end_date - start_date;
        no_date = (no_date/1000/60/60/24)+1;
        $('#tour_leader2').val(no_date);
        $('#tour_leader6').val(no_date);
        $('#visatip2').val(no_date);
        $('#visatip6').val(no_date);
    }


    // lay chi phi cua tre em trong van chuyen
    // bên trái
    $('#vmbtreem2tuoi3').val(Math.round(unformat($('#vmbnguoilon3').val())*(parseFloat(unformat($('#focvmbteduoi2tuoi').val()))/100)).toFixed(2));
    fmCurrency($('#vmbtreem2tuoi3'),2);
    $('#vmbtreem12tuoi3').val(Math.round(unformat($('#vmbnguoilon3').val())*(parseFloat(unformat($('#focvmbte12tuoi').val()))/100)).toFixed(2));
    fmCurrency($('#vmbtreem12tuoi3'),2);
    $('#taxtreem3').val(unformat($('#taxtamtinh3').val()));
    $('#vmbtreem12tuoind3').val(unformat($('#vmbnguoilonnd3').val()));
    $('#vmbtreem2tuoind3').val(parseFloat(unformat($('#vmbnguoilonnd3').val())));

    // bên phải
    $('#vmbtreem2tuoi7').val(Math.round(unformat($('#vmbnguoilon7').val())*(parseFloat(unformat($('#focvmbteduoi2tuoi').val()))/100)).toFixed(2));
    fmCurrency($('#vmbtreem2tuoi7'),2);
    $('#vmbtreem12tuoi7').val(Math.round(unformat($('#vmbnguoilon7').val())*(parseFloat(unformat($('#focvmbte12tuoi').val()))/100)).toFixed(2));
    fmCurrency($('#vmbtreem12tuoi7'),2);
    $('#taxtreem7').val($('#taxtamtinh7').val());
    $('#vmbtreem12tuoind7').val($('#vmbnguoilonnd7').val());
    $('#vmbtreem2tuoind7').val(parseFloat($('#vmbnguoilonnd7').val()));

    //lấy chi phí của trẻ em phần landfee 
    // bên trái
    $('#landfeetreem_2_3sao3').val(Math.round(parseFloat(unformat($('#landfee1_3_3').val())*0.7)).toFixed(2));  
    fmCurrency($('#landfeetreem_2_3sao3'),2);
    $('#landfeetreem12_3sao3').val(Math.round(parseFloat(unformat($('#landfee_2_3_3').val())*0.7)).toFixed(2));
    fmCurrency($('#landfeetreem12_3sao3'),2);
    $('#landfee4sao_treem2tuoi3').val(Math.round(parseFloat(unformat($('#landfee_1_4_3').val()))*0.7).toFixed(2));
    fmCurrency($('#landfee4sao_treem2tuoi3'),2);
    $('#landfee4sao_treem12tuoi3').val(Math.round(parseFloat(unformat($('#landfee_2_4_3').val()))*0.7).toFixed(2));
    fmCurrency($('#landfee4sao_treem12tuoi3'),2);

    // bên phải
    $('#landfeetreem_2_3sao7').val(Math.round(parseFloat(unformat($('#landfee1_3_7').val())*0.7)).toFixed(2));
    fmCurrency($('#landfeetreem_2_3sao7'),2);
    $('#landfeetreem12_3sao7').val(Math.round(parseFloat(unformat($('#landfee_2_3_7').val())*0.7)).toFixed(2));
    fmCurrency($('#landfeetreem12_3sao7'),2);
    $('#landfee4sao_treem2tuoi7').val(Math.round(parseFloat(unformat($('#landfee_1_4_7').val())*0.7)).toFixed(2));
    fmCurrency($('#landfee4sao_treem2tuoi7'),2);
    $('#landfee4sao_treem12tuoi7').val(Math.round(parseFloat(unformat($('#landfee_2_4_7').val())*0.7)).toFixed(2));
    fmCurrency($('#landfee4sao_treem12tuoi7'),2);

    // lấy số bữa ăn
    $('#upgrade_meal2').val($('#txtSoBuaAn1').val());
    $('#upgrade_meal6').val($('#txtSoBuaAn2').val());
}
// tinh toan phan chi
function calculator(){
    // tinh toan chi phi van chuyen
    // chi ve may bay nguoi lon
    if(!isNaN(parseFloat(unformat($('#vmbnguoilon1').val()))*parseFloat(unformat($('#vmbnguoilon3').val())))){
        $('#vmbnguoilon4').val(Math.round(parseFloat(unformat($('#vmbnguoilon1').val()))*parseFloat(unformat($('#vmbnguoilon3').val()))).toFixed(2));
        fmCurrency($('#vmbnguoilon4'));
    }
    if(!isNaN(parseFloat(unformat($('#vmbnguoilon5').val()))*parseFloat(unformat($('#vmbnguoilon7').val())))){
        $('#vmbnguoilon8').val(Math.round(parseFloat(unformat($('#vmbnguoilon5').val()))*parseFloat(unformat($('#vmbnguoilon7').val()))).toFixed(2));
        fmCurrency($('#vmbnguoilon8'),2);
    }
    // chi tax tam tinh
    if(!isNaN(parseFloat(unformat($('#taxtamtinh1').val()))*parseFloat(unformat($('#taxtamtinh3').val())))){
        $('#taxtamtinh4').val(Math.round(parseFloat(unformat($('#taxtamtinh3').val()))*parseFloat(unformat($('#taxtamtinh1').val()))).toFixed(2));
        fmCurrency($('#taxtamtinh4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#taxtamtinh5').val()))*parseFloat(unformat($('#taxtamtinh7').val())))){
        $('#taxtamtinh8').val(Math.round(parseFloat(unformat($('#taxtamtinh5').val()))*parseFloat(unformat($('#taxtamtinh7').val()))).toFixed(2));
        fmCurrency($('#taxtamtinh8'),2);
    }
    // chi ve may bay nguoi lon noi dia
    if(!isNaN(parseFloat(unformat($('#vmbnguoilonnd1').val()))*parseFloat(unformat($('#vmbnguoilonnd3').val())))){
        $('#vmbnguoilonnd4').val(Math.round(parseFloat(unformat($('#vmbnguoilonnd1').val()))*parseFloat(unformat($('#vmbnguoilonnd3').val()))).toFixed(2));
        fmCurrency($('#vmbnguoilonnd4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#vmbnguoilonnd5').val()))*parseFloat(unformat($('#vmbnguoilonnd7').val())))){
        $('#vmbnguoilonnd8').val(Math.round(parseFloat(unformat($('#vmbnguoilonnd5').val()))*parseFloat(unformat($('#vmbnguoilonnd7').val()))).toFixed(2));
        fmCurrency($('#vmbnguoilonnd8'),2);
    } 
    // chi xe don tien tai san bay
    if(!isNaN(parseFloat(unformat($('#xedontien1').val()))*parseFloat(unformat($('#xedontien3').val())))){
        $('#xedontien4').val(Math.round(parseFloat(unformat($('#xedontien1').val()))*parseFloat(unformat($('#xedontien3').val()))).toFixed(2));
        fmCurrency($('#xedontien4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#xedontien5').val()))*parseFloat(unformat($('#xedontien7').val())))){
        $('#xedontien8').val(Math.round(parseFloat(unformat($('#xedontien5').val()))*parseFloat(unformat($('#xedontien7').val()))).toFixed(2));
        fmCurrency($('#xedontien8'),2);
    }

    // chi vé máy bay trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat(unformat($('#vmbtreem2tuoi1').val()))*parseFloat(unformat($('#vmbtreem2tuoi3').val())))){
        $('#vmbtreem2tuoi4').val(Math.round(parseFloat(unformat($('#vmbtreem2tuoi1').val()))*parseFloat(unformat($('#vmbtreem2tuoi3').val()))).toFixed(2));
        fmCurrency($('#vmbtreem2tuoi4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#vmbtreem2tuoi5').val()))*parseFloat(unformat($('#vmbtreem2tuoi7').val())))){
        $('#vmbtreem2tuoi8').val(Math.round(parseFloat(unformat($('#vmbtreem2tuoi5').val()))*parseFloat(unformat($('#vmbtreem2tuoi7').val()))).toFixed(2));
        fmCurrency($('#vmbtreem2tuoi8'),2);
    }
    // chi vé máy bay trẻ em dưới 2 tuổi nội địa
    if(!isNaN(parseFloat(unformat($('#vmbtreem2tuoind1').val()))*parseFloat(unformat($('#vmbtreem2tuoind3').val())))){
        $('#vmbtreem2tuoind4').val(Math.round(parseFloat(unformat($('#vmbtreem2tuoind1').val()))*parseFloat(unformat($('#vmbtreem2tuoind3').val()))).toFixed(2));
        fmCurrency($('#vmbtreem2tuoind4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#vmbtreem2tuoind5').val()))*parseFloat(unformat($('#vmbtreem2tuoind7').val())))){
        $('#vmbtreem2tuoind8').val(Math.round(parseFloat(unformat($('#vmbtreem2tuoind5').val()))*parseFloat(unformat($('#vmbtreem2tuoind7').val()))).toFixed(2));
        fmCurrency($('#vmbtreem2tuoind8'),2);
    }

    // vé máy bay trẻ em từ 2 - 12 tuổi
    if(!isNaN(parseFloat(unformat($('#vmbtreem12tuoi1').val()))*parseFloat(unformat($('#vmbtreem12tuoi3').val())))){
        $('#vmbtreem12tuoi4').val(Math.round(parseFloat(unformat($('#vmbtreem12tuoi1').val()))*parseFloat(unformat($('#vmbtreem12tuoi3').val()))).toFixed(2));
        fmCurrency($('#vmbtreem12tuoi4'));
    }
    if(!isNaN(parseFloat(unformat($('#vmbtreem12tuoi5').val()))*parseFloat(unformat($('#vmbtreem12tuoi7').val())))){
        $('#vmbtreem12tuoi8').val(Math.round(parseFloat(unformat($('#vmbtreem12tuoi5').val()))*parseFloat(unformat($('#vmbtreem12tuoi7').val()))).toFixed(2));
        fmCurrency($('#vmbtreem12tuoi8'),2);
    }
    // chi vé máy bay trẻ em từ 1- 12 tuổi nội địa
    if(!isNaN(parseFloat(unformat($('#vmbtreem12tuoind1').val()))*parseFloat(unformat($('#vmbtreem12tuoind3').val())))){
        $('#vmbtreem12tuoind4').val(Math.round(parseFloat(unformat($('#vmbtreem12tuoind1').val()))*parseFloat(unformat($('#vmbtreem12tuoind3').val()))).toFixed(2));
        fmCurrency($('#vmbtreem12tuoind4'),2);
    }

    if(!isNaN(parseFloat(unformat($('#vmbtreem12tuoind5').val()))*parseFloat(unformat($('#vmbtreem12tuoind7').val())))){
        $('#vmbtreem12tuoind8').val(Math.round(parseFloat(unformat($('#vmbtreem12tuoind5').val()))*parseFloat(unformat($('#vmbtreem12tuoind7').val()))).toFixed(2));
        fmCurrency($('#vmbtreem12tuoind8'),2);
    }

    // tax chi
    if(!isNaN(parseFloat(unformat($('#taxtreem1').val()))*parseFloat(unformat($('#taxtreem3').val())))){
        $('#taxtreem4').val(Math.round(parseFloat(unformat($('#taxtreem1').val()))*parseFloat(unformat($('#taxtreem3').val()))).toFixed(2));
        fmCurrency($('#taxtreem4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#taxtreem5').val()))*parseFloat(unformat($('#taxtreem7').val())))){
        $('#taxtreem8').val(Math.round(parseFloat(unformat($('#taxtreem5').val()))*parseFloat(unformat($('#taxtreem7').val()))).toFixed(2));
        fmCurrency($('#taxtreem8'),2);
    }

    // phần landfee
    // landfee 1:3 sao 
    if(!isNaN(parseFloat(unformat($('#landfee1_3_1').val()))*parseFloat(unformat($('#landfee1_3_3').val())))){
        $('#landfee1_3_4').val(Math.round(parseFloat(unformat($('#landfee1_3_1').val()))*parseFloat(unformat($('#landfee1_3_3').val()))).toFixed(2));
        fmCurrency($('#landfee1_3_4'),2);
    }

    if(!isNaN(parseFloat(unformat($('#landfee1_3_5').val()))*parseFloat(unformat($('#landfee1_3_7').val())))){
        $('#landfee1_3_8').val(Math.round(parseFloat(unformat($('#landfee1_3_5').val()))*parseFloat(unformat($('#landfee1_3_7').val()))).toFixed(2));
        fmCurrency( $('#landfee1_3_8'),2);

    }

    // landfee 2:3 sao 
    if(!isNaN(parseFloat(unformat($('#landfee_2_3_1').val()))*parseFloat(unformat($('#landfee_2_3_3').val())))){
        $('#landfee_2_3_4').val(Math.round(parseFloat(unformat($('#landfee_2_3_1').val()))*parseFloat(unformat($('#landfee_2_3_3').val()))).toFixed(2));
        fmCurrency($('#landfee_2_3_4'),2);
    }

    if(!isNaN(parseFloat(unformat($('#landfee_2_3_5').val()))*parseFloat(unformat($('#landfee_2_3_7').val())))){
        $('#landfee_2_3_8').val(Math.round(parseFloat(unformat($('#landfee_2_3_5').val()))*parseFloat(unformat($('#landfee_2_3_7').val()))).toFixed(2));
        fmCurrency($('#landfee_2_3_8'),2);
    }
    // landfee 1:4 sao
    if(!isNaN(parseFloat(unformat($('#landfee_1_4_1').val()))*parseFloat(unformat($('#landfee_1_4_3').val())))){
        $('#landfee_1_4_4').val(Math.round(parseFloat(unformat($('#landfee_1_4_1').val()))*parseFloat(unformat($('#landfee_1_4_3').val()))).toFixed(2));
        fmCurrency($('#landfee_1_4_4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#landfee_1_4_5').val()))*parseFloat(unformat($('#landfee_1_4_7').val())))){
        $('#landfee_1_4_8').val(Math.round(parseFloat(unformat($('#landfee_1_4_5').val()))*parseFloat(unformat($('#landfee_1_4_7').val()))).toFixed(2));
        fmCurrency($('#landfee_1_4_8'),2);
    }

    // landfee 2:4 sao 
    if(!isNaN(parseFloat(unformat($('#landfee_2_4_1').val()))*parseFloat(unformat($('#landfee_2_4_3').val())))){
        $('#landfee_2_4_4').val(Math.round(parseFloat(unformat($('#landfee_2_4_1').val()))*parseFloat(unformat($('#landfee_2_4_3').val()))).toFixed(2));
        fmCurrency($('#landfee_2_4_4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#landfee_2_4_5').val()))*parseFloat(unformat($('#landfee_2_4_7').val())))){
        $('#landfee_2_4_8').val(Math.round(parseFloat(unformat($('#landfee_2_4_5').val()))*parseFloat(unformat($('#landfee_2_4_7').val()))).toFixed(2));
        fmCurrency($('#landfee_2_4_8'),2);
    }

    // upgrade meal 
    if(!isNaN(parseFloat(unformat($('#upgrade_meal1').val()))*parseFloat(unformat($('#upgrade_meal3').val()))*parseFloat(unformat($('#upgrade_meal2').val())))){
        $('#upgrade_meal4').val(Math.round(parseFloat(unformat($('#upgrade_meal1').val()))*parseFloat(unformat($('#upgrade_meal3').val()))*parseFloat(unformat($('#upgrade_meal2').val()))).toFixed(2));
        fmCurrency($('#upgrade_meal4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#upgrade_meal5').val()))*parseFloat(unformat($('#upgrade_meal7').val()))* parseFloat(unformat($('#upgrade_meal6').val())))){
        $('#upgrade_meal8').val(Math.round(parseFloat(unformat($('#upgrade_meal5').val()))*parseFloat(unformat($('#upgrade_meal6').val()))*parseFloat(unformat($('#upgrade_meal7').val()))).toFixed(2));
        fmCurrency($('#upgrade_meal8'),2);
    }
    // option tour
    if(!isNaN(parseFloat(unformat($('#optional_tour1').val()))*parseFloat(unformat($('#optional_tour3').val())))){
        $('#optional_tour4').val(Math.round(parseFloat(unformat($('#optional_tour1').val()))*parseFloat(unformat($('#optional_tour3').val()))).toFixed(2));
        fmCurrency($('#optional_tour4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#optional_tour5').val()))*parseFloat(unformat($('#optional_tour7').val())))){
        $('#optional_tour8').val(Math.round(parseFloat(unformat($('#optional_tour5').val()))*parseFloat(unformat($('#optional_tour7').val()))).toFixed(2));
        fmCurrency($('#optional_tour8'));
    }

    // single supp
    if(!isNaN(parseFloat(unformat($('#single_supp_1').val()))*parseFloat(unformat($('#single_supp_3').val())))){
        $('#single_supp_4').val(Math.round(parseFloat(unformat($('#single_supp_1').val()))*parseFloat(unformat($('#single_supp_3').val()))).toFixed(2));
        fmCurrency($('#single_supp_4'),2);
    }

    if(!isNaN(parseFloat(unformat($('#single_supp_5').val()))*parseFloat(unformat($('#single_supp_7').val())))){
        $('#single_supp_8').val(Math.round(parseFloat(unformat($('#single_supp_5').val()))*parseFloat(unformat($('#single_supp_7').val()))).toFixed(2));
        fmCurrency($('#single_supp_8'),2);
    }

    // Landfee tre em (3 sao) - trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat(unformat($('#landfeetreem_2_3sao1').val()))*parseFloat(unformat($('#landfeetreem_2_3sao3').val())))){
        $('#landfeetreem_2_3sao4').val(Math.round(parseFloat(unformat($('#landfeetreem_2_3sao1').val()))*parseFloat(unformat($('#landfeetreem_2_3sao3').val()))).toFixed(2));
        fmCurrency($('#landfeetreem_2_3sao4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#landfeetreem_2_3sao5').val()))*parseFloat(unformat($('#landfeetreem_2_3sao7').val())))){
        $('#landfeetreem_2_3sao8').val(Math.round(parseFloat(unformat($('#landfeetreem_2_3sao5').val()))*parseFloat(unformat($('#landfeetreem_2_3sao7').val()))).toFixed(2));
        fmCurrency($('#landfeetreem_2_3sao8'),2);
    }

    // Landfee trẻ em (3 sao) - trẻ em từ 2-12 tuổi    
    if(!isNaN(parseFloat(unformat($('#landfeetreem12_3sao1').val()))*parseFloat(unformat($('#landfeetreem12_3sao3').val())))){
        $('#landfeetreem12_3sao4').val(Math.round(parseFloat(unformat($('#landfeetreem12_3sao1').val()))*parseFloat(unformat($('#landfeetreem12_3sao3').val()))).toFixed(2));
        fmCurrency($('#landfeetreem12_3sao4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#landfeetreem12_3sao5').val()))*parseFloat(unformat($('#landfeetreem12_3sao7').val())))){
        $('#landfeetreem12_3sao8').val(Math.round(parseFloat(unformat($('#landfeetreem12_3sao5').val()))*parseFloat(unformat($('#landfeetreem12_3sao7').val()))).toFixed(2));
        fmCurrency($('#landfeetreem12_3sao8'),2);
    }

    // Landfee trẻ em (4 sao) - trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat(unformat($('#landfee4sao_treem2tuoi1').val()))*parseFloat(unformat($('#landfee4sao_treem2tuoi3').val())))){
        $('#landfee4sao_treem2tuoi4').val(Math.round(parseFloat(unformat($('#landfee4sao_treem2tuoi1').val()))*parseFloat(unformat($('#landfee4sao_treem2tuoi3').val()))).toFixed(2));
        fmCurrency($('#landfee4sao_treem2tuoi4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#landfee4sao_treem2tuoi5').val()))*parseFloat(unformat($('#landfee4sao_treem2tuoi7').val())))){
        $('#landfee4sao_treem2tuoi8').val(Math.round(parseFloat(unformat($('#landfee4sao_treem2tuoi5').val()))*parseFloat(unformat($('#landfee4sao_treem2tuoi7').val()))).toFixed(2));
        fmCurrency($('#landfee4sao_treem2tuoi8'),2);
    }

    // Landfee trẻ em (4 sao) - trẻ em từ 2-12 tuổi 
    if(!isNaN(parseFloat(unformat($('#landfee4sao_treem12tuoi1').val()))*parseFloat(unformat($('#landfee4sao_treem12tuoi3').val())))){
        $('#landfee4sao_treem12tuoi4').val(Math.round(parseFloat(unformat($('#landfee4sao_treem12tuoi1').val()))*parseFloat(unformat($('#landfee4sao_treem12tuoi3').val()))).toFixed(2));
        fmCurrency($('#landfee4sao_treem12tuoi4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#landfee4sao_treem12tuoi5').val()))*parseFloat(unformat($('#landfee4sao_treem12tuoi7').val())))){
        $('#landfee4sao_treem12tuoi8').val(Math.round(parseFloat(unformat($('#landfee4sao_treem12tuoi5').val()))*parseFloat(unformat($('#landfee4sao_treem12tuoi7').val()))).toFixed(2));
        fmCurrency($('#landfee4sao_treem12tuoi8'),2);
    }

    // chi visa 
    // visa thông hành
    if(!isNaN(parseFloat(unformat($('#visathonghanh1').val()))*parseFloat(unformat($('#visathonghanh3').val())))){
        $('#visathonghanh4').val(Math.round(parseFloat(unformat($('#visathonghanh1').val()))*parseFloat(unformat($('#visathonghanh3').val()))).toFixed(2));
        fmCurrency($('#visathonghanh4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#visathonghanh5').val()))*parseFloat(unformat($('#visathonghanh7').val())))){
        $('#visathonghanh8').val(Math.round(parseFloat(unformat($('#visathonghanh5').val()))*parseFloat(unformat($('#visathonghanh7').val()))).toFixed(2));
        fmCurrency($('#visathonghanh8'),2);
    }
    // dich thuat cong chung 
    if(!isNaN(parseFloat(unformat($('#visadichthuat1').val()))*parseFloat(unformat($('#visadichthuat3').val())))){
        $('#visadichthuat4').val(Math.round(parseFloat(unformat($('#visadichthuat1').val()))*parseFloat(unformat($('#visadichthuat3').val()))).toFixed(2));
        fmCurrency($('#visadichthuat4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#visadichthuat5').val()))*parseFloat(unformat($('#visadichthuat7').val())))){
        $('#visadichthuat8').val(Math.round(parseFloat(unformat($('#visadichthuat5').val()))*parseFloat(unformat($('#visadichthuat7').val()))).toFixed(2));
        fmCurrency( $('#visadichthuat8'),2);
    }

    // Visa Phí chuyển phát hồ sơ

    if(!isNaN(parseFloat(unformat($('#phichuyenphathoso1').val()))*parseFloat(unformat($('#phichuyenphathoso3').val())))){
        $('#phichuyenphathoso4').val(Math.round(parseFloat(unformat($('#phichuyenphathoso1').val()))*parseFloat(unformat($('#phichuyenphathoso3').val()))).toFixed(2));
        fmCurrency($('#phichuyenphathoso4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#phichuyenphathoso5').val()))*parseFloat(unformat($('#phichuyenphathoso7').val())))){
        $('#phichuyenphathoso8').val(Math.round(parseFloat(unformat($('#phichuyenphathoso5').val()))*parseFloat(unformat($('#phichuyenphathoso7').val()))).toFixed(2));
        fmCurrency($('#phichuyenphathoso8'),2);
    }
    // visa Phí thu mới
    if(!isNaN(parseFloat(unformat($('#phithumoi1').val()))*parseFloat(unformat($('#phithumoi3').val())))){
        $('#phithumoi4').val(Math.round(parseFloat(unformat($('#phithumoi1').val()))*parseFloat(unformat($('#phithumoi3').val()))).toFixed(2));
        fmCurrency($('#phithumoi4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#phithumoi5').val()))*parseFloat(unformat($('#phithumoi7').val())))){
        $('#phithumoi8').val(Math.round(parseFloat(unformat($('#phithumoi5').val()))*parseFloat(unformat($('#phithumoi7').val()))).toFixed(2));
        fmCurrency($('#phithumoi8'),2);
    }

    // Phí Visa trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat(unformat($('#visatreem2tuoi1').val()))*parseFloat(unformat($('#visatreem2tuoi3').val())))){
        $('#visatreem2tuoi4').val(Math.round(parseFloat(unformat($('#visatreem2tuoi1').val()))*parseFloat(unformat($('#visatreem2tuoi3').val()))).toFixed(2));
        fmCurrency($('#visatreem2tuoi4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#visatreem2tuoi5').val()))*parseFloat(unformat($('#visatreem2tuoi7').val())))){
        $('#visatreem2tuoi8').val(Math.round(parseFloat(unformat($('#visatreem2tuoi5').val()))*parseFloat(unformat($('#visatreem2tuoi7').val()))).toFixed(2));
        fmCurrency($('#visatreem2tuoi8'),2);
    }

    if(!isNaN(parseFloat(unformat($('#visatreem12tuoi1').val()))*parseFloat(unformat($('#visatreem12tuoi3').val())))){
        $('#visatreem12tuoi4').val(Math.round(parseFloat(unformat($('#visatreem12tuoi1').val()))*parseFloat(unformat($('#visatreem12tuoi3').val()))).toFixed(2));
        fmCurrency($('#visatreem12tuoi4'),2) ;
    }
    if(!isNaN(parseFloat(unformat($('#visatreem12tuoi5').val()))*parseFloat(unformat($('#visatreem12tuoi7').val())))){
        $('#visatreem12tuoi8').val(Math.round(parseFloat(unformat($('#visatreem12tuoi5').val()))*parseFloat(unformat($('#visatreem12tuoi7').val()))).toFixed(2));
        fmCurrency($('#visatreem12tuoi8'),2);
    }

    // chi phi huong dan vien

    if(!isNaN(parseFloat(unformat($('#tour_leader1').val()))*parseFloat(unformat($('#tour_leader2').val()))* parseFloat(unformat($('#tour_leader3').val())))){
        $('#tour_leader4').val(Math.round(parseFloat(unformat($('#tour_leader1').val()))*parseFloat(unformat($('#tour_leader2').val()))*parseFloat(unformat($('#tour_leader3').val()))).toFixed(2));
        fmCurrency($('#tour_leader4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#tour_leader5').val()))*parseFloat(unformat($('#tour_leader6').val()))* parseFloat(unformat($('#tour_leader7').val())))){
        $('#tour_leader8').val(Math.round(parseFloat(unformat($('#tour_leader5').val()))*parseFloat(unformat($('#tour_leader6').val()))*parseFloat(unformat($('#tour_leader7').val()))).toFixed(2));
        fmCurrency($('#tour_leader8'),2);
    }

    if(!isNaN(parseFloat(unformat($('#chiphikhac1').val()))*parseFloat(unformat($('#chiphikhac3').val())))){
        $('#chiphikhac4').val(Math.round(parseFloat(unformat($('#chiphikhac1').val()))*parseFloat(unformat($('#chiphikhac3').val()))).toFixed(2));
        fmCurrency($('#chiphikhac4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#chiphikhac5').val()))*parseFloat(unformat($('#chiphikhac7').val())))){
        $('#chiphikhac8').val(Math.round(parseFloat(unformat($('#chiphikhac5').val()))*parseFloat(unformat($('#chiphikhac7').val()))).toFixed(2));
        fmCurrency($('#chiphikhac8'),2);
    }

    // chi phi khac
    if(!isNaN(parseFloat(unformat($('#baohiem1').val()))*parseFloat(unformat($('#baohiem3').val())))){
        $('#baohiem4').val(Math.round(parseFloat(unformat($('#baohiem1').val()))*parseFloat(unformat($('#baohiem3').val()))).toFixed(2));
        fmCurrency($('#baohiem4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#baohiem5').val()))*parseFloat(unformat($('#baohiem7').val())))){
        $('#baohiem8').val(Math.round(parseFloat(unformat($('#baohiem5').val()))*parseFloat(unformat($('#baohiem7').val()))).toFixed(2));
        fmCurrency($('#baohiem8'),2);
    }

    // Bảo hiểm trẻ em dưới 2 tuổi
    if(!isNaN(parseFloat(unformat($('#baohiemtreem2tuoi1').val()))*parseFloat(unformat($('#baohiemtreem2tuoi3').val())))){
        $('#baohiemtreem2tuoi4').val(Math.round(parseFloat(unformat($('#baohiemtreem2tuoi1').val()))*parseFloat(unformat($('#baohiemtreem2tuoi3').val()))).toFixed(2));
        fmCurrency($('#baohiemtreem2tuoi4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#baohiemtreem2tuoi5').val()))*parseFloat(unformat($('#baohiemtreem2tuoi7').val())))){
        $('#baohiemtreem2tuoi8').val(Math.round(parseFloat(unformat($('#baohiemtreem2tuoi7').val()))*parseFloat(unformat($('#baohiemtreem2tuoi7').val()))).toFixed(2));
        fmCurrency($('#baohiemtreem2tuoi8'),2);
    }

    //Bảo hiểm trẻ em từ 2 - 12 tuổi    
    if(!isNaN(parseFloat(unformat($('#baohiemtreem12tuoi1').val()))*parseFloat(unformat($('#baohiemtreem12tuoi3').val())))){
        $('#baohiemtreem12tuoi4').val(Math.round(parseFloat(unformat($('#baohiemtreem12tuoi1').val()))*parseFloat(unformat($('#baohiemtreem12tuoi3').val()))).toFixed(2));
        fmCurrency($('#baohiemtreem12tuoi4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#baohiemtreem12tuoi5').val()))*parseFloat(unformat($('#baohiemtreem12tuoi7').val())))){
        $('#baohiemtreem12tuoi8').val(Math.round(parseFloat(unformat($('#baohiemtreem12tuoi5').val()))*parseFloat(unformat($('#baohiemtreem12tuoi7').val()))).toFixed(2));
        fmCurrency($('#baohiemtreem12tuoi8'),2);
    }

    // chi phí visa tip
    if(!isNaN(parseFloat(unformat($('#visatip1').val()))*parseFloat(unformat($('#visatip3').val()))*parseFloat(unformat($('#visatip2').val())))){
        $('#visatip4').val(Math.round(parseFloat(unformat($('#visatip1').val()))*parseFloat(unformat($('#visatip3').val()))*parseFloat(unformat($('#visatip2').val()))).toFixed(2));
        fmCurrency($('#visatip4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#visatip5').val()))*parseFloat(unformat($('#visatip2').val()))*parseFloat(unformat($('#visatip7').val())))){
        $('#visatip8').val(Math.round(parseFloat(unformat($('#visatip5').val()))*parseFloat(unformat($('#visatip7').val()))*parseFloat(unformat($('#visatip6').val()))).toFixed(2));
        fmCurrency($('#visatip8'),2);
    } 

    // chi phí quà tặng
    if(!isNaN(parseFloat(unformat($('#quatang1').val()))*parseFloat(unformat($('#quatang3').val())))){
        $('#quatang4').val(Math.round(parseFloat(unformat($('#quatang1').val()))*parseFloat(unformat($('#quatang3').val()))).toFixed(2));
    }
    if(!isNaN(parseFloat(unformat($('#quatang5').val()))*parseFloat(unformat($('#quatang7').val())))){
        $('#quatang8').val(Math.round(parseFloat(unformat($('#quatang5').val()))*parseFloat(unformat($('#quatang7').val()))).toFixed(2));
        fmCurrency($('#quatang8'),2);
    }
    // chi phí khác land
    if(!isNaN(parseFloat(unformat($('#land2_1').val()))*parseFloat(unformat($('#land2_3').val())))){
        $('#land2_4').val(Math.round(parseFloat(unformat($('#land2_1').val()))*parseFloat(unformat($('#land2_3').val()))).toFixed(2));
        fmCurrency($('#land2_4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#land2_5').val()))*parseFloat(unformat($('#land2_7').val())))){
        $('#land2_8').val(Math.round(parseFloat(unformat($('#land2_5').val()))*parseFloat(unformat($('#land2_7').val()))).toFixed(2));
        fmCurrency($('#land2_8'),2);
    }
    // chi phí khác cpk
    if(!isNaN(parseFloat(unformat($('#cpk1').val()))*parseFloat(unformat($('#cpk3').val())))){
        $('#cpk4').val(Math.round(parseFloat(unformat($('#cpk1').val()))*parseFloat(unformat($('#cpk3').val()))).toFixed(2));
        fmCurrency($('#cpk4'),2);
    }
    if(!isNaN(parseFloat(unformat($('#cpk5').val()))*parseFloat(unformat($('#cpk5').val())))){
        $('#cpk8').val(Math.round(parseFloat(unformat($('#cpk5').val()))*parseFloat(unformat($('#cpk7').val()))).toFixed(2));
        fmCurrency($('#cpk8'));
    }
    // chi phí khác chênh lệch tỷ giá
    var tygia3sao = parseFloat(unformat($('#tongthunguoilon1').val())) + parseFloat(unformat($('#tongthute1').val()));
    var tygia4sao = parseFloat(unformat($('#tongthunguoilon2').val())) + parseFloat(unformat($('#tongthute2').val()));
    var tygia ;
    var tyle = parseFloat($('#txtCLTG').val())/100;
    if(tygia3sao > tygia4sao){
        tygia = tygia3sao*tyle;
        $('#chenhlechtygia4').val(Math.round(tygia).toFixed(2));
        fmCurrency($('#chenhlechtygia4'),2);
    }
    else{
        tygia = tygia4sao*tyle;
        $('#chenhlechtygia4').val(Math.round(tygia).toFixed(2));
        fmCurrency($('#chenhlechtygia4'),2);
    }

    var tygia3sao1 = parseFloat(unformat($('#tongthunguoilon3').val())) + parseFloat(unformat($('#tongthute4').val()));
    var tygia4sao1 = parseFloat(unformat($('#tongthunguoilon3').val())) + parseFloat(unformat($('#tongthute4').val()));
    if(tygia3sao1 > tygia4sao1){

        $('#chenhlechtygia8').val(Math.round(tygia3sao1 * (parseFloat($('#txtCLTG').val())/100)).toFixed(2));
        fmCurrency($('#chenhlechtygia8'),2)
    }
    else{
        $('#chenhlechtygia8').val(Math.round(tygia4sao1 * (parseFloat($('#txtCLTG').val())/100)).toFixed(2));
        fmCurrency($('#chenhlechtygia8'),2);
    }

    $('#chenhlechtygia3').val(Math.round(parseFloat(unformat($('#chenhlechtygia4').val()))/parseFloat(unformat($('#chenhlechtygia1').val()))).toFixed(2));
    fmCurrency($('#chenhlechtygia3'),2);

    $('#chenhlechtygia7').val(Math.round(parseFloat(unformat($('#chenhlechtygia8').val()))/parseFloat(unformat($('#chenhlechtygia5').val()))).toFixed(2));     
    fmCurrency($('#chenhlechtygia7'),2);
}

function tinhtongchiphi(){
    // tinh toan tong chi 
    // chi phi tre em duoi 2 tuoi ks3 sao 1
    if(parseFloat($('#treem2tuoi1').val())> 0){
        $('#tongchi1').val(Math.round((parseFloat(unformat($('#vmbtreem2tuoi4').val()))+parseFloat(unformat($('#vmbtreem2tuoind4').val())))/(parseFloat(unformat($('#taxtreem4').val()))/parseFloat(unformat($('#taxtreem1').val())))*parseFloat(unformat($('#treem2tuoi1').val()))+parseFloat(unformat($('#landfeetreem_2_3sao4').val()))+parseFloat(unformat($('#visatreem2tuoi4').val()))+parseFloat(unformat($('#baohiemtreem2tuoi4').val()))).toFixed(2));
        fmCurrency($('#tongchi1'),2);
    }
    else{$('#tongchi1').val('0');}

    // chi phi tre em duoi 2 tuoi ks4 sao 1
    if(parseFloat(unformat($('#treem2tuoi1').val()))>0){
        tt =(parseFloat(unformat($('#vmbtreem2tuoi4').val()))+parseFloat(unformat($('#vmbtreem2tuoind4').val())))/(parseFloat(unformat($('#taxtreem4').val()))/parseFloat(unformat($('#taxtreem1').val())))*parseFloat(unformat($('#treem2tuoi1').val()))+parseFloat(unformat($('#landfee4sao_treem2tuoi4').val()))+parseFloat(unformat($('#visatreem2tuoi4').val()))+parseFloat(unformat($('#baohiemtreem2tuoi4').val()));
        $('#tongchi2').val(Math.round(tt).toFixed(2));
        fmCurrency($('#tongchi2'),2);
    }
    else{$('#tongchi2').val('0');}

    // chi phi tre em tu 2 -12 tuoi ks3 sao 1
    if(parseFloat($('#treem12tuoi1').val())>0) {
        $('#tongchi3').val(Math.round((parseFloat(unformat($('#vmbtreem12tuoi4').val()))+parseFloat(unformat($('#vmbtreem12tuoind4').val())))+(parseFloat(unformat($('#taxtreem4').val()))/parseFloat(unformat($('#taxtreem1').val())))*parseFloat(unformat($('#treem12tuoi1').val()))+parseFloat(unformat($('#landfee_1_4_4').val()))+parseFloat(unformat($('#landfee_2_4_4').val()))+parseFloat(unformat($('#visatreem12tuoi4').val()))+parseFloat(unformat($('#baohiemtreem12tuoi4').val()))).toFixed(2));
        fmCurrency($('#tongchi3'),2);
    }

    else{ $('#tongchi3').val('0');}

    if(parseFloat(unformat($('#treem12tuoi1').val()))>0){
        $('#tongchi4').val(Math.round(parseFloat(unformat($('#vmbtreem12tuoi4').val()))+(parseFloat(unformat($('#taxtreem4').val()))/parseFloat(unformat($('#taxtreem1').val()))) * parseFloat(unformat($('#treem12tuoi1').val()))+ parseFloat(unformat($('#vmbtreem12tuoind4').val())) + parseFloat(unformat($('#landfee4sao_treem2tuoi4').val()))+parseFloat(unformat($('#landfee4sao_treem12tuoi4').val())) + parseFloat(unformat($('#visatreem12tuoi4').val())) + parseFloat(unformat($('#baohiemtreem12tuoi4').val()))).toFixed(2));
        fmCurrency($('#tongchi4'),2);
    }
    else{ $('#tongchi4').val('0');}

    // tong chi nguoi lon
    // tong chi ks3* nguoi lon 
    if(parseFloat(unformat($('#landfee1_3_4').val()))+parseFloat(unformat($('#landfee_2_3_4').val()))> 0){
        var tongcongchi = parseFloat(unformat($('#tongchivanchuyen1').val())) + parseFloat(unformat($('#sumlandfeepackage1').val())) + parseFloat(unformat($('#sumvisa1').val())) + parseFloat(unformat($('#sumguide1').val())) + parseFloat(unformat($('#sumotherservice1').val()))+parseFloat(unformat($('#tongtien_chi').val()));
        var giaban; 
        if(parseFloat(unformat($('#giaban6').val()))> parseFloat(unformat($('#giaban5').val()))){
            giaban = ((parseFloat(unformat($('#tongthunguoilon2').val()))+parseFloat(unformat($('#tongthute2').val())))-(parseFloat(unformat($('#tongthunguoilon1').val()))+parseFloat(unformat($('#tongthute1').val()))))* (parseFloat(unformat($('#txtCLTG').val())/100 ));
        }
        else {giaban = 0;}
        $('#tongchi5').val(Math.round((tongcongchi-giaban-parseFloat(unformat($('#landfee_1_4_4').val()))-parseFloat(unformat($('#landfee_2_4_4').val())))).toFixed(2));
        fmCurrency($('#tongchi5'),2);
    }
    else{ $('#tongchi5').val('0');} 

    // tong chi ks4* nguoi lon
    if (parseFloat(unformat($('#landfee_1_4_4').val()))+ parseFloat(unformat($('#landfee_2_4_4').val()))> 0){
        var tongcongchi = parseFloat(unformat($('#tongchivanchuyen1').val())) + parseFloat(unformat($('#sumlandfeepackage1').val())) + parseFloat(unformat($('#sumvisa1').val())) + parseFloat(unformat($('#sumguide1').val())) + parseFloat(unformat($('#sumotherservice1').val()))+parseFloat(unformat($('#tongtien_chi').val()));
        $('#tongchi6').val(Math.round(tongcongchi - parseFloat(unformat($('#landfee1_3_4').val()))- parseFloat(unformat($('#landfee_2_3_4').val()))).toFixed(2));
        fmCurrency($('#tongchi6'),2);
    }
    else{$('#tongchi6').val('0');}

    // tong chi ks3* tre em duoi 2 tuoi 2

    if(parseFloat(unformat($('#treem2tuoi7').val()))>0){
        $('#tongchi7').val(Math.round(parseFloat(unformat($('#vmbtreem2tuoi8').val()))+parseFloat(unformat($('#vmbtreem2tuoind8').val()))+(parseFloat(unformat($('#taxtreem8').val()))/parseFloat(unformat($('#taxtreem5').val())))*parseFloat(unformat($('#treem2tuoi7').val()))+parseFloat(unformat($('#visatreem2tuoi8').val()))+ parseFloat(unformat($('#baohiemtreem2tuoi8').val()))).toFixed(2));
        fmCurrency($('#tongchi7'),2);
    }
    else{$('#tongchi7').val('0');}

    // tong chi ks4* tre em duoi 2 tuoi 2
    if(parseFloat(unformat($('#treem2tuoi7').val()))>0){
        $('#tongchi8').val(Math.round(parseFloat(unformat($('#vmbtreem2tuoi8').val()))+parseFloat(unformat($('#vmbtreem2tuoind8').val()))+(parseFloat(unformat($('#taxtreem8').val()))/parseFloat(unformat($('#taxtreem5').val())))*parseFloat(unformat($('#treem2tuoi7').val()))+parseFloat(unformat($('#visatreem2tuoi8').val()))+ parseFloat(unformat($('#baohiemtreem2tuoi8').val()))).toFixed(2));
        fmCurrency($('#tongchi8'),2);
    }

    // tong chi ks3* tre em tu 2 - 12 tuoi 2
    if(parseFloat(unformat($('#treem12tuoi7').val()))>0){
        $('#tongchi9').val(Math.round(parseFloat(unformat($('#vmbtreem12tuoi8').val())) + parseFloat(unformat($('#vmbtreem12tuoind8').val())) + (parseFloat(unformat($('#taxtreem8').val()))/parseFloat(unformat($('#taxtreem5').val()))) * parseFloat(unformat($('#treem12tuoi7').val())) + parseFloat(unformat($('#landfeetreem_2_3sao8').val()))+parseFloat(unformat($('#landfeetreem12_3sao8').val())) + parseFloat(unformat($('#visatreem12tuoi8').val())) + parseFloat(unformat($('#baohiemtreem12tuoi8').val()))).toFixed(2));
        fmCurrency($('#tongchi9'),2);
    }
    else{$('#tongchi9').val('0');}

    // tong chi ks4* tre em tu 2 - 12 tuoi 2
    if(parseFloat(unformat($('#treem12tuoi7').val()))>0){
        $('#tongchi10').val(Math.round(parseFloat(unformat($('#vmbtreem12tuoind8').val()))+ parseFloat(unformat($('#vmbtreem12tuoind8').val()))+(parseFloat(unformat($('#taxtreem8').val()))/parseFloat(unformat($('#taxtreem5').val()))) * parseFloat(unformat($('#treem12tuoi7').val()))+ parseFloat(unformat($('#landfee4sao_treem2tuoi8').val())) + parseFloat(unformat($('#landfee4sao_treem12tuoi8').val())) +  parseFloat(unformat($('#visatreem12tuoi8').val())) + parseFloat(unformat($('#baohiemtreem12tuoi8').val()))).toFixed(2));
        fmCurrency($('#tongchi10'),2);
    }
    else{$('#tongchi10').val('0');}

    // tong chi ks3* nguoi lon 2

    if(parseFloat(unformat($('#landfee1_3_8').val()))+parseFloat(unformat($('#landfee_2_3_8').val())) > 0){
        var sumchiphi = parseFloat(unformat($('#tongchivanchuyen2').val())) + parseFloat(unformat($('#sumlandfeepackage2').val()))+parseFloat(unformat($('#sumvisa2').val())) + parseFloat(unformat($('#sumguide2').val())) + parseFloat(unformat($('#sumotherservice2').val()));
        var giaban1 = 0;
        if(parseFloat(unformat($('#giaban12').val()))>parseFloat(unformat($('#giaban11').val()))){ 
            giaban1 = ((parseFloat(unformat($('#tongthunguoilon4').val()))+parseFloat(unformat($('#tongthute4').val())))-(parseFloat(unformat($('#tongthunguoilon3').val()))+parseFloat(unformat($('#tongthute3').val()))))* (parseFloat(unformat($('#txtCLTG').val()))/100); 
        }
        else{giaban1 = 0;}

        $('#tongchi11').val(Math.round(sumchiphi-giaban1 - parseFloat(unformat($('#landfee_1_4_8').val()))- parseFloat(unformat($('#landfee_2_4_8').val()))).toFixed(2));
        fmCurrency($('#tongchi11'),2);
    }
    else{$('#tongchi11').val('0')}

    if(parseFloat(unformat($('#landfee_1_4_8').val()))+parseFloat(unformat($('#landfee_2_4_8').val()))>0){
        var sumchiphi1 = parseFloat(unformat($('#tongchivanchuyen2').val())) + parseFloat(unformat($('#sumlandfeepackage2').val()))+parseFloat(unformat($('#sumvisa2').val())) + parseFloat(unformat($('#sumguide2').val())) + parseFloat(unformat($('#sumotherservice2').val()));

        $('#tongchi12').val(Math.round(sumchiphi1 -parseFloat(unformat($('#landfee1_3_8').val()))- parseFloat(unformat($('#landfee_2_3_8').val()))).toFixed(2));
        fmCurrency($('#tongchi12'),2);
    }
    else {$('#tongchi12').val('0');}
}

// tong chi van chuyen

function tongchivanchuyen(){
    // tong chi van chuyen 1
    // vé máy bay người lớn 1
    var vmbnl1 = parseFloat(unformat($('#vmbnguoilon4').val()));
    // tax tạm tính 1
    var taxtt1 = parseFloat(unformat($('#taxtamtinh4').val()));
    // vé máy bay nội địa người lớn 1
    var vmbnguoilonnoidia1 = parseFloat(unformat($('#vmbnguoilonnd4').val()));
    // XE ĐÓN TIỄN sân bay 1
    var xedontien1 = parseFloat(unformat($('#xedontien4').val()));
    //VMB trẻ em dưới 2 tuổi (10%) 1
    var vmbtreem2tuoi1 = parseFloat(unformat($('#vmbtreem2tuoi4').val()));
    // VMB Nội địa trẻ em dưới 2 tuổi 1
    var vmbtreem2tuoind1 = parseFloat(unformat($('#vmbtreem2tuoind4').val()));
    //VMB trẻ em từ 2-12 tuổi
    var vmbtreem12tuoi1 = parseFloat(unformat($('#vmbtreem12tuoi4').val()));
    // VMB Nội Địa trẻ em 2 - 12 tuổi 1
    var vmbtreem12tuoind1 = parseFloat($('#vmbtreem12tuoind4').val());
    // tax trẻ em 1
    var taxtreem1 = parseFloat(unformat($('#taxtreem4').val()));
    // tinh tong 
    var tongcong = vmbnl1+taxtt1+vmbnguoilonnoidia1+xedontien1;   //+vmbtreem2tuoi1+vmbtreem2tuoind1+vmbtreem12tuoi1+vmbtreem12tuoind1+taxtreem1;
    if(!isNaN(tongcong)){
        $('#tongchivanchuyen1').val(tongcong.toString());
        fmCurrency($('#tongchivanchuyen1'),2);
    }
    // tong chi van chuyen 2
    // vé máy bay người lớn 2
    var vmbnl2 = parseFloat(unformat($('#vmbnguoilon8').val()));
    // tax tạm tính 2
    var taxtt2 = parseFloat(unformat($('#taxtamtinh8').val()));
    // vé máy bay nội địa người lớn 2
    var vmbnguoilonnoidia2 = parseFloat(unformat($('#vmbnguoilonnd8').val()));
    // XE ĐÓN TIỄN sân bay 2
    var xedontien2 = parseFloat(unformat($('#xedontien8').val()));
    //VMB trẻ em dưới 2 tuổi (10%) 2
    var vmbtreem2tuoi2 = parseFloat(unformat($('#vmbtreem2tuoi8').val()));
    // VMB Nội địa trẻ em dưới 2 tuổi 2
    var vmbtreem2tuoind2 = parseFloat(unformat($('#vmbtreem2tuoind8').val()));
    //VMB trẻ em từ 2-12 tuổi 2
    var vmbtreem12tuoi2 = parseFloat(unformat($('#vmbtreem12tuoi8').val()));
    // VMB Nội Địa trẻ em 2 - 12 tuổi 2
    var vmbtreem12tuoind2 = parseFloat(unformat($('#vmbtreem12tuoind8').val()));
    // tax trẻ em 2
    var taxtreem2 = parseFloat(unformat($('#taxtreem8').val()));
    // tinh tong 
    var tongcong1 = vmbnl2+taxtt2+vmbnguoilonnoidia2+xedontien2;//+vmbtreem2tuoi2+vmbtreem2tuoind2+vmbtreem12tuoi2+vmbtreem12tuoind2+taxtreem2;
    if(!isNaN(tongcong1)){
        $('#tongchivanchuyen2').val(tongcong1);
        fmCurrency($('#tongchivanchuyen2'),2);
    }

}

// tính tổng chỉ phí của landfee

function tinhtongchilandfee(){
    // tổng chi landfee 1
    // LANDFEE 1: 3 sao 1
    var landfee_1_3_1 = parseFloat(unformat($('#landfee1_3_4').val()));
    // LANDFEE 2: 3 sao 1
    var landfee_2_3_1 = parseFloat(unformat($('#landfee_2_3_4').val()));
    // LANDFEE 1: 4 sao 1
    var landfee_1_4_1 = parseFloat(unformat($('#landfee_1_4_4').val()));
    // LANDFEE 2: 4 sao
    var landfee_2_4_1 = parseFloat(unformat($('#landfee_2_4_4').val()));
    // upgrade_meal 1
    var upgrade_meal1 = parseFloat(unformat($('#upgrade_meal4').val()));
    // optional_tour 1
    var optional_tour1 = parseFloat(unformat($('#optional_tour4').val()));
    // single_supp_1
    var single_supp_1 = parseFloat(unformat($('#single_supp_4').val()));
    // Landfee trẻ em (3 sao) - trẻ em dưới 2 tuổi 
    var landfeetreem_2_3sao1 = parseFloat(unformat($('#landfeetreem_2_3sao4').val()));
    // landfeetreem12_3sao 1
    var landfeetreem12_3sao1 = parseFloat(unformat($('#landfeetreem12_3sao4').val()));
    // landfee4sao_treem2tuoi 1
    var landfee4sao_treem2tuoi1 = parseFloat(unformat($('#landfee4sao_treem2tuoi4').val()));
    // landfee4sao_treem12tuoi 1
    var landfee4sao_treem12tuoi1 = parseFloat(unformat($('#landfee4sao_treem12tuoi4').val()));
    // tổng cộng
    var tongcong = landfee_1_3_1+landfee_2_3_1+landfee_1_4_1+landfee_2_4_1+upgrade_meal1+optional_tour1+single_supp_1;//+landfeetreem_2_3sao1+landfeetreem12_3sao1+landfee4sao_treem2tuoi1+landfee4sao_treem12tuoi1;
    if(!isNaN(tongcong)){
        $('#sumlandfeepackage1').val(tongcong);
        fmCurrency($('#sumlandfeepackage1'),2);
    }

    // tổng chi landfee 2
    // LANDFEE 1: 3 sao 2
    var landfee_1_3_2 = parseFloat(unformat($('#landfee1_3_8').val()));
    // LANDFEE 2: 3 sao 2
    var landfee_2_3_2 = parseFloat(unformat($('#landfee_2_3_8').val()));
    // LANDFEE 1: 4 sao 2
    var landfee_1_4_2 = parseFloat(unformat($('#landfee_1_4_8').val()));
    // LANDFEE 2: 4 sao 2
    var landfee_2_4_2 = parseFloat(unformat($('#landfee_2_4_8').val()));
    // upgrade_meal 2
    var upgrade_meal2 = parseFloat(unformat($('#upgrade_meal8').val()));
    // optional_tour 2
    var optional_tour2 = parseFloat(unformat($('#optional_tour8').val()));
    // single_supp_2
    var single_supp_2 = parseFloat(unformat($('#single_supp_8').val()));
    // Landfee trẻ em (3 sao) - trẻ em dưới 2 tuổi 2
    var landfeetreem_2_3sao2 = parseFloat(unformat($('#landfeetreem_2_3sao8').val()));
    // landfeetreem12_3sao 2
    var landfeetreem12_3sao2 = parseFloat(unformat($('#landfeetreem12_3sao8').val()));
    // landfee4sao_treem2tuoi 2
    var landfee4sao_treem2tuoi2 = parseFloat(unformat($('#landfee4sao_treem2tuoi8').val()));
    // landfee4sao_treem12tuoi 2
    var landfee4sao_treem12tuoi2 = parseFloat(unformat($('#landfee4sao_treem12tuoi8').val()));
    // tổng cộng
    var tongcong1 = landfee_1_3_2+landfee_2_3_2+landfee_1_4_2+landfee_2_4_2+upgrade_meal2+optional_tour2+single_supp_2;//+landfeetreem_2_3sao2+landfeetreem12_3sao2+landfee4sao_treem2tuoi2+landfee4sao_treem12tuoi2;
    if(!isNaN(tongcong1)){
        $('#sumlandfeepackage2').val(tongcong1);
        fmCurrency($('#sumlandfeepackage2'),2);
    }

}

// tính toán tổng chi visa

function tinhtoanvisa(){
    // tính tổng chi visa 1
    // visa thông hành 
    var visathonghanh1 = parseFloat(unformat($('#visathonghanh4').val()));
    // visa dịch thuật công chứng hồ sơ
    var visadichthuat1 = parseFloat(unformat($('#visadichthuat4').val()));
    // phí chuyển hồ sơ
    var phichuyenphathoso1 = parseFloat(unformat($('#phichuyenphathoso4').val()));
    // phí thu mới
    var phithumoi1 = parseFloat(unformat($('#phithumoi4').val()));
    // phí visa trẻ em dưới 2 tuổi 
    var visatreem2tuoi1 = parseFloat(unformat($('#visatreem2tuoi4').val()));
    // phí visa trẻ em từ 2-12 tuổi
    var visatreem12tuoi1 = parseFloat(unformat($('#visatreem12tuoi4').val()));
    // tính tổng
    var tongcong = visathonghanh1+visadichthuat1+phichuyenphathoso1+phithumoi1;//+visatreem2tuoi1+visatreem12tuoi1;
    if(!isNaN(tongcong)){
        $('#sumvisa1').val(tongcong.toString());
        fmCurrency($('#sumvisa1'),2);
    }

    // tính tổng chi visa 2
    // visa thông hành 2 
    var visathonghanh2 = parseFloat(unformat($('#visathonghanh8').val()));
    // visa dịch thuật công chứng hồ sơ
    var visadichthuat2 = parseFloat(unformat($('#visadichthuat8').val()));
    // phí chuyển hồ sơ
    var phichuyenphathoso2 = parseFloat(unformat($('#phichuyenphathoso8').val()));
    // phí thu mới
    var phithumoi2 = parseFloat(unformat($('#phithumoi8').val()));
    // phí visa trẻ em dưới 2 tuổi 
    var visatreem2tuoi2 = parseFloat(unformat($('#visatreem2tuoi8').val()));
    // phí visa trẻ em từ 2-12 tuổi
    var visatreem12tuoi2 = parseFloat(unformat($('#visatreem12tuoi8').val()));
    // tính tổng
    var tongcong2 = visathonghanh2+visadichthuat2+phichuyenphathoso2+phithumoi2;//+visatreem2tuoi2+visatreem12tuoi2;
    if(!isNaN(tongcong2)){
        $('#sumvisa2').val(tongcong2);
        fmCurrency($('#sumvisa2'),2);
    }

}

// tính toán chi phí hướng dẫn viên 
function tinhchiphihuongdanvien(){
    // chi phí hướng dẫn viên 1
    // Tour leader
    var tour_leader1 = parseFloat(unformat($('#tour_leader4').val()));
    // chi phí khác 
    var chiphikhac1 = parseFloat(unformat($('#chiphikhac4').val()));
    // tổng cộng
    var tongcong = tour_leader1+chiphikhac1;
    if(!isNaN(tongcong)){
        $('#sumguide1').val(tongcong);
        fmCurrency($('#sumguide1'),2);
    }

    // chi phí hướng dẫn viên 2
    // Tour leader
    var tour_leader2 = parseFloat(unformat($('#tour_leader8').val()));
    // chi phí khác 
    var chiphikhac2 = parseFloat(unformat($('#chiphikhac8').val()));
    // tổng cộng
    var tongcong2 = tour_leader2+chiphikhac2;
    if(!isNaN(tongcong2)){
        $('#sumguide2').val(tongcong2);
        fmCurrency($('#sumguide2'),2);
    }
}

// chi phí dịch vụ khác 
function chiphidichvukhac(){
    // chi phí khác 1
    // bảo hiểm 1
    var baohiem1 = parseFloat(unformat($('#baohiem4').val()));
    // bảo hiểm trẻ em dưới 2 tuổi
    // var baohiemtreem2tuoi1 = parseFloat($('#baohiemtreem2tuoi4').val());
    // bảo hiểm trẻ từ 2- 12 tuổi
    //var baohiemtreem12tuoi1 = parseFloat($('#baohiemtreem12tuoi4').val());
    // visa tip 
    var visatip1 = parseFloat(unformat($('#visatip4').val()));
    // quà tặng 
    var quatang1 = parseFloat(unformat($('#quatang4').val()));
    // land 2
    var land2_1 = parseFloat(unformat($('#land2_4').val()));
    // CPK
    var cpk1 = parseFloat(unformat($('#cpk4').val()));
    // chênh lệch tỷ giá
    var chenhlechtygia1 = parseFloat(unformat($('#chenhlechtygia4').val()));
    // tính tổng cộng
    var tongcong = baohiem1+visatip1+quatang1+land2_1+cpk1+chenhlechtygia1;
    if(!isNaN(tongcong)){
        $('#sumotherservice1').val(Math.round(tongcong).toFixed(2));
        fmCurrency($('#sumotherservice1'),2);
    }
    // chi phí khác 2
    // bảo hiểm 2
    var baohiem2 = parseFloat(unformat($('#baohiem8').val()));
    // bảo hiểm trẻ em dưới 2 tuổi
    //var baohiemtreem2tuoi2 = parseFloat($('#baohiemtreem2tuoi8').val());
    // bảo hiểm trẻ từ 2- 12 tuổi
    //var baohiemtreem12tuoi2 = parseFloat($('#baohiemtreem12tuoi8').val());
    // visa tip 
    var visatip2 = parseFloat(unformat($('#visatip8').val()));
    // quà tặng 
    var quatang2 = parseFloat(unformat($('#quatang8').val()));
    // land 2
    var land2_2 = parseFloat(unformat($('#land2_8').val()));
    // CPK
    var cpk2 = parseFloat(unformat($('#cpk8').val()));
    // chênh lệch tỷ giá
    var chenhlechtygia2 = parseFloat(unformat($('#chenhlechtygia8').val()));

    var tongcong1 = baohiem2+visatip2+quatang2+land2_2+cpk2+chenhlechtygia2;
    if(!isNaN(tongcong1)){
        $('#sumotherservice2').val(Math.round(tongcong1).toFixed(2));
        fmCurrency($('#sumotherservice2'),2);
    }  
}

function reportsummary(){
    // giá net
    if(parseFloat(unformat($('#treem2tuoi1').val()))!= 0){
        $('#gianet1').val(Math.round(parseFloat(unformat($('#tongchi1').val()))/parseFloat(unformat($('#treem2tuoi1').val()))).toFixed(2));
        fmCurrency($('#gianet1'),2);
        $('#gianet2').val(Math.round(parseFloat(unformat($('#tongchi2').val()))/parseFloat(unformat($('#treem2tuoi1').val()))).toFixed(2)); 
        fmCurrency($('#gianet2'),2) ;
    }
    if(parseFloat($('#treem12tuoi1').val())!= 0){
        $('#gianet3').val(Math.round(parseFloat(unformat($('#tongchi3').val()))/parseFloat(unformat($('#treem12tuoi1').val()))).toFixed(2));
        fmCurrency($('#gianet3'),2);
        $('#gianet4').val(Math.round(parseFloat(unformat($('#tongchi4').val()))/parseFloat(unformat($('#treem12tuoi1').val()))).toFixed(2));
        fmCurrency($('#gianet4'),2);
    }
    if($('#ks3saonguoilon1').val()!=0){
        $('#gianet5').val(Math.round(parseFloat(unformat($('#tongchi5').val()))/parseFloat(unformat($('#ks3saonguoilon1').val()))).toFixed(2));
        fmCurrency($('#gianet5'),2);
        $('#gianet6').val(Math.round(parseFloat(unformat($('#tongchi6').val()))/parseFloat(unformat($('#ks3saonguoilon1').val()))).toFixed(2));
        fmCurrency($('#gianet6'),2);
    }

    if($('#treem2tuoi7').val()!= 0){
        $('#gianet7').val(Math.round(parseFloat(unformat($('#tongchi7').val()))/parseFloat(unformat($('#treem2tuoi7').val()))).toFixed(2));
        fmCurrency($('#gianet7'),2);
        $('#gianet8').val(Math.round(parseFloat(unformat($('#tongchi8').val()))/parseFloat(unformat($('#treem2tuoi7').val()))).toFixed(2));
        fmCurrency($('#gianet8'),2);
    }

    if($('#treem12tuoi7').val()!= 0){
        $('#gianet9').val(Math.round(parseFloat(unformat($('#tongchi9').val()))/parseFloat(unformat($('#treem12tuoi7').val()))).toFixed(2));
        fmCurrency($('#gianet9'));
        $('#gianet10').val(Math.round(parseFloat(unformat($('#tongchi10').val()))/parseFloat(unformat($('#treem12tuoi7').val()))).toFixed(2));
        fmCurrency($('#gianet10'),2);
    }

    if($('#ks3saonguoilon4').val()!= 0){
        $('#gianet11').val(Math.round(parseFloat(unformat($('#tongchi11').val()))/parseFloat(unformat($('#ks3saonguoilon4').val()))).toFixed(2));
        fmCurrency($('#gianet11'),2);
        $('#gianet12').val(Math.round(parseFloat(unformat($('#tongchi12').val()))/parseFloat(unformat($('#ks3saonguoilon4').val()))).toFixed(2));
        fmCurrency($('#gianet12'),2);
    }
    // giá bán
    $('#giaban1').val($('#treem2tuoi2').val());
    $('#giaban2').val($('#treem2tuoi4').val());
    $('#giaban3').val($('#treem12tuoi2').val());
    $('#giaban4').val($('#treem12tuoi4').val());
    $('#giaban7').val($('#treem2tuoi8').val());
    $('#giaban8').val($('#treem2tuoi10').val());
    $('#giaban9').val($('#treem12tuoi8').val());
    $('#giaban10').val($('#treem12tuoi10').val());

    // lãi khách
    $('#laikhach1').val(parseFloat(unformat($('#giaban1').val()))-parseFloat(unformat($('#gianet1').val())));
    fmCurrency($('#laikhach1'),2);
    $('#laikhach2').val(parseFloat(unformat($('#giaban2').val()))-parseFloat(unformat($('#gianet2').val())));
    fmCurrency($('#laikhach2'),2);
    $('#laikhach3').val(parseFloat(unformat($('#giaban3').val()))-parseFloat(unformat($('#gianet3').val())));
    fmCurrency($('#laikhach3'),2);
    $('#laikhach4').val(parseFloat(unformat($('#giaban4').val()))-parseFloat(unformat($('#gianet4').val())));
    fmCurrency($('#laikhach4'),2);
    $('#laikhach5').val(parseFloat(unformat($('#giaban5').val()))-parseFloat(unformat($('#gianet5').val())));
    fmCurrency($('#laikhach5'),2);
    $('#laikhach6').val(parseFloat(unformat($('#giaban6').val()))-parseFloat(unformat($('#gianet6').val())));
    fmCurrency($('#laikhach6'),2);
    $('#laikhach7').val(parseFloat(unformat($('#giaban7').val()))-parseFloat(unformat($('#gianet7').val())));
    fmCurrency($('#laikhach7'),2);
    $('#laikhach8').val(parseFloat(unformat($('#giaban8').val()))-parseFloat(unformat($('#gianet8').val())));
    fmCurrency($('#laikhach8'),2);
    $('#laikhach9').val(parseFloat(unformat($('#giaban9').val()))-parseFloat(unformat($('#gianet9').val())));
    fmCurrency($('#laikhach9'),2);
    $('#laikhach10').val(parseFloat(unformat($('#giaban10').val()))-parseFloat(unformat($('#gianet10').val())));
    fmCurrency($('#laikhach10'),2);
    $('#laikhach11').val(parseFloat(unformat($('#giaban11').val()))-parseFloat(unformat($('#gianet11').val())));
    fmCurrency($('#laikhach11'),2);
    $('#laikhach12').val(parseFloat(unformat($('#giaban12').val()))-parseFloat(unformat($('#gianet12').val())));
    fmCurrency($('#laikhach12'),2);

    // tổng lãi
    $('#tonglai1').val(parseFloat(unformat($('#treem2tuoi3').val()))-parseFloat(unformat($('#tongchi1').val())));
    fmCurrency($('#tonglai1'),2);
    $('#tonglai2').val(parseFloat(unformat($('#treem2tuoi5').val()))-parseFloat(unformat($('#tongchi2').val())));
    fmCurrency($('#tonglai2'),2);
    $('#tonglai3').val(parseFloat(unformat($('#treem12tuoi3').val()))-parseFloat(unformat($('#tongchi3').val())));
    fmCurrency($('#tonglai3'),2);
    $('#tonglai4').val(parseFloat(unformat($('#treem12tuoi5').val()))-parseFloat(unformat($('#tongchi4').val())));
    fmCurrency($('#tonglai4'),2);
    $('#tonglai4').val(parseFloat(unformat($('#treem12tuoi5').val()))-parseFloat(unformat($('#tongchi4').val())));
    fmCurrency($('#tonglai4'),2);
    $('#tonglai4').val(parseFloat(unformat($('#treem12tuoi5').val()))-parseFloat(unformat($('#tongchi4').val())));
    fmCurrency($('#tonglai4'),2);
    $('#tonglai5').val(parseFloat(unformat($('#tongthunguoilon1').val()))-parseFloat(unformat($('#tongchi5').val()))+parseFloat(unformat($('#tongtien_thu').val())));
    fmCurrency($('#tonglai5'),2);
    $('#tonglai6').val(parseFloat(unformat($('#tongthunguoilon2').val()))-parseFloat(unformat($('#tongchi6').val()))+parseFloat(unformat($('#tongtien_thu1').val())));
    fmCurrency($('#tonglai6'),2);
    $('#tonglai7').val(parseFloat(unformat($('#treem2tuoi9').val()))-parseFloat(unformat($('#tongchi7').val())));
    fmCurrency($('#tonglai7'),2);
    $('#tonglai8').val(parseFloat(unformat($('#treem2tuoi11').val()))-parseFloat(unformat($('#tongchi8').val())));
    fmCurrency($('#tonglai8'),2);
    $('#tonglai9').val(parseFloat(unformat($('#treem12tuoi9').val()))-parseFloat(unformat($('#tongchi9').val())));
    fmCurrency($('#tonglai9'),2);
    $('#tonglai10').val(parseFloat(unformat($('#treem12tuoi11').val()))-parseFloat(unformat($('#tongchi10').val())));
    fmCurrency($('#tonglai10'),2);
    $('#tonglai11').val(Math.round(parseFloat(unformat($('#tongthunguoilon3').val()))-parseFloat(unformat($('#tongchi11').val()))).toFixed(2));
    fmCurrency($('#tonglai11'),2);
    $('#tonglai12').val(parseFloat(unformat($('#tongthunguoilon4').val()))-parseFloat(unformat($('#tongchi12').val())));
    fmCurrency($('#tonglai12'),2);

    var tl1 = (parseFloat(unformat($('#tonglai1').val()))/parseFloat(unformat($('#treem2tuoi3').val())))*100;
    if(!isNaN(tl1)){
        $('#tyle1').val((Math.round(tl1).toFixed(2)));
        fmCurrency($('#tyle1'),2);
    }
    else{
        $('#tyle1').val(0)
    }
    var tl2 = (parseFloat(unformat($('#tonglai2').val()))/parseFloat(unformat($('#treem2tuoi5').val())))*100;
    if(!isNaN(tl2)){
        $('#tyle2').val((Math.round(tl2).toFixed(2)));
        fmCurrency($('#tyle2'),2);
    }
    else{
        $('#tyle2').val('0');
    }

    var tl3 = (parseFloat(unformat($('#tonglai3').val()))/parseFloat(unformat($('#treem12tuoi3').val())))*100;
    if(!isNaN(tl3)){
        $('#tyle3').val((Math.round(tl3).toFixed(2)));  
        fmCurrency($('#tyle3'),2);
    }
    else{
        $('#tyle3').val('0');
    }

    var tl4 = (parseFloat(unformat($('#tonglai4').val()))/parseFloat(unformat($('#treem12tuoi5').val())))*100;
    if(!isNaN(tl4)){
        $('#tyle4').val((Math.round(tl4).toFixed(2)));  
        fmCurrency($('#tyle4'),2);
    }
    else{
        $('#tyle4').val('0');
    }

    var tl5 = (parseFloat(unformat($('#tonglai5').val()))/parseFloat(unformat($('#tongthunguoilon1').val())))*100;

    if(!isNaN(tl5)){
        $('#tyle5').val((Math.round(tl5).toFixed(2)));     
        fmCurrency($('#tyle5'),2);
    }
    else{
        $('#tyle5').val('0 %');
    }

    var tl6 = (parseFloat(unformat($('#tonglai6').val()))/parseFloat(unformat($('#tongthunguoilon2').val())))*100;
    if(!isNaN(tl6)){
        $('#tyle6').val((Math.round(tl6).toFixed(2)));
        fmCurrency($('#tyle6'),2);
    }
    else{
        $('#tyle6').val('0 %');
    }

    var tl7 = (parseFloat(unformat($('#tonglai7').val()))/parseFloat(unformat($('#treem2tuoi9').val())))*100;
    if(!isNaN(tl7)){
        $('#tyle7').val((Math.round(tl7).toFixed(2)));  
        fmCurrency($('#tyle7'),2);
    }
    else{
        $('#tyle7').val('0 %');
    }
    var tl8 = (parseFloat(unformat($('#tonglai8').val()))/parseFloat(unformat($('#treem2tuoi11').val())))*100;
    if(!isNaN(tl8)){
        $('#tyle8').val((Math.round(tl8).toFixed(2))); 
        fmCurrency($('#tyle8'),2);
    }
    else{
        $('#tyle8').val('0 %');
    }

    var tl9 = (parseFloat(unformat($('#tonglai9').val()))/parseFloat(unformat($('#treem12tuoi9').val())))*100;
    if(!isNaN(tl9)){
        $('#tyle9').val((Math.round(tl9).toFixed(2))); 
        fmCurrency($('#tyle9'),2);
    }
    else{
        $('#tyle9').val('0 %');
    }

    var tl10 = (parseFloat(unformat($('#tonglai10').val()))/parseFloat(unformat($('#treem12tuoi11').val())))*100;
    if(!isNaN(tl10)){
        $('#tyle10').val((Math.round(tl10).toFixed(2))); 
        fmCurrency($('#tyle10'),2);
    }
    else{
        $('#tyle10').val('0 %');
    }

    var tl11 = (parseFloat(unformat($('#tonglai11').val()))/parseFloat(unformat($('#tongthunguoilon3').val())))*100;
    if(!isNaN(tl11)){
        $('#tyle11').val((Math.round(tl11).toFixed(2)));
        fmCurrency($('#tyle11'),2);
    }
    else{
        $('#tyle11').val('0');
    }
    var tl12 = (parseFloat(unformat($('#tonglai12').val()))/parseFloat(unformat($('#tongthunguoilon4').val())))*100;

    if(!isNaN(tl12)){
        $('#tyle12').val((Math.round(tl12).toFixed(2))); 
        fmCurrency($('#tyle12'),2);
    }
    else{
        $('#tyle12').val('0');
    }


}

function checkfoc(){
    if(parseFloat($('#focvmbnguoilon').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focvmbnguoilon').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focvmbnguoilon').focus();
        //return;
    }

    if(parseFloat($('#foctaxtamtinh').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#foctaxtamtinh').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#foctaxtamtinh').focus();
        //return;
    }

    if(parseFloat($('#focvmbndnguoilon').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focvmbndnguoilon').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focvmbndnguoilon').focus();
        //return;
    }

    if(parseFloat($('#foclandfee1_3sao').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#foclandfee1_3sao').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#foclandfee1_3sao').focus();
        //return;
    }

    if(parseFloat($('#foclandfee2_3sao').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#foclandfee2_3sao').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#foclandfee2_3sao').focus();
        //return;
    }

    if(parseFloat($('#foclandfee1_4sao').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#foclandfee1_4sao').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#foclandfee1_4sao').focus();
        //return;
    }

    if(parseFloat($('#foclandfee2_4sao').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#foclandfee2_4sao').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#foclandfee2_4sao').focus();
        //return;
    }

    if(parseFloat($('#focupgrademeal').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focupgrademeal').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focupgrademeal').focus();
        //return;
    }

    if(parseFloat($('#focoptionaltour').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focoptionaltour').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focoptionaltour').focus();
        //return;
    }

    if(parseFloat($('#focvisa').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focvisa').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focvisa').focus();
        //return;
    }

    if(parseFloat($('#focdichthuatcongchung').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focdichthuatcongchung').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focdichthuatcongchung').focus();
        //return;
    }

    if(parseFloat($('#focchuyenphat').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focchuyenphat').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focchuyenphat').focus();
        //return;
    }

    if(parseFloat($('#focbaohiem').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focbaohiem').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focbaohiem').focus();
        //return;
    }

    if(parseFloat($('#foctip').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#foctip').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#foctip').focus();
        //return;
    }

    if(parseFloat($('#focquatang').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focquatang').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focquatang').focus();
        //return;
    }

    if(parseFloat($('#focland2').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focland2').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focland2').focus();
        //return;
    }

    if(parseFloat($('#foccpk').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#foccpk').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#foccpk').focus();
        //return;
    }

    if(parseFloat($('#focchenhlechtygia').val()) > parseFloat($('NguoiLon1').val()) || parseFloat($('#focchenhlechtygia').val()) > parseFloat($('#NguoiLon2').val()) ){
        alert ('FOC phải nhỏ hơn số lượng khách');
        $('#focchenhlechtygia').focus();
        //return;
    }    
}

