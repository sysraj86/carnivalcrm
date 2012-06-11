/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("async-queue", function (G) {
    G.AsyncQueue = function () {
        this._init();
        this.add.apply(this, arguments);
    };
    var E = G.AsyncQueue, C = "execute", B = "shift", D = "promote", H = "remove", A = G.Lang.isObject, F = G.Lang.isFunction;
    E.defaults = G.mix({autoContinue:true, iterations:1, timeout:10, until:function () {
        this.iterations |= 0;
        return this.iterations <= 0;
    }}, G.config.queueDefaults || {});
    G.extend(E, G.EventTarget, {_running:false, _init:function () {
        G.EventTarget.call(this, {emitFacade:true});
        this._q = [];
        this.defaults = {};
        this._initEvents();
    }, _initEvents:function () {
        this.publish("execute", {defaultFn:this._defExecFn, emitFacade:true});
        this.publish("shift", {defaultFn:this._defShiftFn, emitFacade:true});
        this.publish("add", {defaultFn:this._defAddFn, emitFacade:true});
        this.publish("promote", {defaultFn:this._defPromoteFn, emitFacade:true});
        this.publish("remove", {defaultFn:this._defRemoveFn, emitFacade:true});
    }, next:function () {
        var I;
        while (this._q.length) {
            I = this._q[0] = this._prepare(this._q[0]);
            if (I && I.until()) {
                this.fire(B, {callback:I});
                I = null;
            } else {
                break;
            }
        }
        return I || null;
    }, _defShiftFn:function (I) {
        if (this.indexOf(I.callback) === 0) {
            this._q.shift();
        }
    }, _prepare:function (K) {
        if (F(K) && K._prepared) {
            return K;
        }
        var I = G.merge(E.defaults, {context:this, args:[], _prepared:true}, this.defaults, (F(K) ? {fn:K} : K)), J = G.bind(function () {
            if (!J._running) {
                J.iterations--;
            }
            if (F(J.fn)) {
                J.fn.apply(J.context || G, G.Array(J.args));
            }
        }, this);
        return G.mix(J, I);
    }, run:function () {
        var J, I = true;
        for (J = this.next(); I && J && !this.isRunning(); J = this.next()) {
            I = (J.timeout < 0) ? this._execute(J) : this._schedule(J);
        }
        if (!J) {
            this.fire("complete");
        }
        return this;
    }, _execute:function (J) {
        this._running = J._running = true;
        J.iterations--;
        this.fire(C, {callback:J});
        var I = this._running && J.autoContinue;
        this._running = J._running = false;
        return I;
    }, _schedule:function (I) {
        this._running = G.later(I.timeout, this, function () {
            if (this._execute(I)) {
                this.run();
            }
        });
        return false;
    }, isRunning:function () {
        return!!this._running;
    }, _defExecFn:function (I) {
        I.callback();
    }, add:function () {
        this.fire("add", {callbacks:G.Array(arguments, 0, true)});
        return this;
    }, _defAddFn:function (J) {
        var K = this._q, I = [];
        G.Array.each(J.callbacks, function (L) {
            if (A(L)) {
                K.push(L);
                I.push(L);
            }
        });
        J.added = I;
    }, pause:function () {
        if (A(this._running)) {
            this._running.cancel();
        }
        this._running = false;
        return this;
    }, stop:function () {
        this._q = [];
        return this.pause();
    }, indexOf:function (L) {
        var J = 0, I = this._q.length, K;
        for (; J < I; ++J) {
            K = this._q[J];
            if (K === L || K.id === L) {
                return J;
            }
        }
        return-1;
    }, getCallback:function (J) {
        var I = this.indexOf(J);
        return(I > -1) ? this._q[I] : null;
    }, promote:function (K) {
        var J = {callback:K}, I;
        if (this.isRunning()) {
            I = this.after(B, function () {
                this.fire(D, J);
                I.detach();
            }, this);
        } else {
            this.fire(D, J);
        }
        return this;
    }, _defPromoteFn:function (K) {
        var I = this.indexOf(K.callback), J = (I > -1) ? this._q.splice(I, 1)[0] : null;
        K.promoted = J;
        if (J) {
            this._q.unshift(J);
        }
    }, remove:function (K) {
        var J = {callback:K}, I;
        if (this.isRunning()) {
            I = this.after(B, function () {
                this.fire(H, J);
                I.detach();
            }, this);
        } else {
            this.fire(H, J);
        }
        return this;
    }, _defRemoveFn:function (J) {
        var I = this.indexOf(J.callback);
        J.removed = (I > -1) ? this._q.splice(I, 1)[0] : null;
    }, size:function () {
        if (!this.isRunning()) {
            this.next();
        }
        return this._q.length;
    }});
}, "3.0.0", {requires:["event-custom"]});