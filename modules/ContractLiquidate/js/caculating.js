
    // Ham tinh toan cac event
    $(function(){
        
        // Ham lay thong tin cua Hop dong goc
       // $('.contract').click(function(){
//             open_popup('Contracts', 600, 400, "", true, false, {"call_back_function":"set_return","form_name": "EditView","field_to_name_array":{"id":"contract_id", "number": "contract","parent_type":"parent_type"}}, "single", true);        
//        });
        
        // Ham tinh toan gia tri dong cot cua gia tri hop dong 
        $('.tinhtoan').blur(function(){
            var id = this.id.substring(this.id.length-1,this.id.length);
            
            //////////////////////////////// Tinh thanh tien ke hoach cua gia tri hop dong
            var contract_dongia_kehoach =  parseFloat($('#contract_dongia_kehoach'+id).val());
            var contract_soluong_kehoach =  parseFloat($('#contract_soluong_kehoach'+id).val());
            var contract_thanhtien_kehoach =  contract_dongia_kehoach*contract_soluong_kehoach;
            if(!isNaN(contract_thanhtien_kehoach)){
                $('#contract_thanhtien_kehoach'+id).val(contract_thanhtien_kehoach.toString()); 
            }
            
            //////////////////////////////// Tinh thanh tien thuc te cua gia tri hop dong              
            var contract_dongia_thucte =  parseFloat($('#contract_dongia_thucte'+id).val());
            var contract_soluong_thucte =  parseFloat($('#contract_soluong_thucte'+id).val());
            var contract_thanhtien_thucte =  contract_dongia_thucte*contract_soluong_thucte; 
            if(!isNaN(contract_thanhtien_thucte)){
                $('#contract_thanhtien_thucte'+id).val(contract_thanhtien_thucte.toString()); 
            }
            
            /////////////////////////////// Tinh tong cong cua gia tri hop dong 
            calculateContractValue(this);
            ///////////////////////////////
        });
        
        // Ham tinh toan gia tri dong cot cua phat sinh tang 
        $('.tinhtoan_tang').blur(function(){
            var id = this.id.substring(this.id.length-1,this.id.length);
            
            //////////////////////////////// Tinh thanh tien ke hoach cua phat sinh tang
            var phatsinhtang_dongia_kehoach =  parseFloat($('#phatsinhtang_dongia_kehoach'+id).val());
            var phatsinhtang_soluong_kehoach =  parseFloat($('#phatsinhtang_soluong_kehoach'+id).val());
            var phatsinhtang_thanhtien_kehoach =  phatsinhtang_dongia_kehoach*phatsinhtang_soluong_kehoach;
            if(!isNaN(phatsinhtang_thanhtien_kehoach)){
                $('#phatsinhtang_thanhtien_kehoach'+id).val(phatsinhtang_thanhtien_kehoach.toString()); 
            }
            
            //////////////////////////////// Tinh thanh tien thuc te cua phat sinh tang             
            var phatsinhtang_dongia_thucte =  parseFloat($('#phatsinhtang_dongia_thucte'+id).val());
            var phatsinhtang_soluong_thucte =  parseFloat($('#phatsinhtang_soluong_thucte'+id).val());
            var phatsinhtang_thanhtien_thucte =  phatsinhtang_dongia_thucte*phatsinhtang_soluong_thucte; 
            if(!isNaN(phatsinhtang_thanhtien_thucte)){
                $('#phatsinhtang_thanhtien_thucte'+id).val(phatsinhtang_thanhtien_thucte.toString()); 
            }
            
            /////////////////////////////// Tinh tong cong cua phat sinh 
            calculateIncre(this);
            ///////////////////////////////
        });
        
        // Ham tinh toan gia tri dong cot cua phat sinh giam 
        $('.tinhtoan_giam').blur(function(){
            var id = this.id.substring(this.id.length-1,this.id.length);
            
            //////////////////////////////// Tinh thanh tien ke hoach cua phat sinh giam
            var phatsinhgiam_dongia_kehoach =  parseFloat($('#phatsinhgiam_dongia_kehoach'+id).val());
            var phatsinhgiam_soluong_kehoach =  parseFloat($('#phatsinhgiam_soluong_kehoach'+id).val());
            var phatsinhgiam_thanhtien_kehoach =  phatsinhgiam_dongia_kehoach*phatsinhgiam_soluong_kehoach;
            if(!isNaN(phatsinhgiam_thanhtien_kehoach)){
                $('#phatsinhgiam_thanhtien_kehoach'+id).val(phatsinhgiam_thanhtien_kehoach.toString()); 
            }
            
            //////////////////////////////// Tinh thanh tien thuc te cua phat sinh giam             
            var phatsinhgiam_dongia_thucte =  parseFloat($('#phatsinhgiam_dongia_thucte'+id).val());
            var phatsinhgiam_soluong_thucte =  parseFloat($('#phatsinhgiam_soluong_thucte'+id).val());
            var phatsinhgiam_thanhtien_thucte =  phatsinhgiam_dongia_thucte*phatsinhgiam_soluong_thucte; 
            if(!isNaN(phatsinhgiam_thanhtien_thucte)){
                $('#phatsinhgiam_thanhtien_thucte'+id).val(phatsinhgiam_thanhtien_thucte.toString()); 
            }
            
            /////////////////////////////// Tinh tong cong cua phat sinh 
            calculateDecre(this);
            ///////////////////////////////
        });
        
        // Ham tinh toan gia tri cua thanh toan 
        $('.thanhtoan').blur(function(){
           calculationAmount(); 
        }); 
    });

    // Ham tinh tong cong cua gia tri hop dong
    function calculateContractValue(name){       
        var count = $(name).closest("table").find(" tbody tr").length;
        var tong_kehoach = 0;
        var tong_thucte = 0;
        for (i = 1 ; i <= count ; i++ ){
            if($('#deleted'+i).val()!= 1){
                var kehoach = parseFloat($('#contract_thanhtien_kehoach'+i).val());
                var thucte = parseFloat($('#contract_thanhtien_thucte'+i).val()); 
                if(!isNaN(kehoach)){
                    tong_kehoach += kehoach;
                }
                if(!isNaN(thucte)){
                    tong_thucte += thucte;
                }
            }     
        } 
        $('#tongcong_contract_kehoach').val(tong_kehoach.toString());
        $('#tongcong_contract_thucte').val(tong_thucte.toString());
        
        //////////////////
        calculationAmount();        
    }
    
    // Ham tinh tong cong cua phat sinh tang 
    function calculateIncre(name){       
        var count = $(name).closest("table").find(" tbody tr").length;
        var tong_kehoach = 0;
        var tong_thucte = 0;
        for (i = 1 ; i <= count ; i++ ){
            if($('#deleted'+i).val()!= 1){
                var kehoach = parseFloat($('#phatsinhtang_thanhtien_kehoach'+i).val());
                var thucte = parseFloat($('#phatsinhtang_thanhtien_thucte'+i).val()); 
                if(!isNaN(kehoach)){
                    tong_kehoach += kehoach;
                }
                if(!isNaN(thucte)){
                    tong_thucte += thucte;
                }
            }     
        } 
        $('#tongcong_tang_kehoach').val(tong_kehoach.toString());
        $('#tongcong_tang_thucte').val(tong_thucte.toString());
        
        //////////////////
        calculationAmount();        
    }
    
    // Ham tinh tong cong cua phat sinh giam
    function calculateDecre(name){       
        var count = $(name).closest("table").find(" tbody tr").length;
        var tong_kehoach = 0;
        var tong_thucte = 0;
        for (i = 1 ; i <= count ; i++ ){
            if($('#deleted'+i).val()!= 1){
                var kehoach = parseFloat($('#phatsinhgiam_thanhtien_kehoach'+i).val());
                var thucte = parseFloat($('#phatsinhgiam_thanhtien_thucte'+i).val()); 
                if(!isNaN(kehoach)){
                    tong_kehoach += kehoach;
                }
                if(!isNaN(thucte)){
                    tong_thucte += thucte;
                }
            }     
        } 
        $('#tongcong_giam_kehoach').val(tong_kehoach.toString());
        $('#tongcong_giam_thucte').val(tong_thucte.toString());
        
        //////////////////
        calculationAmount();        
    }
    
    // Ham tinh tong thanh toan 
    function calculationAmount(){
        var contract_kehoach = parseFloat($('#tongcong_contract_kehoach').val());
        var tang_kehoach = parseFloat($('#tongcong_tang_kehoach').val());
        var giam_kehoach = parseFloat($('#tongcong_giam_kehoach').val());
        var tong_kehoach = contract_kehoach + tang_kehoach - giam_kehoach ;
        $('#tongtien_kehoach').val(tong_kehoach.toString());
        
        var contract_thucte = parseFloat($('#tongcong_contract_thucte').val());
        var tang_thucte = parseFloat($('#tongcong_tang_thucte').val());
        var giam_thucte = parseFloat($('#tongcong_giam_thucte').val());
        var tong_thucte = contract_thucte + tang_thucte - giam_thucte ;
        $('#tongtien_thucte').val(tong_thucte.toString());
        
        var tienthanhtoan = parseFloat($('#tienthanhtoan').val());
        var tienconlai = 0;
        var tientralai = 0;
        if(tong_thucte >= tienthanhtoan){
            tienconlai = tong_thucte - tienthanhtoan;
        }else{
            tientralai = tienthanhtoan - tong_thucte;
        }
        
        $('#tienconlai').val(tienconlai.toString());
        $('#tientralai').val(tientralai.toString());
    }
    
       //   $('#bangchu').val(DocTienBangChu($('#tongtien').val()));