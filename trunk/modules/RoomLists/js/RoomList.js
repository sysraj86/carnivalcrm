$(document).ready(function(){
     changeHideDisplay();
     on_off_Addrow();
     $('form').submit(function(){
            selectAllOptions();
            return check_form('EditView');
     });
    $('.AddHotel').click(function(){
        val = $('.dsks').val();
        value = $('.ks_id').val();
        text = $('.tenks').val();
        if(val == null){
            alert('Please select hotel name');
        }
        $('.dsks').append('<option value="'+value+'">'+text+'</option>');
        $('.tenks').val($('.dsks option:selected').text());
        $('.ks_id').val(val);
        $('.dsks option:selected').remove();
    });

    $('.addCus').live('click',function(){
        $this = $(this);
        var target = $(this).closest('tr').find('.dskhtrongphong').attr('class');
        var src = $(this).closest('tr').find('.dskh').attr('class');
        addAndDeleteItems($this,src,target);
    });
    $('.return_cus').live('click',function(){
        $this = $(this);
        var src = $(this).closest('tr').find('.dskhtrongphong').attr('class');
        var target = $(this).closest('tr').find('.dskh').attr('class');
        addAndDeleteItems($this,src,target);
    });
    
    $('#department').change(function(){
        changeHideDisplay();
    });
});

function addAndDeleteItems(name,src,target){
    var temp = $(name).closest('tr').find('.'+src).val();
    if(temp == null){
        alert('Please select one or more items');
        $('.'+src).focus();
        return;
    }
    for(i=0;i<temp.length;i++){
        var text = $(name).closest('tr').find('.'+src+' option:[value='+temp[i]+']').text();
        $(name).closest('tr').find('.'+target).append("<option value='" +temp[i]+ "'>" +text+"</option>")  
    }
    $(name).closest('tr').find('.'+src+' option:selected').remove();
    on_off_Addrow();
}

// select all items from list box
function selectAllOptions()
{   
    $('.dskhtrongphong option').attr('selected',true);
//    return check_form('EditView');
}

function changeHideDisplay(){
    val = $('#department').val();
    if(val == 'dos'){
        $('.room_note').show();
//        $('.room_number').show();
        $('.room_remark').hide();
        $('.room_class').hide();
        $('.inbound').hide();
        
    }
    else if(val == 'ib'){
       $('.room_note').hide();
//       $('.room_number').hide(); 
        $('.room_remark').show();
        $('.room_class').show();
         $('.inbound').show();  
    }
    
    else if(val == 'ob'){
        $('.room_note').hide();
        $('.room_remark').hide();
        $('.room_class').hide();
        $('.inbound').hide(); 
//        $('.room_number').hide();   
    }
    else{
        $('.room_note').hide();
        $('.room_remark').hide();
        $('.room_class').hide();
        $('.inbound').hide(); 
    }
}
