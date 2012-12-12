/**
* Created by JetBrains PhpStorm.
* User: JK
* Date: 12/23/11
* Time: 3:48 PM
*/
(function (win) {
    win.CurrentTourProgramLine = 0;
    var Tours = function () {
        var _url = "index.php?module=Tours&entryPoint=TourAjax",
        tour = this;

        tour.id = "";
        tour.name = "";
        tour.description = "";
        tour.tour_code = "";
        tour.noiden = "";
        tour.date_time = "";
        tour.start_date = "";
        tour.end_date = "";
        tour.duration = "";
        tour.type = "";
        tour.contract_value = "";
        tour.upload_image = "";
        tour.currency = "";
        tour.assigned_user_name = "";
        tour.transport = "";
        tour.transport_dom = "";
        tour.picture = "";
        tour.tourProgramLines = [];
        tour.editting = false;
        tour.template_name = "";

        tour.getTourNum = function () {
            $.ajax({
                type:"POST",
                async:false,
                data:{action:"get_tour_num"},
                success:function (data) {
                    if (data) {
                        return data;
                    }
                }
            })
        }
        tour.loadTourProgramLines = function (callback) {
            if (tour.id != "") {
                $.ajax({
                    url:_url,
                    type:"POST",
                    async:false,
                    data:{tour_id:tour.id},
                    success:function (data) {
                        if (data) {
                            data = $.parseJSON(data);
                            $.each(data, function (key, val) {
                                var line = new TourPrograms(),
                                program = val.program;
                                line.id = program.id;
                                line.title = program.title;
                                line.destinations = program.destinations;
                                line.locations = program.locations;
                                line.note = program.note;
                                line.picture = program.picture;
                                line.deleted = program.deleted;
                                line.description = program.description;
                                line.countries_option_list = val.countries_option_list;
                                line.areas_option_list = val.areas_option_list;
                                line.destination_option_list = val.destination_option_list;
                                line.location_option_list = val.location_option_list;
                                line.countries_count = val.countries_count;
                                line.areas_count = val.areas_count;
                                line.cities_count = val.cities_count;
                                line.locations_count = val.locations_count;
                                //  console.log(line);
                                tour.tourProgramLines.push(line);
                                // console.log(t)
                            });
                        }
                        //console.log(callback);
                        if (callback) {
                            callback(tour.tourProgramLines);
                        }
                    }
                });
            }
        }
        tour.refreshTourProgramLines = function (callback) {
            tour.tourProgramLines = [];
            //  console.log(tour.tourProgramLines);
            tour.loadTourProgramLines(callback);
            // console.log(tour.tourProgramLines);
        }
        tour.init = function () {
            /** xac dinh xem dang o mang hinh nao**/
            //tour.id = $('[name="record"]').val();
            //neu dang o mang hinh edit
            //  console.log(tour.id);
            if (tour.id) {
                if (!$("#tour_code_area").val()) {
                    alert("Cảnh báo: Tour code không đúng định dạng!");
                }
            } else {
                $(".btnAddRow, .btnDelRow").hide();
            }

            jk_cloned = $('tr#TR_table_clone_1').clone();
            /**
            * tim dong co id lon nhat
            * de biet so dong chinh xac hien dang co
            */
            $('tr[id^="TR_table_clone_"]').each(function () {
                var $this = $(this),
                idNum = /\d+$/.exec($this.attr('id'));
                if (idNum > CurrentTourProgramLine) {
                    CurrentTourProgramLine = idNum;
                }
            });
            /**
            * khoi tao init
            * editor_selector la class cua text areas
            */
            tinymce.init({
                mode:"textareas",
                theme:"advanced",
                editor_selector:"jk_editor",
                plugins:"searchreplace,noneditable,fixed,advimage,fullscreen",
                width:500,
                theme_advanced_toolbar_location:"top",
                theme_advanced_toolbar_align:"left",
                theme_advanced_statusbar_location:"bottom",
                theme_advanced_buttons1:"bold,underline,italic,strikethrough,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,image,bullist,numlist,|,undo,redo,link,|,search,replace,fixed,|,fullscreen",
                theme_advanced_buttons2:"",
                theme_advanced_buttons3:"",
                theme_advanced_resizing:true,
                noneditable_leave_contenteditable:true,
                noneditable_noneditable_class:"jkNonEditable",
                noneditable_editable_class:"jkEditable",
                entity_encoding:"raw",
                setup:function (ed) {
                    ed.onChange.add(function (ed, l) {
                        ed.save();
                    });
                }
            });
            /***
            *
            */
            var destinations = $('.jk_list_destinations'),
            locations = $('.jk_list_locations'),
            location_options = $('.jk_list_locations option'),
            loader = $('<img src="modules/images/ajax-loader.gif" alt="loading..."/>');

            /***
            *xu li khi nguoi dung click chon destination (HCM, dat lat, ...)
            */

            destinations.live("change", function () {
                var $this = $(this),
                location = $this.parents('[id^="TR_table_clone_"]').find('.jk_list_locations');
                $options = $this.find("option:selected"); //lay the <option>
                $('[name="destination_selected_count[]"]', $this.parent()).val($options.length);
                var items = []; //khoi tao bien items
                location.html("<option value=''>None</option>");

                $.each($options, function () {
                    var destination_id = $(this).val();
                    loader.appendTo($this.parent());
                    $.ajax({
                        type:'POST',
                        url:'index.php?module=Tours&entryPoint=GetLocationByDestinations',
                        async:false,
                        data:{
                            destination:destination_id
                        },
                        success:function (data) {
                            loader.remove();
                            //xet xem data co null ko
                            if (data != null) { // neu ko null
                                // console.log(data); //debugger
                                $.each(data, function (key, val) { //set toan bo data
                                    // console.log(val);
                                    //push location in
                                    var d = (val.description != null) ? val.description : "";
                                    items.push("<option data-description='" + d + "' value='" + val.id + "'>" + val.name + "</option>");
                                });
                                // console.log(items.join(''));

                                location.html(items.join(''));//append html

                                //  console.log(locations);
                            } else {
                                alert("No result!");
                            }
                        }
                    });

                    //console.log(myItems);
                });

            });
            /**
            * xu li su kien khi nguoi dung chon destination
            * lay gia tri cua location dang chon
            * get editor
            * neu editor ko rong thi set description
            */
            locations.live('change', function () {
                var $this = $(this),
                options = $("option:selected", $this);
                $this.parent().find("[name='location_selected_count[]']").val(options.length);
            });
            location_options.live('click', function () {
                var $this = $(this),
                description = $this.attr('data-description'),
                editorId = $this.parent().attr('data-editorId');
                console.log($this);
                if (confirm("Would you want to fill description?")) {
                    if (description) {
                        if (editorId) {
                            if (!tinymce.EditorManager.execInstanceCommand(editorId, "mceReplaceContent", false, description)) {
                                alert("ERROR!");
                            }
                        } else {
                            alert("ERROR: editor id not found");
                        }
                    } else {
                        tinymce.EditorManager.execInstanceCommand(editorId, "mceReplaceContent", false, "<b>" + $this.text() + "</b>");
                    }
                }
            });

            /***
            * xu li khi nut btn bi click
            *
            */
            $('.btnAddRow').live("click", function () {
                CurrentTourProgramLine++;//tang editor id
                var $this = $(this),
                trCloned = jk_cloned.clone(),
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

            });
            /**
            * xu li su kien khi nguoi dung click delete row
            * get tour problem hien tai: tr
            * get table: parentTr
            * xet xem con bao nhieu tour program
            * neu lon hon 1 thi hide dong hien
            * neu == 1 thi reset field cho dong hien tai.
            *
            */
            $('.btnDelRow').live("click", function () {
                var $this = $(this),
                tr = $this.parent().parent(),
                parentTr = tr.parent(),
                day = 0;
                /**
                * xet xem dong do' co phai la dong cuoi hay khong?
                * neu don cuoi thi chi del noi dung no' thoi
                */
                if (parentTr.children(":visible").length > 1) {
                    tr.find('input[name="deleted[]"]').val(1);
                    tr.hide();
                } else {
                    var description = tr.find('.jk_editor'),
                    description_id = description.attr('id'),
                    editor = tinymce.getInstanceById(description_id);
                    editor.setContent("");
                    tr.find('input[type="text"]').val("");
                }
                //cap nhat ngay:

                $('.day_num:visible').each(function () {
                    day++;
                    $(this).text(day);
                    console.log($(this));
                });
            });
        }
        tour.load = function () {

        }
        tour.fill = function () {

            var code = tour.tour_code,
            $tour_areas = $("#area");
            //tour name:
            $("[name='name']").val(tour.name);
            //tour description
            tinymce.getInstanceById("description").setContent(tour.description);
            //Duration:
            $("[name='duration']").val(tour.duration);
            //transport:
            $("[name='transport[]']").html(tour.transport_dom);
            //destinations
            $("[name='noiden[]']").html(tour.destination_dom);
            //tour code
            $("#contract_value").val(tour.contract_value);
            //console.log(tour.area);
            //generate area pattern
            var areas_pattern = "";
            $tour_areas.find("option").each(function () {
                var $this = $(this),
                code = $this.attr("data-code");
                if (code && code != "") {
                    areas_pattern += (areas_pattern != "") ? "|" : "";
                    areas_pattern += code;
                }
            });
            var tour_code_pattern = new RegExp('^(F|H|O)(' + areas_pattern + ')([0-9]+)(\/)([A-z0-9]+)$');
            console.log(tour_code_pattern);
            code = tour_code_pattern.exec(code);
            // $("[name='area']").find("option[value='" + tour.area + "']").attr("selected", "selected");
            if (code.length == 6) {
                var frame_type = code[1],
                area = code[2],
                num = code[3],
                department = code[5];
                $("#tour_code_department").val(department);
                $("#tour_code_num").val(num).attr("readonly", "readonly");
                $tour_areas.find("[data-code='" + area + "']").attr("selected", "selected");
                $("#tour_code_area").val(frame_type + area);
                $tour_areas.attr("disabled", "disabled");
            } else {
                alert("'Tour code' không đúng định dạng! bạn có thể điểu chĩnh tour code");
            }
            //picture
            if (tour.picture && tour.picture != "") {
                var $tour_picture = $("#tour_picture");
                $tour_picture.find("img").remove();
                $tour_picture.prepend("<img src='modules/images/" + tour.picture + "' alt='" + tour.name + "' width='300' height='300' />");
                $("[name='tour_picture_name']").val(tour.picture);
            }
            //picture
        }
    }

    win.Tours = Tours;
})(window);