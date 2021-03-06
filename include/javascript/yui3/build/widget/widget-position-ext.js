/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('widget-position-ext', function (Y) {
    var L = Y.Lang, ALIGN = "align", BINDUI = "bindUI", SYNCUI = "syncUI", OFFSET_WIDTH = "offsetWidth", OFFSET_HEIGHT = "offsetHeight", VIEWPORT_REGION = "viewportRegion", REGION = "region", AlignChange = "alignChange";

    function PositionExt(config) {
        if (!this._posNode) {
            Y.error("WidgetPosition needs to be added to the Widget, before WidgetPositionExt is added");
        }
        Y.after(this._syncUIPosExtras, this, SYNCUI);
        Y.after(this._bindUIPosExtras, this, BINDUI);
    }

    PositionExt.ATTRS = {align:{value:null}, centered:{setter:function (val) {
        return this._setAlignCenter(val);
    }, lazyAdd:false, value:false}};
    PositionExt.TL = "tl";
    PositionExt.TR = "tr";
    PositionExt.BL = "bl";
    PositionExt.BR = "br";
    PositionExt.TC = "tc";
    PositionExt.RC = "rc";
    PositionExt.BC = "bc";
    PositionExt.LC = "lc";
    PositionExt.CC = "cc";
    PositionExt.prototype = {_syncUIPosExtras:function () {
        var align = this.get(ALIGN);
        if (align) {
            this._uiSetAlign(align.node, align.points);
        }
    }, _bindUIPosExtras:function () {
        this.after(AlignChange, this._afterAlignChange);
    }, _setAlignCenter:function (val) {
        if (val) {
            this.set(ALIGN, {node:val === true ? null : val, points:[PositionExt.CC, PositionExt.CC]});
        }
        return val;
    }, _afterAlignChange:function (e) {
        if (e.newVal) {
            this._uiSetAlign(e.newVal.node, e.newVal.points);
        }
    }, _uiSetAlign:function (node, points) {
        if (!L.isArray(points) || points.length != 2) {
            Y.error("align: Invalid Points Arguments");
            return;
        }
        var nodeRegion, widgetPoint, nodePoint, xy;
        if (!node) {
            nodeRegion = this._posNode.get(VIEWPORT_REGION);
        } else {
            node = Y.Node.get(node);
            if (node) {
                nodeRegion = node.get(REGION);
            }
        }
        if (nodeRegion) {
            nodeRegion.width = nodeRegion.width || nodeRegion.right - nodeRegion.left;
            nodeRegion.height = nodeRegion.height || nodeRegion.bottom - nodeRegion.top;
            widgetPoint = points[0];
            nodePoint = points[1];
            switch (nodePoint) {
                case PositionExt.TL:
                    xy = [nodeRegion.left, nodeRegion.top];
                    break;
                case PositionExt.TR:
                    xy = [nodeRegion.right, nodeRegion.top];
                    break;
                case PositionExt.BL:
                    xy = [nodeRegion.left, nodeRegion.bottom];
                    break;
                case PositionExt.BR:
                    xy = [nodeRegion.right, nodeRegion.bottom];
                    break;
                case PositionExt.TC:
                    xy = [nodeRegion.left + Math.floor(nodeRegion.width / 2), nodeRegion.top];
                    break;
                case PositionExt.BC:
                    xy = [nodeRegion.left + Math.floor(nodeRegion.width / 2), nodeRegion.bottom];
                    break;
                case PositionExt.LC:
                    xy = [nodeRegion.left, nodeRegion.top + Math.floor(nodeRegion.height / 2)];
                    break;
                case PositionExt.RC:
                    xy = [nodeRegion.right, nodeRegion.top + Math.floor(nodeRegion.height / 2), widgetPoint];
                    break;
                case PositionExt.CC:
                    xy = [nodeRegion.left + Math.floor(nodeRegion.width / 2), nodeRegion.top + Math.floor(nodeRegion.height / 2), widgetPoint];
                    break;
                default:
                    break;
            }
            if (xy) {
                this._doAlign(widgetPoint, xy[0], xy[1]);
            }
        }
    }, _doAlign:function (widgetPoint, x, y) {
        var widgetNode = this._posNode, xy;
        switch (widgetPoint) {
            case PositionExt.TL:
                xy = [x, y];
                break;
            case PositionExt.TR:
                xy = [x - widgetNode.get(OFFSET_WIDTH), y];
                break;
            case PositionExt.BL:
                xy = [x, y - widgetNode.get(OFFSET_HEIGHT)];
                break;
            case PositionExt.BR:
                xy = [x - widgetNode.get(OFFSET_WIDTH), y - widgetNode.get(OFFSET_HEIGHT)];
                break;
            case PositionExt.TC:
                xy = [x - (widgetNode.get(OFFSET_WIDTH) / 2), y];
                break;
            case PositionExt.BC:
                xy = [x - (widgetNode.get(OFFSET_WIDTH) / 2), y - widgetNode.get(OFFSET_HEIGHT)];
                break;
            case PositionExt.LC:
                xy = [x, y - (widgetNode.get(OFFSET_HEIGHT) / 2)];
                break;
            case PositionExt.RC:
                xy = [(x - widgetNode.get(OFFSET_WIDTH)), y - (widgetNode.get(OFFSET_HEIGHT) / 2)];
                break;
            case PositionExt.CC:
                xy = [x - (widgetNode.get(OFFSET_WIDTH) / 2), y - (widgetNode.get(OFFSET_HEIGHT) / 2)];
                break;
            default:
                break;
        }
        if (xy) {
            this.move(xy);
        }
    }, align:function (node, points) {
        this.set(ALIGN, {node:node, points:points});
    }, centered:function (node) {
        this.align(node, [PositionExt.CC, PositionExt.CC]);
    }};
    Y.WidgetPositionExt = PositionExt;
}, '3.0.0', {requires:['widget', 'widget-position']});