/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("console-filters", function (C) {
    var Q = C.ClassNameManager.getClassName, G = "console", B = "filters", L = "filter", F = "category", D = "source", E = "category.", M = "source.", P = "host", H = "parentNode", R = "checked", O = "defaultVisibility", N = ".", T = "", S = N + C.Console.CHROME_CLASSES.console_bd_class, I = N + C.Console.CHROME_CLASSES.console_ft_class, A = "input[type=checkbox].", J = C.Lang.isString;

    function K() {
        K.superclass.constructor.apply(this, arguments);
    }

    C.mix(K, {NAME:"consoleFilters", NS:L, CATEGORIES_TEMPLATE:'<div class="{categories}"></div>', SOURCES_TEMPLATE:'<div class="{sources}"></div>', FILTER_TEMPLATE:'<label class="{filter_label}">' + '<input type="checkbox" value="{filter_name}" ' + 'class="{filter} {filter_class}"> {filter_name}' + "</label>&#8201;", CHROME_CLASSES:{categories:Q(G, B, "categories"), sources:Q(G, B, "sources"), category:Q(G, L, F), source:Q(G, L, D), filter:Q(G, L), filter_label:Q(G, L, "label")}, ATTRS:{defaultVisibility:{value:true, validator:C.Lang.isBoolean}, category:{value:{}, validator:function (V, U) {
        return this._validateCategory(U, V);
    }}, source:{value:{}, validator:function (V, U) {
        return this._validateSource(U, V);
    }}, cacheLimit:{value:Number.POSITIVE_INFINITY, setter:function (U) {
        if (C.Lang.isNumber(U)) {
            this._cacheLimit = U;
            return U;
        } else {
            return C.Attribute.INVALID_VALUE;
        }
    }}}});
    C.extend(K, C.Plugin.Base, {_entries:null, _cacheLimit:Number.POSITIVE_INFINITY, _categories:null, _sources:null, initializer:function () {
        this._entries = [];
        this.get(P).on("entry", this._onEntry, this);
        this.doAfter("renderUI", this.renderUI);
        this.doAfter("syncUI", this.syncUI);
        this.doAfter("bindUI", this.bindUI);
        this.doAfter("clearConsole", this._afterClearConsole);
        if (this.get(P).get("rendered")) {
            this.renderUI();
            this.syncUI();
            this.bindUI();
        }
        this.after("cacheLimitChange", this._afterCacheLimitChange);
    }, destructor:function () {
        this._entries = [];
        if (this._categories) {
            this._categories.get(H).removeChild(this._categories);
        }
        if (this._sources) {
            this._sources.get(H).removeChild(this._sources);
        }
    }, renderUI:function () {
        var V = this.get(P).get("contentBox").query(I), U;
        if (V) {
            U = C.substitute(K.CATEGORIES_TEMPLATE, K.CHROME_CLASSES);
            this._categories = V.appendChild(C.Node.create(U));
            U = C.substitute(K.SOURCES_TEMPLATE, K.CHROME_CLASSES);
            this._sources = V.appendChild(C.Node.create(U));
        }
    }, bindUI:function () {
        this._categories.on("click", C.bind(this._onCategoryCheckboxClick, this));
        this._sources.on("click", C.bind(this._onSourceCheckboxClick, this));
        this.after("categoryChange", this._afterCategoryChange);
        this.after("sourceChange", this._afterSourceChange);
    }, syncUI:function () {
        C.each(this.get(F), function (V, U) {
            this._uiSetCheckbox(F, U, V);
        }, this);
        C.each(this.get(D), function (V, U) {
            this._uiSetCheckbox(D, U, V);
        }, this);
        this.refreshConsole();
    }, _onEntry:function (X) {
        this._entries.push(X.message);
        var U = E + X.message.category, Z = M + X.message.source, V = this.get(U), a = this.get(Z), W = this._entries.length - this._cacheLimit, Y;
        if (W > 0) {
            this._entries.splice(0, W);
        }
        if (V === undefined) {
            Y = this.get(O);
            this.set(U, Y);
            V = Y;
        }
        if (a === undefined) {
            Y = this.get(O);
            this.set(Z, Y);
            a = Y;
        }
        if (!V || !a) {
            X.preventDefault();
        }
    }, _afterClearConsole:function () {
        this._entries = [];
    }, _afterCategoryChange:function (W) {
        var U = W.subAttrName.replace(/category\./, T), V = W.prevVal, X = W.newVal;
        if (!U || V[U] !== undefined) {
            this.refreshConsole();
            this._filterBuffer();
        }
        if (U && !W.fromUI) {
            this._uiSetCheckbox(F, U, X[U]);
        }
    }, _afterSourceChange:function (V) {
        var X = V.subAttrName.replace(/source\./, T), U = V.prevVal, W = V.newVal;
        if (!X || U[X] !== undefined) {
            this.refreshConsole();
            this._filterBuffer();
        }
        if (X && !V.fromUI) {
            this._uiSetCheckbox(D, X, W[X]);
        }
    }, _filterBuffer:function () {
        var V = this.get(F), X = this.get(D), U = this.get(P).buffer, Y = null, W;
        for (W = U.length - 1; W >= 0; --W) {
            if (!V[U[W].category] || !X[U[W].source]) {
                Y = Y || W;
            } else {
                if (Y) {
                    U.splice(W, (Y - W));
                    Y = null;
                }
            }
        }
        if (Y) {
            U.splice(0, Y + 1);
        }
    }, _afterCacheLimitChange:function (U) {
        if (isFinite(U.newVal)) {
            var V = this._entries.length - U.newVal;
            if (V > 0) {
                this._entries.splice(0, V);
            }
        }
    }, refreshConsole:function () {
        var Y = this._entries, c = this.get(P), Z = c.get("contentBox").query(S), V = c.get("consoleLimit"), b = this.get(F), U = this.get(D), W = [], X, a;
        if (Z) {
            c._cancelPrintLoop();
            for (X = Y.length - 1; X >= 0 && V >= 0; --X) {
                a = Y[X];
                if (b[a.category] && U[a.source]) {
                    W.unshift(a);
                    --V;
                }
            }
            Z.set("innerHTML", T);
            c.buffer = W;
            c.printBuffer();
        }
    }, _uiSetCheckbox:function (V, Y, X) {
        if (V && Y) {
            var U = V === F ? this._categories : this._sources, a = A + Q(G, L, Y), Z = U.query(a), W;
            if (!Z) {
                W = this.get(P);
                this._createCheckbox(U, Y);
                Z = U.query(a);
                W._uiSetHeight(W.get("height"));
            }
            Z.set(R, X);
        }
    }, _onCategoryCheckboxClick:function (W) {
        var V = W.target, U;
        if (V.hasClass(K.CHROME_CLASSES.filter)) {
            U = V.get("value");
            if (U && U in this.get(F)) {
                this.set(E + U, V.get(R), {fromUI:true});
            }
        }
    }, _onSourceCheckboxClick:function (V) {
        var U = V.target, W;
        if (U.hasClass(K.CHROME_CLASSES.filter)) {
            W = U.get("value");
            if (W && W in this.get(D)) {
                this.set(M + W, U.get(R), {fromUI:true});
            }
        }
    }, hideCategory:function (V, U) {
        if (J(U)) {
            C.Array.each(arguments, arguments.callee, this);
        } else {
            this.set(E + V, false);
        }
    }, showCategory:function (V, U) {
        if (J(U)) {
            C.Array.each(arguments, arguments.callee, this);
        } else {
            this.set(E + V, true);
        }
    }, hideSource:function (V, U) {
        if (J(U)) {
            C.Array.each(arguments, arguments.callee, this);
        } else {
            this.set(M + V, false);
        }
    }, showSource:function (V, U) {
        if (J(U)) {
            C.Array.each(arguments, arguments.callee, this);
        } else {
            this.set(M + V, true);
        }
    }, _createCheckbox:function (U, V) {
        var X = C.merge(K.CHROME_CLASSES, {filter_name:V, filter_class:Q(G, L, V)}), W = C.Node.create(C.substitute(K.FILTER_TEMPLATE, X));
        U.appendChild(W);
    }, _validateCategory:function (U, V) {
        return C.Lang.isObject(V, true) && U.split(/\./).length < 3;
    }, _validateSource:function (V, U) {
        return C.Lang.isObject(U, true) && V.split(/\./).length < 3;
    }});
    C.namespace("Plugin").ConsoleFilters = K;
}, "3.0.0", {requires:["console", "plugin"]});