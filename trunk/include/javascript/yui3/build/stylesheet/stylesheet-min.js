/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("stylesheet", function (B) {
    var J = B.config.doc, C = J.createElement("p"), F = C.style, D = B.Lang.isString, M = {}, I = {}, K = ("cssFloat"in F) ? "cssFloat" : "styleFloat", G, A, L, N = "opacity", O = "float", E = "";
    A = (N in F) ? function (P) {
        P.opacity = E;
    } : function (P) {
        P.filter = E;
    };
    F.border = "1px solid red";
    F.border = E;
    L = F.borderLeft ? function (P, R) {
        var Q;
        if (R !== K && R.toLowerCase().indexOf(O) != -1) {
            R = K;
        }
        if (D(P[R])) {
            switch (R) {
                case N:
                case"filter":
                    A(P);
                    break;
                case"font":
                    P.font = P.fontStyle = P.fontVariant = P.fontWeight = P.fontSize = P.lineHeight = P.fontFamily = E;
                    break;
                default:
                    for (Q in P) {
                        if (Q.indexOf(R) === 0) {
                            P[Q] = E;
                        }
                    }
            }
        }
    } : function (P, Q) {
        if (Q !== K && Q.toLowerCase().indexOf(O) != -1) {
            Q = K;
        }
        if (D(P[Q])) {
            if (Q === N) {
                A(P);
            } else {
                P[Q] = E;
            }
        }
    };
    function H(W, R) {
        var Z, U, Y, X = {}, Q, a, T, V, P, S;
        if (!(this instanceof H)) {
            return new H(W, R);
        }
        if (W) {
            if (B.Node && W instanceof B.Node) {
                U = B.Node.getDOMNode(W);
            } else {
                if (W.nodeName) {
                    U = W;
                } else {
                    if (D(W)) {
                        if (W && I[W]) {
                            return I[W];
                        }
                        U = J.getElementById(W.replace(/^#/, E));
                    }
                }
            }
            if (U && I[B.stamp(U)]) {
                return I[B.stamp(U)];
            }
        }
        if (!U || !/^(?:style|link)$/i.test(U.nodeName)) {
            U = J.createElement("style");
            U.type = "text/css";
        }
        if (D(W)) {
            if (W.indexOf("{") != -1) {
                if (U.styleSheet) {
                    U.styleSheet.cssText = W;
                } else {
                    U.appendChild(J.createTextNode(W));
                }
            } else {
                if (!R) {
                    R = W;
                }
            }
        }
        if (!U.parentNode || U.parentNode.nodeName.toLowerCase() !== "head") {
            Z = (U.ownerDocument || J).getElementsByTagName("head")[0];
            Z.appendChild(U);
        }
        Y = U.sheet || U.styleSheet;
        Q = Y && ("cssRules"in Y) ? "cssRules" : "rules";
        T = ("deleteRule"in Y) ? function (b) {
            Y.deleteRule(b);
        } : function (b) {
            Y.removeRule(b);
        };
        a = ("insertRule"in Y) ? function (d, c, b) {
            Y.insertRule(d + " {" + c + "}", b);
        } : function (d, c, b) {
            Y.addRule(d, c, b);
        };
        for (V = Y[Q].length - 1; V >= 0; --V) {
            P = Y[Q][V];
            S = P.selectorText;
            if (X[S]) {
                X[S].style.cssText += ";" + P.style.cssText;
                T(V);
            } else {
                X[S] = P;
            }
        }
        H.register(B.stamp(U), this);
        if (R) {
            H.register(R, this);
        }
        B.mix(this, {getId:function () {
            return B.stamp(U);
        }, enable:function () {
            Y.disabled = false;
            return this;
        }, disable:function () {
            Y.disabled = true;
            return this;
        }, isEnabled:function () {
            return!Y.disabled;
        }, set:function (e, d) {
            var g = X[e], f = e.split(/\s*,\s*/), c, b;
            if (f.length > 1) {
                for (c = f.length - 1; c >= 0; --c) {
                    this.set(f[c], d);
                }
                return this;
            }
            if (!H.isValidSelector(e)) {
                return this;
            }
            if (g) {
                g.style.cssText = H.toCssText(d, g.style.cssText);
            } else {
                b = Y[Q].length;
                d = H.toCssText(d);
                if (d) {
                    a(e, d, b);
                    X[e] = Y[Q][b];
                }
            }
            return this;
        }, unset:function (e, d) {
            var g = X[e], f = e.split(/\s*,\s*/), b = !d, h, c;
            if (f.length > 1) {
                for (c = f.length - 1; c >= 0; --c) {
                    this.unset(f[c], d);
                }
                return this;
            }
            if (g) {
                if (!b) {
                    d = B.Array(d);
                    F.cssText = g.style.cssText;
                    for (c = d.length - 1; c >= 0; --c) {
                        L(F, d[c]);
                    }
                    if (F.cssText) {
                        g.style.cssText = F.cssText;
                    } else {
                        b = true;
                    }
                }
                if (b) {
                    h = Y[Q];
                    for (c = h.length - 1; c >= 0; --c) {
                        if (h[c] === g) {
                            delete X[e];
                            T(c);
                            break;
                        }
                    }
                }
            }
            return this;
        }, getCssText:function (c) {
            var d, b;
            if (D(c)) {
                d = X[c.split(/\s*,\s*/)[0]];
                return d ? d.style.cssText : null;
            } else {
                b = [];
                for (c in X) {
                    if (X.hasOwnProperty(c)) {
                        d = X[c];
                        b.push(d.selectorText + " {" + d.style.cssText + "}");
                    }
                }
                return b.join("\n");
            }
        }});
    }

    G = function (Q, S) {
        var R = Q.styleFloat || Q.cssFloat || Q[O], P = B.Lang.trim, U;
        F.cssText = S || E;
        if (R && !Q[K]) {
            Q = B.merge(Q);
            delete Q.styleFloat;
            delete Q.cssFloat;
            delete Q[O];
            Q[K] = R;
        }
        for (U in Q) {
            if (Q.hasOwnProperty(U)) {
                try {
                    F[U] = P(Q[U]);
                } catch (T) {
                }
            }
        }
        return F.cssText;
    };
    B.mix(H, {toCssText:((N in F) ? G : function (P, Q) {
        if (N in P) {
            P = B.merge(P, {filter:"alpha(opacity=" + (P.opacity * 100) + ")"});
            delete P.opacity;
        }
        return G(P, Q);
    }), register:function (P, Q) {
        return!!(P && Q instanceof H && !I[P] && (I[P] = Q));
    }, isValidSelector:function (Q) {
        var P = false;
        if (Q && D(Q)) {
            if (!M.hasOwnProperty(Q)) {
                M[Q] = !/\S/.test(Q.replace(/\s+|\s*[+~>]\s*/g, " ").replace(/([^ ])\[.*?\]/g, "$1").replace(/([^ ])::?[a-z][a-z\-]+[a-z](?:\(.*?\))?/ig, "$1").replace(/(?:^| )[a-z0-6]+/ig, " ").replace(/\\./g, E).replace(/[.#]\w[\w\-]*/g, E));
            }
            P = M[Q];
        }
        return P;
    }}, true);
    B.StyleSheet = H;
}, "3.0.0");