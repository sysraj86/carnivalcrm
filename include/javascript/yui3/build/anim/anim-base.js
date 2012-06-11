/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('anim-base', function (Y) {
    var RUNNING = 'running', START_TIME = 'startTime', ELAPSED_TIME = 'elapsedTime', START = 'start', TWEEN = 'tween', END = 'end', NODE = 'node', PAUSED = 'paused', REVERSE = 'reverse', ITERATION_COUNT = 'iterationCount', NUM = Number;
    var _running = {}, _instances = {}, _timer;
    Y.Anim = function () {
        Y.Anim.superclass.constructor.apply(this, arguments);
        _instances[Y.stamp(this)] = this;
    };
    Y.Anim.NAME = 'anim';
    Y.Anim.RE_DEFAULT_UNIT = /^width|height|top|right|bottom|left|margin.*|padding.*|border.*$/i;
    Y.Anim.DEFAULT_UNIT = 'px';
    Y.Anim.DEFAULT_EASING = function (t, b, c, d) {
        return c * t / d + b;
    };
    Y.Anim.behaviors = {left:{get:function (anim, attr) {
        return anim._getOffset(attr);
    }}};
    Y.Anim.behaviors.top = Y.Anim.behaviors.left;
    Y.Anim.DEFAULT_SETTER = function (anim, att, from, to, elapsed, duration, fn, unit) {
        unit = unit || '';
        anim._node.setStyle(att, fn(elapsed, NUM(from), NUM(to) - NUM(from), duration) + unit);
    };
    Y.Anim.DEFAULT_GETTER = function (anim, prop) {
        return anim._node.getComputedStyle(prop);
    };
    Y.Anim.ATTRS = {node:{setter:function (node) {
        node = Y.get(node);
        this._node = node;
        if (!node) {
        }
        return node;
    }}, duration:{value:1}, easing:{value:Y.Anim.DEFAULT_EASING, setter:function (val) {
        if (typeof val === 'string' && Y.Easing) {
            return Y.Easing[val];
        }
    }}, from:{}, to:{}, startTime:{value:0, readOnly:true}, elapsedTime:{value:0, readOnly:true}, running:{getter:function () {
        return!!_running[Y.stamp(this)];
    }, value:false, readOnly:true}, iterations:{value:1}, iterationCount:{value:0, readOnly:true}, direction:{value:'normal'}, paused:{readOnly:true, value:false}, reverse:{value:false}};
    Y.Anim.run = function () {
        for (var i in _instances) {
            if (_instances[i].run) {
                _instances[i].run();
            }
        }
    };
    Y.Anim.pause = function () {
        for (var i in _running) {
            if (_running[i].pause) {
                _running[i].pause();
            }
        }
        Y.Anim._stopTimer();
    };
    Y.Anim.stop = function () {
        for (var i in _running) {
            if (_running[i].stop) {
                _running[i].stop();
            }
        }
        Y.Anim._stopTimer();
    };
    Y.Anim._startTimer = function () {
        if (!_timer) {
            _timer = setInterval(Y.Anim._runFrame, 1);
        }
    };
    Y.Anim._stopTimer = function () {
        clearInterval(_timer);
        _timer = 0;
    };
    Y.Anim._runFrame = function () {
        var done = true;
        for (var anim in _running) {
            if (_running[anim]._runFrame) {
                done = false;
                _running[anim]._runFrame();
            }
        }
        if (done) {
            Y.Anim._stopTimer();
        }
    };
    Y.Anim.RE_UNITS = /^(-?\d*\.?\d*){1}(em|ex|px|in|cm|mm|pt|pc|%)*$/;
    var proto = {run:function () {
        if (!this.get(RUNNING)) {
            this._start();
        } else if (this.get(PAUSED)) {
            this._resume();
        }
        return this;
    }, pause:function () {
        if (this.get(RUNNING)) {
            this._pause();
        }
        return this;
    }, stop:function (finish) {
        if (this.get(RUNNING) || this.get(PAUSED)) {
            this._end(finish);
        }
        return this;
    }, _added:false, _start:function () {
        this._set(START_TIME, new Date() - this.get(ELAPSED_TIME));
        this._actualFrames = 0;
        if (!this.get(PAUSED)) {
            this._initAnimAttr();
        }
        _running[Y.stamp(this)] = this;
        Y.Anim._startTimer();
        this.fire(START);
    }, _pause:function () {
        this._set(START_TIME, null);
        this._set(PAUSED, true);
        delete _running[Y.stamp(this)];
        this.fire('pause');
    }, _resume:function () {
        this._set(PAUSED, false);
        _running[Y.stamp(this)] = this;
        this.fire('resume');
    }, _end:function (finish) {
        this._set(START_TIME, null);
        this._set(ELAPSED_TIME, 0);
        this._set(PAUSED, false);
        delete _running[Y.stamp(this)];
        this.fire(END, {elapsed:this.get(ELAPSED_TIME)});
    }, _runFrame:function () {
        var attr = this._runtimeAttr, customAttr = Y.Anim.behaviors, easing = attr.easing, d = attr.duration, t = new Date() - this.get(START_TIME), reversed = this.get(REVERSE), done = (t >= d), lastFrame = d, attribute, setter;
        if (reversed) {
            t = d - t;
            done = (t <= 0);
            lastFrame = 0;
        }
        for (var i in attr) {
            if (attr[i].to) {
                attribute = attr[i];
                setter = (i in customAttr && 'set'in customAttr[i]) ? customAttr[i].set : Y.Anim.DEFAULT_SETTER;
                if (!done) {
                    setter(this, i, attribute.from, attribute.to, t, d, easing, attribute.unit);
                } else {
                    setter(this, i, attribute.from, attribute.to, lastFrame, d, easing, attribute.unit);
                }
            }
        }
        this._actualFrames += 1;
        this._set(ELAPSED_TIME, t);
        this.fire(TWEEN);
        if (done) {
            this._lastFrame();
        }
    }, _lastFrame:function () {
        var iter = this.get('iterations'), iterCount = this.get(ITERATION_COUNT);
        iterCount += 1;
        if (iter === 'infinite' || iterCount < iter) {
            if (this.get('direction') === 'alternate') {
                this.set(REVERSE, !this.get(REVERSE));
            }
            this.fire('iteration');
        } else {
            iterCount = 0;
            this._end();
        }
        this._set(START_TIME, new Date());
        this._set(ITERATION_COUNT, iterCount);
    }, _initAnimAttr:function () {
        var from = this.get('from') || {}, to = this.get('to') || {}, dur = this.get('duration') * 1000, node = this.get(NODE), easing = this.get('easing') || {}, attr = {}, customAttr = Y.Anim.behaviors, unit, begin, end;
        Y.each(to, function (val, name) {
            if (typeof val === 'function') {
                val = val.call(this, node);
            }
            begin = from[name];
            if (begin === undefined) {
                begin = (name in customAttr && 'get'in customAttr[name]) ? customAttr[name].get(this, name) : Y.Anim.DEFAULT_GETTER(this, name);
            } else if (typeof begin === 'function') {
                begin = begin.call(this, node);
            }
            var mFrom = Y.Anim.RE_UNITS.exec(begin);
            var mTo = Y.Anim.RE_UNITS.exec(val);
            begin = mFrom ? mFrom[1] : begin;
            end = mTo ? mTo[1] : val;
            unit = mTo ? mTo[2] : mFrom ? mFrom[2] : '';
            if (!unit && Y.Anim.RE_DEFAULT_UNIT.test(name)) {
                unit = Y.Anim.DEFAULT_UNIT;
            }
            if (!begin || !end) {
                Y.error('invalid "from" or "to" for "' + name + '"', 'Anim');
                return;
            }
            attr[name] = {from:begin, to:end, unit:unit};
            attr.duration = dur;
            attr.easing = easing;
        }, this);
        this._runtimeAttr = attr;
    }, _getOffset:function (attr) {
        var node = this._node, val = node.getComputedStyle(attr), get = (attr === 'left') ? 'getX' : 'getY', set = (attr === 'left') ? 'setX' : 'setY';
        if (val === 'auto') {
            var position = node.getStyle('position');
            if (position === 'absolute' || position === 'fixed') {
                val = node[get]();
                node[set](val);
            } else {
                val = 0;
            }
        }
        return val;
    }};
    Y.extend(Y.Anim, Y.Base, proto);
}, '3.0.0', {requires:['base-base', 'node-style']});