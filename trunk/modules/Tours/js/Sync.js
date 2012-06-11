/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 2/1/12
 * Time: 11:21 AM
 */
function sync_with_web(obj) {
    var tour_id = "",
        $checkbox = $("[name='mass[]']:checked"),
        count = $checkbox.length,
        loader = $('<img src="modules/images/ajax-loader.gif" alt="loading..."/>'),
        $parentOfThis = $("#actions_link").parent("td");
    //console.log(obj);
    //console.log($parentOfThis);
    if ($checkbox.length > 0) {
        $parentOfThis.append(loader);
        $checkbox.each(function (index) {
            tour_id += $(this).val();
            if (index < count - 1) tour_id += "|";
        });
        $.ajax({
            url:"index.php?module=Tours&entryPoint=TourAjax",
            type:"POST",
            async:false,
            data:{action:"sync", tour_id_sync:tour_id},
            success:function (data) {
                loader.remove();
                //console.log(data);
                data = $.parseJSON(data);
                $.each(data, function (key, value) {
                    console.log(value);
                    if (value) {
                        var $this = $('[value="' + key + '"]');
                        var $tr = $this.parent().parent(),
                            $synced = $tr.find(".async");
                        $synced.removeClass("async").addClass("synced").text("synced");
                    }
                });
            }
        });
    }else{
        alert("You must select tour!");
    }
}