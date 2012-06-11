/**
 * Advanced, robust set of sales and support modules.
 * Extensions to OpenSales for SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
 * @copyright SalesAgility Ltd http://www.salesagility.com
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Greg Soper <greg.soper@salesagility.com>
 */

/**
 * Advanced, robust set of sales and support modules.
 * ORIGINAL AUTHOR
 *
 * @package OpenSales for SugarCRM
 * @subpackage Products
 * @copyright 2008 php|webpros.com(tm)  http://www.phpwebpros.com/
 * 
 *
 * @author Rustin Phares <rustin.phares@phpwebpros.com>
 */


/**
 * Copy address right
 */
 var lineno;
 
 function getHTTPObject_ajax() {
        var xmlhttp;
        /*@cc_on
        @if (@_jscript_version >= 5)
        try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
        try {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
        xmlhttp = false;
        }
        }
        @else
        xmlhttp = false;
        @end @*/
        if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
            try {
                xmlhttp = new XMLHttpRequest();
            } catch (e) {
                xmlhttp = false;
            }
        }
        return xmlhttp;
    }

    // Creating http AJAX Object
    var http = getHTTPObject_ajax(); // We create the HTTP Object    

    function subcode1(ses_id)
    {
      if(ses_id != "") {
          var sid = ses_id;    
          var params = 'ses_id='+ses_id+'&frm=popup';
          http.open("POST","http://sugardev.gladserv.com/carnegie/subcode.php", true);
          http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          http.setRequestHeader("Content-length", params.length);
          http.onreadystatechange = handle_display_popup;
          http.send(params);
     }
     }

 function handle_display_popup()
    {
        if (http.readyState == 4) {
            var txt = http.responseText;
            if(txt!=''){
                //alert(txt);
                document.getElementById('maincodeid' + lineno ).innerHTML = txt;
                //document.getElementById('div_message_popup').style.display = "block";
            }
        }
    }


 
function copyAddressRight(form)
{
    form.shipping_account_id.value = form.billing_account_id.value;
    form.shipping_account.value = form.billing_account.value;
    form.shipping_contact_id.value = form.billing_contact_id.value;
    form.shipping_contact.value = form.billing_contact.value;
    form.shipping_address.value = form.billing_address.value;
    form.shipping_city.value = form.billing_city.value;
    form.shipping_state.value = form.billing_state.value;
    form.shipping_postal.value = form.billing_postal.value;
    form.shipping_country.value = form.billing_country.value;
    return true;
}

/**
 * Copy address left
 */
function copyAddressLeft(form)
{
    form.billing_account_id.value = form.shipping_account_id.value;
    form.billing_account.value = form.shipping_account.value;
    form.billing_contact_id.value = form.shipping_contact_id.value;
    form.billing_contact.value = form.shipping_contact.value;
    form.billing_address.value =    form.shipping_address.value;
    form.billing_city.value = form.shipping_city.value;
    form.billing_state.value = form.shipping_state.value;
    form.billing_postal.value =    form.shipping_postal.value;
    form.billing_country.value = form.shipping_country.value;
    return true;
}

/**
 * Copy list price
 */
function copyListPrice(ln)
{
    var listPrice = document.getElementById('product_list_price' + ln).value;
    var unitPrice = document.getElementById('product_unit_price' + ln).value;
    if (unitPrice!=listPrice) {
        document.getElementById('product_unit_price' + ln).value = listPrice;
    }

}

/**
 * Insert product line
 */
function insertProductLine(ln)
{
    var x=document.getElementById('productLine').insertRow(-1);

    var y=x.insertCell(0);
    var z=x.insertCell(1);
    var k=x.insertCell(2);

    var a=x.insertCell(3);
    var b=x.insertCell(4);
    var c1=x.insertCell(5);
    var t=x.insertCell(6);
    var c=x.insertCell(7);
    
    var d=x.insertCell(8);
    
    y.className="dataField";
    k.className="dataField";
    z.className="dataField";
    
    z.setAttribute('nowrap',true);
    a.className="dataField";
    b.className="dataField";
    c1.className="dataField";
    t.className="dataField";
    c.className="dataField";
    d.className="dataField";

    y.innerHTML = '<tr> <td><fieldset> <table  cellpadding="0" cellspacing="0" width="100%" ><tr><td class="dataLabel">Date & time</td> '+
                                        '<td class="dataField"><input type="text" name="date_time[]" size="35" id="date_time" value="{DATE_TIME}"/></td>' +
                                        '<td class="dataLabel">Destination</td>'+
                                        '+<td class="dataField"><input type="text" name="destination[]" size="35" id="destination" value="{DESTIANTION}"/></td>'+
                                   '</tr>'+
                                   '<tr>'+
                                        '<td class="dataLabel">Notes</td>'+
                                        '<td class="dataField"><input type="text" name="notes[]" size="35" id="notes" value="{NOTE}"/></td>' +
                                        '<td class="dataLabel"><input type="hidden" name="tour_program_id" id="tour_program_id" value=""/> <input type='hidden' name='deleted[]' id='deleted' value='0'/></td>'+
                                        '<td class="dataLabel">&nbsp;</td>'+
                                   '</tr>'+
                                   <tr>
                                        <td class="dataLabel">Description</td>
                                        <td class="dataField"><textarea cols="75" rows="6" id="description_pro" name="description_pro[]">{DESCRIPTION_PRO}</textarea></td>
                                        <td class="dataLabel">Picture</td>
                                        <td class="dataLabel"><input type="file" name="uploadfile[]" id ="uploadfile" value="{FILENAME}"/></td>
                                   </tr>
                               </table>    
                            </fieldset>
                           
                        </td>
                        <td>
                           <input type="button" class="addRow button"  value="Add row"/>
                           <input type="button" class="delRow button"  value="Delete row"/>
                        </td>
                </tr>';
    
    
    
    
    
    
    y.innerHTML="<input type='text' name='year_from[]' id='year_from" + ln + "' size='15' maxlength='20' value='' title='' tabindex='3' >";
    z.innerHTML="<input type='text' name='name[]' id='name" + ln +"' size='25' maxlength='255' value='' title='' tabindex='3'>";
    k.innerHTML="<input type='text' name='major[]' id='major" + ln +"' size='25' maxlength='255' value='' title='' tabindex='3'>";
    a.innerHTML="<input type='text' name='degree[]' id='degree" + ln + "' size='20' maxlength='255' value='' title='' tabindex='3'>";
    b.innerHTML="<input type='hidden' name='deleted[]' id='deleted" + ln + "' value='0'><input type='hidden' name='product_quote_id[]' value=''><input type='button' class='button' value='Delete Row' tabindex='3' onclick='deleteProductLine(this)'>";
    
    var e=document.getElementById('productLine').insertRow(-1);
        var g=e.insertCell(0);


//var m=e.insertCell(2);
//    var n=e.insertCell(3);
    var d1=e.insertCell(1);
    var d2=e.insertCell(2);
    var f=e.insertCell(3);
    var h=e.insertCell(4);
    var i=e.insertCell(5);
    var j=e.insertCell(6);
    var k=e.insertCell(7);
    

    f.className="dataField";
    g.className="dataField";
    h.className="dataField";
    i.className="dataField";
    j.className="dataField";
    k.className="dataField";
    d1.className="dataField";
    d2.className="dataField";


    d2.innerHTML="";
    
    
    ln++;
        
    

    document.getElementById('addProductLine').onclick = function() {
        insertProductLine(ln);
        
    }
}

/**
 * Delete product line
 */
function deleteProductLine(ln)
{
    var obj = ln.parentNode.parentNode.rowIndex;
    document.getElementById('productLine').deleteRow(obj);
    // delete product note line
    document.getElementById('productLine').deleteRow(obj);
    // calculate product line total
    calculateProductLineTotal();
}

/**
 * Mark product line deleted
 */
function markProductLineDeleted(ln)
{
    // collapse product line; update deleted value
    document.getElementById('product_line' + ln).style.display = 'none';
    // collapse product note line
    //document.getElementById('product_note_line' + ln).style.display = 'none';
    document.getElementById('deleted' + ln).value = '1';
    // calculate product line total
    calculateProductLineTotal();
}

/**
 * Open product popup
 */
function openProductPopup(ln)
{ lineno=ln;
    var popupRequestData = {
        "call_back_function" : "setProductReturn",
        "form_name" : "EditView",
        "field_to_name_array" : {
            "id" : "product_id" + ln,
            "name" : "product_name" + ln,
            "cost_copy" : "product_cost_price" + ln,
            "price_copy" : "product_list_price" + ln
        }
    };

    open_popup('Products', 600, 400, '', true, false, popupRequestData);

}

/**
 * The reply data must be a JSON array structured with the following information:
 *  1) form name to populate
 *  2) associative array of input names to values for populating the form
 */
var fromPopupReturn  = false;
function setProductReturn(popupReplyData)
{
    fromPopupReturn = true;
    var formName = popupReplyData.form_name;
    var nameToValueArray = popupReplyData.name_to_value_array;
    
    for (var theKey in nameToValueArray)
    {
        if(theKey == 'toJSON')
        {
            /* just ignore */
        }
        else
        {
            var displayValue = nameToValueArray[theKey].replace(/&amp;/gi,'&').replace(/&lt;/gi,'<').replace(/&gt;/gi,'>').replace(/&#039;/gi,'\'').replace(/&quot;/gi,'"');;
            /** depreciated
             window.document.forms[form_name].elements[the_key].value = displayValue;
             */
            //alert(theKey + " => " + displayValue);
            document.getElementById(theKey).value = displayValue;
            /** uncomment to copy value on select
             if (theKey.search('product_list_price') != -1) {
                 var ln = theKey.slice(18);
                document.getElementById('product_unit_price' + ln).value = displayValue;
             }
             */
        }
    }
    /** uncomment to copy value on select
     calculateProductLine(ln);
     */
//     subcode1(document.getElementById('product_id' + lineno).value);
}

/**
 * Calculate product line
 */
function calculateProductLine(ln)
{
    var productQty = Number(document.getElementById('product_qty' + ln).value);
    var productUnitPrice = document.getElementById('product_unit_price' + ln).value;
    var vat =document.getElementById('vat' + ln).value;
    
    
    if (productQty == '' || productUnitPrice == '') {
        return;
    }
    
    productUnitPrice = unformatNumber(productUnitPrice);

    var productTotalPrice = productQty * productUnitPrice;

    
    var totalvat=(productTotalPrice * vat) /100;
    
    //productTotalPrice=productTotalPrice + totalvat;
    
    document.getElementById('vat_amt' + ln).value = formatNumber(totalvat);
    
    document.getElementById('product_unit_price' + ln).value = formatNumber(productUnitPrice);
    document.getElementById('product_total_price' + ln).value = formatNumber(productTotalPrice);
    calculateProductLineTotal();
}

/**
 * Calculate product line total
 */
function calculateProductLineTotal()
{
    var length = document.getElementById('productLine').getElementsByTagName('tr').length;
    var row = document.getElementById('productLine').getElementsByTagName('tr');
    var subtotal = 0;
    var tax_vat = 0;
    
    for (i=1; i < length; i++) {
        var qty = 0;
        var price = 0;
        var deleted = 0;
        var vat_amt = 0;

        var input = row[i].getElementsByTagName('input');
        for (j=0; j < input.length; j++) {
            if (input[j].id.indexOf('product_qty') != -1) {
                qty = input[j].value;
            }
            if (input[j].id.indexOf('product_unit_price') != -1) 
            {
                price = unformatNumber(input[j].value);
            }
            
            if (input[j].id.indexOf('vat_amt') != -1) 
            {
                vat_amt = unformatNumber(input[j].value);
            }
                        
            // insufficient; depreciated
            if (input[j].id.indexOf('deleted') != -1) {
                deleted = input[j].value;
            }
            

        }
        if (qty != 0 && price != 0 && deleted != 1) {
            
            subtotal += price * qty;
        }
        
        if (vat_amt != 0) {
            tax_vat = tax_vat+vat_amt;
            
        }        
        
    }
    
    
    var total_price =subtotal;
    
    // subtotal = (subtotal * 30)/100;
     
//     if(subtotal > 4000)
     //subtotal = 4000;

    document.getElementById('subtotal_amount').value = formatNumber(subtotal);
    var taxcal=document.getElementById('subtotal_amount').value;
    
    document.getElementById('tax_amount').value = formatNumber(tax_vat);
    
    var taxcal1= parseInt(unformatNumber(taxcal));
    calculateGrandTotal(total_price,subtotal);


}

/**
 * Calculate grand total
 */
function calculateGrandTotal(totprice,subtot)
{
    var subtotal = unformatNumber(document.getElementById('subtotal_amount').value);

    //var discount = unformatNumber(document.getElementById('discount_amount').value);
    var discount = unformatNumber(0);

    var tax = unformatNumber(document.getElementById('tax_amount').value);
    var phat_sinh = unformatNumber(document.getElementById('phat_sinh').value);
    var chiet_khau = unformatNumber(document.getElementById('chiet_khau').value);
    var shipping = unformatNumber(document.getElementById('shipping_amount').value);

    var total = (subtotal - discount) + tax + shipping + chiet_khau + phat_sinh;
    //document.getElementById('tax_amount').value = formatNumber(tax);
    document.getElementById('total_amount').value = formatNumber(total);
}

function unformatNumber(str)
{
    var grp_sep = String(document.getElementById('grp_seperator').value);
    var dec_sep = String(document.getElementById('dec_seperator').value);
    
    str = String(str);
    
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    
    str = str.replace(dec_sep, '.');
    
    num = Number(str);
    
    return num;
}

function formatNumber(str)
{
    var grp_sep = String(document.getElementById('grp_seperator').value);
    var dec_sep = String(document.getElementById('dec_seperator').value);
    
    num = Number(str);
    str = formatCurrency(num);
    
    str = str.replace(/,/, '{,}').replace(/\./, '{.}');
    str = str.replace(/{,}/, grp_sep).replace(/{.}/, dec_sep);
    
    return str;
}


function Quantity_formatNumber(ln)
{
    var qty=document.getElementById('qty_product_qty' + ln).value;
    qty=qty.replace(/,/, '');
    document.getElementById('product_qty' + ln).value = Number(qty);

    
var str=document.getElementById('qty_product_qty' + ln).value;

    num = Number(qty);
    str = formatCurrency(num);
    str=str.split('.00')
document.getElementById('qty_product_qty' + ln).value=str[0];
    //return str;
}


function formatCurrency(strValue)
{
    strValue = strValue.toString().replace(/\$|\,/g,'');
    dblValue = parseFloat(strValue);

    blnSign = (dblValue == (dblValue = Math.abs(dblValue)));
    dblValue = Math.floor(dblValue*100+0.50000000001);
    intCents = dblValue%100;
    strCents = intCents.toString();
    dblValue = Math.floor(dblValue/100).toString();
    if(intCents<10)
        strCents = "0" + strCents;
    for (var i = 0; i < Math.floor((dblValue.length-(1+i))/3); i++)
        dblValue = dblValue.substring(0,dblValue.length-(4*i+3))+','+
        dblValue.substring(dblValue.length-(4*i+3));
    return (((blnSign)?'':'-') + dblValue );
}
