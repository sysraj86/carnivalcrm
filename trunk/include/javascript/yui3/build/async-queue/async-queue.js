/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('async-queue', function (Y) {
    Y.AsyncQueue = function () {
        this._init();
        this.add.apply(this, arguments);
    };
    var Queue = Y.AsyncQueue, EXECUTE = 'execute', SHIFT = 'shift', PROMOTE = 'promote', REMOVE = 'remove', isObject = Y.Lang.isObject, isFunction = Y.Lang.isFunction;
    Queue.defaults = Y.mix({autoContinue:true, iterations:1, timeout:10, until:function () {
        this.iterations |= 0;
        return this.iterations <= 0;
    }}, Y.config.queueDefaults || {});
    Y.extend(Queue, Y.EventTarget, {_running:false, _init:function () {
        Y.EventTarget.call(this, {emitFacade:true});
        this._q = [];
        this.defaults = {};
        this._initEvents();
    }, _initEvents:function () {
        this.publish('execute', {defaultFn:this._defExecFn, emitFacade:true});
        this.publish('shift', {defaultFn:this._defShiftFn, emitFacade:true});
        this.publish('add', {defaultFn:this._defAddFn, emitFacade:true});
        this.publish('promote', {defaultFn:this._defPromoteFn, emitFacade:true});
        this.publish('remove', {defaultFn:this._defRemoveFn, emitFacade:true});
    }, next:function () {
        var callback;
        while (this._q.length) {
            callback = this._q[0] = this._prepare(this._q[0]);
            if (callback && callback.until()) {
                this.fire(SHIFT, {callback:callback});
                callback = null;
            } else {
                break;
            }
        }
        return callback || null;
    }, _defShiftFn:function (e) {
        if (this.indexOf(e.callback) === 0) {
            this._q.shift();
        }
    }, _prepare:function (callback) {
        if (isFunction(callback) && callback._prepared) {
            return callback;
        }
        var config = Y.merge(Queue.defaults, {context:this, args:[], _prepared:true}, this.defaults, (isFunction(callback) ? {fn:callback} : callback)), wrapper = Y.bind(function () {
            if (!wrapper._running) {
                wrapper.iterations--;
            }
            if (isFunction(wrapper.fn)) {
                wrapper.fn.apply(wrapper.context || Y, Y.Array(wrapper.args));
            }
        }, this);
        return Y.mix(wrapper, config);
    }, run:function () {
        var callback, cont = true;
        for (callback = this.next(); cont && callback && !this.isRunning(); callback = this.next()) {
            cont = (callback.timeout < 0) ? this._execute(callback) : this._schedule(callback);
        }
        if (!callback) {
            this.fire('complete');
        }
        return this;
    }, _execute:function (callback) {
        this._running = callback._running = true;
        callback.iterations--;
        this.fire(EXECUTE, {callback:callback});
        var cont = this._running && callback.autoContinue;
        this._running = callback._running = false;
        return cont;
    }, _schedule:function (callback) {
        this._running = Y.later(callback.timeout, this, function () {
            if (this._execute(callback)) {
                this.run();
            }
        });
        return false;
    }, isRunning:function () {
        return!!this._running;
    }, _defExecFn:function (e) {
        e.callback();
    }, add:function () {
        this.fire('add', {callbacks:Y.Array(arguments, 0, true)});
        return this;
    }, _defAddFn:function (e) {
        var _q = this._q, added = [];
        Y.Array.each(e.callbacks, function (c) {
            if (isObject(c)) {
                _q.push(c);
                added.push(c);
            }
        });
        e.added = added;
    }, pause:function () {
        if (isObject(this._running)) {
            this._running.cancel();
        }
        this._running = false;
        return this;
    }, stop:function () {
        this._q = [];
        return this.pause();
    }, indexOf:function (callback) {
        var i = 0, len = this._q.length, c;
        for (; i < len; ++i) {
            c = this._q[i];
            if (c === callback || c.id === callback) {
                return i;
            }
        }
        return-1;
    }, getCallback:function (id) {
        var i = this.indexOf(id);
        return(i > -1) ? this._q[i] : null;
    }, promote:function (callback) {
        var payload = {callback:callback}, e;
        if (this.isRunning()) {
            e = this.after(SHIFT, function () {
                this.fire(PROMOTE, payload);
                e.detach();
            }, this);
        } else {
            this.fire(PROMOTE, payload);
        }
        return this;
    }, _defPromoteFn:function (e) {
        var i = this.indexOf(e.callback), promoted = (i > -1) ? this._q.splice(i, 1)[0] : null;
        e.promoted = promoted;
        if (promoted) {
            this._q.unshift(promoted);
        }
    }, remove:function (callback) {
        var payload = {callback:callback}, e;
        if (this.isRunning()) {
            e = this.after(SHIFT, function () {
                this.fire(REMOVE, payload);
                e.detach();
            }, this);
        } else {
            this.fire(REMOVE, payload);
        }
        return this;
    }, _defRemoveFn:function (e) {
        var i = this.indexOf(e.callback);
        e.removed = (i > -1) ? this._q.splice(i, 1)[0] : null;
    }, size:function () {
        if (!this.isRunning()) {
            this.next();
        }
        return this._q.length;
    }});
}, '3.0.0', {requires:['event-custom']});