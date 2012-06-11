/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('compat', function (Y) {
    var COMPAT_ARG = '~yui|2|compat~';
    if (window.YAHOO != YUI) {
        var o = (window.YAHOO) ? YUI.merge(window.YAHOO) : null;
        window.YAHOO = YUI;
        if (o) {
            Y.mix(Y, o);
        }
    }
    Y.namespace("util", "widget", "example");
    Y.env = (Y.env) ? Y.mix(Y.env, Y.Env) : Y.Env;
    Y.lang = (Y.lang) ? Y.mix(Y.lang, Y.Lang) : Y.Lang;
    Y.env.ua = Y.UA;
    Y.mix(Y.env, {modules:[], listeners:[], getVersion:function (name) {
        return this.Env.modules[name] || null;
    }});
    var L = Y.lang;
    Y.mix(L, {augmentObject:function (r, s) {
        var a = arguments, wl = (a.length > 2) ? Y.Array(a, 2, true) : null;
        return Y.mix(r, s, (wl), wl);
    }, augmentProto:function (r, s) {
        var a = arguments, wl = (a.length > 2) ? Y.Array(a, 2, true) : null;
        return Y.mix(r, s, (wl), wl, 1);
    }, extend:Y.extend, merge:Y.merge}, true);
    L.augment = L.augmentProto;
    L.hasOwnProperty = function (o, k) {
        return(o.hasOwnProperty(k));
    };
    Y.augmentProto = L.augmentProto;
    Y.mix(Y, {register:function (name, mainClass, data) {
        var mods = Y.Env.modules;
        if (!mods[name]) {
            mods[name] = {versions:[], builds:[]};
        }
        var m = mods[name], v = data.version, b = data.build, ls = Y.Env.listeners;
        m.name = name;
        m.version = v;
        m.build = b;
        m.versions.push(v);
        m.builds.push(b);
        m.mainClass = mainClass;
        for (var i = 0; i < ls.length; i = i + 1) {
            ls[i](m);
        }
        if (mainClass) {
            mainClass.VERSION = v;
            mainClass.BUILD = b;
        } else {
        }
    }});
    if ("undefined" !== typeof YAHOO_config) {
        var l = YAHOO_config.listener, ls = Y.Env.listeners, unique = true, i;
        if (l) {
            for (i = 0; i < ls.length; i = i + 1) {
                if (ls[i] == l) {
                    unique = false;
                    break;
                }
            }
            if (unique) {
                ls.push(l);
            }
        }
    }
    Y.register("yahoo", Y, {version:"3.0.0", build:"1549"});
    if (Y.Event) {
        var o = {isSafari:Y.UA.webkit, webkit:Y.UA.webkit, webkitKeymap:{63232:38, 63233:40, 63234:37, 63235:39, 63276:33, 63277:34, 25:9}, isIE:Y.UA.ie, _getScrollLeft:function () {
            return this._getScroll()[1];
        }, _getScrollTop:function () {
            return this._getScroll()[0];
        }, _getScroll:function () {
            var d = Y.config.doc, dd = d.documentElement, db = d.body;
            if (dd && (dd.scrollTop || dd.scrollLeft)) {
                return[dd.scrollTop, dd.scrollLeft];
            } else if (db) {
                return[db.scrollTop, db.scrollLeft];
            } else {
                return[0, 0];
            }
        }, getPageX:function (ev) {
            var x = ev.pageX;
            if (!x && 0 !== x) {
                x = ev.clientX || 0;
                if (Y.UA.ie) {
                    x += this._getScrollLeft();
                }
            }
            return x;
        }, getCharCode:function (ev) {
            var code = ev.keyCode || ev.charCode || 0;
            if (Y.UA.webkit && (code in Y.Event.webkitKeymap)) {
                code = Y.Event.webkitKeymap[code];
            }
            return code;
        }, getPageY:function (ev) {
            var y = ev.pageY;
            if (!y && 0 !== y) {
                y = ev.clientY || 0;
                if (Y.UA.ie) {
                    y += this._getScrollTop();
                }
            }
            return y;
        }, getXY:function (ev) {
            return[this.getPageX(ev), this.getPageY(ev)];
        }, getRelatedTarget:function (ev) {
            var t = ev.relatedTarget;
            if (!t) {
                if (ev.type == "mouseout") {
                    t = ev.toElement;
                } else if (ev.type == "mouseover") {
                    t = ev.fromElement;
                }
            }
            return this.resolveTextNode(t);
        }, getTime:function (ev) {
            if (!ev.time) {
                var t = new Date().getTime();
                try {
                    ev.time = t;
                } catch (ex) {
                    this.lastError = ex;
                    return t;
                }
            }
            return ev.time;
        }, stopEvent:function (ev) {
            this.stopPropagation(ev);
            this.preventDefault(ev);
        }, stopPropagation:function (ev) {
            if (ev.stopPropagation) {
                ev.stopPropagation();
            } else {
                ev.cancelBubble = true;
            }
        }, preventDefault:function (ev) {
            if (ev.preventDefault) {
                ev.preventDefault();
            } else {
                ev.returnValue = false;
            }
        }, getTarget:function (ev, resolveTextNode) {
            var t = ev.target || ev.srcElement;
            return this.resolveTextNode(t);
        }, resolveTextNode:function (node) {
            if (node && 3 == node.nodeType) {
                return node.parentNode;
            } else {
                return node;
            }
        }, getEl:function (id) {
            return Y.get(id);
        }};
        Y.mix(Y.Event, o);
        Y.Event.removeListener = function (el, type, fn, data, override) {
            var context, a = [type, fn, el];
            if (data) {
                if (override) {
                    context = (override === true) ? data : override;
                }
                a.push(context);
                a.push(data);
            }
            a.push(COMPAT_ARG);
            return Y.Event.detach.apply(Y.Event, a);
        };
        Y.Event.addListener = function (el, type, fn, data, override) {
            var context, a = [type, fn, el];
            if (data) {
                if (override) {
                    context = (override === true) ? data : override;
                }
                a.push(context);
                a.push(data);
            }
            a.push(COMPAT_ARG);
            return Y.Event.attach.apply(Y.Event, a);
        };
        Y.Event.on = Y.Event.addListener;
        var newOnavail = Y.Event.onAvailable;
        Y.Event.onAvailable = function (id, fn, p_obj, p_override) {
            return newOnavail(id, fn, p_obj, p_override, false, true);
        };
        Y.Event.onContentReady = function (id, fn, p_obj, p_override) {
            return newOnavail(id, fn, p_obj, p_override, true, true);
        };
        Y.Event.onDOMReady = function (fn) {
            var a = Y.Array(arguments, 0, true);
            a.unshift('event:ready');
            return Y.on.apply(Y, a);
        };
        Y.util.Event = Y.Event;
        var CE = function (type, oScope, silent, signature) {
            var o = {context:oScope, silent:silent || false};
            CE.superclass.constructor.call(this, type, o);
            this.signature = signature || CE.LIST;
        };
        Y.extend(CE, Y.CustomEvent, {});
        CE.LIST = 0;
        CE.FLAT = 1;
        Y.util.CustomEvent = CE;
        var EP = function () {
            if (!this._yuievt) {
                var sub = this.subscribe;
                Y.EventTarget.apply(this, arguments);
                this.subscribe = sub;
                this.__yuiepinit = function () {
                };
            }
        };
        Y.extend(EP, Y.EventTarget, {createEvent:function (type, o) {
            o = o || {};
            o.signature = o.signature || CE.FLAT;
            return this.publish(type, o);
        }, subscribe:function (type, fn, obj, override) {
            var ce = this._yuievt.events[type] || this.createEvent(type), a = Y.Array(arguments);
            if (override && true !== override) {
            }
            Y.EventTarget.prototype.subscribe.apply(this, a);
        }, fireEvent:function (type) {
            return this.fire.apply(this, arguments);
        }, hasEvent:function (type) {
            return this.getEvent(type);
        }});
        Y.util.EventProvider = EP;
    }
    Y.register("event", Y, {version:"3.0.0", build:"1549"});
    var propertyCache = {};
    var patterns = {HYPHEN:/(-[a-z])/i, ROOT_TAG:/^body|html$/i, OP_SCROLL:/^(?:inline|table-row)$/i};
    var hyphenToCamel = function (property) {
        if (!patterns.HYPHEN.test(property)) {
            return property;
        }
        if (propertyCache[property]) {
            return propertyCache[property];
        }
        var converted = property;
        while (patterns.HYPHEN.exec(converted)) {
            converted = converted.replace(RegExp.$1, RegExp.$1.substr(1).toUpperCase());
        }
        propertyCache[property] = converted;
        return converted;
    };
    var Dom = {get:function (el) {
        if (el) {
            if (el.nodeType || el.item) {
                return el;
            }
            if (typeof el === 'string') {
                return document.getElementById(el);
            }
            if ('length'in el) {
                var c = [];
                for (var i = 0, len = el.length; i < len; ++i) {
                    c[c.length] = Dom.get(el[i]);
                }
                return c;
            }
            return el;
        }
        return null;
    }, isAncestor:function (haystack, needle) {
        return YUI.DOM.contains(Dom.get(haystack), Dom.get(needle));
    }, inDocument:function (el) {
        return Dom.isAncestor(Y.config.doc.documentElement, el);
    }, batch:function (el, method, o, override, args) {
        el = (el && (el.tagName || el.item)) ? el : Dom.get(el);
        if (!el || !method) {
            return false;
        }
        if (args) {
            args = Y.Array(args);
        }
        var scope = (override) ? o : window;
        var apply = function (el) {
            if (args) {
                var tmp = slice.call(args);
                tmp.unshift(el);
                return method.apply(scope, tmp);
            } else {
                return method.call(scope, el, o);
            }
        };
        if (el.tagName || el.length === undefined) {
            return apply(el);
        }
        var collection = [];
        for (var i = 0, len = el.length; i < len; ++i) {
            collection[collection.length] = apply(el[i]);
        }
        return collection;
    }, _addClass:function (el, className) {
        if (YUI.DOM.hasClass(el, className)) {
            return false;
        }
        YUI.DOM.addClass(el, className);
        return true;
    }, _removeClass:function (el, className) {
        if (!YUI.DOM.hasClass(el, className)) {
            return false;
        }
        YUI.DOM.removeClass(el, className);
        return true;
    }, _replaceClass:function (el, oldClass, newClass) {
        if (!newClass || oldClass === newClass) {
            return false;
        }
        YUI.DOM.replaceClass(el, oldClass, newClass);
        return true;
    }, getElementsByClassName:function (className, tag, root) {
        tag = tag || '*';
        root = (root) ? Dom.get(root) : Y.config.doc;
        var nodes = [];
        if (root) {
            nodes = Y.Selector.query(tag + '.' + className, root);
        }
        return nodes;
    }, getElementsBy:function (method, tag, root) {
        tag = tag || '*';
        root = (root) ? Dom.get(root) : null || document;
        var nodes = [];
        if (root) {
            nodes = YUI.DOM.byTag(tag, root, method);
        }
        return nodes;
    }, getViewportWidth:YUI.DOM.winWidth, getViewportHeight:YUI.DOM.winHeight, getDocumentWidth:YUI.DOM.docWidth, getDocumentHeight:YUI.DOM.docHeight, getDocumentScrollTop:YUI.DOM.docScrollY, getDocumentScrollLeft:YUI.DOM.docScrollX, getDocumentHeight:YUI.DOM.docHeight, _guid:function (el, prefix) {
        prefix = prefix || 'yui-gen';
        Dom._id_counter = Dom._id_counter || 0;
        if (el && el.id) {
            return el.id;
        }
        var id = prefix + Dom._id_counter++;
        if (el) {
            el.id = id;
        }
        return id;
    }, _region:function (el) {
        if ((el.parentNode === null || el.offsetParent === null || YUI.DOM.getStyle(el, 'display') == 'none') && el != el.ownerDocument.body) {
            return false;
        }
        return YUI.DOM.region(el);
    }, _ancestorByClass:function (element, className) {
        return YUI.DOM.ancestor(element, function (el) {
            return YUI.DOM.hasClass(el, className);
        });
    }, _ancestorByTag:function (element, tag) {
        tag = tag.toUpperCase();
        return YUI.DOM.ancestor(element, function (el) {
            return el.tagName.toUpperCase() === tag;
        });
    }};
    var slice = [].slice;
    var wrap = function (fn, name) {
        Dom[name] = function () {
            var args = slice.call(arguments);
            args[0] = Dom.get(args[0]);
            return fn.apply(Dom, args);
        };
    };
    var wrapped = {getAncestorBy:YUI.DOM.ancestor, getAncestorByClassName:Dom._ancestorByClass, getAncestorByTagName:Dom._ancestorByTag, getPreviousSiblingBy:YUI.DOM.previous, getPreviousSibling:YUI.DOM.previous, getNextSiblingBy:YUI.DOM.next, getNextSibling:YUI.DOM.next, getFirstChildBy:YUI.DOM.firstChild, getFirstChild:YUI.DOM.firstChild, getLastChildBy:YUI.DOM.lastChild, getLastChild:YUI.DOM.lastChild, getChildrenBy:YUI.DOM.children, getChildren:YUI.DOM.children, insertBefore:function (newNode, refNode) {
        YUI.DOM.insertBefore(Dom.get(newNode), Dom.get(refNode));
    }, insertAfter:function (newNode, refNode) {
        YUI.DOM.insertAfter(Dom.get(newNode), Dom.get(refNode));
    }};
    Y.each(wrapped, wrap);
    var batched = {getStyle:YUI.DOM.getStyle, setStyle:YUI.DOM.setStyle, getXY:YUI.DOM.getXY, setXY:YUI.DOM.setXY, getX:YUI.DOM.getX, getY:YUI.DOM.getY, setX:YUI.DOM.setX, setY:YUI.DOM.setY, getRegion:Dom._region, hasClass:YUI.DOM.hasClass, addClass:Dom._addClass, removeClass:Dom._removeClass, replaceClass:Dom._replaceClass, generateId:Dom._guid};
    Y.each(batched, function (v, n) {
        Dom[n] = function (el) {
            var args = slice.call(arguments, 1);
            return Dom.batch(el, v, null, null, args);
        };
    });
    Y.util.Dom = Dom;
    YAHOO.util.Region = function (t, r, b, l) {
        this.top = t;
        this[1] = t;
        this.right = r;
        this.bottom = b;
        this.left = l;
        this[0] = l;
    };
    YAHOO.util.Region.prototype.contains = function (region) {
        return(region.left >= this.left && region.right <= this.right && region.top >= this.top && region.bottom <= this.bottom);
    };
    YAHOO.util.Region.prototype.getArea = function () {
        return((this.bottom - this.top) * (this.right - this.left));
    };
    YAHOO.util.Region.prototype.intersect = function (region) {
        var t = Math.max(this.top, region.top);
        var r = Math.min(this.right, region.right);
        var b = Math.min(this.bottom, region.bottom);
        var l = Math.max(this.left, region.left);
        if (b >= t && r >= l) {
            return new YAHOO.util.Region(t, r, b, l);
        } else {
            return null;
        }
    };
    YAHOO.util.Region.prototype.union = function (region) {
        var t = Math.min(this.top, region.top);
        var r = Math.max(this.right, region.right);
        var b = Math.max(this.bottom, region.bottom);
        var l = Math.min(this.left, region.left);
        return new YAHOO.util.Region(t, r, b, l);
    };
    YAHOO.util.Region.prototype.toString = function () {
        return("Region {" + "top: " + this.top + ", right: " + this.right + ", bottom: " + this.bottom + ", left: " + this.left + "}");
    };
    YAHOO.util.Region.getRegion = function (el) {
        return YUI.DOM.region(el);
    };
    YAHOO.util.Point = function (x, y) {
        if (YAHOO.lang.isArray(x)) {
            y = x[1];
            x = x[0];
        }
        this.x = this.right = this.left = this[0] = x;
        this.y = this.top = this.bottom = this[1] = y;
    };
    YAHOO.util.Point.prototype = new YAHOO.util.Region();
}, '3.0.0', {requires:['dom', 'event']});
YUI._setup();
YUI.use('dom', 'event', 'compat');