<form name='form_{$id}' id='form_{$id}'>
<div class="dashletNonTable" style='white-space:nowrap;'>
  <table border=0 cellspacing=0 cellpadding=2>
    <tr>
      <td nowrap="nowrap"><span style="cursor: pointer;" onclick="toggleDisplay('more_{$id}'); toggleDisplay('more_img_{$id}'); toggleDisplay('less_img_{$id}');"><span id='more_img_{$id}'>{$more_img}</span><span id='less_img_{$id}' style="display:none;">{$less_img}</span>&nbsp;{$LBL_MAKE_POST}</span></td>
	</tr>
</table>
<div id='more_{$id}' style='display:none;padding-top:5px'>
<table width='100%'>
<tr>
    <td rowspan='2'><textarea name='description' rows='3' cols='50'></textarea></td>
    <td align='right'><strong>{$LBL_SELECT_GROUP}</strong><br/><select name='securitygroup_id'>{$GROUP_OPTIONS}</select></td>
</tr>
<tr>
    <td align='right' valign='bottom'><input type="button" value="{$LBL_POST}" class="button" style="vertical-align:top" onclick="Message.saveMessage('{$id}');"/></td>
</tr>
</table>
</div>
</div>

</form>