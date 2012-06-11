$.fn.priceFormat = function (options) {
 
    var defaultOptions = {
        groupSeparator: ",",
        decimalSeparator: "."
    }
 
    // default options
    options = $.extend({}, defaultOptions, options);
 
    var formatValue = function (val) {
        if (isNaN(val)) return 0.00;
        val = Number(val).toFixed(2);
 
        var p = String(val).split(options.decimalSeparator);
 
        var intPart = "";
 
        for (var i = 3, t = p[0].length; i < t + 3; i+= 3) {
            intPart = p[0].slice(-3) + options.groupSeparator + intPart;        
            p[0] = p[0].substring(0, t-i);
            console.log(intPart);    
        }
 
        // remove extra comma,
        p[0] = intPart.substring(0, intPart.length-1);        
 
        return p.join(options.decimalSeparator);
    }
 
    this.each(function (i, e) {
        e = $(e);
        if ($.inArray(e.attr("tagName"), ["INPUT", "TEXTAREA"]) !== -1) {
           e.val(formatValue(e.val()));
        } else {
           e.text(formatValue(e.text()));
        }
    });
 
    return this;
}
 
$(".center").priceFormat();