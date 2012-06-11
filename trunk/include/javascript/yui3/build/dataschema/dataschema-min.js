/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("dataschema-base", function (B) {
    var A = B.Lang, C = {apply:function (D, E) {
        return E;
    }, parse:function (D, E) {
        if (E.parser) {
            var F = (A.isFunction(E.parser)) ? E.parser : B.Parsers[E.parser + ""];
            if (F) {
                D = F.call(this, D);
            } else {
            }
        }
        return D;
    }};
    B.namespace("DataSchema").Base = C;
    B.namespace("Parsers");
}, "3.0.0", {requires:["base"]});
YUI.add("dataschema-json", function (C) {
    var A = C.Lang, B = {getPath:function (D) {
        var G = null, F = [], E = 0;
        if (D) {
            D = D.replace(/\[(['"])(.*?)\1\]/g,
                function (I, H, J) {
                    F[E] = J;
                    return".@" + (E++);
                }).replace(/\[(\d+)\]/g,
                function (I, H) {
                    F[E] = parseInt(H, 10) | 0;
                    return".@" + (E++);
                }).replace(/^\./, "");
            if (!/[^\w\.\$@]/.test(D)) {
                G = D.split(".");
                for (E = G.length - 1; E >= 0; --E) {
                    if (G[E].charAt(0) === "@") {
                        G[E] = F[parseInt(G[E].substr(1), 10)];
                    }
                }
            } else {
            }
        }
        return G;
    }, getLocationValue:function (G, F) {
        var E = 0, D = G.length;
        for (; E < D; E++) {
            if (!A.isUndefined(F[G[E]])) {
                F = F[G[E]];
            } else {
                F = undefined;
                break;
            }
        }
        return F;
    }, apply:function (F, G) {
        var D = G, E = {results:[], meta:{}};
        if (!A.isObject(G)) {
            try {
                D = C.JSON.parse(G);
            } catch (H) {
                E.error = H;
                return E;
            }
        }
        if (A.isObject(D) && F) {
            if (!A.isUndefined(F.resultListLocator)) {
                E = B._parseResults(F, D, E);
            }
            if (!A.isUndefined(F.metaFields)) {
                E = B._parseMeta(F.metaFields, D, E);
            }
        } else {
            E.error = new Error("JSON schema parse failure");
        }
        return E;
    }, _parseResults:function (H, D, G) {
        var F = [], I, E;
        if (H.resultListLocator) {
            I = B.getPath(H.resultListLocator);
            if (I) {
                F = B.getLocationValue(I, D);
                if (F === undefined) {
                    G.results = [];
                    E = new Error("JSON results retrieval failure");
                } else {
                    if (A.isArray(H.resultFields) && A.isArray(F)) {
                        G = B._getFieldValues(H.resultFields, F, G);
                    } else {
                        G.results = [];
                        E = new Error("JSON Schema fields retrieval failure");
                    }
                }
            } else {
                E = new Error("JSON Schema results locator failure");
            }
            if (E) {
                G.error = E;
            }
        }
        return G;
    }, _getFieldValues:function (K, P, E) {
        var G = [], M = K.length, H, F, O, Q, S, D, J = [], N = [], L = [], R, I;
        for (H = 0; H < M; H++) {
            O = K[H];
            Q = O.key || O;
            S = B.getPath(Q);
            if (S) {
                if (S.length === 1) {
                    J[J.length] = {key:Q, path:S[0]};
                } else {
                    N[N.length] = {key:Q, path:S};
                }
            } else {
            }
            D = (A.isFunction(O.parser)) ? O.parser : C.Parsers[O.parser + ""];
            if (D) {
                L[L.length] = {key:Q, parser:D};
            }
        }
        for (H = P.length - 1; H >= 0; --H) {
            I = {};
            R = P[H];
            if (R) {
                for (F = J.length - 1; F >= 0; --F) {
                    I[J[F].key] = C.DataSchema.Base.parse((A.isUndefined(R[J[F].path]) ? R[F] : R[J[F].path]), J[F]);
                }
                for (F = N.length - 1; F >= 0; --F) {
                    I[N[F].key] = C.DataSchema.Base.parse((B.getLocationValue(N[F].path, R)), N[F]);
                }
                for (F = L.length - 1; F >= 0; --F) {
                    Q = L[F].key;
                    I[Q] = L[F].parser(I[Q]);
                    if (A.isUndefined(I[Q])) {
                        I[Q] = null;
                    }
                }
                G[H] = I;
            }
        }
        E.results = G;
        return E;
    }, _parseMeta:function (G, D, F) {
        if (A.isObject(G)) {
            var E, H;
            for (E in G) {
                if (G.hasOwnProperty(E)) {
                    H = B.getPath(G[E]);
                    if (H && D) {
                        F.meta[E] = B.getLocationValue(H, D);
                    }
                }
            }
        } else {
            F.error = new Error("JSON meta data retrieval failure");
        }
        return F;
    }};
    C.DataSchema.JSON = C.mix(B, C.DataSchema.Base);
}, "3.0.0", {requires:["json", "dataschema-base"]});
YUI.add("dataschema-xml", function (C) {
    var B = C.Lang, A = {apply:function (F, G) {
        var D = G, E = {results:[], meta:{}};
        if (D && D.nodeType && (D.nodeType === 9 || D.nodeType === 1 || D.nodeType === 11) && F) {
            E = A._parseResults(F, D, E);
            E = A._parseMeta(F.metaFields, D, E);
        } else {
            E.error = new Error("XML schema parse failure");
        }
        return E;
    }, _getLocationValue:function (K, H) {
        var F = K.locator || K.key || K, E = H.ownerDocument || H, D, G, I = null;
        try {
            if (!B.isUndefined(E.evaluate)) {
                D = E.evaluate(F, H, E.createNSResolver(!H.ownerDocument ? H.documentElement : H.ownerDocument.documentElement), 0, null);
                while (G = D.iterateNext()) {
                    I = G.textContent;
                }
            } else {
                E.setProperty("SelectionLanguage", "XPath");
                D = H.selectNodes(F)[0];
                I = D.value || D.text || null;
            }
            return C.DataSchema.Base.parse(I, K);
        } catch (J) {
        }
    }, _parseMeta:function (H, G, F) {
        if (B.isObject(H)) {
            var E, D = G.ownerDocument || G;
            for (E in H) {
                if (H.hasOwnProperty(E)) {
                    F.meta[E] = A._getLocationValue(H[E], D);
                }
            }
        }
        return F;
    }, _parseResults:function (F, K, G) {
        if (F.resultListLocator && B.isArray(F.resultFields)) {
            var E = K.getElementsByTagName(F.resultListLocator), L = F.resultFields, J = [], D, M, N, I, H;
            if (E.length) {
                for (I = E.length - 1; I >= 0; I--) {
                    N = {};
                    D = E[I];
                    for (H = L.length - 1; H >= 0; H--) {
                        M = L[H];
                        N[M.key || M] = A._getLocationValue(M, D);
                    }
                    J[I] = N;
                }
                G.results = J;
            } else {
                G.error = new Error("XML schema result nodes retrieval failure");
            }
        }
        return G;
    }};
    C.DataSchema.XML = C.mix(A, C.DataSchema.Base);
}, "3.0.0", {requires:["dataschema-base"]});
YUI.add("dataschema-array", function (C) {
    var A = C.Lang, B = {apply:function (F, G) {
        var D = G, E = {results:[], meta:{}};
        if (A.isArray(D)) {
            if (A.isArray(F.resultFields)) {
                E = B._parseResults(F.resultFields, D, E);
            } else {
                E.results = D;
            }
        } else {
            E.error = new Error("Array schema parse failure");
        }
        return E;
    }, _parseResults:function (H, K, D) {
        var G = [], O, N, I, J, M, L, F, E;
        for (F = K.length - 1; F > -1; F--) {
            O = {};
            N = K[F];
            I = (A.isObject(N) && !A.isFunction(N)) ? 2 : (A.isArray(N)) ? 1 : (A.isString(N)) ? 0 : -1;
            if (I > 0) {
                for (E = H.length - 1; E > -1; E--) {
                    J = H[E];
                    M = (!A.isUndefined(J.key)) ? J.key : J;
                    L = (!A.isUndefined(N[M])) ? N[M] : N[E];
                    O[M] = C.DataSchema.Base.parse(L, J);
                }
            } else {
                if (I === 0) {
                    O = N;
                } else {
                    O = null;
                }
            }
            G[F] = O;
        }
        D.results = G;
        return D;
    }};
    C.DataSchema.Array = C.mix(B, C.DataSchema.Base);
}, "3.0.0", {requires:["dataschema-base"]});
YUI.add("dataschema-text", function (C) {
    var B = C.Lang, A = {apply:function (F, G) {
        var D = G, E = {results:[], meta:{}};
        if (B.isString(D) && B.isString(F.resultDelimiter)) {
            E = A._parseResults(F, D, E);
        } else {
            E.error = new Error("Text schema parse failure");
        }
        return E;
    }, _parseResults:function (D, K, E) {
        var I = D.resultDelimiter, H = [], L, P, S, R, J, N, Q, O, G, F, M = K.length - I.length;
        if (K.substr(M) == I) {
            K = K.substr(0, M);
        }
        L = K.split(D.resultDelimiter);
        for (G = L.length - 1; G > -1; G--) {
            S = {};
            R = L[G];
            if (B.isString(D.fieldDelimiter)) {
                P = R.split(D.fieldDelimiter);
                if (B.isArray(D.resultFields)) {
                    J = D.resultFields;
                    for (F = J.length - 1; F > -1; F--) {
                        N = J[F];
                        Q = (!B.isUndefined(N.key)) ? N.key : N;
                        O = (!B.isUndefined(P[Q])) ? P[Q] : P[F];
                        S[Q] = C.DataSchema.Base.parse(O, N);
                    }
                }
            } else {
                S = R;
            }
            H[G] = S;
        }
        E.results = H;
        return E;
    }};
    C.DataSchema.Text = C.mix(A, C.DataSchema.Base);
}, "3.0.0", {requires:["dataschema-base"]});
YUI.add("dataschema", function (A) {
}, "3.0.0", {use:["dataschema-base", "dataschema-json", "dataschema-xml", "dataschema-array", "dataschema-text"]});