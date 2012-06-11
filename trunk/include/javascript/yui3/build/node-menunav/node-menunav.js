/*
 Copyright (c) 2009, Yahoo! Inc. All rights reserved.
 Code licensed under the BSD License:
 http://developer.yahoo.net/yui/license.txt
 version: 3.0.0
 build: 1549
 */
YUI.add('node-menunav', function (Y) {
    var UA = Y.UA, later = Y.later, getClassName = Y.ClassNameManager.getClassName, MENU = "menu", MENUITEM = "menuitem", HIDDEN = "hidden", PARENT_NODE = "parentNode", CHILDREN = "children", OFFSET_HEIGHT = "offsetHeight", OFFSET_WIDTH = "offsetWidth", PX = "px", ID = "id", PERIOD = ".", HANDLED_MOUSEOUT = "handledMouseOut", HANDLED_MOUSEOVER = "handledMouseOver", ACTIVE = "active", LABEL = "label", LOWERCASE_A = "a", MOUSEDOWN = "mousedown", KEYDOWN = "keydown", CLICK = "click", EMPTY_STRING = "", FIRST_OF_TYPE = "first-of-type", ROLE = "role", PRESENTATION = "presentation", DESCENDANTS = "descendants", UI = "UI", ACTIVE_DESCENDANT = "activeDescendant", USE_ARIA = "useARIA", ARIA_HIDDEN = "aria-hidden", CONTENT = "content", HOST = "host", ACTIVE_DESCENDANT_CHANGE = ACTIVE_DESCENDANT + "Change", STANDARD_QUERY = ">.yui-menu-content>ul>li>a", EXTENDED_QUERY = ">.yui-menu-content>ul>li>.yui-menu-label>a:first-child", AUTO_SUBMENU_DISPLAY = "autoSubmenuDisplay", MOUSEOUT_HIDE_DELAY = "mouseOutHideDelay", CSS_MENU = getClassName(MENU), CSS_MENU_HIDDEN = getClassName(MENU, HIDDEN), CSS_MENU_HORIZONTAL = getClassName(MENU, "horizontal"), CSS_MENU_LABEL = getClassName(MENU, LABEL), CSS_MENU_LABEL_ACTIVE = getClassName(MENU, LABEL, ACTIVE), CSS_MENU_LABEL_MENUVISIBLE = getClassName(MENU, LABEL, (MENU + "visible")), CSS_MENUITEM = getClassName(MENUITEM), CSS_MENUITEM_ACTIVE = getClassName(MENUITEM, ACTIVE), MENU_SELECTOR = PERIOD + CSS_MENU, MENU_TOGGLE_SELECTOR = (PERIOD + getClassName(MENU, "toggle"));
    var getPreviousSibling = function (node) {
        var oPrevious = node.previous(), oChildren;
        if (!oPrevious) {
            oChildren = node.get(PARENT_NODE).get(CHILDREN);
            oPrevious = oChildren.item(oChildren.size() - 1);
        }
        return oPrevious;
    };
    var getNextSibling = function (node) {
        var oNext = node.next();
        if (!oNext) {
            oNext = node.get(PARENT_NODE).get(CHILDREN).item(0);
        }
        return oNext;
    };
    var isAnchor = function (node) {
        var bReturnVal = false;
        if (node) {
            bReturnVal = node.get("nodeName").toLowerCase() === LOWERCASE_A;
        }
        return bReturnVal;
    };
    var isMenuItem = function (node) {
        return node.hasClass(CSS_MENUITEM);
    };
    var isMenuLabel = function (node) {
        return node.hasClass(CSS_MENU_LABEL);
    };
    var isHorizontalMenu = function (menu) {
        return menu.hasClass(CSS_MENU_HORIZONTAL);
    };
    var hasVisibleSubmenu = function (menuLabel) {
        return menuLabel.hasClass(CSS_MENU_LABEL_MENUVISIBLE);
    };
    var getItemAnchor = function (node) {
        return isAnchor(node) ? node : node.one(LOWERCASE_A);
    };
    var getNodeWithClass = function (node, className, searchAncestors) {
        var oItem;
        if (node) {
            if (node.hasClass(className)) {
                oItem = node;
            }
            if (!oItem && searchAncestors) {
                oItem = node.ancestor((PERIOD + className));
            }
        }
        return oItem;
    };
    var getParentMenu = function (node) {
        return node.ancestor(MENU_SELECTOR);
    };
    var getMenu = function (node, searchAncestors) {
        return getNodeWithClass(node, CSS_MENU, searchAncestors);
    };
    var getMenuItem = function (node, searchAncestors) {
        var oItem;
        if (node) {
            oItem = getNodeWithClass(node, CSS_MENUITEM, searchAncestors);
        }
        return oItem;
    };
    var getMenuLabel = function (node, searchAncestors) {
        var oItem;
        if (node) {
            if (searchAncestors) {
                oItem = getNodeWithClass(node, CSS_MENU_LABEL, searchAncestors);
            }
            else {
                oItem = getNodeWithClass(node, CSS_MENU_LABEL) || node.one((PERIOD + CSS_MENU_LABEL));
            }
        }
        return oItem;
    };
    var getItem = function (node, searchAncestors) {
        var oItem;
        if (node) {
            oItem = getMenuItem(node, searchAncestors) || getMenuLabel(node, searchAncestors);
        }
        return oItem;
    };
    var getFirstItem = function (menu) {
        return getItem(menu.one("li"));
    };
    var getActiveClass = function (node) {
        return isMenuItem(node) ? CSS_MENUITEM_ACTIVE : CSS_MENU_LABEL_ACTIVE;
    };
    var handleMouseOverForNode = function (node, target) {
        return node && !node[HANDLED_MOUSEOVER] && (node.compareTo(target) || node.contains(target));
    };
    var handleMouseOutForNode = function (node, relatedTarget) {
        return node && !node[HANDLED_MOUSEOUT] && (!node.compareTo(relatedTarget) && !node.contains(relatedTarget));
    };
    var NodeMenuNav = function () {
        NodeMenuNav.superclass.constructor.apply(this, arguments);
    };
    NodeMenuNav.NAME = "nodeMenuNav";
    NodeMenuNav.NS = "menuNav";
    NodeMenuNav.SHIM_TEMPLATE_TITLE = "Menu Stacking Shim";
    NodeMenuNav.SHIM_TEMPLATE = '<iframe frameborder="0" tabindex="-1" class="' +
        getClassName("shim") + '" title="' + NodeMenuNav.SHIM_TEMPLATE_TITLE + '" src="javascript:false;"></iframe>';
    NodeMenuNav.ATTRS = {useARIA:{value:true, writeOnce:true, lazyAdd:false, setter:function (value) {
        var oMenu = this.get(HOST), oMenuLabel, oMenuToggle, oSubmenu, sID;
        if (value) {
            oMenu.set(ROLE, MENU);
            oMenu.all("ul,li,." + getClassName(MENU, CONTENT)).set(ROLE, PRESENTATION);
            oMenu.all((PERIOD + getClassName(MENUITEM, CONTENT))).set(ROLE, MENUITEM);
            oMenu.all((PERIOD + CSS_MENU_LABEL)).each(function (node) {
                oMenuLabel = node;
                oMenuToggle = node.one(MENU_TOGGLE_SELECTOR);
                if (oMenuToggle) {
                    oMenuToggle.set(ROLE, PRESENTATION);
                    oMenuLabel = oMenuToggle.previous();
                }
                oMenuLabel.set(ROLE, MENUITEM);
                oMenuLabel.set("aria-haspopup", true);
                oSubmenu = node.next();
                if (oSubmenu) {
                    oSubmenu.set(ROLE, MENU);
                    oMenuLabel = oSubmenu.previous();
                    oMenuToggle = oMenuLabel.one(MENU_TOGGLE_SELECTOR);
                    if (oMenuToggle) {
                        oMenuLabel = oMenuToggle;
                    }
                    sID = Y.stamp(oMenuLabel);
                    if (!oMenuLabel.get(ID)) {
                        oMenuLabel.set(ID, sID);
                    }
                    oSubmenu.set("aria-labelledby", sID);
                    oSubmenu.set(ARIA_HIDDEN, true);
                }
            });
        }
    }}, autoSubmenuDisplay:{value:true, writeOnce:true}, submenuShowDelay:{value:250, writeOnce:true}, submenuHideDelay:{value:250, writeOnce:true}, mouseOutHideDelay:{value:750, writeOnce:true}};
    Y.extend(NodeMenuNav, Y.Plugin.Base, {_rootMenu:null, _activeItem:null, _activeMenu:null, _hasFocus:false, _blockMouseEvent:false, _currentMouseX:0, _movingToSubmenu:false, _showSubmenuTimer:null, _hideSubmenuTimer:null, _hideAllSubmenusTimer:null, _firstItem:null, initializer:function (config) {
        var menuNav = this, oRootMenu = this.get(HOST), aHandlers = [], oDoc;
        if (oRootMenu) {
            menuNav._rootMenu = oRootMenu;
            oRootMenu.all("ul:first-child").addClass(FIRST_OF_TYPE);
            oRootMenu.all(MENU_SELECTOR).addClass(CSS_MENU_HIDDEN);
            aHandlers.push(oRootMenu.on("mouseover", menuNav._onMouseOver, menuNav));
            aHandlers.push(oRootMenu.on("mouseout", menuNav._onMouseOut, menuNav));
            aHandlers.push(oRootMenu.on("mousemove", menuNav._onMouseMove, menuNav));
            aHandlers.push(oRootMenu.on(MOUSEDOWN, menuNav._toggleSubmenuDisplay, menuNav));
            aHandlers.push(Y.on("key", menuNav._toggleSubmenuDisplay, oRootMenu, "down:13", menuNav));
            aHandlers.push(oRootMenu.on(CLICK, menuNav._toggleSubmenuDisplay, menuNav));
            aHandlers.push(oRootMenu.on("keypress", menuNav._onKeyPress, menuNav));
            aHandlers.push(oRootMenu.on(KEYDOWN, menuNav._onKeyDown, menuNav));
            oDoc = oRootMenu.get("ownerDocument");
            aHandlers.push(oDoc.on(MOUSEDOWN, menuNav._onDocMouseDown, menuNav));
            aHandlers.push(oDoc.on("focus", menuNav._onDocFocus, menuNav));
            this._eventHandlers = aHandlers;
            menuNav._initFocusManager();
        }
    }, destructor:function () {
        var aHandlers = this._eventHandlers;
        if (aHandlers) {
            Y.Array.each(aHandlers, function (handle) {
                handle.detach();
            });
            this._eventHandlers = null;
        }
        this.get(HOST).unplug("focusManager");
    }, _isRoot:function (menu) {
        return this._rootMenu.compareTo(menu);
    }, _getTopmostSubmenu:function (menu) {
        var menuNav = this, oMenu = getParentMenu(menu), returnVal;
        if (!oMenu) {
            returnVal = menu;
        }
        else if (menuNav._isRoot(oMenu)) {
            returnVal = menu;
        }
        else {
            returnVal = menuNav._getTopmostSubmenu(oMenu);
        }
        return returnVal;
    }, _clearActiveItem:function () {
        var menuNav = this, oActiveItem = menuNav._activeItem;
        if (oActiveItem) {
            oActiveItem.removeClass(getActiveClass(oActiveItem));
        }
        menuNav._activeItem = null;
    }, _setActiveItem:function (item) {
        var menuNav = this;
        if (item) {
            menuNav._clearActiveItem();
            item.addClass(getActiveClass(item));
            menuNav._activeItem = item;
        }
    }, _focusItem:function (item) {
        var menuNav = this, oMenu, oItem;
        if (item && menuNav._hasFocus) {
            oMenu = getParentMenu(item);
            oItem = getItemAnchor(item);
            if (oMenu && !oMenu.compareTo(menuNav._activeMenu)) {
                menuNav._activeMenu = oMenu;
                menuNav._initFocusManager();
            }
            menuNav._focusManager.focus(oItem);
        }
    }, _showMenu:function (menu) {
        var oParentMenu = getParentMenu(menu), oLI = menu.get(PARENT_NODE), aXY = oLI.getXY();
        if (this.get(USE_ARIA)) {
            menu.set(ARIA_HIDDEN, false);
        }
        if (isHorizontalMenu(oParentMenu)) {
            aXY[1] = aXY[1] + oLI.get(OFFSET_HEIGHT);
        }
        else {
            aXY[0] = aXY[0] + oLI.get(OFFSET_WIDTH);
        }
        menu.setXY(aXY);
        if (UA.ie < 8) {
            if (UA.ie === 6 && !menu.hasIFrameShim) {
                menu.appendChild(Y.Node.create(NodeMenuNav.SHIM_TEMPLATE));
                menu.hasIFrameShim = true;
            }
            menu.setStyles({height:EMPTY_STRING, width:EMPTY_STRING});
            menu.setStyles({height:(menu.get(OFFSET_HEIGHT) + PX), width:(menu.get(OFFSET_WIDTH) + PX)});
        }
        menu.previous().addClass(CSS_MENU_LABEL_MENUVISIBLE);
        menu.removeClass(CSS_MENU_HIDDEN);
    }, _hideMenu:function (menu, activateAndFocusLabel) {
        var menuNav = this, oLabel = menu.previous(), oActiveItem;
        oLabel.removeClass(CSS_MENU_LABEL_MENUVISIBLE);
        if (activateAndFocusLabel) {
            menuNav._focusItem(oLabel);
            menuNav._setActiveItem(oLabel);
        }
        oActiveItem = menu.one((PERIOD + CSS_MENUITEM_ACTIVE));
        if (oActiveItem) {
            oActiveItem.removeClass(CSS_MENUITEM_ACTIVE);
        }
        menu.setStyles({left:EMPTY_STRING, top:EMPTY_STRING});
        menu.addClass(CSS_MENU_HIDDEN);
        if (menuNav.get(USE_ARIA)) {
            menu.set(ARIA_HIDDEN, true);
        }
    }, _hideAllSubmenus:function (menu) {
        var menuNav = this;
        menu.all(MENU_SELECTOR).each(Y.bind(function (submenuNode) {
            menuNav._hideMenu(submenuNode);
        }, menuNav));
    }, _cancelShowSubmenuTimer:function () {
        var menuNav = this, oShowSubmenuTimer = menuNav._showSubmenuTimer;
        if (oShowSubmenuTimer) {
            oShowSubmenuTimer.cancel();
            menuNav._showSubmenuTimer = null;
        }
    }, _cancelHideSubmenuTimer:function () {
        var menuNav = this, oHideSubmenuTimer = menuNav._hideSubmenuTimer;
        if (oHideSubmenuTimer) {
            oHideSubmenuTimer.cancel();
            menuNav._hideSubmenuTimer = null;
        }
    }, _initFocusManager:function () {
        var menuNav = this, oRootMenu = menuNav._rootMenu, oMenu = menuNav._activeMenu || oRootMenu, sSelectorBase = menuNav._isRoot(oMenu) ? EMPTY_STRING : ("#" + oMenu.get("id")), oFocusManager = menuNav._focusManager, sKeysVal, sDescendantSelector, sQuery;
        if (isHorizontalMenu(oMenu)) {
            sDescendantSelector = sSelectorBase + STANDARD_QUERY + "," +
                sSelectorBase + EXTENDED_QUERY;
            sKeysVal = {next:"down:39", previous:"down:37"};
        }
        else {
            sDescendantSelector = sSelectorBase + STANDARD_QUERY;
            sKeysVal = {next:"down:40", previous:"down:38"};
        }
        if (!oFocusManager) {
            oRootMenu.plug(Y.Plugin.NodeFocusManager, {descendants:sDescendantSelector, keys:sKeysVal, circular:true});
            oFocusManager = oRootMenu.focusManager;
            sQuery = "#" + oRootMenu.get("id") + " .yui-menu a," +
                MENU_TOGGLE_SELECTOR;
            oRootMenu.all(sQuery).set("tabIndex", -1);
            oFocusManager.on(ACTIVE_DESCENDANT_CHANGE, this._onActiveDescendantChange, oFocusManager, this);
            oFocusManager.after(ACTIVE_DESCENDANT_CHANGE, this._afterActiveDescendantChange, oFocusManager, this);
            menuNav._focusManager = oFocusManager;
        }
        else {
            oFocusManager.set(ACTIVE_DESCENDANT, -1);
            oFocusManager.set(DESCENDANTS, sDescendantSelector);
            oFocusManager.set("keys", sKeysVal);
        }
    }, _onActiveDescendantChange:function (event, menuNav) {
        if (event.src === UI && menuNav._activeMenu && !menuNav._movingToSubmenu) {
            menuNav._hideAllSubmenus(menuNav._activeMenu);
        }
    }, _afterActiveDescendantChange:function (event, menuNav) {
        var oItem;
        if (event.src === UI) {
            oItem = getItem(this.get(DESCENDANTS).item(event.newVal), true);
            menuNav._setActiveItem(oItem);
        }
    }, _onDocFocus:function (event) {
        var menuNav = this, oActiveItem = menuNav._activeItem, oTarget = event.target, oMenu;
        if (menuNav._rootMenu.contains(oTarget)) {
            if (menuNav._hasFocus) {
                oMenu = getParentMenu(oTarget);
                if (!menuNav._activeMenu.compareTo(oMenu)) {
                    menuNav._activeMenu = oMenu;
                    menuNav._initFocusManager();
                    menuNav._focusManager.set(ACTIVE_DESCENDANT, oTarget);
                    menuNav._setActiveItem(getItem(oTarget, true));
                }
            }
            else {
                menuNav._hasFocus = true;
                oActiveItem = getItem(oTarget, true);
                if (oActiveItem) {
                    menuNav._setActiveItem(oActiveItem);
                }
            }
        }
        else {
            menuNav._clearActiveItem();
            menuNav._cancelShowSubmenuTimer();
            menuNav._hideAllSubmenus(menuNav._rootMenu);
            menuNav._activeMenu = menuNav._rootMenu;
            menuNav._initFocusManager();
            menuNav._focusManager.set(ACTIVE_DESCENDANT, 0);
            menuNav._hasFocus = false;
        }
    }, _onMenuMouseOver:function (menu, event) {
        var menuNav = this, oHideAllSubmenusTimer = menuNav._hideAllSubmenusTimer;
        if (oHideAllSubmenusTimer) {
            oHideAllSubmenusTimer.cancel();
            menuNav._hideAllSubmenusTimer = null;
        }
        menuNav._cancelHideSubmenuTimer();
        if (menu && !menu.compareTo(menuNav._activeMenu)) {
            menuNav._activeMenu = menu;
            if (menuNav._hasFocus) {
                menuNav._initFocusManager();
            }
        }
        if (menuNav._movingToSubmenu && isHorizontalMenu(menu)) {
            menuNav._movingToSubmenu = false;
        }
    }, _hideAndFocusLabel:function () {
        var menuNav = this, oActiveMenu = menuNav._activeMenu, oSubmenu;
        menuNav._hideAllSubmenus(menuNav._rootMenu);
        if (oActiveMenu) {
            oSubmenu = menuNav._getTopmostSubmenu(oActiveMenu);
            menuNav._focusItem(oSubmenu.previous());
        }
    }, _onMenuMouseOut:function (menu, event) {
        var menuNav = this, oActiveMenu = menuNav._activeMenu, oRelatedTarget = event.relatedTarget, oActiveItem = menuNav._activeItem, oParentMenu, oMenu;
        if (oActiveMenu && !oActiveMenu.contains(oRelatedTarget)) {
            oParentMenu = getParentMenu(oActiveMenu);
            if (oParentMenu && !oParentMenu.contains(oRelatedTarget)) {
                if (menuNav.get(MOUSEOUT_HIDE_DELAY) > 0) {
                    menuNav._cancelShowSubmenuTimer();
                    menuNav._hideAllSubmenusTimer = later(menuNav.get(MOUSEOUT_HIDE_DELAY), menuNav, menuNav._hideAndFocusLabel);
                }
            }
            else {
                if (oActiveItem) {
                    oMenu = getParentMenu(oActiveItem);
                    if (!menuNav._isRoot(oMenu)) {
                        menuNav._focusItem(oMenu.previous());
                    }
                }
            }
        }
    }, _onMenuLabelMouseOver:function (menuLabel, event) {
        var menuNav = this, oActiveMenu = menuNav._activeMenu, bIsRoot = menuNav._isRoot(oActiveMenu), bUseAutoSubmenuDisplay = (menuNav.get(AUTO_SUBMENU_DISPLAY) && bIsRoot || !bIsRoot), oSubmenu;
        menuNav._focusItem(menuLabel);
        menuNav._setActiveItem(menuLabel);
        if (bUseAutoSubmenuDisplay && !menuNav._movingToSubmenu) {
            menuNav._cancelHideSubmenuTimer();
            menuNav._cancelShowSubmenuTimer();
            if (!hasVisibleSubmenu(menuLabel)) {
                oSubmenu = menuLabel.next();
                if (oSubmenu) {
                    menuNav._hideAllSubmenus(oActiveMenu);
                    menuNav._showSubmenuTimer = later(menuNav.get("submenuShowDelay"), menuNav, menuNav._showMenu, oSubmenu);
                }
            }
        }
    }, _onMenuLabelMouseOut:function (menuLabel, event) {
        var menuNav = this, bIsRoot = menuNav._isRoot(menuNav._activeMenu), bUseAutoSubmenuDisplay = (menuNav.get(AUTO_SUBMENU_DISPLAY) && bIsRoot || !bIsRoot), oRelatedTarget = event.relatedTarget, oSubmenu = menuLabel.next();
        menuNav._clearActiveItem();
        if (bUseAutoSubmenuDisplay) {
            if (menuNav._movingToSubmenu && !menuNav._showSubmenuTimer && oSubmenu) {
                menuNav._hideSubmenuTimer = later(menuNav.get("submenuHideDelay"), menuNav, menuNav._hideMenu, oSubmenu);
            }
            else if (!menuNav._movingToSubmenu && oSubmenu && !oSubmenu.contains(oRelatedTarget) && !oRelatedTarget.compareTo(oSubmenu)) {
                menuNav._cancelShowSubmenuTimer();
                menuNav._hideMenu(oSubmenu);
            }
        }
    }, _onMenuItemMouseOver:function (menuItem, event) {
        var menuNav = this, oActiveMenu = menuNav._activeMenu, bIsRoot = menuNav._isRoot(oActiveMenu), bUseAutoSubmenuDisplay = (menuNav.get(AUTO_SUBMENU_DISPLAY) && bIsRoot || !bIsRoot);
        menuNav._focusItem(menuItem);
        menuNav._setActiveItem(menuItem);
        if (bUseAutoSubmenuDisplay && !menuNav._movingToSubmenu) {
            menuNav._hideAllSubmenus(oActiveMenu);
        }
    }, _onMenuItemMouseOut:function (menuItem, event) {
        this._clearActiveItem();
    }, _onVerticalMenuKeyDown:function (event) {
        var menuNav = this, oActiveMenu = menuNav._activeMenu, oRootMenu = menuNav._rootMenu, oTarget = event.target, bPreventDefault = false, nKeyCode = event.keyCode, oSubmenu, oParentMenu, oLI, oItem;
        switch (nKeyCode) {
            case 37:
                oParentMenu = getParentMenu(oActiveMenu);
                if (oParentMenu && isHorizontalMenu(oParentMenu)) {
                    menuNav._hideMenu(oActiveMenu);
                    oLI = getPreviousSibling(oActiveMenu.get(PARENT_NODE));
                    oItem = getItem(oLI);
                    if (oItem) {
                        if (isMenuLabel(oItem)) {
                            oSubmenu = oItem.next();
                            if (oSubmenu) {
                                menuNav._showMenu(oSubmenu);
                                menuNav._focusItem(getFirstItem(oSubmenu));
                                menuNav._setActiveItem(getFirstItem(oSubmenu));
                            }
                            else {
                                menuNav._focusItem(oItem);
                                menuNav._setActiveItem(oItem);
                            }
                        }
                        else {
                            menuNav._focusItem(oItem);
                            menuNav._setActiveItem(oItem);
                        }
                    }
                }
                else if (!menuNav._isRoot(oActiveMenu)) {
                    menuNav._hideMenu(oActiveMenu, true);
                }
                bPreventDefault = true;
                break;
            case 39:
                if (isMenuLabel(oTarget)) {
                    oSubmenu = oTarget.next();
                    if (oSubmenu) {
                        menuNav._showMenu(oSubmenu);
                        menuNav._focusItem(getFirstItem(oSubmenu));
                        menuNav._setActiveItem(getFirstItem(oSubmenu));
                    }
                }
                else if (isHorizontalMenu(oRootMenu)) {
                    oSubmenu = menuNav._getTopmostSubmenu(oActiveMenu);
                    oLI = getNextSibling(oSubmenu.get(PARENT_NODE));
                    oItem = getItem(oLI);
                    menuNav._hideAllSubmenus(oRootMenu);
                    if (oItem) {
                        if (isMenuLabel(oItem)) {
                            oSubmenu = oItem.next();
                            if (oSubmenu) {
                                menuNav._showMenu(oSubmenu);
                                menuNav._focusItem(getFirstItem(oSubmenu));
                                menuNav._setActiveItem(getFirstItem(oSubmenu));
                            }
                            else {
                                menuNav._focusItem(oItem);
                                menuNav._setActiveItem(oItem);
                            }
                        }
                        else {
                            menuNav._focusItem(oItem);
                            menuNav._setActiveItem(oItem);
                        }
                    }
                }
                bPreventDefault = true;
                break;
        }
        if (bPreventDefault) {
            event.preventDefault();
        }
    }, _onHorizontalMenuKeyDown:function (event) {
        var menuNav = this, oActiveMenu = menuNav._activeMenu, oTarget = event.target, oFocusedItem = getItem(oTarget, true), bPreventDefault = false, nKeyCode = event.keyCode, oSubmenu;
        if (nKeyCode === 40) {
            menuNav._hideAllSubmenus(oActiveMenu);
            if (isMenuLabel(oFocusedItem)) {
                oSubmenu = oFocusedItem.next();
                if (oSubmenu) {
                    menuNav._showMenu(oSubmenu);
                    menuNav._focusItem(getFirstItem(oSubmenu));
                    menuNav._setActiveItem(getFirstItem(oSubmenu));
                }
                bPreventDefault = true;
            }
        }
        if (bPreventDefault) {
            event.preventDefault();
        }
    }, _onMouseMove:function (event) {
        var menuNav = this;
        later(10, menuNav, function () {
            menuNav._currentMouseX = event.pageX;
        });
    }, _onMouseOver:function (event) {
        var menuNav = this, oTarget, oMenu, oMenuLabel, oParentMenu, oMenuItem;
        if (menuNav._blockMouseEvent) {
            menuNav._blockMouseEvent = false;
        }
        else {
            oTarget = event.target;
            oMenu = getMenu(oTarget, true);
            oMenuLabel = getMenuLabel(oTarget, true);
            oMenuItem = getMenuItem(oTarget, true);
            if (handleMouseOverForNode(oMenu, oTarget)) {
                menuNav._onMenuMouseOver(oMenu, event);
                oMenu[HANDLED_MOUSEOVER] = true;
                oMenu[HANDLED_MOUSEOUT] = false;
                oParentMenu = getParentMenu(oMenu);
                if (oParentMenu) {
                    oParentMenu[HANDLED_MOUSEOUT] = true;
                    oParentMenu[HANDLED_MOUSEOVER] = false;
                }
            }
            if (handleMouseOverForNode(oMenuLabel, oTarget)) {
                menuNav._onMenuLabelMouseOver(oMenuLabel, event);
                oMenuLabel[HANDLED_MOUSEOVER] = true;
                oMenuLabel[HANDLED_MOUSEOUT] = false;
            }
            if (handleMouseOverForNode(oMenuItem, oTarget)) {
                menuNav._onMenuItemMouseOver(oMenuItem, event);
                oMenuItem[HANDLED_MOUSEOVER] = true;
                oMenuItem[HANDLED_MOUSEOUT] = false;
            }
        }
    }, _onMouseOut:function (event) {
        var menuNav = this, oActiveMenu = menuNav._activeMenu, bMovingToSubmenu = false, oTarget, oRelatedTarget, oMenu, oMenuLabel, oSubmenu, oMenuItem;
        menuNav._movingToSubmenu = (oActiveMenu && !isHorizontalMenu(oActiveMenu) && ((event.pageX - 5) > menuNav._currentMouseX));
        oTarget = event.target;
        oRelatedTarget = event.relatedTarget;
        oMenu = getMenu(oTarget, true);
        oMenuLabel = getMenuLabel(oTarget, true);
        oMenuItem = getMenuItem(oTarget, true);
        if (handleMouseOutForNode(oMenuLabel, oRelatedTarget)) {
            menuNav._onMenuLabelMouseOut(oMenuLabel, event);
            oMenuLabel[HANDLED_MOUSEOUT] = true;
            oMenuLabel[HANDLED_MOUSEOVER] = false;
        }
        if (handleMouseOutForNode(oMenuItem, oRelatedTarget)) {
            menuNav._onMenuItemMouseOut(oMenuItem, event);
            oMenuItem[HANDLED_MOUSEOUT] = true;
            oMenuItem[HANDLED_MOUSEOVER] = false;
        }
        if (oMenuLabel) {
            oSubmenu = oMenuLabel.next();
            if (oSubmenu && (oRelatedTarget.compareTo(oSubmenu) || oSubmenu.contains(oRelatedTarget))) {
                bMovingToSubmenu = true;
            }
        }
        if (handleMouseOutForNode(oMenu, oRelatedTarget) || bMovingToSubmenu) {
            menuNav._onMenuMouseOut(oMenu, event);
            oMenu[HANDLED_MOUSEOUT] = true;
            oMenu[HANDLED_MOUSEOVER] = false;
        }
    }, _toggleSubmenuDisplay:function (event) {
        var menuNav = this, oTarget = event.target, oMenuLabel = getMenuLabel(oTarget, true), sType = event.type, oAnchor, oSubmenu, sHref, nHashPos, nLen, sId;
        if (oMenuLabel) {
            oAnchor = isAnchor(oTarget) ? oTarget : oTarget.ancestor(isAnchor);
            if (oAnchor) {
                sHref = oAnchor.getAttribute("href", 2);
                nHashPos = sHref.indexOf("#");
                nLen = sHref.length;
                if (nHashPos === 0 && nLen > 1) {
                    sId = sHref.substr(1, nLen);
                    oSubmenu = oMenuLabel.next();
                    if (oSubmenu && (oSubmenu.get(ID) === sId)) {
                        if (sType === MOUSEDOWN || sType === KEYDOWN) {
                            if ((UA.opera || UA.gecko || UA.ie) && sType === KEYDOWN && !menuNav._preventClickHandle) {
                                menuNav._preventClickHandle = menuNav._rootMenu.on("click", function (event) {
                                    event.preventDefault();
                                    menuNav._preventClickHandle.detach();
                                    menuNav._preventClickHandle = null;
                                });
                            }
                            if (sType == MOUSEDOWN) {
                                event.preventDefault();
                                event.stopImmediatePropagation();
                                menuNav._hasFocus = true;
                            }
                            if (menuNav._isRoot(getParentMenu(oTarget))) {
                                if (hasVisibleSubmenu(oMenuLabel)) {
                                    menuNav._hideMenu(oSubmenu);
                                    menuNav._focusItem(oMenuLabel);
                                    menuNav._setActiveItem(oMenuLabel);
                                }
                                else {
                                    menuNav._hideAllSubmenus(menuNav._rootMenu);
                                    menuNav._showMenu(oSubmenu);
                                    menuNav._focusItem(getFirstItem(oSubmenu));
                                    menuNav._setActiveItem(getFirstItem(oSubmenu));
                                }
                            }
                            else {
                                if (menuNav._activeItem == oMenuLabel) {
                                    menuNav._showMenu(oSubmenu);
                                    menuNav._focusItem(getFirstItem(oSubmenu));
                                    menuNav._setActiveItem(getFirstItem(oSubmenu));
                                }
                                else {
                                    if (!oMenuLabel._clickHandle) {
                                        oMenuLabel._clickHandle = oMenuLabel.on("click", function () {
                                            menuNav._hideAllSubmenus(menuNav._rootMenu);
                                            menuNav._hasFocus = false;
                                            menuNav._clearActiveItem();
                                            oMenuLabel._clickHandle.detach();
                                            oMenuLabel._clickHandle = null;
                                        });
                                    }
                                }
                            }
                        }
                        if (sType === CLICK) {
                            event.preventDefault();
                        }
                    }
                }
            }
        }
    }, _onKeyPress:function (event) {
        switch (event.keyCode) {
            case 37:
            case 38:
            case 39:
            case 40:
                event.preventDefault();
                break;
        }
    }, _onKeyDown:function (event) {
        var menuNav = this, oActiveItem = menuNav._activeItem, oTarget = event.target, oActiveMenu = getParentMenu(oTarget), oSubmenu;
        if (oActiveMenu) {
            menuNav._activeMenu = oActiveMenu;
            if (isHorizontalMenu(oActiveMenu)) {
                menuNav._onHorizontalMenuKeyDown(event);
            }
            else {
                menuNav._onVerticalMenuKeyDown(event);
            }
            if (event.keyCode === 27) {
                if (!menuNav._isRoot(oActiveMenu)) {
                    if (UA.opera) {
                        later(0, menuNav, function () {
                            menuNav._hideMenu(oActiveMenu, true);
                        });
                    }
                    else {
                        menuNav._hideMenu(oActiveMenu, true);
                    }
                    event.stopPropagation();
                    menuNav._blockMouseEvent = UA.gecko ? true : false;
                }
                else if (oActiveItem) {
                    if (isMenuLabel(oActiveItem) && hasVisibleSubmenu(oActiveItem)) {
                        oSubmenu = oActiveItem.next();
                        if (oSubmenu) {
                            menuNav._hideMenu(oSubmenu);
                        }
                    }
                    else {
                        menuNav._focusManager.blur();
                        menuNav._clearActiveItem();
                        menuNav._hasFocus = false;
                    }
                }
            }
        }
    }, _onDocMouseDown:function (event) {
        var menuNav = this, oRoot = menuNav._rootMenu, oTarget = event.target;
        if (!(oRoot.compareTo(oTarget) || oRoot.contains(oTarget))) {
            menuNav._hideAllSubmenus(oRoot);
            if (UA.webkit) {
                menuNav._hasFocus = false;
                menuNav._clearActiveItem();
            }
        }
    }});
    Y.namespace('Plugin');
    Y.Plugin.NodeMenuNav = NodeMenuNav;
}, '3.0.0', {requires:['node', 'classnamemanager', 'node-focusmanager']});