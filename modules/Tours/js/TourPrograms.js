/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/26/11
 * Time: 8:19 AM
 */
(function (win) {
    var TourPrograms = function (opt) {
        var program = this,
            tb;
        //default value
        program.id = "";
        program.title = "";
        program.destinations = [];
        program.locations = [];
        program.note = "";
        program.picture = "";
        program.deleted = 0;
        program.description = "";
        program.enabled = true;
        program.editor_id = "";
        program.table = "";
        program.countries_option_list = "";
        program.areas = "";
        program.destination_option_list = "";
        program.location_option_list = "";
        program.areas_option_list = "";
        program.countries_count = 0;
        program.areas_count = 0;
        program.cities_count = 0;
        program.locations_count = 0;
        //init option
        program.init = function (opt) {
            var t = this;
            if (opt.ID)
                t.ID = opt.ID;
            else return;
            t.title = (opt.title) ? opt.title : t.title;
            t.destinations = (opt.destinations) ? opt.destinations : t.destinations;
            t.locations = (opt.locations) ? opt.locations : t.locations;
            t.note = (opt.note) ? opt.note : t.note;
            t.picture = (opt.picture) ? opt.picture : t.picture;
            t.deleted = (opt.deleted) ? opt.deleted : t.deleted;
            t.description = (opt.description) ? opt.description : t.description;
            if (opt.table) {
                if (typeof opt.table == 'string') {
                    t.table = $(opt.table);
                }
            }
            //render tour programlines
            _renderLines();
        }
        program.generateTemplate = function (table) {
            var tpl = TourProgramTemplate,
                tb, editor_id, picture_html;
            // console.log(tpl);
            //id
            tpl = tpl.replace(/\{\{id\}\}/g, "");
            //day
            tpl = tpl.replace(/\{\{day_num\}\}/g, day_num);
            //edit current row
            tpl = tpl.replace(/\{\{current_row\}\}/g, CurrentTourProgramLine);
            //title
            tpl = tpl.replace(/\{\{title\}\}/g, (program.title) ? program.title : "");
            //destination
          // tpl = tpl.replace(/\{\{destinations\}\}/g, program.destination_option_list);
            //locations
           // tpl = tpl.replace(/\{\{locations\}\}/g, program.location_option_list);
            //note
            tpl = tpl.replace(/\{\{note\}\}/g, (program.note) ? program.note : "");
            //picture
            if (program.picture && program.picture != "") {
                picture_html = "<img src='modules/images/" + program.picture + "' alt='" + program.title + "' width='200' height='200'/>";

            } else {
                picture_html = "&nbsp;"
            }
            tpl = tpl.replace(/\{\{picture_html\}\}/g, picture_html);
            tpl = tpl.replace(/\{\{picture\}\}/g, (program.picture) ? program.picture : "");
            //deleted
            tpl = tpl.replace(/\{\{deleted\}\}/g, program.deleted);
            //description
            tpl = tpl.replace(/\{\{description\}\}/g, (program.description) ? program.description : "");
            //descrition
            //Countries list
            tpl = tpl.replace(/\{\{countries\}\}/g,program.countries_option_list);
            //countries count
            tpl = tpl.replace(/\{\{countries_count\}\}/g,program.countries_count);
            //areas
            tpl = tpl.replace(/\{\{areas\}\}/g,program.areas_option_list);
            tpl = tpl.replace(/\{\{areas_count\}\}/g,program.areas_count);
            //cities
            tpl = tpl.replace(/\{\{cities\}\}/g,program.destination_option_list);
            tpl = tpl.replace(/\{\{cities_count\}\}/g,program.cities_count);
            //locations
            tpl = tpl.replace(/\{\{locations\}\}/g,program.location_option_list);
            tpl = tpl.replace(/\{\{locations_count\}\}/g,program.locations_count);
            // tpl to jQuery Object
            tpl = $(tpl);
            //add template to page

            if (typeof table == 'string') {
                tb = $(table);
            }

            tb.append(tpl);
            /**
             * setup editor
             */
            editor_id = "description_pro_" + CurrentTourProgramLine;
            program.renderEditor(editor_id);
            program.editor_id = editor_id;
            return tpl;
        }
        program.addToHTML = function (table) {
            try {
                CurrentTourProgramLine++;
                var tpl = program.generateTemplate(table);
                tpl.find('[name="destination_selected_count[]"]').val((program.destinations != undefined) ? program.destinations.length : 0);
                tpl.find('[name="location_selected_count[]"]').val((program.locations != undefined) ? program.locations.length : 0);
            }
            catch (e) {
                console.log(e);
            }
            // program.disable({"title[]":true, "notes[]":true});
        }
        program.disable = function (fields) {
            var el;
            if (typeof fields == 'object') {
                $.each(fields, function (k, v) {
                    el = $("[name='" + k + "']");
                    if (el[0].tagName == 'INPUT') {
                        el.attr("readonly", "readonly");
                        (v === false) && el.removeAttr("readonly", "readonly");
                    } else if (el[0].tagName = "SELECT") {
                        el.attr("disabled", "disabled");
                        (v === false) && el.removeAttr("disabled", "disabled");
                    }
                });
            }
        }
        var _renderLines = function () {
            var t = this,
                tb = program.table;
            $('tr', tb[0]).each(function () {
                CurrentTourProgramLine++;
            });
        }
        program.renderEditor = function (editorId) {
            try {
               var editor = new tinymce.Editor(editorId, {
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
                            // console.debug('Editor contents was modified. Contents: ' + l.content);
                            ed.save();
                            //   editor = ed;
                        });

                    }

                });
              /*  console.log("editor:");
                console.log(typeof editor);
                myEditor = editor;*/
                editor.render();
            }
            catch (e) {
                console.log(e);
            }
        }
    }
    win.TourPrograms = TourPrograms;
    win.CurrentTourProgramLine = 0;
})(window);