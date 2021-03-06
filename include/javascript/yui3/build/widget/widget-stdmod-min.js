/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("widget-stdmod", function (A) {
    var D = A.Lang, P = A.Node, c = A.NodeList, W = A.UA, C = A.Widget, B = "", j = "hd", h = "bd", H = "ft", e = "header", m = "body", k = "footer", q = "fillHeight", K = "stdmod", t = "px", T = "Node", i = "Content", o = "innerHTML", d = "firstChild", G = "childNodes", l = "createDocumentFragment", M = "ownerDocument", U = "contentBox", p = "boundingBox", Z = "height", g = "offsetHeight", X = "auto", J = "headerContentChange", b = "bodyContentChange", N = "footerContentChange", R = "fillHeightChange", S = "HeightChange", r = "contentUpdate", V = "renderUI", f = "bindUI", E = "syncUI", Q = A.Widget.UI_SRC;

    function s(L) {
        this._stdModNode = this.get(U);
        A.after(this._renderUIStdMod, this, V);
        A.after(this._bindUIStdMod, this, f);
        A.after(this._syncUIStdMod, this, E);
    }

    s.HEADER = e;
    s.BODY = m;
    s.FOOTER = k;
    s.AFTER = "after";
    s.BEFORE = "before";
    s.REPLACE = "replace";
    var I = s.HEADER, a = s.BODY, O = s.FOOTER, n = s.AFTER, F = s.BEFORE;
    s.ATTRS = {headerContent:{value:null}, footerContent:{value:null}, bodyContent:{value:null}, fillHeight:{value:s.BODY, validator:function (L) {
        return this._validateFillHeight(L);
    }}};
    s.HTML_PARSER = {headerContent:function (L) {
        return this._parseStdModHTML(I);
    }, bodyContent:function (L) {
        return this._parseStdModHTML(a);
    }, footerContent:function (L) {
        return this._parseStdModHTML(O);
    }};
    s.SECTION_CLASS_NAMES = {header:C.getClassName(j), body:C.getClassName(h), footer:C.getClassName(H)};
    s.TEMPLATES = {header:'<div class="' + s.SECTION_CLASS_NAMES[I] + '"></div>', body:'<div class="' + s.SECTION_CLASS_NAMES[a] + '"></div>', footer:'<div class="' + s.SECTION_CLASS_NAMES[O] + '"></div>'};
    s.prototype = {_syncUIStdMod:function () {
        this._uiSetStdMod(I, this.get(I + i));
        this._uiSetStdMod(a, this.get(a + i));
        this._uiSetStdMod(O, this.get(O + i));
        this._uiSetFillHeight(this.get(q));
    }, _renderUIStdMod:function () {
        this._stdModNode.addClass(C.getClassName(K));
    }, _bindUIStdMod:function () {
        this.after(J, this._afterHeaderChange);
        this.after(b, this._afterBodyChange);
        this.after(N, this._afterFooterChange);
        this.after(R, this._afterFillHeightChange);
        this.after(S, this._fillHeight);
        this.after(r, this._fillHeight);
    }, _afterHeaderChange:function (L) {
        if (L.src !== Q) {
            this._uiSetStdMod(I, L.newVal, L.stdModPosition);
        }
    }, _afterBodyChange:function (L) {
        if (L.src !== Q) {
            this._uiSetStdMod(a, L.newVal, L.stdModPosition);
        }
    }, _afterFooterChange:function (L) {
        if (L.src !== Q) {
            this._uiSetStdMod(O, L.newVal, L.stdModPosition);
        }
    }, _afterFillHeightChange:function (L) {
        this._uiSetFillHeight(L.newVal);
    }, _validateFillHeight:function (L) {
        return!L || L == s.BODY || L == s.HEADER || L == s.FOOTER;
    }, _uiSetFillHeight:function (u) {
        var Y = this.getStdModNode(u);
        var L = this._currFillNode;
        if (L && Y !== L) {
            L.setStyle(Z, B);
        }
        if (Y) {
            this._currFillNode = Y;
        }
        this._fillHeight();
    }, _fillHeight:function () {
        if (this.get(q)) {
            var L = this.get(Z);
            if (L != B && L != X) {
                this.fillHeight(this._currFillNode);
            }
        }
    }, _uiSetStdMod:function (v, u, L) {
        if (u) {
            var Y = this.getStdModNode(v) || this._renderStdMod(v);
            if (u instanceof P || u instanceof c) {
                this._addNodeRef(Y, u, L);
            } else {
                this._addNodeHTML(Y, u, L);
            }
            this.set(v + i, this._getStdModContent(v), {src:Q});
            this.fire(r);
        }
    }, _renderStdMod:function (u) {
        var L = this.get(U), Y = this._findStdModSection(u);
        if (!Y) {
            Y = this._getStdModTemplate(u);
        }
        this._insertStdModSection(L, u, Y);
        this[u + T] = Y;
        return this[u + T];
    }, _insertStdModSection:function (L, v, u) {
        var Y = L.get(d);
        if (v === O || !Y) {
            L.appendChild(u);
        } else {
            if (v === I) {
                L.insertBefore(u, Y);
            } else {
                var w = this[O + T];
                if (w) {
                    L.insertBefore(u, w);
                } else {
                    L.appendChild(u);
                }
            }
        }
    }, _getStdModTemplate:function (L) {
        return P.create(s.TEMPLATES[L], this._stdModNode.get(M));
    }, _addNodeHTML:function (u, Y, L) {
        if (L == n) {
            u.set(o, u.get(o) + Y);
        } else {
            if (L == F) {
                u.set(o, Y + u.get(o));
            } else {
                u.set(o, Y);
            }
        }
    }, _addNodeRef:function (x, v, Y) {
        var L = true, u, w;
        if (Y == F) {
            var y = x.get(d);
            if (y) {
                if (v instanceof c) {
                    for (u = v.size() - 1; u >= 0; --u) {
                        x.insertBefore(v.item(u), y);
                    }
                } else {
                    x.insertBefore(v, y);
                }
                L = false;
            }
        } else {
            if (Y != n) {
                x.set(o, B);
            }
        }
        if (L) {
            if (v instanceof c) {
                for (u = 0, w = v.size(); u < w; ++u) {
                    x.appendChild(v.item(u));
                }
            } else {
                x.appendChild(v);
            }
        }
    }, _getPreciseHeight:function (u) {
        var L = (u) ? u.get(g) : 0, v = "getBoundingClientRect";
        if (u && u.hasMethod(v)) {
            var Y = u.invoke(v);
            if (Y) {
                L = Y.bottom - Y.top;
            }
        }
        return L;
    }, _findStdModSection:function (L) {
        return this.get(U).query("> ." + s.SECTION_CLASS_NAMES[L]);
    }, _parseStdModHTML:function (x) {
        var w = this._findStdModSection(x), u, Y;
        if (w) {
            u = w.get(M).invoke(l);
            Y = w.get(G);
            for (var L = Y.size() - 1; L >= 0; L--) {
                var v = u.get(d);
                if (v) {
                    u.insertBefore(Y.item(L), v);
                } else {
                    u.appendChild(Y.item(L));
                }
            }
            return u;
        }
        return null;
    }, _getStdModContent:function (L) {
        return(this[L + T]) ? this[L + T].get(G) : null;
    }, setStdModContent:function (u, Y, L) {
        this.set(u + i, Y, {stdModPosition:L});
    }, getStdModNode:function (L) {
        return this[L + T] || null;
    }, fillHeight:function (u) {
        if (u) {
            var y = this.get(p), AA = [this.headerNode, this.bodyNode, this.footerNode], Y, AB = 0, AC = 0, x = 0, w = false;
            for (var z = 0, v = AA.length; z < v; z++) {
                Y = AA[z];
                if (Y) {
                    if (Y !== u) {
                        AC += this._getPreciseHeight(Y);
                    } else {
                        w = true;
                    }
                }
            }
            if (w) {
                if (W.ie || W.opera) {
                    u.setStyle(Z, 0 + t);
                }
                AB = parseInt(y.getComputedStyle(Z), 10);
                if (D.isNumber(AB)) {
                    x = AB - AC;
                    if (x >= 0) {
                        u.setStyle(Z, x + t);
                    }
                    var L = this.get(U).get(g);
                    if (L != AB) {
                        x = x - (L - AB);
                        u.setStyle(Z, x + t);
                    }
                }
            }
        }
    }};
    A.WidgetStdMod = s;
}, "3.0.0", {requires:["widget"]});