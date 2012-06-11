/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("dd-ddm", function (A) {
    A.mix(A.DD.DDM, {_pg:null, _debugShim:false, _activateTargets:function () {
    }, _deactivateTargets:function () {
    }, _startDrag:function () {
        if (this.activeDrag.get("useShim")) {
            this._pg_activate();
            this._activateTargets();
        }
    }, _endDrag:function () {
        this._pg_deactivate();
        this._deactivateTargets();
    }, _pg_deactivate:function () {
        this._pg.setStyle("display", "none");
    }, _pg_activate:function () {
        var B = this.activeDrag.get("activeHandle"), C = "auto";
        if (B) {
            C = B.getStyle("cursor");
        }
        if (C == "auto") {
            C = this.get("dragCursor");
        }
        this._pg_size();
        this._pg.setStyles({top:0, left:0, display:"block", opacity:((this._debugShim) ? ".5" : "0"), cursor:C});
    }, _pg_size:function () {
        if (this.activeDrag) {
            var B = A.get("body"), D = B.get("docHeight"), C = B.get("docWidth");
            this._pg.setStyles({height:D + "px", width:C + "px"});
        }
    }, _createPG:function () {
        var D = A.Node.create("<div></div>"), B = A.get("body");
        D.setStyles({top:"0", left:"0", position:"absolute", zIndex:"9999", overflow:"hidden", backgroundColor:"red", display:"none", height:"5px", width:"5px"});
        D.set("id", A.stamp(D));
        D.addClass("yui-dd-shim");
        if (B.get("firstChild")) {
            B.insertBefore(D, B.get("firstChild"));
        } else {
            B.appendChild(D);
        }
        this._pg = D;
        this._pg.on("mouseup", A.bind(this._end, this));
        this._pg.on("mousemove", A.bind(this._move, this));
        var C = A.get(window);
        A.on("window:resize", A.bind(this._pg_size, this));
        C.on("scroll", A.bind(this._pg_size, this));
    }}, true);
    A.on("domready", A.bind(A.DD.DDM._createPG, A.DD.DDM));
}, "3.0.0", {requires:["dd-ddm-base", "event-resize"], skinnable:false});