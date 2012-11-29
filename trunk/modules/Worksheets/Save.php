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
        // save worksheet new by ms Anh Thu
        $focus->noidung->soluongkh1 = $_POST['soluongkh1'];
        $focus->noidung->soluongkh2 = $_POST['soluongkh2'];
        $focus->noidung->soluongkh3 = $_POST['soluongkh3'];
        $focus->noidung->soluongkh4 = $_POST['soluongkh4'];
        $focus->noidung->soluongkh5 = $_POST['soluongkh5'];
        $focus->noidung->soluongkh6 = $_POST['soluongkh6'];
        $focus->noidung->soluongkh7 = $_POST['soluongkh7'];
        $focus->noidung->soluongkh8 = $_POST['soluongkh8'];
        $focus->noidung->soluongkh9 = $_POST['soluongkh9'];
        $focus->noidung->soluongkh10 = $_POST['soluongkh10'];
        $focus->noidung->soluongkh11 = $_POST['soluongkh11'];
        $focus->noidung->soluongkh12 = $_POST['soluongkh12'];
        $focus->noidung->soluongkh13 = $_POST['soluongkh13'];
        $focus->noidung->soluongkh14 = $_POST['soluongkh14'];
        $focus->noidung->soluongkh15 = $_POST['soluongkh15'];
        
        $focus->noidung->transfer1 = $_POST['transfer1'];
        $focus->noidung->transfer2 = $_POST['transfer2'];
        $focus->noidung->transfer3 = $_POST['transfer3'];
        $focus->noidung->transfer4 = $_POST['transfer4'];
        $focus->noidung->transfer5 = $_POST['transfer5'];
        $focus->noidung->transfer6 = $_POST['transfer6'];
        $focus->noidung->transfer7 = $_POST['transfer7'];
        $focus->noidung->transfer8 = $_POST['transfer8'];
        $focus->noidung->transfer9 = $_POST['transfer9'];
        $focus->noidung->transfer10 = $_POST['transfer10'];
        $focus->noidung->transfer11 = $_POST['transfer11'];
        $focus->noidung->transfer12 = $_POST['transfer12'];
        $focus->noidung->transfer13 = $_POST['transfer13'];
        $focus->noidung->transfer14 = $_POST['transfer14'];
        $focus->noidung->transfer15 = $_POST['transfer15'];
        $focus->noidung->transfer16 = $_POST['transfer16'];
        $focus->noidung->transfer17 = $_POST['transfer17'];
        $focus->noidung->transfer18 = $_POST['transfer18'];
        $focus->noidung->transfer19 = $_POST['transfer20'];
        $focus->noidung->transfer20 = $_POST['transfer1'];
        $focus->noidung->transfer21 = $_POST['transfer21'];
        $focus->noidung->transfer22 = $_POST['transfer22'];
        $focus->noidung->transfer23 = $_POST['transfer23'];
        $focus->noidung->transfer24 = $_POST['transfer24'];
        $focus->noidung->transfer25 = $_POST['transfer25'];
        $focus->noidung->transfer26 = $_POST['transfer26'];
        $focus->noidung->transfer27 = $_POST['transfer27'];
        $focus->noidung->transfer28 = $_POST['transfer28'];
        $focus->noidung->transfer29 = $_POST['transfer29'];
        $focus->noidung->transfer30 = $_POST['transfer30'];
        
        $focus->noidung->transfer_south = $_POST['transfer_south'];
        $focus->noidung->transfer_middle = $_POST['transfer_middle'];
        $focus->noidung->transfer_north = $_POST['transfer_north'];
        
        $focus->noidung->transfer_south_km1 = $_POST['transfer_south_km1'];
        $focus->noidung->transfer_south_km2 = $_POST['transfer_south_km2'];
        $focus->noidung->transfer_south_km3 = $_POST['transfer_south_km3'];
        $focus->noidung->transfer_south_km4 = $_POST['transfer_south_km4'];
        $focus->noidung->transfer_south_km5 = $_POST['transfer_south_km5'];
        $focus->noidung->transfer_south_km6 = $_POST['transfer_south_km6'];
        
        $focus->noidung->transfer_middle_km1 = $_POST['transfer_middle_km1'];
        $focus->noidung->transfer_middle_km2 = $_POST['transfer_middle_km2'];
        $focus->noidung->transfer_middle_km3 = $_POST['transfer_middle_km3'];
        $focus->noidung->transfer_middle_km4 = $_POST['transfer_middle_km4'];
        $focus->noidung->transfer_middle_km5 = $_POST['transfer_middle_km5'];
        $focus->noidung->transfer_middle_km6 = $_POST['transfer_middle_km6'];
        
        $focus->noidung->transfer_north_km1 = $_POST['transfer_north_km1'];
        $focus->noidung->transfer_north_km2 = $_POST['transfer_north_km2'];
        $focus->noidung->transfer_north_km3 = $_POST['transfer_north_km3'];
        $focus->noidung->transfer_north_km4 = $_POST['transfer_north_km4'];
        $focus->noidung->transfer_north_km5 = $_POST['transfer_north_km5'];
        $focus->noidung->transfer_north_km6 = $_POST['transfer_north_km6'];
        
        $focus->noidung->south_package1 = $_POST['south_package1'];
        $focus->noidung->south_package2 = $_POST['south_package2'];
        $focus->noidung->south_package3 = $_POST['south_package3'];
        $focus->noidung->south_package4 = $_POST['south_package4'];
        $focus->noidung->south_package5 = $_POST['south_package5'];
        $focus->noidung->south_package6 = $_POST['south_package6'];
        
        $focus->noidung->middle_package1 = $_POST['middle_package1'];
        $focus->noidung->middle_package2 = $_POST['middle_package2'];
        $focus->noidung->middle_package3 = $_POST['middle_package3'];
        $focus->noidung->middle_package4 = $_POST['middle_package4'];
        $focus->noidung->middle_package5 = $_POST['middle_package5'];
        $focus->noidung->middle_package6 = $_POST['middle_package6'];
        
        $focus->noidung->north_package1 = $_POST['north_package1'];
        $focus->noidung->north_package2 = $_POST['north_package2'];
        $focus->noidung->north_package3 = $_POST['north_package3'];
        $focus->noidung->north_package4 = $_POST['north_package4'];
        $focus->noidung->north_package5 = $_POST['north_package5'];
        $focus->noidung->north_package6 = $_POST['north_package6'];
        
        $focus->noidung->boat_sum = $_POST['boat_sum'];
        
        $focus->noidung->boat1 = $_POST['boat1'];
        $focus->noidung->boat2 = $_POST['boat2'];
        $focus->noidung->boat3 = $_POST['boat3'];
        $focus->noidung->boat4 = $_POST['boat4'];
        $focus->noidung->boat5 = $_POST['boat5'];
        $focus->noidung->boat6 = $_POST['boat6'];
        $focus->noidung->boat7 = $_POST['boat7'];
        $focus->noidung->boat8 = $_POST['boat8'];
        $focus->noidung->boat9 = $_POST['boat9'];
        $focus->noidung->boat10 = $_POST['boat10'];
        $focus->noidung->boat11 = $_POST['boat11'];
        $focus->noidung->boat12 = $_POST['boat12'];
        $focus->noidung->boat13 = $_POST['boat13'];
        $focus->noidung->boat14 = $_POST['boat14'];
        $focus->noidung->boat15 = $_POST['boat15'];
        $focus->noidung->boat16 = $_POST['boat16'];
        $focus->noidung->boat17 = $_POST['boat17'];
        $focus->noidung->boat18 = $_POST['boat18'];
        $focus->noidung->boat19 = $_POST['boat19'];
        $focus->noidung->boat20 = $_POST['boat20'];
        $focus->noidung->boat21 = $_POST['boat21'];
        $focus->noidung->boat22 = $_POST['boat22'];
        $focus->noidung->boat23 = $_POST['boat23'];
        $focus->noidung->boat24 = $_POST['boat24'];
        $focus->noidung->boat25 = $_POST['boat25'];
        $focus->noidung->boat26 = $_POST['boat26'];
        $focus->noidung->boat27 = $_POST['boat27'];
        $focus->noidung->boat28 = $_POST['boat28'];
        $focus->noidung->boat29 = $_POST['boat29'];
        $focus->noidung->boat30 = $_POST['boat30'];
        
        $boat_count = count($_REQUEST['boat_service']);
        for($i=0; $i<$boat_count;$i++){
            $boat[$i]->boat_service = $_REQUEST['boat_service'][$i];
            $boat[$i]->boat_price = $_REQUEST['boat_price'][$i];
            $boat[$i]->boat_num = $_REQUEST['boat_num'][$i];
            $boat[$i]->boat_money = $_REQUEST['boat_money'][$i];
        }
        
        $focus->noidung->boat = $boat;
        
        $focus->noidung->guide_sum = $_POST['guide_sum'];
        $focus->noidung->guide1 = $_POST['guide1'];
        $focus->noidung->guide2 = $_POST['guide2'];
        $focus->noidung->guide3 = $_POST['guide3'];
        $focus->noidung->guide4 = $_POST['guide4'];
        $focus->noidung->guide5 = $_POST['guide5'];
        $focus->noidung->guide6 = $_POST['guide6'];
        $focus->noidung->guide7 = $_POST['guide7'];
        $focus->noidung->guide8 = $_POST['guide8'];
        $focus->noidung->guide9 = $_POST['guide9'];
        $focus->noidung->guide10 = $_POST['guide10'];
        $focus->noidung->guide11 = $_POST['guide11'];
        $focus->noidung->guide12 = $_POST['guide12'];
        $focus->noidung->guide13 = $_POST['guide13'];
        $focus->noidung->guide14 = $_POST['guide14'];
        $focus->noidung->guide15 = $_POST['guide15'];
       
        $focus->noidung->guide_south_price = $_POST['guide_south_price'];
        $focus->noidung->guide_south_num = $_POST['guide_south_num'];
        $focus->noidung->guide_south_money = $_POST['guide_south_money'];
        $focus->noidung->guide_middle_price = $_POST['guide_middle_price'];
        $focus->noidung->guide_middle_num = $_POST['guide_middle_num'];
        $focus->noidung->guide_middle_money = $_POST['guide_middle_money'];
        $focus->noidung->guide_north_price = $_POST['guide_north_price'];
        $focus->noidung->guide_north_num = $_POST['guide_north_num'];
        $focus->noidung->guide_north_money = $_POST['guide_north_money'];
        
        $focus->noidung->group_sum = $_POST['group_sum'];
        $focus->noidung->group1 = $_POST['group1'];
        $focus->noidung->group2 = $_POST['group2'];
        $focus->noidung->group3 = $_POST['group3'];
        $focus->noidung->group4 = $_POST['group4'];
        $focus->noidung->group5 = $_POST['group5'];
        $focus->noidung->group6 = $_POST['group6'];
        $focus->noidung->group7 = $_POST['group7'];
        $focus->noidung->group8 = $_POST['group8'];
        $focus->noidung->group9 = $_POST['group9'];
        $focus->noidung->group10 = $_POST['group10'];
        $focus->noidung->group11 = $_POST['group11'];
        $focus->noidung->group12 = $_POST['group12'];
        $focus->noidung->group13 = $_POST['group13'];
        $focus->noidung->group14 = $_POST['group14'];
        $focus->noidung->group15 = $_POST['group15'];
        $focus->noidung->group16 = $_POST['group16'];
        $focus->noidung->group17 = $_POST['group17'];
        $focus->noidung->group18 = $_POST['group18'];
        $focus->noidung->group19 = $_POST['group19'];
        $focus->noidung->group20 = $_POST['group20'];
        $focus->noidung->group21 = $_POST['group21'];
        $focus->noidung->group22 = $_POST['group22'];
        $focus->noidung->group23 = $_POST['group23'];
        $focus->noidung->group24 = $_POST['group24'];
        $focus->noidung->group25 = $_POST['group25'];
        $focus->noidung->group26 = $_POST['group26'];
        $focus->noidung->group27 = $_POST['group27'];
        $focus->noidung->group28 = $_POST['group28'];
        $focus->noidung->group29 = $_POST['group29'];
        $focus->noidung->group30 = $_POST['group30'];
        
        $group1_count = count($_POST['group1_service']);
        
        for($i = 0; $i<$group1_count; $i++){
            $group1_fit[$i]->group1_service = $_POST['group1_service'][$i];
            $group1_fit[$i]->group1_price = $_POST['group1_price'][$i];
            $group1_fit[$i]->group1_num = $_POST['group1_num'][$i];
            $group1_fit[$i]->group1_money = $_POST['group1_money'][$i];
        }
        
        $focus->noidung->group1_fit = $group1_fit;
        
        $group2_count = count($_POST['group2_price']);
        
        for($i = 0; $i<$group2_count; $i++){
            $group2_fit[$i]->group2_service = $_POST['group2_service'][$i];
            $group2_fit[$i]->group2_price = $_POST['group2_price'][$i];
            $group2_fit[$i]->group2_num = $_POST['group2_num'][$i];
            $group2_fit[$i]->group2_money = $_POST['group2_money'][$i];
        }
        
        $focus->noidung->group2_fit = $group2_fit;
        
        $focus->noidung->entrance_sum = $_POST['entrance_sum'];
        $focus->noidung->entrance1 = $_POST['entrance1'];
        $focus->noidung->entrance2 = $_POST['entrance2'];
        $focus->noidung->entrance3 = $_POST['entrance3'];
        $focus->noidung->entrance4 = $_POST['entrance4'];
        $focus->noidung->entrance5 = $_POST['entrance5'];
        $focus->noidung->entrance6 = $_POST['entrance6'];
        $focus->noidung->entrance7 = $_POST['entrance7'];
        $focus->noidung->entrance8 = $_POST['entrance8'];
        $focus->noidung->entrance9 = $_POST['entrance9'];
        $focus->noidung->entrance10 = $_POST['entrance10'];
        $focus->noidung->entrance11 = $_POST['entrance11'];
        $focus->noidung->entrance12 = $_POST['entrance12'];
        $focus->noidung->entrance13 = $_POST['entrance13'];
        $focus->noidung->entrance14 = $_POST['entrance14'];
        $focus->noidung->entrance15 = $_POST['entrance15'];
        $focus->noidung->entrance16 = $_POST['entrance16'];
        $focus->noidung->entrance17 = $_POST['entrance17'];
        $focus->noidung->entrance18 = $_POST['entrance18'];
        $focus->noidung->entrance19 = $_POST['entrance19'];
        $focus->noidung->entrance20 = $_POST['entrance20'];
        $focus->noidung->entrance21 = $_POST['entrance21'];
        $focus->noidung->entrance22 = $_POST['entrance22'];
        $focus->noidung->entrance23 = $_POST['entrance23'];
        $focus->noidung->entrance24 = $_POST['entrance24'];
        $focus->noidung->entrance25 = $_POST['entrance25'];
        $focus->noidung->entrance26 = $_POST['entrance26'];
        $focus->noidung->entrance27 = $_POST['entrance27'];
        $focus->noidung->entrance28 = $_POST['entrance28'];
        $focus->noidung->entrance29 = $_POST['entrance29'];
        $focus->noidung->entrance30 = $_POST['entrance30'];
        
        $entrance_count = count($_POST['entrance_service']);
        
        for($i=0; $i<$entrance_count; $i++){
            $entrance[$i]->entrance_service = $_POST['entrance_service'][$i];
            $entrance[$i]->entrance_price = $_POST['entrance_price'][$i];
            $entrance[$i]->entrance_num = $_POST['entrance_num'][$i];
            $entrance[$i]->entrance_money = $_POST['entrance_money'][$i];
        }
        
        $focus->noidung->entrance = $entrance;
        
        $focus->noidung->ticket_sum = $_POST['ticket_sum'];
        $focus->noidung->ticket1 = $_POST['ticket1'];
        $focus->noidung->ticket2 = $_POST['ticket2'];
        $focus->noidung->ticket3 = $_POST['ticket3'];
        $focus->noidung->ticket4 = $_POST['ticket4'];
        $focus->noidung->ticket5 = $_POST['ticket5'];
        $focus->noidung->ticket6 = $_POST['ticket6'];
        $focus->noidung->ticket7 = $_POST['ticket7'];
        $focus->noidung->ticket8 = $_POST['ticket8'];
        $focus->noidung->ticket9 = $_POST['ticket9'];
        $focus->noidung->ticket10 = $_POST['ticket10'];
        $focus->noidung->ticket11 = $_POST['ticket11'];
        $focus->noidung->ticket12 = $_POST['ticket12'];
        $focus->noidung->ticket13 = $_POST['ticket13'];
        $focus->noidung->ticket14 = $_POST['ticket14'];
        $focus->noidung->ticket15 = $_POST['ticket15'];
        
        $ticket_count = count($_POST['tickets_service']);
        for($i = 0 ; $i<$ticket_count; $i++){
            $ticket[$i]->tickets_service = $_POST['tickets_service'][$i];
            $ticket[$i]->tickets_price = $_POST['tickets_price'][$i];
            $ticket[$i]->tickets_num = $_POST['tickets_num'][$i];
            $ticket[$i]->tickets_money = $_POST['tickets_money'][$i];
        }
        
        $focus->noidung->ticket = $ticket;
         
         $focus->noidung->fit_sum = $_POST['fit_sum'];
         $focus->noidung->fit1 = $_POST['fit1'];
         $focus->noidung->fit2 = $_POST['fit2'];
         $focus->noidung->fit3 = $_POST['fit3'];
         $focus->noidung->fit4 = $_POST['fit4'];
         $focus->noidung->fit5 = $_POST['fit5'];
         $focus->noidung->fit6 = $_POST['fit6'];
         $focus->noidung->fit7 = $_POST['fit7'];
         $focus->noidung->fit8 = $_POST['fit8'];
         $focus->noidung->fit9 = $_POST['fit9'];
         $focus->noidung->fit10 = $_POST['fit10'];
         $focus->noidung->fit11 = $_POST['fit11'];
         $focus->noidung->fit12 = $_POST['fit12'];
         $focus->noidung->fit13 = $_POST['fit13'];
         $focus->noidung->fit14 = $_POST['fit14'];
         $focus->noidung->fit15 = $_POST['fit15'];
         $focus->noidung->fit16 = $_POST['fit16'];
         $focus->noidung->fit17 = $_POST['fit17'];
         $focus->noidung->fit18 = $_POST['fit18'];
         $focus->noidung->fit19 = $_POST['fit19'];
         $focus->noidung->fit20 = $_POST['fit20'];
         $focus->noidung->fit21 = $_POST['fit21'];
         $focus->noidung->fit22 = $_POST['fit22'];
         $focus->noidung->fit23 = $_POST['fit23'];
         $focus->noidung->fit24 = $_POST['fit24'];
         $focus->noidung->fit25 = $_POST['fit25'];
         $focus->noidung->fit26 = $_POST['fit26'];
         $focus->noidung->fit27 = $_POST['fit27'];
         $focus->noidung->fit28 = $_POST['fit28'];
         $focus->noidung->fit29 = $_POST['fit29'];
         $focus->noidung->fit30 = $_POST['fit30'];
         
         $fit1_count = count($_POST['fit1_service']);
         for($i = 0; $i<$fit1_count; $i++){
            $fit1_line[$i]->fit1_service = $_POST['fit1_service'][$i];
            $fit1_line[$i]->fit1_price = $_POST['fit1_price'][$i];
            $fit1_line[$i]->fit1_num = $_POST['fit1_num'][$i];
            $fit1_line[$i]->fit1_money = $_POST['fit1_money'][$i];
         }
         
         $focus->noidung->fit1_line = $fit1_line;
         
         $fit2_count = count($_POST['fit2_service']);
         for($i = 0; $i<$fit2_count; $i++){
            $fit2_line[$i]->fit2_service = $_POST['fit2_service'][$i];
            $fit2_line[$i]->fit2_price = $_POST['fit2_price'][$i];
            $fit2_line[$i]->fit2_num = $_POST['fit2_num'][$i];
            $fit2_line[$i]->fit2_money = $_POST['fit2_money'][$i];
         }
         
         $focus->noidung->fit2_line = $fit2_line;
        
        $focus->noidung->meal1_sum = $_POST['meal1_sum'];
        $focus->noidung->meal1_1 = $_POST['meal1_1'];
        $focus->noidung->meal1_2 = $_POST['meal1_2'];
        $focus->noidung->meal1_3 = $_POST['meal1_3'];
        $focus->noidung->meal1_4 = $_POST['meal1_4'];
        $focus->noidung->meal1_5 = $_POST['meal1_5'];
        $focus->noidung->meal1_6 = $_POST['meal1_6'];
        $focus->noidung->meal1_7 = $_POST['meal1_7'];
        $focus->noidung->meal1_8 = $_POST['meal1_8'];
        $focus->noidung->meal1_9 = $_POST['meal1_9'];
        $focus->noidung->meal1_10 = $_POST['meal1_10'];
        $focus->noidung->meal1_11 = $_POST['meal1_11'];
        $focus->noidung->meal1_12 = $_POST['meal1_12'];
        $focus->noidung->meal1_13 = $_POST['meal1_13'];
        $focus->noidung->meal1_14 = $_POST['meal1_14'];
        $focus->noidung->meal1_15 = $_POST['meal1_15'];
        $focus->noidung->meal1_16 = $_POST['meal1_16'];
        $focus->noidung->meal1_17 = $_POST['meal1_17'];
        $focus->noidung->meal1_18 = $_POST['meal1_18'];
        $focus->noidung->meal1_19 = $_POST['meal1_19'];
        $focus->noidung->meal1_20 = $_POST['meal1_20'];
        $focus->noidung->meal1_21 = $_POST['meal1_21'];
        $focus->noidung->meal1_22 = $_POST['meal1_22'];
        $focus->noidung->meal1_23 = $_POST['meal1_23'];
        $focus->noidung->meal1_24 = $_POST['meal1_24'];
        $focus->noidung->meal1_25 = $_POST['meal1_25'];
        $focus->noidung->meal1_26 = $_POST['meal1_26'];
        $focus->noidung->meal1_27 = $_POST['meal1_27'];
        $focus->noidung->meal1_28 = $_POST['meal1_28'];
        $focus->noidung->meal1_29 = $_POST['meal1_29'];
        $focus->noidung->meal1_30 = $_POST['meal1_30'];
        
        $focus->noidung->meal1_south_sum = $_POST['meal1_south_sum'];
        $focus->noidung->meal1_south1 = $_POST['meal1_south1'];
        $focus->noidung->meal1_south2 = $_POST['meal1_south2'];
        $focus->noidung->meal1_south3 = $_POST['meal1_south3'];
        $focus->noidung->meal1_south4 = $_POST['meal1_south4'];
        $focus->noidung->meal1_south5 = $_POST['meal1_south5'];
        $focus->noidung->meal1_south6 = $_POST['meal1_south6'];
        $focus->noidung->meal1_south7 = $_POST['meal1_south7'];
        $focus->noidung->meal1_south8 = $_POST['meal1_south8'];
        $focus->noidung->meal1_south9 = $_POST['meal1_south9'];
        $focus->noidung->meal1_south10 = $_POST['meal1_south10'];
        $focus->noidung->meal1_south11 = $_POST['meal1_south11'];
        $focus->noidung->meal1_south12 = $_POST['meal1_south12'];
        $focus->noidung->meal1_south13 = $_POST['meal1_south13'];
        $focus->noidung->meal1_south14 = $_POST['meal1_south14'];
        $focus->noidung->meal1_south15 = $_POST['meal1_south15'];
        $focus->noidung->meal1_south16 = $_POST['meal1_south16'];
        $focus->noidung->meal1_south17 = $_POST['meal1_south17'];
        $focus->noidung->meal1_south18 = $_POST['meal1_south18'];
        $focus->noidung->meal1_south19 = $_POST['meal1_south19'];
        $focus->noidung->meal1_south20 = $_POST['meal1_south20'];
        $focus->noidung->meal1_south21 = $_POST['meal1_south21'];
        $focus->noidung->meal1_south22 = $_POST['meal1_south22'];
        $focus->noidung->meal1_south23 = $_POST['meal1_south23'];
        $focus->noidung->meal1_south24 = $_POST['meal1_south24'];
        $focus->noidung->meal1_south25 = $_POST['meal1_south25'];
        $focus->noidung->meal1_south26 = $_POST['meal1_south26'];
        $focus->noidung->meal1_south27 = $_POST['meal1_south27'];
        $focus->noidung->meal1_south28 = $_POST['meal1_south28'];
        $focus->noidung->meal1_south29 = $_POST['meal1_south29'];
        $focus->noidung->meal1_south30 = $_POST['meal1_south30'];
        
        $focus->noidung->meal1_south_breakfirst_price = $_POST['meal1_south_breakfirst_price'];
        $focus->noidung->meal1_south_breakfirst_num = $_POST['meal1_south_breakfirst_num'];
        $focus->noidung->meal1_south_breakfirst_money = $_POST['meal1_south_breakfirst_money'];
        $focus->noidung->meal1_south_lunch_price = $_POST['meal1_south_lunch_price'];
        $focus->noidung->meal1_south_lunch_num = $_POST['meal1_south_lunch_num'];
        $focus->noidung->meal1_south_lunch_money = $_POST['meal1_south_lunch_money'];
        $focus->noidung->meal1_south_dinner_price = $_POST['meal1_south_dinner_price'];
        $focus->noidung->meal1_south_dinner_num = $_POST['meal1_south_dinner_num'];
        $focus->noidung->meal1_south_dinner_money = $_POST['meal1_south_dinner_money'];
        $focus->noidung->meal1_south_other_price = $_POST['meal1_south_other_price'];
        $focus->noidung->meal1_south_other_num = $_POST['meal1_south_other_num'];
        $focus->noidung->meal1_south_other_money = $_POST['meal1_south_other_money'];
        
        $focus->noidung->meal1_miidle_sum = $_POST['meal1_miidle_sum'];
        $focus->noidung->meal1_middle1 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle2 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle3 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle4 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle5 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle6 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle7 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle8 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle9 = $_POST['meal1_middle1'];
        $focus->noidung->meal1_middle10 = $_POST['meal1_middle10'];
        $focus->noidung->meal1_middle11 = $_POST['meal1_middle11'];
        $focus->noidung->meal1_middle12 = $_POST['meal1_middle12'];
        $focus->noidung->meal1_middle13 = $_POST['meal1_middle13'];
        $focus->noidung->meal1_middle14 = $_POST['meal1_middle14'];
        $focus->noidung->meal1_middle15 = $_POST['meal1_middle15'];
        $focus->noidung->meal1_middle16 = $_POST['meal1_middle16'];
        $focus->noidung->meal1_middle17 = $_POST['meal1_middle17'];
        $focus->noidung->meal1_middle18 = $_POST['meal1_middle18'];
        $focus->noidung->meal1_middle19 = $_POST['meal1_middle19'];
        $focus->noidung->meal1_middle20 = $_POST['meal1_middle20'];
        $focus->noidung->meal1_middle21 = $_POST['meal1_middle21'];
        $focus->noidung->meal1_middle22 = $_POST['meal1_middle22'];
        $focus->noidung->meal1_middle23 = $_POST['meal1_middle23'];
        $focus->noidung->meal1_middle24 = $_POST['meal1_middle24'];
        $focus->noidung->meal1_middle25 = $_POST['meal1_middle25'];
        $focus->noidung->meal1_middle26 = $_POST['meal1_middle26'];
        $focus->noidung->meal1_middle27 = $_POST['meal1_middle27'];
        $focus->noidung->meal1_middle28 = $_POST['meal1_middle28'];
        $focus->noidung->meal1_middle29 = $_POST['meal1_middle29'];
        $focus->noidung->meal1_middle30 = $_POST['meal1_middle30'];
        
        $focus->noidung->meal1_middle_breakfirst_price = $_POST['meal1_middle_breakfirst_price'];
        $focus->noidung->meal1_middle_breakfirst_num = $_POST['meal1_middle_breakfirst_num'];
        $focus->noidung->meal1_middle_breakfirst_money = $_POST['meal1_middle_breakfirst_money'];
        $focus->noidung->meal1_middle_lunch_price = $_POST['meal1_middle_lunch_price'];
        $focus->noidung->meal1_middle_lunch_num = $_POST['meal1_middle_lunch_num'];
        $focus->noidung->meal1_middle_lunch_money = $_POST['meal1_middle_lunch_money'];
        $focus->noidung->meal1_middle_dinner_price = $_POST['meal1_middle_dinner_price'];
        $focus->noidung->meal1_middle_dinner_num = $_POST['meal1_middle_dinner_num'];
        $focus->noidung->meal1_middle_dinner_money = $_POST['meal1_middle_dinner_money'];
        $focus->noidung->meal1_middle_other_price = $_POST['meal1_middle_other_price'];
        $focus->noidung->meal1_middle_other_num = $_POST['meal1_middle_other_num'];
        $focus->noidung->meal1_middle_other_money = $_POST['meal1_middle_other_money'];
        
        $focus->noidung->meal1_north_sum = $_POST['meal1_north_sum'];
        $focus->noidung->meal1_north1 = $_POST['meal1_north1'];
        $focus->noidung->meal1_north2 = $_POST['meal1_north2'];
        $focus->noidung->meal1_north3 = $_POST['meal1_north3'];
        $focus->noidung->meal1_north4 = $_POST['meal1_north4'];
        $focus->noidung->meal1_north5 = $_POST['meal1_north5'];
        $focus->noidung->meal1_north6 = $_POST['meal1_north6'];
        $focus->noidung->meal1_north7 = $_POST['meal1_north7'];
        $focus->noidung->meal1_north8 = $_POST['meal1_north8'];
        $focus->noidung->meal1_north9 = $_POST['meal1_north9'];
        $focus->noidung->meal1_north10 = $_POST['meal1_north10'];
        $focus->noidung->meal1_north11 = $_POST['meal1_north11'];
        $focus->noidung->meal1_north12 = $_POST['meal1_north12'];
        $focus->noidung->meal1_north13 = $_POST['meal1_north13'];
        $focus->noidung->meal1_north14 = $_POST['meal1_north14'];
        $focus->noidung->meal1_north15 = $_POST['meal1_north15'];
        $focus->noidung->meal1_north16 = $_POST['meal1_north16'];
        $focus->noidung->meal1_north17 = $_POST['meal1_north17'];
        $focus->noidung->meal1_north18 = $_POST['meal1_north18'];
        $focus->noidung->meal1_north19 = $_POST['meal1_north19'];
        $focus->noidung->meal1_north20 = $_POST['meal1_north20'];
        $focus->noidung->meal1_north21 = $_POST['meal1_north21'];
        $focus->noidung->meal1_north22 = $_POST['meal1_north22'];
        $focus->noidung->meal1_north23 = $_POST['meal1_north23'];
        $focus->noidung->meal1_north24 = $_POST['meal1_north24'];
        $focus->noidung->meal1_north25 = $_POST['meal1_north25'];
        $focus->noidung->meal1_north26 = $_POST['meal1_north26'];
        $focus->noidung->meal1_north27 = $_POST['meal1_north27'];
        $focus->noidung->meal1_north28 = $_POST['meal1_north28'];
        $focus->noidung->meal1_north29 = $_POST['meal1_north29'];
        $focus->noidung->meal1_north30 = $_POST['meal1_north30'];
        
        $focus->noidung->meal1_north_breakfirst_price = $_POST['meal1_north_breakfirst_price'];
        $focus->noidung->meal1_north_breakfirst_num = $_POST['meal1_north_breakfirst_num'];
        $focus->noidung->meal1_north_breakfirst_money = $_POST['meal1_north_breakfirst_money'];
        $focus->noidung->meal1_north_lunch_price = $_POST['meal1_north_lunch_price'];
        $focus->noidung->meal1_north_lunch_num = $_POST['meal1_north_lunch_num'];
        $focus->noidung->meal1_north_lunch_money = $_POST['meal1_north_lunch_money'];
        $focus->noidung->meal1_north_dinner_price = $_POST['meal1_north_dinner_price'];
        $focus->noidung->meal1_north_dinner_num = $_POST['meal1_north_dinner_num'];
        $focus->noidung->meal1_north_dinner_money = $_POST['meal1_north_dinner_money'];
        $focus->noidung->meal1_north_other_price = $_POST['meal1_north_other_price'];
        $focus->noidung->meal1_north_other_num = $_POST['meal1_north_other_num'];
        $focus->noidung->meal1_north_other_money = $_POST['meal1_north_other_money'];
        
        
        $focus->noidung->hotel1_sum = $_POST['hotel1_sum'];
        $focus->noidung->hotel1_1 = $_POST['hotel1_1'];
        $focus->noidung->hotel1_2 = $_POST['hotel1_2'];
        $focus->noidung->hotel1_3 = $_POST['hotel1_3'];
        $focus->noidung->hotel1_4 = $_POST['hotel1_4'];
        $focus->noidung->hotel1_5 = $_POST['hotel1_5'];
        $focus->noidung->hotel1_6 = $_POST['hotel1_6'];
        $focus->noidung->hotel1_7 = $_POST['hotel1_7'];
        $focus->noidung->hotel1_8 = $_POST['hotel1_8'];
        $focus->noidung->hotel1_9 = $_POST['hotel1_9'];
        $focus->noidung->hotel1_10 = $_POST['hotel1_10'];
        $focus->noidung->hotel1_11 = $_POST['hotel1_11'];
        $focus->noidung->hotel1_12 = $_POST['hotel1_12'];
        $focus->noidung->hotel1_13 = $_POST['hotel1_13'];
        $focus->noidung->hotel1_14 = $_POST['hotel1_14'];
        $focus->noidung->hotel1_15 = $_POST['hotel1_15'];
        $focus->noidung->hotel1_16 = $_POST['hotel1_16'];
        $focus->noidung->hotel1_17 = $_POST['hotel1_17'];
        $focus->noidung->hotel1_18 = $_POST['hotel1_18'];
        $focus->noidung->hotel1_19 = $_POST['hotel1_19'];
        $focus->noidung->hotel1_20 = $_POST['hotel1_20'];
        $focus->noidung->hotel1_21 = $_POST['hotel1_21'];
        $focus->noidung->hotel1_22 = $_POST['hotel1_22'];
        $focus->noidung->hotel1_23 = $_POST['hotel1_23'];
        $focus->noidung->hotel1_24 = $_POST['hotel1_24'];
        $focus->noidung->hotel1_25 = $_POST['hotel1_25'];
        $focus->noidung->hotel1_26 = $_POST['hotel1_26'];
        $focus->noidung->hotel1_27 = $_POST['hotel1_27'];
        $focus->noidung->hotel1_28 = $_POST['hotel1_28'];
        $focus->noidung->hotel1_29 = $_POST['hotel1_29'];
        $focus->noidung->hotel1_30 = $_POST['hotel1_30'];
        
        $hotel1_count = count($_POST['hotel1_service']);
        for($i = 0; $i<$hotel1_count; $i++){
            $hotel1[$i]->hotel1_service = $_POST['hotel1_service'][$i];
            $hotel1[$i]->hotel1_price = $_POST['hotel1_price'][$i];
            $hotel1[$i]->hotel1_num = $_POST['hotel1_num'][$i];
            $hotel1[$i]->hotel1_money = $_POST['hotel1_money'][$i];
        }
        
        $focus->noidung->hotel1 = $hotel1;
        
        $focus->noidung->foc1_21 = $_POST['foc1_21'];
        $focus->noidung->foc1_22 = $_POST['foc1_22'];
        $focus->noidung->foc1_23 = $_POST['foc1_23'];
        $focus->noidung->foc1_24 = $_POST['foc1_24'];
        $focus->noidung->foc1_25 = $_POST['foc1_25'];
        $focus->noidung->foc1_26 = $_POST['foc1_26'];
        $focus->noidung->foc1_27 = $_POST['foc1_27'];
        $focus->noidung->foc1_28 = $_POST['foc1_28'];
        $focus->noidung->foc1_29 = $_POST['foc1_29'];
        $focus->noidung->foc1_30 = $_POST['foc1_30'];
        
        $focus->noidung->nett1_1 = $_POST['nett1_1'];
        $focus->noidung->nett1_2 = $_POST['nett1_2'];
        $focus->noidung->nett1_3 = $_POST['nett1_3'];
        $focus->noidung->nett1_4 = $_POST['nett1_4'];
        $focus->noidung->nett1_5 = $_POST['nett1_5'];
        $focus->noidung->nett1_6 = $_POST['nett1_6'];
        $focus->noidung->nett1_7 = $_POST['nett1_7'];
        $focus->noidung->nett1_8 = $_POST['nett1_8'];
        $focus->noidung->nett1_9 = $_POST['nett1_9'];
        $focus->noidung->nett1_10 = $_POST['nett1_10'];
        $focus->noidung->nett1_11 = $_POST['nett1_11'];
        $focus->noidung->nett1_12 = $_POST['nett1_12'];
        $focus->noidung->nett1_13 = $_POST['nett1_13'];
        $focus->noidung->nett1_14 = $_POST['nett1_14'];
        $focus->noidung->nett1_15 = $_POST['nett1_15'];
        $focus->noidung->nett1_16 = $_POST['nett1_16'];
        $focus->noidung->nett1_17 = $_POST['nett1_17'];
        $focus->noidung->nett1_18 = $_POST['nett1_18'];
        $focus->noidung->nett1_19 = $_POST['nett1_19'];
        $focus->noidung->nett1_20 = $_POST['nett1_20'];
        $focus->noidung->nett1_21 = $_POST['nett1_21'];
        $focus->noidung->nett1_22 = $_POST['nett1_22'];
        $focus->noidung->nett1_23 = $_POST['nett1_23'];
        $focus->noidung->nett1_24 = $_POST['nett1_24'];
        $focus->noidung->nett1_25 = $_POST['nett1_25'];
        $focus->noidung->nett1_26 = $_POST['nett1_26'];
        $focus->noidung->nett1_27 = $_POST['nett1_27'];
        $focus->noidung->nett1_28 = $_POST['nett1_28'];
        $focus->noidung->nett1_29 = $_POST['nett1_29'];
        $focus->noidung->nett1_30 = $_POST['nett1_30'];
        $focus->noidung->nett1_31 = $_POST['nett1_31'];
        $focus->noidung->nett1_32 = $_POST['nett1_32'];
        
        $focus->noidung->service1_rate = $_POST['service1_rate'];
        $focus->noidung->service1_1 = $_POST['service1_1'];
        $focus->noidung->service1_2 = $_POST['service1_2'];
        $focus->noidung->service1_5 = $_POST['service1_5'];
        $focus->noidung->service1_6 = $_POST['service1_6'];
        $focus->noidung->service1_9 = $_POST['service1_9'];
        $focus->noidung->service1_10 = $_POST['service1_10'];
        $focus->noidung->service1_13 = $_POST['service1_13'];
        $focus->noidung->service1_14 = $_POST['service1_14'];
        $focus->noidung->service1_17 = $_POST['service1_17'];
        $focus->noidung->service1_18 = $_POST['service1_18'];
        $focus->noidung->service1_21 = $_POST['service1_21'];
        $focus->noidung->service1_22 = $_POST['service1_22'];
        $focus->noidung->service1_25 = $_POST['service1_25'];
        $focus->noidung->service1_26 = $_POST['service1_26'];
        $focus->noidung->service1_27 = $_POST['service1_27'];
        $focus->noidung->service1_31 = $_POST['service1_31'];

        $focus->noidung->sell1_vnd1 = $_POST['sell1_vnd1'];
        $focus->noidung->sell1_vnd2 = $_POST['sell1_vnd2'];
        $focus->noidung->sell1_vnd3 = $_POST['sell1_vnd3'];
        $focus->noidung->sell1_vnd4 = $_POST['sell1_vnd4'];
        $focus->noidung->sell1_vnd5 = $_POST['sell1_vnd5'];
        $focus->noidung->sell1_vnd6 = $_POST['sell1_vnd6'];
        $focus->noidung->sell1_vnd7 = $_POST['sell1_vnd7'];
        $focus->noidung->sell1_vnd8 = $_POST['sell1_vnd8'];
        $focus->noidung->sell1_vnd9 = $_POST['sell1_vnd9'];
        $focus->noidung->sell1_vnd10 = $_POST['sell1_vnd10'];
        $focus->noidung->sell1_vnd11 = $_POST['sell1_vnd11'];
        $focus->noidung->sell1_vnd12 = $_POST['sell1_vnd12'];
        $focus->noidung->sell1_vnd13 = $_POST['sell1_vnd13'];
        $focus->noidung->sell1_vnd14 = $_POST['sell1_vnd14'];
        $focus->noidung->sell1_vnd15 = $_POST['sell1_vnd15'];
        $focus->noidung->sell1_vnd16 = $_POST['sell1_vnd16'];
        $focus->noidung->sell1_vnd17 = $_POST['sell1_vnd17'];
        $focus->noidung->sell1_vnd18 = $_POST['sell1_vnd18'];
        $focus->noidung->sell1_vnd19 = $_POST['sell1_vnd19'];
        $focus->noidung->sell1_vnd20 = $_POST['sell1_vnd20'];
        $focus->noidung->sell1_vnd21 = $_POST['sell1_vnd21'];
        $focus->noidung->sell1_vnd22 = $_POST['sell1_vnd22'];
        $focus->noidung->sell1_vnd23 = $_POST['sell1_vnd23'];
        $focus->noidung->sell1_vnd24 = $_POST['sell1_vnd24'];
        $focus->noidung->sell1_vnd25 = $_POST['sell1_vnd25'];
        $focus->noidung->sell1_vnd26 = $_POST['sell1_vnd26'];
        $focus->noidung->sell1_vnd27 = $_POST['sell1_vnd27'];
        $focus->noidung->sell1_vnd28 = $_POST['sell1_vnd28'];
        $focus->noidung->sell1_vnd29 = $_POST['sell1_vnd29'];
        $focus->noidung->sell1_vnd30 = $_POST['sell1_vnd30'];
        
        $focus->noidung->sell1_usd1 = $_POST['sell1_usd1'];
        $focus->noidung->sell1_usd2 = $_POST['sell1_usd2'];
        $focus->noidung->sell1_usd3 = $_POST['sell1_usd3'];
        $focus->noidung->sell1_usd4 = $_POST['sell1_usd4'];
        $focus->noidung->sell1_usd5 = $_POST['sell1_usd5'];
        $focus->noidung->sell1_usd6 = $_POST['sell1_usd6'];
        $focus->noidung->sell1_usd7 = $_POST['sell1_usd7'];
        $focus->noidung->sell1_usd8 = $_POST['sell1_usd8'];
        $focus->noidung->sell1_usd9 = $_POST['sell1_usd9'];
        $focus->noidung->sell1_usd10 = $_POST['sell1_usd10'];
        $focus->noidung->sell1_usd11 = $_POST['sell1_usd11'];
        $focus->noidung->sell1_usd12 = $_POST['sell1_usd12'];
        $focus->noidung->sell1_usd13 = $_POST['sell1_usd13'];
        $focus->noidung->sell1_usd14 = $_POST['sell1_usd14'];
        $focus->noidung->sell1_usd15 = $_POST['sell1_usd15'];
        $focus->noidung->sell1_usd16 = $_POST['sell1_usd16'];
        $focus->noidung->sell1_usd17 = $_POST['sell1_usd17'];
        $focus->noidung->sell1_usd18 = $_POST['sell1_usd18'];
        $focus->noidung->sell1_usd19 = $_POST['sell1_usd19'];
        $focus->noidung->sell1_usd20 = $_POST['sell1_usd20'];
        $focus->noidung->sell1_usd21 = $_POST['sell1_usd21'];
        $focus->noidung->sell1_usd22 = $_POST['sell1_usd22'];
        $focus->noidung->sell1_usd23 = $_POST['sell1_usd23'];
        $focus->noidung->sell1_usd24 = $_POST['sell1_usd24'];
        $focus->noidung->sell1_usd25 = $_POST['sell1_usd25'];
        $focus->noidung->sell1_usd26 = $_POST['sell1_usd26'];
        $focus->noidung->sell1_usd27 = $_POST['sell1_usd27'];
        $focus->noidung->sell1_usd28 = $_POST['sell1_usd28'];
        $focus->noidung->sell1_usd29 = $_POST['sell1_usd29'];
        $focus->noidung->sell1_usd30 = $_POST['sell1_usd30'];
        
        $focus->noidung->tax1_1 = $_POST['tax1_1'];
        $focus->noidung->tax1_2 = $_POST['tax1_2'];
        $focus->noidung->tax1_5 = $_POST['tax1_5'];
        $focus->noidung->tax1_6 = $_POST['tax1_6'];
        $focus->noidung->tax1_9 = $_POST['tax1_9'];
        $focus->noidung->tax1_10 = $_POST['tax1_10'];
        $focus->noidung->tax1_13 = $_POST['tax1_13'];
        $focus->noidung->tax1_14 = $_POST['tax1_14'];
        $focus->noidung->tax1_17 = $_POST['tax1_17'];
        $focus->noidung->tax1_18 = $_POST['tax1_18'];
        $focus->noidung->tax1_21 = $_POST['tax1_21'];
        $focus->noidung->tax1_22 = $_POST['tax1_22'];
        $focus->noidung->tax1_25 = $_POST['tax1_25'];
        $focus->noidung->tax1_26 = $_POST['tax1_26'];
        $focus->noidung->tax1_27 = $_POST['tax1_27'];
        $focus->noidung->tax1_31 = $_POST['tax1_31'];
        
        $focus->noidung->profit1_1 = $_POST['profit1_1'];
        $focus->noidung->profit1_2 = $_POST['profit1_2'];
        $focus->noidung->profit1_5 = $_POST['profit1_5'];
        $focus->noidung->profit1_6 = $_POST['profit1_6'];
        $focus->noidung->profit1_9 = $_POST['profit1_9'];
        $focus->noidung->profit1_10 = $_POST['profit1_10'];
        $focus->noidung->profit1_13 = $_POST['profit1_13'];
        $focus->noidung->profit1_14 = $_POST['profit1_14'];
        $focus->noidung->profit1_17 = $_POST['profit1_17'];
        $focus->noidung->profit1_18 = $_POST['profit1_18'];
        $focus->noidung->profit1_21 = $_POST['profit1_21'];
        $focus->noidung->profit1_22 = $_POST['profit1_22'];
        $focus->noidung->profit1_25 = $_POST['profit1_25'];
        $focus->noidung->profit1_26 = $_POST['profit1_26'];
        $focus->noidung->profit1_27 = $_POST['profit1_27'];
        $focus->noidung->profit1_31 = $_POST['profit1_31'];
        
        $focus->noidung->total1_1 = $_POST['total1_1']; 
        $focus->noidung->total1_2 = $_POST['total1_2'];
        $focus->noidung->total1_5 = $_POST['total1_5'];
        $focus->noidung->total1_6 = $_POST['total1_6'];
        $focus->noidung->total1_9 = $_POST['total1_9'];
        $focus->noidung->total1_10 = $_POST['total1_10'];
        $focus->noidung->total1_13 = $_POST['total1_13'];
        $focus->noidung->total1_14 = $_POST['total1_14'];
        $focus->noidung->total1_17 = $_POST['total1_17'];
        $focus->noidung->total1_18 = $_POST['total1_18'];
        $focus->noidung->total1_21 = $_POST['total1_21'];
        $focus->noidung->total1_22 = $_POST['total1_22'];
        $focus->noidung->total1_25 = $_POST['total1_25'];
        $focus->noidung->total1_26 = $_POST['total1_26'];
        $focus->noidung->total1_27 = $_POST['total1_27'];
        $focus->noidung->total1_31 = $_POST['total1_31'];
        
        $focus->noidung->interest1_1 = $_POST['interest1_1']; 
        $focus->noidung->interest1_2 = $_POST['interest1_2'];
        $focus->noidung->interest1_5 = $_POST['interest1_5'];
        $focus->noidung->interest1_6 = $_POST['interest1_6'];
        $focus->noidung->interest1_9 = $_POST['interest1_9'];
        $focus->noidung->interest1_10 = $_POST['interest1_10'];
        $focus->noidung->interest1_13 = $_POST['interest1_13'];
        $focus->noidung->interest1_14 = $_POST['interest1_14'];
        $focus->noidung->interest1_17 = $_POST['interest1_17'];
        $focus->noidung->interest1_18 = $_POST['interest1_18'];
        $focus->noidung->interest1_21 = $_POST['interest1_21'];
        $focus->noidung->interest1_22 = $_POST['interest1_22'];
        $focus->noidung->interest1_25 = $_POST['interest1_25'];
        $focus->noidung->interest1_26 = $_POST['interest1_26'];
        $focus->noidung->interest1_27 = $_POST['interest1_27'];
        $focus->noidung->interest1_31 = $_POST['interest1_31'];
        
        
        $focus->noidung->meal2_sum = $_POST['meal2_sum'];
        $focus->noidung->meal2_1 = $_POST['meal2_1'];
        $focus->noidung->meal2_2 = $_POST['meal2_2'];
        $focus->noidung->meal2_3 = $_POST['meal2_3'];
        $focus->noidung->meal2_4 = $_POST['meal2_4'];
        $focus->noidung->meal2_5 = $_POST['meal2_5'];
        $focus->noidung->meal2_6 = $_POST['meal2_6'];
        $focus->noidung->meal2_7 = $_POST['meal2_7'];
        $focus->noidung->meal2_8 = $_POST['meal2_8'];
        $focus->noidung->meal2_9 = $_POST['meal2_9'];
        $focus->noidung->meal2_10 = $_POST['meal2_10'];
        $focus->noidung->meal2_11 = $_POST['meal2_11'];
        $focus->noidung->meal2_12 = $_POST['meal2_12'];
        $focus->noidung->meal2_13 = $_POST['meal2_13'];
        $focus->noidung->meal2_14 = $_POST['meal2_14'];
        $focus->noidung->meal2_15 = $_POST['meal2_15'];
        $focus->noidung->meal2_16 = $_POST['meal2_16'];
        $focus->noidung->meal2_17 = $_POST['meal2_17'];
        $focus->noidung->meal2_18 = $_POST['meal2_18'];
        $focus->noidung->meal2_19 = $_POST['meal2_19'];
        $focus->noidung->meal2_20 = $_POST['meal2_20'];
        $focus->noidung->meal2_21 = $_POST['meal2_21'];
        $focus->noidung->meal2_22 = $_POST['meal2_22'];
        $focus->noidung->meal2_23 = $_POST['meal2_23'];
        $focus->noidung->meal2_24 = $_POST['meal2_24'];
        $focus->noidung->meal2_25 = $_POST['meal2_25'];
        $focus->noidung->meal2_26 = $_POST['meal2_26'];
        $focus->noidung->meal2_27 = $_POST['meal2_27'];
        $focus->noidung->meal2_28 = $_POST['meal2_28'];
        $focus->noidung->meal2_29 = $_POST['meal2_29'];
        $focus->noidung->meal2_30 = $_POST['meal2_30'];
        
        $focus->noidung->meal2_south_sum = $_POST['meal2_south_sum'];
        $focus->noidung->meal2_south1 = $_POST['meal2_south1'];
        $focus->noidung->meal2_south2 = $_POST['meal2_south2'];
        $focus->noidung->meal2_south3 = $_POST['meal2_south3'];
        $focus->noidung->meal2_south4 = $_POST['meal2_south4'];
        $focus->noidung->meal2_south5 = $_POST['meal2_south5'];
        $focus->noidung->meal2_south6 = $_POST['meal2_south6'];
        $focus->noidung->meal2_south7 = $_POST['meal2_south7'];
        $focus->noidung->meal2_south8 = $_POST['meal2_south8'];
        $focus->noidung->meal2_south9 = $_POST['meal2_south9'];
        $focus->noidung->meal2_south10 = $_POST['meal2_south10'];
        $focus->noidung->meal2_south11 = $_POST['meal2_south11'];
        $focus->noidung->meal2_south12 = $_POST['meal2_south12'];
        $focus->noidung->meal2_south13 = $_POST['meal2_south13'];
        $focus->noidung->meal2_south14 = $_POST['meal2_south14'];
        $focus->noidung->meal2_south15 = $_POST['meal2_south15'];
        $focus->noidung->meal2_south16 = $_POST['meal2_south16'];
        $focus->noidung->meal2_south17 = $_POST['meal2_south17'];
        $focus->noidung->meal2_south18 = $_POST['meal2_south18'];
        $focus->noidung->meal2_south19 = $_POST['meal2_south19'];
        $focus->noidung->meal2_south20 = $_POST['meal2_south20'];
        $focus->noidung->meal2_south21 = $_POST['meal2_south21'];
        $focus->noidung->meal2_south22 = $_POST['meal2_south22'];
        $focus->noidung->meal2_south23 = $_POST['meal2_south23'];
        $focus->noidung->meal2_south24 = $_POST['meal2_south24'];
        $focus->noidung->meal2_south25 = $_POST['meal2_south25'];
        $focus->noidung->meal2_south26 = $_POST['meal2_south26'];
        $focus->noidung->meal2_south27 = $_POST['meal2_south27'];
        $focus->noidung->meal2_south28 = $_POST['meal2_south28'];
        $focus->noidung->meal2_south29 = $_POST['meal2_south29'];
        $focus->noidung->meal2_south30 = $_POST['meal2_south30'];
        
        
        $focus->noidung->meal2_south_breakfirst_price = $_POST['meal2_south_breakfirst_price'];
        $focus->noidung->meal2_south_breakfirst_num = $_POST['meal2_south_breakfirst_num'];
        $focus->noidung->meal2_south_breakfirst_money = $_POST['meal2_south_breakfirst_money'];
        $focus->noidung->meal2_south_lunch_price = $_POST['meal2_south_lunch_price'];
        $focus->noidung->meal2_south_lunch_num = $_POST['meal2_south_lunch_num'];
        $focus->noidung->meal2_south_lunch_money = $_POST['meal2_south_lunch_money'];
        $focus->noidung->meal2_middle_dinner_price = $_POST['meal2_middle_dinner_price'];
        $focus->noidung->meal2_middle_dinner_num = $_POST['meal2_middle_dinner_num'];
        $focus->noidung->meal2_middle_dinner_money = $_POST['meal2_middle_dinner_money'];
        $focus->noidung->meal2_middle_other_price = $_POST['meal2_middle_other_price'];
        $focus->noidung->meal2_middle_other_num = $_POST['meal2_middle_other_num'];
        $focus->noidung->meal2_middle_other_money = $_POST['meal2_middle_other_money'];
        
        $focus->noidung->meal2_north_sum = $_POST['meal2_north_sum'];
        $focus->noidung->meal2_north1 = $_POST['meal2_north1'];
        $focus->noidung->meal2_north2 = $_POST['meal2_north2'];
        $focus->noidung->meal2_north3 = $_POST['meal2_north3'];
        $focus->noidung->meal2_north4 = $_POST['meal2_north4'];
        $focus->noidung->meal2_north5 = $_POST['meal2_north5'];
        $focus->noidung->meal2_north6 = $_POST['meal2_north6'];
        $focus->noidung->meal2_north7 = $_POST['meal2_north7'];
        $focus->noidung->meal2_north8 = $_POST['meal2_north8'];
        $focus->noidung->meal2_north9 = $_POST['meal2_north9'];
        $focus->noidung->meal2_north10 = $_POST['meal2_north10'];
        $focus->noidung->meal2_north11 = $_POST['meal2_north11'];
        $focus->noidung->meal2_north12 = $_POST['meal2_north12'];
        $focus->noidung->meal2_north13 = $_POST['meal2_north13'];
        $focus->noidung->meal2_north14 = $_POST['meal2_north14'];
        $focus->noidung->meal2_north15 = $_POST['meal2_north15'];
        $focus->noidung->meal2_north16 = $_POST['meal2_north16'];
        $focus->noidung->meal2_north17 = $_POST['meal2_north17'];
        $focus->noidung->meal2_north18 = $_POST['meal2_north18'];
        $focus->noidung->meal2_north19 = $_POST['meal2_north19'];
        $focus->noidung->meal2_north20 = $_POST['meal2_north20'];
        $focus->noidung->meal2_north21 = $_POST['meal2_north21'];
        $focus->noidung->meal2_north22 = $_POST['meal2_north22'];
        $focus->noidung->meal2_north23 = $_POST['meal2_north23'];
        $focus->noidung->meal2_north24 = $_POST['meal2_north24'];
        $focus->noidung->meal2_north25 = $_POST['meal2_north25'];
        $focus->noidung->meal2_north26 = $_POST['meal2_north26'];
        $focus->noidung->meal2_north27 = $_POST['meal2_north27'];
        $focus->noidung->meal2_north28 = $_POST['meal2_north28'];
        $focus->noidung->meal2_north29 = $_POST['meal2_north29'];
        $focus->noidung->meal2_north30 = $_POST['meal2_north30'];
        
        $focus->noidung->meal2_north_breakfirst_price = $_POST['meal2_north_breakfirst_price'];
        $focus->noidung->meal2_north_breakfirst_num = $_POST['meal2_north_breakfirst_num'];
        $focus->noidung->meal2_north_breakfirst_money = $_POST['meal2_north_breakfirst_money'];
        $focus->noidung->meal2_north_lunch_price = $_POST['meal2_north_lunch_price'];
        $focus->noidung->meal2_north_lunch_num = $_POST['meal2_north_lunch_num'];
        $focus->noidung->meal2_north_lunch_money = $_POST['meal2_north_lunch_money'];
        $focus->noidung->meal2_north_dinner_price = $_POST['meal2_north_dinner_price'];
        $focus->noidung->meal2_north_dinner_num = $_POST['meal2_north_dinner_num'];
        $focus->noidung->meal2_north_dinner_money = $_POST['meal2_north_dinner_money'];
        $focus->noidung->meal2_north_other_price = $_POST['meal2_north_other_price'];
        $focus->noidung->meal2_north_other_num = $_POST['meal2_north_other_num'];
        $focus->noidung->meal2_north_other_money = $_POST['meal2_north_other_money'];
        
        $focus->noidung->hotel2_sum = $_POST['hotel2_sum'];
        $focus->noidung->hotel2_1 = $_POST['hotel2_1'];
        $focus->noidung->hotel2_2 = $_POST['hotel2_2'];
        $focus->noidung->hotel2_3 = $_POST['hotel2_3'];
        $focus->noidung->hotel2_4 = $_POST['hotel2_4'];
        $focus->noidung->hotel2_5 = $_POST['hotel2_5'];
        $focus->noidung->hotel2_6 = $_POST['hotel2_6'];
        $focus->noidung->hotel2_7 = $_POST['hotel2_7'];
        $focus->noidung->hotel2_8 = $_POST['hotel2_8'];
        $focus->noidung->hotel2_9 = $_POST['hotel2_9'];
        $focus->noidung->hotel2_10 = $_POST['hotel2_10'];
        $focus->noidung->hotel2_11 = $_POST['hotel2_11'];
        $focus->noidung->hotel2_12 = $_POST['hotel2_12'];
        $focus->noidung->hotel2_13 = $_POST['hotel2_13'];
        $focus->noidung->hotel2_14 = $_POST['hotel2_14'];
        $focus->noidung->hotel2_15 = $_POST['hotel2_15'];
        $focus->noidung->hotel2_16 = $_POST['hotel2_16'];
        $focus->noidung->hotel2_17 = $_POST['hotel2_17'];
        $focus->noidung->hotel2_18 = $_POST['hotel2_18'];
        $focus->noidung->hotel2_19 = $_POST['hotel2_19'];
        $focus->noidung->hotel2_20 = $_POST['hotel2_20'];
        $focus->noidung->hotel2_21 = $_POST['hotel2_21'];
        $focus->noidung->hotel2_22 = $_POST['hotel2_22'];
        $focus->noidung->hotel2_23 = $_POST['hotel2_23'];
        $focus->noidung->hotel2_24 = $_POST['hotel2_24'];
        $focus->noidung->hotel2_25 = $_POST['hotel2_25'];
        $focus->noidung->hotel2_26 = $_POST['hotel2_26'];
        $focus->noidung->hotel2_27 = $_POST['hotel2_27'];
        $focus->noidung->hotel2_28 = $_POST['hotel2_28'];
        $focus->noidung->hotel2_29 = $_POST['hotel2_29'];
        $focus->noidung->hotel2_30 = $_POST['hotel2_30'];
        
        $count_hotel2 = count($_POST['hotel2_service']);
        for($i= 0; $i<$count_hotel2; $i++){
            $hotel2[$i]->hotel2_service = $_POST['hotel2_service'][$i];
            $hotel2[$i]->hotel2_price = $_POST['hotel2_price'][$i];
            $hotel2[$i]->hotel2_num = $_POST['hotel2_num'][$i];
            $hotel2[$i]->hotel2_money = $_POST['hotel2_money'][$i];
        }
        $focus->noidung->hotel2 = $hotel2;
        
        
        $focus->noidung->foc2_21 = $_POST['foc2_21'];
        $focus->noidung->foc2_22 = $_POST['foc2_22'];
        $focus->noidung->foc2_23 = $_POST['foc2_23'];
        $focus->noidung->foc2_24 = $_POST['foc2_24'];
        $focus->noidung->foc2_25 = $_POST['foc2_25'];
        $focus->noidung->foc2_26 = $_POST['foc2_26'];
        $focus->noidung->foc2_27 = $_POST['foc2_27'];
        $focus->noidung->foc2_28 = $_POST['foc2_28'];
        $focus->noidung->foc2_29 = $_POST['foc2_29'];
        $focus->noidung->foc2_30 = $_POST['foc2_30'];
        
        $focus->noidung->nett2_1 = $_POST['nett2_1'];
        $focus->noidung->nett2_2 = $_POST['nett2_2'];
        $focus->noidung->nett2_3 = $_POST['nett2_3'];
        $focus->noidung->nett2_4 = $_POST['nett2_4'];
        $focus->noidung->nett2_5 = $_POST['nett2_5'];
        $focus->noidung->nett2_6 = $_POST['nett2_6'];
        $focus->noidung->nett2_7 = $_POST['nett2_7'];
        $focus->noidung->nett2_8 = $_POST['nett2_8'];
        $focus->noidung->nett2_9 = $_POST['nett2_9'];
        $focus->noidung->nett2_10 = $_POST['nett2_10'];
        $focus->noidung->nett2_11 = $_POST['nett2_11'];
        $focus->noidung->nett2_12 = $_POST['nett2_12'];
        $focus->noidung->nett2_13 = $_POST['nett2_13'];
        $focus->noidung->nett2_14 = $_POST['nett2_14'];
        $focus->noidung->nett2_15 = $_POST['nett2_15'];
        $focus->noidung->nett2_16 = $_POST['nett2_16'];
        $focus->noidung->nett2_17 = $_POST['nett2_17'];
        $focus->noidung->nett2_18 = $_POST['nett2_18'];
        $focus->noidung->nett2_19 = $_POST['nett2_19'];
        $focus->noidung->nett2_20 = $_POST['nett2_20'];
        
        $focus->noidung->service2_rate = $_POST['service2_rate'];
        $focus->noidung->service2_1 = $_POST['service2_1'];
        $focus->noidung->service2_2 = $_POST['service2_2'];
        $focus->noidung->service2_5 = $_POST['service2_5'];
        $focus->noidung->service2_6 = $_POST['service2_6'];
        $focus->noidung->service2_9 = $_POST['service2_9'];
        $focus->noidung->service2_10 = $_POST['service2_10'];
        $focus->noidung->service2_13 = $_POST['service2_13'];
        $focus->noidung->service2_14 = $_POST['service2_14'];
        $focus->noidung->service2_17 = $_POST['service2_17'];
        $focus->noidung->service2_18 = $_POST['service2_18'];
        $focus->noidung->service2_21 = $_POST['service2_21'];
        $focus->noidung->service2_22 = $_POST['service2_22'];
        $focus->noidung->service2_25 = $_POST['service2_25'];
        $focus->noidung->service2_26 = $_POST['service2_26'];
        $focus->noidung->service2_27 = $_POST['service2_27'];
        
        $focus->noidung->sell2_vnd1 = $_POST['sell2_vnd1'];
        $focus->noidung->sell2_vnd2 = $_POST['sell2_vnd2'];
        $focus->noidung->sell2_vnd3 = $_POST['sell2_vnd3'];
        $focus->noidung->sell2_vnd4 = $_POST['sell2_vnd4'];
        $focus->noidung->sell2_vnd5 = $_POST['sell2_vnd5'];
        $focus->noidung->sell2_vnd6 = $_POST['sell2_vnd6'];
        $focus->noidung->sell2_vnd7 = $_POST['sell2_vnd7'];
        $focus->noidung->sell2_vnd8 = $_POST['sell2_vnd8'];
        $focus->noidung->sell2_vnd9 = $_POST['sell2_vnd9'];
        $focus->noidung->sell2_vnd10 = $_POST['sell2_vnd10'];
        $focus->noidung->sell2_vnd11 = $_POST['sell2_vnd11'];
        $focus->noidung->sell2_vnd12 = $_POST['sell2_vnd12'];
        $focus->noidung->sell2_vnd13 = $_POST['sell2_vnd13'];
        $focus->noidung->sell2_vnd14 = $_POST['sell2_vnd14'];
        $focus->noidung->sell2_vnd15 = $_POST['sell2_vnd15'];
        $focus->noidung->sell2_vnd16 = $_POST['sell2_vnd16'];
        $focus->noidung->sell2_vnd17 = $_POST['sell2_vnd17'];
        $focus->noidung->sell2_vnd18 = $_POST['sell2_vnd18'];
        $focus->noidung->sell2_vnd19 = $_POST['sell2_vnd19'];
        $focus->noidung->sell2_vnd20 = $_POST['sell2_vnd20'];
        $focus->noidung->sell2_vnd21 = $_POST['sell2_vnd21'];
        $focus->noidung->sell2_vnd22 = $_POST['sell2_vnd22'];
        $focus->noidung->sell2_vnd23 = $_POST['sell2_vnd23'];
        $focus->noidung->sell2_vnd24 = $_POST['sell2_vnd24'];
        $focus->noidung->sell2_vnd25 = $_POST['sell2_vnd25'];
        $focus->noidung->sell2_vnd26 = $_POST['sell2_vnd26'];
        $focus->noidung->sell2_vnd27 = $_POST['sell2_vnd27'];
        $focus->noidung->sell2_vnd28 = $_POST['sell2_vnd28'];
        $focus->noidung->sell2_vnd29 = $_POST['sell2_vnd29'];
        $focus->noidung->sell2_vnd30 = $_POST['sell2_vnd30'];
        
        
        $focus->noidung->sell2_usd1 = $_POST['sell2_usd1'];
        $focus->noidung->sell2_usd2 = $_POST['sell2_usd2'];
        $focus->noidung->sell2_usd5 = $_POST['sell2_usd5'];
        $focus->noidung->sell2_usd6 = $_POST['sell2_usd6'];
        $focus->noidung->sell2_usd9 = $_POST['sell2_usd9'];
        $focus->noidung->sell2_usd10 = $_POST['sell2_usd10'];
        $focus->noidung->sell2_usd13 = $_POST['sell2_usd13'];
        $focus->noidung->sell2_usd14 = $_POST['sell2_usd14'];
        $focus->noidung->sell2_usd17 = $_POST['sell2_usd17'];
        $focus->noidung->sell2_usd18 = $_POST['sell2_usd18'];
        $focus->noidung->sell2_usd21 = $_POST['sell2_usd21'];
        $focus->noidung->sell2_usd22 = $_POST['sell2_usd22'];
        $focus->noidung->sell2_usd25 = $_POST['sell2_usd25'];
        $focus->noidung->sell2_usd26 = $_POST['sell2_usd26'];
        $focus->noidung->sell2_usd27 = $_POST['sell2_usd27'];
        $focus->noidung->sell2_usd31 = $_POST['sell2_usd31'];
        
        $focus->noidung->tax2_1 = $_POST['tax2_1'];
        $focus->noidung->tax2_2 = $_POST['tax2_2'];
        $focus->noidung->tax2_5 = $_POST['tax2_5'];
        $focus->noidung->tax2_6 = $_POST['tax2_6'];
        $focus->noidung->tax2_9 = $_POST['tax2_9'];
        $focus->noidung->tax2_10 = $_POST['tax2_10'];
        $focus->noidung->tax2_13 = $_POST['tax2_13'];
        $focus->noidung->tax2_14 = $_POST['tax2_14'];
        $focus->noidung->tax2_17 = $_POST['tax2_17'];
        $focus->noidung->tax2_18 = $_POST['tax2_18'];
        $focus->noidung->tax2_21 = $_POST['tax2_21'];
        $focus->noidung->tax2_22 = $_POST['tax2_22'];
        $focus->noidung->tax2_25 = $_POST['tax2_25'];
        $focus->noidung->tax2_26 = $_POST['tax2_26'];
        $focus->noidung->tax2_27 = $_POST['tax2_27'];
        $focus->noidung->tax2_31 = $_POST['tax2_31'];
        
        
        $focus->noidung->profit2_1 = $_POST['profit2_1'];
        $focus->noidung->profit2_2 = $_POST['profit2_2'];
        $focus->noidung->profit2_5 = $_POST['profit2_5'];
        $focus->noidung->profit2_6 = $_POST['profit2_6'];
        $focus->noidung->profit2_9 = $_POST['profit2_9'];
        $focus->noidung->profit2_10 = $_POST['profit2_10'];
        $focus->noidung->profit2_13 = $_POST['profit2_13'];
        $focus->noidung->profit2_14 = $_POST['profit2_14'];
        $focus->noidung->profit2_17 = $_POST['profit2_17'];
        $focus->noidung->profit2_18 = $_POST['profit2_18'];
        $focus->noidung->profit2_21 = $_POST['profit2_21'];
        $focus->noidung->profit2_22 = $_POST['profit2_22'];
        $focus->noidung->profit2_25 = $_POST['profit2_25'];
        $focus->noidung->profit2_26 = $_POST['profit2_26'];
        $focus->noidung->profit2_27 = $_POST['profit2_27'];
        $focus->noidung->profit2_31 = $_POST['profit2_31'];
        
        $focus->noidung->total2_1 = $_POST['total2_1'];
        $focus->noidung->total2_2 = $_POST['total2_2'];
        $focus->noidung->total2_5 = $_POST['total2_5'];
        $focus->noidung->total2_6 = $_POST['total2_6'];
        $focus->noidung->total2_9 = $_POST['total2_9'];
        $focus->noidung->total2_10 = $_POST['total2_10'];
        $focus->noidung->total2_13 = $_POST['total2_13'];
        $focus->noidung->total2_14 = $_POST['total2_14'];
        $focus->noidung->total2_17 = $_POST['total2_17'];
        $focus->noidung->total2_18 = $_POST['total2_18'];
        $focus->noidung->total2_21 = $_POST['total2_21'];
        $focus->noidung->total2_22 = $_POST['total2_22'];
        $focus->noidung->total2_25 = $_POST['total2_25'];
        $focus->noidung->total2_26 = $_POST['total2_26'];
        $focus->noidung->total2_27 = $_POST['total2_27'];
        $focus->noidung->total2_31 = $_POST['total2_31'];
        
        $focus->noidung->interest2_1 = $_POST['interest2_1'];
        $focus->noidung->interest2_2 = $_POST['interest2_2'];
        $focus->noidung->interest2_5 = $_POST['interest2_5'];
        $focus->noidung->interest2_6 = $_POST['interest2_6'];
        $focus->noidung->interest2_9 = $_POST['interest2_9'];
        $focus->noidung->interest2_10 = $_POST['interest2_10'];
        $focus->noidung->interest2_13 = $_POST['interest2_13'];
        $focus->noidung->interest2_14 = $_POST['interest2_14'];
        $focus->noidung->interest2_17 = $_POST['interest2_17'];
        $focus->noidung->interest2_18 = $_POST['interest2_18'];
        $focus->noidung->interest2_21 = $_POST['interest2_21'];
        $focus->noidung->interest2_22 = $_POST['interest2_22'];
        $focus->noidung->interest2_25 = $_POST['interest2_25'];
        $focus->noidung->interest2_26 = $_POST['interest2_26'];
        $focus->noidung->interest2_27 = $_POST['interest2_27'];
        $focus->noidung->interest2_31 = $_POST['interest2_31'];
        
        
        $focus->noidung->meal3_sum = $_POST['meal3_sum'];
        $focus->noidung->meal3_1 = $_POST['meal3_1'];
        $focus->noidung->meal3_2 = $_POST['meal3_2'];
        $focus->noidung->meal3_3 = $_POST['meal3_3'];
        $focus->noidung->meal3_4 = $_POST['meal3_4'];
        $focus->noidung->meal3_5 = $_POST['meal3_5'];
        $focus->noidung->meal3_6 = $_POST['meal3_6'];
        $focus->noidung->meal3_7 = $_POST['meal3_7'];
        $focus->noidung->meal3_8 = $_POST['meal3_8'];
        $focus->noidung->meal3_9 = $_POST['meal3_9'];
        $focus->noidung->meal3_10 = $_POST['meal3_10'];
        $focus->noidung->meal3_11 = $_POST['meal3_11'];
        $focus->noidung->meal3_12 = $_POST['meal3_12'];
        $focus->noidung->meal3_13 = $_POST['meal3_13'];
        $focus->noidung->meal3_14 = $_POST['meal3_14'];
        $focus->noidung->meal3_15 = $_POST['meal3_15'];
        $focus->noidung->meal3_16 = $_POST['meal3_16'];
        $focus->noidung->meal3_17 = $_POST['meal3_17'];
        $focus->noidung->meal3_18 = $_POST['meal3_18'];
        $focus->noidung->meal3_19 = $_POST['meal3_19'];
        $focus->noidung->meal3_20 = $_POST['meal3_20'];
        $focus->noidung->meal3_21 = $_POST['meal3_21'];
        $focus->noidung->meal3_22 = $_POST['meal3_22'];
        $focus->noidung->meal3_23 = $_POST['meal3_23'];
        $focus->noidung->meal3_24 = $_POST['meal3_24'];
        $focus->noidung->meal3_25 = $_POST['meal3_25'];
        $focus->noidung->meal3_26 = $_POST['meal3_26'];
        $focus->noidung->meal3_27 = $_POST['meal3_27'];
        $focus->noidung->meal3_28 = $_POST['meal3_28'];
        $focus->noidung->meal3_29 = $_POST['meal3_29'];
        $focus->noidung->meal3_30 = $_POST['meal3_30'];
        
        $focus->noidung->meal3_south_sum = $_POST['meal3_south_sum'];
        $focus->noidung->meal3_south1 = $_POST['meal3_south1'];
        $focus->noidung->meal3_south2 = $_POST['meal3_south2'];
        $focus->noidung->meal3_south3 = $_POST['meal3_south3'];
        $focus->noidung->meal3_south4 = $_POST['meal3_south4'];
        $focus->noidung->meal3_south5 = $_POST['meal3_south5'];
        $focus->noidung->meal3_south6 = $_POST['meal3_south6'];
        $focus->noidung->meal3_south7 = $_POST['meal3_south7'];
        $focus->noidung->meal3_south8 = $_POST['meal3_south8'];
        $focus->noidung->meal3_south9 = $_POST['meal3_south9'];
        $focus->noidung->meal3_south10 = $_POST['meal3_south10'];
        $focus->noidung->meal3_south11 = $_POST['meal3_south11'];
        $focus->noidung->meal3_south12 = $_POST['meal3_south12'];
        $focus->noidung->meal3_south13 = $_POST['meal3_south13'];
        $focus->noidung->meal3_south14 = $_POST['meal3_south14'];
        $focus->noidung->meal3_south15 = $_POST['meal3_south15'];
        $focus->noidung->meal3_south16 = $_POST['meal3_south16'];
        $focus->noidung->meal3_south17 = $_POST['meal3_south17'];
        $focus->noidung->meal3_south18 = $_POST['meal3_south18'];
        $focus->noidung->meal3_south19 = $_POST['meal3_south19'];
        $focus->noidung->meal3_south20 = $_POST['meal3_south20'];
        $focus->noidung->meal3_south21 = $_POST['meal3_south21'];
        $focus->noidung->meal3_south22 = $_POST['meal3_south22'];
        $focus->noidung->meal3_south23 = $_POST['meal3_south23'];
        $focus->noidung->meal3_south24 = $_POST['meal3_south24'];
        $focus->noidung->meal3_south25 = $_POST['meal3_south25'];
        $focus->noidung->meal3_south26 = $_POST['meal3_south26'];
        $focus->noidung->meal3_south27 = $_POST['meal3_south27'];
        $focus->noidung->meal3_south28 = $_POST['meal3_south28'];
        $focus->noidung->meal3_south29 = $_POST['meal3_south29'];
        $focus->noidung->meal3_south30 = $_POST['meal3_south30'];
        
        
        $focus->noidung->meal3_south_breakfirst_price = $_POST['meal3_south_breakfirst_price'];
        $focus->noidung->meal3_south_breakfirst_num = $_POST['meal3_south_breakfirst_num'];
        $focus->noidung->meal3_south_breakfirst_money = $_POST['meal3_south_breakfirst_money'];
        $focus->noidung->meal3_south_lunch_price = $_POST['meal3_south_lunch_price'];
        $focus->noidung->meal3_south_lunch_num = $_POST['meal3_south_lunch_num'];
        $focus->noidung->meal3_south_lunch_money = $_POST['meal3_south_lunch_money'];
        $focus->noidung->meal3_south_dinner_price = $_POST['meal3_south_dinner_price'];
        $focus->noidung->meal3_south_dinner_num = $_POST['meal3_south_dinner_num'];
        $focus->noidung->meal3_south_dinner_money = $_POST['meal3_south_dinner_money'];
        $focus->noidung->meal3_south_other_price = $_POST['meal3_south_other_price'];
        $focus->noidung->meal3_south_other_num = $_POST['meal3_south_other_num'];
        $focus->noidung->meal3_south_other_money = $_POST['meal3_south_other_money'];
        
        
        $focus->noidung->meal3_miidle_sum = $_POST['meal3_miidle_sum'];
        $focus->noidung->meal3_middle1 = $_POST['meal3_middle1'];
        $focus->noidung->meal3_middle2 = $_POST['meal3_middle2'];
        $focus->noidung->meal3_middle3 = $_POST['meal3_middle3'];
        $focus->noidung->meal3_middle4 = $_POST['meal3_middle4'];
        $focus->noidung->meal3_middle5 = $_POST['meal3_middle5'];
        $focus->noidung->meal3_middle6 = $_POST['meal3_middle6'];
        $focus->noidung->meal3_middle7 = $_POST['meal3_middle7'];
        $focus->noidung->meal3_middle8 = $_POST['meal3_middle8'];
        $focus->noidung->meal3_middle9 = $_POST['meal3_middle9'];
        $focus->noidung->meal3_middle10 = $_POST['meal3_middle10'];
        $focus->noidung->meal3_middle11 = $_POST['meal3_middle11'];
        $focus->noidung->meal3_middle12 = $_POST['meal3_middle12'];
        $focus->noidung->meal3_middle13 = $_POST['meal3_middle13'];
        $focus->noidung->meal3_middle14 = $_POST['meal3_middle14'];
        $focus->noidung->meal3_middle15 = $_POST['meal3_middle15'];
        $focus->noidung->meal3_middle16 = $_POST['meal3_middle16'];
        $focus->noidung->meal3_middle17 = $_POST['meal3_middle17'];
        $focus->noidung->meal3_middle18 = $_POST['meal3_middle18'];
        $focus->noidung->meal3_middle19 = $_POST['meal3_middle19'];
        $focus->noidung->meal3_middle20 = $_POST['meal3_middle20'];
        $focus->noidung->meal3_middle21 = $_POST['meal3_middle21'];
        $focus->noidung->meal3_middle22 = $_POST['meal3_middle22'];
        $focus->noidung->meal3_middle23 = $_POST['meal3_middle23'];
        $focus->noidung->meal3_middle24 = $_POST['meal3_middle24'];
        $focus->noidung->meal3_middle25 = $_POST['meal3_middle25'];
        $focus->noidung->meal3_middle26 = $_POST['meal3_middle26'];
        $focus->noidung->meal3_middle27 = $_POST['meal3_middle27'];
        $focus->noidung->meal3_middle28 = $_POST['meal3_middle28'];
        $focus->noidung->meal3_middle29 = $_POST['meal3_middle29'];
        $focus->noidung->meal3_middle30 = $_POST['meal3_middle30'];
        
        
        $focus->noidung->meal3_middle_breakfirst_price = $_POST['meal3_middle_breakfirst_price'];
        $focus->noidung->meal3_middle_breakfirst_num = $_POST['meal3_middle_breakfirst_num'];
        $focus->noidung->meal3_middle_breakfirst_money = $_POST['meal3_middle_breakfirst_money'];
        $focus->noidung->meal3_middle_lunch_price = $_POST['meal3_middle_lunch_price'];
        $focus->noidung->meal3_middle_lunch_num = $_POST['meal3_middle_lunch_num'];
        $focus->noidung->meal3_middle_lunch_money = $_POST['meal3_middle_lunch_money'];
        $focus->noidung->meal3_middle_dinner_price = $_POST['meal3_middle_dinner_price'];
        $focus->noidung->meal3_middle_dinner_num = $_POST['meal3_middle_dinner_num'];
        $focus->noidung->meal3_middle_dinner_money = $_POST['meal3_middle_dinner_money'];
        $focus->noidung->meal3_middle_other_price = $_POST['meal3_middle_other_price'];
        $focus->noidung->meal3_middle_other_num = $_POST['meal3_middle_other_num'];
        $focus->noidung->meal3_middle_other_money = $_POST['meal3_middle_other_money'];
        
        
        $focus->noidung->meal3_north_sum = $_POST['meal3_north_sum'];
        $focus->noidung->meal3_north1 = $_POST['meal3_north1'];
        $focus->noidung->meal3_north2 = $_POST['meal3_north2'];
        $focus->noidung->meal3_north3 = $_POST['meal3_north3'];
        $focus->noidung->meal3_north4 = $_POST['meal3_north4'];
        $focus->noidung->meal3_north5 = $_POST['meal3_north5'];
        $focus->noidung->meal3_north6 = $_POST['meal3_north6'];
        $focus->noidung->meal3_north7 = $_POST['meal3_north7'];
        $focus->noidung->meal3_north8 = $_POST['meal3_north8'];
        $focus->noidung->meal3_north9 = $_POST['meal3_north9'];
        $focus->noidung->meal3_north10 = $_POST['meal3_north10'];
        $focus->noidung->meal3_north11 = $_POST['meal3_north11'];
        $focus->noidung->meal3_north12 = $_POST['meal3_north12'];
        $focus->noidung->meal3_north13 = $_POST['meal3_north13'];
        $focus->noidung->meal3_north14 = $_POST['meal3_north14'];
        $focus->noidung->meal3_north15 = $_POST['meal3_north15'];
        $focus->noidung->meal3_north16 = $_POST['meal3_north16'];
        $focus->noidung->meal3_north17 = $_POST['meal3_north17'];
        $focus->noidung->meal3_north18 = $_POST['meal3_north18'];
        $focus->noidung->meal3_north19 = $_POST['meal3_north19'];
        $focus->noidung->meal3_north20 = $_POST['meal3_north20'];
        $focus->noidung->meal3_north21 = $_POST['meal3_north21'];
        $focus->noidung->meal3_north22 = $_POST['meal3_north22'];
        $focus->noidung->meal3_north23 = $_POST['meal3_north23'];
        $focus->noidung->meal3_north24 = $_POST['meal3_north24'];
        $focus->noidung->meal3_north25 = $_POST['meal3_north25'];
        $focus->noidung->meal3_north26 = $_POST['meal3_north26'];
        $focus->noidung->meal3_north27 = $_POST['meal3_north27'];
        $focus->noidung->meal3_north28 = $_POST['meal3_north28'];
        $focus->noidung->meal3_north29 = $_POST['meal3_north29'];
        $focus->noidung->meal3_north30 = $_POST['meal3_north30'];
        
        
        
        $focus->noidung->meal3_north_breakfirst_price = $_POST['meal3_north_breakfirst_price'];
        $focus->noidung->meal3_south_breakfirst_num = $_POST['meal3_south_breakfirst_num'];
        $focus->noidung->meal3_south_breakfirst_money = $_POST['meal3_south_breakfirst_money'];
        $focus->noidung->meal3_south_lunch_price = $_POST['meal3_south_lunch_price'];
        $focus->noidung->meal3_south_lunch_num = $_POST['meal3_south_lunch_num'];
        $focus->noidung->meal3_south_lunch_money = $_POST['meal3_south_lunch_money'];
        $focus->noidung->meal3_south_dinner_price = $_POST['meal3_south_dinner_price'];
        $focus->noidung->meal3_south_dinner_num = $_POST['meal3_south_dinner_num'];
        $focus->noidung->meal3_south_dinner_money = $_POST['meal3_south_dinner_money'];
        $focus->noidung->meal3_south_other_price = $_POST['meal3_south_other_price'];
        $focus->noidung->meal3_south_other_num = $_POST['meal3_south_other_num'];
        $focus->noidung->meal3_south_other_money = $_POST['meal3_south_other_money'];
        
        
        $focus->noidung->meal3_miidle_sum = $_POST['meal3_miidle_sum'];
        $focus->noidung->meal3_middle1 = $_POST['meal3_middle1'];
        $focus->noidung->meal3_middle2 = $_POST['meal3_middle2'];
        $focus->noidung->meal3_middle3 = $_POST['meal3_middle3'];
        $focus->noidung->meal3_middle4 = $_POST['meal3_middle4'];
        $focus->noidung->meal3_middle5 = $_POST['meal3_middle5'];
        $focus->noidung->meal3_middle6 = $_POST['meal3_middle6'];
        $focus->noidung->meal3_middle7 = $_POST['meal3_middle7'];
        $focus->noidung->meal3_middle8 = $_POST['meal3_middle8'];
        $focus->noidung->meal3_middle9 = $_POST['meal3_middle9'];
        $focus->noidung->meal3_middle10 = $_POST['meal3_middle10'];
        $focus->noidung->meal3_middle11 = $_POST['meal3_middle11'];
        $focus->noidung->meal3_middle12 = $_POST['meal3_middle12'];
        $focus->noidung->meal3_middle13 = $_POST['meal3_middle13'];
        $focus->noidung->meal3_middle14 = $_POST['meal3_middle14'];
        $focus->noidung->meal3_middle15 = $_POST['meal3_middle15'];
        $focus->noidung->meal3_middle16 = $_POST['meal3_middle16'];
        $focus->noidung->meal3_middle17 = $_POST['meal3_middle17'];
        $focus->noidung->meal3_middle18 = $_POST['meal3_middle18'];
        $focus->noidung->meal3_middle19 = $_POST['meal3_middle19'];
        $focus->noidung->meal3_middle20 = $_POST['meal3_middle20'];
        $focus->noidung->meal3_middle21 = $_POST['meal3_middle21'];
        $focus->noidung->meal3_middle22 = $_POST['meal3_middle22'];
        $focus->noidung->meal3_middle23 = $_POST['meal3_middle23'];
        $focus->noidung->meal3_middle24 = $_POST['meal3_middle24'];
        $focus->noidung->meal3_middle25 = $_POST['meal3_middle25'];
        $focus->noidung->meal3_middle26 = $_POST['meal3_middle26'];
        $focus->noidung->meal3_middle27 = $_POST['meal3_middle27'];
        $focus->noidung->meal3_middle28 = $_POST['meal3_middle28'];
        $focus->noidung->meal3_middle29 = $_POST['meal3_middle29'];
        $focus->noidung->meal3_middle30 = $_POST['meal3_middle30'];
        
        
        $focus->noidung->meal3_middle_breakfirst_price = $_POST['meal3_middle_breakfirst_price'];
        $focus->noidung->meal3_middle_breakfirst_num = $_POST['meal3_middle_breakfirst_num'];
        $focus->noidung->meal3_middle_breakfirst_money = $_POST['meal3_middle_breakfirst_money'];
        $focus->noidung->meal3_middle_lunch_price = $_POST['meal3_middle_lunch_price'];
        $focus->noidung->meal3_middle_lunch_num = $_POST['meal3_middle_lunch_num'];
        $focus->noidung->meal3_middle_lunch_money = $_POST['meal3_middle_lunch_money'];
        $focus->noidung->meal3_middle_lunch_money = $_POST['meal3_middle_lunch_money'];
        $focus->noidung->meal3_middle_dinner_num = $_POST['meal3_middle_dinner_num'];
        $focus->noidung->meal3_middle_dinner_money = $_POST['meal3_middle_dinner_money'];
        $focus->noidung->meal3_middle_other_price = $_POST['meal3_middle_other_price'];
        $focus->noidung->meal3_middle_other_num = $_POST['meal3_middle_other_num'];
        $focus->noidung->meal3_middle_other_money = $_POST['meal3_middle_other_money'];
        
        
        
        $focus->noidung->meal3_north_sum = $_POST['meal3_north_sum'];
        $focus->noidung->meal3_north1 = $_POST['meal3_north1'];
        $focus->noidung->meal3_north2 = $_POST['meal3_north2'];
        $focus->noidung->meal3_north3 = $_POST['meal3_north3'];
        $focus->noidung->meal3_north4 = $_POST['meal3_north4'];
        $focus->noidung->meal3_north5 = $_POST['meal3_north5'];
        $focus->noidung->meal3_north6 = $_POST['meal3_north6'];
        $focus->noidung->meal3_north7 = $_POST['meal3_north7'];
        $focus->noidung->meal3_north8 = $_POST['meal3_north8'];
        $focus->noidung->meal3_north9 = $_POST['meal3_north9'];
        $focus->noidung->meal3_north10 = $_POST['meal3_north10'];
        $focus->noidung->meal3_north11 = $_POST['meal3_north11'];
        $focus->noidung->meal3_north12 = $_POST['meal3_north12'];
        $focus->noidung->meal3_north13 = $_POST['meal3_north13'];
        $focus->noidung->meal3_north14 = $_POST['meal3_north14'];
        $focus->noidung->meal3_north15 = $_POST['meal3_north15'];
        $focus->noidung->meal3_north16 = $_POST['meal3_north16'];
        $focus->noidung->meal3_north17 = $_POST['meal3_north17'];
        $focus->noidung->meal3_north18 = $_POST['meal3_north18'];
        $focus->noidung->meal3_north19 = $_POST['meal3_north19'];
        $focus->noidung->meal3_north20 = $_POST['meal3_north20'];
        $focus->noidung->meal3_north21 = $_POST['meal3_north21'];
        $focus->noidung->meal3_north22 = $_POST['meal3_north22'];
        $focus->noidung->meal3_north23 = $_POST['meal3_north23'];
        $focus->noidung->meal3_north24 = $_POST['meal3_north24'];
        $focus->noidung->meal3_north25 = $_POST['meal3_north25'];
        $focus->noidung->meal3_north26 = $_POST['meal3_north26'];
        $focus->noidung->meal3_north27 = $_POST['meal3_north27'];
        $focus->noidung->meal3_north28 = $_POST['meal3_north28'];
        $focus->noidung->meal3_north29 = $_POST['meal3_north29'];
        $focus->noidung->meal3_north30 = $_POST['meal3_north30'];
        
        
        $focus->noidung->meal3_north_breakfirst_price = $_POST['meal3_north_breakfirst_price'];
        $focus->noidung->meal3_north_breakfirst_num = $_POST['meal3_north_breakfirst_num'];
        $focus->noidung->meal3_north_breakfirst_money = $_POST['meal3_north_breakfirst_money'];
        $focus->noidung->meal3_north_lunch_price = $_POST['meal3_north_lunch_price'];
        $focus->noidung->meal3_north_lunch_num = $_POST['meal3_north_lunch_num'];
        $focus->noidung->meal3_north_lunch_money = $_POST['meal3_north_lunch_money'];
        $focus->noidung->meal3_north_dinner_price = $_POST['meal3_north_dinner_price'];
        $focus->noidung->meal3_north_dinner_num = $_POST['meal3_north_dinner_num'];
        $focus->noidung->meal3_north_dinner_money = $_POST['meal3_north_dinner_money'];
        $focus->noidung->meal3_north_other_price = $_POST['meal3_north_other_price'];
        $focus->noidung->meal3_north_other_num = $_POST['meal3_north_other_num'];
        $focus->noidung->meal3_north_other_money = $_POST['meal3_north_other_money'];
        
        
        $focus->noidung->hotel3_sum = $_POST['hotel3_sum'];
        $focus->noidung->hotel3_1 = $_POST['hotel3_1'];
        $focus->noidung->hotel3_2 = $_POST['hotel3_2'];
        $focus->noidung->hotel3_3 = $_POST['hotel3_3'];
        $focus->noidung->hotel3_4 = $_POST['hotel3_4'];
        $focus->noidung->hotel3_5 = $_POST['hotel3_5'];
        $focus->noidung->hotel3_6 = $_POST['hotel3_6'];
        $focus->noidung->hotel3_7 = $_POST['hotel3_7'];
        $focus->noidung->hotel3_8 = $_POST['hotel3_8'];
        $focus->noidung->hotel3_9 = $_POST['hotel3_9'];
        $focus->noidung->hotel3_10 = $_POST['hotel3_10'];
        $focus->noidung->hotel3_11 = $_POST['hotel3_11'];
        $focus->noidung->hotel3_12 = $_POST['hotel3_12'];
        $focus->noidung->hotel3_13 = $_POST['hotel3_13'];
        $focus->noidung->hotel3_14 = $_POST['hotel3_14'];
        $focus->noidung->hotel3_15 = $_POST['hotel3_15'];
        $focus->noidung->hotel3_16 = $_POST['hotel3_16'];
        $focus->noidung->hotel3_17 = $_POST['hotel3_17'];
        $focus->noidung->hotel3_18 = $_POST['hotel3_18'];
        $focus->noidung->hotel3_19 = $_POST['hotel3_19'];
        $focus->noidung->hotel3_20 = $_POST['hotel3_20'];
        $focus->noidung->hotel3_21 = $_POST['hotel3_21'];
        $focus->noidung->hotel3_22 = $_POST['hotel3_22'];
        $focus->noidung->hotel3_23 = $_POST['hotel3_23'];
        $focus->noidung->hotel3_24 = $_POST['hotel3_24'];
        $focus->noidung->hotel3_25 = $_POST['hotel3_25'];
        $focus->noidung->hotel3_26 = $_POST['hotel3_26'];
        $focus->noidung->hotel3_27 = $_POST['hotel3_27'];
        $focus->noidung->hotel3_28 = $_POST['hotel3_28'];
        $focus->noidung->hotel3_29 = $_POST['hotel3_29'];
        $focus->noidung->hotel3_30 = $_POST['hotel3_30'];
        
        
        $focus->noidung->hotel3_30 = $_POST['hotel3_30'];
        $hotel3_count  = count($_POST['hotel3_service']);
        for($i = 0; $i<$hotel3_count; $i++){
            $hotel3[$i]->hotel3_service = $_POST['hotel3_service'][$i];
            $hotel3[$i]->hotel3_price = $_POST['hotel3_price'][$i];
            $hotel3[$i]->hotel3_num = $_POST['hotel3_num'][$i];
            $hotel3[$i]->hotel3_money = $_POST['hotel3_money'][$i];
        }
        
        $focus->noidung->hotel3 = $hotel3;
        
        
        $focus->noidung->foc3_21 = $_POST['foc3_21'];
        $focus->noidung->foc3_22 = $_POST['foc3_22'];
        $focus->noidung->foc3_23 = $_POST['foc3_23'];
        $focus->noidung->foc3_24 = $_POST['foc3_24'];
        $focus->noidung->foc3_25 = $_POST['foc3_25'];
        $focus->noidung->foc3_26 = $_POST['foc3_26'];
        $focus->noidung->foc3_27 = $_POST['foc3_27'];
        $focus->noidung->foc3_28 = $_POST['foc3_28'];
        $focus->noidung->foc3_29 = $_POST['foc3_29'];
        $focus->noidung->foc3_30 = $_POST['foc3_30'];
        
        $focus->noidung->nett3_1 = $_POST['nett3_1'];
        $focus->noidung->nett3_2 = $_POST['nett3_2'];
        $focus->noidung->nett3_3 = $_POST['nett3_3'];
        $focus->noidung->nett3_4 = $_POST['nett3_4'];
        $focus->noidung->nett3_5 = $_POST['nett3_5'];
        $focus->noidung->nett3_6 = $_POST['nett3_6'];
        $focus->noidung->nett3_7 = $_POST['nett3_7'];
        $focus->noidung->nett3_8 = $_POST['nett3_8'];
        $focus->noidung->nett3_9 = $_POST['nett3_9'];
        $focus->noidung->nett3_10 = $_POST['nett3_10'];
        $focus->noidung->nett3_11 = $_POST['nett3_11'];
        $focus->noidung->nett3_12 = $_POST['nett3_12'];
        $focus->noidung->nett3_13 = $_POST['nett3_13'];
        $focus->noidung->nett3_14 = $_POST['nett3_14'];
        $focus->noidung->nett3_15 = $_POST['nett3_15'];
        $focus->noidung->nett3_16 = $_POST['nett3_16'];
        $focus->noidung->nett3_17 = $_POST['nett3_17'];
        $focus->noidung->nett3_18 = $_POST['nett3_18'];
        $focus->noidung->nett3_19 = $_POST['nett3_19'];
        $focus->noidung->nett3_20 = $_POST['nett3_20'];
        $focus->noidung->nett3_21 = $_POST['nett3_22'];
        $focus->noidung->nett3_22 = $_POST['nett3_23'];
        $focus->noidung->nett3_23 = $_POST['nett3_23'];
        $focus->noidung->nett3_24 = $_POST['nett3_24'];
        $focus->noidung->nett3_25 = $_POST['nett3_25'];
        $focus->noidung->nett3_26 = $_POST['nett3_26'];
        $focus->noidung->nett3_27 = $_POST['nett3_27'];
        $focus->noidung->nett3_28 = $_POST['nett3_28'];
        $focus->noidung->nett3_29 = $_POST['nett3_29'];
        $focus->noidung->nett3_30 = $_POST['nett3_30'];
        $focus->noidung->nett3_31 = $_POST['nett3_31'];
        $focus->noidung->nett3_32 = $_POST['nett3_32'];
        
        
        $focus->noidung->service3_rate = $_POST['service3_rate'];
        $focus->noidung->service3_1 = $_POST['service3_1'];
        $focus->noidung->service3_2 = $_POST['service3_2'];
        $focus->noidung->service3_5 = $_POST['service3_5'];
        $focus->noidung->service3_6 = $_POST['service3_6'];
        $focus->noidung->service3_9 = $_POST['service3_9'];
        $focus->noidung->service3_10 = $_POST['service3_10'];
        $focus->noidung->service3_13 = $_POST['service3_23'];
        $focus->noidung->service3_14 = $_POST['service3_14'];
        $focus->noidung->service3_17 = $_POST['service3_17'];
        $focus->noidung->service3_18 = $_POST['service3_18'];
        $focus->noidung->service3_21 = $_POST['service3_21'];
        $focus->noidung->service3_22 = $_POST['service3_22'];
        $focus->noidung->service3_25 = $_POST['service3_25'];
        $focus->noidung->service3_26 = $_POST['service3_26'];
        $focus->noidung->service3_27 = $_POST['service3_27'];
        $focus->noidung->service3_31 = $_POST['service3_31'];
        
        
        $focus->noidung->sell3_vnd1 = $_POST['sell3_vnd1'];
        $focus->noidung->sell3_vnd2 = $_POST['sell3_vnd2'];
        $focus->noidung->sell3_vnd3 = $_POST['sell3_vnd3'];
        $focus->noidung->sell3_vnd4 = $_POST['sell3_vnd4'];
        $focus->noidung->sell3_vnd5 = $_POST['sell3_vnd5'];
        $focus->noidung->sell3_vnd6 = $_POST['sell3_vnd6'];
        $focus->noidung->sell3_vnd7 = $_POST['sell3_vnd7'];
        $focus->noidung->sell3_vnd8 = $_POST['sell3_vnd8'];
        $focus->noidung->sell3_vnd9 = $_POST['sell3_vnd9'];
        $focus->noidung->sell3_vnd10 = $_POST['sell3_vnd10'];
        $focus->noidung->sell3_vnd11 = $_POST['sell3_vnd11'];
        $focus->noidung->sell3_vnd12 = $_POST['sell3_vnd12'];
        $focus->noidung->sell3_vnd13 = $_POST['sell3_vnd13'];
        $focus->noidung->sell3_vnd14 = $_POST['sell3_vnd14'];
        $focus->noidung->sell3_vnd15 = $_POST['sell3_vnd15'];
        $focus->noidung->sell3_vnd16 = $_POST['sell3_vnd16'];
        $focus->noidung->sell3_vnd17 = $_POST['sell3_vnd17'];
        $focus->noidung->sell3_vnd18 = $_POST['sell3_vnd18'];
        $focus->noidung->sell3_vnd19 = $_POST['sell3_vnd19'];
        $focus->noidung->sell3_vnd20 = $_POST['sell3_vnd20'];
        
        
        $focus->noidung->sell3_usd1 = $_POST['sell3_usd1'];
        $focus->noidung->sell3_usd2 = $_POST['sell3_usd2'];
        $focus->noidung->sell3_usd5 = $_POST['sell3_usd5'];
        $focus->noidung->sell3_usd6 = $_POST['sell3_usd6'];
        $focus->noidung->sell3_usd9 = $_POST['sell3_usd9'];
        $focus->noidung->sell3_usd10 = $_POST['sell3_usd10'];
        $focus->noidung->sell3_usd13 = $_POST['sell3_usd13'];
        $focus->noidung->sell3_usd14 = $_POST['sell3_usd14'];
        $focus->noidung->sell3_usd17 = $_POST['sell3_usd17'];
        $focus->noidung->sell3_usd18 = $_POST['sell3_usd18'];
        $focus->noidung->sell3_usd21 = $_POST['sell3_usd21'];
        $focus->noidung->sell3_usd22 = $_POST['sell3_usd22'];
        $focus->noidung->sell3_usd25 = $_POST['sell3_usd25'];
        $focus->noidung->sell3_usd26 = $_POST['sell3_usd26'];
        $focus->noidung->sell3_usd27 = $_POST['sell3_usd27'];
        $focus->noidung->sell3_usd31 = $_POST['sell3_usd31'];
        
        
        $focus->noidung->tax3_1 = $_POST['tax3_1'];
        $focus->noidung->tax3_2 = $_POST['tax3_2'];
        $focus->noidung->tax3_5 = $_POST['tax3_5'];
        $focus->noidung->tax3_6 = $_POST['tax3_6'];
        $focus->noidung->tax3_9 = $_POST['tax3_9'];
        $focus->noidung->tax3_10 = $_POST['tax3_10'];
        $focus->noidung->tax3_13 = $_POST['tax3_13'];
        $focus->noidung->tax3_14 = $_POST['tax3_14'];
        $focus->noidung->tax3_17 = $_POST['tax3_17'];
        $focus->noidung->tax3_18 = $_POST['tax3_18'];
        $focus->noidung->tax3_21 = $_POST['tax3_21'];
        $focus->noidung->tax3_22 = $_POST['tax3_22'];
        $focus->noidung->tax3_25 = $_POST['tax3_25'];
        $focus->noidung->tax3_26 = $_POST['tax3_26'];
        $focus->noidung->tax3_27 = $_POST['tax3_27'];
        $focus->noidung->tax3_31 = $_POST['tax3_31'];
        
        
        $focus->noidung->profit3_1 = $_POST['profit3_1'];
        $focus->noidung->profit3_2 = $_POST['profit3_2'];
        $focus->noidung->profit3_5 = $_POST['profit3_5'];
        $focus->noidung->profit3_6 = $_POST['profit3_6'];
        $focus->noidung->profit3_9 = $_POST['profit3_9'];
        $focus->noidung->profit3_10 = $_POST['profit3_10'];
        $focus->noidung->profit3_13 = $_POST['profit3_13'];
        $focus->noidung->profit3_14 = $_POST['profit3_14'];
        $focus->noidung->profit3_17 = $_POST['profit3_17'];
        $focus->noidung->profit3_18 = $_POST['profit3_18'];
        $focus->noidung->profit3_21 = $_POST['profit3_21'];
        $focus->noidung->profit3_22 = $_POST['profit3_22'];
        $focus->noidung->profit3_25 = $_POST['profit3_25'];
        $focus->noidung->profit3_26 = $_POST['profit3_26'];
        $focus->noidung->profit3_27 = $_POST['profit3_27'];
        $focus->noidung->profit3_31 = $_POST['profit3_31'];
        
        
        $focus->noidung->total3_1 = $_POST['total3_1'];
        $focus->noidung->total3_2 = $_POST['total3_2'];
        $focus->noidung->total3_5 = $_POST['total3_5'];
        $focus->noidung->total3_6 = $_POST['total3_6'];
        $focus->noidung->total3_9 = $_POST['total3_9'];
        $focus->noidung->total3_10 = $_POST['total3_10'];
        $focus->noidung->total3_13 = $_POST['total3_13'];
        $focus->noidung->total3_14 = $_POST['total3_14'];
        $focus->noidung->total3_17 = $_POST['total3_17'];
        $focus->noidung->total3_18 = $_POST['total3_18'];
        $focus->noidung->total3_21 = $_POST['total3_21'];
        $focus->noidung->total3_22 = $_POST['total3_22'];
        $focus->noidung->total3_25 = $_POST['total3_25'];
        $focus->noidung->total3_26 = $_POST['total3_26'];
        $focus->noidung->total3_27 = $_POST['total3_27'];
        $focus->noidung->total3_31 = $_POST['total3_31'];
        
        
        $focus->noidung->interest3_1 = $_POST['interest3_1'];
        $focus->noidung->interest3_2 = $_POST['interest3_2'];
        $focus->noidung->interest3_5 = $_POST['interest3_5'];
        $focus->noidung->interest3_6 = $_POST['interest3_6'];
        $focus->noidung->interest3_9 = $_POST['interest3_9'];
        $focus->noidung->interest3_10 = $_POST['interest3_10'];
        $focus->noidung->interest3_13 = $_POST['interest3_13'];
        $focus->noidung->interest3_14 = $_POST['interest3_14'];
        $focus->noidung->interest3_17 = $_POST['interest3_17'];
        $focus->noidung->interest3_18 = $_POST['interest3_18'];
        $focus->noidung->interest3_21 = $_POST['interest3_21'];
        $focus->noidung->interest3_22 = $_POST['interest3_22'];
        $focus->noidung->interest3_25 = $_POST['interest3_25'];
        $focus->noidung->interest3_26 = $_POST['interest3_26'];
        $focus->noidung->interest3_27 = $_POST['interest3_27'];
        $focus->noidung->interest3_31 = $_POST['interest3_31'];
    }

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
