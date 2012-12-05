jQuery(document).ready(function(){ 
    jQuery('.calculate').live('keypress',function(event){
        // Backspace, tab, enter, end, home, left, right
        // We don't support the del key in Opera because del == . == 46.
        var controlKeys = [8, 9, 13, 35, 36, 37, 39];
        // IE doesn't support indexOf
        var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
        // Some browsers just don't raise events for control keys. Easy.
        // e.g. Safari backspace.
        if (!event.which || // Control keys in most browsers. e.g. Firefox tab is 0
        (48 <= event.which && event.which <= 57) || // Always 1 through 9
        (48 == event.which && $(this).attr("value")) || // No 0 first digit
        isControlKey || String.fromCharCode(event.which ) == "." || String.fromCharCode(event.which ) == ",") { // Opera assigns values for control keys.
            return;
        } else {
            event.preventDefault();
        } 

    });
    jQuery('.calculate').live('blur',function(){
        val = unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep);
        jQuery(this).val(formatNumber(val,num_grp_sep,dec_sep,2,0));
        
        transfer12km();
        transfer34km();
        transfer57km();
        transfer812km();
        transfer1316km();
        transfer1730km();
        // calculate Boat
        boat_price = parseFloat(unformatNumber(jQuery(this).closest('tr').find('.boat_price').val(),num_grp_sep,dec_sep));
        boat_num = jQuery(this).closest('tr').find('.boat_num').val();
        boat_money = Math.round(boat_price*boat_num);
        if(boat_money != Infinity){
            if(!isNaN(boat_money)){
                jQuery(this).closest('tr').find('.boat_money').val(formatNumber(boat_money,num_grp_sep,dec_sep,2,0));
            }
        }
        else{
            (this).closest('tr').find('.boat_money').val('0');
        }
        calculateBoatPrice();

        calculateGuide();
        // calculate GROUP MISCELLANEOUS
        group_price = parseFloat(unformatNumber(jQuery(this).closest('tr').find('.group_price').val(),num_grp_sep,dec_sep));
        group_num = jQuery(this).closest('tr').find('.group_num').val();
        group_money = Math.round(group_price*group_num);
        if(group_money != Infinity){
            if(!isNaN(group_money)){
                jQuery(this).closest('tr').find('.group_money').val(formatNumber(group_money,num_grp_sep,dec_sep,2,0));
            }
        }
        else{
            jQuery(this).closest('tr').find('.group_money').val('0');
        }
        groupMiscellaneous();

        // ENTRANCE

        entrance_price = parseFloat(unformatNumber(jQuery(this).closest('tr').find('.entrance_price').val(),num_grp_sep,dec_sep));
        entrance_num = jQuery(this).closest('tr').find('.entrance_num').val();
        entrance_money = entrance_price*entrance_num;
        if(entrance_money != Infinity){
            if(!isNaN(entrance_money)){
                jQuery(this).closest('tr').find('.entrance_money').val(formatNumber(entrance_money,num_grp_sep,dec_sep,2,0));
            }
        }
        else{
            jQuery(this).closest('tr').find('.entrance_money').val('0');
        }

        calculateEntrance();
        // END ENTRANCE

        // TICKETS
        tickets_price = parseFloat(unformatNumber(jQuery(this).closest('tr').find('.tickets_price').val(),num_grp_sep,dec_sep));
        tickets_num = jQuery(this).closest('tr').find('.tickets_num').val();
        tickets_money =  Math.round(tickets_price*tickets_num,2);
        if(tickets_money != Infinity){
            if(!isNaN(tickets_money)){
                jQuery(this).closest('tr').find('.tickets_money').val(formatNumber(tickets_money,num_grp_sep,dec_sep,2,0));
            }
        }
        else{
            jQuery(this).closest('tr').find('.tickets_money').val('0');
        }
        // END TICKETS

        calculateTicket();

        // FIT MISCELLANEOUS

        fit_price = parseFloat(unformatNumber(jQuery(this).closest('tr').find('.fit_price').val(),num_grp_sep,dec_sep));
        fit_num = jQuery(this).closest('tr').find('.fit_num').val();
        fit_money = fit_price*fit_num;
        if(fit_money != Infinity){
            if(!isNaN(fit_money)){
                jQuery(this).closest('tr').find('.fit_money').val(formatNumber(fit_money,num_grp_sep,dec_sep,2,0));
            }
        }
        else{
            jQuery(this).closest('tr').find('.fit_money').val('0');
        }

        calculateFitMiscellaneous();

        calculateMeal1South();
        calculateMeal1Middle();
        calculateMeal1North();
        sumMeal1();

        // HOTEL 1
        hotel1_price = parseFloat(unformatNumber(jQuery(this).closest('tr').find('.hotel1_price').val(),num_grp_sep,dec_sep));
        hotel1_num = jQuery(this).closest('tr').find('.hotel1_num').val();

        hotel1_money =   Math.round(hotel1_price*hotel1_num,2);

        if(hotel1_money != Infinity){
            if(!isNaN(hotel1_money)){
                jQuery(this).closest('tr').find('.hotel1_money').val(formatNumber(hotel1_money,num_grp_sep,dec_sep,2,0));
            }
        }
        else{
            jQuery(this).closest('tr').find('.hotel1_money').val('0');
        }
        calculateHotel1();
        // end hote1

        // summary 1

        calculateSummary1();


        calculateMeal2South();
        calculateMeal2Middle();
        calculateMeal2North();
        sumMeal2(); 

        // Hotel 2
        hotel2_price = parseFloat(unformatNumber(jQuery(this).closest('tr').find('.hotel2_price').val(),num_grp_sep,dec_sep));
        hotel2_num = jQuery(this).closest('tr').find('.hotel2_num').val();

        hotel2_money = Math.round(hotel2_price*hotel2_num,2);
        if(hotel2_money != Infinity){
            if(!isNaN(hotel2_money)){
                jQuery(this).closest('tr').find('.hotel2_money').val(formatNumber(hotel2_money,num_grp_sep,dec_sep,2,0));
            }
        }
        else{
            jQuery(this).closest('tr').find('.hotel2_money').val('0');
        }

        calculateHotel2();
        // End Hotel 2


        calculateMeal3South();
        calculateMeal3Middle();
        calculateMeal3North();
        sumMeal3(); 

        // hotel 3 
        hotel3_price = parseFloat(unformatNumber(jQuery(this).closest('tr').find('.hotel3_price').val(),num_grp_sep,dec_sep));
        hotel3_num = jQuery(this).closest('tr').find('.hotel3_num').val();
        hotel3_money =  hotel3_price*hotel3_num;
        if(hotel3_money != Infinity){
            if(!isNaN(hotel3_money)){
                jQuery(this).closest('tr').find('.hotel3_money').val(formatNumber(hotel3_money,num_grp_sep,dec_sep));
            }
        }
        else{
            jQuery(this).closest('tr').find('.hotel3_money').val('0');
        }

        calculateHotel3(); 
        // end hotel 3
    });
});

// add row

jQuery('.btnAdd').live('click',function(){
    thisRow = jQuery(this).closest('tr');
    newRow = jQuery(thisRow).clone(true);
    newRow.insertAfter(thisRow);
    newRow.find('input[type="text"]').val('');
});

// delete row 

jQuery('.btnDel').live('click',function(){
    jQuery(this).closest('tr').remove();
})

// tinh chi phí phần transfer cho 1-2 khách
function transfer12km(){
    transfer_south = jQuery('#transfer_south').val();
    transfer_south_km1 = parseFloat(unformatNumber(jQuery('#transfer_south_km1').val(),num_grp_sep, dec_sep));
    transfer_middle = jQuery('#transfer_middle').val();
    transfer_middle_km1 = parseFloat(unformatNumber(jQuery('#transfer_middle_km1').val(),num_grp_sep, dec_sep));
    transfer_north = jQuery('#transfer_north').val();
    transfer_north_km1 = parseFloat(unformatNumber(jQuery('#transfer_north_km1').val(),num_grp_sep, dec_sep));
    south_package1 = parseFloat(unformatNumber(jQuery('#south_package1').val(),num_grp_sep, dec_sep));
    middle_package1 = parseFloat(unformatNumber(jQuery('#middle_package1').val(),num_grp_sep, dec_sep));
    north_package1 = parseFloat(unformatNumber(jQuery('#north_package1').val(),num_grp_sep, dec_sep));
    sum = (transfer_south*transfer_south_km1)+(transfer_middle*transfer_middle_km1)+(transfer_north*transfer_north_km1)+south_package1+middle_package1+north_package1;
    soluongkh1 = jQuery('#soluongkh1').val();
    soluongkh2 = jQuery('#soluongkh2').val();

    transfer1 = Math.round(sum/soluongkh1,2);
    transfer3 = Math.round(transfer1/11,2);
    if(transfer1 != Infinity){
        if(!isNaN(transfer1)){
            jQuery('#transfer1').val(formatNumber(transfer1, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#transfer1').val('0');
    } 
    if(transfer3 != Infinity){
        if(!isNaN(transfer3)){
            jQuery('#transfer3').val(formatNumber(transfer3, num_grp_sep, dec_sep, 2, 0))
        } 
    }
    else{
        jQuery('#transfer3').val('0');
    }
    transfer2 = Math.round(sum/soluongkh2,2);
    transfer4 = Math.round(transfer2/11,2); 
    if(transfer2 != Infinity){
        if(!isNaN(transfer2)){
            jQuery('#transfer2').val(formatNumber(transfer2, num_grp_sep, dec_sep, 2, 0));   
        }
    }
    else{
        jQuery('#transfer2').val('0');
    }
    if(transfer4 != Infinity){
        if(!isNaN(transfer4)){
            jQuery('#transfer4').val(formatNumber(transfer4, num_grp_sep, dec_sep, 2, 0))
        }
    }
    else{
        jQuery('#transfer4').val('0');
    }

    jQuery('#tax1').html('Tax '+soluongkh1) ;
    jQuery('#tax2').html('Tax '+soluongkh2) ;
}


// tinh chi phí phần transfer cho 3-3 khách
function transfer34km(){
    transfer_south = jQuery('#transfer_south').val();
    transfer_south_km2 = parseFloat(unformatNumber(jQuery('#transfer_south_km2').val(),num_grp_sep, dec_sep));
    transfer_middle = jQuery('#transfer_middle').val();
    transfer_middle_km2 = parseFloat(unformatNumber(jQuery('#transfer_middle_km2').val(),num_grp_sep, dec_sep));
    transfer_north = jQuery('#transfer_north').val();
    transfer_north_km2 = parseFloat(unformatNumber(jQuery('#transfer_north_km2').val(),num_grp_sep, dec_sep));
    south_package2 = parseFloat(unformatNumber(jQuery('#south_package2').val(),num_grp_sep, dec_sep));
    middle_package2 = parseFloat(unformatNumber(jQuery('#middle_package2').val(),num_grp_sep, dec_sep));
    north_package2 = parseFloat(unformatNumber(jQuery('#north_package2').val(),num_grp_sep, dec_sep));
    sum = (transfer_south*transfer_south_km2)+(transfer_middle*transfer_middle_km2)+(transfer_north*transfer_north_km2)+south_package2+middle_package2+north_package2;
    soluongkh3 = jQuery('#soluongkh3').val();
    soluongkh4 = jQuery('#soluongkh4').val();

    transfer5 = Math.round(sum/soluongkh3,2);
    transfer7 = Math.round(transfer5/11,2);
    if(transfer5 != Infinity){
        if(!isNaN(transfer5)){
            jQuery('#transfer5').val(formatNumber(transfer5, num_grp_sep, dec_sep, 2, 0));
        }
    } 
    else{
        jQuery('#transfer5').val('0');
    }
    if(transfer7 != Infinity){
        if(!isNaN(transfer7)){
            jQuery('#transfer7').val(formatNumber(transfer7, num_grp_sep, dec_sep, 2, 0))
        }
    }
    else{
        jQuery('#transfer7').val('0');
    }

    transfer6 = Math.round(sum/soluongkh4,2);
    transfer8 = Math.round(transfer6/11,2);
    if(transfer6 != Infinity){
        if(!isNaN(transfer6)){
            jQuery('#transfer6').val(formatNumber(transfer6, num_grp_sep, dec_sep, 2, 0));   
        } 
    }
    else{
        jQuery('#transfer6').val('0');
    }
    if(transfer8 != Infinity){
        if(!isNaN(transfer8)){
            jQuery('#transfer8').val(formatNumber(transfer8, num_grp_sep, dec_sep, 2, 0))
        } 
    }
    else{
        jQuery('#transfer8').val('0');
    }
    jQuery('#tax3').html('Tax '+soluongkh3) ;
    jQuery('#tax4').html('Tax '+soluongkh4) ;
}

// tinh chi phí phần transfer cho 5-7 khách
function transfer57km(){
    transfer_south = jQuery('#transfer_south').val();
    transfer_south_km3 = parseFloat(unformatNumber(jQuery('#transfer_south_km3').val(),num_grp_sep, dec_sep));
    transfer_middle = jQuery('#transfer_middle').val();
    transfer_middle_km3 = parseFloat(unformatNumber(jQuery('#transfer_middle_km3').val(),num_grp_sep, dec_sep));
    transfer_north = jQuery('#transfer_north').val();
    transfer_north_km3 = parseFloat(unformatNumber(jQuery('#transfer_north_km3').val(),num_grp_sep, dec_sep));
    south_package3 = parseFloat(unformatNumber(jQuery('#south_package3').val(),num_grp_sep, dec_sep));
    middle_package3 = parseFloat(unformatNumber(jQuery('#middle_package3').val(),num_grp_sep, dec_sep));
    north_package3 = parseFloat(unformatNumber(jQuery('#north_package3').val(),num_grp_sep, dec_sep));
    sum = (transfer_south*transfer_south_km3)+(transfer_middle*transfer_middle_km3)+(transfer_north*transfer_north_km3)+south_package3+middle_package3+north_package3;
    soluongkh5 = jQuery('#soluongkh5').val();
    soluongkh6 = jQuery('#soluongkh6').val();

    transfer9 = Math.round(sum/soluongkh5,2);
    transfer11 = Math.round(transfer9/11,2);
    if(transfer9 != Infinity){
        if(!isNaN(transfer9)){
            jQuery('#transfer9').val(formatNumber(transfer9, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#transfer9').val('0');
    }
    if(transfer11 != Infinity){
        if(!isNaN(transfer11)){
            jQuery('#transfer11').val(formatNumber(transfer11, num_grp_sep, dec_sep, 2, 0))
        } 
    }
    else{
        jQuery('#transfer11').val('0');
    }

    transfer10 = Math.round(sum/soluongkh6,2);
    transfer12 = Math.round(transfer10/11,2);
    if(transfer10 != Infinity){
        if(!isNaN(transfer10)){
            jQuery('#transfer10').val(formatNumber(transfer10, num_grp_sep, dec_sep, 2, 0));   
        }
    }
    else{
        jQuery('#transfer10').val('0');
    }
    if(transfer12 != Infinity){
        if(!isNaN(transfer12)){
            jQuery('#transfer12').val(formatNumber(transfer12, num_grp_sep, dec_sep, 2, 0))
        } 
    }
    else{
        jQuery('#transfer12').val('0');
    }
    jQuery('#tax5').html('Tax '+soluongkh5) ;
    jQuery('#tax6').html('Tax '+soluongkh6) ;
}

// tinh chi phí phần transfer cho 8-12 khách
function transfer812km(){
    transfer_south = jQuery('#transfer_south').val();
    transfer_south_km4 = parseFloat(unformatNumber(jQuery('#transfer_south_km4').val(),num_grp_sep, dec_sep));
    transfer_middle = jQuery('#transfer_middle').val();
    transfer_middle_km4 = parseFloat(unformatNumber(jQuery('#transfer_middle_km4').val(),num_grp_sep, dec_sep));
    transfer_north = jQuery('#transfer_north').val();
    transfer_north_km4 = parseFloat(unformatNumber(jQuery('#transfer_north_km4').val(),num_grp_sep, dec_sep));
    south_package4 = parseFloat(unformatNumber(jQuery('#south_package4').val(),num_grp_sep, dec_sep));
    middle_package4 = parseFloat(unformatNumber(jQuery('#middle_package4').val(),num_grp_sep, dec_sep));
    north_package4 = parseFloat(unformatNumber(jQuery('#north_package4').val(),num_grp_sep, dec_sep));
    sum = (transfer_south*transfer_south_km4)+(transfer_middle*transfer_middle_km4)+(transfer_north*transfer_north_km4)+south_package4+middle_package4+north_package4;
    soluongkh7 = jQuery('#soluongkh7').val();
    soluongkh8 = jQuery('#soluongkh8').val();

    transfer13 = Math.round(sum/soluongkh7,2);
    transfer15 = Math.round(transfer13/11,2);
    if(transfer13 != Infinity){
        if(!isNaN(transfer13)){
            jQuery('#transfer13').val(formatNumber(transfer13, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#transfer13').val('0');
    }
    if(transfer15 != Infinity){
        if(!isNaN(transfer15)){
            jQuery('#transfer15').val(formatNumber(transfer15, num_grp_sep, dec_sep, 2, 0))
        } 
    }
    else{
        jQuery('#transfer15').val('0');
    }

    transfer14 = Math.round(sum/soluongkh8,2);
    transfer16 = Math.round(transfer14/11,2);
    if(transfer14 != Infinity){
        if(!isNaN(transfer14)){
            jQuery('#transfer14').val(formatNumber(transfer14, num_grp_sep, dec_sep, 2, 0));   
        }
    }
    else{
        jQuery('#transfer14').val('0');
    }
    if(transfer16 != Infinity){
        if(!isNaN(transfer16)){
            jQuery('#transfer16').val(formatNumber(transfer16, num_grp_sep, dec_sep, 2, 0))
        }
    }
    else{
        jQuery('#transfer16').val('0');
    }
    jQuery('#tax7').html('Tax '+soluongkh7) ;
    jQuery('#tax8').html('Tax '+soluongkh8) ;
}

// tinh chi phí phần transfer cho 13-16 khách
function transfer1316km(){
    transfer_south = jQuery('#transfer_south').val();
    transfer_south_km5 = parseFloat(unformatNumber(jQuery('#transfer_south_km5').val(),num_grp_sep, dec_sep));
    transfer_middle = jQuery('#transfer_middle').val();
    transfer_middle_km5 = parseFloat(unformatNumber(jQuery('#transfer_middle_km5').val(),num_grp_sep, dec_sep));
    transfer_north = jQuery('#transfer_north').val();
    transfer_north_km5 = parseFloat(unformatNumber(jQuery('#transfer_north_km5').val(),num_grp_sep, dec_sep));
    south_package5 = parseFloat(unformatNumber(jQuery('#south_package5').val(),num_grp_sep, dec_sep));
    middle_package5 = parseFloat(unformatNumber(jQuery('#middle_package5').val(),num_grp_sep, dec_sep));
    north_package5 = parseFloat(unformatNumber(jQuery('#north_package5').val(),num_grp_sep, dec_sep));
    sum = (transfer_south*transfer_south_km5)+(transfer_middle*transfer_middle_km5)+(transfer_north*transfer_north_km5)+south_package5+middle_package5+north_package5;
    soluongkh9 = jQuery('#soluongkh9').val();
    soluongkh10 = jQuery('#soluongkh10').val();

    transfer17 = Math.round(sum/soluongkh9,2);
    transfer19 = Math.round(transfer17/11,2);
    if(transfer17 != Infinity){
        if(!isNaN(transfer17)){
            jQuery('#transfer17').val(formatNumber(transfer17, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#transfer17').val('0');
    }
    if(transfer19 != Infinity){
        if(!isNaN(transfer19)){
            jQuery('#transfer19').val(formatNumber(transfer19, num_grp_sep, dec_sep, 2, 0))
        }
    }
    else{
        jQuery('#transfer19').val('0');
    }
    transfer18 = Math.round(sum/soluongkh10,2);
    transfer20 = Math.round(transfer18/11,2);
    if(transfer18 != Infinity){
        if(!isNaN(transfer18)){
            jQuery('#transfer18').val(formatNumber(transfer18, num_grp_sep, dec_sep, 2, 0));   
        }
    }
    else{
        jQuery('#transfer18').val('0') ;
    }

    if(transfer20 != Infinity){
        if(!isNaN(transfer20)){
            jQuery('#transfer20').val(formatNumber(transfer20, num_grp_sep, dec_sep, 2, 0))
        }
    }
    else{
        jQuery('#transfer20').val('0');
    }


    soluongkh11 = jQuery('#soluongkh11').val();
    soluongkh12 = jQuery('#soluongkh12').val();

    transfer21 = Math.round(sum/soluongkh11,2);
    transfer23 = Math.round(transfer21/11,2);
    if(transfer21 != Infinity){
        if(!isNaN(transfer21)){
            jQuery('#transfer21').val(formatNumber(transfer21, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#transfer21').val('0');
    }
    if(transfer23 != Infinity){
        if(!isNaN(transfer23)){
            jQuery('#transfer23').val(formatNumber(transfer23, num_grp_sep, dec_sep, 2, 0))
        } 
    }
    else{
        jQuery('#transfer23').val('0');
    }

    transfer22 = Math.round(sum/soluongkh12,2);
    transfer24 = Math.round(transfer22/11,2);
    if(transfer22 != Infinity){
        if(!isNaN(transfer22)){
            jQuery('#transfer22').val(formatNumber(transfer22, num_grp_sep, dec_sep, 2, 0));   
        }
    }
    else{
        jQuery('#transfer22').val('0');
    }
    if(transfer24 != Infinity){
        if(!isNaN(transfer24)){
            jQuery('#transfer24').val(formatNumber(transfer24, num_grp_sep, dec_sep, 2, 0))
        }  
    }
    jQuery('#tax9').html('Tax '+soluongkh9) ;
    jQuery('#tax10').html('Tax '+soluongkh10) ;
    jQuery('#tax11').html('Tax '+soluongkh11) ;
    jQuery('#tax12').html('Tax '+soluongkh12) ;
}


// tinh chi phí phần transfer cho 13-16 khách có tính foc cho 15 khách trở lên
function transfer1730km(){
    transfer_south = jQuery('#transfer_south').val();
    transfer_south_km6 = parseFloat(unformatNumber(jQuery('#transfer_south_km6').val(),num_grp_sep, dec_sep));
    transfer_middle = jQuery('#transfer_middle').val();
    transfer_middle_km6 = parseFloat(unformatNumber(jQuery('#transfer_middle_km6').val(),num_grp_sep, dec_sep));
    transfer_north = jQuery('#transfer_north').val();
    transfer_north_km6 = parseFloat(unformatNumber(jQuery('#transfer_north_km6').val(),num_grp_sep, dec_sep));
    south_package6 = parseFloat(unformatNumber(jQuery('#south_package6').val(),num_grp_sep, dec_sep));
    middle_package6 = parseFloat(unformatNumber(jQuery('#middle_package6').val(),num_grp_sep, dec_sep));
    north_package6 = parseFloat(unformatNumber(jQuery('#north_package6').val(),num_grp_sep, dec_sep));
    sum = (transfer_south*transfer_south_km6)+(transfer_middle*transfer_middle_km6)+(transfer_north*transfer_north_km6)+south_package6+middle_package6+north_package6;
    soluongkh13 = jQuery('#soluongkh13').val();
    soluongkh14 = jQuery('#soluongkh14').val();
    soluongkh15 = jQuery('#soluongkh15').val();

    transfer25 = Math.round(sum/soluongkh13,2);
    transfer28 =  Math.round(transfer25/11,2);
    if(transfer25 != Infinity){
        if(!isNaN(transfer25)){
            jQuery('#transfer25').val(formatNumber(transfer25, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#transfer25').val('0');
    }
    if(transfer28 != Infinity){
        if(!isNaN(transfer28)){
            jQuery('#transfer28').val(formatNumber(transfer28, num_grp_sep, dec_sep, 2, 0))
        }
    }
    else{
        jQuery('#transfer28').val('0');
    }
    transfer26 = Math.round(sum/soluongkh14,2);
    transfer29 = Math.round(transfer26/11,2);
    if(transfer26 != Infinity){
        if(!isNaN(transfer26)){
            jQuery('#transfer26').val(formatNumber(transfer26, num_grp_sep, dec_sep, 2, 0));   
        } 
    }
    else{
        jQuery('#transfer26').val('0');
    }
    if(transfer29 != Infinity){
        if(!isNaN(transfer29)){
            jQuery('#transfer29').val(formatNumber(transfer29, num_grp_sep, dec_sep, 2, 0))
        }
    }
    else{
        jQuery('#transfer29').val('0');
    }

    transfer27 = Math.round(sum/soluongkh15,2);
    transfer30 = Math.round(transfer27/11,2);
    if(transfer27 != Infinity){
        if(!isNaN(transfer27)){
            jQuery('#transfer27').val(formatNumber(transfer27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#transfer27').val('0');
    }
    if(transfer30 != Infinity){
        if(!isNaN(transfer30)){
            jQuery('#transfer30').val(formatNumber(transfer30,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#transfer30').val('0');
    }

    jQuery('#tax13').html('Tax '+soluongkh13) ;
    jQuery('#tax14').html('Tax '+soluongkh14) ;
    jQuery('#tax15').html('Tax '+soluongkh15) ;
}

// tinh toan chi tiet cho phan guide (huong dan vien)
function calculateGuide(){
    soluongkh1 = jQuery('#soluongkh1').val();
    soluongkh2 = jQuery('#soluongkh2').val();
    soluongkh3 = jQuery('#soluongkh3').val();
    soluongkh4 = jQuery('#soluongkh4').val();
    soluongkh5 = jQuery('#soluongkh5').val();
    soluongkh6 = jQuery('#soluongkh6').val();
    soluongkh7 = jQuery('#soluongkh7').val();
    soluongkh8 = jQuery('#soluongkh8').val();
    soluongkh9 = jQuery('#soluongkh9').val();
    soluongkh10 = jQuery('#soluongkh10').val();
    soluongkh11 = jQuery('#soluongkh11').val();
    soluongkh12 = jQuery('#soluongkh12').val();
    soluongkh13 = jQuery('#soluongkh13').val();
    soluongkh14 = jQuery('#soluongkh14').val();
    soluongkh15 = jQuery('#soluongkh15').val();

    guide_south_price =  parseFloat(unformatNumber(jQuery('#guide_south_price').val(),num_grp_sep, dec_sep));
    guide_south_num =  jQuery('#guide_south_num').val();
    guide_south_money =  Math.round(guide_south_price*guide_south_num,2);
    if(guide_south_money != Infinity){
        if(!isNaN(guide_south_money)){
            jQuery('#guide_south_money').val(formatNumber(guide_south_money, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#guide_south_money').val('0');
    }

    guide_middle_price =  parseFloat(unformatNumber(jQuery('#guide_middle_price').val(),num_grp_sep, dec_sep));
    guide_middle_num =  jQuery('#guide_middle_num').val();
    guide_middle_money =   Math.round(guide_middle_price*guide_middle_num,2);
    if(guide_middle_money != Infinity){
        if(!isNaN(guide_middle_money)){
            jQuery('#guide_middle_money').val(formatNumber(guide_middle_money,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#guide_middle_money').val('0');
    }

    guide_north_price =   parseFloat(unformatNumber(jQuery('#guide_north_price').val(),num_grp_sep, dec_sep));
    guide_north_num =  jQuery('#guide_north_num').val();
    guide_north_money =  Math.round(guide_north_price*guide_north_num,2);
    if(guide_north_money != Infinity){
        if(!isNaN(guide_north_money)){
            jQuery('#guide_north_money').val(formatNumber(guide_north_money, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#guide_north_money').val('0');
    }

    sum =  Math.round(guide_south_money+guide_middle_money+guide_north_money,2);
    if(sum != Infinity){
        if(!isNaN(sum)){
            jQuery('#guide_sum').val(formatNumber(sum, num_grp_sep, dec_sep, 2, 0));
        }
    }
    else{
        jQuery('#guide_sum').val('0');
    }

    guide1 = Math.round(sum/soluongkh1,2);
    if(guide1 != Infinity){
        if(!isNaN(guide1) ){
            jQuery('#guide1').val(formatNumber(guide1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#guide1').val('0');
    }

    guide2 = Math.round(sum/soluongkh2,2);
    if(guide2 != Infinity){
        if(!isNaN(guide2)){
            jQuery('#guide2').val(formatNumber(guide2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#guide2').val('0');
    }
    if(guide3 != Infinity){
        guide3 = Math.round(sum/soluongkh3,2);
        if(!isNaN(guide3)){
            jQuery('#guide3').val(formatNumber(guide3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#guide3').val('0');
    }

    guide4 = Math.round(sum/soluongkh4,2);
    if(guide4 != Infinity){
        if(!isNaN(guide4)){
            jQuery('#guide4').val(formatNumber(guide4,num_grp_sep,dec_sep,2,0));
        }  
    }
    else{
        jQuery('#guide4').val('0');
    }


    guide5 = Math.round(sum/soluongkh5,2);
    if(guide5 != Infinity){
        if(!isNaN(guide5)){
            jQuery('#guide5').val(formatNumber(guide5,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#guide5').val('0');
    }

    guide6 = Math.round(sum/soluongkh6,2);
    if(guide6 != Infinity){
        if(!isNaN(guide6)){
            jQuery('#guide6').val(formatNumber(guide6,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#guide6').val('0');
    }

    guide7 = Math.round(sum/soluongkh7,2);
    if(guide7 != Infinity){
        if(!isNaN(guide7)){
            jQuery('#guide7').val(formatNumber(guide7,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#guide7').val('0');
    }


    guide8 = Math.round(sum/soluongkh8,2);
    if(guide8 != Infinity){
        if(!isNaN(guide8)){
            jQuery('#guide8').val(formatNumber(guide8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#guide8').val('0');
    }

    guide9 = Math.round(sum/soluongkh9,2);
    if(guide9 != Infinity){
        if(!isNaN(guide9)){
            jQuery('#guide9').val(formatNumber(guide9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#guide9').val('0');
    }

    guide10 = Math.round(sum/soluongkh10,2);
    if(guide10 != Infinity){
        if(!isNaN(guide10)){
            jQuery('#guide10').val(formatNumber(guide10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#guide10').val('0') ;
    }

    guide11 = Math.round(sum/soluongkh11,2);
    if(guide11 != Infinity){
        if(!isNaN(guide11)){
            jQuery('#guide11').val(formatNumber(guide11,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#guide11').val('0');
    }

    guide12 = Math.round(sum/soluongkh12,2);
    if(guide12 != Infinity){
        if(!isNaN(guide12)){
            jQuery('#guide12').val(formatNumber(guide12,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#guide12').val('0');
    }


    guide13 = Math.round(sum/soluongkh13,2);
    if(guide13 != Infinity){
        if(!isNaN(guide13)){
            jQuery('#guide13').val(formatNumber(guide13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#guide13').val('0');
    }


    guide14 = Math.round(sum/soluongkh14,2);
    if(guide14 != Infinity){
        if(!isNaN(guide14)){
            jQuery('#guide14').val(formatNumber(guide14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#guide14').val('0');
    }

    guide15 = Math.round(sum/soluongkh15,2);
    if(guide15 != Infinity){
        if(!isNaN(guide15)){
            jQuery('#guide15').val(formatNumber(guide15,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#guide15').val('0');
    }

}
// begin meal1
function calculateMeal1South(){
    meal1_south_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal1_south_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal1_south_breakfirst_num = jQuery('#meal1_south_breakfirst_num').val();
    meal1_south_breakfirst_money = Math.round(meal1_south_breakfirst_price*meal1_south_breakfirst_num,2);
    if(meal1_south_breakfirst_money != Infinity){
        if(!isNaN(meal1_south_breakfirst_money)){
            jQuery('#meal1_south_breakfirst_money').val(formatNumber(meal1_south_breakfirst_money,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal1_south_breakfirst_money').val('0');
    }

    meal1_south_lunch_price = parseFloat(unformatNumber(jQuery('#meal1_south_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal1_south_lunch_num = jQuery('#meal1_south_lunch_num').val();

    meal1_south_lunch_money = Math.round(meal1_south_lunch_price*meal1_south_lunch_num,2);
    if(meal1_south_lunch_money != Infinity){
        if(!isNaN(meal1_south_lunch_money)){
            jQuery('#meal1_south_lunch_money').val(formatNumber(meal1_south_lunch_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_south_lunch_money').val('0');
    }

    meal1_south_dinner_price = parseFloat(unformatNumber(jQuery('#meal1_south_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal1_south_dinner_num = jQuery('#meal1_south_dinner_num').val();

    meal1_south_dinner_money = Math.round(meal1_south_dinner_price*meal1_south_dinner_num,2);
    if(meal1_south_dinner_money != Infinity){
        if(!isNaN(meal1_south_dinner_money)){
            jQuery('#meal1_south_dinner_money').val(formatNumber(meal1_south_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_south_dinner_money').val('0');
    }


    meal1_south_other_price = parseFloat(unformatNumber(jQuery('#meal1_south_other_price').val(),num_grp_sep,dec_sep)); 
    meal1_south_other_num = jQuery('#meal1_south_other_num').val();

    meal1_south_other_money = Math.round(meal1_south_other_price*meal1_south_other_num,2);
    if(meal1_south_other_money != Infinity){
        if(!isNaN(meal1_south_other_money)){
            jQuery('#meal1_south_other_money').val(formatNumber(meal1_south_other_money,num_grp_sep,dec_sep,2,0));
        }
    }

    else{
        jQuery('#meal1_south_other_money').val('0');
    }

    meal1_south_sum = Math.round(meal1_south_other_money+meal1_south_dinner_money+meal1_south_lunch_money+meal1_south_breakfirst_money,2);
    if( meal1_south_sum != Infinity){
        if(!isNaN(meal1_south_sum)){
            jQuery('#meal1_south_sum').val(formatNumber(meal1_south_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal1_south1,#meal1_south2,#meal1_south5,#meal1_south6,#meal1_south9,#meal1_south10,#meal1_south13,#meal1_south14,#meal1_south17,#meal1_south18,#meal1_south21,#meal1_south22,#meal1_south25,#meal1_south26,#meal1_south27').val(formatNumber(meal1_south_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_south_sum').val('0');
        jQuery('#meal1_south1,#meal1_south2,#meal1_south5,#meal1_south6,#meal1_south9,#meal1_south10,#meal1_south13,#meal1_south14,#meal1_south17,#meal1_south18,#meal1_south21,#meal1_south22,#meal1_south25,#meal1_south26,#meal1_south27').val('0');
    }

    tax = Math.round(meal1_south_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal1_south3,#meal1_south4,#meal1_south7,#meal1_south8,#meal1_south11,#meal1_south12,#meal1_south15,#meal1_south16,#meal1_south19,#meal1_south20,#meal1_south23,#meal1_south24,#meal1_south28,#meal1_south29,#meal1_south30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_south3,#meal1_south4,#meal1_south7,#meal1_south8,#meal1_south11,#meal1_south12,#meal1_south15,#meal1_south16,#meal1_south19,#meal1_south20,#meal1_south23,#meal1_south24,#meal1_south28,#meal1_south29,#meal1_south30').val('0');
    }

}

function calculateMeal1Middle(){
    meal1_middle_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal1_middle_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal1_middle_breakfirst_num = jQuery('#meal1_middle_breakfirst_num').val();
    meal1_middle_breakfirst_money = Math.round(meal1_middle_breakfirst_price*meal1_middle_breakfirst_num,2);
    if(meal1_middle_breakfirst_money != Infinity){
        if(!isNaN(meal1_middle_breakfirst_money)){
            jQuery('#meal1_middle_breakfirst_money').val(formatNumber(meal1_middle_breakfirst_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_middle_breakfirst_money').val('0');
    }

    meal1_middle_lunch_price = parseFloat(unformatNumber(jQuery('#meal1_middle_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal1_middle_lunch_num = jQuery('#meal1_middle_lunch_num').val();

    meal1_middle_lunch_money = Math.round(meal1_middle_lunch_price*meal1_middle_lunch_num,2);
    if(meal1_middle_lunch_money != Infinity){
        if(!isNaN(meal1_middle_lunch_money)){
            jQuery('#meal1_middle_lunch_money').val(formatNumber(meal1_middle_lunch_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_middle_lunch_money').val('0');
    }

    meal1_middle_dinner_price = parseFloat(unformatNumber(jQuery('#meal1_middle_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal1_middle_dinner_num = jQuery('#meal1_middle_dinner_num').val();

    meal1_middle_dinner_money = Math.round(meal1_middle_dinner_price*meal1_middle_dinner_num,2);
    if(meal1_middle_dinner_money != Infinity){
        if(!isNaN(meal1_middle_dinner_money)){
            jQuery('#meal1_middle_dinner_money').val(formatNumber(meal1_middle_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_middle_dinner_money').val('0');
    }

    meal1_middle_other_price = parseFloat(unformatNumber(jQuery('#meal1_middle_other_price').val(),num_grp_sep,dec_sep)); 
    meal1_middle_other_num = jQuery('#meal1_middle_other_num').val();

    meal1_middle_other_money = Math.round(meal1_middle_other_price*meal1_middle_other_num,2);
    if(meal1_middle_other_money != Infinity){
        if(!isNaN(meal1_middle_other_money)){
            jQuery('#meal1_middle_other_money').val(formatNumber(meal1_middle_other_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_middle_other_money').val('0');
    }


    meal1_miidle_sum = Math.round(meal1_middle_other_money+meal1_middle_dinner_money+meal1_middle_lunch_money+meal1_middle_breakfirst_money,2);
    if(meal1_miidle_sum != Infinity){
        if(!isNaN(meal1_miidle_sum)){
            jQuery('#meal1_miidle_sum').val(formatNumber(meal1_miidle_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal1_middle1,#meal1_middle2,#meal1_middle5,#meal1_middle6,#meal1_middle9,#meal1_middle10,#meal1_middle13,#meal1_middle14,#meal1_middle17,#meal1_middle18,#meal1_middle21,#meal1_middle22,#meal1_middle25,#meal1_middle26,#meal1_middle27').val('0');
        }
    }
    else{
        jQuery('#meal1_miidle_sum').val(formatNumber(meal1_miidle_sum,num_grp_sep,dec_sep,2,0));
        jQuery('#meal1_middle1,#meal1_middle2,#meal1_middle5,#meal1_middle6,#meal1_middle9,#meal1_middle10,#meal1_middle13,#meal1_middle14,#meal1_middle17,#meal1_middle18,#meal1_middle21,#meal1_middle22,#meal1_middle25,#meal1_middle26,#meal1_middle27').val('0'); 
    }

    tax = Math.round(meal1_miidle_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal1_middle3,#meal1_middle4,#meal1_middle7,#meal1_middle8,#meal1_middle11,#meal1_middle12,#meal1_middle15,#meal1_middle16,#meal1_middle19,#meal1_middle20,#meal1_middle23,#meal1_middle24,#meal1_middle28,#meal1_middle29,#meal1_middle30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal1_middle3,#meal1_middle4,#meal1_middle7,#meal1_middle8,#meal1_middle11,#meal1_middle12,#meal1_middle15,#meal1_middle16,#meal1_middle19,#meal1_middle20,#meal1_middle23,#meal1_middle24,#meal1_middle28,#meal1_middle29,#meal1_middle30').val('0');
    }

}

function calculateMeal1North(){
    meal1_north_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal1_north_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal1_north_breakfirst_num = jQuery('#meal1_north_breakfirst_num').val();
    meal1_north_breakfirst_money = Math.round(meal1_north_breakfirst_price*meal1_north_breakfirst_num,2);
    if(meal1_north_breakfirst_money != Infinity){
        if(!isNaN(meal1_north_breakfirst_money)){
            jQuery('#meal1_north_breakfirst_money').val(formatNumber(meal1_north_breakfirst_money,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal1_north_breakfirst_money').val('0');
    }

    meal1_north_lunch_price = parseFloat(unformatNumber(jQuery('#meal1_north_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal1_north_lunch_num = jQuery('#meal1_north_lunch_num').val();

    meal1_north_lunch_money = Math.round(meal1_north_lunch_price*meal1_north_lunch_num,2);
    if(meal1_north_lunch_money != Infinity){
        if(!isNaN(meal1_north_lunch_money)){
            jQuery('#meal1_north_lunch_money').val(formatNumber(meal1_north_lunch_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_north_lunch_money').val('0');
    }

    meal1_north_dinner_price = parseFloat(unformatNumber(jQuery('#meal1_north_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal1_north_dinner_num = jQuery('#meal1_north_dinner_num').val();

    meal1_north_dinner_money = Math.round(meal1_north_dinner_price*meal1_north_dinner_num,2);
    if(meal1_north_dinner_money != Infinity){
        if(!isNaN(meal1_north_dinner_money)){
            jQuery('#meal1_north_dinner_money').val(formatNumber(meal1_north_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_north_dinner_money').val('0');
    }


    meal1_north_other_price = parseFloat(unformatNumber(jQuery('#meal1_north_other_price').val(),num_grp_sep,dec_sep)); 
    meal1_north_other_num = jQuery('#meal1_north_other_num').val();

    meal1_north_other_money = Math.round(meal1_north_other_price*meal1_north_other_num,2);
    if(meal1_north_other_money != Infinity){
        if(!isNaN(meal1_north_other_money)){
            jQuery('#meal1_north_other_money').val(formatNumber(meal1_north_other_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_north_other_money').val('0');
    }


    meal1_north_sum = Math.round(meal1_north_other_money+meal1_north_dinner_money+meal1_north_lunch_money+meal1_north_breakfirst_money,2);
    if(meal1_north_sum != Infinity){
        if(!isNaN(meal1_north_sum)){
            jQuery('#meal1_north_sum').val(formatNumber(meal1_north_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal1_north1,#meal1_north2,#meal1_north5,#meal1_north6,#meal1_north9,#meal1_north10,#meal1_north13,#meal1_north14,#meal1_north17,#meal1_north18,#meal1_north21,#meal1_north22,#meal1_north25,#meal1_north26,#meal1_north27').val(formatNumber(meal1_north_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_north_sum').val('0');
        jQuery('#meal1_north1,#meal1_north2,#meal1_north5,#meal1_north6,#meal1_north9,#meal1_north10,#meal1_north13,#meal1_north14,#meal1_north17,#meal1_north18,#meal1_north21,#meal1_north22,#meal1_north25,#meal1_north26,#meal1_north27').val('0');
    }

    tax = Math.round(meal1_north_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal1_north3,#meal1_north4,#meal1_north7,#meal1_north8,#meal1_north11,#meal1_north12,#meal1_north15,#meal1_north16,#meal1_north19,#meal1_north20,#meal1_north23,#meal1_north24,#meal1_north28,#meal1_north29,#meal1_north30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal1_north3,#meal1_north4,#meal1_north7,#meal1_north8,#meal1_north11,#meal1_north12,#meal1_north15,#meal1_north16,#meal1_north19,#meal1_north20,#meal1_north23,#meal1_north24,#meal1_north28,#meal1_north29,#meal1_north30').val('0');
    }

} 

// end Meal1


// begin meal2
function calculateMeal2South(){
    meal2_south_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal2_south_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal2_south_breakfirst_num = jQuery('#meal2_south_breakfirst_num').val();
    meal2_south_breakfirst_money = Math.round(meal2_south_breakfirst_price*meal2_south_breakfirst_num,2);
    if(meal2_south_breakfirst_money != Infinity){
        if(!isNaN(meal2_south_breakfirst_money)){
            jQuery('#meal2_south_breakfirst_money').val(formatNumber(meal2_south_breakfirst_money,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal2_south_breakfirst_money').val('0');
    }

    meal2_south_lunch_price = parseFloat(unformatNumber(jQuery('#meal2_south_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal2_south_lunch_num = jQuery('#meal2_south_lunch_num').val();

    meal2_south_lunch_money = Math.round(meal2_south_lunch_price*meal2_south_lunch_num,2);
    if(meal2_south_lunch_money != Infinity){
        if(!isNaN(meal2_south_lunch_money) ){
            jQuery('#meal2_south_lunch_money').val(formatNumber(meal2_south_lunch_money,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal2_south_lunch_money').val('0') ;
    }

    meal2_south_dinner_price = parseFloat(unformatNumber(jQuery('#meal2_south_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal2_south_dinner_num = jQuery('#meal2_south_dinner_num').val();

    meal2_south_dinner_money = Math.round(meal2_south_dinner_price*meal2_south_dinner_num,2);
    if(meal2_south_dinner_money != Infinity){
        if(!isNaN(meal2_south_dinner_money)){
            jQuery('#meal2_south_dinner_money').val(formatNumber(meal2_south_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_south_dinner_money').val('0');
    }


    meal2_south_other_price = parseFloat(unformatNumber(jQuery('#meal2_south_other_price').val(),num_grp_sep,dec_sep)); 
    meal2_south_other_num = jQuery('#meal2_south_other_num').val();

    meal2_south_other_money = Math.round(meal2_south_other_price*meal2_south_other_num,2);
    if(meal2_south_other_money != Infinity){
        if(!isNaN(meal2_south_other_money)){
            jQuery('#meal2_south_other_money').val(formatNumber(meal2_south_other_money,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal2_south_other_money').val('0');
    }


    meal2_south_sum = Math.round(meal2_south_other_money+meal2_south_dinner_money+meal2_south_lunch_money+meal2_south_breakfirst_money,2);
    if(meal2_south_sum != Infinity){
        if(!isNaN(meal2_south_sum)){
            jQuery('#meal2_south_sum').val(formatNumber(meal2_south_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal2_south1,#meal2_south2,#meal2_south5,#meal2_south6,#meal2_south9,#meal2_south10,#meal2_south13,#meal2_south14,#meal2_south17,#meal2_south18,#meal2_south21,#meal2_south22,#meal2_south25,#meal2_south26,#meal2_south27').val(formatNumber(meal2_south_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_south_sum').val('0');
        jQuery('#meal2_south1,#meal2_south2,#meal2_south5,#meal2_south6,#meal2_south9,#meal2_south10,#meal2_south13,#meal2_south14,#meal2_south17,#meal2_south18,#meal2_south21,#meal2_south22,#meal2_south25,#meal2_south26,#meal2_south27').val('0');
    }

    tax = Math.round(meal2_south_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal2_south3,#meal2_south4,#meal2_south7,#meal2_south8,#meal2_south11,#meal2_south12,#meal2_south15,#meal2_south16,#meal2_south19,#meal2_south20,#meal2_south23,#meal2_south24,#meal2_south28,#meal2_south29,#meal2_south30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_south3,#meal2_south4,#meal2_south7,#meal2_south8,#meal2_south11,#meal2_south12,#meal2_south15,#meal2_south16,#meal2_south19,#meal2_south20,#meal2_south23,#meal2_south24,#meal2_south28,#meal2_south29,#meal2_south30').val('0');
    }


}

function calculateMeal2Middle(){
    meal2_middle_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal2_middle_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal2_middle_breakfirst_num = jQuery('#meal2_middle_breakfirst_num').val();
    meal2_middle_breakfirst_money = Math.round(meal2_middle_breakfirst_price*meal2_middle_breakfirst_num,2);
    if(meal2_middle_breakfirst_money != Infinity){
        if(!isNaN(meal2_middle_breakfirst_money)){
            jQuery('#meal2_middle_breakfirst_money').val(formatNumber(meal2_middle_breakfirst_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_middle_breakfirst_money').val('0');
    }

    meal2_middle_lunch_price = parseFloat(unformatNumber(jQuery('#meal2_middle_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal2_middle_lunch_num = jQuery('#meal2_middle_lunch_num').val();

    meal2_middle_lunch_money = Math.round(meal2_middle_lunch_price*meal2_middle_lunch_num,2);
    if(meal2_middle_lunch_money != Infinity){
        if(!isNaN(meal2_middle_lunch_money)){
            jQuery('#meal2_middle_lunch_money').val(formatNumber(meal2_middle_lunch_money,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal2_middle_lunch_money').val('0');
    }

    meal2_middle_dinner_price = parseFloat(unformatNumber(jQuery('#meal2_middle_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal2_middle_dinner_num = jQuery('#meal2_middle_dinner_num').val();

    meal2_middle_dinner_money = Math.round(meal2_middle_dinner_price*meal2_middle_dinner_num,2);
    if(meal2_middle_dinner_money != Infinity){
        if(!isNaN(meal2_middle_dinner_money)){
            jQuery('#meal2_middle_dinner_money').val(formatNumber(meal2_middle_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_middle_dinner_money').val('0');
    }
    meal2_middle_other_price = parseFloat(unformatNumber(jQuery('#meal2_middle_other_price').val(),num_grp_sep,dec_sep)); 
    meal2_middle_other_num = jQuery('#meal2_middle_other_num').val();

    meal2_middle_other_money = Math.round(meal2_middle_other_price*meal1_middle_other_num,2);
    if(meal2_middle_other_money != Infinity){
        if(!isNaN(meal2_middle_other_money)){
            jQuery('#meal2_middle_other_money').val(formatNumber(meal2_middle_other_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_middle_other_money').val('0');
    }

    meal2_middle_sum = Math.round(meal2_middle_other_money+meal2_middle_dinner_money+meal2_middle_lunch_money+meal2_middle_breakfirst_money,2);
    if(meal2_middle_sum != Infinity){
        if(!isNaN(meal2_middle_sum)){
            jQuery('#meal2_miidle_sum').val(formatNumber(meal2_middle_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal2_middle1,#meal2_middle2,#meal2_middle5,#meal2_middle6,#meal2_middle9,#meal2_middle10,#meal2_middle13,#meal2_middle14,#meal2_middle17,#meal2_middle18,#meal2_middle21,#meal2_middle22,#meal2_middle25,#meal2_middle26,#meal2_middle27').val(formatNumber(meal2_middle_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_miidle_sum').val('0');
        jQuery('#meal2_middle1,#meal2_middle2,#meal2_middle5,#meal2_middle6,#meal2_middle9,#meal2_middle10,#meal2_middle13,#meal2_middle14,#meal2_middle17,#meal2_middle18,#meal2_middle21,#meal2_middle22,#meal2_middle25,#meal2_middle26,#meal2_middle27').val('0');
    }

    tax = Math.round(meal2_middle_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal2_middle3,#meal2_middle4,#meal2_middle7,#meal2_middle8,#meal2_middle11,#meal2_middle12,#meal2_middle15,#meal2_middle16,#meal2_middle19,#meal2_middle20,#meal2_middle23,#meal2_middle24,#meal2_middle28,#meal2_middle29,#meal2_middle30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_middle3,#meal2_middle4,#meal2_middle7,#meal2_middle8,#meal2_middle11,#meal2_middle12,#meal2_middle15,#meal2_middle16,#meal2_middle19,#meal2_middle20,#meal2_middle23,#meal2_middle24,#meal2_middle28,#meal2_middle29,#meal2_middle30').val('0');
    }

}

function calculateMeal2North(){
    meal2_north_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal2_north_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal2_north_breakfirst_num = jQuery('#meal2_north_breakfirst_num').val();
    meal2_north_breakfirst_money = Math.round(meal2_north_breakfirst_price*meal2_north_breakfirst_num,2);
    if(meal2_north_breakfirst_money != Infinity){
        if(!isNaN(meal2_north_breakfirst_money)){
            jQuery('#meal2_north_breakfirst_money').val(formatNumber(meal2_north_breakfirst_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_north_breakfirst_money').val('0');
    }

    meal2_north_lunch_price = parseFloat(unformatNumber(jQuery('#meal2_north_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal2_north_lunch_num = jQuery('#meal2_north_lunch_num').val();

    meal2_north_lunch_money = Math.round(meal2_north_lunch_price*meal2_north_lunch_num,2);
    if(meal2_north_lunch_money != Infinity){
        if(!isNaN(meal2_north_lunch_money)){
            jQuery('#meal2_north_lunch_money').val(formatNumber(meal2_north_lunch_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_north_lunch_money').val('0');
    }

    meal2_north_dinner_price = parseFloat(unformatNumber(jQuery('#meal2_north_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal2_north_dinner_num = jQuery('#meal2_north_dinner_num').val();

    meal2_north_dinner_money = Math.round(meal2_north_dinner_price*meal2_north_dinner_num,2);
    if(meal2_north_dinner_money != Infinity){
        if(!isNaN(meal2_north_dinner_money) ){
            jQuery('#meal2_north_dinner_money').val(formatNumber(meal2_north_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_north_dinner_money').val('0');
    }


    meal2_north_other_price = parseFloat(unformatNumber(jQuery('#meal2_north_other_price').val(),num_grp_sep,dec_sep)); 
    meal2_north_other_num = jQuery('#meal2_north_other_num').val();

    meal2_north_other_money = Math.round(meal2_north_other_price*meal2_north_other_num,2);
    if(meal2_north_other_money != Infinity){
        if(!isNaN(meal2_north_other_money)){
            jQuery('#meal2_north_other_money').val(formatNumber(meal2_north_other_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_north_other_money').val('0');
    }


    meal2_north_sum = Math.round(meal2_north_other_money+meal2_north_dinner_money+meal2_north_lunch_money+meal2_north_breakfirst_money,2);
    if(meal2_north_sum != Infinity){
        if(!isNaN(meal2_north_sum)){
            jQuery('#meal2_north_sum').val(formatNumber(meal2_north_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal2_north1,#meal2_north2,#meal2_north5,#meal2_north6,#meal2_north9,#meal2_north10,#meal2_north13,#meal2_north14,#meal2_north17,#meal2_north18,#meal2_north21,#meal2_north22,#meal2_north25,#meal2_north26,#meal2_north27').val(formatNumber(meal2_north_sum,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal2_north_sum').val('0');
        jQuery('#meal2_north1,#meal2_north2,#meal2_north5,#meal2_north6,#meal2_north9,#meal2_north10,#meal2_north13,#meal2_north14,#meal2_north17,#meal2_north18,#meal2_north21,#meal2_north22,#meal2_north25,#meal2_north26,#meal2_north27').val('0');
    }

    tax = Math.round(meal2_north_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal2_north3,#meal2_north4,#meal2_north7,#meal2_north8,#meal2_north11,#meal2_north12,#meal2_north15,#meal2_north16,#meal2_north19,#meal2_north20,#meal2_north23,#meal2_north24,#meal2_north28,#meal2_north29,#meal2_north30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_north3,#meal2_north4,#meal2_north7,#meal2_north8,#meal2_north11,#meal2_north12,#meal2_north15,#meal2_north16,#meal2_north19,#meal2_north20,#meal2_north23,#meal2_north24,#meal2_north28,#meal2_north29,#meal2_north30').val('0');
    }

} 

// end Meal2

// begin meal 3
function calculateMeal3South(){
    meal3_south_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal3_south_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal3_south_breakfirst_num = jQuery('#meal3_south_breakfirst_num').val();
    meal3_south_breakfirst_money = Math.round(meal3_south_breakfirst_price*meal3_south_breakfirst_num,2);
    if(meal3_south_breakfirst_money != Infinity){
        if(!isNaN(meal3_south_breakfirst_money)){
            jQuery('#meal3_south_breakfirst_money').val(formatNumber(meal3_south_breakfirst_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_south_breakfirst_money').val('0');
    }

    meal3_south_lunch_price = parseFloat(unformatNumber(jQuery('#meal3_south_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal3_south_lunch_num = jQuery('#meal3_south_lunch_num').val();

    meal3_south_lunch_money = Math.round(meal3_south_lunch_price*meal3_south_lunch_num,2);
    if(meal3_south_lunch_money != Infinity){
        if(!isNaN(meal3_south_lunch_money)){
            jQuery('#meal3_south_lunch_money').val(formatNumber(meal3_south_lunch_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_south_lunch_money').val('0');
    }

    meal3_south_dinner_price = parseFloat(unformatNumber(jQuery('#meal3_south_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal3_south_dinner_num = jQuery('#meal3_south_dinner_num').val();

    meal3_south_dinner_money = Math.round(meal3_south_dinner_price*meal3_south_dinner_num,2);
    if(meal3_south_dinner_money != Infinity){
        if(!isNaN(meal3_south_dinner_money)){
            jQuery('#meal3_south_dinner_money').val(formatNumber(meal3_south_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_south_dinner_money').val('0');
    }


    meal3_south_other_price = parseFloat(unformatNumber(jQuery('#meal3_south_other_price').val(),num_grp_sep,dec_sep)); 
    meal3_south_other_num = jQuery('#meal3_south_other_num').val();

    meal3_south_other_money = Math.round(meal3_south_other_price*meal2_south_other_num,2);
    if(meal2_south_other_money != Infinity){
        if(!isNaN(meal3_south_other_money)){
            jQuery('#meal3_south_other_money').val(formatNumber(meal3_south_other_money,num_grp_sep,dec_sep,2,0));
        }  
    }
    else{
        jQuery('#meal3_south_other_money').val('0');
    }

    meal3_south_sum = Math.round(meal3_south_other_money+meal3_south_dinner_money+meal3_south_lunch_money+meal3_south_breakfirst_money,2);
    if( meal3_south_sum != Infinity){
        if(!isNaN(meal3_south_sum)){
            jQuery('#meal3_south_sum').val(formatNumber(meal3_south_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal3_south1,#meal3_south2,#meal3_south5,#meal3_south6,#meal3_south9,#meal3_south10,#meal3_south13,#meal3_south14,#meal3_south17,#meal3_south18,#meal3_south21,#meal3_south22,#meal3_south25,#meal3_south26,#meal3_south27').val(formatNumber(meal3_south_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_south_sum').val('0');
        jQuery('#meal3_south1,#meal3_south2,#meal3_south5,#meal3_south6,#meal3_south9,#meal3_south10,#meal3_south13,#meal3_south14,#meal3_south17,#meal3_south18,#meal3_south21,#meal3_south22,#meal3_south25,#meal3_south26,#meal3_south27').val('0');
    }

    tax = Math.round(meal3_south_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal3_south3,#meal3_south4,#meal3_south7,#meal3_south8,#meal3_south11,#meal3_south12,#meal3_south15,#meal3_south16,#meal3_south19,#meal3_south20,#meal3_south23,#meal3_south24,#meal3_south28,#meal3_south29,#meal3_south30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_south3,#meal3_south4,#meal3_south7,#meal3_south8,#meal3_south11,#meal3_south12,#meal3_south15,#meal3_south16,#meal3_south19,#meal3_south20,#meal3_south23,#meal3_south24,#meal3_south28,#meal3_south29,#meal3_south30').val('0');
    }

}

function calculateMeal3Middle(){
    meal3_middle_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal3_middle_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal3_middle_breakfirst_num = jQuery('#meal3_middle_breakfirst_num').val();
    meal3_middle_breakfirst_money = Math.round(meal3_middle_breakfirst_price*meal3_middle_breakfirst_num,2);
    if(meal3_middle_breakfirst_money != Infinity){
        if(!isNaN(meal3_middle_breakfirst_money)){
            jQuery('#meal3_middle_breakfirst_money').val(formatNumber(meal3_middle_breakfirst_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_middle_breakfirst_money').val('0');
    }
    meal3_middle_lunch_price = parseFloat(unformatNumber(jQuery('#meal3_middle_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal3_middle_lunch_num = jQuery('#meal3_middle_lunch_num').val();

    meal3_middle_lunch_money = Math.round(meal3_middle_lunch_price*meal3_middle_lunch_num,2);
    if(meal3_middle_lunch_money != Infinity){
        if(!isNaN(meal3_middle_lunch_money)){
            jQuery('#meal3_middle_lunch_money').val(formatNumber(meal3_middle_lunch_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_middle_lunch_money').val('0');
    }
    meal3_middle_dinner_price = parseFloat(unformatNumber(jQuery('#meal3_middle_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal3_middle_dinner_num = jQuery('#meal3_middle_dinner_num').val();

    meal3_middle_dinner_money = Math.round(meal3_middle_dinner_price*meal3_middle_dinner_num,2);
    if(meal3_middle_dinner_money != Infinity){
        if(!isNaN(meal3_middle_dinner_money)){
            jQuery('#meal3_middle_dinner_money').val(formatNumber(meal3_middle_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_middle_dinner_money').val('0');
    }

    meal3_middle_other_price = parseFloat(unformatNumber(jQuery('#meal3_middle_other_price').val(),num_grp_sep,dec_sep)); 
    meal3_middle_other_num = jQuery('#meal3_middle_other_num').val();

    meal3_middle_other_money = Math.round(meal3_middle_other_price*meal3_middle_other_num,2);
    if(meal3_middle_other_money != Infinity){
        if(!isNaN(meal3_middle_other_money)){
            jQuery('#meal2_middle_other_money').val(formatNumber(meal3_middle_other_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal2_middle_other_money').val('0');
    }


    meal3_middle_sum = Math.round(meal3_middle_other_money+meal3_middle_dinner_money+meal3_middle_lunch_money+meal3_middle_breakfirst_money,2);
    if(meal3_middle_sum != Infinity){
        if(!isNaN(meal3_middle_sum)){
            jQuery('#meal3_miidle_sum').val(formatNumber(meal3_middle_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal3_middle1,#meal3_middle2,#meal3_middle5,#meal3_middle6,#meal3_middle9,#meal3_middle10,#meal3_middle13,#meal3_middle14,#meal3_middle17,#meal3_middle18,#meal3_middle21,#meal3_middle22,#meal3_middle25,#meal3_middle26,#meal3_middle27').val(formatNumber(meal3_middle_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_miidle_sum').val('0');
        jQuery('#meal3_middle1,#meal3_middle2,#meal3_middle5,#meal3_middle6,#meal3_middle9,#meal3_middle10,#meal3_middle13,#meal3_middle14,#meal3_middle17,#meal3_middle18,#meal3_middle21,#meal3_middle22,#meal3_middle25,#meal3_middle26,#meal3_middle27').val('0'); 
    }
    tax = Math.round(meal3_middle_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal3_middle3,#meal3_middle4,#meal3_middle7,#meal3_middle8,#meal3_middle11,#meal3_middle12,#meal3_middle15,#meal3_middle16,#meal3_middle19,#meal3_middle20,#meal3_middle23,#meal3_middle24,#meal3_middle28,#meal3_middle29,#meal3_middle30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_middle3,#meal3_middle4,#meal3_middle7,#meal3_middle8,#meal3_middle11,#meal3_middle12,#meal3_middle15,#meal3_middle16,#meal3_middle19,#meal3_middle20,#meal3_middle23,#meal3_middle24,#meal3_middle28,#meal3_middle29,#meal3_middle30').val('0');
    }

}

function calculateMeal3North(){
    meal3_north_breakfirst_price = parseFloat(unformatNumber(jQuery('#meal3_north_breakfirst_price').val(),num_grp_sep,dec_sep));
    meal3_north_breakfirst_num = jQuery('#meal3_north_breakfirst_num').val();
    meal3_north_breakfirst_money = Math.round(meal3_north_breakfirst_price*meal3_north_breakfirst_num,2);
    if(meal3_north_breakfirst_money != Infinity){
        if(!isNaN(meal3_north_breakfirst_money)){
            jQuery('#meal3_north_breakfirst_money').val(formatNumber(meal3_north_breakfirst_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_north_breakfirst_money').val('0');
    }

    meal3_north_lunch_price = parseFloat(unformatNumber(jQuery('#meal3_north_lunch_price').val(),num_grp_sep,dec_sep)); 
    meal3_north_lunch_num = jQuery('#meal3_north_lunch_num').val();

    meal3_north_lunch_money = Math.round(meal3_north_lunch_price*meal3_north_lunch_num,2);
    if(meal3_north_lunch_money != Infinity){
        if(!isNaN(meal3_north_lunch_money)){
            jQuery('#meal3_north_lunch_money').val(formatNumber(meal3_north_lunch_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_north_lunch_money').val('0');
    }

    meal3_north_dinner_price = parseFloat(unformatNumber(jQuery('#meal3_north_dinner_price').val(),num_grp_sep,dec_sep)); 
    meal3_north_dinner_num = jQuery('#meal3_north_dinner_num').val();

    meal3_north_dinner_money = Math.round(meal3_north_dinner_price*meal3_north_dinner_num,2);
    if(meal3_north_dinner_money != Infinity){
        if(!isNaN(meal3_north_dinner_money)){
            jQuery('#meal3_north_dinner_money').val(formatNumber(meal3_north_dinner_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_north_dinner_money').val('0');
    }


    meal3_north_other_price = parseFloat(unformatNumber(jQuery('#meal3_north_other_price').val(),num_grp_sep,dec_sep)); 
    meal3_north_other_num = jQuery('#meal3_north_other_num').val();

    meal3_north_other_money = Math.round(meal3_north_other_price*meal3_north_other_num,2);
    if(meal3_north_other_money != Infinity){
        if(!isNaN(meal3_north_other_money)){
            jQuery('#meal3_north_other_money').val(formatNumber(meal3_north_other_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_north_other_money').val('0');
    }

    meal3_north_sum = Math.round(meal3_north_other_money+meal3_north_dinner_money+meal3_north_lunch_money+meal3_north_breakfirst_money,2);
    if(meal3_north_sum != Infinity){
        if(!isNaN(meal3_north_sum)){
            jQuery('#meal3_north_sum').val(formatNumber(meal3_north_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#meal3_north1,#meal3_north2,#meal3_north5,#meal3_north6,#meal3_north9,#meal3_north10,#meal3_north13,#meal3_north14,#meal3_north17,#meal3_north18,#meal3_north21,#meal3_north22,#meal3_north25,#meal3_north26,#meal3_north27').val(formatNumber(meal3_north_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_north_sum').val('0');
        jQuery('#meal3_north1,#meal3_north2,#meal3_north5,#meal3_north6,#meal3_north9,#meal3_north10,#meal3_north13,#meal3_north14,#meal3_north17,#meal3_north18,#meal3_north21,#meal3_north22,#meal3_north25,#meal3_north26,#meal3_north27').val('0');
    }
    tax = Math.round(meal3_north_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal3_north3,#meal3_north4,#meal3_north7,#meal3_north8,#meal3_north11,#meal3_north12,#meal3_north15,#meal3_north16,#meal3_north19,#meal3_north20,#meal3_north23,#meal3_north24,#meal3_north28,#meal3_north29,#meal3_north30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#meal3_north3,#meal3_north4,#meal3_north7,#meal3_north8,#meal3_north11,#meal3_north12,#meal3_north15,#meal3_north16,#meal3_north19,#meal3_north20,#meal3_north23,#meal3_north24,#meal3_north28,#meal3_north29,#meal3_north30').val('0');
    }

} 
// end Meal 3

function calculateBoatPrice(){

    soluongkh1 = jQuery('#soluongkh1').val();
    soluongkh2 = jQuery('#soluongkh2').val();
    soluongkh3 = jQuery('#soluongkh3').val();
    soluongkh4 = jQuery('#soluongkh4').val();
    soluongkh5 = jQuery('#soluongkh5').val();
    soluongkh6 = jQuery('#soluongkh6').val();
    soluongkh7 = jQuery('#soluongkh7').val();
    soluongkh8 = jQuery('#soluongkh8').val();
    soluongkh9 = jQuery('#soluongkh9').val();
    soluongkh10 = jQuery('#soluongkh10').val();
    soluongkh11 = jQuery('#soluongkh11').val();
    soluongkh12 = jQuery('#soluongkh12').val();
    soluongkh13 = jQuery('#soluongkh13').val();
    soluongkh14 = jQuery('#soluongkh14').val();
    soluongkh15 = jQuery('#soluongkh15').val();

    var boat_sum = 0;
    jQuery('.boat_money').each(function(){
        val = parseFloat(unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep));
        if(isNaN(val) || val == ''){
            val = 0;
        }
        boat_sum += val;
    });

    if(boat_sum != Infinity){
        if(!isNaN(boat_sum)){
            jQuery('#boat_sum').val(formatNumber(boat_sum,num_grp_sep,dec_sep,2,0));
        }  
    }
    else{
        jQuery('#boat_sum').val('0');
    }

    boat1 = Math.round(boat_sum/soluongkh1,2);
    boat3 = Math.round(boat1/11,2); 
    if(boat1 != Infinity){
        if(!isNaN(boat1)){
            jQuery('#boat1').val(formatNumber(boat1,num_grp_sep,dec_sep,2,0));
        } 
    }

    else{
        jQuery('#boat1').val('0');
    }
    if(boat3 != Infinity){
        if(!isNaN(boat3)){
            jQuery('#boat3').val(formatNumber(boat3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat3').val('0');
    }

    boat2 = Math.round(boat_sum/soluongkh2,2);
    boat4 = Math.round(boat2/11,2);
    if(boat2 != Infinity){ 
        if(!isNaN(boat2)){
            jQuery('#boat2').val(formatNumber(boat2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat2').val('0');
    }
    if(boat4 != Infinity){
        if(!isNaN(boat4)){
            jQuery('#boat4').val(formatNumber(boat4,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat4').val('0');
    }

    boat5 = Math.round(boat_sum/soluongkh3,2);
    boat7 = Math.round(boat5/11,2);
    if(boat5 != Infinity){ 
        if(!isNaN(boat5)){
            jQuery('#boat5').val(formatNumber(boat5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat5').val('0');
    }
    if(boat7 != Infinity){
        if(!isNaN(boat7)){
            jQuery('#boat7').val(formatNumber(boat7,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat7').val('0');
    }

    boat6 = Math.round(boat_sum/soluongkh4,2);
    boat8 = Math.round(boat6/11,2);
    if(boat6 != Infinity){ 
        if(!isNaN(boat6)){
            jQuery('#boat6').val(formatNumber(boat6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat6').val('0');
    }
    if(boat8 != Infinity){
        if(!isNaN(boat8)){
            jQuery('#boat8').val(formatNumber(boat8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat8').val('0');
    }

    boat9 = Math.round(boat_sum/soluongkh5,2);
    boat11 = Math.round(boat9/11,2); 
    if(boat9 != Infinity){
        if(!isNaN(boat9)){
            jQuery('#boat9').val(formatNumber(boat9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat9').val('0');
    }
    if(boat11 != Infinity){
        if(!isNaN(boat11)){
            jQuery('#boat11').val(formatNumber(boat11,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat11').val('0');
    }

    boat10 = Math.round(boat_sum/soluongkh6,2);
    boat12 = Math.round(boat10/11,2); 
    if(boat10 != Infinity){
        if(!isNaN(boat10) ){
            jQuery('#boat10').val(formatNumber(boat10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat10').val('0');
    }
    if(boat12 != Infinity){
        if(!isNaN(boat12)){
            jQuery('#boat12').val(formatNumber(boat12,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat12').val('0');
    }

    boat13 = Math.round(boat_sum/soluongkh7,2);
    boat15 = Math.round(boat13/11,2);
    if(boat13 != Infinity){ 
        if(!isNaN(boat13)){
            jQuery('#boat13').val(formatNumber(boat13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat13').val('0');
    }
    if(boat15 != Infinity){
        if(!isNaN(boat15)){
            jQuery('#boat15').val(formatNumber(boat15,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat15').val('0');
    }

    boat14 = Math.round(boat_sum/soluongkh8,2);
    boat16 = Math.round(boat14/11,2);
    if(boat14 != Infinity){ 
        if(!isNaN(boat14)){
            jQuery('#boat14').val(formatNumber(boat14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat14').val('0');
    }
    if(boat16 != Infinity){
        if(!isNaN(boat16)){
            jQuery('#boat16').val(formatNumber(boat16,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat16').val('0');
    }

    boat17 = Math.round(boat_sum/soluongkh9,2);
    boat19 = Math.round(boat17/11,2); 
    if(boat17 != Infinity){
        if(!isNaN(boat17)){
            jQuery('#boat17').val(formatNumber(boat17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat17').val('0');
    }
    if(boat19 != Infinity){
        if(!isNaN(boat19)){
            jQuery('#boat19').val(formatNumber(boat19,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat19').val('0');
    }

    boat18 = Math.round(boat_sum/soluongkh10,2);
    boat20 = Math.round(boat18/11,2); 
    if(boat18 != Infinity){
        if(!isNaN(boat18)){
            jQuery('#boat18').val(formatNumber(boat18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat18').val('0');
    }
    if(boat20 != Infinity){
        if(!isNaN(boat20)){
            jQuery('#boat20').val(formatNumber(boat20,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat20').val('0');
    }


    boat21 = Math.round(boat_sum/soluongkh11,2);
    boat23 = Math.round(boat21/11,2);
    if(boat21 != Infinity){ 
        if(!isNaN(boat21) ){
            jQuery('#boat21').val(formatNumber(boat21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat21').val('0');
    }
    if(boat23 != Infinity){
        if(!isNaN(boat23)){
            jQuery('#boat23').val(formatNumber(boat23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat23').val('0');
    }

    boat22 = Math.round(boat_sum/soluongkh12,2);
    boat24 = Math.round(boat22/11,2);
    if(boat22 != Infinity){ 
        if(!isNaN(boat22)){
            jQuery('#boat22').val(formatNumber(boat22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat22').val('0');
    }
    if(boat24 != Infinity){
        if(!isNaN(boat24)){
            jQuery('#boat24').val(formatNumber(boat24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat24').val('0');
    }

    boat25 = Math.round(boat_sum/soluongkh13,2);
    boat28 = Math.round(boat25/11,2); 
    if(boat25 != Infinity){
        if(!isNaN(boat25)){
            jQuery('#boat25').val(formatNumber(boat25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat25').val('0');
    }
    if(boat28 != Infinity){
        if(!isNaN(boat28)){
            jQuery('#boat28').val(formatNumber(boat28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat28').val('0');
    }


    boat26 = Math.round(boat_sum/soluongkh14,2);
    boat29 = Math.round(boat26/11,2); 
    if(boat26 != Infinity){
        if(!isNaN(boat26)){
            jQuery('#boat26').val(formatNumber(boat26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat26').val('0');
    }
    if(boat29 != Infinity){
        if(!isNaN(boat29)){
            jQuery('#boat29').val(formatNumber(boat29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat29').val('0');
    }

    boat27 = Math.round(boat_sum/soluongkh15,2);
    boat30 = Math.round(boat27/11,2);
    if(boat27 != Infinity){ 
        if(!isNaN(boat27)){
            jQuery('#boat27').val(formatNumber(boat27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat27').val('0');
    }
    if(boat30 != Infinity){
        if(!isNaN(boat30)){
            jQuery('#boat30').val(formatNumber(boat30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#boat30').val('0');
    }


}
// function  GROUP MISCELLANEOUS (Include VAT)

function groupMiscellaneous(){

    soluongkh1 = jQuery('#soluongkh1').val();
    soluongkh2 = jQuery('#soluongkh2').val();
    soluongkh3 = jQuery('#soluongkh3').val();
    soluongkh4 = jQuery('#soluongkh4').val();
    soluongkh5 = jQuery('#soluongkh5').val();
    soluongkh6 = jQuery('#soluongkh6').val();
    soluongkh7 = jQuery('#soluongkh7').val();
    soluongkh8 = jQuery('#soluongkh8').val();
    soluongkh9 = jQuery('#soluongkh9').val();
    soluongkh10 = jQuery('#soluongkh10').val();
    soluongkh11 = jQuery('#soluongkh11').val();
    soluongkh12 = jQuery('#soluongkh12').val();
    soluongkh13 = jQuery('#soluongkh13').val();
    soluongkh14 = jQuery('#soluongkh14').val();
    soluongkh15 = jQuery('#soluongkh15').val();

    var group_sum = 0;
    jQuery('.group_money').each(function(){
        val = parseFloat(unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep,2,0));
        if(isNaN(val) || val == ''){
            val = 0;
        }
        group_sum += val;
    });
    if(group_sum != Infinity){
        if(!isNaN(group_sum)){
            jQuery('#group_sum').val(formatNumber(group_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group_sum').val('0');
    }

    group1 = Math.round(group_sum/soluongkh1,2);
    group3 = Math.round(group1/11,2);
    if(group1 != Infinity){
        if(!isNaN(group1)){
            jQuery('#group1').val(formatNumber(group1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group1').val('0');
    }
    if(group3 != Infinity){
        if(!isNaN(group3)){
            jQuery('#group3').val(formatNumber(group3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group3').val('0');
    }

    group2 = Math.round(group_sum/soluongkh2,2);
    group4 = Math.round(group2/11,2);
    if(group2 != Infinity){
        if(!isNaN(group2)){
            jQuery('#group2').val(formatNumber(group2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group2').val('0');
    }
    if(group4 != Infinity){
        if(!isNaN(group4)){
            jQuery('#group4').val(formatNumber(group4,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group4').val('0');
    }

    group5 = Math.round(group_sum/soluongkh3,2);
    group7 = Math.round(group5/11,2);
    if(group5 != Infinity){
        if(!isNaN(group2)){
            jQuery('#group5').val(formatNumber(group5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group5').val('0');
    }
    if(group7 != Infinity){
        if(!isNaN(group7)){
            jQuery('#group7').val(formatNumber(group7,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group7').val('0');
    }

    group6 = Math.round(group_sum/soluongkh4,2);
    group8 = Math.round(group6/11,2);
    if(group6 != Infinity){
        if(!isNaN(group6)){
            jQuery('#group6').val(formatNumber(group6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group6').val('0');
    }
    if(group8 != Infinity){
        if(!isNaN(group8)){
            jQuery('#group8').val(formatNumber(group8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group8').val('0');
    }


    group9 = Math.round(group_sum/soluongkh5,2);
    group11 = Math.round(group9/11,2);
    if(group9 != Infinity){
        if(!isNaN(group9)){
            jQuery('#group9').val(formatNumber(group9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group9').val('0');
    }
    if(group11 != Infinity){
        if(!isNaN(group11)){
            jQuery('#group11').val(formatNumber(group11,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group11').val('0');
    }

    group10 = Math.round(group_sum/soluongkh6,2);
    group12 = Math.round(group10/11,2);
    if(group10 != Infinity){
        if(!isNaN(group10)){
            jQuery('#group10').val(formatNumber(group10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group10').val('0');
    }
    if(group12 != Infinity){
        if(!isNaN(group12)){
            jQuery('#group12').val(formatNumber(group12,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group12').val('0');
    }


    group13 = Math.round(group_sum/soluongkh7,2);
    group15 = Math.round(group13/11,2);
    if(group13 != Infinity){
        if(!isNaN(group13)){
            jQuery('#group13').val(formatNumber(group13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group13').val('0');
    }
    if(group15 != Infinity){
        if(!isNaN(group15)){
            jQuery('#group15').val(formatNumber(group15,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group15').val('0');
    }

    group14 = Math.round(group_sum/soluongkh8,2);
    group16 = Math.round(group14/11,2);
    if(group14 != Infinity){
        if(!isNaN(group14)){
            jQuery('#group14').val(formatNumber(group14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group14').val('0');
    }
    if(group16 != Infinity){
        if(!isNaN(group16)){
            jQuery('#group16').val(formatNumber(group16,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group16').val('0');
    }

    group17 = Math.round(group_sum/soluongkh9,2);
    group19 = Math.round(group17/11,2);
    if(group17 != Infinity){
        if(!isNaN(group17)){
            jQuery('#group17').val(formatNumber(group17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group17').val('0');
    }
    if(group19 != Infinity){
        if(!isNaN(group19)){
            jQuery('#group19').val(formatNumber(group19,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group19').val('0');
    }

    group18 = Math.round(group_sum/soluongkh10,2);
    group20 = Math.round(group18/11,2);
    if(group18 != Infinity){
        if(!isNaN(group18)){
            jQuery('#group18').val(formatNumber(group18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group18').val('0');
    }
    if(group20 != Infinity){
        if(!isNaN(group20)){
            jQuery('#group20').val(formatNumber(group20,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group20').val('0');
    }


    group21 = Math.round(group_sum/soluongkh11,2);
    group23 = Math.round(group21/11,2);
    if(group21 != Infinity){
        if(!isNaN(group21)){
            jQuery('#group21').val(formatNumber(group21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group21').val('0');
    }
    if(group23 != Infinity){
        if(!isNaN(group23)){
            jQuery('#group23').val(formatNumber(group23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group23').val('0');
    }


    group22 = Math.round(group_sum/soluongkh12,2);
    group24 = Math.round(group22/11,2);
    if(group22 != Infinity){
        if(!isNaN(group22)){
            jQuery('#group22').val(formatNumber(group22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group22').val('0');
    }
    if(group24 != Infinity){
        if(!isNaN(group24)){
            jQuery('#group24').val(formatNumber(group24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group24').val('0');
    }


    group25 = Math.round(group_sum/soluongkh13,2);
    group28 = Math.round(group25/11,2);
    if(group25 != Infinity){
        if(!isNaN(group25)){
            jQuery('#group25').val(formatNumber(group25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group25').val('0');
    }
    if(group28 != Infinity){
        if(!isNaN(group28)){
            jQuery('#group28').val(formatNumber(group28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group28').val('0');
    }


    group26 = Math.round(group_sum/soluongkh14,2);
    group29 = Math.round(group26/11,2);
    if(group26 != Infinity){
        if(!isNaN(group26)){
            jQuery('#group26').val(formatNumber(group26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group26').val('0');
    }
    if(group29 != Infinity){
        if(!isNaN(group29)){
            jQuery('#group29').val(formatNumber(group29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group29').val('0');
    }


    group27 = Math.round(group_sum/soluongkh15,2);
    group30 = Math.round(group27/11,2);
    if(group27 != Infinity){
        if(!isNaN(group27)){
            jQuery('#group27').val(formatNumber(group27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group27').val('0');
    }
    if(group30 != Infinity){
        if(!isNaN(group30)){
            jQuery('#group30').val(formatNumber(group30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#group30').val('0');
    }

}

// calculate Entrance
function calculateEntrance(){
    var entrance_sum = 0;
    jQuery('.entrance_money').each(function(){
        val = parseFloat(unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep));
        if(isNaN(val) || val == ''){
            val = 0;
        }
        entrance_sum += val;
    });

    if(entrance_sum != Infinity){
        if(!isNaN(entrance_sum)){
            jQuery('#entrance_sum').val(formatNumber(entrance_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#entrance1, #entrance2, #entrance3, #entrance4, #entrance5, #entrance6, #entrance7, #entrance8, #entrance9, #entrance10, #entrance11, #entrance12, #entrance13, #entrance14, #entrance15').val(formatNumber(entrance_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#entrance_sum').val('0');
        jQuery('#entrance1, #entrance2, #entrance3, #entrance4, #entrance5, #entrance6, #entrance7, #entrance8, #entrance9, #entrance10, #entrance11, #entrance12, #entrance13, #entrance14, #entrance15').val('0');
    }

}

// calculate ticket
function calculateTicket(){
    var ticket_sum = 0;
    jQuery('.tickets_money').each(function(){
        val = parseFloat(unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep));
        if(isNaN(val) || val == ''){
            val = 0;
        }
        ticket_sum += val;
    });
    if(ticket_sum != Infinity){
        if(!isNaN(ticket_sum)){
            jQuery('#ticket_sum, #ticket1,#ticket2,#ticket3,#ticket4,#ticket5,#ticket6,#ticket7,#ticket8,#ticket9,#ticket10,#ticket11,#ticket12,#ticket13,#ticket14,#ticket15').val(formatNumber(ticket_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#ticket_sum, #ticket1,#ticket2,#ticket3,#ticket4,#ticket5,#ticket6,#ticket7,#ticket8,#ticket9,#ticket10,#ticket11,#ticket12,#ticket13,#ticket14,#ticket15').val('0');
    }
}
// end calculate ticket 
function calculateFitMiscellaneous(){
    var fit_money = 0;
    jQuery('.fit_money').each(function(){
        val = parseFloat(unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep));
        if(isNaN(val) || val == ''){
            val = 0;
        }
        fit_money += val;
    });
    if(fit_money != Infinity){
        if(!isNaN(fit_money)){
            jQuery('#fit_sum,#fit1,#fit2,#fit5,#fit6,#fit9,#fit10,#fit13,#fit14,#fit17,#fit18,#fit21,#fit22,#fit25,#fit26,#fit27').val(formatNumber(fit_money,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#fit_sum,#fit1,#fit2,#fit3,#fit4,#fit5,#fit6,#fit7,#fit8,#fit9,#fit10,#fit11,#fit12,#fit13,#fit14,#fit15').val('0');
    }

    tax = Math.round(fit_money/11);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#fit3,#fit4,#fit7,#fit8,#fit11,#fit12,#fit15,#fit16,#fit19,#fit20,#fit23,#fit24,#fit28,#fit29,#fit30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#fit3,#fit4,#fit7,#fit8,#fit11,#fit12,#fit15,#fit16,#fit19,#fit20,#fit23,#fit24,#fit28,#fit29,#fit30').val('0');
    }
}


function calculateHotel1(){
    var hotel1_sum = 0;
    jQuery('.hotel1_money').each(function(){
        val = parseFloat(unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep));
        if(isNaN(val) || val == ''){
            val = 0;
        }
        hotel1_sum += val;
    });

    if(hotel1_sum != Infinity){
        if(!isNaN(hotel1_sum)){
            hotel_sum = Math.round((hotel1_sum/2),2);
            jQuery('#hotel1_sum,#hotel1_2,#hotel1_5,#hotel1_6,#hotel1_9,#hotel1_10,#hotel1_13,#hotel1_14,#hotel1_17,#hotel1_18,#hotel1_21,#hotel1_22,#hotel1_25,#hotel1_26,#hotel1_27').val(formatNumber(hotel_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#hotel1_1').val(formatNumber(hotel1_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel1_sum,#hotel1_2,#hotel1_5,#hotel1_6,#hotel1_9,#hotel1_10,#hotel1_13,#hotel1_14,#hotel1_17,#hotel1_18,#hotel1_21,#hotel1_22,#hotel1_25,#hotel1_26,#hotel1_27').val('0');
        jQuery('#hotel1_1').val('0');
    }

    tax = Math.round(hotel1_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#hotel1_3').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel1_3').val('0');
    }

    tax1 = Math.round(hotel_sum/11,2);
    if(tax1 != Infinity){
        if(!isNaN(tax1)){
            jQuery('#hotel1_4, #hotel1_7, #hotel1_8, #hotel1_11, #hotel1_12, #hotel1_15, #hotel1_16, #hotel1_19, #hotel1_20, #hotel1_23, #hotel1_24, #hotel1_28, #hotel1_29, #hotel1_30').val(formatNumber(tax1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel1_4, #hotel1_7, #hotel1_8, #hotel1_11, #hotel1_12, #hotel1_15, #hotel1_16, #hotel1_19, #hotel1_20, #hotel1_23, #hotel1_24, #hotel1_28, #hotel1_29, #hotel1_30').val('0');
    }
}

function calculateHotel2(){
    var hotel2_sum = 0;
    jQuery('.hotel2_money').each(function(){
        val = parseFloat(unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep));
        if(isNaN(val) || val == ''){
            val = 0;
        }
        hotel2_sum += val;
    });

    if(hotel2_sum != Infinity){
        if(!isNaN(hotel2_sum)){
            hotel_sum = Math.round((hotel2_sum/2),2);
            jQuery('#hotel2_sum,#hotel2_2,#hotel2_5,#hotel2_6,#hotel2_9,#hotel2_10,#hotel2_13,#hotel2_14,#hotel2_17,#hotel2_18,#hotel2_21,#hotel2_22,#hotel2_25,#hotel2_26,#hotel2_27').val(formatNumber(hotel_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#hotel2_1').val(formatNumber(hotel2_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel2_sum,#hotel2_2,#hotel2_5,#hotel2_6,#hotel2_9,#hotel2_10,#hotel2_13,#hotel2_14,#hotel2_17,#hotel2_18,#hotel2_21,#hotel2_22,#hotel2_25,#hotel2_26,#hotel2_27').val('0');
        jQuery('#hotel2_1').val('0');
    }

    tax = Math.round(hotel2_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#hotel2_3').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel2_3').val('0');
    }

    tax1 = Math.round(hotel_sum/11,2);
    if(tax1 != Infinity){
        if(!isNaN(tax1)){
            jQuery('#hotel2_4, #hotel2_7, #hotel2_8, #hotel2_11, #hotel2_12, #hotel2_15, #hotel2_16, #hotel2_19, #hotel2_20, #hotel2_23, #hotel2_24, #hotel2_28, #hotel2_29, #hotel2_30').val(formatNumber(tax1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel2_4, #hotel2_7, #hotel2_8, #hotel2_11, #hotel2_12, #hotel2_15, #hotel2_16, #hotel2_19, #hotel2_20, #hotel2_23, #hotel2_24, #hotel2_28, #hotel2_29, #hotel2_30').val('0');
    }
}

function calculateHotel3(){
    var hotel3_sum = 0;
    jQuery('.hotel3_money').each(function(){
        val = parseFloat(unformatNumber(jQuery(this).val(),num_grp_sep,dec_sep));
        if(isNaN(val) || val == ''){
            val = 0;
        }
        hotel3_sum += val;
    });

    if(hotel3_sum != Infinity){
        if(!isNaN(hotel3_sum)){
            hotel_sum = Math.round((hotel3_sum/2),2);
            jQuery('#hotel3_sum,#hotel3_2,#hotel3_5,#hotel3_6,#hotel3_9,#hotel3_10,#hotel3_13,#hotel3_14,#hotel3_17,#hotel3_18,#hotel3_21,#hotel3_22,#hotel3_25,#hotel3_26,#hotel3_27').val(formatNumber(hotel_sum,num_grp_sep,dec_sep,2,0));
            jQuery('#hotel3_1').val(formatNumber(hotel3_sum,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel3_sum,#hotel3_2,#hotel3_5,#hotel3_6,#hotel3_9,#hotel3_10,#hotel3_13,#hotel3_14,#hotel3_17,#hotel3_18,#hotel3_21,#hotel3_22,#hotel3_25,#hotel3_26,#hotel3_27').val('0');
        jQuery('#hotel3_1').val('0');
    }

    tax = Math.round(hotel3_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#hotel3_3').val(formatNumber(tax,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel3_3').val('0');
    }

    tax1 = Math.round(hotel_sum/11,2);
    if(tax1 != Infinity){
        if(!isNaN(tax1)){
            jQuery('#hotel3_4, #hotel3_7, #hotel3_8, #hotel3_11, #hotel3_12, #hotel3_15, #hotel3_16, #hotel3_19, #hotel3_20, #hotel3_23, #hotel3_24, #hotel3_28, #hotel3_29, #hotel3_30').val(formatNumber(tax1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#hotel3_4, #hotel3_7, #hotel3_8, #hotel3_11, #hotel3_12, #hotel3_15, #hotel3_16, #hotel3_19, #hotel3_20, #hotel3_23, #hotel3_24, #hotel3_28, #hotel3_29, #hotel3_30').val('0');
    }
}
// meail 1
function sumMeal1(){
    meal1_south_sum = parseFloat(unformatNumber(jQuery('#meal1_south_sum').val(),num_grp_sep,dec_sep));
    meal1_miidle_sum = parseFloat(unformatNumber(jQuery('#meal1_miidle_sum').val(),num_grp_sep,dec_sep));
    meal1_north_sum = parseFloat(unformatNumber(jQuery('#meal1_north_sum').val(),num_grp_sep,dec_sep));
    if(isNaN(meal1_south_sum) || meal1_south_sum == ''){
        meal1_south_sum = 0;
    }
    if(isNaN(meal1_miidle_sum) || meal1_miidle_sum == ''){
        meal1_miidle_sum = 0;
    }
    if(isNaN(meal1_north_sum) || meal1_north_sum == ''){
        meal1_north_sum = 0;
    }

    meal1_sum =  Math.round(meal1_south_sum+meal1_miidle_sum+meal1_north_sum,2);
    if(meal1_sum != Infinity){
        if(!isNaN(meal1_sum)){
            jQuery('#meal1_sum,#meal1_1,#meal1_2,#meal1_5,#meal1_6,#meal1_9,#meal1_10,#meal1_13,#meal1_14,#meal1_17,#meal1_18,,#meal1_21,#meal1_22,#meal1_25,#meal1_26,#meal1_27').val(formatNumber(meal1_sum,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal1_sum,#meal1_1,#meal1_2,#meal1_5,#meal1_6,#meal1_9,#meal1_10,#meal1_13,#meal1_14,#meal1_17,#meal1_18,#meal1_21,#meal1_22,#meal1_25,#meal1_26,#meal1_27').val('0');
    }
    tax = Math.round(meal1_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal1_3,#meal1_4,#meal1_7,#meal1_8,#meal1_11,#meal1_12,#meal1_15,#meal1_16,,#meal1_19,#meal1_20,#meal1_23,#meal1_24,#meal1_28,#meal1_29,#meal1_30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0)); 
        }
    }
    else{
        jQuery('#meal1_3,#meal1_4,#meal1_7,#meal1_8,#meal1_11,#meal1_12,#meal1_15,#meal1_16,,#meal1_19,#meal1_20,#meal1_23,#meal1_24,#meal1_28,#meal1_29,#meal1_30').val('0'); 
    }
}
// end meal 1

// sum meal 2
function sumMeal2(){
    meal2_south_sum = parseFloat(unformatNumber(jQuery('#meal2_south_sum').val(),num_grp_sep,dec_sep));
    meal2_miidle_sum = parseFloat(unformatNumber(jQuery('#meal2_miidle_sum').val(),num_grp_sep,dec_sep));
    meal2_north_sum = parseFloat(unformatNumber(jQuery('#meal2_north_sum').val(),num_grp_sep,dec_sep));
    if(isNaN(meal2_south_sum) || meal2_south_sum == ''){
        meal2_south_sum = 0;
    }
    if(isNaN(meal2_miidle_sum) || meal2_miidle_sum == ''){
        meal2_miidle_sum = 0;
    }
    if(isNaN(meal2_north_sum) || meal2_north_sum == ''){
        meal2_north_sum = 0;
    }

    meal2_sum =  Math.round(meal2_south_sum+meal2_miidle_sum+meal2_north_sum,2);
    if(meal2_sum != Infinity){
        if(!isNaN(meal2_sum)){
            jQuery('#meal2_sum,#meal2_1,#meal2_2,#meal2_5,#meal2_6,#meal2_9,#meal2_10,#meal2_13,#meal2_14,#meal2_17,#meal2_18,,#meal2_21,#meal2_22,#meal2_25,#meal2_26,#meal2_27').val(formatNumber(meal2_sum,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal2_sum,#meal2_1,#meal2_2,#meal2_5,#meal2_6,#meal2_9,#meal2_10,#meal2_13,#meal2_14,#meal2_17,#meal2_18,,#meal2_21,#meal2_22,#meal2_25,#meal2_26,#meal2_27').val('0');
    }
    tax = Math.round(meal2_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal2_3,#meal2_4,#meal2_7,#meal2_8,#meal2_11,#meal2_12,#meal2_15,#meal2_16,,#meal2_19,#meal2_20,#meal2_23,#meal2_24,#meal2_28,#meal2_29,#meal2_30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0)); 
        }
    }
    else{
        jQuery('#meal2_3,#meal2_4,#meal2_7,#meal2_8,#meal2_11,#meal2_12,#meal2_15,#meal2_16,,#meal2_19,#meal2_20,#meal2_23,#meal2_24,#meal2_28,#meal2_29,#meal2_30').val('0'); 
    }
}
// end meal 2

// meal 3 
function sumMeal3(){
    meal3_south_sum = parseFloat(unformatNumber(jQuery('#meal3_south_sum').val(),num_grp_sep,dec_sep));
    meal3_miidle_sum = parseFloat(unformatNumber(jQuery('#meal3_miidle_sum').val(),num_grp_sep,dec_sep));
    meal3_north_sum = parseFloat(unformatNumber(jQuery('#meal3_north_sum').val(),num_grp_sep,dec_sep));
    if(isNaN(meal3_south_sum) || meal3_south_sum == ''){
        meal3_south_sum = 0;
    }
    if(isNaN(meal3_miidle_sum) || meal3_miidle_sum == ''){
        meal3_miidle_sum = 0;
    }
    if(isNaN(meal3_north_sum) || meal3_north_sum == ''){
        meal3_north_sum = 0;
    }

    meal3_sum =  Math.round(meal3_south_sum+meal3_miidle_sum+meal3_north_sum,2);
    if(meal3_sum != Infinity){
        if(!isNaN(meal3_sum)){
            jQuery('#meal3_sum,#meal3_1,#meal3_2,#meal3_5,#meal3_6,#meal3_9,#meal3_10,#meal3_13,#meal3_14,#meal3_17,#meal3_18,,#meal3_21,#meal3_22,#meal3_25,#meal3_26,#meal3_27').val(formatNumber(meal3_sum,num_grp_sep,dec_sep,2,0));
        } 
    }
    else{
        jQuery('#meal3_sum,#meal3_1,#meal3_2,#meal3_5,#meal3_6,#meal3_9,#meal2_10,#meal3_13,#meal3_14,#meal3_17,#meal3_18,,#meal3_21,#meal3_22,#meal3_25,#meal3_26,#meal3_27').val('0');
    }
    tax = Math.round(meal3_sum/11,2);
    if(tax != Infinity){
        if(!isNaN(tax)){
            jQuery('#meal3_3,#meal3_4,#meal3_7,#meal3_8,#meal3_9,#meal3_10,#meal3_11,#meal3_12,#meal3_15,#meal3_16,,#meal3_19,#meal3_20,#meal3_23,#meal3_24,#meal3_28,#meal3_29,#meal3_30').val(formatNumber(tax,num_grp_sep,dec_sep,2,0)); 
        }
    }
    else{
        jQuery('#meal3_3,#meal3_4,#meal3_7,#meal3_8,#meal3_9,#meal3_10,#meal3_11,#meal3_12,#meal3_15,#meal3_16,,#meal3_19,#meal3_20,#meal3_23,#meal3_24,#meal3_28,#meal3_29,#meal3_30').val('0'); 
    }
}

// end meal 3

// function summaary 1
function calculateSummary1(){

    soluongkh1 = jQuery('#soluongkh1').val();
    soluongkh2 = jQuery('#soluongkh2').val();
    soluongkh3 = jQuery('#soluongkh3').val();
    soluongkh4 = jQuery('#soluongkh4').val();
    soluongkh5 = jQuery('#soluongkh5').val();
    soluongkh6 = jQuery('#soluongkh6').val();
    soluongkh7 = jQuery('#soluongkh7').val();
    soluongkh8 = jQuery('#soluongkh8').val();
    soluongkh9 = jQuery('#soluongkh9').val();
    soluongkh10 = jQuery('#soluongkh10').val();
    soluongkh11 = jQuery('#soluongkh11').val();
    soluongkh12 = jQuery('#soluongkh12').val();
    soluongkh13 = jQuery('#soluongkh13').val();
    soluongkh14 = jQuery('#soluongkh14').val();
    soluongkh15 = jQuery('#soluongkh15').val();



    // nett 1
    transfer1 = parseFloat(unformatNumber(jQuery('#transfer1').val(),num_grp_sep,dec_sep));
    boat1 = parseFloat(unformatNumber(jQuery('#boat1').val(),num_grp_sep,dec_sep));
    guide1 = parseFloat(unformatNumber(jQuery('#guide1').val(),num_grp_sep,dec_sep));
    group1 = parseFloat(unformatNumber(jQuery('#group1').val(),num_grp_sep,dec_sep));
    entrance1 = parseFloat(unformatNumber(jQuery('#entrance1').val(),num_grp_sep,dec_sep));
    ticket1 = parseFloat(unformatNumber(jQuery('#ticket1').val(),num_grp_sep,dec_sep));
    fit1 = parseFloat(unformatNumber(jQuery('#fit1').val(),num_grp_sep,dec_sep));
    meal1_1 = parseFloat(unformatNumber(jQuery('#meal1_1').val(),num_grp_sep,dec_sep));
    hotel1_1 = parseFloat(unformatNumber(jQuery('#hotel1_1').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer1) || transfer1 == ''){transfer1 = 0}
    if(isNaN(boat1) || boat1 == ''){boat1 = 0}
    if(isNaN(guide1) || guide1 == ''){guide1 = 0}
    if(isNaN(group1) || group1 == ''){group1 = 0}
    if(isNaN(entrance1) || entrance1 == ''){entrance1 = 0}
    if(isNaN(ticket1) || ticket1 == ''){ticket1 = 0}
    if(isNaN(fit1) || fit1 == ''){fit1 = 0}
    if(isNaN(meal1_1) || meal1_1 == ''){meal1_1 = 0}
    if(isNaN(hotel1_1) || hotel1_1 == ''){hotel1_1 = 0}
    nett1_1 = Math.round(transfer1+boat1+guide1+group1+entrance1+ticket1+fit1+meal1_1+hotel1_1,2)
    if(nett1_1 != Infinity){
        if(!isNaN(nett1_1)){
            jQuery('#nett1_1').val(formatNumber(nett1_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_1').val('0');
    }
    // end nett 1 

    // nett 2
    transfer2 = parseFloat(unformatNumber(jQuery('#transfer2').val(),num_grp_sep,dec_sep));
    boat2 = parseFloat(unformatNumber(jQuery('#boat2').val(),num_grp_sep,dec_sep));
    guide2 = parseFloat(unformatNumber(jQuery('#guide2').val(),num_grp_sep,dec_sep));
    group2 = parseFloat(unformatNumber(jQuery('#group2').val(),num_grp_sep,dec_sep));
    entrance2 = parseFloat(unformatNumber(jQuery('#entrance2').val(),num_grp_sep,dec_sep));
    ticket2 = parseFloat(unformatNumber(jQuery('#ticket2').val(),num_grp_sep,dec_sep));
    fit2 = parseFloat(unformatNumber(jQuery('#fit2').val(),num_grp_sep,dec_sep));
    meal1_2 = parseFloat(unformatNumber(jQuery('#meal1_2').val(),num_grp_sep,dec_sep));
    hotel1_2 = parseFloat(unformatNumber(jQuery('#hotel1_2').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer2) || transfer2 == ''){transfer2 = 0}
    if(isNaN(boat2) || boat2 == ''){boat2 = 0}
    if(isNaN(guide2) || guide2 == ''){guide2 = 0}
    if(isNaN(group2) || group2 == ''){group2 = 0}
    if(isNaN(entrance2) || entrance2 == ''){entrance2 = 0}
    if(isNaN(ticket2) || ticket2 == ''){ticket2 = 0}
    if(isNaN(fit2) || fit2 == ''){fit2 = 0}
    if(isNaN(meal1_2) || meal1_2 == ''){meal1_2 = 0}
    if(isNaN(hotel1_2) || hotel1_2 == ''){hotel1_2 = 0}
    nett1_2 = Math.round(transfer2+boat2+guide2+group2+entrance2+ticket2+fit2+meal1_2+hotel1_2,2)
    if(nett1_2 != Infinity){
        if(!isNaN(nett1_2)){
            jQuery('#nett1_2').val(formatNumber(nett1_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_2').val('0');
    }
    // end nett 2

    // nett 3
    transfer3 = parseFloat(unformatNumber(jQuery('#transfer3').val(),num_grp_sep,dec_sep));
    boat3 = parseFloat(unformatNumber(jQuery('#boat3').val(),num_grp_sep,dec_sep));
    guide3 = parseFloat(unformatNumber(jQuery('#guide3').val(),num_grp_sep,dec_sep));
    group3 = parseFloat(unformatNumber(jQuery('#group3').val(),num_grp_sep,dec_sep));
    entrance3 = parseFloat(unformatNumber(jQuery('#entrance3').val(),num_grp_sep,dec_sep));
    ticket3 = parseFloat(unformatNumber(jQuery('#ticket3').val(),num_grp_sep,dec_sep));
    fit3 = parseFloat(unformatNumber(jQuery('#fit3').val(),num_grp_sep,dec_sep));
    meal1_3 = parseFloat(unformatNumber(jQuery('#meal1_3').val(),num_grp_sep,dec_sep));
    hotel1_3 = parseFloat(unformatNumber(jQuery('#hotel1_3').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer3) || transfer3 == ''){transfer3 = 0}
    if(isNaN(boat3) || boat3 == ''){boat3 = 0}
    if(isNaN(guide3) || guide3 == ''){guide3 = 0}
    if(isNaN(group3) || group3 == ''){group3 = 0}
    if(isNaN(entrance3) || entrance3 == ''){entrance3 = 0}
    if(isNaN(ticket3) || ticket3 == ''){ticket3 = 0}
    if(isNaN(fit3) || fit3 == ''){fit3 = 0}
    if(isNaN(meal1_3) || meal1_3 == ''){meal1_3 = 0}
    if(isNaN(hotel1_3) || hotel1_3 == ''){hotel1_3 = 0}
    nett1_3 = Math.round(transfer3+boat3+group3+fit3+meal1_3+hotel1_3,2)
    if(nett1_3 != Infinity){
        if(!isNaN(nett1_3)){
            jQuery('#nett1_3').val(formatNumber(nett1_3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_3').val('0');
    }
    // end nett 3

    // nett 4
    transfer4 = parseFloat(unformatNumber(jQuery('#transfer4').val(),num_grp_sep,dec_sep));
    boat4 = parseFloat(unformatNumber(jQuery('#boat4').val(),num_grp_sep,dec_sep));
    guide4 = parseFloat(unformatNumber(jQuery('#guide4').val(),num_grp_sep,dec_sep));
    group4 = parseFloat(unformatNumber(jQuery('#group4').val(),num_grp_sep,dec_sep));
    entrance4 = parseFloat(unformatNumber(jQuery('#entrance4').val(),num_grp_sep,dec_sep));
    ticket4 = parseFloat(unformatNumber(jQuery('#ticket4').val(),num_grp_sep,dec_sep));
    fit4 = parseFloat(unformatNumber(jQuery('#fit4').val(),num_grp_sep,dec_sep));
    meal1_4 = parseFloat(unformatNumber(jQuery('#meal1_4').val(),num_grp_sep,dec_sep));
    hotel1_4 = parseFloat(unformatNumber(jQuery('#hotel1_4').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer4) || transfer4 == ''){transfer4 = 0}
    if(isNaN(boat4) || boat4 == ''){boat4 = 0}
    if(isNaN(guide4) || guide4 == ''){guide4 = 0}
    if(isNaN(group4) || group4 == ''){group4 = 0}
    if(isNaN(entrance4) || entrance4 == ''){entrance4 = 0}
    if(isNaN(ticket4) || ticket4 == ''){ticket4 = 0}
    if(isNaN(fit4) || fit4 == ''){fit4 = 0}
    if(isNaN(meal1_4) || meal1_4 == ''){meal1_4 = 0}
    if(isNaN(hotel1_4) || hotel1_4 == ''){hotel1_4 = 0}
    nett1_4 = Math.round(transfer4+boat4+group4+fit4+meal1_4+hotel1_4,2)
    if(nett1_4 != Infinity){
        if(!isNaN(nett1_4)){
            jQuery('#nett1_4').val(formatNumber(nett1_4,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_4').val('0');
    }
    // end nett 4

    // nett 5
    transfer5 = parseFloat(unformatNumber(jQuery('#transfer5').val(),num_grp_sep,dec_sep));
    boat5 = parseFloat(unformatNumber(jQuery('#boat5').val(),num_grp_sep,dec_sep));
    guide3 = parseFloat(unformatNumber(jQuery('#guide3').val(),num_grp_sep,dec_sep));
    group5 = parseFloat(unformatNumber(jQuery('#group5').val(),num_grp_sep,dec_sep));
    entrance5 = parseFloat(unformatNumber(jQuery('#entrance3').val(),num_grp_sep,dec_sep));
    ticket5 = parseFloat(unformatNumber(jQuery('#ticket3').val(),num_grp_sep,dec_sep));
    fit5 = parseFloat(unformatNumber(jQuery('#fit5').val(),num_grp_sep,dec_sep));
    meal1_5 = parseFloat(unformatNumber(jQuery('#meal1_5').val(),num_grp_sep,dec_sep));
    hotel1_5 = parseFloat(unformatNumber(jQuery('#hotel1_5').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer5) || transfer5 == ''){transfer5 = 0}
    if(isNaN(boat5) || boat5 == ''){boat5 = 0}
    if(isNaN(guide3) || guide3 == ''){guide3 = 0}
    if(isNaN(group5) || group5 == ''){group5 = 0}
    if(isNaN(entrance5) || entrance5 == ''){entrance5 = 0}
    if(isNaN(ticket5) || ticket5 == ''){ticket5 = 0}
    if(isNaN(fit5) || fit5 == ''){fit5 = 0}
    if(isNaN(meal1_5) || meal1_5 == ''){meal1_5 = 0}
    if(isNaN(hotel1_5) || hotel1_5 == ''){hotel1_5 = 0}
    nett1_5 = Math.round(transfer5+boat5+guide3+group5+entrance5+ticket5+fit5+meal1_5+hotel1_5,2)
    if(nett1_5 != Infinity){
        if(!isNaN(nett1_5)){
            jQuery('#nett1_5').val(formatNumber(nett1_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_5').val('0');
    }
    // end nett 5

    // nett 6
    transfer6 = parseFloat(unformatNumber(jQuery('#transfer6').val(),num_grp_sep,dec_sep));
    boat6 = parseFloat(unformatNumber(jQuery('#boat6').val(),num_grp_sep,dec_sep));
    guide4 = parseFloat(unformatNumber(jQuery('#guide4').val(),num_grp_sep,dec_sep));
    group6 = parseFloat(unformatNumber(jQuery('#group6').val(),num_grp_sep,dec_sep));
    entrance6 = parseFloat(unformatNumber(jQuery('#entrance4').val(),num_grp_sep,dec_sep));
    ticket6 = parseFloat(unformatNumber(jQuery('#ticket4').val(),num_grp_sep,dec_sep));
    fit6 = parseFloat(unformatNumber(jQuery('#fit6').val(),num_grp_sep,dec_sep));
    meal1_6 = parseFloat(unformatNumber(jQuery('#meal1_6').val(),num_grp_sep,dec_sep));
    hotel1_6 = parseFloat(unformatNumber(jQuery('#hotel1_6').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer6) || transfer6 == ''){transfer6 = 0}
    if(isNaN(boat6) || boat6 == ''){boat6 = 0}
    if(isNaN(guide4) || guide4 == ''){guide4 = 0}
    if(isNaN(group5) || group5 == ''){group5 = 0}
    if(isNaN(entrance6) || entrance6 == ''){entrance6 = 0}
    if(isNaN(ticket6) || ticket6 == ''){ticket6 = 0}
    if(isNaN(fit6) || fit6 == ''){fit6 = 0}
    if(isNaN(meal1_6) || meal1_6 == ''){meal1_6 = 0}
    if(isNaN(hotel1_6) || hotel1_6 == ''){hotel1_6 = 0}
    nett1_6 = Math.round(transfer6+boat6+guide4+group6+entrance6+ticket6+fit6+meal1_6+hotel1_6,2)
    if(nett1_6 != Infinity){
        if(!isNaN(nett1_6)){
            jQuery('#nett1_6').val(formatNumber(nett1_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_6').val('0');
    }
    // end nett 6

    // nett 7
    transfer7 = parseFloat(unformatNumber(jQuery('#transfer7').val(),num_grp_sep,dec_sep));
    boat7 = parseFloat(unformatNumber(jQuery('#boat7').val(),num_grp_sep,dec_sep));
    guide7 = parseFloat(unformatNumber(jQuery('#guide7').val(),num_grp_sep,dec_sep));
    group7 = parseFloat(unformatNumber(jQuery('#group7').val(),num_grp_sep,dec_sep));
    entrance7 = parseFloat(unformatNumber(jQuery('#entrance7').val(),num_grp_sep,dec_sep));
    ticket7 = parseFloat(unformatNumber(jQuery('#ticket7').val(),num_grp_sep,dec_sep));
    fit7 = parseFloat(unformatNumber(jQuery('#fit7').val(),num_grp_sep,dec_sep));
    meal1_7 = parseFloat(unformatNumber(jQuery('#meal1_7').val(),num_grp_sep,dec_sep));
    hotel1_7 = parseFloat(unformatNumber(jQuery('#hotel1_7').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer7) || transfer7 == ''){transfer7 = 0}
    if(isNaN(boat7) || boat7 == ''){boat7 = 0}
    if(isNaN(guide7) || guide7 == ''){guide7 = 0}
    if(isNaN(group7) || group5 == ''){group7 = 0}
    if(isNaN(entrance7) || entrance7 == ''){entrance7 = 0}
    if(isNaN(ticket7) || ticket7 == ''){ticket7 = 0}
    if(isNaN(fit7) || fit7 == ''){fit7 = 0}
    if(isNaN(meal1_7) || meal1_7 == ''){meal1_7 = 0}
    if(isNaN(hotel1_7) || hotel1_7 == ''){hotel1_7 = 0}
    nett1_7 = Math.round(transfer7+boat7+group7+fit7+meal1_7+hotel1_7,2)
    if(nett1_7 != Infinity){
        if(!isNaN(nett1_7)){
            jQuery('#nett1_7').val(formatNumber(nett1_7,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_7').val('0');
    }
    // end nett 7

    // nett 8
    transfer8 = parseFloat(unformatNumber(jQuery('#transfer8').val(),num_grp_sep,dec_sep));
    boat8 = parseFloat(unformatNumber(jQuery('#boat8').val(),num_grp_sep,dec_sep));
    guide8 = parseFloat(unformatNumber(jQuery('#guide8').val(),num_grp_sep,dec_sep));
    group8 = parseFloat(unformatNumber(jQuery('#group8').val(),num_grp_sep,dec_sep));
    entrance8 = parseFloat(unformatNumber(jQuery('#entrance8').val(),num_grp_sep,dec_sep));
    ticket8 = parseFloat(unformatNumber(jQuery('#ticket8').val(),num_grp_sep,dec_sep));
    fit8 = parseFloat(unformatNumber(jQuery('#fit8').val(),num_grp_sep,dec_sep));
    meal1_8 = parseFloat(unformatNumber(jQuery('#meal1_8').val(),num_grp_sep,dec_sep));
    hotel1_8 = parseFloat(unformatNumber(jQuery('#hotel1_8').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer8) || transfer8 == ''){transfer8 = 0}
    if(isNaN(boat8) || boat8 == ''){boat8 = 0}
    if(isNaN(guide8) || guide8 == ''){guide8 = 0}
    if(isNaN(group8) || group8 == ''){group8 = 0}
    if(isNaN(entrance8) || entrance8 == ''){entrance8 = 0}
    if(isNaN(ticket8) || ticket8 == ''){ticket8 = 0}
    if(isNaN(fit8) || fit8 == ''){fit8 = 0}
    if(isNaN(meal1_8) || meal1_8 == ''){meal1_8 = 0}
    if(isNaN(hotel1_8) || hotel1_8 == ''){hotel1_8 = 0}
    nett1_8 = Math.round(transfer8+boat8+group8+fit8+meal1_8+hotel1_8,2)
    if(nett1_8 != Infinity){
        if(!isNaN(nett1_8)){
            jQuery('#nett1_8').val(formatNumber(nett1_8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_8').val('0');
    }
    // end nett 8  

    // nett 9
    transfer9 = parseFloat(unformatNumber(jQuery('#transfer9').val(),num_grp_sep,dec_sep));
    boat9 = parseFloat(unformatNumber(jQuery('#boat9').val(),num_grp_sep,dec_sep));
    guide5 = parseFloat(unformatNumber(jQuery('#guide5').val(),num_grp_sep,dec_sep));
    group9 = parseFloat(unformatNumber(jQuery('#group9').val(),num_grp_sep,dec_sep));
    entrance9 = parseFloat(unformatNumber(jQuery('#entrance5').val(),num_grp_sep,dec_sep));
    ticket9 = parseFloat(unformatNumber(jQuery('#ticket5').val(),num_grp_sep,dec_sep));
    fit9 = parseFloat(unformatNumber(jQuery('#fit9').val(),num_grp_sep,dec_sep));
    meal1_9 = parseFloat(unformatNumber(jQuery('#meal1_9').val(),num_grp_sep,dec_sep));
    hotel1_9 = parseFloat(unformatNumber(jQuery('#hotel1_9').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer9) || transfer9 == ''){transfer9 = 0}
    if(isNaN(boat9) || boat9 == ''){boat9 = 0}
    if(isNaN(guide5) || guide5 == ''){guide5 = 0}
    if(isNaN(group9) || group9 == ''){group9 = 0}
    if(isNaN(entrance9) || entrance9 == ''){entrance9 = 0}
    if(isNaN(ticket9) || ticket9 == ''){ticket9 = 0}
    if(isNaN(fit9) || fit9 == ''){fit9 = 0}
    if(isNaN(meal1_9) || meal1_9 == ''){meal1_9 = 0}
    if(isNaN(hotel1_9) || hotel1_9 == ''){hotel1_9 = 0}
    nett1_9 = Math.round(transfer9+boat9+guide5+group9+entrance9+ticket9+fit9+meal1_9+hotel1_9,2)
    if(nett1_9 != Infinity){
        if(!isNaN(nett1_9)){
            jQuery('#nett1_9').val(formatNumber(nett1_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_9').val('0');
    }
    // end nett 9

    // nett 10
    transfer10 = parseFloat(unformatNumber(jQuery('#transfer10').val(),num_grp_sep,dec_sep));
    boat10 = parseFloat(unformatNumber(jQuery('#boat10').val(),num_grp_sep,dec_sep));
    guide10 = parseFloat(unformatNumber(jQuery('#guide10').val(),num_grp_sep,dec_sep));
    group10 = parseFloat(unformatNumber(jQuery('#group10').val(),num_grp_sep,dec_sep));
    entrance10 = parseFloat(unformatNumber(jQuery('#entrance6').val(),num_grp_sep,dec_sep));
    ticket10 = parseFloat(unformatNumber(jQuery('#ticket6').val(),num_grp_sep,dec_sep));
    fit10 = parseFloat(unformatNumber(jQuery('#fit10').val(),num_grp_sep,dec_sep));
    meal1_10 = parseFloat(unformatNumber(jQuery('#meal1_10').val(),num_grp_sep,dec_sep));
    hotel1_10 = parseFloat(unformatNumber(jQuery('#hotel1_10').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer10) || transfer10 == ''){transfer10 = 0}
    if(isNaN(boat10) || boat10 == ''){boat10 = 0}
    if(isNaN(guide10) || guide10 == ''){guide10 = 0}
    if(isNaN(group10) || group10 == ''){group10 = 0}
    if(isNaN(entrance10) || entrance10 == ''){entrance10 = 0}
    if(isNaN(ticket10) || ticket10 == ''){ticket10 = 0}
    if(isNaN(fit10) || fit10 == ''){fit10 = 0}
    if(isNaN(meal1_10) || meal1_10 == ''){meal1_10 = 0}
    if(isNaN(hotel1_10) || hotel1_10 == ''){hotel1_10 = 0}
    nett1_10 = Math.round(transfer10+boat10+guide6+group10+entrance10+ticket10+fit10+meal1_10+hotel1_10,2)
    if(nett1_10 != Infinity){
        if(!isNaN(nett1_10)){
            jQuery('#nett1_10').val(formatNumber(nett1_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_10').val('0');
    }
    // end nett 10


    // nett 11
    transfer11 = parseFloat(unformatNumber(jQuery('#transfer11').val(),num_grp_sep,dec_sep));
    boat11 = parseFloat(unformatNumber(jQuery('#boat11').val(),num_grp_sep,dec_sep));
    guide11 = parseFloat(unformatNumber(jQuery('#guide11').val(),num_grp_sep,dec_sep));
    group11 = parseFloat(unformatNumber(jQuery('#group11').val(),num_grp_sep,dec_sep));
    entrance11 = parseFloat(unformatNumber(jQuery('#entrance11').val(),num_grp_sep,dec_sep));
    ticket11 = parseFloat(unformatNumber(jQuery('#ticket11').val(),num_grp_sep,dec_sep));
    fit11 = parseFloat(unformatNumber(jQuery('#fit11').val(),num_grp_sep,dec_sep));
    meal1_11 = parseFloat(unformatNumber(jQuery('#meal1_11').val(),num_grp_sep,dec_sep));
    hotel1_11 = parseFloat(unformatNumber(jQuery('#hotel1_11').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer11) || transfer11 == ''){transfer11 = 0}
    if(isNaN(boat11) || boat11 == ''){boat11 = 0}
    if(isNaN(guide11) || guide11 == ''){guide11 = 0}
    if(isNaN(group11) || group11 == ''){group11 = 0}
    if(isNaN(entrance11) || entrance11 == ''){entrance11 = 0}
    if(isNaN(ticket11) || ticket11 == ''){ticket11 = 0}
    if(isNaN(fit11) || fit11 == ''){fit11 = 0}
    if(isNaN(meal1_11) || meal1_11 == ''){meal1_11 = 0}
    if(isNaN(hotel1_10) || hotel1_10 == ''){hotel1_10 = 0}
    nett1_11 = Math.round(transfer11+boat11+group11+fit11+meal1_11+hotel1_11,2)
    if(nett1_11 != Infinity){
        if(!isNaN(nett1_11)){
            jQuery('#nett1_11').val(formatNumber(nett1_11,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_11').val('0');
    }
    // end nett 11


    // nett 12
    transfer12 = parseFloat(unformatNumber(jQuery('#transfer12').val(),num_grp_sep,dec_sep));
    boat12 = parseFloat(unformatNumber(jQuery('#boat12').val(),num_grp_sep,dec_sep));
    guide12 = parseFloat(unformatNumber(jQuery('#guide12').val(),num_grp_sep,dec_sep));
    group12 = parseFloat(unformatNumber(jQuery('#group12').val(),num_grp_sep,dec_sep));
    entrance12 = parseFloat(unformatNumber(jQuery('#entrance12').val(),num_grp_sep,dec_sep));
    ticket12 = parseFloat(unformatNumber(jQuery('#ticket12').val(),num_grp_sep,dec_sep));
    fit12 = parseFloat(unformatNumber(jQuery('#fit12').val(),num_grp_sep,dec_sep));
    meal1_12 = parseFloat(unformatNumber(jQuery('#meal1_12').val(),num_grp_sep,dec_sep));
    hotel1_12 = parseFloat(unformatNumber(jQuery('#hotel1_12').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer12) || transfer12 == ''){transfer12 = 0}
    if(isNaN(boat12) || boat12 == ''){boat12 = 0}
    if(isNaN(guide12) || guide12 == ''){guide12 = 0}
    if(isNaN(group12) || group12 == ''){group12 = 0}
    if(isNaN(entrance12) || entrance12 == ''){entrance12 = 0}
    if(isNaN(ticket12) || ticket12 == ''){ticket12 = 0}
    if(isNaN(fit12) || fit12 == ''){fit12 = 0}
    if(isNaN(meal1_12) || meal1_12 == ''){meal1_12 = 0}
    if(isNaN(hotel1_12) || hotel1_12 == ''){hotel1_12 = 0}
    nett1_12 = Math.round(transfer12+boat12+group12+fit12+meal1_12+hotel1_12,2)
    if(nett1_12 != Infinity){
        if(!isNaN(nett1_12)){
            jQuery('#nett1_12').val(formatNumber(nett1_12,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_12').val('0');
    }
    // end nett 12


    // nett 13
    transfer13 = parseFloat(unformatNumber(jQuery('#transfer13').val(),num_grp_sep,dec_sep));
    boat13 = parseFloat(unformatNumber(jQuery('#boat13').val(),num_grp_sep,dec_sep));
    guide7 = parseFloat(unformatNumber(jQuery('#guide7').val(),num_grp_sep,dec_sep));
    group13 = parseFloat(unformatNumber(jQuery('#group13').val(),num_grp_sep,dec_sep));
    entrance13 = parseFloat(unformatNumber(jQuery('#entrance7').val(),num_grp_sep,dec_sep));
    ticket13 = parseFloat(unformatNumber(jQuery('#ticket7').val(),num_grp_sep,dec_sep));
    fit13 = parseFloat(unformatNumber(jQuery('#fit13').val(),num_grp_sep,dec_sep));
    meal1_13 = parseFloat(unformatNumber(jQuery('#meal1_13').val(),num_grp_sep,dec_sep));
    hotel1_13 = parseFloat(unformatNumber(jQuery('#hotel1_13').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer13) || transfer13 == ''){transfer13 = 0}
    if(isNaN(boat13) || boat13 == ''){boat13 = 0}
    if(isNaN(guide7) || guide7 == ''){guide7 = 0}
    if(isNaN(group13) || group13 == ''){group13 = 0}
    if(isNaN(entrance13) || entrance13 == ''){entrance13 = 0}
    if(isNaN(ticket13) || ticket13 == ''){ticket13 = 0}
    if(isNaN(fit13) || fit13 == ''){fit13 = 0}
    if(isNaN(meal1_13) || meal1_13 == ''){meal1_13 = 0}
    if(isNaN(hotel1_13) || hotel1_13 == ''){hotel1_13 = 0}
    nett1_13 = Math.round(transfer13+boat13+guide7+group13+entrance13+ticket13+fit13+meal1_13+hotel1_13,2)
    if(nett1_13 != Infinity){
        if(!isNaN(nett1_13)){
            jQuery('#nett1_13').val(formatNumber(nett1_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_13').val('0');
    }
    // end nett 13


    // nett 14
    transfer14 = parseFloat(unformatNumber(jQuery('#transfer14').val(),num_grp_sep,dec_sep));
    boat14 = parseFloat(unformatNumber(jQuery('#boat14').val(),num_grp_sep,dec_sep));
    guide8 = parseFloat(unformatNumber(jQuery('#guide8').val(),num_grp_sep,dec_sep));
    group14 = parseFloat(unformatNumber(jQuery('#group14').val(),num_grp_sep,dec_sep));
    entrance14 = parseFloat(unformatNumber(jQuery('#entrance8').val(),num_grp_sep,dec_sep));
    ticket14 = parseFloat(unformatNumber(jQuery('#ticket8').val(),num_grp_sep,dec_sep));
    fit14 = parseFloat(unformatNumber(jQuery('#fit14').val(),num_grp_sep,dec_sep));
    meal1_14 = parseFloat(unformatNumber(jQuery('#meal1_14').val(),num_grp_sep,dec_sep));
    hotel1_14 = parseFloat(unformatNumber(jQuery('#hotel1_14').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer14) || transfer14 == ''){transfer14 = 0}
    if(isNaN(boat14) || boat14 == ''){boat14 = 0}
    if(isNaN(guide8) || guide8 == ''){guide8 = 0}
    if(isNaN(group14) || group14 == ''){group14 = 0}
    if(isNaN(entrance14) || entrance14 == ''){entrance14 = 0}
    if(isNaN(ticket14) || ticket14 == ''){ticket14 = 0}
    if(isNaN(fit14) || fit14 == ''){fit14 = 0}
    if(isNaN(meal1_14) || meal1_14 == ''){meal1_14 = 0}
    if(isNaN(hotel1_14) || hotel1_14 == ''){hotel1_14 = 0}
    nett1_14 = Math.round(transfer14+boat14+guide8+group14+entrance14+ticket14+fit14+meal1_14+hotel1_14,2)
    if(nett1_14 != Infinity){
        if(!isNaN(nett1_14)){
            jQuery('#nett1_14').val(formatNumber(nett1_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_14').val('0');
    }
    // end nett 14

    // nett 15
    transfer15 = parseFloat(unformatNumber(jQuery('#transfer15').val(),num_grp_sep,dec_sep));
    boat15 = parseFloat(unformatNumber(jQuery('#boat15').val(),num_grp_sep,dec_sep));
    guide15 = parseFloat(unformatNumber(jQuery('#guide15').val(),num_grp_sep,dec_sep));
    group15 = parseFloat(unformatNumber(jQuery('#group15').val(),num_grp_sep,dec_sep));
    entrance15 = parseFloat(unformatNumber(jQuery('#entrance15').val(),num_grp_sep,dec_sep));
    ticket15 = parseFloat(unformatNumber(jQuery('#ticket15').val(),num_grp_sep,dec_sep));
    fit15 = parseFloat(unformatNumber(jQuery('#fit15').val(),num_grp_sep,dec_sep));
    meal1_15 = parseFloat(unformatNumber(jQuery('#meal1_15').val(),num_grp_sep,dec_sep));
    hotel1_15 = parseFloat(unformatNumber(jQuery('#hotel1_15').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer15) || transfer15 == ''){transfer15 = 0}
    if(isNaN(boat15) || boat15 == ''){boat15 = 0}
    if(isNaN(guide15) || guide15 == ''){guide15 = 0}
    if(isNaN(group15) || group15 == ''){group15 = 0}
    if(isNaN(entrance15) || entrance15 == ''){entrance15 = 0}
    if(isNaN(ticket15) || ticket15 == ''){ticket15 = 0}
    if(isNaN(fit15) || fit15 == ''){fit15 = 0}
    if(isNaN(meal1_15) || meal1_15 == ''){meal1_15 = 0}
    if(isNaN(hotel1_15) || hotel1_15 == ''){hotel1_15 = 0}
    nett1_15 = Math.round(transfer15+boat15+group15+fit15+meal1_15+hotel1_15,2)
    if(nett1_15 != Infinity){
        if(!isNaN(nett1_15)){
            jQuery('#nett1_15').val(formatNumber(nett1_15,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_15').val('0');
    }
    // end nett 15


    // nett 16
    transfer16 = parseFloat(unformatNumber(jQuery('#transfer16').val(),num_grp_sep,dec_sep));
    boat16 = parseFloat(unformatNumber(jQuery('#boat16').val(),num_grp_sep,dec_sep));
    guide16 = parseFloat(unformatNumber(jQuery('#guide16').val(),num_grp_sep,dec_sep));
    group16 = parseFloat(unformatNumber(jQuery('#group16').val(),num_grp_sep,dec_sep));
    entrance16 = parseFloat(unformatNumber(jQuery('#entrance16').val(),num_grp_sep,dec_sep));
    ticket16 = parseFloat(unformatNumber(jQuery('#ticket16').val(),num_grp_sep,dec_sep));
    fit16 = parseFloat(unformatNumber(jQuery('#fit16').val(),num_grp_sep,dec_sep));
    meal1_16 = parseFloat(unformatNumber(jQuery('#meal1_16').val(),num_grp_sep,dec_sep));
    hotel1_16 = parseFloat(unformatNumber(jQuery('#hotel1_16').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer16) || transfer16 == ''){transfer16 = 0}
    if(isNaN(boat16) || boat16 == ''){boat16 = 0}
    if(isNaN(guide16) || guide16 == ''){guide16 = 0}
    if(isNaN(group16) || group16 == ''){group16 = 0}
    if(isNaN(entrance16) || entrance16 == ''){entrance16 = 0}
    if(isNaN(ticket16) || ticket16 == ''){ticket16 = 0}
    if(isNaN(fit16) || fit16 == ''){fit16 = 0}
    if(isNaN(meal1_16) || meal1_16 == ''){meal1_16 = 0}
    if(isNaN(hotel1_16) || hotel1_16 == ''){hotel1_16 = 0}
    nett1_16 = Math.round(transfer16+boat16+group16+fit16+meal1_16+hotel1_16,2)
    if(nett1_16 != Infinity){
        if(!isNaN(nett1_16)){
            jQuery('#nett1_16').val(formatNumber(nett1_16,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_16').val('0');
    }
    // end nett 16


    // nett 17
    transfer17 = parseFloat(unformatNumber(jQuery('#transfer17').val(),num_grp_sep,dec_sep));
    boat17 = parseFloat(unformatNumber(jQuery('#boat17').val(),num_grp_sep,dec_sep));
    guide9 = parseFloat(unformatNumber(jQuery('#guide9').val(),num_grp_sep,dec_sep));
    group17 = parseFloat(unformatNumber(jQuery('#group17').val(),num_grp_sep,dec_sep));
    entrance17 = parseFloat(unformatNumber(jQuery('#entrance9').val(),num_grp_sep,dec_sep));
    ticket17 = parseFloat(unformatNumber(jQuery('#ticket9').val(),num_grp_sep,dec_sep));
    fit17 = parseFloat(unformatNumber(jQuery('#fit17').val(),num_grp_sep,dec_sep));
    meal1_17 = parseFloat(unformatNumber(jQuery('#meal1_17').val(),num_grp_sep,dec_sep));
    hotel1_17 = parseFloat(unformatNumber(jQuery('#hotel1_17').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer17) || transfer17 == ''){transfer17 = 0}
    if(isNaN(boat17 || boat17 == '')){boat17 = 0}
    if(isNaN(guide9) || guide9 == ''){guide9 = 0}
    if(isNaN(group17) || group17 == ''){group17 = 0}
    if(isNaN(entrance17) || entrance17 == ''){entrance17 = 0}
    if(isNaN(ticket17) || ticket17 == ''){ticket17 = 0}
    if(isNaN(fit17) || fit17 == ''){fit17 = 0}
    if(isNaN(meal1_17) || meal1_17 == ''){meal1_17 = 0}
    if(isNaN(hotel1_17) || hotel1_17 == ''){hotel1_17 = 0}
    nett1_17 = Math.round(transfer17+boat17+guide9+group17+entrance17+ticket17+fit17+meal1_17+hotel1_17,2)
    if(nett1_17 != Infinity){
        if(!isNaN(nett1_17)){
            jQuery('#nett1_17').val(formatNumber(nett1_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_17').val('0');
    }
    // end nett 17

    // nett 18
    transfer18 = parseFloat(unformatNumber(jQuery('#transfer18').val(),num_grp_sep,dec_sep));
    boat18 = parseFloat(unformatNumber(jQuery('#boat18').val(),num_grp_sep,dec_sep));
    guide10 = parseFloat(unformatNumber(jQuery('#guide10').val(),num_grp_sep,dec_sep));
    group18 = parseFloat(unformatNumber(jQuery('#group18').val(),num_grp_sep,dec_sep));
    entrance18 = parseFloat(unformatNumber(jQuery('#entrance10').val(),num_grp_sep,dec_sep));
    ticket18 = parseFloat(unformatNumber(jQuery('#ticket10').val(),num_grp_sep,dec_sep));
    fit18 = parseFloat(unformatNumber(jQuery('#fit18').val(),num_grp_sep,dec_sep));
    meal1_18 = parseFloat(unformatNumber(jQuery('#meal1_18').val(),num_grp_sep,dec_sep));
    hotel1_18 = parseFloat(unformatNumber(jQuery('#hotel1_18').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer18) || transfer18 == ''){transfer18 = 0}
    if(isNaN(boat18 || boat18 == '')){boat18 = 0}
    if(isNaN(guide10) || guide10 == ''){guide10 = 0}
    if(isNaN(group18) || group18 == ''){group18 = 0}
    if(isNaN(entrance18) || entrance18 == ''){entrance18 = 0}
    if(isNaN(ticket18) || ticket18 == ''){ticket18 = 0}
    if(isNaN(fit18) || fit18 == ''){fit18 = 0}
    if(isNaN(meal1_18) || meal1_18 == ''){meal1_18 = 0}
    if(isNaN(hotel1_18) || hotel1_18 == ''){hotel1_18 = 0}
    nett1_18 = Math.round(transfer18+boat18+guide10+group18+entrance18+ticket18+fit18+meal1_18+hotel1_18,2)
    if(nett1_18 != Infinity){
        if(!isNaN(nett1_18)){
            jQuery('#nett1_18').val(formatNumber(nett1_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_18').val('0');
    }
    // end nett 18

    // nett 19
    transfer19 = parseFloat(unformatNumber(jQuery('#transfer19').val(),num_grp_sep,dec_sep));
    boat19 = parseFloat(unformatNumber(jQuery('#boat19').val(),num_grp_sep,dec_sep));
    guide19 = parseFloat(unformatNumber(jQuery('#guide19').val(),num_grp_sep,dec_sep));
    group19 = parseFloat(unformatNumber(jQuery('#group19').val(),num_grp_sep,dec_sep));
    entrance19 = parseFloat(unformatNumber(jQuery('#entrance19').val(),num_grp_sep,dec_sep));
    ticket19 = parseFloat(unformatNumber(jQuery('#ticket19').val(),num_grp_sep,dec_sep));
    fit19 = parseFloat(unformatNumber(jQuery('#fit19').val(),num_grp_sep,dec_sep));
    meal1_19 = parseFloat(unformatNumber(jQuery('#meal1_19').val(),num_grp_sep,dec_sep));
    hotel1_19 = parseFloat(unformatNumber(jQuery('#hotel1_19').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer19) || transfer19 == ''){transfer19 = 0}
    if(isNaN(boat19 || boat19 == '')){boat19 = 0}
    if(isNaN(guide19) || guide19 == ''){guide19 = 0}
    if(isNaN(group19) || group19 == ''){group19 = 0}
    if(isNaN(entrance19) || entrance19 == ''){entrance19 = 0}
    if(isNaN(ticket19) || ticket19 == ''){ticket19 = 0}
    if(isNaN(fit19) || fit19 == ''){fit19 = 0}
    if(isNaN(meal1_19) || meal1_19 == ''){meal1_19 = 0}
    if(isNaN(hotel1_19) || hotel1_19 == ''){hotel1_19 = 0}
    nett1_19 = Math.round(transfer19+boat19+group19+fit19+meal1_19+hotel1_19,2)
    if(nett1_19 != Infinity){
        if(!isNaN(nett1_19)){
            jQuery('#nett1_19').val(formatNumber(nett1_19,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_19').val('0');
    }
    // end nett 19


    // nett 20
    transfer20 = parseFloat(unformatNumber(jQuery('#transfer20').val(),num_grp_sep,dec_sep));
    boat20 = parseFloat(unformatNumber(jQuery('#boat20').val(),num_grp_sep,dec_sep));
    guide20 = parseFloat(unformatNumber(jQuery('#guide20').val(),num_grp_sep,dec_sep));
    group20 = parseFloat(unformatNumber(jQuery('#group20').val(),num_grp_sep,dec_sep));
    entrance20 = parseFloat(unformatNumber(jQuery('#entrance20').val(),num_grp_sep,dec_sep));
    ticket20 = parseFloat(unformatNumber(jQuery('#ticket20').val(),num_grp_sep,dec_sep));
    fit20 = parseFloat(unformatNumber(jQuery('#fit20').val(),num_grp_sep,dec_sep));
    meal1_20 = parseFloat(unformatNumber(jQuery('#meal1_20').val(),num_grp_sep,dec_sep));
    hotel1_20 = parseFloat(unformatNumber(jQuery('#hotel1_20').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer20) || transfer20 == ''){transfer20 = 0}
    if(isNaN(boat20 || boat20 == '')){boat20 = 0}
    if(isNaN(guide20) || guide20 == ''){guide20 = 0}
    if(isNaN(group20) || group20 == ''){group20 = 0}
    if(isNaN(entrance20) || entrance20 == ''){entrance20 = 0}
    if(isNaN(ticket20) || ticket20 == ''){ticket20 = 0}
    if(isNaN(fit20) || fit20 == ''){fit20 = 0}
    if(isNaN(meal1_20) || meal1_20 == ''){meal1_20 = 0}
    if(isNaN(hotel1_20) || hotel1_20 == ''){hotel1_20 = 0}
    nett1_20 = Math.round(transfer20+boat20+group20+fit20+meal1_20+hotel1_20,2)
    if(nett1_20 != Infinity){
        if(!isNaN(nett1_20)){
            jQuery('#nett1_20').val(formatNumber(nett1_20,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_20').val('0');
    }
    // end nett 20

    // nett 21
    transfer21 = parseFloat(unformatNumber(jQuery('#transfer21').val(),num_grp_sep,dec_sep));
    boat21 = parseFloat(unformatNumber(jQuery('#boat21').val(),num_grp_sep,dec_sep));
    guide11 = parseFloat(unformatNumber(jQuery('#guide11').val(),num_grp_sep,dec_sep));
    group21 = parseFloat(unformatNumber(jQuery('#group21').val(),num_grp_sep,dec_sep));
    entrance21 = parseFloat(unformatNumber(jQuery('#entrance11').val(),num_grp_sep,dec_sep));
    ticket21 = parseFloat(unformatNumber(jQuery('#ticket11').val(),num_grp_sep,dec_sep));
    fit21 = parseFloat(unformatNumber(jQuery('#fit21').val(),num_grp_sep,dec_sep));
    meal1_21 = parseFloat(unformatNumber(jQuery('#meal1_21').val(),num_grp_sep,dec_sep));
    hotel1_21 = parseFloat(unformatNumber(jQuery('#hotel1_21').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer21) || transfer21 == ''){transfer21 = 0}
    if(isNaN(boat21 || boat21 == '')){boat21 = 0}
    if(isNaN(guide11) || guide11 == ''){guide11 = 0}
    if(isNaN(group21) || group21 == ''){group21 = 0}
    if(isNaN(entrance21) || entrance21 == ''){entrance21 = 0}
    if(isNaN(ticket21) || ticket21 == ''){ticket21 = 0}
    if(isNaN(fit21) || fit21 == ''){fit21 = 0}
    if(isNaN(meal1_21) || meal1_21 == ''){meal1_21 = 0}
    if(isNaN(hotel1_21) || hotel1_21 == ''){hotel1_21 = 0}
    
    entrance_sum = parseFloat(unformatNumber(jQuery('#entrance_sum').val(),num_grp_sep,dec_sep));
    ticket_sum = parseFloat(unformatNumber(jQuery('#ticket_sum').val(),num_grp_sep,dec_sep));
    fit_sum = parseFloat(unformatNumber(jQuery('#fit_sum').val(),num_grp_sep,dec_sep));
    meal1_sum = parseFloat(unformatNumber(jQuery('#meal1_sum').val(),num_grp_sep,dec_sep));
    hotel1_sum = parseFloat(unformatNumber(jQuery('#hotel1_sum').val(),num_grp_sep,dec_sep));
    
    if(entrance_sum == '' || isNaN(entrance_sum)){entrance_sum =0}
    if(ticket_sum == '' || isNaN(ticket_sum)){ticket_sum =0}
    if(fit_sum == '' || isNaN(fit_sum)){fit_sum =0}
    if(meal1_sum == '' || isNaN(meal1_sum)){meal1_sum =0}
    if(hotel1_sum == '' || isNaN(hotel1_sum)){hotel1_sum =0}

    // foc cho khach
    foc1_21 = Math.round((entrance_sum+ticket_sum+fit_sum+meal1_sum+hotel1_sum)/soluongkh11,2);
    // end foc cho khach
    if(foc1_21 != Infinity){
        if(!isNaN(foc1_21)){
            jQuery('#foc1_21').val(formatNumber(foc1_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_21').val('0');
    }

    foc1_23 = Math.round(foc1_21/11,2);
    if(foc1_23 != Infinity){
        if(!isNaN(foc1_23)){
            jQuery('#foc1_23').val(formatNumber(foc1_23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_23').val('0');
    }


    nett1_21 = Math.round(transfer21+boat21+guide11+group21+entrance21+ticket21+fit21+meal1_21+hotel1_21+foc1_21,2)
    if(nett1_21 != Infinity){
        if(!isNaN(nett1_21)){
            jQuery('#nett1_21').val(formatNumber(nett1_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_21').val('0');
    }
    // end nett 21

    // nett 22
    transfer22 = parseFloat(unformatNumber(jQuery('#transfer22').val(),num_grp_sep,dec_sep));
    boat22 = parseFloat(unformatNumber(jQuery('#boat22').val(),num_grp_sep,dec_sep));
    guide12 = parseFloat(unformatNumber(jQuery('#guide12').val(),num_grp_sep,dec_sep));
    group22 = parseFloat(unformatNumber(jQuery('#group22').val(),num_grp_sep,dec_sep));
    entrance22 = parseFloat(unformatNumber(jQuery('#entrance12').val(),num_grp_sep,dec_sep));
    ticket22 = parseFloat(unformatNumber(jQuery('#ticket12').val(),num_grp_sep,dec_sep));
    fit22 = parseFloat(unformatNumber(jQuery('#fit22').val(),num_grp_sep,dec_sep));
    meal1_22 = parseFloat(unformatNumber(jQuery('#meal1_22').val(),num_grp_sep,dec_sep));
    hotel1_22 = parseFloat(unformatNumber(jQuery('#hotel1_22').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer22) || transfer22 == ''){transfer22 = 0}
    if(isNaN(boat22 || boat22 == '')){boat22 = 0}
    if(isNaN(guide12) || guide12 == ''){guide12 = 0}
    if(isNaN(group22) || group22 == ''){group22 = 0}
    if(isNaN(entrance22) || entrance22 == ''){entrance22 = 0}
    if(isNaN(ticket22) || ticket22 == ''){ticket22 = 0}
    if(isNaN(fit22) || fit22 == ''){fit22 = 0}
    if(isNaN(meal1_22) || meal1_22 == ''){meal1_22 = 0}
    if(isNaN(hotel1_22) || hotel1_22 == ''){hotel1_22 = 0}

    foc1_22 = Math.round((entrance_sum+ticket_sum+fit_sum+meal1_sum+hotel1_sum)/soluongkh12,2) ;
    if(foc1_22 != Infinity){
        if(!isNaN(foc1_22)){
            jQuery('#foc1_22').val(formatNumber(foc1_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_22').val('0');
    }

    foc1_24 = Math.round(foc1_22/11,2);
    if(foc1_24 != Infinity){
        if(!isNaN(foc1_24)){
            jQuery('#foc1_24').val(formatNumber(foc1_24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_24').val('0');
    }

    nett1_22 = Math.round(transfer22+boat22+guide12+group22+entrance22+ticket22+fit22+meal1_22+hotel1_22+foc1_22,2)
    if(nett1_22 != Infinity){
        if(!isNaN(nett1_22)){
            jQuery('#nett1_22').val(formatNumber(nett1_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_22').val('0');
    }

    // end nett 22

    // nett 23
    transfer23 = parseFloat(unformatNumber(jQuery('#transfer23').val(),num_grp_sep,dec_sep));
    boat23 = parseFloat(unformatNumber(jQuery('#boat23').val(),num_grp_sep,dec_sep));
    guide23 = parseFloat(unformatNumber(jQuery('#guide23').val(),num_grp_sep,dec_sep));
    group23 = parseFloat(unformatNumber(jQuery('#group23').val(),num_grp_sep,dec_sep));
    entrance23 = parseFloat(unformatNumber(jQuery('#entrance23').val(),num_grp_sep,dec_sep));
    ticket23 = parseFloat(unformatNumber(jQuery('#ticket23').val(),num_grp_sep,dec_sep));
    fit23 = parseFloat(unformatNumber(jQuery('#fit23').val(),num_grp_sep,dec_sep));
    meal1_23 = parseFloat(unformatNumber(jQuery('#meal1_23').val(),num_grp_sep,dec_sep));
    hotel1_23 = parseFloat(unformatNumber(jQuery('#hotel1_23').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer23) || transfer23 == ''){transfer23 = 0}
    if(isNaN(boat23 || boat23 == '')){boat23 = 0}
    if(isNaN(guide23) || guide23 == ''){guide23 = 0}
    if(isNaN(group23) || group23 == ''){group23 = 0}
    if(isNaN(entrance23) || entrance23 == ''){entrance23 = 0}
    if(isNaN(ticket23) || ticket23 == ''){ticket23 = 0}
    if(isNaN(fit23) || fit23 == ''){fit23 = 0}
    if(isNaN(meal1_23) || meal1_23 == ''){meal1_23 = 0}
    if(isNaN(hotel1_23) || hotel1_23 == ''){hotel1_23 = 0}
    nett1_23 = Math.round(transfer23+boat23+group23+fit23+meal1_23+hotel1_23+foc1_23,2)
    if(nett1_23 != Infinity){
        if(!isNaN(nett1_23)){
            jQuery('#nett1_23').val(formatNumber(nett1_23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_23').val('0');
    }
    // end nett 23

    // nett 24
    transfer24 = parseFloat(unformatNumber(jQuery('#transfer24').val(),num_grp_sep,dec_sep));
    boat24 = parseFloat(unformatNumber(jQuery('#boat24').val(),num_grp_sep,dec_sep));
    guide24 = parseFloat(unformatNumber(jQuery('#guide24').val(),num_grp_sep,dec_sep));
    group24 = parseFloat(unformatNumber(jQuery('#group24').val(),num_grp_sep,dec_sep));
    entrance24 = parseFloat(unformatNumber(jQuery('#entrance24').val(),num_grp_sep,dec_sep));
    ticket24 = parseFloat(unformatNumber(jQuery('#ticket24').val(),num_grp_sep,dec_sep));
    fit24 = parseFloat(unformatNumber(jQuery('#fit24').val(),num_grp_sep,dec_sep));
    meal1_24 = parseFloat(unformatNumber(jQuery('#meal1_24').val(),num_grp_sep,dec_sep));
    hotel1_24 = parseFloat(unformatNumber(jQuery('#hotel1_24').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer24) || transfer24 == ''){transfer24 = 0}
    if(isNaN(boat24 || boat24 == '')){boat24 = 0}
    if(isNaN(guide24) || guide24 == ''){guide24 = 0}
    if(isNaN(group24) || group24 == ''){group24 = 0}
    if(isNaN(entrance24) || entrance24 == ''){entrance24 = 0}
    if(isNaN(ticket24) || ticket24 == ''){ticket24 = 0}
    if(isNaN(fit24) || fit24 == ''){fit24 = 0}
    if(isNaN(meal1_24) || meal1_24 == ''){meal1_24 = 0}
    if(isNaN(hotel1_24) || hotel1_24 == ''){hotel1_24 = 0}
    nett1_24 = Math.round(transfer24+boat24+group24+fit24+meal1_24+hotel1_24+foc1_24,2)
    if(nett1_24 != Infinity){
        if(!isNaN(nett1_24)){
            jQuery('#nett1_24').val(formatNumber(nett1_24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_24').val('0');
    }
    // end nett 24


    // nett 25
    transfer25 = parseFloat(unformatNumber(jQuery('#transfer25').val(),num_grp_sep,dec_sep));
    boat25 = parseFloat(unformatNumber(jQuery('#boat25').val(),num_grp_sep,dec_sep));
    guide13 = parseFloat(unformatNumber(jQuery('#guide13').val(),num_grp_sep,dec_sep));
    group25 = parseFloat(unformatNumber(jQuery('#group25').val(),num_grp_sep,dec_sep));
    entrance25 = parseFloat(unformatNumber(jQuery('#entrance13').val(),num_grp_sep,dec_sep));
    ticket25 = parseFloat(unformatNumber(jQuery('#ticket13').val(),num_grp_sep,dec_sep));
    fit25 = parseFloat(unformatNumber(jQuery('#fit25').val(),num_grp_sep,dec_sep));
    meal1_25 = parseFloat(unformatNumber(jQuery('#meal1_25').val(),num_grp_sep,dec_sep));
    hotel1_25 = parseFloat(unformatNumber(jQuery('#hotel1_25').val(),num_grp_sep,dec_sep));



    if(isNaN(transfer25) || transfer25 == ''){transfer24 = 0}
    if(isNaN(boat25 || boat25 == '')){boat25 = 0}
    if(isNaN(guide13) || guide13 == ''){guide13 = 0}
    if(isNaN(group25) || group25 == ''){group25 = 0}
    if(isNaN(entrance25) || entrance25 == ''){entrance25 = 0}
    if(isNaN(ticket25) || ticket25 == ''){ticket25 = 0}
    if(isNaN(fit25) || fit25 == ''){fit25 = 0}
    if(isNaN(meal1_25) || meal1_25 == ''){meal1_25 = 0}
    if(isNaN(hotel1_25) || hotel1_25 == ''){hotel1_25 = 0}

    if(soluongkh13 <30){
        foc1_25 = Math.round((entrance_sum+ticket_sum+fit_sum+meal1_sum+hotel1_sum)/soluongkh13,2);
    }
    else if(soluongkh13 >= 30){
        foc1_25 = Math.round(((entrance_sum+ticket_sum+fit_sum+meal1_sum+hotel1_sum)*2)/soluongkh13,2);
    }

    if(foc1_25 != Infinity){
        if(!isNaN(foc1_25)){
            jQuery('#foc1_25').val(formatNumber(foc1_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_25').val('0');
    }

    foc1_28 =  Math.round(foc1_25/11,2);
    if(foc1_28 != Infinity){
        if(!isNaN(foc1_28)){
            jQuery('#foc1_28').val(formatNumber(foc1_28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_28').val('0');
    }

    nett1_25 = Math.round(transfer25+boat25+guide13+group25+entrance25+ticket25+fit25+meal1_25+hotel1_25+foc1_25,2)
    if(nett1_25 != Infinity){
        if(!isNaN(nett1_25)){
            jQuery('#nett1_25').val(formatNumber(nett1_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_25').val('0');
    }
    // end nett 25

    // nett 26
    transfer26 = parseFloat(unformatNumber(jQuery('#transfer26').val(),num_grp_sep,dec_sep));
    boat26 = parseFloat(unformatNumber(jQuery('#boat26').val(),num_grp_sep,dec_sep));
    guide14 = parseFloat(unformatNumber(jQuery('#guide14').val(),num_grp_sep,dec_sep));
    group26 = parseFloat(unformatNumber(jQuery('#group26').val(),num_grp_sep,dec_sep));
    entrance26 = parseFloat(unformatNumber(jQuery('#entrance14').val(),num_grp_sep,dec_sep));
    ticket26 = parseFloat(unformatNumber(jQuery('#ticket14').val(),num_grp_sep,dec_sep));
    fit26 = parseFloat(unformatNumber(jQuery('#fit26').val(),num_grp_sep,dec_sep));
    meal1_26 = parseFloat(unformatNumber(jQuery('#meal1_26').val(),num_grp_sep,dec_sep));
    hotel1_26 = parseFloat(unformatNumber(jQuery('#hotel1_26').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer26) || transfer26 == ''){transfer26 = 0}
    if(isNaN(boat26 || boat26 == '')){boat26 = 0}
    if(isNaN(guide14) || guide14 == ''){guide14 = 0}
    if(isNaN(group26) || group26 == ''){group26 = 0}
    if(isNaN(entrance26) || entrance26 == ''){entrance26 = 0}
    if(isNaN(ticket26) || ticket26 == ''){ticket26 = 0}
    if(isNaN(fit26) || fit26 == ''){fit26 = 0}
    if(isNaN(meal1_26) || meal1_26 == ''){meal1_26 = 0}
    if(isNaN(hotel1_26) || hotel1_26 == ''){hotel1_26 = 0}

    if(soluongkh14 <30){
        foc1_26 = Math.round((entrance_sum+ticket_sum+fit_sum+meal1_sum+hotel1_sum)/soluongkh14,2);
    }
    else if(soluongkh14 >= 30){
        foc1_26 = Math.round(((entrance_sum+ticket_sum+fit_sum+meal1_sum+hotel1_sum)*2)/soluongkh14,2);
    }

    if(foc1_26 != Infinity){
        if(!isNaN(foc1_26)){
            jQuery('#foc1_26').val(formatNumber(foc1_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_26').val('0');
    }

    foc1_29 =  Math.round(foc1_26/11,2);
    if(foc1_29 != Infinity){
        if(!isNaN(foc1_29)){
            jQuery('#foc1_29').val(formatNumber(foc1_29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_29').val('0');
    }

    nett1_26 = Math.round(transfer26+boat26+guide14+group26+entrance26+ticket26+fit26+meal1_26+hotel1_26+foc1_26,2)
    if(nett1_26 != Infinity){
        if(!isNaN(nett1_26)){
            jQuery('#nett1_26').val(formatNumber(nett1_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_26').val('0');
    }
    // end nett 26


    // nett 27
    transfer27 = parseFloat(unformatNumber(jQuery('#transfer27').val(),num_grp_sep,dec_sep));
    boat27 = parseFloat(unformatNumber(jQuery('#boat27').val(),num_grp_sep,dec_sep));
    guide15 = parseFloat(unformatNumber(jQuery('#guide15').val(),num_grp_sep,dec_sep));
    group27 = parseFloat(unformatNumber(jQuery('#group27').val(),num_grp_sep,dec_sep));
    entrance27 = parseFloat(unformatNumber(jQuery('#entrance15').val(),num_grp_sep,dec_sep));
    ticket27 = parseFloat(unformatNumber(jQuery('#ticket15').val(),num_grp_sep,dec_sep));
    fit27 = parseFloat(unformatNumber(jQuery('#fit27').val(),num_grp_sep,dec_sep));
    meal1_27 = parseFloat(unformatNumber(jQuery('#meal1_27').val(),num_grp_sep,dec_sep));
    hotel1_27 = parseFloat(unformatNumber(jQuery('#hotel1_27').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer27) || transfer27 == ''){transfer27 = 0}
    if(isNaN(boat27 || boat27 == '')){boat27 = 0}
    if(isNaN(guide15) || guide15 == ''){guide15 = 0}
    if(isNaN(group27) || group27 == ''){group27 = 0}
    if(isNaN(entrance27) || entrance27 == ''){entrance27 = 0}
    if(isNaN(ticket27) || ticket27 == ''){ticket27 = 0}
    if(isNaN(fit27) || fit27 == ''){fit27 = 0}
    if(isNaN(meal1_27) || meal1_27 == ''){meal1_27 = 0}
    if(isNaN(hotel1_27) || hotel1_26 == ''){hotel1_26 = 0}

    if(soluongkh15 <30){
        foc1_27 = Math.round((entrance_sum+ticket_sum+fit_sum+meal1_sum+hotel1_sum)/soluongkh15,2);
    }
    else if(soluongkh15 >= 30){
        foc1_27 = Math.round(((entrance_sum+ticket_sum+fit_sum+meal1_sum+hotel1_sum)*2)/soluongkh15,2);
    }

    if(foc1_27 != Infinity){
        if(!isNaN(foc1_27)){
            jQuery('#foc1_27').val(formatNumber(foc1_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_27').val('0');
    }

    foc1_30 =  Math.round(foc1_27/11,2);
    if(foc1_30 != Infinity){
        if(!isNaN(foc1_30)){
            jQuery('#foc1_30').val(formatNumber(foc1_30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc1_30').val('0');
    }

    nett1_27 = Math.round(transfer27+boat27+guide15+group27+entrance27+ticket27+fit27+meal1_27+hotel1_27+foc1_27,2)
    if(nett1_27 != Infinity){
        if(!isNaN(nett1_27)){
            jQuery('#nett1_27').val(formatNumber(nett1_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_27').val('0');
    }
    // end nett 27


    // nett 28
    transfer28 = parseFloat(unformatNumber(jQuery('#transfer28').val(),num_grp_sep,dec_sep));
    boat28 = parseFloat(unformatNumber(jQuery('#boat28').val(),num_grp_sep,dec_sep));
    guide28 = parseFloat(unformatNumber(jQuery('#guide28').val(),num_grp_sep,dec_sep));
    group28 = parseFloat(unformatNumber(jQuery('#group28').val(),num_grp_sep,dec_sep));
    entrance28 = parseFloat(unformatNumber(jQuery('#entrance28').val(),num_grp_sep,dec_sep));
    ticket28 = parseFloat(unformatNumber(jQuery('#ticket28').val(),num_grp_sep,dec_sep));
    fit28 = parseFloat(unformatNumber(jQuery('#fit28').val(),num_grp_sep,dec_sep));
    meal1_28 = parseFloat(unformatNumber(jQuery('#meal1_28').val(),num_grp_sep,dec_sep));
    hotel1_28 = parseFloat(unformatNumber(jQuery('#hotel1_28').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer28) || transfer28 == ''){transfer28 = 0}
    if(isNaN(boat28 || boat28 == '')){boat28 = 0}
    if(isNaN(guide28) || guide28 == ''){guide28 = 0}
    if(isNaN(group28) || group28 == ''){group28 = 0}
    if(isNaN(entrance28) || entrance28 == ''){entrance28 = 0}
    if(isNaN(ticket28) || ticket28 == ''){ticket28 = 0}
    if(isNaN(fit28) || fit28 == ''){fit28 = 0}
    if(isNaN(meal1_28) || meal1_28 == ''){meal1_28 = 0}
    if(isNaN(hotel1_28) || hotel1_28 == ''){hotel1_28 = 0}
    nett1_28 = Math.round(transfer28+boat28+group28+fit28+meal1_28+hotel1_28+foc1_28,2)
    if(nett1_28 != Infinity){
        if(!isNaN(nett1_28)){
            jQuery('#nett1_28').val(formatNumber(nett1_28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_28').val('0');
    }
    // end nett 28

    // nett 29
    transfer29 = parseFloat(unformatNumber(jQuery('#transfer29').val(),num_grp_sep,dec_sep));
    boat29 = parseFloat(unformatNumber(jQuery('#boat29').val(),num_grp_sep,dec_sep));
    guide29 = parseFloat(unformatNumber(jQuery('#guide29').val(),num_grp_sep,dec_sep));
    group29 = parseFloat(unformatNumber(jQuery('#group29').val(),num_grp_sep,dec_sep));
    entrance29 = parseFloat(unformatNumber(jQuery('#entrance29').val(),num_grp_sep,dec_sep));
    ticket29 = parseFloat(unformatNumber(jQuery('#ticket29').val(),num_grp_sep,dec_sep));
    fit29 = parseFloat(unformatNumber(jQuery('#fit29').val(),num_grp_sep,dec_sep));
    meal1_29 = parseFloat(unformatNumber(jQuery('#meal1_29').val(),num_grp_sep,dec_sep));
    hotel1_29 = parseFloat(unformatNumber(jQuery('#hotel1_29').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer29) || transfer29 == ''){transfer29 = 0}
    if(isNaN(boat28 || boat29 == '')){boat29 = 0}
    if(isNaN(guide29) || guide29 == ''){guide29 = 0}
    if(isNaN(group29) || group29 == ''){group29 = 0}
    if(isNaN(entrance29) || entrance29 == ''){entrance29 = 0}
    if(isNaN(ticket29) || ticket29 == ''){ticket29 = 0}
    if(isNaN(fit29) || fit29 == ''){fit29 = 0}
    if(isNaN(meal1_29) || meal1_29 == ''){meal1_29 = 0}
    if(isNaN(hotel1_29) || hotel1_29 == ''){hotel1_29 = 0}
    nett1_29 = Math.round(transfer29+boat29+group29+fit29+meal1_29+hotel1_29+foc1_29,2)
    if(nett1_29 != Infinity){
        if(!isNaN(nett1_29)){
            jQuery('#nett1_29').val(formatNumber(nett1_29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_29').val('0');
    }
    // end nett 29


    // nett 30
    transfer30 = parseFloat(unformatNumber(jQuery('#transfer30').val(),num_grp_sep,dec_sep));
    boat30 = parseFloat(unformatNumber(jQuery('#boat30').val(),num_grp_sep,dec_sep));
    guide30 = parseFloat(unformatNumber(jQuery('#guide30').val(),num_grp_sep,dec_sep));
    group30 = parseFloat(unformatNumber(jQuery('#group30').val(),num_grp_sep,dec_sep));
    entrance30 = parseFloat(unformatNumber(jQuery('#entrance30').val(),num_grp_sep,dec_sep));
    ticket30 = parseFloat(unformatNumber(jQuery('#ticket30').val(),num_grp_sep,dec_sep));
    fit30 = parseFloat(unformatNumber(jQuery('#fit30').val(),num_grp_sep,dec_sep));
    meal1_30 = parseFloat(unformatNumber(jQuery('#meal1_30').val(),num_grp_sep,dec_sep));
    hotel1_30 = parseFloat(unformatNumber(jQuery('#hotel1_30').val(),num_grp_sep,dec_sep));

    if(isNaN(transfer30) || transfer30 == ''){transfer30 = 0}
    if(isNaN(boat30 || boat30 == '')){boat30 = 0}
    if(isNaN(guide30) || guide30 == ''){guide30 = 0}
    if(isNaN(group30) || group29 == ''){group29 = 0}
    if(isNaN(entrance30) || entrance30 == ''){entrance30 = 0}
    if(isNaN(ticket30) || ticket30 == ''){ticket30 = 0}
    if(isNaN(fit30) || fit30 == ''){fit30 = 0}
    if(isNaN(meal1_30) || meal1_30 == ''){meal1_30 = 0}
    if(isNaN(hotel1_30) || hotel1_30 == ''){hotel1_30 = 0}
    nett1_30 = Math.round(transfer30+boat30+group30+fit30+meal1_30+hotel1_30+foc1_30,2)
    if(nett1_30 != Infinity){
        if(!isNaN(nett1_30)){
            jQuery('#nett1_30').val(formatNumber(nett1_30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett1_30').val('0');
    }
    jQuery('#nett1_31').val(jQuery('#hotel1_sum').val());

    nett1_32 = Math.round(parseFloat(unformatNumber(jQuery('#hotel1_sum').val(),num_grp_sep,dec_sep))/11,2);

    jQuery('#nett1_32').val(formatNumber(nett1_32,num_grp_sep,dec_sep,2,0));

    // end nett 30

    // SERVICE CHARGE  1
    service1_rate = parseFloat(unformatNumber(jQuery('#service1_rate').val(),num_grp_sep,dec_sep));
    service1_1 = Math.round(nett1_1*(service1_rate/100),2);
    if(service1_1 != Infinity ){
        if(!isNaN(service1_1)){
            jQuery('#service1_1').val(formatNumber(service1_1,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_1').val('0');
    }

    service1_2 = Math.round(nett1_2*(service1_rate/100),2);
    if(service1_2 != Infinity ){
        if(!isNaN(service1_2)){
            jQuery('#service1_2').val(formatNumber(service1_2,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_2').val('0');
    }

    service1_5 = Math.round(nett1_5*(service1_rate/100),2);
    if(service1_5 != Infinity ){
        if(!isNaN(service1_5)){
            jQuery('#service1_5').val(formatNumber(service1_5,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_5').val('0');
    }

    service1_6 = Math.round(nett1_6*(service1_rate/100),2);
    if(service1_6 != Infinity ){
        if(!isNaN(service1_6)){
            jQuery('#service1_6').val(formatNumber(service1_6,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_6').val('0');
    }

    service1_9 = Math.round(nett1_9*(service1_rate/100),2);
    if(service1_9 != Infinity ){
        if(!isNaN(service1_9)){
            jQuery('#service1_9').val(formatNumber(service1_9,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_9').val('0');
    }

    service1_10 = Math.round(nett1_10*(service1_rate/100),2);
    if(service1_10 != Infinity ){
        if(!isNaN(service1_10)){
            jQuery('#service1_10').val(formatNumber(service1_10,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_10').val('0');
    }

    service1_13 = Math.round(nett1_13*(service1_rate/100),2);
    if(service1_13 != Infinity ){
        if(!isNaN(service1_13)){
            jQuery('#service1_13').val(formatNumber(service1_13,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_13').val('0');
    }
    
    service1_14 = Math.round(nett1_14*(service1_rate/100),2);
    if(service1_14 != Infinity ){
        if(!isNaN(service1_14)){
            jQuery('#service1_14').val(formatNumber(service1_14,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_14').val('0');
    }

    service1_17 = Math.round(nett1_17*(service1_rate/100),2);
    if(service1_17 != Infinity ){
        if(!isNaN(service1_17)){
            jQuery('#service1_17').val(formatNumber(service1_17,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_17').val('0');
    }

    service1_18 = Math.round(nett1_18*(service1_rate/100),2);
    if(service1_18 != Infinity ){
        if(!isNaN(service1_18)){
            jQuery('#service1_18').val(formatNumber(service1_18,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_18').val('0');
    }

    service1_21 = Math.round(nett1_21*(service1_rate/100),2);
    if(service1_21 != Infinity ){
        if(!isNaN(service1_21)){
            jQuery('#service1_21').val(formatNumber(service1_21,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_21').val('0');
    }

    service1_22 = Math.round(nett1_22*(service1_rate/100),2);
    if(service1_22 != Infinity ){
        if(!isNaN(service1_22)){
            jQuery('#service1_22').val(formatNumber(service1_22,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_22').val('0');
    }

    service1_25 = Math.round(nett1_25*(service1_rate/100),2);
    if(service1_25 != Infinity ){
        if(!isNaN(service1_25)){
            jQuery('#service1_25').val(formatNumber(service1_25,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_25').val('0');
    }

    service1_26 = Math.round(nett1_26*(service1_rate/100),2);
    if(service1_26 != Infinity ){
        if(!isNaN(service1_26)){
            jQuery('#service1_26').val(formatNumber(service1_26,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_26').val('0');
    }

    service1_27 = Math.round(nett1_27*(service1_rate/100),2);
    if(service1_27 != Infinity ){
        if(!isNaN(service1_27)){
            jQuery('#service1_27').val(formatNumber(service1_27,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_27').val('0');
    }
    nett1_31 = parseFloat(unformatNumber(jQuery('#hotel1_sum').val(),num_grp_sep,dec_sep));
    service1_31 = Math.round(nett1_31*(service1_rate/100),2);
    if(service1_31 != Infinity ){
        if(!isNaN(service1_31)){
            jQuery('#service1_31').val(formatNumber(service1_31,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service1_31').val('0');
    }
    // SERVICE CHARGE  1 


    // SELL 1 - VND

    sell1_vnd1 = Math.round(nett1_1+service1_1,2);
    if(sell1_vnd1 != Infinity){
        if(!isNaN(sell1_vnd1)){
            jQuery('#sell1_vnd1').val(formatNumber(sell1_vnd1,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd1').val('0');
    }

    sell1_vnd2 = Math.round(nett1_2+service1_2,2);
    if(sell1_vnd2 != Infinity){
        if(!isNaN(sell1_vnd2)){
            jQuery('#sell1_vnd2').val(formatNumber(sell1_vnd2,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd2').val('0');
    }

    sell1_vnd3 = Math.round(sell1_vnd1/11,2);
    if(sell1_vnd3 != Infinity){
        if(!isNaN(sell1_vnd3)){
            jQuery('#sell1_vnd3').val(formatNumber(sell1_vnd3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd3').val('0');
    }

    sell1_vnd4 = Math.round(sell1_vnd2/11,2);
    if(sell1_vnd4 != Infinity){
        if(!isNaN(sell1_vnd4)){
            jQuery('#sell1_vnd4').val(formatNumber(sell1_vnd4,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd4').val('0');
    }


    sell1_vnd5 = Math.round(nett1_5+service1_5,2);
    if(sell1_vnd5 != Infinity){
        if(!isNaN(sell1_vnd5)){
            jQuery('#sell1_vnd5').val(formatNumber(sell1_vnd5,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd5').val('0');
    }

    sell1_vnd6 = Math.round(nett1_6+service1_6,2);
    if(sell1_vnd6 != Infinity){
        if(!isNaN(sell1_vnd6)){
            jQuery('#sell1_vnd6').val(formatNumber(sell1_vnd6,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd6').val('0');
    }

    sell1_vnd7 = Math.round(sell1_vnd5/11,2);
    if(sell1_vnd7 != Infinity){
        if(!isNaN(sell1_vnd7)){
            jQuery('#sell1_vnd7').val(formatNumber(sell1_vnd7,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd7').val('0');
    }

    sell1_vnd8 = Math.round(sell1_vnd6/11,2);
    if(sell1_vnd8 != Infinity){
        if(!isNaN(sell1_vnd8)){
            jQuery('#sell1_vnd8').val(formatNumber(sell1_vnd8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd8').val('0');
    }


    sell1_vnd9 = Math.round(nett1_9+service1_9,2);
    if(sell1_vnd9 != Infinity){
        if(!isNaN(sell1_vnd9)){
            jQuery('#sell1_vnd9').val(formatNumber(sell1_vnd9,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd9').val('0');
    }

    sell1_vnd10 = Math.round(nett1_10+service1_10,2);
    if(sell1_vnd10 != Infinity){
        if(!isNaN(sell1_vnd10)){
            jQuery('#sell1_vnd10').val(formatNumber(sell1_vnd10,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd10').val('0');
    }

    sell1_vnd11 = Math.round(sell1_vnd9/11,2);
    if(sell1_vnd11 != Infinity){
        if(!isNaN(sell1_vnd11)){
            jQuery('#sell1_vnd11').val(formatNumber(sell1_vnd11,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd11').val('0');
    }

    sell1_vnd12 = Math.round(sell1_vnd10/11,2);
    if(sell1_vnd12 != Infinity){
        if(!isNaN(sell1_vnd12)){
            jQuery('#sell1_vnd12').val(formatNumber(sell1_vnd12,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd12').val('0');
    }

    sell1_vnd13 = Math.round(nett1_13+service1_13,2);
    if(sell1_vnd13 != Infinity){
        if(!isNaN(sell1_vnd13)){
            jQuery('#sell1_vnd13').val(formatNumber(sell1_vnd13,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd13').val('0');
    }

    sell1_vnd14 = Math.round(nett1_14+service1_14,2);
    if(sell1_vnd14 != Infinity){
        if(!isNaN(sell1_vnd14)){
            jQuery('#sell1_vnd14').val(formatNumber(sell1_vnd14,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd14').val('0');
    }

    sell1_vnd15 = Math.round(sell1_vnd13/11,2);
    if(sell1_vnd15 != Infinity){
        if(!isNaN(sell1_vnd15)){
            jQuery('#sell1_vnd15').val(formatNumber(sell1_vnd15,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd15').val('0');
    }

    sell1_vnd16 = Math.round(sell1_vnd14/11,2);
    if(sell1_vnd16 != Infinity){
        if(!isNaN(sell1_vnd16)){
            jQuery('#sell1_vnd16').val(formatNumber(sell1_vnd16,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd16').val('0');
    }


    sell1_vnd17 = Math.round(nett1_17+service1_17,2);
    if(sell1_vnd17 != Infinity){
        if(!isNaN(sell1_vnd17)){
            jQuery('#sell1_vnd17').val(formatNumber(sell1_vnd17,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd17').val('0');
    }

    sell1_vnd18 = Math.round(nett1_18+service1_18,2);
    if(sell1_vnd18 != Infinity){
        if(!isNaN(sell1_vnd18)){
            jQuery('#sell1_vnd18').val(formatNumber(sell1_vnd18,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd18').val('0');
    }

    sell1_vnd19 = Math.round(sell1_vnd17/11,2);
    if(sell1_vnd19 != Infinity){
        if(!isNaN(sell1_vnd19)){
            jQuery('#sell1_vnd19').val(formatNumber(sell1_vnd19,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd19').val('0');
    }

    sell1_vnd20 = Math.round(sell1_vnd18/11,2);
    if(sell1_vnd20 != Infinity){
        if(!isNaN(sell1_vnd20)){
            jQuery('#sell1_vnd20').val(formatNumber(sell1_vnd20,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd20').val('0');
    }

    sell1_vnd21 = Math.round(nett1_21+service1_21,2);
    if(sell1_vnd21 != Infinity){
        if(!isNaN(sell1_vnd21)){
            jQuery('#sell1_vnd21').val(formatNumber(sell1_vnd21,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd21').val('0');
    }

    sell1_vnd22 = Math.round(nett1_22+service1_22,2);
    if(sell1_vnd22 != Infinity){
        if(!isNaN(sell1_vnd22)){
            jQuery('#sell1_vnd22').val(formatNumber(sell1_vnd22,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd22').val('0');
    }

    sell1_vnd23 = Math.round(sell1_vnd21/11,2);
    if(sell1_vnd23 != Infinity){
        if(!isNaN(sell1_vnd23)){
            jQuery('#sell1_vnd23').val(formatNumber(sell1_vnd23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd23').val('0');
    }

    sell1_vnd24 = Math.round(sell1_vnd22/11,2);
    if(sell1_vnd24 != Infinity){
        if(!isNaN(sell1_vnd24)){
            jQuery('#sell1_vnd24').val(formatNumber(sell1_vnd24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd24').val('0');
    }


    sell1_vnd25 = Math.round(nett1_25+service1_25,2);
    if(sell1_vnd25 != Infinity){
        if(!isNaN(sell1_vnd25)){
            jQuery('#sell1_vnd25').val(formatNumber(sell1_vnd25,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd25').val('0');
    }

    sell1_vnd26 = Math.round(nett1_26+service1_26,2);
    if(sell1_vnd26 != Infinity){
        if(!isNaN(sell1_vnd26)){
            jQuery('#sell1_vnd26').val(formatNumber(sell1_vnd26,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd26').val('0');
    }

    sell1_vnd27 = Math.round(nett1_27+service1_27,2);
    if(sell1_vnd27 != Infinity){
        if(!isNaN(sell1_vnd27)){
            jQuery('#sell1_vnd27').val(formatNumber(sell1_vnd27,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell1_vnd27').val('0');
    }

    sell1_vnd28 = Math.round(sell1_vnd25/11,2);
    if(sell1_vnd28 != Infinity){
        if(!isNaN(sell1_vnd28)){
            jQuery('#sell1_vnd28').val(formatNumber(sell1_vnd28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd28').val('0');
    }

    sell1_vnd29 = Math.round(sell1_vnd26/11,2);
    if(sell1_vnd29 != Infinity){
        if(!isNaN(sell1_vnd29)){
            jQuery('#sell1_vnd29').val(formatNumber(sell1_vnd29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd29').val('0');
    }

    sell1_vnd30 = Math.round(sell1_vnd27/11,2);
    if(sell1_vnd30 != Infinity){
        if(!isNaN(sell1_vnd30)){
            jQuery('#sell1_vnd30').val(formatNumber(sell1_vnd30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd30').val('0');
    }

    sell1_vnd31 = Math.round(nett1_31+service1_31,2);
    if(sell1_vnd31 != Infinity){
        if(!isNaN(sell1_vnd31)){
            jQuery('#sell1_vnd31').val(formatNumber(sell1_vnd31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd31').val('0');
    }

    sell1_vnd32 = Math.round(sell1_vnd31/11,2);
    if(sell1_vnd32 != Infinity){
        if(!isNaN(sell1_vnd32)){
            jQuery('#sell1_vnd32').val(formatNumber(sell1_vnd32,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell1_vnd32').val('0');
    }

    // end SELL 1 - VND

    // tax to be paid 1
    tax1_1 = Math.round(sell1_vnd3-nett1_3,2);
    if(tax1_1 != Infinity){
        if(!isNaN(tax1_1)){
            jQuery('#tax1_1').val(formatNumber(tax1_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_1').val('0');
    }

    tax1_2 = Math.round(sell1_vnd4-nett1_4,2);
    if(tax1_2 != Infinity){
        if(!isNaN(tax1_2)){
            jQuery('#tax1_2').val(formatNumber(tax1_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_2').val('0');
    }

    tax1_5 = Math.round(sell1_vnd7-nett1_7,2);
    if(tax1_5 != Infinity){
        if(!isNaN(tax1_5)){
            jQuery('#tax1_5').val(formatNumber(tax1_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_5').val('0');
    }


    tax1_6 = Math.round(sell1_vnd8-nett1_8,2);
    if(tax1_6 != Infinity){
        if(!isNaN(tax1_6)){
            jQuery('#tax1_6').val(formatNumber(tax1_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_6').val('0');
    }


    tax1_9 = Math.round(sell1_vnd11-nett1_11,2);
    if(tax1_9 != Infinity){
        if(!isNaN(tax1_9)){
            jQuery('#tax1_9').val(formatNumber(tax1_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_9').val('0');
    }

    tax1_10 = Math.round(sell1_vnd12-nett1_12,2);
    if(tax1_10 != Infinity){
        if(!isNaN(tax1_10)){
            jQuery('#tax1_10').val(formatNumber(tax1_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_10').val('0');
    }


    tax1_13 = Math.round(sell1_vnd15-nett1_15,2);
    if(tax1_13 != Infinity){
        if(!isNaN(tax1_13)){
            jQuery('#tax1_13').val(formatNumber(tax1_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_13').val('0');
    }

    tax1_14 = Math.round(sell1_vnd16-nett1_16,2);
    if(tax1_14 != Infinity){
        if(!isNaN(tax1_14)){
            jQuery('#tax1_14').val(formatNumber(tax1_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_14').val('0');
    }

    tax1_17 = Math.round(sell1_vnd19-nett1_19,2);
    if(tax1_17 != Infinity){
        if(!isNaN(tax1_17)){
            jQuery('#tax1_17').val(formatNumber(tax1_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_17').val('0');
    }

    tax1_18 = Math.round(sell1_vnd20-nett1_20,2);
    if(tax1_18 != Infinity){
        if(!isNaN(tax1_18)){
            jQuery('#tax1_18').val(formatNumber(tax1_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_18').val('0');
    }

    tax1_21 = Math.round(sell1_vnd23-nett1_23-foc1_23,2);
    if(tax1_21 != Infinity){
        if(!isNaN(tax1_21)){
            jQuery('#tax1_21').val(formatNumber(tax1_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_21').val('0');
    }


    tax1_22 = Math.round(sell1_vnd24-nett1_24-foc1_24,2);
    if(tax1_22 != Infinity){
        if(!isNaN(tax1_22)){
            jQuery('#tax1_22').val(formatNumber(tax1_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_22').val('0');
    }

    tax1_25 = Math.round(sell1_vnd28-nett1_28-foc1_28,2);
    if(tax1_25 != Infinity){
        if(!isNaN(tax1_25)){
            jQuery('#tax1_25').val(formatNumber(tax1_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_25').val('0');
    }

    tax1_26 = Math.round(sell1_vnd29-nett1_29-foc1_29,2);
    if(tax1_26 != Infinity){
        if(!isNaN(tax1_26)){
            jQuery('#tax1_26').val(formatNumber(tax1_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_26').val('0');
    }

    tax1_27 = Math.round(sell1_vnd30-nett1_30-foc1_30,2);
    if(tax1_27 != Infinity){
        if(!isNaN(tax1_27)){
            jQuery('#tax1_27').val(formatNumber(tax1_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_27').val('0');
    }
    
    tax1_31 = Math.round(sell1_vnd32-nett1_32,2);
    if(tax1_31 != Infinity){
        if(!isNaN(tax1_31)){                            
            jQuery('#tax1_31').val(formatNumber(tax1_31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax1_31').val('0');  
    }

    // end tax to be paid 1


    // Profit/pax 1
    profit1_1 = Math.round(service1_1-tax1_1,2);
    if(profit1_1 != Infinity){
        if(!isNaN(profit1_1)){
            jQuery('#profit1_1').val(formatNumber(profit1_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_1').val('0');
    }

    profit1_2 = Math.round(service1_2-tax1_2,2);
    if(profit1_2 != Infinity){
        if(!isNaN(profit1_2)){
            jQuery('#profit1_2').val(formatNumber(profit1_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_2').val('0');
    }

    profit1_5 = Math.round(service1_5-tax1_5,2);
    if(profit1_5 != Infinity){
        if(!isNaN(profit1_5)){
            jQuery('#profit1_5').val(formatNumber(profit1_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_5').val('0');
    }

    profit1_6 = Math.round(service1_6-tax1_6,2);
    if(profit1_6 != Infinity){
        if(!isNaN(profit1_6)){
            jQuery('#profit1_6').val(formatNumber(profit1_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_6').val('0');
    }


    profit1_9 = Math.round(service1_9-tax1_9,2);
    if(profit1_9 != Infinity){
        if(!isNaN(profit1_9)){
            jQuery('#profit1_9').val(formatNumber(profit1_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_9').val('0');
    }

    profit1_10 = Math.round(service1_10-tax1_10,2);
    if(profit1_10 != Infinity){
        if(!isNaN(profit1_10)){
            jQuery('#profit1_10').val(formatNumber(profit1_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_10').val('0');
    }

    profit1_13 = Math.round(service1_13-tax1_13,2);
    if(profit1_13 != Infinity){
        if(!isNaN(profit1_13)){
            jQuery('#profit1_13').val(formatNumber(profit1_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_13').val('0');
    }

    profit1_14 = Math.round(service1_14-tax1_14,2);
    if(profit1_14 != Infinity){
        if(!isNaN(profit1_14)){
            jQuery('#profit1_14').val(formatNumber(profit1_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_14').val('0');
    }

    profit1_17 = Math.round(service1_17-tax1_17,2);
    if(profit1_17 != Infinity){
        if(!isNaN(profit1_17)){
            jQuery('#profit1_17').val(formatNumber(profit1_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_17').val('0');
    }

    profit1_18 = Math.round(service1_18-tax1_18,2);
    if(profit1_18 != Infinity){
        if(!isNaN(profit1_18)){
            jQuery('#profit1_18').val(formatNumber(profit1_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_18').val('0');
    }


    profit1_21 = Math.round(service1_21-tax1_21,2);
    if(profit1_21 != Infinity){
        if(!isNaN(profit1_21)){
            jQuery('#profit1_21').val(formatNumber(profit1_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_21').val('0');
    }

    profit1_22 = Math.round(service1_22-tax1_22,2);
    if(profit1_22 != Infinity){
        if(!isNaN(profit1_22)){
            jQuery('#profit1_22').val(formatNumber(profit1_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_22').val('0');
    }

    profit1_25 = Math.round(service1_25-tax1_25,2);
    if(profit1_25 != Infinity){
        if(!isNaN(profit1_25)){
            jQuery('#profit1_25').val(formatNumber(profit1_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_25').val('0');
    }

    profit1_26 = Math.round(service1_26-tax1_26,2);
    if(profit1_26 != Infinity){
        if(!isNaN(profit1_26)){
            jQuery('#profit1_26').val(formatNumber(profit1_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_26').val('0');
    }


    profit1_27 = Math.round(service1_27-tax1_27,2);
    if(profit1_27 != Infinity){
        if(!isNaN(profit1_27)){
            jQuery('#profit1_27').val(formatNumber(profit1_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_27').val('0');
    }

    profit1_31 = Math.round(service1_31-tax1_31,2);
    if(profit1_31 != Infinity){
        if(!isNaN(profit1_31)){
            jQuery('#profit1_31').val(formatNumber(profit1_31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit1_31').val('0');
    }
    // end Profit/pax 1

    // Total profit
    total1_1 = Math.round(profit1_1*soluongkh1,2);
    if(total1_1 != Infinity){
        if(!isNaN(total1_1)){
            jQuery("#total1_1").val(formatNumber(total1_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_1").val('0');
    }

    total1_2 = Math.round(profit1_2*soluongkh2,2);
    if(total1_2 != Infinity){
        if(!isNaN(total1_2)){
            jQuery("#total1_2").val(formatNumber(total1_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_2").val('0');
    }

    total1_5 = Math.round(profit1_5*soluongkh3,2);
    if(total1_5 != Infinity){
        if(!isNaN(total1_5)){
            jQuery("#total1_5").val(formatNumber(total1_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_5").val('0');
    }

    total1_6 = Math.round(profit1_6*soluongkh4,2);
    if(total1_6 != Infinity){
        if(!isNaN(total1_6)){
            jQuery("#total1_6").val(formatNumber(total1_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_6").val('0');
    }

    total1_9 = Math.round(profit1_9*soluongkh5,2);
    if(total1_9 != Infinity){
        if(!isNaN(total1_9)){
            jQuery("#total1_9").val(formatNumber(total1_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_9").val('0');
    }

    total1_10 = Math.round(profit1_10*soluongkh6,2);
    if(total1_10 != Infinity){
        if(!isNaN(total1_10)){
            jQuery("#total1_10").val(formatNumber(total1_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_10").val('0');
    }


    total1_13 = Math.round(profit1_13*soluongkh7,2);
    if(total1_13 != Infinity){
        if(!isNaN(total1_13)){
            jQuery("#total1_13").val(formatNumber(total1_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_13").val('0');
    }

    total1_14 = Math.round(profit1_14*soluongkh8,2);
    if(total1_14 != Infinity){
        if(!isNaN(total1_14)){
            jQuery("#total1_14").val(formatNumber(total1_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_14").val('0');
    }

    total1_17 = Math.round(profit1_17*soluongkh9,2);
    if(total1_17 != Infinity){
        if(!isNaN(total1_17)){
            jQuery("#total1_17").val(formatNumber(total1_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_17").val('0');
    }

    total1_18 = Math.round(profit1_18*soluongkh10,2);
    if(total1_18 != Infinity){
        if(!isNaN(total1_18)){
            jQuery("#total1_18").val(formatNumber(total1_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_18").val('0');
    }

    total1_21 = Math.round(profit1_21*soluongkh11,2);
    if(total1_21 != Infinity){
        if(!isNaN(total1_21)){
            jQuery("#total1_21").val(formatNumber(total1_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_21").val('0');
    }

    total1_22 = Math.round(profit1_22*soluongkh12,2);
    if(total1_22 != Infinity){
        if(!isNaN(total1_22)){
            jQuery("#total1_22").val(formatNumber(total1_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_22").val('0');
    }

    total1_25 = Math.round(profit1_25*soluongkh13,2);
    if(total1_25 != Infinity){
        if(!isNaN(total1_25)){
            jQuery("#total1_25").val(formatNumber(total1_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_25").val('0');
    }

    total1_26 = Math.round(profit1_26*soluongkh14,2);
    if(total1_26 != Infinity){
        if(!isNaN(total1_26)){
            jQuery("#total1_26").val(formatNumber(total1_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_26").val('0');
    }

    total1_27 = Math.round(profit1_27*soluongkh15,2);
    if(total1_27 != Infinity){
        if(!isNaN(total1_27)){
            jQuery("#total1_27").val(formatNumber(total1_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total1_27").val('0');
    }

    // end Total profit

    // % of interest 1

    interest1_1 = (profit1_1/sell1_vnd1)*100;
    if(interest1_1 != Infinity){
        if(!isNaN(interest1_1)){
            jQuery('#interest1_1').val(formatNumber(interest1_1,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_1').val('0');
    }

    interest1_2 = (profit1_2/sell1_vnd2)*100;
    if(interest1_2 != Infinity){
        if(!isNaN(interest1_2)){
            jQuery('#interest1_2').val(formatNumber(interest1_2,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_2').val('0');
    }

    interest1_5 = (profit1_5/sell1_vnd5)*100;
    if(interest1_5 != Infinity){
        if(!isNaN(interest1_5)){
            jQuery('#interest1_5').val(formatNumber(interest1_5,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_5').val('0');
    }


    interest1_6 = (profit1_6/sell1_vnd6)*100;
    if(interest1_6 != Infinity){
        if(!isNaN(interest1_6)){
            jQuery('#interest1_6').val(formatNumber(interest1_6,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_6').val('0');
    }

    interest1_9 = (profit1_9/sell1_vnd9)*100;
    if(interest1_9 != Infinity){
        if(!isNaN(interest1_9)){
            jQuery('#interest1_9').val(formatNumber(interest1_9,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_9').val('0');
    }

    interest1_10 = (profit1_10/sell1_vnd10)*100;
    if(interest1_10 != Infinity){
        if(!isNaN(interest1_10)){
            jQuery('#interest1_10').val(formatNumber(interest1_10,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_10').val('0');
    }

    interest1_13 = (profit1_13/sell1_vnd13)*100;
    if(interest1_13 != Infinity){
        if(!isNaN(interest1_13)){
            jQuery('#interest1_13').val(formatNumber(interest1_13,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_13').val('0');
    }

    interest1_14 = (profit1_14/sell1_vnd14)*100;
    if(interest1_14 != Infinity){
        if(!isNaN(interest1_14)){
            jQuery('#interest1_14').val(formatNumber(interest1_14,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_14').val('0');
    }

    interest1_17 = (profit1_17/sell1_vnd17)*100;
    if(interest1_17 != Infinity){
        if(!isNaN(interest1_17)){
            jQuery('#interest1_17').val(formatNumber(interest1_17,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_17').val('0');
    }

    interest1_18 = (profit1_18/sell1_vnd18)*100;
    if(interest1_18 != Infinity){
        if(!isNaN(interest1_18)){
            jQuery('#interest1_18').val(formatNumber(interest1_18,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_18').val('0');
    }

    interest1_21 = (profit1_21/sell1_vnd21)*100;
    if(interest1_21 != Infinity){
        if(!isNaN(interest1_21)){
            jQuery('#interest1_21').val(formatNumber(interest1_21,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_21').val('0');
    }

    interest1_22 = (profit1_22/sell1_vnd22)*100;
    if(interest1_22 != Infinity){
        if(!isNaN(interest1_22)){
            jQuery('#interest1_22').val(formatNumber(interest1_22,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_22').val('0');
    }

    interest1_25 = (profit1_25/sell1_vnd25)*100;
    if(interest1_25 != Infinity){
        if(!isNaN(interest1_25)){
            jQuery('#interest1_25').val(formatNumber(interest1_25,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_25').val('0');
    }

    interest1_26 = (profit1_26/sell1_vnd26)*100;
    if(interest1_26 != Infinity){
        if(!isNaN(interest1_26)){
            jQuery('#interest1_26').val(formatNumber(interest1_26,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_26').val('0');
    }

    interest1_27 = (profit1_27/sell1_vnd27)*100;
    if(interest1_27 != Infinity){
        if(!isNaN(interest1_27)){
            jQuery('#interest1_27').val(formatNumber(interest1_27,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_27').val('0');
    }

    interest1_31 = (profit1_31/sell1_vnd31)*100;
    if(interest1_31 != Infinity){
        if(!isNaN(interest1_31)){
            jQuery('#interest1_31').val(formatNumber(interest1_31,num_grp_sep,dec_sep,2,2));
        }
    }
    else{
        jQuery('#interest1_31').val('0');
    }

    // end % of interest



    // price 2

    // nett 1
    meal2_1 = parseFloat(unformatNumber(jQuery('#meal2_1').val(),num_grp_sep,dec_sep));
    hotel2_1 = parseFloat(unformatNumber(jQuery('#hotel2_1').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_1) || meal2_1 == ''){meal2_1 = 0}
    if(isNaN(hotel2_1) || hotel2_1 == ''){hotel2_1 = 0}
    nett2_1 = Math.round(transfer1+boat1+guide1+group1+entrance1+ticket1+fit1+meal2_1+hotel2_1,2)
    if(nett2_1 != Infinity){
        if(!isNaN(nett2_1)){
            jQuery('#nett2_1').val(formatNumber(nett2_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_1').val('0');
    }
    // end nett 1 

    // nett 2
    meal2_2 = parseFloat(unformatNumber(jQuery('#meal2_2').val(),num_grp_sep,dec_sep));
    hotel2_2 = parseFloat(unformatNumber(jQuery('#hotel2_2').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_2) || meal2_2 == ''){meal2_2 = 0}
    if(isNaN(hotel2_2) || hotel2_2 == ''){hotel2_2 = 0}
    nett2_2 = Math.round(transfer2+boat2+guide2+group2+entrance2+ticket2+fit2+meal2_2+hotel2_2,2)
    if(nett2_2 != Infinity){
        if(!isNaN(nett2_2)){
            jQuery('#nett2_2').val(formatNumber(nett2_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_2').val('0');
    }
    // end nett 2

    // nett 3
    meal2_3 = parseFloat(unformatNumber(jQuery('#meal2_3').val(),num_grp_sep,dec_sep));
    hotel2_3 = parseFloat(unformatNumber(jQuery('#hotel2_3').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_3) || meal2_3 == ''){meal2_3 = 0}
    if(isNaN(hotel2_3) || hotel2_3 == ''){hotel2_3 = 0}
    nett2_3 = Math.round(transfer3+boat3+group3+fit3+meal2_3+hotel2_3,2)
    if(nett2_3 != Infinity){
        if(!isNaN(nett2_3)){
            jQuery('#nett2_3').val(formatNumber(nett2_3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_3').val('0');
    }
    // end nett 3

    // nett 4
    meal2_4 = parseFloat(unformatNumber(jQuery('#meal2_4').val(),num_grp_sep,dec_sep));
    hotel2_4 = parseFloat(unformatNumber(jQuery('#hotel2_4').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_4) || meal2_4 == ''){meal2_4 = 0}
    if(isNaN(hotel2_4) || hotel2_4 == ''){hotel2_4 = 0}
    nett2_4 = Math.round(transfer4+boat4+group4+fit4+meal2_4+hotel2_4,2)
    if(nett2_4 != Infinity){
        if(!isNaN(nett2_4)){
            jQuery('#nett2_4').val(formatNumber(nett2_4,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_4').val('0');
    }
    // end nett 4

    // nett 5
    meal2_5 = parseFloat(unformatNumber(jQuery('#meal2_5').val(),num_grp_sep,dec_sep));
    hotel2_5 = parseFloat(unformatNumber(jQuery('#hotel2_5').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_5) || meal2_5 == ''){meal2_5 = 0}
    if(isNaN(hotel2_5) || hotel2_5 == ''){hotel2_5 = 0}
    nett2_5 = Math.round(transfer5+boat5+guide3+group5+entrance5+ticket5+fit5+meal2_5+hotel2_5,2)
    if(nett2_5 != Infinity){
        if(!isNaN(nett2_5)){
            jQuery('#nett2_5').val(formatNumber(nett2_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_5').val('0');
    }
    // end nett 5

    // nett 6
    meal2_6 = parseFloat(unformatNumber(jQuery('#meal2_6').val(),num_grp_sep,dec_sep));
    hotel2_6 = parseFloat(unformatNumber(jQuery('#hotel2_6').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_6) || meal2_6 == ''){meal2_6 = 0}
    if(isNaN(hotel2_6) || hotel2_6 == ''){hotel2_6 = 0}
    nett2_6 = Math.round(transfer6+boat6+guide4+group6+entrance6+ticket6+fit6+meal2_6+hotel2_6,2)
    if(nett2_6 != Infinity){
        if(!isNaN(nett2_6)){
            jQuery('#nett2_6').val(formatNumber(nett2_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_6').val('0');
    }
    // end nett 6

    // nett 7
    meal2_7 = parseFloat(unformatNumber(jQuery('#meal2_7').val(),num_grp_sep,dec_sep));
    hotel2_7 = parseFloat(unformatNumber(jQuery('#hotel2_7').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_7) || meal2_7 == ''){meal2_7 = 0}
    if(isNaN(hotel2_7) || hotel2_7 == ''){hotel2_7 = 0}
    nett2_7 = Math.round(transfer7+boat7+group7+fit7+meal2_7+hotel2_7,2)
    if(nett2_7 != Infinity){
        if(!isNaN(nett2_7)){
            jQuery('#nett2_7').val(formatNumber(nett2_7,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_7').val('0');
    }
    // end nett 7

    // nett 8
    meal2_8 = parseFloat(unformatNumber(jQuery('#meal2_8').val(),num_grp_sep,dec_sep));
    hotel2_8 = parseFloat(unformatNumber(jQuery('#hotel2_8').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_8) || meal2_8 == ''){meal2_8 = 0}
    if(isNaN(hotel2_8) || hotel2_8 == ''){hotel2_8 = 0}
    nett2_8 = Math.round(transfer8+boat8+group8+fit8+meal2_8+hotel2_8,2)
    if(nett2_8 != Infinity){
        if(!isNaN(nett2_8)){
            jQuery('#nett2_8').val(formatNumber(nett2_8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_8').val('0');
    }
    // end nett 8  

    // nett 9
    meal2_9 = parseFloat(unformatNumber(jQuery('#meal2_9').val(),num_grp_sep,dec_sep));
    hotel2_9 = parseFloat(unformatNumber(jQuery('#hotel2_9').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_9) || meal2_9 == ''){meal2_9 = 0}
    if(isNaN(hotel2_9) || hotel2_9 == ''){hotel2_9 = 0}
    nett2_9 = Math.round(transfer9+boat9+guide5+group9+entrance9+ticket9+fit9+meal2_9+hotel2_9,2)
    if(nett2_9 != Infinity){
        if(!isNaN(nett2_9)){
            jQuery('#nett2_9').val(formatNumber(nett2_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_9').val('0');
    }
    // end nett 9

    // nett 10
    meal2_10 = parseFloat(unformatNumber(jQuery('#meal2_10').val(),num_grp_sep,dec_sep));
    hotel2_10 = parseFloat(unformatNumber(jQuery('#hotel2_10').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_10) || meal2_10 == ''){meal2_10 = 0}
    if(isNaN(hotel2_10) || hotel2_10 == ''){hotel2_10 = 0}
    nett2_10 = Math.round(transfer10+boat10+guide6+group10+entrance10+ticket10+fit10+meal2_10+hotel2_10,2)
    if(nett2_10 != Infinity){
        if(!isNaN(nett2_10)){
            jQuery('#nett2_10').val(formatNumber(nett2_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_10').val('0');
    }
    // end nett 10


    // nett 11
    meal2_11 = parseFloat(unformatNumber(jQuery('#meal2_11').val(),num_grp_sep,dec_sep));
    hotel2_11 = parseFloat(unformatNumber(jQuery('#hotel2_11').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_11) || meal2_11 == ''){meal2_11 = 0}
    if(isNaN(hotel2_11) || hotel2_11 == ''){hotel2_11 = 0}
    nett2_11 = Math.round(transfer11+boat11+group11+fit11+meal2_11+hotel2_11,2)
    if(nett2_11 != Infinity){
        if(!isNaN(nett2_11)){
            jQuery('#nett2_11').val(formatNumber(nett2_11,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_11').val('0');
    }
    // end nett 11


    // nett 12
    meal2_12 = parseFloat(unformatNumber(jQuery('#meal2_12').val(),num_grp_sep,dec_sep));
    hotel2_12 = parseFloat(unformatNumber(jQuery('#hotel2_12').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_12) || meal2_12 == ''){meal2_12 = 0}
    if(isNaN(hotel2_12) || hotel2_12 == ''){hotel2_12 = 0}
    nett2_12 = Math.round(transfer12+boat12+group12+fit12+meal2_12+hotel2_12,2)
    if(nett2_12 != Infinity){
        if(!isNaN(nett2_12)){
            jQuery('#nett2_12').val(formatNumber(nett2_12,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_12').val('0');
    }
    // end nett 12


    // nett 13
    meal2_13 = parseFloat(unformatNumber(jQuery('#meal2_13').val(),num_grp_sep,dec_sep));
    hotel2_13 = parseFloat(unformatNumber(jQuery('#hotel2_13').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_13) || meal2_13 == ''){meal2_13 = 0}
    if(isNaN(hotel2_13) || hotel2_13 == ''){hotel2_13 = 0}
    nett2_13 = Math.round(transfer13+boat13+guide7+group13+entrance13+ticket13+fit13+meal2_13+hotel2_13,2)
    if(nett2_13 != Infinity){
        if(!isNaN(nett2_13)){
            jQuery('#nett2_13').val(formatNumber(nett2_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_13').val('0');
    }
    // end nett 13


    // nett 14
    meal2_14 = parseFloat(unformatNumber(jQuery('#meal2_14').val(),num_grp_sep,dec_sep));
    hotel2_14 = parseFloat(unformatNumber(jQuery('#hotel2_14').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_14) || meal2_14 == ''){meal2_14 = 0}
    if(isNaN(hotel2_14) || hotel2_14 == ''){hotel2_14 = 0}
    nett2_14 = Math.round(transfer14+boat14+guide8+group14+entrance14+ticket14+fit14+meal2_14+hotel2_14,2)
    if(nett2_14 != Infinity){
        if(!isNaN(nett2_14)){
            jQuery('#nett2_14').val(formatNumber(nett2_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_14').val('0');
    }
    // end nett 14

    // nett 15
    meal2_15 = parseFloat(unformatNumber(jQuery('#meal2_15').val(),num_grp_sep,dec_sep));
    hotel2_15 = parseFloat(unformatNumber(jQuery('#hotel2_15').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_15) || meal2_15 == ''){meal2_15 = 0}
    if(isNaN(hotel2_15) || hotel2_15 == ''){hotel2_15 = 0}
    nett2_15 = Math.round(transfer15+boat15+group15+fit15+meal2_15+hotel2_15,2)
    if(nett2_15 != Infinity){
        if(!isNaN(nett2_15)){
            jQuery('#nett2_15').val(formatNumber(nett2_15,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_15').val('0');
    }
    // end nett 15


    // nett 16
    meal2_16 = parseFloat(unformatNumber(jQuery('#meal2_16').val(),num_grp_sep,dec_sep));
    hotel2_16 = parseFloat(unformatNumber(jQuery('#hotel2_16').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_16) || meal2_16 == ''){meal2_16 = 0}
    if(isNaN(hotel2_16) || hotel2_16 == ''){hotel2_16 = 0}
    nett2_16 = Math.round(transfer16+boat16+group16+fit16+meal2_16+hotel2_16,2)
    if(nett2_16 != Infinity){
        if(!isNaN(nett2_16)){
            jQuery('#nett2_16').val(formatNumber(nett2_16,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_16').val('0');
    }
    // end nett 16


    // nett 17
    meal2_17 = parseFloat(unformatNumber(jQuery('#meal2_17').val(),num_grp_sep,dec_sep));
    hotel2_17 = parseFloat(unformatNumber(jQuery('#hotel2_17').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_17) || meal2_17 == ''){meal2_17 = 0}
    if(isNaN(hotel2_17) || hotel2_17 == ''){hotel2_17 = 0}
    nett2_17 = Math.round(transfer17+boat17+guide9+group17+entrance17+ticket17+fit17+meal2_17+hotel2_17,2)
    if(nett2_17 != Infinity){
        if(!isNaN(nett2_17)){
            jQuery('#nett2_17').val(formatNumber(nett2_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_17').val('0');
    }
    // end nett 17

    // nett 18
    meal2_18 = parseFloat(unformatNumber(jQuery('#meal2_18').val(),num_grp_sep,dec_sep));
    hotel2_18 = parseFloat(unformatNumber(jQuery('#hotel2_18').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_18) || meal2_18 == ''){meal2_18 = 0}
    if(isNaN(hotel2_18) || hotel2_18 == ''){hotel2_18 = 0}
    nett2_18 = Math.round(transfer18+boat18+guide10+group18+entrance18+ticket18+fit18+meal2_18+hotel2_18,2)
    if(nett2_18 != Infinity){
        if(!isNaN(nett2_18)){
            jQuery('#nett2_18').val(formatNumber(nett2_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_18').val('0');
    }
    // end nett 18

    // nett 19
    meal2_19 = parseFloat(unformatNumber(jQuery('#meal2_19').val(),num_grp_sep,dec_sep));
    hotel2_19 = parseFloat(unformatNumber(jQuery('#hotel2_19').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_19) || meal2_19 == ''){meal2_19 = 0}
    if(isNaN(hotel2_19) || hotel2_19 == ''){hotel2_19 = 0}
    nett2_19 = Math.round(transfer19+boat19+group19+fit19+meal2_19+hotel2_19,2)
    if(nett2_19 != Infinity){
        if(!isNaN(nett2_19)){
            jQuery('#nett2_19').val(formatNumber(nett2_19,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_19').val('0');
    }
    // end nett 19


    // nett 20
    meal2_20 = parseFloat(unformatNumber(jQuery('#meal2_20').val(),num_grp_sep,dec_sep));
    hotel2_20 = parseFloat(unformatNumber(jQuery('#hotel2_20').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_20) || meal2_20 == ''){meal2_20 = 0}
    if(isNaN(hotel2_20) || hotel2_20 == ''){hotel2_20 = 0}
    nett2_20 = Math.round(transfer20+boat20+group20+fit20+meal2_20+hotel2_20,2)
    if(nett2_20 != Infinity){
        if(!isNaN(nett2_20)){
            jQuery('#nett2_20').val(formatNumber(nett2_20,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_20').val('0');
    }
    // end nett 20

    // nett 21
    meal2_21 = parseFloat(unformatNumber(jQuery('#meal2_21').val(),num_grp_sep,dec_sep));
    hotel2_21 = parseFloat(unformatNumber(jQuery('#hotel2_21').val(),num_grp_sep,dec_sep));
    hotel2_sum = parseFloat(unformatNumber(jQuery('#hotel2_sum').val(),num_grp_sep,dec_sep));
    meal2_sum = parseFloat(unformatNumber(jQuery('#meal2_sum').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_21) || meal2_21 == ''){meal2_21 = 0}
    if(isNaN(hotel2_21) || hotel2_21 == ''){hotel2_21 = 0}
    
    if(isNaN(hotel2_sum) || hotel2_sum == ''){hotel2_sum = 0}
    if(isNaN(meal2_sum) || meal2_sum == ''){meal2_sum = 0}

    foc2_21 = Math.round((entrance_sum+ticket_sum+fit_sum+meal2_sum+hotel2_sum)/soluongkh11,2) ;
    if(foc2_21 != Infinity){
        if(!isNaN(foc2_21)){
            jQuery('#foc2_21').val(formatNumber(foc2_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_21').val('0');
    }
    foc2_23 = Math.round(foc2_21/11,2);
    if(foc2_23 != Infinity){
        if(!isNaN(foc2_23)){
            jQuery('#foc2_23').val(formatNumber(foc2_23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_23').val('0');
    }
    nett2_21 = Math.round(transfer21+boat21+guide11+group21+entrance21+ticket21+fit21+meal2_21+hotel2_21+foc2_21,2)
    if(nett2_21 != Infinity){
        if(!isNaN(nett2_21)){
            jQuery('#nett2_21').val(formatNumber(nett2_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_21').val('0');
    }
    // end nett 21

    // nett 22
    meal2_22 = parseFloat(unformatNumber(jQuery('#meal2_22').val(),num_grp_sep,dec_sep));
    hotel2_22 = parseFloat(unformatNumber(jQuery('#hotel2_22').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_22) || meal2_22 == ''){meal2_22 = 0}
    if(isNaN(hotel2_22) || hotel2_22 == ''){hotel2_22 = 0}

    foc2_22 = Math.round((entrance_sum+ticket_sum+fit_sum+meal2_sum+hotel2_sum)/soluongkh12,2) ;
    if(foc2_22 != Infinity){
        if(!isNaN(foc2_22)){
            jQuery('#foc2_22').val(formatNumber(foc2_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_22').val('0');
    }
    foc2_24 = Math.round(foc2_22/11,2);
    if(foc2_24 != Infinity){
        if(!isNaN(foc2_24)){
            jQuery('#foc2_24').val(formatNumber(foc2_24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_24').val('0');
    }
    /*nett2_21 = Math.round(transfer21+boat21+guide12+group21+entrance21+ticket21+fit21+meal2_21+hotel2_21+foc2_21,2)
    if(nett2_21 != Infinity){
        if(!isNaN(nett2_21)){
            jQuery('#nett2_21').val(formatNumber(nett2_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_21').val('0');
    }*/

    nett2_22 = Math.round(transfer22+boat22+guide12+group22+entrance22+ticket22+fit22+meal2_22+hotel2_22+foc2_22,2)
    if(nett2_22 != Infinity){
        if(!isNaN(nett2_22)){
            jQuery('#nett2_22').val(formatNumber(nett2_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_22').val('0');
    }
    // end nett 22

    // nett 23
    meal2_23 = parseFloat(unformatNumber(jQuery('#meal2_23').val(),num_grp_sep,dec_sep));
    hotel2_23 = parseFloat(unformatNumber(jQuery('#hotel2_23').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_23) || meal2_23 == ''){meal2_23 = 0}
    if(isNaN(hotel2_23) || hotel2_23 == ''){hotel2_23 = 0}
    nett2_23 = Math.round(transfer23+boat23+group23+fit23+meal2_23+hotel2_23+foc2_23,2)
    if(nett2_23 != Infinity){
        if(!isNaN(nett2_23)){
            jQuery('#nett2_23').val(formatNumber(nett2_23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_23').val('0');
    }
    // end nett 23

    // nett 24
    meal2_24 = parseFloat(unformatNumber(jQuery('#meal2_24').val(),num_grp_sep,dec_sep));
    hotel2_24 = parseFloat(unformatNumber(jQuery('#hotel2_24').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_24) || meal2_24 == ''){meal2_24 = 0}
    if(isNaN(hotel2_24) || hotel2_24 == ''){hotel2_24 = 0}
    nett2_24 = Math.round(transfer24+boat24+group24+fit24+meal2_24+hotel2_24+foc2_24,2)
    if(nett2_24 != Infinity){
        if(!isNaN(nett2_24)){
            jQuery('#nett2_24').val(formatNumber(nett2_24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_24').val('0');
    }
    // end nett 24


    // nett 25
    meal2_25 = parseFloat(unformatNumber(jQuery('#meal2_25').val(),num_grp_sep,dec_sep));
    hotel2_25 = parseFloat(unformatNumber(jQuery('#hotel2_25').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_25) || meal2_25 == ''){meal2_25 = 0}
    if(isNaN(hotel2_25) || hotel2_25 == ''){hotel2_25 = 0}

    if(soluongkh13 <30){
        foc2_25 = Math.round((entrance_sum+ticket_sum+fit_sum+meal2_sum+hotel2_sum)/soluongkh13,2);
    }
    else if(soluongkh13 >= 30){
        foc2_25 = Math.round((entrance_sum+ticket_sum+fit_sum+meal2_sum+hotel2_sum)/soluongkh13,2);
    }

    if(foc2_25 != Infinity){
        if(!isNaN(foc2_25)){
            jQuery('#foc2_25').val(formatNumber(foc2_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_25').val('0');
    }

    foc2_28 =  Math.round(foc2_25/11,2);
    if(foc2_28 != Infinity){
        if(!isNaN(foc2_28)){
            jQuery('#foc2_28').val(formatNumber(foc2_28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_28').val('0');
    }

    nett2_25 = Math.round(transfer25+boat25+guide13+group25+entrance25+ticket25+fit25+meal2_25+hotel2_25+foc2_25,2)
    if(nett2_25 != Infinity){
        if(!isNaN(nett2_25)){
            jQuery('#nett2_25').val(formatNumber(nett2_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_25').val('0');
    }
    // end nett 25

    // nett 26
    meal2_26 = parseFloat(unformatNumber(jQuery('#meal2_26').val(),num_grp_sep,dec_sep));
    hotel2_26 = parseFloat(unformatNumber(jQuery('#hotel2_26').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_26) || meal2_26 == ''){meal2_26 = 0}
    if(isNaN(hotel2_26) || hotel2_26 == ''){hotel2_26 = 0}

    if(soluongkh14 <30){
        foc2_26 = Math.round((entrance_sum+ticket_sum+fit_sum+meal2_sum+hotel2_sum)/soluongkh14,2);
    }
    else if(soluongkh14 >= 30){
        foc2_26 = Math.round(((entrance_sum+ticket_sum+fit_sum+meal2_sum+hotel2_sum)*2)/soluongkh14,2);
    }

    if(foc2_26 != Infinity){
        if(!isNaN(foc2_26)){
            jQuery('#foc2_26').val(formatNumber(foc2_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_26').val('0');
    }

    foc2_29 =  Math.round(foc2_26/11,2);
    if(foc2_29 != Infinity){
        if(!isNaN(foc2_29)){
            jQuery('#foc2_29').val(formatNumber(foc2_29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_29').val('0');
    }

    nett2_26 = Math.round(transfer26+boat26+guide14+group26+entrance26+ticket26+fit26+meal2_26+hotel2_26+foc2_26,2)
    if(nett2_26 != Infinity){
        if(!isNaN(nett2_26)){
            jQuery('#nett2_26').val(formatNumber(nett2_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_26').val('0');
    }
    // end nett 26


    // nett 27
    meal2_27 = parseFloat(unformatNumber(jQuery('#meal2_27').val(),num_grp_sep,dec_sep));
    hotel2_27 = parseFloat(unformatNumber(jQuery('#hotel2_27').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_27) || meal2_27 == ''){meal2_27 = 0}
    if(isNaN(hotel2_27) || hotel2_27 == ''){hotel2_27 = 0}

    if(soluongkh15 <30){
        foc2_27 = Math.round((entrance_sum+ticket_sum+fit_sum+meal2_sum+hotel2_sum)/soluongkh15,2);
    }
    else if(soluongkh15 >= 30){
        foc2_27 = Math.round(((entrance_sum+ticket_sum+fit_sum+meal2_sum+hotel2_sum)*2)/soluongkh15,2);
    }

    if(foc2_27 != Infinity){
        if(!isNaN(foc2_27)){
            jQuery('#foc2_27').val(formatNumber(foc2_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_27').val('0');
    }

    foc2_30 =  Math.round(foc2_27/11,2);
    if(foc2_30 != Infinity){
        if(!isNaN(foc2_30)){
            jQuery('#foc2_30').val(formatNumber(foc2_30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc2_30').val('0');
    }

    nett2_27 = Math.round(transfer27+boat27+guide15+group27+entrance27+ticket27+fit27+meal2_27+hotel2_27+foc2_27,2)
    if(nett2_27 != Infinity){
        if(!isNaN(nett2_27)){
            jQuery('#nett2_27').val(formatNumber(nett2_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_27').val('0');
    }
    // end nett 27


    // nett 28
    meal2_28 = parseFloat(unformatNumber(jQuery('#meal2_28').val(),num_grp_sep,dec_sep));
    hotel2_28 = parseFloat(unformatNumber(jQuery('#hotel2_28').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_28) || meal2_28 == ''){meal2_28 = 0}
    if(isNaN(hotel2_28) || hotel2_28 == ''){hotel2_28 = 0}
    nett2_28 = Math.round(transfer28+boat28+group28+fit28+meal2_28+hotel2_28+foc2_28,2)
    if(nett2_28 != Infinity){
        if(!isNaN(nett2_28)){
            jQuery('#nett2_28').val(formatNumber(nett2_28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_28').val('0');
    }
    // end nett 28

    // nett 29
    meal2_29 = parseFloat(unformatNumber(jQuery('#meal2_29').val(),num_grp_sep,dec_sep));
    hotel2_29 = parseFloat(unformatNumber(jQuery('#hotel2_29').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_29) || meal2_29 == ''){meal2_29 = 0}
    if(isNaN(hotel2_29) || hotel2_29 == ''){hotel2_29 = 0}
    nett2_29 = Math.round(transfer29+boat29+group29+fit29+meal2_29+hotel2_29+foc2_29,2)
    if(nett2_29 != Infinity){
        if(!isNaN(nett2_29)){
            jQuery('#nett2_29').val(formatNumber(nett2_29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_29').val('0');
    }
    // end nett 29


    // nett 30
    meal2_30 = parseFloat(unformatNumber(jQuery('#meal2_30').val(),num_grp_sep,dec_sep));
    hotel2_30 = parseFloat(unformatNumber(jQuery('#hotel2_30').val(),num_grp_sep,dec_sep));

    if(isNaN(meal2_30) || meal2_30 == ''){meal2_30 = 0}
    if(isNaN(hotel2_30) || hotel2_30 == ''){hotel2_30 = 0}
    nett2_30 = Math.round(transfer30+boat30+group30+fit30+meal2_30+hotel2_30+foc2_30,2)
    if(nett2_30 != Infinity){
        if(!isNaN(nett2_30)){
            jQuery('#nett2_30').val(formatNumber(nett2_30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett2_30').val('0');
    }
    jQuery('#nett2_31').val(jQuery('#hotel2_sum').val());

    nett2_32 = Math.round(parseFloat(unformatNumber(jQuery('#hotel2_sum').val(),num_grp_sep,dec_sep))/11,2);

    jQuery('#nett2_32').val(formatNumber(nett2_32,num_grp_sep,dec_sep,2,0));

    // end nett 30

    // SERVICE CHARGE  2
    service2_rate = parseFloat(unformatNumber(jQuery('#service2_rate').val(),num_grp_sep,dec_sep));
    service2_1 = Math.round(nett2_1*(service2_rate/100),2);
    if(service2_1 != Infinity ){
        if(!isNaN(service2_1)){
            jQuery('#service2_1').val(formatNumber(service2_1,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_1').val('0');
    }

    service2_2 = Math.round(nett2_2*(service2_rate/100),2);
    if(service2_2 != Infinity ){
        if(!isNaN(service2_2)){
            jQuery('#service2_2').val(formatNumber(service2_2,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_2').val('0');
    }

    service2_5 = Math.round(nett2_5*(service2_rate/100),2);
    if(service2_5 != Infinity ){
        if(!isNaN(service2_5)){
            jQuery('#service2_5').val(formatNumber(service2_5,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_5').val('0');
    }

    service2_6 = Math.round(nett2_6*(service2_rate/100),2);
    if(service2_6 != Infinity ){
        if(!isNaN(service2_6)){
            jQuery('#service2_6').val(formatNumber(service2_6,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_6').val('0');
    }

    service2_9 = Math.round(nett2_9*(service2_rate/100),2);
    if(service2_9 != Infinity ){
        if(!isNaN(service2_9)){
            jQuery('#service2_9').val(formatNumber(service2_9,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_9').val('0');
    }

    service2_10 = Math.round(nett2_10*(service2_rate/100),2);
    if(service2_10 != Infinity ){
        if(!isNaN(service2_10)){
            jQuery('#service2_10').val(formatNumber(service2_10,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_10').val('0');
    }

    service2_13 = Math.round(nett2_13*(service2_rate/100),2);
    if(service2_13 != Infinity ){
        if(!isNaN(service2_13)){
            jQuery('#service2_13').val(formatNumber(service2_13,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_13').val('0');
    }

    service2_17 = Math.round(nett2_17*(service2_rate/100),2);
    if(service2_17 != Infinity ){
        if(!isNaN(service2_17)){
            jQuery('#service2_17').val(formatNumber(service2_17,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_17').val('0');
    }

    service2_18 = Math.round(nett2_18*(service2_rate/100),2);
    if(service2_18 != Infinity ){
        if(!isNaN(service2_18)){
            jQuery('#service2_18').val(formatNumber(service2_18,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_18').val('0');
    }

    service2_21 = Math.round(nett2_21*(service2_rate/100),2);
    if(service2_21 != Infinity ){
        if(!isNaN(service2_21)){
            jQuery('#service2_21').val(formatNumber(service2_21,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_21').val('0');
    }

    service2_22 = Math.round(nett2_22*(service2_rate/100),2);
    if(service2_22 != Infinity ){
        if(!isNaN(service2_22)){
            jQuery('#service2_22').val(formatNumber(service2_22,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_22').val('0');
    }

    service2_25 = Math.round(nett2_25*(service2_rate/100),2);
    if(service2_25 != Infinity ){
        if(!isNaN(service2_25)){
            jQuery('#service2_25').val(formatNumber(service2_25,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_25').val('0');
    }

    service2_26 = Math.round(nett2_26*(service2_rate/100),2);
    if(service2_26 != Infinity ){
        if(!isNaN(service2_26)){
            jQuery('#service2_26').val(formatNumber(service2_26,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_26').val('0');
    }

    service2_27 = Math.round(nett2_27*(service2_rate/100),2);
    if(service2_27 != Infinity ){
        if(!isNaN(service2_27)){
            jQuery('#service2_27').val(formatNumber(service2_27,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_27').val('0');
    }

    service2_31 = Math.round(nett2_31*(service2_rate/100),2);
    if(service2_31 != Infinity ){
        if(!isNaN(service2_31)){
            jQuery('#service2_31').val(formatNumber(service2_31,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service2_31').val('0');
    }
    // SERVICE CHARGE  2


    // SELL 2 - VND

    sell2_vnd1 = Math.round(nett2_1+service2_1,2);
    if(sell2_vnd1 != Infinity){
        if(!isNaN(sell2_vnd1)){
            jQuery('#sell2_vnd1').val(formatNumber(sell2_vnd1,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd1').val('0');
    }

    sell2_vnd2 = Math.round(nett2_2+service2_2,2);
    if(sell2_vnd2 != Infinity){
        if(!isNaN(sell2_vnd2)){
            jQuery('#sell2_vnd2').val(formatNumber(sell2_vnd2,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd2').val('0');
    }

    sell2_vnd3 = Math.round(sell2_vnd1/11,2);
    if(sell2_vnd3 != Infinity){
        if(!isNaN(sell2_vnd3)){
            jQuery('#sell2_vnd3').val(formatNumber(sell2_vnd3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd3').val('0');
    }

    sell2_vnd4 = Math.round(sell2_vnd2/11,2);
    if(sell2_vnd4 != Infinity){
        if(!isNaN(sell2_vnd4)){
            jQuery('#sell2_vnd4').val(formatNumber(sell2_vnd4,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd4').val('0');
    }


    sell2_vnd5 = Math.round(nett2_5+service2_5,2);
    if(sell2_vnd5 != Infinity){
        if(!isNaN(sell2_vnd5)){
            jQuery('#sell2_vnd5').val(formatNumber(sell2_vnd5,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd5').val('0');
    }

    sell2_vnd6 = Math.round(nett2_6+service2_6,2);
    if(sell2_vnd6 != Infinity){
        if(!isNaN(sell2_vnd6)){
            jQuery('#sell2_vnd6').val(formatNumber(sell2_vnd6,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd6').val('0');
    }

    sell2_vnd7 = Math.round(sell2_vnd5/11,2);
    if(sell2_vnd7 != Infinity){
        if(!isNaN(sell2_vnd7)){
            jQuery('#sell2_vnd7').val(formatNumber(sell2_vnd7,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd7').val('0');
    }

    sell2_vnd8 = Math.round(sell2_vnd8/11,2);
    if(sell2_vnd8 != Infinity){
        if(!isNaN(sell2_vnd8)){
            jQuery('#sell2_vnd8').val(formatNumber(sell2_vnd8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd8').val('0');
    }


    sell2_vnd9 = Math.round(nett2_9+service2_9,2);
    if(sell2_vnd9 != Infinity){
        if(!isNaN(sell2_vnd9)){
            jQuery('#sell2_vnd9').val(formatNumber(sell2_vnd9,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd9').val('0');
    }

    sell2_vnd10 = Math.round(nett2_10+service2_10,2);
    if(sell2_vnd10 != Infinity){
        if(!isNaN(sell2_vnd10)){
            jQuery('#sell2_vnd10').val(formatNumber(sell2_vnd10,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd10').val('0');
    }

    sell2_vnd11 = Math.round(sell2_vnd9/11,2);
    if(sell2_vnd11 != Infinity){
        if(!isNaN(sell2_vnd11)){
            jQuery('#sell2_vnd11').val(formatNumber(sell2_vnd11,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd11').val('0');
    }

    sell2_vnd12 = Math.round(sell2_vnd10/11,2); 
    if(sell2_vnd12 != Infinity){
        if(!isNaN(sell2_vnd12)){
            jQuery('#sell2_vnd12').val(formatNumber(sell2_vnd12,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd12').val('0');
    }

    sell2_vnd13 = Math.round(nett2_13+service2_13,2);
    if(sell2_vnd13 != Infinity){
        if(!isNaN(sell2_vnd13)){
            jQuery('#sell2_vnd13').val(formatNumber(sell2_vnd13,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd13').val('0');
    }

    sell2_vnd14 = Math.round(nett2_14+service2_14,2);
    if(sell2_vnd14 != Infinity){
        if(!isNaN(sell2_vnd14)){
            jQuery('#sell2_vnd14').val(formatNumber(sell2_vnd14,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd14').val('0');
    }

    sell2_vnd15 = Math.round(sell2_vnd13/11,2);
    if(sell2_vnd15 != Infinity){
        if(!isNaN(sell2_vnd15)){
            jQuery('#sell2_vnd15').val(formatNumber(sell2_vnd15,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd15').val('0');
    }

    sell2_vnd16 = Math.round(sell2_vnd14/11,2);
    if(sell2_vnd16 != Infinity){
        if(!isNaN(sell2_vnd16)){
            jQuery('#sell2_vnd16').val(formatNumber(sell2_vnd16,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd16').val('0');
    }


    sell2_vnd17 = Math.round(nett2_17+service2_17,2);
    if(sell2_vnd17 != Infinity){
        if(!isNaN(sell2_vnd17)){
            jQuery('#sell2_vnd17').val(formatNumber(sell2_vnd17,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd17').val('0');
    }

    sell2_vnd18 = Math.round(nett2_18+service1_18,2);
    if(sell2_vnd18 != Infinity){
        if(!isNaN(sell2_vnd18)){
            jQuery('#sell2_vnd18').val(formatNumber(sell2_vnd18,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd18').val('0');
    }

    sell2_vnd19 = Math.round(sell2_vnd17/11,2);
    if(sell2_vnd19 != Infinity){
        if(!isNaN(sell2_vnd19)){
            jQuery('#sell2_vnd19').val(formatNumber(sell2_vnd19,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd19').val('0');
    }

    sell2_vnd20 = Math.round(sell2_vnd18/11,2);
    if(sell2_vnd20 != Infinity){
        if(!isNaN(sell2_vnd20)){
            jQuery('#sell2_vnd20').val(formatNumber(sell2_vnd20,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd20').val('0');
    }

    sell2_vnd21 = Math.round(nett2_21+service2_21,2);
    if(sell2_vnd21 != Infinity){
        if(!isNaN(sell2_vnd21)){
            jQuery('#sell2_vnd21').val(formatNumber(sell2_vnd21,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd21').val('0');
    }

    sell2_vnd22 = Math.round(nett2_22+service2_22,2);
    if(sell2_vnd22 != Infinity){
        if(!isNaN(sell2_vnd22)){
            jQuery('#sell2_vnd22').val(formatNumber(sell2_vnd22,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd22').val('0');
    }

    sell2_vnd23 = Math.round(sell2_vnd21/11,2);
    if(sell2_vnd23 != Infinity){
        if(!isNaN(sell2_vnd23)){
            jQuery('#sell2_vnd23').val(formatNumber(sell2_vnd23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd23').val('0');
    }

    sell2_vnd24 = Math.round(sell2_vnd22/11,2);
    if(sell2_vnd24 != Infinity){
        if(!isNaN(sell2_vnd24)){
            jQuery('#sell2_vnd24').val(formatNumber(sell2_vnd24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd24').val('0');
    }


    sell2_vnd25 = Math.round(nett2_25+service2_25,2);
    if(sell2_vnd25 != Infinity){
        if(!isNaN(sell2_vnd25)){
            jQuery('#sell2_vnd25').val(formatNumber(sell2_vnd25,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd25').val('0');
    }

    sell2_vnd26 = Math.round(nett2_26+service2_26,2);
    if(sell2_vnd26 != Infinity){
        if(!isNaN(sell2_vnd26)){
            jQuery('#sell2_vnd26').val(formatNumber(sell2_vnd26,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd26').val('0');
    }

    sell2_vnd27 = Math.round(nett2_27+service2_27,2);
    if(sell2_vnd27 != Infinity){
        if(!isNaN(sell2_vnd27)){
            jQuery('#sell2_vnd27').val(formatNumber(sell2_vnd27,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell2_vnd27').val('0');
    }

    sell2_vnd28 = Math.round(sell2_vnd25/11,2);
    if(sell2_vnd28 != Infinity){
        if(!isNaN(sell2_vnd28)){
            jQuery('#sell2_vnd28').val(formatNumber(sell2_vnd28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd28').val('0');
    }

    sell2_vnd29 = Math.round(sell2_vnd26/11,2);
    if(sell2_vnd29 != Infinity){
        if(!isNaN(sell2_vnd29)){
            jQuery('#sell2_vnd29').val(formatNumber(sell2_vnd29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd29').val('0');
    }

    sell2_vnd30 = Math.round(sell2_vnd27/11,2);
    if(sell2_vnd30 != Infinity){
        if(!isNaN(sell2_vnd30)){
            jQuery('#sell2_vnd30').val(formatNumber(sell2_vnd30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd30').val('0');
    }

    sell2_vnd31 = Math.round(nett2_31+service2_31,2);
    if(sell2_vnd31 != Infinity){
        if(!isNaN(sell2_vnd31)){
            jQuery('#sell2_vnd31').val(formatNumber(sell2_vnd31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd31').val('0');
    }

    sell2_vnd32 = Math.round(sell2_vnd31/11,2);
    if(sell2_vnd32 != Infinity){
        if(!isNaN(sell2_vnd32)){
            jQuery('#sell2_vnd32').val(formatNumber(sell2_vnd32,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell2_vnd32').val('0');
    }

    // end SELL 2 - VND


    // tax to be paid 2
    tax2_1 = Math.round(sell2_vnd3-nett2_3,2);
    if(tax2_1 != Infinity){
        if(!isNaN(tax2_1)){
            jQuery('#tax2_1').val(formatNumber(tax2_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_1').val('0');
    }

    tax2_2 = Math.round(sell2_vnd4-nett2_4,2);
    if(tax2_2 != Infinity){
        if(!isNaN(tax2_2)){
            jQuery('#tax2_2').val(formatNumber(tax2_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_2').val('0');
    }

    tax2_5 = Math.round(sell2_vnd7-nett2_7,2);
    if(tax2_5 != Infinity){
        if(!isNaN(tax2_5)){
            jQuery('#tax2_5').val(formatNumber(tax2_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_5').val('0');
    }


    tax2_6 = Math.round(sell2_vnd8-nett2_8,2);
    if(tax2_6 != Infinity){
        if(!isNaN(tax2_6)){
            jQuery('#tax2_6').val(formatNumber(tax2_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_6').val('0');
    }


    tax2_9 = Math.round(sell2_vnd11-nett2_11,2);
    if(tax2_9 != Infinity){
        if(!isNaN(tax2_9)){
            jQuery('#tax2_9').val(formatNumber(tax2_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_9').val('0');
    }

    tax2_10 = Math.round(sell2_vnd12-nett2_12,2);
    if(tax2_10 != Infinity){
        if(!isNaN(tax2_10)){
            jQuery('#tax2_10').val(formatNumber(tax2_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_10').val('0');
    }


    tax2_13 = Math.round(sell2_vnd15-nett2_15,2);
    if(tax2_13 != Infinity){
        if(!isNaN(tax2_13)){
            jQuery('#tax2_13').val(formatNumber(tax2_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_13').val('0');
    }

    tax2_14 = Math.round(sell2_vnd16-nett2_16,2);
    if(tax2_14 != Infinity){
        if(!isNaN(tax2_14)){
            jQuery('#tax2_14').val(formatNumber(tax2_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_14').val('0');
    }

    tax2_17 = Math.round(sell2_vnd19-nett2_19,2);
    if(tax2_17 != Infinity){
        if(!isNaN(tax2_17)){
            jQuery('#tax2_17').val(formatNumber(tax2_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_17').val('0');
    }

    tax2_18 = Math.round(sell2_vnd20-nett2_20,2);
    if(tax2_18 != Infinity){
        if(!isNaN(tax2_18)){
            jQuery('#tax2_18').val(formatNumber(tax2_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_18').val('0');
    }

    tax2_21 = Math.round(sell2_vnd23-nett2_23,2);
    if(tax2_21 != Infinity){
        if(!isNaN(tax2_21)){
            jQuery('#tax2_21').val(formatNumber(tax2_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_21').val('0');
    }


    tax2_22 = Math.round(sell2_vnd24-nett2_24,2);
    if(tax2_22 != Infinity){
        if(!isNaN(tax2_22)){
            jQuery('#tax2_22').val(formatNumber(tax2_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_22').val('0');
    }

    tax2_25 = Math.round(sell2_vnd28-nett2_28,2);
    if(tax2_25 != Infinity){
        if(!isNaN(tax2_25)){
            jQuery('#tax2_25').val(formatNumber(tax2_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_25').val('0');
    }

    tax2_26 = Math.round(sell2_vnd29-nett2_29,2);
    if(tax2_26 != Infinity){
        if(!isNaN(tax2_26)){
            jQuery('#tax2_26').val(formatNumber(tax2_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_26').val('0');
    }

    tax2_27 = Math.round(sell2_vnd27-nett2_27,2);
    if(tax2_27 != Infinity){
        if(!isNaN(tax2_27)){
            jQuery('#tax2_27').val(formatNumber(tax2_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax2_27').val('0');
    }

    // end tax to be paid 2


    // Profit/pax 1
    profit2_1 = Math.round(service2_1-tax2_1,2);
    if(profit2_1 != Infinity){
        if(!isNaN(profit2_1)){
            jQuery('#profit2_1').val(formatNumber(profit2_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_1').val('0');
    }

    profit2_2 = Math.round(service2_2-tax2_2,2);
    if(profit2_2 != Infinity){
        if(!isNaN(profit2_2)){
            jQuery('#profit2_2').val(formatNumber(profit2_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_2').val('0');
    }

    profit2_5 = Math.round(service2_5-tax2_5,2);
    if(profit2_5 != Infinity){
        if(!isNaN(profit2_5)){
            jQuery('#profit2_5').val(formatNumber(profit2_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_5').val('0');
    }

    profit2_6 = Math.round(service2_6-tax2_6,2);
    if(profit2_6 != Infinity){
        if(!isNaN(profit2_6)){
            jQuery('#profit2_6').val(formatNumber(profit2_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_6').val('0');
    }


    profit2_9 = Math.round(service2_9-tax1_9,2);
    if(profit2_9 != Infinity){
        if(!isNaN(profit2_9)){
            jQuery('#profit2_9').val(formatNumber(profit2_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_9').val('0');
    }

    profit2_10 = Math.round(service2_10-tax2_10,2);
    if(profit2_10 != Infinity){
        if(!isNaN(profit2_10)){
            jQuery('#profit2_10').val(formatNumber(profit2_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_10').val('0');
    }

    profit2_13 = Math.round(service2_13-tax2_13,2);
    if(profit2_13 != Infinity){
        if(!isNaN(profit2_13)){
            jQuery('#profit2_13').val(formatNumber(profit2_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_13').val('0');
    }

    profit2_14 = Math.round(service2_14-tax2_14,2);
    if(profit2_14 != Infinity){
        if(!isNaN(profit2_14)){
            jQuery('#profit2_14').val(formatNumber(profit2_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_14').val('0');
    }

    profit2_17 = Math.round(service2_17-tax2_17,2);
    if(profit2_17 != Infinity){
        if(!isNaN(profit2_17)){
            jQuery('#profit2_17').val(formatNumber(profit2_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_17').val('0');
    }

    profit2_18 = Math.round(service2_18-tax2_18,2);
    if(profit2_18 != Infinity){
        if(!isNaN(profit2_18)){
            jQuery('#profit2_18').val(formatNumber(profit2_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_18').val('0');
    }


    profit2_21 = Math.round(service2_21-tax2_21,2);
    if(profit2_21 != Infinity){
        if(!isNaN(profit2_21)){
            jQuery('#profit2_21').val(formatNumber(profit2_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_21').val('0');
    }

    profit2_22 = Math.round(service2_22-tax2_22,2);
    if(profit2_22 != Infinity){
        if(!isNaN(profit2_22)){
            jQuery('#profit2_22').val(formatNumber(profit2_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_22').val('0');
    }

    profit2_25 = Math.round(service2_25-tax2_25,2);
    if(profit2_25 != Infinity){
        if(!isNaN(profit2_25)){
            jQuery('#profit2_25').val(formatNumber(profit2_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_25').val('0');
    }

    profit2_26 = Math.round(service2_26-tax2_26,2);
    if(profit2_26 != Infinity){
        if(!isNaN(profit2_26)){
            jQuery('#profit2_26').val(formatNumber(profit2_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_26').val('0');
    }


    profit2_27 = Math.round(service2_27-tax2_27,2);
    if(profit2_27 != Infinity){
        if(!isNaN(profit2_27)){
            jQuery('#profit2_27').val(formatNumber(profit2_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_27').val('0');
    }

    profit2_31 = Math.round(service2_31-tax2_31,2);
    if(profit2_31 != Infinity){
        if(!isNaN(profit2_31)){
            jQuery('#profit2_31').val(formatNumber(profit2_31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit2_31').val('0');
    }
    // end Profit/pax 1


    // Total profit
    total2_1 = Math.round(profit2_1*soluongkh1,2);
    if(total2_1 != Infinity){
        if(!isNaN(total2_1)){
            jQuery("#total2_1").val(formatNumber(total2_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_1").val('0');
    }

    total2_2 = Math.round(profit2_2*soluongkh2,2);
    if(total2_2 != Infinity){
        if(!isNaN(total2_2)){
            jQuery("#total2_2").val(formatNumber(total2_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_2").val('0');
    }

    total2_5 = Math.round(profit2_5*soluongkh3,2);
    if(total2_5 != Infinity){
        if(!isNaN(total2_5)){
            jQuery("#total2_5").val(formatNumber(total2_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_5").val('0');
    }

    total2_6 = Math.round(profit2_6*soluongkh4,2);
    if(total2_6 != Infinity){
        if(!isNaN(total2_6)){
            jQuery("#total2_6").val(formatNumber(total2_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_6").val('0');
    }

    total2_9 = Math.round(profit2_9*soluongkh5,2);
    if(total2_9 != Infinity){
        if(!isNaN(total2_9)){
            jQuery("#total2_9").val(formatNumber(total2_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_9").val('0');
    }

    total2_10 = Math.round(profit2_10*soluongkh6,2);
    if(total2_10 != Infinity){
        if(!isNaN(total2_10)){
            jQuery("#total2_10").val(formatNumber(total2_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_10").val('0');
    }


    total2_13 = Math.round(profit2_13*soluongkh7,2);
    if(total2_13 != Infinity){
        if(!isNaN(total2_13)){
            jQuery("#total2_13").val(formatNumber(total2_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_13").val('0');
    }

    total2_14 = Math.round(profit2_14*soluongkh8,2);
    if(total2_14 != Infinity){
        if(!isNaN(total2_14)){
            jQuery("#total2_14").val(formatNumber(total2_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_14").val('0');
    }

    total2_17 = Math.round(profit2_17*soluongkh9,2);
    if(total2_17 != Infinity){
        if(!isNaN(total2_17)){
            jQuery("#total2_17").val(formatNumber(total1_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_17").val('0');
    }

    total2_18 = Math.round(profit2_18*soluongkh10,2);
    if(total2_18 != Infinity){
        if(!isNaN(total2_18)){
            jQuery("#total2_18").val(formatNumber(total2_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_18").val('0');
    }

    total2_21 = Math.round(profit2_21*soluongkh11,2);
    if(total2_21 != Infinity){
        if(!isNaN(total2_21)){
            jQuery("#total2_21").val(formatNumber(total2_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_21").val('0');
    }

    total2_22 = Math.round(profit2_22*soluongkh12,2);
    if(total2_22 != Infinity){
        if(!isNaN(total2_22)){
            jQuery("#total2_22").val(formatNumber(total2_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_22").val('0');
    }

    total2_25 = Math.round(profit2_25*soluongkh13,2);
    if(total2_25 != Infinity){
        if(!isNaN(total2_25)){
            jQuery("#total2_25").val(formatNumber(total2_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_25").val('0');
    }

    total2_26 = Math.round(profit2_26*soluongkh14,2);
    if(total2_26 != Infinity){
        if(!isNaN(total2_26)){
            jQuery("#total2_26").val(formatNumber(total2_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_26").val('0');
    }

    total2_27 = Math.round(profit2_27*soluongkh15,2);
    if(total2_27 != Infinity){
        if(!isNaN(total2_27)){
            jQuery("#total2_27").val(formatNumber(total2_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total2_27").val('0');
    }

    // end Total profit

    // % of interest 1

    interest2_1 = Math.round((profit2_1/sell2_vnd1)*100,2);
    if(interest2_1 != Infinity){
        if(!isNaN(interest2_1)){
            jQuery('#interest2_1').val(formatNumber(interest2_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_1').val('0');
    }

    interest2_2 = Math.round((profit2_2/sell2_vnd2)*100,2);
    if(interest2_2 != Infinity){
        if(!isNaN(interest2_2)){
            jQuery('#interest2_2').val(formatNumber(interest2_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_2').val('0');
    }

    interest2_5 = Math.round((profit2_5/sell2_vnd5)*100,2);
    if(interest2_5 != Infinity){
        if(!isNaN(interest2_5)){
            jQuery('#interest2_5').val(formatNumber(interest2_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_5').val('0');
    }


    interest2_6 = Math.round((profit2_6/sell2_vnd6)*100,2);
    if(interest2_6 != Infinity){
        if(!isNaN(interest2_6)){
            jQuery('#interest2_6').val(formatNumber(interest2_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_6').val('0');
    }

    interest2_9 = Math.round((profit2_9/sell2_vnd9)*100,2);
    if(interest2_9 != Infinity){
        if(!isNaN(interest2_9)){
            jQuery('#interest2_9').val(formatNumber(interest2_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_9').val('0');
    }

    interest2_10 = Math.round((profit2_10/sell2_vnd10)*100,2);
    if(interest2_10 != Infinity){
        if(!isNaN(interest2_10)){
            jQuery('#interest2_10').val(formatNumber(interest2_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_10').val('0');
    }

    interest2_13 = Math.round((profit2_13/sell2_vnd13)*100,2);
    if(interest2_13 != Infinity){
        if(!isNaN(interest2_13)){
            jQuery('#interest2_13').val(formatNumber(interest2_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_13').val('0');
    }

    interest2_14 = Math.round((profit2_14/sell2_vnd14)*100,2);
    if(interest2_14 != Infinity){
        if(!isNaN(interest2_14)){
            jQuery('#interest2_14').val(formatNumber(interest2_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_14').val('0');
    }

    interest2_17 = Math.round((profit2_17/sell2_vnd17)*100,2);
    if(interest2_17 != Infinity){
        if(!isNaN(interest2_17)){
            jQuery('#interest2_17').val(formatNumber(interest2_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_17').val('0');
    }

    interest2_18 = Math.round((profit2_18/sell2_vnd18)*100,2);
    if(interest2_18 != Infinity){
        if(!isNaN(interest2_18)){
            jQuery('#interest2_18').val(formatNumber(interest2_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_18').val('0');
    }

    interest2_21 = Math.round((profit2_21/sell2_vnd21)*100,2);
    if(interest2_21 != Infinity){
        if(!isNaN(interest2_21)){
            jQuery('#interest2_21').val(formatNumber(interest2_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_21').val('0');
    }

    interest2_22 = Math.round((profit2_22/sell2_vnd22)*100,2);
    if(interest2_22 != Infinity){
        if(!isNaN(interest2_22)){
            jQuery('#interest2_22').val(formatNumber(interest2_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_22').val('0');
    }

    interest2_25 = Math.round((profit2_25/sell2_vnd25)*100,2);
    if(interest2_25 != Infinity){
        if(!isNaN(interest2_25)){
            jQuery('#interest2_25').val(formatNumber(interest2_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_25').val('0');
    }

    interest2_26 = Math.round((profit2_26/sell2_vnd26)*100,2);
    if(interest2_26 != Infinity){
        if(!isNaN(interest2_26)){
            jQuery('#interest2_26').val(formatNumber(interest2_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_26').val('0');
    }

    interest2_27 = Math.round((profit2_27/sell2_vnd27)*100,2);
    if(interest2_27 != Infinity){
        if(!isNaN(interest2_27)){
            jQuery('#interest2_27').val(formatNumber(interest2_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_27').val('0');
    }

    interest2_31 = Math.round((profit2_31/sell2_vnd31)*100,2);
    if(interest2_31 != Infinity){
        if(!isNaN(interest2_31)){
            jQuery('#interest2_31').val(formatNumber(interest2_31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest2_31').val('0');
    }

    // end % of interest

    // end price 2  


    // price 3

    // nett 1
    meal3_2 = parseFloat(unformatNumber(jQuery('#meal3_2').val(),num_grp_sep,dec_sep));
    meal3_2 = parseFloat(unformatNumber(jQuery('#meal3_2').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_2) || meal3_2 == ''){meal3_2 = 0}
    if(isNaN(meal3_2) || meal3_2 == ''){meal3_2 = 0}
    nett3_1 = Math.round(transfer1+boat1+guide1+group1+entrance1+ticket1+fit1+meal3_2+meal3_2,2)
    if(nett3_1 != Infinity){
        if(!isNaN(nett3_1)){
            jQuery('#nett3_1').val(formatNumber(nett3_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_1').val('0');
    }
    // end nett 1 

    // nett 2
    meal3_2 = parseFloat(unformatNumber(jQuery('#meal3_2').val(),num_grp_sep,dec_sep));
    hotel3_2 = parseFloat(unformatNumber(jQuery('#hotel3_2').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_2) || meal3_2 == ''){meal3_2 = 0}
    if(isNaN(hotel3_2) || hotel3_2 == ''){hotel3_2 = 0}
    nett3_2 = Math.round(transfer2+boat2+guide2+group2+entrance2+ticket2+fit2+meal3_2+hotel3_2,2)
    if(nett3_2 != Infinity){
        if(!isNaN(nett3_2)){
            jQuery('#nett3_2').val(formatNumber(nett3_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_2').val('0');
    }
    // end nett 2

    // nett 3
    meal3_3 = parseFloat(unformatNumber(jQuery('#meal3_3').val(),num_grp_sep,dec_sep));
    hotel3_3 = parseFloat(unformatNumber(jQuery('#hotel2_3').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_3) || meal3_3 == ''){meal3_3 = 0}
    if(isNaN(hotel3_3) || hotel3_3 == ''){hotel3_3 = 0}
    nett3_3 = Math.round(transfer3+boat3+guide3+group3+entrance3+ticket3+fit3+meal3_3+hotel3_3,2)
    if(nett3_3 != Infinity){
        if(!isNaN(nett3_3)){
            jQuery('#nett3_3').val(formatNumber(nett3_3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_3').val('0');
    }
    // end nett 3

    // nett 4
    meal3_4 = parseFloat(unformatNumber(jQuery('#meal3_4').val(),num_grp_sep,dec_sep));
    hotel3_4 = parseFloat(unformatNumber(jQuery('#hotel3_4').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_4) || meal3_4 == ''){meal3_4 = 0}
    if(isNaN(hotel3_4) || hotel3_4 == ''){hotel3_4 = 0}
    nett3_4 = Math.round(transfer4+boat4+guide4+group4+entrance4+ticket4+fit4+meal3_4+hotel3_4,2)
    if(nett3_4 != Infinity){
        if(!isNaN(nett3_4)){
            jQuery('#nett3_4').val(formatNumber(nett3_4,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_4').val('0');
    }
    // end nett 4

    // nett 5
    meal3_5 = parseFloat(unformatNumber(jQuery('#meal3_5').val(),num_grp_sep,dec_sep));
    hotel3_5 = parseFloat(unformatNumber(jQuery('#hotel3_5').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_5) || meal3_5 == ''){meal3_5 = 0}
    if(isNaN(hotel3_5) || hotel3_5 == ''){hotel3_5 = 0}
    nett3_5 = Math.round(transfer5+boat5+guide5+group5+entrance5+ticket5+fit5+meal3_5+hotel3_5,2)
    if(nett3_5 != Infinity){
        if(!isNaN(nett3_5)){
            jQuery('#nett3_5').val(formatNumber(nett3_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_5').val('0');
    }
    // end nett 5

    // nett 6
    meal3_6 = parseFloat(unformatNumber(jQuery('#meal3_6').val(),num_grp_sep,dec_sep));
    hotel3_6 = parseFloat(unformatNumber(jQuery('#hotel3_6').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_6) || meal3_6 == ''){meal3_6 = 0}
    if(isNaN(hotel3_6) || hotel3_6 == ''){hotel3_6 = 0}
    nett3_6 = Math.round(transfer6+boat6+guide6+group6+entrance6+ticket6+fit6+meal3_6+hotel3_6,2)
    if(nett3_6 != Infinity){
        if(!isNaN(nett3_6)){
            jQuery('#nett3_6').val(formatNumber(nett3_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_6').val('0');
    }
    // end nett 6

    // nett 7
    meal3_7 = parseFloat(unformatNumber(jQuery('#meal3_7').val(),num_grp_sep,dec_sep));
    hotel3_7 = parseFloat(unformatNumber(jQuery('#hotel3_7').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_7) || meal3_7 == ''){meal3_7 = 0}
    if(isNaN(hotel3_7) || hotel3_7 == ''){hotel3_7 = 0}
    nett3_7 = Math.round(transfer7+guide7+guide7+group7+entrance7+ticket7+fit7+meal3_7+hotel3_7,2)
    if(nett3_7 != Infinity){
        if(!isNaN(nett3_7)){
            jQuery('#nett3_7').val(formatNumber(nett3_7,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_7').val('0');
    }
    // end nett 7

    // nett 8
    meal3_8 = parseFloat(unformatNumber(jQuery('#meal3_8').val(),num_grp_sep,dec_sep));
    hotel3_8 = parseFloat(unformatNumber(jQuery('#hotel3_8').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_8) || meal3_8 == ''){meal3_8 = 0}
    if(isNaN(hotel3_8) || hotel3_8 == ''){hotel3_8 = 0}
    nett3_8 = Math.round(transfer8+boat8+guide8+group8+entrance8+ticket8+fit8+meal3_8+hotel3_8,2)
    if(nett3_8 != Infinity){
        if(!isNaN(nett3_8)){
            jQuery('#nett3_8').val(formatNumber(nett3_8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_8').val('0');
    }
    // end nett 8  

    // nett 9
    meal3_9 = parseFloat(unformatNumber(jQuery('#meal3_9').val(),num_grp_sep,dec_sep));
    hotel3_9 = parseFloat(unformatNumber(jQuery('#hotel2_9').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_9) || meal3_9 == ''){meal3_9 = 0}
    if(isNaN(hotel3_9) || hotel3_9 == ''){hotel3_9 = 0}
    nett3_9 = Math.round(transfer9+boat9+guide9+group9+entrance9+ticket9+fit9+meal3_9+hotel3_9,2)
    if(nett3_9 != Infinity){
        if(!isNaN(nett3_9)){
            jQuery('#nett3_9').val(formatNumber(nett3_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_9').val('0');
    }
    // end nett 9

    // nett 10
    meal3_10 = parseFloat(unformatNumber(jQuery('#meal3_10').val(),num_grp_sep,dec_sep));
    hotel3_10 = parseFloat(unformatNumber(jQuery('#hotel3_10').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_10) || meal3_10 == ''){meal3_10 = 0}
    if(isNaN(hotel3_10) || hotel3_10 == ''){hotel3_10 = 0}
    nett3_10 = Math.round(transfer10+boat10+guide10+group10+entrance10+ticket10+fit10+meal3_10+hotel3_10,2)
    if(nett3_10 != Infinity){
        if(!isNaN(nett3_10)){
            jQuery('#nett3_10').val(formatNumber(nett3_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_10').val('0');
    }
    // end nett 10


    // nett 11
    meal3_11 = parseFloat(unformatNumber(jQuery('#meal3_11').val(),num_grp_sep,dec_sep));
    hotel3_11 = parseFloat(unformatNumber(jQuery('#hotel3_11').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_11) || meal3_11 == ''){meal3_11 = 0}
    if(isNaN(hotel3_11) || hotel3_11 == ''){hotel3_11 = 0}
    nett3_11 = Math.round(transfer11+boat11+guide11+group11+entrance11+ticket11+fit11+meal3_11+hotel3_11,2)
    if(nett3_11 != Infinity){
        if(!isNaN(nett3_11)){
            jQuery('#nett3_11').val(formatNumber(nett3_11,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_11').val('0');
    }
    // end nett 11


    // nett 12
    meal3_12 = parseFloat(unformatNumber(jQuery('#meal3_12').val(),num_grp_sep,dec_sep));
    hotel3_12 = parseFloat(unformatNumber(jQuery('#hotel2_12').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_12) || meal3_12 == ''){meal3_12 = 0}
    if(isNaN(hotel3_12) || hotel3_12 == ''){hotel3_12 = 0}
    nett3_12 = Math.round(transfer12+boat12+guide12+group12+entrance12+ticket12+fit12+meal3_12+hotel3_12,2)
    if(nett3_12 != Infinity){
        if(!isNaN(nett3_12)){
            jQuery('#nett3_12').val(formatNumber(nett3_12,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_12').val('0');
    }
    // end nett 12


    // nett 13
    meal3_13 = parseFloat(unformatNumber(jQuery('#meal3_13').val(),num_grp_sep,dec_sep));
    hotel3_13 = parseFloat(unformatNumber(jQuery('#hotel3_13').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_13) || meal3_13 == ''){meal3_13 = 0}
    if(isNaN(hotel3_13) || hotel3_13 == ''){hotel3_13 = 0}
    nett3_13 = Math.round(transfer13+boat13+guide13+group13+entrance13+ticket13+fit13+meal3_13+hotel3_13,2)
    if(nett3_13 != Infinity){
        if(!isNaN(nett3_13)){
            jQuery('#nett3_13').val(formatNumber(nett3_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_13').val('0');
    }
    // end nett 13


    // nett 14
    meal3_14 = parseFloat(unformatNumber(jQuery('#meal3_14').val(),num_grp_sep,dec_sep));
    hotel3_14 = parseFloat(unformatNumber(jQuery('#hotel3_14').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_14) || meal3_14 == ''){meal3_14 = 0}
    if(isNaN(hotel3_14) || hotel3_14 == ''){hotel3_14 = 0}
    nett3_14 = Math.round(transfer14+boat14+guide14+group14+entrance14+ticket14+fit14+meal3_14+hotel3_14,2)
    if(nett3_14 != Infinity){
        if(!isNaN(nett3_14)){
            jQuery('#nett3_14').val(formatNumber(nett3_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_14').val('0');
    }
    // end nett 14

    // nett 15
    meal3_15 = parseFloat(unformatNumber(jQuery('#meal3_15').val(),num_grp_sep,dec_sep));
    hotel3_15 = parseFloat(unformatNumber(jQuery('#hotel3_15').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_15) || meal3_15 == ''){meal3_15 = 0}
    if(isNaN(hotel3_15) || hotel3_15 == ''){hotel3_15 = 0}
    nett3_15 = Math.round(transfer15+boat15+guide15+group15+entrance15+ticket15+fit15+meal3_15+hotel3_15,2)
    if(nett3_15 != Infinity){
        if(!isNaN(nett3_15)){
            jQuery('#nett3_15').val(formatNumber(nett3_15,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_15').val('0');
    }
    // end nett 15


    // nett 16
    meal3_16 = parseFloat(unformatNumber(jQuery('#meal3_16').val(),num_grp_sep,dec_sep));
    hotel3_16 = parseFloat(unformatNumber(jQuery('#hotel3_16').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_16) || meal3_16 == ''){meal3_16 = 0}
    if(isNaN(hotel3_16) || hotel3_16 == ''){hotel3_16 = 0}
    nett3_16 = Math.round(transfer16+boat16+guide16+group16+entrance16+ticket16+fit16+meal3_16+hotel3_16,2)
    if(nett3_16 != Infinity){
        if(!isNaN(nett3_16)){
            jQuery('#nett3_16').val(formatNumber(nett3_16,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_16').val('0');
    }
    // end nett 16


    // nett 17
    meal3_17 = parseFloat(unformatNumber(jQuery('#meal3_17').val(),num_grp_sep,dec_sep));
    hotel3_17 = parseFloat(unformatNumber(jQuery('#hotel3_17').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_17) || meal3_17 == ''){meal3_17 = 0}
    if(isNaN(hotel3_17) || hotel3_17 == ''){hotel3_17 = 0}
    nett3_17 = Math.round(transfer17+boat17+guide9+group17+entrance17+ticket17+fit17+meal3_17+hotel3_17,2)
    if(nett3_17 != Infinity){
        if(!isNaN(nett3_17)){
            jQuery('#nett3_17').val(formatNumber(nett3_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_17').val('0');
    }
    // end nett 17

    // nett 18
    meal3_18 = parseFloat(unformatNumber(jQuery('#meal3_18').val(),num_grp_sep,dec_sep));
    hotel3_18 = parseFloat(unformatNumber(jQuery('#hotel3_18').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_18) || meal3_18 == ''){meal3_18 = 0}
    if(isNaN(hotel3_18) || hotel3_18 == ''){hotel3_18 = 0}
    nett3_18 = Math.round(transfer18+boat18+guide10+group18+entrance18+ticket18+fit18+meal3_18+hotel3_18,2)
    if(nett3_18 != Infinity){
        if(!isNaN(nett3_18)){
            jQuery('#nett3_18').val(formatNumber(nett3_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_18').val('0');
    }
    // end nett 18

    // nett 19
    meal3_19 = parseFloat(unformatNumber(jQuery('#meal3_19').val(),num_grp_sep,dec_sep));
    hotel3_19 = parseFloat(unformatNumber(jQuery('#hotel3_19').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_19) || meal3_19 == ''){meal3_19 = 0}
    if(isNaN(hotel3_19) || hotel3_19 == ''){hotel3_19 = 0}
    nett3_19 = Math.round(transfer19+boat19+guide19+group19+entrance19+ticket19+fit19+meal3_19+hotel3_19,2)
    if(nett3_19 != Infinity){
        if(!isNaN(nett3_19)){
            jQuery('#nett3_19').val(formatNumber(nett3_19,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_19').val('0');
    }
    // end nett 19


    // nett 20
    meal3_20 = parseFloat(unformatNumber(jQuery('#meal3_20').val(),num_grp_sep,dec_sep));
    hotel3_20 = parseFloat(unformatNumber(jQuery('#hotel3_20').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_20) || meal3_20 == ''){meal3_20 = 0}
    if(isNaN(hotel3_20) || hotel3_20 == ''){hotel3_20 = 0}
    nett3_20 = Math.round(transfer20+boat20+guide20+group20+entrance20+ticket20+fit20+meal3_20+hotel3_20,2)
    if(nett3_20 != Infinity){
        if(!isNaN(nett3_20)){
            jQuery('#nett3_20').val(formatNumber(nett3_20,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_20').val('0');
    }
    // end nett 20

    // nett 21
    meal3_21 = parseFloat(unformatNumber(jQuery('#meal3_21').val(),num_grp_sep,dec_sep));
    hotel3_21 = parseFloat(unformatNumber(jQuery('#hotel3_21').val(),num_grp_sep,dec_sep));
    
    meal3_sum = parseFloat(unformatNumber(jQuery('#meal3_sum').val(),num_grp_sep,dec_sep));
    hotel3_sum = parseFloat(unformatNumber(jQuery('#hotel3_sum').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_21) || meal3_21 == ''){meal3_21 = 0}
    if(isNaN(hotel3_21) || hotel3_21 == ''){hotel3_21 = 0}
    if(isNaN(meal3_sum) || meal3_sum == ''){meal3_sum = 0}
    if(isNaN(hotel3_sum) || hotel3_sum == ''){hotel3_sum = 0}

    foc3_21 = Math.round((entrance_sum+ticket_sum+fit_sum+meal3_sum+hotel3_sum)/soluongkh11,2);
    if(foc3_21 != Infinity){
        if(!isNaN(foc3_21)){
            jQuery('#foc3_21').val(formatNumber,num_grp_sep,dec_sep,2,0);
        }
    }
    else{
        jQuery('#foc3_21').val('0');
    }

    foc3_23 = Math.round(foc3_21/11,2);

    if(foc3_23 != Infinity){
        if(!isNaN(foc3_23)){
            jQuery('#foc3_23').val(formatNumber,num_grp_sep,dec_sep,2,0);
        }
    }
    else{
        jQuery('#foc3_23').val('0');
    }

    nett3_21 = Math.round(transfer21+boat21+guide11+group21+entrance21+ticket21+fit21+meal3_21+hotel3_21+foc3_21,2)
    if(nett3_21 != Infinity){
        if(!isNaN(nett3_21)){
            jQuery('#nett3_21').val(formatNumber(nett3_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_21').val('0');
    }
    // end nett 21

    // nett 22
    meal3_22 = parseFloat(unformatNumber(jQuery('#meal3_22').val(),num_grp_sep,dec_sep));
    hotel3_22 = parseFloat(unformatNumber(jQuery('#hotel3_22').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_22) || meal3_22 == ''){meal3_22 = 0}
    if(isNaN(hotel3_22) || hotel3_22 == ''){hotel3_22 = 0}

    foc3_22 = Math.round((entrance_sum+ticket_sum+fit_sum+meal3_sum+hotel3_sum)/soluongkh12,2);
    if(foc3_22 != Infinity) {
        if(!isNaN(foc3_22)){
            jQuery('#foc3_22').val(formatNumber(foc3_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc3_22').val('0');
    }

    foc3_24 = Math.round(foc3_22/11,2);
    if(foc3_24 != Infinity){
        if(!isNaN(foc3_24)){
            jQuery('#foc3_24').val(formatNumber(foc3_24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc3_24').val('0');
    }
    nett3_22 = Math.round(transfer22+boat22+guide12+group22+entrance22+ticket22+fit22+meal3_22+hotel3_22+foc3_22,2)
    if(nett3_22 != Infinity){
        if(!isNaN(nett3_22)){
            jQuery('#nett3_22').val(formatNumber(nett3_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_22').val('0');
    }
    // end nett 22

    // nett 23
    meal3_23 = parseFloat(unformatNumber(jQuery('#meal3_23').val(),num_grp_sep,dec_sep));
    hotel3_23 = parseFloat(unformatNumber(jQuery('#hotel3_23').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_23) || meal3_23 == ''){meal3_23 = 0}
    if(isNaN(hotel3_23) || hotel3_23 == ''){hotel3_23 = 0}
    nett3_23 = Math.round(transfer23+boat23+guide13+group23+entrance23+ticket23+fit23+meal3_23+hotel3_23+foc3_23,2)
    if(nett3_23 != Infinity){
        if(!isNaN(nett3_23)){
            jQuery('#nett3_23').val(formatNumber(nett3_23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_23').val('0');
    }
    // end nett 23

    // nett 24
    meal3_24 = parseFloat(unformatNumber(jQuery('#meal3_24').val(),num_grp_sep,dec_sep));
    hotel3_24 = parseFloat(unformatNumber(jQuery('#hotel3_24').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_24) || meal3_24 == ''){meal3_24 = 0}
    if(isNaN(hotel3_24) || hotel3_24 == ''){hotel3_24 = 0}
    nett3_24 = Math.round(transfer24+boat24+guide14+group24+entrance24+ticket24+fit24+meal3_24+hotel3_24+foc3_24,2)
    if(nett3_24 != Infinity){
        if(!isNaN(nett3_24)){
            jQuery('#nett3_24').val(formatNumber(nett3_24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_24').val('0');
    }
    // end nett 24


    // nett 25
    meal3_25 = parseFloat(unformatNumber(jQuery('#meal3_25').val(),num_grp_sep,dec_sep));
    hotel3_25 = parseFloat(unformatNumber(jQuery('#hotel3_25').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_25) || meal3_25 == ''){meal3_25 = 0}
    if(isNaN(hotel3_25) || hotel3_25 == ''){hotel3_25 = 0}

    if(soluongkh13 <30){
        foc3_25 = Math.round((entrance_sum+ticket_sum+fit_sum+meal3_sum+hotel3_sum)/soluongkh13,2);
    }
    else if(soluongkh13 >= 30){
        foc3_25 = Math.round(((entrance_sum+ticket_sum+fit_sum+meal3_sum+hotel3_sum)*2)/soluongkh13,2);
    }

    if(foc3_25 != Infinity){
        if(!isNaN(foc3_25)){
            jQuery('#foc3_25').val(formatNumber(foc3_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc3_25').val('0');
    }

    foc3_28 =  Math.round(foc3_25/11,2);
    if(foc3_28 != Infinity){
        if(!isNaN(foc3_28)){
            jQuery('#foc3_28').val(formatNumber(foc2_28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc3_28').val('0');
    }
    nett3_25 = Math.round(transfer25+boat25+guide15+group25+entrance25+ticket25+fit25+meal3_25+hotel3_25+foc3_25,2)
    if(nett3_25 != Infinity){
        if(!isNaN(nett3_25)){
            jQuery('#nett3_25').val(formatNumber(nett3_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_25').val('0');
    }
    // end nett 25

    // nett 26
    meal3_26 = parseFloat(unformatNumber(jQuery('#meal3_26').val(),num_grp_sep,dec_sep));
    hotel3_26 = parseFloat(unformatNumber(jQuery('#hotel3_26').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_26) || meal3_26 == ''){meal3_26 = 0}
    if(isNaN(hotel3_26) || hotel3_26 == ''){hotel3_26 = 0}

    if(soluongkh14 <30){
        foc3_26 = Math.round((entrance_sum+ticket_sum+fit_sum+meal3_sum+hotel3_sum)/soluongkh14,2);
    }
    else if(soluongkh14 >= 30){
        foc3_26 = Math.round(((entrance_sum+ticket_sum+fit_sum+meal3_sum+hotel3_sum)*2)/soluongkh14,2);
    }

    if(foc3_26 != Infinity){
        if(!isNaN(foc3_26)){
            jQuery('#foc3_26').val(formatNumber(foc3_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc3_26').val('0');
    }

    foc3_29 =  Math.round(foc3_26/11,2);
    if(foc3_29 != Infinity){
        if(!isNaN(foc3_29)){
            jQuery('#foc3_29').val(formatNumber(foc3_29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc3_29').val('0');
    }

    nett3_26 = Math.round(transfer26+boat26+guide15+group26+entrance26+ticket26+fit26+meal3_26+hotel3_26+foc3_26,2)
    if(nett3_26 != Infinity){
        if(!isNaN(nett3_26)){
            jQuery('#nett3_26').val(formatNumber(nett3_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_26').val('0');
    }
    // end nett 26


    // nett 27
    meal3_27 = parseFloat(unformatNumber(jQuery('#meal3_27').val(),num_grp_sep,dec_sep));
    hotel3_27 = parseFloat(unformatNumber(jQuery('#hotel3_27').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_27) || meal3_27 == ''){meal3_27 = 0}
    if(isNaN(hotel3_27) || hotel3_27 == ''){hotel3_27 = 0}

    if(soluongkh15 <30){
        foc3_27 = Math.round((entrance_sum+ticket_sum+fit_sum+meal3_sum+hotel3_sum)/soluongkh15,2);
    }
    else if(soluongkh15 >= 30){
        foc3_27 = Math.round(((entrance_sum+ticket_sum+fit_sum+meal3_sum+hotel3_sum)*2)/soluongkh15,2);
    }

    if(foc3_27 != Infinity){
        if(!isNaN(foc3_27)){
            jQuery('#foc3_27').val(formatNumber(foc3_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc3_27').val('0');
    }

    foc3_30 =  Math.round(foc3_27/11,2);
    if(foc3_30 != Infinity){
        if(!isNaN(foc3_30)){
            jQuery('#foc3_30').val(formatNumber(foc2_30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#foc3_30').val('0');
    }
    nett3_27 = Math.round(transfer27+boat27+guide15+group27+entrance27+ticket27+fit27+meal3_27+hotel3_27+foc3_27,2)
    if(nett3_27 != Infinity){
        if(!isNaN(nett3_27)){
            jQuery('#nett3_27').val(formatNumber(nett3_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_27').val('0');
    }
    // end nett 27


    // nett 28
    meal3_28 = parseFloat(unformatNumber(jQuery('#meal3_28').val(),num_grp_sep,dec_sep));
    hotel3_28 = parseFloat(unformatNumber(jQuery('#hotel3_28').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_28) || meal3_28 == ''){meal3_28 = 0}
    if(isNaN(hotel3_28) || hotel3_28 == ''){hotel3_28 = 0}
    nett3_28 = Math.round(transfer28+boat28+guide28+group28+entrance28+ticket28+fit28+meal3_28+hotel3_28+foc3_28,2)
    if(nett3_28 != Infinity){
        if(!isNaN(nett3_28)){
            jQuery('#nett3_28').val(formatNumber(nett3_28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_28').val('0');
    }
    // end nett 28

    // nett 29
    meal3_29 = parseFloat(unformatNumber(jQuery('#meal3_29').val(),num_grp_sep,dec_sep));
    hotel3_29 = parseFloat(unformatNumber(jQuery('#hotel3_29').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_29) || meal3_29 == ''){meal3_29 = 0}
    if(isNaN(hotel3_29) || hotel3_29 == ''){hotel3_29 = 0}
    nett3_29 = Math.round(transfer29+boat29+guide29+group29+entrance29+ticket29+fit29+meal3_29+hotel3_29+foc3_29,2)
    if(nett3_29 != Infinity){
        if(!isNaN(nett3_29)){
            jQuery('#nett3_29').val(formatNumber(nett3_29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_29').val('0');
    }
    // end nett 29


    // nett 30
    meal3_30 = parseFloat(unformatNumber(jQuery('#meal3_30').val(),num_grp_sep,dec_sep));
    hotel3_30 = parseFloat(unformatNumber(jQuery('#hotel3_30').val(),num_grp_sep,dec_sep));

    if(isNaN(meal3_30) || meal3_30 == ''){meal3_30 = 0}
    if(isNaN(hotel3_30) || hotel3_30 == ''){hotel3_30 = 0}
    nett3_30 = Math.round(transfer30+boat30+guide30+group30+entrance30+ticket30+fit30+meal3_30+hotel3_30+foc3_30,2)
    if(nett3_30 != Infinity){
        if(!isNaN(nett3_30)){
            jQuery('#nett3_30').val(formatNumber(nett3_30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#nett3_30').val('0');
    }
    jQuery('#nett3_31').val(jQuery('#hotel3_sum').val());

    nett3_32 = Math.round(parseFloat(unformatNumber(jQuery('#hotel3_sum').val(),num_grp_sep,dec_sep))/11,2);

    jQuery('#nett3_32').val(formatNumber(nett3_32,num_grp_sep,dec_sep,2,0));

    // end nett 30

    // SERVICE CHARGE  3 


    service3_rate = parseFloat(unformatNumber(jQuery('#service3_rate').val(),num_grp_sep,dec_sep));
    service3_1 = Math.round(nett3_1*(service3_rate/100),2);
    if(service3_1 != Infinity ){
        if(!isNaN(service3_1)){
            jQuery('#service3_1').val(formatNumber(service3_1,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_1').val('0');
    }

    service3_2 = Math.round(nett3_2*(service3_rate/100),2);
    if(service3_2 != Infinity ){
        if(!isNaN(service3_2)){
            jQuery('#service3_2').val(formatNumber(service3_2,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_2').val('0');
    }

    service3_5 = Math.round(nett2_5*(service3_rate/100),2);
    if(service3_5 != Infinity ){
        if(!isNaN(service3_5)){
            jQuery('#service3_5').val(formatNumber(service3_5,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_5').val('0');
    }

    service3_6 = Math.round(nett3_6*(service3_rate/100),2);
    if(service3_6 != Infinity ){
        if(!isNaN(service3_6)){
            jQuery('#service3_6').val(formatNumber(service3_6,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_6').val('0');
    }

    service3_9 = Math.round(nett3_9*(service3_rate/100),2);
    if(service3_9 != Infinity ){
        if(!isNaN(service3_9)){
            jQuery('#service3_9').val(formatNumber(service3_9,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_9').val('0');
    }

    service3_10 = Math.round(nett3_10*(service3_rate/100),2);
    if(service3_10 != Infinity ){
        if(!isNaN(service3_10)){
            jQuery('#service3_10').val(formatNumber(service3_10,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_10').val('0');
    }

    service3_13 = Math.round(nett3_13*(service3_rate/100),2);
    if(service3_13 != Infinity ){
        if(!isNaN(service3_13)){
            jQuery('#service3_13').val(formatNumber(service3_13,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_13').val('0');
    }

    service3_17 = Math.round(nett3_17*(service3_rate/100),2);
    if(service3_17 != Infinity ){
        if(!isNaN(service3_17)){
            jQuery('#service3_17').val(formatNumber(service3_17,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_17').val('0');
    }

    service3_18 = Math.round(nett3_18*(service3_rate/100),2);
    if(service3_18 != Infinity ){
        if(!isNaN(service3_18)){
            jQuery('#service3_18').val(formatNumber(service3_18,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_18').val('0');
    }

    service3_21 = Math.round(nett3_21*(service3_rate/100),2);
    if(service3_21 != Infinity ){
        if(!isNaN(service3_21)){
            jQuery('#service3_21').val(formatNumber(service3_21,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_21').val('0');
    }

    service3_22 = Math.round(nett3_22*(service3_rate/100),2);
    if(service3_22 != Infinity ){
        if(!isNaN(service3_22)){
            jQuery('#service3_22').val(formatNumber(service3_22,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_22').val('0');
    }

    service3_25 = Math.round(nett3_25*(service3_rate/100),2);
    if(service3_25 != Infinity ){
        if(!isNaN(service3_25)){
            jQuery('#service3_25').val(formatNumber(service3_25,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_25').val('0');
    }

    service3_26 = Math.round(nett3_26*(service3_rate/100),2);
    if(service3_26 != Infinity ){
        if(!isNaN(service3_26)){
            jQuery('#service3_26').val(formatNumber(service3_26,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_26').val('0');
    }

    service3_27 = Math.round(nett3_27*(service3_rate/100),2);
    if(service3_27 != Infinity ){
        if(!isNaN(service3_27)){
            jQuery('#service3_27').val(formatNumber(service3_27,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_27').val('0');
    }

    service3_31 = Math.round(nett3_31*(service3_rate/100),2);
    if(service3_31 != Infinity ){
        if(!isNaN(service3_31)){
            jQuery('#service3_31').val(formatNumber(service3_31,num_grp_sep,dec_sep,2,0))
        }
    }
    else{
        jQuery('#service3_31').val('0');
    }
    // END SERVICE CHARGE  3

    // SELL 2 - VND

    sell3_vnd1 = Math.round(nett3_1+service3_1,2);
    if(sell3_vnd1 != Infinity){
        if(!isNaN(sell3_vnd1)){
            jQuery('#sell3_vnd1').val(formatNumber(sell3_vnd1,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd1').val('0');
    }

    sell3_vnd2 = Math.round(nett3_2+service2_2,2);
    if(sell3_vnd2 != Infinity){
        if(!isNaN(sell3_vnd2)){
            jQuery('#sell3_vnd2').val(formatNumber(sell3_vnd2,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd2').val('0');
    }

    sell3_vnd3 = Math.round(sell3_vnd1/11,2);
    if(sell3_vnd3 != Infinity){
        if(!isNaN(sell3_vnd3)){
            jQuery('#sell3_vnd3').val(formatNumber(sell3_vnd3,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd3').val('0');
    }

    sell3_vnd4 = Math.round(sell3_vnd2/11,2);
    if(sell3_vnd4 != Infinity){
        if(!isNaN(sell3_vnd4)){
            jQuery('#sell3_vnd4').val(formatNumber(sell3_vnd4,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd4').val('0');
    }


    sell3_vnd5 = Math.round(nett3_5+service2_5,2);
    if(sell3_vnd5 != Infinity){
        if(!isNaN(sell3_vnd5)){
            jQuery('#sell3_vnd5').val(formatNumber(sell3_vnd5,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd5').val('0');
    }

    sell3_vnd6 = Math.round(nett3_6+service2_6,2);
    if(sell3_vnd6 != Infinity){
        if(!isNaN(sell3_vnd6)){
            jQuery('#sell3_vnd6').val(formatNumber(sell3_vnd6,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd6').val('0');
    }

    sell3_vnd7 = Math.round(sell3_vnd5/11,2);
    if(sell3_vnd7 != Infinity){
        if(!isNaN(sell3_vnd7)){
            jQuery('#sell3_vnd7').val(formatNumber(sell3_vnd7,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd7').val('0');
    }

    sell3_vnd8 = Math.round(sell3_vnd8/11,2);
    if(sell3_vnd8 != Infinity){
        if(!isNaN(sell2_vnd8)){
            jQuery('#sell3_vnd8').val(formatNumber(sell3_vnd8,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd8').val('0');
    }


    sell3_vnd9 = Math.round(nett3_9+service3_9,2);
    if(sell3_vnd9 != Infinity){
        if(!isNaN(sell3_vnd9)){
            jQuery('#sell3_vnd9').val(formatNumber(sell3_vnd9,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd9').val('0');
    }

    sell3_vnd10 = Math.round(nett3_10+service3_10,2);
    if(sell3_vnd10 != Infinity){
        if(!isNaN(sell3_vnd10)){
            jQuery('#sell3_vnd10').val(formatNumber(sell3_vnd10,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd10').val('0');
    }

    sell3_vnd11 = Math.round(sell3_vnd9/11,2);
    if(sell3_vnd11 != Infinity){
        if(!isNaN(sell3_vnd11)){
            jQuery('#sell3_vnd11').val(formatNumber(sell3_vnd11,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd11').val('0');
    }

    sell3_vnd12 = Math.round(sell3_vnd10/11,2); 
    if(sell3_vnd12 != Infinity){
        if(!isNaN(sell3_vnd12)){
            jQuery('#sell3_vnd12').val(formatNumber(sell3_vnd12,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd12').val('0');
    }

    sell3_vnd13 = Math.round(nett3_13+service3_13,2);
    if(sell3_vnd13 != Infinity){
        if(!isNaN(sell3_vnd13)){
            jQuery('#sell3_vnd13').val(formatNumber(sell3_vnd13,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd13').val('0');
    }

    sell3_vnd14 = Math.round(nett3_14+service2_14,2);
    if(sell3_vnd14 != Infinity){
        if(!isNaN(sell3_vnd14)){
            jQuery('#sell3_vnd14').val(formatNumber(sell3_vnd14,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd14').val('0');
    }

    sell3_vnd15 = Math.round(sell3_vnd13/11,2);
    if(sell3_vnd15 != Infinity){
        if(!isNaN(sell3_vnd15)){
            jQuery('#sell3_vnd15').val(formatNumber(sell3_vnd15,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd15').val('0');
    }

    sell3_vnd16 = Math.round(sell3_vnd14/11,2);
    if(sell3_vnd16 != Infinity){
        if(!isNaN(sell3_vnd16)){
            jQuery('#sell3_vnd16').val(formatNumber(sell3_vnd16,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd16').val('0');
    }


    sell3_vnd17 = Math.round(nett3_17+service3_17,2);
    if(sell3_vnd17 != Infinity){
        if(!isNaN(sell3_vnd17)){
            jQuery('#sell3_vnd17').val(formatNumber(sell3_vnd17,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd17').val('0');
    }

    sell3_vnd18 = Math.round(nett3_18+service1_18,2);
    if(sell3_vnd18 != Infinity){
        if(!isNaN(sell3_vnd18)){
            jQuery('#sell3_vnd18').val(formatNumber(sell3_vnd18,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd18').val('0');
    }

    sell3_vnd19 = Math.round(sell3_vnd17/11,2);
    if(sell3_vnd19 != Infinity){
        if(!isNaN(sell3_vnd19)){
            jQuery('#sell3_vnd19').val(formatNumber(sell3_vnd19,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd19').val('0');
    }

    sell3_vnd20 = Math.round(sell3_vnd18/11,2);
    if(sell3_vnd20 != Infinity){
        if(!isNaN(sell3_vnd20)){
            jQuery('#sell3_vnd20').val(formatNumber(sell3_vnd20,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd20').val('0');
    }

    sell3_vnd21 = Math.round(nett3_21+service3_21,2);
    if(sell3_vnd21 != Infinity){
        if(!isNaN(sell3_vnd21)){
            jQuery('#sell3_vnd21').val(formatNumber(sell3_vnd21,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd21').val('0');
    }

    sell3_vnd22 = Math.round(nett3_22+service3_22,2);
    if(sell3_vnd22 != Infinity){
        if(!isNaN(sell3_vnd22)){
            jQuery('#sell3_vnd22').val(formatNumber(sell3_vnd22,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd22').val('0');
    }

    sell3_vnd23 = Math.round(sell3_vnd21/11,2);
    if(sell3_vnd23 != Infinity){
        if(!isNaN(sell3_vnd23)){
            jQuery('#sell3_vnd23').val(formatNumber(sell3_vnd23,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd23').val('0');
    }

    sell3_vnd24 = Math.round(sell3_vnd22/11,2);
    if(sell3_vnd24 != Infinity){
        if(!isNaN(sell3_vnd24)){
            jQuery('#sell3_vnd24').val(formatNumber(sell3_vnd24,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd24').val('0');
    }


    sell3_vnd25 = Math.round(nett3_25+service3_25,2);
    if(sell3_vnd25 != Infinity){
        if(!isNaN(sell3_vnd25)){
            jQuery('#sell3_vnd25').val(formatNumber(sell3_vnd25,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd25').val('0');
    }

    sell3_vnd26 = Math.round(nett3_26+service3_26,2);
    if(sell3_vnd26 != Infinity){
        if(!isNaN(sell3_vnd26)){
            jQuery('#sell3_vnd26').val(formatNumber(sell3_vnd26,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd26').val('0');
    }

    sell3_vnd27 = Math.round(nett3_27+service3_27,2);
    if(sell3_vnd27 != Infinity){
        if(!isNaN(sell3_vnd27)){
            jQuery('#sell3_vnd27').val(formatNumber(sell3_vnd27,num_grp_sep,dec_sep,2,0));  
        }
    }
    else{
        jQuery('#sell3_vnd27').val('0');
    }

    sell3_vnd28 = Math.round(sell3_vnd25/11,2);
    if(sell3_vnd28 != Infinity){
        if(!isNaN(sell3_vnd28)){
            jQuery('#sell3_vnd28').val(formatNumber(sell3_vnd28,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd28').val('0');
    }

    sell3_vnd29 = Math.round(sell3_vnd26/11,2);
    if(sell3_vnd29 != Infinity){
        if(!isNaN(sell3_vnd29)){
            jQuery('#sell3_vnd29').val(formatNumber(sell3_vnd29,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd29').val('0');
    }

    sell3_vnd30 = Math.round(sell3_vnd27/11,2);
    if(sell3_vnd30 != Infinity){
        if(!isNaN(sell3_vnd30)){
            jQuery('#sell3_vnd30').val(formatNumber(sell3_vnd30,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd30').val('0');
    }

    sell3_vnd31 = Math.round(nett3_31+service3_31,2);
    if(sell3_vnd31 != Infinity){
        if(!isNaN(sell3_vnd31)){
            jQuery('#sell3_vnd31').val(formatNumber(sell3_vnd31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd31').val('0');
    }

    sell3_vnd32 = Math.round(sell3_vnd31/11,2);
    if(sell3_vnd32 != Infinity){
        if(!isNaN(sell3_vnd32)){
            jQuery('#sell3_vnd32').val(formatNumber(sell3_vnd32,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#sell3_vnd32').val('0');
    }

    // end SELL 2 - VND


    // tax to be paid 2
    tax3_1 = Math.round(sell3_vnd3-nett3_3,2);
    if(tax3_1 != Infinity){
        if(!isNaN(tax3_1)){
            jQuery('#tax3_1').val(formatNumber(tax3_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_1').val('0');
    }

    tax3_2 = Math.round(sell3_vnd4-nett3_4,2);
    if(tax3_2 != Infinity){
        if(!isNaN(tax3_2)){
            jQuery('#tax3_2').val(formatNumber(tax3_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_2').val('0');
    }

    tax3_5 = Math.round(sell3_vnd7-nett3_7,2);
    if(tax3_5 != Infinity){
        if(!isNaN(tax3_5)){
            jQuery('#tax3_5').val(formatNumber(tax3_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_5').val('0');
    }


    tax3_6 = Math.round(sell3_vnd8-nett3_8,2);
    if(tax3_6 != Infinity){
        if(!isNaN(tax3_6)){
            jQuery('#tax3_6').val(formatNumber(tax3_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_6').val('0');
    }


    tax3_9 = Math.round(sell3_vnd11-nett3_11,2);
    if(tax3_9 != Infinity){
        if(!isNaN(tax3_9)){
            jQuery('#tax3_9').val(formatNumber(tax3_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_9').val('0');
    }

    tax3_10 = Math.round(sell3_vnd12-nett3_12,2);
    if(tax3_10 != Infinity){
        if(!isNaN(tax3_10)){
            jQuery('#tax3_10').val(formatNumber(tax3_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_10').val('0');
    }


    tax3_13 = Math.round(sell3_vnd15-nett3_15,2);
    if(tax3_13 != Infinity){
        if(!isNaN(tax3_13)){
            jQuery('#tax3_13').val(formatNumber(tax3_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_13').val('0');
    }

    tax3_14 = Math.round(sell3_vnd16-nett3_16,2);
    if(tax3_14 != Infinity){
        if(!isNaN(tax3_14)){
            jQuery('#tax3_14').val(formatNumber(tax3_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_14').val('0');
    }

    tax3_17 = Math.round(sell3_vnd19-nett3_19,2);
    if(tax3_17 != Infinity){
        if(!isNaN(tax3_17)){
            jQuery('#tax3_17').val(formatNumber(tax3_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_17').val('0');
    }

    tax3_18 = Math.round(sell3_vnd20-nett3_20,2);
    if(tax3_18 != Infinity){
        if(!isNaN(tax3_18)){
            jQuery('#tax3_18').val(formatNumber(tax3_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_18').val('0');
    }

    tax3_21 = Math.round(sell3_vnd23-nett3_23,2);
    if(tax3_21 != Infinity){
        if(!isNaN(tax3_21)){
            jQuery('#tax3_21').val(formatNumber(tax3_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_21').val('0');
    }


    tax3_22 = Math.round(sell3_vnd24-nett3_24,2);
    if(tax3_22 != Infinity){
        if(!isNaN(tax3_22)){
            jQuery('#tax3_22').val(formatNumber(tax3_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_22').val('0');
    }

    tax3_25 = Math.round(sell3_vnd28-nett3_28,2);
    if(tax3_25 != Infinity){
        if(!isNaN(tax3_25)){
            jQuery('#tax3_25').val(formatNumber(tax3_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_25').val('0');
    }

    tax3_26 = Math.round(sell3_vnd29-nett3_29,2);
    if(tax3_26 != Infinity){
        if(!isNaN(tax3_26)){
            jQuery('#tax3_26').val(formatNumber(tax3_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_26').val('0');
    }

    tax3_27 = Math.round(sell3_vnd27-nett3_27,2);
    if(tax3_27 != Infinity){
        if(!isNaN(tax3_27)){
            jQuery('#tax3_27').val(formatNumber(tax3_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#tax3_27').val('0');
    }

    // end tax to be paid 2


    // Profit/pax 1
    profit3_1 = Math.round(service3_1-tax3_1,2);
    if(profit3_1 != Infinity){
        if(!isNaN(profit3_1)){
            jQuery('#profit3_1').val(formatNumber(profit3_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_1').val('0');
    }

    profit3_2 = Math.round(service3_2-tax3_2,2);
    if(profit3_2 != Infinity){
        if(!isNaN(profit3_2)){
            jQuery('#profit3_2').val(formatNumber(profit3_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_2').val('0');
    }

    profit3_5 = Math.round(service3_5-tax3_5,2);
    if(profit3_5 != Infinity){
        if(!isNaN(profit3_5)){
            jQuery('#profit3_5').val(formatNumber(profit3_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_5').val('0');
    }

    profit3_6 = Math.round(service3_6-tax3_6,2);
    if(profit3_6 != Infinity){
        if(!isNaN(profit3_6)){
            jQuery('#profit3_6').val(formatNumber(profit3_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_6').val('0');
    }


    profit3_9 = Math.round(service3_9-tax1_9,2);
    if(profit3_9 != Infinity){
        if(!isNaN(profit3_9)){
            jQuery('#profit3_9').val(formatNumber(profit3_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_9').val('0');
    }

    profit3_10 = Math.round(service3_10-tax3_10,2);
    if(profit3_10 != Infinity){
        if(!isNaN(profit3_10)){
            jQuery('#profit3_10').val(formatNumber(profit3_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_10').val('0');
    }

    profit3_13 = Math.round(service3_13-tax3_13,2);
    if(profit3_13 != Infinity){
        if(!isNaN(profit3_13)){
            jQuery('#profit3_13').val(formatNumber(profit3_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_13').val('0');
    }

    profit3_14 = Math.round(service3_14-tax3_14,2);
    if(profit3_14 != Infinity){
        if(!isNaN(profit3_14)){
            jQuery('#profit3_14').val(formatNumber(profit3_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_14').val('0');
    }

    profit3_17 = Math.round(service3_17-tax3_17,2);
    if(profit3_17 != Infinity){
        if(!isNaN(profit3_17)){
            jQuery('#profit3_17').val(formatNumber(profit3_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_17').val('0');
    }

    profit3_18 = Math.round(service3_18-tax2_18,2);
    if(profit3_18 != Infinity){
        if(!isNaN(profit3_18)){
            jQuery('#profit3_18').val(formatNumber(profit3_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_18').val('0');
    }


    profit3_21 = Math.round(service3_21-tax3_21,2);
    if(profit3_21 != Infinity){
        if(!isNaN(profit3_21)){
            jQuery('#profit3_21').val(formatNumber(profit3_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_21').val('0');
    }

    profit3_22 = Math.round(service3_22-tax3_22,2);
    if(profit3_22 != Infinity){
        if(!isNaN(profit3_22)){
            jQuery('#profit3_22').val(formatNumber(profit3_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_22').val('0');
    }

    profit3_25 = Math.round(service3_25-tax3_25,2);
    if(profit3_25 != Infinity){
        if(!isNaN(profit3_25)){
            jQuery('#profit3_25').val(formatNumber(profit3_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_25').val('0');
    }

    profit3_26 = Math.round(service3_26-tax3_26,2);
    if(profit3_26 != Infinity){
        if(!isNaN(profit3_26)){
            jQuery('#profit3_26').val(formatNumber(profit3_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_26').val('0');
    }


    profit3_27 = Math.round(service3_27-tax3_27,2);
    if(profit3_27 != Infinity){
        if(!isNaN(profit3_27)){
            jQuery('#profit3_27').val(formatNumber(profit3_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_27').val('0');
    }

    profit3_31 = Math.round(service3_31-tax1_31,2);
    if(profit3_31 != Infinity){
        if(!isNaN(profit3_31)){
            jQuery('#profit3_31').val(formatNumber(profit3_31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#profit3_31').val('0');
    }
    // end Profit/pax 1


    // Total profit
    total3_1 = Math.round(profit3_1*soluongkh1,2);
    if(total3_1 != Infinity){
        if(!isNaN(total3_1)){
            jQuery("#total3_1").val(formatNumber(total3_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_1").val('0');
    }

    total3_2 = Math.round(profit3_2*soluongkh2,2);
    if(total3_2 != Infinity){
        if(!isNaN(total3_2)){
            jQuery("#total3_2").val(formatNumber(total3_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_2").val('0');
    }

    total3_5 = Math.round(profit3_5*soluongkh3,2);
    if(total3_5 != Infinity){
        if(!isNaN(total3_5)){
            jQuery("#total3_5").val(formatNumber(total3_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_5").val('0');
    }

    total3_6 = Math.round(profit3_6*soluongkh4,2);
    if(total3_6 != Infinity){
        if(!isNaN(total3_6)){
            jQuery("#total3_6").val(formatNumber(total3_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_6").val('0');
    }

    total3_9 = Math.round(profit3_9*soluongkh5,2);
    if(total3_9 != Infinity){
        if(!isNaN(total3_9)){
            jQuery("#total3_9").val(formatNumber(total3_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_9").val('0');
    }

    total3_10 = Math.round(profit3_10*soluongkh6,2);
    if(total3_10 != Infinity){
        if(!isNaN(total3_10)){
            jQuery("#total3_10").val(formatNumber(total3_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_10").val('0');
    }


    total3_13 = Math.round(profit3_13*soluongkh7,2);
    if(total3_13 != Infinity){
        if(!isNaN(total3_13)){
            jQuery("#total3_13").val(formatNumber(total3_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_13").val('0');
    }

    total3_14 = Math.round(profit3_14*soluongkh8,2);
    if(total3_14 != Infinity){
        if(!isNaN(total3_14)){
            jQuery("#total3_14").val(formatNumber(total3_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_14").val('0');
    }

    total3_17 = Math.round(profit3_17*soluongkh9,2);
    if(total3_17 != Infinity){
        if(!isNaN(total3_17)){
            jQuery("#total3_17").val(formatNumber(total3_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_17").val('0');
    }

    total3_18 = Math.round(profit3_18*soluongkh10,2);
    if(total3_18 != Infinity){
        if(!isNaN(total3_18)){
            jQuery("#total3_18").val(formatNumber(total3_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_18").val('0');
    }

    total3_21 = Math.round(profit3_21*soluongkh11,2);
    if(total3_21 != Infinity){
        if(!isNaN(total3_21)){
            jQuery("#total3_21").val(formatNumber(total3_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_21").val('0');
    }

    total3_22 = Math.round(profit3_22*soluongkh12,2);
    if(total3_22 != Infinity){
        if(!isNaN(total3_22)){
            jQuery("#total3_22").val(formatNumber(total3_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_22").val('0');
    }

    total3_25 = Math.round(profit3_25*soluongkh13,2);
    if(total3_25 != Infinity){
        if(!isNaN(total3_25)){
            jQuery("#total3_25").val(formatNumber(total3_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_25").val('0');
    }

    total3_26 = Math.round(profit3_26*soluongkh14,2);
    if(total3_26 != Infinity){
        if(!isNaN(total3_26)){
            jQuery("#total3_26").val(formatNumber(total3_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_26").val('0');
    }

    total3_27 = Math.round(profit3_27*soluongkh15,2);
    if(total3_27 != Infinity){
        if(!isNaN(total3_27)){
            jQuery("#total3_27").val(formatNumber(total3_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery("#total3_27").val('0');
    }

    // end Total profit

    // % of interest 1

    interest3_1 = Math.round((profit3_1/sell3_vnd1)*100,2);
    if(interest3_1 != Infinity){
        if(!isNaN(interest3_1)){
            jQuery('#interest3_1').val(formatNumber(interest3_1,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_1').val('0');
    }

    interest3_2 = Math.round((profit3_2/sell3_vnd2)*100,2);
    if(interest3_2 != Infinity){
        if(!isNaN(interest3_2)){
            jQuery('#interest3_2').val(formatNumber(interest3_2,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_2').val('0');
    }

    interest3_5 = Math.round((profit3_5/sell3_vnd5)*100,2);
    if(interest3_5 != Infinity){
        if(!isNaN(interest3_5)){
            jQuery('#interest3_5').val(formatNumber(interest3_5,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_5').val('0');
    }


    interest3_6 = Math.round((profit3_6/sell3_vnd6)*100,2);
    if(interest3_6 != Infinity){
        if(!isNaN(interest3_6)){
            jQuery('#interest3_6').val(formatNumber(interest3_6,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_6').val('0');
    }

    interest3_9 = Math.round((profit3_9/sell3_vnd9)*100,2);
    if(interest3_9 != Infinity){
        if(!isNaN(interest3_9)){
            jQuery('#interest3_9').val(formatNumber(interest3_9,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_9').val('0');
    }

    interest3_10 = Math.round((profit3_10/sell3_vnd10)*100,2);
    if(interest3_10 != Infinity){
        if(!isNaN(interest3_10)){
            jQuery('#interest3_10').val(formatNumber(interest3_10,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_10').val('0');
    }

    interest3_13 = Math.round((profit3_13/sell3_vnd13)*100,2);
    if(interest3_13 != Infinity){
        if(!isNaN(interest3_13)){
            jQuery('#interest3_13').val(formatNumber(interest3_13,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_13').val('0');
    }

    interest3_14 = Math.round((profit3_14/sell3_vnd14)*100,2);
    if(interest3_14 != Infinity){
        if(!isNaN(interest3_14)){
            jQuery('#interest3_14').val(formatNumber(interest3_14,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_14').val('0');
    }

    interest3_17 = Math.round((profit3_17/sell3_vnd17)*100,2);
    if(interest3_17 != Infinity){
        if(!isNaN(interest3_17)){
            jQuery('#interest3_17').val(formatNumber(interest3_17,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_17').val('0');
    }

    interest3_18 = Math.round((profit3_18/sell3_vnd18)*100,2);
    if(interest3_18 != Infinity){
        if(!isNaN(interest3_18)){
            jQuery('#interest3_18').val(formatNumber(interest3_18,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_18').val('0');
    }

    interest3_21 = Math.round((profit3_21/sell3_vnd21)*100,2);
    if(interest3_21 != Infinity){
        if(!isNaN(interest3_21)){
            jQuery('#interest3_21').val(formatNumber(interest2_21,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_21').val('0');
    }

    interest3_22 = Math.round((profit3_22/sell3_vnd22)*100,2);
    if(interest3_22 != Infinity){
        if(!isNaN(interest3_22)){
            jQuery('#interest3_22').val(formatNumber(interest3_22,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_22').val('0');
    }

    interest3_25 = Math.round((profit3_25/sell3_vnd25)*100,2);
    if(interest3_25 != Infinity){
        if(!isNaN(interest3_25)){
            jQuery('#interest3_25').val(formatNumber(interest3_25,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_25').val('0');
    }

    interest3_26 = Math.round((profit3_26/sell3_vnd26)*100,2);
    if(interest3_26 != Infinity){
        if(!isNaN(interest3_26)){
            jQuery('#interest3_26').val(formatNumber(interest3_26,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_26').val('0');
    }

    interest3_27 = Math.round((profit3_27/sell3_vnd27)*100,2);
    if(interest3_27 != Infinity){
        if(!isNaN(interest3_27)){
            jQuery('#interest3_27').val(formatNumber(interest3_27,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_27').val('0');
    }

    interest3_31 = Math.round((profit3_31/sell3_vnd31)*100,2);
    if(interest3_31 != Infinity){
        if(!isNaN(interest3_31)){
            jQuery('#interest3_31').val(formatNumber(interest3_31,num_grp_sep,dec_sep,2,0));
        }
    }
    else{
        jQuery('#interest3_31').val('0');
    }

    // end % of interest


    // end price 3






}

// end summary 1