<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class VersionCheck {

	function version_check($event, $arguments)
	{
		global $current_user;
		
		require_once('include/utils.php');
		if(is_admin($current_user)) {
			//require_once('modules/SecurityGroups/SecurityGroup.php');
			
			//check to see if the securitysuite version
			//matches the sugar version. If not then display an error messag
			
			global $sugar_config;
			if(empty($sugar_config['securitysuite_version'])
				|| $sugar_config['securitysuite_version'] != $sugar_config['sugar_version']
			) {
				$securitysuite_warning = "Warning! SecuritySuite no longer matches the version of Sugar that you are running. "
					. "SecuritySuite will not work until updated to ".$sugar_config['sugar_version'].". "
					. "All versions can be found at ";
					
				
				$display_warning = "<p class='error'>".$securitysuite_warning."<a href='http://www.eggsurplus.com'>www.eggsurplus.com</a></p>";
				$GLOBALS['log']->fatal($securitysuite_warning."<a href='http://www.eggsurplus.com'>www.eggsurplus.com</a>");
				//echo $display_warning;


?>
<script language="Javascript">
				

var oNewP = document.createElement("div");
oNewP.className = 'error';

var oText = document.createTextNode("<?php echo $securitysuite_warning; ?>");
oNewP.appendChild(oText);

var oLink = document.createElement("a");
oLink.href = 'http://www.eggsurplus.com';
oLink.appendChild(document.createTextNode("www.eggsurplus.com"));
oNewP.appendChild(oLink);

var beforeMe = document.getElementsByTagName("div")[0];
document.body.insertBefore(oNewP, beforeMe);
</script>
<?php

			}
		
		} //end if admin
	} 


}
?>