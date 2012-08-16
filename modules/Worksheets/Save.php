<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    $focus =new Worksheets();
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
    // PHẦN CHIẾT TÍNH OUTBOUND
    if($focus->type == "Outbound"){
        $focus->noidung->outbound_currency = $_POST['outbound_currency'];
        $focus->noidung->hanhtrinh = $_POST['HanhTrinh'];
        $focus->noidung->NguoiLon1 = $_POST['NguoiLon1'];
        $focus->noidung->NguoiLon2 = $_POST['NguoiLon2'];
        $focus->noidung->TreEm2Tuoi1 = $_POST['TreEm2Tuoi1'];
        $focus->noidung->TreEm2Tuoi2 = $_POST['TreEm2Tuoi2'];
        $focus->noidung->TreEm12Tuoi1 = $_POST['TreEm12Tuoi1'];
        $focus->noidung->TreEm12Tuoi2 = $_POST['TreEm12Tuoi2'];
        $focus->noidung->txtSoBuaAn1 = $_POST['txtSoBuaAn1'];
        $focus->noidung->txtSoBuaAn2 = $_POST['txtSoBuaAn2'];
        $focus->noidung->txtTourLeader1 = $_POST['txtTourLeader1'];
        $focus->noidung->txtTourLeader2 = $_POST['txtTourLeader2'];
        $focus->noidung->txtFOCVMB1 = $_POST['txtFOCVMB1'];
        $focus->noidung->txtFOCVMB2 = $_POST['txtFOCVMB2'];
        $focus->noidung->txtFOCLand1 = $_POST['txtFOCLand1'];
        $focus->noidung->txtFOCLand2 = $_POST['txtFOCLand2'];
        $focus->noidung->txtFOCVMBNoiDia1 = $_POST['txtFOCVMBNoiDia1'];
        $focus->noidung->txtFOCVMBNoiDia2 = $_POST['txtFOCVMBNoiDia2'];
        $focus->noidung->txtCLTG = $_POST['txtCLTG'];
        $focus->noidung->land_treem = $_POST['land_treem'];
        $focus->noidung->foc_number = $_POST['foc_number'];
        $focus->noidung->single1 = $_POST['single1'];
        $focus->noidung->single2 = $_POST['single2'];
        $focus->noidung->ks3saonguoilon1 = $_POST['ks3saonguoilon1'];
        $focus->noidung->ks3saonguoilon2 = $_POST['ks3saonguoilon2'];
        $focus->noidung->ks3saonguoilon3 = $_POST['ks3saonguoilon3'];
        $focus->noidung->ks3saonguoilon4 = $_POST['ks3saonguoilon4'];
        $focus->noidung->ks3saonguoilon5 = $_POST['ks3saonguoilon5'];
        $focus->noidung->ks3saonguoilon6 = $_POST['ks3saonguoilon6'];

        $focus->noidung->ks4saonguoilon1 = $_POST['ks4saonguoilon1'];
        $focus->noidung->ks4saonguoilon2 = $_POST['ks4saonguoilon2'];
        $focus->noidung->ks4saonguoilon3 = $_POST['ks4saonguoilon3'];
        $focus->noidung->ks4saonguoilon4 = $_POST['ks4saonguoilon4'];

        $focus->noidung->ks3saophuthukhac1 = $_POST['ks3saophuthukhac1'];
        $focus->noidung->ks3saophuthukhac2 = $_POST['ks3saophuthukhac2'];
        $focus->noidung->ks3saophuthukhac3 = $_POST['ks3saophuthukhac3'];
        $focus->noidung->ks3saophuthukhac4 = $_POST['ks3saophuthukhac4'];
        $focus->noidung->ks3saophuthukhac5 = $_POST['ks3saophuthukhac5'];
        $focus->noidung->ks3saophuthukhac6 = $_POST['ks3saophuthukhac6'];

        $focus->noidung->ks4saophuthukhac1 = $_POST['ks4saophuthukhac1'];
        $focus->noidung->ks4saophuthukhac2 = $_POST['ks4saophuthukhac2'];
        $focus->noidung->ks4saophuthukhac3 = $_POST['ks4saophuthukhac3'];
        $focus->noidung->ks4saophuthukhac4 = $_POST['ks4saophuthukhac4'];

        $focus->noidung->ks3saophuthukhac_1 = $_POST['ks3saophuthukhac_1'];
        $focus->noidung->ks3saophuthukhac_2 = $_POST['ks3saophuthukhac_2'];
        $focus->noidung->ks3saophuthukhac_3 = $_POST['ks3saophuthukhac_3'];
        $focus->noidung->ks3saophuthukhac_4 = $_POST['ks3saophuthukhac_4'];
        $focus->noidung->ks3saophuthukhac_5 = $_POST['ks3saophuthukhac_5'];
        $focus->noidung->ks3saophuthukhac_6 = $_POST['ks3saophuthukhac_6'];

        $focus->noidung->ks4saophuthukhac_1 = $_POST['ks4saophuthukhac_1'];
        $focus->noidung->ks4saophuthukhac_2 = $_POST['ks4saophuthukhac_2'];
        $focus->noidung->ks4saophuthukhac_3 = $_POST['ks4saophuthukhac_3'];
        $focus->noidung->ks4saophuthukhac_4 = $_POST['ks4saophuthukhac_4'];

        $focus->noidung->ks3saosinglesupp1 = $_POST['ks3saosinglesupp1'];
        $focus->noidung->ks3saosinglesupp2 = $_POST['ks3saosinglesupp2'];
        $focus->noidung->ks3saosinglesupp3 = $_POST['ks3saosinglesupp3'];
        $focus->noidung->ks3saosinglesupp4 = $_POST['ks3saosinglesupp4'];
        $focus->noidung->ks3saosinglesupp5 = $_POST['ks3saosinglesupp5'];
        $focus->noidung->ks3saosinglesupp6 = $_POST['ks3saosinglesupp6'];

        $focus->noidung->treem2tuoi1 = $_POST['treem2tuoi1'];
        $focus->noidung->treem2tuoi2 = $_POST['treem2tuoi2'];
        $focus->noidung->treem2tuoi3 = $_POST['treem2tuoi3'];
        $focus->noidung->treem2tuoi4 = $_POST['treem2tuoi4'];
        $focus->noidung->treem2tuoi5 = $_POST['treem2tuoi5'];
        $focus->noidung->treem2tuoi6 = $_POST['treem2tuoi6'];
        $focus->noidung->treem2tuoi7 = $_POST['treem2tuoi7'];
        $focus->noidung->treem2tuoi8 = $_POST['treem2tuoi8'];
        $focus->noidung->treem2tuoi9 = $_POST['treem2tuoi9'];
        $focus->noidung->treem2tuoi10 = $_POST['treem2tuoi10'];
        $focus->noidung->treem2tuoi11 = $_POST['treem2tuoi11'];

        $focus->noidung->treem12tuoi1 = $_POST['treem12tuoi1'];
        $focus->noidung->treem12tuoi2 = $_POST['treem12tuoi2'];
        $focus->noidung->treem12tuoi3 = $_POST['treem12tuoi3'];
        $focus->noidung->treem12tuoi4 = $_POST['treem12tuoi4'];
        $focus->noidung->treem12tuoi5 = $_POST['treem12tuoi5'];
        $focus->noidung->treem12tuoi6 = $_POST['treem12tuoi6'];
        $focus->noidung->treem12tuoi7 = $_POST['treem12tuoi7'];
        $focus->noidung->treem12tuoi8 = $_POST['treem12tuoi8'];
        $focus->noidung->treem12tuoi9 = $_POST['treem12tuoi9'];
        $focus->noidung->treem12tuoi10 = $_POST['treem12tuoi10'];
        $focus->noidung->treem12tuoi11 = $_POST['treem12tuoi11'];

        // phần chi

        $focus->noidung->vmbnguoilon1 = $_POST['vmbnguoilon1'];
        $focus->noidung->vmbnguoilon2 = $_POST['vmbnguoilon2'];
        $focus->noidung->vmbnguoilon3 = $_POST['vmbnguoilon3'];
        $focus->noidung->vmbnguoilon4 = $_POST['vmbnguoilon4'];
        $focus->noidung->vmbnguoilon5 = $_POST['vmbnguoilon5'];
        $focus->noidung->vmbnguoilon6 = $_POST['vmbnguoilon6'];
        $focus->noidung->vmbnguoilon7 = $_POST['vmbnguoilon7'];
        $focus->noidung->vmbnguoilon8 = $_POST['vmbnguoilon8'];

        $focus->noidung->taxtamtinh1 = $_POST['taxtamtinh1'];
        $focus->noidung->taxtamtinh2 = $_POST['taxtamtinh2'];
        $focus->noidung->taxtamtinh3 = $_POST['taxtamtinh3'];
        $focus->noidung->taxtamtinh4 = $_POST['taxtamtinh4'];
        $focus->noidung->taxtamtinh5 = $_POST['taxtamtinh5'];
        $focus->noidung->taxtamtinh6 = $_POST['taxtamtinh6'];
        $focus->noidung->taxtamtinh7 = $_POST['taxtamtinh7'];
        $focus->noidung->taxtamtinh8 = $_POST['taxtamtinh8'];

        $focus->noidung->vmbnguoilonnd1 = $_POST['vmbnguoilonnd1'];
        $focus->noidung->vmbnguoilonnd2 = $_POST['vmbnguoilonnd2'];
        $focus->noidung->vmbnguoilonnd3 = $_POST['vmbnguoilonnd3'];
        $focus->noidung->vmbnguoilonnd4 = $_POST['vmbnguoilonnd4'];
        $focus->noidung->vmbnguoilonnd5 = $_POST['vmbnguoilonnd5'];
        $focus->noidung->vmbnguoilonnd6 = $_POST['vmbnguoilonnd6'];
        $focus->noidung->vmbnguoilonnd7 = $_POST['vmbnguoilonnd7'];
        $focus->noidung->vmbnguoilonnd8 = $_POST['vmbnguoilonnd8'];

        $focus->noidung->xedontien1 = $_POST['xedontien1'];
        $focus->noidung->xedontien2 = $_POST['xedontien2'];
        $focus->noidung->xedontien3 = $_POST['xedontien3'];
        $focus->noidung->xedontien4 = $_POST['xedontien4'];
        $focus->noidung->xedontien5 = $_POST['xedontien5'];
        $focus->noidung->xedontien6 = $_POST['xedontien6'];
        $focus->noidung->xedontien7 = $_POST['xedontien7'];
        $focus->noidung->xedontien8 = $_POST['xedontien8'];

        $focus->noidung->vmbtreem2tuoi1 = $_POST['vmbtreem2tuoi1'];
        $focus->noidung->vmbtreem2tuoi2 = $_POST['vmbtreem2tuoi2'];
        $focus->noidung->vmbtreem2tuoi3 = $_POST['vmbtreem2tuoi3'];
        $focus->noidung->vmbtreem2tuoi4 = $_POST['vmbtreem2tuoi4'];
        $focus->noidung->vmbtreem2tuoi5 = $_POST['vmbtreem2tuoi5'];
        $focus->noidung->vmbtreem2tuoi6 = $_POST['vmbtreem2tuoi6'];
        $focus->noidung->vmbtreem2tuoi7 = $_POST['vmbtreem2tuoi7'];
        $focus->noidung->vmbtreem2tuoi8 = $_POST['vmbtreem2tuoi8'];
        $focus->noidung->ks4saosinglesupp1 = $_POST['ks4saosinglesupp1'];
        $focus->noidung->ks4saosinglesupp2 = $_POST['ks4saosinglesupp2'];
        $focus->noidung->ks4saosinglesupp3 = $_POST['ks4saosinglesupp3'];
        $focus->noidung->ks4saosinglesupp4 = $_POST['ks4saosinglesupp4'];

        $focus->noidung->vmbtreem2tuoind1 = $_POST['vmbtreem2tuoind1'];
        $focus->noidung->vmbtreem2tuoind2 = $_POST['vmbtreem2tuoind2'];
        $focus->noidung->vmbtreem2tuoind3 = $_POST['vmbtreem2tuoind3'];
        $focus->noidung->vmbtreem2tuoind4 = $_POST['vmbtreem2tuoind4'];
        $focus->noidung->vmbtreem2tuoind5 = $_POST['vmbtreem2tuoind5'];
        $focus->noidung->vmbtreem2tuoind6 = $_POST['vmbtreem2tuoind6'];
        $focus->noidung->vmbtreem2tuoind7 = $_POST['vmbtreem2tuoind7'];
        $focus->noidung->vmbtreem2tuoind8 = $_POST['vmbtreem2tuoind8'];

        $focus->noidung->vmbtreem12tuoi1 = $_POST['vmbtreem12tuoi1'];
        $focus->noidung->vmbtreem12tuoi2 = $_POST['vmbtreem12tuoi2'];
        $focus->noidung->vmbtreem12tuoi3 = $_POST['vmbtreem12tuoi3'];
        $focus->noidung->vmbtreem12tuoi4 = $_POST['vmbtreem12tuoi4'];
        $focus->noidung->vmbtreem12tuoi5 = $_POST['vmbtreem12tuoi5'];
        $focus->noidung->vmbtreem12tuoi6 = $_POST['vmbtreem12tuoi6'];
        $focus->noidung->vmbtreem12tuoi7 = $_POST['vmbtreem12tuoi7'];
        $focus->noidung->vmbtreem12tuoi8 = $_POST['vmbtreem12tuoi8'];

        $focus->noidung->vmbtreem12tuoind1 = $_POST['vmbtreem12tuoind1'];
        $focus->noidung->vmbtreem12tuoind2 = $_POST['vmbtreem12tuoind2'];
        $focus->noidung->vmbtreem12tuoind3 = $_POST['vmbtreem12tuoind3'];
        $focus->noidung->vmbtreem12tuoind4 = $_POST['vmbtreem12tuoind4'];
        $focus->noidung->vmbtreem12tuoind5 = $_POST['vmbtreem12tuoind5'];
        $focus->noidung->vmbtreem12tuoind6 = $_POST['vmbtreem12tuoind6'];
        $focus->noidung->vmbtreem12tuoind7 = $_POST['vmbtreem12tuoind7'];
        $focus->noidung->vmbtreem12tuoind8 = $_POST['vmbtreem12tuoind8'];

        $focus->noidung->taxtreem1 = $_POST['taxtreem1'];
        $focus->noidung->taxtreem2 = $_POST['taxtreem2'];
        $focus->noidung->taxtreem3 = $_POST['taxtreem3'];
        $focus->noidung->taxtreem4 = $_POST['taxtreem4'];
        $focus->noidung->taxtreem5 = $_POST['taxtreem5'];
        $focus->noidung->taxtreem6 = $_POST['taxtreem6'];
        $focus->noidung->taxtreem7 = $_POST['taxtreem7'];
        $focus->noidung->taxtreem8 = $_POST['taxtreem8'];

        $focus->noidung->landfee1_3_1 = $_POST['landfee1_3_1'];
        $focus->noidung->landfee1_3_2 = $_POST['landfee1_3_2'];
        $focus->noidung->landfee1_3_3 = $_POST['landfee1_3_3'];
        $focus->noidung->landfee1_3_4 = $_POST['landfee1_3_4'];
        $focus->noidung->landfee1_3_5 = $_POST['landfee1_3_5'];
        $focus->noidung->landfee1_3_6 = $_POST['landfee1_3_6'];
        $focus->noidung->landfee1_3_7 = $_POST['landfee1_3_7'];
        $focus->noidung->landfee1_3_8 = $_POST['landfee1_3_8'];

        $focus->noidung->landfee_2_3_1 = $_POST['landfee_2_3_1'];
        $focus->noidung->landfee_2_3_2 = $_POST['landfee_2_3_2'];
        $focus->noidung->landfee_2_3_3 = $_POST['landfee_2_3_3'];
        $focus->noidung->landfee_2_3_4 = $_POST['landfee_2_3_4'];
        $focus->noidung->landfee_2_3_5 = $_POST['landfee_2_3_5'];
        $focus->noidung->landfee_2_3_6 = $_POST['landfee_2_3_6'];
        $focus->noidung->landfee_2_3_7 = $_POST['landfee_2_3_7'];
        $focus->noidung->landfee_2_3_8 = $_POST['landfee_2_3_8'];

        $focus->noidung->landfee_1_4_1 = $_POST['landfee_1_4_1'];
        $focus->noidung->landfee_1_4_2 = $_POST['landfee_1_4_2'];
        $focus->noidung->landfee_1_4_3 = $_POST['landfee_1_4_3'];
        $focus->noidung->landfee_1_4_4 = $_POST['landfee_1_4_4'];
        $focus->noidung->landfee_1_4_5 = $_POST['landfee_1_4_5'];
        $focus->noidung->landfee_1_4_6 = $_POST['landfee_1_4_6'];
        $focus->noidung->landfee_1_4_7 = $_POST['landfee_1_4_7'];
        $focus->noidung->landfee_1_4_8 = $_POST['landfee_1_4_8'];

        $focus->noidung->landfee_2_4_1 = $_POST['landfee_2_4_1'];
        $focus->noidung->landfee_2_4_2 = $_POST['landfee_2_4_2'];
        $focus->noidung->landfee_2_4_3 = $_POST['landfee_2_4_3'];
        $focus->noidung->landfee_2_4_4 = $_POST['landfee_2_4_4'];
        $focus->noidung->landfee_2_4_5 = $_POST['landfee_2_4_5'];
        $focus->noidung->landfee_2_4_6 = $_POST['landfee_2_4_6'];
        $focus->noidung->landfee_2_4_7 = $_POST['landfee_2_4_7'];
        $focus->noidung->landfee_2_4_8 = $_POST['landfee_2_4_8'];

        $focus->noidung->upgrade_meal1 = $_POST['upgrade_meal1'];
        $focus->noidung->upgrade_meal2 = $_POST['upgrade_meal2'];
        $focus->noidung->upgrade_meal3 = $_POST['upgrade_meal3'];
        $focus->noidung->upgrade_meal4 = $_POST['upgrade_meal4'];
        $focus->noidung->upgrade_meal5 = $_POST['upgrade_meal5'];
        $focus->noidung->upgrade_meal6 = $_POST['upgrade_meal6'];
        $focus->noidung->upgrade_meal7 = $_POST['upgrade_meal7'];
        $focus->noidung->upgrade_meal8 = $_POST['upgrade_meal8'];

        $focus->noidung->optional_tour1 = $_POST['optional_tour1'];
        $focus->noidung->optional_tour2 = $_POST['optional_tour2'];
        $focus->noidung->optional_tour3 = $_POST['optional_tour3'];
        $focus->noidung->optional_tour4 = $_POST['optional_tour4'];
        $focus->noidung->optional_tour5 = $_POST['optional_tour5'];
        $focus->noidung->optional_tour6 = $_POST['optional_tour6'];
        $focus->noidung->optional_tour7 = $_POST['optional_tour7'];
        $focus->noidung->optional_tour8 = $_POST['optional_tour8'];

        $focus->noidung->single_supp_1 = $_POST['single_supp_1'];
        $focus->noidung->single_supp_2 = $_POST['single_supp_2'];
        $focus->noidung->single_supp_3 = $_POST['single_supp_3'];
        $focus->noidung->single_supp_4 = $_POST['single_supp_4'];
        $focus->noidung->single_supp_5 = $_POST['single_supp_5'];
        $focus->noidung->single_supp_6 = $_POST['single_supp_6'];
        $focus->noidung->single_supp_7 = $_POST['single_supp_7'];
        $focus->noidung->single_supp_8 = $_POST['single_supp_8'];

        $focus->noidung->landfeetreem_2_3sao1 = $_POST['landfeetreem_2_3sao1'];
        $focus->noidung->landfeetreem_2_3sao2 = $_POST['landfeetreem_2_3sao2'];
        $focus->noidung->landfeetreem_2_3sao3 = $_POST['landfeetreem_2_3sao3'];
        $focus->noidung->landfeetreem_2_3sao4 = $_POST['landfeetreem_2_3sao4'];
        $focus->noidung->landfeetreem_2_3sao5 = $_POST['landfeetreem_2_3sao5'];
        $focus->noidung->landfeetreem_2_3sao6 = $_POST['landfeetreem_2_3sao6'];
        $focus->noidung->landfeetreem_2_3sao7 = $_POST['landfeetreem_2_3sao7'];
        $focus->noidung->landfeetreem_2_3sao8 = $_POST['landfeetreem_2_3sao8'];

        $focus->noidung->landfeetreem12_3sao1 = $_POST['landfeetreem12_3sao1'];
        $focus->noidung->landfeetreem12_3sao2 = $_POST['landfeetreem12_3sao2'];
        $focus->noidung->landfeetreem12_3sao3 = $_POST['landfeetreem12_3sao3'];
        $focus->noidung->landfeetreem12_3sao4 = $_POST['landfeetreem12_3sao4'];
        $focus->noidung->landfeetreem12_3sao5 = $_POST['landfeetreem12_3sao5'];
        $focus->noidung->landfeetreem12_3sao6 = $_POST['landfeetreem12_3sao6'];
        $focus->noidung->landfeetreem12_3sao7 = $_POST['landfeetreem12_3sao7'];
        $focus->noidung->landfeetreem12_3sao8 = $_POST['landfeetreem12_3sao8'];

        $focus->noidung->landfee4sao_treem2tuoi1 = $_POST['landfee4sao_treem2tuoi1'];
        $focus->noidung->landfee4sao_treem2tuoi2 = $_POST['landfee4sao_treem2tuoi2'];
        $focus->noidung->landfee4sao_treem2tuoi3 = $_POST['landfee4sao_treem2tuoi3'];
        $focus->noidung->landfee4sao_treem2tuoi4 = $_POST['landfee4sao_treem2tuoi4'];
        $focus->noidung->landfee4sao_treem2tuoi5 = $_POST['landfee4sao_treem2tuoi5'];
        $focus->noidung->landfee4sao_treem2tuoi6 = $_POST['landfee4sao_treem2tuoi6'];
        $focus->noidung->landfee4sao_treem2tuoi7 = $_POST['landfee4sao_treem2tuoi7'];
        $focus->noidung->landfee4sao_treem2tuoi8 = $_POST['landfee4sao_treem2tuoi8'];

        $focus->noidung->landfee4sao_treem12tuoi1 = $_POST['landfee4sao_treem12tuoi1'];
        $focus->noidung->landfee4sao_treem12tuoi2 = $_POST['landfee4sao_treem12tuoi2'];
        $focus->noidung->landfee4sao_treem12tuoi3 = $_POST['landfee4sao_treem12tuoi3'];
        $focus->noidung->landfee4sao_treem12tuoi4 = $_POST['landfee4sao_treem12tuoi4'];
        $focus->noidung->landfee4sao_treem12tuoi5 = $_POST['landfee4sao_treem12tuoi5'];
        $focus->noidung->landfee4sao_treem12tuoi6 = $_POST['landfee4sao_treem12tuoi6'];
        $focus->noidung->landfee4sao_treem12tuoi7 = $_POST['landfee4sao_treem12tuoi7'];
        $focus->noidung->landfee4sao_treem12tuoi8 = $_POST['landfee4sao_treem12tuoi8'];

        $focus->noidung->visathonghanh1 = $_POST['visathonghanh1'];
        $focus->noidung->visathonghanh2 = $_POST['visathonghanh2'];
        $focus->noidung->visathonghanh3 = $_POST['visathonghanh3'];
        $focus->noidung->visathonghanh4 = $_POST['visathonghanh4'];
        $focus->noidung->visathonghanh5 = $_POST['visathonghanh5'];
        $focus->noidung->visathonghanh6 = $_POST['visathonghanh6'];
        $focus->noidung-> visathonghanh7= $_POST['visathonghanh7'];
        $focus->noidung->visathonghanh8 = $_POST['visathonghanh8'];

        $focus->noidung->visadichthuat1 = $_POST['visadichthuat1'];
        $focus->noidung->visadichthuat2 = $_POST['visadichthuat2'];
        $focus->noidung->visadichthuat3 = $_POST['visadichthuat3'];
        $focus->noidung->visadichthuat4 = $_POST['visadichthuat4'];
        $focus->noidung->visadichthuat5 = $_POST['visadichthuat5'];
        $focus->noidung->visadichthuat6 = $_POST['visadichthuat6'];
        $focus->noidung->visadichthuat7 = $_POST['visadichthuat7'];
        $focus->noidung->visadichthuat8 = $_POST['visadichthuat8'];

        $focus->noidung->phichuyenphathoso1 = $_POST['phichuyenphathoso1'];
        $focus->noidung->phichuyenphathoso2 = $_POST['phichuyenphathoso2'];
        $focus->noidung->phichuyenphathoso3 = $_POST['phichuyenphathoso3'];
        $focus->noidung->phichuyenphathoso4 = $_POST['phichuyenphathoso4'];
        $focus->noidung->phichuyenphathoso5 = $_POST['phichuyenphathoso5'];
        $focus->noidung->phichuyenphathoso6 = $_POST['phichuyenphathoso6'];
        $focus->noidung->phichuyenphathoso7 = $_POST['phichuyenphathoso7'];
        $focus->noidung->phichuyenphathoso8 = $_POST['phichuyenphathoso8'];

        $focus->noidung->phithumoi1 = $_POST['phithumoi1'];
        $focus->noidung->phithumoi2 = $_POST['phithumoi2'];
        $focus->noidung->phithumoi3 = $_POST['phithumoi3'];
        $focus->noidung->phithumoi4 = $_POST['phithumoi4'];
        $focus->noidung->phithumoi5 = $_POST['phithumoi5'];
        $focus->noidung->phithumoi6 = $_POST['phithumoi6'];
        $focus->noidung->phithumoi7 = $_POST['phithumoi7'];
        $focus->noidung->phithumoi8 = $_POST['phithumoi8'];

        $focus->noidung->visatreem2tuoi1 = $_POST['visatreem2tuoi1'];
        $focus->noidung->visatreem2tuoi2 = $_POST['visatreem2tuoi2'];
        $focus->noidung->visatreem2tuoi3 = $_POST['visatreem2tuoi3'];
        $focus->noidung->visatreem2tuoi4 = $_POST['visatreem2tuoi4'];
        $focus->noidung->visatreem2tuoi5 = $_POST['visatreem2tuoi5'];
        $focus->noidung->visatreem2tuoi6 = $_POST['visatreem2tuoi6'];
        $focus->noidung->visatreem2tuoi7 = $_POST['visatreem2tuoi7'];
        $focus->noidung->visatreem2tuoi8 = $_POST['visatreem2tuoi8'];

        $focus->noidung->visatreem12tuoi1 = $_POST['visatreem12tuoi1'];
        $focus->noidung->visatreem12tuoi2 = $_POST['visatreem12tuoi2'];
        $focus->noidung->visatreem12tuoi3 = $_POST['visatreem12tuoi3'];
        $focus->noidung->visatreem12tuoi4 = $_POST['visatreem12tuoi4'];
        $focus->noidung->visatreem12tuoi5 = $_POST['visatreem12tuoi5'];
        $focus->noidung->visatreem12tuoi6 = $_POST['visatreem12tuoi6'];
        $focus->noidung->visatreem12tuoi7 = $_POST['visatreem12tuoi7'];
        $focus->noidung->visatreem12tuoi8 = $_POST['visatreem12tuoi8'];

        $focus->noidung->tour_leader1 = $_POST['tour_leader1'];
        $focus->noidung-> tour_leader2= $_POST['tour_leader2'];
        $focus->noidung->tour_leader3 = $_POST['tour_leader3'];
        $focus->noidung->tour_leader4 = $_POST['tour_leader4'];
        $focus->noidung->tour_leader5 = $_POST['tour_leader5'];
        $focus->noidung->tour_leader6 = $_POST['tour_leader6'];
        $focus->noidung->tour_leader7 = $_POST['tour_leader7'];
        $focus->noidung->tour_leader8 = $_POST['tour_leader8'];

        $focus->noidung->chiphikhac1 = $_POST['chiphikhac1'];
        $focus->noidung->chiphikhac2 = $_POST['chiphikhac2'];
        $focus->noidung->chiphikhac3 = $_POST['chiphikhac3'];
        $focus->noidung->chiphikhac4 = $_POST['chiphikhac4'];
        $focus->noidung->chiphikhac5 = $_POST['chiphikhac5'];
        $focus->noidung->chiphikhac6 = $_POST['chiphikhac6'];
        $focus->noidung->chiphikhac7 = $_POST['chiphikhac7'];
        $focus->noidung->chiphikhac8 = $_POST['chiphikhac8'];

        $focus->noidung->baohiem1 = $_POST['baohiem1'];
        $focus->noidung->baohiem2 = $_POST['baohiem2'];
        $focus->noidung->baohiem3 = $_POST['baohiem3'];
        $focus->noidung->baohiem4 = $_POST['baohiem4'];
        $focus->noidung->baohiem5 = $_POST['baohiem5'];
        $focus->noidung->baohiem6 = $_POST['baohiem6'];
        $focus->noidung->baohiem7 = $_POST['baohiem7'];
        $focus->noidung->baohiem8 = $_POST['baohiem8'];

        $focus->noidung->baohiemtreem2tuoi1 = $_POST['baohiemtreem2tuoi1'];
        $focus->noidung->baohiemtreem2tuoi2 = $_POST['baohiemtreem2tuoi2'];
        $focus->noidung->baohiemtreem2tuoi3 = $_POST['baohiemtreem2tuoi3'];
        $focus->noidung->baohiemtreem2tuoi4 = $_POST['baohiemtreem2tuoi4'];
        $focus->noidung->baohiemtreem2tuoi5 = $_POST['baohiemtreem2tuoi5'];
        $focus->noidung->baohiemtreem2tuoi6 = $_POST['baohiemtreem2tuoi6'];
        $focus->noidung->baohiemtreem2tuoi7 = $_POST['baohiemtreem2tuoi7'];
        $focus->noidung->baohiemtreem2tuoi8 = $_POST['baohiemtreem2tuoi8'];

        $focus->noidung->baohiemtreem12tuoi1 = $_POST['baohiemtreem12tuoi1'];
        $focus->noidung->baohiemtreem12tuoi2 = $_POST['baohiemtreem12tuoi2'];
        $focus->noidung->baohiemtreem12tuoi3 = $_POST['baohiemtreem12tuoi3'];
        $focus->noidung->baohiemtreem12tuoi4 = $_POST['baohiemtreem12tuoi4'];
        $focus->noidung->baohiemtreem12tuoi5 = $_POST['baohiemtreem12tuoi5'];
        $focus->noidung->baohiemtreem12tuoi6 = $_POST['baohiemtreem12tuoi6'];
        $focus->noidung->baohiemtreem12tuoi7 = $_POST['baohiemtreem12tuoi7'];
        $focus->noidung->baohiemtreem12tuoi8 = $_POST['baohiemtreem12tuoi8'];

        $focus->noidung->visatip1 = $_POST['visatip1'];
        $focus->noidung->visatip2 = $_POST['visatip2'];
        $focus->noidung->visatip3 = $_POST['visatip3'];
        $focus->noidung->visatip4 = $_POST['visatip4'];
        $focus->noidung->visatip5 = $_POST['visatip5'];
        $focus->noidung->visatip6 = $_POST['visatip6'];
        $focus->noidung->visatip7 = $_POST['visatip7'];
        $focus->noidung->visatip8 = $_POST['visatip8'];

        $focus->noidung->quatang1 = $_POST['quatang1'];
        $focus->noidung->quatang2 = $_POST['quatang2'];
        $focus->noidung->quatang3 = $_POST['quatang3'];
        $focus->noidung->quatang4 = $_POST['quatang4'];
        $focus->noidung->quatang5 = $_POST['quatang5'];
        $focus->noidung->quatang6 = $_POST['quatang6'];
        $focus->noidung->quatang7 = $_POST['quatang7'];
        $focus->noidung->quatang8 = $_POST['quatang8'];

        $focus->noidung->land2_1 = $_POST['land2_1'];
        $focus->noidung->land2_2 = $_POST['land2_2'];
        $focus->noidung->land2_3 = $_POST['land2_3'];
        $focus->noidung->land2_4 = $_POST['land2_4'];
        $focus->noidung->land2_5 = $_POST['land2_5'];
        $focus->noidung->land2_6 = $_POST['land2_6'];
        $focus->noidung->land2_7 = $_POST['land2_7'];
        $focus->noidung->land2_8 = $_POST['land2_8'];

        $focus->noidung->cpk1 = $_POST['cpk1'];
        $focus->noidung->cpk2 = $_POST['cpk2'];
        $focus->noidung->cpk3 = $_POST['cpk3'];
        $focus->noidung->cpk4 = $_POST['cpk4'];
        $focus->noidung->cpk5 = $_POST['cpk5'];
        $focus->noidung->cpk6 = $_POST['cpk6'];
        $focus->noidung->cpk7 = $_POST['cpk7'];
        $focus->noidung->cpk8 = $_POST['cpk8'];

        $focus->noidung->chenhlechtygia1 = $_POST['chenhlechtygia1'];
        $focus->noidung->chenhlechtygia2 = $_POST['chenhlechtygia2'];
        $focus->noidung->chenhlechtygia3 = $_POST['chenhlechtygia3'];
        $focus->noidung->chenhlechtygia4 = $_POST['chenhlechtygia4'];
        $focus->noidung->chenhlechtygia5 = $_POST['chenhlechtygia5'];
        $focus->noidung->chenhlechtygia6 = $_POST['chenhlechtygia6'];
        $focus->noidung->chenhlechtygia7 = $_POST['chenhlechtygia7'];
        $focus->noidung->chenhlechtygia8 = $_POST['chenhlechtygia8'];

        // phan ghi chu va foc
        $focus->noidung->ghichuvmbnl = $_POST['ghichuvmbnl'];
        $focus->noidung->focvmbnguoilon = $_POST['focvmbnguoilon'];
        $focus->noidung->ghichutaxtamtinh = $_POST['ghichutaxtamtinh'];
        $focus->noidung->foctaxtamtinh = $_POST['foctaxtamtinh'];
        $focus->noidung->ghichuvmbndnl = $_POST['ghichuvmbndnl'];
        $focus->noidung->focvmbndnguoilon = $_POST['focvmbndnguoilon'];
        $focus->noidung->ghichuxedontien = $_POST['ghichuxedontien'];
        $focus->noidung->focxedontien = $_POST['focxedontien'];
        $focus->noidung->chichuvmbte2tuoi = $_POST['chichuvmbte2tuoi'];
        $focus->noidung->focvmbteduoi2tuoi = $_POST['focvmbteduoi2tuoi'];
        $focus->noidung->ghichuvmbndte2tuoi = $_POST['ghichuvmbndte2tuoi'];
        $focus->noidung->focvmbndteduoi2tuoi = $_POST['focvmbndteduoi2tuoi'];
        $focus->noidung->ghichuvmbte12tuoi = $_POST['ghichuvmbte12tuoi'];
        $focus->noidung->focvmbte12tuoi = $_POST['focvmbte12tuoi'];
        $focus->noidung->ghichuvmbndte12tuoi = $_POST['ghichuvmbndte12tuoi'];
        $focus->noidung->focvmbndte12tuoi = $_POST['focvmbndte12tuoi'];
        $focus->noidung->ghichutaxte = $_POST['ghichutaxte'];
        $focus->noidung->foctaxte = $_POST['foctaxte'];
        $focus->noidung->ghichulandfee1_3sao = $_POST['ghichulandfee1_3sao'];
        $focus->noidung->foclandfee1_3sao = $_POST['foclandfee1_3sao'];
        $focus->noidung->ghichulandfee2_3sao = $_POST['ghichulandfee2_3sao'];
        $focus->noidung->foclandfee2_3sao = $_POST['foclandfee2_3sao'];
        $focus->noidung->ghichulandfee1_4sao = $_POST['ghichulandfee1_4sao'];
        $focus->noidung->foclandfee1_4sao = $_POST['foclandfee1_4sao'];
        $focus->noidung->ghichulandfee2_4sao = $_POST['ghichulandfee2_4sao'];
        $focus->noidung->foclandfee2_4sao = $_POST['foclandfee2_4sao'];
        $focus->noidung->ghichuupgrademeal = $_POST['ghichuupgrademeal'];
        $focus->noidung->focupgrademeal = $_POST['focupgrademeal'];
        $focus->noidung->ghichuoptionaltour = $_POST['ghichuoptionaltour'];
        $focus->noidung->focoptionaltour = $_POST['focoptionaltour'];
        $focus->noidung->ghichusinglesupp = $_POST['ghichusinglesupp'];
        $focus->noidung->focsinglesupp = $_POST['focsinglesupp'];
        $focus->noidung->ghichulandfete3sao2tuoi = $_POST['ghichulandfete3sao2tuoi'];
        $focus->noidung->foclandfeete3saoteduoi2tuoi = $_POST['foclandfeete3saoteduoi2tuoi'];
        $focus->noidung->ghichulandfeete3sao12tuoi = $_POST['ghichulandfeete3sao12tuoi'];
        $focus->noidung->foclandfeete3saote12tuoi = $_POST['foclandfeete3saote12tuoi'];
        $focus->noidung->ghichulandfee4saote2tuoi = $_POST['ghichulandfee4saote2tuoi'];
        $focus->noidung->foclandfee4saoteduoi2tuoi = $_POST['foclandfee4saoteduoi2tuoi'];
        $focus->noidung->ghichulandfee4saote12tuoi = $_POST['ghichulandfee4saote12tuoi'];
        $focus->noidung->foclandfee4saote12tuoi = $_POST['foclandfee4saote12tuoi'];
        $focus->noidung->ghichuvisa = $_POST['ghichuvisa'];
        $focus->noidung->focvisa = $_POST['focvisa'];
        $focus->noidung->ghichudichthuatcongchung = $_POST['ghichudichthuatcongchung'];
        $focus->noidung->focdichthuatcongchung = $_POST['focdichthuatcongchung'];
        $focus->noidung->focchuyenphat = $_POST['focchuyenphat'];
        $focus->noidung->ghichuphithumoi = $_POST['ghichuphithumoi'];
        $focus->noidung->focchiphimoi = $_POST['focchiphimoi'];
        $focus->noidung->ghichuphivisate2tuoi = $_POST['ghichuphivisate2tuoi'];
        $focus->noidung->focphivisate2tuoi = $_POST['focphivisate2tuoi'];
        $focus->noidung->ghichuphivisate12tuoi = $_POST['ghichuphivisate12tuoi'];
        $focus->noidung->focchiphivisate12tuoi = $_POST['focchiphivisate12tuoi'];
        $focus->noidung->ghichutourleader = $_POST['ghichutourleader'];
        $focus->noidung->foctourleader = $_POST['foctourleader'];
        $focus->noidung->ghichuchiphikhac = $_POST['ghichuchiphikhac'];
        $focus->noidung->focchiphikhac = $_POST['focchiphikhac'];
        $focus->noidung->ghichubaohiem = $_POST['ghichubaohiem'];
        $focus->noidung->focbaohiem = $_POST['focbaohiem'];
        $focus->noidung->ghichubaohiemte2tuoi = $_POST['ghichubaohiemte2tuoi'];
        $focus->noidung->focbaohiemteduoi2tuoi = $_POST['focbaohiemteduoi2tuoi'];
        $focus->noidung->ghichubaohiemte12tuoi = $_POST['ghichubaohiemte12tuoi'];
        $focus->noidung->focbaohiemte12tuoi = $_POST['focbaohiemte12tuoi'];
        $focus->noidung->ghichutip = $_POST['ghichutip'];
        $focus->noidung->foctip = $_POST['foctip'];
        $focus->noidung->ghichuquatang = $_POST['ghichuquatang'];
        $focus->noidung->focquatang = $_POST['focquatang'];
        $focus->noidung->ghichuland2 = $_POST['ghichuland2'];
        $focus->noidung->focland2 = $_POST['focland2'];
        $focus->noidung->ghichucpk = $_POST['ghichucpk'];
        $focus->noidung->foccpk = $_POST['foccpk'];
        $focus->noidung->ghichuchenhlachtygia = $_POST['ghichuchenhlachtygia'];
        $focus->noidung->focchenhlechtygia = $_POST['focchenhlechtygia'];

        // thu option
        $thuoption = count($_POST['thu_dichvu']);
        for($i=0; $i<$thuoption; $i++){
            $THUOPTION[$i]->thu_dichvu = $_POST['thu_dichvu'][$i];
            $THUOPTION[$i]->thu_soluong = $_POST['thu_soluong'][$i];
            $THUOPTION[$i]->thu_dongia = $_POST['thu_dongia'][$i];
            $THUOPTION[$i]->thu_thanhtien = $_POST['thu_thanhtien'][$i];
            $THUOPTION[$i]->thu_dongiamot = $_POST['thu_dongiamot'][$i];
            $THUOPTION[$i]->thu_thanhtienmot = $_POST['thu_thanhtienmot'][$i];
        }

        $focus->noidung->thuoption = $THUOPTION;

        // chi option

        $chioption = count($_POST['chi_dichvu']);
        for($j=0; $j<$chioption; $j++){
            $CHIOPTION[$j]->chi_dichvu = $_POST['chi_dichvu'][$j];
            $CHIOPTION[$j]->chi_soluong = $_POST['chi_soluong'][$j];
            $CHIOPTION[$j]->chi_dongia = $_POST['chi_dongia'][$j];
            $CHIOPTION[$j]->chi_thanhtien = $_POST['chi_thanhtien'][$j];
        }
        $focus->noidung->chioption = $CHIOPTION;  
        /* if($_POST['groupprograorksheets_name'] != ''){
        $focus->name = 'Worksheets for tour '.$_POST['groupprograorksheets_name'] ;
        }*/
    }

    // PHẦN CHIẾT TÍNH DOS
    if($focus->type == "DOS"){
        $focus->noidung->nhahang_tongthanhtien = $_POST['nhahang_tongthanhtien'];
        $focus->noidung->nhahang_tongthue = $_POST['nhahang_tongthue'];
        $focus->noidung->khachsan_tongthanhtien = $_POST['khachsan_tongthanhtien'];
        $focus->noidung->khachsan_tongthue = $_POST['khachsan_tongthue'];
        $focus->noidung->vanchuyen_tongthanhtien = $_POST['vanchuyen_tongthanhtien'];
        $focus->noidung->vanchuyen_tongthue = $_POST['vanchuyen_tongthue'];
        $focus->noidung->service_tongthanhtien = $_POST['service_tongthanhtien'];
        $focus->noidung->service_tongthue = $_POST['service_tongthue'];
        $focus->noidung->thamquan_tongthanhtien = $_POST['thamquan_tongthanhtien'];
        $focus->noidung->thamquan_tongthue = $_POST['thamquan_tongthue'];
        $focus->noidung->tongchiphi = $_POST['tongchiphi'];
        $focus->noidung->tongthue = $_POST['tongthue'];
        $focus->noidung->tientheotyle = $_POST['tientheotyle'];
        $focus->noidung->tientheotyle = $_POST['tientheotyle'];
        $focus->noidung->hoahong = $_POST['hoahong'];
        $focus->noidung->tonglai = $_POST['tonglai'];
        $focus->noidung->giaban = $_POST['giaban'];
        $focus->noidung->giabantrenmotnguoi = $_POST['giabantrenmotnguoi'];
        $focus->noidung->vatdaura = $_POST['vatdaura'];
        $focus->noidung->vatdauvao = $_POST['vatdauvao'];
        $focus->noidung->vatphaidong = $_POST['vatphaidong'];
        $focus->noidung->doanhthu = $_POST['doanhthu'];
        $focus->noidung->tongchiphi1 = $_POST['tongchiphi1'];
        $focus->noidung->giavontrenkhach = $_POST['giavontrenkhach'];
        $focus->noidung->giabantrenkhach = $_POST['giabantrenkhach'];
        $focus->noidung->laikhach = $_POST['laikhach'];
        $focus->noidung->tylesauthue = $_POST['tylesauthue'];
        
        // phan ve may bay
        
        $vemaybay = count($_POST['vemaybay']);
        for($vmb_mb=0;$vmb_mb<$vemaybay;$vmb_mb++){
            $VMB[$vmb_mb]->vemaybay = $_POST['vemaybay'][$vmb_mb]  ;
            $VMB[$vmb_mb]->vemaybay_dongia = $_POST['vemaybay_dongia'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_soluong = $_POST['vemaybay_soluong'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_foc = $_POST['vemaybay_foc'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_thanhtien = $_POST['vemaybay_thanhtien'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_thuesuat = $_POST['vemaybay_thuesuat'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_vat = $_POST['vemaybay_vat'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_giachuathue = $_POST['vemaybay_giachuathue'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_hinhthucthanhtoan = $_POST['vemaybay_hinhthucthanhtoan'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_check_tam_ung = $_POST['vemaybay_check_tam_ung'][$vmb_mb]  ;   
            $VMB[$vmb_mb]->vemaybay_tamung = $_POST['vemaybay_tamung'][$vmb_mb]  ;   
            $vmb_mb ++;
        }
         $focus->noidung->vemaybay_tongthanhtien = $_POST['vemaybay_tongthanhtien'];
         $focus->noidung->vemaybay_tongthue = $_POST['vemaybay_tongthue'];
         $focus->noidung->vemaybay = $VMB; 
        // PHẦN NHÀ HÀNG
        $nhahang = count($_POST['nh_name']); 
        for($a=0; $a<$nhahang; $a++){
            $NHAHANG[$a]->nh_id = $_POST['nh_id'][$a];
            $NHAHANG[$a]->nh_name = $_POST['nh_name'][$a];
            $NHAHANG[$a]->nh_giathamkhao = $_POST['nh_giathamkhao'][$a];
            $NHAHANG[$a]->nh_dongia = $_POST['nh_dongia'][$a];
            $NHAHANG[$a]->nh_soluong = $_POST['nh_soluong'][$a];
            $NHAHANG[$a]->nh_songay = $_POST['nh_songay'][$a];
            $NHAHANG[$a]->nh_thanhtien = $_POST['nh_thanhtien'][$a];
            $NHAHANG[$a]->nh_thuexuat = $_POST['nh_thuexuat'][$a];
            $NHAHANG[$a]->nh_giachuathue = $_POST['nh_giachuathue'][$a];
            $NHAHANG[$a]->nh_vat = $_POST['nh_vat'][$a];
            $NHAHANG[$a]->nh_hinhthucthanhtoan = $_POST['nh_hinhthucthanhtoan'][$a];
            $NHAHANG[$a]->nh_check_tam_ung = $_POST['nh_check_tam_ung'][$a];
            $NHAHANG[$a]->nh_tamung = $_POST['nh_tamung'][$a];

        }
        $focus->noidung->nhahang = $NHAHANG; 

        // PHẦN KHÁCH SẠN
        $khachsan = count($_POST['ks_name']); 
        for($b=0; $b<$khachsan; $b++){
            $KHACHSAN[$b]->ks_id = $_POST['ks_id'][$b];
            $KHACHSAN[$b]->ks_name = $_POST['ks_name'][$b];
            $KHACHSAN[$b]->ks_ghichu = $_POST['ks_ghichu'][$b];
            $KHACHSAN[$b]->ks_giathamkhao = $_POST['ks_giathamkhao'][$b];
            $KHACHSAN[$b]->ks_dongia = $_POST['ks_dongia'][$b];
            $KHACHSAN[$b]->ks_soluong = $_POST['ks_soluong'][$b];
            $KHACHSAN[$b]->ks_songay = $_POST['ks_songay'][$b];
            $KHACHSAN[$b]->ks_thanhtien = $_POST['ks_thanhtien'][$b];
            $KHACHSAN[$b]->ks_thuexuat = $_POST['nh_thuexuat'][$b];
            $KHACHSAN[$b]->ks_giachuathue = $_POST['ks_giachuathue'][$b];
            $KHACHSAN[$b]->ks_vat = $_POST['ks_vat'][$b];
            $KHACHSAN[$b]->ks_hinhthucthanhtoan = $_POST['ks_hinhthucthanhtoan'][$b];
            $KHACHSAN[$b]->ks_check_tam_ung = $_POST['ks_check_tam_ung'][$b];
            $KHACHSAN[$b]->ks_tamung = $_POST['ks_tamung'][$b];

        }
        $focus->noidung->khachsan = $KHACHSAN; 

        // PHẦN VẬN CHUYỂN
        $vanchuyen = count($_POST['vanchuyen_name']); 
        for($c=0; $c<$vanchuyen; $c++){
            $VANCHUYEN[$c]->vanchuyen_name = $_POST['vanchuyen_name'][$c];
            $VANCHUYEN[$c]->vanchuyen_giathamkhao = $_POST['vanchuyen_giathamkhao'][$c];
            $VANCHUYEN[$c]->vanchuyen_dongia = $_POST['vanchuyen_dongia'][$c];
            $VANCHUYEN[$c]->vanchuyen_soluong = $_POST['vanchuyen_soluong'][$c];
            $VANCHUYEN[$c]->vanchuyen_songay = $_POST['vanchuyen_songay'][$c];
            $VANCHUYEN[$c]->vanchuyen_thanhtien = $_POST['vanchuyen_thanhtien'][$c];
            $VANCHUYEN[$c]->vanchuyen_thuexuat = $_POST['vanchuyen_thuexuat'][$c];
            $VANCHUYEN[$c]->vanchuyen_giachuathue = $_POST['vanchuyen_giachuathue'][$c];
            $VANCHUYEN[$c]->vanchuyen_vat = $_POST['vanchuyen_vat'][$c];
            $VANCHUYEN[$c]->vanchuyen_hinhthucthanhtoan = $_POST['vanchuyen_hinhthucthanhtoan'][$c];
            $VANCHUYEN[$c]->vc_check_tam_ung = $_POST['vc_check_tam_ung'][$c];
            $VANCHUYEN[$c]->vanchuyen_tamung = $_POST['vanchuyen_tamung'][$c];
            $VANCHUYEN[$c]->dongia_option = $_POST['dongia_option'][$c];

        }
        $focus->noidung->vanchuyen = $VANCHUYEN; 

        // phần dịch vụ 
        $dichvu = count($_POST['services_name']); 
        for($d=0; $d<$dichvu; $d++){
            $DICHVU[$d]->services_name = $_POST['services_name'][$d];
            $DICHVU[$d]->services_giathamkhao = $_POST['services_giathamkhao'][$d];
            $DICHVU[$d]->services_dongia = $_POST['services_dongia'][$d];
            $DICHVU[$d]->services_soluong = $_POST['services_soluong'][$d];
            $DICHVU[$d]->services_songay = $_POST['services_songay'][$d];
            $DICHVU[$d]->services_thanhtien = $_POST['services_thanhtien'][$d];
            $DICHVU[$d]->services_thuexuat = $_POST['services_thuexuat'][$d];
            $DICHVU[$d]->services_giachuathue = $_POST['services_giachuathue'][$d];
            $DICHVU[$d]->services_vat = $_POST['services_vat'][$d];
            $DICHVU[$d]->services_hinhthucthanhtoan = $_POST['services_hinhthucthanhtoan'][$d];
            $DICHVU[$d]->sv_check_tam_ung = $_POST['sv_check_tam_ung'][$d];
            $DICHVU[$d]->services_tamung = $_POST['services_tamung'][$d];

        }
        $focus->noidung->dichvu = $DICHVU; 

        // phần tham quan
        $thamquan = count($_POST['thamquan_name']); 
        for($e=0; $e<$thamquan; $e++){
            $THAMQUAN[$e]->thamquan_name = $_POST['thamquan_name'][$e];
            $THAMQUAN[$e]->thamquan_giathamkhao = $_POST['thamquan_giathamkhao'][$e];
            $THAMQUAN[$e]->thamquan_dongia = $_POST['thamquan_dongia'][$e];
            $THAMQUAN[$e]->thamquan_soluong = $_POST['thamquan_soluong'][$e];
            $THAMQUAN[$e]->thamquan_songay = $_POST['thamquan_songay'][$e];
            $THAMQUAN[$e]->thamquan_thanhtien = $_POST['thamquan_thanhtien'][$e];
            $THAMQUAN[$e]->thamquan_thuexuat = $_POST['thamquan_thuexuat'][$e];
            $THAMQUAN[$e]->thamquan_giachuathue = $_POST['thamquan_giachuathue'][$e];
            $THAMQUAN[$e]->thamquan_vat = $_POST['thamquan_vat'][$e];
            $THAMQUAN[$e]->thamquan_hinhthucthanhtoan = $_POST['thamquan_hinhthucthanhtoan'][$e];
            $THAMQUAN[$e]->tq_check_tam_ung = $_POST['tq_check_tam_ung'][$e];
            $THAMQUAN[$e]->thamquan_tamung = $_POST['thamquan_tamung'][$e];

        }
        $focus->noidung->thamquan = $THAMQUAN; 
        // lưu trữ thông tin chi phí khác
        
        $chiphikhac = count($_POST['chiphikhac_loaidichvu']);
        for($i=0;$i<$chiphikhac;$i++){
            $CHIPHIKHAC[$i]->chiphikhac_loaidichvu = $_POST['chiphikhac_loaidichvu'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_giathamkhao = $_POST['chiphikhac_giathamkhao'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_soluong = $_POST['chiphikhac_soluong'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_dongia = $_POST['chiphikhac_dongia'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_foc = $_POST['chiphikhac_foc'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_thanhtien = $_POST['chiphikhac_thanhtien'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_thuesuat = $_POST['chiphikhac_thuesuat'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_giachuathue = $_POST['chiphikhac_giachuathue'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_hinhthucthanhtoan = $_POST['chiphikhac_hinhthucthanhtoan'][$i];
            $CHIPHIKHAC[$i]->cpk_check_tam_ung = $_POST['cpk_check_tam_ung'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_vat = $_POST['chiphikhac_vat'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_tamung = $_POST['chiphikhac_tamung'][$i];
        }
        $focus->noidung->chiphikhac =  $CHIPHIKHAC;
        $focus->noidung->chiphikhac_tongcong =  $_POST['chiphikhac_tongcong'];
        $focus->noidung->chiphikhac_tongthue =  $_POST['chiphikhac_tongthue']; 
        /*if($_POST['groupprograorksheets_name'] != ''){
        $focus->name = 'Worksheets for tour '.$_POST['groupprograorksheets_name'] ;
        }*/  
    }

    // PHẦN CHIẾT TÍNH INBOUND
    if($focus->type == "Inbound"){

        $focus->noidung->huongdanvien = $_POST['huongdanvien'];
        $focus->noidung->ngaybatdau = $_POST['ngaybatdau'];
        $focus->noidung->ngayketthuc = $_POST['ngayketthuc'];
        // dữ liệu phần vé máy bay
         $focus->noidung->vemaybay_tongthanhtien = $_POST['vemaybay_tongthanhtien'];
         $focus->noidung->vemaybay_tongthue = $_POST['vemaybay_tongthue'];
        // vé máy bay ở miền bắc
        $vmb_mienbac = count($_POST['vemaybay_mb']);
        for($vmb_mb = 0; $vmb_mb<$vmb_mienbac; $vmb_mb++){
            $VMB_MB[$vmb_mb]->vemaybay_mb = $_POST['vemaybay_mb'][$vmb_mb]  ;
            $VMB_MB[$vmb_mb]->vemaybay_mb_dongia = $_POST['vemaybay_mb_dongia'][$vmb_mb]  ;
            $VMB_MB[$vmb_mb]->vemaybay_mb_soluong = $_POST['vemaybay_mb_soluong'][$vmb_mb]  ;
            $VMB_MB[$vmb_mb]->vemaybay_mb_foc = $_POST['vemaybay_mb_foc'][$vmb_mb]  ;
            $VMB_MB[$vmb_mb]->vemaybay_mb_thanhtien = $_POST['vemaybay_mb_thanhtien'][$vmb_mb]  ;
            $VMB_MB[$vmb_mb]->vemaybay_mb_thuesuat = $_POST['vemaybay_mb_thuesuat'][$vmb_mb]  ;
            $VMB_MB[$vmb_mb]->vemaybay_mb_vat = $_POST['vemaybay_mb_vat'][$vmb_mb]  ;
        }                            

        $focus->noidung->vmb_mienbac = $VMB_MB;  
        $focus->noidung->vemaybay_mb_tongthanhtien = $_POST['vemaybay_mb_tongthanhtien'];  
        $focus->noidung->vemaybay_mb_tongthue = $_POST['vemaybay_mb_tongthue'];  

        // vé máy bay ở miền trung

        $vmb_mientrung = count($_POST['vemaybay_mt']);
        for($vmb_mt = 0; $vmb_mt<$vmb_mientrung; $vmb_mt++){
            $VMB_MT[$vmb_mt]->vemaybay_mt = $_POST['vemaybay_mt'][$vmb_mt]  ;
            $VMB_MT[$vmb_mt]->vemaybay_mt_dongia = $_POST['vemaybay_mt_dongia'][$vmb_mt]  ;
            $VMB_MT[$vmb_mt]->vemaybay_mt_soluong = $_POST['vemaybay_mt_soluong'][$vmb_mt]  ;
            $VMB_MT[$vmb_mt]->vemaybay_mt_foc = $_POST['vemaybay_mt_foc'][$vmb_mt]  ;
            $VMB_MT[$vmb_mt]->vemaybay_mt_thanhtien = $_POST['vemaybay_mt_thanhtien'][$vmb_mt]  ;
            $VMB_MT[$vmb_mt]->vemaybay_mt_thuesuat = $_POST['vemaybay_mt_thuesuat'][$vmb_mt]  ;
            $VMB_MT[$vmb_mt]->vemaybay_mt_vat = $_POST['vemaybay_mt_vat'][$vmb_mt]  ;
        }
        $focus->noidung->vmb_mientrung = $VMB_MT; 
        $focus->noidung->vemaybay_mt_tongthanhtien = $_POST['vemaybay_mt_tongthanhtien'];  
        $focus->noidung->vemaybay_mt_tongthue = $_POST['vemaybay_mt_tongthue'];  

        // vé máy ở miền nam

        $vmb_miennam = count($_POST['vemaybay_mn']);
        for($vmb_mn = 0; $vmb_mn<$vmb_miennam; $vmb_mn++){
            $VMB_MN[$vmb_mn]->vemaybay_mn = $_POST['vemaybay_mn'][$vmb_mn]  ;
            $VMB_MN[$vmb_mn]->vemaybay_mn_dongia = $_POST['vemaybay_mn_dongia'][$vmb_mn]  ;
            $VMB_MN[$vmb_mn]->vemaybay_mn_soluong = $_POST['vemaybay_mn_soluong'][$vmb_mn]  ;
            $VMB_MN[$vmb_mn]->vemaybay_mn_foc = $_POST['vemaybay_mn_foc'][$vmb_mn]  ;
            $VMB_MN[$vmb_mn]->vemaybay_mn_thanhtien = $_POST['vemaybay_mn_thanhtien'][$vmb_mn]  ;
            $VMB_MN[$vmb_mn]->vemaybay_mn_thuesuat = $_POST['vemaybay_mn_thuesuat'][$vmb_mn]  ;
            $VMB_MN[$vmb_mn]->vemaybay_mn_vat = $_POST['vemaybay_mn_vat'][$vmb_mn]  ;
        }
        $focus->noidung->vmb_miennam = $VMB_MN;
        $focus->noidung->vemaybay_mn_tongthanhtien = $_POST['vemaybay_mn_tongthanhtien'];  
        $focus->noidung->vemaybay_mn_tongthue = $_POST['vemaybay_mn_tongthue']; 

        // data phần nhà hàng
        $focus->noidung->nhahang_tongthanhtien = $_POST['nhahang_tongthanhtien'];
        $focus->noidung->nhahang_tongthue = $_POST['nhahang_tongthue'];
        //dữ liệu nhà hàng tại miền bắc
        $nhahang_mienbac = count($_POST['nh_name_mb']);
        for($nh_mb =0; $nh_mb<$nhahang_mienbac; $nh_mb++){
            $NHAHANG_MIENBAC[$nh_mb]->nh_name = $_POST['nh_name_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_id = $_POST['nh_id_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_ghichu_mb = $_POST['nh_ghichu_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_dongia_mb = $_POST['nh_dongia_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_soluong_mb = $_POST['nh_soluong_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_songay_mb = $_POST['nh_songay_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_foc_mb = $_POST['nh_foc_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_thanhtien_mb = $_POST['nh_thanhtien_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_thuexuat_mb = $_POST['nh_thuexuat_mb'][$nh_mb];
            $NHAHANG_MIENBAC[$nh_mb]->nh_thue_mb = $_POST['nh_thue_mb'][$nh_mb];
        }
        $focus->noidung->nhahang_mienbac = $NHAHANG_MIENBAC;
        $focus->noidung->nhahang_tongthanhtien_mienbac = $_POST['nhahang_tongthanhtien_mienbac'];
        $focus->noidung->nhahang_tongthue_mienbac = $_POST['nhahang_tongthue_mienbac'];
        // dữ liệu nhà hàng tại miền trung

        $nhahang_mientrung = count($_POST[nh_name_mt]);
        for($nh_mt = 0; $nh_mt<$nhahang_mientrung; $nh_mt++){
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_name = $_POST['nh_name_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_id = $_POST['nh_id_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_ghichu_mt = $_POST['nh_ghichu_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_dongia_mt = $_POST['nh_dongia_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_soluong_mt = $_POST['nh_soluong_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_songay_mt = $_POST['nh_songay_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_foc_mt = $_POST['nh_foc_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_thanhtien_mt = $_POST['nh_thanhtien_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_thuexuat_mt = $_POST['nh_thuexuat_mt'][$nh_mt];
            $NHAHANG_MIENTRUNG[$nh_mt]->nh_thue_mt = $_POST['nh_thue_mt'][$nh_mt];
        }
        $focus->noidung->nhahang_mientrung = $NHAHANG_MIENTRUNG;
        $focus->noidung->nhahang_tongthanhtien_mientrung = $_POST['nhahang_tongthanhtien_mientrung'];
        $focus->noidung->nhahang_tongthue_mientrung = $_POST['nhahang_tongthue_mientrung']; 

        // dữ liệu nhà hàng tại miền nam 
        $nhahang_miennam = count($_POST['nh_name_mn']);
        for($nh_mn = 0; $nh_mn<$nhahang_miennam; $nh_mn++){

            $NHAHANG_MIENNAM[$nh_mn]->nh_name = $_POST['nh_name_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_id = $_POST['nh_id_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_ghichu_mn = $_POST['nh_ghichu_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_dongia_mn = $_POST['nh_dongia_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_soluong_mn = $_POST['nh_soluong_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_songay_mn = $_POST['nh_songay_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_foc_mn = $_POST['nh_foc_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_thanhtien_mn = $_POST['nh_thanhtien_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_thuexuat_mn = $_POST['nh_thuexuat_mn'][$nh_mn];
            $NHAHANG_MIENNAM[$nh_mn]->nh_thue_mn = $_POST['nh_thue_mn'][$nh_mn];
        }
        $focus->noidung->nhahang_miennam = $NHAHANG_MIENNAM;
        $focus->noidung->nhahang_tongthanhtien_miennam = $_POST['nhahang_tongthanhtien_miennam'];
        $focus->noidung->nhahang_tongthue_miennam = $_POST['nhahang_tongthue_miennam'];

        // lưu dữ liệu phần khách sạn
        $focus->noidung->khachsan_tongthanhtien = $_POST['khachsan_tongthanhtien'];
        $focus->noidung->khachsan_tongthue = $_POST['khachsan_tongthue'];
        // khách sạn tại miền bắc
        $khachsan_mienbac = count($_POST['tenkhachsan_ks_mb']);
        for($ks_mb = 0; $ks_mb<$khachsan_mienbac; $ks_mb++){
            $KHACHSAN_MIENBAC[$ks_mb]->ks_name = $_POST['tenkhachsan_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->ks_id = $_POST['ks_id_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->SGL_ks_mb = $_POST['SGL_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->SGL_SL_ks_mb = $_POST['SGL_SL_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->DBL_ks_mb = $_POST['DBL_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->DBL_SL_ks_mb = $_POST['DBL_SL_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->TPL_ks_mb = $_POST['TPL_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->TPL_SL_ks_mb = $_POST['TPL_SL_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->foc = $_POST['foc_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->hangphong_ks_mb = $_POST['hangphong_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->songaydem_ks_mb = $_POST['songaydem_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->thanhtien_ks_mb = $_POST['thanhtien_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->thuesuat_ks_mb = $_POST['thuesuat_ks_mb'][$ks_mb] ;
            $KHACHSAN_MIENBAC[$ks_mb]->vat_ks_mb = $_POST['vat_ks_mb'][$ks_mb] ;
        }

        $focus->noidung->khachsan_mienbac = $KHACHSAN_MIENBAC;
        $focus->noidung->khachsan_tongthanhtien_mienbac = $_POST['khachsan_tongthanhtien_mienbac'];
        $focus->noidung->khachsan_tongthue_mienbac = $_POST['khachsan_tongthue_mienbac'];

        // khách sạn tại miền trung
        $khachsan_mientrung = count($_POST['tenkhachsan_ks_mt']);
        for($ks_mt = 0; $ks_mt<$khachsan_mientrung; $ks_mt++){
            $KHACHSAN_MIENTRUNG[$ks_mt]->ks_name = $_POST['tenkhachsan_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->ks_id = $_POST['ks_id_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->SGL_ks_mt = $_POST['SGL_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->SGL_SL_ks_mt = $_POST['SGL_SL_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->DBL_ks_mt = $_POST['DBL_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->DBL_SL_ks_mt = $_POST['DBL_SL_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->TPL_ks_mt = $_POST['TPL_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->TPL_SL_ks_mt = $_POST['TPL_SL_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->foc = $_POST['foc_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->hangphong_ks_mt = $_POST['hangphong_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->songaydem_ks_mt = $_POST['songaydem_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->thanhtien_ks_mt = $_POST['thanhtien_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->thuesuat_ks_mt = $_POST['thuesuat_ks_mt'][$ks_mt] ;
            $KHACHSAN_MIENTRUNG[$ks_mt]->vat_ks_mt = $_POST['vat_ks_mt'][$ks_mt] ;
        }

        $focus->noidung->khachsan_mientrung =  $KHACHSAN_MIENTRUNG; 
        $focus->noidung->khachsan_tongthanhtien_mientrung = $_POST['khachsan_tongthanhtien_mientrung'];
        $focus->noidung->khachsan_tongthue_mientrung = $_POST['khachsan_tongthue_mientrung'];   

        // khách sạn tại miền nam
        $khachsan_miennam = count($_POST['tenkhachsan_ks_mn']);
        for($ks_mn = 0; $ks_mn<$khachsan_miennam; $ks_mn++){
            $KHACHSAN_MIENNAM[$ks_mn]->ks_name = $_POST['tenkhachsan_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->ks_id = $_POST['ks_id_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->SGL_ks_mn = $_POST['SGL_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->SGL_SL_ks_mn = $_POST['SGL_SL_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->DBL_ks_mn = $_POST['DBL_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->DBL_SL_ks_mn = $_POST['DBL_SL_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->TPL_ks_mn = $_POST['TPL_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->TPL_SL_ks_mn = $_POST['TPL_SL_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->foc = $_POST['foc_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->hangphong_ks_mn = $_POST['hangphong_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->songaydem_ks_mn = $_POST['songaydem_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->thanhtien_ks_mn = $_POST['thanhtien_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->thuesuat_ks_mn = $_POST['thuesuat_ks_mn'][$ks_mn] ;
            $KHACHSAN_MIENNAM[$ks_mn]->vat_ks_mn = $_POST['vat_ks_mn'][$ks_mn] ;
        }

        $focus->noidung->khachsan_miennam =  $KHACHSAN_MIENNAM;
        $focus->noidung->khachsan_tongthanhtien_miennam = $_POST['khachsan_tongthanhtien_miennam'];
        $focus->noidung->khachsan_tongthue_miennam = $_POST['khachsan_tongthue_miennam'];   


        // lưu dữ liệu phần vận chuyển
        $focus->noidung->vanchuyen_tongthanhtien = $_POST['vanchuyen_tongthanhtien'];
        $focus->noidung->vanchuyen_tongthue = $_POST['vanchuyen_tongthue'];
        // vận chuyển ở miền bắc
        $vanchuyen_mienbac = count($_POST['vanchuyen_name_mb']);
        for($vc_mb = 0 ; $vc_mb<$vanchuyen_mienbac; $vc_mb++){
            $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_name_mb = $_POST['vanchuyen_name_mb'][$vc_mb] ;
            $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_dongia_mb = $_POST['vanchuyen_dongia_mb'][$vc_mb] ;
            $VANCHUYEN_MIENBAC[$vc_mb]->dongia_option_mb = $_POST['dongia_option_mb'][$vc_mb] ;
            $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_soluong_mb = $_POST['vanchuyen_soluong_mb'][$vc_mb] ;
            $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_songay_mb = $_POST['vanchuyen_songay_mb'][$vc_mb] ;
            $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_foc_mb = $_POST['vanchuyen_foc_mb'][$vc_mb] ;
            $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_thanhtien_mb = $_POST['vanchuyen_thanhtien_mb'][$vc_mb] ;
            $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_thuexuat_mb = $_POST['vanchuyen_thuexuat_mb'][$vc_mb] ;
            $VANCHUYEN_MIENBAC[$vc_mb]->vanchuyen_vat_mb = $_POST['vanchuyen_vat_mb'][$vc_mb] ;
        }
        $focus->noidung->vanchuyen_mienbac = $VANCHUYEN_MIENBAC; 
        $focus->noidung->vanchuyen_tongthanhtien_mienbac = $_POST['vanchuyen_tongthanhtien_mienbac'];
        $focus->noidung->vanchuyen_tongthue_mienbac = $_POST['vanchuyen_tongthue_mienbac'];

        // vận chuyển ở miền trung
        $vanchuyen_mientrung = count($_POST['vanchuyen_name_mt']);
        for($vc_mt = 0 ; $vc_mt<$vanchuyen_mientrung; $vc_mt++){ 
            $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_name_mt = $_POST['vanchuyen_name_mt'][$vc_mt] ;
            $VANCHUYEN_MIENTRUNG[$vc_mt]->dongia_option_mt = $_POST['dongia_option_mt'][$vc_mt] ;
            $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_dongia_mt = $_POST['vanchuyen_dongia_mt'][$vc_mt] ;
            $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_soluong_mt = $_POST['vanchuyen_soluong_mt'][$vc_mt] ;
            $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_songay_mt = $_POST['vanchuyen_songay_mt'][$vc_mt] ;
            $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_foc_mt = $_POST['vanchuyen_foc_mt'][$vc_mt] ;
            $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_thanhtien_mt = $_POST['vanchuyen_thanhtien_mt'][$vc_mt] ;
            $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_thuexuat_mt = $_POST['vanchuyen_thuexuat_mt'][$vc_mt] ;
            $VANCHUYEN_MIENTRUNG[$vc_mt]->vanchuyen_vat_mt = $_POST['vanchuyen_vat_mt'][$vc_mt] ;
        }                

        $focus->noidung->vanchuyen_mientrung = $VANCHUYEN_MIENTRUNG;   
        $focus->noidung->vanchuyen_tongthanhtien_mientrung = $_POST['vanchuyen_tongthanhtien_mientrung'];
        $focus->noidung->vanchuyen_tongthue_mientrung = $_POST['vanchuyen_tongthue_mientrung'];

        // vận chuyển ở miền nam
        $vanchuyen_miennam = count($_POST['vanchuyen_name_mn']);
        for($vc_mn = 0 ; $vc_mn<$vanchuyen_miennam; $vc_mn++){
            $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_name_mn = $_POST['vanchuyen_name_mn'][$vc_mn] ;
            $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_dongia_mn = $_POST['vanchuyen_dongia_mn'][$vc_mn] ;
            $VANCHUYEN_MIENNAM[$vc_mn]->dongia_option_mn = $_POST['dongia_option_mn'][$vc_mn] ;
            $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_soluong_mn = $_POST['vanchuyen_soluong_mn'][$vc_mn] ;
            $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_songay_mn = $_POST['vanchuyen_songay_mn'][$vc_mn] ;
            $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_foc_mn = $_POST['vanchuyen_foc_mn'][$vc_mn] ;
            $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_thanhtien_mn = $_POST['vanchuyen_thanhtien_mn'][$vc_mn] ;
            $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_thuexuat_mn = $_POST['vanchuyen_thuexuat_mn'][$vc_mn] ;
            $VANCHUYEN_MIENNAM[$vc_mn]->vanchuyen_vat_mn = $_POST['vanchuyen_vat_mn'][$vc_mn] ;   
        }
        $focus->noidung->vanchuyen_miennam = $VANCHUYEN_MIENNAM;
        $focus->noidung->vanchuyen_tongthanhtien_miennam = $_POST['vanchuyen_tongthanhtien_miennam'];
        $focus->noidung->vanchuyen_tongthue_miennam = $_POST['vanchuyen_tongthue_miennam'];       

        // lưu dữ liệu phần dịch vụ
        $focus->noidung->service_tongthanhtien = $_POST['service_tongthanhtien'];
        $focus->noidung->service_tongthue = $_POST['service_tongthue'];
        // dich vu o mien bac
        $dichvu_mienbac = count($_POST['services_name_mb']);
        for($sv_mb = 0; $sv_mb <$dichvu_mienbac; $sv_mb++){
            $DICHVU_MIENBAC[$sv_mb]->services_name_mb = $_POST['services_name_mb'][$sv_mb] ;
            $DICHVU_MIENBAC[$sv_mb]->services_dongia_mb = $_POST['services_dongia_mb'][$sv_mb] ;
            $DICHVU_MIENBAC[$sv_mb]->services_soluong_mb = $_POST['services_soluong_mb'][$sv_mb] ;
            $DICHVU_MIENBAC[$sv_mb]->services_songay_mb = $_POST['services_songay_mb'][$sv_mb] ;
            $DICHVU_MIENBAC[$sv_mb]->services_foc_mb = $_POST['services_foc_mb'][$sv_mb] ;
            $DICHVU_MIENBAC[$sv_mb]->services_thanhtien_mb = $_POST['services_thanhtien_mb'][$sv_mb] ;
            $DICHVU_MIENBAC[$sv_mb]->services_thuexuat_mb = $_POST['services_thuexuat_mb'][$sv_mb] ;
            $DICHVU_MIENBAC[$sv_mb]->services_vat_mb = $_POST['services_vat_mb'][$sv_mb] ;
        }
        $focus->noidung->dichvu_mienbac = $DICHVU_MIENBAC; 
        $focus->noidung->service_tongthanhtien_mienbac = $_POST['service_tongthanhtien_mienbac'];
        $focus->noidung->service_tongthue_mienbac = $_POST['service_tongthue_mienbac'];

        // dịch vụ ở miền trung

        $dichvu_mientrung = count($_POST['services_name_mt']);
        for($dv_mt = 0; $dv_mt <$dichvu_mientrung; $dv_mt++){
            $DICHVU_MIENTRUNG[$dv_mt]->services_name_mt = $_POST['services_name_mt'][$dv_mt] ;
            $DICHVU_MIENTRUNG[$dv_mt]->services_dongia_mt = $_POST['services_dongia_mt'][$dv_mt] ; 
            $DICHVU_MIENTRUNG[$dv_mt]->services_soluong_mt = $_POST['services_soluong_mt'][$dv_mt] ; 
            $DICHVU_MIENTRUNG[$dv_mt]->services_songay_mt = $_POST['services_songay_mt'][$dv_mt] ; 
            $DICHVU_MIENTRUNG[$dv_mt]->services_foc_mt = $_POST['services_foc_mt'][$dv_mt] ; 
            $DICHVU_MIENTRUNG[$dv_mt]->services_thanhtien_mt = $_POST['services_thanhtien_mt'][$dv_mt] ; 
            $DICHVU_MIENTRUNG[$dv_mt]->services_thuexuat_mt = $_POST['services_thuexuat_mt'][$dv_mt] ; 
            $DICHVU_MIENTRUNG[$dv_mt]->services_vat_mt = $_POST['services_vat_mt'][$dv_mt] ; 
        }

        $focus->noidung->dichvu_mientrung = $DICHVU_MIENTRUNG; 
        $focus->noidung->service_tongthanhtien_mientrung = $_POST['service_tongthanhtien_mientrung'];
        $focus->noidung->service_tongthue_mientrung = $_POST['service_tongthue_mientrung'];
        // dịch vụ ở miền nam
        $dichvu_miennam = count($_POST['services_name_mn']);  
        for($dv_mv = 0; $dv_mv <$dichvu_miennam; $dv_mv++){
            $DICHVU_MIENNAM[$dv_mv]->services_name_mn = $_POST['services_name_mn'][$dv_mv] ; 
            $DICHVU_MIENNAM[$dv_mv]->services_dongia_mn = $_POST['services_dongia_mn'][$dv_mv] ; 
            $DICHVU_MIENNAM[$dv_mv]->services_soluong_mn = $_POST['services_soluong_mn'][$dv_mv] ; 
            $DICHVU_MIENNAM[$dv_mv]->services_songay_mn = $_POST['services_songay_mn'][$dv_mv] ; 
            $DICHVU_MIENNAM[$dv_mv]->services_foc_mn = $_POST['services_foc_mn'][$dv_mv] ; 
            $DICHVU_MIENNAM[$dv_mv]->services_thanhtien_mn = $_POST['services_thanhtien_mn'][$dv_mv] ; 
            $DICHVU_MIENNAM[$dv_mv]->services_thuexuat_mn = $_POST['services_thuexuat_mn'][$dv_mv] ; 
            $DICHVU_MIENNAM[$dv_mv]->services_vat_mn = $_POST['services_vat_mn'][$dv_mv] ;   
        }

        $focus->noidung->dichvu_miennam = $DICHVU_MIENNAM;  
        $focus->noidung->service_tongthanhtien_miennam = $_POST['service_tongthanhtien_miennam'];
        $focus->noidung->service_tongthue_miennam = $_POST['service_tongthue_miennam'];
        // lưu dữ liệu phần tham quan
        
        $focus->noidung->thamquan_tongthanhtien = $_POST['thamquan_tongthanhtien'];
        $focus->noidung->thamquan_tongthue = $_POST['thamquan_tongthue'];
        // tham quan ở miền bắc

        $thamquan_mienbac = count($_POST['thamquan_name_mb']);
        for($tq_mb = 0; $tq_mb <$thamquan_mienbac; $tq_mb++){
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_name_mb = $_POST['thamquan_name_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_gianguoilon_mb = $_POST['thamquan_gianguoilon_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_soluongnguoilon_mb = $_POST['thamquan_soluongnguoilon_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_dongiatreem_mb = $_POST['thamquan_dongiatreem_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_soluongtreem_mb = $_POST['thamquan_soluongtreem_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_songay_mb = $_POST['thamquan_songay_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_foc_mb = $_POST['thamquan_foc_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_thanhtien_mb = $_POST['thamquan_thanhtien_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_thuesuat_mb = $_POST['thamquan_thuesuat_mb'][$tq_mb] ;
            $THAMQUAN_MIENBAC[$tq_mb]->thamquan_vat_mb = $_POST['thamquan_vat_mb'][$tq_mb] ;
        }                 
        $focus->noidung->thamquan_mienbac = $THAMQUAN_MIENBAC;
        
        $focus->noidung->thamquan_tongthanhtien_mienbac = $_POST['thamquan_tongthanhtien_mienbac'];
        $focus->noidung->thamquan_tongthue_mienbac = $_POST['thamquan_tongthue_mienbac'];  

        // tham quan ở miền trung

        $thamquan_mientrung = count($_POST['thamquan_name_mt']);
        for($tq_mt = 0; $tq_mt <$thamquan_mientrung; $tq_mt++){
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_name_mt = $_POST['thamquan_name_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_gianguoilon_mt = $_POST['thamquan_gianguoilon_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_soluongnguoilon_mt = $_POST['thamquan_soluongnguoilon_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_dongiatreem_mt = $_POST['thamquan_dongiatreem_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_soluongtreem_mt = $_POST['thamquan_soluongtreem_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_songay_mt = $_POST['thamquan_songay_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_foc_mt = $_POST['thamquan_foc_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_thanhtien_mt = $_POST['thamquan_thanhtien_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_thuesuat_mt = $_POST['thamquan_thuesuat_mt'][$tq_mt] ;
            $THAMQUAN_MIENTRUNG[$tq_mt]->thamquan_vat_mt = $_POST['thamquan_vat_mt'][$tq_mt] ;
        }                 
        $focus->noidung->thamquan_mientrung = $THAMQUAN_MIENTRUNG; 

        $focus->noidung->thamquan_tongthanhtien_mientrung = $_POST['thamquan_tongthanhtien_mientrung'];
        $focus->noidung->thamquan_tongthue_mientrung = $_POST['thamquan_tongthue_mientrung'];
        
        // tham quan ở miền nam
        $thamquan_miennam = count($_POST['thamquan_name_mn']);
        for($tq_mn = 0; $tq_mn <$thamquan_miennam; $tq_mn++){
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_name_mn = $_POST['thamquan_name_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_gianguoilon_mn = $_POST['thamquan_gianguoilon_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_soluongnguoilon_mn = $_POST['thamquan_soluongnguoilon_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_dongiatreem_mn = $_POST['thamquan_dongiatreem_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_soluongtreem_mn = $_POST['thamquan_soluongtreem_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_songay_mn = $_POST['thamquan_songay_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_foc_mn = $_POST['thamquan_foc_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_thanhtien_mn = $_POST['thamquan_thanhtien_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_thuesuat_mn = $_POST['thamquan_thuesuat_mn'][$tq_mn] ;
            $THAMQUAN_MIENNAM[$tq_mn]->thamquan_vat_mn = $_POST['thamquan_vat_mn'][$tq_mn] ;
        }                 

        $focus->noidung->thamquan_miennam = $THAMQUAN_MIENNAM; 
        
        $focus->noidung->thamquan_tongthanhtien_miennam = $_POST['thamquan_tongthanhtien_miennam'];
        $focus->noidung->thamquan_tongthue_mienam = $_POST['thamquan_tongthue_mienam'];
        
        // phan chi phi huong dan vien
        $huongdanvienmb = count($_POST['loaichiphi_cphdv_mb']);
        for($i=0;$i<$huongdanvienmb;$i++){
            $HDVMB[$i]->loaichiphi = $_POST['loaichiphi_cphdv_mb'][$i];
            $HDVMB[$i]->soluong = $_POST['soduong_cphdv_mb'][$i];
            $HDVMB[$i]->dongia = $_POST['dongia_cphdv_mb'][$i];
            $HDVMB[$i]->solan = $_POST['solan_cphdv_mb'][$i];
            $HDVMB[$i]->thanhtien = $_POST['thanhtien_cphdv_mb'][$i];
            $HDVMB[$i]->thuesuat = $_POST['thuesuat_cphdv_mb'][$i];
            $HDVMB[$i]->vat = $_POST['vat_cphdv_mb'][$i];
        }
        $focus->noidung->huongdanvienmb = $HDVMB;
        
        $huongdanvienmt = count($_POST['loaichiphi_cphdv_mt']);
        for($i=0;$i<$huongdanvienmt;$i++){
            $HDVMT[$i]->loaichiphi = $_POST['loaichiphi_cphdv_mt'][$i];
            $HDVMT[$i]->soluong = $_POST['soduong_cphdv_mt'][$i];
            $HDVMT[$i]->dongia = $_POST['dongia_cphdv_mt'][$i];
            $HDVMT[$i]->solan = $_POST['solan_cphdv_mt'][$i];
            $HDVMT[$i]->thanhtien = $_POST['thanhtien_cphdv_mt'][$i];
            $HDVMT[$i]->thuesuat = $_POST['thuesuat_cphdv_mt'][$i];
            $HDVMT[$i]->vat = $_POST['vat_cphdv_mt'][$i];
        }
        $focus->noidung->huongdanvienmt = $HDVMT;
        
        $huongdanvienmn = count($_POST['loaichiphi_cphdv_mn']);
        for($i=0;$i<$huongdanvienmn;$i++){
            $HDVMN[$i]->loaichiphi = $_POST['loaichiphi_cphdv_mn'][$i];
            $HDVMN[$i]->soluong = $_POST['soluong_cphdv_mn'][$i];
            $HDVMN[$i]->dongia = $_POST['dongia_cphdv_mn'][$i];
            $HDVMN[$i]->solan = $_POST['solan_cphdv_mn'][$i];
            $HDVMN[$i]->thanhtien = $_POST['thanhtien_cphdv_mn'][$i];
            $HDVMN[$i]->thuesuat = $_POST['thuesuat_cphdv_mn'][$i];
            $HDVMN[$i]->vat = $_POST['vat_cphdv_mn'][$i];
        }
        $focus->noidung->huongdanvienmn = $HDVMN;
        
        $focus->noidung->tongchi_hvd = $_POST['tongchi_hvd'];
        $focus->noidung->tongthue_hvd = $_POST['tongthue_hvd'];
        $focus->noidung->tongchi_hvd_mb = $_POST['tongchi_hvd_mb'];
        $focus->noidung->tongthue_hvd_mb = $_POST['tongthue_hvd_mb'];
        $focus->noidung->tongchi_hvd_mt = $_POST['tongchi_hvd_mt'];
        $focus->noidung->tongthue_hvd_mt = $_POST['tongthue_hvd_mt'];
        $focus->noidung->tongchi_hvd_mn = $_POST['tongchi_hvd_mn'];
        $focus->noidung->tongthue_hvd_mn = $_POST['tongthue_hvd_mn'];
        
        
        // lưu trữ thông tin chi phí khác
        
        $chiphikhac = count($_POST['chiphikhac_loaidichvu']);
        for($i=0;$i<$chiphikhac;$i++){
            $CHIPHIKHAC[$i]->chiphikhac_loaidichvu = $_POST['chiphikhac_loaidichvu'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_soluong = $_POST['chiphikhac_soluong'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_dongia = $_POST['chiphikhac_dongia'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_foc = $_POST['chiphikhac_foc'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_thanhtien = $_POST['chiphikhac_thanhtien'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_thuesuat = $_POST['chiphikhac_thuesuat'][$i];
            $CHIPHIKHAC[$i]->chiphikhac_vat = $_POST['chiphikhac_vat'][$i];
        }
        $focus->noidung->chiphikhac =  $CHIPHIKHAC;
        $focus->noidung->chiphikhac_tongcong =  $_POST['chiphikhac_tongcong'];
        $focus->noidung->chiphikhac_tongthue =  $_POST['chiphikhac_tongthue'];
        

        // lưu trữ thông tin giá bán 
        // Giá bán có VMB/Tàu Hỏa
        // giá người lớn
        $focus->noidung->sl_khach_nl_1 = $_POST['sl_khach_nl_1'];
        $focus->noidung->dg_khach_nl_1 = $_POST['dg_khach_nl_1'];
        $focus->noidung->foc_khach_nl_1 = $_POST['foc_khach_nl_1'];
        $focus->noidung->tt_khach_nl_1 = $_POST['tt_khach_nl_1'];
        $focus->noidung->ts_khach_nl_1 = $_POST['ts_khach_nl_1'];
        $focus->noidung->thue_khach_nl_1 = $_POST['thue_khach_nl_1'];

        // giá trẻ em
        $focus->noidung->thue_khach_nl_1 = $_POST['thue_khach_nl_1'];
        $focus->noidung->sl_treem_1 = $_POST['sl_treem_1'];
        $focus->noidung->dg_treem_1 = $_POST['dg_treem_1'];
        $focus->noidung->foc_treem_1 = $_POST['foc_treem_1'];
        $focus->noidung->tt_treem_1 = $_POST['tt_treem_1'];
        $focus->noidung->ts_treem_1 = $_POST['ts_treem_1'];
        $focus->noidung->thue_treem_1 = $_POST['thue_treem_1'];

        // phụ phòng đơn

        $focus->noidung->sl_phuthuphongdon_1 = $_POST['sl_phuthuphongdon_1'];
        $focus->noidung->dg_phuthuphongdon_1 = $_POST['dg_phuthuphongdon_1'];
        $focus->noidung->foc_phuthuphongdon_1 = $_POST['foc_phuthuphongdon_1'];
        $focus->noidung->tt_phuthuphongdon_1 = $_POST['tt_phuthuphongdon_1'];
        $focus->noidung->ts_phuthuphongdon_1 = $_POST['ts_phuthuphongdon_1'];
        $focus->noidung->thue_phuthuphongdon_1 = $_POST['thue_phuthuphongdon_1'];

        // phụ thu khác
        $focus->noidung->sl_phuthukhac_1 = $_POST['sl_phuthukhac_1']; 
        $focus->noidung->dg_phuthukhac_1 = $_POST['dg_phuthukhac_1']; 
        $focus->noidung->foc_phuthukhac_1 = $_POST['foc_phuthukhac_1']; 
        $focus->noidung->tt_phuthukhac_1 = $_POST['tt_phuthukhac_1']; 
        $focus->noidung->ts_phuthukhac_1 = $_POST['ts_phuthukhac_1']; 
        $focus->noidung->thue_phuthukhac_1 = $_POST['thue_phuthukhac_1']; 

        // Giá bán không có VMB/Tàu hỏa
        // giá bán người lớn
        $focus->noidung->sl_khach_nl_2 = $_POST['sl_khach_nl_2'];
        $focus->noidung->dg_khach_nl_2 = $_POST['dg_khach_nl_2'];
        $focus->noidung->foc_khach_nl_2 = $_POST['foc_khach_nl_2'];
        $focus->noidung->tt_khach_nl_2 = $_POST['tt_khach_nl_2'];
        $focus->noidung->ts_khach_nl_2 = $_POST['ts_khach_nl_2'];
        $focus->noidung->thue_khach_nl_2 = $_POST['thue_khach_nl_2'];

        // giá bán trẻ em
        $focus->noidung->sl_treem_2 = $_POST['sl_treem_2'];  
        $focus->noidung->dg_treem_2 = $_POST['dg_treem_2'];  
        $focus->noidung->foc_treem_2 = $_POST['foc_treem_2'];  
        $focus->noidung->tt_treem_2 = $_POST['tt_treem_2'];  
        $focus->noidung->ts_treem_2 = $_POST['ts_treem_2'];  
        $focus->noidung->thue_treem_2 = $_POST['thue_treem_2'];

        // phụ thu phòng đơn
        $focus->noidung->sl_phuthuphongdon_2 = $_POST['sl_phuthuphongdon_2'];
        $focus->noidung->dg_phuthuphongdon_2 = $_POST['dg_phuthuphongdon_2'];
        $focus->noidung->foc_phuthuphongdon_2 = $_POST['foc_phuthuphongdon_2'];
        $focus->noidung->tt_phuthuphongdon_2 = $_POST['tt_phuthuphongdon_2'];
        $focus->noidung->ts_phuthuphongdon_2 = $_POST['ts_phuthuphongdon_2'];
        $focus->noidung->thue_phuthuphongdon_2 = $_POST['thue_phuthuphongdon_2'];

        // phụ thu khác
        $focus->noidung->sl_phuthukhac_2 = $_POST['sl_phuthukhac_2']; 
        $focus->noidung->dg_phuthukhac_2 = $_POST['dg_phuthukhac_2']; 
        $focus->noidung->foc_phuthukhac_2 = $_POST['foc_phuthukhac_2']; 
        $focus->noidung->tt_phuthukhac_2 = $_POST['tt_phuthukhac_2']; 
        $focus->noidung->ts_phuthukhac_2 = $_POST['ts_phuthukhac_2']; 
        $focus->noidung->thue_phuthukhac_2 = $_POST['thue_phuthukhac_2'];  
        
        // chế độ miễn phí FOC
        $focus->noidung->foc_option = $_POST['foc_option'];
        $focus->noidung->sl_foc_16 = $_POST['sl_foc_16'];
        $focus->noidung->dg_foc_16 = $_POST['dg_foc_16'];
        $focus->noidung->foc_foc_16 = $_POST['foc_foc_16'];
        $focus->noidung->tt_foc_16 = $_POST['tt_foc_16'];
        $focus->noidung->ts_foc_16 = $_POST['ts_foc_16'];
        $focus->noidung->thue_foc_16 = $_POST['thue_foc_16'];
        
         

        // tổng cộng giá bán
        $focus->noidung->tongcong_giaban = $_POST['tongcong_giaban'];   

        // tổng thuế

        $focus->noidung->tongthue_giaban = $_POST['tongthue_giaban']; 

        // report chi tiết

        $focus->noidung->tonglai = $_POST['tonglai'];
        $focus->noidung->giaban = $_POST['giaban'];
        $focus->noidung->giabantrenmotnguoi = $_POST['giabantrenmotnguoi'];
        $focus->noidung->vatdaura = $_POST['vatdaura'];
        $focus->noidung->vatdauvao = $_POST['vatdauvao'];
        $focus->noidung->vatphaidong = $_POST['vatphaidong'];
        $focus->noidung->doanhthu = $_POST['doanhthu'];
        $focus->noidung->tongchiphi = $_POST['tongchiphi'];
        $focus->noidung->tongthue = $_POST['tongthue'];
        $focus->noidung->tongchiphi1 = $_POST['tongchiphi1'];
        $focus->noidung->giavontrenkhach = $_POST['giavontrenkhach'];
        $focus->noidung->giabantrenkhach = $_POST['giabantrenkhach'];
        $focus->noidung->laikhach = $_POST['laikhach'];
        $focus->noidung->tylesauthuevat = $_POST['tylesauthuevat'];
        $focus->noidung->thuethunhapdn = $_POST['thuethunhapdn'];
        $focus->noidung->lairongnettprofit = $_POST['lairongnettprofit'];
        $focus->noidung->tylesauthuetndn = $_POST['tylesauthuetndn'];


    }
    /*if($focus->worksheet_code !=''){
        $focus->name = $focus->worksheet_code;
    }*/

    $_SESSION['content']  = $focus->noidung;
    $content = json_encode($_SESSION['content'] );
    $content = base64_encode($content);
    $focus->content = $content;

    $focus->save($check_notify);
    unset($_SESSION['record']) ;
    unset($_SESSION['return_id']) ;

    $return_id = $focus->id;

    echo "<script type='text/javascript'>
    window.location='index.php?module=Worksheets&action=DetailView&record=$return_id'
    </script>
    ";

?>
