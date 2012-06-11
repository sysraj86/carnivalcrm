function unformat(fotmatedNumber){
    return unformatNumber(fotmatedNumber, num_grp_sep, dec_sep); 
}

// Format current object
    function fmCurrency(current,decimal){
        var val = $(current).val();
//        $this =  $(current);
        if($(current).length>0){
            $(current).val(val).formatCurrency({
                roundToDecimalPlace:decimal,
                decimalSymbol: dec_sep,
                digitGroupSymbol: num_grp_sep, 
                negativeFormat: '-%n',
                symbol: ''
            });
        }
    }