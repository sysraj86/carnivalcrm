
$(function(){
    $('.datetime').datepicker("destroy");
    $('.datetime').datepicker({showOn: 'button', buttonImage: 'themes/default/images/jscalendar.gif', buttonImageOnly: true,dateFormat: 'dd/mm/yy',yearRange:'-50,+20'});

/*Calendar.setup ({ {/literal} inputField : 'date1', ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : 'start_date_trigger1', singleClick : true, step : 1 {literal}});addToValidate('EditView', 'expiration', 'date', false,'expiration'  );
   //$('.btnAddRow').click(function(){
        var count = $('#table_clone').find(" tbody > tr").length;
          for(i =1 ; i<=count; i++){
            //alert(i);
              Calendar.setup ({ {/literal} inputField : 'date'+i, ifFormat : '{$CALENDAR_DATEFORMAT}', showsTime : false, button : 'start_date_trigger'+i, singleClick : true, step : 1 {literal}});addToValidate('EditView', 'expiration', 'date', false,'expiration'  );
          } 
   });*/  
   
   $('.service').click(function(){
        i = this.id.substring(this.id.length-1,this.id.length);
        //alert(i);
       open_popup($('#parent'+i).val(), 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"parent_id"+i, "name": "parent_name"+i,"tel": "tel"+i, "fax":"fax"+i,"address":"address"+i }}, "single", true);   
       return false;
   });
   
   $(".contact").click(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       open_popup("Contacts", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "contact_id"+i, "name":"contact_name"+i, "phone_mobile":"contact_phone"+i }}, "single", true);
       return false;
   });
   
   $(".pick_up_car").click(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       open_popup("Cars", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "pick_up_car_id"+i, "name":"driver"+i, "phone": "driver_phone"+i, "number_plates":"number_plates"+i}}, "single", true);
       return false;
   });
   $(".guide").click(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       open_popup("TravelGuides", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "guide_id"+i, "name":"guide_name"+i, "phone": "guide_phone"+i}}, "single", true);
       return false;
   });
   

   $(".leader").click(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       open_popup("TravelGuides", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "leader_id"+i, "name":"team_leader"+i, "phone": "leader_phone"+i}}, "single", true);
       return false;
   });
   $(".foodmenu").click(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       open_popup("FoodMenu", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id":"content_id"+i,"description":"content"+i }}, "single", true);
       return false;
   });
   
  
    $('.sightseeing_btn').click(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       open_popup("Cars", 600, 400, "", true, false, {"call_back_function":"set_return", "form_name": "EditView", "field_to_name_array":{"id": "sightseeing_id"+i, "name":"driver_sight"+i, "phone": "driver_phone_sight"+i, "number_plates":"number_plates_sight"+i}}, "single", true);
       return false;
   });
   
   $('.parent').change(function(){
       i = this.id.substring(this.id.length-1,this.id.length);
       $('#parent_name'+i).val("");
       $('#parent_id'+i).val("");
       $('#tel'+i).val("");
       $('#fax'+i).val("");
       $('#address'+i).val("");
       $('#content'+i).val("");
       if($('#parent'+i).val() == 'Hotels'){
           $('#btn_foodmenu'+i).hide();
       }else{
           $('#btn_foodmenu'+i).show();
       }
       parent_namechangeQS();
       //onchange="document.EditView.parent_name.value='';document.EditView.parent_id.value='';parent_namechangeQS(); 
       checkParentType($('#parent'+i).val(), $('#btn_parent_name'+i));// document.EditView.btn_parent_name);"
       //alert($('#btn_parent_name'+i));
       
   });
   
   $('.checkhidden').click(function(){
       if($(this).is(':checked'))  
         {
            $(this).closest("tr").find(".phidden").show();
         }            
         else
         {
            $(this).closest("tr").find(".phidden").hide();
         }
   });
   
   
   
       
});

function parent_namechangeQS() {
    new_module = document.forms["EditView"].elements["parent_type"].value;
    if (typeof(disabledModules[new_module]) != 'undefined') {
        sqs_objects["EditView_parent_name"]["disable"] = true;
        document.forms["EditView"].elements["parent_name"].readOnly = true;
    } else {
        sqs_objects["EditView_parent_name"]["disable"] = false;
        document.forms["EditView"].elements["parent_name"].readOnly = false;
    }
    sqs_objects["EditView_parent_name"]["modules"] = new Array(new_module);
    if (typeof QSProcessedFieldsArray != 'undefined') {
        QSProcessedFieldsArray["EditView_parent_name"] = false;
    }
    enableQS(false);
}