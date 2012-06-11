/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("event-delegate", function (B) {
    var I = B.Event, F = B.Lang, E = {}, A = {mouseenter:"mouseover", mouseleave:"mouseout"}, H = function (K) {
        try {
            if (K && 3 == K.nodeType) {
                return K.parentNode;
            }
        } catch (J) {
        }
        return K;
    }, D = function (K, P, M) {
        var Q = H((P.target || P.srcElement)), N = E[K], T, O, L, S, R;
        var J = function (X, U, V) {
            var W;
            if (!X || X === V) {
                W = false;
            } else {
                W = B.Selector.test(X, U) ? X : J(X.parentNode, U, V);
            }
            return W;
        };
        for (T in N) {
            if (N.hasOwnProperty(T)) {
                O = N[T];
                S = N.fn;
                L = null;
                if (B.Selector.test(Q, T, M)) {
                    L = Q;
                } else {
                    if (B.Selector.test(Q, ((T.replace(/,/gi, " *,")) + " *"), M)) {
                        L = J(Q, T, M);
                    }
                }
                if (L) {
                    if (!R) {
                        R = new B.DOMEventFacade(P, M);
                        R.container = R.currentTarget;
                    }
                    R.currentTarget = B.Node.get(L);
                    B.publish(O, {contextFn:function () {
                        return R.currentTarget;
                    }});
                    if (S) {
                        S(R, O);
                    } else {
                        B.fire(O, R);
                    }
                }
            }
        }
    }, G = function (M, L, K) {
        var O = {focus:I._attachFocus, blur:I._attachBlur}, N = O[M], J = [M, function (P) {
            D(L, (P || window.event), K);
        }, K];
        if (N) {
            return N(J, {capture:true, facade:false});
        } else {
            return I._attach(J, {facade:false});
        }
    }, C = B.cached(function (J) {
        return J.replace(/[|,:]/g, "~");
    });
    B.Env.evt.plugins.delegate = {on:function (O, N, M, J, K) {
        var L = B.Array(arguments, 0, true);
        L.splice(3, 1);
        L[0] = J;
        return B.delegate.apply(B, L);
    }};
    I.delegate = function (R, U, K, W) {
        if (!W) {
            return false;
        }
        var O = B.Array(arguments, 0, true), M = K, N;
        if (F.isString(K)) {
            M = B.Selector.query(K, null, true);
            if (!M) {
                N = I.onAvailable(K, function () {
                    N.handle = I.delegate.apply(I, O);
                }, I, true, false);
                return N;
            }
        }
        M = B.Node.getDOMNode(M);
        var S = B.stamp(M), L = "delegate:" + S + R + C(W), J = R + S, Q = E[J], T, V, P;
        if (!Q) {
            Q = {};
            if (A[R]) {
                if (!I._fireMouseEnter) {
                    return false;
                }
                R = A[R];
                Q.fn = I._fireMouseEnter;
            }
            T = G(R, J, M);
            B.after(function (X) {
                if (T.sub == X) {
                    delete E[J];
                    B.detachAll(L);
                }
            }, T.evt, "_delete");
            Q.handle = T;
            E[J] = Q;
        }
        P = Q.listeners;
        Q.listeners = P ? (P + 1) : 1;
        Q[W] = L;
        O[0] = L;
        O.splice(2, 2);
        V = B.on.apply(B, O);
        B.after(function () {
            Q.listeners = (Q.listeners - 1);
            if (Q.listeners === 0) {
                Q.handle.detach();
            }
        }, V, "detach");
        return V;
    };
    B.delegate = I.delegate;
}, "3.0.0", {requires:["node-base"]});