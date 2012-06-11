/**
 * SUGARCRM VN
 * http://sugarcrm.com.vn
 */
jQuery(document).ready(function () {
    CheckTableClone();
    jQuery(".table_clone").each(function () {
        jQuery(this).find(" tbody >tr").each(function (i) {
                // Them
                jQuery(this).find(".btnAddRow").click(function (i) {
                    $('#thu_option').find('tbody > tr:last').clone(true).insertAfter($('#thu_option').find('tbody > tr:last'));
                    $('#chi_option').find('tbody > tr:last').clone(true).insertAfter($('#chi_option').find('tbody > tr:last'));

                    $('#thu_option').find('tbody > tr:last').find('.chi_soluong, .chi_dongia, .chi_thanhtien').val('0');
                    $('#thu_option').find('tbody > tr:last').find('.chi_dichvu').val('');
                    $('#chi_option').find('tbody > tr:last').find('.thu_soluong, .thu_dongia1, .thu_thanhtien1, .thu_dongia2, .thu_thanhtien2').val('0');
                    $('#chi_option').find('tbody > tr:last').find('.thu_dichvu').val('');
                    $('#thu_option').find('tbody > tr:last').find('.x').val('X');
                    $('#chi_option').find('tbody > tr:last').find('.x').val('X');
                    CheckTableClone();
                });

                // Xoa
                jQuery(this).find(".btnDelRow").click(function (i) {
                        id = jQuery(this).closest("tr").attr('id');
                        id = id.substring(id.length - 1, id.length);
                        var rowCount = $('#thu_option').find('tbody >tr').length;
                        $('#TR_thu_option' + id).remove();
                        jQuery(this).closest("tr").remove();
                        tinhtongthuoption();
                        tinhtongchioption();
                        tinhtongchiphi();
                        reportsummary();
                        CheckTableClone();
                    }
                );
            }
        );

    });
});
function CheckTableClone() {
    jQuery(".table_clone").each(function () {
            // set Atribute for table

            //maxcount default 5

            if (jQuery(this).attr("maxcount") == null) {
                jQuery(this).attr("maxcount", 50);
            }
            // get Table ID
            var tableID = jQuery(this).attr("id");


            //alert(tableID);

            //tableID=tableID.substr(0,tableID.length-1);


            // lam sao de cap nhat cac TR la con truc tiep cua Table do thoi
            // cap nhat id cho cac TR
            var count = 0;
            var tongdong = 0;
            jQuery(this).find(" tbody tr").each(function (i) {
                if (jQuery(this).closest("table").attr("class") == "table_clone") {
                    tongdong++;
                }
            });
            jQuery(this).find(" tbody tr").each(function (i) {
                    i++;
                    var trID = "TR_" + tableID;

                    if (jQuery(this).closest("table").attr("class") == "table_clone") {
                        // so luong tr cua table can clone
                        count++;
                        trID = "TR_" + tableID + count;

                        jQuery(this).attr("id", trID);


                        var chiso = count;

                        jQuery(this).find("select,input,span,textarea").each(function () {
                                var eID = jQuery(this).attr("id");
                                var d;
                                if (eID != undefined) {
                                    if (count == tongdong) {
                                        d = count - 1;
                                    } else {
                                        d = count;
                                    }
                                    var sl = soluongchuso(d);
                                    var endChar = eID.substr(eID.length - sl, sl);
                                    // neu ky tu cuoi cung la con so
                                    if (!isNaN(endChar) && (endChar != chiso)) {
                                        //id da loai bo ky tu cuoi
                                        eID_After = eID.substr(0, eID.length - sl) + chiso;
                                        jQuery(this).attr('id', eID_After);
                                    }

                                    else if (isNaN(endChar)) {

                                        eID_After = eID + chiso;
                                        jQuery(this).attr('id', eID_After);
                                    }
                                }
                            }
                        );

                    }

                }
            );


            function soluongchuso(chuso) {
                if (chuso < 1) {
                    return 1;
                }
                var sobandau = chuso;
                var dem = 0;
                while (parseInt(sobandau) != 0) {
                    sobandau /= 10;
                    dem++;
                }
                return dem;
            }

            // kiem tra bat tat nut them va xoa
            /*    if(count2==1){
             jQuery(this).find(".btnDelRow").attr("disabled",true);
             }

             else{
             jQuery(this).find(".btnDelRow").removeAttr("disabled");
             }

             if(count==jQuery(this).attr("maxcount"))
             {
             jQuery(this).find(".btnAddRow").attr("disabled",true);
             }
             else
             {
             jQuery(this).find(".btnAddRow").removeAttr("disabled");
             }*/
        }
    );

}
