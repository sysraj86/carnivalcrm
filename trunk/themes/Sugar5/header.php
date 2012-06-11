<?php
/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/23/11
 * Time: 8:57 AM
 * FileName: header.php
 */
$themeObjects = SugarThemeRegistry::current();
$css_link = $themeObjects->getCSSURL("customize.css");
$ss = new Sugar_Smarty();
$customize_css = "";
$customize_css .= "<link href='$css_link' rel='stylesheet'/>";
$ss->assign("CUSTOMIZE_CSS",$customize_css);
 ?>

