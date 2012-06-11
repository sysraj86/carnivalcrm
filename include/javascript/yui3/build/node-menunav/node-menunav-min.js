/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add("node-menunav", function (D) {
    var m = D.UA, t = D.later, AL = D.ClassNameManager.getClassName, R = "menu", G = "menuitem", AH = "hidden", S = "parentNode", V = "children", z = "offsetHeight", AC = "offsetWidth", AN = "px", g = "id", I = ".", E = "handledMouseOut", r = "handledMouseOver", a = "active", AJ = "label", d = "a", w = "mousedown", AO = "keydown", AB = "click", Q = "", U = "first-of-type", AP = "role", N = "presentation", AD = "descendants", j = "UI", u = "activeDescendant", J = "useARIA", x = "aria-hidden", y = "content", c = "host", h = u + "Change", AM = ">.yui-menu-content>ul>li>a", O = ">.yui-menu-content>ul>li>.yui-menu-label>a:first-child", v = "autoSubmenuDisplay", T = "mouseOutHideDelay", l = AL(R), AF = AL(R, AH), Z = AL(R, "horizontal"), AI = AL(R, AJ), k = AL(R, AJ, a), X = AL(R, AJ, (R + "visible")), K = AL(G), A = AL(G, a), i = I + l, AG = (I + AL(R, "toggle"));
    var L = function (Y) {
        var AR = Y.previous(), AQ;
        if (!AR) {
            AQ = Y.get(S).get(V);
            AR = AQ.item(AQ.size() - 1);
        }
        return AR;
    };
    var b = function (Y) {
        var AQ = Y.next();
        if (!AQ) {
            AQ = Y.get(S).get(V).item(0);
        }
        return AQ;
    };
    var F = function (Y) {
        var AQ = false;
        if (Y) {
            AQ = Y.get("nodeName").toLowerCase() === d;
        }
        return AQ;
    };
    var P = function (Y) {
        return Y.hasClass(K);
    };
    var s = function (Y) {
        return Y.hasClass(AI);
    };
    var q = function (Y) {
        return Y.hasClass(Z);
    };
    var n = function (Y) {
        return Y.hasClass(X);
    };
    var p = function (Y) {
        return F(Y) ? Y : Y.one(d);
    };
    var AA = function (AR, AQ, Y) {
        var AS;
        if (AR) {
            if (AR.hasClass(AQ)) {
                AS = AR;
            }
            if (!AS && Y) {
                AS = AR.ancestor((I + AQ));
            }
        }
        return AS;
    };
    var M = function (Y) {
        return Y.ancestor(i);
    };
    var W = function (AQ, Y) {
        return AA(AQ, l, Y);
    };
    var AE = function (AQ, Y) {
        var AR;
        if (AQ) {
            AR = AA(AQ, K, Y);
        }
        return AR;
    };
    var o = function (AQ, Y) {
        var AR;
        if (AQ) {
            if (Y) {
                AR = AA(AQ, AI, Y);
            } else {
                AR = AA(AQ, AI) || AQ.one((I + AI));
            }
        }
        return AR;
    };
    var B = function (AQ, Y) {
        var AR;
        if (AQ) {
            AR = AE(AQ, Y) || o(AQ, Y);
        }
        return AR;
    };
    var C = function (Y) {
        return B(Y.one("li"));
    };
    var f = function (Y) {
        return P(Y) ? A : k;
    };
    var e = function (Y, AQ) {
        return Y && !Y[r] && (Y.compareTo(AQ) || Y.contains(AQ));
    };
    var H = function (AQ, Y) {
        return AQ && !AQ[E] && (!AQ.compareTo(Y) && !AQ.contains(Y));
    };
    var AK = function () {
        AK.superclass.constructor.apply(this, arguments);
    };
    AK.NAME = "nodeMenuNav";
    AK.NS = "menuNav";
    AK.SHIM_TEMPLATE_TITLE = "Menu Stacking Shim";
    AK.SHIM_TEMPLATE = '<iframe frameborder="0" tabindex="-1" class="' + AL("shim") + '" title="' + AK.SHIM_TEMPLATE_TITLE + '" src="javascript:false;"></iframe>';
    AK.ATTRS = {useARIA:{value:true, writeOnce:true, lazyAdd:false, setter:function (AT) {
        var AQ = this.get(c), AU, Y, AS, AR;
        if (AT) {
            AQ.set(AP, R);
            AQ.all("ul,li,." + AL(R, y)).set(AP, N);
            AQ.all((I + AL(G, y))).set(AP, G);
            AQ.all((I + AI)).each(function (AV) {
                AU = AV;
                Y = AV.one(AG);
                if (Y) {
                    Y.set(AP, N);
                    AU = Y.previous();
                }
                AU.set(AP, G);
                AU.set("aria-haspopup", true);
                AS = AV.next();
                if (AS) {
                    AS.set(AP, R);
                    AU = AS.previous();
                    Y = AU.one(AG);
                    if (Y) {
                        AU = Y;
                    }
                    AR = D.stamp(AU);
                    if (!AU.get(g)) {
                        AU.set(g, AR);
                    }
                    AS.set("aria-labelledby", AR);
                    AS.set(x, true);
                }
            });
        }
    }}, autoSubmenuDisplay:{value:true, writeOnce:true}, submenuShowDelay:{value:250, writeOnce:true}, submenuHideDelay:{value:250, writeOnce:true}, mouseOutHideDelay:{value:750, writeOnce:true}};
    D.extend(AK, D.Plugin.Base, {_rootMenu:null, _activeItem:null, _activeMenu:null, _hasFocus:false, _blockMouseEvent:false, _currentMouseX:0, _movingToSubmenu:false, _showSubmenuTimer:null, _hideSubmenuTimer:null, _hideAllSubmenusTimer:null, _firstItem:null, initializer:function (AR) {
        var AS = this, AT = this.get(c), AQ = [], Y;
        if (AT) {
            AS._rootMenu = AT;
            AT.all("ul:first-child").addClass(U);
            AT.all(i).addClass(AF);
            AQ.push(AT.on("mouseover", AS._onMouseOver, AS));
            AQ.push(AT.on("mouseout", AS._onMouseOut, AS));
            AQ.push(AT.on("mousemove", AS._onMouseMove, AS));
            AQ.push(AT.on(w, AS._toggleSubmenuDisplay, AS));
            AQ.push(D.on("key", AS._toggleSubmenuDisplay, AT, "down:13", AS));
            AQ.push(AT.on(AB, AS._toggleSubmenuDisplay, AS));
            AQ.push(AT.on("keypress", AS._onKeyPress, AS));
            AQ.push(AT.on(AO, AS._onKeyDown, AS));
            Y = AT.get("ownerDocument");
            AQ.push(Y.on(w, AS._onDocMouseDown, AS));
            AQ.push(Y.on("focus", AS._onDocFocus, AS));
            this._eventHandlers = AQ;
            AS._initFocusManager();
        }
    }, destructor:function () {
        var Y = this._eventHandlers;
        if (Y) {
            D.Array.each(Y, function (AQ) {
                AQ.detach();
            });
            this._eventHandlers = null;
        }
        this.get(c).unplug("focusManager");
    }, _isRoot:function (Y) {
        return this._rootMenu.compareTo(Y);
    }, _getTopmostSubmenu:function (AS) {
        var AR = this, Y = M(AS), AQ;
        if (!Y) {
            AQ = AS;
        } else {
            if (AR._isRoot(Y)) {
                AQ = AS;
            } else {
                AQ = AR._getTopmostSubmenu(Y);
            }
        }
        return AQ;
    }, _clearActiveItem:function () {
        var AQ = this, Y = AQ._activeItem;
        if (Y) {
            Y.removeClass(f(Y));
        }
        AQ._activeItem = null;
    }, _setActiveItem:function (AQ) {
        var Y = this;
        if (AQ) {
            Y._clearActiveItem();
            AQ.addClass(f(AQ));
            Y._activeItem = AQ;
        }
    }, _focusItem:function (AR) {
        var AQ = this, Y, AS;
        if (AR && AQ._hasFocus) {
            Y = M(AR);
            AS = p(AR);
            if (Y && !Y.compareTo(AQ._activeMenu)) {
                AQ._activeMenu = Y;
                AQ._initFocusManager();
            }
            AQ._focusManager.focus(AS);
        }
    }, _showMenu:function (AS) {
        var Y = M(AS), AR = AS.get(S), AQ = AR.getXY();
        if (this.get(J)) {
            AS.set(x, false);
        }
        if (q(Y)) {
            AQ[1] = AQ[1] + AR.get(z);
        } else {
            AQ[0] = AQ[0] + AR.get(AC);
        }
        AS.setXY(AQ);
        if (m.ie < 8) {
            if (m.ie === 6 && !AS.hasIFrameShim) {
                AS.appendChild(D.Node.create(AK.SHIM_TEMPLATE));
                AS.hasIFrameShim = true;
            }
            AS.setStyles({height:Q, width:Q});
            AS.setStyles({height:(AS.get(z) + AN), width:(AS.get(AC) + AN)});
        }
        AS.previous().addClass(X);
        AS.removeClass(AF);
    }, _hideMenu:function (AS, AQ) {
        var AR = this, AT = AS.previous(), Y;
        AT.removeClass(X);
        if (AQ) {
            AR._focusItem(AT);
            AR._setActiveItem(AT);
        }
        Y = AS.one((I + A));
        if (Y) {
            Y.removeClass(A);
        }
        AS.setStyles({left:Q, top:Q});
        AS.addClass(AF);
        if (AR.get(J)) {
            AS.set(x, true);
        }
    }, _hideAllSubmenus:function (AQ) {
        var Y = this;
        AQ.all(i).each(D.bind(function (AR) {
            Y._hideMenu(AR);
        }, Y));
    }, _cancelShowSubmenuTimer:function () {
        var AQ = this, Y = AQ._showSubmenuTimer;
        if (Y) {
            Y.cancel();
            AQ._showSubmenuTimer = null;
        }
    }, _cancelHideSubmenuTimer:function () {
        var Y = this, AQ = Y._hideSubmenuTimer;
        if (AQ) {
            AQ.cancel();
            Y._hideSubmenuTimer = null;
        }
    }, _initFocusManager:function () {
        var AS = this, AU = AS._rootMenu, AQ = AS._activeMenu || AU, AT = AS._isRoot(AQ) ? Q : ("#" + AQ.get("id")), Y = AS._focusManager, AR, AV, AW;
        if (q(AQ)) {
            AV = AT + AM + "," + AT + O;
            AR = {next:"down:39", previous:"down:37"};
        } else {
            AV = AT + AM;
            AR = {next:"down:40", previous:"down:38"};
        }
        if (!Y) {
            AU.plug(D.Plugin.NodeFocusManager, {descendants:AV, keys:AR, circular:true});
            Y = AU.focusManager;
            AW = "#" + AU.get("id") + " .yui-menu a," + AG;
            AU.all(AW).set("tabIndex", -1);
            Y.on(h, this._onActiveDescendantChange, Y, this);
            Y.after(h, this._afterActiveDescendantChange, Y, this);
            AS._focusManager = Y;
        } else {
            Y.set(u, -1);
            Y.set(AD, AV);
            Y.set("keys", AR);
        }
    }, _onActiveDescendantChange:function (AQ, Y) {
        if (AQ.src === j && Y._activeMenu && !Y._movingToSubmenu) {
            Y._hideAllSubmenus(Y._activeMenu);
        }
    }, _afterActiveDescendantChange:function (AQ, Y) {
        var AR;
        if (AQ.src === j) {
            AR = B(this.get(AD).item(AQ.newVal), true);
            Y._setActiveItem(AR);
        }
    }, _onDocFocus:function (AT) {
        var AS = this, Y = AS._activeItem, AR = AT.target, AQ;
        if (AS._rootMenu.contains(AR)) {
            if (AS._hasFocus) {
                AQ = M(AR);
                if (!AS._activeMenu.compareTo(AQ)) {
                    AS._activeMenu = AQ;
                    AS._initFocusManager();
                    AS._focusManager.set(u, AR);
                    AS._setActiveItem(B(AR, true));
                }
            } else {
                AS._hasFocus = true;
                Y = B(AR, true);
                if (Y) {
                    AS._setActiveItem(Y);
                }
            }
        } else {
            AS._clearActiveItem();
            AS._cancelShowSubmenuTimer();
            AS._hideAllSubmenus(AS._rootMenu);
            AS._activeMenu = AS._rootMenu;
            AS._initFocusManager();
            AS._focusManager.set(u, 0);
            AS._hasFocus = false;
        }
    }, _onMenuMouseOver:function (AS, AR) {
        var AQ = this, Y = AQ._hideAllSubmenusTimer;
        if (Y) {
            Y.cancel();
            AQ._hideAllSubmenusTimer = null;
        }
        AQ._cancelHideSubmenuTimer();
        if (AS && !AS.compareTo(AQ._activeMenu)) {
            AQ._activeMenu = AS;
            if (AQ._hasFocus) {
                AQ._initFocusManager();
            }
        }
        if (AQ._movingToSubmenu && q(AS)) {
            AQ._movingToSubmenu = false;
        }
    }, _hideAndFocusLabel:function () {
        var AR = this, AQ = AR._activeMenu, Y;
        AR._hideAllSubmenus(AR._rootMenu);
        if (AQ) {
            Y = AR._getTopmostSubmenu(AQ);
            AR._focusItem(Y.previous());
        }
    }, _onMenuMouseOut:function (AW, AU) {
        var AT = this, AR = AT._activeMenu, AV = AU.relatedTarget, Y = AT._activeItem, AS, AQ;
        if (AR && !AR.contains(AV)) {
            AS = M(AR);
            if (AS && !AS.contains(AV)) {
                if (AT.get(T) > 0) {
                    AT._cancelShowSubmenuTimer();
                    AT._hideAllSubmenusTimer = t(AT.get(T), AT, AT._hideAndFocusLabel);
                }
            } else {
                if (Y) {
                    AQ = M(Y);
                    if (!AT._isRoot(AQ)) {
                        AT._focusItem(AQ.previous());
                    }
                }
            }
        }
    }, _onMenuLabelMouseOver:function (AT, AV) {
        var AU = this, AS = AU._activeMenu, Y = AU._isRoot(AS), AR = (AU.get(v) && Y || !Y), AQ;
        AU._focusItem(AT);
        AU._setActiveItem(AT);
        if (AR && !AU._movingToSubmenu) {
            AU._cancelHideSubmenuTimer();
            AU._cancelShowSubmenuTimer();
            if (!n(AT)) {
                AQ = AT.next();
                if (AQ) {
                    AU._hideAllSubmenus(AS);
                    AU._showSubmenuTimer = t(AU.get("submenuShowDelay"), AU, AU._showMenu, AQ);
                }
            }
        }
    }, _onMenuLabelMouseOut:function (AS, AU) {
        var AT = this, Y = AT._isRoot(AT._activeMenu), AR = (AT.get(v) && Y || !Y), AV = AU.relatedTarget, AQ = AS.next();
        AT._clearActiveItem();
        if (AR) {
            if (AT._movingToSubmenu && !AT._showSubmenuTimer && AQ) {
                AT._hideSubmenuTimer = t(AT.get("submenuHideDelay"), AT, AT._hideMenu, AQ);
            } else {
                if (!AT._movingToSubmenu && AQ && !AQ.contains(AV) && !AV.compareTo(AQ)) {
                    AT._cancelShowSubmenuTimer();
                    AT._hideMenu(AQ);
                }
            }
        }
    }, _onMenuItemMouseOver:function (AS, AU) {
        var AT = this, AR = AT._activeMenu, Y = AT._isRoot(AR), AQ = (AT.get(v) && Y || !Y);
        AT._focusItem(AS);
        AT._setActiveItem(AS);
        if (AQ && !AT._movingToSubmenu) {
            AT._hideAllSubmenus(AR);
        }
    }, _onMenuItemMouseOut:function (Y, AQ) {
        this._clearActiveItem();
    }, _onVerticalMenuKeyDown:function (Y) {
        var AQ = this, AU = AQ._activeMenu, AZ = AQ._rootMenu, AR = Y.target, AT = false, AY = Y.keyCode, AW, AS, AV, AX;
        switch (AY) {
            case 37:
                AS = M(AU);
                if (AS && q(AS)) {
                    AQ._hideMenu(AU);
                    AV = L(AU.get(S));
                    AX = B(AV);
                    if (AX) {
                        if (s(AX)) {
                            AW = AX.next();
                            if (AW) {
                                AQ._showMenu(AW);
                                AQ._focusItem(C(AW));
                                AQ._setActiveItem(C(AW));
                            } else {
                                AQ._focusItem(AX);
                                AQ._setActiveItem(AX);
                            }
                        } else {
                            AQ._focusItem(AX);
                            AQ._setActiveItem(AX);
                        }
                    }
                } else {
                    if (!AQ._isRoot(AU)) {
                        AQ._hideMenu(AU, true);
                    }
                }
                AT = true;
                break;
            case 39:
                if (s(AR)) {
                    AW = AR.next();
                    if (AW) {
                        AQ._showMenu(AW);
                        AQ._focusItem(C(AW));
                        AQ._setActiveItem(C(AW));
                    }
                } else {
                    if (q(AZ)) {
                        AW = AQ._getTopmostSubmenu(AU);
                        AV = b(AW.get(S));
                        AX = B(AV);
                        AQ._hideAllSubmenus(AZ);
                        if (AX) {
                            if (s(AX)) {
                                AW = AX.next();
                                if (AW) {
                                    AQ._showMenu(AW);
                                    AQ._focusItem(C(AW));
                                    AQ._setActiveItem(C(AW));
                                } else {
                                    AQ._focusItem(AX);
                                    AQ._setActiveItem(AX);
                                }
                            } else {
                                AQ._focusItem(AX);
                                AQ._setActiveItem(AX);
                            }
                        }
                    }
                }
                AT = true;
                break;
        }
        if (AT) {
            Y.preventDefault();
        }
    }, _onHorizontalMenuKeyDown:function (AV) {
        var AU = this, AS = AU._activeMenu, AQ = AV.target, Y = B(AQ, true), AT = false, AW = AV.keyCode, AR;
        if (AW === 40) {
            AU._hideAllSubmenus(AS);
            if (s(Y)) {
                AR = Y.next();
                if (AR) {
                    AU._showMenu(AR);
                    AU._focusItem(C(AR));
                    AU._setActiveItem(C(AR));
                }
                AT = true;
            }
        }
        if (AT) {
            AV.preventDefault();
        }
    }, _onMouseMove:function (AQ) {
        var Y = this;
        t(10, Y, function () {
            Y._currentMouseX = AQ.pageX;
        });
    }, _onMouseOver:function (AT) {
        var AS = this, AQ, Y, AV, AR, AU;
        if (AS._blockMouseEvent) {
            AS._blockMouseEvent = false;
        } else {
            AQ = AT.target;
            Y = W(AQ, true);
            AV = o(AQ, true);
            AU = AE(AQ, true);
            if (e(Y, AQ)) {
                AS._onMenuMouseOver(Y, AT);
                Y[r] = true;
                Y[E] = false;
                AR = M(Y);
                if (AR) {
                    AR[E] = true;
                    AR[r] = false;
                }
            }
            if (e(AV, AQ)) {
                AS._onMenuLabelMouseOver(AV, AT);
                AV[r] = true;
                AV[E] = false;
            }
            if (e(AU, AQ)) {
                AS._onMenuItemMouseOver(AU, AT);
                AU[r] = true;
                AU[E] = false;
            }
        }
    }, _onMouseOut:function (AQ) {
        var AR = this, AT = AR._activeMenu, AY = false, AS, AU, AW, Y, AV, AX;
        AR._movingToSubmenu = (AT && !q(AT) && ((AQ.pageX - 5) > AR._currentMouseX));
        AS = AQ.target;
        AU = AQ.relatedTarget;
        AW = W(AS, true);
        Y = o(AS, true);
        AX = AE(AS, true);
        if (H(Y, AU)) {
            AR._onMenuLabelMouseOut(Y, AQ);
            Y[E] = true;
            Y[r] = false;
        }
        if (H(AX, AU)) {
            AR._onMenuItemMouseOut(AX, AQ);
            AX[E] = true;
            AX[r] = false;
        }
        if (Y) {
            AV = Y.next();
            if (AV && (AU.compareTo(AV) || AV.contains(AU))) {
                AY = true;
            }
        }
        if (H(AW, AU) || AY) {
            AR._onMenuMouseOut(AW, AQ);
            AW[E] = true;
            AW[r] = false;
        }
    }, _toggleSubmenuDisplay:function (AR) {
        var AS = this, AT = AR.target, AQ = o(AT, true), Y = AR.type, AX, AW, AV, AY, AZ, AU;
        if (AQ) {
            AX = F(AT) ? AT : AT.ancestor(F);
            if (AX) {
                AV = AX.getAttribute("href", 2);
                AY = AV.indexOf("#");
                AZ = AV.length;
                if (AY === 0 && AZ > 1) {
                    AU = AV.substr(1, AZ);
                    AW = AQ.next();
                    if (AW && (AW.get(g) === AU)) {
                        if (Y === w || Y === AO) {
                            if ((m.opera || m.gecko || m.ie) && Y === AO && !AS._preventClickHandle) {
                                AS._preventClickHandle = AS._rootMenu.on("click", function (Aa) {
                                    Aa.preventDefault();
                                    AS._preventClickHandle.detach();
                                    AS._preventClickHandle = null;
                                });
                            }
                            if (Y == w) {
                                AR.preventDefault();
                                AR.stopImmediatePropagation();
                                AS._hasFocus = true;
                            }
                            if (AS._isRoot(M(AT))) {
                                if (n(AQ)) {
                                    AS._hideMenu(AW);
                                    AS._focusItem(AQ);
                                    AS._setActiveItem(AQ);
                                } else {
                                    AS._hideAllSubmenus(AS._rootMenu);
                                    AS._showMenu(AW);
                                    AS._focusItem(C(AW));
                                    AS._setActiveItem(C(AW));
                                }
                            } else {
                                if (AS._activeItem == AQ) {
                                    AS._showMenu(AW);
                                    AS._focusItem(C(AW));
                                    AS._setActiveItem(C(AW));
                                } else {
                                    if (!AQ._clickHandle) {
                                        AQ._clickHandle = AQ.on("click", function () {
                                            AS._hideAllSubmenus(AS._rootMenu);
                                            AS._hasFocus = false;
                                            AS._clearActiveItem();
                                            AQ._clickHandle.detach();
                                            AQ._clickHandle = null;
                                        });
                                    }
                                }
                            }
                        }
                        if (Y === AB) {
                            AR.preventDefault();
                        }
                    }
                }
            }
        }
    }, _onKeyPress:function (Y) {
        switch (Y.keyCode) {
            case 37:
            case 38:
            case 39:
            case 40:
                Y.preventDefault();
                break;
        }
    }, _onKeyDown:function (AU) {
        var AT = this, Y = AT._activeItem, AQ = AU.target, AS = M(AQ), AR;
        if (AS) {
            AT._activeMenu = AS;
            if (q(AS)) {
                AT._onHorizontalMenuKeyDown(AU);
            } else {
                AT._onVerticalMenuKeyDown(AU);
            }
            if (AU.keyCode === 27) {
                if (!AT._isRoot(AS)) {
                    if (m.opera) {
                        t(0, AT, function () {
                            AT._hideMenu(AS, true);
                        });
                    } else {
                        AT._hideMenu(AS, true);
                    }
                    AU.stopPropagation();
                    AT._blockMouseEvent = m.gecko ? true : false;
                } else {
                    if (Y) {
                        if (s(Y) && n(Y)) {
                            AR = Y.next();
                            if (AR) {
                                AT._hideMenu(AR);
                            }
                        } else {
                            AT._focusManager.blur();
                            AT._clearActiveItem();
                            AT._hasFocus = false;
                        }
                    }
                }
            }
        }
    }, _onDocMouseDown:function (AS) {
        var AR = this, AQ = AR._rootMenu, Y = AS.target;
        if (!(AQ.compareTo(Y) || AQ.contains(Y))) {
            AR._hideAllSubmenus(AQ);
            if (m.webkit) {
                AR._hasFocus = false;
                AR._clearActiveItem();
            }
        }
    }});
    D.namespace("Plugin");
    D.Plugin.NodeMenuNav = AK;
}, "3.0.0", {requires:["node", "classnamemanager", "node-focusmanager"]});