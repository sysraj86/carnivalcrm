/**
* Created by JetBrains PhpStorm.
* User: JK
* Date: 12/26/11
* Time: 7:37 PM
*/

$(document).ready(function () {
    
    displayHideAdDelRow();
    updateID('TR_table_clone'); 
    var tour_id = $('[name="record"]').val(),
    tour = new Tours(),
    loader = $('<img src="modules/images/ajax-loader.gif" alt="loading..."/>');
    tour.id = tour_id;
    tour.init();
    // tplTour.save("#EditView", "default");
    var $frameType = $("#frame_type");

    /**disable somefield**/
    editorKeydown = function (ed, e) {
        tinymce.dom.Event.cancel(e);
    };

    /**
    * Vo hieu hoa key press trong Editor
    */
    function disableEditors() {
        try {
            $.each(tinymce.editors, function (key, editor) {
                //  console.log(editor.id);
                editor.onKeyDown.add(editorKeydown);
            });
        } catch (e) {
            console.log(e);
        }
    }

    function enableEditor() {
        console.log("enable editor");
        try {
            $.each(tinymce.editors, function (key, editor) {
                //  console.log(editor.id);
                editor.onKeyDown.remove(editorKeydown);
            });
        } catch (e) {
            console.log(e);
        }
    }

    /***
    * Chinh sua mang hinh theo yeu cau full frame
    */
    function FullFrameFields() {
        var $EditView = $("#EditView");
        $EditView.find("#duration,#name,#transport,[name='title[]'],[name='notes[]'],#noiden").attr("disabled", "disabled");
        disableEditors();
        // $("#department").attr("disabled", "disabled");
    }

    /***
    * Chinh field (editable/ or not) theo yeu cau half frame
    */
    function HalfFrameFields() {
        var $EditView = $("#EditView");
        $EditView.find("#duration,#name,#transport,[name='title[]'],[name='notes[]']").attr("disabled", "disabled");

    }

    /***
    * Chinh sua fields theo yeu cau open frame
    */
    function OpenFrameFields() {
        var $EditView = $("#EditView");
        $EditView.find("#duration,#name,#transport,[name='title[]'],[name='notes[]'],#area,#noiden").removeAttr("disabled", "disabled");

        $.each(tinymce.editors, function (key, editor) {
            if (editor.id != "description") {
                editor.setContent("");
            }
        });
        enableEditor();
    }

    /***
    *  Ham dung de xu li khi chon department (dos|ob|ib)
    * @param e
    */
    function department_change(e) {
        //console.log(e);
        var dp = $("#department"),
        department = dp.val(),
        frameType = $frameType.val(),
        tpls = $("#templates");
        tpls = tpls.html("<option value=''>None</option>");
        if (department) {
            $("#tour_code_area").val('');
            code = $("#area option:selected").attr("data-code");
            if(code == undefined){
                code = '';
            }
            $("#tour_code_area").val(frameType + code);
            if (frameType != "" && frameType != "O") {
                ///parrent load
                tpls.parent().append(loader);

                /// load tour
                tplTour.load(department, frameType, function () {
                    loader.remove();
                });
                /// tpls append
                tpls.append(tplTour.OptionListHTML.join());
                ///
                tpls.removeAttr("disabled");
                //

            } else {
                tpls.attr("disabled", "disabled");
                $("#tour_code_num").removeAttr("readonly");
                OpenFrameFields();
                //  $("#department").removeAttr("disabled");
            }
        }
        else {
            tpls.attr("disabled", "disabled");
            $("#tour_code_num").removeAttr("readonly");
            $("#area").removeAttr("disabled");
            // $("#department").removeAttr("disabled");
        }
    }

    /***
    * Add event handler
    */
    loadAreaByDepartment($('#department').val());

    $('#department').live('change', function (e) {
        //department_change(e);
        var $this = $(this),
        val = $this.val();
        if (val) {
            $("#tour_code_department").val(val);
            $this.parent().append(loader);
            loadAreaByDepartment(val);
            loadCountriesByDepartment(val);
            /*
            $this.parent().append(loader);
            $.ajaxSetup({async:false});
            $.ajax({
            type:"post",
            url:"index.php?module=Tours&action=loadareabydepartment&sugar_body_only=true",
            data:{department:val},
            success:function (data) {
            loader.remove();
            if (data) {
            $("#area").html(data);
            } else {
            $("#area").html("<option value=''>None</option>");
            }
            }
            })
            */
        }

    });

    function loadAreaByDepartment(department){
        $.ajaxSetup({async:false});
        $.ajax({
            type:"post",
            url:"index.php?module=Tours&action=loadareabydepartment&sugar_body_only=true&record=" + $('input[name="record"]').val(),
            data:{department:department},
            success:function (data) {
                loader.remove();
                if (data) {
                    $("#area").html(data);
                } else {
                    $("#area").html("<option value=''>None</option>");
                }
            }
        });
    }

    function loadCountriesByDepartment(val){
        $.ajaxSetup({async:false});
        $.ajax({
            type:"post",
            url:"index.php?module=Tours&action=getcountriesbydepartment&sugar_body_only=true",
            data:{department:val},
            success:function (data) {
                loader.remove();
                if (data) {
                    $(".jk_list_countries").html(data);
                } else {
                    $(".jk_list_countries").html("<option value=''>None</option>");
                }
            }
        }); 
    }

    /***
    * Add event handler
    */
    $frameType.live('change', function (e) {
        displayHideAdDelRow();
        department_change(e);
        if ($(this).val() == "") {
            tplTour.restore("default");
        }
    });
    /***
    * Add event handler: Change
    * Vung Mien
    */
    $("#area").live("change", function () {
        var $this = $(this);
        var val = $this.val();
        var depatment = $('#department').val();
        var country = $("option:selected", $this).attr("data-country");
        jQuery('#country_id').val(country);
        var tourType = $frameType.val();
        if (val) {
            $("#tour_code_area").val(tourType + $("option:selected", $this).attr("data-code"));

            $this.parent().append(loader);
            $.ajaxSetup({async:false});
            $.ajax({
                type:"post",
                url:"index.php?module=Tours&entryPoint=TourAjax",
                data:{action:"get_destination_by_area", area:val, department:depatment, country_id:country},
                success:function (data) {
                    loader.remove();
                    if (data) {
                        $("#noiden").html(data);
                    } else {
                        $("#noiden").html("<option value=''>None</option>");
                    }
                }
            })
        }
    });
    /**
    * add event "change"
    * -- khi chon 1 template
    */
    $("#templates").live('change', function () {
        var $this = $(this),
        tour_id = $this.val(),
        tourType = $frameType.val();
        if (tour_id && tour_id != "") { // tour id khong rong (Select --None---)
            //confirm lai nguoi dung xem ho co chac la muon thay doi template khong?
            if (window.confirm("Bạn có chắc chắn muốn dùng template này?\n dữ liệu của bạn sẻ bị mất khi thay đổi template!")) {
                try {
                    //get tour
                    tour = tplTour.tours[tour_id];
                    /**
                    * fill vao cac truong duoc dinh san
                    */
                    tour.fill();
                    /**
                    * Load tour program line
                    */

                    tour.refreshTourProgramLines(function (lines) {
                        //console.log(lines);
                        if (lines && lines.length > 0) {
                            //console.log(lines);
                            //xoa cac dong cua
                            $("#table_clone tr").hide();
                            $("#table_clone tr input[name='deleted[]']").val(1);
                            /*CurrentTourProgramLine = 0;*/
                            /// reset lai ngay
                            day_num = 0;
                            // duyet tat ca cac tour programe moi duyet len
                            for (var i = 0; i < lines.length; i++) {
                                // console.log(lines[i]);
                                day_num++;
                                lines[i].addToHTML("#table_clone");
                            }
                        }
                    });

                    /** xu li full|half|open-frame **/
                    switch (tourType) {
                        case 'F':
                            FullFrameFields();
                            break;
                        case 'H':
                            HalfFrameFields();
                            break;
                        case 'O':
                            OpenFrameFields();
                            break;
                        default:
                            break;
                    }
                } catch (e) {
                    console.error(e);
                }
            } else {
                $("#tour_code_num").removeAttr("readOnly");
                $("#area").removeAttr("disabled");
                $("#department").removeAttr("disabled");
                return false;
            }
        } else {
            $("#tour_code_num").removeAttr("readOnly");
            $("#area").removeAttr("disabled");
            $("#department").removeAttr("disabled");
            /*if (confirm("Would you want to restore data?")) {
            tplTour.restore("default");
            }*/
        }
    });
    $("#EditView").submit(function () {
        $("[disabled]").removeAttr("disabled");
        if ($('[name="is_template"]')[0].checked) {
            if ($('[name="template_name"]').val() == "") {
                alert("You must enter template name if you want to create template!");
                return false;
            }
        }
    });


    $("[name='is_template']").click(function () {
        var $this = $(this),
        checked = $this.is(":checked"),
        $template_name = $this.parent().find('[name="template_name"]');
        /*  console.log($template_name);
        console.log($this.parent());*/
        if (checked) {
            if ($template_name.length) {
                $template_name.show();
            } else {
                $this.parent().append('<input style="width:175px" placeholder="Enter template name..." name="template_name" class="textbox" value="" type="text"/>');
            }
            $("#tour_num").hide().prev().hide();
        } else {
            if ($template_name.length) $template_name.hide();
            $("#tour_num").show().prev().show();

        }
    });
    /***
    * Chuc nang phan 4 cap ver 1
    *
    */
    /// add event click country cho
    $(".jk_list_countries").live("change",
    function () {
        var $this = $(this),
        countries = "",
        optionList = "<option value=''>--None--</option>",
        $optionSelected = $("option:selected", $this),
        count = $optionSelected.length,
        $tr = $this.closest("tr");
        loader.insertAfter($this);
        $optionSelected.each(function (index) {
            countries += this.value;
            if (index < count - 1) countries += "|";
        });
        $tr.find("[name='tour_program_countries_count[]']").val(count);

        $tr.find(".jk_list_destinations").html("<option value=''>--None--</option>");
        $tr.find(".jk_list_locations").html("<option value=''>--None--</option>");
        //console.log(countries);
        $.ajax(
        {
            url:"index.php?module=Tours&entryPoint=TourAjax",
            type:"POST",
            data:{action:"get_area_by_countries", countries:countries},
            async:false,
            success:function (data) {
                loader.remove();
                data = $.parseJSON(data);

                $.each(data, function (key, value) {
                    optionList += "<option value='" + key + "'>" + value + "</option>";
                });
            }
        }
        );
        $tr.find(".jk_list_areas").html(optionList);
    }
    );
    /**
    * add event click
    */
    $(".jk_list_areas").live("click",
    function (e) {
        var $this = $(this),
        areas = "",
        optionList = "<option value=''>--None--</option>",
        $optionSelected = $("option:selected", $this),
        count = $optionSelected.length,
        $tr = $this.closest("tr");
        $optionSelected.each(function (index) {
            areas += $(this).val();
            if (areas != '')
                if (index < count - 1) areas += "|";
        });
        countries = "";
        $countriesSelected =jQuery("option:selected",jQuery(this).closest('tr').find('.jk_list_countries'));
        countries_lenght = $countriesSelected.length,
        countries += jQuery(this).closest('tr').find('.jk_list_countries').val(); 
        //$countriesSelected.each(function(index){

        // if(contries != ''){
        // if(index < countries_lenght-1) countries+= "|" ;
        //}
        //});
        $tr.find("[name='tour_program_areas_count[]']").val(count);
        $tr.find(".jk_list_locations").html("<option value=''>--None--</option>");
        loader.insertAfter($this);
        ///console.log(areas);
        $.ajax({
            url:"index.php?module=Tours&entryPoint=TourAjax",
            type:"POST",
            data:{action:"get_cities_by_areas", areas:areas, country:countries},
            async:false,
            success:function (data) {
                data = $.parseJSON(data);
                loader.remove();
                $.each(data, function (key, value) {
                    optionList += "<option value='" + key + "'>" + value + "</option>";
                });
            }
        }
        );
        $tr.find(".jk_list_destinations").html(optionList);
    }
    );
    /**
    * Event khi chọn ngày đi và ngày về thì tự generate ra số ngày = với số ngày về - ngày đi
    */
    $("#addDays").click(
    function (e) {
        var $this = $(this),
        start_date_arr = $("#start_date").val().split('/'),
        end_date_arr = $("#end_date").val().split('/'),
        startDate = new Date(),
        endDate = new Date();
        startDate.setFullYear(start_date_arr[2], start_date_arr[1], start_date_arr[0]);
        endDate.setFullYear(end_date_arr[2], end_date_arr[1], end_date_arr[0]);
        //var days = Math.floor((endDate - startDate) / (3600 * 1000 * 24));
        var days = jQuery('#num_of_day').val();
        /*   console.log("--" + startDate + " - " + endDate);
        console.log("---" + days);*/
        //tinh tu ngay bat dau di la 1 ngay
        if(days == ''){
            alert('Bạn phải nhập số ngày trước!');
            document.getElementById('num_of_day').focus();
            return;
        }
        else {
            if((days) <= 0){
                alert('Số ngày phải nhập lớn hơn 0!');
                document.getElementById('#um_of_day').focus();
                return;
            }
            else if(isNaN(days)){
                alert('Số ngày phải nhập chữ số!');
                document.getElementById('num_of_day').focus();
                return;  
            }
            else{
                if(days == 1){
                    jQuery('#duration').val(days+" Ngày ");  
                }
                else{
                    jQuery('#duration').val(days+" Ngày "+ (days-1)+" Đêm");
                }

                //  console.log(jk_cloned);
                //  $("#table_clone tr").hide();
                //$("#table_clone tr input[name='deleted[]']").val(1);
                // $("#table_clone tr").remove();
                //neu days =  0 ngay thi tinh 1 ngay. (di trong ngay)
                if (CurrentTourProgramLine < days) {
                    for (var i = CurrentTourProgramLine; i < days; i++) {
                        CurrentTourProgramLine++;

                        var trCloned = jk_cloned.clone(),
                        trId = trCloned.attr('id'), //get id
                        countries_option = jQuery('#'+trId).find('.jk_list_countries').html(),
                        editorId = trCloned.find('textarea').attr('id'),
                        location = trCloned.find('.jk_list_locations'),
                        day = 0,
                        program = new TourPrograms();
                        trId = trId.replace(/_\d+$/, "_" + CurrentTourProgramLine);
                        //cap nhat id cho tr
                        trCloned.attr('id', trId);
                        //cap nhat "data-editorId" cho locations de nhan biet editor hien tai
                        editorId = editorId.replace(/\d+$/, CurrentTourProgramLine); 
                        //cap nhat data-editorId cho locations list. de nhan biet editor hien tai la editor nao
                        location.attr("data-editorId", editorId);
                        //cap nhat cai tour program id
                        $("[name='tour_program_id[]']", trCloned).val("");
                        //cap nhat ID
                        trCloned.find("[id]").each(function (index) {
                            var $this = $(this),
                            id = $this.attr('id');
                            $this.attr('id', id.replace(/_\d+$/, "_" + CurrentTourProgramLine));
                        });
                        //destination
                        jQuery(trCloned).find('.jk_list_countries').html(countries_option);
                        // add by hai duc cap lai ten cho cac dropdown

                        jQuery(trCloned).find('select').each(function(){
                            nameTMP = jQuery(this).attr('name');
                            nameTMP = nameTMP.substr(0,nameTMP.indexOf('['));
                            nameTMP = nameTMP.replace(/_\d+$/,CurrentTourProgramLine);
                            jQuery(this).attr('name',nameTMP+'[]'); 
                        });
                        $("#table_clone").append(trCloned);
                        //cap nhat ngay:

                        $('.day_num:visible').each(function () {
                            day++;
                            $(this).text(day);
                        });
                        console.log(editorId);
                        //setup editor
                        program.renderEditor(editorId);
                    }
                } else if (CurrentTourProgramLine > days) {
                    for (var i = CurrentTourProgramLine; i > days; i--) {

                        var trCloned = jk_cloned.clone(),
                        trId = trCloned.attr('id');
                        trId = trId.replace(/_\d+$/, "_" + i);
                        console.log(trId);
                        $("#" + trId).remove();
                        CurrentTourProgramLine--;
                    }
                }
            } 
        }


        updateID('TR_table_clone');

    });

});


function updateID(trClass){
    jQuery('.'+trClass).each(function(){
        digit = jQuery(this).attr('id').match(/\d+$/);
        jQuery(this).find("select").each(function(){
            var eName = $(this).attr('name'); 
            name = eName.substr(0,eName.indexOf('['));
            num = name.match(/\d+$/);
            if(num !=null && !isNaN(num)){
                nameAfter = name.replace(num,digit); 
            }
            else{
                nameAfter = name+digit;
            }
            nameAfter = nameAfter+"[]" ;
            jQuery(this).attr('name',nameAfter);
        });
    })

}

function displayHideAdDelRow(){
    value = jQuery('#frame_type').val();
    if(value == 'F' || value == 'H'){
        jQuery('.btnAddRow, .btnDelRow').hide();
    }
    else{
        jQuery('.btnAddRow, .btnDelRow').show();
    }
    
    if(jQuery('[name="record"]').val()== '' || jQuery('#frame_type').val() =='' || jQuery('#frame_type').val() =='O'){
        jQuery('#addDays').show();
    }
    else{
        jQuery('#addDays').hide();
    }
}

