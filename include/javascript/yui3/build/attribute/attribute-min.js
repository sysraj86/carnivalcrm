/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("attribute-base", function (C) {
    C.State = function () {
        this.data = {};
    };
    C.State.prototype = {add:function (O, Y, e) {
        var c = this.data;
        c[Y] = c[Y] || {};
        c[Y][O] = e;
    }, addAll:function (O, c) {
        var Y;
        for (Y in c) {
            if (c.hasOwnProperty(Y)) {
                this.add(O, Y, c[Y]);
            }
        }
    }, remove:function (O, Y) {
        var c = this.data;
        if (c[Y] && (O in c[Y])) {
            delete c[Y][O];
        }
    }, removeAll:function (O, c) {
        var Y = this.data;
        C.each(c || Y, function (e, d) {
            if (C.Lang.isString(d)) {
                this.remove(O, d);
            } else {
                this.remove(O, e);
            }
        }, this);
    }, get:function (O, Y) {
        var c = this.data;
        return(c[Y] && O in c[Y]) ? c[Y][O] : undefined;
    }, getAll:function (O) {
        var c = this.data, Y;
        C.each(c, function (e, d) {
            if (O in c[d]) {
                Y = Y || {};
                Y[d] = e[O];
            }
        }, this);
        return Y;
    }};
    var K = C.Object, F = C.Lang, L = C.EventTarget, W = ".", U = "Change", N = "getter", M = "setter", P = "readOnly", X = "writeOnce", b = "validator", H = "value", Q = "valueFn", E = "broadcast", S = "lazyAdd", J = "_bypassProxy", a = "added", B = "initializing", I = "initValue", V = "published", T = "defaultValue", A = "lazy", R = "isLazyAdd", G, Z = {};
    Z[P] = 1;
    Z[X] = 1;
    Z[N] = 1;
    Z[E] = 1;
    function D() {
        var c = this, O = this.constructor.ATTRS, Y = C.Base;
        c._ATTR_E_FACADE = {};
        L.call(c, {emitFacade:true});
        c._conf = c._state = new C.State();
        c._stateProxy = c._stateProxy || null;
        c._requireAddAttr = c._requireAddAttr || false;
        if (O && !(Y && c instanceof Y)) {
            c.addAttrs(this._protectAttrs(O));
        }
    }

    D.INVALID_VALUE = {};
    G = D.INVALID_VALUE;
    D._ATTR_CFG = [M, N, b, H, Q, X, P, S, E, J];
    D.prototype = {addAttr:function (Y, O, d) {
        var e = this, g = e._state, f, c;
        d = (S in O) ? O[S] : d;
        if (d && !e.attrAdded(Y)) {
            g.add(Y, A, O || {});
            g.add(Y, a, true);
        } else {
            if (!e.attrAdded(Y) || g.get(Y, R)) {
                O = O || {};
                c = (H in O);
                if (c) {
                    f = O.value;
                    delete O.value;
                }
                O.added = true;
                O.initializing = true;
                g.addAll(Y, O);
                if (c) {
                    e.set(Y, f);
                }
                g.remove(Y, B);
            }
        }
        return e;
    }, attrAdded:function (O) {
        return!!this._state.get(O, a);
    }, modifyAttr:function (Y, O) {
        var c = this, e, d;
        if (c.attrAdded(Y)) {
            if (c._isLazyAttr(Y)) {
                c._addLazyAttr(Y);
            }
            d = c._state;
            for (e in O) {
                if (Z[e] && O.hasOwnProperty(e)) {
                    d.add(Y, e, O[e]);
                    if (e === E) {
                        d.remove(Y, V);
                    }
                }
            }
        }
    }, removeAttr:function (O) {
        this._state.removeAll(O);
    }, get:function (O) {
        return this._getAttr(O);
    }, _isLazyAttr:function (O) {
        return this._state.get(O, A);
    }, _addLazyAttr:function (Y) {
        var c = this._state, O = c.get(Y, A);
        c.add(Y, R, true);
        c.remove(Y, A);
        this.addAttr(Y, O);
    }, set:function (O, c, Y) {
        return this._setAttr(O, c, Y);
    }, reset:function (O) {
        var c = this, Y;
        if (O) {
            if (c._isLazyAttr(O)) {
                c._addLazyAttr(O);
            }
            c.set(O, c._state.get(O, I));
        } else {
            Y = c._state.data.added;
            C.each(Y, function (d, e) {
                c.reset(e);
            }, c);
        }
        return c;
    }, _set:function (O, c, Y) {
        return this._setAttr(O, c, Y, true);
    }, _getAttr:function (c) {
        var d = this, h = c, e = d._state, f, O, g, Y;
        if (c.indexOf(W) !== -1) {
            f = c.split(W);
            c = f.shift();
        }
        if (d._tCfgs && d._tCfgs[c]) {
            Y = {};
            Y[c] = d._tCfgs[c];
            delete d._tCfgs[c];
            d._addAttrs(Y, d._tVals);
        }
        if (d._isLazyAttr(c)) {
            d._addLazyAttr(c);
        }
        g = d._getStateVal(c);
        O = e.get(c, N);
        g = (O) ? O.call(d, g, h) : g;
        g = (f) ? K.getValue(g, f) : g;
        return g;
    }, _setAttr:function (c, f, O, d) {
        var i = true, Y = this._state, g = this._stateProxy, j = Y.data, h, k, l, e;
        if (c.indexOf(W) !== -1) {
            k = c;
            l = c.split(W);
            c = l.shift();
        }
        if (this._isLazyAttr(c)) {
            this._addLazyAttr(c);
        }
        h = (!j.value || !(c in j.value));
        if (g && c in g && !this._state.get(c, J)) {
            h = false;
        }
        if (this._requireAddAttr && !this.attrAdded(c)) {
        } else {
            if (!h && !d) {
                if (Y.get(c, X)) {
                    i = false;
                }
                if (Y.get(c, P)) {
                    i = false;
                }
            }
            if (i) {
                if (!h) {
                    e = this.get(c);
                }
                if (l) {
                    f = K.setValue(C.clone(e), l, f);
                    if (f === undefined) {
                        i = false;
                    }
                }
                if (i) {
                    if (Y.get(c, B)) {
                        this._setAttrVal(c, k, e, f);
                    } else {
                        this._fireAttrChange(c, k, e, f, O);
                    }
                }
            }
        }
        return this;
    }, _fireAttrChange:function (g, f, d, c, O) {
        var i = this, e = g + U, Y = i._state, h;
        if (!Y.get(g, V)) {
            i.publish(e, {queuable:false, defaultFn:i._defAttrChangeFn, silent:true, broadcast:Y.get(g, E)});
            Y.add(g, V, true);
        }
        h = (O) ? C.merge(O) : i._ATTR_E_FACADE;
        h.type = e;
        h.attrName = g;
        h.subAttrName = f;
        h.prevVal = d;
        h.newVal = c;
        i.fire(h);
    }, _defAttrChangeFn:function (O) {
        if (!this._setAttrVal(O.attrName, O.subAttrName, O.prevVal, O.newVal)) {
            O.stopImmediatePropagation();
        } else {
            O.newVal = this._getStateVal(O.attrName);
        }
    }, _getStateVal:function (O) {
        var Y = this._stateProxy;
        return Y && (O in Y) && !this._state.get(O, J) ? Y[O] : this._state.get(O, H);
    }, _setStateVal:function (O, c) {
        var Y = this._stateProxy;
        if (Y && (O in Y) && !this._state.get(O, J)) {
            Y[O] = c;
        } else {
            this._state.add(O, H, c);
        }
    }, _setAttrVal:function (l, k, h, f) {
        var n = this, i = true, c = n._state, d = c.get(l, b), g = c.get(l, M), j = c.get(l, B), m = this._getStateVal(l), Y = k || l, e, O;
        if (d) {
            O = d.call(n, f, Y);
            if (!O && j) {
                f = c.get(l, T);
                O = true;
            }
        }
        if (!d || O) {
            if (g) {
                e = g.call(n, f, Y);
                if (e === G) {
                    i = false;
                } else {
                    if (e !== undefined) {
                        f = e;
                    }
                }
            }
            if (i) {
                if (!k && (f === m) && !F.isObject(f)) {
                    i = false;
                } else {
                    if (c.get(l, I) === undefined) {
                        c.add(l, I, f);
                    }
                    n._setStateVal(l, f);
                }
            }
        } else {
            i = false;
        }
        return i;
    }, setAttrs:function (O, Y) {
        return this._setAttrs(O, Y);
    }, _setAttrs:function (Y, c) {
        for (var O in Y) {
            if (Y.hasOwnProperty(O)) {
                this.set(O, Y[O]);
            }
        }
        return this;
    }, getAttrs:function (O) {
        return this._getAttrs(O);
    }, _getAttrs:function (d) {
        var f = this, h = {}, e, Y, O, g, c = (d === true);
        d = (d && !c) ? d : K.keys(f._state.data.added);
        for (e = 0, Y = d.length; e < Y; e++) {
            O = d[e];
            g = f.get(O);
            if (!c || f._getStateVal(O) != f._state.get(O, I)) {
                h[O] = f.get(O);
            }
        }
        return h;
    }, addAttrs:function (O, Y, c) {
        var d = this;
        if (O) {
            d._tCfgs = O;
            d._tVals = d._normAttrVals(Y);
            d._addAttrs(O, d._tVals, c);
            d._tCfgs = d._tVals = null;
        }
        return d;
    }, _addAttrs:function (Y, c, d) {
        var f = this, O, e, g;
        for (O in Y) {
            if (Y.hasOwnProperty(O)) {
                e = Y[O];
                e.defaultValue = e.value;
                g = f._getAttrInitVal(O, e, f._tVals);
                if (g !== undefined) {
                    e.value = g;
                }
                if (f._tCfgs[O]) {
                    delete f._tCfgs[O];
                }
                f.addAttr(O, e, d);
            }
        }
    }, _protectAttrs:function (Y) {
        if (Y) {
            Y = C.merge(Y);
            for (var O in Y) {
                if (Y.hasOwnProperty(O)) {
                    Y[O] = C.merge(Y[O]);
                }
            }
        }
        return Y;
    }, _normAttrVals:function (O) {
        return(O) ? C.merge(O) : null;
    }, _getAttrInitVal:function (O, Y, c) {
        var d = (!Y[P] && c && c.hasOwnProperty(O)) ? d = c[O] : (Y[Q]) ? Y[Q].call(this) : Y[H];
        return d;
    }};
    C.mix(D, L, false, null, 1);
    C.Attribute = D;
}, "3.0.0", {requires:["event-custom"]});
YUI.add("attribute-complex", function (B) {
    var A = B.Object, C = ".";
    B.Attribute.Complex = function () {
    };
    B.Attribute.Complex.prototype = {_normAttrVals:function (G) {
        var I = {}, H = {}, J, D, F, E;
        if (G) {
            for (E in G) {
                if (G.hasOwnProperty(E)) {
                    if (E.indexOf(C) !== -1) {
                        J = E.split(C);
                        D = J.shift();
                        F = H[D] = H[D] || [];
                        F[F.length] = {path:J, value:G[E]};
                    } else {
                        I[E] = G[E];
                    }
                }
            }
            return{simple:I, complex:H};
        } else {
            return null;
        }
    }, _getAttrInitVal:function (K, I, M) {
        var E = (I.valueFn) ? I.valueFn.call(this) : I.value, D, F, H, G, N, L, J;
        if (!I.readOnly && M) {
            D = M.simple;
            if (D && D.hasOwnProperty(K)) {
                E = D[K];
            }
            F = M.complex;
            if (F && F.hasOwnProperty(K)) {
                J = F[K];
                for (H = 0, G = J.length; H < G; ++H) {
                    N = J[H].path;
                    L = J[H].value;
                    A.setValue(E, N, L);
                }
            }
        }
        return E;
    }};
    B.mix(B.Attribute, B.Attribute.Complex, true, null, 1);
}, "3.0.0", {requires:["attribute-base"]});
YUI.add("attribute", function (A) {
}, "3.0.0", {use:["attribute-base", "attribute-complex"]});