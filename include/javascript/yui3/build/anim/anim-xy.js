/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('anim-xy', function (Y) {
    var NUM = Number;
    Y.Anim.behaviors.xy = {set:function (anim, att, from, to, elapsed, duration, fn) {
        anim._node.setXY([fn(elapsed, NUM(from[0]), NUM(to[0]) - NUM(from[0]), duration), fn(elapsed, NUM(from[1]), NUM(to[1]) - NUM(from[1]), duration)]);
    }, get:function (anim) {
        return anim._node.getXY();
    }};
}, '3.0.0', {requires:['anim-base', 'node-screen']});