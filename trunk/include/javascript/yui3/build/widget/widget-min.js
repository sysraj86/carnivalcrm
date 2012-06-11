/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("widget", function (D) {
    var Q = D.Lang, K = D.Object, g = D.Node, M = D.ClassNameManager, a = "widget", J = "content", c = "visible", e = "hidden", f = "disabled", T = "focused", G = "width", X = "height", i = "", Z = "-", h = "boundingBox", U = "contentBox", P = "parentNode", B = "firstChild", b = "ownerDocument", d = "body", C = "tabIndex", F = "locale", H = "initValue", R = "id", S = "render", A = "rendered", W = "destroyed", I = "contentUpdate", V = {};

    function E(L) {
        this._yuid = D.guid(a);
        this._strings = {};
        E.superclass.constructor.apply(this, arguments);
    }

    E._buildCfg = {aggregates:["HTML_PARSER"]};
    E.NAME = a;
    E.UI_SRC = "ui";
    var N = E.UI_SRC;
    E.ATTRS = {rendered:{value:false, readOnly:true}, boundingBox:{value:null, setter:function (L) {
        return this._setBoundingBox(L);
    }, writeOnce:true}, contentBox:{value:null, setter:function (L) {
        return this._setContentBox(L);
    }, writeOnce:true}, tabIndex:{value:0, validator:function (L) {
        return(Q.isNumber(L) || Q.isNull(L));
    }}, focused:{value:false, readOnly:true}, disabled:{value:false}, visible:{value:true}, height:{value:i}, width:{value:i}, moveStyles:{value:false}, locale:{value:"en"}, strings:{setter:function (L) {
        return this._setStrings(L, this.get(F));
    }, getter:function () {
        return this.getStrings(this.get(F));
    }}};
    E._NAME_LOWERCASE = E.NAME.toLowerCase();
    E.getClassName = function () {
        var L = D.Array(arguments, 0, true);
        L.splice(0, 0, this._NAME_LOWERCASE);
        return M.getClassName.apply(M, L);
    };
    E.getByNode = function (L) {
        var O, Y = E.getClassName();
        L = g.get(L);
        if (L) {
            L = (L.hasClass(Y)) ? L : L.ancestor("." + Y);
            if (L) {
                O = V[L.get(R)];
            }
        }
        return O || null;
    };
    E.HTML_PARSER = {};
    D.extend(E, D.Base, {getClassName:function () {
        var L = D.Array(arguments, 0, true);
        L.splice(0, 0, this._name);
        return M.getClassName.apply(M, L);
    }, initializer:function (L) {
        this.publish(I, {preventable:false});
        this._name = this.constructor.NAME.toLowerCase();
        var Y = this.get(h).get(R);
        if (Y) {
            V[Y] = this;
        }
        var O = this._parseHTML(this.get(U));
        if (O) {
            D.aggregate(L, O, false);
        }
    }, destructor:function () {
        var L = this.get(h);
        D.Event.purgeElement(L, true);
        var O = L.get(R);
        if (O && O in V) {
            delete V[O];
        }
    }, render:function (L) {
        if (this.get(W)) {
            return;
        }
        if (!this.get(A)) {
            this.publish(S, {queuable:false, defaultFn:this._defRenderFn});
            L = (L) ? g.get(L) : null;
            if (L && !L.inDoc()) {
                L = null;
            }
            this.fire(S, {parentNode:L});
        }
        return this;
    }, _defRenderFn:function (L) {
        this._renderUI(L.parentNode);
        this._bindUI();
        this._syncUI();
        this.renderer();
        this._set(A, true);
    }, renderer:function () {
        this.renderUI();
        this.bindUI();
        this.syncUI();
    }, bindUI:function () {
    }, renderUI:function () {
    }, syncUI:function () {
    }, hide:function () {
        return this.set(c, false);
    }, show:function () {
        return this.set(c, true);
    }, focus:function () {
        return this._set(T, true);
    }, blur:function () {
        return this._set(T, false);
    }, enable:function () {
        return this.set(f, false);
    }, disable:function () {
        return this.set(f, true);
    }, _parseHTML:function (O) {
        var L = this._getHtmlParser(), Y, j;
        if (L && O && O.hasChildNodes()) {
            K.each(L, function (m, l, n) {
                j = null;
                if (Q.isFunction(m)) {
                    j = m.call(this, O);
                } else {
                    if (Q.isArray(m)) {
                        j = O.queryAll(m[0]);
                    } else {
                        j = O.query(m);
                    }
                }
                if (j !== null && j !== undefined) {
                    Y = Y || {};
                    Y[l] = j;
                }
            }, this);
        }
        return Y;
    }, _moveStyles:function (k, m) {
        var j = this.WRAP_STYLES, n = k.getStyle("position"), O = this.get(U), l = [0, 0], Y, L;
        if (!this.get("height")) {
            Y = O.get("offsetHeight");
        }
        if (!this.get("width")) {
            L = O.get("offsetWidth");
        }
        if (n === "absolute") {
            l = k.getXY();
            m.setStyles({right:"auto", bottom:"auto"});
            k.setStyles({right:"auto", bottom:"auto"});
        }
        D.each(j, function (p, o) {
            var q = k.getStyle(o);
            m.setStyle(o, q);
            if (p === false) {
                k.setStyle(o, "");
            } else {
                k.setStyle(o, p);
            }
        });
        if (n === "absolute") {
            m.setXY(l);
        }
        if (Y) {
            this.set("height", Y);
        }
        if (L) {
            this.set("width", L);
        }
    }, _renderBox:function (O) {
        var Y = this.get(U), j = this.get(h), k = j.get(b) || Y.get(b), L;
        if (!j.compareTo(Y.get(P))) {
            if (this.get("moveStyles")) {
                this._moveStyles(Y, j);
            }
            if (Y.inDoc(k)) {
                Y.get(P).replaceChild(j, Y);
            }
            j.appendChild(Y);
        }
        if (!j.inDoc(k) && !O) {
            L = g.get(d);
            if (L.get(B)) {
                L.insertBefore(j, L.get(B));
            } else {
                L.appendChild(j);
            }
        } else {
            if (O && !O.compareTo(j.get(P))) {
                O.appendChild(j);
            }
        }
    }, _setBoundingBox:function (L) {
        return this._setBox(L, this.BOUNDING_TEMPLATE);
    }, _setContentBox:function (L) {
        return this._setBox(L, this.CONTENT_TEMPLATE);
    }, _setBox:function (Y, O) {
        Y = g.get(Y) || g.create(O);
        var L = D.stamp(Y);
        if (!Y.get(R)) {
            Y.set(R, L);
        }
        return Y;
    }, _renderUI:function (L) {
        this._renderBoxClassNames();
        this._renderBox(L);
    }, _renderBoxClassNames:function () {
        var k = this._getClasses(), Y = this.get(h), L = this.get(U), O, j;
        Y.addClass(E.getClassName());
        for (j = k.length - 3; j >= 0; j--) {
            O = k[j].NAME;
            if (O) {
                Y.addClass(M.getClassName(O.toLowerCase()));
            }
        }
        L.addClass(this.getClassName(J));
    }, _bindUI:function () {
        this.after("visibleChange", this._afterVisibleChange);
        this.after("disabledChange", this._afterDisabledChange);
        this.after("heightChange", this._afterHeightChange);
        this.after("widthChange", this._afterWidthChange);
        this.after("focusedChange", this._afterFocusedChange);
        this._bindDOMListeners();
    }, _bindDOMListeners:function () {
        var L = this.get(h).get("ownerDocument");
        L.on("focus", this._onFocus, this);
        if (D.UA.webkit) {
            L.on("mousedown", this._onDocMouseDown, this);
        }
    }, _syncUI:function () {
        this._uiSetVisible(this.get(c));
        this._uiSetDisabled(this.get(f));
        this._uiSetHeight(this.get(X));
        this._uiSetWidth(this.get(G));
        this._uiSetFocused(this.get(T));
        this._uiSetTabIndex(this.get(C));
    }, _uiSetHeight:function (L) {
        if (Q.isNumber(L)) {
            L = L + this.DEF_UNIT;
        }
        this.get(h).setStyle(X, L);
    }, _uiSetWidth:function (L) {
        if (Q.isNumber(L)) {
            L = L + this.DEF_UNIT;
        }
        this.get(h).setStyle(G, L);
    }, _uiSetVisible:function (Y) {
        var O = this.get(h), L = this.getClassName(e);
        if (Y === true) {
            O.removeClass(L);
        } else {
            O.addClass(L);
        }
    }, _uiSetDisabled:function (Y) {
        var O = this.get(h), L = this.getClassName(f);
        if (Y === true) {
            O.addClass(L);
        } else {
            O.removeClass(L);
        }
    }, _uiSetTabIndex:function (O) {
        var L = this.get(h);
        if (Q.isNumber(O)) {
            L.set(C, O);
        } else {
            L.removeAttribute(C);
        }
    }, _uiSetFocused:function (j, Y) {
        var O = this.get(h), L = this.getClassName(T);
        if (j === true) {
            O.addClass(L);
            if (Y !== N) {
                O.focus();
            }
        } else {
            O.removeClass(L);
            if (Y !== N) {
                O.blur();
            }
        }
    }, _afterVisibleChange:function (L) {
        this._uiSetVisible(L.newVal);
    }, _afterDisabledChange:function (L) {
        this._uiSetDisabled(L.newVal);
    }, _afterHeightChange:function (L) {
        this._uiSetHeight(L.newVal);
    }, _afterWidthChange:function (L) {
        this._uiSetWidth(L.newVal);
    }, _afterFocusedChange:function (L) {
        this._uiSetFocused(L.newVal, L.src);
    }, _onDocMouseDown:function (L) {
        if (this._hasDOMFocus) {
            this._onFocus(L);
        }
    }, _onFocus:function (O) {
        var j = O.target, Y = this.get(h), L = (Y.compareTo(j) || Y.contains(j));
        this._hasDOMFocus = L;
        this._set(T, L, {src:N});
    }, toString:function () {
        return this.constructor.NAME + "[" + this._yuid + "]";
    }, DEF_UNIT:"px", CONTENT_TEMPLATE:"<div></div>", BOUNDING_TEMPLATE:"<div></div>", WRAP_STYLES:{height:"100%", width:"100%", zIndex:false, position:"static", top:"0", left:"0", bottom:"", right:"", padding:"", margin:""}, _setStrings:function (O, L) {
        var Y = this._strings;
        L = L.toLowerCase();
        if (!Y[L]) {
            Y[L] = {};
        }
        D.aggregate(Y[L], O, true);
        return Y[L];
    }, _getStrings:function (L) {
        return this._strings[L.toLowerCase()];
    }, getStrings:function (p) {
        p = (p || this.get(F)).toLowerCase();
        var n = this.getDefaultLocale().toLowerCase(), O = this._getStrings(n), o = (O) ? D.merge(O) : {}, m = p.split(Z);
        if (p !== n || m.length > 1) {
            var L = "";
            for (var j = 0, Y = m.length; j < Y; ++j) {
                L += m[j];
                var k = this._getStrings(L);
                if (k) {
                    D.aggregate(o, k, true);
                }
                L += Z;
            }
        }
        return o;
    }, getString:function (Y, O) {
        O = (O || this.get(F)).toLowerCase();
        var j = (this.getDefaultLocale()).toLowerCase(), k = this._getStrings(j) || {}, l = k[Y], L = O.lastIndexOf(Z);
        if (O !== j || L != -1) {
            do {
                k = this._getStrings(O);
                if (k && Y in k) {
                    l = k[Y];
                    break;
                }
                L = O.lastIndexOf(Z);
                if (L != -1) {
                    O = O.substring(0, L);
                }
            } while (L != -1);
        }
        return l;
    }, getDefaultLocale:function () {
        return this._conf.get(F, H);
    }, _strings:null, _getHtmlParser:function () {
        if (!this._HTML_PARSER) {
            var O = this._getClasses(), j = {}, L, Y;
            for (L = O.length - 1; L >= 0; L--) {
                Y = O[L].HTML_PARSER;
                if (Y) {
                    D.mix(j, Y, true);
                }
            }
            this._HTML_PARSER = j;
        }
        return this._HTML_PARSER;
    }});
    D.Widget = E;
}, "3.0.0", {requires:["attribute", "event-focus", "base", "node", "classnamemanager"]});