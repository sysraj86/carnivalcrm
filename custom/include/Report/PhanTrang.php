<?php
  class PhanTrang{
      function insertActionPhanTrang($row_start = 0,$max_row_of_page = 20,$total = 0){
          $result = '';
            $result .= '<input type="hidden" id="first" name="first" value="0">';
            $result .= '<input type="hidden" id="previous" name="previous" value="'.($row_start-$max_row_of_page<0?0:$row_start-$max_row_of_page).'">';
            $result .= '<input type="hidden" id="next" name="next" value="'.($row_start+$max_row_of_page<$total?$row_start+$max_row_of_page:$row_start).'">';
            $result .= '<input type="hidden" id="last" name="last" value="'.($total - $total%$max_row_of_page).'">';
            $result .= '<input type="hidden" id="total" name="total" value="'.$total.'">';
            return $result;
      }
      function getButtonPhanTrang($row_start = 0,$max_row_of_page = 20,$total = 0){
          global $mod_strings;
          $result = '';
            // Button tra ve trang dau tien
            $result .= '<div align="center">';
            
            $result .= '<button type="submit" id="button_first" name="button_first"><<</button>';
                                
            // Button tra ve trang truoc
            $result .= '<button type="submit" id="button_previous" name="button_previous"><</button>';
            
            // Hien thi so dong dang hien thi                    
            $result .= '<b>('.($row_start+1).' - '.($row_start+$max_row_of_page<$total?$row_start+$max_row_of_page:$total).' of '.$total.')</b>';
            
            // Button tra ve trang sau
            $result .= '<button type="submit" id="button_next" name="button_next">></button>';
            
            // Button tra ve trang cuoi
            $result .= '<button type="submit" id="button_last" name="button_last">>></button>';
            
            // Hien nut export
            $result .= '<input type="submit" class="button" style="float: right" name="export_to_excel" value="'.$mod_strings['LBL_BUTTON_EXPORT'].'">';
            
            $result .= '</div>';
            return $result;
      }
  }
?>
