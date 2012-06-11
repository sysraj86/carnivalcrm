<?php
class C_ReportsViewList extends SugarView {

    function C_ReportsViewList() {
        parent::SugarView();
    }

    function display() {

        $report = new C_Reports();
        
        if(!$report->ACLAccess('list')){
        
           sugar_die("This are is protected") ;
        }

        global $app_strings;
        global $app_list_strings;
        global $mod_strings;
        global $theme;
        global $currentModule;
        global $current_language;
        global $gridline;
        global $current_user;
        global $sugar_flavor;

        $theme_path = "themes/".$theme."/";
        $image_path = $theme_path."images/";

        $image_path_default = "themes/default/images/";

        require_once($theme_path.'layout_utils.php');

?>
        <h1><?php echo $mod_strings['LBL_SCORES']?></h1>
        
        <table border="0" cellpadding="0" cellspacing="1" width="100%" class="h3Row"><tr>
            <tr>
                <td class="tabDetailViewDF" nowrap="nowrap" width="20%"><img src="themes/default/images/detailview.gif" width='16' height='16' alt="" border="0" align="absmiddle" />
                    <a href="<?php echo "./index.php?module=".$currentModule."&action=tinhdiemnhanvien"; ?>"><strong><?php echo $mod_strings['LBL_SALE_SCORE']; ?></strong></a></td>
                <td style="text-align: left;" class="tabDetailViewDL" width="30%">
                  <span>
                  <?php 
                    echo $mod_strings['LBL_SALE_SCORE_DES'] ; 
                    ?>
                    </span>  
                </td>
            </tr>
        </table>    
            
       
    <?php

    } // end display
} // end class
?>
