/**
* Chen input select nhu the nay
* <input type="text" data="Button=cleardata,selectdata|Module=TravelGuides|Fields=id,name,phone|Inputs=leader_id,team_leader,leader_phone" class="select" value="" id="leader_phone" name="leader_phone">
* Yeu cau phai co class="select"
* param bat buoc phai co cho script:  data="Button=cleardata,selectdata|Module=TravelGuides|Fields=id,name,phone|Inputs=leader_id,team_leader,leader_phone"
* Cac button can hien thi: Button=cleardata,selectdata
* Ten module can bat popup: Module=TravelGuides
* Cac field can lay du lieu: Fields=id,name,phone
* Cac input can do du lieu vao: Inputs=leader_id,team_leader,leader_phone
* ***********************************************************************
* Chuc nang PopupFilter: filter="Fields=account_name|Inputs=parent_name"
* Cac field can loc du lieu: Fields=account_name
* Cac input chua du lieu loc: Inputs=parent_name
* Luu y: Fields va Inputs phai tuong duong ve so luong va thu tu
* Neu dung chung voi TableClone thi phai include script TableClone vao truoc script nay
* Tat ca deu viet lien khong co khoang trang
*/


$(document).ready(function(){

    // Tu dong chay sau moi khoang thoi gian 1s
    setInterval(
        (function x() {
            $('.selectdata').remove();
            $('.cleardata').remove();
            $('.select').each(generateButton);
            return x;
        })(), 1000
    );
    
    function generateButton(){
        var currentInput = $(this);
        var endNumID = /\d+$/.exec(currentInput.attr('id'));     // Lay so cuoi trong ID cua input
        var endNum = (endNumID) ? endNumID : "";  
        var param = currentInput.attr('data').split('|');
        var genButton = param[0].substr(7,param[0].length - 7);
        var moduleName = param[1].substr(7,param[1].length - 7);
        var fields = param[2].substr(7,param[2].length - 7);
        var inputs = param[3].substr(7,param[3].length - 7);
        
        // Chuan bi param cho Filter
        if (currentInput.attr('filter') != null){
            var data_filter = currentInput.attr('filter').split('|');
            var filterParams = currentInput.attr('filter').split('|');
            var filterFields = filterParams[0].substr(7,filterParams[0].length - 7);
            var filterInputs = filterParams[1].substr(7,filterParams[1].length - 7);
            
            var filterFieldsArray = filterFields.split(',');
            var filterInputsArray = filterInputs.split(',');
            var filterURLParams = generateURLParams(filterFieldsArray, filterInputsArray);
        }
        
        // Form name
        var formName = $(this).closest('form').attr('name');
        
        // Tao button    
        if ($(this).parents('table').attr('class') != 'table_clone'){
            var input = inputs.split(',');
            
            var button = genButton.split(',');
            for (i = 0; i < button.length; i++){
                var btnClass = button[i];
                if (btnClass == "selectdata"){
                    var fieldsArray = fields.split(',');
                    var inputsArray = inputs.split(',')
                    var field_to_input_array = generateObjectArray(fieldsArray, inputsArray, "");
                    
                    var data_select = 'Module='+moduleName+'|Fields='+fields+'|'+'Inputs='+input.join(',');
                    //var data_filter = filterURLParams;
                    $('<button class=\'button '+btnClass+'\' data-select="'+data_select+'" data-filter="'+data_filter+'" onclick=\'open_popup("'+moduleName+'", 600, 400, "'+filterURLParams+'", true, false, {"call_back_function":"set_return","form_name":"'+formName+'","field_to_name_array":'+field_to_input_array+'}, "single", true); return false;\' style=\'margin-left: 3px;\'><img src=\'themes/default/images/id-ff-select.png\'></button>').insertAfter($(this));
                }else{
                    var clearInputss = "";
                    for(var n = 0; n<input.length;n++){
                        clearInputss+="this.form."+input[n]+".value = ''; ";
                    }                    
                    $('<button class="button '+btnClass+'" onclick="'+clearInputss+' return false;" style="margin-left: 3px;"><img src="themes/default/images/id-ff-clear.png"></button>').insertAfter($(this));
                }
            }
        }else{
            var input = inputs.split(',');
            for(var i = 0; i<input.length;i++){
                input[i]+=endNum;
            }
            
            var button = genButton.split(',');
            for (var i = 0; i < button.length; i++){
                var btnClass = button[i];
                if (btnClass == "selectdata"){
                    var fieldsArray = fields.split(',');
                    var inputsArray = input;
                    var field_to_input_array = generateObjectArray(fieldsArray, inputsArray, "");
                    
                    var element = document.createElement("input");
                    element.setAttribute("type", "button");
                    element.setAttribute("value", "Sel");
                    element.setAttribute("class", "selectdata");
                    element.setAttribute("data-filter", data_filter);
                    element.setAttribute("onclick", 'open_popup("'+moduleName+'", 600, 400, "'+filterURLParams+'", true, false, {"call_back_function":"set_return","form_name":"'+formName+'","field_to_name_array":'+field_to_input_array+'}, "single", true); return false;');         
                    
                    $(element).insertAfter($(this));
                }else{
                    var inputss = inputs.split(',');
                    for(var h = 0; h<inputss.length;h++){
                        inputss[h]+=endNum;
                    }
                    var clearInputs = "";
                    for(var n = 0; n<inputss.length;n++){
                        clearInputs+="this.form."+inputss[n]+".value = ''; ";
                    }
                    
                    var element = document.createElement("input");
                    element.setAttribute("type", "button");
                    element.setAttribute("value", "Del");
                    element.setAttribute("class", "cleardata");
                    element.setAttribute("onclick", "javascript:"+clearInputs+" return false;");
  
                    $(element).insertAfter($(this));                  
                }
            }
        }
    }
     
    //$('.select').each(generateButton);
    
    // Tao Object Array theo chuan cua Sugar
    function generateObjectArray(keyArray, valueArray, endNum){
        var result = '{';
        for (i = 0; i < keyArray.length; i++){
            result+='"'+keyArray[i]+'":"'+valueArray[i]+endNum+'",';
        }
        return result+='}';
    }
        
    // Tao Filter URL Params
    function generateURLParams(fieldArray, inputArray){
        var result = '';
        for (i = 0; i < fieldArray.length; i++){
            var value = $('#'+inputArray[i]).val();
            result+='&'+fieldArray[i]+'='+value;
        }
        return result;
    }
   
    // Khi addrow se xoa 2 button cu roi tao lai button moi
    $('.btnAddRow').click(function(){
        var lastTR = $(this).parents('table').find('tr:last').attr('id');
        $('#'+lastTR+' .selectdata').remove();
        $('#'+lastTR+' .cleardata').remove();
        $('#'+lastTR+' .select').each(generateButton);
    });

});