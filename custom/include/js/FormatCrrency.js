/***
* Lib format currency for input and convert input value to number
* author Nguyen Duc Hai
* date Publish 2011/25/12
*/

// function format number to currency;
function formatMoney(money,decimals, decimal_sep, thousands_sep){
    decimals = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals, decimal_sep = decimal_sep == undefined ? "," : decimal_sep, thousands_sep = thousands_sep == undefined ? "." : thousands_sep, s = money < 0 ? "-" : "", i = parseInt(money = Math.abs(+money || 0).toFixed(decimals)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + thousands_sep : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep) + (decimals ? decimal_sep + Math.abs(money - i).toFixed(decimals).slice(2) : "");
}

// function convert curency to number

 function convertNumber(number,decimal_sep,thousands_sep){
    var tmp = $.trim(number.toString());
    if(tmp != ""){
        count = 0;
        count1 = 0;
        //tim ky tu phan cach phan ngan trong chuoi so vi du 2,000,000
        for(i=0;i<tmp.length;i++){
            if(tmp[i]==thousands_sep){
                count++;
            }    
        }
        if(count==1){
            tmp = tmp.replace(thousands_sep,".");  // vi du 1.222.222,323 se thanh  1.222.222.323
        }
        else{
            while(tmp.indexOf(thousands_sep) != -1){
                tmp = tmp.replace(thousands_sep,""); 
            }
        }
        //tim ky tu phan cach thap phan trong chuoi so 
        for(i=0;i<tmp.length;i++){
            if(tmp[i]==decimal_sep && decimal_sep != thousands_sep){
                count1++;
            }    
        }
        if(count1>1){
            //while(tmp.indexOf(decimal_sep) != -1){
            for(i=1;i<count1;i++){
                tmp = tmp.replace(decimal_sep,"");// chi thay the cho den dau phan ngan ap chot vi du 1.222.222.323 se thanh 1222222.323
            }
        }
    }
    return tmp;

}

function unformatNumber(str,grp_sep,dec_sep)
{
   // var grp_sep = String(document.getElementById('grp_seperator').value);
    //var dec_sep = String(document.getElementById('dec_seperator').value);
    
    str = String(str);
    
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    str = str.replace(grp_sep, '');
    
    str = str.replace(dec_sep, '.');
    
    num = Number(str);
    
    return num;
}

function formatNumber(str,sig_dig,dec_sep,grp_sep)
{
    //var sig_dig = Number(document.getElementById('significant_digits').value);
    //var grp_sep = String(document.getElementById('grp_seperator').value);
    //var dec_sep = String(document.getElementById('dec_seperator').value);
    
    num = Number(str);
    if(sig_dig == 2){
        str = formatCurrency(num);
    }
    else{
        str =    num.toFixed(sig_dig);
    }
    str = str.replace(/,/, '{,}').replace(/\./, '{.}');
    str = str.replace(/{,}/, grp_sep).replace(/{.}/, dec_sep);
    
    return str;
}




