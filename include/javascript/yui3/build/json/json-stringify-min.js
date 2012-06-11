/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("json-stringify", function (C) {
    var b = C.config.win.JSON, E = C.Lang, A = E.isFunction, L = E.isObject, N = E.isArray, X = Object.prototype.toString, W = (X.call(b) === "[object JSON]" && b), h = "undefined", O = "object", e = "null", R = "string", U = "number", Q = "boolean", D = "date", H = {"undefined":h, "string":R, "[object String]":R, "number":U, "[object Number]":U, "boolean":Q, "[object Boolean]":Q, "[object Date]":D, "[object RegExp]":O}, i = "", g = "{", G = "}", F = "[", V = "]", T = ",", K = ",\n", B = "\n", I = ":", f = ": ", M = '"', Z = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, a = {"\b":"\\b", "\t":"\\t", "\n":"\\n", "\f":"\\f", "\r":"\\r", '"':'\\"', "\\":"\\\\"};

    function c(j) {
        var Y = typeof j;
        return H[Y] || H[X.call(j)] || (Y === O ? (j ? O : e) : h);
    }

    function P(Y) {
        if (!a[Y]) {
            a[Y] = "\\u" + ("0000" + (+(Y.charCodeAt(0))).toString(16)).slice(-4);
        }
        return a[Y];
    }

    function J(Y) {
        return M + Y.replace(Z, P) + M;
    }

    function d(Y, j) {
        return Y.replace(/^/gm, j);
    }

    function S(j, s, Y) {
        if (j === undefined) {
            return undefined;
        }
        var l = A(s) ? s : null, r = X.call(Y).match(/String|Number/) || [], t = C.JSON.dateToString, q = [], n, m, p;
        if (l || !N(s)) {
            s = undefined;
        }
        if (s) {
            n = {};
            for (m = 0, p = s.length; m < p; ++m) {
                n[s[m]] = true;
            }
            s = n;
        }
        Y = r[0] === "Number" ? new Array(Math.min(Math.max(0, Y), 10) + 1).join(" ") : (Y || i).slice(0, 10);
        function k(w, AC) {
            var AA = w[AC], AE = c(AA), z = [], y = Y ? f : I, x, u, AD, o, AB;
            if (L(AA) && A(AA.toJSON)) {
                AA = AA.toJSON(AC);
            } else {
                if (AE === D) {
                    AA = t(AA);
                }
            }
            if (A(l)) {
                AA = l.call(w, AC, AA);
            }
            if (AA !== w[AC]) {
                AE = c(AA);
            }
            switch (AE) {
                case D:
                case O:
                    break;
                case R:
                    return J(AA);
                case U:
                    return isFinite(AA) ? AA + i : e;
                case Q:
                    return AA + i;
                case e:
                    return e;
                default:
                    return undefined;
            }
            for (u = q.length - 1; u >= 0; --u) {
                if (q[u] === AA) {
                    throw new Error("JSON.stringify. Cyclical reference");
                }
            }
            x = N(AA);
            q.push(AA);
            if (x) {
                for (u = AA.length - 1; u >= 0; --u) {
                    z[u] = k(AA, u) || e;
                }
            } else {
                AD = s || AA;
                u = 0;
                for (o in AD) {
                    if (AD.hasOwnProperty(o)) {
                        AB = k(AA, o);
                        if (AB) {
                            z[u++] = J(o) + y + AB;
                        }
                    }
                }
            }
            q.pop();
            if (Y && z.length) {
                return x ? F + B + d(z.join(K), Y) + B + V : g + B + d(z.join(K), Y) + B + G;
            } else {
                return x ? F + z.join(T) + V : g + z.join(T) + G;
            }
        }

        return k({"":j}, "");
    }

    C.mix(C.namespace("JSON"), {useNativeStringify:!!W, dateToString:function (j) {
        function Y(k) {
            return k < 10 ? "0" + k : k;
        }

        return j.getUTCFullYear() + "-" + Y(j.getUTCMonth() + 1) + "-" + Y(j.getUTCDate()) + "T" + Y(j.getUTCHours()) + I + Y(j.getUTCMinutes()) + I + Y(j.getUTCSeconds()) + "Z";
    }, stringify:function (k, Y, j) {
        return W && C.JSON.useNativeStringify ? W.stringify(k, Y, j) : S(k, Y, j);
    }});
}, "3.0.0");