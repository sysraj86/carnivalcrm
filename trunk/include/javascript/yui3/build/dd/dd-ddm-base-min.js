/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("dd-ddm-base", function (B) {
    var A = function () {
        A.superclass.constructor.apply(this, arguments);
    };
    A.NAME = "ddm";
    A.ATTRS = {dragCursor:{value:"move"}, clickPixelThresh:{value:3}, clickTimeThresh:{value:1000}, dragMode:{value:"point", setter:function (C) {
        this._setDragMode(C);
        return C;
    }}};
    B.extend(A, B.Base, {_active:null, _setDragMode:function (C) {
        if (C === null) {
            C = B.DD.DDM.get("dragMode");
        }
        switch (C) {
            case 1:
            case"intersect":
                return 1;
            case 2:
            case"strict":
                return 2;
            case 0:
            case"point":
                return 0;
        }
        return 0;
    }, CSS_PREFIX:"yui-dd", _activateTargets:function () {
    }, _drags:[], activeDrag:false, _regDrag:function (C) {
        if (this.getDrag(C.get("node"))) {
            return false;
        }
        if (!this._active) {
            this._setupListeners();
        }
        this._drags.push(C);
        return true;
    }, _unregDrag:function (D) {
        var C = [];
        B.each(this._drags, function (F, E) {
            if (F !== D) {
                C[C.length] = F;
            }
        });
        this._drags = C;
    }, _setupListeners:function () {
        this._active = true;
        var C = B.get(document);
        C.on("mousemove", B.bind(this._move, this));
        C.on("mouseup", B.bind(this._end, this));
    }, _start:function () {
        this.fire("ddm:start");
        this._startDrag();
    }, _startDrag:function () {
    }, _endDrag:function () {
    }, _dropMove:function () {
    }, _end:function () {
        if (this.activeDrag) {
            this._endDrag();
            this.fire("ddm:end");
            this.activeDrag.end.call(this.activeDrag);
            this.activeDrag = null;
        }
    }, stopDrag:function () {
        if (this.activeDrag) {
            this._end();
        }
        return this;
    }, _move:function (C) {
        if (this.activeDrag) {
            this.activeDrag._move.call(this.activeDrag, C);
            this._dropMove();
        }
    }, cssSizestoObject:function (D) {
        var C = D.split(" ");
        switch (C.length) {
            case 1:
                C[1] = C[2] = C[3] = C[0];
                break;
            case 2:
                C[2] = C[0];
                C[3] = C[1];
                break;
            case 3:
                C[3] = C[1];
                break;
        }
        return{top:parseInt(C[0], 10), right:parseInt(C[1], 10), bottom:parseInt(C[2], 10), left:parseInt(C[3], 10)};
    }, getDrag:function (D) {
        var C = false, E = B.get(D);
        if (E instanceof B.Node) {
            B.each(this._drags, function (G, F) {
                if (E.compareTo(G.get("node"))) {
                    C = G;
                }
            });
        }
        return C;
    }});
    B.namespace("DD");
    B.DD.DDM = new A();
}, "3.0.0", {requires:["node", "base"], skinnable:false});