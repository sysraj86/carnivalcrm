<script type="text/javascript" src="modules/GroupPrograms/js/chuyengiao.js"></script>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<form action="index.php"  name="DetailView" id="DetailView" method="post">
<input type="hidden"   name="module"         value="GroupPrograms">
<input type="hidden"   name="record"         value="{$ID}"> 
<input type="hidden"   name="action">
<input type="hidden"   name="return_module"  value="{$RETURN_MODULE}">
<input type="hidden"   name="return_id"      value="{$RETURN_ID}">
<input type="hidden"   name="return_action"  value="{$RETURN_ACTION}">
<tr>
    <td style="padding-bottom: 2px;">
         <input title="{$APP.LBL_EDIT_BUTTON_TITLE}" 
            accessKey="{$APP.LBL_EDIT_BUTTON_KEY}" 
            class="button" 
            onclick="this.form.return_module.value='GroupPrograms'; this.form.return_action.value='DetailView'; this.form.return_id.value='{$ID}'; this.form.action.value='EditView'" 
            type="submit" 
            name="Edit" 
            value="  {$APP.LBL_EDIT_BUTTON_LABEL}  "> 
     <input title="{$APP.LBL_DUPLICATE_BUTTON_TITLE}" 
            accessKey="{$APP.LBL_DUPLICATE_BUTTON_KEY}" 
            class="button" 
            onclick="this.form.return_module.value='GroupPrograms'; this.form.return_action.value='index'; this.form.isDuplicate.value=true; this.form.action.value='EditView'" 
            type="submit" 
            name="Duplicate" 
            value=" {$APP.LBL_DUPLICATE_BUTTON_LABEL} "> 
     <input title="{$APP.LBL_DELETE_BUTTON_TITLE}" 
            accessKey="{$APP.LBL_DELETE_BUTTON_KEY}" 
            class="button" 
            onclick="this.form.return_module.value='GroupPrograms'; this.form.return_action.value='ListView'; this.form.action.value='Delete'; return confirm('{$APP.NTC_DELETE_CONFIRMATION}')" 
            type="submit" 
            name="Delete" 
            value=" {$APP.LBL_DELETE_BUTTON_LABEL} ">
            
     <input title="View Change Log" class="button" onclick='open_popup("Audit", "600", "400", "&record={$ID}&module_name=GroupPrograms", true, false,  {$view_change_log} ); return false;' type="submit" value="View Change Log">
     <input title="Export to Word" class="button" type="button" onclick="window.location.href='index.php?module=GroupPrograms&action=export2word&record={$ID}'" value="Export to Word" />
     <input title="{$CHUYENGIAO_TITLE}" type="button" id="chuyengiao" class="button" value="{$CHUYENGIAO}" />
     <input type="hidden" id="dachuyengiao" name="dachuyengiao" value="{$DACHUYENGIAO}" />
     <input type="hidden" id="dachuyengiao_task" name="dachuyengiao_task" value="{$DACHUYENGIAO_TASK}" />
    </td>
</tr>
</table>
</form>

<fieldset>
    <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="tabDetailView" align="center">
    <legend><h1>Group Information</h1></legend>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_CODE} :</td>
            <td class="tabDetailViewDF">{$CODE}</td>
             <td class="tabDetailViewDL">Group List</td>
            <td class="tabDetailViewDF"><a href="index.php?module=GroupLists&action=DetailView&record={$GROUP_ID}">{$GROUP}</td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">{$MOD.LBL_TOURCODE} :</td>
            <td class="tabDetailViewDF"><a href="index.php?module=Tours&action=DetailView&record={$TOUR_ID}" class="tabDetailViewDFLink">{$TOUR_CODE}</a></td>
           
             <td class="tabDetailViewDL">{$MOD.LBL_TOUR_NAME}</td>
            <td class="tabDetailViewDF"><a href="index.php?module=Tours&action=DetailView&record={$TOUR_ID}" class="tabDetailViewDFLink">{$TOUR_NAME}</a></td>
        </tr>
        <tr>
             <td class="tabDetailViewDL">From</td>
             <td class="tabDetailViewDF">{$START_DATE}</td>
             <td class="tabDetailViewDL">To</td>
             <td class="tabDetailViewDF">{$END_DATE} </td>
        </tr>
        <tr>
             <td class="tabDetailViewDL">{$MOD.LBL_DURATION}</td>
             <td class="tabDetailViewDF">{$DURATION}</td>
             <td class="tabDetailViewDL">&nbsp;</td>
             <td class="tabDetailViewDF">&nbsp;</td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">Worksheet</td>
            <td class="tabDetailViewDF"><a href="index.php?module=Worksheets&action=DetailView&record={$WORKSHEET_ID}" class="tabDetailViewDFLink">{$WORKSHEET}</a> </td>
            <td class="tabDetailViewDL">Insurances List</td>
            <td class="tabDetailViewDF"><a href="index.php?module=Insurances&action=DetailView&record={$INSURANCE_ID}" class="tabDetailViewDFLink">{$INSURANCE}</a></td>
        </tr>
        <tr>
            <td class="tabDetailViewDL">Passport List</td>
            <td class="tabDetailViewDF"><a href="index.php?module=PassportList&action=DetailView&record={$PASSPORT_ID}" class="tabDetailViewDFLink">{$PASSPORT}</a></td>
            <td class="tabDetailViewDL">Airlines Tickets</td>
            <td class="tabDetailViewDF"><a href="index.php?module=AirlinesTicketsLists&action=DetailView&record={$TICKET_ID}" class="tabDetailViewDFLink">{$TICKET}</a></td>
        </tr>
        <tr>
            <td colspan="2"><h3>Guide & Operator</h3></td>
        </tr>
        {$LEADER}
        <tr>
            <td class="tabDetailViewDL">Guide (pick up at airport)</td>
            <td class="tabDetailViewDF"><a href="index.php?module=TravelGuides&action=DetailView&record={$GUIDE_PICK_UP_AT_AIRPORT_ID}" class="tabDetailViewDF">{$PICK_UP_AIRPORT}</a>&nbsp&nbsp{$AIRPORT_PHONE} </td>
        </tr>
        {$GUIDE}
        <tr>
            <td class="tabDetailViewDL">Operator</td>
            <td class="tabDetailViewDF"><a href="index.php?module=Users&action=DetailView&record={$ASSIGNED_USER_ID}" class="tabDetailViewDF">{$OPERATOR} </a>{$OPERATOR_PHONE}</td>
        </tr>
        <tr>
        <td class="tabDetailViewDL">{$MOD.LBL_DATE_ENTERED}:
        </td>
        <td class="tabDetailViewDF">{$DATE_ENTERED}&nbsp;{$MOD.LBL_BY}&nbsp;{$CREATED_BY}
        </td>
        <td class="tabDetailViewDL">{$MOD.LBL_DATE_MODIFIED}:
        </td>
        <td class="tabDetailViewDF"> {$DATE_MODIFIED}&nbsp;{$MOD.LBL_BY}&nbsp;{$MODIFIED_BY}
        </td>
        </tr>
    </table>
</fieldset>

<!-- begin pick up car-->
<fieldset>
    <legend><h1>Pick up car</h1></legend>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <th>{$MOD.LBL_NUM_PLATE}</th> <th>{$MOD.LBL_DRIVER}</th> <th>{$MOD.LBL_DRIVER_PHONE}</th>
    </tr>
        {$PICK_UP_CAR}
    </table>
</fieldset>
<!-- end pick up car-->

<!-- begin sightseeing car-->
 <fieldset>
    <legend><h1>Sightseeing car</h1></legend>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <th>{$MOD.LBL_NUM_PLATE}</th> <th>{$MOD.LBL_DRIVER}</th> <th>{$MOD.LBL_DRIVER_PHONE}</th>
     </tr>
        {$SIGHTSEEING_CAR}
    </table>
 </fieldset>

<!-- end sightseeing car -->

<!-- Group program line-->
<fieldset>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
<legend><h1>Group Programs</h1></legend>
{$GROUP_PROGRAM_LINE}
</table>
</fieldset>
<!-- end Group program line -->
<!-- BEGIN: subpanel -->
<span sugar='slot23'>{$SUBPANEL}</span sugar='slot'>
<!-- END: subpanel --> 
