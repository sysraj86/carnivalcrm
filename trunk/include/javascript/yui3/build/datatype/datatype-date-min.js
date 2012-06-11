/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("datatype-date-parse", function (B) {
    var A = B.Lang;
    B.mix(B.namespace("DataType.Date"), {parse:function (D) {
        var C = null;
        if (!(A.isDate(D))) {
            C = new Date(D);
        } else {
            return C;
        }
        if (A.isDate(C) && (C != "Invalid Date") && !isNaN(C)) {
            return C;
        } else {
            return null;
        }
    }});
    B.namespace("Parsers").date = B.DataType.Date.parse;
}, "3.0.0");
YUI.add("datatype-date-format", function (D) {
    var A = function (E, G, F) {
        if (typeof F === "undefined") {
            F = 10;
        }
        G = G.toString();
        for (; parseInt(E, 10) < F && F > 1; F /= 10) {
            E = G + E;
        }
        return E.toString();
    };
    D.config.dateFormat = D.config.dateFormat || "%Y-%m-%d";
    D.config.locale = D.config.locale || "en";
    var C = {formats:{a:function (F, E) {
        return E.a[F.getDay()];
    }, A:function (F, E) {
        return E.A[F.getDay()];
    }, b:function (F, E) {
        return E.b[F.getMonth()];
    }, B:function (F, E) {
        return E.B[F.getMonth()];
    }, C:function (E) {
        return A(parseInt(E.getFullYear() / 100, 10), 0);
    }, d:["getDate", "0"], e:["getDate", " "], g:function (E) {
        return A(parseInt(C.formats.G(E) % 100, 10), 0);
    }, G:function (G) {
        var H = G.getFullYear();
        var F = parseInt(C.formats.V(G), 10);
        var E = parseInt(C.formats.W(G), 10);
        if (E > F) {
            H++;
        } else {
            if (E === 0 && F >= 52) {
                H--;
            }
        }
        return H;
    }, H:["getHours", "0"], I:function (F) {
        var E = F.getHours() % 12;
        return A(E === 0 ? 12 : E, 0);
    }, j:function (I) {
        var H = new Date("" + I.getFullYear() + "/1/1 GMT");
        var F = new Date("" + I.getFullYear() + "/" + (I.getMonth() + 1) + "/" + I.getDate() + " GMT");
        var E = F - H;
        var G = parseInt(E / 60000 / 60 / 24, 10) + 1;
        return A(G, 0, 100);
    }, k:["getHours", " "], l:function (F) {
        var E = F.getHours() % 12;
        return A(E === 0 ? 12 : E, " ");
    }, m:function (E) {
        return A(E.getMonth() + 1, 0);
    }, M:["getMinutes", "0"], p:function (F, E) {
        return E.p[F.getHours() >= 12 ? 1 : 0];
    }, P:function (F, E) {
        return E.P[F.getHours() >= 12 ? 1 : 0];
    }, s:function (F, E) {
        return parseInt(F.getTime() / 1000, 10);
    }, S:["getSeconds", "0"], u:function (E) {
        var F = E.getDay();
        return F === 0 ? 7 : F;
    }, U:function (H) {
        var E = parseInt(C.formats.j(H), 10);
        var G = 6 - H.getDay();
        var F = parseInt((E + G) / 7, 10);
        return A(F, 0);
    }, V:function (H) {
        var G = parseInt(C.formats.W(H), 10);
        var E = (new Date("" + H.getFullYear() + "/1/1")).getDay();
        var F = G + (E > 4 || E <= 1 ? 0 : 1);
        if (F === 53 && (new Date("" + H.getFullYear() + "/12/31")).getDay() < 4) {
            F = 1;
        } else {
            if (F === 0) {
                F = C.formats.V(new Date("" + (H.getFullYear() - 1) + "/12/31"));
            }
        }
        return A(F, 0);
    }, w:"getDay", W:function (H) {
        var E = parseInt(C.formats.j(H), 10);
        var G = 7 - C.formats.u(H);
        var F = parseInt((E + G) / 7, 10);
        return A(F, 0, 10);
    }, y:function (E) {
        return A(E.getFullYear() % 100, 0);
    }, Y:"getFullYear", z:function (G) {
        var F = G.getTimezoneOffset();
        var E = A(parseInt(Math.abs(F / 60), 10), 0);
        var I = A(Math.abs(F % 60), 0);
        return(F > 0 ? "-" : "+") + E + I;
    }, Z:function (E) {
        var F = E.toString().replace(/^.*:\d\d( GMT[+-]\d+)? \(?([A-Za-z ]+)\)?\d*$/, "$2").replace(/[a-z ]/g, "");
        if (F.length > 4) {
            F = C.formats.z(E);
        }
        return F;
    }, "%":function (E) {
        return"%";
    }}, aggregates:{c:"locale", D:"%m/%d/%y", F:"%Y-%m-%d", h:"%b", n:"\n", r:"locale", R:"%H:%M", t:"\t", T:"%H:%M:%S", x:"locale", X:"locale"}, format:function (N, H) {
        H = H || {};
        if (!D.Lang.isDate(N)) {
            return D.Lang.isValue(N) ? N : "";
        }
        var M = H.format || D.config.dateFormat, F = H.locale || D.config.locale, L = D.DataType.Date.Locale;
        F = F.replace(/_/g, "-");
        if (!L[F]) {
            var G = F.replace(/-[a-zA-Z]+$/, "");
            if (G in L) {
                F = G;
            } else {
                if (D.config.locale in L) {
                    F = D.config.locale;
                } else {
                    F = "en";
                }
            }
        }
        var J = L[F];
        var I = function (P, O) {
            var Q = C.aggregates[O];
            return(Q === "locale" ? J[O] : Q);
        };
        var E = function (P, O) {
            var Q = C.formats[O];
            switch (D.Lang.type(Q)) {
                case"string":
                    return N[Q]();
                case"function":
                    return Q.call(N, N, J);
                case"array":
                    if (D.Lang.type(Q[0]) === "string") {
                        return A(N[Q[0]](), Q[1]);
                    }
                default:
                    return O;
            }
        };
        while (M.match(/%[cDFhnrRtTxX]/)) {
            M = M.replace(/%([cDFhnrRtTxX])/g, I);
        }
        var K = M.replace(/%([aAbBCdegGHIjklmMpPsSuUVwWyYzZ%])/g, E);
        I = E = undefined;
        return K;
    }};
    D.mix(D.namespace("DataType.Date"), C);
    var B = {a:["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"], A:["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"], b:["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], B:["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"], c:"%a %d %b %Y %T %Z", p:["AM", "PM"], P:["am", "pm"], r:"%I:%M:%S %p", x:"%d/%m/%y", X:"%T"};
    D.namespace("DataType.Date.Locale");
    D.DataType.Date.Locale["en"] = B;
    D.DataType.Date.Locale["en-US"] = D.merge(B, {c:"%a %d %b %Y %I:%M:%S %p %Z", x:"%m/%d/%Y", X:"%I:%M:%S %p"});
    D.DataType.Date.Locale["en-GB"] = D.merge(B, {r:"%l:%M:%S %P %Z"});
    D.DataType.Date.Locale["en-AU"] = D.merge(B);
}, "3.0.0");
YUI.add("datatype-date", function (A) {
}, "3.0.0", {use:["datatype-date-parse", "datatype-date-format"]});