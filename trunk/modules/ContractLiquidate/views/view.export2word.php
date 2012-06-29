<?php
    require_once("modules/ContractLiquidate/ContractLiquidate.php");
    require_once("modules/Contracts/Contract.php");
    class Viewexport2word extends SugarView{
        var $ss ;
        function Viewexport2word() {
            parent::SugarView();
        }

        function display(){
            global $sugar_config,$mod_strings,$app_strings;
            $focus = new ContractLiquidate();
            $db = DBManagerFactory::getInstance(); 
            // ONLY LOAD A RECORD IF A RECORD ID IS GIVEN;
            // A RECORD ID IS NOT GIVEN WHEN VIEWING IN LAYOUT EDITOR

            $record    = isset($_GET["record"]) ? htmlspecialchars($_GET["record"]) : '';
            $focus->retrieve($record);
            $template = file_get_contents('modules/ContractLiquidate/tpls/export.tpl');
            //$sql = "select * from tours where id ='".$record."' and deleted = 0";
            $contract = new Contract();
            $contract->retrieve($focus->contract_id);
            
            $template = str_replace("{DAY}",$focus->day,$template );
            $template = str_replace("{MONTH}",$focus->month,$template );
            $template = str_replace("{YEAR}",$focus->year,$template );
            $template = str_replace("{position_a}",translate('position_dom','',$contract->position_a),$template );
            $template = str_replace("{position_b}",translate('position_dom','',$contract->position_b),$template );
            $template = str_replace("{address_a}",$contract->address_a,$template );
            $template = str_replace("{phone_a}",$contract->phone_a,$template );
            $template = str_replace("{fax_a}",$contract->fax_a,$template );
            $template = str_replace("{mst_bena}",$contract->mst_bena,$template );
            $template = str_replace("{BENB}",$contract->parent_name,$template );
            $template = str_replace("{address_b}",$contract->address_b,$template );
            $template = str_replace("{phone_b}",$contract->phone_b,$template );
            $template = str_replace("{fax_b}",$contract->fax_b,$template );
            $template = str_replace("{mst_benb}",$contract->mst_benb,$template );
            $template = str_replace("{TONGCONG_CONTRACT_KEHOACH}",format_number($focus->tongcong_contract_kehoach),$template );
            $template = str_replace("{TONGCONG_CONTRACT_THUCTE}",format_number($focus->tongcong_contract_thucte),$template );
            $template = str_replace("{TONGCONG_TANG_KEHOACH}",format_number($focus->tongcong_tang_kehoach),$template );
            $template = str_replace("{TONGCONG_TANG_THUCTE}",format_number($focus->tongcong_tang_thucte),$template );
            $template = str_replace("{TONGCONG_GIAM_KEHOACH}",format_number($focus->tongcong_giam_kehoach),$template );
            $template = str_replace("{TONGCONG_GIAM_THUCTE}",format_number($focus->tongcong_giam_thucte),$template );
            $template = str_replace("{TONGTIEN_KEHOACH}",format_number($focus->tongtien_kehoach),$template );
            $template = str_replace("{TONGTIEN_THUCTE}",format_number($focus->tongtien_thucte),$template );
            $template = str_replace("{TIENTHANHTOAN}",format_number($focus->tienthanhtoan),$template );
            $template = str_replace("{TIENCONLAI}",format_number($focus->tienconlai),$template );
            $template = str_replace("{TIENTRALAI}",format_number($focus->tientralai),$template );
            $template = str_replace("{GIATRIHOPDONG}",$focus->giatrihopdong_detail(),$template );
            $template = str_replace("{PHATSINHTANG}",$focus->phatsinhtang_detail(),$template );
            $template = str_replace("{PHATSINHGIAM}",$focus->phatsinhgiam_detail(),$template );
            $template = str_replace("{BANGCHU}",$focus->bangchu,$template );
            $template = str_replace("{DAIDIENBENA}",$contract->daidienbena,$template );
            $template = str_replace("{DAIDIENBENB}",$contract->daidienbenb,$template );
            
            $template = str_replace("{LBL_TITLE_THANH_LY}",$mod_strings['LBL_TITLE_THANH_LY'],$template );
            $template = str_replace("{LBL_BEN_A}",$mod_strings['LBL_BEN_A'],$template );
            $template = str_replace("{LBL_COM_NAME}",$mod_strings['LBL_COM_NAME'],$template );
            $template = str_replace("{LBL_BEN_A_NAME}",$mod_strings['LBL_BEN_A_NAME'],$template );
            $template = str_replace("{LBL_POSITION}",$mod_strings['LBL_POSITION'],$template );
            $template = str_replace("{LBL_ADDRESS}",$mod_strings['LBL_ADDRESS'],$template );
            $template = str_replace("{LBL_PHONE}",$mod_strings['LBL_PHONE'],$template );
            $template = str_replace("{LBL_FAX}",$mod_strings['LBL_FAX'],$template );
            $template = str_replace("{LBL_TAX}",$mod_strings['LBL_TAX'],$template );
            $template = str_replace("{LBL_BEN_B}",$mod_strings['LBL_BEN_B'],$template );
            $template = str_replace("{LBL_BEN_B_NAME}",$mod_strings['LBL_BEN_B_NAME'],$template );
            $template = str_replace("{LBL_NOIDUNG_THANH_LY}",$mod_strings['LBL_NOIDUNG_THANH_LY'],$template );
            $template = str_replace("{LBL_NOIDUNG}",$mod_strings['LBL_NOIDUNG'],$template );
            $template = str_replace("{LBL_KEHOACH}",$mod_strings['LBL_KEHOACH'],$template );
            $template = str_replace("{LBL_THUCTE}",$mod_strings['LBL_THUCTE'],$template );
            $template = str_replace("{LBL_DONGIA}",$mod_strings['LBL_DONGIA'],$template );
            $template = str_replace("{LBL_SL}",$mod_strings['LBL_SL'],$template );
            $template = str_replace("{LBL_THANHTIEN}",$mod_strings['LBL_THANHTIEN'],$template );
            $template = str_replace("{LBL_TONGGIATRIHD}",$mod_strings['LBL_TONGGIATRIHD'],$template );
            $template = str_replace("{LBL_TONGCONG}",$mod_strings['LBL_TONGCONG'],$template );
            $template = str_replace("{LBL_CHIPHIPHATSINHTANG}",$mod_strings['LBL_CHIPHIPHATSINHTANG'],$template );
            $template = str_replace("{LBL_CHIPHIPHATSINHGIAM}",$mod_strings['LBL_CHIPHIPHATSINHGIAM'],$template );
            $template = str_replace("{LBL_TONGTRIGIATOUR}",$mod_strings['LBL_TONGTRIGIATOUR'],$template );
            $template = str_replace("{LBL_BENBTHANHTOANBENA}",$mod_strings['LBL_BENBTHANHTOANBENA'],$template );
            $template = str_replace("{LBL_BENBNOBENA}",$mod_strings['LBL_BENBNOBENA'],$template );
            $template = str_replace("{LBL_BENANOBENB}",$mod_strings['LBL_BENANOBENB'],$template );
            $template = str_replace("{LBL_BANGCHU}",$mod_strings['LBL_BANGCHU'],$template );
            $template = str_replace("{LBL_THONGTINCHUNG}",$mod_strings['LBL_THONGTINCHUNG'],$template );
            $template = str_replace("{LBL_DAIDIENBENA}",$mod_strings['LBL_DAIDIENBENA'],$template );
            $template = str_replace("{LBL_DAIDIENBENB}",$mod_strings['LBL_DAIDIENBENB'],$template );

            
            $size=strlen($template);
            $filename = $focus->number.".doc";
            ob_end_clean();
            header("Cache-Control: private");
            header("Content-Type: application/force-download;");
            header("Content-Disposition:attachment; filename=\"$filename\"");
            header("Content-length:$size");
            echo $template;
            ob_flush(); 
        }  // end function
    } // end class
?>
