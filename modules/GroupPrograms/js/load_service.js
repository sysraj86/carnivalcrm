/**
 * Created by JetBrains PhpStorm.
 * User: JK
 * Date: 12/16/11
 * Time: 9:52 AM
 */
$(document).ready(function() {
    $('.jk_list_service_items').live("change",function(){
        loadInfoOfService(this);         
    });
    $('.jk_what_service').live("change", function() {
        var $this = $(this),
        type = $this.find("option:selected").val(),
        worksheet_id = $("#groupprogr53b5ksheets_idb").val(),
        endNumID = /\d+$/.exec($this.attr('id'));
        services = $('#list_service_item'+endNumID[0]);   
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
        loadInfoOfService('#list_service_item'+endNumID[0]);
    });
    
    
    // Add by Thanh Le At 07/11/2012
    // Load Ajax Info Of Service In Group Programs.
    function loadInfoOfService(focus){
        var $this = $(focus),
        selected=$('option:selected',$this),
        text = selected.text();
        id = selected.val();
        type = $('.jk_what_service').find("option:selected").val();
        var endNumID = /\d+$/.exec($this.attr('id'));     // Lay so cuoi trong ID cua input
        $.ajax({
                type:"POST",
                url:"index.php?module=GroupProgram&entryPoint=GetInfoOfService",
                async:false,
                data:{service_id:id,type:type},
                success:function(data){ 
                    if (data != null){
                        $('#address'+endNumID[0]).text(data.address);
                        $('#tel'+endNumID[0]).val(data.tel);
                        $('#fax'+endNumID[0]).val(data.fax);
                    }
                }
            });
       // t = $this;
        $this.parent().find('[name="parent_name[]"]').val(text);
    }
});