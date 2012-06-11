<?php 

$sugarFieldName = $_GET['sugarFieldphp'];

?>

<script type="text/javascript" language="javascript">

/* standard small functions */
function $m(quem){
 return document.getElementById(quem)
}
function remove(quem){
 quem.parentNode.removeChild(quem);
}
function addEvent(obj, evType, fn){
 // elcio.com.br/crossbrowser
    if (obj.addEventListener)
        obj.addEventListener(evType, fn, true)
    if (obj.attachEvent)
        obj.attachEvent("on"+evType, fn)
}
function removeEvent( obj, type, fn ) {
  if ( obj.detachEvent ) {
    obj.detachEvent( 'on'+type, fn );
  } else {
    obj.removeEventListener( type, fn, false ); }
} 
/* THE UPLOAD FUNCTION */


var sugarField = window.parent.<? echo $sugarFieldName; ?>_sugarField();

function micoxUpload(form,url_action,id_element,html_show_loading,html_error_http,thisFileId){
var fileAndPath = thisFileId.value;
var lastPathDelimiter = fileAndPath.lastIndexOf('\\');
var fileNameOnly = fileAndPath.substring(lastPathDelimiter+1);

window.parent.document.getElementById(sugarField).value = fileNameOnly;
/******
* micoxUpload - Submit a form to hidden iframe. Can be used to upload
* Use but dont remove my name. Creative Commons.
* Versão: 1.0 - 03/03/2007 - Tested no FF2.0 IE6.0 e OP9.1
* Author: Micox - Náiron JCG - elmicoxcodes.blogspot.com - micoxjcg@yahoo.com.br
* Parametros:
* form - the form to submit or the ID
* url_action - url to submit the form. like action parameter of forms.
* id_element - element that will receive return of upload.
* html_show_loading - Text (or image) that will be show while loading
* html_error_http - Text (or image) that will be show if HTTP error.
*******/

 //testing if 'form' is a html object or a id string


 //creating the iframe
 var iframe = document.createElement("iframe");
 iframe.setAttribute("id","micox-temp");
 iframe.setAttribute("name","micox-temp");
 iframe.setAttribute("width","0");
 iframe.setAttribute("height","0");
 iframe.setAttribute("border","0");
 iframe.setAttribute("style","width: 0; height: 0; border: none;");
 
 //add to document
 form.parentNode.appendChild(iframe);
 window.frames['micox-temp'].name="micox-temp"; //ie sucks
 
 //add event
 var carregou = function() { 
   removeEvent( $m('micox-temp'),"load", carregou);
   var cross = "javascript: ";
   cross += "window.parent.$m('" + id_element + "').innerHTML = document.body.innerHTML; void(0); ";
   
   $m(id_element).innerHTML = html_error_http;
   $m('micox-temp').src = cross;
   
   //del the iframe
   
   setTimeout(function(){ remove($m('micox-temp'))}, 250);
  }
 addEvent( $m('micox-temp'),"load", carregou)
 
 //properties of form
 form.setAttribute("target","micox-temp");
 form.setAttribute("action",url_action);
 form.setAttribute("method","post");
 form.setAttribute("enctype","multipart/form-data");
 form.setAttribute("encoding","multipart/form-data");
 //submit
 form.submit();
 
 //while loading
 if(html_show_loading.length > 0){
  $m(id_element).innerHTML = '<img src="' + html_show_loading + '">';
 }
 
thisFileId.style.display = 'none';
 
}

</script>

<form>
<input 
type="file" 
id="file" 
value=""  
name="file" 
onChange="micoxUpload(this.form,'upload.php','upload_2','indicator.gif','Error in upload',this);" 
/>
</form>
<div id="upload_2">&nbsp;</div>

