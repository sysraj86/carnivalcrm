/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('dd-ddm-drop', function (Y) {
    Y.mix(Y.DD.DDM, {_noShim:false, _activeShims:[], _hasActiveShim:function () {
        if (this._noShim) {
            return true;
        }
        return this._activeShims.length;
    }, _addActiveShim:function (d) {
        this._activeShims[this._activeShims.length] = d;
    }, _removeActiveShim:function (d) {
        var s = [];
        Y.each(this._activeShims, function (v, k) {
            if (v._yuid !== d._yuid) {
                s[s.length] = v;
            }
        });
        this._activeShims = s;
    }, syncActiveShims:function (force) {
        Y.later(0, this, function (force) {
            var drops = ((force) ? this.targets : this._lookup());
            Y.each(drops, function (v, k) {
                v.sizeShim.call(v);
            }, this);
        }, force);
    }, mode:0, POINT:0, INTERSECT:1, STRICT:2, useHash:true, activeDrop:null, validDrops:[], otherDrops:{}, targets:[], _addValid:function (drop) {
        this.validDrops[this.validDrops.length] = drop;
        return this;
    }, _removeValid:function (drop) {
        var drops = [];
        Y.each(this.validDrops, function (v, k) {
            if (v !== drop) {
                drops[drops.length] = v;
            }
        });
        this.validDrops = drops;
        return this;
    }, isOverTarget:function (drop) {
        if (this.activeDrag && drop) {
            var xy = this.activeDrag.mouseXY, r, dMode = this.activeDrag.get('dragMode'), aRegion;
            if (xy && this.activeDrag) {
                aRegion = this.activeDrag.region;
                if (dMode == this.STRICT) {
                    return this.activeDrag.get('dragNode').inRegion(drop.region, true, aRegion);
                } else {
                    if (drop && drop.shim) {
                        if ((dMode == this.INTERSECT) && this._noShim) {
                            r = ((aRegion) ? aRegion : this.activeDrag.get('node'));
                            return drop.get('node').intersect(r).inRegion;
                        } else {
                            return drop.shim.intersect({top:xy[1], bottom:xy[1], left:xy[0], right:xy[0]}, drop.region).inRegion;
                        }
                    } else {
                        return false;
                    }
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }, clearCache:function () {
        this.validDrops = [];
        this.otherDrops = {};
        this._activeShims = [];
    }, _activateTargets:function () {
        this.clearCache();
        Y.each(this.targets, function (v, k) {
            v._activateShim.apply(v, []);
        }, this);
        this._handleTargetOver();
    }, getBestMatch:function (drops, all) {
        var biggest = null, area = 0, out;
        Y.each(drops, function (v, k) {
            var inter = this.activeDrag.get('dragNode').intersect(v.get('node'));
            v.region.area = inter.area;
            if (inter.inRegion) {
                if (inter.area > area) {
                    area = inter.area;
                    biggest = v;
                }
            }
        }, this);
        if (all) {
            out = [];
            Y.each(drops, function (v, k) {
                if (v !== biggest) {
                    out[out.length] = v;
                }
            }, this);
            return[biggest, out];
        } else {
            return biggest;
        }
    }, _deactivateTargets:function () {
        var other = [], tmp, activeDrag = this.activeDrag, activeDrop = this.activeDrop;
        if (activeDrag && activeDrop && this.otherDrops[activeDrop]) {
            if (!activeDrag.get('dragMode')) {
                other = this.otherDrops;
                delete other[activeDrop];
            } else {
                tmp = this.getBestMatch(this.otherDrops, true);
                activeDrop = tmp[0];
                other = tmp[1];
            }
            activeDrag.get('node').removeClass(this.CSS_PREFIX + '-drag-over');
            if (activeDrop) {
                activeDrop.fire('drop:hit', {drag:activeDrag, drop:activeDrop, others:other});
                activeDrag.fire('drag:drophit', {drag:activeDrag, drop:activeDrop, others:other});
            }
        } else if (activeDrag) {
            activeDrag.get('node').removeClass(this.CSS_PREFIX + '-drag-over');
            activeDrag.fire('drag:dropmiss', {pageX:activeDrag.lastXY[0], pageY:activeDrag.lastXY[1]});
        } else {
        }
        this.activeDrop = null;
        Y.each(this.targets, function (v, k) {
            v._deactivateShim.apply(v, []);
        }, this);
    }, _dropMove:function () {
        if (this._hasActiveShim()) {
            this._handleTargetOver();
        } else {
            Y.each(this.otherDrops, function (v, k) {
                v._handleOut.apply(v, []);
            });
        }
    }, _lookup:function () {
        if (!this.useHash || this._noShim) {
            return this.validDrops;
        }
        var drops = [];
        Y.each(this.validDrops, function (v, k) {
            if (v.shim && v.shim.inViewportRegion(false, v.region)) {
                drops[drops.length] = v;
            }
        });
        return drops;
    }, _handleTargetOver:function () {
        var drops = this._lookup();
        Y.each(drops, function (v, k) {
            v._handleTargetOver.call(v);
        }, this);
    }, _regTarget:function (t) {
        this.targets[this.targets.length] = t;
    }, _unregTarget:function (drop) {
        var targets = [], vdrops;
        Y.each(this.targets, function (v, k) {
            if (v != drop) {
                targets[targets.length] = v;
            }
        }, this);
        this.targets = targets;
        vdrops = [];
        Y.each(this.validDrops, function (v, k) {
            if (v !== drop) {
                vdrops[vdrops.length] = v;
            }
        });
        this.validDrops = vdrops;
    }, getDrop:function (node) {
        var drop = false, n = Y.Node.get(node);
        if (n instanceof Y.Node) {
            Y.each(this.targets, function (v, k) {
                if (n.compareTo(v.get('node'))) {
                    drop = v;
                }
            });
        }
        return drop;
    }}, true);
}, '3.0.0', {requires:['dd-ddm'], skinnable:false});