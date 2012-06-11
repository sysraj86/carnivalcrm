/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('node-screen', function (Y) {
    Y.each(['winWidth', 'winHeight', 'docWidth', 'docHeight', 'docScrollX', 'docScrollY'], function (name) {
        Y.Node.ATTRS[name] = {getter:function () {
            var args = Array.prototype.slice.call(arguments);
            args.unshift(Y.Node.getDOMNode(this));
            return Y.DOM[name].apply(this, args);
        }};
    });
    Y.Node.ATTRS.scrollLeft = {getter:function () {
        var node = Y.Node.getDOMNode(this);
        return('scrollLeft'in node) ? node.scrollLeft : Y.DOM.docScrollX(node);
    }, setter:function (val) {
        var node = Y.Node.getDOMNode(this);
        if (node) {
            if ('scrollLeft'in node) {
                node.scrollLeft = val;
            } else if (node.document || node.nodeType === 9) {
                Y.DOM._getWin(node).scrollTo(val, Y.DOM.docScrollY(node));
            }
        } else {
        }
    }};
    Y.Node.ATTRS.scrollTop = {getter:function () {
        var node = Y.Node.getDOMNode(this);
        return('scrollTop'in node) ? node.scrollTop : Y.DOM.docScrollY(node);
    }, setter:function (val) {
        var node = Y.Node.getDOMNode(this);
        if (node) {
            if ('scrollTop'in node) {
                node.scrollTop = val;
            } else if (node.document || node.nodeType === 9) {
                Y.DOM._getWin(node).scrollTo(Y.DOM.docScrollX(node), val);
            }
        } else {
        }
    }};
    Y.Node.importMethod(Y.DOM, ['getXY', 'setXY', 'getX', 'setX', 'getY', 'setY']);
    Y.Node.ATTRS.region = {getter:function () {
        var node = Y.Node.getDOMNode(this);
        if (node && !node.tagName) {
            if (node.nodeType === 9) {
                node = node.documentElement;
            } else if (node.alert) {
                node = node.document.documentElement;
            }
        }
        return Y.DOM.region(node);
    }};
    Y.Node.ATTRS.viewportRegion = {getter:function () {
        return Y.DOM.viewportRegion(Y.Node.getDOMNode(this));
    }};
    Y.Node.importMethod(Y.DOM, 'inViewportRegion');
    Y.Node.prototype.intersect = function (node2, altRegion) {
        var node1 = Y.Node.getDOMNode(this);
        if (node2 instanceof Y.Node) {
            node2 = Y.Node.getDOMNode(node2);
        }
        return Y.DOM.intersect(node1, node2, altRegion);
    };
    Y.Node.prototype.inRegion = function (node2, all, altRegion) {
        var node1 = Y.Node.getDOMNode(this);
        if (node2 instanceof Y.Node) {
            node2 = Y.Node.getDOMNode(node2);
        }
        return Y.DOM.inRegion(node1, node2, all, altRegion);
    };
}, '3.0.0', {requires:['dom-screen']});