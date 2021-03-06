/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("datasource-local", function (C) {
    var B = C.Lang, A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    C.mix(A, {NAME:"dataSourceLocal", ATTRS:{source:{value:null}}, _tId:0, issueCallback:function (E) {
        if (E.callback) {
            var D = (E.error && E.callback.failure) || E.callback.success;
            if (D) {
                D(E);
            }
        }
    }});
    C.extend(A, C.Base, {initializer:function (D) {
        this._initEvents();
    }, _initEvents:function () {
        this.publish("request", {defaultFn:C.bind("_defRequestFn", this), queuable:true});
        this.publish("data", {defaultFn:C.bind("_defDataFn", this), queuable:true});
        this.publish("response", {defaultFn:C.bind("_defResponseFn", this), queuable:true});
    }, _defRequestFn:function (E) {
        var D = this.get("source");
        if (B.isUndefined(D)) {
            E.error = new Error("Local source undefined");
        }
        if (E.error) {
            this.fire("error", E);
        }
        this.fire("data", C.mix({data:D}, E));
    }, _defDataFn:function (G) {
        var E = G.data, F = G.meta, D = {results:(B.isArray(E)) ? E : [E], meta:(F) ? F : {}};
        this.fire("response", C.mix({response:D}, G));
    }, _defResponseFn:function (D) {
        A.issueCallback(D);
    }, sendRequest:function (E, G, D) {
        var F = A._tId++;
        this.fire("request", {tId:F, request:E, callback:G, cfg:D || {}});
        return F;
    }});
    C.namespace("DataSource").Local = A;
}, "3.0.0", {requires:["base"]});
YUI.add("datasource-io", function (B) {
    var A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    B.mix(A, {NAME:"dataSourceIO", ATTRS:{io:{value:B.io, cloneDefaultValue:false}}});
    B.extend(A, B.DataSource.Local, {initializer:function (C) {
        this._queue = {interval:null, conn:null, requests:[]};
    }, _queue:null, _defRequestFn:function (F) {
        var E = this.get("source"), G = this.get("io"), D = F.request, C = B.mix(F.cfg, {on:{success:function (J, H, I) {
            this.fire("data", B.mix({data:H}, I));
        }, failure:function (J, H, I) {
            I.error = new Error("IO data failure");
            this.fire("error", B.mix({data:H}, I));
            this.fire("data", B.mix({data:H}, I));
        }}, context:this, arguments:F});
        if (B.Lang.isString(D)) {
            if (C.method && (C.method.toUpperCase() === "POST")) {
                C.data = C.data ? C.data + D : D;
            } else {
                E += D;
            }
        }
        G(E, C);
        return F.tId;
    }});
    B.DataSource.IO = A;
}, "3.0.0", {requires:["datasource-local", "io"]});
YUI.add("datasource-get", function (B) {
    var A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    B.mix(A, {NAME:"dataSourceGet", ATTRS:{get:{value:B.Get, cloneDefaultValue:false}, asyncMode:{value:"allowAll"}, scriptCallbackParam:{value:"callback"}, generateRequestCallback:{value:function (C, D) {
        return"&" + C.get("scriptCallbackParam") + "=YUI.Env.DataSource.callbacks[" + D + "]";
    }}}, callbacks:[], _tId:0});
    B.extend(A, B.DataSource.Local, {_defRequestFn:function (F) {
        var E = this.get("source"), D = this.get("get"), G = A._tId++, C = this;
        YUI.Env.DataSource.callbacks[G] = B.rbind(function (H) {
            if ((C.get("asyncMode") !== "ignoreStaleResponses") || (G === A.callbacks.length - 1)) {
                C.fire("data", B.mix({data:H}, F));
            } else {
            }
            delete A.callbacks[G];
        }, this, G);
        E += F.request + this.get("generateRequestCallback")(this, G);
        D.script(E, {autopurge:true, onFailure:B.bind(function (H) {
            H.error = new Error("Script node data failure");
            this.fire("error", H);
        }, this, F)});
        return F.tId;
    }});
    B.DataSource.Get = A;
    YUI.namespace("Env.DataSource.callbacks");
}, "3.0.0", {requires:["datasource-local", "get"]});
YUI.add("datasource-function", function (B) {
    var A = B.Lang, C = function () {
        C.superclass.constructor.apply(this, arguments);
    };
    B.mix(C, {NAME:"dataSourceFunction", ATTRS:{source:{validator:A.isFunction}}});
    B.extend(C, B.DataSource.Local, {_defRequestFn:function (G) {
        var F = this.get("source"), D;
        if (F) {
            try {
                D = F(G.request, this, G);
                this.fire("data", B.mix({data:D}, G));
            } catch (E) {
                G.error = E;
                this.fire("error", G);
            }
        } else {
            G.error = new Error("Function data failure");
            this.fire("error", G);
        }
        return G.tId;
    }});
    B.DataSource.Function = C;
}, "3.0.0", {requires:["datasource-local"]});
YUI.add("datasource-cache", function (B) {
    var A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    B.mix(A, {NS:"cache", NAME:"dataSourceCache", ATTRS:{}});
    B.extend(A, B.Cache, {initializer:function (C) {
        this.doBefore("_defRequestFn", this._beforeDefRequestFn);
        this.doBefore("_defResponseFn", this._beforeDefResponseFn);
    }, _beforeDefRequestFn:function (D) {
        var C = (this.retrieve(D.request)) || null;
        if (C && C.response) {
            this.get("host").fire("response", B.mix({response:C.response}, D));
            return new B.Do.Halt("DataSourceCache plugin halted _defRequestFn");
        }
    }, _beforeDefResponseFn:function (C) {
        if (C.response && !C.response.cached) {
            C.response.cached = true;
            this.add(C.request, C.response, (C.callback && C.callback.argument));
        }
    }});
    B.namespace("Plugin").DataSourceCache = A;
}, "3.0.0", {requires:["datasource-local", "cache"]});
YUI.add("datasource-jsonschema", function (B) {
    var A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    B.mix(A, {NS:"schema", NAME:"dataSourceJSONSchema", ATTRS:{schema:{}}});
    B.extend(A, B.Plugin.Base, {initializer:function (C) {
        this.doBefore("_defDataFn", this._beforeDefDataFn);
    }, _beforeDefDataFn:function (E) {
        var D = (B.DataSource.IO && (this.get("host")instanceof B.DataSource.IO) && B.Lang.isString(E.data.responseText)) ? E.data.responseText : E.data, C = B.DataSchema.JSON.apply(this.get("schema"), D);
        if (!C) {
            C = {meta:{}, results:D};
        }
        this.get("host").fire("response", B.mix({response:C}, E));
        return new B.Do.Halt("DataSourceJSONSchema plugin halted _defDataFn");
    }});
    B.namespace("Plugin").DataSourceJSONSchema = A;
}, "3.0.0", {requires:["plugin", "datasource-local", "dataschema-json"]});
YUI.add("datasource-xmlschema", function (B) {
    var A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    B.mix(A, {NS:"schema", NAME:"dataSourceXMLSchema", ATTRS:{schema:{}}});
    B.extend(A, B.Plugin.Base, {initializer:function (C) {
        this.doBefore("_defDataFn", this._beforeDefDataFn);
    }, _beforeDefDataFn:function (E) {
        var D = (B.DataSource.IO && (this.get("host")instanceof B.DataSource.IO) && E.data.responseXML && (E.data.responseXML.nodeType === 9)) ? E.data.responseXML : E.data, C = B.DataSchema.XML.apply(this.get("schema"), D);
        if (!C) {
            C = {meta:{}, results:D};
        }
        this.get("host").fire("response", B.mix({response:C}, E));
        return new B.Do.Halt("DataSourceXMLSchema plugin halted _defDataFn");
    }});
    B.namespace("Plugin").DataSourceXMLSchema = A;
}, "3.0.0", {requires:["plugin", "datasource-local", "dataschema-xml"]});
YUI.add("datasource-arrayschema", function (B) {
    var A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    B.mix(A, {NS:"schema", NAME:"dataSourceArraySchema", ATTRS:{schema:{}}});
    B.extend(A, B.Plugin.Base, {initializer:function (C) {
        this.doBefore("_defDataFn", this._beforeDefDataFn);
    }, _beforeDefDataFn:function (E) {
        var D = (B.DataSource.IO && (this.get("host")instanceof B.DataSource.IO) && B.Lang.isString(E.data.responseText)) ? E.data.responseText : E.data, C = B.DataSchema.Array.apply(this.get("schema"), D);
        if (!C) {
            C = {meta:{}, results:D};
        }
        this.get("host").fire("response", B.mix({response:C}, E));
        return new B.Do.Halt("DataSourceArraySchema plugin halted _defDataFn");
    }});
    B.namespace("Plugin").DataSourceArraySchema = A;
}, "3.0.0", {requires:["plugin", "datasource-local", "dataschema-array"]});
YUI.add("datasource-textschema", function (B) {
    var A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    B.mix(A, {NS:"schema", NAME:"dataSourceTextSchema", ATTRS:{schema:{}}});
    B.extend(A, B.Plugin.Base, {initializer:function (C) {
        this.doBefore("_defDataFn", this._beforeDefDataFn);
    }, _beforeDefDataFn:function (E) {
        var D = (B.DataSource.IO && (this.get("host")instanceof B.DataSource.IO) && B.Lang.isString(E.data.responseText)) ? E.data.responseText : E.data, C = B.DataSchema.Text.apply(this.get("schema"), D);
        if (!C) {
            C = {meta:{}, results:D};
        }
        this.get("host").fire("response", B.mix({response:C}, E));
        return new B.Do.Halt("DataSourceTextSchema plugin halted _defDataFn");
    }});
    B.namespace("Plugin").DataSourceTextSchema = A;
}, "3.0.0", {requires:["plugin", "datasource-local", "dataschema-text"]});
YUI.add("datasource-polling", function (C) {
    var A = C.Lang, B = function () {
        this._intervals = {};
    };
    B.prototype = {_intervals:null, setInterval:function (F, E, G) {
        var D = C.later(F, this, this.sendRequest, [E, G], true);
        this._intervals[D.id] = D;
        return D.id;
    }, clearInterval:function (E, D) {
        E = D || E;
        if (this._intervals[E]) {
            this._intervals[E].cancel();
            delete this._intervals[E];
        }
    }, clearAllIntervals:function () {
        C.each(this._intervals, this.clearInterval, this);
    }};
    C.augment(C.DataSource.Local, B);
}, "3.0.0", {requires:["datasource-local"]});
YUI.add("datasource", function (A) {
}, "3.0.0", {use:["datasource-local", "datasource-io", "datasource-get", "datasource-function", "datasource-cache", "datasource-jsonschema", "datasource-xmlschema", "datasource-arrayschema", "datasource-textschema", "datasource-polling"]});