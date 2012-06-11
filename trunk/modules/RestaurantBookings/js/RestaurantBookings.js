$(function(){

    $('.foodmenu').click(function(){
        var i = this.id.substring(this.id.length-1,this.id.length);
        filterPopup('restaurants_foodmenu_name_advanced','restaurantstbookings_name','FoodMenu',{'call_back_function':'set_return','form_name':'EditView','field_to_name_array':{'description':'menu'+i}}) ;
    });
    });