/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("base-base", function (B) {
    var H = B.Object, J = B.Lang, I = ".", F = "destroy", P = "init", N = "initialized", G = "destroyed", D = "initializer", C = Object.prototype.constructor, K = "deep", Q = "shallow", M = "destructor", A = B.Attribute;

    function E() {
        A.call(this);
        var L = B.Plugin && B.Plugin.Host;
        if (this._initPlugins && L) {
            L.call(this);
        }
        if (this._lazyAddAttrs !== false) {
            this._lazyAddAttrs = true;
        }
        this.init.apply(this, arguments);
    }

    E._ATTR_CFG = A._ATTR_CFG.concat("cloneDefaultValue");
    E.NAME = "base";
    E.ATTRS = {initialized:{readOnly:true, value:false}, destroyed:{readOnly:true, value:false}};
    E.prototype = {init:function (L) {
        this._yuievt.config.prefix = this.name = this.constructor.NAME;
        this.publish(P, {queuable:false, defaultFn:this._defInitFn});
        if (L) {
            if (L.on) {
                this.on(L.on);
            }
            if (L.after) {
                this.after(L.after);
            }
        }
        this.fire(P, {cfg:L});
        return this;
    }, destroy:function () {
        this.publish(F, {queuable:false, defaultFn:this._defDestroyFn});
        this.fire(F);
        return this;
    }, _defInitFn:function (L) {
        this._initHierarchy(L.cfg);
        if (this._initPlugins) {
            this._initPlugins(L.cfg);
        }
        this._set(N, true);
    }, _defDestroyFn:function (L) {
        this._destroyHierarchy();
        if (this._destroyPlugins) {
            this._destroyPlugins();
        }
        this._set(G, true);
    }, _getClasses:function () {
        if (!this._classes) {
            this._initHierarchyData();
        }
        return this._classes;
    }, _getAttrCfgs:function () {
        if (!this._attrs) {
            this._initHierarchyData();
        }
        return this._attrs;
    }, _filterAttrCfgs:function (T, O) {
        var R = null, L, S = T.ATTRS;
        if (S) {
            for (L in S) {
                if (S.hasOwnProperty(L) && O[L]) {
                    R = R || {};
                    R[L] = O[L];
                    delete O[L];
                }
            }
        }
        return R;
    }, _initHierarchyData:function () {
        var R = this.constructor, O = [], L = [];
        while (R) {
            O[O.length] = R;
            if (R.ATTRS) {
                L[L.length] = R.ATTRS;
            }
            R = R.superclass ? R.superclass.constructor : null;
        }
        this._classes = O;
        this._attrs = this._aggregateAttrs(L);
    }, _aggregateAttrs:function (W) {
        var T, X, S, L, Y, O, V, R = E._ATTR_CFG, U = {};
        if (W) {
            for (O = W.length - 1; O >= 0; --O) {
                X = W[O];
                for (T in X) {
                    if (X.hasOwnProperty(T)) {
                        S = B.mix({}, X[T], true, R);
                        L = S.value;
                        V = S.cloneDefaultValue;
                        if (L) {
                            if ((V === undefined && (C === L.constructor || J.isArray(L))) || V === K || V === true) {
                                S.value = B.clone(L);
                            } else {
                                if (V === Q) {
                                    S.value = B.merge(L);
                                }
                            }
                        }
                        Y = null;
                        if (T.indexOf(I) !== -1) {
                            Y = T.split(I);
                            T = Y.shift();
                        }
                        if (Y && U[T] && U[T].value) {
                            H.setValue(U[T].value, Y, L);
                        } else {
                            if (!Y) {
                                if (!U[T]) {
                                    U[T] = S;
                                } else {
                                    B.mix(U[T], S, true, R);
                                }
                            }
                        }
                    }
                }
            }
        }
        return U;
    }, _initHierarchy:function (U) {
        var R = this._lazyAddAttrs, V, W, X, S, O, T = this._getClasses(), L = this._getAttrCfgs();
        for (X = T.length - 1; X >= 0; X--) {
            V = T[X];
            W = V.prototype;
            if (V._yuibuild && V._yuibuild.exts && !V._yuibuild.dynamic) {
                for (S = 0, O = V._yuibuild.exts.length; S < O; S++) {
                    V._yuibuild.exts[S].apply(this, arguments);
                }
            }
            this.addAttrs(this._filterAttrCfgs(V, L), U, R);
            if (W.hasOwnProperty(D)) {
                W.initializer.apply(this, arguments);
            }
        }
    }, _destroyHierarchy:function () {
        var T, O, S, L, R = this._getClasses();
        for (S = 0, L = R.length; S < L; S++) {
            T = R[S];
            O = T.prototype;
            if (O.hasOwnProperty(M)) {
                O.destructor.apply(this, arguments);
            }
        }
    }, toString:function () {
        return this.constructor.NAME + "[" + B.stamp(this) + "]";
    }};
    B.mix(E, A, false, null, 1);
    E.prototype.constructor = E;
    B.Base = E;
    E.prototype.constructor = E;
}, "3.0.0", {requires:["attribute-base"]});
YUI.add("base-pluginhost", function (C) {
    var A = C.Base, B = C.Plugin.Host;
    C.mix(A, B, false, null, 1);
    A.plug = B.plug;
    A.unplug = B.unplug;
}, "3.0.0", {requires:["base-base", "pluginhost"]});
YUI.add("base-build", function (C) {
    var B = C.Base, A = C.Lang;
    B._buildCfg = {aggregates:["ATTRS", "_PLUG", "_UNPLUG"]};
    B.build = function (D, I, M, L) {
        var O = B.build, E = O._getClass(I, L), K = O._getAggregates(I, L), G = E._yuibuild.dynamic, J, H, F, N;
        if (G) {
            if (K) {
                for (J = 0, H = K.length; J < H; ++J) {
                    F = K[J];
                    if (I.hasOwnProperty(F)) {
                        E[F] = A.isArray(I[F]) ? [] : {};
                    }
                }
                C.aggregate(E, I, true, K);
            }
        }
        for (J = 0, H = M.length; J < H; J++) {
            N = M[J];
            if (K) {
                C.aggregate(E, N, true, K);
            }
            C.mix(E, N, true, null, 1);
            E._yuibuild.exts.push(N);
        }
        E.prototype.hasImpl = O._hasImpl;
        if (G) {
            E.NAME = D;
            E.prototype.constructor = E;
        }
        return E;
    };
    C.mix(B.build, {_template:function (D) {
        function E() {
            E.superclass.constructor.apply(this, arguments);
            var H = E._yuibuild.exts, F = H.length, G;
            for (G = 0; G < F; G++) {
                H[G].apply(this, arguments);
            }
            return this;
        }

        C.extend(E, D);
        return E;
    }, _hasImpl:function (G) {
        var J = this._getClasses();
        for (var I = 0, E = J.length; I < E; I++) {
            var D = J[I];
            if (D._yuibuild) {
                var H = D._yuibuild.exts, K = H.length, F;
                for (F = 0; F < K; F++) {
                    if (H[F] === G) {
                        return true;
                    }
                }
            }
        }
        return false;
    }, _getClass:function (D, E) {
        var F = (E && false === E.dynamic) ? false : true, G = (F) ? B.build._template(D) : D;
        G._yuibuild = {id:null, exts:[], dynamic:F};
        return G;
    }, _getAggregates:function (D, E) {
        var F = [], H = (E && E.aggregates), I = D, G;
        while (I && I.prototype) {
            G = I._buildCfg && I._buildCfg.aggregates;
            if (G) {
                F = F.concat(G);
            }
            I = I.superclass ? I.superclass.constructor : null;
        }
        if (H) {
            F = F.concat(H);
        }
        return F;
    }});
}, "3.0.0", {requires:["base-base"]});
YUI.add("base", function (A) {
}, "3.0.0", {use:["base-base", "base-pluginhost", "base-build"]});