/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/26/11
 * Time: 9:28 AM
 */
(function (w) {
    var TourTemplates = {
        tours:[],
        OptionListHTML:[],
        stack:[],
        destination_dom:"",
        url:"index.php?module=Tours&entryPoint=TourAjax",
        /***
         * load temlate by department
         * @param department inbound || outbound || dos
         */
        load:function (department,frame,success) {
            var t = tplTour;
            t.templates = [];
            //console.log(success);
            if (department && department != "") {
                $.ajax({
                    url:t._url,
                    async:false,
                    type:"POST",
                    data:{department:department,frame_type:frame},
                    success:function (data) {
                        success();
                        if (data) {
                            data = $.parseJSON(data);
                            t.OptionListHTML=[];
                            $.each(data, function (key, val) {
                                var tour = new Tours();
                                for (var field in val) {
                                    tour[field] = val[field];
                                }
                                t.OptionListHTML.push("<option value='" + tour.id + "'>" + tour.template_name + "</option>");
                                t.tours[tour.id] = tour;
                            });
                        }
                    }
                });
            }
        },
        refresh:this.load,
        render:function (tpl_id) {

        },
        save:function (obj, stack_name) {
            if (typeof obj == 'string') {
                obj = $(obj);
            }
            if (typeof obj == 'object') {
                if (obj.clone) {
                    if (stack_name) {
                        tplTour.stack[stack_name] = obj.clone();
                    } else {
                        tplTour.stack.push(obj.clone());
                    }
                }
            }
        },
        restore:function (stack_name) {
            var obj, parent, obj1, id;
            if (stack_name) {
                obj = tplTour.stack[stack_name];
            } else {
                obj = tplTour.stack.pop();
            }
            if (typeof obj == 'object') {
                if (obj.attr) {
                    id = obj.attr('id');
                    //console.log(id);
                    obj1 = $('#'+id);
                    //console.group("obj1");
                    //console.log(obj1.html());
                    //console.group("obj");
                    //console.log(obj.html());
                    obj1.html(obj.html());
                }
            }
            var tour = new Tours();
            tour.init();
        }
    }
    w.TourTemplates = tplTour = TourTemplates;
})(window);