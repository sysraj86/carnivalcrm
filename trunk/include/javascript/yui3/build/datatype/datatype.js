/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('datatype-number-parse', function (Y) {
    var LANG = Y.Lang;
    Y.mix(Y.namespace("DataType.Number"), {parse:function (data) {
        var number = (data === null) ? data : +data;
        if (LANG.isNumber(number)) {
            return number;
        }
        else {
            return null;
        }
    }});
    Y.namespace("Parsers").number = Y.DataType.Number.parse;
}, '3.0.0');
YUI.add('datatype-number-format', function (Y) {
    var LANG = Y.Lang;
    Y.mix(Y.namespace("DataType.Number"), {format:function (data, config) {
        if (LANG.isNumber(data)) {
            config = config || {};
            var isNeg = (data < 0), output = data + "", decPlaces = config.decimalPlaces, decSep = config.decimalSeparator || ".", thouSep = config.thousandsSeparator, decIndex, newOutput, count, i;
            if (LANG.isNumber(decPlaces) && (decPlaces >= 0) && (decPlaces <= 20)) {
                output = data.toFixed(decPlaces);
            }
            if (decSep !== ".") {
                output = output.replace(".", decSep);
            }
            if (thouSep) {
                decIndex = output.lastIndexOf(decSep);
                decIndex = (decIndex > -1) ? decIndex : output.length;
                newOutput = output.substring(decIndex);
                for (count = 0, i = decIndex; i > 0; i--) {
                    if ((count % 3 === 0) && (i !== decIndex) && (!isNeg || (i > 1))) {
                        newOutput = thouSep + newOutput;
                    }
                    newOutput = output.charAt(i - 1) + newOutput;
                    count++;
                }
                output = newOutput;
            }
            output = (config.prefix) ? config.prefix + output : output;
            output = (config.suffix) ? output + config.suffix : output;
            return output;
        }
        else {
            return(LANG.isValue(data) && data.toString) ? data.toString() : "";
        }
    }});
}, '3.0.0');
YUI.add('datatype-number', function (Y) {
}, '3.0.0', {use:['datatype-number-parse', 'datatype-number-format']});
YUI.add('datatype-date-parse', function (Y) {
    var LANG = Y.Lang;
    Y.mix(Y.namespace("DataType.Date"), {parse:function (data) {
        var date = null;
        if (!(LANG.isDate(data))) {
            date = new Date(data);
        }
        else {
            return date;
        }
        if (LANG.isDate(date) && (date != "Invalid Date") && !isNaN(date)) {
            return date;
        }
        else {
            return null;
        }
    }});
    Y.namespace("Parsers").date = Y.DataType.Date.parse;
}, '3.0.0');
YUI.add('datatype-date-format', function (Y) {
    var xPad = function (x, pad, r) {
        if (typeof r === "undefined") {
            r = 10;
        }
        pad = pad.toString();
        for (; parseInt(x, 10) < r && r > 1; r /= 10) {
            x = pad + x;
        }
        return x.toString();
    };
    Y.config.dateFormat = Y.config.dateFormat || "%Y-%m-%d";
    Y.config.locale = Y.config.locale || "en";
    var Dt = {formats:{a:function (d, l) {
        return l.a[d.getDay()];
    }, A:function (d, l) {
        return l.A[d.getDay()];
    }, b:function (d, l) {
        return l.b[d.getMonth()];
    }, B:function (d, l) {
        return l.B[d.getMonth()];
    }, C:function (d) {
        return xPad(parseInt(d.getFullYear() / 100, 10), 0);
    }, d:["getDate", "0"], e:["getDate", " "], g:function (d) {
        return xPad(parseInt(Dt.formats.G(d) % 100, 10), 0);
    }, G:function (d) {
        var y = d.getFullYear();
        var V = parseInt(Dt.formats.V(d), 10);
        var W = parseInt(Dt.formats.W(d), 10);
        if (W > V) {
            y++;
        } else if (W === 0 && V >= 52) {
            y--;
        }
        return y;
    }, H:["getHours", "0"], I:function (d) {
        var I = d.getHours() % 12;
        return xPad(I === 0 ? 12 : I, 0);
    }, j:function (d) {
        var gmd_1 = new Date("" + d.getFullYear() + "/1/1 GMT");
        var gmdate = new Date("" + d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate() + " GMT");
        var ms = gmdate - gmd_1;
        var doy = parseInt(ms / 60000 / 60 / 24, 10) + 1;
        return xPad(doy, 0, 100);
    }, k:["getHours", " "], l:function (d) {
        var I = d.getHours() % 12;
        return xPad(I === 0 ? 12 : I, " ");
    }, m:function (d) {
        return xPad(d.getMonth() + 1, 0);
    }, M:["getMinutes", "0"], p:function (d, l) {
        return l.p[d.getHours() >= 12 ? 1 : 0];
    }, P:function (d, l) {
        return l.P[d.getHours() >= 12 ? 1 : 0];
    }, s:function (d, l) {
        return parseInt(d.getTime() / 1000, 10);
    }, S:["getSeconds", "0"], u:function (d) {
        var dow = d.getDay();
        return dow === 0 ? 7 : dow;
    }, U:function (d) {
        var doy = parseInt(Dt.formats.j(d), 10);
        var rdow = 6 - d.getDay();
        var woy = parseInt((doy + rdow) / 7, 10);
        return xPad(woy, 0);
    }, V:function (d) {
        var woy = parseInt(Dt.formats.W(d), 10);
        var dow1_1 = (new Date("" + d.getFullYear() + "/1/1")).getDay();
        var idow = woy + (dow1_1 > 4 || dow1_1 <= 1 ? 0 : 1);
        if (idow === 53 && (new Date("" + d.getFullYear() + "/12/31")).getDay() < 4) {
            idow = 1;
        }
        else if (idow === 0) {
            idow = Dt.formats.V(new Date("" + (d.getFullYear() - 1) + "/12/31"));
        }
        return xPad(idow, 0);
    }, w:"getDay", W:function (d) {
        var doy = parseInt(Dt.formats.j(d), 10);
        var rdow = 7 - Dt.formats.u(d);
        var woy = parseInt((doy + rdow) / 7, 10);
        return xPad(woy, 0, 10);
    }, y:function (d) {
        return xPad(d.getFullYear() % 100, 0);
    }, Y:"getFullYear", z:function (d) {
        var o = d.getTimezoneOffset();
        var H = xPad(parseInt(Math.abs(o / 60), 10), 0);
        var M = xPad(Math.abs(o % 60), 0);
        return(o > 0 ? "-" : "+") + H + M;
    }, Z:function (d) {
        var tz = d.toString().replace(/^.*:\d\d( GMT[+-]\d+)? \(?([A-Za-z ]+)\)?\d*$/, "$2").replace(/[a-z ]/g, "");
        if (tz.length > 4) {
            tz = Dt.formats.z(d);
        }
        return tz;
    }, "%":function (d) {
        return"%";
    }}, aggregates:{c:"locale", D:"%m/%d/%y", F:"%Y-%m-%d", h:"%b", n:"\n", r:"locale", R:"%H:%M", t:"\t", T:"%H:%M:%S", x:"locale", X:"locale"}, format:function (oDate, oConfig) {
        oConfig = oConfig || {};
        if (!Y.Lang.isDate(oDate)) {
            return Y.Lang.isValue(oDate) ? oDate : "";
        }
        var format = oConfig.format || Y.config.dateFormat, sLocale = oConfig.locale || Y.config.locale, LOCALE = Y.DataType.Date.Locale;
        sLocale = sLocale.replace(/_/g, "-");
        if (!LOCALE[sLocale]) {
            var tmpLocale = sLocale.replace(/-[a-zA-Z]+$/, "");
            if (tmpLocale in LOCALE) {
                sLocale = tmpLocale;
            } else if (Y.config.locale in LOCALE) {
                sLocale = Y.config.locale;
            } else {
                sLocale = "en";
            }
        }
        var aLocale = LOCALE[sLocale];
        var replace_aggs = function (m0, m1) {
            var f = Dt.aggregates[m1];
            return(f === "locale" ? aLocale[m1] : f);
        };
        var replace_formats = function (m0, m1) {
            var f = Dt.formats[m1];
            switch (Y.Lang.type(f)) {
                case"string":
                    return oDate[f]();
                case"function":
                    return f.call(oDate, oDate, aLocale);
                case"array":
                    if (Y.Lang.type(f[0]) === "string") {
                        return xPad(oDate[f[0]](), f[1]);
                    }
                default:
                    return m1;
            }
        };
        while (format.match(/%[cDFhnrRtTxX]/)) {
            format = format.replace(/%([cDFhnrRtTxX])/g, replace_aggs);
        }
        var str = format.replace(/%([aAbBCdegGHIjklmMpPsSuUVwWyYzZ%])/g, replace_formats);
        replace_aggs = replace_formats = undefined;
        return str;
    }};
    Y.mix(Y.namespace("DataType.Date"), Dt);
    var YDateEn = {a:["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], A:["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], b:["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], B:["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], c:"%a %d %b %Y %T %Z", p:["AM", "PM"], P:["am", "pm"], r:"%I:%M:%S %p", x:"%d/%m/%y", X:"%T"};
    Y.namespace("DataType.Date.Locale");
    Y.DataType.Date.Locale["en"] = YDateEn;
    Y.DataType.Date.Locale["en-US"] = Y.merge(YDateEn, {c:"%a %d %b %Y %I:%M:%S %p %Z", x:"%m/%d/%Y", X:"%I:%M:%S %p"});
    Y.DataType.Date.Locale["en-GB"] = Y.merge(YDateEn, {r:"%l:%M:%S %P %Z"});
    Y.DataType.Date.Locale["en-AU"] = Y.merge(YDateEn);
}, '3.0.0');
YUI.add('datatype-date', function (Y) {
}, '3.0.0', {use:['datatype-date-parse', 'datatype-date-format']});
YUI.add('datatype-xml-parse', function (Y) {
    var LANG = Y.Lang;
    Y.mix(Y.namespace("DataType.XML"), {parse:function (data) {
        var xmlDoc = null;
        if (LANG.isString(data)) {
            try {
                if (!LANG.isUndefined(DOMParser)) {
                    xmlDoc = new DOMParser().parseFromString(data, "text/xml");
                }
            }
            catch (e) {
                try {
                    if (!LANG.isUndefined(ActiveXObject)) {
                        xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
                        xmlDoc.async = false;
                        xmlDoc.loadXML(data);
                    }
                }
                catch (ee) {
                }
            }
        }
        if ((LANG.isNull(xmlDoc)) || (LANG.isNull(xmlDoc.documentElement)) || (xmlDoc.documentElement.nodeName === "parsererror")) {
        }
        return xmlDoc;
    }});
    Y.namespace("Parsers").xml = Y.DataType.XML.parse;
}, '3.0.0');
YUI.add('datatype-xml-format', function (Y) {
    var LANG = Y.Lang;
    Y.mix(Y.namespace("DataType.XML"), {format:function (data) {
        try {
            if (!LANG.isUndefined(XMLSerializer)) {
                return(new XMLSerializer()).serializeToString(data);
            }
        }
        catch (e) {
            if (data && data.xml) {
                return data.xml;
            }
            else {
                return(LANG.isValue(data) && data.toString) ? data.toString() : "";
            }
        }
    }});
}, '3.0.0');
YUI.add('datatype-xml', function (Y) {
}, '3.0.0', {use:['datatype-xml-parse', 'datatype-xml-format']});
YUI.add('datatype', function (Y) {
}, '3.0.0', {use:['datatype-number', 'datatype-date', 'datatype-xml']});