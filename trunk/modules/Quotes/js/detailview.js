 var fileref=document.createElement("link")
  fileref.setAttribute("rel", "stylesheet")
  fileref.setAttribute("type", "text/css")
  fileref.setAttribute("href", 'modules/Quotes/css/quotes.css')
 
 if (typeof fileref!="undefined")
  document.getElementsByTagName("head")[0].appendChild(fileref)

$(document).ready(function(){
     display_hide();
});
 
function display_hide(){
    val = $('#department').val();
    if(val == 'dos'){
        $('#transport,#hotel,   #room, #food, #guide,  #insurance, #other').show();
         $('#transport,#hotel,   #room, #food, #guide,  #insurance, #other').closest('td').next('td').hide();
        $('#outbound').hide(); 
//        $('#ib_include, #surcharge,#ob_notes').hide();
        $('#ib_include, #surcharge,#ob_notes, #flight_schedules').closest('tr').hide();
    }
    else if(val == 'ib'){
//       $('#transport, #room, #food,  #guide,  #insurance, #other,#ob_notes').hide();
       $('#transport, #room, #food,  #guide,  #insurance, #other,#ob_notes, #flight_schedules').closest('tr').hide();
       $('#outbound').hide();
       $('#ib_include, #hotel, #not_content, #child_cost, #surcharge').show();
    }
    else if (val == 'ob'){
//        $('#cost_detail').closest('tr').hide();
        $('#transport, #hotel,  #child_cost, #surcharge, #room, #food,  #guide, #insurance,  #other').closest('tr').hide();
        $('#outbound').show();
        $('#ib_include, #not_content, #ob_notes, #flight_schedules').show();
    }
}