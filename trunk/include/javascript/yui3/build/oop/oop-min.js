/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("oop", function (F) {
    var E = F.Lang, D = F.Array, C = Object.prototype, B = "_~yuim~_";
    F.augment = function (A, T, I, R, N) {
        var L = T.prototype, P = null, S = T, O = (N) ? F.Array(N) : [], H = A.prototype, M = H || A, Q = false, G, J, K;
        if (H && S) {
            G = {};
            J = {};
            P = {};
            F.each(L, function (V, U) {
                J[U] = function () {
                    for (K in G) {
                        if (G.hasOwnProperty(K) && (this[K] === J[K])) {
                            this[K] = G[K];
                        }
                    }
                    S.apply(this, O);
                    return G[U].apply(this, arguments);
                };
                if ((!R || (U in R)) && (I || !(U in this))) {
                    if (E.isFunction(V)) {
                        G[U] = V;
                        this[U] = J[U];
                    } else {
                        this[U] = V;
                    }
                }
            }, P, true);
        } else {
            Q = true;
        }
        F.mix(M, P || L, I, R);
        if (Q) {
            T.apply(M, O);
        }
        return A;
    };
    F.aggregate = function (H, G, A, I) {
        return F.mix(H, G, A, I, 0, true);
    };
    F.extend = function (I, H, A, K) {
        if (!H || !I) {
            F.error("extend failed, verify dependencies");
        }
        var J = H.prototype, G = F.Object(J);
        I.prototype = G;
        G.constructor = I;
        I.superclass = J;
        if (H != Object && J.constructor == C.constructor) {
            J.constructor = H;
        }
        if (A) {
            F.mix(G, A, true);
        }
        if (K) {
            F.mix(I, K, true);
        }
        return I;
    };
    F.each = function (H, G, I, A) {
        if (H.each && H.item) {
            return H.each.call(H, G, I);
        } else {
            switch (D.test(H)) {
                case 1:
                    return D.each(H, G, I);
                case 2:
                    return D.each(F.Array(H, 0, true), G, I);
                default:
                    return F.Object.each(H, G, I, A);
            }
        }
    };
    F.clone = function (I, J, M, N, H, L) {
        if (!E.isObject(I)) {
            return I;
        }
        var K, G = L || {}, A;
        switch (E.type(I)) {
            case"date":
                return new Date(I);
            case"regexp":
                return new RegExp(I.source);
            case"function":
                K = F.bind(I, H);
                break;
            case"array":
                K = [];
                break;
            default:
                if (I[B]) {
                    return G[I[B]];
                }
                A = F.guid();
                K = (J) ? {} : F.Object(I);
                I[B] = A;
                G[A] = I;
        }
        if (!I.addEventListener && !I.attachEvent) {
            F.each(I, function (P, O) {
                if (!M || (M.call(N || this, P, O, this, I) !== false)) {
                    if (O !== B) {
                        this[O] = F.clone(P, J, M, N, H || I, G);
                    }
                }
            }, K);
        }
        if (!L) {
            F.each(G, function (P, O) {
                delete P[B];
            });
            G = null;
        }
        return K;
    };
    F.bind = function (A, H) {
        var G = arguments.length > 2 ? F.Array(arguments, 2, true) : null;
        return function () {
            var J = E.isString(A) ? H[A] : A, I = (G) ? G.concat(F.Array(arguments, 0, true)) : arguments;
            return J.apply(H || J, I);
        };
    };
    F.rbind = function (A, H) {
        var G = arguments.length > 2 ? F.Array(arguments, 2, true) : null;
        return function () {
            var J = E.isString(A) ? H[A] : A, I = (G) ? F.Array(arguments, 0, true).concat(G) : arguments;
            return J.apply(H || J, I);
        };
    };
}, "3.0.0");