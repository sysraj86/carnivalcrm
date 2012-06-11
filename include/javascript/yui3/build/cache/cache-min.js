/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("cache", function (C) {
    var A = C.Lang, B = function () {
        B.superclass.constructor.apply(this, arguments);
    };
    C.mix(B, {NS:"cache", NAME:"cache", ATTRS:{max:{value:0, validator:function (D) {
        return(A.isNumber(D));
    }, setter:function (E) {
        var D = this._entries;
        if (E > 0) {
            if (D) {
                while (D.length > E) {
                    D.shift();
                }
            }
        } else {
            this._entries = [];
        }
        return E;
    }}, size:{readOnly:true, getter:function () {
        return this._entries.length;
    }}, uniqueKeys:{value:false, validator:function (D) {
        return(A.isBoolean(D));
    }}, entries:{readOnly:true, getter:function () {
        return this._entries;
    }}}});
    C.extend(B, C.Plugin.Base, {_entries:null, initializer:function (D) {
        this.publish("add", {defaultFn:this._defAddFn});
        this.publish("flush", {defaultFn:this._defFlushFn});
        this._entries = [];
    }, destructor:function () {
        this._entries = null;
    }, _defAddFn:function (G) {
        var E = this._entries, D = this.get("max"), F = G.entry;
        if (this.get("uniqueKeys") && (this.retrieve(G.entry.request))) {
            E.shift();
        }
        while (E.length >= D) {
            E.shift();
        }
        E[E.length] = F;
    }, _defFlushFn:function (D) {
        this._entries = [];
    }, _isMatch:function (E, D) {
        return(E === D.request);
    }, add:function (E, D, F) {
        if (this.get("entries") && (this.get("max") > 0) && (A.isValue(E) || A.isNull(E) || A.isUndefined(E))) {
            this.fire("add", {entry:{request:E, response:D, payload:F}});
        } else {
        }
    }, flush:function () {
        this.fire("flush");
    }, retrieve:function (H) {
        var D = this._entries, G = D.length, F = null, E = G - 1;
        if ((this.get("max") > 0) && (G > 0)) {
            this.fire("request", {request:H});
            for (; E >= 0; E--) {
                F = D[E];
                if (this._isMatch(H, F)) {
                    this.fire("retrieve", {entry:F});
                    if (E < G - 1) {
                        D.splice(E, 1);
                        D[D.length] = F;
                    }
                    return F;
                }
            }
        }
        return null;
    }});
    C.Cache = B;
}, "3.0.0", {requires:["plugin"]});