/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("node-screen", function (A) {
    A.each(["winWidth", "winHeight", "docWidth", "docHeight", "docScrollX", "docScrollY"], function (B) {
        A.Node.ATTRS[B] = {getter:function () {
            var C = Array.prototype.slice.call(arguments);
            C.unshift(A.Node.getDOMNode(this));
            return A.DOM[B].apply(this, C);
        }};
    });
    A.Node.ATTRS.scrollLeft = {getter:function () {
        var B = A.Node.getDOMNode(this);
        return("scrollLeft"in B) ? B.scrollLeft : A.DOM.docScrollX(B);
    }, setter:function (C) {
        var B = A.Node.getDOMNode(this);
        if (B) {
            if ("scrollLeft"in B) {
                B.scrollLeft = C;
            } else {
                if (B.document || B.nodeType === 9) {
                    A.DOM._getWin(B).scrollTo(C, A.DOM.docScrollY(B));
                }
            }
        } else {
        }
    }};
    A.Node.ATTRS.scrollTop = {getter:function () {
        var B = A.Node.getDOMNode(this);
        return("scrollTop"in B) ? B.scrollTop : A.DOM.docScrollY(B);
    }, setter:function (C) {
        var B = A.Node.getDOMNode(this);
        if (B) {
            if ("scrollTop"in B) {
                B.scrollTop = C;
            } else {
                if (B.document || B.nodeType === 9) {
                    A.DOM._getWin(B).scrollTo(A.DOM.docScrollX(B), C);
                }
            }
        } else {
        }
    }};
    A.Node.importMethod(A.DOM, ["getXY", "setXY", "getX", "setX", "getY", "setY"]);
    A.Node.ATTRS.region = {getter:function () {
        var B = A.Node.getDOMNode(this);
        if (B && !B.tagName) {
            if (B.nodeType === 9) {
                B = B.documentElement;
            } else {
                if (B.alert) {
                    B = B.document.documentElement;
                }
            }
        }
        return A.DOM.region(B);
    }};
    A.Node.ATTRS.viewportRegion = {getter:function () {
        return A.DOM.viewportRegion(A.Node.getDOMNode(this));
    }};
    A.Node.importMethod(A.DOM, "inViewportRegion");
    A.Node.prototype.intersect = function (B, D) {
        var C = A.Node.getDOMNode(this);
        if (B instanceof A.Node) {
            B = A.Node.getDOMNode(B);
        }
        return A.DOM.intersect(C, B, D);
    };
    A.Node.prototype.inRegion = function (B, D, E) {
        var C = A.Node.getDOMNode(this);
        if (B instanceof A.Node) {
            B = A.Node.getDOMNode(B);
        }
        return A.DOM.inRegion(C, B, D, E);
    };
}, "3.0.0", {requires:["dom-screen"]});