/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("io-base", function (D) {
    var d = "io:start", P = "io:complete", B = "io:success", F = "io:failure", e = "io:end", X = 0, O = {"X-Requested-With":"XMLHttpRequest"}, Z = {}, K = D.config.win;

    function b(h, p, g) {
        var j, l, Y;
        p = p || {};
        l = W(p.xdr || p.form, g);
        Y = p.method ? p.method.toUpperCase() : "GET";
        if (p.form) {
            if (p.form.upload) {
                return D.io._upload(l, h, p);
            } else {
                j = D.io._serialize(p.form, p.data);
                if (Y === "POST") {
                    p.data = j;
                    V("Content-Type", "application/x-www-form-urlencoded");
                } else {
                    if (Y === "GET") {
                        h = Q(h, j);
                    }
                }
            }
        } else {
            if (p.data && Y === "GET") {
                h = Q(h, p.data);
            }
        }
        if (p.xdr) {
            if (p.xdr.use === "native" && window.XDomainRequest || p.xdr.use === "flash") {
                return D.io.xdr(h, l, p);
            }
            if (p.xdr.credentials) {
                l.c.withCredentials = true;
            }
        }
        l.c.onreadystatechange = function () {
            c(l, p);
        };
        try {
            l.c.open(Y, h, true);
        } catch (n) {
            if (p.xdr) {
                return A(l, h, p);
            }
        }
        if (p.data && Y === "POST") {
            V("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
        }
        C(l.c, p.headers || {});
        try {
            l.c.send(p.data || "");
        } catch (k) {
            if (p.xdr) {
                return A(l, h, p);
            }
        }
        S(l.id, p);
        if (p.timeout) {
            R(l, p.timeout);
        }
        return{id:l.id, abort:function () {
            return l.c ? N(l, "abort") : false;
        }, isInProgress:function () {
            return l.c ? l.c.readyState !== 4 && l.c.readyState !== 0 : false;
        }};
    }

    function U(f, g) {
        var Y = new D.EventTarget().publish("transaction:" + f);
        Y.subscribe(g.on[f], (g.context || D), g.arguments);
        return Y;
    }

    function S(g, f) {
        var Y;
        f.on = f.on || {};
        D.fire(d, g);
        if (f.on.start) {
            Y = U("start", f);
            Y.fire(g);
        }
    }

    function G(g, h) {
        var Y, f = g.status ? {status:0, statusText:g.status} : g.c;
        h.on = h.on || {};
        D.fire(P, g.id, f);
        if (h.on.complete) {
            Y = U("complete", h);
            Y.fire(g.id, f);
        }
    }

    function T(f, g) {
        var Y;
        g.on = g.on || {};
        D.fire(B, f.id, f.c);
        if (g.on.success) {
            Y = U("success", g);
            Y.fire(f.id, f.c);
        }
        J(f, g);
    }

    function I(g, h) {
        var Y, f = g.status ? {status:0, statusText:g.status} : g.c;
        h.on = h.on || {};
        D.fire(F, g.id, f);
        if (h.on.failure) {
            Y = U("failure", h);
            Y.fire(g.id, f);
        }
        J(g, h);
    }

    function J(f, g) {
        var Y;
        g.on = g.on || {};
        D.fire(e, f.id);
        if (g.on.end) {
            Y = U("end", g);
            Y.fire(f.id);
        }
        H(f, g.xdr ? true : false);
    }

    function N(f, Y) {
        if (f && f.c) {
            f.status = Y;
            f.c.abort();
        }
    }

    function A(f, Y, h) {
        var g = parseInt(f.id);
        H(f);
        h.xdr.use = "flash";
        return D.io(Y, h, g);
    }

    function E() {
        var Y = X;
        X++;
        return Y;
    }

    function W(g, Y) {
        var f = {};
        f.id = D.Lang.isNumber(Y) ? Y : E();
        g = g || {};
        if (!g.use && !g.upload) {
            f.c = L();
        } else {
            if (g.use) {
                if (g.use === "flash") {
                    f.c = D.io._transport[g.use];
                } else {
                    if (g.use === "native" && window.XDomainRequest) {
                        f.c = new XDomainRequest();
                    } else {
                        f.c = L();
                    }
                }
            } else {
                f.c = {};
            }
        }
        return f;
    }

    function L() {
        return K.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    }

    function Q(Y, f) {
        Y += ((Y.indexOf("?") == -1) ? "?" : "&") + f;
        return Y;
    }

    function V(Y, f) {
        if (f) {
            O[Y] = f;
        } else {
            delete O[Y];
        }
    }

    function C(g, Y) {
        var f;
        for (f in O) {
            if (O.hasOwnProperty(f)) {
                if (Y[f]) {
                    break;
                } else {
                    Y[f] = O[f];
                }
            }
        }
        for (f in Y) {
            if (Y.hasOwnProperty(f)) {
                g.setRequestHeader(f, Y[f]);
            }
        }
    }

    function R(f, Y) {
        Z[f.id] = K.setTimeout(function () {
            N(f, "timeout");
        }, Y);
    }

    function M(Y) {
        K.clearTimeout(Z[Y]);
        delete Z[Y];
    }

    function c(Y, f) {
        if (Y.c.readyState === 4) {
            if (f.timeout) {
                M(Y.id);
            }
            K.setTimeout(function () {
                G(Y, f);
                a(Y, f);
            }, 0);
        }
    }

    function a(g, h) {
        var Y;
        try {
            if (g.c.status && g.c.status !== 0) {
                Y = g.c.status;
            } else {
                Y = 0;
            }
        } catch (f) {
            Y = 0;
        }
        if (Y >= 200 && Y < 300 || Y === 1223) {
            T(g, h);
        } else {
            I(g, h);
        }
    }

    function H(Y, f) {
        if (K.XMLHttpRequest && !f) {
            if (Y.c) {
                Y.c.onreadystatechange = null;
            }
        }
        Y.c = null;
        Y = null;
    }

    b.start = S;
    b.complete = G;
    b.success = T;
    b.failure = I;
    b.end = J;
    b._id = E;
    b._timeout = Z;
    b.header = V;
    D.io = b;
    D.io.http = b;
}, "3.0.0", {requires:["event-custom-base"]});