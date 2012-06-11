/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('attribute-base', function (Y) {
    Y.State = function () {
        this.data = {};
    };
    Y.State.prototype = {add:function (name, key, val) {
        var d = this.data;
        d[key] = d[key] || {};
        d[key][name] = val;
    }, addAll:function (name, o) {
        var key;
        for (key in o) {
            if (o.hasOwnProperty(key)) {
                this.add(name, key, o[key]);
            }
        }
    }, remove:function (name, key) {
        var d = this.data;
        if (d[key] && (name in d[key])) {
            delete d[key][name];
        }
    }, removeAll:function (name, o) {
        var d = this.data;
        Y.each(o || d, function (v, k) {
            if (Y.Lang.isString(k)) {
                this.remove(name, k);
            } else {
                this.remove(name, v);
            }
        }, this);
    }, get:function (name, key) {
        var d = this.data;
        return(d[key] && name in d[key]) ? d[key][name] : undefined;
    }, getAll:function (name) {
        var d = this.data, o;
        Y.each(d, function (v, k) {
            if (name in d[k]) {
                o = o || {};
                o[k] = v[name];
            }
        }, this);
        return o;
    }};
    var O = Y.Object, Lang = Y.Lang, EventTarget = Y.EventTarget, DOT = ".", CHANGE = "Change", GETTER = "getter", SETTER = "setter", READ_ONLY = "readOnly", WRITE_ONCE = "writeOnce", VALIDATOR = "validator", VALUE = "value", VALUE_FN = "valueFn", BROADCAST = "broadcast", LAZY_ADD = "lazyAdd", BYPASS_PROXY = "_bypassProxy", ADDED = "added", INITIALIZING = "initializing", INIT_VALUE = "initValue", PUBLISHED = "published", DEF_VALUE = "defaultValue", LAZY = "lazy", IS_LAZY_ADD = "isLazyAdd", INVALID_VALUE, MODIFIABLE = {};
    MODIFIABLE[READ_ONLY] = 1;
    MODIFIABLE[WRITE_ONCE] = 1;
    MODIFIABLE[GETTER] = 1;
    MODIFIABLE[BROADCAST] = 1;
    function Attribute() {
        var host = this, attrs = this.constructor.ATTRS, Base = Y.Base;
        host._ATTR_E_FACADE = {};
        EventTarget.call(host, {emitFacade:true});
        host._conf = host._state = new Y.State();
        host._stateProxy = host._stateProxy || null;
        host._requireAddAttr = host._requireAddAttr || false;
        if (attrs && !(Base && host instanceof Base)) {
            host.addAttrs(this._protectAttrs(attrs));
        }
    }

    Attribute.INVALID_VALUE = {};
    INVALID_VALUE = Attribute.INVALID_VALUE;
    Attribute._ATTR_CFG = [SETTER, GETTER, VALIDATOR, VALUE, VALUE_FN, WRITE_ONCE, READ_ONLY, LAZY_ADD, BROADCAST, BYPASS_PROXY];
    Attribute.prototype = {addAttr:function (name, config, lazy) {
        var host = this, state = host._state, value, hasValue;
        lazy = (LAZY_ADD in config) ? config[LAZY_ADD] : lazy;
        if (lazy && !host.attrAdded(name)) {
            state.add(name, LAZY, config || {});
            state.add(name, ADDED, true);
        } else {
            if (!host.attrAdded(name) || state.get(name, IS_LAZY_ADD)) {
                config = config || {};
                hasValue = (VALUE in config);
                if (hasValue) {
                    value = config.value;
                    delete config.value;
                }
                config.added = true;
                config.initializing = true;
                state.addAll(name, config);
                if (hasValue) {
                    host.set(name, value);
                }
                state.remove(name, INITIALIZING);
            }
        }
        return host;
    }, attrAdded:function (name) {
        return!!this._state.get(name, ADDED);
    }, modifyAttr:function (name, config) {
        var host = this, prop, state;
        if (host.attrAdded(name)) {
            if (host._isLazyAttr(name)) {
                host._addLazyAttr(name);
            }
            state = host._state;
            for (prop in config) {
                if (MODIFIABLE[prop] && config.hasOwnProperty(prop)) {
                    state.add(name, prop, config[prop]);
                    if (prop === BROADCAST) {
                        state.remove(name, PUBLISHED);
                    }
                }
            }
        }
    }, removeAttr:function (name) {
        this._state.removeAll(name);
    }, get:function (name) {
        return this._getAttr(name);
    }, _isLazyAttr:function (name) {
        return this._state.get(name, LAZY);
    }, _addLazyAttr:function (name) {
        var state = this._state, lazyCfg = state.get(name, LAZY);
        state.add(name, IS_LAZY_ADD, true);
        state.remove(name, LAZY);
        this.addAttr(name, lazyCfg);
    }, set:function (name, val, opts) {
        return this._setAttr(name, val, opts);
    }, reset:function (name) {
        var host = this, added;
        if (name) {
            if (host._isLazyAttr(name)) {
                host._addLazyAttr(name);
            }
            host.set(name, host._state.get(name, INIT_VALUE));
        } else {
            added = host._state.data.added;
            Y.each(added, function (v, n) {
                host.reset(n);
            }, host);
        }
        return host;
    }, _set:function (name, val, opts) {
        return this._setAttr(name, val, opts, true);
    }, _getAttr:function (name) {
        var host = this, fullName = name, state = host._state, path, getter, val, cfg;
        if (name.indexOf(DOT) !== -1) {
            path = name.split(DOT);
            name = path.shift();
        }
        if (host._tCfgs && host._tCfgs[name]) {
            cfg = {};
            cfg[name] = host._tCfgs[name];
            delete host._tCfgs[name];
            host._addAttrs(cfg, host._tVals);
        }
        if (host._isLazyAttr(name)) {
            host._addLazyAttr(name);
        }
        val = host._getStateVal(name);
        getter = state.get(name, GETTER);
        val = (getter) ? getter.call(host, val, fullName) : val;
        val = (path) ? O.getValue(val, path) : val;
        return val;
    }, _setAttr:function (name, val, opts, force) {
        var allowSet = true, state = this._state, stateProxy = this._stateProxy, data = state.data, initialSet, strPath, path, currVal;
        if (name.indexOf(DOT) !== -1) {
            strPath = name;
            path = name.split(DOT);
            name = path.shift();
        }
        if (this._isLazyAttr(name)) {
            this._addLazyAttr(name);
        }
        initialSet = (!data.value || !(name in data.value));
        if (stateProxy && name in stateProxy && !this._state.get(name, BYPASS_PROXY)) {
            initialSet = false;
        }
        if (this._requireAddAttr && !this.attrAdded(name)) {
        } else {
            if (!initialSet && !force) {
                if (state.get(name, WRITE_ONCE)) {
                    allowSet = false;
                }
                if (state.get(name, READ_ONLY)) {
                    allowSet = false;
                }
            }
            if (allowSet) {
                if (!initialSet) {
                    currVal = this.get(name);
                }
                if (path) {
                    val = O.setValue(Y.clone(currVal), path, val);
                    if (val === undefined) {
                        allowSet = false;
                    }
                }
                if (allowSet) {
                    if (state.get(name, INITIALIZING)) {
                        this._setAttrVal(name, strPath, currVal, val);
                    } else {
                        this._fireAttrChange(name, strPath, currVal, val, opts);
                    }
                }
            }
        }
        return this;
    }, _fireAttrChange:function (attrName, subAttrName, currVal, newVal, opts) {
        var host = this, eventName = attrName + CHANGE, state = host._state, facade;
        if (!state.get(attrName, PUBLISHED)) {
            host.publish(eventName, {queuable:false, defaultFn:host._defAttrChangeFn, silent:true, broadcast:state.get(attrName, BROADCAST)});
            state.add(attrName, PUBLISHED, true);
        }
        facade = (opts) ? Y.merge(opts) : host._ATTR_E_FACADE;
        facade.type = eventName;
        facade.attrName = attrName;
        facade.subAttrName = subAttrName;
        facade.prevVal = currVal;
        facade.newVal = newVal;
        host.fire(facade);
    }, _defAttrChangeFn:function (e) {
        if (!this._setAttrVal(e.attrName, e.subAttrName, e.prevVal, e.newVal)) {
            e.stopImmediatePropagation();
        } else {
            e.newVal = this._getStateVal(e.attrName);
        }
    }, _getStateVal:function (name) {
        var stateProxy = this._stateProxy;
        return stateProxy && (name in stateProxy) && !this._state.get(name, BYPASS_PROXY) ? stateProxy[name] : this._state.get(name, VALUE);
    }, _setStateVal:function (name, value) {
        var stateProxy = this._stateProxy;
        if (stateProxy && (name in stateProxy) && !this._state.get(name, BYPASS_PROXY)) {
            stateProxy[name] = value;
        } else {
            this._state.add(name, VALUE, value);
        }
    }, _setAttrVal:function (attrName, subAttrName, prevVal, newVal) {
        var host = this, allowSet = true, state = host._state, validator = state.get(attrName, VALIDATOR), setter = state.get(attrName, SETTER), initializing = state.get(attrName, INITIALIZING), prevValRaw = this._getStateVal(attrName), name = subAttrName || attrName, retVal, valid;
        if (validator) {
            valid = validator.call(host, newVal, name);
            if (!valid && initializing) {
                newVal = state.get(attrName, DEF_VALUE);
                valid = true;
            }
        }
        if (!validator || valid) {
            if (setter) {
                retVal = setter.call(host, newVal, name);
                if (retVal === INVALID_VALUE) {
                    allowSet = false;
                } else if (retVal !== undefined) {
                    newVal = retVal;
                }
            }
            if (allowSet) {
                if (!subAttrName && (newVal === prevValRaw) && !Lang.isObject(newVal)) {
                    allowSet = false;
                } else {
                    if (state.get(attrName, INIT_VALUE) === undefined) {
                        state.add(attrName, INIT_VALUE, newVal);
                    }
                    host._setStateVal(attrName, newVal);
                }
            }
        } else {
            allowSet = false;
        }
        return allowSet;
    }, setAttrs:function (attrs, opts) {
        return this._setAttrs(attrs, opts);
    }, _setAttrs:function (attrs, opts) {
        for (var attr in attrs) {
            if (attrs.hasOwnProperty(attr)) {
                this.set(attr, attrs[attr]);
            }
        }
        return this;
    }, getAttrs:function (attrs) {
        return this._getAttrs(attrs);
    }, _getAttrs:function (attrs) {
        var host = this, o = {}, i, l, attr, val, modifiedOnly = (attrs === true);
        attrs = (attrs && !modifiedOnly) ? attrs : O.keys(host._state.data.added);
        for (i = 0, l = attrs.length; i < l; i++) {
            attr = attrs[i];
            val = host.get(attr);
            if (!modifiedOnly || host._getStateVal(attr) != host._state.get(attr, INIT_VALUE)) {
                o[attr] = host.get(attr);
            }
        }
        return o;
    }, addAttrs:function (cfgs, values, lazy) {
        var host = this;
        if (cfgs) {
            host._tCfgs = cfgs;
            host._tVals = host._normAttrVals(values);
            host._addAttrs(cfgs, host._tVals, lazy);
            host._tCfgs = host._tVals = null;
        }
        return host;
    }, _addAttrs:function (cfgs, values, lazy) {
        var host = this, attr, attrCfg, value;
        for (attr in cfgs) {
            if (cfgs.hasOwnProperty(attr)) {
                attrCfg = cfgs[attr];
                attrCfg.defaultValue = attrCfg.value;
                value = host._getAttrInitVal(attr, attrCfg, host._tVals);
                if (value !== undefined) {
                    attrCfg.value = value;
                }
                if (host._tCfgs[attr]) {
                    delete host._tCfgs[attr];
                }
                host.addAttr(attr, attrCfg, lazy);
            }
        }
    }, _protectAttrs:function (attrs) {
        if (attrs) {
            attrs = Y.merge(attrs);
            for (var attr in attrs) {
                if (attrs.hasOwnProperty(attr)) {
                    attrs[attr] = Y.merge(attrs[attr]);
                }
            }
        }
        return attrs;
    }, _normAttrVals:function (valueHash) {
        return(valueHash) ? Y.merge(valueHash) : null;
    }, _getAttrInitVal:function (attr, cfg, initValues) {
        var val = (!cfg[READ_ONLY] && initValues && initValues.hasOwnProperty(attr)) ? val = initValues[attr] : (cfg[VALUE_FN]) ? cfg[VALUE_FN].call(this) : cfg[VALUE];
        return val;
    }};
    Y.mix(Attribute, EventTarget, false, null, 1);
    Y.Attribute = Attribute;
}, '3.0.0', {requires:['event-custom']});