
	function align_divs(cell_id){		
	
		cellElm = document.getElementById(cell_id);

		if(cellElm){	
			max_zindex = 50;
				
			var total_height = 0;
			var prev_i = 0;
			var first = 1;
			var top = 0;
			var height = 0;
			var cnt = 0;

			for(var i = 0; i < cellElm.childNodes.length; i++){	
					if(cellElm.childNodes[i].tagName == "DIV"){

						if(first == 1){
							first = 0;	
							cnt++;	
							$(cellElm.childNodes[i]).css({ "top" : "-1px", "left" : "-1px", "z-index" : "50"});
						}else{					
							top = 0;
							height = $(cellElm.childNodes[prev_i]).css("height");
							height = height.split("px").join("");;	
							total_height += parseInt(height);					
							var new_top = parseInt(top) - total_height - cnt - 2;
							var left = "10px";
							if(cnt > 1)
								var left = "14px";
							$(cellElm.childNodes[i]).css({"top" : new_top + "px", "left" : left, "z-index" : "50"});
							cnt++;
						}
						prev_i = i;					
					}
			}
		}
	}
	
	
	
	
	
	function AddRecordToPage(ActRecord){
	
			var duration_text = ActRecord.duration_hours + "h";
			if(ActRecord.duration_minutes > 0)
				duration_text += ActRecord.duration_minutes + "m";
			var startD = new Date((ActRecord.start)*1000);
			
			var suffix = "";
			var id_suffix = "";
			if( ActRecord.user_id != "" && pview == 'shared'){
				suffix = "_" + shared_users[ActRecord.user_id];	
				id_suffix = '____' + shared_users[ActRecord.user_id];				
			}
			

			$("#" + ActRecord.record + id_suffix).remove();
			

			var start_text = get_header_text(ActRecord.type,ActRecord.time_start,ActRecord.status,ActRecord.record);
			
			var time_cell = ActRecord.start - ActRecord.start % (t_step * 60);			
			
			var duration_coef; 
			if(ActRecord.type == 'task'){
				duration_coef = 1;
				duration_text = " ";
			}
			else{	
				if((ActRecord.duration_minutes < t_step) && (ActRecord.duration_hours == 0))
					duration_coef = 1;
				else					
					duration_coef = (parseInt(ActRecord.duration_hours) * 60 + parseInt(ActRecord.duration_minutes)) / t_step;
			}
			

			
			
			var subj = "";
			if(duration_coef >= 1.75)
				subj = ActRecord.record_name;

				


			var elm_id = ActRecord.record + id_suffix;	
			
		
			$("<div><div class='record_head'><div class='rfloat' onmouseover='return show_i(" + '"' + ActRecord.record  + id_suffix + '"'  +  ");' onmouseout='return nd(400);' >&nbsp;&nbsp;</div><div>" + start_text + "</div>" + "" + "</div><div class='record_contain'>" + subj + "</div></div>")
				.addClass("record_item")
				.addClass(ActRecord.type+"_item")
				.attr("id",elm_id)
				.attr("rec_id_c",ActRecord.rec_id_c)
				.attr("record",ActRecord.record)
				.attr("lang",duration_text)
				.attr("subj",ActRecord.record_name)
				.attr("date_start",ActRecord.date_start)
				.attr("desc",ActRecord.description)
				.attr("acttype",ActRecord.type)
				.attr("status",ActRecord.status)
				.attr("detailview",ActRecord.detailview)
				.attr("duration_coef",duration_coef)
				.css({"height" : parseInt(15 * duration_coef - 1) + "px" } )
				.click(
						function(){
							if($(this).attr('detailview') == "1")
								FormLoad($(this).attr('acttype'),$(this).attr('record'),false);
						}
				)					
				.mouseover(	
						function(){
							if(!records_openable)
								return;
							disable_creating = true;	
							tp = setTimeout(
								function(){
									$("#"+elm_id).css({"z-index" : 500});
								},
								150
							); 			
						}
				)
				.mouseout(	
						function(){
							if(!records_openable)
								return;
							clearTimeout(tp);
							$(this).css({"z-index" : 50});
							disable_creating = false;
						}
				)					
				.appendTo("#t_" + time_cell + suffix);	


				if(duration_coef < 1.75){
					$(("#" + elm_id)).mouseover(
						function (){
							if(records_openable)
								expand_record($(this).attr("id"));
						}
					);
					$(("#" + elm_id)).mouseout(
						function (){
							unexpand_record($(this).attr("id"));
						}
					);

					$(("#" + elm_id)).click(
						function(){
							unexpand_record($(this).attr("id"));
						}
					);
				}								
				
				if(ActRecord.type != 'task'  && ActRecord.editview == 1)
					$(("#" + elm_id))
					.draggable(
							{ 
								revert: 'invalid', 
								containment: '#week_div', 
								//handle: 'div',
								distance: 8,
								cursorAt: {top: 4,left: 4},
								zIndex: 600,
								start: 	function(event, ui) { 
										dropped = 0;
										records_openable = false;
										old_caption = ui.helper.find('div.record_head').html();
										moved_from_cell = ui.helper.parent().attr("id");
									}
							}
					);

				
				
				
				cut_record(ActRecord.record + id_suffix);				
				align_divs("t_" + time_cell + suffix);

				
	}



	function expand_record(id){
							tp1 = setTimeout(
								function(){
									$("#"+id).css({"height" : parseInt(15 * 2 - 1) + "px" } );							
									$("#"+id).find(".record_contain").text($("#"+id).attr("subj"));
								},
								350
							);
	

	}

	function unexpand_record(id){
							clearTimeout(tp1);
							$("#"+id).css({"height" : parseInt(15 * $("#"+id).attr("duration_coef") - 2) + "px" } );
							$("#"+id).find(".record_contain").text("");
							cut_record(id);
	}	


	function get_header_text(type,time_start,status,record){
			var start_text = "<span class='start_time'>" + time_start + "</span> " + SUGAR.language.languages.app_list_strings[type +'_status_dom'][status];
			if(type == 'task'){
				start_text = start_text + " <a href='index.php?module=Tasks&action=DetailView&record="+record+"'>"+SUGAR.language.languages.app_list_strings["moduleListSingular"]["Tasks"].toLowerCase()+"</a>";
			}
			return start_text;
	}
	
	var hs = "";
	function cut_record(id){
	
			var rec = $("#" + id);
			var duration_coef = rec.attr("duration_coef");			

			var real_celcount = celcount;
			if($("#whole_day_checkbox").attr('checked'))
				real_celcount = cells_per_day;			
			
			var celpos = rec.parent().parent().children().index(rec.parent());
			if (real_celcount - celpos - duration_coef < 0)
				duration_coef = real_celcount - celpos  + 1;
			
			rec.css({"height" : parseInt(15 * duration_coef - 1) + "px" } );

			if(duration_coef < 1.75)
				$("#" + id + "record_contain").html("");
	}


	function init_record_dialog(params){
		$("#record_dialog").css("width",(params.width)+"px");
		$("#record_dialog").css("height",(parseInt(params.height)+64) + "px");

		$("#record_dialog").attr("dh",params.height);
		$("#record_dialog").attr("dw",params.width);

		$("#record_dialog").css(
			{
				"overflow":	"auto",
				"overflow-x": "hidden",
				"outline": 	"0 none",
				"position": 	"absolute",
				"height":		"auto",				
				"z-index": 	1000,
				"top": 		($(window).height()/2 - params.height/2 - 10)+"px",
				"left": 		($(window).width()/2 - params.width/2)+"px"		
			}
		);

		$("#record_dialog .dialog_content").css("height",params.height+"px");
		$("#record_dialog .dialog_content").css("overflow","auto");
		
		$("#record_dialog").css("background-color",$("body").css("background-color"));
		$("#record_tabs").css("padding","0 5px");		

		$("#record_dialog .dialog_titlebar").css("background-image","url('index.php?entryPoint=getImage&themeName="+SUGAR.themes.theme_name +"&imageName=bg.gif')");

		$("#record_dialog .container-close").click(function(){close_record_dialog();});
				
		
	}

	function open_record_dialog(params){


						$("#record_dialog").css(
							{
								"top": 		( ($(window).height()/2 - $("#record_dialog").attr("dh")/2 - 50) + parseInt($(window).scrollTop()) ) + "px",
								"left": 		($(window).width()/2 - $("#record_dialog").attr("dw")/2) + "px"	
							}	
						);

						$("#dialog_mask").css(
							{
								"height": $(document).height() + "px",
								"width": $(document).width() + "px",
								"z-index": 1000,
								"display": "block"
							}
						);
	
												
						$("#record_dialog").css("display","block");	

						$("#record_tabs li a").click(
							function(){
								$(this).parent().parent().children("li").removeClass("selected");
								$(this).parent().addClass("selected");	
								select_tab($(this).attr("tabname"));
							}
						);
						$("#record_tabs li").removeClass("selected");
						$("#record_tabs li:first-child").addClass("selected");

						$(".yui-nav").css("overflow-x","visible");						

	}

	function close_record_dialog(){
							$("#record_dialog").css("display","none");													
							$("#dialog_mask").css(
								{
									"z-index": 1,
									"display": "none"
								}
							);
							clearFields();
	}
	
	
	function clearFields(){
		$("#EditView").resetForm();
		$("#direction").css("display","none");
		$('#location').attr('disabled','disabled');

		if(reminder_time == -1){
			$("#should_remind_list").css("display","none");
			$("input[name='reminder_checked']").removeAttr("checked");
		}else{
			$("#should_remind_list").css("display","inline");
			$("input[name='reminder_checked']").attr("checked",true);
		}
 		$("#parent_id").val("");
 		$("#form_record").val("");
 		$("#cur_module").val("Meetings");
 		$("#return_module").val("Meetings"); 		
		$("#radio_call").removeAttr("checked");
		$("#radio_meeting").attr("checked",true);
		$("#radio_call").removeAttr("disabled");
		$("#radio_meeting").removeAttr("disabled");
		
		$("#detailview_link").css("display","none");
		
 		
 		$("#send_invites").removeAttr("disabled");

 		$("#list_div_win").css("display","none");
 		
 		$("#no_recurence").val("");
 				
	

		$("#btn_delete").removeAttr("disabled");
		$("#btn_apply").removeAttr("disabled");
		$("#btn_save").removeAttr("disabled");
												
														
 		$("#EditView table.edit td:nth-child(2n) span.required").css("display","none");
 		
 		
 		$("#repeat_type option[value='']").attr("selected","selected");
 		repeat_type_selected(); 		
	
 		GR_update_focus("Meetings","");
 		
		
 		select_tab("record_tabs-1");		
 		
 		
 						
	}

	function select_tab(tid){
		$("#record_tabs .yui-content").css("display","none");
		$("#record_tabs #"+tid).css("display","block");
	}

	function GR_update_user(user_id){
						$.ajax(
							{
								url: 'index.php?module=ECalendar&action=AjaxGetGRUsers&sugar_body_only=true',
								dataType: "script",
								type: "POST",
								data: {"users": user_id},
								success: 	function(){
											SugarWidgetScheduler.update_time();																	
										}						
							}	
						);
	}
	
	function GR_update_focus(module,record){
		if(record == ""){
			GLOBAL_REGISTRY["focus"] = {"module":module, users_arr:[],fields:{"id":"-1"}};
			SugarWidgetScheduler.update_time();	
			
		}
		else{
						$.ajax(
							{
								url: 'index.php?module=ECalendar&action=AjaxGetGR&sugar_body_only=true&type=' + module + '&record=' + record,
								dataType: "script",								 
								success: 	function(){
											SugarWidgetScheduler.update_time();
											
											if(record_editable){
														$("#btn_save").removeAttr("disabled");
														$("#btn_delete").removeAttr("disabled");
														$("#btn_apply").removeAttr("disabled");
											}																								
										}						
							}	
						);
		}		
	}

	function toggle_settings(){
		if($("#settings_div").css("display") == "none")
			$("#settings_div").css("display","block");
		else{
			$("#form_settings").resetForm();	
			$("#settings_div").css("display","none");			
		}
	}

	function toggle_whole_day(){
		setTimeout(
			function(){
				if($("#whole_day_checkbox").attr('checked')){
					$(".owt").css("display","block");	
				}else{
					$(".owt").css("display","none");
				}
			},
			25);
	
	}
	
	
	function fill_invitees2(){
	
		$("#EditView input[name='user_invitees']").val("");
		$("#EditView input[name='contact_invitees']").val("");
		$("#EditView input[name='lead_invitees']").val("");
		
		$.each( GLOBAL_REGISTRY['focus'].users_arr, 	function(i,v){
									var field_name = "";
									if(v.module == "User")
										field_name = "user_invitees";
									if(v.module == "Contact")
										field_name = "contact_invitees";
									if(v.module == "Lead")
										field_name = "lead_invitees";
									var str = $("#EditView input[name='" + field_name + "']").val();
									$("#EditView input[name='" + field_name + "']").val(str + v.fields.id + ",");	
								}
		);	
	}	
		
	function fill_reccurence(){
		$("#repeat_type_c").val($("#repeat_type").val());
		$("#repeat_interval_c").val($("#repeat_interval").val());
		$("#repeat_end_date_c").val($("#repeat_end_date").val());
		$("#repeat_days_c").val("");

		if( $("#repeat_type").val() == 'Weekly' || $("#repeat_type").val() == 'Monthly (day)'){
			
			$.each(
				$(".weeks_checks:checked"),
				function (i,v){
					$("#repeat_days_c").val($("#repeat_days_c").val() + $(v).val());				
				}
			);
		}	
	}
	
	function repeat_type_selected(){
		if( $("#repeat_type").val() == 'Weekly' || $("#repeat_type").val() == 'Monthly (day)')
			$(".weeks_checks_div").css("display","block");
		else
			$(".weeks_checks_div").css("display","none");
		
		if( $("#repeat_type").val() == '' ){
			$("#repeat_interval").attr("disabled","disabled");
			$("#repeat_end_date").attr("disabled","disabled");
		}else{
			$("#repeat_interval").removeAttr("disabled");
			$("#repeat_end_date").removeAttr("disabled");		
		}
	}
	
	function FormLoad(type,record,run_one_time){
		var to_open = false;
		if(type == 'call'){
			type = "Calls";
			to_open = true;			
		}
		if(type == 'meeting'){
			type = "Meetings";
			to_open = true;
		}
		
		if(to_open && records_openable){
		
			$("#btn_delete").attr("disabled","disabled");
			$("#btn_apply").attr("disabled","disabled");
			$("#btn_save").attr("disabled","disabled");
			
	
			$('#title-record_dialog').html(lbl_loading);
			
			$('#EditView input').attr("disabled", true);
			$('#EditView select').attr("disabled", true);	
			$('#EditView textarea').attr("disabled", true);
			
			$("#date_start_date").val("");
			open_record_dialog();	
	
			$("#form_record").attr("value","");
			
			
						
			var pos = $('#title-record_dialog').offset();    
			var eWidth = $('#title-record_dialog').outerWidth()
	
			$("<img src='themes/default/images/img_loading.gif'>")
				.appendTo('.loader_div');
							
		
							
			$.ajax({							
									url: "index.php?module=ECalendar&action=AjaxLoad&sugar_body_only=true",
									dataType: 'json',
									data: {
											"cur_module" : type,
											"record" : record
									},
																	
									success: function(res){						
												if(res.succuss == 'yes'){													
													$("#form_record").val(res.record);
													$("#form_record").val(res.record);
													
													$("#rec_id_c").val(res.rec_id_c);

													
													if(res.type == 'call'){
															$("#return_module").val("Calls");
															$("#cur_module").val("Calls");
															$("#direction").css("display","inline");
															$("#radio_call").attr("checked",true);
															$("#radio_meeting").removeAttr("checked");
													}
													if(res.type == 'meeting'){
															$("#return_module").val("Meetings");
															$("#cur_module").val("Meetings");
															$("#direction").css("display","none");
															$("#radio_meeting").attr("checked",true);
															$("#radio_call").removeAttr("checked");
													}

													$("#name").val(res.record_name);

													
													$("select[name='status']>option[value='"+res.status+"']").attr("selected",true);
													$("select[name='direction']>option[value='"+res.direction+"']").attr("selected",true);
																								
													$("input[name='duration_hours']").val(res.duration_hours);
													$("select[name='duration_minutes']>option[value='"+res.duration_minutes+"']").attr("selected",true);
													if(parseInt(res.reminder_time) != parseInt(-1)){
														$("input[name='reminder_checked']").attr("checked",true);
														$("#should_remind_list").css("display","inline");
														$("select[name='reminder_time']>option[value='"+res.reminder_time+"']").attr("selected",true);													
													}else{
														$("input[name='reminder_checked']").removeAttr("checked");
														$("#should_remind_list").css("display","none");
													}
														
													$("#assigned_user_name").val(res.user_name);
													$("#assigned_user_id").val(res.assigned_user_id);
													$("#parent_type>option[value='"+res.parent_type+"']").attr("selected",true);
													$("#parent_name").val(res.parent_name);
													$("#parent_id").val(res.parent_id);
													$("#description").val(res.description);
													$("#location").val(res.location);
														
													if(parseInt(res.options_c))
														$("#options_c").attr("checked",true);
													$("#category_c > option[value='"+res.category_c+"']").attr("selected",true);
													
													var combo_date_start = new Datetimecombo(res.date_start, "date_start", time_format, 100, '', ''); 
													text = combo_date_start.html('SugarWidgetScheduler.update_time();');
													document.getElementById('date_start_time_section').innerHTML = text;
													eval(combo_date_start.jsscript('SugarWidgetScheduler.update_time();'));
													combo_date_start.update();
													
													
													
													$('#EditView input').removeAttr("disabled");
													$('#EditView select').removeAttr("disabled");
													$('#EditView textarea').removeAttr("disabled");
													
													$("#radio_call").attr("disabled",true);
													$("#radio_meeting").attr("disabled",true);

													
													if(res.type == 'call'){
														$('#location').attr('disabled','disabled');
													}
													
																									
													$('#title-record_dialog').html(lbl_edit);
																										
													SugarWidgetScheduler.update_time();
													
													
													var mod_name = '';
													if(res.type == 'call')
														mod_name = 'Calls';
													if(res.type == 'meeting')
														mod_name = 'Meetings';																										
														
																										
													
													$("#repeat_type option[value='" + res.repeat_type_c + "']").attr("selected","selected");
													$("#repeat_interval option[value='" + res.repeat_interval_c + "']").attr("selected","selected");																									
													$("#repeat_end_date").val(res.repeat_end_date_c);
													
													
													if(res.rec_id_c != '')
														$("#repeat_type").attr("disabled","disabled");
													else
														$("#repeat_type").removeAttr("disabled");
													
													repeat_type_selected();
													
												
													var d_str = res.repeat_days_c;
													var d_arr = d_str.split("");
													$.each(
														d_arr,
														function (i,v){
															$(".weeks_checks[value='" + v + "']").attr("checked","checked");	
														}
													);
													
													if(!run_one_time)
														if(res.rec_id_c != '' || res.repeat_type_c != '' ){
															if(confirm("Do you want to edit all recurring records at once?")){
																if(res.rec_id_c != ''){
																	clearFields();
																	FormLoad(res.type,res.rec_id_c,true);	
																}																
															}else{
																	$("#repeat_type option[value='']").attr("selected","selected");
																	repeat_type_selected();
																	$("#repeat_type").attr("disabled","disabled");
																	$("#no_recurence").val("1");
															}
														}

													if(res.editview == 1){
														record_editable = true;
													}else
														record_editable = false;

													GR_update_focus(mod_name,res.record);

														
																										
												}else
													alert(lbl_error_loading);														
									},
									error: function(){
										alert(lbl_error_loading);
									}
			});
		}
		records_openable = true;								
	}
	
	
	function removeSharedById(rec_id){
			var cell_id = $("#" + rec_id).parent().attr("id");											
			$.each(
					shared_users,
					function(i,v){																		
							$("#" + rec_id + '____' + v).remove();
							align_divs(cell_id + '_' + v);
					}
			);
			$("#" + rec_id).remove();
			align_divs(cell_id);				
	}
	
	
	function AddRecords(res){	
			if($("#no_recurence").val() == ''){			
				ids = new Array();			
				$.each(
					$("div[rec_id_c='" + res.record + "']"),
					function (i,v){
						ids[i] = $(v).parent().attr('id'); 					
					}
				);				
				$("div[rec_id_c='" + res.record + "']").remove();				
				$.each(
					ids,
					function (i,v){
						align_divs(ids[i]);		
					}				
				);
			}
				
			if(pview != 'shared'){
				AddRecordToPage(res);
								
				var record_id = res.record;
				
				$.each(
					res.arr_rec,
					function (j,r){
						res.record = r.record;
						res.start = r.start;
						res.rec_id_c = record_id;
						AddRecordToPage(res);
					}				
				);
			}else{
				removeSharedById(res.record);
				record_id = res.record;
				var rec_id_c = res.rec_id_c;
				var start = res.start;
				$.each(
					res.users,
					function (i,v){						
						var rec = res;
						rec.rec_id_c = rec_id_c;
						rec.start = start;						
						rec.user_id = v;
						rec.record = record_id;
						AddRecordToPage(rec);
						
						$.each(
							rec.arr_rec,
							function (j,r){
								rec.record = r.record;
								rec.start = r.start;
								rec.rec_id_c = record_id;
								AddRecordToPage(rec);
							}				
						);																	 						
					}											 					
				);
			}
	}
	
	
	function update_vcal(){
												
												var v = current_user_id;
												//updates the current user's scheduler row
												urllib.getURL('./vcal_server.php?type=vfb&source=outlook&user_id='+v,[["Content-Type", "text/plain"]], function (result) { 
												if (typeof GLOBAL_REGISTRY.freebusy == 'undefined') {
													GLOBAL_REGISTRY.freebusy = new Object();
												}
												if (typeof GLOBAL_REGISTRY.freebusy_adjusted == 'undefined') {
														GLOBAL_REGISTRY.freebusy_adjusted = new Object();
												}
												// parse vCal and put it in the registry using the user_id as a key:
								 				GLOBAL_REGISTRY.freebusy[v] = SugarVCalClient.parseResults(result.responseText, false);                  
								 				// parse for current user adjusted vCal
												GLOBAL_REGISTRY.freebusy_adjusted[v] = SugarVCalClient.parseResults(result.responseText, true);
												SugarWidgetScheduler.update_time();
												});
	}
