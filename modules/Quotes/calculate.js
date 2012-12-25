var linkCss = $('<link/>',{
        'type':'text/css',
        'rel' :'stylesheet',
        'href':'modules/Quotes/css/quotes.css',
    });
    
$('head').append(linkCss);


$(document).ready(function(){
    if(jQuery('#is_tour').val() == "true" && jQuery('#is_tour').val() !=""){
        jQuery('#quotes_tours_name').val(jQuery('#tour_name').val());
        jQuery('#quotes_toufa8brstours_idb').val(jQuery('#tour_id').val());
    }
    display_hide();
    displayContact();
    displayCurrency($('.ob_currency')); 
    $('#department').change(function(){
         display_hide();
         displayCurrency($('.ob_currency'));
    });
    
     $('#parent_type').change(function(){
          displayContact();
     });
    
    replaceID('table_clone');
    disabledBtnDel('inbound','table_clone');
    disabledBtnDel('dos','table_clone');
   $('.calculate').blur(function(){
        var a = parseFloat($('#service_cost').val());
        var b = parseFloat($('#airline_ticket_cost').val());
        var tt = a+b;
        if(!isNaN(tt)){
            $('#total_cost').val(tt.toString());
        }
   });
   
   // add row
   $('.btnAddRow').live('click',function(){
      $this = $(this);
      addNewRow($this,'table_clone');
      disabledBtnDel('inbound','table_clone');
      disabledBtnDel('dos','table_clone');
   });
   
   // delete row
   $('.btnDeleteRow').live('click',function(){
      $(this).closest('tr').remove();
      replaceID('table_clone'); 
      disabledBtnDel('inbound','table_clone');
      disabledBtnDel('dos','table_clone'); 
   });
   
   $('.ob_currency').live('change',function(){
         displayCurrency($(this));
   });
   
   $('.ob_price, .ob_tax, .ob_total_price').blur(function(){
       price = parseFloat(unformatNumber($('.ob_price').val(),num_grp_sep,dec_sep));
       tax = parseFloat(unformatNumber($('.ob_tax').val(),num_grp_sep,dec_sep));
       
       if(!isNaN(price)){
            $('.ob_price').val(formatNumber(price, num_grp_sep, dec_sep, 2, 2));
       }
       
       if(!isNaN(price)){
            $('.ob_tax').val(formatNumber(tax, num_grp_sep, dec_sep, 2, 2));
       }
       sum = price+tax
       if(!isNaN(sum)){
          $('.ob_total_price').val(formatNumber(sum, num_grp_sep, dec_sep, 2, 2));
       }
       
   })
   
});

function display_hide(){
    val = $('#department').val();
    if(val == 'dos'){
        $('div [id=dos]').show();
        $('div [id=inbound]').hide();
        $('#cost_detail_label').show(); 
        $('div [id=outbound]').hide(); 
        $('#transport, #transport_label,#hotel, #hotel_label,  #room, #room_label, #food, #food_label, #guide, #guide_label, #insurance, #insurance_label, #other, #other_label').show();
        $('#ib_include, #ib_include_label, #surcharge, #surcharge_label ,#ob_notes, #ob_notes_label, #flight_schedules, #flight_schedules_label').hide();
    }
    else if(val == 'ib'){
       $('div [id=dos]').hide();
       $('div [id=inbound]').show(); 
       $('#cost_detail_label').show();
       $('div [id=outbound]').hide(); 
       $('#transport, #transport_label, #room, #room_label, #food, #food_label, #guide, #guide_label, #insurance, #insurance_label, #other, #other_label,#ob_notes, #ob_notes_label,#flight_schedules, #flight_schedules_label').hide();
       $('#ib_include, #ib_include_label, #hotel, #hotel_label, #not_content, #not_content_label, #child_cost, #child_cost_label, #surcharge, #surcharge_label').show();
    }
    else if (val == 'ob'){
        $('div [id=dos]').hide();
        $('div [id=inbound]').hide();
        $('div [id=outbound]').show();
        $('#cost_detail_label').show(); 
        $('#transport, #transport_label,#hotel, #hotel_label, #child_cost, #child_cost_label, #surcharge, #surcharge_label, #room, #room_label, #food, #food_label, #guide, #guide_label, #insurance, #insurance_label, #other, #other_label').hide();
        $('#ib_include, #ib_include_label, #not_content, #not_content_label, #ob_notes, #ob_notes_label,#flight_schedules, #flight_schedules_label').show();
    }
    else{
        $('div [id=dos]').hide();
        $('div [id=inbound]').hide();
        $('#cost_detail_label').hide(); 
        $('div [id=outbound]').hide();
    }
}

function displayCurrency(name){
    str = $(name).find('option:selected').text();
    $(name).closest('tr').find('.currency').text(str);
}

function displayContact(){
    val = $('#parent_type').val();
    if(val == 'Accounts'){
        $('#contacts_quotes_name').closest('td').show();
        $('#contacts_quotes_name').closest('td').prev('td').show();
    }
    else{
        $('#contacts_quotes_name').closest('td').hide();
        $('#contacts_quotes_name').closest('td').prev('td').hide();
        $('#contacts_quotes_name').val('');
        $('#contacts_q33a7ontacts_ida').val('');
    }
}