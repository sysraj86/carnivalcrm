<?php

    //$focus = new Worksheets();
    echo "\n<p>\n";
    if(!empty($focus->type)){
        $worksheet_type = $focus->type;
    }
    else{$worksheet_type = $_REQUEST['type']; }
    echo get_module_title($mod_strings['LBL_MODULE_ID'], $mod_strings['LBL_MODULE_NAME'].": ".$focus->name." :".$worksheet_type, true);
    echo "\n</p>\n";
    $ss = new Sugar_Smarty();
    $ss->assign("MOD", $mod_strings);
    $ss->assign("APP", $app_strings);
    $ss->assign("ASSIGNED_USER_NAME",       $focus->assigned_user_name);
    $ss->assign("ASSIGNED_USER_ID",         $focus->assigned_user_id );
    if (isset($_REQUEST['return_module'])) $ss->assign("RETURN_MODULE", $_REQUEST['return_module']);
    if (isset($_REQUEST['return_action'])) $ss->assign("RETURN_ACTION", $_REQUEST['return_action']);
    if (isset($_REQUEST['return_id'])) $ss->assign("RETURN_ID", $_REQUEST['return_id']);

    if (empty($_REQUEST['return_id'])) {
        $ss->assign("RETURN_ACTION", 'index');
    }
    
    
    $ss->assign("ID", $focus->id);
    $ss->assign('MADETOUR',$focus->groupprograorksheets_name);
    $ss->assign('MADETOUR_ID',$focus->groupprogrd737rograms_ida);  
    $ss->assign('VERSION',$focus->version);  
    $ss->assign('NOTE',$focus->note);  
     if(!empty($focus->type)) {
        $ss->assign("TYPE", $focus->type);   
     }
     else{
         $type = $_REQUEST['type'];
         $ss->assign("TYPE", $type);
     }
     $temp = base64_decode($focus->content);
    $noidung = json_decode($temp);
    $ss->assign("TYGIA", $focus->tygia); 
    $ss->assign("outbound_currency", get_select_options_with_id($app_list_strings['currency_dom'],$noidung->outbound_currency)); 
    $ss->assign("NGAYTYGIA", $focus->ngaytygia); 
    $ss->assign('TONGCHI1',$focus->tongchi1);
    $ss->assign('TONGCHI2',$focus->tongchi2);
    $ss->assign('TONGCHI3',$focus->tongchi3);
    $ss->assign('TONGCHI4',$focus->tongchi4);
    $ss->assign('TONGCHI5',$focus->tongchi5);
    $ss->assign('TONGCHI6',$focus->tongchi6);
    $ss->assign('TONGCHI7',$focus->tongchi7);
    $ss->assign('TONGCHI8',$focus->tongchi8);
    $ss->assign('TONGCHI9',$focus->tongchi9);
    $ss->assign('TONGCHI10',$focus->tongchi10);
    $ss->assign('TONGCHI11',$focus->tongchi11);
    $ss->assign('TONGCHI12',$focus->tongchi12);
    // giá net
    $ss->assign('GIANET1',$focus->gianet1);
    $ss->assign('GIANET2',$focus->gianet2);
    $ss->assign('GIANET3',$focus->gianet3);
    $ss->assign('GIANET4',$focus->gianet4);
    $ss->assign('GIANET5',$focus->gianet5);
    $ss->assign('GIANET6',$focus->gianet6);
    $ss->assign('GIANET7',$focus->gianet7);
    $ss->assign('GIANET8',$focus->gianet8);
    $ss->assign('GIANET9',$focus->gianet9);
    $ss->assign('GIANET10',$focus->gianet10);
    $ss->assign('GIANET11',$focus->gianet11);
    $ss->assign('GIANET12',$focus->gianet12);

    // giá bán
    $ss->assign('GIABAN1',$focus->giaban1);
    $ss->assign('GIABAN2',$focus->giaban2);
    $ss->assign('GIABAN3',$focus->giaban3);
    $ss->assign('GIABAN4',$focus->giaban4);
    $ss->assign('GIABAN5',$focus->giaban5);
    $ss->assign('GIABAN6',$focus->giaban6);
    $ss->assign('GIABAN7',$focus->giaban7);
    $ss->assign('GIABAN8',$focus->giaban8);
    $ss->assign('GIABAN9',$focus->giaban9);
    $ss->assign('GIABAN10',$focus->giaban10);
    $ss->assign('GIABAN11',$focus->giaban11);
    $ss->assign('GIABAN12',$focus->giaban12);

    // lãi khách
    $ss->assign('LAIKHACH1',$focus->laikhach1);
    $ss->assign('LAIKHACH2',$focus->laikhach2);
    $ss->assign('LAIKHACH3',$focus->laikhach3);
    $ss->assign('LAIKHACH4',$focus->laikhach4);
    $ss->assign('LAIKHACH5',$focus->laikhach5);
    $ss->assign('LAIKHACH6',$focus->laikhach6);
    $ss->assign('LAIKHACH7',$focus->laikhach7);
    $ss->assign('LAIKHACH8',$focus->laikhach8);
    $ss->assign('LAIKHACH9',$focus->laikhach9);
    $ss->assign('LAIKHACH10',$focus->laikhach10);
    $ss->assign('LAIKHACH11',$focus->laikhach11);
    $ss->assign('LAIKHACH12',$focus->laikhach12);

    // tổng lãi
    $ss->assign('TONGLAI1',$focus->tonglai1);
    $ss->assign('TONGLAI2',$focus->tonglai2);
    $ss->assign('TONGLAI3',$focus->tonglai3);
    $ss->assign('TONGLAI4',$focus->tonglai4);
    $ss->assign('TONGLAI5',$focus->tonglai5);
    $ss->assign('TONGLAI6',$focus->tonglai6);
    $ss->assign('TONGLAI7',$focus->tonglai7);
    $ss->assign('TONGLAI8',$focus->tonglai8);
    $ss->assign('TONGLAI9',$focus->tonglai9);
    $ss->assign('TONGLAI10',$focus->tonglai10);
    $ss->assign('TONGLAI11',$focus->tonglai11);
    $ss->assign('TONGLAI12',$focus->tonglai12);

    // tỷ lệ
    $ss->assign('TYLE1',$focus->tyle1);
    $ss->assign('TYLE2',$focus->tyle2);
    $ss->assign('TYLE3',$focus->tyle3);
    $ss->assign('TYLE4',$focus->tyle4);
    $ss->assign('TYLE5',$focus->tyle5);
    $ss->assign('TYLE6',$focus->tyle6);
    $ss->assign('TYLE7',$focus->tyle7);
    $ss->assign('TYLE8',$focus->tyle8);
    $ss->assign('TYLE9',$focus->tyle9);
    $ss->assign('TYLE10',$focus->tyle10);
    $ss->assign('TYLE11',$focus->tyle11);
    $ss->assign('TYLE12',$focus->tyle12);

    $ss->assign('NGAYKHOIHANH',$focus->ngaykhoihanh);
    $ss->assign('NGAYKETTHUC',$focus->ngayketthuc);
    $ss->assign('FOC_NUMBER',$focus->foc_number);
    $ss->assign('TONGTHUNGUOILON1',$focus->tongthunguoilon1);
    $ss->assign('TONGTHUNGUOILON2',$focus->tongthunguoilon2);
    $ss->assign('TONGTHUNGUOILON3',$focus->tongthunguoilon3);
    $ss->assign('TONGTHUNGUOILON4',$focus->tongthunguoilon4);

    $ss->assign('TONGTHUTE1',$focus->tongthute1);
    $ss->assign('TONGTHUTE2',$focus->tongthute2);
    $ss->assign('TONGTHUTE3',$focus->tongthute3);
    $ss->assign('TONGTHUTE4',$focus->tongthute4);

    $ss->assign('TONGCHIVANCHUYEN1',$focus->tongchivanchuyen1);
    $ss->assign('TONGCHIVANCHUYEN2',$focus->tongchivanchuyen2);

    $ss->assign('SUMLANDFEEPACKAGE1',$focus->sumlandfeepackage1);
    $ss->assign('SUMLANDFEEPACKAGE2',$focus->sumlandfeepackage2);

    $ss->assign('SUMVISA1',$focus->sumvisa1);
    $ss->assign('SUMVISA2',$focus->sumvisa2);

    $ss->assign('SUMGUIDE1',$focus->sumguide1);
    $ss->assign('SUMGUIDE2',$focus->sumguide2);

    $ss->assign('SUMOTHERSERVICE1',$focus->sumotherservice1);
    $ss->assign('SUMOTHERSERVICE2',$focus->sumotherservice2);

    
    $ss->assign('NguoiLon1',$noidung->NguoiLon1);
    $ss->assign('NguoiLon2',$noidung->NguoiLon2);
    $ss->assign('TXTTREEM2TUOI1',$noidung->TreEm2Tuoi1);
    $ss->assign('TXTTREEM2TUOI2',$noidung->TreEm2Tuoi2);
    $ss->assign('TXTTREEM12TUOI1',$noidung->TreEm12Tuoi1);
    $ss->assign('TXTTREEM12TUOI2',$noidung->TreEm12Tuoi2);
    $ss->assign('TXTSOBUAAN1',$noidung->txtSoBuaAn1);
    $ss->assign('TXTSOBUAAN2',$noidung->txtSoBuaAn2);
    $ss->assign('TXTTOURLEADER1',$noidung->txtTourLeader1);
    $ss->assign('TXTTOURLEADER2',$noidung->txtTourLeader2);
    $ss->assign('TXTFOCVMB1',$noidung->txtFOCVMB1);
    $ss->assign('TXTFOCVMB2',$noidung->txtFOCVMB2);
    $ss->assign('TXTFOCLAND1',$noidung->txtFOCLand1);
    $ss->assign('TXTFOCLAND2',$noidung->txtFOCLand2);
    $ss->assign('LAND_TREEM',$noidung->land_treem);
    $ss->assign('TXTFOCVMBNOIDIA1',$noidung->txtFOCVMBNoiDia1);
    $ss->assign('TXTFOCVMBNOIDIA2',$noidung->txtFOCVMBNoiDia2);
    $ss->assign('TXTCLTG',$noidung->txtCLTG);
    $ss->assign('SINGLE1',$noidung->single1);
    $ss->assign('SINGLE2',$noidung->single2);
    $ss->assign('FOC_NUMBER',$noidung->foc_number);
    $ss->assign('HANHTRINH',$noidung->hanhtrinh);
    $ss->assign('TXTCLTG',$noidung->txtCLTG);
    $ss->assign('LAND_TREEM',$noidung->land_treem);
    $ss->assign('KS3SAONGUOILON1',$noidung->ks3saonguoilon1);
    $ss->assign('KS3SAONGUOILON2',$noidung->ks3saonguoilon2);
    $ss->assign('KS3SAONGUOILON3',$noidung->ks3saonguoilon3);
    $ss->assign('KS3SAONGUOILON4',$noidung->ks3saonguoilon4);
    $ss->assign('KS3SAONGUOILON5',$noidung->ks3saonguoilon5);
    $ss->assign('KS3SAONGUOILON6',$noidung->ks3saonguoilon6);
    $ss->assign('KS4SAONGUOILON1',$noidung->ks4saonguoilon1);
    $ss->assign('KS4SAONGUOILON2',$noidung->ks4saonguoilon2);
    $ss->assign('KS4SAONGUOILON3',$noidung->ks4saonguoilon3);
    $ss->assign('KS4SAONGUOILON4',$noidung->ks4saonguoilon4);

    $ss->assign('KS3SAOPHUTHUKHAC1',$noidung->ks3saophuthukhac1);
    $ss->assign('KS3SAOPHUTHUKHAC2',$noidung->ks3saophuthukhac2);
    $ss->assign('KS3SAOPHUTHUKHAC3',$noidung->ks3saophuthukhac3);
    $ss->assign('KS3SAOPHUTHUKHAC4',$noidung->ks3saophuthukhac4);
    $ss->assign('KS3SAOPHUTHUKHAC5',$noidung->ks3saophuthukhac5);
    $ss->assign('KS3SAOPHUTHUKHAC6',$noidung->ks3saophuthukhac6);

    $ss->assign('KS4SAOPHUTHUKHAC1',$noidung->ks4saophuthukhac1);
    $ss->assign('KS4SAOPHUTHUKHAC2',$noidung->ks4saophuthukhac2);
    $ss->assign('KS4SAOPHUTHUKHAC3',$noidung->ks4saophuthukhac3);
    $ss->assign('KS4SAOPHUTHUKHAC4',$noidung->ks4saophuthukhac4);

    $ss->assign('KS3SAOPHUTHUKHAC_1',$noidung->ks3saophuthukhac_1);
    $ss->assign('KS3SAOPHUTHUKHAC_2',$noidung->ks3saophuthukhac_2);
    $ss->assign('KS3SAOPHUTHUKHAC_3',$noidung->ks3saophuthukhac_3);
    $ss->assign('KS3SAOPHUTHUKHAC_4',$noidung->ks3saophuthukhac_4);
    $ss->assign('KS3SAOPHUTHUKHAC_5',$noidung->ks3saophuthukhac_5);
    $ss->assign('KS3SAOPHUTHUKHAC_6',$noidung->ks3saophuthukhac_6);

    $ss->assign('KS4SAOPHUTHUKHAC_1',$noidung->ks4saophuthukhac_1);
    $ss->assign('KS4SAOPHUTHUKHAC_2',$noidung->ks4saophuthukhac_2);
    $ss->assign('KS4SAOPHUTHUKHAC_3',$noidung->ks4saophuthukhac_3);
    $ss->assign('KS4SAOPHUTHUKHAC_4',$noidung->ks4saophuthukhac_4);

    $ss->assign('KS3SAOSINGLESUPP1',$noidung->ks3saosinglesupp1);
    $ss->assign('KS3SAOSINGLESUPP2',$noidung->ks3saosinglesupp2);
    $ss->assign('KS3SAOSINGLESUPP3',$noidung->ks3saosinglesupp3);
    $ss->assign('KS3SAOSINGLESUPP4',$noidung->ks3saosinglesupp4);
    $ss->assign('KS3SAOSINGLESUPP5',$noidung->ks3saosinglesupp5);
    $ss->assign('KS3SAOSINGLESUPP6',$noidung->ks3saosinglesupp6);

    $ss->assign('KS4SAOSINGLESUPP1',$noidung->ks4saosinglesupp1);
    $ss->assign('KS4SAOSINGLESUPP2',$noidung->ks4saosinglesupp2);
    $ss->assign('KS4SAOSINGLESUPP3',$noidung->ks4saosinglesupp3);
    $ss->assign('KS4SAOSINGLESUPP4',$noidung->ks4saosinglesupp4);

    $ss->assign('TREEM2TUOI1',$noidung->treem2tuoi1);
    $ss->assign('TREEM2TUOI2',$noidung->treem2tuoi2);
    $ss->assign('TREEM2TUOI3',$noidung->treem2tuoi3);
    $ss->assign('TREEM2TUOI4',$noidung->treem2tuoi4);
    $ss->assign('TREEM2TUOI5',$noidung->treem2tuoi5);
    $ss->assign('TREEM2TUOI7',$noidung->treem2tuoi7);
    $ss->assign('TREEM2TUOI8',$noidung->treem2tuoi8);
    $ss->assign('TREEM2TUOI9',$noidung->treem2tuoi9);
    $ss->assign('TREEM2TUOI10',$noidung->treem2tuoi10);
    $ss->assign('TREEM2TUOI11',$noidung->treem2tuoi11);

    $ss->assign('TREEM12TUOI1',$noidung->treem12tuoi1);
    $ss->assign('TREEM12TUOI2',$noidung->treem12tuoi2);
    $ss->assign('TREEM12TUOI3',$noidung->treem12tuoi3);
    $ss->assign('TREEM12TUOI4',$noidung->treem12tuoi4);
    $ss->assign('TREEM12TUOI5',$noidung->treem12tuoi5);
    $ss->assign('TREEM12TUOI7',$noidung->treem12tuoi7);
    $ss->assign('TREEM12TUOI8',$noidung->treem12tuoi8);
    $ss->assign('TREEM12TUOI9',$noidung->treem12tuoi9);
    $ss->assign('TREEM12TUOI10',$noidung->treem12tuoi10);
    $ss->assign('TREEM12TUOI11',$noidung->treem12tuoi11);

    $ss->assign('VMBNGUOILON1',$noidung->vmbnguoilon1);
    $ss->assign('VMBNGUOILON2',$noidung->vmbnguoilon2);
    $ss->assign('VMBNGUOILON3',$noidung->vmbnguoilon3);
    $ss->assign('VMBNGUOILON4',$noidung->vmbnguoilon4);
    $ss->assign('VMBNGUOILON5',$noidung->vmbnguoilon5);
    $ss->assign('VMBNGUOILON6',$noidung->vmbnguoilon6);
    $ss->assign('VMBNGUOILON7',$noidung->vmbnguoilon7);
    $ss->assign('VMBNGUOILON8',$noidung->vmbnguoilon8);

    $ss->assign('TAXTAMTINH1',$noidung->taxtamtinh1);
    $ss->assign('TAXTAMTINH2',$noidung->taxtamtinh2);
    $ss->assign('TAXTAMTINH3',$noidung->taxtamtinh3);
    $ss->assign('TAXTAMTINH4',$noidung->taxtamtinh4);
    $ss->assign('TAXTAMTINH5',$noidung->taxtamtinh5);
    $ss->assign('TAXTAMTINH6',$noidung->taxtamtinh6);
    $ss->assign('TAXTAMTINH7',$noidung->taxtamtinh7);
    $ss->assign('TAXTAMTINH8',$noidung->taxtamtinh8);

    $ss->assign('VMBNGUOILONND1',$noidung->vmbnguoilonnd1);
    $ss->assign('VMBNGUOILONND2',$noidung->vmbnguoilonnd2);
    $ss->assign('VMBNGUOILONND3',$noidung->vmbnguoilonnd3);
    $ss->assign('VMBNGUOILONND4',$noidung->vmbnguoilonnd4);
    $ss->assign('VMBNGUOILONND5',$noidung->vmbnguoilonnd5);
    $ss->assign('VMBNGUOILONND6',$noidung->vmbnguoilonnd6);
    $ss->assign('VMBNGUOILONND7',$noidung->vmbnguoilonnd7);
    $ss->assign('VMBNGUOILONND8',$noidung->vmbnguoilonnd8);

    $ss->assign('XEDONTIEN1',$noidung->xedontien1);
    $ss->assign('XEDONTIEN2',$noidung->xedontien2);
    $ss->assign('XEDONTIEN3',$noidung->xedontien3);
    $ss->assign('XEDONTIEN4',$noidung->xedontien4);
    $ss->assign('XEDONTIEN5',$noidung->xedontien5);
    $ss->assign('XEDONTIEN6',$noidung->xedontien6);
    $ss->assign('XEDONTIEN7',$noidung->xedontien7);
    $ss->assign('XEDONTIEN8',$noidung->xedontien8);

    $ss->assign('VMBTREEM2TUOI1',$noidung->vmbtreem2tuoi1);
    $ss->assign('VMBTREEM2TUOI2',$noidung->vmbtreem2tuoi2);
    $ss->assign('VMBTREEM2TUOI3',$noidung->vmbtreem2tuoi3);
    $ss->assign('VMBTREEM2TUOI4',$noidung->vmbtreem2tuoi4);
    $ss->assign('VMBTREEM2TUOI5',$noidung->vmbtreem2tuoi5);
    $ss->assign('VMBTREEM2TUOI6',$noidung->vmbtreem2tuoi6);
    $ss->assign('VMBTREEM2TUOI7',$noidung->vmbtreem2tuoi7);
    $ss->assign('VMBTREEM2TUOI8',$noidung->vmbtreem2tuoi8);

    $ss->assign('VMBTREEM2TUOIND1',$noidung->vmbtreem2tuoind1);
    $ss->assign('VMBTREEM2TUOIND2',$noidung->vmbtreem2tuoind2);
    $ss->assign('VMBTREEM2TUOIND3',$noidung->vmbtreem2tuoind3);
    $ss->assign('VMBTREEM2TUOIND4',$noidung->vmbtreem2tuoind4);
    $ss->assign('VMBTREEM2TUOIND5',$noidung->vmbtreem2tuoind5);
    $ss->assign('VMBTREEM2TUOIND6',$noidung->vmbtreem2tuoind6);
    $ss->assign('VMBTREEM2TUOIND7',$noidung->vmbtreem2tuoind7);
    $ss->assign('VMBTREEM2TUOIND8',$noidung->vmbtreem2tuoind8);

    $ss->assign('VMBTREEM12TUOI1',$noidung->vmbtreem12tuoi1);
    $ss->assign('VMBTREEM12TUOI2',$noidung->vmbtreem12tuoi2);
    $ss->assign('VMBTREEM12TUOI3',$noidung->vmbtreem12tuoi3);
    $ss->assign('VMBTREEM12TUOI4',$noidung->vmbtreem12tuoi4);
    $ss->assign('VMBTREEM12TUOI5',$noidung->vmbtreem12tuoi5);
    $ss->assign('VMBTREEM12TUOI6',$noidung->vmbtreem12tuoi6);
    $ss->assign('VMBTREEM12TUOI7',$noidung->vmbtreem12tuoi7);
    $ss->assign('VMBTREEM12TUOI8',$noidung->vmbtreem12tuoi8);

    $ss->assign('VMBTREEM12TUOIND1',$noidung->vmbtreem12tuoind1);
    $ss->assign('VMBTREEM12TUOIND2',$noidung->vmbtreem12tuoind2);
    $ss->assign('VMBTREEM12TUOIND3',$noidung->vmbtreem12tuoind3);
    $ss->assign('VMBTREEM12TUOIND4',$noidung->vmbtreem12tuoind4);
    $ss->assign('VMBTREEM12TUOIND5',$noidung->vmbtreem12tuoind5);
    $ss->assign('VMBTREEM12TUOIND6',$noidung->vmbtreem12tuoind6);
    $ss->assign('VMBTREEM12TUOIND7',$noidung->vmbtreem12tuoind7);
    $ss->assign('VMBTREEM12TUOIND8',$noidung->vmbtreem12tuoind8);

    $ss->assign('TAXTREEM1',$noidung->taxtreem1);
    $ss->assign('TAXTREEM2',$noidung->taxtreem2);
    $ss->assign('TAXTREEM3',$noidung->taxtreem3);
    $ss->assign('TAXTREEM4',$noidung->taxtreem4);
    $ss->assign('TAXTREEM5',$noidung->taxtreem5);
    $ss->assign('TAXTREEM6',$noidung->taxtreem6);
    $ss->assign('TAXTREEM7',$noidung->taxtreem7);
    $ss->assign('TAXTREEM8',$noidung->taxtreem8);

    $ss->assign('LANFEE1_3_1',$noidung->landfee1_3_1);
    $ss->assign('LANFEE1_3_3',$noidung->landfee1_3_3);
    $ss->assign('LANFEE1_3_4',$noidung->landfee1_3_4);
    $ss->assign('LANFEE1_3_5',$noidung->landfee1_3_5);
    $ss->assign('LANFEE1_3_7',$noidung->landfee1_3_7);
    $ss->assign('LANFEE1_3_8',$noidung->landfee1_3_8);

    $ss->assign('LANDFEE_2_3_1',$noidung->landfee_2_3_1);
    $ss->assign('LANDFEE_2_3_3',$noidung->landfee_2_3_3);
    $ss->assign('LANDFEE_2_3_4',$noidung->landfee_2_3_4);
    $ss->assign('LANDFEE_2_3_5',$noidung->landfee_2_3_5);
    $ss->assign('LANDFEE_2_3_7',$noidung->landfee_2_3_7);
    $ss->assign('LANDFEE_2_3_8',$noidung->landfee_2_3_8);

    $ss->assign('LANDFEE_1_4_1',$noidung->landfee_1_4_1);
    $ss->assign('LANDFEE_1_4_3',$noidung->landfee_1_4_3);
    $ss->assign('LANDFEE_1_4_4',$noidung->landfee_1_4_4);
    $ss->assign('LANDFEE_1_4_5',$noidung->landfee_1_4_5);
    $ss->assign('LANDFEE_1_4_7',$noidung->landfee_1_4_7);
    $ss->assign('LANDFEE_1_4_8',$noidung->landfee_1_4_8);

    $ss->assign('LANDFEE_2_4_1',$noidung->landfee_2_4_1);
    $ss->assign('LANDFEE_2_4_3',$noidung->landfee_2_4_3);
    $ss->assign('LANDFEE_2_4_4',$noidung->landfee_2_4_4);
    $ss->assign('LANDFEE_2_4_5',$noidung->landfee_2_4_5);
    $ss->assign('LANDFEE_2_4_7',$noidung->landfee_2_4_7);
    $ss->assign('LANDFEE_2_4_8',$noidung->landfee_2_4_8);

    $ss->assign('UPGRADE_MEAL1',$noidung->upgrade_meal1);
    $ss->assign('UPGRADE_MEAL2',$noidung->upgrade_meal2);
    $ss->assign('UPGRADE_MEAL3',$noidung->upgrade_meal3);
    $ss->assign('UPGRADE_MEAL4',$noidung->upgrade_meal4);
    $ss->assign('UPGRADE_MEAL5',$noidung->upgrade_meal5);
    $ss->assign('UPGRADE_MEAL6',$noidung->upgrade_meal6);
    $ss->assign('UPGRADE_MEAL7',$noidung->upgrade_meal7);
    $ss->assign('UPGRADE_MEAL8',$noidung->upgrade_meal8);

    $ss->assign('OPTIONAL_TOUR1',$noidung->optional_tour1);
    $ss->assign('OPTIONAL_TOUR3',$noidung->optional_tour3);
    $ss->assign('OPTIONAL_TOUR4',$noidung->optional_tour4);
    $ss->assign('OPTIONAL_TOUR5',$noidung->optional_tour5);
    $ss->assign('OPTIONAL_TOUR7',$noidung->optional_tour7);
    $ss->assign('OPTIONAL_TOUR8',$noidung->optional_tour8);

    $ss->assign('SINGLE_SUPP_1',$noidung->single_supp_1);
    $ss->assign('SINGLE_SUPP_3',$noidung->single_supp_3);
    $ss->assign('SINGLE_SUPP_4',$noidung->single_supp_4);
    $ss->assign('SINGLE_SUPP_5',$noidung->single_supp_5);
    $ss->assign('SINGLE_SUPP_7',$noidung->single_supp_7);
    $ss->assign('SINGLE_SUPP_8',$noidung->single_supp_8);

    $ss->assign('LANDFEETREEM_2_3_SAO1',$noidung->landfeetreem_2_3sao1);
    $ss->assign('LANDFEETREEM_2_3_SAO3',$noidung->landfeetreem_2_3sao3);
    $ss->assign('LANDFEETREEM_2_3_SAO4',$noidung->landfeetreem_2_3sao4);
    $ss->assign('LANDFEETREEM_2_3_SAO5',$noidung->landfeetreem_2_3sao5);
    $ss->assign('LANDFEETREEM_2_3_SAO7',$noidung->landfeetreem_2_3sao7);
    $ss->assign('LANDFEETREEM_2_3_SAO8',$noidung->landfeetreem_2_3sao8);

    $ss->assign('LANDFEETREEM12_3SAO1',$noidung->landfeetreem12_3sao1);
    $ss->assign('LANDFEETREEM12_3SAO3',$noidung->landfeetreem12_3sao3);
    $ss->assign('LANDFEETREEM12_3SAO4',$noidung->landfeetreem12_3sao4);
    $ss->assign('LANDFEETREEM12_3SAO5',$noidung->landfeetreem12_3sao5);
    $ss->assign('LANDFEETREEM12_3SAO7',$noidung->landfeetreem12_3sao7);
    $ss->assign('LANDFEETREEM12_3SAO8',$noidung->landfeetreem12_3sao8);

    $ss->assign('LANDFEE4SAO_TREEM2TUOI1',$noidung->landfee4sao_treem2tuoi1);
    $ss->assign('LANDFEE4SAO_TREEM2TUOI3',$noidung->landfee4sao_treem2tuoi3);
    $ss->assign('LANDFEE4SAO_TREEM2TUOI4',$noidung->landfee4sao_treem2tuoi4);
    $ss->assign('LANDFEE4SAO_TREEM2TUOI5',$noidung->landfee4sao_treem2tuoi5);
    $ss->assign('LANDFEE4SAO_TREEM2TUOI7',$noidung->landfee4sao_treem2tuoi7);
    $ss->assign('LANDFEE4SAO_TREEM2TUOI8',$noidung->landfee4sao_treem2tuoi8);

    $ss->assign('LANDFEE4SAO_TREEM12TUOI1',$noidung->landfee4sao_treem12tuoi1);
    $ss->assign('LANDFEE4SAO_TREEM12TUOI3',$noidung->landfee4sao_treem12tuoi3);
    $ss->assign('LANDFEE4SAO_TREEM12TUOI4',$noidung->landfee4sao_treem12tuoi4);
    $ss->assign('LANDFEE4SAO_TREEM12TUOI5',$noidung->landfee4sao_treem12tuoi5);
    $ss->assign('LANDFEE4SAO_TREEM12TUOI7',$noidung->landfee4sao_treem12tuoi7);
    $ss->assign('LANDFEE4SAO_TREEM12TUOI8',$noidung->landfee4sao_treem12tuoi8);

    $ss->assign('VISATHONGHANH1',$noidung->visathonghanh1);
    $ss->assign('VISATHONGHANH3',$noidung->visathonghanh3);
    $ss->assign('VISATHONGHANH4',$noidung->visathonghanh4);
    $ss->assign('VISATHONGHANH5',$noidung->visathonghanh5);
    $ss->assign('VISATHONGHANH7',$noidung->visathonghanh7);
    $ss->assign('VISATHONGHANH8',$noidung->visathonghanh8);

    $ss->assign('VISADICHTHUAT1',$noidung->visadichthuat1);
    $ss->assign('VISADICHTHUAT3',$noidung->visadichthuat3);
    $ss->assign('VISADICHTHUAT4',$noidung->visadichthuat4);
    $ss->assign('VISADICHTHUAT5',$noidung->visadichthuat5);
    $ss->assign('VISADICHTHUAT7',$noidung->visadichthuat7);
    $ss->assign('VISADICHTHUAT8',$noidung->visadichthuat8);

    $ss->assign('PHICHUYENPHATHOSO1',$noidung->phichuyenphathoso1);
    $ss->assign('PHICHUYENPHATHOSO3',$noidung->phichuyenphathoso3);
    $ss->assign('PHICHUYENPHATHOSO4',$noidung->phichuyenphathoso4);
    $ss->assign('PHICHUYENPHATHOSO5',$noidung->phichuyenphathoso5);
    $ss->assign('PHICHUYENPHATHOSO7',$noidung->phichuyenphathoso7);
    $ss->assign('PHICHUYENPHATHOSO8',$noidung->phichuyenphathoso8);

    $ss->assign('PHITHUMOI1',$noidung->phithumoi1);
    $ss->assign('PHITHUMOI3',$noidung->phithumoi3);
    $ss->assign('PHITHUMOI4',$noidung->phithumoi4);
    $ss->assign('PHITHUMOI5',$noidung->phithumoi5);
    $ss->assign('PHITHUMOI7',$noidung->phithumoi7);
    $ss->assign('PHITHUMOI8',$noidung->phithumoi8);

    $ss->assign('VISATREEM2TUOI1',$noidung->visatreem2tuoi1);
    $ss->assign('VISATREEM2TUOI3',$noidung->visatreem2tuoi3);
    $ss->assign('VISATREEM2TUOI4',$noidung->visatreem2tuoi4);
    $ss->assign('VISATREEM2TUOI5',$noidung->visatreem2tuoi5);
    $ss->assign('VISATREEM2TUOI7',$noidung->visatreem2tuoi7);
    $ss->assign('VISATREEM2TUOI8',$noidung->visatreem2tuoi8);

    $ss->assign('VISATREEM12TUOI1',$noidung->visatreem12tuoi1);
    $ss->assign('VISATREEM12TUOI3',$noidung->visatreem12tuoi3);
    $ss->assign('VISATREEM12TUOI4',$noidung->visatreem12tuoi4);
    $ss->assign('VISATREEM12TUOI5',$noidung->visatreem12tuoi5);
    $ss->assign('VISATREEM12TUOI7',$noidung->visatreem12tuoi7);
    $ss->assign('VISATREEM12TUOI8',$noidung->visatreem12tuoi8);

    $ss->assign('TOUR_LEADER1',$noidung->tour_leader1);
    $ss->assign('TOUR_LEADER2',$noidung->tour_leader2);
    $ss->assign('TOUR_LEADER3',$noidung->tour_leader3);
    $ss->assign('TOUR_LEADER4',$noidung->tour_leader4);
    $ss->assign('TOUR_LEADER5',$noidung->tour_leader5);
    $ss->assign('TOUR_LEADER6',$noidung->tour_leader6);
    $ss->assign('TOUR_LEADER7',$noidung->tour_leader7);
    $ss->assign('TOUR_LEADER8',$noidung->tour_leader8);

    $ss->assign('CHIPHIKHAC1',$noidung->chiphikhac1);
    $ss->assign('CHIPHIKHAC3',$noidung->chiphikhac3);
    $ss->assign('CHIPHIKHAC4',$noidung->chiphikhac4);
    $ss->assign('CHIPHIKHAC5',$noidung->chiphikhac5);
    $ss->assign('CHIPHIKHAC7',$noidung->chiphikhac7);
    $ss->assign('CHIPHIKHAC8',$noidung->chiphikhac8);

    $ss->assign('BAOHIEM1',$noidung->baohiem1);
    $ss->assign('BAOHIEM3',$noidung->baohiem3);
    $ss->assign('BAOHIEM4',$noidung->baohiem4);
    $ss->assign('BAOHIEM5',$noidung->baohiem5);
    $ss->assign('BAOHIEM7',$noidung->baohiem7);
    $ss->assign('BAOHIEM8',$noidung->baohiem8);

    $ss->assign('BAOHIEMTREEM2TUOI1',$noidung->baohiemtreem2tuoi1);
    $ss->assign('BAOHIEMTREEM2TUOI3',$noidung->baohiemtreem2tuoi3);
    $ss->assign('BAOHIEMTREEM2TUOI4',$noidung->baohiemtreem2tuoi4);
    $ss->assign('BAOHIEMTREEM2TUOI5',$noidung->baohiemtreem2tuoi5);
    $ss->assign('BAOHIEMTREEM2TUOI7',$noidung->baohiemtreem2tuoi7);
    $ss->assign('BAOHIEMTREEM2TUOI8',$noidung->baohiemtreem2tuoi8);

    $ss->assign('BAOHIEMTREEM12TUOI1',$noidung->baohiemtreem12tuoi1);        
    $ss->assign('BAOHIEMTREEM12TUOI3',$noidung->baohiemtreem12tuoi3);        
    $ss->assign('BAOHIEMTREEM12TUOI4',$noidung->baohiemtreem12tuoi4);        
    $ss->assign('BAOHIEMTREEM12TUOI5',$noidung->baohiemtreem12tuoi5);        
    $ss->assign('BAOHIEMTREEM12TUOI7',$noidung->baohiemtreem12tuoi7);        
    $ss->assign('BAOHIEMTREEM12TUOI8',$noidung->baohiemtreem12tuoi8);  

    $ss->assign('VISATIP1',$noidung->visatip1);  
    $ss->assign('VISATIP2',$noidung->visatip2);  
    $ss->assign('VISATIP3',$noidung->visatip3);  
    $ss->assign('VISATIP4',$noidung->visatip4);  
    $ss->assign('VISATIP5',$noidung->visatip5);  
    $ss->assign('VISATIP6',$noidung->visatip6);  
    $ss->assign('VISATIP7',$noidung->visatip7);  
    $ss->assign('VISATIP8',$noidung->visatip8);  

    $ss->assign('QUATANG1',$noidung->quatang1);  
    $ss->assign('QUATANG3',$noidung->quatang3);  
    $ss->assign('QUATANG4',$noidung->quatang4);  
    $ss->assign('QUATANG5',$noidung->quatang5);  
    $ss->assign('QUATANG7',$noidung->quatang7);  
    $ss->assign('QUATANG8',$noidung->quatang8);  

    $ss->assign('LAND2_1',$noidung->land2_1);  
    $ss->assign('LAND2_3',$noidung->land2_3);  
    $ss->assign('LAND2_4',$noidung->land2_4);  
    $ss->assign('LAND2_5',$noidung->land2_5);  
    $ss->assign('LAND2_7',$noidung->land2_7);  
    $ss->assign('LAND2_8',$noidung->land2_8);  

    $ss->assign('CPK1',$noidung->cpk1);  
    $ss->assign('CPK3',$noidung->cpk3);  
    $ss->assign('CPK4',$noidung->cpk4);  
    $ss->assign('CPK5',$noidung->cpk5);  
    $ss->assign('CPK7',$noidung->cpk7);  
    $ss->assign('CPK8',$noidung->cpk8);  

    $ss->assign('CHENHLECHTYGIA1',$noidung->chenhlechtygia1);  
    $ss->assign('CHENHLECHTYGIA3',$noidung->chenhlechtygia3);  
    $ss->assign('CHENHLECHTYGIA4',$noidung->chenhlechtygia4);  
    $ss->assign('CHENHLECHTYGIA5',$noidung->chenhlechtygia5);  
    $ss->assign('CHENHLECHTYGIA7',$noidung->chenhlechtygia7);  
    $ss->assign('CHENHLECHTYGIA8',$noidung->chenhlechtygia8);  

    // phan ghi chu va foc

    $ss->assign('NGHICHIVMBNL',$noidung->ghichuvmbnl );
    $ss->assign('FOCVMBNGUOILON',$noidung->focvmbnguoilon) ;
    $ss->assign('GHICHUTAXTAMTINH',$noidung->ghichutaxtamtinh) ;
    $ss->assign('FOCTAXTAMTINH',$noidung->foctaxtamtinh );
    $ss->assign('GHICHUVMBNDNL',$noidung->ghichuvmbndnl) ;
    $ss->assign('FOCVMBNDNGUOILON',$noidung->focvmbndnguoilon );
    $ss->assign('GHICHUXEDONTIEN',$noidung->ghichuxedontien );
    $ss->assign('FOCXEDONTIEN',$noidung->focxedontien) ;
    $ss->assign('GHICHUVMBTE2TUOI',$noidung->chichuvmbte2tuoi);
    $ss->assign('FOCVMBTEDUOI2TUOI',$noidung->focvmbteduoi2tuoi) ;
    $ss->assign('GHICHUVMBNDTE2TUOI',$noidung->ghichuvmbndte2tuoi) ;
    $ss->assign('FOCVMBNDTEDUOI2TUOI',$noidung->focvmbndteduoi2tuoi) ;
    $ss->assign('GHICHUVMBTE12TUOI',$noidung->ghichuvmbte12tuoi);
    $ss->assign('FOCVMBTE12TUOI',$noidung->focvmbte12tuoi);
    $ss->assign('GHICHUVMBNDTE12TUOI',$noidung->ghichuvmbndte12tuoi);
    $ss->assign('FOCVMBNDTE12TUOI',$noidung->focvmbndte12tuoi);
    $ss->assign('GHICHUTAXTE',$noidung->ghichutaxte );
    $ss->assign('FOCTAXTE',$noidung->foctaxte );
    $ss->assign('GHICHULANGFEE1_3SAO',$noidung->ghichulandfee1_3sao) ;
    $ss->assign('FOCLANDFEE1_3SAO',$noidung->foclandfee1_3sao) ;
    $ss->assign('GHICHULANDFEE2_3SAO',$noidung->ghichulandfee2_3sao) ;
    $ss->assign('FOCLANDFEE2_3SAO',$noidung->foclandfee2_3sao );
    $ss->assign('GHICHULANDFEE1_4SAO',$noidung->ghichulandfee1_4sao );
    $ss->assign('FOCLANDFEE1_4SAO',$noidung->foclandfee1_4sao );
    $ss->assign('GHICHULANDFEE2_4SAO',$noidung->ghichulandfee2_4sao );
    $ss->assign('FOCLANDFEE2_4SAO',$noidung->foclandfee2_4sao );
    $ss->assign('GHICHUUPGRADEMEAL',$noidung->ghichuupgrademeal) ;
    $ss->assign('FOCUPGRADEMEAL',$noidung->focupgrademeal );
    $ss->assign('GHICHUOPTIONALTOUR',$noidung->ghichuoptionaltour );
    $ss->assign('FOCOPTIONALTOUR',$noidung->focoptionaltour );
    $ss->assign('GHICHUSINGLESUPP',$noidung->ghichusinglesupp) ;
    $ss->assign('FOCSINGLESUPP',$noidung->focsinglesupp) ;
    $ss->assign('GHICHULANDFEETE3SAO2TUOI',$noidung->ghichulandfete3sao2tuoi );
    $ss->assign('FOCLANDFEETE3SAOTEDUOI2TUOI',$noidung->foclandfeete3saoteduoi2tuoi) ;
    $ss->assign('GHICHULANDFEETE3SAO12TUOI',$noidung->ghichulandfeete3sao12tuoi) ;
    $ss->assign('FOCLANDFEETE3SAOTE12SAO',$noidung->foclandfeete3saote12tuoi) ;
    $ss->assign('GHICHULANDFEETE4SAO2TUOI',$noidung->ghichulandfee4saote2tuoi );
    $ss->assign('FOCLANDFEE4SAOTEDUOI2TUOI',$noidung->foclandfee4saoteduoi2tuoi );
    $ss->assign('GHICHULANDFEE4SAOTE12TUOI',$noidung->ghichulandfee4saote12tuoi );
    $ss->assign('FOCLANDFEETE4SAOTE12TUOI',$noidung->foclandfee4saote12tuoi );
    $ss->assign('GHICHUVISA',$noidung->ghichuvisa );
    $ss->assign('FOCVISA',$noidung->focvisa );
    $ss->assign('GHICHUDICHTHUATCONGCHUNG',$noidung->ghichudichthuatcongchung );
    $ss->assign('FOCDICHTHUATCONGCHUNG',$noidung->focdichthuatcongchung) ;
    $ss->assign('GHICHUCHUYENPHATHOSO',$noidung->ghichuchuyenphathoso );
    $ss->assign('FOCCHUYENPHAT',$noidung->focchuyenphat );
    $ss->assign('FOCCHUYENPHAT',$noidung->ghichuphithumoi );
    $ss->assign('FOCCHIPHIMOI',$noidung->focchiphimoi );
    $ss->assign('GHICHUPHIVISATE2TUOI',$noidung->ghichuphivisate2tuoi );
    $ss->assign('FOCPHIVISA2TUOI',$noidung->focphivisate2tuoi);
    $ss->assign('GHICHUPHIVISATE12TUOI',$noidung->ghichuphivisate12tuoi) ;
    $ss->assign('FOCPHIVISATE12TUOI',$noidung->focchiphivisate12tuoi);
    $ss->assign('GHICHUTOURLEADER',$noidung->ghichutourleader );
    $ss->assign('FOCTOURLEADER',$noidung->foctourleader );
    $ss->assign('GHICHUCHIPHIKHAC',$noidung->ghichuchiphikhac );
    $ss->assign('FOCCHIPHIKHAC',$noidung->focchiphikhac);
    $ss->assign('GHICHUBAOHIEM',$noidung->ghichubaohiem );
    $ss->assign('FOCBAOHIEM',$noidung->focbaohiem );
    $ss->assign('GHICHUBAOHIEMTE2TUOI',$noidung->ghichubaohiemte2tuoi );
    $ss->assign('FOCBAOHIEMTEDUOI2TUOI',$noidung->focbaohiemteduoi2tuoi);
    $ss->assign('GHICHUBAOHIEMTE12TUOI',$noidung->ghichubaohiemte12tuoi) ;
    $ss->assign('FOCBAOHIEMTE12TUOI',$noidung->focbaohiemte12tuoi );
    $ss->assign('GHICHUTIP',$noidung->ghichutip) ;
    $ss->assign('FOCTIP',$noidung->foctip );
    $ss->assign('GHICHUQUATANG',$noidung->ghichuquatang );
    $ss->assign('FOCQUATANG',$noidung->focquatang );
    $ss->assign('GHICHULAND2',$noidung->ghichuland2);
    $ss->assign('FOCLAND2',$noidung->focland2 );
    $ss->assign('GHICHUCPK',$noidung->ghichucpk );
    $ss->assign('FOCCPK',$noidung->foccpk) ;
    $ss->assign('GHICHUCHENHLECHTYGIA',$noidung->ghichuchenhlachtygia) ;
    $ss->assign('FOCCHENHLECHTYGIA',$noidung->focchenhlechtygia);

    $THUOPTION = $noidung->thuoption;
    $countThuOption = count($THUOPTION);
    if($countThuOption>0){
        $ss->assign('COUNTTHUOPTION',$countThuOption);
        $ThuHtml = '';
        foreach($THUOPTION as $val){
            $ThuHtml .= '<tr>';
            $ThuHtml .= '<td><input type="text" name="thu_dichvu[]" id="thu_dichvu" class="thuoption thu_dichvu" size="50" value="'.$val->thu_dichvu.'"></td>';
            $ThuHtml .= '<td><input type="text" name="thu_soluong[]" id="thu_soluong" class="thuoption numbers thu_soluong" size="15" value="'.$val->thu_soluong.'"></td>';
            $ThuHtml .= '<td><input type="text" name="textfield3" id="textfield3" class="thuoption x" size="5" value="X"></td>';
            $ThuHtml .= '<td><input type="text" name="thu_dongia[]" id="thu_dongia" class="thuoption numbers dongia thu_dongia1"  size="15" value="'.$val->thu_dongia.'"></td>';
            $ThuHtml .= '<td><input type="text" name="thu_thanhtien[]" id="thu_thanhtien" class="thuoption numbers thu_thanhtien1" size="15" value="'.$val->thu_thanhtien.'"></td>';
            $ThuHtml .= '<td><input type="text" name="thu_dongiamot[]" id="thu_dongiamot" class="thuoption numbers dongia thu_dongia2" size="15" value="'.$val->thu_dongiamot.'"></td>';
            $ThuHtml .= '<td><input type="text" name="thu_thanhtienmot[]" id="thu_thanhtienmot" class="thuoption numbers thu_thanhtien2" size="15" value="'.$val->thu_thanhtienmot.'"></td>';
            $ThuHtml .= '<td>&nbsp;</td>';
            $ThuHtml .= '<td>&nbsp;</td>';
            $ThuHtml .= '</tr>';
        }
        $ss->assign(THUHTML,$ThuHtml); 
    }
    $CHIOPTION = $noidung->chioption;
    $countChiOption = count($CHIOPTION);
    if($countChiOption>0){
        $ChiHtml = '';
        foreach($CHIOPTION as $chioption){
            $ChiHtml .= '<tr>';
            $ChiHtml .= '<td><input type="text" name="chi_dichvu[]" id="chi_dichvu" class="chioption chi_dichvu" value="'.$chioption->chi_dichvu.'" size="50"></td>';
            $ChiHtml .= '<td><input type="text" name="chi_soluong[]" id="chi_soluong" class="chioption numbers chi_soluong" value="'.$chioption->chi_soluong.'" size="15"></td>';
            $ChiHtml .= '<td><input type="text" name="textfield3" id="textfield3" class="chioption x" size="5" value="X"></td>';
            $ChiHtml .= '<td><input type="text" name="chi_dongia[]" id="chi_dongia" class="chioption numbers dongia chi_dongia" value="'.$chioption->chi_dongia.'" size="15"></td>';
            $ChiHtml .= '<td><input type="text" name="chi_thanhtien[]" id="chi_thanhtien" class="chioption numbers chi_thanhtien" value="'.$chioption->chi_thanhtien.'" size="15"></td>';
            $ChiHtml .= '<td>&nbsp;</td>';
            $ChiHtml .= '<td>&nbsp;</td>';
            $ChiHtml .= '<td><input type="button" class="btnAddRow" value="Add Row"/></td>';
            $ChiHtml .= '<td><input type="button" class="btnDelRow" value="Delete Row"/></td>';
            $ChiHtml .= '</tr>';
        }
        $ss-> assign('COUNTCHIOPTION',$countChiOption);
        $ss-> assign('CHIHTML',$ChiHtml);
    }
    // thu option 
    $ss->assign('TONGTIEN_THU', $focus->tongtien_thu);
    $ss->assign('TONGTIEN_THU1', $focus->tongtien_thu1);
    // chi option
    $ss->assign('TONGTIEN_CHI', $focus->tongtien_chi);
    $ss->assign('TONGTIEN_CHI1', $focus->tongtien_chi1);
    
    $view_chang_log_data = array(
        "call_back_function" => "set_return",
        "form_name" => "EditView",
        "field_to_name_array" => '[]',
        );
    $ss->assign('view_change_log',json_encode($view_chang_log_data));
    
    $ss->display("modules/Worksheets/tpls/Outbound.tpl");
?>
