jQuery(function($) {
    /** instruct the metadata plugin where to look the metadata
    * jQuery.metadata.setType( type, name );
    * please read the metadata instructions for additional information
    * http://plugins.jquery.com/project/metadata
    */            
    $.metadata.setType('attr', 'meta');    
    
    /** To call autoNumeric
    * $(selector).autoNumeric({options}); 
    * The below example uses the input & class selector
    */
    $('input.auto').autoNumeric();
    
    /* scripts for metadata code generator  */
        
    /* rountine that prevents  numeric characters from being entered the the altDec field  */
    $('#altDecb').keypress(function(e) { 
        var cc = String.fromCharCode(e.which);
        if ( e.which != 32 && cc >= 0 && cc <= 9 ){
            e.preventDefault();
        }
    });

    /* rountine that prevents  apostrophe, comma, more than one period (full stop) or numeric characters from being entered the the aSign field  */
    $('#aSignb').keypress(function(e) { 
        var cc = String.fromCharCode(e.which);
        if (( e.which != 32 && cc >= 0 && cc <= 9 ) || cc == "," || cc == "'" || cc == "." && this.value.lastIndexOf('.') != -1){
            e.preventDefault();
        }
    });
    
    $("input.md").bind('click keyup blur',function() {
        var metaCode = '', aSep = '', dGroup = '', aDec = '', altDec = '', aSign = '', pSign = '', vMin = '', vMax = '', mDec = '', mRound = '', aPad = '', wEmpty = '', aForm = ''; 
        if($("input:radio[name=aSep]:checked").attr('id') == 'aSepc'){
            $('input:radio[name=aDec]:nth(0)').removeAttr("disabled");
            $('input:radio[name=aDec]:nth(0)').attr('checked',true);
            $('input:radio[name=aDec]:nth(1)').attr("disabled", true); 
        }
        if($("input:radio[name=aSep]:checked").attr('id') == 'aSepp'){
            $('input:radio[name=aDec]:nth(1)').removeAttr("disabled");
            $('input:radio[name=aDec]:nth(1)').attr('checked',true);
            $('input:radio[name=aDec]:nth(0)').attr("disabled", true); 
        }
        if ($("input:radio[name=aSep]:checked").attr('id') != 'aSepc' || $("input:radio[name=aSep]:checked").attr('id') != 'aSepp') {
            $('input:radio[name=aDec]:nth(0)').removeAttr("disabled");
            $('input:radio[name=aDec]:nth(1)').removeAttr("disabled");
        }
        aSep = $("input:radio[name=aSep]:checked").val();
        dGroup = $("input:radio[name=dGroup]:checked").val();
        aDec = $("input:radio[name=aDec]:checked").val();
        
        if($("input:radio[name=altDec]:checked").attr('id') == 'altDecd'){
            $('#altDecb').val('');
            $('#altDecb').attr("disabled", true); 
        }
        if($("input:radio[name=altDec]:checked").attr('id') == 'altDeca'){
            $('#altDecb').removeAttr("disabled");
            altDec = $('#altDecb').val();
        }        
        
        if($("input:radio[name=aSign]:checked").attr('id') == 'aSignd'){
            $('#aSignb').val('');
            $('#aSignb').attr("disabled", true); 
        }
        if($("input:radio[name=aSign]:checked").attr('id') == 'aSigna'){
            $('#aSignb').removeAttr("disabled");
            aSign = $('#aSignb').val();
        }
        
        pSign = $("input:radio[name=pSign]:checked").val();        
        if($("input:radio[name=vMin]:checked").attr('id') == 'vMind'){
            $('#vMinb').val('');
            $('#vMinb').attr("disabled", true); 
        }
        if($("input:radio[name=vMin]:checked").attr('id') == 'vMina'){
            $('#vMinb').removeAttr("disabled");
            vMin = $('#vMinb').val();
        }
        if($("input:radio[name=vMax]:checked").attr('id') == 'vMaxd'){
            $('#vMaxb').val('');
            $('#vMaxb').attr("disabled", true); 
        }
        if($("input:radio[name=vMax]:checked").attr('id') == 'vMaxa'){
            $('#vMaxb').removeAttr("disabled");
            vMax = $('#vMaxb').val();
        }
        if($("input:radio[name=mDec]:checked").attr('id') == 'mDecd'){
            $('#mDecbb').val('');
            $('#mDecbb').attr("disabled", true); 
        }
        if($("input:radio[name=mDec]:checked").attr('id') == 'mDeca'){
            $('#mDecbb').removeAttr("disabled");
            mDec = $('#mDecbb').val();
        }
        mRound = $("input:radio[name=mRound]:checked").val();
        aPad = $("input:radio[name=aPad]:checked").val();
        wEmpty = $("input:radio[name=wEmpty]:checked").val();
        if (aSep != ''){
            metaCode = aSep;
        }            
        if (dGroup != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", " + dGroup;
            }
            else{
                metaCode = dGroup;
            }
        }            
        if (aDec != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", " + aDec;
            }
            else{
                metaCode = aDec;
            }
        }
        if (altDec != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", altDec: '" + altDec + "'" ;
            }
            else{
                metaCode = "altDec: '" + altDec + "'" ;
            }
        }        
        if (aSign != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", aSign: '" + aSign + "'" ;
            }
            else{
                metaCode = "aSign: '" + aSign + "'" ;
            }
        }
        if (pSign != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", " + pSign;
            }
            else{
                metaCode = pSign;
            }
        }
        if (vMin != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", vMin: '" + vMin + "'" ;
            }
            else{
                metaCode = "vMin: '" + vMin +"'";
            }
        }
        if (vMax != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", vMax: '" + vMax + "'" ;
            }
            else{
                metaCode = "vMax: '" + vMax + "'";
            }
        }
        if (mDec != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", mDec: '" + $('#mDecbb').val() + "'" ;
            }
            else{
                metaCode = "mDec: '" + $('#mDecbb').val() + "'" ;
            }
        }        
    
        if (mRound != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", " + mRound;
            }
            else{
                metaCode = mRound;
            }
        }
        if (aPad != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", " + aPad;
            }
            else{
                metaCode = aPad;
            }
        }
        if (wEmpty != ''){
            if (metaCode != ''){
                metaCode = metaCode + ", " + wEmpty;
            }
            else{
                metaCode = wEmpty;
            }
        }
        $('#metaCode').text(''); 
        if(metaCode != ''){
            $('#metaCode').text('meta="{' + metaCode + '}"'); 
        }    
    });

    /* clears the metadata code  */
    $('#rd').click(function(){
        $('#metaCode').text('');
    });    
    /* ends scripts for metadata code generator  */
    
    /* script  for defaults demo  */    
    $('#d_noMeta').blur(function(){
        var convertInput = '';
        convertInput = $(this).autoNumericGet();
        $('#d_Get').val(convertInput);
        $('#d_Set').autoNumericSet(convertInput);
    });                        
    /* end script  for defaults demo  */    
    
    /* script  for various samples demo  */
    $('input[name$="sample"]').blur(function(){
        var convertInput = '';
        var    row = 'row_' + this.id.charAt(4);
        convertInput = $(this).autoNumericGet();
        $('#'+ row + 'b').val(convertInput);
        $('#'+ row + 'c').autoNumericSet(convertInput);
    });    
    /* end script  for various samples demo  */
    
    /* script  for rounding methods  */
     $('#roundValue').blur(function(){
        if(this.value != ''){
            convertInput = $('#roundValue').autoNumericGet();
            var i = 1;
            for (i=1; i <= 9; i++){
                $('#roundMethod'+i).autoNumericSet(convertInput);
            }    
        }
    });
    
    $('#roundDecimal').change(function(){ /* changes decimal places */
        convertInput = $('#roundValue').autoNumericGet();
        if(convertInput > 0){
            var i = 1;
            for (i=1; i <= 9; i++){
                $('#roundMethod'+i).autoNumericSet(convertInput);
            }
        }
    });    
    /* end script  for rounding methods  */
    
    /* script for dynamically loaded values  demo*/
    $.getJSON("test_JSON.php", function(data) {                                                          
        var valueFormatted = '';
        $.each(data, function(key, value) { // loops through JSON keys and returns value    
            $('#' + key).autoNumericSet(value);              
        });
    });    
    /* end script for dynamically loaded values demo*/
    
    /* script for callback demo*/
    $.autoNumeric.get_mDec = function() { /* get_mDec function attached to autoNumeric() */
        var set_mDec = $('#get_metricUnit').val();
        if (set_mDec == ' km'){
            set_mDec = 3;
        } else {
        set_mDec = 0;
        }    
        return set_mDec; /* set mDec decimal places */
    }

    var get_vMax = function(){ /* set the maximum value allowed based on the metric unit */
        var set_vMax = $('#get_metricUnit').val();
        if(set_vMax == ' km'){
            set_vMax = '99999.999';
        } else {
            set_vMax = '99999999';
        }
        return set_vMax;
    }
                
    $('#length').autoNumeric({vMax: get_vMax}); /* calls autoNumeric and passes function get_vMax */

    $('#get_metricUnit').change(function(){
        var set_value = $('#length').autoNumericGet();
        if (this.value == ' km'){
            set_value = set_value / 1000;
        } else { 
            set_value = set_value * 1000;
        }    
        $('#length').autoNumericSet(set_value);
    });
    /* end script for callback demo*/    
});
