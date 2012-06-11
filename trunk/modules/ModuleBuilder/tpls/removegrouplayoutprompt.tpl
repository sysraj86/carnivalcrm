{*
/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004 - 2008 SugarCRM Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/
*}
<script language='javascript'>
{literal}
	function verifyChecked() {
		var sel = document.getElementById('removeGroupLayout');
		
		if(sel.checked == true)
			return true;
		
		return false;
	}
{/literal}
</script>

<form name='removelayout_form' id='removelayout_form_id' onsubmit='return false;'>
<input type='hidden' name='module' value='ModuleBuilder'>
<input type='hidden' name='action' value='removeGroupLayoutConfirm'>
<input type='hidden' name='new_dropdown' value=''>
<input type='hidden' name='to_pdf' value='true'>
<input type='hidden' name='view_module' value='{$view_module}' />
<input type='hidden' name='refreshTree' value='1'>
<input type='hidden' name='grpLayout' value='{$groupLayout}'>


<div class='wizard' width='100%' >
	<div align='left' id='export'>{$actions}</div>
	{*<div class='title'>{$title}</div>&nbsp;*}
	<div>{$question}</div>
	<div id="Buttons">

	<table align="center" cellspacing="7" width="90%">
	<tr>
	<td>{$mod_strings.LBL_REMOVE_CONFIRM}</td>
	<td align="left" width="80%">
		<input type='checkbox' id='removeGroupLayout' name='removeGroupLayout' value='1' />
	</td>
	</tr>
	</table>
	</div>
</div>

<input type='button' class='button' name='saverelbtn' value='{$mod_strings.LBL_BTN_DELETE}' onclick='if(verifyChecked() && check_form("removelayout_form")) ModuleBuilder.submitForm("removelayout_form");'>


</form>
<!-- Hidden div for hidden content so IE doesn't ignore it -->
<div style="float:left; left:-100px; display: hidden;">&nbsp;
	{literal}
	<style type='text/css'>
		.wizard { padding: 5px; text-align:center; font-weight:bold}
		.title{ color:#990033; font-weight:bold; padding: 0px 5px 0px 0px; font-size: 20pt}
		.backButton {position:absolute; left:10px; top:35px}
{/literal}
</style>

<script>
addForm('removelayout_form');

ModuleBuilder.helpSetup('studioWizard','removeLayoutHelp');


</script>