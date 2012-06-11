<?php
    class PagingClass2
    {
        /***
        * Function paging
        * 
        * @param mixed $totalPages 
        * @param mixed $page
        * @param mixed $action
        * @param mixed $url
        * return html_code
        *  Author: Hai Duc Nguyen & References 
        */
        function DisplayPaging($totalPages,$page,$action,$url)
        {    
            $html_code = '';
            if($totalPages>1){
                $html_code .= "<table align=center><tr><td>";
                if(isset($page)){
                    $page = $page;
                }
                else {
                    $page = 1;
                }
                $sub1 = $page - 1;
                $sub2 = $page - 2;
                $add1 = $page + 1;
                $add2 = $page + 2;
                $firstPage = 1;
                $lastPage = $totalPages;
                $html_code .= '&nbsp; <span class="pagNumActive"><b>'.$page.'</b> / '.$totalPages.' Trang </span> &nbsp;&nbsp;&nbsp;';
                if ($page == 1) {
                    $html_code .= '&nbsp; <span class="pagNumActive">' . $page . '</span> &nbsp;';
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$add1}&{$url}'>{$add1}</a> &nbsp;";
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$lastPage}&{$url}'>Last Page</a> &nbsp;";
                } else if ($page == $lastPage) {
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$firstPage}&{$url}'>First Page</a> &nbsp;" ;
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$sub1}&{$url}'>{$sub1}</a> &nbsp;";
                    $html_code .= '&nbsp; <span class="pagNumActive">' . $page . '</span> &nbsp;';
                } else if ($page > 2 && $page < ($totalPages - 1)) {
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$firstPage}&{$url}'>First Page</a>'; &nbsp;";
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$sub2}&{$url}'>{$sub2}</a> &nbsp;";
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$sub1}&{$url}'>{$sub1}</a> &nbsp;";
                    $html_code .= '&nbsp; <span class="pagNumActive">' . $page . '</span> &nbsp;';
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$add1}&{$url}'>{$add1}</a> &nbsp;";
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$add2}&{$url}'>{$add2}</a> &nbsp;";
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$lastPage}&{$url}'>Last Page</a> &nbsp;";
                } else if ($page > 1 && $page < $totalPages) {
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$firstPage}&{$url}'>First Page</a> &nbsp;" ;
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$sub1}&{$url}'>{$sub1}</a> &nbsp;"; 
                    $html_code .= '&nbsp; <span class="pagNumActive">' . $page . '</span> &nbsp;';
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$add1}&{$url}'>{$add1}</a> &nbsp;"; 
                    $html_code .= "&nbsp; <a href='./index.php?module=C_Reports&action={$action}&page={$lastPage}&{$url}'>Last Page</a> &nbsp;";
                }
            }
            $html_code .= "</td></tr></table>";
            return $html_code;
        }
    }
?>