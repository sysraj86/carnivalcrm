/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/16/11
 * Time: 9:52 AM
 */
$(document).ready(function() {
    $('.jk_what_service').live("change", function() {
        var $this = $(this),
            type = $this.find("option:selected").val(),
            worksheet_id = $("#groupprogr53b5ksheets_idb").val(),
            services = $this.parent().next().find('.jk_list_service_items');
        // t = $this;
        //  console.log(services);
        if (!worksheet_id) {
            alert("You must select worksheet before!");
            $this.children(":eq(0)").attr("selected", true);
            return;
        } else if (type) {
            var loading = services.parent().find('.jk_service_loading');
            loading.show();
            $.ajax({
                type:"POST",
                url:"index.php?module=GroupProgram&entryPoint=GetServicesByWorksheet",
                async:false,
                data:{worksheet_id:worksheet_id,type:type},
                success:function(data) {
                    loading.hide();
                    if (data != null && data.length>0) {
                        var items = [];
                        $.each(data, function(key, val) {
                            items.push("<option value='" + val.id + "'>" + val.name + "</option>");
                        });
                        //console.log(items);
                        services.html(items.join(" "));
                        //get text of service (text of first element);
                        var text = $(":first",services).text();
                        //set name
                        services.parent().find('[name="parent_name[]"]').val(text);
                    }else{
                        services.html("<option value=''>None</option>");
                    }
                }
            });
        }else{
            services.html("<option value=''>None</option>");
        }

    });
    $('.jk_list_service_items').live("change",function(){

        var $this = $(this),
            selected=$('option:selected',$this),
        text = selected.text();
       // t = $this;
        $this.parent().find('[name="parent_name[]"]').val(text);
    });
});