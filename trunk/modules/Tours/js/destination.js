/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 11/28/11
 * Time: 10:10 PM
 * To change this template use File | Settings | File Templates.
 */
/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/23/11
 * Time: 3:48 PM
 */
$(document).ready(function() {
    CurrentTourProgramLine = 0;

    jk_cloned = $('tr#TR_table_clone_1').clone();
    /**
     * tim dong co id lon nhat
     */
    $('tr[id^="TR_table_clone_"]').each(function() {
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
        plugins:"searchreplace",
        width:500,
        theme_advanced_toolbar_location:"top",
        theme_advanced_toolbar_align:"left",
        theme_advanced_statusbar_location:"bottom",
        theme_advanced_buttons1:"bold,underline,italic,strikethrough,|,undo,redo,link,|,search,replace,fixContent",
        theme_advanced_buttons2:"",
        theme_advanced_buttons3:"",
        theme_advanced_resizing:true,
        entity_encoding:"raw",
        setup : function(ed) {
            ed.onChange.add(function(ed, l) {
                // console.debug('Editor contents was modified. Contents: ' + l.content);
                ed.save();
                //   editor = ed;
            });
            ed.addButton("fixContent", {
                title:"Fixed",
                image:"modules/images/fixed.png",
                onclick:function() {
                   var content = ed.selection.getContent();
                    //set selection content
                    ed.execCommand("mceReplaceContent",true,"<!--fixed-->"+content+"<!--/fixed-->");
                }
            });
        }
    });
    /***
     *
     */
    var destinations = $('.jk_list_destinations');
    /***
     *xu li khi nguoi dung click chon destination (HCM, dat lat, ...)
     */
    destinations.live("change", function() {
        var $this = $(this),
            $options = $this.find("option:selected"),//lay the <option>
            locations = $this.parents('[id^="TR_table_clone_"]').find('.jk_list_locations');
        var items = []; //khoi tao bien items
        locations.html("<option value=''>None</option>");
        $.each($options, function() {
            var destination_id = $(this).val();
            $.ajax({
                type:'POST',
                url:'index.php?module=Tours&entryPoint=GetLocationByDestinations',
                async:false,
                data:{destination:destination_id},
                success:function(data) {
                    //xet xem data co null ko
                    if (data != null && data.length > 0) { // neu ko null

                        // console.log(data); //debugger
                        $.each(data, function(key, val) { //set toan bo data
                            // console.log(val);
                            //push location in
                            var d = (val.description != null) ? val.description : "";
                            items.push("<option value='" + d + "'>" + val.name + "</option>");
                        });
                        // console.log(items.join(''));

                        locations.html(items.join(''));//append html

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
    var locations = $('.jk_list_locations');
    locations.live('change', function() {
        var $this = $(this),
            description = $this.val(),
            editorId = $this.attr('data-editorId');
        if (description) {
            if (editorId) {
                if (!tinymce.EditorManager.execInstanceCommand(editorId, "mceReplaceContent", false, description)) {
                    alert("ERROR!");
                }
            } else {
                alert("ERROR: editor id not found");
            }
        } else {
            alert("Không có trích dẫn cho nơi này!");
        }
    });

    $('.btnAddRow').live("click", function() {
        var tp = new TourPrograms(CurrentTourProgramLine);
        tp.add();
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
    $('.btnDelRow').live("click", function() {
        var $this = $(this),
            tr = $this.parent().parent(),
            parentTr = tr.parent();
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
    });
    /** function load template**/
    function department_change(){

        var dp = $("#department"),
        department = dp.val(),
        tourtype = $("#tour_type").val(),
        tpls = $("#templates");
        tpls = tpls.html("<option value=''>None</option>");
        if (department && tourtype == "custom"){
            jk_tpl.load(department);
            tpls.append(jk_tpl.OptionListHTML.join());
            tpls.removeAttr("disabled");
        }else{
            tpls.attr("disabled","disabled");
        }
    }
    /**tour template**/
    $('#department').live('change',function(){
        department_change();
    });
    $('#tour_type').live('change',function(){
        department_change();
    });


});