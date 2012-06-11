$(document).ready(function(){


//////////////////////////////////////////////////
   // Xu ly nut clear
   $('.cleardata').click(function(){
      jQuery(this).closest('tr').find('select,input,span,textarea').each(function(){
          jQuery(this).val("");
      });
      return false;    
   });
   
   // Tao hinh nen cho nut select va nut clear
  $('.selectdata').append('<img src="themes/default/images/id-ff-select.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=2125008055" alt="">'); 
  $('.cleardata').append('<img src="themes/default/images/id-ff-clear.png?s=857f75e8c18ece3e471240849f103469&c=1&developerMode=446605591" alt="">'); 
//////////////////////////////////////////////////////









});