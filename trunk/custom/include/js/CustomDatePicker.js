/**
* Script nay co the dung cho tat ca textbox co khai bao class="datePicker"
* Neu dung chung voi TableClone thi phai include script TableClone vao truoc script nay
*/

$(document).ready(function(){

    function generatePicker(){
        var $this = $(this);
        var thisID = $this.attr('id');
        var dateFormat = cal_date_format.replace('%d', 'dd');
        dateFormat = dateFormat.replace('%m', 'mm');
        dateFormat = dateFormat.replace('%Y', 'yyyy');
        
        $('<span class="dateFormat" style="margin-left: 3px;"><img id="'+thisID+'_trigger" align="absmiddle" border="0" alt="Enter Date" src="themes/Sugar5/images/jscalendar.gif" > ('+dateFormat+')</span>').insertAfter($this);
        Calendar.setup ({  inputField : thisID, ifFormat : cal_date_format, showsTime : false, button : thisID+'_trigger', singleClick : true, step : 1  });    
    }

    $('.datePicker').each(generatePicker);

    // Khi addrow se xoa button cu roi tao lai button moi
    $('.btnAddRow').click(function(){
        var thisTable = $(this).parents('table').attr('id');
        $('#'+thisTable+' .dateFormat').remove();
        $('#'+thisTable+' .datePicker').each(generatePicker);
    });
    
    // Khi delrow se xoa button cu roi tao lai button moi
    $('.btnDelRow').click(function(){
        var thisTable = $(this).parents('table').attr('id');
        $('#'+thisTable+' .dateFormat').remove();
        $('#'+thisTable+' .datePicker').each(generatePicker);
    });

});