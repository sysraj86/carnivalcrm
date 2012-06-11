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