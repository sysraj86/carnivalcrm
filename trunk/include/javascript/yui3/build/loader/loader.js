/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('loader', function (Y) {
    (function () {
        YUI.Env._loaderQueue = YUI.Env._loaderQueue || new Y.Queue();
        var NOT_FOUND = {}, GLOBAL_ENV = YUI.Env, GLOBAL_LOADED, BASE = 'base', CSS = 'css', JS = 'js', CSSRESET = 'cssreset', CSSFONTS = 'cssfonts', CSSGRIDS = 'cssgrids', CSSBASE = 'cssbase', CSS_AFTER = [CSSRESET, CSSFONTS, CSSGRIDS, 'cssreset-context', 'cssfonts-context', 'cssgrids-context'], YUI_CSS = ['reset', 'fonts', 'grids', BASE], VERSION = Y.version, ROOT = VERSION + '/build/', CONTEXT = '-context', ANIMBASE = 'anim-base', ATTRIBUTE = 'attribute', ATTRIBUTEBASE = ATTRIBUTE + '-base', BASEBASE = 'base-base', DDDRAG = 'dd-drag', DOM = 'dom', DATASCHEMABASE = 'dataschema-base', DATASOURCELOCAL = 'datasource-local', DOMBASE = 'dom-base', DOMSTYLE = 'dom-style', DOMSCREEN = 'dom-screen', DUMP = 'dump', GET = 'get', EVENTBASE = 'event-base', EVENTCUSTOM = 'event-custom', EVENTCUSTOMBASE = 'event-custom-base', IOBASE = 'io-base', NODE = 'node', NODEBASE = 'node-base', NODESTYLE = 'node-style', NODESCREEN = 'node-screen', OOP = 'oop', PLUGINHOST = 'pluginhost', SELECTORCSS2 = 'selector-css2', SUBSTITUTE = 'substitute', WIDGET = 'widget', WIDGETPOSITION = 'widget-position', YUIBASE = 'yui-base', PLUGIN = 'plugin', META = {version:VERSION, root:ROOT, base:'http://yui.yahooapis.com/' + ROOT, comboBase:'http://yui.yahooapis.com/combo?', skin:{defaultSkin:'sam', base:'assets/skins/', path:'skin.css', after:CSS_AFTER}, modules:{dom:{requires:[OOP], submodules:{'dom-base':{requires:[OOP]}, 'dom-style':{requires:[DOMBASE]}, 'dom-screen':{requires:[DOMBASE, DOMSTYLE]}, 'selector-native':{requires:[DOMBASE]}, 'selector-css2':{requires:['selector-native']}, 'selector':{requires:[DOMBASE]}}, plugins:{'selector-css3':{requires:[SELECTORCSS2]}}}, node:{requires:[DOM, EVENTBASE], submodules:{'node-base':{requires:[DOMBASE, SELECTORCSS2, EVENTBASE]}, 'node-style':{requires:[DOMSTYLE, NODEBASE]}, 'node-screen':{requires:[DOMSCREEN, NODEBASE]}, 'node-pluginhost':{requires:[NODEBASE, PLUGINHOST]}, 'node-event-delegate':{requires:[NODEBASE, 'event-delegate']}}, plugins:{'node-event-simulate':{requires:[NODEBASE, 'event-simulate']}}}, anim:{submodules:{'anim-base':{requires:[BASEBASE, NODESTYLE]}, 'anim-color':{requires:[ANIMBASE]}, 'anim-easing':{requires:[ANIMBASE]}, 'anim-scroll':{requires:[ANIMBASE]}, 'anim-xy':{requires:[ANIMBASE, NODESCREEN]}, 'anim-curve':{requires:['anim-xy']}, 'anim-node-plugin':{requires:['node-pluginhost', ANIMBASE]}}}, attribute:{submodules:{'attribute-base':{requires:[EVENTCUSTOM]}, 'attribute-complex':{requires:[ATTRIBUTEBASE]}}}, base:{submodules:{'base-base':{requires:[ATTRIBUTEBASE]}, 'base-build':{requires:[BASEBASE]}, 'base-pluginhost':{requires:[BASEBASE, PLUGINHOST]}}}, cache:{requires:[PLUGIN]}, compat:{requires:[NODE, DUMP, SUBSTITUTE]}, classnamemanager:{requires:[YUIBASE]}, collection:{requires:[OOP]}, console:{requires:['yui-log', WIDGET, SUBSTITUTE], skinnable:true, plugins:{'console-filters':{requires:[PLUGIN, 'console'], skinnable:true}}}, cookie:{requires:[YUIBASE]}, dataschema:{submodules:{'dataschema-base':{requires:[BASE]}, 'dataschema-array':{requires:[DATASCHEMABASE]}, 'dataschema-json':{requires:[DATASCHEMABASE, 'json']}, 'dataschema-text':{requires:[DATASCHEMABASE]}, 'dataschema-xml':{requires:[DATASCHEMABASE]}}}, datasource:{submodules:{'datasource-local':{requires:[BASE]}, 'datasource-arrayschema':{requires:[DATASOURCELOCAL, PLUGIN, 'dataschema-array']}, 'datasource-cache':{requires:[DATASOURCELOCAL, 'cache']}, 'datasource-function':{requires:[DATASOURCELOCAL]}, 'datasource-jsonschema':{requires:[DATASOURCELOCAL, PLUGIN, 'dataschema-json']}, 'datasource-polling':{requires:[DATASOURCELOCAL]}, 'datasource-get':{requires:[DATASOURCELOCAL, GET]}, 'datasource-textschema':{requires:[DATASOURCELOCAL, PLUGIN, 'dataschema-text']}, 'datasource-io':{requires:[DATASOURCELOCAL, IOBASE]}, 'datasource-xmlschema':{requires:[DATASOURCELOCAL, PLUGIN, 'dataschema-xml']}}}, datatype:{submodules:{'datatype-date':{requires:[YUIBASE]}, 'datatype-number':{requires:[YUIBASE]}, 'datatype-xml':{requires:[YUIBASE]}}}, dd:{submodules:{'dd-ddm-base':{requires:[NODE, BASE]}, 'dd-ddm':{requires:['dd-ddm-base', 'event-resize']}, 'dd-ddm-drop':{requires:['dd-ddm']}, 'dd-drag':{requires:['dd-ddm-base']}, 'dd-drop':{requires:['dd-ddm-drop']}, 'dd-proxy':{requires:[DDDRAG]}, 'dd-constrain':{requires:[DDDRAG]}, 'dd-scroll':{requires:[DDDRAG]}, 'dd-plugin':{requires:[DDDRAG], optional:['dd-constrain', 'dd-proxy']}, 'dd-drop-plugin':{requires:['dd-drop']}}}, dump:{requires:[YUIBASE]}, event:{expound:NODEBASE, submodules:{'event-base':{expound:NODEBASE, requires:[EVENTCUSTOMBASE]}, 'event-delegate':{requires:[NODEBASE]}, 'event-focus':{requires:[NODEBASE]}, 'event-key':{requires:[NODEBASE]}, 'event-mouseenter':{requires:[NODEBASE]}, 'event-mousewheel':{requires:[NODEBASE]}, 'event-resize':{requires:[NODEBASE]}}}, 'event-custom':{submodules:{'event-custom-base':{requires:[OOP, 'yui-later']}, 'event-custom-complex':{requires:[EVENTCUSTOMBASE]}}}, 'event-simulate':{requires:[EVENTBASE]}, 'node-focusmanager':{requires:[ATTRIBUTE, NODE, PLUGIN, 'node-event-simulate', 'event-key', 'event-focus']}, history:{requires:[NODE]}, imageloader:{requires:[BASEBASE, NODESTYLE, NODESCREEN]}, io:{submodules:{'io-base':{requires:[EVENTCUSTOMBASE]}, 'io-xdr':{requires:[IOBASE, 'datatype-xml']}, 'io-form':{requires:[IOBASE, NODEBASE, NODESTYLE]}, 'io-upload-iframe':{requires:[IOBASE, NODEBASE]}, 'io-queue':{requires:[IOBASE, 'queue-promote']}}}, json:{submodules:{'json-parse':{requires:[YUIBASE]}, 'json-stringify':{requires:[YUIBASE]}}}, loader:{requires:[GET]}, 'node-menunav':{requires:[NODE, 'classnamemanager', PLUGIN, 'node-focusmanager'], skinnable:true}, oop:{requires:[YUIBASE]}, overlay:{requires:[WIDGET, WIDGETPOSITION, 'widget-position-ext', 'widget-stack', 'widget-stdmod'], skinnable:true}, plugin:{requires:[BASEBASE]}, pluginhost:{requires:[YUIBASE]}, profiler:{requires:[YUIBASE]}, 'queue-promote':{requires:[YUIBASE]}, 'queue-run':{requires:[EVENTCUSTOM], path:'async-queue/async-queue-min.js'}, 'async-queue':{requires:[EVENTCUSTOM], supersedes:['queue-run']}, slider:{requires:[WIDGET, 'dd-constrain'], skinnable:true}, stylesheet:{requires:[YUIBASE]}, substitute:{optional:[DUMP]}, widget:{requires:[ATTRIBUTE, 'event-focus', BASE, NODE, 'classnamemanager'], plugins:{'widget-position':{}, 'widget-position-ext':{requires:[WIDGETPOSITION]}, 'widget-stack':{skinnable:true}, 'widget-stdmod':{}}, skinnable:true}, yui:{submodules:{'yui-base':{}, get:{}, 'yui-log':{}, 'yui-later':{}}}, test:{requires:[SUBSTITUTE, NODE, 'json', 'event-simulate']}}}, _path = Y.cached(function (dir, file, type) {
            return dir + '/' + file + '-min.' + (type || CSS);
        }), _queue = YUI.Env._loaderQueue, mods = META.modules, i, bname, mname, contextname, L = Y.Lang;
        for (i = 0; i < YUI_CSS.length; i = i + 1) {
            bname = YUI_CSS[i];
            mname = CSS + bname;
            mods[mname] = {type:CSS, path:_path(mname, bname)};
            contextname = mname + CONTEXT;
            bname = bname + CONTEXT;
            mods[contextname] = {type:CSS, path:_path(mname, bname)};
            if (mname == CSSGRIDS) {
                mods[mname].requires = [CSSFONTS];
                mods[mname].optional = [CSSRESET];
                mods[contextname].requires = [CSSFONTS + CONTEXT];
                mods[contextname].optional = [CSSRESET + CONTEXT];
            } else if (mname == CSSBASE) {
                mods[mname].after = CSS_AFTER;
                mods[contextname].after = CSS_AFTER;
            }
        }
        Y.Env.meta = META;
        GLOBAL_LOADED = GLOBAL_ENV._loaded;
        Y.Loader = function (o) {
            this.context = Y;
            this.base = Y.Env.meta.base;
            this.comboBase = Y.Env.meta.comboBase;
            this.combine = o.base && (o.base.indexOf(this.comboBase.substr(0, 20)) > -1);
            this.root = Y.Env.meta.root;
            this.timeout = 0;
            this.forceMap = {};
            this.filters = {};
            this.required = {};
            this.moduleInfo = {};
            this.skin = Y.merge(Y.Env.meta.skin);
            var defaults = Y.Env.meta.modules, i, onPage = YUI.Env.mods;
            this._internal = true;
            for (i in defaults) {
                if (defaults.hasOwnProperty(i)) {
                    this.addModule(defaults[i], i);
                }
            }
            for (i in onPage) {
                if (onPage.hasOwnProperty(i) && !this.moduleInfo[i] && onPage[i].details) {
                    this.addModule(onPage[i].details, i);
                }
            }
            this._internal = false;
            this.sorted = [];
            this.loaded = GLOBAL_LOADED[VERSION];
            this.dirty = true;
            this.inserted = {};
            this.skipped = {};
            this._config(o);
        };
        Y.Loader.prototype = {FILTER_DEFS:{RAW:{'searchExp':"-min\\.js", 'replaceStr':".js"}, DEBUG:{'searchExp':"-min\\.js", 'replaceStr':"-debug.js"}}, SKIN_PREFIX:"skin-", _config:function (o) {
            var i, j, val, f;
            if (o) {
                for (i in o) {
                    if (o.hasOwnProperty(i)) {
                        val = o[i];
                        if (i == 'require') {
                            this.require(val);
                        } else if (i == 'modules') {
                            for (j in val) {
                                if (val.hasOwnProperty(j)) {
                                    this.addModule(val[j], j);
                                }
                            }
                        } else {
                            this[i] = val;
                        }
                    }
                }
            }
            f = this.filter;
            if (L.isString(f)) {
                f = f.toUpperCase();
                this.filterName = f;
                this.filter = this.FILTER_DEFS[f];
                if (f == 'DEBUG') {
                    this.require('yui-log', 'dump');
                }
            }
        }, formatSkin:function (skin, mod) {
            var s = this.SKIN_PREFIX + skin;
            if (mod) {
                s = s + "-" + mod;
            }
            return s;
        }, _addSkin:function (skin, mod, parent) {
            var name = this.formatSkin(skin), info = this.moduleInfo, sinf = this.skin, ext = info[mod] && info[mod].ext, mdef, pkg;
            if (mod) {
                name = this.formatSkin(skin, mod);
                if (!info[name]) {
                    mdef = info[mod];
                    pkg = mdef.pkg || mod;
                    this.addModule({'name':name, 'type':'css', 'after':sinf.after, 'path':(parent || pkg) + '/' + sinf.base + skin + '/' + mod + '.css', 'ext':ext});
                }
            }
            return name;
        }, addModule:function (o, name) {
            name = name || o.name;
            o.name = name;
            if (!o || !o.name) {
                return false;
            }
            if (!o.type) {
                o.type = JS;
            }
            if (!o.path && !o.fullpath) {
                o.path = _path(name, name, o.type);
            }
            o.ext = ('ext'in o) ? o.ext : (this._internal) ? false : true;
            o.requires = o.requires || [];
            this.moduleInfo[name] = o;
            var subs = o.submodules, i, l, sup, s, smod, plugins, plug;
            if (subs) {
                sup = [];
                l = 0;
                for (i in subs) {
                    if (subs.hasOwnProperty(i)) {
                        s = subs[i];
                        s.path = _path(name, i, o.type);
                        this.addModule(s, i);
                        sup.push(i);
                        if (o.skinnable) {
                            smod = this._addSkin(this.skin.defaultSkin, i, name);
                            sup.push(smod.name);
                        }
                        l++;
                    }
                }
                o.supersedes = sup;
                o.rollup = (l < 4) ? l : Math.min(l - 1, 4);
            }
            plugins = o.plugins;
            if (plugins) {
                for (i in plugins) {
                    if (plugins.hasOwnProperty(i)) {
                        plug = plugins[i];
                        plug.path = _path(name, i, o.type);
                        plug.requires = plug.requires || [];
                        this.addModule(plug, i);
                        if (o.skinnable) {
                            this._addSkin(this.skin.defaultSkin, i, name);
                        }
                    }
                }
            }
            this.dirty = true;
            return o;
        }, require:function (what) {
            var a = (typeof what === "string") ? arguments : what;
            this.dirty = true;
            Y.mix(this.required, Y.Array.hash(a));
        }, getRequires:function (mod) {
            if (!mod) {
                return[];
            }
            if (!this.dirty && mod.expanded) {
                return mod.expanded;
            }
            var i, d = [], r = mod.requires, o = mod.optional, info = this.moduleInfo, m, j, add;
            for (i = 0; i < r.length; i = i + 1) {
                d.push(r[i]);
                m = this.getModule(r[i]);
                add = this.getRequires(m);
                for (j = 0; j < add.length; j = j + 1) {
                    d.push(add[j]);
                }
            }
            r = mod.supersedes;
            if (r) {
                for (i = 0; i < r.length; i = i + 1) {
                    d.push(r[i]);
                    m = this.getModule(r[i]);
                    add = this.getRequires(m);
                    for (j = 0; j < add.length; j = j + 1) {
                        d.push(add[j]);
                    }
                }
            }
            if (o && this.loadOptional) {
                for (i = 0; i < o.length; i = i + 1) {
                    d.push(o[i]);
                    add = this.getRequires(info[o[i]]);
                    for (j = 0; j < add.length; j = j + 1) {
                        d.push(add[j]);
                    }
                }
            }
            mod.expanded = Y.Object.keys(Y.Array.hash(d));
            return mod.expanded;
        }, getProvides:function (name) {
            var m = this.getModule(name), o, s;
            if (!m) {
                return NOT_FOUND;
            }
            if (m && !m.provides) {
                o = {};
                s = m.supersedes;
                if (s) {
                    Y.Array.each(s, function (v) {
                        Y.mix(o, this.getProvides(v));
                    }, this);
                }
                o[name] = true;
                m.provides = o;
            }
            return m.provides;
        }, calculate:function (o, type) {
            if (o || type || this.dirty) {
                this._config(o);
                this._setup();
                this._explode();
                if (this.allowRollup && !this.combine) {
                    this._rollup();
                }
                this._reduce();
                this._sort();
                this.dirty = false;
            }
        }, _setup:function () {
            var info = this.moduleInfo, name, i, j, m, o, l, smod;
            for (name in info) {
                if (info.hasOwnProperty(name)) {
                    m = info[name];
                    if (m && m.skinnable) {
                        o = this.skin.overrides;
                        if (o && o[name]) {
                            for (i = 0; i < o[name].length; i = i + 1) {
                                smod = this._addSkin(o[name][i], name);
                            }
                        } else {
                            smod = this._addSkin(this.skin.defaultSkin, name);
                        }
                        m.requires.push(smod);
                    }
                }
            }
            l = Y.merge(this.inserted);
            if (!this.ignoreRegistered) {
                Y.mix(l, GLOBAL_ENV.mods);
            }
            if (this.ignore) {
                Y.mix(l, Y.Array.hash(this.ignore));
            }
            for (j in l) {
                if (l.hasOwnProperty(j)) {
                    Y.mix(l, this.getProvides(j));
                }
            }
            if (this.force) {
                for (i = 0; i < this.force.length; i = i + 1) {
                    if (this.force[i]in l) {
                        delete l[this.force[i]];
                    }
                }
            }
            Y.mix(this.loaded, l);
        }, _explode:function () {
            var r = this.required, m, reqs;
            Y.Object.each(r, function (v, name) {
                m = this.getModule(name);
                var expound = m && m.expound;
                if (m) {
                    if (expound) {
                        r[expound] = this.getModule(expound);
                        reqs = this.getRequires(r[expound]);
                        Y.mix(r, Y.Array.hash(reqs));
                    }
                    reqs = this.getRequires(m);
                    Y.mix(r, Y.Array.hash(reqs));
                }
            }, this);
        }, getModule:function (name) {
            var m = this.moduleInfo[name];
            return m;
        }, _rollup:function () {
            var i, j, m, s, rollups = {}, r = this.required, roll, info = this.moduleInfo, rolled, c;
            if (this.dirty || !this.rollups) {
                for (i in info) {
                    if (info.hasOwnProperty(i)) {
                        m = this.getModule(i);
                        if (m && m.rollup) {
                            rollups[i] = m;
                        }
                    }
                }
                this.rollups = rollups;
                this.forceMap = (this.force) ? Y.Array.hash(this.force) : {};
            }
            for (; ;) {
                rolled = false;
                for (i in rollups) {
                    if (rollups.hasOwnProperty(i)) {
                        if (!r[i] && ((!this.loaded[i]) || this.forceMap[i])) {
                            m = this.getModule(i);
                            s = m.supersedes || [];
                            roll = false;
                            if (!m.rollup) {
                                continue;
                            }
                            c = 0;
                            for (j = 0; j < s.length; j = j + 1) {
                                if (this.loaded[s[j]] && !this.forceMap[s[j]]) {
                                    roll = false;
                                    break;
                                } else if (r[s[j]]) {
                                    c++;
                                    roll = (c >= m.rollup);
                                    if (roll) {
                                        break;
                                    }
                                }
                            }
                            if (roll) {
                                r[i] = true;
                                rolled = true;
                                this.getRequires(m);
                            }
                        }
                    }
                }
                if (!rolled) {
                    break;
                }
            }
        }, _reduce:function () {
            var i, j, s, m, r = this.required, type = this.loadType;
            for (i in r) {
                if (r.hasOwnProperty(i)) {
                    m = this.getModule(i);
                    if ((this.loaded[i] && (!this.forceMap[i]) && !this.ignoreRegistered) || (type && m && m.type != type)) {
                        delete r[i];
                    } else {
                        s = m && m.supersedes;
                        if (s) {
                            for (j = 0; j < s.length; j = j + 1) {
                                if (s[j]in r) {
                                    delete r[s[j]];
                                }
                            }
                        }
                    }
                }
            }
        }, _attach:function () {
            if (this.attaching) {
                Y._attach(this.attaching);
            } else {
                Y._attach(this.sorted);
            }
        }, _finish:function () {
            _queue.running = false;
            this._continue();
        }, _onSuccess:function () {
            this._attach();
            var skipped = this.skipped, i, f;
            for (i in skipped) {
                if (skipped.hasOwnProperty(i)) {
                    delete this.inserted[i];
                }
            }
            this.skipped = {};
            f = this.onSuccess;
            if (f) {
                f.call(this.context, {msg:'success', data:this.data, success:true});
            }
            this._finish();
        }, _onFailure:function (o) {
            this._attach();
            var f = this.onFailure;
            if (f) {
                f.call(this.context, {msg:'failure: ' + o.msg, data:this.data, success:false});
            }
            this._finish();
        }, _onTimeout:function () {
            this._attach();
            var f = this.onTimeout;
            if (f) {
                f.call(this.context, {msg:'timeout', data:this.data, success:false});
            }
            this._finish();
        }, _sort:function () {
            var s = Y.Object.keys(this.required), info = this.moduleInfo, loaded = this.loaded, done = {}, p = 0, l, a, b, j, k, moved, doneKey, requires = Y.cached(function (mod1, mod2) {
                var m = info[mod1], i, r, after, other = info[mod2], s;
                if (loaded[mod2] || !m || !other) {
                    return false;
                }
                r = m.expanded;
                after = m.after;
                if (r && Y.Array.indexOf(r, mod2) > -1) {
                    return true;
                }
                if (after && Y.Array.indexOf(after, mod2) > -1) {
                    return true;
                }
                s = info[mod2] && info[mod2].supersedes;
                if (s) {
                    for (i = 0; i < s.length; i = i + 1) {
                        if (requires(mod1, s[i])) {
                            return true;
                        }
                    }
                }
                if (m.ext && m.type == CSS && !other.ext && other.type == CSS) {
                    return true;
                }
                return false;
            });
            for (; ;) {
                l = s.length;
                moved = false;
                for (j = p; j < l; j = j + 1) {
                    a = s[j];
                    for (k = j + 1; k < l; k = k + 1) {
                        doneKey = a + s[k];
                        if (!done[doneKey] && requires(a, s[k])) {
                            b = s.splice(k, 1);
                            s.splice(j, 0, b[0]);
                            done[doneKey] = true;
                            moved = true;
                            break;
                        }
                    }
                    if (moved) {
                        break;
                    } else {
                        p = p + 1;
                    }
                }
                if (!moved) {
                    break;
                }
            }
            this.sorted = s;
        }, _insert:function (source, o, type) {
            if (source) {
                this._config(source);
            }
            this.calculate(o);
            this.loadType = type;
            if (!type) {
                var self = this;
                this._internalCallback = function () {
                    var f = self.onCSS;
                    if (f) {
                        f.call(self.context, Y);
                    }
                    self._internalCallback = null;
                    self._insert(null, null, JS);
                };
                this._insert(null, null, CSS);
                return;
            }
            this._loading = true;
            this._combineComplete = {};
            this.loadNext();
        }, _continue:function () {
            if (!(_queue.running) && _queue.size() > 0) {
                _queue.running = true;
                _queue.next()();
            }
        }, insert:function (o, type) {
            var self = this, copy = Y.merge(this, true);
            delete copy.require;
            delete copy.dirty;
            _queue.add(function () {
                self._insert(copy, o, type);
            });
            this._continue();
        }, loadNext:function (mname) {
            if (!this._loading) {
                return;
            }
            var s, len, i, m, url, self = this, type = this.loadType, fn, msg, attr, callback = function (o) {
                this._combineComplete[type] = true;
                var c = this._combining, len = c.length, i;
                for (i = 0; i < len; i = i + 1) {
                    this.inserted[c[i]] = true;
                }
                this.loadNext(o.data);
            }, onsuccess = function (o) {
                self.loadNext(o.data);
            };
            if (this.combine && (!this._combineComplete[type])) {
                this._combining = [];
                s = this.sorted;
                len = s.length;
                url = this.comboBase;
                for (i = 0; i < len; i = i + 1) {
                    m = this.getModule(s[i]);
                    if (m && (m.type === type) && !m.ext) {
                        url += this.root + m.path;
                        if (i < len - 1) {
                            url += '&';
                        }
                        this._combining.push(s[i]);
                    }
                }
                if (this._combining.length) {
                    if (type === CSS) {
                        fn = Y.Get.css;
                        attr = this.cssAttributes;
                    } else {
                        fn = Y.Get.script;
                        attr = this.jsAttributes;
                    }
                    fn(this._filter(url), {data:this._loading, onSuccess:callback, onFailure:this._onFailure, onTimeout:this._onTimeout, insertBefore:this.insertBefore, charset:this.charset, attributes:attr, timeout:this.timeout, autopurge:false, context:self});
                    return;
                } else {
                    this._combineComplete[type] = true;
                }
            }
            if (mname) {
                if (mname !== this._loading) {
                    return;
                }
                this.inserted[mname] = true;
                this.loaded[mname] = true;
                if (this.onProgress) {
                    this.onProgress.call(this.context, {name:mname, data:this.data});
                }
            }
            s = this.sorted;
            len = s.length;
            for (i = 0; i < len; i = i + 1) {
                if (s[i]in this.inserted) {
                    continue;
                }
                if (s[i] === this._loading) {
                    return;
                }
                m = this.getModule(s[i]);
                if (!m) {
                    msg = "Undefined module " + s[i] + " skipped";
                    this.inserted[s[i]] = true;
                    this.skipped[s[i]] = true;
                    continue;
                }
                if (!type || type === m.type) {
                    this._loading = s[i];
                    if (m.type === CSS) {
                        fn = Y.Get.css;
                        attr = this.cssAttributes;
                    } else {
                        fn = Y.Get.script;
                        attr = this.jsAttributes;
                    }
                    url = (m.fullpath) ? this._filter(m.fullpath, s[i]) : this._url(m.path, s[i]);
                    fn(url, {data:s[i], onSuccess:onsuccess, insertBefore:this.insertBefore, charset:this.charset, attributes:attr, onFailure:this._onFailure, onTimeout:this._onTimeout, timeout:this.timeout, autopurge:false, context:self});
                    return;
                }
            }
            this._loading = null;
            fn = this._internalCallback;
            if (fn) {
                this._internalCallback = null;
                fn.call(this);
            } else {
                this._onSuccess();
            }
        }, _filter:function (u, name) {
            var f = this.filter, hasFilter = name && (name in this.filters), modFilter = hasFilter && this.filters[name];
            if (u) {
                if (hasFilter) {
                    f = (L.isString(modFilter)) ? this.FILTER_DEFS[modFilter.toUpperCase()] || null : modFilter;
                }
                if (f) {
                    u = u.replace(new RegExp(f.searchExp, 'g'), f.replaceStr);
                }
            }
            return u;
        }, _url:function (path, name) {
            return this._filter((this.base || "") + path, name);
        }};
    })();
}, '3.0.0');