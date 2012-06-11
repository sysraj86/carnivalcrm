/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("dom-base", function (D) {
    (function (H) {
        var R = "nodeType", F = "ownerDocument", E = "defaultView", J = "parentWindow", M = "tagName", O = "parentNode", Q = "firstChild", L = "previousSibling", P = "nextSibling", K = "contains", G = "compareDocumentPosition", N = document.documentElement, I = /<([a-z]+)/i;
        H.DOM = {byId:function (T, S) {
            S = S || H.config.doc;
            return S.getElementById(T);
        }, children:function (U, S) {
            var T = [];
            if (U) {
                S = S || "*";
                T = H.Selector.query("> " + S, U);
            }
            return T;
        }, firstByTag:function (S, T) {
            var U;
            T = T || H.config.doc;
            if (S && T.getElementsByTagName) {
                U = T.getElementsByTagName(S)[0];
            }
            return U || null;
        }, getText:(N.textContent !== undefined) ? function (T) {
            var S = "";
            if (T) {
                S = T.textContent;
            }
            return S || "";
        } : function (T) {
            var S = "";
            if (T) {
                S = T.innerText;
            }
            return S || "";
        }, setText:(N.textContent !== undefined) ? function (S, T) {
            if (S) {
                S.textContent = T;
            }
        } : function (S, T) {
            if (S) {
                S.innerText = T;
            }
        }, previous:function (S, U, T) {
            return H.DOM.elementByAxis(S, L, U, T);
        }, next:function (S, U, T) {
            return H.DOM.elementByAxis(S, P, U, T);
        }, ancestor:function (S, U, T) {
            return H.DOM.elementByAxis(S, O, U, T);
        }, elementByAxis:function (S, V, U, T) {
            while (S && (S = S[V])) {
                if ((T || S[M]) && (!U || U(S))) {
                    return S;
                }
            }
            return null;
        }, contains:function (T, U) {
            var S = false;
            if (!U || !T || !U[R] || !T[R]) {
                S = false;
            } else {
                if (T[K]) {
                    if (H.UA.opera || U[R] === 1) {
                        S = T[K](U);
                    } else {
                        S = H.DOM._bruteContains(T, U);
                    }
                } else {
                    if (T[G]) {
                        if (T === U || !!(T[G](U) & 16)) {
                            S = true;
                        }
                    }
                }
            }
            return S;
        }, inDoc:function (S, T) {
            T = T || S[F];
            var U = S.id;
            if (!U) {
                U = S.id = H.guid();
            }
            return!!(T.getElementById(U));
        }, create:function (X, Z) {
            if (typeof X === "string") {
                X = H.Lang.trim(X);
            }
            if (!Z && H.DOM._cloneCache[X]) {
                return H.DOM._cloneCache[X].cloneNode(true);
            }
            Z = Z || H.config.doc;
            var T = I.exec(X), W = H.DOM._create, Y = H.DOM.creators, V = null, S, U;
            if (T && Y[T[1]]) {
                if (typeof Y[T[1]] === "function") {
                    W = Y[T[1]];
                } else {
                    S = Y[T[1]];
                }
            }
            U = W(X, Z, S).childNodes;
            if (U.length === 1) {
                V = U[0].parentNode.removeChild(U[0]);
            } else {
                V = H.DOM._nl2frag(U, Z);
            }
            if (V) {
                H.DOM._cloneCache[X] = V.cloneNode(true);
            }
            return V;
        }, _nl2frag:function (T, W) {
            var U = null, V, S;
            if (T && (T.push || T.item) && T[0]) {
                W = W || T[0].ownerDocument;
                U = W.createDocumentFragment();
                if (T.item) {
                    T = H.Array(T, 0, true);
                }
                for (V = 0, S = T.length; V < S; V++) {
                    U.appendChild(T[V]);
                }
            }
            return U;
        }, CUSTOM_ATTRIBUTES:(!N.hasAttribute) ? {"for":"htmlFor", "class":"className"} : {"htmlFor":"for", "className":"class"}, setAttribute:function (U, S, V, T) {
            if (U && U.setAttribute) {
                S = H.DOM.CUSTOM_ATTRIBUTES[S] || S;
                U.setAttribute(S, V, T);
            }
        }, getAttribute:function (V, S, U) {
            U = (U !== undefined) ? U : 2;
            var T = "";
            if (V && V.getAttribute) {
                S = H.DOM.CUSTOM_ATTRIBUTES[S] || S;
                T = V.getAttribute(S, U);
                if (T === null) {
                    T = "";
                }
            }
            return T;
        }, isWindow:function (S) {
            return S.alert && S.document;
        }, _fragClones:{div:document.createElement("div")}, _create:function (T, U, S) {
            S = S || "div";
            var V = H.DOM._fragClones[S];
            if (V) {
                V = V.cloneNode(false);
            } else {
                V = H.DOM._fragClones[S] = U.createElement(S);
            }
            V.innerHTML = T;
            return V;
        }, _removeChildNodes:function (S) {
            while (S.firstChild) {
                S.removeChild(S.firstChild);
            }
        }, _cloneCache:{}, addHTML:function (W, V, T) {
            if (typeof V === "string") {
                V = H.Lang.trim(V);
            }
            var U = H.DOM._cloneCache[V], S = W.parentNode;
            if (U) {
                U = U.cloneNode(true);
            } else {
                if (V.nodeType) {
                    U = V;
                } else {
                    U = H.DOM.create(V);
                }
            }
            if (T) {
                if (T.nodeType) {
                    T.parentNode.insertBefore(U, T);
                } else {
                    switch (T) {
                        case"replace":
                            while (W.firstChild) {
                                W.removeChild(W.firstChild);
                            }
                            W.appendChild(U);
                            break;
                        case"before":
                            S.insertBefore(U, W);
                            break;
                        case"after":
                            if (W.nextSibling) {
                                S.insertBefore(U, W.nextSibling);
                            } else {
                                S.appendChild(U);
                            }
                            break;
                        default:
                            W.appendChild(U);
                    }
                }
            } else {
                W.appendChild(U);
            }
            return U;
        }, VALUE_SETTERS:{}, VALUE_GETTERS:{}, getValue:function (U) {
            var T = "", S;
            if (U && U[M]) {
                S = H.DOM.VALUE_GETTERS[U[M].toLowerCase()];
                if (S) {
                    T = S(U);
                } else {
                    T = U.value;
                }
            }
            return(typeof T === "string") ? T : "";
        }, setValue:function (S, T) {
            var U;
            if (S && S[M]) {
                U = H.DOM.VALUE_SETTERS[S[M].toLowerCase()];
                if (U) {
                    U(S, T);
                } else {
                    S.value = T;
                }
            }
        }, _bruteContains:function (S, T) {
            while (T) {
                if (S === T) {
                    return true;
                }
                T = T.parentNode;
            }
            return false;
        }, _getRegExp:function (T, S) {
            S = S || "";
            H.DOM._regexCache = H.DOM._regexCache || {};
            if (!H.DOM._regexCache[T + S]) {
                H.DOM._regexCache[T + S] = new RegExp(T, S);
            }
            return H.DOM._regexCache[T + S];
        }, _getDoc:function (S) {
            S = S || {};
            return(S[R] === 9) ? S : S[F] || S.document || H.config.doc;
        }, _getWin:function (S) {
            var T = H.DOM._getDoc(S);
            return T[E] || T[J] || H.config.win;
        }, _batch:function (V, Z, Y, U, T, X) {
            Z = (typeof name === "string") ? H.DOM[Z] : Z;
            var S, W = [];
            if (Z && V) {
                H.each(V, function (a) {
                    if ((S = Z.call(H.DOM, a, Y, U, T, X)) !== undefined) {
                        W[W.length] = S;
                    }
                });
            }
            return W.length ? W : V;
        }, _testElement:function (T, S, U) {
            S = (S && S !== "*") ? S.toUpperCase() : null;
            return(T && T[M] && (!S || T[M].toUpperCase() === S) && (!U || U(T)));
        }, creators:{}, _IESimpleCreate:function (S, T) {
            T = T || H.config.doc;
            return T.createElement(S);
        }};
        (function (W) {
            var X = W.DOM.creators, S = W.DOM.create, V = /(?:\/(?:thead|tfoot|tbody|caption|col|colgroup)>)+\s*<tbody/, U = "<table>", T = "</table>";
            if (W.UA.ie) {
                W.mix(X, {tbody:function (Z, a) {
                    var b = S(U + Z + T, a), Y = b.children.tags("tbody")[0];
                    if (b.children.length > 1 && Y && !V.test(Z)) {
                        Y[O].removeChild(Y);
                    }
                    return b;
                }, script:function (Y, Z) {
                    var a = Z.createElement("div");
                    a.innerHTML = "-" + Y;
                    a.removeChild(a[Q]);
                    return a;
                }}, true);
                W.mix(W.DOM.VALUE_GETTERS, {button:function (Y) {
                    return(Y.attributes && Y.attributes.value) ? Y.attributes.value.value : "";
                }});
                W.mix(W.DOM.VALUE_SETTERS, {button:function (Z, a) {
                    var Y = Z.attributes.value;
                    if (!Y) {
                        Y = Z[F].createAttribute("value");
                        Z.setAttributeNode(Y);
                    }
                    Y.value = a;
                }});
            }
            if (W.UA.gecko || W.UA.ie) {
                W.mix(X, {option:function (Y, Z) {
                    return S("<select>" + Y + "</select>", Z);
                }, tr:function (Y, Z) {
                    return S("<tbody>" + Y + "</tbody>", Z);
                }, td:function (Y, Z) {
                    return S("<tr>" + Y + "</tr>", Z);
                }, tbody:function (Y, Z) {
                    return S(U + Y + T, Z);
                }});
                W.mix(X, {legend:"fieldset", th:X.td, thead:X.tbody, tfoot:X.tbody, caption:X.tbody, colgroup:X.tbody, col:X.tbody, optgroup:X.option});
            }
            W.mix(W.DOM.VALUE_GETTERS, {option:function (Z) {
                var Y = Z.attributes;
                return(Y.value && Y.value.specified) ? Z.value : Z.text;
            }, select:function (Z) {
                var a = Z.value, Y = Z.options;
                if (Y && a === "") {
                    if (Z.multiple) {
                    } else {
                        a = W.DOM.getValue(Y[Z.selectedIndex], "value");
                    }
                }
                return a;
            }});
        })(H);
    })(D);
    var B, A, C;
    D.mix(D.DOM, {hasClass:function (G, F) {
        var E = D.DOM._getRegExp("(?:^|\\s+)" + F + "(?:\\s+|$)");
        return E.test(G.className);
    }, addClass:function (F, E) {
        if (!D.DOM.hasClass(F, E)) {
            F.className = D.Lang.trim([F.className, E].join(" "));
        }
    }, removeClass:function (F, E) {
        if (E && A(F, E)) {
            F.className = D.Lang.trim(F.className.replace(D.DOM._getRegExp("(?:^|\\s+)" + E + "(?:\\s+|$)"), " "));
            if (A(F, E)) {
                C(F, E);
            }
        }
    }, replaceClass:function (F, E, G) {
        B(F, G);
        C(F, E);
    }, toggleClass:function (F, E) {
        if (A(F, E)) {
            C(F, E);
        } else {
            B(F, E);
        }
    }});
    A = D.DOM.hasClass;
    C = D.DOM.removeClass;
    B = D.DOM.addClass;
}, "3.0.0", {requires:["oop"]});
YUI.add("dom-style", function (A) {
    (function (E) {
        var C = "documentElement", B = "defaultView", D = "ownerDocument", L = "style", N = "float", F = "cssFloat", G = "styleFloat", J = "transparent", H = "getComputedStyle", M = E.config.doc, I = undefined, K = /color$/i;
        E.mix(E.DOM, {CUSTOM_STYLES:{}, setStyle:function (R, O, S, Q) {
            Q = Q || R.style;
            var P = E.DOM.CUSTOM_STYLES;
            if (Q) {
                if (S === null) {
                    S = "";
                }
                if (O in P) {
                    if (P[O].set) {
                        P[O].set(R, S, Q);
                        return;
                    } else {
                        if (typeof P[O] === "string") {
                            O = P[O];
                        }
                    }
                }
                Q[O] = S;
            }
        }, getStyle:function (R, O) {
            var Q = R[L], P = E.DOM.CUSTOM_STYLES, S = "";
            if (Q) {
                if (O in P) {
                    if (P[O].get) {
                        return P[O].get(R, O, Q);
                    } else {
                        if (typeof P[O] === "string") {
                            O = P[O];
                        }
                    }
                }
                S = Q[O];
                if (S === "") {
                    S = E.DOM[H](R, O);
                }
            }
            return S;
        }, setStyles:function (P, Q) {
            var O = P.style;
            E.each(Q, function (R, S) {
                E.DOM.setStyle(P, S, R, O);
            }, E.DOM);
        }, getComputedStyle:function (P, O) {
            var R = "", Q = P[D];
            if (P[L]) {
                R = Q[B][H](P, null)[O];
            }
            return R;
        }});
        if (M[C][L][F] !== I) {
            E.DOM.CUSTOM_STYLES[N] = F;
        } else {
            if (M[C][L][G] !== I) {
                E.DOM.CUSTOM_STYLES[N] = G;
            }
        }
        if (E.UA.opera) {
            E.DOM[H] = function (Q, P) {
                var O = Q[D][B], R = O[H](Q, "")[P];
                if (K.test(P)) {
                    R = E.Color.toRGB(R);
                }
                return R;
            };
        }
        if (E.UA.webkit) {
            E.DOM[H] = function (Q, P) {
                var O = Q[D][B], R = O[H](Q, "")[P];
                if (R === "rgba(0, 0, 0, 0)") {
                    R = J;
                }
                return R;
            };
        }
    })(A);
    (function (D) {
        var B = parseInt, C = RegExp;
        D.Color = {KEYWORDS:{black:"000", silver:"c0c0c0", gray:"808080", white:"fff", maroon:"800000", red:"f00", purple:"800080", fuchsia:"f0f", green:"008000", lime:"0f0", olive:"808000", yellow:"ff0", navy:"000080", blue:"00f", teal:"008080", aqua:"0ff"}, re_RGB:/^rgb\(([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)\)$/i, re_hex:/^#?([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})$/i, re_hex3:/([0-9A-F])/gi, toRGB:function (E) {
            if (!D.Color.re_RGB.test(E)) {
                E = D.Color.toHex(E);
            }
            if (D.Color.re_hex.exec(E)) {
                E = "rgb(" + [B(C.$1, 16), B(C.$2, 16), B(C.$3, 16)].join(", ") + ")";
            }
            return E;
        }, toHex:function (F) {
            F = D.Color.KEYWORDS[F] || F;
            if (D.Color.re_RGB.exec(F)) {
                F = [Number(C.$1).toString(16), Number(C.$2).toString(16), Number(C.$3).toString(16)];
                for (var E = 0; E < F.length; E++) {
                    if (F[E].length < 2) {
                        F[E] = F[E].replace(D.Color.re_hex3, "$1$1");
                    }
                }
                F = "#" + F.join("");
            }
            if (F.length < 6) {
                F = F.replace(D.Color.re_hex3, "$1$1");
            }
            if (F !== "transparent" && F.indexOf("#") < 0) {
                F = "#" + F;
            }
            return F.toLowerCase();
        }};
    })(A);
    (function (D) {
        var W = "hasLayout", K = "px", L = "filter", B = "filters", T = "opacity", M = "auto", G = "borderWidth", J = "borderTopWidth", Q = "borderRightWidth", V = "borderBottomWidth", H = "borderLeftWidth", I = "width", O = "height", R = "transparent", S = "visible", C = "getComputedStyle", Z = undefined, X = document.documentElement, P = /^(\d[.\d]*)+(em|ex|px|gd|rem|vw|vh|vm|ch|mm|cm|in|pt|pc|deg|rad|ms|s|hz|khz|%){1}?/i, E = function (Y) {
            return Y.currentStyle || Y.style;
        }, N = {CUSTOM_STYLES:{}, get:function (Y, b) {
            var a = "", c;
            if (Y) {
                c = E(Y)[b];
                if (b === T && D.DOM.CUSTOM_STYLES[T]) {
                    a = D.DOM.CUSTOM_STYLES[T].get(Y);
                } else {
                    if (!c || (c.indexOf && c.indexOf(K) > -1)) {
                        a = c;
                    } else {
                        if (D.DOM.IE.COMPUTED[b]) {
                            a = D.DOM.IE.COMPUTED[b](Y, b);
                        } else {
                            if (P.test(c)) {
                                a = N.getPixel(Y, b) + K;
                            } else {
                                a = c;
                            }
                        }
                    }
                }
            }
            return a;
        }, sizeOffsets:{width:["Left", "Right"], height:["Top", "Bottom"], top:["Top"], bottom:["Bottom"]}, getOffset:function (b, g) {
            var d = E(b)[g], Y = g.charAt(0).toUpperCase() + g.substr(1), f = "offset" + Y, a = "pixel" + Y, e = N.sizeOffsets[g], c = "";
            if (d === M || d.indexOf("%") > -1) {
                c = b["offset" + Y];
                if (e[0]) {
                    c -= N.getPixel(b, "padding" + e[0]);
                    c -= N.getBorderWidth(b, "border" + e[0] + "Width", 1);
                }
                if (e[1]) {
                    c -= N.getPixel(b, "padding" + e[1]);
                    c -= N.getBorderWidth(b, "border" + e[1] + "Width", 1);
                }
            } else {
                if (!b.style[a] && !b.style[g]) {
                    b.style[g] = d;
                }
                c = b.style[a];
            }
            return c + K;
        }, borderMap:{thin:"2px", medium:"4px", thick:"6px"}, getBorderWidth:function (a, c, Y) {
            var b = Y ? "" : K, d = a.currentStyle[c];
            if (d.indexOf(K) < 0) {
                if (N.borderMap[d]) {
                    d = N.borderMap[d];
                } else {
                }
            }
            return(Y) ? parseFloat(d) : d;
        }, getPixel:function (b, Y) {
            var d = null, a = E(b), e = a.right, c = a[Y];
            b.style.right = c;
            d = b.style.pixelRight;
            b.style.right = e;
            return d;
        }, getMargin:function (b, Y) {
            var c, a = E(b);
            if (a[Y] == M) {
                c = 0;
            } else {
                c = N.getPixel(b, Y);
            }
            return c + K;
        }, getVisibility:function (a, Y) {
            var b;
            while ((b = a.currentStyle) && b[Y] == "inherit") {
                a = a.parentNode;
            }
            return(b) ? b[Y] : S;
        }, getColor:function (a, Y) {
            var b = E(a)[Y];
            if (!b || b === R) {
                D.DOM.elementByAxis(a, "parentNode", null, function (c) {
                    b = E(c)[Y];
                    if (b && b !== R) {
                        a = c;
                        return true;
                    }
                });
            }
            return D.Color.toRGB(b);
        }, getBorderColor:function (a, Y) {
            var b = E(a), c = b[Y] || b.color;
            return D.Color.toRGB(D.Color.toHex(c));
        }}, F = {};
        try {
            if (X.style[T] === Z && X[B]) {
                D.DOM.CUSTOM_STYLES[T] = {get:function (a) {
                    var c = 100;
                    try {
                        c = a[B]["DXImageTransform.Microsoft.Alpha"][T];
                    } catch (b) {
                        try {
                            c = a[B]("alpha")[T];
                        } catch (Y) {
                        }
                    }
                    return c / 100;
                }, set:function (a, d, Y) {
                    var c, b;
                    if (d === "") {
                        b = E(a);
                        c = (T in b) ? b[T] : 1;
                        d = c;
                    }
                    if (typeof Y[L] == "string") {
                        Y[L] = "alpha(" + T + "=" + d * 100 + ")";
                        if (!a.currentStyle || !a.currentStyle[W]) {
                            Y.zoom = 1;
                        }
                    }
                }};
            }
        } catch (U) {
        }
        try {
            document.createElement("div").style.height = "-1px";
        } catch (U) {
            D.DOM.CUSTOM_STYLES.height = {set:function (b, c, a) {
                var Y = parseFloat(c);
                if (isNaN(Y) || Y >= 0) {
                    a.height = c;
                } else {
                }
            }};
            D.DOM.CUSTOM_STYLES.width = {set:function (b, c, a) {
                var Y = parseFloat(c);
                if (isNaN(Y) || Y >= 0) {
                    a.width = c;
                } else {
                }
            }};
        }
        F[I] = F[O] = N.getOffset;
        F.color = F.backgroundColor = N.getColor;
        F[G] = F[J] = F[Q] = F[V] = F[H] = N.getBorderWidth;
        F.marginTop = F.marginRight = F.marginBottom = F.marginLeft = N.getMargin;
        F.visibility = N.getVisibility;
        F.borderColor = F.borderTopColor = F.borderRightColor = F.borderBottomColor = F.borderLeftColor = N.getBorderColor;
        if (!D.config.win[C]) {
            D.DOM[C] = N.get;
        }
        D.namespace("DOM.IE");
        D.DOM.IE.COMPUTED = F;
        D.DOM.IE.ComputedStyle = N;
    })(A);
}, "3.0.0", {requires:["dom-base"]});
YUI.add("dom-screen", function (A) {
    (function (F) {
        var D = "documentElement", O = "compatMode", M = "position", C = "fixed", K = "relative", G = "left", H = "top", I = "BackCompat", N = "medium", E = "borderLeftWidth", B = "borderTopWidth", P = "getBoundingClientRect", J = "getComputedStyle", L = /^t(?:able|d|h)$/i;
        F.mix(F.DOM, {winHeight:function (R) {
            var Q = F.DOM._getWinSize(R).height;
            return Q;
        }, winWidth:function (R) {
            var Q = F.DOM._getWinSize(R).width;
            return Q;
        }, docHeight:function (R) {
            var Q = F.DOM._getDocSize(R).height;
            return Math.max(Q, F.DOM._getWinSize(R).height);
        }, docWidth:function (R) {
            var Q = F.DOM._getDocSize(R).width;
            return Math.max(Q, F.DOM._getWinSize(R).width);
        }, docScrollX:function (Q) {
            var R = F.DOM._getDoc(Q);
            return Math.max(R[D].scrollLeft, R.body.scrollLeft);
        }, docScrollY:function (Q) {
            var R = F.DOM._getDoc(Q);
            return Math.max(R[D].scrollTop, R.body.scrollTop);
        }, getXY:function () {
            if (document[D][P]) {
                return function (T) {
                    var a = null, U, R, V, Y, X, Q, S, W, Z;
                    if (T) {
                        if (F.DOM.inDoc(T)) {
                            U = F.DOM.docScrollX(T);
                            R = F.DOM.docScrollY(T);
                            V = T[P]();
                            Z = F.DOM._getDoc(T);
                            a = [V.left, V.top];
                            if (F.UA.ie) {
                                Y = 2;
                                X = 2;
                                W = Z[O];
                                Q = F.DOM[J](Z[D], E);
                                S = F.DOM[J](Z[D], B);
                                if (F.UA.ie === 6) {
                                    if (W !== I) {
                                        Y = 0;
                                        X = 0;
                                    }
                                }
                                if ((W == I)) {
                                    if (Q !== N) {
                                        Y = parseInt(Q, 10);
                                    }
                                    if (S !== N) {
                                        X = parseInt(S, 10);
                                    }
                                }
                                a[0] -= Y;
                                a[1] -= X;
                            }
                            if ((R || U)) {
                                a[0] += U;
                                a[1] += R;
                            }
                        } else {
                            a = F.DOM._getOffset(T);
                        }
                    }
                    return a;
                };
            } else {
                return function (R) {
                    var T = null, Q, V, S, U;
                    if (R) {
                        if (F.DOM.inDoc(R)) {
                            T = [R.offsetLeft, R.offsetTop];
                            Q = R;
                            V = ((F.UA.gecko || F.UA.webkit > 519) ? true : false);
                            while ((Q = Q.offsetParent)) {
                                T[0] += Q.offsetLeft;
                                T[1] += Q.offsetTop;
                                if (V) {
                                    T = F.DOM._calcBorders(Q, T);
                                }
                            }
                            if (F.DOM.getStyle(R, M) != C) {
                                Q = R;
                                while ((Q = Q.parentNode)) {
                                    S = Q.scrollTop;
                                    U = Q.scrollLeft;
                                    if (F.UA.gecko && (F.DOM.getStyle(Q, "overflow") !== "visible")) {
                                        T = F.DOM._calcBorders(Q, T);
                                    }
                                    if (S || U) {
                                        T[0] -= U;
                                        T[1] -= S;
                                    }
                                }
                                T[0] += F.DOM.docScrollX(R);
                                T[1] += F.DOM.docScrollY(R);
                            } else {
                                T[0] += F.DOM.docScrollX(R);
                                T[1] += F.DOM.docScrollY(R);
                            }
                        } else {
                            T = F.DOM._getOffset(R);
                        }
                    }
                    return T;
                };
            }
        }(), _getOffset:function (Q) {
            var S, R = null;
            if (Q) {
                S = F.DOM.getStyle(Q, M);
                R = [parseInt(F.DOM[J](Q, G), 10), parseInt(F.DOM[J](Q, H), 10)];
                if (isNaN(R[0])) {
                    R[0] = parseInt(F.DOM.getStyle(Q, G), 10);
                    if (isNaN(R[0])) {
                        R[0] = (S === K) ? 0 : Q.offsetLeft || 0;
                    }
                }
                if (isNaN(R[1])) {
                    R[1] = parseInt(F.DOM.getStyle(Q, H), 10);
                    if (isNaN(R[1])) {
                        R[1] = (S === K) ? 0 : Q.offsetTop || 0;
                    }
                }
            }
            return R;
        }, getX:function (Q) {
            return F.DOM.getXY(Q)[0];
        }, getY:function (Q) {
            return F.DOM.getXY(Q)[1];
        }, setXY:function (R, U, X) {
            var S = F.DOM.setStyle, W, V, Q, T;
            if (R && U) {
                W = F.DOM.getStyle(R, M);
                V = F.DOM._getOffset(R);
                if (W == "static") {
                    W = K;
                    S(R, M, W);
                }
                T = F.DOM.getXY(R);
                if (U[0] !== null) {
                    S(R, G, U[0] - T[0] + V[0] + "px");
                }
                if (U[1] !== null) {
                    S(R, H, U[1] - T[1] + V[1] + "px");
                }
                if (!X) {
                    Q = F.DOM.getXY(R);
                    if (Q[0] !== U[0] || Q[1] !== U[1]) {
                        F.DOM.setXY(R, U, true);
                    }
                }
            } else {
            }
        }, setX:function (R, Q) {
            return F.DOM.setXY(R, [Q, null]);
        }, setY:function (Q, R) {
            return F.DOM.setXY(Q, [null, R]);
        }, _calcBorders:function (S, T) {
            var R = parseInt(F.DOM[J](S, B), 10) || 0, Q = parseInt(F.DOM[J](S, E), 10) || 0;
            if (F.UA.gecko) {
                if (L.test(S.tagName)) {
                    R = 0;
                    Q = 0;
                }
            }
            T[0] += Q;
            T[1] += R;
            return T;
        }, _getWinSize:function (T) {
            var V = F.DOM._getDoc(), U = V.defaultView || V.parentWindow, W = V[O], S = U.innerHeight, R = U.innerWidth, Q = V[D];
            if (W && !F.UA.opera) {
                if (W != "CSS1Compat") {
                    Q = V.body;
                }
                S = Q.clientHeight;
                R = Q.clientWidth;
            }
            return{height:S, width:R};
        }, _getDocSize:function (R) {
            var S = F.DOM._getDoc(), Q = S[D];
            if (S[O] != "CSS1Compat") {
                Q = S.body;
            }
            return{height:Q.scrollHeight, width:Q.scrollWidth};
        }});
    })(A);
    (function (G) {
        var D = "top", C = "right", H = "bottom", B = "left", F = function (L, K) {
            var N = Math.max(L[D], K[D]), O = Math.min(L[C], K[C]), I = Math.min(L[H], K[H]), J = Math.max(L[B], K[B]), M = {};
            M[D] = N;
            M[C] = O;
            M[H] = I;
            M[B] = J;
            return M;
        }, E = G.DOM;
        G.mix(E, {region:function (J) {
            var K = E.getXY(J), I = false;
            if (J && K) {
                I = E._getRegion(K[1], K[0] + J.offsetWidth, K[1] + J.offsetHeight, K[0]);
            }
            return I;
        }, intersect:function (K, I, M) {
            var J = M || E.region(K), L = {}, O = I, N;
            if (O.tagName) {
                L = E.region(O);
            } else {
                if (G.Lang.isObject(I)) {
                    L = I;
                } else {
                    return false;
                }
            }
            N = F(L, J);
            return{top:N[D], right:N[C], bottom:N[H], left:N[B], area:((N[H] - N[D]) * (N[C] - N[B])), yoff:((N[H] - N[D])), xoff:(N[C] - N[B]), inRegion:E.inRegion(K, I, false, M)};
        }, inRegion:function (L, I, J, N) {
            var M = {}, K = N || E.region(L), P = I, O;
            if (P.tagName) {
                M = E.region(P);
            } else {
                if (G.Lang.isObject(I)) {
                    M = I;
                } else {
                    return false;
                }
            }
            if (J) {
                return(K[B] >= M[B] && K[C] <= M[C] && K[D] >= M[D] && K[H] <= M[H]);
            } else {
                O = F(M, K);
                if (O[H] >= O[D] && O[C] >= O[B]) {
                    return true;
                } else {
                    return false;
                }
            }
        }, inViewportRegion:function (J, I, K) {
            return E.inRegion(J, E.viewportRegion(J), I, K);
        }, _getRegion:function (K, L, I, J) {
            var M = {};
            M[D] = M[1] = K;
            M[B] = M[0] = J;
            M[H] = I;
            M[C] = L;
            M.width = M[C] - M[B];
            M.height = M[H] - M[D];
            return M;
        }, viewportRegion:function (J) {
            J = J || G.config.doc.documentElement;
            var I = false, L, K;
            if (J) {
                L = E.docScrollX(J);
                K = E.docScrollY(J);
                I = E._getRegion(K, E.winWidth(J) + L, K + E.winHeight(J), L);
            }
            return I;
        }});
    })(A);
}, "3.0.0", {requires:["dom-base", "dom-style"]});
YUI.add("selector-native", function (A) {
    (function (G) {
        G.namespace("Selector");
        var E = "compareDocumentPosition", F = "ownerDocument", D = "yui-tmp-", C = 0;
        var B = {_foundCache:[], useNative:true, _compare:("sourceIndex"in document.documentElement) ? function (K, J) {
            var I = K.sourceIndex, H = J.sourceIndex;
            if (I === H) {
                return 0;
            } else {
                if (I > H) {
                    return 1;
                }
            }
            return-1;
        } : (document.documentElement[E] ? function (I, H) {
            if (I[E](H) & 4) {
                return-1;
            } else {
                return 1;
            }
        } : function (L, K) {
            var J, H, I;
            if (L && K) {
                J = L[F].createRange();
                J.setStart(L, 0);
                H = K[F].createRange();
                H.setStart(K, 0);
                I = J.compareBoundaryPoints(1, H);
            }
            return I;
        }), _sort:function (H) {
            if (H) {
                H = G.Array(H, 0, true);
                if (H.sort) {
                    H.sort(B._compare);
                }
            }
            return H;
        }, _deDupe:function (H) {
            var I = [], J, K;
            for (J = 0; (K = H[J++]);) {
                if (!K._found) {
                    I[I.length] = K;
                    K._found = true;
                }
            }
            for (J = 0; (K = I[J++]);) {
                K._found = null;
                K.removeAttribute("_found");
            }
            return I;
        }, query:function (I, P, Q, H) {
            P = P || G.config.doc;
            var M = [], J = (G.Selector.useNative && document.querySelector && !H), L = [
                [I, P]
            ], N, R, K, O = (J) ? G.Selector._nativeQuery : G.Selector._bruteQuery;
            if (I && O) {
                if (!H && (!J || P.tagName)) {
                    L = B._splitQueries(I, P);
                }
                for (K = 0; (N = L[K++]);) {
                    R = O(N[0], N[1], Q);
                    if (!Q) {
                        R = G.Array(R, 0, true);
                    }
                    if (R) {
                        M = M.concat(R);
                    }
                }
                if (L.length > 1) {
                    M = B._sort(B._deDupe(M));
                }
            }
            return(Q) ? (M[0] || null) : M;
        }, _splitQueries:function (J, M) {
            var I = J.split(","), K = [], N = "", L, H;
            if (M) {
                if (M.tagName) {
                    M.id = M.id || G.guid();
                    N = "#" + M.id + " ";
                }
                for (L = 0, H = I.length; L < H; ++L) {
                    J = N + I[L];
                    K.push([J, M]);
                }
            }
            return K;
        }, _nativeQuery:function (H, I, J) {
            try {
                return I["querySelector" + (J ? "" : "All")](H);
            } catch (K) {
                return G.Selector.query(H, I, J, true);
            }
        }, filter:function (I, H) {
            var J = [], K, L;
            if (I && H) {
                for (K = 0; (L = I[K++]);) {
                    if (G.Selector.test(L, H)) {
                        J[J.length] = L;
                    }
                }
            } else {
            }
            return J;
        }, test:function (N, I, J) {
            var K = false, H = I.split(","), M, L, O;
            if (N && N.tagName) {
                J = J || N.ownerDocument;
                if (!N.id) {
                    N.id = D + C++;
                }
                for (L = 0; (O = H[L++]);) {
                    O += "#" + N.id;
                    M = G.Selector.query(O, J, true);
                    K = (M === N);
                    if (K) {
                        break;
                    }
                }
            }
            return K;
        }};
        G.mix(G.Selector, B, true);
    })(A);
}, "3.0.0", {requires:["dom-base"]});
YUI.add("selector-css2", function (G) {
    var H = "parentNode", D = "tagName", E = "attributes", A = "combinator", F = "pseudos", C = G.Selector, B = {SORT_RESULTS:true, _children:function (M, I) {
        var J = M.children, L, K = [], N, O;
        if (M.children && I && M.children.tags) {
            K = M.children.tags(I);
        } else {
            if ((!J && M[D]) || (J && I)) {
                N = J || M.childNodes;
                J = [];
                for (L = 0; (O = N[L++]);) {
                    if (O.tagName) {
                        if (!I || I === O.tagName) {
                            J.push(O);
                        }
                    }
                }
            }
        }
        return J || [];
    }, _regexCache:{}, _re:{attr:/(\[.*\])/g, pseudos:/:([\-\w]+(?:\(?:['"]?(.+)['"]?\)))*/i}, shorthand:{"\\#(-?[_a-z]+[-\\w]*)":"[id=$1]", "\\.(-?[_a-z]+[-\\w]*)":"[className~=$1]"}, operators:{"":function (J, I) {
        return G.DOM.getAttribute(J, I) !== "";
    }, "~=":"(?:^|\\s+){val}(?:\\s+|$)", "|=":"^{val}-?"}, pseudos:{"first-child":function (I) {
        return G.Selector._children(I[H])[0] === I;
    }}, _bruteQuery:function (M, Q, S) {
        var N = [], I = [], P = C._tokenize(M), L = P[P.length - 1], R = G.DOM._getDoc(Q), J, O, K;
        if (P[0] && R === Q && (J = P[0].id) && R.getElementById(J)) {
            Q = R.getElementById(J);
        }
        if (L) {
            J = L.id;
            O = L.className;
            K = L.tagName || "*";
            if (J) {
                if (R.getElementById(J)) {
                    I = [R.getElementById(J)];
                }
            } else {
                if (O) {
                    I = Q.getElementsByClassName(O);
                } else {
                    if (K) {
                        I = Q.getElementsByTagName(K || "*");
                    }
                }
            }
            if (I.length) {
                N = C._filterNodes(I, P, S);
            }
        }
        return N;
    }, _filterNodes:function (R, N, P) {
        var W = 0, V, X = N.length, Q = X - 1, M = [], T = R[0], a = T, Y = G.Selector.getters, L, U, K, O, I, S, J, Z;
        for (W = 0; (a = T = R[W++]);) {
            Q = X - 1;
            O = null;
            testLoop:while (a && a.tagName) {
                K = N[Q];
                J = K.tests;
                V = J.length;
                if (V && !I) {
                    while ((Z = J[--V])) {
                        L = Z[1];
                        if (Y[Z[0]]) {
                            S = Y[Z[0]](a, Z[0]);
                        } else {
                            S = a[Z[0]];
                            if (S === undefined && a.getAttribute) {
                                S = a.getAttribute(Z[0]);
                            }
                        }
                        if ((L === "=" && S !== Z[2]) || (L.test && !L.test(S)) || (L.call && !L(a, Z[0]))) {
                            if ((a = a[O])) {
                                while (a && (!a.tagName || (K.tagName && K.tagName !== a.tagName))) {
                                    a = a[O];
                                }
                            }
                            continue testLoop;
                        }
                    }
                }
                Q--;
                if (!I && (U = K.combinator)) {
                    O = U.axis;
                    a = a[O];
                    while (a && !a.tagName) {
                        a = a[O];
                    }
                    if (U.direct) {
                        O = null;
                    }
                } else {
                    M.push(T);
                    if (P) {
                        return M;
                    }
                    break;
                }
            }
        }
        T = a = null;
        return M;
    }, _getRegExp:function (K, I) {
        var J = C._regexCache;
        I = I || "";
        if (!J[K + I]) {
            J[K + I] = new RegExp(K, I);
        }
        return J[K + I];
    }, combinators:{" ":{axis:"parentNode"}, ">":{axis:"parentNode", direct:true}, "+":{axis:"previousSibling", direct:true}}, _parsers:[
        {name:E, re:/^\[([a-z]+\w*)+([~\|\^\$\*!=]=?)?['"]?([^\]]*?)['"]?\]/i, fn:function (K, L) {
            var J = K[2] || "", I = G.Selector.operators, M;
            if ((K[1] === "id" && J === "=") || (K[1] === "className" && document.getElementsByClassName && (J === "~=" || J === "="))) {
                L.prefilter = K[1];
                L[K[1]] = K[3];
            }
            if (J in I) {
                M = I[J];
                if (typeof M === "string") {
                    M = G.Selector._getRegExp(M.replace("{val}", K[3]));
                }
                K[2] = M;
            }
            if (!L.last || L.prefilter !== K[1]) {
                return K.slice(1);
            }
        }},
        {name:D, re:/^((?:-?[_a-z]+[\w-]*)|\*)/i, fn:function (J, K) {
            var I = J[1].toUpperCase();
            K.tagName = I;
            if (I !== "*" && (!K.last || K.prefilter)) {
                return[D, "=", I];
            }
            if (!K.prefilter) {
                K.prefilter = "tagName";
            }
        }},
        {name:A, re:/^\s*([>+~]|\s)\s*/, fn:function (I, J) {
        }},
        {name:F, re:/^:([\-\w]+)(?:\(['"]?(.+)['"]?\))*/i, fn:function (I, J) {
            var K = C[F][I[1]];
            if (K) {
                return[I[2], K];
            } else {
                return false;
            }
        }}
    ], _getToken:function (I) {
        return{tagName:null, id:null, className:null, attributes:{}, combinator:null, tests:[]};
    }, _tokenize:function (K) {
        K = K || "";
        K = C._replaceShorthand(G.Lang.trim(K));
        var J = C._getToken(), P = K, O = [], Q = false, M, N, L, I;
        outer:do {
            Q = false;
            for (L = 0; (I = C._parsers[L++]);) {
                if ((M = I.re.exec(K))) {
                    if (I !== A) {
                        J.selector = K;
                    }
                    K = K.replace(M[0], "");
                    if (!K.length) {
                        J.last = true;
                    }
                    if (C._attrFilters[M[1]]) {
                        M[1] = C._attrFilters[M[1]];
                    }
                    N = I.fn(M, J);
                    if (N === false) {
                        Q = false;
                        break outer;
                    } else {
                        if (N) {
                            J.tests.push(N);
                        }
                    }
                    if (!K.length || I.name === A) {
                        O.push(J);
                        J = C._getToken(J);
                        if (I.name === A) {
                            J.combinator = G.Selector.combinators[M[1]];
                        }
                    }
                    Q = true;
                }
            }
        } while (Q && K.length);
        if (!Q || K.length) {
            O = [];
        }
        return O;
    }, _replaceShorthand:function (J) {
        var K = C.shorthand, L = J.match(C._re.attr), O = J.match(C._re.pseudos), N, M, I;
        if (O) {
            J = J.replace(C._re.pseudos, "!!REPLACED_PSEUDO!!");
        }
        if (L) {
            J = J.replace(C._re.attr, "!!REPLACED_ATTRIBUTE!!");
        }
        for (N in K) {
            if (K.hasOwnProperty(N)) {
                J = J.replace(C._getRegExp(N, "gi"), K[N]);
            }
        }
        if (L) {
            for (M = 0, I = L.length; M < I; ++M) {
                J = J.replace("!!REPLACED_ATTRIBUTE!!", L[M]);
            }
        }
        if (O) {
            for (M = 0, I = O.length; M < I; ++M) {
                J = J.replace("!!REPLACED_PSEUDO!!", O[M]);
            }
        }
        return J;
    }, _attrFilters:{"class":"className", "for":"htmlFor"}, getters:{href:function (J, I) {
        return G.DOM.getAttribute(J, I);
    }}};
    G.mix(G.Selector, B, true);
    G.Selector.getters.src = G.Selector.getters.rel = G.Selector.getters.href;
    if (G.Selector.useNative && document.querySelector) {
        G.Selector.shorthand["\\.(-?[_a-z]+[-\\w]*)"] = "[class~=$1]";
    }
}, "3.0.0", {requires:["selector-native"]});
YUI.add("selector", function (A) {
}, "3.0.0", {use:["selector-native", "selector-css2"]});
YUI.add("dom", function (A) {
}, "3.0.0", {use:["dom-base", "dom-style", "dom-screen", "selector"]});