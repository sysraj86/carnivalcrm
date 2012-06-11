/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
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