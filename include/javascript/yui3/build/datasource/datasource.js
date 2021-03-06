/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('datasource-local', function (Y) {
    var LANG = Y.Lang, DSLocal = function () {
        DSLocal.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DSLocal, {NAME:"dataSourceLocal", ATTRS:{source:{value:null}}, _tId:0, issueCallback:function (e) {
        if (e.callback) {
            var callbackFunc = (e.error && e.callback.failure) || e.callback.success;
            if (callbackFunc) {
                callbackFunc(e);
            }
        }
    }});
    Y.extend(DSLocal, Y.Base, {initializer:function (config) {
        this._initEvents();
    }, _initEvents:function () {
        this.publish("request", {defaultFn:Y.bind("_defRequestFn", this), queuable:true});
        this.publish("data", {defaultFn:Y.bind("_defDataFn", this), queuable:true});
        this.publish("response", {defaultFn:Y.bind("_defResponseFn", this), queuable:true});
    }, _defRequestFn:function (e) {
        var data = this.get("source");
        if (LANG.isUndefined(data)) {
            e.error = new Error("Local source undefined");
        }
        if (e.error) {
            this.fire("error", e);
        }
        this.fire("data", Y.mix({data:data}, e));
    }, _defDataFn:function (e) {
        var data = e.data, meta = e.meta, response = {results:(LANG.isArray(data)) ? data : [data], meta:(meta) ? meta : {}};
        this.fire("response", Y.mix({response:response}, e));
    }, _defResponseFn:function (e) {
        DSLocal.issueCallback(e);
    }, sendRequest:function (request, callback, cfg) {
        var tId = DSLocal._tId++;
        this.fire("request", {tId:tId, request:request, callback:callback, cfg:cfg || {}});
        return tId;
    }});
    Y.namespace("DataSource").Local = DSLocal;
}, '3.0.0', {requires:['base']});
YUI.add('datasource-io', function (Y) {
    var DSIO = function () {
        DSIO.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DSIO, {NAME:"dataSourceIO", ATTRS:{io:{value:Y.io, cloneDefaultValue:false}}});
    Y.extend(DSIO, Y.DataSource.Local, {initializer:function (config) {
        this._queue = {interval:null, conn:null, requests:[]};
    }, _queue:null, _defRequestFn:function (e) {
        var uri = this.get("source"), io = this.get("io"), request = e.request, cfg = Y.mix(e.cfg, {on:{success:function (id, response, e) {
            this.fire("data", Y.mix({data:response}, e));
        }, failure:function (id, response, e) {
            e.error = new Error("IO data failure");
            this.fire("error", Y.mix({data:response}, e));
            this.fire("data", Y.mix({data:response}, e));
        }}, context:this, arguments:e});
        if (Y.Lang.isString(request)) {
            if (cfg.method && (cfg.method.toUpperCase() === "POST")) {
                cfg.data = cfg.data ? cfg.data + request : request;
            }
            else {
                uri += request;
            }
        }
        io(uri, cfg);
        return e.tId;
    }});
    Y.DataSource.IO = DSIO;
}, '3.0.0', {requires:['datasource-local', 'io']});
YUI.add('datasource-get', function (Y) {
    var DSGet = function () {
        DSGet.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DSGet, {NAME:"dataSourceGet", ATTRS:{get:{value:Y.Get, cloneDefaultValue:false}, asyncMode:{value:"allowAll"}, scriptCallbackParam:{value:"callback"}, generateRequestCallback:{value:function (self, id) {
        return"&" + self.get("scriptCallbackParam") + "=YUI.Env.DataSource.callbacks[" + id + "]";
    }}}, callbacks:[], _tId:0});
    Y.extend(DSGet, Y.DataSource.Local, {_defRequestFn:function (e) {
        var uri = this.get("source"), get = this.get("get"), id = DSGet._tId++, self = this;
        YUI.Env.DataSource.callbacks[id] = Y.rbind(function (response) {
            if ((self.get("asyncMode") !== "ignoreStaleResponses") || (id === DSGet.callbacks.length - 1)) {
                self.fire("data", Y.mix({data:response}, e));
            }
            else {
            }
            delete DSGet.callbacks[id];
        }, this, id);
        uri += e.request + this.get("generateRequestCallback")(this, id);
        get.script(uri, {autopurge:true, onFailure:Y.bind(function (e) {
            e.error = new Error("Script node data failure");
            this.fire("error", e);
        }, this, e)});
        return e.tId;
    }});
    Y.DataSource.Get = DSGet;
    YUI.namespace("Env.DataSource.callbacks");
}, '3.0.0', {requires:['datasource-local', 'get']});
YUI.add('datasource-function', function (Y) {
    var LANG = Y.Lang, DSFn = function () {
        DSFn.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DSFn, {NAME:"dataSourceFunction", ATTRS:{source:{validator:LANG.isFunction}}});
    Y.extend(DSFn, Y.DataSource.Local, {_defRequestFn:function (e) {
        var fn = this.get("source"), response;
        if (fn) {
            try {
                response = fn(e.request, this, e);
                this.fire("data", Y.mix({data:response}, e));
            }
            catch (error) {
                e.error = error;
                this.fire("error", e);
            }
        }
        else {
            e.error = new Error("Function data failure");
            this.fire("error", e);
        }
        return e.tId;
    }});
    Y.DataSource.Function = DSFn;
}, '3.0.0', {requires:['datasource-local']});
YUI.add('datasource-cache', function (Y) {
    var DataSourceCache = function () {
        DataSourceCache.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DataSourceCache, {NS:"cache", NAME:"dataSourceCache", ATTRS:{}});
    Y.extend(DataSourceCache, Y.Cache, {initializer:function (config) {
        this.doBefore("_defRequestFn", this._beforeDefRequestFn);
        this.doBefore("_defResponseFn", this._beforeDefResponseFn);
    }, _beforeDefRequestFn:function (e) {
        var entry = (this.retrieve(e.request)) || null;
        if (entry && entry.response) {
            this.get("host").fire("response", Y.mix({response:entry.response}, e));
            return new Y.Do.Halt("DataSourceCache plugin halted _defRequestFn");
        }
    }, _beforeDefResponseFn:function (e) {
        if (e.response && !e.response.cached) {
            e.response.cached = true;
            this.add(e.request, e.response, (e.callback && e.callback.argument));
        }
    }});
    Y.namespace('Plugin').DataSourceCache = DataSourceCache;
}, '3.0.0', {requires:['datasource-local', 'cache']});
YUI.add('datasource-jsonschema', function (Y) {
    var DataSourceJSONSchema = function () {
        DataSourceJSONSchema.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DataSourceJSONSchema, {NS:"schema", NAME:"dataSourceJSONSchema", ATTRS:{schema:{}}});
    Y.extend(DataSourceJSONSchema, Y.Plugin.Base, {initializer:function (config) {
        this.doBefore("_defDataFn", this._beforeDefDataFn);
    }, _beforeDefDataFn:function (e) {
        var data = (Y.DataSource.IO && (this.get("host")instanceof Y.DataSource.IO) && Y.Lang.isString(e.data.responseText)) ? e.data.responseText : e.data, response = Y.DataSchema.JSON.apply(this.get("schema"), data);
        if (!response) {
            response = {meta:{}, results:data};
        }
        this.get("host").fire("response", Y.mix({response:response}, e));
        return new Y.Do.Halt("DataSourceJSONSchema plugin halted _defDataFn");
    }});
    Y.namespace('Plugin').DataSourceJSONSchema = DataSourceJSONSchema;
}, '3.0.0', {requires:['plugin', 'datasource-local', 'dataschema-json']});
YUI.add('datasource-xmlschema', function (Y) {
    var DataSourceXMLSchema = function () {
        DataSourceXMLSchema.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DataSourceXMLSchema, {NS:"schema", NAME:"dataSourceXMLSchema", ATTRS:{schema:{}}});
    Y.extend(DataSourceXMLSchema, Y.Plugin.Base, {initializer:function (config) {
        this.doBefore("_defDataFn", this._beforeDefDataFn);
    }, _beforeDefDataFn:function (e) {
        var data = (Y.DataSource.IO && (this.get("host")instanceof Y.DataSource.IO) && e.data.responseXML && (e.data.responseXML.nodeType === 9)) ? e.data.responseXML : e.data, response = Y.DataSchema.XML.apply(this.get("schema"), data);
        if (!response) {
            response = {meta:{}, results:data};
        }
        this.get("host").fire("response", Y.mix({response:response}, e));
        return new Y.Do.Halt("DataSourceXMLSchema plugin halted _defDataFn");
    }});
    Y.namespace('Plugin').DataSourceXMLSchema = DataSourceXMLSchema;
}, '3.0.0', {requires:['plugin', 'datasource-local', 'dataschema-xml']});
YUI.add('datasource-arrayschema', function (Y) {
    var DataSourceArraySchema = function () {
        DataSourceArraySchema.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DataSourceArraySchema, {NS:"schema", NAME:"dataSourceArraySchema", ATTRS:{schema:{}}});
    Y.extend(DataSourceArraySchema, Y.Plugin.Base, {initializer:function (config) {
        this.doBefore("_defDataFn", this._beforeDefDataFn);
    }, _beforeDefDataFn:function (e) {
        var data = (Y.DataSource.IO && (this.get("host")instanceof Y.DataSource.IO) && Y.Lang.isString(e.data.responseText)) ? e.data.responseText : e.data, response = Y.DataSchema.Array.apply(this.get("schema"), data);
        if (!response) {
            response = {meta:{}, results:data};
        }
        this.get("host").fire("response", Y.mix({response:response}, e));
        return new Y.Do.Halt("DataSourceArraySchema plugin halted _defDataFn");
    }});
    Y.namespace('Plugin').DataSourceArraySchema = DataSourceArraySchema;
}, '3.0.0', {requires:['plugin', 'datasource-local', 'dataschema-array']});
YUI.add('datasource-textschema', function (Y) {
    var DataSourceTextSchema = function () {
        DataSourceTextSchema.superclass.constructor.apply(this, arguments);
    };
    Y.mix(DataSourceTextSchema, {NS:"schema", NAME:"dataSourceTextSchema", ATTRS:{schema:{}}});
    Y.extend(DataSourceTextSchema, Y.Plugin.Base, {initializer:function (config) {
        this.doBefore("_defDataFn", this._beforeDefDataFn);
    }, _beforeDefDataFn:function (e) {
        var data = (Y.DataSource.IO && (this.get("host")instanceof Y.DataSource.IO) && Y.Lang.isString(e.data.responseText)) ? e.data.responseText : e.data, response = Y.DataSchema.Text.apply(this.get("schema"), data);
        if (!response) {
            response = {meta:{}, results:data};
        }
        this.get("host").fire("response", Y.mix({response:response}, e));
        return new Y.Do.Halt("DataSourceTextSchema plugin halted _defDataFn");
    }});
    Y.namespace('Plugin').DataSourceTextSchema = DataSourceTextSchema;
}, '3.0.0', {requires:['plugin', 'datasource-local', 'dataschema-text']});
YUI.add('datasource-polling', function (Y) {
    var LANG = Y.Lang, Pollable = function () {
        this._intervals = {};
    };
    Pollable.prototype = {_intervals:null, setInterval:function (msec, request, callback) {
        var x = Y.later(msec, this, this.sendRequest, [request, callback], true);
        this._intervals[x.id] = x;
        return x.id;
    }, clearInterval:function (id, key) {
        id = key || id;
        if (this._intervals[id]) {
            this._intervals[id].cancel();
            delete this._intervals[id];
        }
    }, clearAllIntervals:function () {
        Y.each(this._intervals, this.clearInterval, this);
    }};
    Y.augment(Y.DataSource.Local, Pollable);
}, '3.0.0', {requires:['datasource-local']});
YUI.add('datasource', function (Y) {
}, '3.0.0', {use:['datasource-local', 'datasource-io', 'datasource-get', 'datasource-function', 'datasource-cache', 'datasource-jsonschema', 'datasource-xmlschema', 'datasource-arrayschema', 'datasource-textschema', 'datasource-polling']});