<?php
/*********************************************************************************
* ECalendar is a Calendar for SugarCRM developed by Letrium, Inc.
* Copyright (C) 2010 Letrium Inc.
*
* This program is free software; you can redistribute it and/or modify it under
* the terms of the GNU General Public License version 3 as published by the
* Free Software Foundation with the addition of the following permission added
* to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
* IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
* OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
*
* This program is distributed in the hope that it will be useful, but WITHOUT
* ANY WARRANTY;  without even the implied warranty of MERCHANTABILITY or FITNESS
* FOR A PARTICULAR PURPOSE. See  the GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License along with
* this program; if  not, see http://www.gnu.org/licenses or write to the Free
* Software Foundation, Inc., 51  Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
*
* You can contact Letrium Inc. at email address crm@letrium.com.
*
* ECalendar, Copyright (C) Letrium Inc., Yuri Kuznetsov.
*
* In accordance with Section 7(b) of the GNU General Public License version 3,
* these Appropriate Legal Notices must retain the display of the "Letrium" label.
*
*For more information on how to apply and follow the GNU GPL, see http://www.gnu.org/licenses.
********************************************************************************/

$d_start_time = $current_user->getPreference('d_start_time');
$d_end_time = $current_user->getPreference('d_end_time');


if(empty($d_start_time))
	$d_start_time = "08:00";
if(empty($d_end_time))
	$d_end_time = "19:00";
	

$tarr = explode(":",$d_start_time);
$d_start_hour = $tarr[0];
$d_start_min = $tarr[1];
$tarr = explode(":",$d_end_time);
$d_end_hour = $tarr[0];
$d_end_min = $tarr[1];

$hour_start = $d_start_hour;
$minute_start = $d_start_min;
$hour_end = $d_end_hour;
$minute_end = $d_end_min;
$r_start = $hour_start*60 + $minute_start;
$r_end = $hour_end*60 + $minute_end;

$today_unix = to_timestamp($gmt_today);

//if(date('I',$today_unix))
//	$hour_start = $hour_start - 1;


$day_duration_hours = $hour_end - $hour_start;
if($minute_end < $minute_start){
	$day_duration_hours--;
	$day_duration_minutes = $minute_start - $minute_end;
}else
	$day_duration_minutes = $minute_end - $minute_start;



$weekday_names = array();
$of = 0;

$startday = $first_day_of_a_week;

if($startday != "Monday")
	$of = 1;	

foreach($GLOBALS['app_list_strings']['dom_cal_day_short'] as $k => $v){	
	if($k > 1)
		$weekday_names[$k-2] = $GLOBALS['app_list_strings']['dom_cal_day_short'][$k - $of];
}
	
if($startday == "Monday")
	$weekday_names[6] = $GLOBALS['app_list_strings']['dom_cal_day_short'][1];
else
	$weekday_names[6] = $GLOBALS['app_list_strings']['dom_cal_day_short'][7];



$celcount = 0;
for($i = 0; $i < $hour_end; $i++){
				for($j = 0; $j < 60; $j += $t_step){
					if($i*60+$j >= $hour_end*60+$minute_end)
						break;
					$celcount++;
				}
}
$cells_per_day = 24*(60/$t_step);





function to_hours($t){
	if(intval($t) < 10)
		return "0".$t;
	else
		return $t;
}

?>

	
	<script type="text/javascript" src="modules/ECalendar/js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="modules/ECalendar/js/jquery.form.js"></script>
	<script type="text/javascript" src="modules/ECalendar/js/jquery-ui-1.7.2.custom.min.js"></script>
	
	<script type="text/javascript" src="include/javascript/sugar_grp_overlib.js"></script>


	<script type="text/javascript" src="modules/ECalendar/ECal.js"></script>

<script type="text/javascript">
function show_i(d_id){
		var obj = $("#" + d_id);


		var lbl_desc = "<?php echo $GLOBALS['mod_strings']['LBL_I_DESC'];  ?>";
		var lbl_start_t = "<?php echo $GLOBALS['mod_strings']['LBL_I_START_DT'];  ?>";
		var lbl_due_t = "<?php echo $GLOBALS['mod_strings']['LBL_I_DUE_DT'];  ?>";
		var lbl_duration = "<?php echo $GLOBALS['mod_strings']['LBL_I_DURATION'];  ?>";
		var lbl_name = "<?php echo $GLOBALS['mod_strings']['LBL_I_NAME'];  ?>";
		var lbl_title = "<?php echo $GLOBALS['mod_strings']['LBL_I_TITLE'];  ?>";

		var atype = $(obj).attr("acttype");
		var record = $(obj).attr("record");

		var mod = '';
		if(atype == "call")
			mod = "Calls";
		if(atype == "meeting")
			mod = "Meetings";
		if(atype == "task")
			mod = "Tasks";
	
		var subj = $(obj).attr("subj");
		var date_start = $(obj).attr("date_start");
		var duration = $(obj).attr("lang");	
		var desc = $(obj).attr("desc");	
		
		if(desc != '')
			desc = '<b>'+ lbl_desc + ':</b><br> ' + desc +'<br>';
			
		if(subj == '')
			return "";

		var date_lbl = lbl_start_t;
		var duration_text = '<b>'+lbl_duration+':</b> ' + duration + '<br>';
		if($(obj).attr("acttype") == "task"){
			date_lbl = lbl_due_t;
			duration_text = "";			
		}

		var caption = "<div style='float: left;'>"+lbl_title+"</div><div style='float: right;'><a title=\'"+SUGAR.language.get('app_strings', 'LBL_EDIT_BUTTON')+"\' href=\'index.php?module="+mod+"&action=EditView&record="+record+"\'><img border=0  src=\'<?php echo SugarThemeRegistry::current()->getImageURL('edit_inline.gif',false)?>\'></a><a title=\'"+SUGAR.language.get('app_strings', 'LBL_VIEW_BUTTON')+"\' href=\'index.php?module="+mod+"&action=DetailView&record="+record+"\'><img border=0  style=\'margin-left:2px;\' src=\'<?php echo SugarThemeRegistry::current()->getImageURL('view_inline.gif',false)?>\'></a><a title=\'"+SUGAR.language.get('app_strings', 'LBL_ADDITIONAL_DETAILS_CLOSE_TITLE')+"\' href=\'javascript:return cClick();\' onclick=\'javascript:return cClick();\'><img border=0  style=\'margin-left:2px;margin-right:2px;\' src=\'<?php echo SugarThemeRegistry::current()->getImageURL('close.gif',false)?>\'></a></div>";

		var body = '<b>'+lbl_name+':</b> ' + subj + ' <br><b>'+date_lbl+':</b> ' + date_start + '<br>' + duration_text + desc;
		return overlib(body, CAPTION, caption, DELAY, 200, STICKY, MOUSEOFF, 400, WIDTH, 300, CLOSETEXT, '', CLOSETITLE, SUGAR.language.get('app_strings','LBL_ADDITIONAL_DETAILS_CLOSE_TITLE'), CLOSECLICK, FGCLASS, 'olFgClass', CGCLASS, 'olCgClass', BGCLASS, 'olBgClass', TEXTFONTCLASS, 'olFontClass', CAPTIONFONTCLASS, 'olCapFontClass ecCapFontClass', CLOSEFONTCLASS, 'olCloseFontClass');
	
	}
</script>


	<link type="text/css" href="modules/ECalendar/ECal_style.css" rel="stylesheet" />
	

	<script type="text/javascript">
	
	var pview = "";

	var t_step = <?php echo $t_step;?>;
	var dropped = 0;
	var records_openable = true;
	var moved_from_cell;
	var deleted_id = "";
	var deleted_module = "";
	var old_caption = "";
	var max_zindex = 50;
	var disable_creating = false;
	var current_user_id = "<?php echo $GLOBALS['current_user']->id; ?>";	
	var time_format = "<?php echo $GLOBALS['timedate']->get_user_time_format(); ?>";	
	var day_duration_hours = <?php echo $day_duration_hours?>;
	var day_duration_minutes = <?php echo $day_duration_minutes?>;

	var record_editable = false;	

	var celcount = "<?php echo $celcount;?>";	
	var cells_per_day = "<?php echo $cells_per_day;?>";
	var cal_view = "<?php echo $_REQUEST['view']?>";

	var tp = false;
	var tp1 = false;
	
	var lbl_edit = "<?php echo $GLOBALS['mod_strings']['LBL_EDIT_RECORD']; ?>";
	var lbl_saving = "<?php echo $GLOBALS['mod_strings']['LBL_SAVING']; ?>";
	var lbl_loading = "<?php echo $GLOBALS['mod_strings']['LBL_LOADING']; ?>";
	var lbl_error_saving = "<?php echo $GLOBALS['mod_strings']['LBL_ERROR_SAVING']; ?>";
	var lbl_error_loading = "<?php echo $GLOBALS['mod_strings']['LBL_ERROR_LOADING']; ?>";
	var lbl_another_browser = "<?php echo $GLOBALS['mod_strings']['LBL_ANOTHER_BROWSER']; ?>";
	var lbl_first_team = "<?php echo $GLOBALS['mod_strings']['LBL_FIRST_TEAM']; ?>";
	var lbl_remove_participants = "<?php echo $GLOBALS['mod_strings']['LBL_REMOVE_PARTICIPANTS']; ?>";
	
	
	$(function() {
	  
		var d_param = "odd"
		if(cal_view == "day")
			d_param = "4n+1";
		if(cal_view == "month")
			d_param = "0";	
		$("div.left_cell:nth-child("+d_param+"),div.t_cell:nth-child("+d_param+"),div.t_icell:nth-child("+d_param+")").addClass("odd_border");					  


		$(".t_cell").droppable({
			hoverClass: 't_cell_active',
			tolerance: 'pointer',
			accept: '.record_item',
			drop: function(event, ui) {
				
				dropped = 1;				
				
				ui.draggable.css( { "position" : "relative", "top" : "0px", "float" : "none" } );
				ui.draggable.appendTo($(this));	
				align_divs($(this).attr("id"));	
				align_divs(moved_from_cell);
				
				cut_record(ui.draggable.attr('id'));	
				var start_text = get_header_text(ui.draggable.attr('acttype'),$(this).attr('lang'),ui.draggable.attr('status'),ui.draggable.attr('record'));

				ui.draggable.attr("date_start",$(this).attr("datetime"));				
				ui.draggable.find('div.record_head .start_time').html($(this).attr('lang'));
				
				$.post(
						"index.php?module=ECalendar&action=AjaxAfterDrop&sugar_body_only=true",
						{
							"type" : ui.draggable.attr("acttype"),
							"record" : ui.draggable.attr("record"),
							"datetime" : $(this).attr("datetime")
						},
						function(){
							records_openable = true;
							update_vcal();
						}					
				);
				
				$("div.t_cell").css('background-color','');
	
				disable_creating = false;
			},
						
			over: function(event, ui) { 
				ui.draggable.find('div.record_head .start_time').html(this.getAttribute('lang'));	
			},
			
			deactivate: function(event, ui) {
				if(dropped == 0){
					ui.draggable.find('div.record_head').html(old_caption);
				}				
			}
			
		});
		
		

		$("div.t_cell").css("cursor","default");
		
		$("div.t_cell").mouseover(
					function(){
						if(records_openable)
							this.style.backgroundColor = "#D1DCFF";
							
						if(!this.childNodes.length)	
							this.setAttribute("title",this.getAttribute("lang"));
					}
		);
		
		$("div.t_cell").mouseout(
					function(){
						this.style.backgroundColor = "";
						this.removeAttribute("title");
					}
		);


		
		$(".t_cell").click(	function() {
						if(!disable_creating){
							
							$('#title-record_dialog').html("<?php echo $GLOBALS['mod_strings']['LBL_CREATE_NEW_RECORD']; ?>");
							
							open_record_dialog();							
							$('#date_start_date').attr("value",$(".t_cell").attr("datetime"));
							$("#form_record").attr("value","");
							$("#name").attr("value","");							
						
							$("#repeat_type").removeAttr("disabled");
							$('#location').removeAttr('disabled');

							
							if(pview == 'shared'){
								var user_name = $(this).parent().parent().parent().attr("user_name");
								var user_id = $(this).parent().parent().parent().attr("user_id");
								$("#assigned_user_name").val(user_name);
								$("#assigned_user_id").val(user_id);
								GR_update_user(user_id);
							}else{
								GR_update_user(current_user_id);
								$("#assigned_user_id").val(current_user_id);
							}
														
							$("#btn_delete").attr("disabled","disabled");
														
							var combo_date_start = new Datetimecombo($(this).attr("datetime"), "date_start", "<?php echo $timedate->get_user_time_format(); ?>", 100, '', ''); 
							text = combo_date_start.html('SugarWidgetScheduler.update_time();');
							document.getElementById('date_start_time_section').innerHTML = text;
							eval(combo_date_start.jsscript('SugarWidgetScheduler.update_time();'));
							combo_date_start.update(); 
							
							SugarWidgetScheduler.update_time();
						}
					}
		);
		


		init_record_dialog(
				{
					width: "660",
					height: "438"
				}
		);

			

		$("#btn_save").text("<?php echo $GLOBALS['mod_strings']['LBL_SAVE_BUTTON']; ?>").click(
						function(){						
							if(!(check_form('EditView') && isValidDuration()))
								return false;

							$("#title-record_dialog").text(lbl_saving);
																							
							fill_invitees2();							
							fill_reccurence();	
							$("#EditView").ajaxSubmit(
										{
											 url: "index.php?module=ECalendar&action=AjaxSave&sugar_body_only=true",
											 dataType: "json",
											 success:	function(res){
											 			if(res.succuss == 'yes'){
															AddRecords(res);
											 				close_record_dialog();
											 				update_vcal();	
													
											 			}else
											 				alert(lbl_error_saving);														
													},
											error: function(){
												alert(lbl_error_saving);
											}
												
								 		}
								  
							);							
						}
		);

		$("#btn_apply").text("<?php echo $GLOBALS['mod_strings']['LBL_APPLY_BUTTON']; ?>").click(
						function(){
						
						
							if(!(check_form('EditView') && isValidDuration()))
								return false;

							$("#title-record_dialog").text(lbl_saving);
								
							fill_invitees2();							
							fill_reccurence();
								
							$("#radio_call").attr("disabled",true);
							$("#radio_meeting").attr("disabled",true);
						
							$("#btn_apply").attr("disabled","disabled");
							
							$("#EditView").ajaxSubmit(
										{
											 url: "index.php?module=ECalendar&action=AjaxSave&sugar_body_only=true",
											 dataType: "json",
											 success:	function(res){
											 			if(res.succuss == 'yes'){
											 				$("#form_record").attr("value",res.record);	

															$("#detailview_link").attr("href","index.php?module="+$("#cur_module").val()+"&action=DetailView&record="+res.record);
															$("#detailview_link").css("display","inline");
															SugarWidgetScheduler.update_time();
															GR_update_focus($("#cur_module").val(),res.record);

															AddRecords(res);
											 				update_vcal();	
											 											 				
											 				$("#title-record_dialog").text(lbl_edit);

											 				$("#send_invites").removeAttr("checked");
											 														 				
											 			}else
											 				alert(lbl_error_saving);														
													},
											error: function(){
												alert(lbl_error_saving);
											}
								 		}								  
							);
						}
		);	
				
		$("#btn_delete").text("<?php echo $GLOBALS['mod_strings']['LBL_DELETE_BUTTON']; ?>").click(
						function(){
							if($("#form_record").val() != "")
								if(confirm("Are you sure you want to remove the record?")){
									deleted_id = $("#form_record").val();
									deleted_module = $("#cur_module").val();
									
									var delete_recurring = false;
									if( $("#rec_id_c").val() == '')
										delete_recurring = true;
										
									
									$.ajax({
											type: 'POST',
											url: "index.php?module=ECalendar&action=AjaxRemove&sugar_body_only=true",
											dataType: "json",
											data: {
												"cur_module" : deleted_module ,
												"record" : deleted_id,
												"delete_recurring": delete_recurring
											},
											success: function(res){
												var cell_id = $("#" + deleted_id).parent().attr("id");
												if(pview == 'shared')	
													removeSharedById(deleted_id);												
												$("#" + deleted_id).remove();
												align_divs(cell_id);	
												
												if(delete_recurring){												
													ids = new Array();			
													$.each(
														$("div[rec_id_c='" + deleted_id + "']"),
														function (i,v){
															ids[i] = $(v).parent().attr('id'); 					
														}
													);				
													$("div[rec_id_c='" + deleted_id + "']").remove();				
													$.each(
														ids,
														function (i,v){
															align_divs(ids[i]);		
														}				
													);												
												}										
											},
											error: function(){
												alert(lbl_error_saving);
											}					
									});
									close_record_dialog();							
								}					
								
						}

		);	
	
		$("#btn_cancel").text("<?php echo $GLOBALS['mod_strings']['LBL_CANCEL_BUTTON']; ?>").click(
						function(){
							close_record_dialog();
						}
		); 

		select_tab("record_tabs-1");

		document.onkeydown = function(e){ 
				if (e == null) { // ie 
					keycode = event.keyCode; 
				} else { // mozilla 
					keycode = e.which; 
				} 
				if(keycode == 27){ // escape, close box, esc 
					close_record_dialog();
				} 
		};


		$("#settings_dialog").appendTo("#settings_div");
		$("#settings_dialog").css("display","block");
		
		$("#btn_cancel_settings").click(
				function(){
					toggle_settings();			
				}
		);
		
		$("#btn_save_settings").click(
				function(){
					$("#form_settings").submit();			
				}
		);

		repeat_type_selected();
		
			   
		<?php
			if(!$rec_enabled)
				echo '$("#tab_recurrence").css("display","none");';
		?>
		
		var ActRecords = [
			<?php
				$ft = true;
				foreach($ActRecords as $act){
				
					$description = $act['description'];					
					$description = str_replace("\r\n","<br>",$description);
					$description = str_replace("\r","<br>",$description);
					$description = str_replace("\n","<br>",$description);

					
					if(!$ft)
						echo ",";						
					echo "{";
	
					echo '
						"type" : "'.$act["type"].'", 
						"record" : "'.$act["id"].'",
						"start" : "'.$act["start"].'",
						"date_start" : "'.$act["date_start"].'",
						"time_start" : "'.$act["time_start"].'",
						"duration_hours" : '.$act["duration_hours"].',
						"duration_minutes" : '.$act["duration_minutes"].',
						"user_id" : "'.$act["user_id"].'",
						"record_name": "'.$act["name"].'",
						"rec_id_c": "'.$act["rec_id_c"].'",
						"description" : "'.$description.'",
						"status" : "'.$act["status"].'",
						"detailview" : "'.$act["detailview"].'",
						"editview" : "'.$act["editview"].'"
					';
					echo "}";
					$ft = false;				
				}
			?>		
		];
		


		 
		for ( var i in ActRecords ){
			AddRecordToPage(ActRecords[i]);
		};
		
	});
	</script>
	
		

	<div class="mask" id="dialog_mask" style="z-index: 1; display: none;">&nbsp;</div>
	
	<div id="record_dialog" class="record_dialog_class" style='display: none;'>

		<div class='dialog_titlebar'><span id='title-record_dialog'></span> <div class="container-close" style='margin: 5px -6px 0 0;'>&nbsp;</div></div>

		<div class='dialog_content'>
			<div id="record_tabs" class="yui-navset yui-navset-top yui-content" style="height: auto;">
				<ul class="yui-nav">
					<li id="tab_general"><a tabname="record_tabs-1"><em><?php echo $GLOBALS['mod_strings']['LBL_GENERAL_TAB']; ?></em></a></li>
					<li id="tab_invitees"><a tabname="record_tabs-2"><em><?php echo $GLOBALS['mod_strings']['LBL_PARTICIPANTS_TAB']; ?></em></a></li>
					<li id="tab_recurrence"><a tabname="record_tabs-3"><em><?php echo $GLOBALS['mod_strings']['LBL_RECURENCE_TAB']; ?></a></em></li>
				</ul>
				<div id="record_tabs-1" class='yui-content'>			
					<form id="EditView" name="EditView" method="POST">	
		
						<input name='return_module' id='return_module' type='hidden' value="Meetings">
						<input name='cur_module' id='cur_module' type='hidden' value="Meetings">
						<input name='record' id='form_record' type='hidden' value="">
				
						<?php include("modules/ECalendar/PopupEditView.php");?>
										
					</form>				
				</div>
				<div id="record_tabs-2" class='yui-content'>
					<?php include("modules/ECalendar/PopupParticipants.php");?>
				</div>
				<div id="record_tabs-3" class='yui-content'>
					<?php include("modules/ECalendar/PopupReccurence.php");?>			
				</div>
			</div>
		</div>	
			<div id="record_buttons">
				<button id="btn_save" class="button" type="button"></button>&nbsp;
				<button id="btn_delete" class="button" type="button"></button>&nbsp;
				<button id="btn_apply" class="button" type="button"></button>&nbsp;
				<button id="btn_cancel" class="button" type="button" style='float: right;'></button>&nbsp;
			</div>
	</div>


	<div id="settings_dialog" title="<?php echo $GLOBALS['mod_strings']['LBL_SETTINGS_TITLE'];?>" style='width: 300px; display: none;'>
		<div><h3><?php echo $GLOBALS['mod_strings']['LBL_SETTINGS_TITLE']; ?></h3></div>
		
		<?php include("modules/ECalendar/PopupSettings.php"); ?>

		<div style="text-align: center;">
			<button id="btn_save_settings" class="button" type="button"><?php echo $GLOBALS['mod_strings']['LBL_APPLY_BUTTON']; ?></button>&nbsp;
			<button id="btn_cancel_settings" class="button" type="button"><?php echo $GLOBALS['mod_strings']['LBL_CANCEL_BUTTON']; ?></button>&nbsp;
		</div>
	</div>
	
	<script type="text/javascript" src="include/JSON.js"></script>
	<script type="text/javascript" src="include/jsolait/init.js"></script>
	<script type="text/javascript" src="include/jsolait/lib/urllib.js"></script>

	<script type="text/javascript">	
	<?php
		require_once('include/json_config.php');
		global $json;
        	$json = getJSONobj();
        	$json_config = new json_config();
        	$GRjavascript = $json_config->get_static_json_server(false, true, 'Meetings');
        	
        	echo $GRjavascript;
	?>
	</script>
	
	<script type="text/javascript" src="include/javascript/jsclass_base.js"></script>
	<script type="text/javascript" src="include/javascript/jsclass_async.js"></script>
	<script type="text/javascript" src="modules/Meetings/jsclass_scheduler.js"></script>
	<script>toggle_portal_flag();function toggle_portal_flag()  {  } </script>

	<script type="text/javascript">	
		function fill_invitees() { 
			if (typeof(GLOBAL_REGISTRY) != 'undefined')  {    
				SugarWidgetScheduler.fill_invitees(document.EditView);
			} 
		}	

		var root_div = document.getElementById('scheduler');
		var sugarContainer_instance = new SugarContainer(document.getElementById('scheduler'));
		sugarContainer_instance.start(SugarWidgetScheduler);
	</script>		

	<script type="text/javascript">
		var day_start_meridiem = "<?php echo $start_m; ?>";
		var day_start_hours = "<?php echo $d_start_hour; ?>";
		var day_start_minutes = "<?php echo $d_start_min; ?>";
	</script>	
	<script type="text/javascript">
			addToValidate('EditView', 'name', 'name', true,"<?php echo $GLOBALS['mod_strings']['LBL_SUBJECT'];?>");
			addToValidate('EditView', 'duration_hours', 'int', true,"<?php echo $GLOBALS['mod_strings']['LBL_DURATION'];?>");
			addToValidate('EditView', 'date_start_date', 'date', true,"<?php echo $GLOBALS['mod_strings']['LBL_DATE_TIME'];?>");
			addToValidate('EditView', 'status', 'enum', true,"<?php echo $GLOBALS['mod_strings']['LBL_STATUS'];?>");
			addToValidateBinaryDependency('EditView', 'assigned_user_name', 'alpha', false,"<?php echo $GLOBALS['mod_strings']['LBL_NO_USER'];?>", 'assigned_user_id' );
	</script>
<?php

?>
