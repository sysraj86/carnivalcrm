/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('dd-drag', function (Y) {
    var DDM = Y.DD.DDM, NODE = 'node', DRAGGING = 'dragging', DRAG_NODE = 'dragNode', OFFSET_HEIGHT = 'offsetHeight', OFFSET_WIDTH = 'offsetWidth', MOUSE_UP = 'mouseup', MOUSE_DOWN = 'mousedown', DRAG_START = 'dragstart', EV_MOUSE_DOWN = 'drag:mouseDown', EV_AFTER_MOUSE_DOWN = 'drag:afterMouseDown', EV_REMOVE_HANDLE = 'drag:removeHandle', EV_ADD_HANDLE = 'drag:addHandle', EV_REMOVE_INVALID = 'drag:removeInvalid', EV_ADD_INVALID = 'drag:addInvalid', EV_START = 'drag:start', EV_END = 'drag:end', EV_DRAG = 'drag:drag', EV_ALIGN = 'drag:align', Drag = function (o) {
        this._lazyAddAttrs = false;
        Drag.superclass.constructor.apply(this, arguments);
        var valid = DDM._regDrag(this);
        if (!valid) {
            Y.error('Failed to register node, already in use: ' + o.node);
        }
    };
    Drag.NAME = 'drag';
    Drag.ATTRS = {node:{setter:function (node) {
        var n = Y.get(node);
        if (!n) {
            Y.error('DD.Drag: Invalid Node Given: ' + node);
        } else {
            n = n.item(0);
        }
        return n;
    }}, dragNode:{setter:function (node) {
        var n = Y.Node.get(node);
        if (!n) {
            Y.error('DD.Drag: Invalid dragNode Given: ' + node);
        }
        return n;
    }}, offsetNode:{value:true}, clickPixelThresh:{value:DDM.get('clickPixelThresh')}, clickTimeThresh:{value:DDM.get('clickTimeThresh')}, lock:{value:false, setter:function (lock) {
        if (lock) {
            this.get(NODE).addClass(DDM.CSS_PREFIX + '-locked');
        } else {
            this.get(NODE).removeClass(DDM.CSS_PREFIX + '-locked');
        }
        return lock;
    }}, data:{value:false}, move:{value:true}, useShim:{value:true}, activeHandle:{value:false}, primaryButtonOnly:{value:true}, dragging:{value:false}, parent:{value:false}, target:{value:false, setter:function (config) {
        this._handleTarget(config);
        return config;
    }}, dragMode:{value:null, setter:function (mode) {
        return DDM._setDragMode(mode);
    }}, groups:{value:['default'], getter:function () {
        if (!this._groups) {
            this._groups = {};
        }
        var ret = [];
        Y.each(this._groups, function (v, k) {
            ret[ret.length] = k;
        });
        return ret;
    }, setter:function (g) {
        this._groups = {};
        Y.each(g, function (v, k) {
            this._groups[v] = true;
        }, this);
        return g;
    }}, handles:{value:null, setter:function (g) {
        if (g) {
            this._handles = {};
            Y.each(g, function (v, k) {
                this._handles[v] = true;
            }, this);
        } else {
            this._handles = null;
        }
        return g;
    }}, bubbles:{writeOnce:true, value:Y.DD.DDM}};
    Y.extend(Drag, Y.Base, {addToGroup:function (g) {
        this._groups[g] = true;
        DDM._activateTargets();
        return this;
    }, removeFromGroup:function (g) {
        delete this._groups[g];
        DDM._activateTargets();
        return this;
    }, target:null, _handleTarget:function (config) {
        if (Y.DD.Drop) {
            if (config === false) {
                if (this.target) {
                    DDM._unregTarget(this.target);
                    this.target = null;
                }
                return false;
            } else {
                if (!Y.Lang.isObject(config)) {
                    config = {};
                }
                config.bubbles = ('bubbles'in config) ? config.bubbles : this.get('bubbles');
                config.node = this.get(NODE);
                config.groups = config.groups || this.get('groups');
                this.target = new Y.DD.Drop(config);
            }
        } else {
            return false;
        }
    }, _groups:null, _createEvents:function () {
        this.publish(EV_MOUSE_DOWN, {defaultFn:this._defMouseDownFn, queuable:false, emitFacade:true, bubbles:true, prefix:'drag'});
        this.publish(EV_ALIGN, {defaultFn:this._defAlignFn, queuable:false, emitFacade:true, bubbles:true, prefix:'drag'});
        this.publish(EV_DRAG, {defaultFn:this._defDragFn, queuable:false, emitFacade:true, bubbles:true, prefix:'drag'});
        this.publish(EV_END, {preventedFn:this._prevEndFn, queuable:false, emitFacade:true, bubbles:true, prefix:'drag'});
        var ev = [EV_AFTER_MOUSE_DOWN, EV_REMOVE_HANDLE, EV_ADD_HANDLE, EV_REMOVE_INVALID, EV_ADD_INVALID, EV_START, 'drag:drophit', 'drag:dropmiss', 'drag:over', 'drag:enter', 'drag:exit'];
        Y.each(ev, function (v, k) {
            this.publish(v, {type:v, emitFacade:true, bubbles:true, preventable:false, queuable:false, prefix:'drag'});
        }, this);
        if (this.get('bubbles')) {
            this.addTarget(this.get('bubbles'));
        }
    }, _ev_md:null, _startTime:null, _endTime:null, _handles:null, _invalids:null, _invalidsDefault:{'textarea':true, 'input':true, 'a':true, 'button':true, 'select':true}, _dragThreshMet:null, _fromTimeout:null, _clickTimeout:null, deltaXY:null, startXY:null, nodeXY:null, lastXY:null, actXY:null, realXY:null, mouseXY:null, region:null, _handleMouseUp:function (ev) {
        this._fixIEMouseUp();
        if (DDM.activeDrag) {
            DDM._end();
        }
    }, _fixDragStart:function (e) {
        e.preventDefault();
    }, _ieSelectFix:function () {
        return false;
    }, _ieSelectBack:null, _fixIEMouseDown:function () {
        if (Y.UA.ie) {
            this._ieSelectBack = Y.config.doc.body.onselectstart;
            Y.config.doc.body.onselectstart = this._ieSelectFix;
        }
    }, _fixIEMouseUp:function () {
        if (Y.UA.ie) {
            Y.config.doc.body.onselectstart = this._ieSelectBack;
        }
    }, _handleMouseDownEvent:function (ev) {
        this.fire(EV_MOUSE_DOWN, {ev:ev});
    }, _defMouseDownFn:function (e) {
        var ev = e.ev;
        this._dragThreshMet = false;
        this._ev_md = ev;
        if (this.get('primaryButtonOnly') && ev.button > 1) {
            return false;
        }
        if (this.validClick(ev)) {
            this._fixIEMouseDown();
            ev.halt();
            this._setStartPosition([ev.pageX, ev.pageY]);
            DDM.activeDrag = this;
            this._clickTimeout = Y.later(this.get('clickTimeThresh'), this, this._timeoutCheck);
        }
        this.fire(EV_AFTER_MOUSE_DOWN, {ev:ev});
    }, validClick:function (ev) {
        var r = false, n = false, tar = ev.target, hTest = null, els = null, set = false;
        if (this._handles) {
            Y.each(this._handles, function (i, n) {
                if (Y.Lang.isString(n)) {
                    if (tar.test(n + ', ' + n + ' *') && !hTest) {
                        hTest = n;
                        r = true;
                    }
                }
            });
        } else {
            n = this.get(NODE)
            if (n.contains(tar) || n.compareTo(tar)) {
                r = true;
            }
        }
        if (r) {
            if (this._invalids) {
                Y.each(this._invalids, function (i, n) {
                    if (Y.Lang.isString(n)) {
                        if (tar.test(n + ', ' + n + ' *')) {
                            r = false;
                        }
                    }
                });
            }
        }
        if (r) {
            if (hTest) {
                els = ev.currentTarget.queryAll(hTest);
                set = false;
                els.each(function (n, i) {
                    if ((n.contains(tar) || n.compareTo(tar)) && !set) {
                        set = true;
                        this.set('activeHandle', n);
                    }
                }, this);
            } else {
                this.set('activeHandle', this.get(NODE));
            }
        }
        return r;
    }, _setStartPosition:function (xy) {
        this.startXY = xy;
        this.nodeXY = this.lastXY = this.realXY = this.get(NODE).getXY();
        if (this.get('offsetNode')) {
            this.deltaXY = [(this.startXY[0] - this.nodeXY[0]), (this.startXY[1] - this.nodeXY[1])];
        } else {
            this.deltaXY = [0, 0];
        }
    }, _timeoutCheck:function () {
        if (!this.get('lock') && !this._dragThreshMet) {
            this._fromTimeout = this._dragThreshMet = true;
            this.start();
            this._alignNode([this._ev_md.pageX, this._ev_md.pageY], true);
        }
    }, removeHandle:function (str) {
        if (this._handles[str]) {
            delete this._handles[str];
            this.fire(EV_REMOVE_HANDLE, {handle:str});
        }
        return this;
    }, addHandle:function (str) {
        if (!this._handles) {
            this._handles = {};
        }
        if (Y.Lang.isString(str)) {
            this._handles[str] = true;
            this.fire(EV_ADD_HANDLE, {handle:str});
        }
        return this;
    }, removeInvalid:function (str) {
        if (this._invalids[str]) {
            this._invalids[str] = null;
            delete this._invalids[str];
            this.fire(EV_REMOVE_INVALID, {handle:str});
        }
        return this;
    }, addInvalid:function (str) {
        if (Y.Lang.isString(str)) {
            this._invalids[str] = true;
            this.fire(EV_ADD_INVALID, {handle:str});
        }
        return this;
    }, initializer:function () {
        this.get(NODE).dd = this;
        if (!this.get(NODE).get('id')) {
            var id = Y.stamp(this.get(NODE));
            this.get(NODE).set('id', id);
        }
        this.actXY = [];
        this._invalids = Y.clone(this._invalidsDefault, true);
        this._createEvents();
        if (!this.get(DRAG_NODE)) {
            this.set(DRAG_NODE, this.get(NODE));
        }
        this.on('initializedChange', Y.bind(this._prep, this));
        this.set('groups', this.get('groups'));
    }, _prep:function () {
        this._dragThreshMet = false;
        var node = this.get(NODE);
        node.addClass(DDM.CSS_PREFIX + '-draggable');
        node.on(MOUSE_DOWN, Y.bind(this._handleMouseDownEvent, this));
        node.on(MOUSE_UP, Y.bind(this._handleMouseUp, this));
        node.on(DRAG_START, Y.bind(this._fixDragStart, this));
    }, _unprep:function () {
        var node = this.get(NODE);
        node.removeClass(DDM.CSS_PREFIX + '-draggable');
        node.detachAll();
    }, start:function () {
        if (!this.get('lock') && !this.get(DRAGGING)) {
            var node = this.get(NODE), ow = node.get(OFFSET_WIDTH), oh = node.get(OFFSET_HEIGHT);
            this._startTime = (new Date()).getTime();
            DDM._start();
            node.addClass(DDM.CSS_PREFIX + '-dragging');
            this.fire(EV_START, {pageX:this.nodeXY[0], pageY:this.nodeXY[1], startTime:this._startTime});
            var xy = this.nodeXY;
            this.region = {'0':xy[0], '1':xy[1], area:0, top:xy[1], right:xy[0] + ow, bottom:xy[1] + oh, left:xy[0]};
            this.set(DRAGGING, true);
        }
        return this;
    }, end:function () {
        this._endTime = (new Date()).getTime();
        if (this._clickTimeout) {
            this._clickTimeout.cancel();
        }
        this._dragThreshMet = false;
        this._fromTimeout = false;
        if (!this.get('lock') && this.get(DRAGGING)) {
            this.fire(EV_END, {pageX:this.lastXY[0], pageY:this.lastXY[1], startTime:this._startTime, endTime:this._endTime});
        }
        this.get(NODE).removeClass(DDM.CSS_PREFIX + '-dragging');
        this.set(DRAGGING, false);
        this.deltaXY = [0, 0];
        return this;
    }, _prevEndFn:function (e) {
        this.get(DRAG_NODE).setXY(this.nodeXY);
    }, _align:function (xy) {
        this.fire(EV_ALIGN, {pageX:xy[0], pageY:xy[1]});
    }, _defAlignFn:function (e) {
        this.actXY = [e.pageX - this.deltaXY[0], e.pageY - this.deltaXY[1]];
    }, _alignNode:function (eXY) {
        this._align(eXY);
        this._moveNode();
    }, _moveNode:function (scroll) {
        var diffXY = [], diffXY2 = [], startXY = this.nodeXY, xy = this.actXY;
        diffXY[0] = (xy[0] - this.lastXY[0]);
        diffXY[1] = (xy[1] - this.lastXY[1]);
        diffXY2[0] = (xy[0] - this.nodeXY[0]);
        diffXY2[1] = (xy[1] - this.nodeXY[1]);
        this.region = {'0':xy[0], '1':xy[1], area:0, top:xy[1], right:xy[0] + this.get(DRAG_NODE).get(OFFSET_WIDTH), bottom:xy[1] + this.get(DRAG_NODE).get(OFFSET_HEIGHT), left:xy[0]};
        this.fire(EV_DRAG, {pageX:xy[0], pageY:xy[1], scroll:scroll, info:{start:startXY, xy:xy, delta:diffXY, offset:diffXY2}});
        this.lastXY = xy;
    }, _defDragFn:function (e) {
        if (this.get('move')) {
            if (e.scroll) {
                e.scroll.node.set('scrollTop', e.scroll.top);
                e.scroll.node.set('scrollLeft', e.scroll.left);
            }
            this.get(DRAG_NODE).setXY([e.pageX, e.pageY]);
            this.realXY = [e.pageX, e.pageY];
        }
    }, _move:function (ev) {
        if (this.get('lock')) {
            return false;
        } else {
            this.mouseXY = [ev.pageX, ev.pageY];
            if (!this._dragThreshMet) {
                var diffX = Math.abs(this.startXY[0] - ev.pageX), diffY = Math.abs(this.startXY[1] - ev.pageY);
                if (diffX > this.get('clickPixelThresh') || diffY > this.get('clickPixelThresh')) {
                    this._dragThreshMet = true;
                    this.start();
                    this._alignNode([ev.pageX, ev.pageY]);
                }
            } else {
                if (this._clickTimeout) {
                    this._clickTimeout.cancel();
                }
                this._alignNode([ev.pageX, ev.pageY]);
            }
        }
    }, stopDrag:function () {
        if (this.get(DRAGGING)) {
            DDM._end();
        }
        return this;
    }, destructor:function () {
        this._unprep();
        this.detachAll();
        if (this.target) {
            this.target.destroy();
        }
        DDM._unregDrag(this);
    }});
    Y.namespace('DD');
    Y.DD.Drag = Drag;
}, '3.0.0', {requires:['dd-ddm-base'], skinnable:false});