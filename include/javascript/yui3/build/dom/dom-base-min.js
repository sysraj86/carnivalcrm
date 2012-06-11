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