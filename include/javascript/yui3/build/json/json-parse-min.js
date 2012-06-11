/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("json-parse", function (Y) {
    var _JSON = Y.config.win.JSON, Native = (Object.prototype.toString.call(_JSON) === "[object JSON]" && _JSON), _UNICODE_EXCEPTIONS = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g, _ESCAPES = /\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, _VALUES = /"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, _BRACKETS = /(?:^|:|,)(?:\s*\[)+/g, _UNSAFE = /[^\],:{}\s]/, _escapeException = function (c) {
        return"\\u" + ("0000" + (+(c.charCodeAt(0))).toString(16)).slice(-4);
    }, _revive = function (data, reviver) {
        var walk = function (o, key) {
            var k, v, value = o[key];
            if (value && typeof value === "object") {
                for (k in value) {
                    if (value.hasOwnProperty(k)) {
                        v = walk(value, k);
                        if (v === undefined) {
                            delete value[k];
                        } else {
                            value[k] = v;
                        }
                    }
                }
            }
            return reviver.call(o, key, value);
        };
        return typeof reviver === "function" ? walk({"":data}, "") : data;
    }, _parse = function (s, reviver) {
        if (typeof s === "string") {
            s = s.replace(_UNICODE_EXCEPTIONS, _escapeException);
            if (!_UNSAFE.test(s.replace(_ESCAPES, "@").replace(_VALUES, "]").replace(_BRACKETS, ""))) {
                return _revive(eval("(" + s + ")"), reviver);
            }
        }
        throw new SyntaxError("JSON.parse");
    };
    Y.namespace("JSON").parse = function (s, reviver) {
        return Native && Y.JSON.useNativeParse ? Native.parse(s, reviver) : _parse(s, reviver);
    };
    Y.JSON.useNativeParse = !!Native;
}, "3.0.0");