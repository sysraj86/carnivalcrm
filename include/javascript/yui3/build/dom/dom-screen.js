/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('dom-screen', function (Y) {
    (function (Y) {
        var DOCUMENT_ELEMENT = 'documentElement', COMPAT_MODE = 'compatMode', POSITION = 'position', FIXED = 'fixed', RELATIVE = 'relative', LEFT = 'left', TOP = 'top', _BACK_COMPAT = 'BackCompat', MEDIUM = 'medium', BORDER_LEFT_WIDTH = 'borderLeftWidth', BORDER_TOP_WIDTH = 'borderTopWidth', GET_BOUNDING_CLIENT_RECT = 'getBoundingClientRect', GET_COMPUTED_STYLE = 'getComputedStyle', RE_TABLE = /^t(?:able|d|h)$/i;
        Y.mix(Y.DOM, {winHeight:function (node) {
            var h = Y.DOM._getWinSize(node).height;
            return h;
        }, winWidth:function (node) {
            var w = Y.DOM._getWinSize(node).width;
            return w;
        }, docHeight:function (node) {
            var h = Y.DOM._getDocSize(node).height;
            return Math.max(h, Y.DOM._getWinSize(node).height);
        }, docWidth:function (node) {
            var w = Y.DOM._getDocSize(node).width;
            return Math.max(w, Y.DOM._getWinSize(node).width);
        }, docScrollX:function (node) {
            var doc = Y.DOM._getDoc(node);
            return Math.max(doc[DOCUMENT_ELEMENT].scrollLeft, doc.body.scrollLeft);
        }, docScrollY:function (node) {
            var doc = Y.DOM._getDoc(node);
            return Math.max(doc[DOCUMENT_ELEMENT].scrollTop, doc.body.scrollTop);
        }, getXY:function () {
            if (document[DOCUMENT_ELEMENT][GET_BOUNDING_CLIENT_RECT]) {
                return function (node) {
                    var xy = null, scrollLeft, scrollTop, box, off1, off2, bLeft, bTop, mode, doc;
                    if (node) {
                        if (Y.DOM.inDoc(node)) {
                            scrollLeft = Y.DOM.docScrollX(node);
                            scrollTop = Y.DOM.docScrollY(node);
                            box = node[GET_BOUNDING_CLIENT_RECT]();
                            doc = Y.DOM._getDoc(node);
                            xy = [box.left, box.top];
                            if (Y.UA.ie) {
                                off1 = 2;
                                off2 = 2;
                                mode = doc[COMPAT_MODE];
                                bLeft = Y.DOM[GET_COMPUTED_STYLE](doc[DOCUMENT_ELEMENT], BORDER_LEFT_WIDTH);
                                bTop = Y.DOM[GET_COMPUTED_STYLE](doc[DOCUMENT_ELEMENT], BORDER_TOP_WIDTH);
                                if (Y.UA.ie === 6) {
                                    if (mode !== _BACK_COMPAT) {
                                        off1 = 0;
                                        off2 = 0;
                                    }
                                }
                                if ((mode == _BACK_COMPAT)) {
                                    if (bLeft !== MEDIUM) {
                                        off1 = parseInt(bLeft, 10);
                                    }
                                    if (bTop !== MEDIUM) {
                                        off2 = parseInt(bTop, 10);
                                    }
                                }
                                xy[0] -= off1;
                                xy[1] -= off2;
                            }
                            if ((scrollTop || scrollLeft)) {
                                xy[0] += scrollLeft;
                                xy[1] += scrollTop;
                            }
                        } else {
                            xy = Y.DOM._getOffset(node);
                        }
                    }
                    return xy;
                };
            } else {
                return function (node) {
                    var xy = null, parentNode, bCheck, scrollTop, scrollLeft;
                    if (node) {
                        if (Y.DOM.inDoc(node)) {
                            xy = [node.offsetLeft, node.offsetTop];
                            parentNode = node;
                            bCheck = ((Y.UA.gecko || Y.UA.webkit > 519) ? true : false);
                            while ((parentNode = parentNode.offsetParent)) {
                                xy[0] += parentNode.offsetLeft;
                                xy[1] += parentNode.offsetTop;
                                if (bCheck) {
                                    xy = Y.DOM._calcBorders(parentNode, xy);
                                }
                            }
                            if (Y.DOM.getStyle(node, POSITION) != FIXED) {
                                parentNode = node;
                                while ((parentNode = parentNode.parentNode)) {
                                    scrollTop = parentNode.scrollTop;
                                    scrollLeft = parentNode.scrollLeft;
                                    if (Y.UA.gecko && (Y.DOM.getStyle(parentNode, 'overflow') !== 'visible')) {
                                        xy = Y.DOM._calcBorders(parentNode, xy);
                                    }
                                    if (scrollTop || scrollLeft) {
                                        xy[0] -= scrollLeft;
                                        xy[1] -= scrollTop;
                                    }
                                }
                                xy[0] += Y.DOM.docScrollX(node);
                                xy[1] += Y.DOM.docScrollY(node);
                            } else {
                                xy[0] += Y.DOM.docScrollX(node);
                                xy[1] += Y.DOM.docScrollY(node);
                            }
                        } else {
                            xy = Y.DOM._getOffset(node);
                        }
                    }
                    return xy;
                };
            }
        }(), _getOffset:function (node) {
            var pos, xy = null;
            if (node) {
                pos = Y.DOM.getStyle(node, POSITION);
                xy = [parseInt(Y.DOM[GET_COMPUTED_STYLE](node, LEFT), 10), parseInt(Y.DOM[GET_COMPUTED_STYLE](node, TOP), 10)];
                if (isNaN(xy[0])) {
                    xy[0] = parseInt(Y.DOM.getStyle(node, LEFT), 10);
                    if (isNaN(xy[0])) {
                        xy[0] = (pos === RELATIVE) ? 0 : node.offsetLeft || 0;
                    }
                }
                if (isNaN(xy[1])) {
                    xy[1] = parseInt(Y.DOM.getStyle(node, TOP), 10);
                    if (isNaN(xy[1])) {
                        xy[1] = (pos === RELATIVE) ? 0 : node.offsetTop || 0;
                    }
                }
            }
            return xy;
        }, getX:function (node) {
            return Y.DOM.getXY(node)[0];
        }, getY:function (node) {
            return Y.DOM.getXY(node)[1];
        }, setXY:function (node, xy, noRetry) {
            var setStyle = Y.DOM.setStyle, pos, delta, newXY, currentXY;
            if (node && xy) {
                pos = Y.DOM.getStyle(node, POSITION);
                delta = Y.DOM._getOffset(node);
                if (pos == 'static') {
                    pos = RELATIVE;
                    setStyle(node, POSITION, pos);
                }
                currentXY = Y.DOM.getXY(node);
                if (xy[0] !== null) {
                    setStyle(node, LEFT, xy[0] - currentXY[0] + delta[0] + 'px');
                }
                if (xy[1] !== null) {
                    setStyle(node, TOP, xy[1] - currentXY[1] + delta[1] + 'px');
                }
                if (!noRetry) {
                    newXY = Y.DOM.getXY(node);
                    if (newXY[0] !== xy[0] || newXY[1] !== xy[1]) {
                        Y.DOM.setXY(node, xy, true);
                    }
                }
            } else {
            }
        }, setX:function (node, x) {
            return Y.DOM.setXY(node, [x, null]);
        }, setY:function (node, y) {
            return Y.DOM.setXY(node, [null, y]);
        }, _calcBorders:function (node, xy2) {
            var t = parseInt(Y.DOM[GET_COMPUTED_STYLE](node, BORDER_TOP_WIDTH), 10) || 0, l = parseInt(Y.DOM[GET_COMPUTED_STYLE](node, BORDER_LEFT_WIDTH), 10) || 0;
            if (Y.UA.gecko) {
                if (RE_TABLE.test(node.tagName)) {
                    t = 0;
                    l = 0;
                }
            }
            xy2[0] += l;
            xy2[1] += t;
            return xy2;
        }, _getWinSize:function (node) {
            var doc = Y.DOM._getDoc(), win = doc.defaultView || doc.parentWindow, mode = doc[COMPAT_MODE], h = win.innerHeight, w = win.innerWidth, root = doc[DOCUMENT_ELEMENT];
            if (mode && !Y.UA.opera) {
                if (mode != 'CSS1Compat') {
                    root = doc.body;
                }
                h = root.clientHeight;
                w = root.clientWidth;
            }
            return{height:h, width:w};
        }, _getDocSize:function (node) {
            var doc = Y.DOM._getDoc(), root = doc[DOCUMENT_ELEMENT];
            if (doc[COMPAT_MODE] != 'CSS1Compat') {
                root = doc.body;
            }
            return{height:root.scrollHeight, width:root.scrollWidth};
        }});
    })(Y);
    (function (Y) {
        var TOP = 'top', RIGHT = 'right', BOTTOM = 'bottom', LEFT = 'left', getOffsets = function (r1, r2) {
            var t = Math.max(r1[TOP], r2[TOP]), r = Math.min(r1[RIGHT], r2[RIGHT]), b = Math.min(r1[BOTTOM], r2[BOTTOM]), l = Math.max(r1[LEFT], r2[LEFT]), ret = {};
            ret[TOP] = t;
            ret[RIGHT] = r;
            ret[BOTTOM] = b;
            ret[LEFT] = l;
            return ret;
        }, DOM = Y.DOM;
        Y.mix(DOM, {region:function (node) {
            var xy = DOM.getXY(node), ret = false;
            if (node && xy) {
                ret = DOM._getRegion(xy[1], xy[0] + node.offsetWidth, xy[1] + node.offsetHeight, xy[0]);
            }
            return ret;
        }, intersect:function (node, node2, altRegion) {
            var r = altRegion || DOM.region(node), region = {}, n = node2, off;
            if (n.tagName) {
                region = DOM.region(n);
            } else if (Y.Lang.isObject(node2)) {
                region = node2;
            } else {
                return false;
            }
            off = getOffsets(region, r);
            return{top:off[TOP], right:off[RIGHT], bottom:off[BOTTOM], left:off[LEFT], area:((off[BOTTOM] - off[TOP]) * (off[RIGHT] - off[LEFT])), yoff:((off[BOTTOM] - off[TOP])), xoff:(off[RIGHT] - off[LEFT]), inRegion:DOM.inRegion(node, node2, false, altRegion)};
        }, inRegion:function (node, node2, all, altRegion) {
            var region = {}, r = altRegion || DOM.region(node), n = node2, off;
            if (n.tagName) {
                region = DOM.region(n);
            } else if (Y.Lang.isObject(node2)) {
                region = node2;
            } else {
                return false;
            }
            if (all) {
                return(r[LEFT] >= region[LEFT] && r[RIGHT] <= region[RIGHT] && r[TOP] >= region[TOP] && r[BOTTOM] <= region[BOTTOM]);
            } else {
                off = getOffsets(region, r);
                if (off[BOTTOM] >= off[TOP] && off[RIGHT] >= off[LEFT]) {
                    return true;
                } else {
                    return false;
                }
            }
        }, inViewportRegion:function (node, all, altRegion) {
            return DOM.inRegion(node, DOM.viewportRegion(node), all, altRegion);
        }, _getRegion:function (t, r, b, l) {
            var region = {};
            region[TOP] = region[1] = t;
            region[LEFT] = region[0] = l;
            region[BOTTOM] = b;
            region[RIGHT] = r;
            region.width = region[RIGHT] - region[LEFT];
            region.height = region[BOTTOM] - region[TOP];
            return region;
        }, viewportRegion:function (node) {
            node = node || Y.config.doc.documentElement;
            var ret = false, scrollX, scrollY;
            if (node) {
                scrollX = DOM.docScrollX(node);
                scrollY = DOM.docScrollY(node);
                ret = DOM._getRegion(scrollY, DOM.winWidth(node) + scrollX, scrollY + DOM.winHeight(node), scrollX);
            }
            return ret;
        }});
    })(Y);
}, '3.0.0', {requires:['dom-base', 'dom-style']});