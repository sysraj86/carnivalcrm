/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/26/11
 * Time: 7:37 PM
 */

$(document).ready(function () {
    var tour_id = $('[name="record"]').val(),
        tour = new Tours(),
        loader = $('<img src="modules/images/ajax-loader.gif" alt="loading..."/>');
    tour.id = tour_id;
    tour.init();
    // tplTour.save("#EditView", "default");
    var $frameType = $("#frame_type");

    /**disable somefield**/
    /**
     * Vo hieu hoa key press trong Editor
     */
    function disableEditors() {
        try {
            $.each(tinymce.editors, function (key, editor) {
                //  console.log(editor.id);
                editor.onKeyDown.add(
                    function (ed, e) {
                        tinymce.dom.Event.cancel(e);
                    }
                );
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
        $EditView.find("#duration,#name,#transport,[name='title[]'],[name='notes[]']").attr("disabled", "disabled");
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
        $EditView.find("#duration,#name,#transport,[name='title[]'],[name='notes[]']").attr("disabled", "disabled");
        $.each(tinymce.editors, function (key, editor) {
            if (editor.id != "description") {
                editor.setContent("");
            }
        });
    }

    /***
     *  Ham dung de su li khi chon department (dos|ob|ib)
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
            if (frameType != "" && frameType != "O") {
                /// cong frame code vao tour code;
                $("#tour_code_area").val(frameType + $("#area option:selected").attr("data-code"));
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

            } else {
                tpls.attr("disabled", "disabled");
                $("#tour_code_num").removeAttr("readonly");
                $("#area").removeAttr("disabled");
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
    $('#department').live('change', function (e) {
        department_change(e);
        var $this = $(this),
            val = $this.val();
        if (val) {
            $("#tour_code_department").val(val);
        }
    });
    /***
     * Add event handler
     */
    $frameType.live('change', function (e) {
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
        var $this = $(this),
            val = $this.val(),
            tourType = $frameType.val();
        if (val) {
            $("#tour_code_area").val(tourType + $("option:selected", $this).attr("data-code"));
            $this.parent().append(loader);
            $.ajaxSetup({async:false});
            $.ajax({
                type:"post",
                url:"index.php?module=Tours&entryPoint=TourAjax",
                data:{action:"get_destination_by_area", area:val},
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
                count = $optionSelected.length;
            loader.insertAfter($this);
            $optionSelected.each(function (index) {
                countries += this.value;
                if (index < count - 1) countries += "|";
            });
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
            $(".jk_list_areas").html(optionList);
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
                count = $optionSelected.length;
            $optionSelected.each(function (index) {
                areas += $(this).val();
                if (areas != '')
                    if (index < count - 1) areas += "|";
            });
            loader.insertAfter($this);
            ///console.log(areas);
            $.ajax(
                {
                    url:"index.php?module=Tours&entryPoint=TourAjax",
                    type:"POST",
                    data:{action:"get_cities_by_areas", areas:areas},
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
            $(".jk_list_destinations").html(optionList);
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
            var days = (endDate - startDate) / (3600 * 1000 * 24);
           console.log("--"+startDate+" - "+endDate);
                        console.log("---"+days);
            days = Number(days);

            console.log(typeof days);
            console.log(days>0);
            if (days > 0)
            {
            console.log(jk_cloned);
                $("#table_clone tr").hide();
                $("#table_clone tr input[name='deleted[]']").val(1);
                for (var i = 0; i < days; i++) {
                    var trCloned = jk_cloned.clone(),
                        trId = trCloned.attr('id'), //get id
                        editorId = trCloned.find('textarea').attr('id'),
                        location = trCloned.find('.jk_list_locations'),
                        day = 0,
                        program = new TourPrograms();

                    //cap nhat id cho tr
                    trCloned.attr('id', trId.replace(/_\d+$/, "_" + CurrentTourProgramLine));
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

                    $("#table_clone").append(trCloned);
                    //cap nhat ngay:

                    $('.day_num:visible').each(function () {
                        day++;
                        $(this).text(day);
                        console.log($(this));
                    });
                    //setup editor
                    program.renderEditor(editorId);
                }
            }

        }
    );

});
