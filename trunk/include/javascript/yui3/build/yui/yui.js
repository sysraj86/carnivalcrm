/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
(function () {
    var _instances = {}, _startTime = new Date().getTime(), p, i, add = function () {
        if (window.addEventListener) {
            return function (el, type, fn, capture) {
                el.addEventListener(type, fn, (!!capture));
            };
        } else if (window.attachEvent) {
            return function (el, type, fn) {
                el.attachEvent("on" + type, fn);
            };
        } else {
            return function () {
            };
        }
    }(), remove = function () {
        if (window.removeEventListener) {
            return function (el, type, fn, capture) {
                el.removeEventListener(type, fn, !!capture);
            };
        } else if (window.detachEvent) {
            return function (el, type, fn) {
                el.detachEvent("on" + type, fn);
            };
        } else {
            return function () {
            };
        }
    }(), globalListener = function () {
        YUI.Env.windowLoaded = true;
        YUI.Env.DOMReady = true;
        remove(window, 'load', globalListener);
    }, _APPLY_TO_WHITE_LIST = {'io.xdrReady':1, 'io.xdrResponse':1}, SLICE = Array.prototype.slice;
    if (typeof YUI === 'undefined' || !YUI) {
        YUI = function (o1, o2, o3, o4, o5) {
            var Y = this, a = arguments, i, l = a.length;
            if (!(Y instanceof YUI)) {
                return new YUI(o1, o2, o3, o4, o5);
            } else {
                Y._init();
                for (i = 0; i < l; i++) {
                    Y._config(a[i]);
                }
                Y._setup();
                return Y;
            }
        };
    }
    YUI.prototype = {_config:function (o) {
        o = o || {};
        var c = this.config, i, j, m, mods;
        mods = c.modules;
        for (i in o) {
            if (mods && i == 'modules') {
                m = o[i];
                for (j in m) {
                    if (m.hasOwnProperty(j)) {
                        mods[j] = m[j];
                    }
                }
            } else if (i == 'win') {
                c[i] = o[i].contentWindow || o[i];
                c.doc = c[i].document;
            } else {
                c[i] = o[i];
            }
        }
    }, _init:function () {
        var v = '3.0.0', Y = this;
        if (v.indexOf('@') > -1) {
            v = 'test';
        }
        Y.version = v;
        Y.Env = {mods:{}, cdn:'http://yui.yahooapis.com/' + v + '/build/', bootstrapped:false, _idx:0, _used:{}, _attached:{}, _yidx:0, _uidx:0, _loaded:{}};
        Y.Env._loaded[v] = {};
        if (YUI.Env) {
            Y.Env._yidx = (++YUI.Env._yidx);
            Y.Env._guidp = ('yui_' + v + '-' + Y.Env._yidx + '-' + _startTime).replace(/\./g, '_');
            Y.id = Y.stamp(Y);
            _instances[Y.id] = Y;
        }
        Y.constructor = YUI;
        Y.config = {win:window || {}, doc:document, debug:true, useBrowserConsole:true, throwFail:true, bootstrap:true, fetchCSS:true, base:function () {
            var b, nodes, i, match;
            nodes = document.getElementsByTagName('script');
            for (i = 0; i < nodes.length; i = i + 1) {
                match = nodes[i].src.match(/^(.*)yui\/yui[\.\-].*js(\?.*)?$/);
                b = match && match[1];
                if (b) {
                    break;
                }
            }
            return b || Y.Env.cdn;
        }(), loaderPath:'loader/loader-min.js'};
    }, _setup:function (o) {
        this.use("yui-base");
    }, applyTo:function (id, method, args) {
        if (!(method in _APPLY_TO_WHITE_LIST)) {
            this.log(method + ': applyTo not allowed', 'warn', 'yui');
            return null;
        }
        var instance = _instances[id], nest, m, i;
        if (instance) {
            nest = method.split('.');
            m = instance;
            for (i = 0; i < nest.length; i = i + 1) {
                m = m[nest[i]];
                if (!m) {
                    this.log('applyTo not found: ' + method, 'warn', 'yui');
                }
            }
            return m.apply(instance, args);
        }
        return null;
    }, add:function (name, fn, version, details) {
        YUI.Env.mods[name] = {name:name, fn:fn, version:version, details:details || {}};
        return this;
    }, _attach:function (r, fromLoader) {
        var mods = YUI.Env.mods, attached = this.Env._attached, i, l = r.length, name, m, d, req, use;
        for (i = 0; i < l; i = i + 1) {
            name = r[i];
            m = mods[name];
            if (!attached[name] && m) {
                attached[name] = true;
                d = m.details;
                req = d.requires;
                use = d.use;
                if (req) {
                    this._attach(this.Array(req));
                }
                if (m.fn) {
                    m.fn(this);
                }
                if (use) {
                    this._attach(this.Array(use));
                }
            }
        }
    }, use:function () {
        if (this._loading) {
            this._useQueue = this._useQueue || new this.Queue();
            this._useQueue.add(SLICE.call(arguments, 0));
            return this;
        }
        var Y = this, a = SLICE.call(arguments, 0), mods = YUI.Env.mods, used = Y.Env._used, loader, firstArg = a[0], dynamic = false, callback = a[a.length - 1], boot = Y.config.bootstrap, k, i, l, missing = [], r = [], css = Y.config.fetchCSS, f = function (name) {
            if (used[name]) {
                return;
            }
            var m = mods[name], j, req, use;
            if (m) {
                used[name] = true;
                req = m.details.requires;
                use = m.details.use;
            } else {
                if (!YUI.Env._loaded[Y.version][name]) {
                    missing.push(name);
                } else {
                    used[name] = true;
                }
            }
            if (req) {
                if (Y.Lang.isString(req)) {
                    f(req);
                } else {
                    for (j = 0; j < req.length; j = j + 1) {
                        f(req[j]);
                    }
                }
            }
            r.push(name);
        }, onComplete;
        if (typeof callback === 'function') {
            a.pop();
        } else {
            callback = null;
        }
        onComplete = function (fromLoader) {
            fromLoader = fromLoader || {success:true, msg:'not dynamic'};
            if (callback) {
                callback(Y, fromLoader);
            }
            if (Y.fire) {
                Y.fire('yui:load', Y, fromLoader);
            }
            Y._loading = false;
            if (Y._useQueue && Y._useQueue.size() && !Y._loading) {
                Y.use.apply(Y, Y._useQueue.next());
            }
        };
        if (firstArg === "*") {
            a = [];
            for (k in mods) {
                if (mods.hasOwnProperty(k)) {
                    a.push(k);
                }
            }
            if (callback) {
                a.push(callback);
            }
            return Y.use.apply(Y, a);
        }
        if (Y.Loader) {
            dynamic = true;
            loader = new Y.Loader(Y.config);
            loader.require(a);
            loader.ignoreRegistered = true;
            loader.allowRollup = false;
            loader.calculate(null, (css) ? null : 'js');
            a = loader.sorted;
        }
        l = a.length;
        for (i = 0; i < l; i = i + 1) {
            f(a[i]);
        }
        l = missing.length;
        if (l) {
            missing = Y.Object.keys(Y.Array.hash(missing));
        }
        if (boot && l && Y.Loader) {
            Y._loading = true;
            loader = new Y.Loader(Y.config);
            loader.onSuccess = onComplete;
            loader.onFailure = onComplete;
            loader.onTimeout = onComplete;
            loader.context = Y;
            loader.attaching = a;
            loader.require((css) ? missing : a);
            loader.insert(null, (css) ? null : 'js');
        } else if (boot && l && Y.Get && !Y.Env.bootstrapped) {
            Y._loading = true;
            a = Y.Array(arguments, 0, true);
            Y.Get.script(Y.config.base + Y.config.loaderPath, {onEnd:function () {
                Y._loading = false;
                Y.Env.bootstrapped = true;
                Y._attach(['loader']);
                Y.use.apply(Y, a);
            }});
            return Y;
        } else {
            if (l) {
            }
            Y._attach(r);
            onComplete();
        }
        return Y;
    }, namespace:function () {
        var a = arguments, o = null, i, j, d;
        for (i = 0; i < a.length; i = i + 1) {
            d = ("" + a[i]).split(".");
            o = this;
            for (j = (d[0] == "YAHOO") ? 1 : 0; j < d.length; j = j + 1) {
                o[d[j]] = o[d[j]] || {};
                o = o[d[j]];
            }
        }
        return o;
    }, log:function () {
    }, error:function (msg, e) {
        if (this.config.throwFail) {
            throw(e || new Error(msg));
        } else {
            this.message(msg, "error");
        }
        return this;
    }, guid:function (pre) {
        var id = this.Env._guidp + (++this.Env._uidx);
        return(pre) ? (pre + id) : id;
    }, stamp:function (o, readOnly) {
        if (!o) {
            return o;
        }
        var uid = (typeof o === 'string') ? o : o._yuid;
        if (!uid) {
            uid = this.guid();
            if (!readOnly) {
                try {
                    o._yuid = uid;
                } catch (e) {
                    uid = null;
                }
            }
        }
        return uid;
    }};
    p = YUI.prototype;
    for (i in p) {
        YUI[i] = p[i];
    }
    YUI._init();
    add(window, 'load', globalListener);
    YUI.Env.add = add;
    YUI.Env.remove = remove;
})();
YUI.add('yui-base', function (Y) {
    function Queue() {
        this._init();
        this.add.apply(this, arguments);
    }

    Queue.prototype = {_init:function () {
        this._q = [];
    }, next:function () {
        return this._q.shift();
    }, add:function () {
        Y.Array.each(Y.Array(arguments, 0, true), function (fn) {
            this._q.push(fn);
        }, this);
        return this;
    }, size:function () {
        return this._q.length;
    }};
    Y.Queue = Queue;
    (function () {
        Y.Lang = Y.Lang || {};
        var L = Y.Lang, ARRAY = 'array', BOOLEAN = 'boolean', DATE = 'date', ERROR = 'error', FUNCTION = 'function', NUMBER = 'number', NULL = 'null', OBJECT = 'object', REGEX = 'regexp', STRING = 'string', TOSTRING = Object.prototype.toString, UNDEFINED = 'undefined', TYPES = {'undefined':UNDEFINED, 'number':NUMBER, 'boolean':BOOLEAN, 'string':STRING, '[object Function]':FUNCTION, '[object RegExp]':REGEX, '[object Array]':ARRAY, '[object Date]':DATE, '[object Error]':ERROR}, TRIMREGEX = /^\s+|\s+$/g, EMPTYSTRING = '';
        L.isArray = function (o) {
            return L.type(o) === ARRAY;
        };
        L.isBoolean = function (o) {
            return typeof o === BOOLEAN;
        };
        L.isFunction = function (o) {
            return L.type(o) === FUNCTION;
        };
        L.isDate = function (o) {
            return L.type(o) === DATE;
        };
        L.isNull = function (o) {
            return o === null;
        };
        L.isNumber = function (o) {
            return typeof o === NUMBER && isFinite(o);
        };
        L.isObject = function (o, failfn) {
            return(o && (typeof o === OBJECT || (!failfn && L.isFunction(o)))) || false;
        };
        L.isString = function (o) {
            return typeof o === STRING;
        };
        L.isUndefined = function (o) {
            return typeof o === UNDEFINED;
        };
        L.trim = function (s) {
            try {
                return s.replace(TRIMREGEX, EMPTYSTRING);
            } catch (e) {
                return s;
            }
        };
        L.isValue = function (o) {
            var t = L.type(o);
            switch (t) {
                case NUMBER:
                    return isFinite(o);
                case NULL:
                case UNDEFINED:
                    return false;
                default:
                    return!!(t);
            }
        };
        L.type = function (o) {
            return TYPES[typeof o] || TYPES[TOSTRING.call(o)] || (o ? OBJECT : NULL);
        };
    })();
    (function () {
        var L = Y.Lang, Native = Array.prototype, YArray = function (o, startIdx, al) {
            var t = (al) ? 2 : Y.Array.test(o), i, l, a;
            if (t) {
                try {
                    return Native.slice.call(o, startIdx || 0);
                } catch (e) {
                    a = [];
                    for (i = 0, l = o.length; i < l; i = i + 1) {
                        a.push(o[i]);
                    }
                    return a;
                }
            } else {
                return[o];
            }
        };
        Y.Array = YArray;
        YArray.test = function (o) {
            var r = 0;
            if (L.isObject(o)) {
                if (L.isArray(o)) {
                    r = 1;
                } else {
                    try {
                        if ("length"in o && !("tagName"in o) && !("alert"in o) && (!Y.Lang.isFunction(o.size) || o.size() > 1)) {
                            r = 2;
                        }
                    } catch (e) {
                    }
                }
            }
            return r;
        };
        YArray.each = (Native.forEach) ? function (a, f, o) {
            Native.forEach.call(a || [], f, o || Y);
            return Y;
        } : function (a, f, o) {
            var l = (a && a.length) || 0, i;
            for (i = 0; i < l; i = i + 1) {
                f.call(o || Y, a[i], i, a);
            }
            return Y;
        };
        YArray.hash = function (k, v) {
            var o = {}, l = k.length, vl = v && v.length, i;
            for (i = 0; i < l; i = i + 1) {
                o[k[i]] = (vl && vl > i) ? v[i] : true;
            }
            return o;
        };
        YArray.indexOf = (Native.indexOf) ? function (a, val) {
            return Native.indexOf.call(a, val);
        } : function (a, val) {
            for (var i = 0; i < a.length; i = i + 1) {
                if (a[i] === val) {
                    return i;
                }
            }
            return-1;
        };
        YArray.numericSort = function (a, b) {
            return(a - b);
        };
        YArray.some = (Native.some) ? function (a, f, o) {
            return Native.some.call(a, f, o);
        } : function (a, f, o) {
            var l = a.length, i;
            for (i = 0; i < l; i = i + 1) {
                if (f.call(o, a[i], i, a)) {
                    return true;
                }
            }
            return false;
        };
    })();
    (function () {
        var L = Y.Lang, DELIMITER = '__', _iefix = function (r, s) {
            var fn = s.toString;
            if (L.isFunction(fn) && fn != Object.prototype.toString) {
                r.toString = fn;
            }
        };
        Y.merge = function () {
            var a = arguments, o = {}, i, l = a.length;
            for (i = 0; i < l; i = i + 1) {
                Y.mix(o, a[i], true);
            }
            return o;
        };
        Y.mix = function (r, s, ov, wl, mode, merge) {
            if (!s || !r) {
                return r || Y;
            }
            if (mode) {
                switch (mode) {
                    case 1:
                        return Y.mix(r.prototype, s.prototype, ov, wl, 0, merge);
                    case 2:
                        Y.mix(r.prototype, s.prototype, ov, wl, 0, merge);
                        break;
                    case 3:
                        return Y.mix(r, s.prototype, ov, wl, 0, merge);
                    case 4:
                        return Y.mix(r.prototype, s, ov, wl, 0, merge);
                    default:
                }
            }
            var arr = merge && L.isArray(r), i, l, p;
            if (wl && wl.length) {
                for (i = 0, l = wl.length; i < l; ++i) {
                    p = wl[i];
                    if (p in s) {
                        if (merge && L.isObject(r[p], true)) {
                            Y.mix(r[p], s[p]);
                        } else if (!arr && (ov || !(p in r))) {
                            r[p] = s[p];
                        } else if (arr) {
                            r.push(s[p]);
                        }
                    }
                }
            } else {
                for (i in s) {
                    if (merge && L.isObject(r[i], true)) {
                        Y.mix(r[i], s[i]);
                    } else if (!arr && (ov || !(i in r))) {
                        r[i] = s[i];
                    } else if (arr) {
                        r.push(s[i]);
                    }
                }
                if (Y.UA.ie) {
                    _iefix(r, s);
                }
            }
            return r;
        };
        Y.cached = function (source, cache, refetch) {
            cache = cache || {};
            return function (arg1, arg2) {
                var k = (arg2) ? Array.prototype.join.call(arguments, DELIMITER) : arg1, v = cache[k];
                if (!(k in cache) || (refetch && cache[k] == refetch)) {
                    cache[k] = source.apply(source, arguments);
                }
                return cache[k];
            };
        };
    })();
    (function () {
        Y.Object = function (o) {
            var F = function () {
            };
            F.prototype = o;
            return new F();
        };
        var O = Y.Object, UNDEFINED = undefined, _extract = function (o, what) {
            var count = (what === 2), out = (count) ? 0 : [], i;
            for (i in o) {
                if (count) {
                    out++;
                } else {
                    if (o.hasOwnProperty(i)) {
                        out.push((what) ? o[i] : i);
                    }
                }
            }
            return out;
        };
        O.keys = function (o) {
            return _extract(o);
        };
        O.values = function (o) {
            return _extract(o, 1);
        };
        O.size = function (o) {
            return _extract(o, 2);
        };
        O.hasKey = function (o, k) {
            return(k in o);
        };
        O.hasValue = function (o, v) {
            return(Y.Array.indexOf(O.values(o), v) > -1);
        };
        O.owns = function (o, k) {
            return(o.hasOwnProperty(k));
        };
        O.each = function (o, f, c, proto) {
            var s = c || Y, i;
            for (i in o) {
                if (proto || o.hasOwnProperty(i)) {
                    f.call(s, o[i], i, o);
                }
            }
            return Y;
        };
        O.getValue = function (o, path) {
            var p = Y.Array(path), l = p.length, i;
            for (i = 0; o !== UNDEFINED && i < l; i = i + 1) {
                o = o[p[i]];
            }
            return o;
        };
        O.setValue = function (o, path, val) {
            var p = Y.Array(path), leafIdx = p.length - 1, i, ref = o;
            if (leafIdx >= 0) {
                for (i = 0; ref !== UNDEFINED && i < leafIdx; i = i + 1) {
                    ref = ref[p[i]];
                }
                if (ref !== UNDEFINED) {
                    ref[p[i]] = val;
                } else {
                    return UNDEFINED;
                }
            }
            return o;
        };
    })();
    Y.UA = function () {
        var numberfy = function (s) {
            var c = 0;
            return parseFloat(s.replace(/\./g, function () {
                return(c++ == 1) ? '' : '.';
            }));
        }, nav = navigator, o = {ie:0, opera:0, gecko:0, webkit:0, mobile:null, air:0, caja:nav.cajaVersion, secure:false, os:null}, ua = nav && nav.userAgent, loc = Y.config.win.location, href = loc && loc.href, m;
        o.secure = href && (href.toLowerCase().indexOf("https") === 0);
        if (ua) {
            if ((/windows|win32/i).test(ua)) {
                o.os = 'windows';
            } else if ((/macintosh/i).test(ua)) {
                o.os = 'macintosh';
            }
            if ((/KHTML/).test(ua)) {
                o.webkit = 1;
            }
            m = ua.match(/AppleWebKit\/([^\s]*)/);
            if (m && m[1]) {
                o.webkit = numberfy(m[1]);
                if (/ Mobile\//.test(ua)) {
                    o.mobile = "Apple";
                } else {
                    m = ua.match(/NokiaN[^\/]*|Android \d\.\d|webOS\/\d\.\d/);
                    if (m) {
                        o.mobile = m[0];
                    }
                }
                m = ua.match(/AdobeAIR\/([^\s]*)/);
                if (m) {
                    o.air = m[0];
                }
            }
            if (!o.webkit) {
                m = ua.match(/Opera[\s\/]([^\s]*)/);
                if (m && m[1]) {
                    o.opera = numberfy(m[1]);
                    m = ua.match(/Opera Mini[^;]*/);
                    if (m) {
                        o.mobile = m[0];
                    }
                } else {
                    m = ua.match(/MSIE\s([^;]*)/);
                    if (m && m[1]) {
                        o.ie = numberfy(m[1]);
                    } else {
                        m = ua.match(/Gecko\/([^\s]*)/);
                        if (m) {
                            o.gecko = 1;
                            m = ua.match(/rv:([^\s\)]*)/);
                            if (m && m[1]) {
                                o.gecko = numberfy(m[1]);
                            }
                        }
                    }
                }
            }
        }
        return o;
    }();
    (function () {
        var min = ['yui-base'], core, C = Y.config, mods = YUI.Env.mods, extras, i;
        Y.use.apply(Y, min);
        if (C.core) {
            core = C.core;
        } else {
            core = [];
            extras = ['get', 'loader', 'yui-log', 'yui-later'];
            for (i = 0; i < extras.length; i++) {
                if (mods[extras[i]]) {
                    core.push(extras[i]);
                }
            }
        }
        Y.use.apply(Y, core);
    })();
}, '3.0.0');
YUI.add('get', function (Y) {
    (function () {
        var ua = Y.UA, L = Y.Lang, TYPE_JS = "text/javascript", TYPE_CSS = "text/css", STYLESHEET = "stylesheet";
        Y.Get = function () {
            var queues = {}, qidx = 0, purging = false, _node = function (type, attr, win) {
                var w = win || Y.config.win, d = w.document, n = d.createElement(type), i;
                for (i in attr) {
                    if (attr[i] && attr.hasOwnProperty(i)) {
                        n.setAttribute(i, attr[i]);
                    }
                }
                return n;
            }, _linkNode = function (url, win, attributes) {
                var o = {id:Y.guid(), type:TYPE_CSS, rel:STYLESHEET, href:url};
                if (attributes) {
                    Y.mix(o, attributes);
                }
                return _node("link", o, win);
            }, _scriptNode = function (url, win, attributes) {
                var o = {id:Y.guid(), type:TYPE_JS, src:url};
                if (attributes) {
                    Y.mix(o, attributes);
                }
                return _node("script", o, win);
            }, _purge = function (tId) {
                var q = queues[tId], n, l, d, h, s, i, node, attr;
                if (q) {
                    n = q.nodes;
                    l = n.length;
                    d = q.win.document;
                    h = d.getElementsByTagName("head")[0];
                    if (q.insertBefore) {
                        s = _get(q.insertBefore, tId);
                        if (s) {
                            h = s.parentNode;
                        }
                    }
                    for (i = 0; i < l; i = i + 1) {
                        node = n[i];
                        if (node.clearAttributes) {
                            node.clearAttributes();
                        } else {
                            for (attr in node) {
                                delete node[attr];
                            }
                        }
                        h.removeChild(node);
                    }
                }
                q.nodes = [];
            }, _returnData = function (q, msg, result) {
                return{tId:q.tId, win:q.win, data:q.data, nodes:q.nodes, msg:msg, statusText:result, purge:function () {
                    _purge(this.tId);
                }};
            }, _end = function (id, msg, result) {
                var q = queues[id], sc;
                if (q && q.onEnd) {
                    sc = q.context || q;
                    q.onEnd.call(sc, _returnData(q, msg, result));
                }
            }, _fail = function (id, msg) {
                var q = queues[id], sc;
                if (q.timer) {
                    clearTimeout(q.timer);
                }
                if (q.onFailure) {
                    sc = q.context || q;
                    q.onFailure.call(sc, _returnData(q, msg));
                }
                _end(id, msg, 'failure');
            }, _get = function (nId, tId) {
                var q = queues[tId], n = (L.isString(nId)) ? q.win.document.getElementById(nId) : nId;
                if (!n) {
                    _fail(tId, "target node not found: " + nId);
                }
                return n;
            }, _finish = function (id) {
                var q = queues[id], msg, sc;
                if (q.timer) {
                    clearTimeout(q.timer);
                }
                q.finished = true;
                if (q.aborted) {
                    msg = "transaction " + id + " was aborted";
                    _fail(id, msg);
                    return;
                }
                if (q.onSuccess) {
                    sc = q.context || q;
                    q.onSuccess.call(sc, _returnData(q));
                }
                _end(id, msg, 'OK');
            }, _timeout = function (id) {
                var q = queues[id], sc;
                if (q.onTimeout) {
                    sc = q.context || q;
                    q.onTimeout.call(sc, _returnData(q));
                }
                _end(id, 'timeout', 'timeout');
            }, _next = function (id, loaded) {
                var q = queues[id], msg, w, d, h, n, url, s;
                if (q.timer) {
                    clearTimeout(q.timer);
                }
                if (q.aborted) {
                    msg = "transaction " + id + " was aborted";
                    _fail(id, msg);
                    return;
                }
                if (loaded) {
                    q.url.shift();
                    if (q.varName) {
                        q.varName.shift();
                    }
                } else {
                    q.url = (L.isString(q.url)) ? [q.url] : q.url;
                    if (q.varName) {
                        q.varName = (L.isString(q.varName)) ? [q.varName] : q.varName;
                    }
                }
                w = q.win;
                d = w.document;
                h = d.getElementsByTagName("head")[0];
                if (q.url.length === 0) {
                    _finish(id);
                    return;
                }
                url = q.url[0];
                if (!url) {
                    q.url.shift();
                    return _next(id);
                }
                if (q.timeout) {
                    q.timer = setTimeout(function () {
                        _timeout(id);
                    }, q.timeout);
                }
                if (q.type === "script") {
                    n = _scriptNode(url, w, q.attributes);
                } else {
                    n = _linkNode(url, w, q.attributes);
                }
                _track(q.type, n, id, url, w, q.url.length);
                q.nodes.push(n);
                if (q.insertBefore) {
                    s = _get(q.insertBefore, id);
                    if (s) {
                        s.parentNode.insertBefore(n, s);
                    }
                } else {
                    h.appendChild(n);
                }
                if ((ua.webkit || ua.gecko) && q.type === "css") {
                    _next(id, url);
                }
            }, _autoPurge = function () {
                if (purging) {
                    return;
                }
                purging = true;
                var i, q;
                for (i in queues) {
                    if (queues.hasOwnProperty(i)) {
                        q = queues[i];
                        if (q.autopurge && q.finished) {
                            _purge(q.tId);
                            delete queues[i];
                        }
                    }
                }
                purging = false;
            }, _queue = function (type, url, opts) {
                opts = opts || {};
                var id = "q" + (qidx++), q, thresh = opts.purgethreshold || Y.Get.PURGE_THRESH;
                if (qidx % thresh === 0) {
                    _autoPurge();
                }
                queues[id] = Y.merge(opts, {tId:id, type:type, url:url, finished:false, nodes:[]});
                q = queues[id];
                q.win = q.win || Y.config.win;
                q.context = q.context || q;
                q.autopurge = ("autopurge"in q) ? q.autopurge : (type === "script") ? true : false;
                if (opts.charset) {
                    q.attributes = q.attributes || {};
                    q.attributes.charset = opts.charset;
                }
                setTimeout(function () {
                    _next(id);
                }, 0);
                return{tId:id};
            }, _track = function (type, n, id, url, win, qlength, trackfn) {
                var f = trackfn || _next;
                if (ua.ie) {
                    n.onreadystatechange = function () {
                        var rs = this.readyState;
                        if ("loaded" === rs || "complete" === rs) {
                            n.onreadystatechange = null;
                            f(id, url);
                        }
                    };
                } else if (ua.webkit) {
                    if (type === "script") {
                        n.addEventListener("load", function () {
                            f(id, url);
                        });
                    }
                } else {
                    n.onload = function () {
                        f(id, url);
                    };
                    n.onerror = function (e) {
                        _fail(id, e + ": " + url);
                    };
                }
            };
            return{PURGE_THRESH:20, _finalize:function (id) {
                setTimeout(function () {
                    _finish(id);
                }, 0);
            }, abort:function (o) {
                var id = (L.isString(o)) ? o : o.tId, q = queues[id];
                if (q) {
                    q.aborted = true;
                }
            }, script:function (url, opts) {
                return _queue("script", url, opts);
            }, css:function (url, opts) {
                return _queue("css", url, opts);
            }};
        }();
    })();
}, '3.0.0');
YUI.add('yui-log', function (Y) {
    (function () {
        var INSTANCE = Y, LOGEVENT = 'yui:log', UNDEFINED = 'undefined', LEVELS = {debug:1, info:1, warn:1, error:1}, _published;
        INSTANCE.log = function (msg, cat, src, silent) {
            var Y = INSTANCE, c = Y.config, bail = false, excl, incl, m, f;
            if (c.debug) {
                if (src) {
                    excl = c.logExclude;
                    incl = c.logInclude;
                    if (incl && !(src in incl)) {
                        bail = 1;
                    } else if (excl && (src in excl)) {
                        bail = 1;
                    }
                }
                if (!bail) {
                    if (c.useBrowserConsole) {
                        m = (src) ? src + ': ' + msg : msg;
                        if (typeof console != UNDEFINED && console.log) {
                            f = (cat && console[cat] && (cat in LEVELS)) ? cat : 'log';
                            console[f](m);
                        } else if (typeof opera != UNDEFINED) {
                            opera.postError(m);
                        }
                    }
                    if (Y.fire && !silent) {
                        if (!_published) {
                            Y.publish(LOGEVENT, {broadcast:2, emitFacade:1});
                            _published = 1;
                        }
                        Y.fire(LOGEVENT, {msg:msg, cat:cat, src:src});
                    }
                }
            }
            return Y;
        };
        INSTANCE.message = function () {
            return INSTANCE.log.apply(INSTANCE, arguments);
        };
    })();
}, '3.0.0', {requires:['yui-base']});
YUI.add('yui-later', function (Y) {
    (function () {
        var L = Y.Lang, later = function (when, o, fn, data, periodic) {
            when = when || 0;
            o = o || {};
            var m = fn, d = Y.Array(data), f, r;
            if (L.isString(fn)) {
                m = o[fn];
            }
            if (!m) {
            }
            f = function () {
                m.apply(o, d);
            };
            r = (periodic) ? setInterval(f, when) : setTimeout(f, when);
            return{id:r, interval:periodic, cancel:function () {
                if (this.interval) {
                    clearInterval(r);
                } else {
                    clearTimeout(r);
                }
            }};
        };
        Y.later = later;
        L.later = later;
    })();
}, '3.0.0', {requires:['yui-base']});
YUI.add('yui', function (Y) {
}, '3.0.0', {use:['yui-base', 'get', 'yui-log', 'yui-later']});