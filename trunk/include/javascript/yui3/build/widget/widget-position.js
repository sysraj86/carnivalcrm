/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('widget-position', function (Y) {
    var Lang = Y.Lang, Widget = Y.Widget, XY_COORD = "xy", POSITIONED = "positioned", BOUNDING_BOX = "boundingBox", RENDERUI = "renderUI", BINDUI = "bindUI", SYNCUI = "syncUI", UI = Widget.UI_SRC, XYChange = "xyChange";

    function Position(config) {
        this._posNode = this.get(BOUNDING_BOX);
        Y.after(this._renderUIPosition, this, RENDERUI);
        Y.after(this._syncUIPosition, this, SYNCUI);
        Y.after(this._bindUIPosition, this, BINDUI);
    }

    Position.ATTRS = {x:{setter:function (val) {
        this._setX(val);
    }, lazyAdd:false, getter:function () {
        return this._getX();
    }}, y:{setter:function (val) {
        this._setY(val);
    }, lazyAdd:false, getter:function () {
        return this._getY();
    }}, xy:{value:[0, 0], validator:function (val) {
        return this._validateXY(val);
    }}};
    Position.POSITIONED_CLASS_NAME = Widget.getClassName(POSITIONED);
    Position.prototype = {_renderUIPosition:function () {
        this._posNode.addClass(Position.POSITIONED_CLASS_NAME);
    }, _syncUIPosition:function () {
        this._uiSetXY(this.get(XY_COORD));
    }, _bindUIPosition:function () {
        this.after(XYChange, this._afterXYChange);
    }, move:function () {
        var args = arguments, coord = (Lang.isArray(args[0])) ? args[0] : [args[0], args[1]];
        this.set(XY_COORD, coord);
    }, syncXY:function () {
        this.set(XY_COORD, this._posNode.getXY(), {src:UI});
    }, _validateXY:function (val) {
        return(Lang.isArray(val) && Lang.isNumber(val[0]) && Lang.isNumber(val[1]));
    }, _setX:function (val) {
        this.set(XY_COORD, [val, this.get(XY_COORD)[1]]);
    }, _setY:function (val) {
        this.set(XY_COORD, [this.get(XY_COORD)[0], val]);
    }, _getX:function () {
        return this.get(XY_COORD)[0];
    }, _getY:function () {
        return this.get(XY_COORD)[1];
    }, _afterXYChange:function (e) {
        if (e.src != UI) {
            this._uiSetXY(e.newVal);
        }
    }, _uiSetXY:function (val) {
        this._posNode.setXY(val);
    }};
    Y.WidgetPosition = Position;
}, '3.0.0', {requires:['widget']});