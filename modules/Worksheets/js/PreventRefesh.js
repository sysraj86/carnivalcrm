/***
* Class prevent click refesh button and press F5
*/
//var a=0; 
/*function refresh() 
{ 
    if (116==event.keyCode) 
    return false; 
} 

document.onkeydown = function (){ refresh(); } 

function logout() 
{ 
    alert('Windows unable reload !') ;
} 
window.onunload = function(){ 
if(a==116) 
{ 
a=0; 
return; 
} 
else if(event.clientX>0 && event.clientY<0) 
return; 
else if(event.clientX<0 && event.clientY<0) 
logout(); 
} */

function refresh()
{ 
if ( event.keyCode==116) 
{ 
event.keyCode = 0; 
event.cancelBubble = true; 
return false; 
} 
}
document.onkeydown = function (){ refresh(); }  